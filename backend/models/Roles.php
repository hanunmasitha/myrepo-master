<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property string $name
 *
 * @property Users[] $users
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     
    public function getImageurl()
    {
        return Yii::getAlias('@userImgPath').'/'.$this->FOTO_USER;
    }
    public function printImg()
    {
        return Yii::getAlias('@userImgPath').'/'.$this->FOTO_USER;
    }
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['roles_id' => 'id']);
    }
}
