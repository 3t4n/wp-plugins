<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<div class="adp-display-page">
    <div class="adp_customheader">
        <h2><?php echo esc_html__('Add Dummy Blog Posts', 'adp') ?></h2>
    </div>

    <form method='post' action ='<?php echo esc_url(admin_url('admin-post.php')); ?>'>
        <!-- Adding Nonce Field -->
        <?php wp_nonce_field('adp_nonce_action', 'adp_nonce'); ?>

        <div class="adp_wrapper">
            <div class='adp_userInputForm'>
                <div class="adp_get_number_of_post">
                    <label for="blog_number" class="blog_number_label">
                        <?php echo esc_html__('Enter number of post you want to add:', 'adp'); ?>
                    </label>
                    <input type="number" class="blog_number" name="blog_number" min="0" max="50">
                    <input type="hidden" name="action" value="adp_handle_form_submission">
                </div>
                <div>
                    <input class="button-primary" type='submit' name='adp_submit' value='Add'>
                </div>
            </div>
        </div>
    </form>
</div>