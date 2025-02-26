<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
<div class="wpmi_main_container" id="wpmi_menu_<?php echo esc_attr($menu_item_id);?>" data-depth="depth_<?php echo esc_attr($menuitemdepth);?>">
 <div class="wpmi_main_header">
	<div class="settings_megamenu">
		<i class="fa fa-wrench" aria-hidden="true"></i>
		<?php _e('WP MENU ICONS LITE SETTINGS','ak-menu-icons-lite');?> 
	</div>
	<span class="wpmm_menu_title">
     <i class="fa fa-bars" aria-hidden="true"></i>
	<?php echo (isset($menu_item_title) && $menu_item_title != '')?esc_attr($menu_item_title):'';?>
	</span>
  </div>
	<div class="wpmi_inner_option_wrap">
    <form class="wpmi-menu-icon-data" action="" method="POST" enctype="multipart/form-data">
       <div class="wpmi-tab-title-wrap">
	      <ul class="wpmi-nav-wrapper">
	      	  <li class="wpmi_tab_label wpmi_active" data-tab="wpmi_general_settings"><?php _e('General Settings','ak-menu-icons-lite');?></li>
	      	  <li class="wpmi_tab_label" data-tab="wpmi_icon_settings"><?php _e('Icon Settings','ak-menu-icons-lite');?></li>
	      	  <li class="wpmi_tab_label" data-tab="wpmi_animation_settings"><?php _e('Animation Settings','ak-menu-icons-lite');?></li>
	      	  <li class="wpmi_tab_label" data-tab="wpmi_custom_settings"><?php _e('Custom Settings','ak-menu-icons-lite');?></li>
	      </ul>
      </div>
      <div class="wpmi-tab-content-wrap">
         <div class="wpmi-tab-content wpmi-active-content" id="wpmi_general_settings">
           <?php include(WPMICONSLITE_PATH . 'includes/views/backend/navigation-menu-settings/icon_settings/wpmi-general.php'); ?>
         </div>

         <div class="wpmi-tab-content" id="wpmi_icon_settings">
            <?php include(WPMICONSLITE_PATH . 'includes/views/backend/navigation-menu-settings/icon_settings/wpmi-icon-settings.php'); ?>
         </div>

         <div class="wpmi-tab-content" id="wpmi_animation_settings">
             <?php include(WPMICONSLITE_PATH . 'includes/views/backend/navigation-menu-settings/icon_settings/wpmi-animation-settings.php'); ?>
         </div>

          <div class="wpmi-tab-content" id="wpmi_custom_settings">
             <?php include(WPMICONSLITE_PATH . 'includes/views/backend/navigation-menu-settings/icon_settings/wpmi-custom-settings.php'); ?>
         </div>

      </div>
       <div class="wpmi-save-form-wrapper">
		<input type="submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Save Changes', 'ak-menu-icons-lite' ); ?>"/>
		<div class="wpmicon-spinner spinner" style="float:none;"></div>
		<div class="wpmicon-message" style="display:none;"><?php esc_attr_e( 'Successfully Saved.', 'ak-menu-icons-lite' ); ?></div>
		</div>
    </form>
	</div>
</div>