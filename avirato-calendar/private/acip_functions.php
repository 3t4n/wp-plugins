<?php

function acip_create_tables()
{
  add_option('acip_Activated_Plugin', 'Plugin-Slug');
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $table_name1 = $wpdb->prefix . 'acip_text_button';
  $table_name2 = $wpdb->prefix . 'acip_text_desglo';
  $table_name3 = $wpdb->prefix . 'acip_text_calendarZ';
  $sql = "CREATE TABLE $table_name (
    id int(11) NOT NULL AUTO_INCREMENT,
    calendario_avirato longtext DEFAULT NULL, nombre_establecimiento longtext DEFAULT NULL, multi BOOLEAN DEFAULT NULL, code varchar(55) DEFAULT NULL,
    UNIQUE KEY id (id)
  );";
  $sql1 = "CREATE TABLE $table_name1 (
    id int(11) NOT NULL AUTO_INCREMENT,
    botones_avirato longtext DEFAULT NULL,
    UNIQUE KEY id (id)
  );";
  $sql2 = "CREATE TABLE $table_name2 (
    id int(11) NOT NULL AUTO_INCREMENT,
    codigo varchar(55) DEFAULT NULL, id_habitacion varchar(55) DEFAULT NULL, nombre longtext DEFAULT NULL, zona longtext DEFAULT NULL, origCal_id int(11),
    UNIQUE KEY id (id)
  );";
  $sql3 = "CREATE TABLE $table_name3 (
    id int(11) NOT NULL AUTO_INCREMENT,
    calendario_avirato longtext DEFAULT NULL, nombre_establecimiento longtext DEFAULT NULL, multi BOOLEAN DEFAULT NULL, code varchar(55) DEFAULT NULL,
    UNIQUE KEY id (id)
  );";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  //creamos la tabla
  dbDelta($sql);
  dbDelta($sql1);
  dbDelta($sql2);
  dbDelta($sql3);
}
function acip_loaded_plugin()
{
  if (is_admin() && get_option('acip_Activated_Plugin') == 'Plugin-Slug') {
    delete_option('acip_Activated_Plugin', 'Plugin-Slug');
    /* do stuff once right after activation */
    global $wpdb;
    $table_name = $wpdb->prefix . 'acip_text_calendar';
    $html_bbdd = $wpdb->get_results('SHOW COLUMNS FROM ' . $table_name . '', OBJECT);
    $ddbbAVColumns = array();
    foreach ($html_bbdd as $key) {
      $ddbbAVColumns[] = $key->Field;
    }
    if (in_array('multi', $ddbbAVColumns)) {
    } else {
      $wpdb->query('ALTER TABLE ' . $wpdb->prefix . 'acip_text_calendar ADD nombre_establecimiento longtext, ADD multi BOOLEAN DEFAULT 0, ADD code varchar(55) DEFAULT 0');
    }
  }
}

function acip_remove_tables()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $sql = "DROP table IF EXISTS $table_name";
  $wpdb->query($sql);
  $table_name1 = $wpdb->prefix . 'acip_text_button';
  $sql1 = "DROP table IF EXISTS $table_name1";
  $wpdb->query($sql1);
  $table_name2 = $wpdb->prefix . 'acip_text_desglo';
  $sql2 = "DROP table IF EXISTS $table_name2";
  $wpdb->query($sql2);
  $table_name3 = $wpdb->prefix . 'acip_text_calendarZ';
  $sql3 = "DROP table IF EXISTS $table_name3";
  $wpdb->query($sql3);
}

