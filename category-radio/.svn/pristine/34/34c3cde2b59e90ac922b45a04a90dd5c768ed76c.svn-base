<?php
/**
 * @package Category Radio
 * @version 1.0
 */
/*
Plugin Name: Category Radio
Plugin URI: https://wordpress.org/plugins/category-radio/
Description: WordPress管理画面においてカテゴリーをチェックボックスからラジオボタンに変更させるだけのプラグイン
Author: Harigae
Version: 1.0
Author URI:
*/

function category_radio() {
echo '<script type="text/javascript">
  //<![CDATA[
  jQuery(document).ready(function($){
    $(".categorychecklist input[type=checkbox]").each(function(){
      $check = $(this);
      var checked = $check.attr("checked") ? \' checked="checked"\' : \'\';
      $(\'<input type="radio" id="\' + $check.attr("id")
        + \'" name="\' + $check.attr("name") + \'"\'
  	+ checked
	+ \' value="\' + $check.val()
	+ \'"/>\'
      ).insertBefore($check);
      $check.remove();
    });
  });
  //]]>
  </script>';
}
add_action('admin_print_footer_scripts', 'category_radio', 21);

?>
