<?php

namespace common\models\user\form;

use common\models\user\User;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;
    public $remember = true;

    /**
     * @var User cache of the currect user
     */
    private $_user;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email'], 'email'],
            [['remember'], 'boolean'],
            [['password'], 'validatePassword'],
            [
                ['password'],
                'string',
                'length' => [Yii::$app->params['password.min.length'], Yii::$app->params['password.max.length']],
            ],
        ];
    }

    public function attributeLabels()
    {
        return array_merge(
            (new User())->attributeLabels(),
            [
                'remember' => 'Remember me',
            ]
        );
    }

    /**
     * @param $attribute
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            if (!$this->getUser() || !$this->getUser()->isPasswordValid($this->password)) {
                $this->addError($attribute, 'Incorrect user name or password');
            }
        }
    }

    /**
     * @return User
     */
    private function getUser()
    {
        if (!isset($this->_user)) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

    /**
     * @return bool
     */
    public function login()
    {
        $rememberTimeout = $this->remember
            ? Yii::$app->params['auth.remember.timeout']
            : 0;

        return $this->validate()
            ? Yii::$app->user->login($this->getUser(), $rememberTimeout)
            : false;
    }
}