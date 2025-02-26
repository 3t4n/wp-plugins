<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 function register_awtb_settings() {
    $settingsArray = array (
        'awtb_class_name', 
        'awtb_id_name',
		'awtb_select_idclass',
		'awtb_chooseclr'
    );
    foreach ($settingsArray as $setting) {
        register_setting( 'awtb-group', $setting);
    }
}
add_action( 'admin_init', 'register_awtb_settings' );
ob_start();
function AWTB_forms_settings(){
	
?>
<?php if (isset($_GET['settings-updated'])) : ?>
	<div class="notice notice-success is-dismissible"><p><?php _e('Setting saved!'); ?>.</p></div>
<?php endif; ?> 
<div id="wrap">

<div class="container_awtb">

		<ul class="tabs">
		<li class="tab-link current" data-tab="tab-1">Settings</li>
		
		
	</ul>
<div id="tab-1" class="tab-content current">
  
  <strong>Update link settings.</strong>
 <form method="post" action="options.php">
  <?php settings_fields( 'awtb-group' );
        do_settings_sections( 'awtb-group' );
		
  ?>
    <table class="form-table"><tbody>
    
    <tr><th scope="row">Select Class or id</th><td>
    <?php $awtb_select_idclass  = get_option('awtb_select_idclass'); ?>
    <select id="awtb" name="awtb_select_idclass">
    <option value="">Select option</option>
    <option value="awtb_class_name" <?php if($awtb_select_idclass=='awtb_class_name'){ echo "selected='selected'";}?>>Class</option>
    <option value="awtb_class_id" <?php if($awtb_select_idclass=='awtb_class_id'){ echo "selected='selected'";}?>>Id</option>
    </select>
    <p><em> All external links will open in new tab by id or class</em></p>
    </td></tr>
    
   <tr class="awtb_classname"><th scope="row">Enter Class Name:</th><td>
    <input name="awtb_class_name" id="awtb_class_name" value="<?php echo esc_attr( get_option('awtb_class_name') ); ?>"  size="80"  type="text">
    <p><em>If you set class name here all external links match with this class name will open in new tab.</em></p>
    </td></tr>
   
   <tr class="awtb_idname"><th scope="row">Enter id</th><td>    
    <input name="awtb_id_name" id="awtb_id_name" value="<?php echo esc_attr( get_option('awtb_id_name') ); ?>"  size="80"  type="text">
    <p><em>If you set id  here all external links match with this id  will open in new tab.</em></p>
    </td></tr>
    
    <tr><th scope="row">Select color to check all external links</th><td>    
    <input class="awtb_style" name="awtb_chooseclr" id="awtb_chooseclr" value="<?php echo esc_attr( get_option('awtb_chooseclr') ); ?>"  size="80"  type="text">
    <p><em>if you choose color #f00(Red) then all external link will show in red color.</em></p>
    </td></tr>
     <tr> <th scope="row"><?php submit_button(); ?></td></tr>
    
    </tbody></table>
 </form>
</div>


</div>
</div>
<?php }
