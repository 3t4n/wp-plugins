<?php

/** 
 *   Enqueue your Plugin styles and scripts 
 *   use time() instead of a proper versioning to avoid caching when developing
 */
add_action('wp_enqueue_scripts', 'aafa_fronted_enqueue_scripts');
add_action('admin_enqueue_scripts', 'aafa_admin_enqueue_scripts');
add_action('wp_footer', 'aafa_firebase_config');
add_action('admin_footer', 'aafa_firebase_config');

if (!function_exists('aafa_fronted_enqueue_scripts')) {
    function aafa_fronted_enqueue_scripts()
    {
        wp_enqueue_script("jquery");

        wp_enqueue_style('main-style', AAFA_PLUGIN_URL . '/assets/css/fronted.css', [], AAFA_PLUGIN_VER, 'all');

        // Ph number CSS add flags image to css/img folder
        wp_enqueue_style('intlTelInput', AAFA_PLUGIN_URL . 'assets/css/intlTelInput.css', [], AAFA_PLUGIN_VER, 'all');

        # load all firebase cdn
        wp_enqueue_script('intlTelInput', AAFA_PLUGIN_URL . 'assets/js/intlTelInput.js', [], AAFA_PLUGIN_VER, true);
        wp_enqueue_script('firebase-app', AAFA_PLUGIN_URL . 'assets/js/firebase-app.js', [], AAFA_PLUGIN_VER, true);
        // wp_enqueue_script('firestore-firestore', AAFA_PLUGIN_URL . 'assets/js/firebase-firestore.js', [], AAFA_PLUGIN_VER, true);
        wp_enqueue_script('firestore-databse', AAFA_PLUGIN_URL . 'assets/js/firebase-database.js', [], AAFA_PLUGIN_VER, true);
        wp_enqueue_script('firebase-auth', AAFA_PLUGIN_URL . 'assets/js/firebase-auth.js', [], AAFA_PLUGIN_VER, true);
        wp_enqueue_script('firebase-main', AAFA_PLUGIN_URL . 'assets/js/firebase-main.js', [], AAFA_PLUGIN_VER, true);
    }
}

if (!function_exists('aafa_admin_enqueue_scripts')) {
    function aafa_admin_enqueue_scripts()
    {
        #color picker 
        if (isset($_GET['tab']) && $_GET['tab'] == 'fa_style') {
            wp_enqueue_style('jquery-ui-style', AAFA_PLUGIN_URL . 'assets/css/spectrum.min.css', [], AAFA_PLUGIN_VER, 'all');
            wp_enqueue_script('jquery-ui', AAFA_PLUGIN_URL . 'assets/js/spectrum.min.js', [], AAFA_PLUGIN_VER, true);
        }

        wp_enqueue_style('admin-style', AAFA_PLUGIN_URL . '/assets/css/admin.css', [], AAFA_PLUGIN_VER, 'all');
        wp_enqueue_style('fontawesome-style', AAFA_PLUGIN_URL . 'assets/css/all.min.css', [], AAFA_PLUGIN_VER, 'all');

        # load all firebase cdn
        wp_enqueue_script('firebase-app', AAFA_PLUGIN_URL . 'assets/js/firebase-app.js', [], AAFA_PLUGIN_VER, true);
        wp_enqueue_script('firestore-databse', AAFA_PLUGIN_URL . 'assets/js/firebase-database.js', [], AAFA_PLUGIN_VER, true);
        wp_enqueue_script('firebase-auth', AAFA_PLUGIN_URL . 'assets/js/firebase-auth.js', [], AAFA_PLUGIN_VER, true);
        wp_enqueue_script('fa-admin', AAFA_PLUGIN_URL . 'assets/js/admin.js', [], AAFA_PLUGIN_VER, true);
    }
}
if (!function_exists('aafa_firebase_config')) {
    function aafa_firebase_config()
    {
        $firebase_config = get_option('fa_firebase_config', true);
        $settings_config = get_option('fa_settings_config', true);
        $config_set = false;
        if (!empty($firebase_config) && is_array($firebase_config)) {
            if (count(array_filter($firebase_config)) == count($firebase_config)) {
                $config_set = true;
            }
        }
?>
        <script>
            // Your web app's Firebase configuration
            <?php
            if (!is_admin()) {
            ?>
                var ajax_url = "<?php echo esc_url(admin_url('admin-ajax.php')); ?>";
                var nonce = "<?php echo esc_html(wp_create_nonce('ajax-nonce')); ?>";
                var current_page = "<?php echo esc_html(get_the_ID()); ?>";
                var config_set = "<?php echo esc_html($config_set) ?>";
                var fa_ph_error = "<?php echo esc_html_e(!empty($settings_config['fa_ph_error']) ? $settings_config['fa_ph_error'] : 'Invalid Phone Number', 'authentication-via-otp-using-Firebase'); ?>";
                var fa_email_error = "<?php echo esc_html_e(!empty($settings_config['fa_email_error']) ? $settings_config['fa_email_error'] : 'Invalid Email Address', 'authentication-via-otp-using-Firebase'); ?>";
                var fa_otp_sent = "<?php echo esc_html_e(!empty($settings_config['fa_otp_sent']) ? $settings_config['fa_otp_sent'] : 'Confirmation Code Sent Successfully', 'authentication-via-otp-using-Firebase'); ?>";
                var fa_otp_fail = "<?php echo esc_html_e(!empty($settings_config['fa_otp_fail']) ? $settings_config['fa_otp_fail'] : 'Invalid Confirmation code', 'authentication-via-otp-using-Firebase'); ?>";
                var fa_otp_verified = "<?php echo esc_html_e(!empty($settings_config['fa_otp_verified']) ? $settings_config['fa_otp_verified'] : 'Confirmation Code Verified Successfully', 'authentication-via-otp-using-Firebase'); ?>";
                var fa_step1_text = "<?php echo esc_html_e(!empty($settings_config['step1_title_text']) ? $settings_config['step1_title_text'] : 'Enter Your Phone Number', 'authentication-via-otp-using-Firebase'); ?>";
                var fa_step2_text = "<?php echo esc_html_e(!empty($settings_config['step2_title_text']) ? $settings_config['step2_title_text'] : 'Enter conformation code', 'authentication-via-otp-using-Firebase'); ?>";

            <?php
            }
            ?>

            var frAdmin = "<?php echo admin_url(); ?>"
            var firebaseConfig = {
                apiKey: "<?php echo esc_html_e($firebase_config['apiKey'], 'authentication-via-otp-using-Firebase') ?>",
                authDomain: "<?php echo esc_html_e($firebase_config['authDomain'], 'authentication-via-otp-using-Firebase') ?>",
                databaseURL: "<?php echo esc_html_e($firebase_config['databaseURL'], 'authentication-via-otp-using-Firebase') ?>",
                projectId: "<?php echo esc_html_e($firebase_config['projectId'], 'authentication-via-otp-using-Firebase') ?>",
                storageBucket: "<?php echo esc_html_e($firebase_config['storageBucket'], 'authentication-via-otp-using-Firebase') ?>",
                messagingSenderId: "<?php echo esc_html_e($firebase_config['messagingSenderId'], 'authentication-via-otp-using-Firebase') ?>",
                appId: "<?php echo esc_html_e($firebase_config['appId'], 'authentication-via-otp-using-Firebase') ?>",
                measurementId: "<?php echo esc_html_e($firebase_config['measurementId'], 'authentication-via-otp-using-Firebase') ?>"
            };
        </script>
<?php
    }
}
