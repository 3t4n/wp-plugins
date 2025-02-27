<?php

/*
Plugin Name: Surbma | GDPR Proof Cookie Consent & Notice Bar
Plugin URI: https://surbma.com/wordpress-plugins/surbma-gdpr-proof-cookies/
Description: Adds GDPR compatible cookie management to your website.

Version: 17.8.2

Author: Surbma
Author URI: https://surbma.com/

License: GPLv2

Text Domain: surbma-gdpr-proof-google-analytics
Domain Path: /languages/
*/
define( 'SURBMA_GPGA_PLUGIN_VERSION_NUMBER', '17.8.2' );
// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Good try! :)' );
}
// Freemius SDK wrap to prevent conflicts with premium version

if ( !function_exists( 'surbma_gpga_fs' ) ) {
    // Create a helper function for easy SDK access.
    function surbma_gpga_fs()
    {
        global  $surbma_gpga_fs ;
        
        if ( !isset( $surbma_gpga_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/vendors/freemius/start.php';
            $surbma_gpga_fs = fs_dynamic_init( array(
                'id'              => '1930',
                'slug'            => 'surbma-gdpr-proof-google-analytics',
                'type'            => 'plugin',
                'public_key'      => 'pk_ec2dc653523a01a2ca1fd5a0ff31e',
                'is_premium'      => false,
                'premium_suffix'  => '(Pro)',
                'has_addons'      => false,
                'has_paid_plans'  => true,
                'trial'           => array(
                'days'               => 7,
                'is_require_payment' => true,
            ),
                'has_affiliation' => 'selected',
                'menu'            => array(
                'slug'    => 'surbma-gpga-menu',
                'support' => false,
            ),
                'is_live'         => true,
            ) );
        }
        
        return $surbma_gpga_fs;
    }
    
    // Init Freemius.
    surbma_gpga_fs();
    // Signal that SDK was initiated.
    do_action( 'surbma_gpga_fs_loaded' );
    function surbma_gpga_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    )
    {
        return sprintf(
            __( 'Hey %1$s', 'surbma-gdpr-proof-google-analytics' ) . ',<br>' . __( 'Please help us improve %2$s plugin! If you opt-in, some data about your usage of this plugin will be sent to us. If you skip this, that\'s okay! The plugin will still work just fine.', 'surbma-gdpr-proof-google-analytics' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }
    
    surbma_gpga_fs()->add_filter(
        'connect_message_on_update',
        'surbma_gpga_fs_custom_connect_message_on_update',
        10,
        6
    );
    if ( !defined( 'SURBMA_GPGA_PLUGIN_VERSION' ) ) {
        define( 'SURBMA_GPGA_PLUGIN_VERSION', 'free' );
    }
    // Check license
    
    if ( surbma_gpga_fs()->can_use_premium_code() ) {
        define( 'SURBMA_GPGA_PLUGIN_LICENSE', 'valid' );
    } elseif ( SURBMA_GPGA_PLUGIN_VERSION == 'premium' ) {
        define( 'SURBMA_GPGA_PLUGIN_LICENSE', 'expired' );
    } else {
        define( 'SURBMA_GPGA_PLUGIN_LICENSE', 'free' );
    }
    
    define( 'SURBMA_GPGA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    define( 'SURBMA_GPGA_PLUGIN_URL', plugins_url( '', __FILE__ ) );
    define( 'SURBMA_GPGA_PLUGIN_FILE', __FILE__ );
    // Localization
    function surbma_gpga_init()
    {
        load_plugin_textdomain( 'surbma-gpga', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    
    add_action( 'plugins_loaded', 'surbma_gpga_init' );
    $options = get_option( 'surbma_gpga_fields' );
    $limitedliabilityValue = ( isset( $options['limitedliability'] ) ? $options['limitedliability'] : 0 );
    // Include files
    
    if ( is_admin() ) {
        include_once SURBMA_GPGA_PLUGIN_DIR . '/lib/admin.php';
    } elseif ( $limitedliabilityValue == 1 ) {
        include_once SURBMA_GPGA_PLUGIN_DIR . '/lib/social.php';
        include_once SURBMA_GPGA_PLUGIN_DIR . '/lib/shortcodes.php';
    }
    
    function surbma_gpga_activated()
    {
        $defaultfields = get_option( 'surbma_gpga_fields' );
        
        if ( !$defaultfields ) {
            $defaultfields['popuptitle'] = 'We are using cookies on our website';
            $defaultfields['popuptext'] = 'Please confirm, if you accept our tracking cookies. You can also decline the tracking, so you can continue to visit our website without any data sent to third party services.';
            $defaultfields['popupbutton1display'] = 1;
            $defaultfields['popupbutton1text'] = 'Decline';
            $defaultfields['popupbutton1style'] = 'default';
            $defaultfields['popupbutton2text'] = 'Accept';
            $defaultfields['popupbutton2style'] = 'primary';
            $defaultfields['popupbuttonsize'] = 'large';
            $defaultfields['popupbuttonalignment'] = 'left';
            $defaultfields['popupthemes'] = 'normal';
            $defaultfields['popupcookiedays'] = 30;
            $defaultfields['snackbartext'] = 'We are using Cookies on our website.';
            $defaultfields['snackbaropenpopuptext'] = 'Cookie settings';
            $defaultfields['snackbarpos'] = 'bottom-left';
            $defaultfields['gaanonymizeip'] = 1;
            $defaultfields['gascript'] = 'gtagjs';
            update_option( 'surbma_gpga_fields', $defaultfields );
        }
    
    }
    
    register_activation_hook( __FILE__, 'surbma_gpga_activated' );
    function surbma_gpga_structure_load()
    {
        $options = get_option( 'surbma_gpga_fields' );
        $popupdebugValue = ( isset( $options['popupdebug'] ) && is_user_logged_in() && !is_admin() ? $options['popupdebug'] : 0 );
        $gaValue = ( isset( $options['ga'] ) ? stripslashes( $options['ga'] ) : '' );
        $galoadadminValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['galoadadmin'] ) ? $options['galoadadmin'] : 1 );
        $galoadloginValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['galoadlogin'] ) ? $options['galoadlogin'] : 1 );
        $galoadloggedinValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['galoadloggedin'] ) ? $options['galoadloggedin'] : 1 );
        $fbpixelidValue = ( isset( $options['fbpixelid'] ) ? stripslashes( $options['fbpixelid'] ) : '' );
        $limitedliabilityValue = ( isset( $options['limitedliability'] ) ? $options['limitedliability'] : 0 );
        
        if ( $limitedliabilityValue == 1 ) {
            add_action( 'wp_enqueue_scripts', 'surbma_gpga_enqueue_scripts', 999 );
            add_action( 'wp_head', 'surbma_gpga_header_scripts', 999 );
            add_action( 'wp_footer', 'surbma_gpga_block', 999 );
            if ( $gaValue != '' && (!is_user_logged_in() || $galoadloggedinValue == 1) ) {
                add_action( 'wp_head', 'surbma_gpga_google_analytics_display', 999 );
            }
            if ( $fbpixelidValue != '' ) {
                add_action( 'wp_head', 'surbma_gpga_fbpixel_display', 999 );
            }
            add_action( 'admin_head', 'surbma_gpga_header_scripts', 999 );
            // add_action( 'admin_print_footer_scripts', 'surbma_gpga_block', 999 );
            // add_action( 'admin_enqueue_scripts', 'surbma_gpga_enqueue_scripts', 999 );
            if ( $gaValue != '' && $galoadadminValue == 1 ) {
                add_action( 'admin_head', 'surbma_gpga_google_analytics_display', 999 );
            }
            add_action( 'login_enqueue_scripts', 'surbma_gpga_enqueue_scripts', 999 );
            add_action( 'login_head', 'surbma_gpga_header_scripts', 999 );
            add_action( 'login_footer', 'surbma_gpga_block', 999 );
            if ( $gaValue != '' && $galoadloginValue == 1 ) {
                add_action( 'login_head', 'surbma_gpga_google_analytics_display', 999 );
            }
        }
    
    }
    
    add_action( 'wp_loaded', 'surbma_gpga_structure_load' );
    function surbma_gpga_enqueue_scripts()
    {
        $options = get_option( 'surbma_gpga_fields' );
        $popupstylesValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupstyles'] ) ? $options['popupstyles'] : 'default' );
        wp_enqueue_script(
            'surbma-gpga-scripts',
            plugins_url( '', __FILE__ ) . '/js/scripts-min.js',
            array( 'jquery' ),
            SURBMA_GPGA_PLUGIN_VERSION_NUMBER,
            true
        );
        wp_register_style(
            'surbma-gpga-social-share',
            plugins_url( '', __FILE__ ) . '/css/social-share.css',
            false,
            SURBMA_GPGA_PLUGIN_VERSION_NUMBER
        );
        wp_enqueue_style(
            'surbma-gpga-styles',
            plugins_url( '', __FILE__ ) . '/css/styles-' . $popupstylesValue . '.css',
            false,
            SURBMA_GPGA_PLUGIN_VERSION_NUMBER
        );
    }
    
    function surbma_gpga_header_scripts()
    {
        ?>
<script type="text/javascript">
	function surbma_gpga_readCookie(cookieName) {
		var re = new RegExp('[; ]'+cookieName+'=([^\\s;]*)');
		var sMatch = (' '+document.cookie).match(re);
		if (cookieName && sMatch) return unescape(sMatch[1]);
		return '';
	}
</script>
<?php 
    }
    
    function surbma_gpga_google_analytics_display()
    {
        $options = get_option( 'surbma_gpga_fields' );
        $gaValue = ( isset( $options['ga'] ) ? stripslashes( $options['ga'] ) : '' );
        $gaanonymizeipValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['gaanonymizeip'] ) ? $options['gaanonymizeip'] : 1 );
        $gascriptValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['gascript'] ) ? $options['gascript'] : 'gtagjs' );
        
        if ( $gascriptValue == 'analyticsjs' ) {
            ?>
<!-- Google Analytics -->
<script>
if( surbma_gpga_readCookie('surbma-gpga') == 'yes' ) {
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', '<?php 
            echo  $gaValue ;
            ?>', 'auto');
<?php 
            
            if ( $gaanonymizeipValue == '1' ) {
                ?>
	ga('send', 'pageview', { 'anonymizeIp': true });
<?php 
            } else {
                ?>
	ga('send', 'pageview');
<?php 
            }
            
            do_action( 'surbma_gpga_analyticsjs_settings' );
            ?>
}
</script>
<?php 
        } else {
            ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php 
            echo  $gaValue ;
            ?>"></script>
<script>
if( surbma_gpga_readCookie('surbma-gpga') == 'yes' ) {
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
<?php 
            
            if ( $gaanonymizeipValue == '1' ) {
                ?>
	gtag('config', '<?php 
                echo  $gaValue ;
                ?>', { 'anonymize_ip': true });
<?php 
            } else {
                ?>
	gtag('config', '<?php 
                echo  $gaValue ;
                ?>');
<?php 
            }
            
            do_action( 'surbma_gpga_gtagjs_settings' );
            ?>
}
</script>
<?php 
        }
    
    }
    
    function surbma_gpga_fbpixel_display()
    {
        $options = get_option( 'surbma_gpga_fields' );
        $fbpixelidValue = ( isset( $options['fbpixelid'] ) ? stripslashes( $options['fbpixelid'] ) : '' );
        $fbpixeladvancedmatching = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixeladvancedmatching'] ) ? stripslashes( $options['fbpixeladvancedmatching'] ) : 0 );
        $fbpixelciemValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelciem'] ) ? stripslashes( $options['fbpixelciem'] ) : '' );
        $fbpixelcifnValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelcifn'] ) ? stripslashes( $options['fbpixelcifn'] ) : '' );
        $fbpixelcilnValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelciln'] ) ? stripslashes( $options['fbpixelciln'] ) : '' );
        $fbpixelciphValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelciph'] ) ? stripslashes( $options['fbpixelciph'] ) : '' );
        $fbpixelcigeValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelcige'] ) ? stripslashes( $options['fbpixelcige'] ) : '' );
        $fbpixelcidbValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelcidb'] ) ? stripslashes( $options['fbpixelcidb'] ) : '' );
        $fbpixelcictValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelcict'] ) ? stripslashes( $options['fbpixelcict'] ) : '' );
        $fbpixelcistValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelcist'] ) ? stripslashes( $options['fbpixelcist'] ) : '' );
        $fbpixelcizpValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['fbpixelcizp'] ) ? stripslashes( $options['fbpixelcizp'] ) : '' );
        
        if ( $fbpixelidValue != '' ) {
            ?>
<!-- Facebook Pixel Code -->
<script>
if( surbma_gpga_readCookie('surbma-gpga') == 'yes' ) {
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
<?php 
            
            if ( $fbpixeladvancedmatching != 1 ) {
                ?>
	fbq('init', '<?php 
                echo  $fbpixelidValue ;
                ?>');
<?php 
            } else {
                ?>
	fbq('init', '<?php 
                echo  $fbpixelidValue ;
                ?>', {
<?php 
                
                if ( $fbpixelciemValue != '' ) {
                    ?>
		'em': '<?php 
                    echo  $fbpixelciemValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelcifnValue != '' ) {
                    ?>
		'fn': '<?php 
                    echo  $fbpixelcifnValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelcilnValue != '' ) {
                    ?>
		'ln': '<?php 
                    echo  $fbpixelcilnValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelciphValue != '' ) {
                    ?>
		'ph': '<?php 
                    echo  $fbpixelciphValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelcigeValue != '' ) {
                    ?>
		'ge': '<?php 
                    echo  $fbpixelcigeValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelcidbValue != '' ) {
                    ?>
		'db': '<?php 
                    echo  $fbpixelcidbValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelcictValue != '' ) {
                    ?>
		'ct': '<?php 
                    echo  $fbpixelcictValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelcistValue != '' ) {
                    ?>
		'st': '<?php 
                    echo  $fbpixelcistValue ;
                    ?>',
<?php 
                }
                
                
                if ( $fbpixelcizpValue != '' ) {
                    ?>
		'zp': '<?php 
                    echo  $fbpixelcizpValue ;
                    ?>',
<?php 
                }
                
                ?>
	});
<?php 
            }
            
            ?>
	fbq('track', 'PageView');
}
</script>
<!-- End Facebook Pixel Code -->
<?php 
        }
    
    }
    
    function surbma_gpga_customscripts_display()
    {
        $options = get_option( 'surbma_gpga_fields' );
        $customthirdpartyscriptsValue = ( isset( $options['customthirdpartyscripts'] ) ? stripslashes( $options['customthirdpartyscripts'] ) : '' );
        $custommarketingscriptsValue = ( isset( $options['custommarketingscripts'] ) ? stripslashes( $options['custommarketingscripts'] ) : '' );
        if ( $customthirdpartyscriptsValue != '' ) {
            echo  $customthirdpartyscriptsValue ;
        }
        if ( $custommarketingscriptsValue != '' ) {
            echo  $custommarketingscriptsValue ;
        }
    }
    
    function surbma_gpga_block()
    {
        $options = get_option( 'surbma_gpga_fields' );
        $popuptextValue = ( isset( $options['popuptext'] ) ? $options['popuptext'] : '' );
        $popupcookiepolicytextValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupcookiepolicytext'] ) ? $options['popupcookiepolicytext'] : '' );
        $popupcookiepolicypageValue = ( isset( $options['popupcookiepolicypage'] ) ? $options['popupcookiepolicypage'] : 0 );
        $popupbutton1displayValue = ( isset( $options['popupbutton1display'] ) ? $options['popupbutton1display'] : 1 );
        $popupbutton1styleValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupbutton1style'] ) ? $options['popupbutton1style'] : 'default' );
        $popupbutton1textValue = ( isset( $options['popupbutton1text'] ) ? $options['popupbutton1text'] : 'Decline' );
        $popupbutton2styleValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupbutton2style'] ) ? $options['popupbutton2style'] : 'primary' );
        $popupbutton2textValue = ( isset( $options['popupbutton2text'] ) ? $options['popupbutton2text'] : 'Accept' );
        $popupbuttonsizeValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupbuttonsize'] ) ? $options['popupbuttonsize'] : 'large' );
        $popupbuttonalignmentValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupbuttonalignment'] ) ? $options['popupbuttonalignment'] : 'left' );
        $popupthemesValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupthemes'] ) ? $options['popupthemes'] : 'normal' );
        $popupdarkmodeValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupdarkmode'] ) && $options['popupdarkmode'] == 1 ? ' surbma-gpga-dark' : '' );
        $popupcentertextValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupcentertext'] ) && $options['popupcentertext'] == 1 ? ' surbma-gpga-text-center' : '' );
        $popupverticalcenterValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupverticalcenter'] ) && $options['popupverticalcenter'] == 1 ? 'true' : 'false' );
        $popuplargeValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popuplarge'] ) && $options['popuplarge'] == 1 ? ' uk-modal-dialog-large' : '' );
        $popupdebugValue = ( isset( $options['popupdebug'] ) && is_user_logged_in() && !is_admin() ? $options['popupdebug'] : 0 );
        $popupclosebuttonValue = ( isset( $options['popupclosebutton'] ) ? $options['popupclosebutton'] : 0 );
        $popupclosekeyboardValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && $popupdebugValue == 1 || isset( $options['popupclosekeyboard'] ) && $options['popupclosekeyboard'] == 1 ? 'true' : 'false' );
        $popupclosebgcloseValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupclosebgclose'] ) && $options['popupclosebgclose'] == 1 ? 'true' : 'false' );
        $popupdelayValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupdelay'] ) ? $options['popupdelay'] : 0 );
        $popupdelayValue = 1000 * (int) $popupdelayValue;
        $gaValue = ( isset( $options['ga'] ) ? $options['ga'] : '' );
        $gaanonymizeipValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['gaanonymizeip'] ) ? $options['gaanonymizeip'] : 1 );
        $gascriptValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['gascript'] ) ? $options['gascript'] : 'gtagjs' );
        $popupcookiedaysValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['popupcookiedays'] ) && $options['popupcookiedays'] != 0 ? $options['popupcookiedays'] : 30 );
        $snackbarValue = ( isset( $options['snackbar'] ) ? $options['snackbar'] : 0 );
        $snackbartextValue = ( isset( $options['snackbartext'] ) ? stripslashes( $options['snackbartext'] ) : '' );
        $snackbaropenpopuptextValue = ( isset( $options['snackbaropenpopuptext'] ) ? stripslashes( $options['snackbaropenpopuptext'] ) : '' );
        $snackbarposValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['snackbarpos'] ) ? $options['snackbarpos'] : 'bottom-left' );
        $snackbarfullwidthValue = ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && isset( $options['snackbarfullwidth'] ) ? $options['snackbarfullwidth'] : 0 );
        ?>
