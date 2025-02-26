jQuery(document).ready(function ($) {
    
    // Change Widget Id if Mobile Widget is defined and user uses a mobile navigator
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        console.log('mobile navigator');
        if ($('.alojapro-widget-plugin #widgetMobileId').length && $('.alojapro-widget-plugin #widgetMobileId').val() != "0") {
            console.log("change widget Id");
            $('.alojapro-widget-plugin #widgetId').val($('.alojapro-widget-plugin #widgetMobileId').val());
        }
    }
    $('.alojapro-widget-plugin #widgetMobileId').remove();

    /* WordPress Plugin Config. */

    // Destinations Modal
    $('.display-destinations').click( function (){
        $('#alojaproDestinations_modal').modal(); 
    });

    $('.select-destination').click( function (){
        var inputName = $(this).attr('data-name');
        $("#destinations").val(inputName);
        if ($(this).hasClass('destination')) {
            var destinationId = ($(this).data('destinationid'));
            if(destinationId){
                $("#frmEngine input[name=destinationId]").val(destinationId);
                $("#frmEngine input[name=propertyId]").val("");
            }
        } else {
            var propertyId = ($(this).data('propertyid'));
            if(propertyId){
                $("#frmEngine input[name=propertyId]").val(propertyId);
                $("#frmEngine input[name=destinationId]").val("");
            }
        }
        $('#alojaproDestinations_modal').modal('hide'); 
    });

    // Datepickers
    $(".alojapro-widget-plugin .datepicker").datepicker({
        dateFormat: "dd/mm/yy",
        firstDay: 1,
        minDate: new Date(),
        beforeShow: function (input, inst) {
            setTimeout(function() {
                // Calcula la posición dinámica del input "from" en relación al viewport
                var inputRect = input.getBoundingClientRect();
                var inputHeight = jQuery(input).outerHeight();
                var dpHeight = jQuery(inst.dpDiv).outerHeight();
                var windowHeight = window.innerHeight;

                // Calcula la nueva posición superior para el datepicker
                var newTop = inputRect.top + inputHeight;
                if (newTop + dpHeight > windowHeight) {
                    // Si no hay espacio suficiente debajo, coloca el datepicker arriba
                    newTop = inputRect.top - dpHeight;
                }

                // Aplica el estilo dinámico basado en la posición del input "from"
                jQuery(inst.dpDiv).css({
                    position: 'fixed',
                    left: inputRect.left + 'px',  // Posición horizontal de acuerdo al input
                    top: newTop + 'px',  // Ajusta el top dinámicamente
                    'z-index':'100 !important',
                    display: 'block'
                });
            }, 0);
        },

        onClose: function () {
            if ('from' == $(this).attr('id')) {
                $('.alojapro-widget-plugin #to').datepicker('show');
            }
        },

        // Al selecconar fecha, se escribe en el campo de texto
        onSelect: function (dateText) {
            // Obtener el id del input actual
            var inputId = $(this).attr('id');
            // Calcular la posición del input
            var inputOffset = $(this).offset();
            var inputHeight = $(this).outerHeight();
            // Establecer la posición del calendario
            $('#ui-datepicker-div').css({
                top: inputOffset.top + inputHeight,
                left: inputOffset.left
            });

            var
                $selectedDate = $(this).datepicker('getDate'),
                day = $selectedDate.getDate(),
                month = $selectedDate.getMonth(),
                year = $selectedDate.getFullYear();

            if ('from' == $(this).attr('id')) {
                var $toDate = new Date(year, month, day + 1);
                $toDate.setDate($toDate.getDate());
                console.log('to: ' + $toDate);
                $('.alojapro-widget-plugin #to').datepicker('option', 'minDate', $toDate);
            }

            if ('to' == $(this).attr('id')) {
                var $fromDate = new Date(year, month, day - 1);
                $fromDate.setDate($fromDate.getDate());
                console.log('from: ' + $fromDate);
                $('.alojapro-widget-plugin #from').datepicker('option', 'maxDate', $fromDate);
            }
        }
    });

    //DATEPICKER CLICKABLE CALENDAR ICON
    $('.fa-calendar').parent().click(function() {
        $(this).prev('.datepicker').focus();
    });
    //click from modern version
    $('.modern-calendar').parent().click(function() {
        $('#from').focus();
    });

    //DATEPICKER POSITIONING
    /* $(window).scroll(function () {
        $('.datepicker').datepicker('hide');
    }); */

    //TOOLTIPS
    $('[data-toggle="tooltip"]').tooltip();

    //CLOSING MODALS AND RETURN SCROLL
    /* clicking X button */
    $('.btn-close').click(function () {
        //$('body::-webkit-scrollbar').css('display', 'auto');
        $('html').css('overflow', 'auto');
    })
    /* clicking outside modal overlay */
    $('.modal').on('click', function (event) {
        if ($(event.target).hasClass('modal')) {
            $('html').css('overflow', 'auto');
        }
    });

    // Open Modal Discounts
    $('.open-modal-alojapro-discounts').click(function () {
        $('#alojaproDiscounts_modal').modal('show');
        //$('::-webkit-scrollbar').css('display', 'none');
        /* $('body::-webkit-scrollbar').css('display', 'none'); */
        $('html').css('overflow', 'hidden');
        $('.alojapro-widget-plugin .modal').css('overflow', 'hidden');
        //$('.alojapro-widget-plugin .modal::-webkit-scrollbar-').css('display', 'none');
    });
    //Open from modern icon
    $('.modern-percent').click(function () {
        $('#alojaproDiscounts_modal').modal('show');
        $('html').css('overflow', 'hidden');
        $('.alojapro-widget-plugin .modal').css('overflow', 'hidden');
    });

    // Apply modal data to form
    $('#alojaproDiscounts_accept').click(function () {
        //save values into form inputs hidden
        let discount_mail = $('#alojapro_modal_email').val();
        let discount_code = $('#alojapro_modal_coupon').val();
        $('#discount_mail').val(discount_mail);
        $('#discount_code').val(discount_code);

        //close modal
        $('#alojaproDiscounts_modal').modal('hide');
        $('html').css('overflow', 'auto');
        $('#frmEngine').submit();
    });

    /** ADVANCED FILTERS **/
    // Open Modal Advanced Filters
    $('#advanced-filters').click(function () {
        $('#alojaproAdvancedFilters_modal').modal('show');
        $('html').css('overflow', 'hidden');
        $('.alojapro-widget-plugin .modal').css('overflow', 'hidden');
        //$('.alojapro-widget-plugin .modal::-webkit-scrollbar-').css('display', 'none');
    });
    //open from icon
    $('.fa-user').parent().click(function() {
        $('#alojaproAdvancedFilters_modal').modal('show');
        $('html').css('overflow', 'hidden');
        $('.alojapro-widget-plugin .modal').css('overflow', 'hidden');
    });
    //open from modern icon
    $('.modern-user').parent().click(function() {
        $('#alojaproAdvancedFilters_modal').modal('show');
        $('html').css('overflow', 'hidden');
        $('.alojapro-widget-plugin .modal').css('overflow', 'hidden');
    });

    $('select[name=rooms]').change(function () {
        var numRooms = $(this).children("option:selected").val();
        //alert(numRooms);
        var otherRooms = numRooms - 1;

        $(".room-box:lt(" + numRooms + ")").removeClass('dnone');
        $(".room-box:gt(" + otherRooms + ")").addClass('dnone');
    });

    $('select[name^=child-]').change(function () {
        var numChild = $(this).children("option:selected").val();
        var otherChild = numChild - 1;

        if (numChild == 0) {
            $('.' + $(this).attr('id')).addClass('dnone');
            console.log('.' + $(this).attr('id'));
        } else {
            $('.' + $(this).attr('id')).removeClass('dnone');
            $('.' + $(this).attr('id') + ' select:lt(' + numChild + ')').removeClass('dnone');
            $('.' + $(this).attr('id') + ' select:gt(' + otherChild + ')').addClass('dnone');
        }
    });

    //var opcionesSeleccionadas  = '';

    $('.btn-search.advanced').click(function () {
        let discount_mail = $('#alojapro_modal_email_advanced').val();
        let discount_code = $('#alojapro_modal_coupon_advanced').val();

        //alert(discount_code);
        let rooms = $('select[name=rooms]').children("option:selected").val();
        var roomsCfg = '';
        var index = 1;
        $(".room-box").each(function () {
            if (!$(this).hasClass('dnone')) {
                roomsCfg += index + '-';
                //opcionesSeleccionadas += '--Habitacion--\n';
                //Valor del numero de adultos
                var adults = $(this).find('select[name=adults]').val();

                roomsCfg += adults + '-';
                //opcionesSeleccionadas += 'Num.Adultos: ' + adults + '\n';

                //Valor del numero de niños
                var child = $(this).find('select[name^=child-]').val();
                //console.log(child);
                //Valor del atributo nombre del select de numero de niños
                var childNum = $(this).find('select[name^=child-]').prop('name');
                //console.log(childNum);
                roomsCfg += child;
                //opcionesSeleccionadas += 'Num. Niños: ' + child + '\n';

                if (child > 0) {
                    if (!$(this).hasClass('dnone')) {
                        var childAgeSelect = $(this).find('.'+childNum);
                        //console.log(childAgeSelect);
                        var childAge = $(childAgeSelect).find('select[name^="age-"]:not(.dnone)').each(function(){
                            var age = $(this).val();
                            //console.log('Age: '+age+'\n');
                            roomsCfg += '-' + age;
                        });
                    }
                }
                roomsCfg += '|';
                index++;
            }
        });
        roomsCfg = roomsCfg.slice(0, -1);
        //alert('Opciones Seleccionadas \n'+opcionesSeleccionadas);
        //alert('Room Cfg '+roomsCfg);
        $('#discount_mail').val(discount_mail);
        $('#discount_code').val(discount_code);
        $('#room-config').text(roomsCfg);
        $('#room-number').text(rooms);
        $('#rooms').val(rooms);
        $('#roomsCfg').val(roomsCfg);

        $('#alojaproAdvancedFilters_modal').hide();
        $('html').css('overflow', 'auto');

        $('#frmEngine').submit();

    });
});
