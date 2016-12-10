<?php

/** @var \app\components\View $this */
/** @var common\models\user\User $model */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Item;

$model = new Item();

?>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?= Html::button('×', ['class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => 'true' ,'onclick' => 'item.close()']) ?>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <? $form = ActiveForm::begin(
                ['action' => ['user/login'], 'enableClientValidation' => false]
            ) ?>
                <div class="modal-body">
                    <?= $form->field($model, 'description')->textarea()->label(false) ?>
                </div>
                <div class="modal-footer">
                    <?= Html::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'onclick' => 'item.close()']) ?>
                    <?= Html::submitButton('Save', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'onclick' => 'item.save()']) ?>
                </div>
            <? $form->end() ?>
        </div>
    </div>
</div>