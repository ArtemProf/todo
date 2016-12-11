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
//            unset($actions['update']);
        unset($actions['delete']);
//            unset($actions['view']);
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

//    public function actionUpdate($id=null)
//    {
////var_dump($postTask);die;
//        $uid = User::current()->id;
//        $task = Item::findOne(['id' => $id, 'uid' => $uid ]);
//
//        if( empty($task) ){
//            return [];
//        }
//
//        $postTask = Yii::$app->getRequest()->post();
//        $task->updateAttributes($postTask);
//
//        $task->save();
//
//        return $task;
//    }

    public function actionDelete($id = null)
    {
        Item::findOne(['id' => $id])->delete();

        return User::current()->getActiveItems()->all();
    }

    protected function verbs()
    {
        return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
            'view'   => ['GET'],
            'index'  => ['GET'],
        ];
    }


}