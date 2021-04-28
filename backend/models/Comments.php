<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $created_at
 * @property int $files_id
 * @property int $comment_by_users_id
 * @property string $comment
 *
 * @property Files $files
 * @property Users $commentByUsers
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['files_id', 'comment_by_users_id'], 'required'],
            [['files_id', 'comment_by_users_id'], 'integer'],
            [['comment'], 'string'],
            [['files_id'], 'exist', 'skipOnError' => true, 'targetClass' => Files::className(), 'targetAttribute' => ['files_id' => 'id']],
            [['comment_by_users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['comment_by_users_id' => 'id']],
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
            'comment_by_users_id' => 'Comment By Users ID',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasOne(Files::className(), ['id' => 'files_id']);
    }
    
    public function findByFilesID($id)
    {
        return $this->hasOne(Comment::className(), ['files_id' => 'id']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentByUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'comment_by_users_id']);
    }
}
