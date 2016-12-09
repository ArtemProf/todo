<?php

	namespace common\components\helpers;

	class ArrayHelper extends \yii\helpers\ArrayHelper
	{
		public static function columnGet($name, $array, $keepKeys = true) {
			return parent::getColumn($array, $name, $keepKeys);
		}
	}