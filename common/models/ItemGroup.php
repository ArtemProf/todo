<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class ToDoList
 * @package common\models\user
 */
class Item extends ActiveRecord
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var integer
     */
    private $uid;

    /**
     * @var integer
     */
    private $title;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_group';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => 'ID',
            'uid'   => 'User ID',
            'title' => 'Title',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

}