<?php

function acip_textdomain() {
  $text_domain = 'avirato-calendar';
  $path_languages = basename(dirname(__FILE__)) . '/languages/';
  load_plugin_textdomain($text_domain, false, $path_languages);
}

function acip_aviratoCalendar_content_page_settings() {
  $activeTab = "";
  $activeTab1 = "acip_Calendario1";
  $acip_TabButtonActive1 = "active";
  $acip_TabButtonActive = "";
  if (isset($_GET['cd']) && !empty($_GET['cd']) && $_GET['cd'] == '1') {
    $activeTab = "acip_Calendario1";
    $activeTab1 = "";
    $acip_TabButtonActive = "active";
    $acip_TabButtonActive1 = "";
  }
  if (isset($_GET['settings-updated']) && $_GET['settings-updated'] == true) {
    $activeTab = "";
    $activeTab1 = "acip_Calendario1";
    $acip_TabButtonActive1 = "active";
    $acip_TabButtonActive = "";
    $acip_mng = "acip_success";
  }

  $options = array('apaisado', 'vertical', 'popup', 'mini', 'oculto');
  $optionsScroll = array('si', 'no');
  $logoUrl_admin = acip_aviratoCalendar_action();
  $codeProm = acip_aviratoCalendar_codeProm();
  $configTrans = __('CONFIGURATION', 'avirato-calendar');
  $calTrans = __('CALENDARS', 'avirato-calendar');
  $botonTrans = __('LINKS', 'avirato-calendar');
  $generatorTrans = __('GENERATOR', 'avirato-calendar');
  $standardTrans = __('Standard', 'avirato-calendar');
  $multiTrans = __('Multiproperty', 'avirato-calendar');
  $webcodeTrans = __('Web Code', 'avirato-calendar');
  $webuserTrans = __('Web User', 'avirato-calendar');
  $calnameTrans = __('Standard Calendar name', 'avirato-calendar');
  $calnameTrans1 = __('Simple Calendar name', 'avirato-calendar');
  $alertTrans = __('MUST FILL PROPERTY FIELDS', 'avirato-calendar');
  $alertTrans1 = __('MUST FILL ALL FIELDS', 'avirato-calendar');
  $propTrans = __('Property', 'avirato-calendar');
  $generateTrans = __('GENERATE', 'avirato-calendar');
  $integrationTitleTrans = __('INTEGRATION', 'avirato-calendar');
  $integrationTextTrans = __('To add the calendars to the structure, simply add the <i> shortcode </ i>  listed in "CALENDARS" tab, related to the calendar you want to show, in the chosen place once you have generated your calendar', 'avirato-calendar');
  $integrationText2Trans = __('Download Avirato PMS completly free', 'avirato-calendar');
  $styleTrans = __('DESIGN / STYLE', 'avirato-calendar');
  $calendarTipeTrans = __('Type of Calendar', 'avirato-calendar');
  $calendarTipeMissTrans = __('Hidden, popup and mini calendar types are not available when additional calendars have been generated.', 'avirato-calendar');
  $apaisadoTrans = __('oblong', 'avirato-calendar');
  $verticalTrans = __('vertical', 'avirato-calendar');
  $ocultoTrans = __('hidden', 'avirato-calendar');
  $backgroundCTrans = __('Background color', 'avirato-calendar');
  $opacityTrans = __('Opacity', 'avirato-calendar');
  $opacityTextTrans = __('from 0 to 1, with "0" transparent and "1" opaque.', 'avirato-calendar');
  $iconTrans = __('Icon Color', 'avirato-calendar');
  $butonColorTrans = __('Button Color', 'avirato-calendar');
  $buttonTextColor = __('Button Text Color','avirato-calendar');
  $borderColorTrans = __('Border Color', 'avirato-calendar');
  $logoPathTrans = __('Logo Path', 'avirato-calendar');
  $promoCodeTrans = __('Promotional Code', 'avirato-calendar');
  $updateTrans = __('UPDATE', 'avirato-calendar');
  $previewTrans = __('PREVIEW', 'avirato-calendar');
  $scrollTop = __('Top distance', 'avirato-calendar');
  $scrollTextTrans = __('Distance from the top of the page to the calendar when the calendar is in "sticky" state', 'avirato-calendar');
  $scrollActiveTextTrans = __('Activate sticky?', 'avirato-calendar');
  $scrollY = __('Yes', 'avirato-calendar');
  $scrollN = __('No', 'avirato-calendar');
  $errorCode = __('Web Code is wrong', 'avirato-calendar');
  $errorCode1 = __('Web User is wrong', 'avirato-calendar');
  $dialogTrans = __('The following code has been generated', 'avirato-calendar');
  $acip_SuccessTrans = __('Design has been Updated!', 'avirato-calendar');
  $moltypropplace1 = __('"Property Webcode"', 'avirato-calendar');
  $moltypropplace2 = __('"Property name"', 'avirato-calendar');
  $needHelpTrans = __('Need help?', 'avirato-calendar');
  $updateTransCaled = __('Save','avirato-calendar');
  $habiName = __('Room','avirato-calendar');
  $habiZone = __('Zone','avirato-calendar');
  $habiZoneCalid = __('Calendar id','avirato-calendar');
  $roomId = __('Room id','avirato-calendar');
  $simpleTrans = __('Simple', 'avirato-calendar');
  $buttonsTagText = __('You can use the following <i> links</i> to integrate each room or property independently.', 'avirato-calendar');
  $linksTrans = __('LINKS', 'avirato-calendar');
  $linkTitleTrans = __('Direct Links', 'avirato-calendar');
  $needHelpTrans = __('Need help?', 'avirato-calendar');
  $mainHelpTrans = __('HELP', 'avirato-calendar');
  $catTran = __('CATEGORIES','avirato-calendar');
  ?>
  <div id="dialog-confirm" title="<?= $dialogTrans ?>:">
    <p></p>
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
  <div class="acip_wrap">
    <div class="acip_tab">
      <button class="acip_tablinks <?= $acip_TabButtonActive1 ?>" onclick="acip_open_tab(event, 'Calendario_1')"><?= $configTrans ?></button>
      <button id="deleteTab" class="acip_tablinks <?= $acip_TabButtonActive ?>" onclick="acip_open_tab(event, 'Calendario_4')"><?= $calTrans ?></button>
      <button class="acip_tablinks <?= $acip_TabButtonActive ?>" onclick="acip_open_tab(event, 'Calendario_5')"><?= $linksTrans ?></button>
      <button class="acip_tablinks <?= $acip_TabButtonActive ?>" onclick="acip_open_tab(event, 'Calendario_6')"><?= $mainHelpTrans ?></button>
    </div>
    <div id="Calendario_1" class="acip_tabcontent <?= $activeTab1 ?>" >
      <div id="acip_container1" >
        <h3 class="acip_conTitle"><?= $generatorTrans ?></h3>
        <form id="calTypeForm">
          <div class="acip_radio">
            <input type="radio" name="calendarProp" value="simple" class="acip_radiolinks active"  onclick="acip_open_radio('simpleCal')" checked>
            <label><?= $simpleTrans ?></label>
          </div>
          <div >
            <input type="radio" name="calendarProp" value="normal" class="acip_radiolinks" onclick="acip_open_radio('normalCal')" >
            <label><?= $standardTrans ?></label>
          </div>
          <div>
            <input type="radio" name="calendarProp" value="multi" class="acip_radiolinks"  onclick="acip_open_radio('multiCal')">
            <label><?= $multiTrans ?></label>
          </div>

        </form>
        <div id="simpleCal" class="acip_radioContent">
          <div class="code_container" id="simplEstab">
            <h3 id="acip_alertInput" style='color:red'><?= $alertTrans ?></h3>
            <label><?= $webcodeTrans ?>:</label>
            <input id="codeconS" name="codeconS" type="number" required="" ><br>
            <label><?= $calnameTrans1 ?>:</label>
            <input id="nomconS" name="nomconS" type="text" required="" >
          </div><br>
          <button id="acip_externoS" onclick="acip_replaceCurrTable2()"><?= $generateTrans ?></button>
          <div id="acip_noShow"></div>

        </div>
        <form action="http://dev.aviratodesign.com/conexionCalendarioMulti.php" method="POST" id="normalCal" class="acip_radioContent">
          <div class="code_container">
            <h3 id="acip_alertInput1" style='color:red'><?= $alertTrans1 ?></h3>
            <label><?= $webcodeTrans ?>:</label>
            <input id="codecon" name="codecon" type="number" required="">
          </div><br>
          <div class="code_container">
            <label><?= $calnameTrans ?>:</label>
            <input id="calName" name="calname" type="text" required="">
          </div><br>
          <button id="acip_externo" onclick="acip_replaceCurrTable1()"><?= $generateTrans ?></button>
        </form>
        <div id="multiCal" class="acip_radioContent">
          <div class="code_container" id="multiEstab">
            <h3 id="acip_alertInput" style='color:red'><?= $alertTrans ?></h3>
            <label class="estabCount"><?= $propTrans ?> 1:</label>
            <input id="codecon1" name="codecon1" type="number" required="" placeholder=<?= $moltypropplace1 ?>>
            <input id="nomcon1" name="nomcon1" type="text" required="" placeholder=<?= $moltypropplace2 ?>>
          </div>
          <div style="text-align: center;">
            <button id="addEstab" onclick="newEstab()">+</button>
            <button id="removeEstab" onclick="remNewEstab()">-</button>
          </div><br>
          <button id="acip_externo1" onclick="acip_replaceCurrTable()"><?= $generateTrans ?></button>
          <div id="acip_noShow"></div>

        </div>

        <div id="acip_container3" >
          <h3 class="acip_conTitle"><?= $integrationTitleTrans ?></h3>
          <div>
            <p id="acip_shortcode_text">* <?= $integrationTextTrans ?>.</p>
            <p><?= $integrationText2Trans ?>: <a href="https://avirato.com/instalacion-programa/" target="_blank">Avirato PMS</a> </p>
          </div>
        </div>
      </div>
      <div id="acip_container2" >
        <h3 class="acip_conTitle"><?= $styleTrans ?></h3>
        <form id="formularioCal" action="options.php" method="POST">
          <?php
          settings_fields('acip_aviratoCalendar-content-settings-group');
          do_settings_sections('acip_aviratoCalendar-content-settings-group');
          ?>
          <div>
            <label><?= $calendarTipeTrans ?>:</label>
            <select name="acip_aviratoCalendar_type_value" value="<?php echo get_option('acip_aviratoCalendar_type_value') ?>" >
              <?php
              global $wpdb;
              $table_name = $wpdb->prefix . 'acip_text_calendar';
              $res = $wpdb->get_results('SELECT id FROM ' . $table_name . '', OBJECT);
              if (count($res) <= 1) {
                ?>
                <?php if ($options[0] == get_option('acip_aviratoCalendar_type_value')) { ?>
                  <option value="apaisado" selected="selected"><?= $apaisadoTrans ?></option>
                  <option value="vertical"  ><?= $verticalTrans ?></option>
                  <option value="popup" >popup</option>
                  <option value="mini" >mini</option>
                  <option value="oculto"><?= $ocultoTrans ?></option>
                <?php } else if ($options[1] == get_option('acip_aviratoCalendar_type_value')) { ?>
                  <option value="apaisado" ><?= $apaisadoTrans ?></option>
                  <option value="vertical"  selected="selected"><?= $verticalTrans ?></option>
                  <option value="popup" >popup</option>
                  <option value="mini" >mini</option>
                  <option value="oculto"><?= $ocultoTrans ?></option>
                <?php } else if ($options[2] == get_option('acip_aviratoCalendar_type_value')) { ?>
                  <option value="apaisado" ><?= $apaisadoTrans ?></option>
                  <option value="vertical" ><?= $verticalTrans ?></option>
                  <option value="popup"  selected="selected">popup</option>
                  <option value="mini" >mini</option>
                  <option value="oculto"><?= $ocultoTrans ?></option>
                <?php } else if ($options[3] == get_option('acip_aviratoCalendar_type_value')) { ?>
                  <option value="apaisado" ><?= $apaisadoTrans ?></option>
                  <option value="vertical" ><?= $verticalTrans ?></option>
                  <option value="popup" >popup</option>
                  <option value="mini" selected="selected">mini</option>
                  <option value="oculto" ><?= $ocultoTrans ?></option>
                <?php } else { ?>
                  <option value="apaisado" ><?= $apaisadoTrans ?></option>
                  <option value="vertical" ><?= $verticalTrans ?></option>
                  <option value="popup" >popup</option>
                  <option value="mini" >mini</option>
                  <option value="oculto" selected="selected"><?= $ocultoTrans ?></option>
                <?php } ?>
              <?php } else { ?>
                <?php if ($options[0] == get_option('acip_aviratoCalendar_type_value')) { ?>
                  <option value="apaisado" selected="selected"><?= $apaisadoTrans ?></option>
                  <option value="vertical"  ><?= $verticalTrans ?></option>
                <?php } else if ($options[1] == get_option('acip_aviratoCalendar_type_value')) { ?>
                  <option value="apaisado" ><?= $apaisadoTrans ?></option>
                  <option value="vertical"  selected="selected"><?= $verticalTrans ?></option>
                <?php } ?>

              <?php } ?>
            </select>
            <p>* <?= $calendarTipeMissTrans ?></p>
          </div><br>
          <div>
            <?php if ($options[2] != get_option('acip_aviratoCalendar_type_value') && ($options[3] != get_option('acip_aviratoCalendar_type_value'))) { ?>
              <div>
                <label><?= $backgroundCTrans ?>:</label>
                <input id="acip_aviratoCalendar_bg_value" type="color" name="acip_aviratoCalendar_bg_value" value="<?php echo get_option('acip_aviratoCalendar_bg_value'); ?>" />
                <input type="number" name="acip_aviratoCalendar_bgAlpha_value" id="aviratoCalendar_bgAlpha_value" value="<?php echo get_option('acip_aviratoCalendar_bgAlpha_value'); ?>" step=".1" min="0" max="1" required="required"/><span><strong> <?= $opacityTrans ?></strong>: <?= $opacityTextTrans ?></span>
              </div><br>
              <div>
                <label><?= $iconTrans ?>:</label>
                <input id="acip_aviratoCalendar_ico_value" type="color" name="acip_aviratoCalendar_ico_value" value="<?php echo get_option('acip_aviratoCalendar_ico_value'); ?>" />
              </div><br>
            <?php } else { ?>
              <div style="display:none;">
                <label><?= $backgroundCTrans ?>:</label>
                <input id="acip_aviratoCalendar_bg_value" type="color" name="acip_aviratoCalendar_bg_value" value="<?php echo get_option('acip_aviratoCalendar_bg_value'); ?>" />
                <input type="number" name="acip_aviratoCalendar_bgAlpha_value" id="aviratoCalendar_bgAlpha_value" value="0" step=".1" min="0" max="1" required="required"/><span><strong> <?= $opacityTrans ?></strong>: <?= $opacityTextTrans ?></span>
              </div><br style="display:none;">
              <div style="display:none;">
                <label><?= $iconTrans ?>:</label>
                <input id="acip_aviratoCalendar_ico_value" type="color" name="acip_aviratoCalendar_ico_value" value="<?php echo get_option('acip_aviratoCalendar_ico_value'); ?>" />
              </div><br style="display:none;">
            <?php } ?>
            <div>
              <label><?= $butonColorTrans ?>:</label>
              <input id="acip_aviratoCalendar_butn_value" type="color" name="acip_aviratoCalendar_butn_value" value="<?php echo get_option('acip_aviratoCalendar_butn_value'); ?>" />
              <input type="number" name="acip_aviratoCalendar_butnAlpha_value" id="acip_aviratoCalendar_butnAlpha_value" value="<?php echo get_option('acip_aviratoCalendar_butnAlpha_value'); ?>" step=".1" min="0" max="1" required="required"/><span ><strong> <?= $opacityTrans ?></strong>:<?= $opacityTextTrans ?></span>
            </div><br>
            <div>
              <label><?= $buttonTextColor ?>:</label>
              <input id="acip_aviratoCalendar_font_value" type="color" name="acip_aviratoCalendar_font_value" value="<?php echo get_option('acip_aviratoCalendar_font_value'); ?>" /></div><br>
              <div>
                <label><?= $borderColorTrans ?>:</label>
                <input id="acip_aviratoCalendar_border_value" type="color" name="acip_aviratoCalendar_border_value" value="<?php echo get_option('acip_aviratoCalendar_border_value'); ?>" />
                <label style="width:fit-content;margin-left:15px;">Minimal</label>
                <select name="acip_aviratoCalendar_minimal_value" value="<?php echo get_option('acip_aviratoCalendar_minimal_value') ?>" style="margin-bottom: 7px; margin-left:15px">
                  <?php if ($optionsScroll[1] == get_option('acip_aviratoCalendar_minimal_value') || empty(get_option('acip_aviratoCalendar_minimal_value'))) { ?>
                    <option value="si" ><?= $scrollY ?></option>
                    <option value="no" selected="selected" ><?= $scrollN ?></option>
                  <?php } else { ?>
                    <option value="si" selected="selected" ><?= $scrollY ?></option>
                    <option value="no" ><?= $scrollN ?></option>
                  <?php } ?>
                </select>
              </div><br>
              <?php if ($options[0] == get_option('acip_aviratoCalendar_type_value')) { ?>
                <div>
                  <?php
                  if (empty(get_option('acip_aviratoCalendar_scroll_value'))) {
                    $scrollVal = 0;
                  } else {
                    $scrollVal = get_option('acip_aviratoCalendar_scroll_value');
                  }
                  ?>
                  <label><?= $scrollActiveTextTrans ?></label>
                  <select name="acip_aviratoCalendar_scrollActive_value" value="<?php echo get_option('acip_aviratoCalendar_scrollActive_value') ?>" >
                    <?php if ($optionsScroll[1] == get_option('acip_aviratoCalendar_scrollActive_value') || empty(get_option('acip_aviratoCalendar_scrollActive_value'))) { ?>
                      <option value="si" ><?= $scrollY ?></option>
                      <option value="no" selected="selected" ><?= $scrollN ?></option>
                    </select>
                  </div><br>
                  <div style="display:none">
                    <label><?= $scrollTop ?>: <?php echo get_option('acip_aviratoCalendar_scroll_value'); ?>px</label>
                    <input  id="acip_aviratoCalendar_scroll_value" type="number"  name="acip_aviratoCalendar_scroll_value" min="0" step=".5" value="<?= $scrollVal ?>"  required><span >  <?= $scrollTextTrans ?></span>
                  </div><br>
                <?php } else { ?>
                  <option value="si" selected="selected" ><?= $scrollY ?></option>
                  <option value="no" ><?= $scrollN ?></option>
                </select>
              </div><br>
              <div >
                <label><?= $scrollTop ?>: <?php echo get_option('acip_aviratoCalendar_scroll_value'); ?>px</label>
                <input id="acip_aviratoCalendar_scroll_value"  type="number" name="acip_aviratoCalendar_scroll_value" min="0" step=".5" value="<?= $scrollVal ?>" required><span >  <?= $scrollTextTrans ?></span>
              </div><br>
            <?php } ?>

          <?php } ?>
          <?php if ($options[2] == get_option('acip_aviratoCalendar_type_value')) { ?>
            <div>
            <?php } else { ?>
              <div style="display:none">
              <?php } ?>
              <label><?= $logoPathTrans ?></label>
              <input type="text" name="acip_aviratoCalendar_logoUrl" id="acip_aviratoCalendar_logoUrl" value="<?php echo get_option('acip_aviratoCalendar_logoUrl'); ?>">

              <label id="acip_logo_url"><?= $logoUrl_admin[12] ?></label>
              <img height="80"  alt="" src=<?= $logoUrl_admin[12] ?>>
            </div>
            <?php if ($options[3] == get_option('acip_aviratoCalendar_type_value')) { ?>
              <div>
                <label><?= $promoCodeTrans ?></label>
                <input type="text" name="acip_aviratoCalendar_codeProm" maxlength="15" id="acip_aviratoCalendar_codeProm" value="<?php echo get_option('acip_aviratoCalendar_codeProm'); ?>">
              </div>
            <?php } else { ?>
              <div style="display:none;">
                <label><?= $promoCodeTrans ?></label>
                <input type="text" name="acip_aviratoCalendar_codeProm" maxlength="15" id="acip_aviratoCalendar_codeProm" value="<?php echo get_option('acip_aviratoCalendar_codeProm'); ?>">
              </div>
            <?php } ?>
          </div>
          <label id='designSuccessAl' class="acip_defaultSuccess <?= $acip_mng ?>"><?= $acip_SuccessTrans ?></label>
          <?php submit_button($updateTrans, 'primary', 'acip_update', true) ?>

        </form>
      </div>
      <?php
      $hex = get_option('acip_aviratoCalendar_bg_value');
      list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
      $hex1 = get_option('acip_aviratoCalendar_butn_value');
      list($r1, $g1, $b1) = sscanf($hex1, "#%02x%02x%02x");
      ?>
      <div id="acip_container4" >
        <h3 class="acip_conTitle"><?= $previewTrans ?></h3>
        <div id="acip_cont4_cont">
          <?php if (get_option('acip_aviratoCalendar_type_value') != 'oculto' && get_option('acip_aviratoCalendar_type_value') != 'popup' && get_option('acip_aviratoCalendar_type_value') != 'mini') { ?>
            <div class="avirato_form" style="background-color: rgba(<?= $r ?>, <?= $g ?>, <?= $b ?>, <?= get_option('acip_aviratoCalendar_bgAlpha_value') ?>) !important">
              <form id="form_avirato" action="" method="POST" >
                <div>
                  <select name="hotel" id="select_apart" >
                    <option   value="si" selected="">Ver todos</option><option value="Habitacion 1">Habitacion 1</option><option value="Habitacion 2">Habitacion 2</option><option value="Habitacion 3">Habitacion 3</option>
                  </select>
                </div>
                <div>
                  <input  placeholder="Llegada" type="text"  style="" name="from" > <span class="material-icons iconAv" style="color:<?= get_option('acip_aviratoCalendar_ico_value') ?> !important">event</span>
                </div>
                <div>
                  <input  placeholder="Salida" type="text" name="to" style="" ><span class="material-icons iconAv" style="color:<?= get_option('acip_aviratoCalendar_ico_value') ?> !important">event</span>
                </div>
                <div>
                  <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
                </div>
                <div>
                  <input class="btn"  id="check-availability" type="submit" value="Reservar" style="background-color: rgba(<?= $r1 ?>, <?= $g1 ?>, <?= $b1 ?>, <?= get_option('acip_aviratoCalendar_butnAlpha_value') ?>) !important; color:<?= get_option('acip_aviratoCalendar_font_value') ?> !important">
                </div>
              </form>
            </div>
          <?php } else if (get_option('acip_aviratoCalendar_type_value') == 'popup') { ?>

            <div style="text-align: center">
              <h3>We are working on the preview!</h3>
              <img src="<?= plugins_url('includes/icons/cement-mixing_1.png', __FILE__) ?>" height="150px" alt=""/>
              <h3>But you can still using this type of calendar normally!</h3>
            </div>

          <?php } else if (get_option('acip_aviratoCalendar_type_value') == 'oculto') { ?>
            <div class="avirato_form" style="background-color: rgba(<?= $r ?>, <?= $g ?>, <?= $b ?>, <?= get_option('acip_aviratoCalendar_bgAlpha_value') ?>) !important">
              <form id="form_avirato" action="" method="POST" >
                <div>
                  <select name="hotel" id="select_apart" >
                    <option   value="si" selected="">Ver todos</option><option value="Habitacion 1">Habitacion 1</option><option value="Habitacion 2">Habitacion 2</option><option value="Habitacion 3">Habitacion 3</option>
                  </select>
                </div>
                <div>
                  <input  placeholder="Llegada" type="text"  style="" name="from" > <span class="material-icons iconAv" style="color:<?= get_option('acip_aviratoCalendar_ico_value') ?> !important">event</span>
                </div>
                <div>
                  <input  placeholder="Salida" type="text" name="to" style="" ><span class="material-icons iconAv" style="color:<?= get_option('acip_aviratoCalendar_ico_value') ?> !important">event</span>
                </div>
                <div>
                  <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
                </div>
                <div>
                  <input class="btn"  id="check-availability" type="submit" value="Reservar" style="background-color: rgba(<?= $r1 ?>, <?= $g1 ?>, <?= $b1 ?>, <?= get_option('acip_aviratoCalendar_butnAlpha_value') ?>) !important; color:<?= get_option('acip_aviratoCalendar_font_value') ?> !important">
                </div>
              </form>
            </div>
            <div>
              <a id="reserv" class="reservar" href="#" style="background-color: rgba(<?= $r1 ?>, <?= $g1 ?>, <?= $b1 ?>, <?= get_option('acip_aviratoCalendar_butnAlpha_value') ?>) !important; color:<?= get_option('acip_aviratoCalendar_font_value') ?> !important">RESERVAR</a>
            </div>
          <?php } else if (get_option('acip_aviratoCalendar_type_value') == 'mini') { ?>  <!-- cambiar por el nuevo calendario mini -->
            <section id="neo_avirato">
              <div class="containerAvirato">
                <div>
                  <div id="container_form_Avirato">
                    <form action="" class="reservation-form_avirato" method="post" id="form_avirato">
                      <div id="cont">
                        <div class="container_fields_avirato dates_avirato input-daterange_avirato">
                          <div class="input-field_avirato">
                            <label id="entrada" for="arrival">Entrada</label>
                            <input id="date-picker-1" class="box_day_avirato hasDatepicker" size="2" name="start" value="03-10-2017" style="width: 40px;">
                            <div id="date-picker-1-month" class="month_name_avirato">Octubre</div></div>
                            <div class="input-field_avirato line-box_avirato"></div><div class="input-field_avirato">
                              <label id="salida" for="departure">Salida</label>
                              <input id="date-picker-2" class="box_day_avirato hasDatepicker" size="2" name="end" value="04-10-2017" style="width: 40px;">
                              <div id="date-picker-2-month" class="month_name_avirato">Octubre</div></div>
                            </div>
                            <div class="container_fields_avirato promo_avirato">
                              <p class="texto_avirato" id="descEx">RESERVA ONLINE<span class="high_avirato">Mejor precio garantizado</span></p>

                              <!--                                    <span id="pre_avirato" class="small_avirato">Mejor precio Garantizado</span>-->
                              <span class="small_avirato1"><div><span>Código Promocional: </span><span> <?= $codeProm ?></span></div></span>
                            </div>
                          </div>
                          <div class="title_avirato">
                            <div>
                              <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
                            </div>
                            <input type="submit" value="Buscar disponibilidad" id="check-availability" class="btn_avirato gold_avirato arrow_avirato" style="background-color: rgba(<?= $r1 ?>, <?= $g1 ?>, <?= $b1 ?>, <?= get_option('acip_aviratoCalendar_butnAlpha_value') ?>) !important; color:<?= get_option('acip_aviratoCalendar_font_value') ?> !important">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </section>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>

      <div id="Calendario_4" class="acip_tabcontent <?= $activeTab ?>" style="overflow:hidden;">
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . 'acip_text_calendar';
        $html_bbdd = $wpdb->get_results('SELECT * FROM ' . $table_name . '', OBJECT);
        $table_name1 = $wpdb->prefix . 'acip_text_desglo';
        $html_bbdd2 = $wpdb->get_results('SELECT * FROM ' . $table_name1 . '', OBJECT);
        ?>
        <table id="tableCalends" style="width:49%;text-align: center; background: #fff;padding: 25px; float:left;margin-right:2%;">
        	<tr>
    <th colspan="4" style="  padding-bottom: 10px;"><?= $calTrans ?></th></tr>
          <tr>
            <th>Id</th>
            <th><?= $calnameTrans ?></th>
            <th>Shortcode</th>
            <th>Web Code</th>
          </tr>
          <?php
          for ($i = 0; $i < count($html_bbdd); $i++) {
            $calendario = $html_bbdd[$i];

            if ($calendario->calendario_avirato == "El código web es erroneo") {
              ?>
              <tr style="background: rgb(255,0,0)">
                <td><?= $calendario->id ?></td>
                <td><?= $calendario->nombre_establecimiento ?></td>
                <td><strong><?= $errorCode ?></strong></td>
                <td><?= $calendario->code ?></td>

                <td>
                  <form method="POST" action="<?= admin_url('admin-post.php') ?>">
                    <input type="hidden" name="action" value="acip_form_response">
                    <input type="hidden" name="comp" value="<?= $calendario->id ?>">
                    <input type="submit" name="del" value="X">
                  </form></td>
                </tr>
                <?php
              } else if ($calendario->calendario_avirato == "El usuario web es erroneo") {
                ?>
                <tr style="background: rgb(255,0,0)">
                  <td><?= $calendario->id ?></td>
                  <td><?= $calendario->nombre_establecimiento ?></td>
                  <td><strong><?= $errorCode1 ?></strong></td>
                  <td><?= $calendario->code ?></td>
                  <td>
                    <form method="POST" action="<?= admin_url('admin-post.php') ?>">
                      <input type="hidden" name="action" value="acip_form_response">
                      <input type="hidden" name="comp" value="<?= $calendario->id ?>">
                      <input type="submit" name="del" value="X">
                    </form>
                  </td>
                </tr>
                <?php
              } else {
                if ($calendario->multi == 1) {
                  ?>
                  <tr style="background: #ffe99d">
                    <td><?= $calendario->id ?></td>
                    <td><?= $calendario->nombre_establecimiento ?></td>
                    <td>[Calendario_Avirato id="<?= $calendario->id ?>"]</td>
                    <td><?= $calendario->code ?></td>
                    <td>
                      <form method="POST" action="<?= admin_url('admin-post.php') ?>">
                        <input type="hidden" name="action" value="acip_form_response">
                        <input type="hidden" name="comp" value="<?= $calendario->id ?>">
                        <input type="submit" name="del" value="X">
                      </form>

                    </td>
                    <td>
                      <div><button class="acipCaledit dashicons-before dashicons-edit" style="cursor:pointer"></button></div>
                    </td>
                  </tr>
                  <tr class="caleRow">
                    <td colspan="6" style="border:1px solid #222;height:100%;">
                      <form style="display:flex; align-items:center;" method="POST" action="<?= admin_url('admin-post.php') ?>">
                        <input type="hidden" name="action" value="acip_form_editCal">
                        <input type="hidden" name="compId" value="<?= $calendario->id ?>">
                        <textarea name="newAcipCal" style="width:100%; margin:0 0 0 10px; min-height:200px;"><?= $calendario->calendario_avirato ?></textarea>
                        <input type="submit" name="acip_calEd" value="<?= $updateTransCaled ?>">
                      </form>
                    </td>
                  </tr>
                  <?php
                } else if ($calendario->multi == 2) {
                  ?>
                  <tr style="background: #d3dd5d">
                    <td><?= $calendario->id ?></td>
                    <td><?= $calendario->nombre_establecimiento ?></td>
                    <td>[Calendario_Avirato id="<?= $calendario->id ?>"]</td>
                    <td><?= $calendario->code ?></td>
                    <td>
                      <form method="POST" action="<?= admin_url('admin-post.php') ?>">
                        <input type="hidden" name="action" value="acip_form_response">
                        <input type="hidden" name="comp" value="<?= $calendario->id ?>">
                        <input type="submit" name="del" value="X">
                      </form>

                    </td>
                    <td>
                      <div><button class="acipCaledit dashicons-before dashicons-edit" style="cursor:pointer"></button></div>
                    </td>
                  </tr>
                  <tr class="caleRow">
                    <td colspan="6" style="border:1px solid #222;height:100%;">
                      <form style="display:flex; align-items:center;" method="POST" action="<?= admin_url('admin-post.php') ?>">
                        <input type="hidden" name="action" value="acip_form_editCal">
                        <input type="hidden" name="compId" value="<?= $calendario->id ?>">
                        <textarea name="newAcipCal" style="width:100%; margin:0 0 0 10px; min-height:200px;"><?= $calendario->calendario_avirato ?></textarea>
                        <input type="submit" name="acip_calEd" value="<?= $updateTransCaled ?>">
                      </form>
                    </td>
                  </tr>
                  <?php
                } else {
                  ?>
                  <tr style="background: #efefef">
                    <td><?= $calendario->id ?></td>
                    <td><?= $calendario->nombre_establecimiento ?></td>
                    <td>[Calendario_Avirato id="<?= $calendario->id ?>"]</td>
                    <td><?= $calendario->code ?></td>

                    <td>
                      <form method="POST" action="<?= admin_url('admin-post.php') ?>">
                        <input type="hidden" name="action" value="acip_form_response">
                        <input type="hidden" name="comp" value="<?= $calendario->id ?>">
                        <input type="submit" name="del" value="X">
                      </form>
                    </td>
                    <td>
                      <div><button class="acipCaledit dashicons-before dashicons-edit" style="cursor:pointer"></button></div>
                    </td>

                  </tr>
                  <tr class="caleRow">
                    <td colspan="6" style="border:1px solid #222;height:100%;">
                      <form style="display:flex; align-items:center;" method="POST" action="<?= admin_url('admin-post.php') ?>">
                        <input type="hidden" name="action" value="acip_form_editCal">
                        <input type="hidden" name="compId" value="<?= $calendario->id ?>">
                        <textarea name="newAcipCal" style="width:100%; margin:0 0 0 10px; min-height:200px;"><?= $calendario->calendario_avirato ?></textarea>
                        <input type="submit" name="acip_calEd" value="<?= $updateTransCaled ?>">
                      </form>
                    </td>
                  </tr>
                  <?php
                }
              }
            }
            ?>

          </table>
          <table id="tableHabits" style="width:47%;text-align: center; background: #fff;padding: 25px;float:left;">
          	<th colspan="5" style="  padding-bottom: 10px;"><?= $catTran ?></th></tr>
            <tr>
              <th>Id</th>
              <th>Web Code</th>
              <th><?= $roomId ?></th>
              <th><?= $habiName ?></th>
              <th><?= $habiZone ?></th>
            </tr>
            <?php
            for ($a = 0; $a < count($html_bbdd2); $a++) {
              $habitacion = $html_bbdd2[$a];
              ?>
              <tr style="background: #efefef">
                <td><?= $habitacion->id ?></td>
                <td><?= $habitacion->codigo ?></td>
                <td><?= $habitacion->id_habitacion ?></td>
                <td><?= $habitacion->nombre ?></td>
                <td><?= $habitacion->zona ?></td>
                <td>
                  <form method="POST" action="<?= admin_url('admin-post.php') ?>">
                    <input type="hidden" name="action" value="acip_form_delHab">
                    <input type="hidden" name="compHid" value="<?= $habitacion->id ?>">
                    <input type="submit" name="acip_delHab" value="X">
                  </form>
                </td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
        <div id="Calendario_5" class="acip_tabcontent <?= $activeTab ?>" style="overflow:hidden;">

          <div id="Calendario_2" >
            <h3 class="acip_conTitle"><?= $linkTitleTrans ?></h3>
            <div>
              <h3><?= $buttonsTagText ?></h3>
              <?php
              global $wpdb;
              $table_name = $wpdb->prefix . 'acip_text_calendar';
              $calendarToLinks = $wpdb->get_results('SELECT * FROM ' . $table_name . '', OBJECT);
              foreach ($calendarToLinks as $links) {
                if($links->multi !== '2'){
                  ?>
                  <ul>
                    <li> <span> <?= $linksTrans ?> <?= $links->nombre_establecimiento ?></span></li>
                    <?php
                    $acip_link = acip_button_link($links->id);
                    foreach ($acip_link as $link) {
                      ?>
                      <li> <span >   <?= $link ?> </span> </li>
                    <?php } ?>
                  </ul>
                  <?php
                }
              }
              ?>
            </div>
          </div>
        </div>

        <div id="Calendario_6" class="acip_tabcontent <?= $activeTab ?>" style="overflow:hidden;">
          <div id="Calendario_3">
            <?php
            $apaisadoTrans = __('oblong', 'avirato-calendar');
            $verticalTrans = __('vertical', 'avirato-calendar');
            $ocultoTrans = __('hidden', 'avirato-calendar');
            $worksTrans = __('How Avirato Calendar works', 'avirato-calendar');
            $worksTrans1 = __('To integrate the avirato calendar on your website, just follow a few simple steps', 'avirato-calendar');
            $worksTrans2 = __('Generate the calendar', 'avirato-calendar');
            $worksTrans3 = __('You should contact Avirato indicating your establishment and cif, to provide you the "Web Code". <br>', 'avirato-calendar');
            $worksTrans4 = __('After this, enter the data that you have been provided in the corresponding field.<br> If you have selected "standard" or "simple" option fill the "Web Code" and set a name of your choice. <br>If "multiproperty" option was set, fill "Web Code" and give the calendar a name, you can add/remove properties clicking on "+" and "-" butons. <br>Press "Generate"', 'avirato-calendar');
            $worksTrans5 = __('A popup will appear with a text message, press "OK"', 'avirato-calendar');
            $worksTrans6 = __('Add the calendar', 'avirato-calendar');
            $worksTrans7 = __('To add the calendars to the pages of your website, just go to "CALENDARS" tab and copy the shortcode (ex. [Calendario_Avirato id="1"]) of the calendar you want to display, choose the desired place and page and paste the shortcode in a text field. You can transform any calendar in a calendar by location, adding zonas="Y" to its shortcode (ex. [Calendario_Avirato id="1" zonas="Y"]).', 'avirato-calendar');
            $worksTrans9 = __('After saving or updating the changes on the page, the calendar will appear in the public part of the page.', 'avirato-calendar');
            $worksTrans10 = __('Customize the calendar', 'avirato-calendar');
            $worksTrans11 = __('To customize the calendar sit in the "CONFIGURATION" tab, on the right are the calendar configuration options.', 'avirato-calendar');
            $worksTrans12 = __('You can choose your calendar type from 5 options', 'avirato-calendar');
            $worksTrans13 = __('You can choose the color of the background, color of the icons, background color of the button "RESERVE", color of the text of the button, and the color of the edges of all the fields, in the calendars <strong> landscape </strong>, <strong> vertical </strong> and <strong> hidden </strong>; in the rest of the calendars, the background color and color of the icons are not available.', 'avirato-calendar');
            $worksTrans14 = __('In the <strong> mini </strong> calendar type you have an option to add any <strong> promotional code </strong> that you have configured in your PMS Avirato', 'avirato-calendar');
            $worksTrans15 = __('In the calendar type <strong> popup </strong> you have an option to add your logo in the header of it. To do this you must copy the <strong> full path </strong> of your logo stored in wordpress, in most cases this route is in the same section where you chose your logo', 'avirato-calendar');
            $worksTrans16 = __('After making the changes press "Update"', 'avirato-calendar');
            $worksTrans17 = __('You can change the layout of your calendar as many times as you want.', 'avirato-calendar');
            $worksTrans18 = __('In the "LINKS" sub-menu you have a list with the direct links of every generated calendar to each type of room or property you have configured in your PMS. *Simple calendars do not generate any links in this section.', 'avirato-calendar');
            $notAvailable = __('<b>not available</b> when creating multiple calendars', 'avirato-calendar');
            $worksTrans19 = __('If you know "html", in the "CALENDARS" tab you can edit the calendars already created by clicking on the edit button (pencil).','avirato-calendar');
            $worksTrans20 = __('By pressing their respective "X" you can delete both complete calendars, and the different options of the calendar by location.','avirato-calendar');
            $videoTrans = __('Here you can watch a full functioning video tutorial.(only in spanish at the moment)','avirato-calendar');
            ?>
            <h3 class="acip_conTitle"><?= $worksTrans ?></h3>
            <div id="acip_cal3_cont">

              <p><?= $worksTrans1 ?></p>
              <ol>
                <li><strong><?= $worksTrans2 ?>:</strong>
                  <p><?= $worksTrans3 ?>Mail: <a href="mailto:soporte@avirato.com?Subject=Codigos%20Web%20Calendario"><strong>soporte@avirato.com</strong></a>.</p>
                  <p><?= $worksTrans4 ?></p>
                  <p><?= $worksTrans5 ?></p>
                </li>
                <li>
                  <strong><?= $worksTrans6 ?>:</strong>
                  <p><?= $worksTrans7 ?></p>
                  <p><?= $worksTrans9 ?></p>
                  <p><?= $worksTrans19 ?></p>
                  <p><?= $worksTrans20 ?></p>
                </li>
                <li>
                  <strong><?= $worksTrans10 ?>:</strong>
                  <ul id="acip_ul1">
                    <li><?= $worksTrans11 ?></li>
                    <li><?= $worksTrans12 ?>:
                      <ul id="acip_ul2">
                        <li><?= $apaisadoTrans ?></li>
                        <li><?= $verticalTrans ?></li>
                        <li>popup (<?= $notAvailable ?>)</li>
                        <li>mini (<?= $notAvailable ?>)</li>
                        <li><?= $ocultoTrans ?> (<?= $notAvailable ?>)</li>
                      </ul></li>
                      <li><?= $worksTrans13 ?></li>
                      <li><?= $worksTrans14 ?></li>
                      <li><?= $worksTrans15 ?></li>
                      <li><?= $worksTrans16 ?></li>
                      <li><?= $worksTrans17 ?></li>
                    </ul>
                  </li>
                  <li><?= $worksTrans18 ?></li>
                  <li><?= $videoTrans ?>
                    <p><iframe style="width:100%; min-height:600px;" src="https://www.youtube.com/embed/wv1EmVMAwOw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>



        <?php
      }
