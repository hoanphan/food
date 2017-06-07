<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phrase".
 *
 * @property int $id
 * @property string $name
 *
 * @property PhraseTranslate[] $phraseTranslates
 */
class Phrase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phrase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhraseTranslates()
    {
        return $this->hasMany(PhraseTranslate::className(), ['phrase_id' => 'id']);
    }
}
