<?php

	/** @var \app\components\View $this */
	/** @var common\models\user\User $model */

	use frontend\components\widgets\AuthChoice;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;

	$this->title = 'Авторизация';

?>

<div class="col-md-4 col-md-offset-4">
	<h5>Вход с паролем</h5>
	<?$form=ActiveForm::begin(['action' => ['user/login'], 'class' => 'form-horizontal', 'enableClientValidation' => false])?>
		<?=$form->field($this->authModel, 'email')->textInput(['placeholder' => 'Электронная почта'])->label(false)?>
		<?=$form->field($this->authModel, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false)?>
		<div class="checkbox">
			<?=$form->field($this->authModel, 'remember')->checkbox()?>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox"> Remember me
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Sign in</button>
			</div>
		</div>
	<?=Html::submitButton('Вход', ['class' => 'btn btn-primary col-md-12'])?>
	<?$form->end()?>

	<div class="row">
		Ещё на зарегистрированы?
		<a href="<?=Url::toRoute(['user/register'])?>">Регистрация</a>
	</div>
</div>