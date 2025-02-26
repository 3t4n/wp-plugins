<?php
/*
Plugin Name: Author Guide
Plugin URI: https://wordpress.org/plugins/author-guide/
Description: Страница для авторов с инструкцией по публикации материалов на сайте.
Version: 1.0
Author: Banochkin.com
Author URI: https://banochkin.com
 */

function ag_menu_guide_page() {
  add_menu_page(
    'Инструкция по публикации материалов',
    'Как писать',
    'publish_posts',
    'author-guide' ,
    'ag_page_guide_author',
    'dashicons-info',
    2
  );
}
add_action('admin_menu', 'ag_menu_guide_page');

function ag_page_guide_author(){
  ?>
<div class='wrap'>
  <h2>Инструкции по публикации материалов</h2>
  <?php echo get_option('ag_guide_content', '<p>Страница не заполнена! Для этого перейдите на <a href="/wp-admin/options-general.php?page=author-guide-settings">страницу настроек плагина</a>.</p>'); ?>
</div>
  <?php
}
 
function ag_menu_guide_settings(){
  add_submenu_page(
    'options-general.php',
    'Правка инструкции по публикации материалов',
    'Author Guide',
    'manage_options',
    'author-guide-settings',
    'ag_page_guide_settings'
  );
}
add_action('admin_menu', 'ag_menu_guide_settings');

function ag_page_guide_settings(){
?>
<div class='wrap'>
  <h2>Редактировать инструкцию по публикации материалов</h2>
    <form method='post'>
      <?php
        wp_nonce_field('ag_guide_settings_action', 'ag_guide_settings_field');
        $content = get_option('ag_guide_content');
        wp_editor( $content, 'ag_guide_content' );
        submit_button('Сохранить', 'primary');
     ?>
   </form>
  </div>
<?php
}

function ag_save_guide_settings(){
  if( isset($_POST['ag_guide_settings_field']) && check_admin_referer('ag_guide_settings_action', 'ag_guide_settings_field')){
   if(isset($_POST['ag_guide_content'])){
    $guide_content = wp_filter_post_kses($_POST['ag_guide_content']);
    update_option('ag_guide_content', $guide_content);
   }
  }
}
add_action('admin_init', 'ag_save_guide_settings', 10);

?>