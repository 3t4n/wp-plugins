<?php

/**
 * @package Arena Widget for Wordpress
 * @author Arena
 * @copyright (C) 2017- Arena
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
  <div class="albfre-settings">
    <div class="albfre-settings--header">
      <div class="albfre-settings--logo">
        <?php 
        $logo_id = get_option('albfre_logo_image_id');
        if ($logo_id) {
            echo wp_get_attachment_image(
                $logo_id,
                'full',
                false,
                array(
                    'srcset' => wp_get_attachment_image_srcset($logo_id)
                )
            );
        } else {
            // Fallback to direct URL if attachment ID not set
            $logo_url = plugins_url( 'assets/albfre_logo-bg.png' , dirname(__FILE__) );
            $logo_2x_url = plugins_url( 'assets/albfre_logo-bg@2x.png' , dirname(__FILE__) );
            printf(
                '<img src="%s" srcset="%s 2x">',
                esc_url($logo_url),
                esc_url($logo_2x_url)
            );
        }
        ?>
      </div>
    </div>
    <div class="albfre-settings--body">
      <div class="albfre-sp albfre-sp-circle albfre-settings--body--sp"></div>
<?php
if (!get_option('albfre_user_token')) {
?>
      <div class="albfre-settings--body--login">
        <div class="albfre-settings--body--title">
          <?php echo esc_html__('Sign in to your Arena.im account', 'albfre'); ?>
        </div>
        <div class="albfre-settings--form">
          <div class="albfre-settings--form--group">
            <label class="albfre-settings--form--label"><?php echo esc_html__('Email', 'albfre'); ?></label>
            <input class="albfre-settings--form--input albfre-settings--email" onkeydown="window.albfreWPPluginPreferences.arenaHandleKeydown(event)"  type="email" name="email" placeholder="<?php echo esc_attr__('Email', 'albfre'); ?>" />
          </div>
          <div class="albfre-settings--form--group">
            <label class="albfre-settings--form--label"><?php echo esc_html__('Password', 'albfre'); ?></label>
            <input class="albfre-settings--form--input albfre-settings--password" onkeydown="window.albfreWPPluginPreferences.arenaHandleKeydown(event)" type="password" name="password" placeholder="<?php echo esc_attr__('Password', 'albfre'); ?>" />
          </div>
          <button class="albfre-settings--form--button" onclick="window.albfreWPPluginPreferences.arenaLogin()"><?php echo esc_html__('Login', 'albfre'); ?></button>
          <div class="albfre-form--error"><?php echo esc_html__("The password you've entered is incorrect.", 'albfre'); ?></div>
        </div>
        <div>
          <?php 
            echo esc_html__("Don't have an Arena.im account?", 'albfre'); ?> 
            <?php echo esc_html__('Go to', 'albfre'); ?> 
            <a target="_blank" class="albfre-settings--arena--link" href="https://arena.im">Arena.im</a> 
            <?php echo esc_html__('and create one!', 'albfre'); 
          ?>
        </div>
      </div>
<?php
} else {
?>
  <script>
    window.albfreWPPluginPreferences.fetchUserAccounts()
  </script>
  <div class="albfre-settings--body--title">
    <?php 
    /* translators: %1$s: user's display name */
    printf(esc_html__('Welcome, %1$s!', 'albfre'), esc_html(get_option('albfre_user_displayName'))); 
    ?>
  </div>
  <div class="albfre-settings--body--welcome">
    <?php esc_html_e('Now you can add your live events instantly to your website clicking on the Arena icon in the wordpress editor page. Simply create your events at dashboard.arena.im and insert to your blog post. Enjoy it!', 'albfre'); ?>
  </div>
  <div class="albfre-settings--body--accounts">
    <div class="albfre-settings--body--accounts--title">
      <?php echo esc_html__('ACCOUNTS, ORGANIZATIONS AND SITES', 'albfre'); ?>
    </div>
    <div class="albfre-settings--body--accounts--form">
      <div class="albfre-settings--body--accounts--form--label">
        <?php echo esc_html__('Select your account', 'albfre'); ?>
      </div>
      <select class="albfre-settings--body--accounts--form--select albfre-settings--body--accounts--form--select--acounts" onchange="window.albfreWPPluginPreferences.arenaSetAccount()">
      </select>
      <div class="albfre-settings--body--accounts--form--label">
        <?php echo esc_html__('Select your site', 'albfre'); ?>
      </div>
      <select class="albfre-settings--body--accounts--form--select albfre-settings--body--accounts--form--select--sites">
      </select>
      <button class="albfre-settings--body--accounts--form--button" onclick="window.albfreWPPluginPreferences.arenaSaveAccountSite()">
        <?php echo esc_html__('Save', 'albfre'); ?>
      </button>
      <div class="albfre-settings--body--accounts--form--success">
        <?php 
        $check_icon_id = get_option('albfre_check_icon_id');
        if ($check_icon_id) {
            echo wp_get_attachment_image(
                $check_icon_id,
                'full',
                false,
                array('class' => 'albfre-settings--body--accounts--form--success--check')
            );
        } else {
            // Fallback to direct URL if attachment ID not set
            $check_icon_url = plugins_url( 'assets/albfre_check.png' , dirname(__FILE__) );
            printf(
                '<img src="%s" class="albfre-settings--body--accounts--form--success--check">',
                esc_url($check_icon_url)
            );
        }
        ?>
        <?php echo esc_html__('Changes saved successfully', 'albfre'); ?>
      </div>
    </div>
  </div>
  <button class="albfre-settings--form--button albfre-settings--form--button-logout" onclick="window.albfreWPPluginPreferences.arenaLogout()"><?php echo esc_html__('LOGOUT', 'albfre'); ?></button>
<?php
}
?>
    </div>
  </div>

<?php
if (get_option('albfre_debug')) {
?>
  <center>
    <h2>Debug</h2>
    <p>Current date: <?php echo esc_html(gmdate(get_option('albfre_date_format'))) ?> </p>
    <p>GMT date: <?php echo esc_html(get_gmt_from_date(gmdate(get_option('albfre_date_format')))) ?> </p>
  </center>
<?php
}
?>
