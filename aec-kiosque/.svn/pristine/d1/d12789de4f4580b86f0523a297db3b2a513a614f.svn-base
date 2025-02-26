<?php

/**
 * Initial admin setup
 *
 * Setup of the plugin.
 *
 * @link       https://atl-software.net/
 * @since      1.0.2
 *
 * @package    Aec
 * @subpackage Aec/admin/partials
 */
?>

<div class="wrap aec-admin-wrap">
	<?php Aec_Admin_Settings::render_settings_page_header( 'AEC' ) ?>

    <div class="aec-admin-container aec-admin-container--setup">

        <form name="OptionsForm" method="post" action="options.php" onsubmit="return saveWpOptions();" class="aec-admin-setup-form">
			<?php settings_fields( 'aec-options' ); ?>

            <img src="<?php echo AEC_URL . '/admin/img/logo-aec-kiosque.svg' ?>" alt="aec kiosque" class="aec-admin-setup-form__brand">

            <div class="aec-admin-setup-form_heading">
				<?php echo AEC()->t( 'aec_text_welcome' ) ?>
            </div>
            <p class="aec-admin-setup-form__subheading">
				<?php echo AEC()->t( 'aec_setup_subtitle' ) ?>
            </p>

            <div class="aec-admin-form-group">
                <label for="aec_extranet_api_token" class="aec-admin-form-label"><?php echo AEC()->t( 'aec_label_secret_key' ) ?></label>
                <input id="aec_extranet_api_token" type="text" name="aec_extranet_api_token" value="<?php echo get_option( 'aec_extranet_api_token' ) ?>" class="aec-admin-form-input">
            </div>

            <input type="submit" name="submit" id="submit" class="aec-admin-button aec-admin-button--primary aec-admin-button--form" value="<?php echo AEC()->t( 'aec_label_activate' ) ?>">

            <div class="aec-admin-form__footer">
                <a href="#"><?php echo get_option( 'aec_text_request_help' ) ?></a> <span>AEC V. <?php echo AEC_VERSION ?></span>
            </div>
        </form>

    </div>
</div>

<script>
    function saveWpOptions() {
        if (!document.forms["OptionsForm"]["aec_extranet_api_token"].value) {
            window.alert("Please enter your AEC Secret Key");
            name.focus();
            return false;
        }

        return true;
    }
</script>
