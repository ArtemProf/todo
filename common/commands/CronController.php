<?php

	namespace app\commands;

	use yii\console\Controller;

	class CronController extends Controller
	{
		public function init() {
			$this->defaultAction = 'run';
		}

		public function actionRun() {
		}

	}