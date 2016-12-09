<?php

	/** @var \app\components\View $this */
	/** @var \common\models\user\User $user */
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Html;

	$this->title = 'Настройки профиля';

?>

	<?$form=ActiveForm::begin(['layout' => 'horizontal'])?>
		<?=$form->field($user, 'nameFirst')->textInput(['placeholder' => 'Не указано'])?>
		<?=$form->field($user, 'nameLast')->textInput(['placeholder' => 'Не указано'])?>
		<!--<hr>-->
		<center><br><?=Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-lg'])?></center>
	<?$form->end()?>