function acip_aviratoCalendar_plugin_menu_admin()
{
  //Añade una página de menú a wordpress
  $pageTitle = __('Avirato Hotels Booking Engine', 'avirato-calendar');
  $menuTitle = __('Avirato Calendar', 'avirato-calendar');
  $linksPageTrans = __('Links', 'avirato-calendar');
  $helpPageTrans = __('Help', 'avirato-calendar');
  if (empty($GLOBALS['admin_page_hooks']['ahs_aviratoSuite-content-settings'])) {
    add_menu_page(
      'Avirato Hotels Suite', //Título de la página
      'Avirato Suite', //Título del menú
      'administrator', //Rol(capability) que puede acceder
      'ahs_aviratoSuite-content-settings', //Id de la página de opciones
      'ahs_aviratoSuite_content_page_settings', //Función que pinta la página de configuración del plugin
      plugins_url('../includes/icons/icon-18x18.png', __FILE__)
    );     //Icono del menú
    add_submenu_page(
      'ahs_aviratoSuite-content-settings',
      $pageTitle, //Título de la página
      $menuTitle, //Título del menú
      'administrator', //Rol(capability) que puede acceder
      'acip_aviratoCalendar-content-settings', //Id de la página de opciones
      'acip_aviratoCalendar_content_page_settings' //Función que pinta la página de configuración del plugin
    );

    function ahs_aviratoSuite_content_page_settings()
    {
      $needHelpTrans = __('Need help?', 'avirato-calendar');
      $helpCenter = __('Help Center', 'avirato-calendar');
      $suiteTrans1 = __('Everything your business needs, integrated into single reservation management software.', 'avirato-calendar');
      $suiteTrans2 = __('PMS + CHANNEL MANAGER + REVENUE MANAGER + BOOKING ENGINE + POS RESTAURANT + WEB DESIGN', 'avirato-calendar');
      $suiteTrans3 = __("We put at your disposal our new help center, where you will find a solution to all your doubts related to Avirato's services and products.", 'avirato-calendar');
      $suiteRemote = __('Remote assistance', 'avirato-calendar');
      $suiteRemoteText = __('If you need direct support on your equipment, a qualified technician will connect with you to help you remotely and from our offices.', 'avirato-calendar');
      $suiteWebinars = __('Improve the use of your management tool or learn the basic concepts of utility and operation by targeting our periodic Webinars.', 'avirato-calendar');
      $suiteManual = __('Improve the use of your management tool or learn the basic concepts of utility and operation by targeting our periodic Webinars.', 'avirato-calendar');
      $suiteManualButton = __('User Manual', 'avirato-calendar');
?>
      <h2 id="ahc_logo" style="
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
      'acip_aviratoCalendar-content-settings', //Id de la página de opciones
      'acip_aviratoCalendar_content_page_settings' //Función que pinta la página de configuración del plugin
    );

  }
}

function acip_AjaxConn_Enq($hook)
{
  $screen = get_current_screen();

  if (in_array($screen->id, array('avirato-suite_page_acip_aviratoCalendar-content-settings'))) {
    wp_enqueue_script('ajaxCall', plugins_url('../includes/js/ajaxCall.js', __FILE__), array('jquery'));
    wp_enqueue_script('ajaxMulti', plugins_url('../includes/js/ajaxMulti.js', __FILE__), array('jquery'));
    wp_enqueue_script('ajaxSimple', plugins_url('../includes/js/ajaxSimple.js', __FILE__), array('jquery'));
    wp_enqueue_script('ajaxCallZ', plugins_url('../includes/js/ajaxCallZ.js', __FILE__), array('jquery'));

    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
    wp_localize_script('ajaxCall', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'we_value' => 1234));
    wp_localize_script('ajaxMulti', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'we_value' => 1234));
    wp_localize_script('ajaxCallZ', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'we_value' => 1234));
    wp_localize_script('ajaxSimple', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'we_value' => 1234));
  }
}
function acip_AjaxConn()
{
  $body = array(
    'codecon' => $_POST['codecon'],
    //        'usercon' => $_POST['usercon'],
  );
  $args = array(
    'body' => $body,
    'timeout' => '5',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking' => true,
    'headers' => array(),
    'cookies' => array()
  );
  $response = wp_remote_post('https://dev.aviratodesign.com/conexionCalendarioMulti.php', $args);
  $html = $response['body'];
  acip_insert_cal($html);
  acip_insert_button();
  echo $response['body'];
  wp_die();
}
function acip_AjaxZonas()
{
  $body = array(
    'codecon' => $_POST['codecon'],
    //        'usercon' => $_POST['usercon'],
  );
  $args = array(
    'body' => $body,
    'timeout' => '5',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking' => true,
    'headers' => array(),
    'cookies' => array()
  );
  $response = wp_remote_post('https://dev.aviratodesign.com/Pruebas-plugin-conexion/conexionCalendarioZonas.php', $args);
  $html = $response['body'];
  acip_insert_calZ($html);
  echo $response['body'];
  wp_die();
}
function acip_AjaxMulti()
{
  $html = $_POST['htmlMulti'];
  acip_insert_cal1($html);
  echo $html;
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $html_bbdd = $wpdb->get_results('SELECT * FROM ' . $table_name . ' ORDER BY id DESC LIMIT 1', OBJECT);
  $string_calendar = $html_bbdd[0]->calendario_avirato;
  $id_calendar = $html_bbdd[0]->id;
  $html1 = stripslashes($string_calendar);
  $html2 = str_replace("</div></form>", "</div>", $html1);
  acip_update_cal1($html2, $id_calendar);
  acip_insert_button();
  wp_die();
}

