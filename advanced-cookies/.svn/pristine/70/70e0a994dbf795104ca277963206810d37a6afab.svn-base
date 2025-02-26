<?php
/**
 * hob_ac_script
 *
 * @return void
 */
function hob_ac_script() {
    wp_register_style('advanced_cookies_css', HOB_AC_URL_SCRIPT . 'asset/css/admin.css');
    wp_register_script('advanced_cookies_js', HOB_AC_URL_SCRIPT . 'asset/js/admin.js');
  
    wp_enqueue_style('advanced_cookies_css');
    wp_enqueue_script('advanced_cookies_js');
  }
  
add_action('admin_enqueue_scripts', "hob_ac_script");


/**
 * hob_ac_plugin_settings_page
 *
 * @return void
 */
function hob_ac_plugin_settings_page() { 

    ?>

    <section id="pannel" class="hob_ac_admin">
      <!-- Liste des onglets -->
      <nav id="onglets">
        <ul>
            <li class="onglet actif" onclick="hob_ac_onglet_event(0)"><?php echo(esc_html(__('Description','advancedcookies'))) ?></li>
            <li class="onglet" onclick="hob_ac_onglet_event(1)"><?php echo( esc_html(__('Configuration','advancedcookies'))) ?></li>
            <li class="onglet" onclick="hob_ac_onglet_event(2)"><?php echo( esc_html(__('Gestion des services','advancedcookies'))) ?></li>
            <li class="onglet" onclick="hob_ac_onglet_event(3)"><?php echo( esc_html(__('PRO','advancedcookies'))) ?></li>
        </ul>
      </nav>
      <!-- Onglet Description -->
      <article class="contenu description actif">
          <?php include( HOB_AC_URL. 'partials/description/description.php'); ?>
      </article>

      <!-- Onglet Configuration -->
      <article class="contenu configuration">
          <?php include( HOB_AC_URL. 'partials/configuration/configuration.php'); ?>
      </article>
      <!-- Onglet Gestion des services -->
      <article class="contenu gestion">
          <?php include( HOB_AC_URL. 'partials/gestion/gestion.php'); ?>
      </article>
      <!-- Onglet Statut -->
      <article class="contenu licence">
          <?php include( HOB_AC_URL. 'partials/licence/licence.php'); ?>
      </article>
    </section>
    <script>var url_ac = "<?php echo(esc_url(get_site_url())) ?>" + "/wp-admin/admin.php?page=AdvancedCookies%2Fadvanced_cookies.php" ;</script>

  <?php }
