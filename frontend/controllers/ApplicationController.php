<?php

namespace app\controllers;

use Yii;
use common\models\user\User;
use common\models\Item;
use yii\rest\ActiveController;


class ApplicationController extends ActiveController
{
    public $modelClass = Item::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['delete']);
        unset($actions['index']);

        return $actions;
    }

    public function actionIndex()
    {
        return User::current()->getItems()->all();
    }

    public function actionCreate()
    {
        $task = new Item();
        $task->uid = User::current()->id;
        $task->description = Yii::$app->getRequest()->post('description');
        $task->dueDate = date('Y-m-d');
        $task->state = 0;
        $task->itemGroup = 0;

        $task->save();

        return $task;
    }

    public function actionDelete($id = null)
    {
        Item::findOne(['id' => $id])->delete();

        return User::current()->getItems()->all();
    }

    protected function verbs()
    {
        return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
            'index'  => ['GET'],
        ];
    }


}