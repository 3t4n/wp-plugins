<?php
/** 
 * Header Common
 * 
 * Controls the common methods, properties, and is mostly statically available
 * 
 * @since 7.4
 * @author Kevin Pirnie <me@kpirnie.com>
 * @package Kevin's Security Header Generator
 * 
*/

// We don't want to allow direct access to this
defined( 'ABSPATH' ) || die( 'No direct script access allowed' );

// make sure the class doesn't already exist
if( ! class_exists( 'KCP_CSPGEN_Common' ) ) {

    /** 
     * Class KCP_CSPGEN_Common
     * 
     * This class holds some common methods, properties, and is mostly statically available
     * 
     * @since 7.4
     * @access public
     * @author Kevin Pirnie <me@kpirnie.com>
     * @package Kevin's Security Header Generator
     * 
    */
    class KCP_CSPGEN_Common {

        /** 
         * KCP_CSPGEN_Common::get_our_option
         * 
         * The method is responsible for getting our options
         * 
         * @since 7.4
         * @access public
         * @static
         * @author Kevin Pirnie <me@kpirnie.com>
         * @package Kevin's Security Header Generator
         * 
         * @param string $_opt The name of the option to retrieve
         * @param bool $_network Should we select from the network options?  Default: false
         * 
         * @return var Returns the value from the option
         * 
        */
        public static function get_our_option( string $_opt, bool $_network = false ) {

            // hold the options array
            $_opts = array( );

            // if we're only grabbing a single site's settings
            if( ! $_network ) {

                // get the entire option set
                $_opts = get_option( 'wpsh_settings' );

            // if we're only grabbing the networks's settings
            } else {

                // get the entire option set
                $_opts = get_network_option( null, 'wpsh_settings' );

                // check if we are a child site
                if( $_network && self::is_child_site( ) ) {

                    // get the current site id
                    $_site_id = get_current_blog_id( );

                    // see if we are allowing child site overrides
                    if( isset( $_opts['apply_child_override'] ) && filter_var( $_opts['apply_child_override'], FILTER_VALIDATE_BOOLEAN ) ) {

                        // child site section allowance
                        $_allowance = ( $_opts['child_override_sites_allowed']['child_site_' . $_site_id . '_permissions'] ) ?? array( );

                        // as long as there is 1 of these sections allowed
                        if( in_array( 1, $_allowance ) || in_array( 2, $_allowance ) || in_array( 3, $_allowance ) ) {

                            // grab what is set for the child site's individual options
                            $_cs_opts = ( get_option( 'wpsh_settings' ) ) ?? array( );

                            // if we're allowing general security headers
                            if( in_array( 1, $_allowance ) ) {

                                // we need to overwrite the currently set options for this section, since there are quit a few of them throw them into an array
                                $_override = array( 'apply_to_admin', 'apply_to_rest', 'include_sts', 'include_sts_max_age', 'include_sts_subdomains', 'include_sts_preload', 'include_expectct', 'include_ofs', 'include_ofs_type', 'include_acam', 'include_acam_methods', 'include_acac', 'include_acao', 'include_acao_origin', 'include_mimesniffing', 'include_referrer_policy', 'include_referrer_policy_setting', 'include_download_options', 'include_crossdomain', 'include_upgrade_insecure', 'coep', 'coep_setting', 'corp', 'corp_setting', 'coop', 'coop_setting', );

                                // loop over the overrided
                                foreach( $_override as $_or ) { 

                                    // set the option
                                    $_opts[ $_or ] = $_cs_opts[ $_or ];

                                }

                            }

                            // if we're allowing content security policies
                            if( in_array( 2, $_allowance ) ) {

                                $_orig = self::get_csp_directives( );

                                // we need to overwrite the currently set options for this section, since there are quit a few of them throw them into an array
                                $_override = array( 'generate_csp', 'apply_csp_to_admin', 'include_wordpress_defaults', 'auth_un', 'auth_pw', 'generate_csp_custom_sandbox', 'generate_csp_report_to', );

                                // we need the "unsafe" directives too...
                                

                                // loop over the overrided
                                foreach( $_override as $_or ) { 

                                    // set the option
                                    $_opts[ $_or ] = $_cs_opts[ $_or ];

                                }

                            }

                            // if we're allowing permission policies
                            if( in_array( 3, $_allowance ) ) {

                                // we need to overwrite the currently set options for this section, since there are quit a few of them throw them into an array


                                // loop over the overrided
                                foreach( $_override as $_or ) { 

                                    // set the option
                                    $_opts[ $_or ] = $_cs_opts[ $_or ];

                                }

                            }

                        }

                    }

                }

            }

            // make sure it's an array
            if( is_array( $_opts ) ) {

                // return the option selected
                return $_opts[ $_opt ] ?? null;

            }
            
            // default return
            return null;

        }  

        /** 
         * is_child_site
         * 
         * Returns if the current site is indeed a child site
         * 
         * @since 7.4
         * @access public
         * @static
         * @author Kevin Pirnie <me@kpirnie.com>
         * @package Kevin's Security Header Generator
         * 
         * @return bool Returns true or false
         * 
        */
        public static function is_child_site( ) : bool {

            // first make sure we actually are a multisite
            if( is_multisite( ) ) {

                // if we're in the network admin
                if( is_network_admin( ) ) {

                    // nope, reutrn false
                    return false;

                }

                // get all sites
                $_sites = ( get_sites( array( 'fields' => 'ids' ) ) ) ?? array( );

                // get the current site id
                $_site_id = get_current_blog_id( );

                // strictly check if the current site id is in the sites array
                return in_array( $_site_id, $_sites, true );

            }

            // default
            return true;

        }

        /** 
         * section_is_allowed
         * 
         * Returns if the current site is allowed to access the settings section
         * 
         * @since 7.4
         * @access public
         * @static
         * @author Kevin Pirnie <me@kpirnie.com>
         * @package Kevin's Security Header Generator
         * 
         * @return bool Returns true or false
         * 
        */
        public static function section_is_allowed( int $_section = 0 ) : bool {

            // are we a child site
            $_is_child = KCP_CSPGEN_Common::is_child_site( );

            // if we are not in a child site, we can dump out of this as true
            if( ! $_is_child ) {

                // return
                return true;

            } else {

                // we need to be sure that the network add-on plugin is installed and active or not
                if( ! class_exists( 'SHGN' ) ) {

                    // it's not, so we can dump out of this as true
                    return true;

                }

                // get the network option
                $_master_allow = KCP_CSPGEN_Common::get_our_option( 'child_override_sites_allowed', true );

                // now, get this site's ID
                $_site_id = get_current_blog_id( );

                // grab the right permission set
                $_perm_set = ( $_master_allow[ 'child_site_' . $_site_id . '_permissions' ] ) ?? array( );

                // return if the section we're checking is in this new array
                return in_array( $_section, $_perm_set );

            }

        }

        /** 
         * get_permissions_directives
         * 
         * Generate a return an array containing the Feature/Permission Policies
         * 
         * @since 7.4
         * @access public
         * @static
         * @author Kevin Pirnie <me@kpirnie.com>
         * @package Kevin's Security Header Generator
         * 
         * @return array Returns an array of the feature/permission policies
         * 
        */
        public static function get_permissions_directives( ) : array {

            // setup the list of policies and return them
            return array(
                'accelerometer' => array(
                    'id' => 'fp_accelerometer',
                    'title' => __( 'Accelerometer', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to gather information about the acceleration of the device through the Accelerometer interface.', 'security-header-generator' ),
                ),
                'ambient-light-sensor' => array(
                    'id' => 'fp_ambient-light-sensor',
                    'title' => __( 'Ambient Light Sensor', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to gather information about the amount of light in the environment around the device through the AmbientLightSensor interface.', 'security-header-generator' ),
                ),
                'autoplay' => array(
                    'id' => 'fp_autoplay',
                    'title' => __( 'Autoplay', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to autoplay media requested through the HTMLMediaElement interface. When this policy is disabled and there were no user gestures, the Promise returned by HTMLMediaElement.play() will reject with a DOMException. The autoplay attribute on &lt;audio&gt; and &lt;video&gt; elements will be ignored.', 'security-header-generator' ),
                ),
                'camera' => array(
                    'id' => 'fp_camera',
                    'title' => __( 'Camera', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use video input devices. When this policy is disabled, the Promise returned by getUserMedia() will reject with a NotAllowedError DOMException.', 'security-header-generator' ),
                ),
                'display-capture' => array(
                    'id' => 'fp_display-capture',
                    'title' => __( 'Display Capture', 'security-header-generator' ),
                    'desc' => __( 'Controls whether or not the current document is permitted to use the getDisplayMedia() method to capture screen contents. When this policy is disabled, the promise returned by getDisplayMedia() will reject with a NotAllowedError if permission is not obtained to capture the display\'s contents.', 'security-header-generator' ),
                ),
                'encrypted-media' => array(
                    'id' => 'fp_encrypted-media',
                    'title' => __( 'Encrypted Media', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Encrypted Media Extensions API (EME). When this policy is disabled, the Promise returned by Navigator.requestMediaKeySystemAccess() will reject with a DOMException.', 'security-header-generator' ),
                ),
                'fullscreen' => array(
                    'id' => 'fp_fullscreen',
                    'title' => __( 'Full Screen', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use Element.requestFullScreen(). When this policy is disabled, the returned Promise rejects with a TypeError.', 'security-header-generator' ),
                ),
                'geolocation' => array(
                    'id' => 'fp_geolocation',
                    'title' => __( 'Geo Location', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Geolocation Interface. When this policy is disabled, calls to getCurrentPosition() and watchPosition() will cause those functions\' callbacks to be invoked with a GeolocationPositionError code of PERMISSION_DENIED', 'security-header-generator' ),
                ),
                'gyroscope' => array(
                    'id' => 'fp_gyroscope',
                    'title' => __( 'Gyroscope', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to gather information about the orientation of the device through the Gyroscope interface', 'security-header-generator' ),
                ),

                'hid' => array(
                    'id' => 'fp_hid',
                    'title' => __( 'Human Interface Device', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the WebHID API to connect to uncommon or exotic human interface devices such as alternative keyboards or gamepads.', 'security-header-generator' ),
                ),
                'identity-credentials-get' => array(
                    'id' => 'fp_icg',
                    'title' => __( 'Identity Credentials Get', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Federated Credential Management API (FedCM), and more specifically the navigator.credentials.get() method with an identity option.', 'security-header-generator' ),
                ),
                'idle-detection' => array(
                    'id' => 'fp_idle',
                    'title' => __( 'Idle Detection', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Idle Detection API to detect when users are interacting with their devices, for example to report "available"/"away" status in chat applications.', 'security-header-generator' ),
                ),
                
                'magnetometer' => array(
                    'id' => 'fp_magnetometer',
                    'title' => __( 'Magnetometer', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to gather information about the orientation of the device through the Magnetometer interface', 'security-header-generator' ),
                ),
                'microphone' => array(
                    'id' => 'fp_microphone',
                    'title' => __( 'Microphone', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use audio input devices. When this policy is disabled, the Promise returned by MediaDevices.getUserMedia() will reject with a NotAllowedError.', 'security-header-generator' ),
                ),
                'midi' => array(
                    'id' => 'fp_midi',
                    'title' => __( 'MIDI', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Web MIDI API. When this policy is disabled, the Promise returned by Navigator.requestMIDIAccess() will reject with a DOMException', 'security-header-generator' ),
                ),
                'payment' => array(
                    'id' => 'fp_payment',
                    'title' => __( 'Payment', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Payment Request API. When this policy is enabled, the PaymentRequest() constructor will throw a SecurityError DOMException', 'security-header-generator' ),
                ),
                'picture-in-picture' => array(
                    'id' => 'fp_picture-in-picture',
                    'title' => __( 'Picture in Picture', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to play a video in a Picture-in-Picture mode via the corresponding API', 'security-header-generator' ),
                ),
                'publickey-credentials-create' => array(
                    'id' => 'fp_publickey-credentials-create',
                    'title' => __( 'Publicket Credentials Create', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Web Authentication API to create new WebAuthn credentials, i.e., via navigator.credentials.create({publicKey}).', 'security-header-generator' ),
                ),
                'publickey-credentials-get' => array(
                    'id' => 'fp_publickey-credentials-get',
                    'title' => __( 'Publicket Credentials Get', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Web Authentication API to retrieve already stored public-key credentials, i.e. via navigator.credentials.get({publicKey: ..., ...})', 'security-header-generator' ),
                ),
                'screen-wake-lock' => array(
                    'id' => 'fp_screen-wake-lock',
                    'title' => __( 'Screen Wake Lock', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use Screen Wake Lock API to indicate that the device should not dim or turn off the screen.', 'security-header-generator' ),
                ),
                'serial' => array(
                    'id' => 'fp_serial',
                    'title' => __( 'Serial', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Web Serial API to communicate with serial devices, either directly connected via a serial port, or via USB or Bluetooth devices emulating a serial port.', 'security-header-generator' ),
                ),
                'sync-xhr' => array(
                    'id' => 'fp_sync-xhr',
                    'title' => __( 'Sync XHR', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to make synchronous XMLHttpRequest requests', 'security-header-generator' ),
                ),
                'usb' => array(
                    'id' => 'fp_usb',
                    'title' => __( 'USB', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the WebUSB API', 'security-header-generator' ),
                ),
                'web-share' => array(
                    'id' => 'fp_web-share',
                    'title' => __( 'Web Share', 'security-header-generator' ),
                    'desc' => __( 'Controls whether the current document is allowed to use the Navigator.share() method of the Web Share API to share text, links, images, and other content to arbitrary destinations of the user\'s choice.', 'security-header-generator' ),
                ),
                'xr-spatial-tracking' => array(
                    'id' => 'fp_xr-spatial-tracking',
                    'title' => __( 'XR Spatial Tracking', 'security-header-generator' ),
                    'desc' => __( 'Controls whether or not the current document is allowed to use the WebXR Device API to interact with a WebXR session', 'security-header-generator' ),
                ),
            );

        }

        /** 
         * get_csp_directives
         * 
         * Generate a return an array containing the Content Security Policy directives
         * 
         * @since 7.4
         * @access public
         * @static
         * @author Kevin Pirnie <me@kpirnie.com>
         * @package Kevin's Security Header Generator
         * 
         * @return array Returns an array of the Content Security Policy directives
         * 
        */
        public static function get_csp_directives( ) : array {

            // return the array of CSP directives
            return array(
                'report-to' => array(
                    'id' => 'generate_csp_report_to',
                    'title' => __( 'Report To', 'security-header-generator' ),
                    'desc' => __( 'The Content-Security-Policy Report-To HTTP response header field instructs the user agent to store reporting endpoints for an origin.', 'security-header-generator' ),
                ),
                'child-src' => array(
                    'id' => 'generate_csp_custom_child',
                    'title' => __( 'Child Source', 'security-header-generator' ),
                    'desc' => __( 'Defines the valid sources for web workers and nested browsing contexts loaded using elements such as &lt;frame&gt; and &lt;iframe&gt;.', 'security-header-generator' ),
                ),
                'connect-src' => array(
                    'id' => 'generate_csp_custom_connect',
                    'title' => __( 'Connect/Ajax/XHR Source', 'security-header-generator' ),
                    'desc' => __( 'Restricts the URLs which can be loaded using script interfaces', 'security-header-generator' ),
                ),
                'default-src' => array(
                    'id' => 'generate_csp_custom_defaults',
                    'title' => __( 'Default Source', 'security-header-generator' ),
                    'desc' => __( 'Serves as a fallback for the other fetch directives.', 'security-header-generator' ),
                ),
                'font-src' => array(
                    'id' => 'generate_csp_custom_fonts',
                    'title' => __( 'Font Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for fonts loaded using @font-face.', 'security-header-generator' ),
                ),
                'form-action' => array(
                    'id' => 'generate_csp_custom_forms',
                    'title' => __( 'Form Action', 'security-header-generator' ),
                    'desc' => __( 'Restricts the URLs which can be used as the target of a form submissions from a given context.', 'security-header-generator' ),
                ),
                'frame-src' => array(
                    'id' => 'generate_csp_custom_frames',
                    'title' => __( 'Frame Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for nested browsing contexts loading using elements such as &lt;frame&gt; and &lt;iframe&gt;.', 'security-header-generator' ),
                ),
                'frame-ancestors' => array(
                    'id' => 'generate_csp_custom_frame_ancestors',
                    'title' => __( 'Frame Ancestors', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid parents that may embed a page using &lt;frame&gt;, &lt;iframe&gt;, &lt;object&gt;, &lt;embed&gt;, or &lt;applet&gt;.', 'security-header-generator' ),
                ),
                'img-src' => array(
                    'id' => 'generate_csp_custom_images',
                    'title' => __( 'Image Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources of images and favicons.', 'security-header-generator' ),
                ),
                'manifest-src' => array(
                    'id' => 'generate_csp_custom_manifests',
                    'title' => __( 'Manifest Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources of application manifest files.', 'security-header-generator' ),
                ),
                'media-src' => array(
                    'id' => 'generate_csp_custom_media',
                    'title' => __( 'Media Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for loading media using the &lt;audio&gt; , &lt;video&gt; and &lt;track&gt; elements.', 'security-header-generator' ),
                ),
                'object-src' => array(
                    'id' => 'generate_csp_custom_objects',
                    'title' => __( 'Object Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for the &lt;object&gt;, &lt;embed&gt;, and &lt;applet&gt; elements.', 'security-header-generator' ),
                ),
                'sandbox' => array(
                    'id' => 'generate_csp_custom_sandbox',
                    'title' => __( 'Sandbox', 'security-header-generator' ),
                    'desc' => __( 'Applies restrictions to a page\'s actions including preventing popups, preventing the execution of plugins and scripts, and enforcing a same-origin policy. Please see here for more information: <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/sandbox" target="_blank">https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/sandbox</a>', 'security-header-generator' ),
                ),
                'script-src' => array(
                    'id' => 'generate_csp_custom_scripts',
                    'title' => __( 'Script Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for JavaScript.', 'security-header-generator' ),
                ),
                'script-src-elem' => array(
                    'id' => 'generate_csp_custom_scripts_elem',
                    'title' => __( 'Script Source Elements', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for JavaScript &lt;script&gt; elements.', 'security-header-generator' ),
                ),
                'script-src-attr' => array(
                    'id' => 'generate_csp_custom_scripts_attr',
                    'title' => __( 'Script Source Attributes', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for JavaScript inline event handlers.', 'security-header-generator' ),
                ),
                'style-src' => array(
                    'id' => 'generate_csp_custom_styles',
                    'title' => __( 'Style Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for stylesheets.', 'security-header-generator' ),
                ),
                'style-src-elem' => array(
                    'id' => 'generate_csp_custom_styles_elem',
                    'title' => __( 'Style Source Elements', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for stylesheets &lt;style&gt; elements and &lt;link&gt; elements with rel="stylesheet".', 'security-header-generator' ),
                ),
                'style-src-attr' => array(
                    'id' => 'generate_csp_custom_styles_attr',
                    'title' => __( 'Style Source Attributes', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for inline styles applied to individual DOM elements.', 'security-header-generator' ),
                ),
                'worker-src' => array(
                    'id' => 'generate_csp_custom_workers',
                    'title' => __( 'Worker Source', 'security-header-generator' ),
                    'desc' => __( 'Specifies valid sources for Worker, SharedWorker, or ServiceWorker scripts.', 'security-header-generator' ),
                ),
            );

        }

    }

}
