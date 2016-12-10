<?php

/** @var \app\components\View $this */
/** @var common\models\user\User $model */

use yii\widgets\ActiveForm;
use common\models\Item;

$this->title = 'List';
?>

<div class="list-group col-md-8 col-md-offset-2">
    <div class="list-group-item active text-right">
        <a href="#" class="btn btn-default" onclick="item.add(this);">Add</a>
    </div>
    <? foreach ($list as $item): ?>
        <div class="list-group-item" data-id="<?= $item->id ?>">
            <div class="col-md-4">
                <span><?= $item->description ?></span>
            </div>
            <div class="col-md-3">
                <select class="form-control">
                    <option value="0">New</option>
                    <option value="1">In progress</option>
                    <option value="2">Finished</option>
                </select>
            </div>
            <div class="col-md-3">
                <a href="#" onclick="item.edit(this);" class="btn btn-default p-r-2">Edit</a>
                <a href="#" onclick="item.remove(this);" class="btn btn-default p-r-2">Del</a>
            </div>
            <div class="col-md-2 text-right">
                <span class="badge"><?= $item->dueDate ?></span>
            </div>
            <div class="clearfix"></div>
        </div>
    <? endforeach; ?>


    <? foreach ($doneList as $item): ?>
        <div class="list-group-item item-done">
            <input type="checkbox" id="item-done" class="" name="Item[<?= $item->id ?>][done]" value="1" checked>
            <span><?= $item->description ?></span>
            <span class="badge"><?= $item->dueDate ?></span>
        </div>
    <? endforeach; ?>

    <a class="list-group-item active">
        <span class="badge"><?= count($list) ?></span>Count
    </a>
</div>