<input type="hidden" id="surbma-gpga-popupdebug" value="<?php 
        echo  $popupdebugValue ;
        ?>" />
<script type="text/javascript">
	function surbma_gpga_openModal() {
		UIkit.modal(('#surbma-gpga-modal'), {center: <?php 
        echo  $popupverticalcenterValue ;
        ?>,keyboard: <?php 
        echo  $popupclosekeyboardValue ;
        ?>,bgclose: <?php 
        echo  $popupclosebgcloseValue ;
        ?>}).show();
	}
	function surbma_gpga_openSnackbar() {
		Snackbar.show({
			text: '<?php 
        echo  $snackbartextValue ;
        ?>',
			textColor: '#fff',
			pos: '<?php 
        echo  $snackbarposValue ;
        ?>',
<?php 
        if ( SURBMA_GPGA_PLUGIN_LICENSE == 'valid' && $snackbarfullwidthValue == 1 ) {
            ?>
			customClass: 'snackbar-fullwidth',
<?php 
        }
        ?>
			width: 'auto',
			actionText: '<?php 
        echo  $snackbaropenpopuptextValue ;
        ?>',
			actionTextColor: '#4caf50',
			backgroundColor: '#323232',
			duration: 0,
			onActionClick: function(element) {
				jQuery(element).css('opacity', 0);
				surbma_gpga_openModal();
			}
		});
	}
	<?php 
        
        if ( $popupcookiepolicypageValue == 0 || !is_page( $popupcookiepolicypageValue ) ) {
            ?>
	jQuery(document).ready(function($) {
		<?php 
            
            if ( $snackbarValue != 1 ) {
                ?>
		var show_modal = 0;
		if( $('#surbma-gpga-popupdebug').val() == '1' || !surbma_gpga_readCookie('surbma-gpga') ) {
			show_modal = 1;
		}
		if( show_modal == 1 ) {
			setTimeout(function() {
				surbma_gpga_openModal();
			}, <?php 
                echo  $popupdelayValue ;
                ?>);
		}
		// console.log('show_modal = '+show_modal);
		<?php 
            } else {
                ?>
		// https://www.polonel.com/snackbar/
		var show_snackbar = 0;
		if( $('#surbma-gpga-popupdebug').val() == '1' || !surbma_gpga_readCookie('surbma-gpga') ) {
			show_snackbar = 1;
		}
		if( show_snackbar == 1 ) {
			surbma_gpga_openSnackbar();
		}
		<?php 
            }
            
            ?>
	});
	<?php 
        }
        
        ?>
