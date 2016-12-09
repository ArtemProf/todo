<?php

	/** @var \app\components\View $this */
	/** @var \common\models\user\User $model */

	use frontend\components\widgets\AuthChoice;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;

	$this->title = 'Регистрация';

?>

	<div class="row">
		<div class="col-md-5 col-md-offset-2 col-border" style="text-align:center">
			<h5>Регистрация</h5>
			<?$form=ActiveForm::begin()?>
				<?=$form->field($model, 'email')->textInput(['placeholder' => 'Электронная почта'])->label(false)?>
				<?=$form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false)?>
				<?=Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary'])?>
				<?/*<div class="help-block">Нажимая кнопку &laquo;Зарегистрироваться&raquo; вы<br>принимаете условия <a href="#">пользовательского соглашения</a></div>*/?>
			<?$form->end()?>
		</div>
		<div class="col-md-3">
			<h5>Через соцсеть</h5>
			<?=AuthChoice::widget(['baseAuthUrl' => ['user/auth']])?>
		</div>
	</div>
	<div class="b-head-auth-popup-register-link" style="margin-left:120px">
		Уже зарегистрированы?
		<a href="<?=Url::toRoute(['/user/login'])?>">Авторизация</a>
	</div>
a