<?php
/**
 * iThemes Exchange GIS Layout Add-on
 * @since 1.0.0
*/

/**
 * Call back for settings page
 *
 * This is set in options array when registering the add-on and called from it_exchange_enable_addon()
 *
 * @since 1.0.0
 * @return void
*/
function it_exchange_gis_layout_settings_callback() {
	$IT_Exchange_GIS_Layout_Add_On = new IT_Exchange_GIS_Layout_Add_On();
	$IT_Exchange_GIS_Layout_Add_On->print_settings_page();
}

/**
 * Sets the default options for GIS Layout Add-on settings
 *
 * @since 1.0.0
 * @return array settings
*/
function it_exchange_gis_layout_default_settings( $defaults ) {

	$defaults = array(
		'number-of-columns' => 5,
		'viewport' => '600',
		'disable-buy-now' => false,
                'enable-add-to-cart' => false,
                'disable-parent-css' => false,
                'disable-child-css' => false,
	);
	return $defaults;
}
add_filter( 'it_storage_get_defaults_exchange_addon_gis_layout', 'it_exchange_gis_layout_default_settings' );

class IT_Exchange_GIS_Layout_Add_On {

	/**
	 * @var boolean $_is_admin true or false
	 * @since 1.0.0
	*/
	var $_is_admin;

	/**
	 * @var string $_current_page Current $_GET['page'] value
	 * @since 1.0.0
	*/
	var $_current_page;

	/**
	 * @var string $_current_add_on Current $_GET['add-on-settings'] value
	 * @since 1.0.0
	*/
	var $_current_add_on;

	/**
	 * @var string $status_message will be displayed if not empty
	 * @since 1.0.0
	*/
	var $status_message;

	/**
	 * @var string $error_message will be displayed if not empty
	 * @since 1.0.0
	*/
	var $error_message;

	/**
 	 * Class constructor
	 *
	 * Sets up the class.
	 * @since 1.0.0
	 * @return void
	*/
	function IT_Exchange_GIS_Layout_Add_On() {
            $this->_is_admin       = is_admin();
            $this->_current_page   = empty( $_GET['page'] ) ? false : $_GET['page'];
            $this->_current_add_on = empty( $_GET['add-on-settings'] ) ? false : $_GET['add-on-settings'];

            if ( ! empty( $_POST ) && $this->_is_admin && 'it-exchange-addons' == $this->_current_page && 'gis-layout' == $this->_current_add_on ) {
                add_action( 'it_exchange_save_add_on_settings_gis_layout', array( $this, 'save_settings' ) );
                do_action( 'it_exchange_save_add_on_settings_gis_layout' );
            }
	}

	function print_settings_page() {
            global $new_values;
            $settings = it_exchange_get_option( 'addon_gis_layout', true );

            $form_values  = empty( $this->error_message ) ? $settings : $new_values;
            $form_options = array(
                'id'      => apply_filters( 'it_exchange_add_on_gis_layout', 'it-exchange-add-on-gis-layout-settings' ),
                'enctype' => apply_filters( 'it_exchange_add_on_gis_layout_settings_form_enctype', false ),
                'action'  => 'admin.php?page=it-exchange-addons&add-on-settings=gis-layout',
            );
            $form         = new ITForm( $form_values, array( 'prefix' => 'it-exchange-add-on-gis-layout' ) );

            if ( ! empty ( $this->status_message ) ) :
                ITUtility::show_status_message( $this->status_message );
            endif;
            
            if ( ! empty( $this->error_message ) ) :
                ITUtility::show_error_message( $this->error_message );
            endif;
            
            ?>
            <div class="wrap">
                <?php screen_icon( 'it-exchange' ); ?>
                <h2><?php _e( 'GIS Layout Settings', 'it-l10n-exchange-addon-gis-layout' ); ?></h2>

                <?php do_action( 'it_exchange_gis_layout_settings_page_top' ); ?>
                <?php do_action( 'it_exchange_addon_settings_page_top' ); ?>

                <?php $form->start_form( $form_options, 'it-exchange-gis-layout-settings' ); ?>
                    <?php do_action( 'it_exchange_gis_layout_settings_form_top' ); ?>
                    <?php $this->get_gis_layout_form_table( $form, $form_values ); ?>
                    <?php do_action( 'it_exchange_gis_layout_settings_form_bottom' ); ?>
                    <p class="submit">
                        <?php $form->add_submit( 'submit', array( 'value' => __( 'Save Changes', 'it-l10n-exchange-addon-gis-layout' ), 'class' => 'button button-primary button-large' ) ); ?>
                    </p>
                <?php $form->end_form(); ?>
                <?php do_action( 'it_exchange_gis_layout_settings_page_bottom' ); ?>
                <?php do_action( 'it_exchange_addon_settings_page_bottom' ); ?>
            </div>
            <?php
	}

