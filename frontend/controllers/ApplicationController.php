<?php

	namespace app\controllers;

	use app\components\Controller;
	use Yii;
    use yii\web\Response;
    use common\models\user\User;

    class ApplicationController extends Controller
	{

        /**
         *
         * @return mixed
         */
		public function actionIndex($id = null) {
            Yii::$app->getResponse()->format = Response::FORMAT_JSON;
			return User::current()->getItems()->all();
		}

		public function actionPut($id = null) {
            var_dump(Yii::$app->getRequest()->method);

            Yii::$app->getResponse()->format = Response::FORMAT_JSON;
			return User::current()->getItems()->all();
		}


	}