<?php

/** @var \app\components\View $this */
/** @var common\models\user\User $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->usePageScript();
$this->title = 'Login';
?>

<div class="login-form col-md-4 col-md-offset-4">
    <h4 class="text-center">Login</h4>
    <? $form = ActiveForm::begin(
        ['action' => ['user/login'], 'class' => 'form-horizontal', 'enableClientValidation' => false]
    ) ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
    <div class="checkbox">
        <?= $form->field($model, 'remember')->checkbox() ?>
    </div>

    <?= Html::submitButton('Login', ['class' => 'btn btn-primary col-md-12']) ?>
    <? $form->end() ?>

    <div class="row text-center">
        <div class="col-md-6">
            <a href="<?= Url::toRoute(['/register']) ?>">Sing up</a>
        </div>
        <div class="col-md-6">
            <a href="<?= Url::toRoute(['/remind']) ?>">Forgot password...</a>
        </div>
    </div>

</div>