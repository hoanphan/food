<?php

/**
 * Created by Navatech
 * @project sgl-com-vn
 * @author  Le Phuong
 * @email phuong17889@gmail.com
 * @time    4/24/2017 3:02 PM
 */
class BookingController {

	/**
	 * @api              {post} /booking/cleaning 2. Đặt lịch dọn dẹp
	 * @apiGroup         Booking
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/booking/cleaning
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_name Họ và tên của khách hàng
	 * @apiParam {string} customer_address Địa chỉ khách hàng
	 * @apiParam {string} customer_phone Điện thoại của khách hàng
	 * @apiParam {string} [customer_email=""] Email của khách hàng
	 * @apiParam {number} type Loại sản phẩm cần dọp dẹp (Lấy từ <a href="#api-Booking-GetBookingConfig">Booking.1</a>)
	 * @apiParam {string} serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30</b>
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Booking
	 * @apiSuccess {string} data.id Khóa chính của Booking
	 * @apiSuccess {string} data.customer_name Họ và tên của khách hàng
	 * @apiSuccess {string} data.customer_address Địa chỉ khách hàng
	 * @apiSuccess {string} data.customer_phone Điện thoại của khách hàng
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30:00</b>
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	function cleaning_100() {
	}

	/**
	 * @api              {post} /booking/maintenance 3. Đặt lịch bảo dưỡng
	 * @apiGroup         Booking
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/booking/maintenance
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_name Họ và tên của khách hàng
	 * @apiParam {string} customer_address Địa chỉ khách hàng
	 * @apiParam {string} customer_phone Điện thoại của khách hàng
	 * @apiParam {string} [customer_email=""] Email của khách hàng
	 * @apiParam {number} product Loại sản phẩm cần bảo trì (Lấy từ <a
	 *           href="#api-Booking-GetBookingConfig">Booking.1</a>)
	 * @apiParam {number} services Loại dịch vụ cần bảo trì (Lấy từ <a
	 *           href="#api-Booking-GetBookingConfig">Booking.1</a>)
	 * @apiParam {number} quantity Số lượng sản phẩm
	 * @apiParam {string} serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30</b>
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Booking
	 * @apiSuccess {string} data.id Khóa chính của Booking
	 * @apiSuccess {string} data.customer_name Họ và tên của khách hàng
	 * @apiSuccess {string} data.customer_address Địa chỉ khách hàng
	 * @apiSuccess {string} data.customer_phone Điện thoại của khách hàng
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30:00</b>
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	function maintenance_100() {
	}

	/**
	 * @api              {get} /booking/config 1. Cấu hình Đặt lịch
	 * @apiGroup         Booking
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/booking/config
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string=product_cleaning,product_maintenance,service} type Kiểu giá trị cần lấy
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng giá trị cần lấy
	 * @apiSuccess {string} data.key Tên giá trị
	 * @apiSuccess {string} data.description Chú thích
	 */
	function actionConfig_100() {
	}

