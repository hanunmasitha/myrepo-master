<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "file_categories".
 *
 * @property int $id
 * @property string $name
 * @property string $image_asset
 *
 * @property Files[] $files
 */
class FileCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45],
            [['image_asset'], 'string', 'max' => 255],
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
            'image_asset' => 'Image Asset',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['file_categories_id' => 'id']);
    }
}
