<?php

namespace app\controllers;

use common\models\user\User;
use common\models\user\form\LoginForm;
use yii\base\Exception;
use yii\base\UserException;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = User::class;
    public $user = null;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        }

        if( !User::current()->isAdmin() ){
            return $this->redirect('/');
        }

        $this->user = User::current();

        return $this;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);
        unset($actions['create']);
        unset($actions['delete']);
        unset($actions['index']);
        unset($actions['view']);

        return $actions;
    }

    public function actionIndex()
    {
        return User::find()->all();
    }

    public function actionUpdate($id=null)
    {
        $user = User::findOne(['id' => $id]);

        if( empty($user) ){
            return [];
        }
        if( $user->updateAttributes(Yii::$app->getRequest()->post()) && $user->validate() ){
            $user->save();
        }

        return $user;
    }

    public function actionDelete($id = null)
    {
        if( $this->user->id == $id ){
            return [];
        }

        User::findOne(['id' => $id])->delete();

        return User::find()->all();
    }

    public function actionView()
    {
        Yii::$app->response->format = Response::FORMAT_HTML;

        return $this->render('index');
    }

    protected function verbs()
    {
        return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
            'index'  => ['GET'],
            'view'   => ['GET'],
        ];
    }
}