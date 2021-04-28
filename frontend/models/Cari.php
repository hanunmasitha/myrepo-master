<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $size
 * @property string $created_at
 * @property int $file_categories_id
 * @property int $upload_by_users_id
 * @property string $filename
 *
 * @property Comments[] $comments
 * @property FileCategories $fileCategories
 * @property Users $uploadByUsers
 * @property Ratings[] $ratings
 * @property UserDownloads[] $userDownloads
 */
class Cari extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }
    public function rules()
    {
        return [
            [['comment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment' => 'Search',
        ];
    }
}
