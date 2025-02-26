<?php
/**
 * Main Class of the plugin.
 * 
 * @package Ridhi_Companion
 */

class Ridhi_Companion{

    /**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_slug
	 */
	protected $plugin_slug;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $plugin_version;
	
	public function __construct(){
		if( ! function_exists('get_plugin_data') ){
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        $plugin_data = get_plugin_data( RIDHI_COMPANION_PATH . 'ridhi-companion.php' );
        
        $this->plugin_slug    = $plugin_data['TextDomain'];
		$this->plugin_version = $plugin_data['Version'];
		$this->includes();
	}

	/**
	 * Include required files.
	 *
	 * @return void
	 */
	public function includes() {
		/**
		 * Customzer options
		 */
		require_once RIDHI_COMPANION_PATH . 'inc/fontawesome.php';
	}

    /**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
    public function execute(){
        //Load plugin text domain
        add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
        add_action( 'wp_ajax_ridhi_companion_get_fontawesome_ajax', array( $this, 'ridhi_companion_get_fontawesome_ajax' ) );
		//Hook for header
		add_action( 'ridhi_header_top', array( $this, 'header_phone_email' ), 15 );
		add_action( 'ridhi_header_top', array( $this, 'social_links' ), 20, 2 );
		add_action( 'ridhi_header_after_nav', array( $this, 'nav_custom_link' ), 15 );

		//Hook for third header
		add_action( 'ridhi_header_top_three', array( $this, 'social_links' ), 15, 2 );
		add_action( 'ridhi_header_top_three', array( $this, 'header_phone_email' ), 20 );
		add_action( 'ridhi_header_top_three', array( $this, 'nav_custom_link' ), 25 );

		//Hook for footer
		add_action( 'ridhi_footer_social', array( $this, 'social_links' ), 20, 2 );
    }

    /**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
    public function get_plugin_version(){
        return $this->plugin_version;
    }

    /**
	 * The slug of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The slug of the plugin.
	 */
    public function get_plugin_slug(){
        return $this->plugin_slug;
    }

    /**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain(){
		load_plugin_textdomain( $this->plugin_slug, false, RIDHI_COMPANION_PATH . 'languages/' );
	}

	public function header_phone_email(){
		$phone = get_theme_mod( 'phone', __( '(222) 400-630', 'ridhi-companion' ) );
		$email = get_theme_mod( 'email', __( 'info@domail.com', 'ridhi-companion' ) );
		if( $phone || $email ){ 
			echo '<ul class="contact-info-lists">';
			if( $phone ){
				echo '<li class="tel-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path id="Path_176" data-name="Path 176" class="cls-1" d="M20,21a1,1,0,0,0,1-1V16.51a1,1,0,0,0-1-1,11.407,11.407,0,0,1-3.57-.57.839.839,0,0,0-.31-.05,1.024,1.024,0,0,0-.71.29l-2.2,2.2a15.149,15.149,0,0,1-6.59-6.59l2.2-2.2a1,1,0,0,0,.25-1.02A11.36,11.36,0,0,1,8.5,4a1,1,0,0,0-1-1H4A1,1,0,0,0,3,4,17,17,0,0,0,20,21Zm-3.6-3.98a12.753,12.753,0,0,0,2.6.45v1.49a15.426,15.426,0,0,1-3.8-.75ZM5.03,5h1.5a13,13,0,0,0,.46,2.59l-1.2,1.2A14.825,14.825,0,0,1,5.03,5Z" transform="translate(-3 -3)" /></svg>';
				echo '<a href="' . esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ) . '">' . esc_html( $phone ) . '</a>';
				echo '</li>';
			}
			
			if( $email ){
				echo '<li class="email-link"><svg id="twotone-email-24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g id="Bounding_Boxes"><path id="Path_177" data-name="Path 177" class="cls-1" d="M0,0H24V24H0Z"/></g><g id="Duotone"><g id="Group_18" data-name="Group 18"><path id="Path_178" data-name="Path 178" class="cls-2" d="M20,8l-8,5L4,8V18H20Z"/><path id="Path_179" data-name="Path 179" class="cls-2" d="M20,6H4l8,4.99Z"/><path id="Path_180" data-name="Path 180" class="cls-3" d="M4,20H20a2.006,2.006,0,0,0,2-2V6a2.006,2.006,0,0,0-2-2H4A2.006,2.006,0,0,0,2,6V18A2.006,2.006,0,0,0,4,20ZM20,6l-8,4.99L4,6ZM4,8l8,5,8-5V18H4Z"/></g></g></svg>';
				echo '<a href="' . esc_url( 'mailto:' . $email ) . '">' . esc_html( $email ) . '</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
	}

	public function social_links( $area, $echo = true ){ 
		$defaults          = new Ridhi_Companion_Dummy_Array();
		$social_links      = get_theme_mod( 'social_links', $defaults->default_socials() );
		$ed_header_social  = get_theme_mod( 'ed_social_links_header', true );
		$ed_footer_social  = get_theme_mod( 'ed_social_links_footer', true );
		$ed_section_social = get_theme_mod( 'ed_social_section', true );

		if( $social_links && ( ( $area == 'header' && $ed_header_social ) || ( $area == 'footer' && $ed_footer_social ) || ( $area == 'section' && $ed_section_social ) ) ){
			if( $echo ){ ?>
				<ul class="social-networks">
					<?php 
					foreach( $social_links as $link ){
					if( $link['link'] ){ ?>
						<li>
							<a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow noopener">
								<i class="<?php echo esc_attr( $link['font'] ); ?>"></i>
							</a>
						</li>  	   
						<?php
						} 
					} 
					?>
				</ul>
				<?php			
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	public function nav_custom_link(){
		$link  = get_theme_mod( 'header_ctabtn_link', '#' );
		$label = get_theme_mod( 'header_ctabtn_label', __( 'Booking', 'ridhi-companion' ) );
		if( $link && $label ){
			echo '<div class="btn-book"><a class="btn-primary" href="' . esc_url( $link ) . '">' . esc_html( $label ) . '</a></div>';
		}
	}

	public function ridhi_companion_get_fontawesome_ajax() {
	    // Bail if the nonce doesn't check out
	    if ( ! isset( $_POST['ridhi_companion_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['ridhi_companion_customize_nonce'] ), 'ridhi_companion_customize_nonce' ) ) {
	        wp_die();
	    }

	    // Do another nonce check
	    check_ajax_referer( 'ridhi_companion_customize_nonce', 'ridhi_companion_customize_nonce' );

	    // Bail if user can't edit theme options
	    if ( ! current_user_can( 'edit_theme_options' ) ) {
	        wp_die();
	    }

	    // Get all of our fonts
	    $fonts = ridhi_companion_get_fontawesome_list();
	    
	    ob_start();
	    if( $fonts ){ ?>
	        <ul class="font-group">
	            <?php 
	                foreach( $fonts as $font ){
	                    echo '<li data-font="' . esc_attr( $font ) . '"><i class="' . esc_attr( $font ) . '"></i></li>';                        
	                }
	            ?>
	        </ul>
	        <?php
	    }
	    echo ob_get_clean();

	    // Exit
	    wp_die();
	}


}
$obj = new Ridhi_Companion();
$obj->execute();