function acip_update_cal1($html, $id_calendar)
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $wpdb->update(
    $table_name,
    array(
      'calendario_avirato' => $html,
      'nombre_establecimiento' => 'Calendario Multipropiedad id' . $id_calendar . ''
    ),
    array('id' => $id_calendar)
  );
}

function acip_insert_cal1($html)
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $wpdb->insert(
    $table_name,
    array(
      'calendario_avirato' => $html, 'nombre_establecimiento' => 'Calendario Multipropiedad', 'multi' => 1, 'code' => 'Multi'
    )
  );
}
function acip_AjaxSimple()
{
  $html = $_POST['htmlMulti'];
  acip_insert_cal2($html);
  echo $html;
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $html_bbdd = $wpdb->get_results('SELECT * FROM ' . $table_name . ' ORDER BY id DESC LIMIT 1', OBJECT);
  $string_calendar = $html_bbdd[0]->calendario_avirato;
  $id_calendar = $html_bbdd[0]->id;
  $html1 = stripslashes($string_calendar);
  $html2 = str_replace("</form>", "", $html1);
  acip_update_cal2($html2, $id_calendar);
  acip_insert_button();
  wp_die();
}
function acip_insert_cal2($html)
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $wpdb->insert(
    $table_name,
    array(
      'calendario_avirato' => $html, 'nombre_establecimiento' => 'Calendario simple', 'multi' => 2, 'code' => 'Simple'
    )
  );
}
function acip_update_cal2($html, $id_calendar)
{
  $html = str_replace('id="form_avirato"', 'id="form_avirato" class="simpleCal"', $html);
  $codeExtraction = substr(substr($html, strrpos($html, 'code=') + 5), 0, strrpos(substr($html, strrpos($html, 'code=') + 5), 'target') - 2);
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $wpdb->update(
    $table_name,
    array(
      'calendario_avirato' => $html,
      'nombre_establecimiento' => 'Calendario simple id' . $id_calendar . '',
      'code' => 'Simple - ' . $codeExtraction . ''
    ),
    array('id' => $id_calendar)
  );
}

function acip_insert_cal($html)
{
  if (isset($_POST["codecon"]) && !empty($_POST["codecon"])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acip_text_calendar';
    $wpdb->insert(
      $table_name,
      array(
        'calendario_avirato' => $html,
        'nombre_establecimiento' => $_POST['calName'],
        'multi' => 0,
        'code' => $_POST["codecon"]
      )
    );
  }
}

