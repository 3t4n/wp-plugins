<?php
function acip_hidden_Cal()
{
  $values = get_option('acip_aviratoCalendar_type_value');
  $logoUrl = get_option('acip_aviratoCalendar_logoUrl');
  if ($values == 'popup') {
?>
    <div id="mask" onclick="cLose()"></div>
    <div class="avirato_form" style="background: #fff !important">
      <span id="cerrarCal" onclick="cLose()">X</span>
      <img id="acip_cal_logo" height="80" src=<?= $logoUrl ?> alt="">
      <?php
      global $wpdb;
      $table_name = $wpdb->prefix . 'acip_text_calendar';
      $html_bbdd = $wpdb->get_results('SELECT calendario_avirato FROM ' . $table_name . ' ORDER BY id LIMIT 1', OBJECT);
      ?>
      <?= $html_bbdd[0]->calendario_avirato ?>
      <div class="orig">
        <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
      </div>

      <div id="datePickerContainer">
        <div class="datepicker">
          <h3><span id="llegada">Llegada: </span><span id="fromDate"></span></h3>
        </div>
        <div class="inputcon"><input type="hidden" readonly="readonly" class="datepicker" placeholder="Llegada"><span class="material-icons iconAv">
            <?php if (is_page('home')) { ?>
              <img id="icoCal" src=<?= plugins_url('includes/icons/ic_event_black_24dp_2x.png', __FILE__) ?>></span>
        <?php } else { ?>
          <img id="icoCal" src=<?= plugins_url('includes/icons/ic_event_black_24dp_2x.png', __FILE__) ?>></span>
        <?php } ?>
        </div>
        <div class="datepicker2">
          <h3><span id="salida">Salida: </span><span id="toDate"></span></h3>
        </div>
        <div class="inputcon"><input type="hidden" readonly="readonly" class="datepicker2" Placeholder="Salida"><span class="material-icons iconAv">
            <?php if (is_page('home')) { ?>
              <img id="icoCal" src=<?= plugins_url('includes/icons/ic_event_black_24dp_2x.png', __FILE__) ?>></span>
        <?php } else { ?>
          <img id="icoCal" src=<?= plugins_url('includes/icons/ic_event_black_24dp_2x.png', __FILE__) ?>></span>
        <?php } ?>
        </div>
      </div>
      <div id="alertMsg">Seleccione fecha para comprobar la disponibilidad</div>
      <div class="orig">
        <input disabled class="btn" style="" id="check-availability" type="submit" value="Reservar">
      </div>
      </form>
    </div>
  <?php
  } else if ($values == 'oculto') {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acip_text_calendar';
    $html_bbdd = $wpdb->get_results('SELECT calendario_avirato FROM ' . $table_name . '  ORDER BY id LIMIT 1', OBJECT);
    $calId = $wpdb->get_results('SELECT id FROM ' . $table_name . ' ORDER BY id', OBJECT);
    // Hacer selector individual para cada calendario generado.
  ?>
    <div id="avirato">
      <div class="avirato_form">
        <?= $html_bbdd[0]->calendario_avirato ?>
        <div>
          <input placeholder="Llegada" type="text" id="date-picker-1" readonly="readonly" style="" name="from"> <span class="material-icons iconAv">event</span>
        </div>
        <div>
          <input placeholder="Salida" type="text" id="date-picker-2" readonly="readonly" name="to" style=""><span class="material-icons iconAv">event</span>
        </div>
        <div>
          <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
        </div>
        <div>
          <input class="btn" style="" id="check-availability" type="submit" value="Reservar">
        </div>
        <span id="cerrarO">Cerrar</span>
        </form>
      </div>
    </div>
<?php
  }
}

