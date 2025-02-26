



jQuery(document).on('ready', abrirCalendario);
dat = new Date();
d = dat.getDate();
m = dat.getMonth() + 1;
y = dat.getFullYear();

dateToAction = '&startDate=' + d + '-' + m + '-' + y;
var dateToAction1;
function abrirCalendario() {
    var url = window.location.href;
    if (url.indexOf('?lang=en') > -1 || url.indexOf('/en/') > -1) {
        jQuery('.title_avirato .high_avirato').text('ONLINE BOOKING');
        jQuery('#pre_avirato').text('Best price Guaranteed');
        jQuery('.small_avirato1 span').text('Promotional code: ');
        jQuery('#prom').attr('placeholder','Promotional Code');
        jQuery('#descEx').text('Exclusive Discounts');
        jQuery('#entrada').text('Arrival');
        jQuery('#salida').text('Departure');
        jQuery('#check-availability').attr('value','BOOK NOW');
        jQuery('.avirBtn_auto').text('BOOK NOW');
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
                var theDate = jQuery(this).datepicker()[0].value;
                dateToAction = '&startDate=' + theDate;
                jQuery('input#date-picker-1').attr('value', theDate);
                myDate.setDate(myDate.getDate() + 1);
                jQuery('#date-picker-2').datepicker('setDate', myDate);
                var arr = selectedDate.split("-");
                if (arr[1] == 01) {
                    arr[1] = 'January';
                } else if (arr[1] == 02) {
                    arr[1] = 'February';
                } else if (arr[1] == 03) {
                    arr[1] = 'March';
                } else if (arr[1] == 04) {
                    arr[1] = 'April';
                } else if (arr[1] == 05) {
                    arr[1] = 'May';
                } else if (arr[1] == 06) {
                    arr[1] = 'June';
                } else if (arr[1] == 07) {
                    arr[1] = 'July';
                } else if (arr[1] == 08) {
                    arr[1] = 'August';
                } else if (arr[1] == 09) {
                    arr[1] = 'September';
                } else if (arr[1] == 10) {
                    arr[1] = 'October';
                } else if (arr[1] == 11) {
                    arr[1] = 'November';
                } else if (arr[1] == 12) {
                    arr[1] = 'December';
                }

                jQuery('#date-picker-1-month').html(arr[1]);
                jQuery('#date-picker-2-month').html(arr[1]);
                jQuery('#date-picker-2').datepicker("option", 'minDate', myDate);
                if (dateToAction1) {
                    var dateToAction1Sub = dateToAction1.substring(9);
                    var dateToActionSub = dateToAction.substring(11);
                    if (dateToAction1Sub <= dateToActionSub) {
                        var aa = jQuery('#date-picker-2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    } else {
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                    }
                } else {
                    var aa = jQuery('#date-picker-2').datepicker("option", "date", myDate)[0].value;
                    dateToAction1 = '&endDate=' + aa;
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#fromDate').text(theDate);
                    jQuery('#toDate').text(aa);
                }
                console.log(theDate);
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

            numberOfMonths: 1,
            onClose: function (selectedDate) {
                var myDate1 = jQuery(this).datepicker('getDate');
                var theDate1 = jQuery(this).datepicker()[0].value;
                dateToAction1 = '&endDate=' + theDate1;
                jQuery('input#date-picker-2').attr('value', theDate1);
                document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                jQuery('#toDate').text(theDate1);

                var arr2 = selectedDate.split("-");
                if (arr2[1] == 01) {
                    arr2[1] = 'January';
                } else if (arr2[1] == 02) {
                    arr2[1] = 'February';
                } else if (arr2[1] == 03) {
                    arr2[1] = 'March';
                } else if (arr2[1] == 04) {
                    arr2[1] = 'April';
                } else if (arr2[1] == 05) {
                    arr2[1] = 'May';
                } else if (arr2[1] == 06) {
                    arr2[1] = 'June';
                } else if (arr2[1] == 07) {
                    arr2[1] = 'July';
                } else if (arr2[1] == 08) {
                    arr2[1] = 'August';
                } else if (arr2[1] == 09) {
                    arr2[1] = 'September';
                } else if (arr2[1] == 10) {
                    arr2[1] = 'October';
                } else if (arr2[1] == 11) {
                    arr2[1] = 'November';
                } else if (arr2[1] == 12) {
                    arr2[1] = 'December';
                }
                jQuery('#date-picker-2-month').html(arr2[1]);

                return dateToAction1;
            }
        });
    } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
        jQuery('.title_avirato .high_avirato').text('ONLINE RESERVIERUNG');
        jQuery('#pre_avirato').text('Bestpreis garantiert');
        jQuery('.small_avirato1 span').text('Werbemittel: ');
        jQuery('#prom').attr('placeholder','Werbemittel');
        jQuery('#descEx').text('Exklusive Rabatte');
        jQuery('#entrada').text('Ankunft');
        jQuery('#salida').text('Abreise');
        jQuery('#check-availability').attr('value','RESERVIEREN');
        jQuery('.avirBtn_auto').text('RESERVIEREN');
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
                var theDate = jQuery(this).datepicker()[0].value;
                dateToAction = '&startDate=' + theDate;
                jQuery('input#date-picker-1').attr('value', theDate);
                myDate.setDate(myDate.getDate() + 1);
                jQuery('#date-picker-2').datepicker('setDate', myDate);
                var arr = selectedDate.split("-");
                if (arr[1] == 01) {
                    arr[1] = 'Januar';
                } else if (arr[1] == 02) {
                    arr[1] = 'Februar';
                } else if (arr[1] == 03) {
                    arr[1] = 'März';
                } else if (arr[1] == 04) {
                    arr[1] = 'April';
                } else if (arr[1] == 05) {
                    arr[1] = 'Mai';
                } else if (arr[1] == 06) {
                    arr[1] = 'Juni';
                } else if (arr[1] == 07) {
                    arr[1] = 'Juli';
                } else if (arr[1] == 08) {
                    arr[1] = 'August';
                } else if (arr[1] == 09) {
                    arr[1] = 'September';
                } else if (arr[1] == 10) {
                    arr[1] = 'Oktober';
                } else if (arr[1] == 11) {
                    arr[1] = 'November';
                } else if (arr[1] == 12) {
                    arr[1] = 'Dezember';
                }

                jQuery('#date-picker-1-month').html(arr[1]);
                jQuery('#date-picker-2-month').html(arr[1]);
                jQuery('#date-picker-2').datepicker("option", 'minDate', myDate);
                if (dateToAction1) {
                    var dateToAction1Sub = dateToAction1.substring(9);
                    var dateToActionSub = dateToAction.substring(11);
                    if (dateToAction1Sub <= dateToActionSub) {
                        var aa = jQuery('#date-picker-2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    } else {
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                    }
                } else {
                    var aa = jQuery('#date-picker-2').datepicker("option", "date", myDate)[0].value;
                    dateToAction1 = '&endDate=' + aa;
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#fromDate').text(theDate);
                    jQuery('#toDate').text(aa);
                }
                console.log(theDate);
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

            numberOfMonths: 1,
            onClose: function (selectedDate) {
                var myDate1 = jQuery(this).datepicker('getDate');
                var theDate1 = jQuery(this).datepicker()[0].value;
                dateToAction1 = '&endDate=' + theDate1;
                jQuery('input#date-picker-2').attr('value', theDate1);
                document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                jQuery('#toDate').text(theDate1);

                var arr2 = selectedDate.split("-");
                if (arr2[1] == 01) {
                    arr2[1] = 'Januar';
                } else if (arr2[1] == 02) {
                    arr2[1] = 'Februar';
                } else if (arr2[1] == 03) {
                    arr2[1] = 'März';
                } else if (arr2[1] == 04) {
                    arr2[1] = 'April';
                } else if (arr2[1] == 05) {
                    arr2[1] = 'Mai';
                } else if (arr2[1] == 06) {
                    arr2[1] = 'Juni';
                } else if (arr2[1] == 07) {
                    arr2[1] = 'Juli';
                } else if (arr2[1] == 08) {
                    arr2[1] = 'August';
                } else if (arr2[1] == 09) {
                    arr2[1] = 'September';
                } else if (arr2[1] == 10) {
                    arr2[1] = 'Oktober';
                } else if (arr2[1] == 11) {
                    arr2[1] = 'November';
                } else if (arr2[1] == 12) {
                    arr2[1] = 'Dezember';
                }
                jQuery('#date-picker-2-month').html(arr2[1]);

                return dateToAction1;
            }
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
                var theDate = jQuery(this).datepicker()[0].value;
                dateToAction = '&startDate=' + theDate;
                jQuery('input#date-picker-1').attr('value', theDate);
                myDate.setDate(myDate.getDate() + 1);
                jQuery('#date-picker-2').datepicker('setDate', myDate);
                var arr = selectedDate.split("-");
                if (arr[1] == 01) {
                    arr[1] = 'Enero';
                } else if (arr[1] == 02) {
                    arr[1] = 'Febrero';
                } else if (arr[1] == 03) {
                    arr[1] = 'Marzo';
                } else if (arr[1] == 04) {
                    arr[1] = 'Abril';
                } else if (arr[1] == 05) {
                    arr[1] = 'Mayo';
                } else if (arr[1] == 06) {
                    arr[1] = 'Junio';
                } else if (arr[1] == 07) {
                    arr[1] = 'Julio';
                } else if (arr[1] == 08) {
                    arr[1] = 'Agosto';
                } else if (arr[1] == 09) {
                    arr[1] = 'Septiembre';
                } else if (arr[1] == 10) {
                    arr[1] = 'Octubre';
                } else if (arr[1] == 11) {
                    arr[1] = 'Noviembre';
                } else if (arr[1] == 12) {
                    arr[1] = 'Diciembre';
                }

                jQuery('#date-picker-1-month').html(arr[1]);
                jQuery('#date-picker-2-month').html(arr[1]);
                jQuery('#date-picker-2').datepicker("option", 'minDate', myDate);
                if (dateToAction1) {
                    var dateToAction1Sub = dateToAction1.substring(9);
                    var dateToActionSub = dateToAction.substring(11);
                    if (dateToAction1Sub <= dateToActionSub) {
                        var aa = jQuery('#date-picker-2').datepicker("option", "date", myDate)[0].value;
                        dateToAction1 = '&endDate=' + aa;
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                        jQuery('#toDate').text(aa);
                    } else {
                        document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                        jQuery('#fromDate').text(theDate);
                    }
                } else {
                    var aa = jQuery('#date-picker-2').datepicker("option", "date", myDate)[0].value;
                    dateToAction1 = '&endDate=' + aa;
                    document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                    jQuery('#fromDate').text(theDate);
                    jQuery('#toDate').text(aa);
                }
                console.log(theDate);
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

            numberOfMonths: 1,
            onClose: function (selectedDate) {
                var myDate1 = jQuery(this).datepicker('getDate');
                var theDate1 = jQuery(this).datepicker()[0].value;
                dateToAction1 = '&endDate=' + theDate1;
                jQuery('input#date-picker-2').attr('value', theDate1);
                document.getElementById('form_avirato').action += dateToAction + dateToAction1;
                jQuery('#toDate').text(theDate1);

                var arr2 = selectedDate.split("-");
                if (arr2[1] == 01) {
                    arr2[1] = 'Enero';
                } else if (arr2[1] == 02) {
                    arr2[1] = 'Febrero';
                } else if (arr2[1] == 03) {
                    arr2[1] = 'Marzo';
                } else if (arr2[1] == 04) {
                    arr2[1] = 'Abril';
                } else if (arr2[1] == 05) {
                    arr2[1] = 'Mayo';
                } else if (arr2[1] == 06) {
                    arr2[1] = 'Junio';
                } else if (arr2[1] == 07) {
                    arr2[1] = 'Julio';
                } else if (arr2[1] == 08) {
                    arr2[1] = 'Agosto';
                } else if (arr2[1] == 09) {
                    arr2[1] = 'Septiembre';
                } else if (arr2[1] == 10) {
                    arr2[1] = 'Octubre';
                } else if (arr2[1] == 11) {
                    arr2[1] = 'Noviembre';
                } else if (arr2[1] == 12) {
                    arr2[1] = 'Diciembre';
                }
                jQuery('#date-picker-2-month').html(arr2[1]);

                return dateToAction1;
            }
        });
    }



    jQuery("#date-picker-1").datepicker("setDate", "0");
    jQuery("#date-picker-2").datepicker("setDate", "1");


    var currMonth = (new Date).getMonth();
    var month = new Array();
    if (url.indexOf('?lang=en') > -1 || url.indexOf('/en/') > -1) {
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
    } else if (url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1) {
        month[0] = "Januar";
        month[1] = "Februar";
        month[2] = "März";
        month[3] = "April";
        month[4] = "Mai";
        month[5] = "Juni";
        month[6] = "Juli";
        month[7] = "August";
        month[8] = "September";
        month[9] = "Oktober";
        month[10] = "November";
        month[11] = "Dezember";
    } else {
        month[0] = "Enero";
        month[1] = "Febrero";
        month[2] = "Marzo";
        month[3] = "Abril";
        month[4] = "Mayo";
        month[5] = "Junio";
        month[6] = "Julio";
        month[7] = "Agosto";
        month[8] = "Septiembre";
        month[9] = "Octubre";
        month[10] = "Noviembre";
        month[11] = "Diciembre";
    }
    jQuery('#date-picker-1-month').html(month[currMonth]);
    jQuery('#date-picker-2-month').html(month[currMonth]);

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
    debugger;



    url = jQuery('#select_apart').val();
    if (url == "") {
        jQuery('#alert_color').css('display', 'block');

    } else {

        jQuery('#form_avirato').attr('action', url);

    }
});


jQuery(document).on('click', '#check-availability', function () {

//    jQuery('#select_apart').each(function () {
//        debugger
//        var box = jQuery('#select_apart').val();
//        if (box == "si") {
//            url = jQuery('#form_avirato').attr('action');
//
//        }
//    });

//    if (url == "" || url == undefined) {
//        jQuery('#alert_color').css('display', 'block');
//        return false;
//
//    } else {

    jQuery('#form_avirato').submit();
//    }
});

jQuery(document).on('click', '.close', function () {
    jQuery('#alert_color').css('display', 'none');

});


jQuery('.reservar').on('click', despliegaMenu);
function despliegaMenu()

{
    jQuery('#avirato').toggleClass('transition');

}