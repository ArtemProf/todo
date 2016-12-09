<?php

/** @var \app\components\View $this */
/** @var common\models\user\User $model */

use frontend\components\widgets\AuthChoice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\user\form\RegisterForm;

$this->title = 'Registration';
?>

    <div class="login-form col-md-4 col-md-offset-4 m-t-10">
        <h4 class="text-center">Registration</h4>
        <? $form = ActiveForm::begin(
            ['action' => Url::toRoute(['user/register']), 'class' => 'form-horizontal', 'enableClientValidation' => false]
        ) ?>
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

        <?= Html::submitButton('Register', ['class' => 'btn btn-primary col-md-12']) ?>

        <a href="<?= Url::toRoute(['login']) ?>">Sing in</a>

        <? $form->end() ?>
    </div>