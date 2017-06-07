<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $country
 * @property int $status
 *
 * @property PhraseTranslate[] $phraseTranslates
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'country'], 'required'],
            [['status'], 'integer'],
            [['name', 'country'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'country' => 'Country',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhraseTranslates()
    {
        return $this->hasMany(PhraseTranslate::className(), ['language_id' => 'id']);
    }
}
