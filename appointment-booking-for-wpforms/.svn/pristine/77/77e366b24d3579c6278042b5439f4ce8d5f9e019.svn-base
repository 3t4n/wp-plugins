(function($) {
    "use strict";
    $( document ).ready( function () { 
        if(typeof booknow_data_availability !== 'undefined'){
           booknow_check_width();
           var availability=  booknow_data_availability;
           var step=  $(".booknow_responsive_col").val();
           $('.booknow-calendar-picker').markyourcalendar({
              availability: availability,
              weekdays: booknow.weeks_short,
              months: booknow.months_short,
              step: parseInt(step),
              onClick: function(ev, data) {
                var date = "";
                var time = "";
                if( data.length < 1 ){
                  var date = "?";
                  var time = "?";
                }else{
                  $.each(data, function( index, value ) {
                    var d = value.split('|');
                    date += d[0];
                    time += d[1];
                  });
                }
                var service = $(".booknow-input-service .active").data("id");
                var staff = $(".booknow-input-staff .active").data("id");
                if(service === undefined){
                 service = 0; 
                }
                if(staff === undefined){
                 staff = 0; 
                }
                if( $(".booknow-input-service").length < 1 ){
                  service = -1; 
                }
                var fileds = {"service":service,"staff":staff,"date":data};
                $('.booknow-datas-submit').val(JSON.stringify(fileds));
                var date_format =booknow_date_format(date);
                $('.booknow-datas-content-date h5').html(date_format);
                $('.booknow-datas-content-time h5').html(time);
                var price = $(".booknow-input-service .active").data('price');
                var price_format = $(".booknow-input-service .active").data('price_format');
                var duration = $(".booknow-input-service .active").data('duration');
                $(".booknow-datas-content-duration h5").html(duration);
                $(".booknow-datas-content-price h5").html(price_format);
                $(".booknow_payment_price").val(price).change();
              },
              onClickNavigator: function(ev, instance,startDate) {
                let month = startDate.getUTCMonth() + 1; //months from 1-12
                let day = startDate.getUTCDate();
                let year = startDate.getUTCFullYear();
                var col = $(".booknow_responsive_col").val();
                var service = $(".booknow-input-service li.active").data("id");
                var data = {
                  'action': 'boooknow_load_calendar',
                  'startDate': year+"-"+month+"-"+day,
                  'col':col,
                  'service_id': service
                };
                $(".booknow-calendar-datas td").html('<div class="boooknow-not-available">Loading...</div>');
                jQuery.post(booknow.ajax_url, data, function(response) {
                  instance.setAvailability(response.data);
                });
              },
              onClickService: function(ev, instance,startDate) {
                let month = startDate.getUTCMonth() + 1; //months from 1-12
                let day = startDate.getUTCDate();
                let year = startDate.getUTCFullYear();
                var col = $(".booknow_responsive_col").val();
                var service = $(this).data("id");
                var data = {
                  'action': 'boooknow_load_calendar',
                  'startDate': year+"-"+month+"-"+day,
                  'service_id': service,
                  'col':col,
                };
                $(".booknow-calendar-datas td").html('<div class="boooknow-not-available">Loading...</div>');
                jQuery.post(booknow.ajax_url, data, function(response) {
                  instance.setAvailability(response.data);
                });
              }
          });
         }
        $('body').on("click",".booknow-input-service li",function(e){
            $(".booknow-input-service li").removeClass("active");
            $(this).addClass('active');
            var value = $(this).data("id");
            var price = $(this).data('price');
            $(".booknow-staff-name").attr("value","");
            $(this).closest(".wpforms-field-booknow_sercices").find(".booknow-service-name").attr("value",value);
            var price_format = $(".booknow-input-service .active").data('price_format');
            var duration = $(this).data('duration');
            if($(".boooknow-available-time").hasClass("selected")) {
              $(".booknow-datas-content-duration h5").html(duration);
              $(".booknow-datas-content-price h5").html(price_format);
            }
            $(".booknow-input-staff li").removeClass("active");
            if( $(".booknow-input-staff-service-id-any").length > 0 ){
                $(".booknow-input-staff .booknow-input-staff-service-id-any").addClass("active");
            }
            $(".booknow-input-staff li").addClass("hidden");
            $(".booknow-input-staff li.booknow-input-staff-service-id-any").removeClass("hidden");
            $(".booknow-input-staff li.booknow-input-staff-service-id-"+value).removeClass("hidden");
            var service = $(".booknow-input-service .active").data("id");
            if(service === undefined){
             service = 0; 
            }
            var fileds = $('.booknow-datas-submit').val();
            if(fileds !=""){
                fileds = jQuery.parseJSON(fileds);
                fileds.service = service;
                $(".booknow-wpforms-payment-price").val(price).change();
                $('.booknow-datas-submit').val(JSON.stringify(fileds));
            }
        })
        $('body').on("click",".booknow-input-staff li",function(e){
            $(".booknow-input-staff li").removeClass("active");
            $(this).addClass('active');
            var staff = $(".booknow-input-staff .active").data("id");
            if(staff === undefined){
             staff = 0; 
            }
            $(this).closest(".wpforms-field-booknow_staffs").find(".booknow-staff-name").attr("value",staff);
            var fileds = $('.booknow-datas-submit').val();
            if(fileds !=""){
                fileds = jQuery.parseJSON(fileds);
                fileds.staff = staff;
                $('.booknow-datas-submit').val(JSON.stringify(fileds));
            }
        })
        $('body').on("click",".boooknow-available-more",function(e){
          e.preventDefault();
            var check_show = $(this).data("show");
            if( check_show == "true"){
              $(this).data("show","false");
              $(this).closest("ul").find(".boooknow-available-time-hidden").addClass("hidden");
              $(this).html("More...");
            }else{
              $(this).data("show","true");
              $(this).closest("ul").find("li").removeClass("hidden");
              $(this).html("Less...");
            }
        })
        $('body').on("click",".booknow-order-list-id a",function(e){
          e.preventDefault();
            var field = $(this).closest("li");
            var id = field.find(".booknow-order-list-id a").html();
            var date_post = field.find(".booknow-order-list-id").data("date");
            var status = field.find(".booknow-order-list-status").html();
            var service = field.find(".booknow-order-list-service").html();
            var price = field.find(".booknow-order-list-id").data("price");
            var duration = field.find(".booknow-order-list-id").data("duration");
            var date = field.find(".booknow-order-list-booking-date").html();
            var time = field.find(".booknow-order-list-booking-time").html();
            var staff = field.find(".booknow-order-list-id").data("staff");
            $(".booknow_modal_title span").html(id);
            $(".booknow_modal_inner_content_booking_date .booknow_modal_inner-ct").html(date_post);
            $(".booknow_modal_inner_content_appointment_date .booknow_modal_inner-ct").html(date);
            $(".booknow_modal_inner_content_appointment_time .booknow_modal_inner-ct").html(time);
            $(".booknow_modal_inner_content_service .booknow_modal_inner-ct").html(service);
            $(".booknow_modal_inner_content_price .booknow_modal_inner-ct").html(price);
            $(".booknow_modal_inner_content_duration .booknow_modal_inner-ct").html(duration);
            $(".booknow_modal_inner_content_staff .booknow_modal_inner-ct").html(staff);
            $(".booknow_modal_inner_content_status .booknow_modal_inner-ct").html(status);
            $("#booknow_modal_order").addClass("active");
        })
        $('body').on("click",".booknow_modal_close button",function(e){
            $("#booknow_modal_order").removeClass("active");
        })
       
      window.addEventListener('resize', function(event) {
          booknow_check_width();
      }, true);
      function booknow_check_width(){
        var width = $(window).width();
        var col = 7;
        if( width < 719 ){
            $(".booknow-date-header-3, .booknow-date-header-4, .booknow-date-header-5, .booknow-date-header-6").addClass("hidden");
            $(".boooknow-day-time-container-3, .boooknow-day-time-container-4, .boooknow-day-time-container-5, .boooknow-day-time-container-6").addClass("hidden");
            col = 3;
        }else if( width < 1000 ){
            $(".booknow-date-header-5, .booknow-date-header-6").addClass("hidden");
            $(".boooknow-day-time-container-5, .boooknow-day-time-container-6").addClass("hidden");
            $(".booknow-date-header-3, .booknow-date-header-4").removeClass("hidden");
            $(".boooknow-day-time-container-3, .boooknow-day-time-container-4").removeClass("hidden");
            col = 5;
        }
        else{
            $(".booknow-calendar-week-container th, .booknow-calendar-week-container td").removeClass("hidden");
        }
        $(".booknow_responsive_col").val(col);
      }
      function booknow_date_format(date){
         var d = new Date(date);
         return date_format_php_to_js(booknow.date_format,d);
      }
      function date_format_php_to_js( sFormat,d) {
        var week = booknow.weeks_full[d.getDay()];
        var month = d.getMonth();
        if(month<10){
          month ="0"+month;
        }
        var day = d.getDate();
        if(day<10){
          day ="0"+day;
        }
        var year = d.getFullYear();
        switch( sFormat ) {
            case 'F j, Y':
                return week+ " " + month +" " + day+ ", " + year;
                break;
            case 'Y/m/d':
                return week+ " " + year +"/" + month+ "/" + day;
                break;
            case 'm/d/Y':
                return week+ " " + month +"/" + day+ "/" + year;
                break;
            case 'd/m/Y':
                return week+ " " + day +"/" + month+ "/" + year;
                break;
        }
    }
    })
})(jQuery);