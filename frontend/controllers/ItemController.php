<?php

	namespace app\controllers;

	use app\components\Controller;

    use common\models\Item;
    use Yii;

	class ItemController extends Controller
	{
		public function actionIndex() {

            $list = Item::find()
				->orderBy('dueDate DESC')
				->all();

			return $this->render('index', [
			    'list' => $list
			]);
		}
	}