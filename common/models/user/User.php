<?php

namespace common\models\user;

use common\models\Task;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 * @property integer id
 * @property string  email
 * @property string  password
 * @property string  authKey
 * @property string  authToken
 * @property string  nameFirst
 * @property string  nameLast
 * @property integer admin
 *
 * @method static User findOne($condition)
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @var null
     */
    private static $_currentUser = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     *
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param mixed $token the token to be looked for
     * @param mixed $type  the type of the token. The value of this parameter depends on the implementation.
     *                     For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be
     *                     `yii\filters\auth\HttpBearerAuth`.
     *
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['authToken' => $token]);
    }

    /**
     * @param $email
     * @return User
     */
    public static function findByEmail($email) {
        return self::findOne(['email' => $email]);
    }

    /**
     * User list array for admin page
     *
     * @return array
     */
    public static function getUsersList()
    {
        $user = self::find()->all();

        $resUsers = [];
        foreach ($user as $u) {
            $resUsers[$u->id] = $u->nameFirst;
        }

        return $resUsers;
    }

    public function init()
    {
        parent::init();
        $this->on(self::EVENT_BEFORE_INSERT, [$this, 'passwordHashing']);
        $this->on(self::EVENT_BEFORE_UPDATE, [$this, 'passwordHashing']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'email'     => 'Email',
            'fullName'  => 'Full name',
            'nameFirst' => 'First name',
            'nameLast'  => 'Last name',
            'password'  => 'Password',
            'admin'     => 'Is admin',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'trim'],
            [['email', 'password'], 'required'],
            [['email'], 'email', /*'checkDNS' => true*/],
            [['email'], 'unique'],
            [['nameFirst', 'nameLast'], 'default', 'value' => null],
            ['items', 'safe'],
        ];
    }

    public function relations()
    {
        return array(
            'items' => array(self::MANY_MANY, Task::tableName(), 'item(post_id, section_id)'),
        );
    }

    public function afterDelete() {
        parent::afterDelete();
        Task::deleteAll(['uid' => $this->id]);
    }

    /**
     * @return $this
     */
    public function getTasks()
    {
        if (self::current()->admin == 1) {
            return Task::find()->orderBy(['state' => 'DESC', 'id' => 'ASC']);
        }

        return $this->hasMany(Task::className(), ['uid' => 'id'])->orderBy(['state' => 'DESC', 'id' => 'ASC']);
    }

    /**
     * @return null|User
     */
    public static function current()
    {
        if (self::$_currentUser == null) {
            self::$_currentUser = Yii::$app->user->identity;
        }

        return self::$_currentUser;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin == 1;
    }

    public function setTasks($item)
    {
        $this->items = $item;
    }

    /**
     * @param $password
     * @return bool
     */
    public function isPasswordValid($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     *
     * @param string $authKey the given auth key
     *
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Event handler: EVENT_BEFORE_INSERT and EVENT_BEFORE_UPDATE
     */
    public function passwordHashing()
    {
        if (substr($this->password, 0, 7) != '$2y$13$') {
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
        }
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        $name = trim(str_replace('  ', ' ', implode(' ', [$this->nameFirst, $this->nameLast])));

        if ($name == '') {
            $name = 'Anonymous';
        }

        return $name;
    }
}