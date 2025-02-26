<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/* Modify admin menu */

add_action( 'admin_menu', 'labfi_chec_add_admin_menu' );
add_action( 'admin_init', 'labfi_chec_settings_init' );

function labfi_chec_add_admin_menu(  ) { 

add_options_page( 'lab featured image', 'Lab Featured Image', 'manage_options', 'checking', 'labfi_checking_options_page' );

}

/* Settings */

function labfi_chec_settings_init(  ) { 

register_setting( 'my_option', 'chec_settings' );

add_settings_section(
    'chec_checking_section', 
    __( 'Settings', 'lab-fimage' ), 
    'labfi_chec_settings_section_callback', 
    'checking'
);

add_settings_field( 
    'chec_checkbox_field_0', 
    __( 'Require Featured Image in Posts', 'lab-fimage' ), 
    'labfi_chec_checkbox_field_0_render', 
    'checking', 
    'chec_checking_section' 
);

add_settings_field( 
    'chec_checkbox_field_1', 
    __( 'Add Featured Image to Admin Post Columns', 'lab-fimage' ), 
    'labfi_chec_checkbox_field_1_render', 
    'checking', 
    'chec_checking_section' 
);  

}


function labfi_chec_checkbox_field_0_render(  ) { 

$options = get_option( 'chec_settings' );
?>
<input type='checkbox' name='chec_settings[chec_checkbox_field_0]' <?php checked( $options['chec_checkbox_field_0'], true ); ?> value='1'>
<?php

}

function labfi_chec_checkbox_field_1_render(  ) { 

$options = get_option( 'chec_settings' );
?>
<input type='checkbox' name='chec_settings[chec_checkbox_field_1]' <?php checked( $options['chec_checkbox_field_1'], true ); ?> value='1'>
<?php

}

function labfi_checking_options_page(  ) { 

?>
<form class="labfiform" action='options.php' method='post'>

    <h1>Lab Featured Image</h1>

    <?php
    settings_fields( 'my_option' );
    do_settings_sections( 'checking' );
    submit_button();
    ?>

</form>
<?php

}

