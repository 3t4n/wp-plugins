<?php 
defined('ABSPATH') or die('No script kiddies please!');
    if(!current_user_can('manage_options')){echo 'You can not manage options!';return;}	
	wp_enqueue_style( 'style404' ,plugins_url("/style-admin.css", __FILE__));
	global $is_update404;
	$is_update404 = 0;
	if ( !empty($_POST) && check_admin_referer('manage_opt404tboc','manage_opt404tboc_field') )//chek nonce 
     {
	$_POST = wp_unslash($_POST) ;
	
	if(isset( $_POST['text-button-main404'] )){
		
	 if(sanitize_text_field($_POST['is-page-404']) == '1'){update_option('is-page-404tboc','1');}else{update_option('is-page-404tboc','0');}
	 
	 if(sanitize_text_field($_POST['is-text-button-restart404']) == '1'){update_option('is-text-button-restart404tboc','1');}else{update_option('is-text-button-restart404tboc','0');}
	
	 if(sanitize_text_field($_POST['is-text-support404']) == '1'){update_option('is-text-support404tboc','1');}else{update_option('is-text-support404tboc','0');}
	
	$page_idtboc = sanitize_text_field($_POST['page_id']);
		if(intval($page_idtboc)){
		update_option('page-404tboc',$page_idtboc);
		}
	
		update_option('text-button-main404tboc',sanitize_text_field($_POST['text-button-main404']));
		update_option('text-button-continue404tboc',sanitize_text_field($_POST['text-button-continue404']));
		update_option('text-button-restart404tboc',sanitize_text_field($_POST['text-button-restart404']));
		$is_update404 = 1;
	}
		if(isset( $_POST['startText'] )){ //обновляем стартовый текст 
			update_option('startText404tboc',$_POST['startText']);
			$is_update404 = 1;
		}
     }
?>

<h1> <?php _e('Settings page 404 The Book of Changes','wp-404tboc-page') ?></h1>

