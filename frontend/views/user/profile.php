<?php

/** @var \app\components\View $this */
/** @var \common\models\user\User $user */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Profile';

?>

<div class="login-form col-md-4 col-md-offset-4 m-t-10">
    <h4 class="text-center">Profile</h4>
    <? $form = ActiveForm::begin(
        ['action' => Url::toRoute(['user/profile']), 'class' => 'form-horizontal', 'enableClientValidation' => false]
    ) ?>
    <?= $form->field($model, 'nameFirst')->textInput(['placeholder' => 'First name'])->label(false) ?>
    <?= $form->field($model, 'nameLast')->textInput(['placeholder' => 'Last name'])->label(false) ?>

    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-primary col-md-12']) ?>

    <? $form->end() ?>
</div>