</script>
<div id="surbma-gpga-modal" class="uk-modal <?php 
        echo  'surbma-gpga-' . $popupthemesValue ;
        echo  $popupdarkmodeValue ;
        echo  $popupcentertextValue ;
        ?>">
	<div class="uk-modal-dialog<?php 
        echo  $popuplargeValue ;
        ?>">
<?php 
        if ( $popupclosebuttonValue == 1 ) {
            ?>
		<a class="uk-modal-close uk-close"></a>
<?php 
        }
        ?>
		<div class="uk-modal-header">
			<h2><a href="#"></a><?php 
        echo  stripslashes( $options['popuptitle'] ) ;
        ?></h2>
		</div>
		<div class="uk-modal-content">
			<?php 
        echo  '<div class="uk-overflow-container">' . stripslashes( wpautop( $popuptextValue ) ) . '</div>' ;
        
        if ( $popupcookiepolicytextValue != '' && $popupcookiepolicypageValue != 0 ) {
            echo  '<p class="cookie-policy"><a href="' . esc_url( get_permalink( $popupcookiepolicypageValue ) ) . '" target="_blank">' ;
            echo  stripslashes( $popupcookiepolicytextValue ) ;
            echo  '</a></p>' ;
        }
        
        ?>
		</div>
		<div class="uk-modal-footer <?php 
        echo  'surbma-gpga-button-' . $popupbuttonalignmentValue ;
        ?>">
