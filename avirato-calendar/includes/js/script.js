
function oPen() {

    jQuery('.avirato_form').css('top', '15px');
    jQuery('#mask').css('top', '0');
    jQuery('#mask').css('opacity', '.6');
}
;
function cLose() {

    jQuery('.avirato_form').css('top', '-800px');
    jQuery('#mask').css('top', '-100%');
    jQuery('#mask').css('opacity', '0');
}



dat = new Date();
d = dat.getDate();
m = dat.getMonth() + 1;
y = dat.getFullYear();

dateToAction = '&startDate=' + d + '-' + m + '-' + y;
var dateToAction1;

jQuery(function calendario() {
    if (jQuery('html').attr('lang') == 'es-ES') {
        var url = window.location.href;
        if (url.indexOf('?lang=en') > -1 || url.indexOf('/en/') > -1) {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=en');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Select your Room');
            }
            jQuery('#llegada').text('Arrival: ');
            jQuery('#salida').text('Departure: ');
            jQuery('#reserv').text('BOOK NOW');
            jQuery('#prom').attr('placeholder', 'Promotional Code');
            jQuery('#check-availability').attr('value', 'BOOK NOW');
            jQuery('.avirBtn_auto').text('BOOK NOW');
            jQuery('#alertMsg').text('Select date to check availability');

            var to,
                    from = jQuery(".datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "",
                minDate: "dateToday",
                changeMonth: false,
                firstDay: 1,
                numberOfMonths: 1,
                dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November", "December"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {

                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate = jQuery(this).datepicker('getDate');
                    var theDate = jQuery(this).datepicker()[0].value;
                    dateToAction = '&startDate=' + theDate;
                    jQuery('input.datepicker').attr('value', theDate);
                    myDate.setDate(myDate.getDate() + 1);

                    jQuery('.datepicker2').datepicker("option", 'minDate', myDate);
                    if (dateToAction1) {
                        var dateToAction1Sub = dateToAction1.substring(9);
                        var dateToActionSub = dateToAction.substring(11);
                        if (dateToAction1Sub <= dateToActionSub) {
                            var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                            dateToAction1 = '&endDate=' + aa;
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                            jQuery('#toDate').text(aa);
                        } else {
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                        }
                    } else {
                        var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    }

                }

            });

            to = jQuery(".datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "1",
                minDate: "dateToday" + 1,
                changeMonth: false,
                numberOfMonths: 1,
                firstDay: 1,
                dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November", "December"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate1 = jQuery(this).datepicker('getDate');
                    var theDate1 = jQuery(this).datepicker()[0].value;
                    dateToAction1 = '&endDate=' + theDate1;
                    jQuery('input.datepicker2').attr('value', theDate1);
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#toDate').text(theDate1);
                    return dateToAction1;
                }
            });
        } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=de');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Wählen Sie Einrichtung');
            }
            jQuery('#prom').attr('placeholder', 'Werbemittel');
            jQuery('#check-availability').attr('value', 'RESERVIEREN');
            jQuery('#llegada').text('Ankunft: ');
            jQuery('#salida').text('Abreise: ');
            jQuery('#reserv').text('RESERVIEREN');
            jQuery('.avirBtn_auto').text('RESERVIEREN');
            jQuery('#alertMsg').text('Datum auswählen, um die Verfügbarkeit zu prüfen');
            var to,
                    from = jQuery(".datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "",
                minDate: "dateToday",
                changeMonth: false,
                firstDay: 1,
                numberOfMonths: 1,
                dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
                            "August", "September", "Oktober", "November", "Dezember"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate = jQuery(this).datepicker('getDate');
                    var theDate = jQuery(this).datepicker()[0].value;
                    dateToAction = '&startDate=' + theDate;
                    jQuery('input.datepicker').attr('value', theDate);
                    myDate.setDate(myDate.getDate() + 1);

                    jQuery('.datepicker2').datepicker("option", 'minDate', myDate);
                    if (dateToAction1) {
                        var dateToAction1Sub = dateToAction1.substring(9);
                        var dateToActionSub = dateToAction.substring(11);
                        if (dateToAction1Sub <= dateToActionSub) {
                            var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                            dateToAction1 = '&endDate=' + aa;
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                            jQuery('#toDate').text(aa);
                        } else {
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                        }
                    } else {
                        var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    }
                }
            });

            to = jQuery(".datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "1",
                minDate: "dateToday" + 1,
                changeMonth: false,
                numberOfMonths: 1,
                firstDay: 1,
                dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
                            "August", "September", "Oktober", "November", "Dezember"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate1 = jQuery(this).datepicker('getDate');
                    var theDate1 = jQuery(this).datepicker()[0].value;
                    dateToAction1 = '&endDate=' + theDate1;
                    jQuery('input.datepicker2').attr('value', theDate1);
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#toDate').text(theDate1);
                    return dateToAction1;
                }
            });
        } else {
            var to,
                    from = jQuery(".datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "",
                minDate: "dateToday",
                changeMonth: false,
                firstDay: 1,
                numberOfMonths: 1,
                dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate = jQuery(this).datepicker('getDate');
                    var theDate = jQuery(this).datepicker()[0].value;
                    dateToAction = '&startDate=' + theDate;
                    jQuery('input.datepicker').attr('value', theDate);
                    myDate.setDate(myDate.getDate() + 1);

                    jQuery('.datepicker2').datepicker("option", 'minDate', myDate);
                    if (dateToAction1) {
                        var dateToAction1Sub = dateToAction1.substring(9);
                        var dateToActionSub = dateToAction.substring(11);
                        if (dateToAction1Sub <= dateToActionSub) {
                            var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                            dateToAction1 = '&endDate=' + aa;
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                            jQuery('#toDate').text(aa);
                        } else {
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                        }
                    } else {
                        var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    }
                }
            });

            to = jQuery(".datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "1",
                minDate: "dateToday" + 1,
                changeMonth: false,
                numberOfMonths: 1,
                firstDay: 1,
                dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate1 = jQuery(this).datepicker('getDate');
                    var theDate1 = jQuery(this).datepicker()[0].value;
                    dateToAction1 = '&endDate=' + theDate1;
                    jQuery('input.datepicker2').attr('value', theDate1);
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#toDate').text(theDate1);
                    return dateToAction1;
                }
            });
        }
    } else {
        var url = window.location.href;
        if (url.indexOf('?lang=es') > -1 || url.indexOf('/es/') > -1) {
            var to,
                    from = jQuery(".datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "",
                minDate: "dateToday",
                changeMonth: false,
                firstDay: 1,
                numberOfMonths: 1,
                dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate = jQuery(this).datepicker('getDate');
                    var theDate = jQuery(this).datepicker()[0].value;
                    dateToAction = '&startDate=' + theDate;
                    jQuery('input.datepicker').attr('value', theDate);
                    myDate.setDate(myDate.getDate() + 1);

                    jQuery('.datepicker2').datepicker("option", 'minDate', myDate);
                    if (dateToAction1) {
                        var dateToAction1Sub = dateToAction1.substring(9);
                        var dateToActionSub = dateToAction.substring(11);
                        if (dateToAction1Sub <= dateToActionSub) {
                            var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                            dateToAction1 = '&endDate=' + aa;
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                            jQuery('#toDate').text(aa);
                        } else {
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                        }
                    } else {
                        var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    }
                }
            });

            to = jQuery(".datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "1",
                minDate: "dateToday" + 1,
                changeMonth: false,
                numberOfMonths: 1,
                firstDay: 1,
                dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate1 = jQuery(this).datepicker('getDate');
                    var theDate1 = jQuery(this).datepicker()[0].value;
                    dateToAction1 = '&endDate=' + theDate1;
                    jQuery('input.datepicker2').attr('value', theDate1);
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#toDate').text(theDate1);
                    return dateToAction1;
                }
            });
        } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=de');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Wählen Sie Einrichtung');
            }
            jQuery('#prom').attr('placeholder', 'Werbemittel');
            jQuery('#check-availability').attr('value', 'RESERVIEREN');
            jQuery('#llegada').text('Ankunft: ');
            jQuery('#salida').text('Abreise: ');
            jQuery('#reserv').text('RESERVIEREN');
            jQuery('.avirBtn_auto').text('RESERVIEREN');
            jQuery('#alertMsg').text('Datum auswählen, um die Verfügbarkeit zu prüfen');
            var to,
                    from = jQuery(".datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "",
                minDate: "dateToday",
                changeMonth: false,
                firstDay: 1,
                numberOfMonths: 1,
                dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
                            "August", "September", "Oktober", "November", "Dezember"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate = jQuery(this).datepicker('getDate');
                    var theDate = jQuery(this).datepicker()[0].value;
                    dateToAction = '&startDate=' + theDate;
                    jQuery('input.datepicker').attr('value', theDate);
                    myDate.setDate(myDate.getDate() + 1);

                    jQuery('.datepicker2').datepicker("option", 'minDate', myDate);
                    if (dateToAction1) {
                        var dateToAction1Sub = dateToAction1.substring(9);
                        var dateToActionSub = dateToAction.substring(11);
                        if (dateToAction1Sub <= dateToActionSub) {
                            var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                            dateToAction1 = '&endDate=' + aa;
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                            jQuery('#toDate').text(aa);
                        } else {
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                        }
                    } else {
                        var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    }
                }
            });

            to = jQuery(".datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "1",
                minDate: "dateToday" + 1,
                changeMonth: false,
                numberOfMonths: 1,
                firstDay: 1,
                dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli",
                            "August", "September", "Oktober", "November", "Dezember"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate1 = jQuery(this).datepicker('getDate');
                    var theDate1 = jQuery(this).datepicker()[0].value;
                    dateToAction1 = '&endDate=' + theDate1;
                    jQuery('input.datepicker2').attr('value', theDate1);
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#toDate').text(theDate1);
                    return dateToAction1;
                }
            });
        } else {
          jQuery('#form_avirato').attr('action', jQuery('#form_avirato').attr('action')+'&lang=en');
            if (jQuery('.avirato_form select :first-child').text() == 'Select your Room' || jQuery('.avirato_form select :first-child').text() == 'Elije Establecimiento' || jQuery('.avirato_form select :first-child').text() == 'Ver todos' || jQuery('.avirato_form select :first-child').text() == 'Wählen Sie Einrichtung') {
                jQuery('.avirato_form select :first-child').text('Select your Room');
            }
            jQuery('#llegada').text('Arrival: ');
            jQuery('#salida').text('Departure: ');
            jQuery('#reserv').text('BOOK NOW');
            jQuery('#prom').attr('placeholder', 'Promotional Code');
            jQuery('#check-availability').attr('value', 'BOOK NOW');
            jQuery('.avirBtn_auto').text('BOOK NOW');
            jQuery('#alertMsg').text('Select date to check availability');

            var to,
                    from = jQuery(".datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "",
                minDate: "dateToday",
                changeMonth: false,
                firstDay: 1,
                numberOfMonths: 1,
                dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November", "December"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {

                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate = jQuery(this).datepicker('getDate');
                    var theDate = jQuery(this).datepicker()[0].value;
                    dateToAction = '&startDate=' + theDate;
                    jQuery('input.datepicker').attr('value', theDate);
                    myDate.setDate(myDate.getDate() + 1);

                    jQuery('.datepicker2').datepicker("option", 'minDate', myDate);
                    if (dateToAction1) {
                        var dateToAction1Sub = dateToAction1.substring(9);
                        var dateToActionSub = dateToAction.substring(11);
                        if (dateToAction1Sub <= dateToActionSub) {
                            var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                            dateToAction1 = '&endDate=' + aa;
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                            jQuery('#toDate').text(aa);
                        } else {
                            document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                            jQuery('#fromDate').text(theDate);
                        }
                    } else {
                        var aa = jQuery('.datepicker2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    }
                }
            });

            to = jQuery(".datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "1",
                minDate: "dateToday" + 1,
                changeMonth: false,
                numberOfMonths: 1,
                firstDay: 1,
                dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                monthNames:
                        ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November", "December"],
                monthNamesShort:
                        ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                onSelect: function () {
                    jQuery('#check-availability').removeAttr('disabled');
                    var myDate1 = jQuery(this).datepicker('getDate');
                    var theDate1 = jQuery(this).datepicker()[0].value;
                    dateToAction1 = '&endDate=' + theDate1;
                    jQuery('input.datepicker2').attr('value', theDate1);
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#toDate').text(theDate1);
                    return dateToAction1;
                }
            });
        }
    }
});

