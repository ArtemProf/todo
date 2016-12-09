<?php

	namespace common\models\user\form;

	use common\models\user\User;
	use Yii;
	use yii\base\Model;

	class LoginForm extends Model
	{
		public $email;
		public $password;
		public $remember = true;

		/**
		 * @var User Кеш текущего пользователя
		 */
		private $_user;

		/**
		 * @return array правила проверки полей
		 */
		public function rules() {
			return [
				[['email', 'password'], 'required'],
				[['email'], 'email'],
				[['remember'], 'boolean'],
				[['password'], 'validatePassword'],
				[['password'], 'string', 'length' => [Yii::$app->params['password.min.length'], Yii::$app->params['password.max.length']]]
			];
		}

		public function attributeLabels() {
			return array_merge((new User())->attributeLabels(), [
				'remember' => 'Запомнить меня'
			]);
		}

		/**
		 * Проверка поля "пароль"
		 *
		 * @param string $attribute текущее проверяемое поле
		 * @param array  $params    дополнительный ассоциативный массив
		 */
		public function validatePassword($attribute, $params) {
			if (!$this->hasErrors()) {
				if (!$this->getUser() || !$this->getUser()->isPasswordValid($this->password))
					$this->addError($attribute, 'Неверное имя пользователя или пароль');
			}
		}

		/**
		 * Получение пользователя, пытающегося авторизоваться по полю Email, если оно определено.
		 *
		 * @return User текущий пользователь, пытающийся авторизоваться
		 */
		private function getUser() {
			if (!isset($this->_user))
				$this->_user = User::findByEmail($this->email);

			return $this->_user;
		}

		/**
		 * Авторизация пользователя
		 */
		public function login() {
			$rememberTimeout = $this->remember
				? Yii::$app->params['auth.remember.timeout']
				: 0;

			return $this->validate()
				? Yii::$app->user->login($this->getUser(), $rememberTimeout)
				: false;
		}
	}