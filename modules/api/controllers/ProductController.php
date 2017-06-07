<?php
/**
 * Created by Navatech
 * @project sgl-com-vn
 * @author  Le Phuong
 * @email phuong17889@gmail.com
 * @time    4/14/2017 11:48 AM
 */
namespace app\modules\api\controllers;


use app\models\GalleyProduct;
use app\models\Product;
use app\modules\api\components\ApiController;

class ProductController extends ApiController {

	/**
	 * {@inheritDoc}
	 */
	public static function responseCode() {
		return [
			- 1 => 'MISSING PARAMETER',
			0   => 'OK',
			1   => 'NOT FOUND',
		];
	}

	/**
	 * @api              {get} /product/list 1. Danh sách sản phẩm theo danh mục
	 * @apiGroup         Product
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/product/list
	 * @apiParam {number} id_category Khóa ngoại mã loại danh mục (Lấy từ <a
	 *           href="#api-Company-GetListCategory">Category.1</a>)
	 * @apiParam {number} [offset=0] Vị trí lấy dữ liệu
	 * @apiParam {number} [limit=10] Giới hạn 1 trang
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data.items Mảng chứa đối tượng
	 * @apiSuccess {Object[]} data.items Mảng chứa các đối tượng sản phẩm
	 * @apiSuccess {number} data.items.id Khóa chính
	 * @apiSuccess {string} data.items.name Tên sản phẩm
	 * @apiSuccess {number} data.items.rate Đánh giá của sản phẩm từ khách hàng (Tình bằng sao)
	 * @apiSuccess {string} data.items.url Đường dẫn ảnh của sản phẩm
	 * @apiSuccess {number} data.items.price Giá của sản phẩm
	 * @apiSuccess {string} data.items.sale  Giảm giá (%)
	 *
	 *
	 *
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	public function actionList() {
		$response['code'] = 0;
		$id_category      = $this->getBodyValue('id_category', true);
		$offset           = (int) $this->getBodyValue('offset', false, 0);
		$limit            = (int) $this->getBodyValue('limit', false, 10);
		$products = Product::find()->where(['status' => Product::PUBLISH,'id_category'=>$id_category])->limit($limit)->offset($offset)->all();
		/**@var  Product[] $products*/
		if ($products != null) {
			foreach ($products as $item) {
				$response['data'][] = [
					'id'   => $item->id,
					'name' => $item->getTranslateAttribute('name'),
					//'rate'=>$item->rate,
					'url'=>$item->getPictureUrl('image'),
					'price'=>$item->price,
					'sale'=>$item->sale
				];
			}
		} else {
			$response['code'] = 1;
		}
		$this->response(200, $response);
	}

	/**
	 * @api              {get} /product/detail 2. Chi tiết sản phẩm
	 * @apiGroup         Product
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/product/detail
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 *
	 * @apiParam {number} id_product Mã sản phẩm
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Đối tượng chi tiết sản phẩm

	 * @apiSuccess {string} data.name Tên sản phẩm
	 * @apiSuccess {number} data.rate Đánh giá của sản phẩm từ khách hàng (Tình bằng sao)
	 * @apiSuccess {string} data.url Đường dẫn ảnh của sản phẩm
	 * @apiSuccess {number} data.price Giá của sản phẩm
	 * @apiSuccess {string} data.sale  Giảm giá (%)
	 * @apiSuccess {array[]} data.images  Thư viện đường dẫn ảnh của sản phẩm
	* @apiSuccess {string} data.title  Tiêu đề cảu sản phẩm
	 * @apiSuccess {array[]} data.content Nội dung giới thiệu
	 *
	 *
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	public function actionProducts() {
		$response['code'] = 0;
		$id_product      = $this->getBodyValue('id_product', true);
		$product     = Product::findOne($id_product);
		if ($product !== null) {
			if($product->status==Product::PUBLISH) {
			        /**@var  GalleyProduct[] $galley**/
					$galley=GalleyProduct::find()->where(['product_id'=>$id_product])->all();
					$imgs=array();
					foreach ($galley as $item)
					{
						$imgs[]=$item->url;
					}
					$response['data'] = [

						'name'  => $product->getTranslateAttribute('name'),
						//'rate'  => $product->rate,
						'url'   => $product->getPictureUrl('image'),
						'price' => $product->price,
						'sale'  => $product->sale,
						'images'=>$imgs,
						'title'=>$product->getTranslateAttribute('title'),
						'content'=>$product->getTranslateAttribute('content')

					];

			}
		} else {
			$response['code'] = 1;
		}
		$this->response(200, $response);
	}
}