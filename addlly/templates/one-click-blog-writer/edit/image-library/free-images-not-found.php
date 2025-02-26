<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="no-data-wrapper">
    <div class="d-flex justify-content-center flex-column align-items-center p-1">
        <div class="icon d-flex justify-content-center flex-column align-items-center">
            <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/not-found-icon.svg" alt="add">
        </div>
        <p><?php esc_html_e('Images Not Available.', 'addlly'); ?></p>
    </div>
</div>