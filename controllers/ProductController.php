<?php

namespace app\controllers;

use app\models\GalleyProduct;
use DateTime;
use Yii;
use app\models\Product;
use app\models\searchs\ProductSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
	        'access' => [
		        'class' => AccessControl::className(),
		        'rules' => [
			        [
				        'actions' => ['index', 'create','update','delete'],
				        'allow' => true,
				        'roles' => ['@'],
			        ],
		        ],
	        ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model  = new Product();
        $galley = new GalleyProduct();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $img = $model->uploadPicture('imager');

            if ($model->save()) {

                if ($img != false) {
                    $ext          = $img->getExtension();
                    $model->imager=$model->id . '_image' . ".{$ext}";
                    $model->save();
                    $path  = Yii::getAlias('@app/web') . '/uploads/' . $model->tableName() . '/'.$model->imager;
                    $img->saveAs($path);

                }
            }
            $gallery_img = $galley->uploadPictures();
            if ($gallery_img != null) {
                foreach ($gallery_img as $item) {
                    $gallery          = new GalleyProduct();
                    $gallery->product_id = $model->getPrimaryKey();
                    $gallery->save();
                    $ext          = $item->getExtension();
                    $gallery->url = $gallery->getPrimaryKey() . '_image' . ".{$ext}";
                    $gallery->save();
                    if ($item != false) {
                        $path = $gallery->getPictureFile('url');
                        $item->saveAs($path);
                    }
                }
            }
            return $this->redirect([
                'index',
            ]);
        } else {
            return $this->render('create', [
                'model'  => $model,
                'galley' => $galley,
            ]);
        }
    }


    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model                     = $this->findModel($id);
        $galley                    = new GalleyProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $img                       = $model->uploadPicture('imager');
            if ($model->save()) {
                if ($img != false) {
                    $path = $model->getPictureFile('imager');
                    clearstatcache();
                    if (file_exists($path)) {
                        unlink($path);
                    }
                    $img->saveAs($path);
                }
                else
                {
                    $model->imager="";
                }
            }

            if ($model->save()) {
                $gallery_img = $galley->uploadPictures();
                if ($gallery_img != null) {
                    foreach ($gallery_img as $item) {
                        $gallery             = new GalleyProduct();
                        $gallery->product_id = $model->getPrimaryKey();
                        $gallery->save();
                        $ext          = $item->getExtension();
                        $gallery->url = $gallery->id . '_image' . ".{$ext}";
                        $gallery->save();
                        if ($item != false) {
                            $path = $gallery->getPictureFile('url');
                            $item->saveAs($path);
                        }
                    }
                }
            }
            return $this->redirect([
                'index',
            ]);
        }
        return $this->render('update', [
            'model'  => $model,
            'galley' => $galley,
        ]);
    }


    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOneTranslated($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * @param $id
     *
     * @return bool
     */
    public function actionDeleteImg($id) {
        $img = GalleyProduct::findOne($id);
        $img->delete();
        return true;
    }
}
