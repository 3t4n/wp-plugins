<?php
/**
* Plugin Name: Arabic Symbols
* Description: Add Arabic Symbols, symbols and signs in quran, and special characters and numbers to the TinyMCE Editor of wordpress.
* Plugin URI: 
* Version: 1.0.2
* Author: Bonah Net
* Author URI: http://bonah.net
* License: GPL2
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
* INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
* PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
* HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
* CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE 
* OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*
* Text Domain: basbonah-arabic-symbols
*/

add_action( 'plugins_loaded', 'basbonah_textdomain' );
/**
 * load text domain
 */
function basbonah_textdomain() {
	load_plugin_textdomain( 'basbonah-arabic-symbols' );
}

add_filter( 'tiny_mce_before_init', 'basbonah_clearmap_tinymce_init' );
/**
 * add new characters to end of charmap
 */
function basbonah_clearmap_tinymce_init( $settings ) {
	$remove_chars = json_encode( array() );
	$settings['charmap'] = $remove_chars;

	return $settings;
}

// add Arabic Symbols buttons
add_filter( 'tiny_mce_before_init', 'basbonah_arabicchar_tinymce_init' );
/**
 * add new characters to end of charmap
 */
function basbonah_arabicchar_tinymce_init( $settings ) {
	$new_chars = json_encode( array(
		array( '65010', 'لفظ الجلالة الله' ),
		array( '65019', 'جل جلاله' ),
		array( '65012', 'محمد' ),
		array( '65018', 'صلى الله عليه وسلم' ),
		array( '1553', 'عليه السلام' ),
		array( '1554', 'رحمة الله عليه' ),
		array( '1555', 'رضي الله عنه' ),
		array( '1611', 'فتحتان - تنوين' ),
		array( '1612', 'ضمتان - تنوين' ),
		array( '1613', 'كسرتان - تنوين' ),
		array( '1614', 'فتحة' ),
		array( '1615', 'ضمة' ),
		array( '1616', 'كسرة' ),
		array( '1617', 'شدّة' ),
		array( '1618', 'سكون' ),
		array( '1619', 'مَدة علوية' ),
		array( '1620', 'همزة علوية' ),
		array( '1621', 'همزة سفلية' ),
		array( '1648', 'ألف تشكيل علوية' ),
		array( '1670', 'جيم تعطيش' ),
		array( '1700', 'فاء تعطيش VEH' ),
		array( '1662', 'باء تعطيش' ),
		array( '1748', 'نقطة وقف' ),
		array( '1749', 'ARABIC LETTER AE' ),
		array( '1750', 'صلي' ),
		array( '1751', 'قلي' ),
		array( '1752', 'ميم لزوم الوقف' ),
		array( '1753', 'لا النهي عن الوقف' ),
		array( '1754', 'جيم جواز الوقف' ),
		array( '1755', '(النقط المثلثة): تفيد جواز الوقف بأحد الموضعين' ),
		array( '1756', 'س وجوب النطق بالسين' ),
		array( '1757', 'نهاية آية' ),
		array( '1758', 'بداية ربع حزب' ),
		array( '1759', 'نقطة صغيرة - زيادة الحرف وعدم النطق حين الوصل' ),
		array( '1760', 'مربع الإشمام' ),
		array( '1649', 'ألف وصلة' ),
		array( '1622', 'ألف سفلية' ),
		array( '1623', 'ضمة مقلوبة' ),
		array( '1624', 'نون غُنة' ),
		array( '1628', 'نقطة سفلية' ),
		array( '1629', 'ضمة معكوسة' ),
		array( '64830', 'نهاية قرآن' ),
		array( '64831', 'بداية قرآن' ),
		array( '1761', 'خاء غير منقوطة علوية' ),
		array( '1762', 'ميم علوية معزولة' ),
		array( '1763', 'سين النطق بالصاد' ),
		array( '1764', 'المد' ),
		array( '1765', 'واو صغيرة - وجوب النُّطق' ),
		array( '1766', 'ياء صغيرة - وجوب النُّطق' ),
		array( '1767', 'ياء صغيرة علوية - وجوب النُّطق' ),
		array( '1768', 'نون صغيرة - وجوب النُّطق' ),
		array( '1769', 'موضع سجدة' ),
		array( '1770', 'نقطة سكون علوية' ),
		array( '1771', 'نقطة يكون سفلية' ),
		array( '1772', 'نقطة تسهيل علوية' ),
		array( '1773', 'ميم صغيرة سفلية' ),
		array( '2303', 'غُنة جانبية' ),
		array( '1600', 'تطويل - ربط بين الحروف' ),
		array( '1537', 'سنة' ),
		array( '1538', 'علامة ملاحظة ذيل الصفحة' ),
		array( '1539', 'علامة صفحة' ),
		array( '1550', 'علامة بيت الشعر' ),
		array( '1551', 'عين' ),
		array( '1557', 'طاء صغيرة علوية' ),
		array( '1558', 'إلى صغيرة علوية' ),
		array( '65139', 'ذيل' ),
		array( '1631', 'همزة مموجة' ),
		array( '2289', 'ضمتان مفتوحتان' ),
		array( '1541', 'علامة ترقيم علوية' ),
		array( '2225', 'واو واقفة' ),
		array( '1548', 'فاصلة' ),
		array( '1563', 'فاصلة منقوطة' ),
		array( '1632', 'صفر' ),
		array( '1633', 'واحد' ),
		array( '1634', 'أثنان' ),
		array( '1635', 'ثلاث' ),
		array( '1636', 'أربع' ),
		array( '1637', 'خمس' ),
		array( '1638', 'ستة' ),
		array( '1639', 'سبعة' ),
		array( '1640', 'ثمانية' ),
		array( '1641', 'تسعة' ),
		array( '1536', 'علامة ترقيم' ),
		array( '1643', 'فاصلة عشرية' ),
		array( '1644', 'فاصلة ألفية' ),
		array( '1645', 'نجمة خماسية' ),
		array( '1642', 'نسبة مئوية' ),
		array( '1545', 'نسبة ألفية' ),
		array( '1546', 'نسبة لكل شعر ألاف' ),
		array( '1541', 'جزر تربيعي' ),
		array( '1542', 'جزر تكعيبي' ),
		array( '1543', 'جزر رباعي' ),
		array( '8592', 'LEFTWARDS ARROW' ),
		array( '8593', 'UPWARDS ARROW' ),
		array( '8594', 'RIGHTWARDS ARROW' ),
		array( '8595', 'DOWNWARDS ARROW' ),
		array( '8596', 'LEFT RIGHT ARROW' ),
		array( '8656', 'LEFTWARDS DOUBLE ARROW' ),
		array( '8657', 'UPWARDS DOUBLE ARROW' ),
		array( '8658', 'RIGHTWARDS DOUBLE ARROW' ),
		array( '8659', 'DOWNWARDS DOUBLE ARROW' ),
		array( '8262', 'RIGHT SQUARE BRACKET WITH QUILL' ),
		array( '8261', 'LEFT SQUARE BRACKET WITH QUILL' ),
		array( '9989', 'WHITE HEAVY CHECK MARK' ),
		array( '9990', 'TELEPHONE LOCATION SIGN' ),
		array( '10004', 'HEAVY CHECK MARK' ),
		array( '10006', 'HEAVY MULTIPLICATION X' ),
		array( '10008', 'HEAVY BALLOT X' ),
		array( '65021', 'بسم الله الرحمن الرحيم' ),
	) );
	$settings['charmap_append'] = $new_chars;

	return $settings;
}
