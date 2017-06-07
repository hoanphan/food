<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $code
 * @property string $name
 * @property string $desc
 * @property string $type
 * @property string $store_range
 * @property string $store_dir
 * @property string $value
 * @property int $sort_order
 * @property string $store_url
 * @property string $icon
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order'], 'integer'],
            [['code', 'type'], 'required'],
            [['desc', 'store_range', 'value'], 'string'],
            [['code'], 'string', 'max' => 32],
            [['name', 'type', 'store_dir', 'store_url', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'code' => 'Code',
            'name' => 'Name',
            'desc' => 'Desc',
            'type' => 'Type',
            'store_range' => 'Store Range',
            'store_dir' => 'Store Dir',
            'value' => 'Value',
            'sort_order' => 'Sort Order',
            'store_url' => 'Store Url',
            'icon' => 'Icon',
        ];
    }
}
