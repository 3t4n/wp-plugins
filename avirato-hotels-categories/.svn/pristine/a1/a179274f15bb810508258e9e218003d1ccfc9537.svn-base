<?php
if (!defined('ABSPATH'))
  exit;
/*
Plugin Name: Avirato Hotels Categories
Plugin URI: https://es.wordpress.org/plugins/avirato-hotels-categories/
Description: Take your PMS configured categories to yor website.
Version: 1.1.1
Author: Avirato
Author URI: https://avirato.com/
Text Domain: avirato-hotels-categories
Domain Path: /languages
*/

function ahc_textdomain()
{
  $text_domain = 'avirato-hotels-categories';
  $path_languages = basename(dirname(__FILE__)) . '/languages/';
  load_plugin_textdomain($text_domain, false, $path_languages);
}


function ahc_create_tables()
{
  /*if( ! wp_next_scheduled( 'ahc_update_cron_hook' ) ) {
    wp_schedule_event(current_time( 'timestamp' ), '5seconds', 'ahc_update_cron_hook' );
  }*/
  global $wpdb;
  $table_name1 = $wpdb->prefix . 'ahc_textComp_Cats';
  $sql1 = "CREATE TABLE $table_name1 (
    id int(11) NOT NULL AUTO_INCREMENT,
    textoCompleto longtext NOT NULL,
    PRIMARY KEY (id)
  );";
  $table_name2 = $wpdb->prefix . 'ahc_textComp_Cat';
  $sql2 = "CREATE TABLE $table_name2 (
    id int(11) NOT NULL AUTO_INCREMENT,
    textoCompleto longtext NOT NULL,
    PRIMARY KEY (id)
  );";
  $table_name3 = $wpdb->prefix . 'ahc_cron_try';
  $sql3 = "CREATE TABLE $table_name3 (
    id int(11) NOT NULL AUTO_INCREMENT,
    textoCompleto longtext NOT NULL,
    PRIMARY KEY (id)
  );";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  //creamos la tabla
  dbDelta($sql1);
  dbDelta($sql2);
  dbDelta($sql3);
}
function ahc_remove_tables()
{
  wp_clear_scheduled_hook('ahc_update_cron_hook');
  global $wpdb;
  $table_name1 = $wpdb->prefix . 'ahc_textComp_Cats';
  $sql1 = "DROP table IF EXISTS $table_name1";
  $wpdb->query($sql1);
  $table_name2 = $wpdb->prefix . 'ahc_textComp_Cat';
  $sql2 = "DROP table IF EXISTS $table_name2";
  $wpdb->query($sql2);
  $table_name3 = $wpdb->prefix . 'ahc_cron_try';
  $sql3 = "DROP table IF EXISTS $table_name3";
  $wpdb->query($sql3);
}
/*add_action( 'ahc_update_cron_hook', 'ahc_update_process' );

function ahc_update_process() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'ahc_cron_try';
  $wpdb->insert(
    $table_name, array(
      'textoCompleto' => Date("h:i:sa")
    )
  );

}

add_filter( 'cron_schedules', 'ahc_custom_schedule');
function ahc_custom_schedule( $schedules ) {
     $schedules['5seconds'] = array(
        'interval' => 180,
        'display' =>'5 segundos'
     );
     return $schedules;
}
*/
function ahc_aviratoCategories_plugin_menu_admin()
{
  //Añade una página de menú a wordpress
  $pageTitle = __('Avirato Hotels Categories', 'avirato-hotels-categories');
  $menuTitle = __('Avirato Categories', 'avirato-hotels-categories');
  if (empty($GLOBALS['admin_page_hooks']['ahs_aviratoSuite-content-settings'])) {
    add_menu_page(
      'Avirato Hotels Suite', //Título de la página
      'Avirato Suite', //Título del menú
      'administrator', //Rol(capability) que puede acceder
      'ahs_aviratoSuite-content-settings', //Id de la página de opciones
      'ahs_aviratoSuite_content_page_settings', //Función que pinta la página de configuración del plugin
      plugins_url('includes/icons/icon-18x18.png', __FILE__)
    );     //Icono del menú
    add_submenu_page(
      'ahs_aviratoSuite-content-settings',
      $pageTitle, //Título de la página
      $menuTitle, //Título del menú
      'administrator', //Rol(capability) que puede acceder
      'ahc_aviratoCategories-content-settings', //Id de la página de opciones
      'ahc_aviratoCategories_content_page_settings' //Función que pinta la página de configuración del plugin
    );
    function ahs_aviratoSuite_content_page_settings()
    {
      $needHelpTrans = __('Need help?', 'avirato-hotels-categories');
      $helpCenter = __('Help Center', 'avirato-hotels-categories');
      $suiteTrans1 = __('Everything your business needs, integrated into single reservation management software.', 'avirato-hotels-categories');
      $suiteTrans2 = __('PMS + CHANNEL MANAGER + REVENUE MANAGER + BOOKING ENGINE + POS RESTAURANT + WEB DESIGN', 'avirato-hotels-categories');
      $suiteTrans3 = __("We put at your disposal our new help center, where you will find a solution to all your doubts related to Avirato's services and products.", 'avirato-hotels-categories');
      $suiteRemote = __('Remote assistance', 'avirato-hotels-categories');
      $suiteRemoteText = __('If you need direct support on your equipment, a qualified technician will connect with you to help you remotely and from our offices.', 'avirato-hotels-categories');
      $suiteWebinars = __('Improve the use of your management tool or learn the basic concepts of utility and operation by targeting our periodic Webinars.', 'avirato-hotels-categories');
      $suiteManual = __('Improve the use of your management tool or learn the basic concepts of utility and operation by targeting our periodic Webinars.', 'avirato-hotels-categories');
      $suiteManualButton = __('User Manual', 'avirato-hotels-categories');
?>
      <h2 id="acip_logo" style="
        width: calc( 100% - 40px );
        background-color: #4F4F5D;
        margin-left: 0;
        text-align: right;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px;
        height: 36px !important;
      ">
        <img src="<?= plugins_url('includes/icons/avirato-logo.png', __FILE__) ?>" alt="Avirato Calendar" style="height: 32px;">
        <a href="https://avirato.com/atencion-al-cliente/" target="_blank" style="padding-right:25px; line-height: 5; color:#fff; font-size:20px;"><?= $needHelpTrans ?></a>
      </h2>
      <h1 style="font-size: 3em; text-align: center; line-height: 1;"><?= $suiteTrans1 ?></h1>
      <h3 style="text-align:center;"><?= $suiteTrans2 ?></h3>
      <div style="margin-top:50px;">
        <h2 style=" font-size: xx-large; text-align:center;"><?= $helpCenter ?></h2>
      </div>
      <div>
        <h3 style="text-align:center;"><?= $suiteTrans3 ?></h3>
      </div>
      <div class="ahc-row">
        <div class="ahc-widget-wrap">
          <div class="ahc-widget-container">
            <div class="ahc-image-box-wrapper">
              <figure class="ahc-image-box-img">
                <img height="90" src="<?= plugins_url('includes/icons/Icono-soporte-directo-.png', __FILE__) ?>" class="ahc-animation-grow attachment-full size-full" alt="">
              </figure>
              <div class="ahc-image-box-content">
                <h2 class="ahc-image-box-title"><?= $suiteRemote ?></h2>
                <p class="ahc-image-box-description"><?= $suiteRemoteText ?></p>
              </div>
            </div>
          </div>
          <div class="ahc-button-wrapper">
            <a href="https://anydesk.com/es/downloads" class="ahc-button-link ahc-button ahc-size-sm" target="_blank" role="button">
              <span class="ahc-button-text"><?= $suiteRemote ?></span>
            </a>
          </div>
        </div>
        <div class="ahc-widget-wrap">
          <div class="ahc-widget-container">
            <div class="ahc-image-box-wrapper">
              <figure class="ahc-image-box-img">
                <img height="90" src="<?= plugins_url('includes/icons/icono-WEBINARS-PROXIMOS.png', __FILE__) ?>" class="ahc-animation-grow attachment-full size-full" alt="">
              </figure>
              <div class="ahc-image-box-content">
                <h2 class="ahc-image-box-title">Webinars</h2>
                <p class="ahc-image-box-description"><?= $suiteWebinars ?></p>
              </div>
            </div>
          </div>
          <div class="ahc-button-wrapper">
            <a href="https://ayuda.avirato.com/webinars-avirato/" class="ahc-button-link ahc-button ahc-size-sm" target="_blank" role="button">
              <span class="ahc-button-text">Webinars Avirato</span>
            </a>
          </div>
        </div>
        <div class="ahc-widget-wrap">
          <div class="ahc-widget-container">
            <div class="ahc-image-box-wrapper">
              <figure class="ahc-image-box-img">
                <img height="90" src="<?= plugins_url('includes/icons/Icono-manual-de-usuario.png', __FILE__) ?>" class="ahc-animation-grow attachment-full size-full" alt="">
              </figure>
              <div class="ahc-image-box-content">
                <h2 class="ahc-image-box-title">Manual</h2>
                <p class="ahc-image-box-description"><?= $suiteManual ?></p>
              </div>
            </div>
          </div>
          <div class="ahc-button-wrapper">
            <a href="https://avirato.com/manual_de_usuario/" class="ahc-button-link ahc-button ahc-size-sm" target="_blank" role="button">
              <span class="ahc-button-text"><?= $suiteManualButton ?></span>
            </a>
          </div>
        </div>
      </div>

  <?php
    }
  } else {
    add_submenu_page(
      'ahs_aviratoSuite-content-settings',
      $pageTitle, //Título de la página
      $menuTitle, //Título del menú
      'administrator', //Rol(capability) que puede acceder
      'ahc_aviratoCategories-content-settings', //Id de la página de opciones
      'ahc_aviratoCategories_content_page_settings' //Función que pinta la página de configuración del plugin
    );
  }
}

