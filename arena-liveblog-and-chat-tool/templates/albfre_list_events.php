<?php

/**
 * @package Arena List Events
 * @author Arena
 * @copyright (C) 2017- Arena
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<?php
if (get_option('albfre_user_token')) {
?>
  <div class="albfre-list-events">
    <header class="albfre-list-events--header">
      <a href="https://dashboard.arena.im" target="_blank" class="albfre-list-events--header--logo">
        <?php 
        $logo_url = plugins_url('assets/albfre_logo-bg.png', dirname(__FILE__));
        $logo_2x_url = plugins_url('assets/albfre_logo-bg@2x.png', dirname(__FILE__));
        
        $logo_attr = array(
            'srcset' => $logo_url . ' 1x, ' . $logo_2x_url . ' 2x',
            'class' => 'albfre-logo'
        );
        
        echo wp_get_attachment_image(
            albfre_get_logo_attachment_id(), 
            'full',
            false,
            $logo_attr
        );
        ?>
      </a>
      <div class='albfre-list-events--header--search--input--wrapper'>
        <input type="text" class="albfre-list-events--header--search--input" placeholder="<?php esc_attr_e('Search', 'albfre'); ?>" onkeyup="window.albfreWPPlugin.handleSearchKeyup(event)" />
        <span class='albfre-list-events--header--search--input--icon'></span>
      </div>
      <span onclick="window.albfreWPPlugin.refreshPage()" class="albfre-list-events--header--reload">
        <?php 
        echo wp_get_attachment_image(
            albfre_get_reload_icon_attachment_id(),
            'full',
            false,
            array('class' => 'albfre-reload-icon')
        );
        ?>
      </span>
    </header>
    <div class="albfre-list-events--list">
      <div class="albfre-sp albfre-sp-circle"></div>
    </div>
  </div>
<?php
} else {
?>
  <div class="albfre-list-events--login">
    <div class="albfre-list-events--login--wrapper">
      <div class="albfre-list-events--login--title">
        <?php esc_html_e('Add your events', 'albfre'); ?>
      </div>
      <div class="albfre-list-events--login--description">
        <?php esc_html_e("In order to see the events you've created on Arena.im, you must log in on Settings > Arena.", 'albfre'); ?>
      </div>
      <a href="<?php echo esc_url(admin_url('options-general.php?page=albfre_plugin')); ?>" target="_blank" class="albfre-list-events--login--button">LOG IN</a>
      <div class="albfre-list-events--login--footer">
        <?php esc_html_e('After login,', 'albfre'); ?> <span class="albfre-list-events--login--footer--refresh" onclick="window.albfreWPPlugin.refreshPage()"><?php esc_html_e('REFRESH', 'albfre'); ?></span> <?php esc_html_e('this page.', 'albfre'); ?>
      </div>
    </div>
  </div>
<?php
}
?>