<div class="forminix-main">
    <div class="forminix-container">

        <?php include FORMINIX_PATH . "backend/templates/views/forms.php"; ?>
        <?php include FORMINIX_PATH . "backend/templates/views/settings.php"; ?>
        <?php include FORMINIX_PATH . "backend/templates/views/entries.php"; ?>
        <?php include FORMINIX_PATH . "backend/templates/views/entry.php"; ?>
        <?php include FORMINIX_PATH . "backend/templates/views/builder.php"; ?>

    </div>

</div>

<div class="forminix_pro_popup_container">
    <div class="forminix_pro_popup_dark_bg"></div>
    <div class="forminix_pro_popup">
        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "forminix_pro_tag.svg") ?>">
        <h3>Go Premium</h3>
        <p>This feature is only available in the Pro Version</p>
        <div class="forminix_pro_popup_action">
            <a class="forminix_get_pro_btn" href="<?php echo esc_url(FORMINIX_SERVER); ?>" target="_blank">Get Pro</a>
            <button onclick="forminix_close_pro_popup()" class="forminix_pro_popup_close_btn">Cancel</button>
        </div>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';
        var host = "<?php echo esc_url(FORMINIX_URL); ?>";
        forminix_forms_init(host);
    });

</script>