function acip_button_link($id)
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $html_bbdd = $wpdb->get_results('SELECT * FROM ' . $table_name . ' WHERE id =' . $id . '', OBJECT);
  $string_calendar = $html_bbdd[0]->calendario_avirato;
  $array_exploded_id = explode('<option value="https://avirato.com/motor_reservas/reserva_online.php?code=', $string_calendar);
  $array_exploded = explode('"', $string_calendar);
  $enlace_motor = preg_replace('/[0-9]+/', '', $array_exploded[3]);
  $array_exploded_count = count($array_exploded_id);

  for ($i = 0; $i < $array_exploded_count; $i++) {
    if (isset($array_exploded_id[$i + 1])) {
      $id_hab[$i][] = $array_exploded_id[$i + 1];
    }
  }

  for ($a = 0; $a < $array_exploded_count - 1; $a++) {
    $asdada = explode('">', $id_hab[$a][0]);
    $pos_tag = stripos($asdada[1], '<');
    $nombre_habitacion = substr($asdada[1], 0, $pos_tag);
    $codigo_id[] = $enlace_motor . $asdada[0] . '<span style="display:inline-block; margin-left:15px; margin-right:5px; font-weight: bolder">-----></span>' . $nombre_habitacion;
  }

  return $codigo_id;
}


function acip_button_link_db()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $html_bbdd = $wpdb->get_results('SELECT calendario_avirato FROM ' . $table_name . ' WHERE id = 1', OBJECT);
  $string_calendar = $html_bbdd[0]->calendario_avirato;
  $array_exploded_id = explode('<option value="https://avirato.com/motor_reservas/reserva_online.php?code=', $string_calendar);
  $array_exploded = explode('"', $string_calendar);
  $enlace_motor = preg_replace('/[0-9]+/', '', $array_exploded[3]);
  $array_exploded_count = count($array_exploded_id);

  for ($i = 0; $i < $array_exploded_count; $i++) {
    if (isset($array_exploded_id[$i + 1])) {
      $id_hab[$i][] = $array_exploded_id[$i + 1];
    }
  }

  for ($a = 0; $a < $array_exploded_count - 1; $a++) {
    $asdada = explode('">', $id_hab[$a][0]);
    $codigo_id[] = $enlace_motor . $asdada[0];
  }

  return $codigo_id;
}


