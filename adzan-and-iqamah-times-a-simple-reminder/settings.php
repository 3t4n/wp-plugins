<?php

	function ait_menu() {  
  
   		add_menu_page(  
	        'Adzan and Iqamah Times Settings',
	        'AIT Settings',
	        'administrator',
	        'ait_settings',
	        'ait_settings_display'
    	);  
  
	}
	add_action('admin_menu', 'ait_menu');



	// Display Output

    function ait_settings_display() {?>
    
    	<div class="wrap">
    
        	<div id="icon-themes" class="icon32"></div>
        	<h2><?php _e( 'Adzan and Iqamah Times Settings', 'ait' ); ?></h2>
        	<?php settings_errors(); ?>

        	<h2 class="nav-tab-wrapper">
            	<a href="?page=ait_settings" class="nav-tab"><?php _e( 'General Settings', 'ait' ); ?></a>
        	</h2>
        
        	<form method="post" action="options.php">
            
	            <?php

	                settings_fields( 'ait_settings' );
	                do_settings_sections( 'ait_settings' );

	                submit_button();
		        ?>

        	</form>
        
    	</div><!-- .wrap -->

        <script type='text/javascript'>  
            jQuery(document).ready(function($) {  
            $('.colorpicker').wpColorPicker();  
         });  
        </script> 
	<?php
	}



	function ait_settings_options() {

	    $defaults = array(
	        'searchresult'      =>   '4',
            'bordercolor'       =>   '#ccc',
            'headingcolor'      =>   '#7db9e8',
            'backgroundcolor'   =>   '#f9f9f9',
            'fontcolor'         =>   '#000',
	    );
	    return apply_filters( 'ait_settings_options', $defaults );

	}



	function initialize_settings_options() {

		if( false == get_option( 'ait_settings' ) ) {  
        	add_option( 'ait_settings', apply_filters( 'ait_settings_options', ait_settings_options() ) );
    	}

    	add_settings_section(
        	'ait_settings_section',
        	__( 'General Options', 'ait' ),
        	'settings_options_callback',
        	'ait_settings'
    	);

    	add_settings_field( 
	        'searchresult',
	        __( 'Search Result Limit', 'ait' ),
	        'searchresult_callback',
	        'ait_settings',
	        'ait_settings_section',
	        array( 
	        	__( 'Select Max Search Result Limit You Wish to Display', 'ait' ),
	        )
	    );

        add_settings_field( 
            'bordercolor',
            __( 'Border Color', 'ait' ),
            'bordercolor_callback',
            'ait_settings',
            'ait_settings_section',
            array( 
                __( 'Border Color', 'ait' ),
            )
        );

        add_settings_field( 
            'headingcolor',
            __( 'Heading Color', 'ait' ),
            'headingcolor_callback',
            'ait_settings',
            'ait_settings_section',
            array( 
                __( 'Heading Color', 'ait' ),
            )
        );

        add_settings_field( 
            'backgroundcolor',
            __( 'Background Color', 'ait' ),
            'backgroundcolor_callback',
            'ait_settings',
            'ait_settings_section',
            array( 
                __( 'Background Color', 'ait' ),
            )
        );

        add_settings_field( 
            'fontcolor',
            __( 'Font Color', 'ait' ),
            'fontcolor_callback',
            'ait_settings',
            'ait_settings_section',
            array( 
                __( 'Font Color', 'ait' ),
            )
        );

	    register_setting(
       		'ait_settings',
        	'ait_settings'
   		);

    }
    add_action( 'admin_init', 'initialize_settings_options' );



    // Section Callback

    function settings_options_callback() {
    	echo '<p>' . __( 'This Settings are for Adzan and Iqamah Time Widget', 'ait' ) . '</p>';
	}


	// Search Result Callback

	function searchresult_callback() {
		$options = get_option( 'ait_settings' );

    	$html = '<select id="searchresult" name="ait_settings[searchresult]">';
        	$html .= '<option value="0"' . selected( $options['searchresult'], '0', false ) . '>' . __( '1', 'ait' ) . '</option>';
        	$html .= '<option value="1"' . selected( $options['searchresult'], '1', false ) . '>' . __( '2', 'ait' ) . '</option>';
        	$html .= '<option value="2"' . selected( $options['searchresult'], '2', false ) . '>' . __( '3', 'ait' ) . '</option>';
        	$html .= '<option value="3"' . selected( $options['searchresult'], '3', false ) . '>' . __( '4', 'ait' ) . '</option>';
        	$html .= '<option value="4"' . selected( $options['searchresult'], '4', false ) . '>' . __( '5', 'ait' ) . '</option>';
        	$html .= '<option value="5"' . selected( $options['searchresult'], '5', false ) . '>' . __( '6', 'ait' ) . '</option>';
        	$html .= '<option value="6"' . selected( $options['searchresult'], '6', false ) . '>' . __( '7', 'ait' ) . '</option>';
        	$html .= '<option value="7"' . selected( $options['searchresult'], '7', false ) . '>' . __( '8', 'ait' ) . '</option>';
        	$html .= '<option value="8"' . selected( $options['searchresult'], '8', false ) . '>' . __( '9', 'ait' ) . '</option>';
        	$html .= '<option value="9"' . selected( $options['searchresult'], '9', false ) . '>' . __( '10', 'ait' ) . '</option>';
        	$html .= '<option value="10"' . selected( $options['searchresult'], '10', false ) . '>' . __( '11', 'ait' ) . '</option>';
        	$html .= '<option value="11"' . selected( $options['searchresult'], '11', false ) . '>' . __( '12', 'ait' ) . '</option>';
        	$html .= '<option value="12"' . selected( $options['searchresult'], '12', false ) . '>' . __( '13', 'ait' ) . '</option>';
        	$html .= '<option value="13"' . selected( $options['searchresult'], '13', false ) . '>' . __( '14', 'ait' ) . '</option>';
        	$html .= '<option value="14"' . selected( $options['searchresult'], '14', false ) . '>' . __( '15', 'ait' ) . '</option>';
        	$html .= '<option value="15"' . selected( $options['searchresult'], '15', false ) . '>' . __( '16', 'ait' ) . '</option>';
        	$html .= '<option value="16"' . selected( $options['searchresult'], '16', false ) . '>' . __( '17', 'ait' ) . '</option>';
        	$html .= '<option value="17"' . selected( $options['searchresult'], '17', false ) . '>' . __( '18', 'ait' ) . '</option>';
        	$html .= '<option value="18"' . selected( $options['searchresult'], '18', false ) . '>' . __( '19', 'ait' ) . '</option>';
        	$html .= '<option value="19"' . selected( $options['searchresult'], '19', false ) . '>' . __( '20', 'ait' ) . '</option>';
    	$html .= '</select>';

    	echo $html;
    }



    // Border Color Callback
    function bordercolor_callback($args) {

        $options = get_option( 'ait_settings' );
        echo '<input type="text" class="colorpicker" name="ait_settings[bordercolor]" value="' . $options['bordercolor'] . '" data-default-color="' . $options['bordercolor'] . '" />';
    
    }


    // Border Color Callback
    function headingcolor_callback($args) {

        $options = get_option( 'ait_settings' );
        echo '<input type="text" class="colorpicker" name="ait_settings[headingcolor]" value="' . $options['headingcolor'] . '" data-default-color="' . $options['headingcolor'] . '" />';
    
    }



    // Border Color Callback
    function backgroundcolor_callback($args) {

        $options = get_option( 'ait_settings' );
        echo '<input type="text" class="colorpicker" name="ait_settings[backgroundcolor]" value="' . $options['backgroundcolor'] . '" data-default-color="' . $options['backgroundcolor'] . '" />';
    
    }



    // Border Color Callback
    function fontcolor_callback($args) {

        $options = get_option( 'ait_settings' );
        echo '<input type="text" class="colorpicker" name="ait_settings[fontcolor]" value="' . $options['fontcolor'] . '" data-default-color="' . $options['fontcolor'] . '" />';
    
    }

    function color_picker( $hook_suffix ) {
        // first check that $hook_suffix is appropriate for your admin page
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
    }
    add_action( 'admin_enqueue_scripts', 'color_picker' );

?>