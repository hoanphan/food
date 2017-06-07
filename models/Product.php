<?php

namespace app\models;

use app\components\Model;
use navatech\language\Translate;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property int $distributor_id
 * @property string $created_at
 * @property string $imager
 * @property double $price
 * @property int $status
 * @property int $serial
 * @property int $prioritize
 * @property int $sale
 *
 * @property ProductTranslate[] $productTranslates
 */
class Product extends Model
{
    public $picture;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }
    public function behaviors($attributes = null) {
        $attributes = [
            'name',
            'title',
            'content'
        ];
        $behaviors  = parent::behaviors($attributes);
        return $behaviors;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'distributor_id'], 'required'],
            [['category_id', 'distributor_id', 'status', 'serial', 'prioritize', 'sale'], 'integer'],
            [['created_at'], 'safe'],
            [
                [
                    'name',
                    'name_' . Yii::$app->language,
                    'title',
                    'title_'.Yii::$app->language,
                    'content',
                    'content_'.Yii::$app->language
                ],
                'safe',
            ],
            [['price'], 'number'],
            [['imager'], 'string', 'max' => 255],
            [['distributor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distributor::className(), 'targetAttribute' => ['distributor_id' => 'id']],
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
            'category_id' => Translate::name_category(),
            'distributor_id' => Translate::name_distributor(),
            'created_at' => Translate::create(),
            'imager' => Translate::imager(),
            'price' => Translate::price(),
            'status' => Translate::status(),
            'serial' => Translate::serial(),
            'prioritize' => Translate::prioritize(),
            'sale' => Translate::sale(),
            'name'=>Translate::name_product(),
            'title'=>Translate::title(),
            'content'=>Translate::content()
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTranslates()
    {
        return $this->hasMany(ProductTranslate::className(), ['product_id' => 'id']);
    }
    public function uploadPicture($picture = '') {
        $img = UploadedFile::getInstance($this, 'picture');
        if (empty($img)) {
            return false;
        }
        $dir = Yii::getAlias('@app/web') . '/uploads/' . $this->tableName() . '/';
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
        $this->$picture = $this->getPrimaryKey() . '_image' . ".png";
        return $img;
    }
    public function getPictureUrl1($picture = '') {
        Yii::$app->params['uploadUrl'] = Url::home(true) . 'uploads/galley_product/';
        $arr=[];
        $list=GalleyProduct::find()->where(['product_id'=>$this->id])->all();
        foreach ($list as  $item) {
            $image = !empty($item->url) ? $item->url : Yii::$app->urlManager->baseUrl . '/uploads/no_image_thumb.gif';
            clearstatcache();
            if (is_file(Yii::getAlias("@app/web") . '/uploads/galley_product/' . $image)) {
                $arr= array_merge($arr,[ Yii::$app->params['uploadUrl'] . $image]);
            } else {
                $arr= array_merge($arr,[ Url::home(true) . 'uploads/no_image_thumb.gif']);
            }
        }
        return $arr;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributor()
    {
        return $this->hasOne(Distributor::className(), ['id' => 'distributor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public static function getListDistributor()
    {
        $list=Distributor::find()->where(['status'=>Distributor::PUBLISH])->all();
        $arr=array();
        foreach ($list as $item)
        {
            $arr[]=['id'=>$item->id,'name'=>$item->name];
        }
        return ArrayHelper::map($arr,'id','name');
    }
    public static function getListCategory()
    {
        $list=Category::find()->where(['status'=>Category::PUBLISH])->all();
        $arr=array();
        foreach ($list as $item)
        {
            $arr[]=['id'=>$item->id,'name'=>$item->name];
        }
        return ArrayHelper::map($arr,'id','name');
    }


}
