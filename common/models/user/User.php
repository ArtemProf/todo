<?php

	namespace common\models\user;

	use common\models\Item;
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
	 * @property string  gender
	 *
	 * @method static User findOne($condition)
	 */
	class User extends ActiveRecord implements IdentityInterface
	{
		/**
		 * Кеш текущего авторизованного пользователя в системе
		 */
		private static $_currentUser = null;

		public function init() {
			parent::init();
			$this->on(self::EVENT_BEFORE_INSERT, [$this, 'passwordHashing']);
			$this->on(self::EVENT_BEFORE_UPDATE, [$this, 'passwordHashing']);
		}

		/**
		 * @inheritdoc
		 */
		public static function tableName() {
			return 'user';
		}

		/**
		 * @inheritdoc
		 */
		public static function primaryKey() {
			return ['id'];
		}

		/**
		 * @inheritdoc
		 */
		public function attributeLabels() {
			return [
				'id' => 'ID',
				'email' => 'Email',
                'fullName' => 'Full name',
				'nameFirst' => 'First name',
				'nameLast' => 'Last name',
				'password' => 'Password'
			];
		}

		/**
		 * @inheritdoc
		 */
		public function rules() {
			return [
				[['email', 'password'], 'trim'],
				[['email', 'password'], 'required'],
				[['email'], 'email', /*'checkDNS' => true*/],
				[['email'], 'unique'],
				[['nameFirst', 'nameLast'], 'default', 'value' => null],
				[['gender'], 'in', 'range' => ['m', 'f']],
                ['items', 'safe']
			];
		}

        public function relations()
        {
            return array(
                'items' => array(self::MANY_MANY, Item::tableName(), 'item(post_id, section_id)'),
            );
        }

        public function getItems() {
            return $this->hasMany(Item::className(), ['uid' => 'id']);
        }

        public function getDoneItems() {
            return $this->hasMany(Item::className(), ['uid' => 'id'])->where(['state' => Item::STATE_DONE]);
        }

        public function getActiveItems() {
            return $this->hasMany(Item::className(), ['uid' => 'id'])->where(['state'=> Item::STATE_DONE]);
        }

        public function setItems($item) {
            $this->items = $item;
        }

		/**
		 * @param $email string Адрес Email пользователя, одновременно являющийся его логином
		 *
		 * @return User
		 */
		public static function findByEmail($email) {
			return self::findOne(['email' => $email]);
		}

		/**
		 * Проверка пароля на правильность
		 *
		 * @param string $password пароль
		 *
		 * @return bool
		 */
		public function isPasswordValid($password) {
			return Yii::$app->getSecurity()->validatePassword($password, $this->password);
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
		public static function findIdentity($id) {
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
		public static function findIdentityByAccessToken($token, $type = null) {
			return self::findOne(['authToken' => $token]);
		}

		/**
		 * Returns an ID that can uniquely identify a user identity.
		 * @return string|integer an ID that uniquely identifies a user identity.
		 */
		public function getId() {
			return $this->id;
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
		public function getAuthKey() {
			return $this->authKey;
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
		public function validateAuthKey($authKey) {
			return $this->getAuthKey() === $authKey;
		}

		/**
		 * Event handler: EVENT_BEFORE_INSERT and EVENT_BEFORE_UPDATE
		 */
		public function passwordHashing() {
			if (substr($this->password, 0, 7) != '$2y$13$')
				$this->password = Yii::$app->security->generatePasswordHash($this->password);
		}

		/**
		 * @return null|User
		 */
		public static function current() {
			if (self::$_currentUser == null)
				self::$_currentUser = Yii::$app->user->identity;
			return self::$_currentUser;
		}

		/**
		 * Возвращает полное имя пользователя
		 * @return string полное имя пользователя
		 */
		public function getFullName() {
			$name = trim(str_replace('  ', ' ', implode(' ', [$this->nameFirst, $this->nameLast])));

			if ($name == '')
				$name = 'Anonymous';

			return $name;
		}
	}