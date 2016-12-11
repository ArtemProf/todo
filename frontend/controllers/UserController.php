<?php

namespace app\controllers;

use app\components\Controller;
use common\models\user\User;
use common\models\user\form\LoginForm;
use yii\base\UserException;
use Yii;

class UserController extends Controller
{

    public function actionLogin()
    {

        $model = new LoginForm();
        $request = Yii::$app->request;

        if ($request->isPost && $model->load($request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render(
            'login',
            [
                'model' => $model,
            ]
        );
    }

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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile()
    {
        $user = User::findOne(Yii::$app->user->id);

        $request = Yii::$app->request;

        if ($request->isPost) {
            $user->nameFirst = $request->post('User')['nameFirst'];
            $user->nameLast = $request->post('User')['nameLast'];
            $user->email = $request->post('User')['email'];
            $user->password = $request->post('User')['password'];
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