	/**
	 * @api              {post} /booking/cleaning 2. Đặt lịch dọn dẹp
	 * @apiGroup         Booking
	 * @apiVersion       1.0.2
	 *
	 * @apiSampleRequest /api/booking/cleaning
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_name Họ và tên của khách hàng
	 * @apiParam {string} customer_phone Điện thoại của khách hàng
	 * @apiParam {string} [customer_address=""] Địa chỉ khách hàng
	 * @apiParam {string} [customer_email=""] Email của khách hàng
	 * @apiParam {number} area Diện tích
	 * @apiParam {number} type Loại sản phẩm cần dọp dẹp (Lấy từ <a href="#api-Booking-GetBookingConfig">Booking.1</a>)
	 * @apiParam {string} serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30</b>
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Booking
	 * @apiSuccess {string} data.id Khóa chính của Booking
	 * @apiSuccess {string} data.customer_name Họ và tên của khách hàng
	 * @apiSuccess {string} data.customer_address Địa chỉ khách hàng
	 * @apiSuccess {string} data.customer_phone Điện thoại của khách hàng
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30:00</b>
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	public function actionCleaning_101() {
	}

	/**
	 * @api              {post} /booking/maintenance 3. Đặt lịch bảo dưỡng
	 * @apiGroup         Booking
	 * @apiVersion       1.0.1
	 *
	 * @apiSampleRequest /api/booking/maintenance
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_name Họ và tên của khách hàng
	 * @apiParam {string} customer_phone Điện thoại của khách hàng
	 * @apiParam {string} [customer_address=""] Địa chỉ khách hàng
	 * @apiParam {string} [customer_email=""] Email của khách hàng
	 * @apiParam {string} [images=""] Hình ảnh
	 * @apiParam {string} note Nội dung, chú thích
	 * @apiParam {number} product Loại sản phẩm cần bảo trì (Lấy từ <a
	 *           href="#api-Booking-GetBookingConfig">Booking.1</a>)
	 * @apiParam {number} services Loại dịch vụ cần bảo trì (Lấy từ <a
	 *           href="#api-Booking-GetBookingConfig">Booking.1</a>)
	 * @apiParam {number} quantity Số lượng sản phẩm
	 * @apiParam {string} serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30</b>
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Booking
	 * @apiSuccess {string} data.id Khóa chính của Booking
	 * @apiSuccess {string} data.customer_name Họ và tên của khách hàng
	 * @apiSuccess {string} data.customer_address Địa chỉ khách hàng
	 * @apiSuccess {string} data.customer_phone Điện thoại của khách hàng
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.serve_at Thời gian cần phục vụ. Định dạng: <b>2017-05-20 16:30:00</b>
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	public function actionMaintenance_101() {
	}
}

class ContactController {

	/**
	 * @api              {post} /contact/create 1. Phản hồi
	 * @apiGroup         Contact
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/contact/create
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} name Tên khách hàng
	 * @apiParam {string} phone Số điện thoại khách hàng
	 * @apiParam {string} content Nội dung liên hệ
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng chứa đối tượng nhà đất
	 * @apiSuccess {string} data.message Giá trị trả về nếu 'ok' liên hệ thành công, nếu 'fail' liên hệ lỗi
	 *
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	public function actionCreate_100() {
	}
}

class LandController {

	/**
	 * @api              {get} /land/config 1. Cấu hình BDS
	 * @apiGroup         Land
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/land/config
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string=area,price} type Kiểu giá trị cần lấy
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {String[]} data Mảng chứa chuỗi giá trị
	 */
	function config_100() {
	}

	/**
	 * @api              {get} /land/config 1. Cấu hình BDS
	 * @apiGroup         Land
	 * @apiVersion       1.0.1
	 *
	 * @apiSampleRequest /api/land/config
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string=area,sell_price,rent_price} type Kiểu giá trị cần lấy
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {String[]} data Mảng chứa chuỗi giá trị
	 */
	function config_101() {
	}

	/**
	 * @api              {get} /land/detail 5. Chi tiết nhà đất
	 * @apiGroup         Land
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/land/detail
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {number} land_id Khóa chính nhà đất
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng chứa đối tượng nhà đất
	 * @apiSuccess {string} data.name Tiêu đề nhà đất
	 * @apiSuccess {string} data.image Ảnh đại diện
	 * @apiSuccess {string} data.items.price Khoảng giá
	 * @apiSuccess {string} data.items.area Diện tích
	 * @apiSuccess {string} data.items.address Địa chỉ
	 * @apiSuccess {Object[]} data.images Album ảnh
	 *
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	function detail_100() {
	}

	/**
	 * @api              {get} /land/config 1. Cấu hình BDS
	 * @apiGroup         Land
	 * @apiVersion       1.0.2
	 *
	 * @apiSampleRequest /api/land/config
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string=area,sell_price,rent_price} type Kiểu giá trị cần lấy
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng giá trị cần lấy
	 * @apiSuccess {string} data.key Tên giá trị
	 * @apiSuccess {string} data.description Chú thích
	 */
	public function actionConfig_102() {
	}

	/**
	 * @api              {get} /land/category 2. Loại nhà đất
	 * @apiGroup         Land
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/land/category
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string=rent,sell} type Loại giao dịch
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng chứa đối tượng Loại nhà đất
	 * @apiSuccess {number} data.id Khóa chính
	 * @apiSuccess {string} data.name Tên loại nhà đất
	 */
	public function actionCategory_100() {
	}
}

class LawyerController {

	/**
	 * @api              {get} /lawyer/config 1. Cấu hình luật sư
	 * @apiGroup         Lawyer
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/lawyer/config
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string=form,visa_type,invest_from,invest_type} type Kiểu giá trị cần lấy
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng giá trị cần lấy
	 * @apiSuccess {string} data.key Tên giá trị
	 * @apiSuccess {string} data.description Chú thích
	 */
	public function actionConfig_100() {
	}

