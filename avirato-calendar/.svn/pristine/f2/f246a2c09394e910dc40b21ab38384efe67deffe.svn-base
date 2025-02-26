var numCalendarios;
numCalendarios = jQuery("input[id*='date-picker-1']");

jQuery(document).on('ready', abrirCalendario(numCalendarios));
function abrirCalendario(numCalendarios) {
  if (jQuery('html').attr('lang') == 'es-ES' || jQuery('html').attr('lang') == 'es') {
    var url = window.location.href;
    if (url.indexOf('?lang=en') > -1 || url.indexOf('/en/') > -1) {
      jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=en');
      jQuery('.avirato_form select:first-of-type :first-child').each(function () {

        if (jQuery(this).text() == 'Select your Room' || jQuery(this).text() == 'Elije Establecimiento' || jQuery(this).text() == 'Ver todos' || jQuery(this).text() == 'Wählen Sie Einrichtung') {
          jQuery(this).text('Select your Room');
        }else if(jQuery(this).text() == 'Ubicacion'){
          jQuery(this).text('Location');
        }
      });
      jQuery('.avirato_form select:last-of-type option').each(function () {

        if(jQuery(this).text() == 'Otras ubicaciones'){
          jQuery(this).text('Other locations');
        }
      });
      jQuery('.avirato_form select:nth-child(1) :first-child').each(function (){
        if (jQuery(this).text() == 'Elegir'){
          jQuery(this).text('Choose');
        }
      });


      jQuery('input[id*="prom"]').attr('placeholder', 'Promotional Code');
      jQuery('input[id*="check-availability"]').attr('value', 'BOOK NOW');
      jQuery('.avirBtn_auto').text('BOOK NOW');
      numCalendarios.each(function () {
        jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          numberOfMonths: 1,
          beforeShow: customRange,
          firstDay: 1,
          minDate: "dateToday",
          dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          monthNames:
          ["January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          onClose: function (selectedDate) {
            var myDate = jQuery(this).datepicker('getDate');
            myDate.setDate(myDate.getDate() + 1);
            var idCal = jQuery(this).attr('id').substring(14);
            jQuery('#date-picker-2-' + idCal).datepicker('setDate', myDate);
          }
        });
        jQuery("#date-picker-2-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          firstDay: 1,
          beforeShow: customRange,
          monthNames:
          ["January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          numberOfMonths: 1
        });
      });
    } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
      jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=de');
      jQuery('.avirato_form select :first-child').each(function () {

        if (jQuery(this).text() == 'Select your Room' || jQuery(this).text() == 'Elije Establecimiento' || jQuery(this).text() == 'Ver todos' || jQuery(this).text() == 'Wählen Sie Einrichtung') {
          jQuery(this).text('Wählen Sie Einrichtung');
        }else if(jQuery(this).text() == 'Ubicacion'){
          jQuery(this).text('Standort');
        }
      });
      jQuery('.avirato_form select:last-of-type option').each(function () {

        if(jQuery(this).text() == 'Otras ubicaciones'){
          jQuery(this).text('Andere Standorte');
        }
      });
      jQuery('.avirato_form select:nth-child(1) :first-child').each(function (){
        if (jQuery(this).text() == 'Elegir'){
          jQuery(this).text('Wählen');
        }
      });

      jQuery('input[id*="prom"]').attr('placeholder', 'Werbemittel');
      jQuery('input[id*="check-availability"]').attr('value', 'RESERVIEREN');
      jQuery('.avirBtn_auto').text('RESERVIEREN');
      numCalendarios.each(function () {
        jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          numberOfMonths: 1,
          beforeShow: customRange,
          firstDay: 1,
          minDate: "dateToday",
          dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          monthNames:
          ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
          "August", "September", "Oktober", "November", "Dezember"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          onClose: function (selectedDate) {
            var myDate = jQuery(this).datepicker('getDate');
            myDate.setDate(myDate.getDate() + 1);
            var idCal = jQuery(this).attr('id').substring(14);
            jQuery('#date-picker-2-' + idCal).datepicker('setDate', myDate);
          }
        });
        jQuery("#date-picker-2-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          firstDay: 1,
          beforeShow: customRange,
          monthNames:
          ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
          "August", "September", "Oktober", "November", "Dezember"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          numberOfMonths: 1
        });
      });
    } else {
      numCalendarios.each(function () {
        jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          numberOfMonths: 1,
          beforeShow: customRange,
          firstDay: 1,
          minDate: "dateToday",
          dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          monthNames:
          ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
          "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          onClose: function (selectedDate) {
            var myDate = jQuery(this).datepicker('getDate');
            myDate.setDate(myDate.getDate() + 1);
            var idCal = jQuery(this).attr('id').substring(14);
            jQuery('#date-picker-2-' + idCal).datepicker('setDate', myDate);
          }
        });
        jQuery("#date-picker-2-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          firstDay: 1,
          beforeShow: customRange,
          monthNames:
          ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
          "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          numberOfMonths: 1
        });
      });
    }
  } else {

    var url = window.location.href;
    if (url.indexOf('?lang=es') > -1 || url.indexOf('/es/') > -1) {
      numCalendarios.each(function () {
        jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          numberOfMonths: 1,
          beforeShow: customRange,
          firstDay: 1,
          minDate: "dateToday",
          dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          monthNames:
          ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
          "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          onClose: function (selectedDate) {
            var myDate = jQuery(this).datepicker('getDate');
            myDate.setDate(myDate.getDate() + 1);
            var idCal = jQuery(this).attr('id').substring(14);
            jQuery('#date-picker-2-' + idCal).datepicker('setDate', myDate);
          }
        });
        jQuery("#date-picker-2-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          firstDay: 1,
          beforeShow: customRange,
          monthNames:
          ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
          "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          numberOfMonths: 1
        });
      });
    } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
      jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=de');
      jQuery('.avirato_form select :first-child').each(function () {

        if (jQuery(this).text() == 'Select your Room' || jQuery(this).text() == 'Elije Establecimiento' || jQuery(this).text() == 'Ver todos' || jQuery(this).text() == 'Wählen Sie Einrichtung') {
          jQuery(this).text('Wählen Sie Einrichtung');
        }else if(jQuery(this).text() == 'Ubicacion'){
          jQuery(this).text('Standort');
        }
      });
      jQuery('.avirato_form select:last-of-type option').each(function () {

        if(jQuery(this).text() == 'Otras ubicaciones'){
          jQuery(this).text('Andere Standorte');
        }
      });
      jQuery('.avirato_form select:nth-child(1) :first-child').each(function (){
        if (jQuery(this).text() == 'Elegir'){
          jQuery(this).text('Wählen');
        }
      });
      jQuery('input[id*="prom"]').attr('placeholder', 'Werbemittel');
      jQuery('input[id*="check-availability"]').attr('value', 'RESERVIEREN');
      jQuery('.avirBtn_auto').text('RESERVIEREN');
      numCalendarios.each(function () {
        jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          numberOfMonths: 1,
          beforeShow: customRange,
          firstDay: 1,
          minDate: "dateToday",
          dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          monthNames:
          ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
          "August", "September", "Oktober", "November", "Dezember"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          onClose: function (selectedDate) {
            var myDate = jQuery(this).datepicker('getDate');
            myDate.setDate(myDate.getDate() + 1);
            var idCal = jQuery(this).attr('id').substring(14);
            jQuery('#date-picker-2-' + idCal).datepicker('setDate', myDate);
          }
        });
        jQuery("#date-picker-2-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          firstDay: 1,
          beforeShow: customRange,
          monthNames:
          ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
          "August", "September", "Oktober", "November", "Dezember"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          numberOfMonths: 1
        });
      });
    } else {
      jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=en');
      jQuery('.avirato_form select :first-child').each(function () {

        if (jQuery(this).text() == 'Select your Room' || jQuery(this).text() == 'Elije Establecimiento' || jQuery(this).text() == 'Ver todos' || jQuery(this).text() == 'Wählen Sie Einrichtung') {
          jQuery(this).text('Select your Room');
        }else if(jQuery(this).text() == 'Ubicacion'){
          jQuery(this).text('Location');
        }
      });
      jQuery('.avirato_form select:last-of-type option').each(function () {

        if(jQuery(this).text() == 'Otras ubicaciones'){
          jQuery(this).text('Other locations');
        }
      });
      jQuery('.avirato_form select:nth-child(1) :first-child').each(function (){
        if (jQuery(this).text() == 'Elegir'){
          jQuery(this).text('Choose');
        }
      });
      jQuery('input[id*="prom"]').attr('placeholder', 'Promotional Code');
      jQuery('input[id*="check-availability"]').attr('value', 'BOOK NOW');
      jQuery('.avirBtn_auto').text('BOOK NOW');
      numCalendarios.each(function () {
        jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          numberOfMonths: 1,
          beforeShow: customRange,
          firstDay: 1,
          minDate: "dateToday",
          dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          monthNames:
          ["January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          onClose: function (selectedDate) {
            var myDate = jQuery(this).datepicker('getDate');
            myDate.setDate(myDate.getDate() + 1);
            var idCal = jQuery(this).attr('id').substring(14);
            jQuery('#date-picker-2-' + idCal).datepicker('setDate', myDate);
          }
        });
        jQuery("#date-picker-2-" + jQuery(this).attr('id').substring(14)).datepicker({
          dateFormat: "dd-mm-yy",
          dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
          dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
          firstDay: 1,
          beforeShow: customRange,
          monthNames:
          ["January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"],
          monthNamesShort:
          ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
          "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          numberOfMonths: 1
        });
      });
    }

  }

  numCalendarios.each(function () {
    jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker("setDate", "0");
    jQuery("#date-picker-2-" + jQuery(this).attr('id').substring(14)).datepicker("setDate", "1");
  });
}

