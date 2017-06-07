<?php

namespace app\models;

use app\components\Model;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "galley_product".
 *
 * @property int $id
 * @property int $product_id
 * @property string $url
 */
class GalleyProduct extends Model
{
    /**
     * @inheritdoc
     */
    public $img;
    public static function tableName()
    {
        return 'galley_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [
                [
                    'img',
                ],
                'file',
                'extensions' => 'jpg, gif, png',
                'maxFiles'   => 20,
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
            'product_id' => 'Product ID',
            'url' => 'Url',
        ];
    }
    /**
     * @param null $land_id
     *
     * @return array
     */
    public static function initialPreviewConfig($id_product = null) {
        if ($id_product != null) {
            /**@var GalleyProduct[] $pictures */
            $pictures = GalleyProduct::find()->where(['product_id' => $id_product])->all();
            $array    = [];
            $i        = 0;
            foreach ($pictures as $picture) {
                $array [$i] = [
                    'url' => Yii::$app->urlManager->baseUrl."/product/delete-img?id=" . $picture->id,
                    'key' => $picture->id,
                ];
                $i ++;
            }
            return $array;
        } else {
            return [];
        }
    }

    /**
     * Process upload of image
     * @return bool|UploadedFile[]
     */
    public function uploadPictures() {
        $img = UploadedFile::getInstances($this, 'img');
        if (empty($img)) {
            return false;
        }
        $dir = Yii::getAlias('@app/web') . '/uploads/' . $this->tableName() . '/';
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
        return $img;
    }
}
