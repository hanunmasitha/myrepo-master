<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fullname
 * @property string $username
 * @property string $password
 * @property string $foto
 * @property string $email
 * @property int $roles_id
 *
 * @property Comments[] $comments
 * @property Files[] $files
 * @property Ratings[] $ratings
 * @property UserDownloads[] $userDownloads
 * @property Roles $roles
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roles_id'], 'required'],
            [['roles_id'], 'integer'],
            [['fullname', 'username', 'password', 'email'], 'string', 'max' => 45],
            [['foto'], 'string', 'max' => 255],
            [['roles_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['roles_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'username' => 'Username',
            'password' => 'Password',
            'foto' => 'Foto',
            'email' => 'Email',
            'roles_id' => 'Roles ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['comment_by_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['upload_by_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Ratings::className(), ['rating_by_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDownloads()
    {
        return $this->hasMany(UserDownloads::className(), ['download_by_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasOne(Roles::className(), ['id' => 'roles_id']);
    }
}
