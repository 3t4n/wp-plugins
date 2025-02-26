<?php
   defined('ABSPATH') || exit;
?>
<div class="wrap">
   <div class="row ai-blog-row">
      <div class="col-100">
         <div class="wrap-row">
            <?php settings_errors(); ?>
            <form method="post" action="options.php">
               <?php
                  // Display settings fields and sections securely.
                  settings_fields('ai_blog_settings_group');
                  do_settings_sections('ai-blog-settings');

                  // Submit button for saving options.
                  submit_button(esc_html__('Save Changes', 'ai-blog-generator'));
               ?>
            </form>
           <!-- Call the Premium Promotion Function -->
           <?php ai_blog_premium_promotion_section(); ?>
      </div>
   </div>
</div>