<?php 
        
        if ( $popupbutton1displayValue == 1 ) {
            ?>
			<button id="button1" type="button" class="uk-button uk-button-<?php 
            echo  $popupbuttonsizeValue ;
            ?> uk-button-<?php 
            echo  $popupbutton1styleValue ;
            ?> uk-modal-close"><?php 
            echo  stripslashes( $popupbutton1textValue ) ;
            ?></button>
			<span>&nbsp;</span>
<?php 
        }
        
        ?>
			<button id="button2" type="button" class="uk-button uk-button-<?php 
        echo  $popupbuttonsizeValue ;
        ?> uk-button-<?php 
        echo  $popupbutton2styleValue ;
        ?> uk-modal-close"><?php 
        echo  stripslashes( $popupbutton2textValue ) ;
        ?></button>
		</div>
	</div>
</div>
<script type="text/javascript">
	function surbma_gpga_setCookie(cookieName,cookieValue) {
		var name = cookieName;
		var value = cookieValue;
		var d = new Date();
		d.setTime(d.getTime() + (<?php 
        echo  $popupcookiedaysValue ;
        ?>*24*60*60*1000));
		var expires = "expires="+ d.toUTCString();
		document.cookie = name + "=" + value + ";" + expires + ";path=/";
	}
<?php 
        if ( $popupbutton1displayValue == 1 ) {
            ?>
	document.getElementById("button1").onclick = function() {
		surbma_gpga_setCookie('surbma-gpga','no');
	};
<?php 
        }
        ?>
	document.getElementById("button2").onclick = function() {
		surbma_gpga_setCookie('surbma-gpga','yes');
<?php 
        if ( $gaValue != '' ) {
            
            if ( $gascriptValue == 'analyticsjs' ) {
                
                if ( $gaanonymizeipValue == '1' ) {
                    ?>
		// ga('send', 'pageview', { 'anonymizeIp': true });
<?php 
                } else {
                    ?>
		// ga('send', 'pageview');
<?php 
                }
            
            } else {
                
                if ( $gaanonymizeipValue == '1' ) {
                    ?>
		// gtag('config', '<?php 
                    echo  $gaValue ;
                    ?>', { 'anonymize_ip': true });
<?php 
                } else {
                    ?>
		// gtag('config', '<?php 
                    echo  $gaValue ;
                    ?>');
<?php 
                }
            
            }
        
        }
        ?>
	};
</script>
<?php 
    }

}

// End of surbma_gpga_fs function exists condition.