function acip_shortcode_calendar($atts)
{
  $p = shortcode_atts(array(
    'id' => 1,
    'zonas' => 'n',
  ), $atts);
  global $wpdb;
  $table_name = $wpdb->prefix . 'acip_text_calendar';
  $html_bbdd = $wpdb->get_results('SELECT calendario_avirato FROM ' . $table_name . ' WHERE id =' . $p['id'] . '', OBJECT);

  $values = get_option('acip_aviratoCalendar_type_value');

  if ($values == 'popup') {
    $calend = '<a id="reserv" onclick="oPen()" href="#">RESERVAR</a>';
  } else if ($values == 'oculto') {
    $calend = '<a id="reserv' . $p['id'] . '" class="reservar"  href="#">RESERVAR</a>';
  } else if ($values == 'mini') {
    $string_calendar = $html_bbdd[0]->calendario_avirato;
    $array_exploded = explode('"', $string_calendar);
    $codeProm = acip_aviratoCalendar_codeProm();
    $calend = '  <section id="neo_avirato">
    <div class="containerAvirato">
    <div >
    <div id="container_form_Avirato">
    <form action="' . $array_exploded[3] . '" class="reservation-form_avirato" method="post" target="_blank" id="form_avirato">
    <div id="cont">
    <div class="container_fields_avirato dates_avirato input-daterange_avirato">
    <div class="input-field_avirato">
    <label id="entrada" for="arrival">Entrada</label>
    <input id="date-picker-1" readonly="readonly" class="box_day_avirato" size="2" name="start">
    <div id="date-picker-1-month" class="month_name_avirato"></div></div>
    <div class="input-field_avirato line-box_avirato"></div><div class="input-field_avirato">
    <label id="salida" for="departure">Salida</label>
    <input id="date-picker-2" readonly="readonly" class="box_day_avirato" size="2" name="end">
    <div id="date-picker-2-month" class="month_name_avirato"></div>
    </div>
    </div>
    <div class="container_fields_avirato promo_avirato">
    <p class="texto_avirato" id="descEx">RESERVA ONLINE<span class="high_avirato">Mejor precio garantizado</span></p>
    <!--                          <span id="pre_avirato" class="small_avirato">Mejor precio Garantizado</span> -->
    <span class="small_avirato1"><div><span>Código Promocional: </span><span>' . $codeProm . '</span></div></span>
    </div>
    </div>
    <div class="title_avirato">
    <div>
    <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
    </div>
    <input type="submit" value="Buscar disponibilidad" id="check-availability" class="btn_avirato gold_avirato arrow_avirato">
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>';
  } else {
    if ($p['zonas'] == 'Y') {
      global $wpdb;
      $table_name2 = $wpdb->prefix . 'acip_text_desglo';
      $html_bbdwdd = $wpdb->get_results('SELECT * FROM ' . $table_name2 . '', OBJECT);
      $html_zones = $wpdb->get_results('SELECT zona FROM ' . $table_name2 . ' GROUP BY zona ', OBJECT);
      // $catsarr = $html_bbdwdd[0]->calendario_avirato;
      foreach ($html_bbdwdd as $key) {
        $catsarr .= '<option value="https://avirato.com/motor_reservas/reserva_online.php?code=' . $key->codigo . '&id_habitacion=' . $key->id_habitacion . '" class="' . acip_ . $key->zona . '">' . $key->nombre . '</option>';
      }
      foreach ($html_zones as $key1) {
        if ($key1->zona == 'Otras ubicaciones') {
          $zones .= '<option style="background-color: #fff3b7" value="' . acip_ . $key1->zona . '" >' . $key1->zona . '</option>';
        } else {
          $zones .= '<option value="' . acip_ . $key1->zona . '" >' . $key1->zona . '</option>';
        }
      }
      $form = '<div><select  onchange="val()" id="zonaSelect"><option value="all" style="background-color: #fff3b7">Ubicacion</option>' . $zones . '</select></div><div class="orig"><select name="hotel" id="catSelect" class="select_apart"><option value="#" class="all" style="background-color: #fff3b7">Elegir</option>' . $catsarr . '</select></div>';

      $calend = '  <div  id="avirato_container" style="  margin:0 auto; width:100%;z-index: 900;">
      <div class="avirato_form acipZone" >
      <form id="form_avirato" action="#" method="POST" target="_blank">


      ' . $form . '
      <div>
      <input  placeholder="Llegada" type="text" id="date-picker-1-' . $p['id'] . '" readonly="readonly" style="" name="from" > <span class="material-icons iconAv">event</span>
      </div>
      <div>
      <input  placeholder="Salida" type="text" id="date-picker-2-' . $p['id'] . '" readonly="readonly" name="to" style="" ><span class="material-icons iconAv">event</span>
      </div>
      <div>
      <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
      </div>
      <div>
      <input class="btn" style="" id="check-availability" type="submit" value="Reservar">
      </div>
      </form>
      </div>
      </div>
      ';
    } else {
      $calend = '  <div  id="avirato_container" style="  margin:0 auto; width:100%;z-index: 900;">
      <div class="avirato_form" >

      ' . $html_bbdd[0]->calendario_avirato . '
      <div>
      <input  placeholder="Llegada" type="text" id="date-picker-1-' . $p['id'] . '" readonly="readonly" style="" name="from" > <span class="material-icons iconAv">event</span>
      </div>
      <div>
      <input  placeholder="Salida" type="text" id="date-picker-2-' . $p['id'] . '" readonly="readonly" name="to" style="" ><span class="material-icons iconAv">event</span>
      </div>
      <div>
      <input type="text" id="prom" name="cod_promocional" placeholder="Código Promocional">
      </div>
      <div>
      <input class="btn" style="" id="check-availability" type="submit" value="Reservar">
      </div>
      </form>
      </div>
      </div>
      ';
    }
  }

  return $calend;
}
