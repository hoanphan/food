<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_translate".
 *
 * @property int $id
 * @property int $product_id
 * @property string $language
 * @property string $name
 * @property string $title
 * @property string $content
 *
 * @property Product $product
 */
class ProductTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'language', 'name', 'title', 'content'], 'required'],
            [['product_id'], 'integer'],
            [['content'], 'string'],
            [['language', 'name', 'title'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'language' => 'Language',
            'name' => 'Name',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