function ahc_AjaxConn_Enq($hook)
{
  $screen = get_current_screen();

  if (in_array($screen->id, array('avirato-suite_page_ahc_aviratoCategories-content-settings'))) {
    wp_enqueue_script('ajaxCallCat', plugins_url('includes/js/ajaxCallCat.js', __FILE__), array('jquery'));
    wp_localize_script('ajaxCallCat', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'we_value' => 1234));
  }
}

function ahc_AjaxConnCat()
{
  $codeCatcon = sanitize_text_field($_POST['codeCatcon']);
  $body = array(
    'codeCatcon' => $codeCatcon
  );
  $args = array(
    'body' => $body,
    'timeout' => '45',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking' => true,
    'headers' => array(),
    'cookies' => array(),
    'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url()
  );

  $response = wp_remote_post("https://dev.aviratodesign.com/categoriesConexion.php", $args);
  $html = $response['body'];
  ahc_insert_cal($html);
  echo $response['body'];
  wp_die();
}


function ahc_insert_cal($html)
{
  if (isset($_POST["codeCatcon"]) && !empty($_POST["codeCatcon"])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'ahc_textComp_Cats';
    $res = $wpdb->get_results('SELECT textoCompleto FROM ' . $table_name . ' WHERE id = 1', OBJECT);
    if (count($res) > 0) {
      $table_name = $wpdb->prefix . 'ahc_textComp_Cats';
      $wpdb->update(
        $table_name,
        array(
          'textoCompleto' => $html
        ),
        array('id' => 1)
      );
      $table_name2 = $wpdb->prefix . 'ahc_textComp_Cat';
      $wpdb->query('TRUNCATE TABLE ' . $table_name2 . ' ');
      $res = $wpdb->get_results('SELECT textoCompleto FROM ' . $table_name . ' WHERE id = 1', OBJECT);
      $html = $res[0]->textoCompleto;
      $html = rtrim($html, '</div>');
      $html = ltrim($html, '<div class="orig">');
      $html = ltrim($html, '<div class="boxCategContainer">');
      $reso = explode('<div class="boxCateg">', $html);
      $resol = '<div class="boxCateg boxSingle">';
      $table_name2 = $wpdb->prefix . 'ahc_textComp_Cat';
      for ($i = 0; $i < count($reso); $i++) {
        $resol .= $reso[$i];
        $reso[$i] = $resol;
        if ($i != 0) {
          $wpdb->insert(
            $table_name2,
            array(
              'textoCompleto' => $reso[$i]
            )
          );
        }
        $resol = '<div class="boxCateg boxSingle">';
      }
    } else {
      $wpdb->insert(
        $table_name,
        array(
          'textoCompleto' => $html
        )
      );
      $res = $wpdb->get_results('SELECT textoCompleto FROM ' . $table_name . ' WHERE id = 1', OBJECT);
      $html = $res[0]->textoCompleto;
      $html = rtrim($html, '</div>');
      $html = ltrim($html, '<div class="orig">');
      $html = ltrim($html, '<div class="boxCategContainer">');
      $reso = explode('<div class="boxCateg">', $html);
      $resol = '<div class="boxCateg boxSingle">';
      $table_name2 = $wpdb->prefix . 'ahc_textComp_Cat';
      for ($i = 0; $i < count($reso); $i++) {
        $resol .= $reso[$i];
        $reso[$i] = $resol;
        if ($i != 0) {
          $wpdb->insert(
            $table_name2,
            array(
              'textoCompleto' => $reso[$i]
            )
          );
        }
        $resol = '<div class="boxCateg boxSingle">';
      }
    }
  }
}
function ahc_aviratoCategories_content_settings()
{
  register_setting('ahc_aviratoCategories-content-settings-group', 'ahc_aviratoCategories_type_value');
}

