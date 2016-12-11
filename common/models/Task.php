<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Task
 * @package common\models
 */
class Task extends ActiveRecord
{
    const STATE_NEW = 10;
    const STATE_IN_PROGRESS = 50;
    const STATE_DONE = 90;

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
    private $state;

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, User::class, 'uid'),
        );
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
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
            'state'       => 'State',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'description', 'dueDate'], 'required'],
            [['id', 'uid', 'itemGroup', 'state'], 'integer'],
            [['description'], 'string'],
        ];

    }

}