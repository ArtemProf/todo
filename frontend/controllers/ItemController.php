<?php

namespace app\controllers;

use app\components\Controller;

use common\models\user\User;
use common\models\Item;
use Yii;

class ItemController extends Controller
{
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('user/login');
        }

        return $this->render(
            'index',
            [
                'list' => User::current()->getActiveItems()->all(),
                'doneList' => User::current()->getDoneItems()->all(),
            ]
        );
    }

    public function actionAdd()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('user/login');
        }

        $content = $this->getView()->render('edit',[],$this);

        echo $content;
    }
}