<?php

/** @var \app\components\View $this */
/** @var common\models\user\User $model */

use frontend\components\widgets\AuthChoice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \common\models\user\form\LoginForm;

$this->title = 'List';
?>

<div class="list-group" contenteditable="true">
    <a href="http://www.layoutit.com/build#" class="list-group-item active">Home</a>
    <div class="list-group-item">List header</div>
    <div class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">...</p>
    </div>
    <div class="list-group-item"><span class="badge">14</span>Help</div>
    <a class="list-group-item active"><span class="badge">14</span>Help</a>
</div>