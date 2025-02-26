(function($) {
    "use strict";
    $( document ).ready( function () { 
        $('.booknow_color_picker').wpColorPicker();
        $('.booknow_select2').select2();
        $(".booknow_select2_load_customer").select2({
              ajax: {
                url: ajaxurl,
                delay: 250,
                dataType: 'json',
                data: function (params) {
                  var query = {
                        'action': 'booknow_load_customer',
                        'search': params.term
                    };
                  return query;
                },
                processResults: function (response) {
                    return {
                        results:response
                    };
                },
                cache: true
              }
            });
        $('body').on("click",".booknow-button-addbreak",function(e){
            e.preventDefault();
            var content = $(this).closest('.booknow_settings_container_working_hours').find('.booknow_settings_container_working_hours-content').html();
            $(this).closest("td").append('<div class="booknow_settings_container_working_hours_add">'+content+'<a href="#">Remove</a></div>');
        })
        $('body').on("click",".booknow_settings_container_working_hours_add a",function(e){
            e.preventDefault();
            $(this).closest(".booknow_settings_container_working_hours_add").remove();
        })
        $('body').on("click",".booknow-button-add-holiday",function(e){
            e.preventDefault();
            var content = '<div class="booknow_settings_container_add_holidays_inner"><input name="booknow_settings[holidays][]" class="regular-text" type="date" /><a href="#">Remove</a></div>';
            $(".booknow_settings_container_add_holidays").append(content);
        })
        $('body').on("click",".booknow_settings_container_add_holidays_inner a",function(e){
            e.preventDefault();
            $(this).closest(".booknow_settings_container_add_holidays_inner").remove();
        })
        $('body').on("change",".ajax_booknow_appointment_service",function(e){
           var value = $(this).val();
           var data = {
                'action': 'booknow_load_staffs',
                'service': value
            };
            $(".ajax_booknow_appointment_staff").html('<option value="">Loading...</option>');
           jQuery.post(ajaxurl, data, function(response) {
                var html = "";
                $.each(response, function(i, arr) {
                    html += '<option value="'+arr.key+'">'+arr.label+'</option>';
                });
                $(".ajax_booknow_appointment_staff").html(html);
            });
        })
        $('body').on("change",".ajax_booknow_appointment_date",function(e){
           var value = $(this).val();
           var data = {
                'action': 'booknow_load_time',
                'date': value
            };
            $(".ajax_booknow_appointment_time").html('<option value="">Loading...</option>');
           jQuery.post(ajaxurl, data, function(response) {
                var html = "";
                $.each(response, function(i, arr) {
                    html += '<option value="'+arr.key+'">'+arr.value+'</option>';
                });
                $(".ajax_booknow_appointment_time").html(html);
            });
        })
        $('body').on("change",".change-title",function(e){
           var title_file = $("#titlewrap input");
           var fields = $(this).closest(".form-table").find(".change-title");
           var datas = [];
           fields.each(function( index ) {
              datas[$(this).data('sort')] = $(this).val();
            });
           title_file.val(datas.join(" "));
           $("#title-prompt-text").remove();
        })
        $('body').on("change",".booknow_notifications_sendto",function(e){
           var value = $(this).val();
           if( value == "custom"){
                $(".booknow_notifications_settings_sendtoemail").removeClass("hidden");
           }else{
                $(".booknow_notifications_settings_sendtoemail").addClass("hidden");
           }
        })
        $('body').on("click",".booknow-tabs li",function(e){
           var tab = $(this).data("tab");
           $(".booknow-tabs li").removeClass("active");
           $(this).addClass("active");
           $(".booknow-tab-main").addClass('hidden');
           $(tab).removeClass('hidden');
        })
        $('body').on("click",".booknow_settings_nav_button",function(e){
            e.preventDefault();
           var tab = $(this).data("tab");
           $('.booknow-tabs li[data-tab="'+tab+'"]').click();
        })
        //chart
        let check_booknow_dashboard = $("#booknow-dashboard-input-start").val();
        if( check_booknow_dashboard !== undefined ){
            var data = {
                'action': 'booknow_load_chart',
                'start': $("#booknow-dashboard-input-start").val(),
                'end': $("#booknow-dashboard-input-end").val(),
            };
           jQuery.post(ajaxurl, data, function(response) {
               $(".booknow_loading").remove();
                booknow_chart_load(response);
            });
        }
        $('body').on("click",".booknow-dashboard-button-fiter",function(e){
            e.preventDefault();
           $(this).html("Loading...");
           var data = {
                'action': 'booknow_load_chart',
                'start': $("#booknow-dashboard-input-start").val(),
                'end': $("#booknow-dashboard-input-end").val(),
            };
           jQuery.post(ajaxurl, data, function(response) {
                booknow_chart_load(response);
                $(".booknow-dashboard-button-fiter").html("Go");
            });
        })
        function booknow_chart_load(datas){
            $("#booknow-dashboard-analysis-item-appointments").remove();
            $(".booknow-dashboard-analysis-item-appointments").append('<canvas id="booknow-dashboard-analysis-item-appointments" class="animated fadeIn"></canvas>');
            var appointment_approved_total = 0;
            var appointment_pending_total = 0;
            var revenue_total = 0;
            var customers_total = 0;
             $.each(datas, function(i,arr) {
               appointment_approved_total += arr.approved;
               appointment_pending_total += arr.pending;
               revenue_total += arr.revenue;
               customers_total += arr.customers;
            });
            $(".booknow-dashboard-summary-data-item-total h3").html(appointment_approved_total + appointment_pending_total);
            $(".booknow-dashboard-summary-data-item-approved h3").html(appointment_approved_total);
            $(".booknow-dashboard-summary-data-item-pending h3").html(appointment_pending_total);
            $(".booknow-dashboard-summary-data-item-revenue h3").html("$" +revenue_total);
            $(".booknow-dashboard-summary-data-item-customers h3").html(customers_total);
            const appointments = new Chart("booknow-dashboard-analysis-item-appointments", {
                  type: 'bar',
                  data: {
                    labels: datas.map(row => row.title),
                    datasets: [
                      {
                        label: 'Approved Appointments',
                        data: datas.map(row => row.approved)
                      },
                      {
                        label: 'Pending Appointments',
                        data: datas.map(row => row.pending)
                      },
                    ]
                  }
                });
            $("#booknow-dashboard-analysis-item-revenue").remove();
            $(".booknow-dashboard-analysis-item-revenue").append('<canvas id="booknow-dashboard-analysis-item-revenue" class="animated fadeIn"></canvas>');
            const revenue = new Chart("booknow-dashboard-analysis-item-revenue", {
                  type: 'line',
                  data: {
                    labels: datas.map(row => row.title),
                    datasets: [
                      {
                        label: 'Revenue',
                        data: datas.map(row => row.revenue)
                      }
                    ]
                  }
                });
            $("#booknow-dashboard-analysis-item-customers").remove();
            $(".booknow-dashboard-analysis-item-customers").append('<canvas id="booknow-dashboard-analysis-item-customers" class="animated fadeIn"></canvas>');
            const customers = new Chart("booknow-dashboard-analysis-item-customers", {
                  type: 'bar',
                  data: {
                    labels: datas.map(row => row.title),
                    datasets: [
                      {
                        label: 'Customers',
                        data: datas.map(row => row.customers)
                      }
                    ]
                  }
                });
            }
    })
})(jQuery);