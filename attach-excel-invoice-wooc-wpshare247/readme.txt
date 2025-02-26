=== Plugin Name ===
Contributors: wpshare247, website366
Donate link: https://paypal.me/auvuonle/5
Tags: woocommerce, invoice, order, email
Requires at least: 4.9
Tested up to: 5.5.3
Requires PHP: 5.6
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
Cho phép tạo file excel có nội dung hóa đơn gửi đính kèm khi gửi email đặt hàng, tải file hóa đơn, zip nhiều file hóa đơn, xuất tất cả các hóa đơn.

== Description ==

Cho phép tạo file excel có nội dung hóa đơn gửi đính kèm khi gửi email đặt hàng, tải file hóa đơn, zip nhiều file hóa đơn, xuất tất cả các hóa đơn.

**Tính năng nổi bật**

* Xuất đơn hàng thành file excel, sau đó đính kèm vào email sau khi đặt hàng thành công
* Tạo file excel hóa đơn từ 1 đơn hàng bất kì trong danh sách đơn hàng
* Tạo file excel hóa đơn cùng lúc nhiều hóa đơn, nén thành file zip
* Xuất thông tin danh sách đơn hàng thành file excel
* Có cấu hình đặt tên file


**Tính năng nổi bật bản Pro (Pro Version)**

* Có đính kèm thêm logo vào hóa đơn excel
* Nội dung file excel được thiết kế chuẩn đẹp
* Có thể chỉnh màu nền, màu viền, màu chữ, kiểu viền kẽ trong file excel
* Có nhiều template để chọn lựa

**Gọi hàm trong theme ( functions.php hoặc bất cứ template nào: header.php, footer.php...)**

- **Tạo 1 file excel từ đơn hàng id**
`
$order_id = 50;
$save_dir = ''; // đường dẫn chứa file, nếu rỗng thì file sẽ được lưu vào đường dẫn mặc định
$excel_file_path = wpshare247_aeiwooc_create_invoice_file_by_order_id( $order_id, $save_dir );
`

- **Xuất tất cả đơn hàng thành danh sách trong file excel**
`
$order_ids = array(50, 80, 90);
$save_dir = ''; // đường dẫn chứa file, nếu rỗng thì file sẽ được lưu vào đường dẫn mặc định
$excel_file_path = wpshare247_aeiwooc_export_excel_file($order_ids, $save_dir)
`

- **Tạo nhiều file excel cùng lúc từ các đơn hàng sau đó nén thành file zip**
`
$arr_order_id = array(50, 80, 90);
$zip_file_path = wpshare247_aeiwooc_create_zip_file_from_order_ids($arr_order_id);
`

- **Ghi chú:**
`$save_dir mặc định là: wp-content\uploads\wpshare247_aeiwooc_woocommerce_invoices`
Xem thêm tại: `plugins\attach-excel-invoice-wooc-wpshare247\inc\theme_functions.php`

== Installation ==

1. Tải thư mục `wpshare247-attachement-order-excel` vào đường dẫn `/wp-content/plugins/`
2. Kích hoạt từ menu **Plugins** (**Plugins > Installed Plugins**).

Tìm **Cấu hình AEIWOOC** menu trong WooCommerce.

== Screenshots ==

1. screenshot-1.png
2. screenshot-2.png
3. screenshot-3.png
4. screenshot-4.png
5. screenshot-5.png
6. screenshot-6.png

== Changelog ==

= 1.0 =

* Xuất bản plugin

= 1.1 =

* Chỉnh sửa file readme

**Fixed một vài thứ**

* Thêm: Một số key dịch
* Fix: Đường dẫn cấu hình plugin
* Bổ sung: thêm một số cột trong file excel trong danh sách đơn hàng

== Upgrade Notice ==

