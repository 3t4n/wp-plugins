<?php

namespace AnimatePressFree;

defined('ABSPATH') or die('Something went wrong.');

if (!class_exists('Admin')) {

  class Admin
  {

    /**
     * Admin construct function
     * 
     * @since 1.0.0
     */
    public function __construct()
    {
      add_action('admin_menu', array($this, 'register_admin_menu'));
      add_action('admin_init', array($this, 'register_settings'));
      add_action("admin_enqueue_scripts", array($this, 'enqueue_admin_scripts'));
      add_action('wp_ajax_animatepress_save_options_handler',  array($this, 'animatepress_save_options_handler'));

      // Link to settings page from plugins screen
      add_filter('plugin_action_links_animatepress-free/animatepress-free.php', function ($links_array) {
        array_unshift($links_array, '<a href="https://www.animatepress.net/pricing/" style="color:#f87c56; font-weight:bold;" target="_blank">GET PREMIUM</a>');
        array_unshift($links_array, '<a href="https://www.animatepress.net/documentation/" target="_blank">Docs</a>');
        array_unshift($links_array, '<a href="admin.php?page=animatepress-options">Settings</a>');
        return $links_array;
      });
    }

    /**
     * Enqueue admin scripts.
     *
     * @since 1.0.0
     */
    public function enqueue_admin_scripts()
    {
      wp_enqueue_style('animatepress_admin_css', esc_url(ANIMATEPRESSFREE_PLUGIN_URL) . 'admin/css/animatepress-admin.css', '', '1.0.0');
      wp_enqueue_script('animatepress_admin_js', esc_url(ANIMATEPRESSFREE_PLUGIN_URL) . 'admin/js/animatepress-admin.js', '', '1.0.0', true);
      wp_add_inline_script('animatepress_admin_js', 'const ANIMATEPRESSADMINDATA=' . wp_json_encode(array(
        'optionsUrl' => admin_url('admin-ajax.php'),
        'nonce'      => wp_create_nonce('animatepress_options_nonce'),
      )), 'before');
    }

    /**
     * Register admin menu.
     *
     * @since 1.0.0
     */
    public function register_admin_menu()
    {
      add_menu_page(
        'AnimatePress Options',
        'AnimatePress',
        'manage_options',
        'animatepress-options',
        array(
          $this,
          'render_admin_page'
        ),
        'data:image/svg+xml;base64,' . base64_encode('<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.7036 0.262279C16.5787 0.137104 16.4195 0.051821 16.2461 0.0172418C16.0726 -0.0173373 15.8929 0.000344551 15.7295 0.0680458C15.5662 0.135747 15.4266 0.250419 15.3285 0.397523C15.2304 0.544628 15.1783 0.717541 15.1786 0.894341V3.57257H4.46429C3.28028 3.57257 2.14478 4.04285 1.30756 4.87996C0.470343 5.71707 0 6.85243 0 8.03629L0 10.7145C0 11.1881 0.188137 11.6422 0.523024 11.977C0.85791 12.3119 1.31211 12.5 1.78571 12.5C2.25932 12.5 2.71352 12.3119 3.04841 11.977C3.38329 11.6422 3.57143 11.1881 3.57143 10.7145V8.03629C3.57143 7.79952 3.6655 7.57244 3.83294 7.40502C4.00038 7.2376 4.22749 7.14354 4.46429 7.14354H15.1786V9.82177C15.1783 9.99857 15.2304 10.1715 15.3285 10.3186C15.4266 10.4657 15.5662 10.5804 15.7295 10.6481C15.8929 10.7158 16.0726 10.7334 16.2461 10.6989C16.4195 10.6643 16.5787 10.579 16.7036 10.4538L21.1679 5.99012C21.251 5.90719 21.317 5.80867 21.362 5.70022C21.407 5.59176 21.4302 5.47548 21.4302 5.35806C21.4302 5.24063 21.407 5.12436 21.362 5.0159C21.317 4.90744 21.251 4.80892 21.1679 4.72599L16.7036 0.262279ZM9.26786 14.3533C9.43147 14.4205 9.57143 14.5348 9.66999 14.6817C9.76855 14.8285 9.82125 15.0014 9.82143 15.1782V17.8565H20.5357C20.7725 17.8565 20.9996 17.7624 21.1671 17.595C21.3345 17.4276 21.4286 17.2005 21.4286 16.9637V14.2855C21.4286 13.8119 21.6167 13.3578 21.9516 13.023C22.2865 12.6881 22.7407 12.5 23.2143 12.5C23.6879 12.5 24.1421 12.6881 24.477 13.023C24.8119 13.3578 25 13.8119 25 14.2855V16.9637C25 17.5499 24.8845 18.1303 24.6602 18.6719C24.4358 19.2135 24.107 19.7055 23.6924 20.12C23.2779 20.5345 22.7858 20.8633 22.2441 21.0876C21.7025 21.312 21.122 21.4274 20.5357 21.4274H9.82143V24.1057C9.82175 24.2825 9.76955 24.4554 9.67147 24.6025C9.57338 24.7496 9.43382 24.8643 9.27047 24.932C9.10713 24.9997 8.92735 25.0173 8.75395 24.9828C8.58054 24.9482 8.4213 24.8629 8.29643 24.7377L3.83214 20.274C3.74899 20.1911 3.68302 20.0926 3.63801 19.9841C3.593 19.8756 3.56983 19.7594 3.56983 19.6419C3.56983 19.5245 3.593 19.4082 3.63801 19.2998C3.68302 19.1913 3.74899 19.0928 3.83214 19.0099L8.29643 14.5462C8.42139 14.4214 8.58055 14.3365 8.75378 14.3021C8.92702 14.2678 9.10475 14.2856 9.26786 14.3533Z" fill="white"/></svg>
      ')
      );
    }

    /**
     * Register settings of admin form
     * 
     * @since 1.0.0
     */

    public function register_settings()
    {
      register_setting(
        'animatepressfree-settings',
        'animatepress_free_activate',
        array(
          'sanitize_callback' => 'sanitize_text_field',
        )
      );
      register_setting(
        'animatepressfree-settings',
        'animatepress_free_transition_color',
        array(
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
      register_setting(
        'animatepressfree-settings',
        'animatepress_free_transition_activate',
        array(
          'sanitize_callback' => 'sanitize_text_field',
        )
      );
      register_setting(
        'animatepressfree-settings',
        'animatepress_free_transition',
        array(
          'sanitize_callback' => 'sanitize_text_field',
        )
      );
      register_setting(
        'animatepressfree-settings',
        'animatepress_free_loader_activate',
        array(
          'sanitize_callback' => 'sanitize_text_field',
        )
      );
      register_setting(
        'animatepressfree-settings',
        'animatepress_free_loader',
        array(
          'sanitize_callback' => 'sanitize_text_field',
        )
      );
      register_setting(
        'animatepressfree-settings',
        'animatepress_free_loader_color',
        array(
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
    }

    /**
     * Display admin form
     * 
     * @since 1.0.0
     */

    public function render_admin_page()
    {
      $label = "FREE VERSION";
?>

      <div id="animatepress-loading-mask"></div>

      <div class="animatepress-topbar">
        <?php esc_html_e('Get premium version and unlock amazing features', 'animatepress-free'); ?>
        <a href="https://www.animatepress.net/pricing" class="animatepress-settings__submit-btn animatepress-settings__submit-btn--secondary " target="_blank"><?php esc_html_e('Get premium version', 'animatepress-free'); ?></a>
      </div>

      <div id="animatepress-toast">
        <span id="animatepress-toast-success"><?php esc_html_e('Settings saved', 'animatepress-free'); ?></span>
        <span id="animatepress-toast-error"><?php esc_html_e('Something went wrong', 'animatepress-free'); ?></span>
      </div>

      <div id="animatepress-settings">
        <div class="animatepress-settings-header">
          <h1 class="animatepress-settings-header__title"> <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/animatepress-logo.svg" alt="Animatepress Logo"> <span><?php echo esc_html($label); ?></span></h1>
          <ul class="animatepress-settings-header__links">
            <li>
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/doc.svg" alt="Premium licence">
              <a href="https://www.animatepress.net/pricing" target="_blank"><?php esc_html_e('Get your premium licence', 'animatepress-free'); ?></a>
            </li>
            <li>
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/doc.svg" alt="Documentation">
              <a href="https://www.animatepress.net/documentation" target="_blank"><?php esc_html_e('Documentation', 'animatepress-free'); ?></a>
            </li>
            <li>
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/star.svg" alt="Rate the plugin">
              <a href="https://wordpress.org/support/plugin/animatepress-free/reviews/#new-post" target="_blank"><?php esc_html_e('Leave 5 stars', 'animatepress-free'); ?></a>
            </li>
          </ul>
        </div>

        <form id="animatepress-settings-form" class="animatepress-settings-main" method="post" action="<?php echo esc_url(admin_url('options.php')); ?>">

          <?php settings_fields('animatepressfree-settings'); ?>
          <?php do_settings_sections('animatepressfree-settings'); ?>

          <ul class="animatepress-settings__menu">
            <li data-menu="global-settings" class="active">
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/settings.svg" alt="Settings">
              <?php esc_html_e('Global settings', 'animatepress-free'); ?>
            </li>
            <li data-menu="transitions-settings">
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/reload.svg" alt="Transitions">
              <?php esc_html_e('Transitions', 'animatepress-free'); ?>
            </li>
            <li data-menu="loaders-settings">
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/loader.svg" alt="Loaders">
              <?php esc_html_e('Loaders', 'animatepress-free'); ?>
            </li>

            <?php
            submit_button(__('Save all changes', 'animatepress-free'), 'animatepress-settings__submit-btn', 'animatepress_submit_ajax', false);
            if (wp_doing_ajax()) :
              wp_die();
            endif;
            ?>
            <p><?php esc_html_e('( or press CTRL + S )', 'animatepress-free'); ?></p>

          </ul>
          <div class="animatepress-settings__content">

            <?php include_once(dirname(__FILE__) . '/partials/animatepress-global-settings.php'); ?>
            <?php include_once(dirname(__FILE__) . '/partials/animatepress-transitions-settings.php'); ?>
            <?php include_once(dirname(__FILE__) . '/partials/animatepress-loaders-settings.php'); ?>
          </div>
        </form>
        <div class="animatepress-premium-features">
          <p class="animatepress-premium-features__title"><?php esc_html_e('Unlock premium features', 'animatepress-free'); ?></p>
          <div class="animatepress-premium-features__content">
            <div class="animatepress-premium-features__content__item">
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/reload.svg" alt="Transitions">
              <p><?php esc_html_e('Transitions', 'animatepress-free'); ?></p>
              <p><?php esc_html_e('Over +20 customizable effects. From color to various timings, you have control over your transition.', 'animatepress-free'); ?></p>
            </div>
            <div class="animatepress-premium-features__content__item">
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/loader.svg" alt="Transitions">
              <p><?php esc_html_e('Loaders', 'animatepress-free'); ?></p>
              <p><?php esc_html_e('Over +10 amazing effects for your loader. Customize the color or add your own logo. Easy configuration !', 'animatepress-free'); ?></p>

            </div>
            <div class="animatepress-premium-features__content__item">
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/confettis.svg" alt="Transitions">
              <p><?php esc_html_e('Confettis', 'animatepress-free'); ?></p>
              <p><?php esc_html_e('Add a confetti effect to your pages using a shortcode or Gutenberg block with 5 different styles.', 'animatepress-free'); ?></p>

            </div>
            <div class="animatepress-premium-features__content__item">
              <img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/cursor.svg" alt="Transitions">
              <p><?php esc_html_e('Cursors', 'animatepress-free'); ?></p>
              <p><?php esc_html_e('Customize your cursor by choosing its shape and color, adding a modern touch to your website.', 'animatepress-free'); ?></p>
            </div>
          </div>
          <a href="https://www.animatepress.net/pricing" class="animatepress-settings__submit-btn" target="_blank"><?php esc_html_e('Get premium version', 'animatepress-free'); ?></a>
        </div>
      </div>

<?php
    }

    /**
     * AJAX Settings  Request hanlder
     * 
     * @since 1.0.0
     */
    public function animatepress_save_options_handler()
    {
      check_ajax_referer('animatepress_options_nonce', '_ajax_nonce', true);

      $post_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      if (isset($_POST['animatepress_free_transition_color'])) {
        update_option('animatepress_free_transition_color', sanitize_hex_color($_POST['animatepress_free_transition_color']));
      }
      if (isset($_POST['animatepress_free_transition'])) {
        update_option('animatepress_free_transition', sanitize_text_field($_POST['animatepress_free_transition']));
      }
      if (isset($_POST['animatepress_free_loader'])) {
        update_option('animatepress_free_loader', sanitize_text_field($_POST['animatepress_free_loader']));
      }
      if (isset($_POST['animatepress_free_loader_color'])) {
        update_option('animatepress_free_loader_color', sanitize_hex_color($_POST['animatepress_free_loader_color']));
      }

      $post_data['animatepress_free_activate'] === "1" ?
        update_option('animatepress_free_activate', true) : update_option('animatepress_free_activate', false);

      $post_data['animatepress_free_transition_activate'] === "1" ?
        update_option('animatepress_free_transition_activate', true) : update_option('animatepress_free_transition_activate', false);

      $post_data['animatepress_free_loader_activate'] === "1" ?
        update_option('animatepress_free_loader_activate', true) : update_option('animatepress_free_loader_activate', false);

      wp_send_json_success();
    }
  }
};