	function get_gis_layout_form_table( $form, $settings = array() ) {
            if ( !empty( $settings ) )
                foreach ( $settings as $key => $var )
                    $form->set_option( $key, $var );
            ?>

            <div class="it-exchange-addon-settings it-exchange-gis-layout-addon-settings">
                <h3>Settings</h3>
                <p>
                    <label for="gis-layout-number-of-columns">
                        <?php _e( 'Number of columns', 'it-l10n-exchange-addon-gis-layout' ); ?>
                        <span class="tip" title="<?php _e( 'The number of columns to use in the GIS Layout. Defaults to 5 if left blank.', 'it-l10n-exchange-addon-gis-layout' ); ?>">i</span>
                    </label>
                    <?php $form->add_text_box( 'number-of-columns' ); ?> <span>Defaults to 5, if left blank.</span>
                </p>
                
                <p>
                    <label for="gis-layout-viewport">
                        <?php _e( 'Viewport', 'it-l10n-exchange-addon-gis-layout' ); ?> 
                        <span class="tip" title="<?php _e( 'This setting is intended to make sure the store page looks good on smaller (mobile) devices.', 'it-l10n-exchange-addon-gis-layout' ); ?>">i</span>
                    </label>
                    <?php $form->add_text_box( 'viewport' ); ?> <span>The width at which point the layout will fall back on 2 columns.</span>
                </p>
                
                <p>
                    <label for="gis-layout-disable-buy-now">
                        <?php _e( 'Disable Buy Now?', 'it-l10n-exchange-addon-gis-layout' ) ?>
                    </label>
                    <?php $form->add_check_box( 'disable-buy-now' ); ?>
                </p>
                
                <h3>Styling and css options</h3>
                <p>
                <?php _e( 'Some themes have additional styling for Exchange through a stylesheet in an "exchange" folder in the parent and/or child theme folder. This may include styling for the store page. Tick the box(es) below if such styling is interfering with the addons styling and functionality. The (child) theme\'s Exchange stylesheet will be disabled for the store page only.', 'it-l10n-exchange-addon-gis-layout' ) ?>
                    <label for="gis-layout-disable-parent-css">
                        <?php _e( 'Disable Parent theme styling?', 'it-l10n-exchange-addon-gis-layout' ) ?>
                    </label>
                    <?php $form->add_check_box( 'disable-parent-css' ); ?>
                    <span>Tick this box to disable the theme's Exchange stylesheet for the store page only.</span>
                </p>                
                
                <p>
                    <label for="gis-layout-disable-child-css">
                        <?php _e( 'Disable Child theme styling?', 'it-l10n-exchange-addon-gis-layout' ) ?>
                    </label>
                    <?php $form->add_check_box( 'disable-child-css' ); ?>
                    <span>Tick this box to disable the child theme's Exchange stylesheet for the store page only.</span>
                </p>
                
            </div>
            <?php
	}

	/**
	 * Save settings
	 *
	 * @since 1.0.0
	 * @return void
	*/
    function save_settings() {
    	global $new_values; //We set this as global here to modify it in the error check
        $defaults = it_exchange_get_option( 'addon_gis_layout' );
        $new_values = wp_parse_args( ITForm::get_post_data(), $defaults );
                
        // Check nonce
        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'it-exchange-gis-layout-settings' ) ) {
            $this->error_message = __( 'Error. Please try again', 'it-l10n-exchange-addon-gis-layout' );
            return;
        }

        $errors = apply_filters( 'it_exchange_add_on_gis_layout_validate_settings', $this->get_form_errors( $new_values ), $new_values );
                                
        if ( ! $errors && it_exchange_save_option( 'addon_gis_layout', $new_values ) ) {
            ITUtility::show_status_message( __( 'Settings saved.', 'it-l10n-exchange-addon-gis-layout' ) );
        } else if ( $errors ) {
            $errors = implode( '<br />', $errors );
            $this->error_message = $errors;
        } else {
            $this->status_message = __( 'Settings not saved.', 'it-l10n-exchange-addon-gis-layout' );
        }
    }

    /**
     * Validates for values
     *
     * Returns string of errors if anything is invalid
     *
     * @since 0.1.0
     * @return void
    */
    public function get_form_errors( $values ) {
    	global $new_values;
    	$errors = array();
    	$default_set = false;
    
    	if ( empty( $values['number-of-columns'] ) )
            $errors[] = __( 'Missing number of columns.', 'it-l10n-exchange-addon-gis-layout' );
    
    	if ( empty( $values['viewport'] ) )
            $errors[] = __( 'Missing Viewport.', 'it-l10n-exchange-addon-gis-layout' );
        
        return $errors;
    }
}