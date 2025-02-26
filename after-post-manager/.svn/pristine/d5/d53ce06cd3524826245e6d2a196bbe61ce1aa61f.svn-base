<?php
/**** Function for creating the plugin form. ****/
function apm_afterpost_manager_page_callback() {
  ?>
    <div class="wrap">
      <?php apm_after_post_manager_header(); ?>
	    <form method="post" action="options.php">
	      <?php settings_errors(); ?>
	      <?php settings_fields( 'apm_afterpost_manager_options' ); ?>
	      <?php do_settings_sections( 'apm_afterpost_manager_options' ); ?>
	      <hr>
	      <?php submit_button(); ?>
	    </form><!-- form -->
      </div><!-- #apm-after-post-manager-page-wrap -->
    </div><!-- .wrap -->
  <?php
}