<?php
/**
 * Created by Navatech
 * @project sgl-com-vn
 * @author  Le Phuong
 * @email phuong17889@gmail.com
 * @time    4/14/2017 11:48 AM
 */
namespace app\modules\api\controllers;

use app\helpers\StringHelper;
use app\models\CenterArea;
use app\models\Company;
use app\models\Distributor;
use app\models\IndustrialZone;
use app\models\Product;
use app\models\Province;
use app\modules\api\components\ApiController;

class DistributorController extends ApiController {

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
	 * @api              {get} /distributor/list 1. Danh sách nhà cung cấp
	 * @apiGroup         Distributor
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/distributor/list
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng chứa đối tượng Nhà cung cấp
	 * @apiSuccess {number} data.id Khóa chính
	 * @apiSuccess {string} data.name Nhà cung cấp
	 */
	public function actionList() {
		$response['code'] = 0;
		/***@var Distributor[] $distributors * */
		$distributors = Distributor::find()->where(['status' => Distributor::PUBLISH])->all();
		if ($distributors != null) {
			foreach ($distributors as $distributor) {
				$response['data'][] = [
					'id'   => $distributor->id,
					'name' => $distributor->getTranslateAttribute('name'),
				];
			}
		} else {
			$response['code'] = 1;
		}
		$this->response(200, $response);
	}

	/**
	 * @api              {get} /distributor/products 2. Danh sách sản phẩm do đơn vị cung cấp
	 * @apiGroup         Distributor
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/distributor/products
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 *
	 * @apiParam {number} id_distributor Khóa ngoại mã nhà cung cấp (Lấy từ <a
	 *           href="#api-Company-GetListDistributtor">Distributor.1</a>)
	 * @apiParam {number} id_category Khóa ngoại mã loại danh mục (Lấy từ <a
	 *           href="#api-Company-GetListCategory">Category.1</a>)
	 * @apiParam {number} [offset=0] Vị trí lấy dữ liệu
	 * @apiParam {number} [limit=10] Giới hạn 1 trang
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng chứa đối tượng
	 * @apiSuccess {Object[]} data.items Mảng chứa các đối tượng sản phẩm
	 * @apiSuccess {number} data.items.id Khóa chính
	 * @apiSuccess {string} data.items.name Tên sản phẩm
	 * @apiSuccess {number} data.items.rate Đánh giá của sản phẩm từ khách hàng (Tình bằng sao)
	 * @apiSuccess {string} data.items.url Đường dẫn ảnh của sản phẩm
	 * @apiSuccess {number} data.items.price Giá của sản phẩm
	 * @apiSuccess {string} data.items.sale  Giảm giá (%)
	 *
	 *
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	public function actionProducts() {
		$response['code'] = 0;
		$id_category      = $this->getBodyValue('id_category', true);
		$id_distributor   = $this->getBodyValue('id_distributor', true);
		$offset           = (int) $this->getBodyValue('offset', false, 0);
		$limit            = (int) $this->getBodyValue('limit', false, 10);
		$list_product     = Product::find()->where([
			'id_category' => $id_category,
			'distributor' => $id_distributor,
		])->limit($limit)->offset($offset)->all();
		/**@var  Product[] $list_product**/
		if ($list_product !== null) {
			foreach ($list_product as $item) {
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
}