<?php 
//var_dump(get_option('is-page-404tboc'));
//var_dump($_POST);
function ilc_admin_tabs404tboc( $current = 'General' ) {
	global $is_update404;
    $tabs = array( 'General' => __('Main settings','wp-404tboc-page'), 'startText' =>  __('Start text','wp-404tboc-page'),  'skins' => __('Skins','wp-404tboc-page') );
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=options_404tboc&tab=$tab'>$name</a>";

    }
    echo '</h2>';
	switch($current){
		case 'skins' : include(__DIR__."/skinsAdmin404.php");   break;
		
		case 'General' : ?>
<p> 
<form action="" method=post enctype=multipart/form-data>
 <?php wp_nonce_field('manage_opt404tboc','manage_opt404tboc_field'); ?>
<table class="wp-list-table widefat fixed striped" ><tbody>
<tr>
<td><span  class="ask404" title="<?php _e('If the checkbox is active, the page 404 is replaced. Otherwise, no.','wp-404tboc-page'); ?>"><?php _e('Replace page 404 plugins page?','wp-404tboc-page'); ?></span></td>
<td><input name="is-page-404" id="is-page-404" type="checkbox" onclick="disp_askSTR404();"  value="1" <?php if(get_option('is-page-404tboc') =='1') echo 'checked';?>></td>
</tr>
<tr id="page-id" style="<?php if(get_option('is-page-404tboc') !='1')echo "display: none"  ?>">
<td> <span  class="ask404" title="<?php _e('A page with shortcode [page404tboc] was created automatically. If you want to change it, select a different page.','wp-404tboc-page') ?>"><?php _e('Select a page that replaces the 404 error:','wp-404tboc-page') ?></span></td>
<td><?php wp_dropdown_pages(array(
	'depth'            => 0,
	'child_of'         => 0,
	'selected'         => get_option('page-404tboc'),
	'echo'             => 1,
	'name'             => 'page_id',
	'show_option_none' => '',
	'exclude'          => '',
	'exclude_tree'     => '',
	'value_field'      => 'ID', // поле для значения value e тега option
)); ?></td>
</tr>
<tr>
<td><span  class="ask404" title="<?php _e('Enter the text of the button to return to "Home page".','wp-404tboc-page'); ?>"><?php _e('Text button "Home page"','wp-404tboc-page'); ?></span></td>
<td><input placeholder="Введите текст" class="regular-text" value="<?php echo get_option('text-button-main404tboc'); ?>" name="text-button-main404" type="text"></td>
</tr>
<tr>
<td><span  class="ask404" title="<?php _e('Enter the text of the button to start the plugin.','wp-404tboc-page'); ?>"><?php _e('Text button "Continue"','wp-404tboc-page'); ?></span></td>
<td><input placeholder="Введите текст" class="regular-text" value="<?php echo get_option('text-button-continue404tboc'); ?>" name="text-button-continue404" type="text"></td>
</tr>
<tr>
<td><span  class="ask404" title="<?php _e('If the checkbox is active, then restart the plugin button show. Otherwise, no.','wp-404tboc-page'); ?>"><?php _e('Show button to restart the plugin?','wp-404tboc-page'); ?></span></td>
<td><input name="is-text-button-restart404" id="is-text-button-restart404" type="checkbox" onclick="disp_askButRest404();"  value="1" <?php if(get_option('is-text-button-restart404tboc') =='1') echo 'checked';?>></td>
</tr>
<tr  id="text-button-restart404" style="<?php if(get_option('is-text-button-restart404tboc') !='1') echo "display: none"  ?>">
<td><span  class="ask404" title="<?php _e('Enter the button text for the invitation to restart the plugin.','wp-404tboc-page'); ?>"><?php _e('Text button "Restart"','wp-404tboc-page'); ?></span></td>
<td><input placeholder="Введите текст" class="regular-text" value="<?php echo get_option('text-button-restart404tboc'); ?>" name="text-button-restart404" type="text"></td>
</tr>
<td> <span  class="ask404" title="<?php _e('If the checkbox is enabled, the plugin on the page a link to the developer`s website. Otherwise, no.','wp-404tboc-page'); ?>"><?php _e('Displays links to the plugin developer site. Thank you, if you decide to show :-)','wp-404tboc-page'); ?></span></td>
<td><input name="is-text-support404" id="is-text-support404" type="checkbox" value="1" <?php if(get_option('is-text-support404tboc') =='1') echo 'checked';?>></td>
</tr>
</tbody></table>
<?php if($is_update404){ echo '<p style="color: #21ce21;">'.__('Updated','wp-404tboc-page').'</p>'; } ?>
 <p> <input class="button-primary" type=submit  value="<?php _e('Update','wp-404tboc-page'); ?>" > </p><br>
</p>
</form>
<script>
jQuery( function() {
    jQuery( document ).tooltip();
  } );
	function disp_askSTR404() {
		if(jQuery("#is-page-404").prop("checked")){
			jQuery("#page-id").fadeIn(400);
		}
		else{
			jQuery("#page-id").fadeOut(400);
		}
	}
	function disp_askButRest404() {
		if(jQuery("#is-text-button-restart404").prop("checked")){
			jQuery("#text-button-restart404").fadeIn(400);
		}
		else{
			jQuery("#text-button-restart404").fadeOut(400);
		}
	}
	
</script>
<?php 		
       break; 
		case 'startText' : ?>
<p> 
<form action="" method=post enctype=multipart/form-data>
 <?php 
    wp_nonce_field('manage_opt404tboc','manage_opt404tboc_field'); 
 if($is_update404){ echo '<p style="color: #21ce21;">'.__('Updated','wp-404tboc-page').'</p>'; }
 wp_editor( get_option('startText404tboc'), 'wpeditor', array('textarea_name' => 'startText') ); ?>
 <p> <input class="button-primary" type=submit  value="<?php _e('Update','wp-404tboc-page'); ?>" > </p><br>
</p>
</form>
<?php 		
       break; 
  }
}
	if ( isset ( $_GET['tab'] ) ) ilc_admin_tabs404tboc($_GET['tab']); else ilc_admin_tabs404tboc('General');

	// подключаем все необходимые скрипты: jQuery, jquery-ui, datepicker
	wp_enqueue_script('jquery-ui-tooltip');

	// подключаем нужные css стили
	wp_enqueue_style('jqueryui', plugins_url("/jquery-ui.css", __FILE__), false, null );

?>
