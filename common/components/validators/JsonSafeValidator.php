<?php

	namespace common\components\validators;

	use yii\validators\Validator;

	class JsonSafeValidator extends Validator
	{
		public static function apply($value) {
			return str_replace('\\', '&Backslash;', trim($value));
		}

		public function validateAttribute($model, $attribute) {
			$model->$attribute = self::apply($model->$attribute);
		}
	}