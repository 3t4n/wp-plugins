<?php
/**
 * Plugin Options page
 *
 * @package    Ampry Pixel
 * @author     Ampry.com
 * @copyright  Copyright (c) 2020, Ampry
 */?>
<div class="wrap">
  <h2><?php esc_html_e( 'Ampry Pixel Code', 'ampry-pixel-code'); ?></h2>

  <hr />
  <div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
      <div class="postbox">
        <div class="inside">
          <form name="dofollow" action="options.php" method="post">

            <?php settings_fields( 'ampry-pixel-code' ); ?>

            <h3 class="ampry-labels" for="ampry_insert_footer"><?php esc_html_e( 'Your pixel code:', 'ampry-pixel-code'); ?></h3>
            <p>Log into your Ampry.com account, go to <a href="https://app.ampry.com/clientPanel/installPixel">Install Pixel</a> and copy the Pixel Code in the box below</p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="ampry_insert_footer" name="ampry_insert_footer"><?php echo esc_html( get_option( 'ampry_insert_footer' ) ); ?></textarea>

          <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="<?php esc_html_e( 'Save settings', 'ampry-pixel-code'); ?>" />
          </p>

          </form>
        </div>
    </div>
    </div>

    <?php require_once(AMPRY_PLUGIN_DIR . '/inc/sidebar.php'); ?>
    </div>
  </div>
</div>