function ahc_aviratoCategories_type_action()
{
  $type = get_option('ahc_aviratoCategories_type_value');
  return $type;
}

function ahc_aviratoCategories_action()
{
  $values = array();
  $values[0] = get_option('ahc_aviratoCategories_type_value');
  return $values;
}
function ahc_aviratoCategories_content_page_settings()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'ahc_textComp_Cat';
  $html_bbdd = $wpdb->get_results('SELECT * FROM ' . $table_name . '', OBJECT);

  $calendarTrans = __('GENERATOR', 'avirato-hotels-categories');
  $helpTrans = __('HELP', 'avirato-hotels-categories');
  $generatorTrans = __('GENERATOR', 'avirato-hotels-categories');
  $webcodeTrans = __('Web Code', 'avirato-hotels-categories');
  $generateTrans = __('GENERATE', 'avirato-hotels-categories');
  $styleTitleTrans = __('STYLE', 'avirato-hotels-categories');
  $integrationTextTrans = __('To make your PMS Categories visible just add [Avirato_categories] in the page you want to.', 'avirato-hotels-categories');
  $integrationText2Trans = __('Download Avirato PMS completly free', 'avirato-hotels-categories');
  $dialogTrans = __('The following code has been generated', 'avirato-hotels-categories');
  $selectorTrans = __('SELECTOR', 'avirato-hotels-categories');
  $propTrans = __('Selector', 'avirato-hotels-categories');
  $packIdsTrans = __('PACK`S ID', 'avirato-hotels-categories');
  $packIdsTransa = __('CATEGORIES', 'avirato-hotels-categories');
  $needHelpTrans = __('Need help?', 'avirato-hotels-categories');
  $styleTipeTrans = __('Categories style', 'avirato-hotels-categories');
  $basicTrans = __('Basic', 'avirato-hotels-categories');
  $classicTrans = __('Modern', 'avirato-hotels-categories');
  $updateTrans = __('UPDATE', 'avirato-hotels-categories');
  $catShortcodeTrans = __('CATEGORIES SHORTCODES', 'avirato-hotels-categories');

  ?>

  <div id="dialog-confirm" title="<?= $dialogTrans ?>:">
  </div>
  <h2 id="acip_logo" style="
    width: calc( 100% - 40px );
    background-color: #4F4F5D;
    margin-left: 0;
    text-align: right;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    height: 36px !important;
  ">
    <img src="<?= plugins_url('includes/icons/avirato-logo.png', __FILE__) ?>" alt="Avirato Calendar" style="height: 32px;">
    <a href="https://avirato.com/atencion-al-cliente/" target="_blank" style="padding-right:25px; line-height: 5; color:#fff; font-size:20px;"><?= $needHelpTrans ?></a>
  </h2>

  <div class="ahc_wrap">
    <div class="ahc_tab">
      <button class="ahc_tablinks active" onclick="ahc_open_tab(event, 'Calendario_1')"><?= $calendarTrans ?></button>

      <button class="ahc_tablinks" onclick="ahc_open_tab(event, 'Calendario_3')"><?= $helpTrans ?></button>
    </div>
    <div id="Calendario_1" class="ahc_tabcontent">
      <div id="ahc_container1">

        <h3 class="ahc_conTitle"><?= $generatorTrans ?></h3>
        <form action="" method="POST">
          <div class="code_container">
            <label><?= $webcodeTrans ?>:</label>
            <input id="codeCatcon" name="codeCatcon" type="text" required="">
          </div><br>
          <button id="ahc_externo"><?= $generateTrans ?></button>
        </form>
        <div id="ahc_container3">

          <h3 class="ahc_conTitle"><?= $styleTitleTrans ?></h3>
          <form id="formularioCat" action="options.php" method="POST">
            <?php
            settings_fields('ahc_aviratoCategories-content-settings-group');
            do_settings_sections('ahc_aviratoCategories-content-settings-group');
            ?>
            <label><?= $styleTipeTrans ?>:</label>
            <select name="ahc_aviratoCategories_type_value" value="<?php echo get_option('ahc_aviratoCategories_type_value') ?>" style="margin-bottom: 14px;">
              <?php
              if (get_option('ahc_aviratoCategories_type_value') == 'basic') {
              ?>
                <option value="basic" selected="selected"><?= $basicTrans ?></option>
                <option value="classic"><?= $classicTrans ?></option>
              <?php
              } else if (get_option('ahc_aviratoCategories_type_value') == 'classic') {
              ?>
                <option value="basic"><?= $basicTrans ?></option>
                <option value="classic" selected="selected"><?= $classicTrans ?></option>
              <?php
              } else {
              ?>
                <option value="basic" selected="selected"><?= $basicTrans ?></option>
                <option value="classic"><?= $classicTrans ?></option>
              <?php
              }
              ?>

            </select>
            <?php submit_button($updateTrans, 'primary', 'ahc_update', true) ?>
          </form>
        </div>
      </div>
      <div id="ahc_container2">
        <h3 class="ahc_conTitle"><?= $catShortcodeTrans ?></h3>
        <div class="flexCateg" style="background: #98e2a5">
          <p>Todo </p><span>------></span>
          <p>[Avirato_categories]</p>
        </div>
        <?php foreach ($html_bbdd as $key) {
          $startPos = explode('<h2 class="catTitle">', $key->textoCompleto);
          $endPos = strrpos($startPos[1], '</h2>');
          $title = substr($startPos[1], 0, $endPos);
        ?>
          <div class="flexCateg">
            <p><?= $title  ?> </p><span>------></span>
            <p>[Avirato_category id="<?= $key->id ?>"]</p>
          </div>
        <?php  } ?>
      </div>

    </div>
  </div>
  <!-- HELP TAB -->
  <div id="Calendario_3" class="ahc_tabcontent">
    <?php
    $worksTrans = __('How Avirato Hotels Categories works', 'avirato-hotels-categories');
    $worksTrans1 = __('To integrate the Categories form your Avirato PMS on your site, just follow a few simple steps', 'avirato-hotels-categories');
    $worksTrans2 = __('Generate the Categories', 'avirato-hotels-categories');
    $worksTrans3 = __('You should contact Avirato to provide the "Web Code"." <br> Phone', 'avirato-hotels-categories');
    $worksTrans4 = __('After this enter the data that you have provided in the corresponding field and press "Generate"', 'avirato-hotels-categories');
    $worksTrans5 = __('A popup will appear with a text message, press "OK"', 'avirato-hotels-categories');
    $worksTrans6 = __('Adding the Categories', 'avirato-hotels-categories');
    $worksTrans7 = __('To add the categories to the pages of your website, just look at "CATEGORIES SHORTCODES" box and copy the shortcode (ex. [Avirato_category id="1"]) of the category you want to display, or [Avirato_categories] if you want to display all categories; choose the desired place and page and paste the shortcode in a text field.');
    ?>
    <h3 class="ahc_conTitle"><?= $worksTrans ?></h3>
    <div id="ahc_cal3_cont">

      <p><?= $worksTrans1 ?></p>
      <ol>
        <li><strong><?= $worksTrans2 ?>:</strong>
          <p><?= $worksTrans3 ?>: <strong>+34 912 690 123</strong>.<br>Mail: <a href="mailto:soporte@avirato.com?Subject=Codigo%20Web"><strong>soporte@avirato.com</strong></a>.</p>
          <p><?= $worksTrans4 ?></p>
          <p><?= $worksTrans5 ?></p>
        </li>
        <li>
          <strong><?= $worksTrans6 ?>:</strong>
          <p><?= $worksTrans7 ?></p>
        </li>
      </ol>
    </div>
  </div>

