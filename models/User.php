<?php
namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
    public $confirm_password;
    
    public static function tableName() {
        return 'user';
    }

    public function rules() {
        return [
            [['name','password', 'user_id', 'confirm_password'], 'required', 'message'=>'{attribute} wajib diisi'], 
            [['user_id'], 'unique', 'targetClass'=>'\app\models\User', 'on'=>'create'],
            ['email', 'email'],
            [['password'], 'compare', 'compareAttribute'=>'confirm_password']  
        ];
    }
    
    public static function findIdentityByAccessToken($token, $type = null) {
        return null;
    }
    
    public static function findIdentity($id) {
        return self::findOne($id);
    }
    
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }
    
    public function getId() {
        return $this->user_id;
    }

    public function getAuthKey() {
        return $this->authKey;
    }
    
    public function getName() {
        return $this->name; 
    }
}