	/**
	 * @api              {post} /lawyer/request 2. Yêu cầu luật sư
	 * @apiGroup         Lawyer
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/lawyer/request
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_name Họ và tên của khách hàng
	 * @apiParam {string} customer_phone Điện thoại của khách hàng
	 * @apiParam {string} [customer_address=""] Địa chỉ khách hàng
	 * @apiParam {string} [customer_email=""] Email của khách hàng
	 * @apiParam {number} type Loại dịch vụ (Lấy từ <a
	 *           href="#api-Lawyer-GetLawyerConfig">Lawyer.1</a>)
	 * @apiParam {number} visa_country Quốc tịch visa   (Lấy từ <a
	 *           href="#api-Quotation-GetQuotationCountry">Location.3</a>)
	 * @apiParam {number} visa_type Loại visa  (Lấy từ <a
	 *           href="#api-Lawyer-GetLawyerConfig">Lawyer.1</a>)
	 * @apiParam {number} invest_from Nguồn đầu tư  (Lấy từ <a
	 *           href="#api-Lawyer-GetLawyerConfig">Lawyer.1</a>)
	 * @apiParam {number} invest_type Ngành đầu tư  (Lấy từ <a
	 *           href="#api-Lawyer-GetLawyerConfig">Lawyer.1</a>)
	 * @apiParam {string} note Chú thích
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Exim
	 * @apiSuccess {string} data.id Khóa chính của Exim
	 * @apiSuccess {string} data.customer_name Họ và tên của khách hàng
	 * @apiSuccess {string} data.customer_address Địa chỉ khách hàng
	 * @apiSuccess {string} data.customer_phone Điện thoại của khách hàng
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	public function actionRequest_100() {
	}

	/**
	 * @api              {get} /location/district 2. Danh sách Quận Huyện
	 * @apiGroup         Location
	 * @apiVersion       1.0.1
	 *
	 * @apiSampleRequest /api/location/district
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {number} province_id Mã Tỉnh Thành phố
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng chứa đối tượng Quận huyện
	 * @apiSuccess {Number} data.id Khóa chính Quận huyện
	 * @apiSuccess {Number} data.province_id Khóa ngoại Tỉnh thành phố
	 * @apiSuccess {String} data.name Tên quận huyện
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	public function actionDistrict_101() {
	}
}

class LocationController {

	/**
	 * @api              {get} /location/district 2. Danh sách Quận Huyện
	 * @apiGroup         Location
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/location/district
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {number} province_id Mã Tỉnh Thành phố
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng chứa đối tượng Quận huyện
	 * @apiSuccess {Number} data.id Khóa chính Quận huyện
	 * @apiSuccess {String} data.name Tên quận huyện
	 *
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	function district_100() {
	}
}

class NotarizeController {

	/**
	 * @api              {post} /notarize/request 2. Công chứng
	 * @apiGroup         Notarize
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/notarize/request
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_name Họ và tên của khách hàng
	 * @apiParam {string} customer_phone Điện thoại của khách hàng
	 * @apiParam {string} [customer_address=""] Địa chỉ khách hàng
	 * @apiParam {string} [customer_email=""] Email của khách hàng
	 * @apiParam {number} document Tài liệu chuyên ngành  (Lấy từ <a
	 *           href="#api-Notarize-GetNotarizeConfigDocument">Notarize.1</a>)
	 * @apiParam {number=0,1} notarized Công chứng
	 * @apiParam {file} [file=""] Tệp đính kèm
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Exim
	 * @apiSuccess {string} data.id Khóa chính của Exim
	 * @apiSuccess {string} data.customer_name Họ và tên của khách hàng
	 * @apiSuccess {string} data.customer_address Địa chỉ khách hàng
	 * @apiSuccess {string} data.customer_phone Điện thoại của khách hàng
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	public function actionRequest_100() {
	}
}

class QuotationController {

	/**
	 * @api              {post} /quotation/exim 2. Yêu cầu báo giá XNK
	 * @apiGroup         Quotation
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/quotation/exim
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_email Email của khách hàng
	 * @apiParam {string} export_company Tên công ty xuất
	 * @apiParam {string} export_address Địa chỉ công ty xuất khẩu
	 * @apiParam {string} export_phone ĐT công ty xuất
	 * @apiParam {string} export_country Xuất khẩu từ nước nào (Lấy từ <a
	 *           href="#api-Location-GetLocationCountry">Location.3</a>)
	 * @apiParam {string} export_port Xuất khẩu tại cửa khẩu nào
	 * @apiParam {string} import_company Tên công ty nhập
	 * @apiParam {string} import_address Địa chỉ công ty nhập
	 * @apiParam {string} import_phone ĐT công ty nhập
	 * @apiParam {string} import_country Đất nước nhập nhẩu (Lấy từ <a
	 *           href="#api-Location-GetLocationCountry">Location.3</a>)
	 * @apiParam {string} import_port Cửa khẩu nhập
	 * @apiParam {string} item Hàng hóa, chủng loại, quy cách
	 * @apiParam {string} type Vận chuyển bằng đường nào (Lấy từ <a
	 *           href="#api-Quotation-GetQuotationEximType">Quotation.1</a>)
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Exim
	 * @apiSuccess {string} data.id Khóa chính của Exim
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.export_company Tên công ty xuất
	 * @apiSuccess {string} data.export_address Địa chỉ công ty xuất khẩu
	 * @apiSuccess {string} data.export_phone ĐT công ty xuất
	 * @apiSuccess {string} data.export_country Xuất khẩu từ nước nào
	 * @apiSuccess {string} data.export_port Xuất khẩu tại cửa khẩu nào
	 * @apiSuccess {string} data.import_company Tên công ty nhập
	 * @apiSuccess {string} data.import_address Địa chỉ công ty nhập
	 * @apiSuccess {string} data.import_phone ĐT công ty nhập
	 * @apiSuccess {string} data.import_country Đất nước nhập nhẩu
	 * @apiSuccess {string} data.import_port Cửa khẩu nhập
	 * @apiSuccess {string} data.item Hàng hóa, chủng loại, quy cách
	 * @apiSuccess {string} data.unit Đơn vị tính
	 * @apiSuccess {number} data.quantity Số lượng
	 * @apiSuccess {string} data.type Vận chuyển bằng đường nào
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	public function actionExim() {
	}
}

class TranslateController {

	/**
	 * @api              {get} /translate/config 1. Cấu hình Dịch thuật
	 * @apiGroup         Translate
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/translate/config
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string=form,language} type Kiểu giá trị cần lấy
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng giá trị cần lấy
	 * @apiSuccess {string} data.key Tên giá trị
	 * @apiSuccess {string} data.description Chú thích
	 */
	public function actionConfig_100() {
	}

