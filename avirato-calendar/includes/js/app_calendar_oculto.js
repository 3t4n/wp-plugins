



jQuery(document).on('ready', abrirCalendario);

function abrirCalendario() {
    if (jQuery('html').attr('lang') == 'es-ES') {
        var url = window.location.href;
        if (url.indexOf('?lang=en') > -1 || url.indexOf('/en/') > -1) {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=en');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Select your Room');
            }
            jQuery('#prom').attr('placeholder', 'Promotional Code');
            jQuery('#check-availability').attr('value', 'BOOK NOW');
            jQuery('#reserv').text('BOOK NOW');
            jQuery('.avirBtn_auto').text('BOOK NOW');
            jQuery('#cerrarO').text('Close');
            jQuery("#date-picker-1").datepicker({
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
                    jQuery('#date-picker-2').datepicker('setDate', myDate);
                }
            });
            jQuery("#date-picker-2").datepicker({
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
        } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=de');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Wählen Sie Einrichtung');
            }
            jQuery('#prom').attr('placeholder', 'Werbemittel');
            jQuery('#check-availability').attr('value', 'RESERVIEREN');
            jQuery('#reserv').text('RESERVIEREN');
            jQuery('.avirBtn_auto').text('RESERVIEREN');
            jQuery('#cerrarO').text('Schließen');
            jQuery("#date-picker-1").datepicker({
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
                    jQuery('#date-picker-2').datepicker('setDate', myDate);
                }
            });
            jQuery("#date-picker-2").datepicker({
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
        } else {
            jQuery("#date-picker-1").datepicker({
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
                    jQuery('#date-picker-2').datepicker('setDate', myDate);
                }
            });
            jQuery("#date-picker-2").datepicker({
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
        }

    } else {

        var url = window.location.href;
        if (url.indexOf('?lang=es') > -1 || url.indexOf('/es/') > -1) {
            jQuery("#date-picker-1").datepicker({
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
                    jQuery('#date-picker-2').datepicker('setDate', myDate);
                }
            });
            jQuery("#date-picker-2").datepicker({
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
        } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=de');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Wählen Sie Einrichtung');
            }
            jQuery('#prom').attr('placeholder', 'Werbemittel');
            jQuery('#check-availability').attr('value', 'RESERVIEREN');
            jQuery('.avirBtn_auto').text('RESERVIEREN');
            jQuery('#reserv').text('RESERVIEREN');
            jQuery('#cerrarO').text('Schließen');
            jQuery("#date-picker-1").datepicker({
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
                    jQuery('#date-picker-2').datepicker('setDate', myDate);
                }
            });
            jQuery("#date-picker-2").datepicker({
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
        } else {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=en');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Select your Room');
            }
            jQuery('#prom').attr('placeholder', 'Promotional Code');
            jQuery('#check-availability').attr('value', 'BOOK NOW');
            jQuery('.avirBtn_auto').text('BOOK NOW');
            jQuery('#reserv').text('BOOK NOW');
            jQuery('#cerrarO').text('Close');
            jQuery("#date-picker-1").datepicker({
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
                    jQuery('#date-picker-2').datepicker('setDate', myDate);
                }
            });
            jQuery("#date-picker-2").datepicker({
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
        }

    }
    jQuery("#date-picker-1").datepicker("setDate", "0");
    jQuery("#date-picker-2").datepicker("setDate", "1");
}

//esta funcion desabilita en la fecha de salida todos los dias anteriores a la fecha seleccionada en la fecha de entrada.
function customRange(input)
{

    var min = new Date();
    var max = new Date(min.getFullYear() + 2, '12', '31');
    var dateMin = min;
    var dateMax = max;

    if (input.id == "date-picker-1") {
        if (dateMin < min) {
            dateMin = min;
        }

        var dateAsString = min.getFullYear().toString() + "-" + (min.getMonth() + 1).toString() + "-" + min.getDate();
    } else if (input.id == "date-picker-2") {
        var dateAsString = min.getFullYear().toString() + "-" + (min.getMonth() + 1).toString() + "-" + min.getDate();
        if (jQuery("#date-picker-1").datepicker("getDate") != null) {
            var limit = jQuery("#date-picker-1").datepicker("getDate");
            dateMin = new Date(limit.getFullYear(), limit.getMonth(), limit.getDate() + 1, limit.getHours(), limit.getMinutes(), limit.getSeconds());
        }
    }
    return {
        minDate: dateMin,
        maxDate: dateMax
    };
}
var url;

jQuery(document).on('change', '#select_apart', function () {




    url = jQuery('#select_apart').val();
    if (url == "") {
        jQuery('#alert_color').css('display', 'block');

    } else {

        jQuery('#form_avirato').attr('action', url);

    }
});


jQuery(document).on('click', '#check-availability', function () {

    jQuery('#select_apart').each(function () {

        var box = jQuery('#select_apart').val();
        if (box == "si") {
            url = jQuery('#form_avirato').attr('action');

        }
    });



    jQuery('#form_avirato').submit();

});




jQuery('.reservar').on('click', despliegaMenu);
jQuery('#cerrarO').on('click', despliegaMenu1);
function despliegaMenu()

{
    jQuery('#avirato').toggleClass('transition');

}
function despliegaMenu1()

{
    if (jQuery('#avirato').hasClass('transition')) {
        jQuery('#avirato').toggleClass('transition');
    }
}
