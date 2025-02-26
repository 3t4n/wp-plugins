<script>

    var texts = {
        adminAjax:          "<?php echo admin_url('admin-ajax.php') ?>",
        emailNotFound:      "<p><?php esc_html_e( __("E-Mail not found.", "aw_admin-login"), "aw_admin-login" ); ?></p>",
        notAnEmail:         "<p><?php esc_html_e( __("Your E-Mail is not valid.", "aw_admin-login"), "aw_admin-login" ); ?></p>",
        emailJustSended:    "<p><?php esc_html_e( __("We will send you a E-Mail with a link." , "aw_admin-login"), "aw_admin-login" ); ?></p>"+
                            "<p><?php esc_html_e( __("Please check your mails", "aw_admin-login"), "aw_admin-login" ); ?></p>",
        toMuchRequests:     "<p><?php esc_html_e( __("To much requests, please try again in {{ time }} {{ unit }}", "aw_admin-login"), "aw_admin-login" ); ?></p>",
        timerDone:          "<p><?php esc_html_e( __("You can try again.", "aw_admin-login"), "aw_admin-login" ); ?></p>",
        buttonToShowForm:   "<?php esc_html_e( __("LOGIN PER EMAIL", "aw_admin-login"), "aw_admin-login" ); ?>",
        buttonBack:         "<?php esc_html_e( __("BACK", "aw_admin-login"), "aw_admin-login" ); ?>",
        inputLabel:         '<?php esc_html_e( __('E-Mail to verify', "aw_admin-login"), "aw_admin-login" ) ?><input type="text" name="verify" />',
        sec:              [ "<?php esc_html_e( __("second", "aw_admin-login"), "aw_admin-login" ); ?>", "<?php esc_html_e( __("secounds", "aw_admin-login"), "aw_admin-login" ); ?>"],
        min:              [ "<?php esc_html_e( __("minute", "aw_admin-login"), "aw_admin-login" ); ?>", "<?php esc_html_e( __("minutes", "aw_admin-login"), "aw_admin-login" ); ?>"],
        hrs:              [ "<?php esc_html_e( __("hour", "aw_admin-login"), "aw_admin-login" ); ?>", "<?php esc_html_e( __("hours", "aw_admin-login"), "aw_admin-login" ); ?>"],
        day:              [ "<?php esc_html_e( __("day", "aw_admin-login"), "aw_admin-login" ); ?>", "<?php esc_html_e( __("days", "aw_admin-login"), "aw_admin-login" ); ?>"]
    }

</script>