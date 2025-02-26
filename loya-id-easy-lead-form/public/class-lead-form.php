<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Loya_ID_ELF_Lead_Form {

    public function init() {
        add_shortcode('loya_id_easy_lead_form', array($this, 'render_lead_form'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('init', array($this, 'handle_form_submission'));
    }

    public function enqueue_assets() {
        // Enqueue the external CSS file
        wp_enqueue_style('loya_id_elf_css', LOYA_ID_ELF_URL . 'assets/css/lead-form.css');

        // Enqueue an external JavaScript file
        wp_enqueue_script('loya_id_elf_js', LOYA_ID_ELF_URL . 'assets/js/lead-form.js', array('jquery'), null, true);
    }

    // Render the form
    public function render_lead_form() {
        ob_start();
        $options = get_option('loya_id_elf_options');
        $recaptcha_site_key = $options["recaptcha_site_key"] ?? null;
        ?>
        <?php if(!$recaptcha_site_key){ ?>
        <script>
            alert('reCAPTCHA Key is Required, You can get it from https://google.com');
        </script>
        <?php } ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <form id="loya-id-lead-form" class="form-horizontal" method="post">
            <h3 class="text-center" style="text-align: center;margin: 2px;font-weight: 600;">LOYA Lead Form</h3>
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName" style="width:97%;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName" style="width:97%;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" style="width:97%;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone" style="width:97%;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Message</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="message" name="message" style="width:97%;"></textarea>
                </div>
            </div>
            <div class="g-recaptcha" data-sitekey="<?= $recaptcha_site_key ?>" style="margin-bottom:10px;"></div>
            <!-- Include a nonce for security -->
            <?php wp_nonce_field('submit_lead_form_nonce', 'submit_lead_form_nonce_field'); ?>

            <input type="submit" name="submit_lead_form" value="Submit" style="background-color:#1c75bb;">
        </form>
        <?php
        return ob_get_clean();
    }

    // Handle form submission
    public function handle_form_submission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_lead_form'])) {
            // Verify nonce
            if (!isset($_POST['submit_lead_form_nonce_field']) || !wp_verify_nonce($_POST['submit_lead_form_nonce_field'], 'submit_lead_form_nonce')) {
                wp_die(__('Security check failed.', 'loya-id-easy-lead-form'));
            }

            // Sanitize and validate inputs
            $firstName = isset($_POST['firstName']) ? sanitize_text_field($_POST['firstName']) : '';
            $lastName = isset($_POST['lastName']) ? sanitize_text_field($_POST['lastName']) : '';
            $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
            $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

            if (empty($firstName) || empty($lastName) || empty($email) || empty($phone)) {
                wp_die(__('All fields are required.', 'loya-id-easy-lead-form'));
            }

            // API URL and token
            $api_url = LOYA_ID_API_URL;
            $api_key = LOYA_ID_API_KEY;
            $options = get_option('loya_id_elf_options');
            // $api_key = isset($options['api_key']) ? sanitize_text_field($options['api_key']) : '';
            $token = isset($options['token']) ? sanitize_text_field($options['token']) : '';

            $recaptcha_site_key = isset($options['recaptcha_site_key']) ? sanitize_text_field($options['recaptcha_site_key']) : '';
            $recaptcha_secret_key = isset($options['recaptcha_secret_key']) ? sanitize_text_field($options['recaptcha_secret_key']) : '';

            if (empty($api_key) || empty($token)) {
                wp_die(__('API key or token is missing. Please configure the plugin settings.', 'loya-id-easy-lead-form'));
            }

            $secretKey = $recaptcha_secret_key;
            $recaptchaResponse = $_POST['g-recaptcha-response'];
            $userIP = $_SERVER['REMOTE_ADDR'];

            // Verify the response
            $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
            $response = file_get_contents($verifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse . '&remoteip=' . $userIP);
            $responseKeys = json_decode($response, true);

            if (!$responseKeys['success']) {
                wp_die(__('reCAPTCHA verification failed. Please try again.', 'loya-id-easy-lead-form'));
            }

            if(empty($recaptcha_site_key) || empty($recaptcha_secret_key)){
                wp_die(__('reCAPTCHA key is missing. Please configure the plugin settings.', 'loya-id-easy-lead-form'));
            }

            // Prepare the JSON body
            $body = json_encode(array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
            ));

            // Send the POST request to the API
            $response = wp_remote_post($api_url, array(
                'headers' => array(
                    'Authorization' => 'Bearer ' . $api_key,
                    'token' => $token,
                    'Content-Type' => 'application/json',
                ),
                'body' => $body,
                'method' => 'POST',
            ));

            // Handle the response
            if (is_wp_error($response)) {
                error_log('Error: ' . $response->get_error_message());
                wp_die(__('There was an error submitting the form. Please try again later.', 'loya-id-easy-lead-form'));
            } else {
                $response_code = wp_remote_retrieve_response_code($response);
                $response_body = wp_remote_retrieve_body($response);

                if ($response_code === 200) {
                    // wp_safe_redirect(home_url('/thank-you'));
                    echo '<script>
                        alert("Thank you! Your message has been sent.");
                        window.history.back();  // Redirect back to the previous page
                    </script>';
                    exit;
                } else {
                    error_log('API Response: ' . $response_body);
                    wp_die(__('There was an issue with the submission. Please try again later.', 'loya-id-easy-lead-form'));
                }
            }
        }
    }
}

$loya_id_elf = new Loya_ID_ELF_Lead_Form();
$loya_id_elf->init();
