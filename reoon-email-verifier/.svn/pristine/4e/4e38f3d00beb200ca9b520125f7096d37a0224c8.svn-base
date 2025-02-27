<?php

namespace REOONENV\Views;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;

class SettignsView
{

    public function __construct()
    {
    }

    // Display the plugin's settings form
    function reoonev_settings()
    {
        echo '<div class="reo-em-ver-container">';
        echo '<h1 class="reo-em-ver-reo-em-ver-h1">Reoon Email Verifier Settings</h1>';
        echo '<form method="post" action="options.php">';
        settings_fields('reoonev-settings');
        do_settings_sections('reoonev-settings');


?>
        <div class="reo-em-ver-card">
            <div class="reo-em-ver-card-title">
                <h2>API Key</h2>
            </div>

            <div class="reo-em-ver-card-body">

                <div class="reo-em-ver-control">
                    <div style="display:flex;  flex-wrap: wrap;">
                        <label style="width:30%" for="api_key">API Key:</label>
                        <a  style="width:70%;text-align:right" target="_bllank" href="https://emailverifier.reoon.com/api-settings/">Click here to get API key</a>
                    </div>
                    
                    <input type="text" id="reoon_api_key" name="reoonev-settings[reoon_api_key]" placeholder="Enter your API key">
                    <a class="reo-em-ver-btn-reoon" href="#activate-api" id="btn-activate-api">Activate</a>
                </div>

            <?php            
            if(Util::get_reoon_option("reoon_api_key")!=''):?>
                <div class="reo-em-ver-control"><label>Current API Key:</label>
                
                <div style=" flex-direction: row;display:flex">
                    <span><?php echo esc_html(Util::get_encrypted_api_key()); ?></span>
                    <a class="reo-remove-apikey" href="javascript:;">(Remove key)</a>
                </div>

                </div>
                <?php endif;?>

                <?php
                $api = new ReoonApi();
                $account = $api->GetAccountInfo();


                if ($account && $account->status!="error") {
                ?>

                    <div class="reo-em-ver-control"><label>API Key Status:</label> <?php echo esc_html($account->status); ?></div>
					<div class="reo-em-ver-control"><label>API Registered to:</label> <?php echo esc_html(property_exists($account, "user_data") ? $account->user_data->account_email : ""); ?></div>

                <?php
                }
                ?>
            </div>



        </div>


        <?php
        $validation_mode = Util::get_reoon_option("validation_mode");

        
        ?>
        <div class="reo-em-ver-card">
            <div class="reo-em-ver-card-title">
                <h2>Email Validation Mode</h2>
            </div>
            <div class="reo-em-ver-card-body">
                <div class="reo-em-ver-control-inline">
                    <input <?php echo $validation_mode == "quick" ? "checked" : ""; ?> type="radio" id="quick_mode" name="reoonev-settings[validation_mode]" value="quick">
                    <label class="normal-weight" for="quick_mode"><strong>Quick Mode:</strong> <span>The QUICK mode allows the user to verify email address extremly fast withing 0.5 seconds. However, this mode does not support deep verification (individual inbox verification) like the POWER mode.</span>
                    </label>
                </div>
                <div class="reo-em-ver-control-inline">
                    <input <?php echo $validation_mode == "power" ? "checked" : ""; ?> type="radio" id="power_mode" name="reoonev-settings[validation_mode]" value="power">
                    <label class="normal-weight" for="power_mode"><strong>Power Mode:</strong> <span>Power mode checks everything just like the on-page verification
                            for our website. However, the only downside is, that this can take a few seconds to more than a
                            minute to verify an email in depth based on the email provider's server response time.</span>
                    </label>
                </div>

            </div>
        </div>
        <div class="reo-em-ver-card">
            <div class="reo-em-ver-card-title">
                <h2>Email Acceptance Settings</h2>
            </div>

            <div class="reo-em-ver-card-body">
				<input <?php echo Util::get_reoon_option("allow_role_email") == "1" ? "checked" : ""; ?> type="checkbox" id="allow_role_email" name="reoonev-settings[allow_role_email]" value="1">
				<label for="allow_role_email">Allow Role Email Addresses.</label> <br>

				<input <?php echo Util::get_reoon_option("allow_catch_all") == "1" ? "checked" : ""; ?> type="checkbox" id="allow_catch_all" name="reoonev-settings[allow_catch_all]" value="1">
				<label for="allow_catch_all">Allow Catch-All addresses.</label> <br>

				<input <?php echo Util::get_reoon_option("allow_temp_disposable") == "1" ? "checked" : ""; ?> type="checkbox" id="allow_temp_disposable" name="reoonev-settings[allow_temp_disposable]" value="1">
				<label for="allow_temp_disposable">Allow Temporary/Disposable Addresses.</label> <br>

				<input <?php echo Util::get_reoon_option("allow_inbox_full") == "1" ? "checked" : ""; ?> type="checkbox" id="allow_inbox_full" name="reoonev-settings[allow_inbox_full]" value="1">
				<label for="allow_inbox_full">Allow inbox_Full Addresses.</label> <br>

				<input <?php echo Util::get_reoon_option("allow_unknown") == "1" ? "checked" : ""; ?> type="checkbox" id="allow_unknown" name="reoonev-settings[allow_unknown]" value="1">
				<label for="allow_unknown">Allow Unknown Addresses.</label>
			</div>

        </div>


        <div class="reo-em-ver-card">
			<div class="reo-em-ver-card-title">
				<h2>Validate Emails for Forms</h2>
			</div>
			<div class="reo-em-ver-card-body">
				<div>
					<input <?php echo Util::get_reoon_option("formiddable_form") == "1" ? "checked" : ""; ?> type="checkbox" id="formiddable_form" name="reoonev-settings[formiddable_form]" value="1">
					<label for="formiddable_form">Formidable Form</label>
				</div>
				<div>
					<input <?php echo Util::get_reoon_option("gravity_form") == "1" ? "checked" : ""; ?> type="checkbox" id="gravity_form" name="reoonev-settings[gravity_form]" value="1">
					<label for="gravity_form">Gravity Form</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("wp_registration") == "1" ? "checked" : ""; ?> type="checkbox" id="wp_registration" name="reoonev-settings[wp_registration]" value="1">
					<label for="wp_registration">Default WordPress Registration Form</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("checkout_form") == "1" ? "checked" : ""; ?> type="checkbox" id="checkout_form" name="reoonev-settings[checkout_form]" value="1">
					<label for="checkout_form">WooCommerce Checkout Form</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("contact_form_7") == "1" ? "checked" : ""; ?> type="checkbox" id="contact_form_7" name="reoonev-settings[contact_form_7]" value="1">
					<label for="contact_form_7">Contact Form 7</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("ninja_forms") == "1" ? "checked" : ""; ?> type="checkbox" id="ninja_forms" name="reoonev-settings[ninja_forms]" value="1">
					<label for="ninja_forms">Ninja Forms</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("wp_forms") == "1" ? "checked" : ""; ?> type="checkbox" id="wp_forms" name="reoonev-settings[wp_forms]" value="1">
					<label for="wp_forms">WPForms</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("elementor_forms") == "1" ? "checked" : ""; ?> type="checkbox" id="elementor_forms" name="reoonev-settings[elementor_forms]" value="1">
					<label for="elementor_forms">Elementor Forms</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("fluent_forms") == "1" ? "checked" : ""; ?> type="checkbox" id="fluent_forms" name="reoonev-settings[fluent_forms]" value="1">
					<label for="fluent_forms">Fluent Forms</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("forminator_forms") == "1" ? "checked" : ""; ?> type="checkbox" id="forminator_forms" name="reoonev-settings[forminator_forms]" value="1">
					<label for="forminator_forms">Forminator Forms</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("happyforms") == "1" ? "checked" : ""; ?> type="checkbox" id="happyforms" name="reoonev-settings[happyforms]" value="1">
					<label for="happyforms">HappyForms</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("mailmint_form") == "1" ? "checked" : ""; ?> type="checkbox" id="mailmint_form" name="reoonev-settings[mailmint_form]" value="1">
					<label for="mailmint_form">Mail Mint Form</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("best_websoft_forms") == "1" ? "checked" : ""; ?> type="checkbox" id="best_websoft_forms" name="reoonev-settings[best_websoft_forms]" value="1">
					<label for="best_websoft_forms">Contact Form by BestWebSoft</label>
				</div>

				<div>
					<input <?php echo Util::get_reoon_option("wordpress_comment_form") == "1" ? "checked" : ""; ?> type="checkbox" id="wordpress_comment_form" name="reoonev-settings[wordpress_comment_form]" value="1">
					<label for="wordpress_comment_form">WordPress Comment Form</label>
				</div>
			</div>
		</div>


        <div class="reo-em-ver-card">
			<div class="reo-em-ver-card-body">
				<div class="reo-em-ver-control">
					<label for="timeout">Timeout (in Sec):</label>
					<input type="number" id="timeout" name="reoonev-settings[timeout]" value="<?php echo esc_attr(Util::get_reoon_option("timeout")); ?>">
				</div>
				<div class="reo-em-ver-control">
					<label for="custom_error_message">Custom Invalid Error Message:</label>
					<textarea id="custom_error_message" name="reoonev-settings[custom_error_message]"><?php echo esc_textarea(Util::get_reoon_option("custom_error_message")); ?></textarea>
				</div>
			</div>
		</div>



        <div class="reo-em-ver-card">
            <div class="reo-em-ver-card-title">
                <h2>Test Plugin Settings</h2>
            </div>
            <div class="reo-em-ver-card-body">
                <div class="reo-em-ver-control">
                    <input type="email" id="test_email" name="test_email" placeholder="Enter an email address" />
                    <a class="reo-em-ver-btn-reoon" href="#send_test_email" id="send_test_email">Test</a>
                </div>
            </div>
        </div>





        <?php submit_button('Save Changes', 'reo-em-ver-btn-reoon'); ?>



        </form>

        </div>
        <?php Util::get_support_url()?>

        <div id="email-test-model" class="reo-modal">
            <div class="reo-modal-content">
                <div class="reo-modal-header">
                    <h2></h2>
                    <span class="reo-modal-close"></span>
                </div>
                <div class="reo-modal-body">
                    <p></p>
                </div>
            </div>
        </div>


<?php
    }
}
