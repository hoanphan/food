<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distributor_translate".
 *
 * @property int $id
 * @property int $distributor_id
 * @property string $language
 * @property string $name
 *
 * @property Distributor $distributor
 */
class DistributorTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distributor_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['distributor_id', 'language', 'name'], 'required'],
            [['distributor_id'], 'integer'],
            [['language', 'name'], 'string', 'max' => 255],
            [['distributor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distributor::className(), 'targetAttribute' => ['distributor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'distributor_id' => 'Id Distributor',
            'language' => 'Language',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributor()
    {
        return $this->hasOne(Distributor::className(), ['id' => 'distributor_id']);
    }
}
