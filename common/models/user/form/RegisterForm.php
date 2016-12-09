<?php

	namespace common\models\user\form;

	use common\models\user\User;
	use Yii;
	use yii\base\Model;

	class RegisterForm extends Model
	{
		public $email;
		public $password;

		/**
		 * @return array правила проверки полей
		 */
		public function rules() {
			return [
				[['email', 'password'], 'trim'],
				[['email', 'password'], 'required'],
				[['email'], 'email']
			];
		}

		public function attributeLabels() {
			return array_merge((new User())->attributeLabels(), [
				'password_repeat' => 'Пароль, повторно'
			]);
		}
	}