<?php

namespace backend;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $title
 * @property string $filename
 * @property string $description
 * @property string $size
 * @property string $created_at
 * @property int $file_categories_id
 * @property int $upload_by_users_id
 *
 * @property Comments[] $comments
 * @property FileCategories $fileCategories
 * @property Users $uploadByUsers
 * @property Ratings[] $ratings
 * @property UserDownloads[] $userDownloads
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'file_categories_id', 'upload_by_users_id'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['file_categories_id', 'upload_by_users_id'], 'integer'],
            [['title', 'size'], 'string', 'max' => 100],
            [['filename'], 'string', 'max' => 255],
            [['file_categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => FileCategories::className(), 'targetAttribute' => ['file_categories_id' => 'id']],
            [['upload_by_users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['upload_by_users_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'filename' => 'Filename',
            'description' => 'Description',
            'size' => 'Size',
            'created_at' => 'Created At',
            'file_categories_id' => 'File Categories ID',
            'upload_by_users_id' => 'Upload By Users ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['files_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFileCategories()
    {
        return $this->hasOne(FileCategories::className(), ['id' => 'file_categories_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUploadByUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'upload_by_users_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Ratings::className(), ['files_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDownloads()
    {
        return $this->hasMany(UserDownloads::className(), ['files_id' => 'id']);
    }
}
