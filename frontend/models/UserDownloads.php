<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_downloads".
 *
 * @property int $id
 * @property string $created_at
 * @property int $files_id
 * @property int $download_by_users_id
 *
 * @property Files $files
 * @property Users $downloadByUsers
 */
class UserDownloads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_downloads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['files_id', 'download_by_users_id'], 'required'],
            [['files_id', 'download_by_users_id'], 'integer'],
            [['files_id'], 'exist', 'skipOnError' => true, 'targetClass' => Files::className(), 'targetAttribute' => ['files_id' => 'id']],
            [['download_by_users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['download_by_users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'files_id' => 'Files ID',
            'download_by_users_id' => 'Download By Users ID',
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
    public function getDownloadByUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'download_by_users_id']);
    }
}
