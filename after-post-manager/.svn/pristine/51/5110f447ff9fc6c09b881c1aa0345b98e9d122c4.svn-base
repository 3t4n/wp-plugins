<?php

/**** Registers the sections and fields for the plugin. ****/
add_action( 'admin_init', 'apm_afterpost_manager_section' );

function apm_afterpost_manager_section() {
  // Registers section for the plugin.
  add_settings_section( 'apm_afterpost_manager_editor_section', '', 'apm_afterpost_manager_editor_section_callback', 'apm_afterpost_manager_options' );
  
  // Registers fields for the section.
  add_settings_field( 'apm_afterpost_manager_editor', '', 'apm_afterpost_manager_editor_field_callback', 'apm_afterpost_manager_options', 'apm_afterpost_manager_editor_section' );
  
  // Register settings for the plugin.
  register_setting( 'apm_afterpost_manager_options', 'apm_afterpost_manager_options' ); 

}
 
function apm_afterpost_manager_editor_section_callback() {
  ?>
  <p style="text-align: center;"><?php _e( 'Need a plugin that can add some lines, a signature or a form at the end of each post? If that\'s the case, then this plugin is just for you.', 'apm_after_post_manager' ); ?></p>
  <?php  
}

/**** function for creating the editor field. ****/
function apm_afterpost_manager_editor_field_callback() {
  if( isset( get_option( 'apm_afterpost_manager_options' )[ 'apm_afterpost_manager_editor' ] ) ) {
    $value = get_option( 'apm_afterpost_manager_options' )[ 'apm_afterpost_manager_editor' ];
  }
  else {
    $value = '';
  }
  // Creates the editor field.
  $content = $value;
  $editor_id = 'apm_afterpost_manager_editor';
  $settings = array(
  'textarea_name' => 'apm_afterpost_manager_options[apm_afterpost_manager_editor]',
  'drag_drop_upload' => true,
  );  
  wp_editor( $content, $editor_id, $settings );
}

