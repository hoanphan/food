<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "category_translate".
 *
 * @property int $id
 * @property int $category_id
 * @property string $language
 * @property string $name
 *
 * @property Category $category
 */
class CategoryTranslate extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'language', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['language', 'name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'language' => 'Language',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
