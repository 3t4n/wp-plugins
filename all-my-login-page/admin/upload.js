$j = jQuery.noConflict();
$j(document).ready(function() {

$j('#all_my_upload_image1').click(function() {

tb_show('Upload a Image', 'media-upload.php?referer=media_page&type=image&TB_iframe=true&post_id=0', false);
window.send_to_editor = function(html) {
var image_url1 = $j('img', html).attr('src');
$j('#all_my_image_path1').val(image_url1);
$j('#all_my_remove_image1').show();
$j("#all_my_img_path_1").attr('src',image_url1);
tb_remove(); 
}
return false;
});

$j('#all_my_upload_image2').click(function() {

tb_show('Upload a Image', 'media-upload.php?referer=media_page&type=image&TB_iframe=true&post_id=0', false);
window.send_to_editor = function(html) {
var image_url2 = $j('img', html).attr('src');
$j('#all_my_image_path2').val(image_url2);
$j('#all_my_remove_image2').show();
$j("#all_my_img_path_2").attr('src',image_url2);
tb_remove();
}
return false;
});

});