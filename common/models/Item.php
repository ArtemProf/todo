<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Item
 * @package common\models
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
     * @var string
     */
    private $description;
    /**
     * @var integer
     */
    private $itemGroup;
    /**
     * @var dueDate
     */
    private $dueDate;
    /**
     * @var integer
     */
    private $done;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
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
            'id'          => 'ID',
            'uid'         => 'User ID',
            'description' => 'Description',
            'dueDate'     => 'Due Date',
            'itemGroup'   => 'Group',
            'done'        => 'Password',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'description', 'dueDate', 'itemGroup','done'], 'safe'],
        ];
    }

}