<?php
}
function ahc_addStyles()
{
  $values = get_option('ahc_aviratoCategories_type_value');
  if ($values == 'min') {
    wp_enqueue_style('style_min', plugins_url('/includes/css/style_min.css', __FILE__));
  } else if ($values == 'classic') {
    wp_enqueue_style('style_classic', plugins_url('/includes/css/style_classic.css', __FILE__));
  }
}

function getCategoriesFromDatabase()
{

  global $wpdb;
  $table_name = $wpdb->prefix . 'ahc_textComp_Cats';
  $html_bbdd = $wpdb->get_results('SELECT textoCompleto FROM ' . $table_name . '', OBJECT);

  return $html_bbdd;
}
function ahc_shortcode_categories()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'ahc_textComp_Cats';
  $html_bbdd = $wpdb->get_results('SELECT textoCompleto FROM ' . $table_name . ' WHERE id = 1', OBJECT);
  $res = $html_bbdd[0]->textoCompleto;
  return $res;
}
function ahc_shortcode_category($atts)
{
  $p = shortcode_atts(array(
    'id' => 1,
  ), $atts);
  global $wpdb;
  $table_name = $wpdb->prefix . 'ahc_textComp_Cat';
  $html_bbdd = $wpdb->get_results('SELECT textoCompleto FROM ' . $table_name . ' WHERE id = ' . $p['id'] . '', OBJECT);


  return $html_bbdd[0]->textoCompleto;
}