	/**
	 * @api              {post} /translate/request 2. Phiên dịch
	 * @apiGroup         Translate
	 * @apiVersion       1.0.0
	 *
	 * @apiSampleRequest /api/translate/request
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 * @apiHeader {string} time Thời gian hiện tại <b>DateTime.Now.ToString("yyyyMMddHHmmss")</b>
	 * @apiHeader {string} token Mã hóa MD5 của <b>code & time</b>
	 *
	 * @apiParam {string} customer_name Họ và tên của khách hàng
	 * @apiParam {string} customer_phone Điện thoại của khách hàng
	 * @apiParam {string} [customer_address=""] Địa chỉ khách hàng
	 * @apiParam {string} [customer_email=""] Email của khách hàng
	 * @apiParam {number} type Loại phiên dịch  (Lấy từ <a
	 *           href="#api-Translate-GetTranslateConfig">Translate.1</a>)
	 * @apiParam {string} translation_from Dịch từ ngôn ngữ  (Lấy từ <a
	 *           href="#api-Translate-GetTranslateConfig">Translate.1</a>)
	 * @apiParam {string} translation_to Dịch sang ngôn ngữ  (Lấy từ <a
	 *           href="#api-Translate-GetTranslateConfig">Translate.1</a>)
	 * @apiParam {string} use_at Thời gian cần sử dụng. Định dạng: <b>2017-05-20 16:30</b>
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng Exim
	 * @apiSuccess {string} data.id Khóa chính của Exim
	 * @apiSuccess {string} data.customer_name Họ và tên của khách hàng
	 * @apiSuccess {string} data.customer_address Địa chỉ khách hàng
	 * @apiSuccess {string} data.customer_phone Điện thoại của khách hàng
	 * @apiSuccess {string} data.customer_email Email của khách hàng
	 * @apiSuccess {string} data.created_at Thời gian tạo. Định dạng: <b>2017-05-20 16:30:00</b>
	 */
	public function actionRequest_100() {
	}
}