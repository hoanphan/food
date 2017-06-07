<?php

namespace app\models;

use app\components\Model;
use navatech\language\Translate;
use Yii;
use yii\httpclient\Transport;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $created
 * @property int $status
 *
 * @property CategoryTranslate[] $categoryTranslates
 */
class Category extends Model
{
    const PUBLISH=1;
    const NOT_PUBLISH=0;
    public function behaviors($attributes = null) {
        $attributes = [
            'name',
        ];
        $behaviors  = parent::behaviors($attributes);
        return $behaviors;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created'], 'safe'],
            [['status'], 'integer'],
            [
                [
                    'name',
                    'name_' . Yii::$app->language,
                ],
                'safe',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created' => Translate::category_created_at(),
            'status' => Translate::status(),
            'name'=>Translate::name_category()
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTranslates()
    {
        return $this->hasMany(CategoryTranslate::className(), ['category_id' => 'id']);
    }
}
