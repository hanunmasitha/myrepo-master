<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ratings".
 *
 * @property int $id
 * @property string $value
 * @property int $files_id
 * @property int $rating_by_users_id
 *
 * @property Files $files
 * @property Users $ratingByUsers
 */
class Ratings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ratings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['files_id', 'rating_by_users_id'], 'required'],
            [['files_id', 'rating_by_users_id', 'value'], 'integer'],
            [['files_id'], 'exist', 'skipOnError' => true, 'targetClass' => Files::className(), 'targetAttribute' => ['files_id' => 'id']],
            [['rating_by_users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['rating_by_users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'files_id' => 'Files ID',
            'rating_by_users_id' => 'Rating By Users ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasOne(Files::className(), ['id' => 'files_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingByUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'rating_by_users_id']);
    }
}