window["global"] = dateToAction;

var screensize = jQuery(window).width();

jQuery(document).ready(function () {
    if (screensize <= 1200) {
        var date = new Date();
        var day = date.getDate();
        var day2 = date.getDate() + 1;
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (jQuery("div.datepicker").length > 0) {
            jQuery("div.datepicker").css('display', 'none');
            jQuery("input.datepicker").attr('type', 'text');
            jQuery("input.datepicker").attr('placeholder', day + '-' + month + '-' + year);
        }
        if (jQuery("div.datepicker2").length > 0) {
            jQuery("div.datepicker2").css('display', 'none');
            jQuery("input.datepicker2").attr('type', 'text');
            jQuery("input.datepicker2").attr('placeholder', day2 + '-' + month + '-' + year);
        }
    } else {
        if (jQuery("div.datepicker").length > 0) {
            jQuery("div.datepicker").css('display', 'block');
            jQuery("input.datepicker").attr('type', 'hidden');
        }
        if (jQuery("div.datepicker2").length > 0) {
            jQuery("div.datepicker2").css('display', 'block');
            jQuery("input.datepicker2").attr('type', 'hidden');
        }
    }
});

changething = function (screensize) {
    if (screensize <= 1200) {
        if (jQuery("div.datepicker").length > 0) {
            jQuery("div.datepicker").css('display', 'none');
            jQuery("input.datepicker").attr('type', 'text');
        }
        if (jQuery("div.datepicker2").length > 0) {
            jQuery("div.datepicker2").css('display', 'none');
            jQuery("input.datepicker2").attr('type', 'text');
        }
    } else {
        if (jQuery("div.datepicker").length > 0) {
            jQuery("div.datepicker").css('display', 'block');
            jQuery("input.datepicker").attr('type', 'hidden');
        }
        if (jQuery("div.datepicker2").length > 0) {
            jQuery("div.datepicker2").css('display', 'block');
            jQuery("input.datepicker2").attr('type', 'hidden');
        }
    }
};
changetop = function (screensize) {
    if (screensize <= 600) {
        if (jQuery(".avirato_form").length > 0) {
            jQuery(".avirato_form").css('top', '10px');

        }
        if (jQuery("div.datepicker2").length > 0) {
            jQuery("div.datepicker2").css('display', 'none');
            jQuery("input.datepicker2").attr('type', 'text');
        }
    } else {
        if (jQuery("div.datepicker").length > 0) {
            jQuery("div.datepicker").css('display', 'block');
            jQuery("input.datepicker").attr('type', 'hidden');
        }
        if (jQuery("div.datepicker2").length > 0) {
            jQuery("div.datepicker2").css('display', 'block');
            jQuery("input.datepicker2").attr('type', 'hidden');
        }
    }
};
jQuery(window).resize(function () {
    var screensize = jQuery(window).width();
    changething(screensize);
});

jQuery(document).on('change', '#select_apart', function () {

    var urlDate;
    urlDate = jQuery('#form_avirato').attr('action').substr(jQuery('#form_avirato').attr('action').indexOf('&'));

    url = jQuery('#select_apart').val();
    if (url == "") {
        jQuery('#alert_color').css('display', 'block');

    } else {

        jQuery('#form_avirato').attr('action', url + urlDate);

    }
});


jQuery(document).on('click', '#check-availability', function () {

    jQuery('#select_apart').each(function () {

        var box = jQuery('#select_apart').val();
        if (box == "si") {
            url = jQuery('#form_avirato').attr('action');

        }
    });
});
