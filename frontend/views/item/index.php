<?php

/** @var \app\components\View $this */
/** @var common\models\user\User $model */

use yii\widgets\ActiveForm;
use common\models\Item;

$this->title = 'List';
?>

<div class="list-group col-md-8 col-md-offset-2">
    <a href="/item/add" class="btn btn-default">Add</a>
</div>
<div class="list-group col-md-8 col-md-offset-2">
    <a href="#" class="list-group-item active">Home</a>
    <? foreach ($list as $item): ?>
        <div class="list-group-item">
            <input type="checkbox" id="item-done" class="" name="Item[<?= $item->id ?>][done]" value="1">
            <span><?= $item->description ?></span>
            <div class="pull-right">
                <a href="/item/edit/<?= $item->id ?>" class="link p-r-2">Edit</a>
                <span class="badge"><?= $item->dueDate ?></span>
            </div>
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