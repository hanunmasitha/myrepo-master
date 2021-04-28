<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
class User extends \yii\db\ActiveRecord  implements IdentityInterface
{
    
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 100]            
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'username' => 'Username',
            'password' => 'Password',
            'roles_id' => 'roles_id',
        ];
    }    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
          throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

  
    public function getId()
    {
        
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->id;
    }
   
    public function validateAuthKey($authKey)
    {
        throw new \yii\base\NotSupportedException();
    }
    public function validatePassword($password, $roles_id)
    {
        if($roles_id==1){
            return $this->password === sha1($password);
        }
    }
}