<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "distributor".
 *
 * @property int $id
 * @property int $status
 * @property string $address
 * @property string $email
 * @property string $phone
 *
 * @property DistributorTranslate[] $distributorTranslates
 * @property Product[] $products
 */
class Distributor extends Model
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
        return 'distributor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['address', 'email', 'phone'], 'required'],
            [['address', 'email', 'phone'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributorTranslates()
    {
        return $this->hasMany(DistributorTranslate::className(), ['distributor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['distributor_id' => 'id']);
    }
}