//esta funcion desabilita en la fecha de salida todos los dias anteriores a la fecha seleccionada en la fecha de entrada.
function customRange(input) {

  var min = new Date();
  var max = new Date(min.getFullYear() + 2, '12', '31');
  var dateMin = min;
  var dateMax = max;
  numCalendarios.each(function () {
    if (input.id == "date-picker-1-" + jQuery(this).attr('id').substring(14)) {
      if (dateMin < min) {
        dateMin = min;
      }

      var dateAsString = min.getFullYear().toString() + "-" + (min.getMonth() + 1).toString() + "-" + min.getDate();
    } else if (input.id == "date-picker-2-" + jQuery(this).attr('id').substring(14)) {
      var dateAsString = min.getFullYear().toString() + "-" + (min.getMonth() + 1).toString() + "-" + min.getDate();
      if (jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker("getDate") != null) {
        var limit = jQuery("#date-picker-1-" + jQuery(this).attr('id').substring(14)).datepicker("getDate");
        dateMin = new Date(limit.getFullYear(), limit.getMonth(), limit.getDate() + 1, limit.getHours(), limit.getMinutes(), limit.getSeconds());
      }
    }
  });
  return {
    minDate: dateMin,
    maxDate: dateMax
  };
}
var url;
jQuery(document).on('change', '.select_apart', function () {
  url = jQuery(this).val();
  if (url == "") {
    jQuery('#alert_color').css('display', 'block');
  } else {
    jQuery(this).parents('form').attr('action', url);
  }
});