function acip_insert_calZ($html)
{
  if (isset($_POST["codecon"]) && !empty($_POST["codecon"])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acip_text_calendarZ';
    $wpdb->insert(
      $table_name,
      array(
        'calendario_avirato' => $html,
        'nombre_establecimiento' => $_POST['calName'],
        'multi' => 0,
        'code' => $_POST["codecon"]
      )
    );
    $table_name2 = $wpdb->prefix . 'acip_text_desglo';
    $html_bbdwdd = $wpdb->get_results('SELECT id,calendario_avirato FROM ' . $table_name . ' ORDER BY id DESC', OBJECT);
    $catsarr = $html_bbdwdd[0]->calendario_avirato;
    $catId = $html_bbdwdd[0]->id;
    $catsarrary = explode('?¿?', $catsarr, -1);
    foreach ($catsarrary as $key) {
      $uniar = explode('//', $key);
      if (empty($uniar[3]) || $uniar[3] == NULL) {
        $uniar[3] = 'Otras ubicaciones';
      }

      $existentData = $wpdb->get_results('SELECT codigo, id_habitacion FROM ' . $table_name2 . ' ORDER BY id DESC', OBJECT);
      foreach ($existentData as $key) {
        if ($uniar[0] == $key->codigo && $uniar[1] == $key->id_habitacion) {
          $noExistIn = false;
          break;
        } else {
          $noExistIn = true;
        }
      }
      if ($noExistIn == true || empty($existentData)) {
        $wpdb->insert(
          $table_name2,
          array(
            'codigo' => $uniar[0],
            'id_habitacion' => $uniar[1],
            'nombre' => $uniar[2],
            'zona' => $uniar[3],
            'origCal_id' => $catId,
          )
        );
      }
    }
  }
}


function acip_insert_button()
{
  global $wpdb;
  $table_name1 = $wpdb->prefix . 'acip_text_button';
  $res1 = $wpdb->get_results('SELECT botones_avirato FROM ' . $table_name1 . '', OBJECT);
  if (count($res1) < 1) {
    $acip_link = acip_button_link_db();
    foreach ($acip_link as $link) {
      $table_name1 = $wpdb->prefix . 'acip_text_button';
      $wpdb->insert(
        $table_name1,
        array(
          'botones_avirato' => $link
        )
      );
    }
  } else {
    $table_name1 = $wpdb->prefix . 'acip_text_button';
    $wpdb->query("TRUNCATE TABLE $table_name1");
    $acip_link = acip_button_link_db();
    foreach ($acip_link as $link) {
      $table_name1 = $wpdb->prefix . 'acip_text_button';
      $wpdb->insert(
        $table_name1,
        array(
          'botones_avirato' => $link
        )
      );
    }
  }
}

function acip_form_response()
{
  if (isset($_POST['del']) && isset($_POST['comp']) && !empty($_POST['comp'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acip_text_calendar';
    $table_name2 = $wpdb->prefix . 'acip_text_calendarZ';
    $table_name3 = $wpdb->prefix . 'acip_text_desglo';
    $wpdb->delete($table_name, array('id' => $_POST['comp']));
    $wpdb->delete($table_name2, array('id' => $_POST['comp']));
    $wpdb->delete($table_name3, array('origCal_id' => $_POST['comp']));
    wp_redirect('admin.php?page=acip_aviratoCalendar-content-settings&cd=1');
    exit;
  }
}
function acip_form_editCal()
{
  if (isset($_POST['acip_calEd']) && isset($_POST['compId']) && !empty($_POST['compId'])) {
    $correctCal = stripslashes($_POST['newAcipCal']);
    global $wpdb;
    $table_name = $wpdb->prefix . 'acip_text_calendar';
    $wpdb->update($table_name, array(calendario_avirato => $correctCal), array(id => $_POST['compId']), array('%s'));
    wp_redirect('admin.php?page=acip_aviratoCalendar-content-settings&cd=1');
    exit;
  }
}
function acip_form_delHab()
{
  if (isset($_POST['acip_delHab']) && isset($_POST['compHid']) && !empty($_POST['compHid'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acip_text_desglo';
    $wpdb->delete($table_name, array(id => $_POST['compHid']));
    wp_redirect('admin.php?page=acip_aviratoCalendar-content-settings&cd=1');
    exit;
  }
}
function acip_addDnsHead()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-core');
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_script('jquery-ui-dialog');
  wp_enqueue_style('jquery-ui-css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
}