function ahc_addDnsHead()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-core');

  wp_enqueue_style('jquery-ui-css', plugins_url('includes/css/smoothness/jquery-ui.css', __FILE__));
  /*  if (is_page('paquetes-promocionales')) {*/
  wp_enqueue_script('ahc_js_inline', plugins_url('includes/js/ahc_js_inline.js', __FILE__));
  wp_enqueue_style('ahc_cats_css', plugins_url('includes/css/ahc_cats_css.css', __FILE__));
  //}
}

function ahc_admin_style()
{
  wp_enqueue_style('ahc_admin_styleCss', plugins_url('includes/css/ahc_admin_stylecss.css', __FILE__));
  wp_enqueue_script('ahc_tabs_script', plugins_url('includes/js/ahc_tabs_script.js', __FILE__));
}

add_action('init', 'ahc_textdomain');
register_activation_hook(__FILE__, 'ahc_create_tables');
register_deactivation_hook(__FILE__, 'ahc_remove_tables');

add_action('admin_menu', 'ahc_aviratoCategories_plugin_menu_admin');


add_action('admin_enqueue_scripts', 'ahc_AjaxConn_Enq');


add_action('wp_ajax_ahc_AjaxConnCat', 'ahc_AjaxConnCat');
add_shortcode('Avirato_categories', 'ahc_shortcode_categories');
add_shortcode('Avirato_category', 'ahc_shortcode_category');
add_action('admin_enqueue_scripts', 'ahc_admin_style');
add_action('admin_init', 'ahc_aviratoCategories_content_settings');
add_action('wp_head', 'ahc_addDnsHead');
add_action('wp_head', 'ahc_addStyles');