jQuery(document).on('click', '#check-availability', function () {
  jQuery('.select_apart').each(function () {
    var box = jQuery('.select_apart').val();
    if (box == "all") {
      url = jQuery(this).parents('form').attr('action');
    }
  });
});

function val() {
  d = document.getElementById("zonaSelect").value;
  bd = document.getElementById("catSelect");
  jQuery('#catSelect .all').attr('selected','selected');
  bd.classList.add("animationSelect");
  setTimeout(function(){
    jQuery(bd).removeClass('animationSelect');
  }, 520);
  bda = bd.getElementsByTagName('option');
  for(i =0;i<bda.length;i++){
    if(bda[i].className !== d && bda[i].className !== 'all' && d !== 'all' ){
      bda[i].style.display = 'none';
    }else{
      bda[i].style.display = 'block';
    }
  }
}
jQuery(document).ready(function(){
  if(jQuery('#catSelect').val() == '#'){
    jQuery('#check-availability').attr('disabled','disabled');
    jQuery('#check-availability').css('cursor','not-allowed');
  }else{
    jQuery('#check-availability').attr('disabled',false);
  }
})
jQuery('#catSelect').on('change',function(){
  if(jQuery('#catSelect').val() == '#'){
    jQuery('#check-availability').attr('disabled','disabled');
    jQuery('#check-availability').css('cursor','not-allowed');
  }else{
    jQuery('#check-availability').attr('disabled',false);
    jQuery('#check-availability').css('cursor','pointer');
  }
})
