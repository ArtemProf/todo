<?php

namespace app\controllers;

use common\models\user\User;
use common\models\user\form\LoginForm;
use yii\base\UserException;
use Yii;
use yii\web\Response;
use yii\web\Controller;

class AuthController extends Controller
{
    public $modelClass = User::class;

    /**
     * Page Login
     * @return string|Response
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $request = Yii::$app->request;

        if ($request->isPost && $model->load($request->post()) && $model->login()) {
            return $this->goHome();
        }

        return $this->render(
            'login',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Page Register
     * @return string|Response
     * @throws UserException
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = new User();
        $request = Yii::$app->request;

        if ($request->isPost && $user->load($request->post()) && $user->validate()) {

            if ($user->save() && Yii::$app->user->login($user)) {
                return $this->goHome();
            }

            throw new UserException(Yii::t('app', 'auth.register.unknown.exception'));
        }

        return $this->render(
            'register',
            [
                'model' => $user,
            ]
        );
    }

    /**
     * Page Logout
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Page Profile
     * @return string
     */
    public function actionProfile()
    {
        $user = User::findOne(Yii::$app->user->id);
        $request = Yii::$app->request;

        if ($request->isPost && $user->load($request->post()) && $user->validate()) {
            $user->save();
        }

        return $this->render(
            'profile',
            [
                'model' => User::findOne(Yii::$app->user->id),
            ]
        );
    }
}