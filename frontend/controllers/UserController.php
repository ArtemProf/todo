<?php

	namespace app\controllers;

	use app\components\Controller;
	use common\models\user\form\LoginForm;
	use common\models\user\form\RegisterForm;
	use common\models\user\User;
	use Yii;
	use yii\base\Exception;
	use yii\base\UserException;

	class UserController extends Controller
	{
		public function actions() {
			return [
				'auth' => [
					'class' => 'yii\authclient\AuthAction',
					'successCallback' => [$this, 'successOAuthCallback'],
				],
			];
		}

		/**
		 * @param Facebook|Twitter $client
		 */
		public function successOAuthCallback($client) {
			$attributes = $client->getUserAttributes();
			$email = null;

			switch ($client->id) {
				case 'tw': $email = $attributes['id'].'@twitter.com'; break;
				case 'fb': $email = $attributes['email']; break;
				case 'vk': $email = $client->accessToken->params['email'] ?: $attributes['id'].'@vk.com'; break;
				case 'ok': $email = $attributes['id'].'@ok.ru'; break;
			}

			$user = User::findByEmail($email) or $user = new User();
			$user->sonetId = $attributes['id'];
			$user->sonetType = $client->id;
			$user->email or $user->email = $email;

			$user->password or $user->password = User::$socialPassword;

			if ($user->save() === false) {
				echo '<pre>'.print_r($user->errors, true).'</pre>';
			}

			if (Yii::$app->user->login($user) === false) {
				echo 'Ошибка авторизации';
			}
		}

		public function actionLogin() {
//			if (!Yii::$app->user->isGuest)
//				return $this->goHome();

			$model = new LoginForm();
			$request = Yii::$app->request;

			if ($request->isPost && $model->load($request->post()) && $model->login())
				return $this->goBack();

			return $this->render('login', [
				'model' => $model
			]);
		}

		public function actionRegister() {
			if (!Yii::$app->user->isGuest)
				return $this->goHome();

			$model = new RegisterForm();
			$request = Yii::$app->request;

			if ($request->isPost && $model->load($request->post()) && $model->validate()) {
				$user = new User();
				$user->email = $model->email;
				$user->password = $model->password;

				if ($user->save() && Yii::$app->user->login($user))
					return $this->goHome();

				throw new UserException(Yii::t('app', 'auth.register.unknown.exception'));
			}

			return $this->render('register', [
				'model' => $model
			]);
		}

		public function actionLogout() {
			Yii::$app->user->logout();
			return $this->goHome();
		}

		public function actionProfile() {
			$user = User::findOne(Yii::$app->user->id);
			$request = Yii::$app->request;

			if ($request->isPost) {
				$user->nameFirst = $request->post('User')['nameFirst'];
				$user->nameLast = $request->post('User')['nameLast'];
				$user->save();
			}

			return $this->render('profile', [
				'user' => User::findOne(Yii::$app->user->id)
			]);
		}
	}