(function( $ ) {
    'use strict';
    
    $(document).ready(function() {
        
        /**
         * this line used for active button and show division on page reload 
         *
         * @since    1.0.0
         */	
    

        var ciwcamp_currentURL = $(location).attr('href'); 

        var ciwcamp_res = ciwcamp_currentURL.split("#");

        if(ciwcamp_res['1']=="ciwcamp-dashboard")
        {
            ciwcamp_affiliate_dashboard_count_data_ajax();
            ciwcamp_affiliate_visits_conversion();
            ciwcamp_affiliate_earning();
        }
        else if(ciwcamp_res['1']=="ciwcamp-sales")
        {
            $("#ciwcamp_sale_table").dataTable().fnDestroy();
            affiliate_sales_list("all");
        }
        else if(ciwcamp_res['1']=="ciwcamp-earnings")
        {
            $("#ciwcamp_earnings_table").dataTable().fnDestroy();
            affiliate_earnings_list("all");
        }
        else if(ciwcamp_res['1']=="ciwcamp-withdraw")
        {
            $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
            ciwcamp_affiliate_withdraw_request("all");
        }
        else
        {
            ciwcamp_affiliate_dashboard_count_data_ajax();
            ciwcamp_affiliate_visits_conversion();
            ciwcamp_affiliate_earning();
        }

        $("#ciwcamp-dashboard-btn").click(function()
        {
            ciwcamp_affiliate_dashboard_count_data_ajax();
            ciwcamp_affiliate_visits_conversion();
            ciwcamp_affiliate_earning();
        });

        $("#ciwcamp-sales-btn").click(function()
        {
            $("#ciwcamp_sale_table").dataTable().fnDestroy();
            affiliate_sales_list("all");
        });

        $("#ciwcamp-earnings-btn").click(function()
        {
            $("#ciwcamp_earnings_table").dataTable().fnDestroy();
            affiliate_earnings_list("all");
        });

        $("#ciwcamp-withdraw-btn").click(function()
        {
            $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
            ciwcamp_affiliate_withdraw_request("all");
        });


        /**
         *  this function is used for show all earnings
         *
         * @since    1.0.0
         */	

        $("#ciwcamp-all-earnings-btn").click(function()
        {
            $("#ciwcamp-all-earnings-btn").addClass("active");
            $("#ciwcamp_earnings_table").dataTable().fnDestroy();
            affiliate_earnings_list("all");
        });
 
         
        /**
         *  this function is used for show all withdraw requests.
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-all-withdraw-btn").click(function()
       {
           $("#ciwcamp-all-withdraw-btn").addClass("active");
           $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
           ciwcamp_affiliate_withdraw_request("all");
       });


       /**
         *  this function is used for show all approve withdraw requests.
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-approved-withdraw-btn").click(function()
       {
           $("#ciwcamp-approved-withdraw-btn").addClass("active");
           $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
           ciwcamp_affiliate_withdraw_request("Approved");
       });


       /**
         *  this function is used for show all reject withdraw data.
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-reject-withdraw-btn").click(function()
       {
           $("#ciwcamp-reject-withdraw-btn").addClass("active");
           $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
           ciwcamp_affiliate_withdraw_request("Rejected");
       });


       /**
         *  this function is used for show all pending withdraw data.
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-pending-withdraw-btn").click(function()
       {
           $("#ciwcamp-pending-withdraw-btn").addClass("active");
           $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
           ciwcamp_affiliate_withdraw_request("	Pending");
       });


        /**
         *  this function is used for show all sales.
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-all-sales-btn").click(function()
       {
           $("#ciwcamp-all-sales-btn").addClass("active");
           $("#ciwcamp_sale_table").dataTable().fnDestroy();
            affiliate_sales_list("all");
       });

        /**
         *  this function is used for show all approved sales.
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-approved-sales-btn").click(function()
       {
           $("#ciwcamp-all-sales-btn").addClass("active");
           $("#ciwcamp_sale_table").dataTable().fnDestroy();
            affiliate_sales_list("Approved");
       });

        /**
         *  this function is used for show all rejected sales
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-reject-sales-btn").click(function()
       {
           $("#ciwcamp-reject-withdraw-btn").addClass("active");
           $("#ciwcamp_sale_table").dataTable().fnDestroy();
            affiliate_sales_list("Rejected");
       });

        /**
         *  this function is used for show all pending sales
         *
         * @since    1.0.0
         */	

       $("#ciwcamp-pending-sales-btn").click(function()
       {
           $("#ciwcamp-pending-withdraw-btn").addClass("active");
           $("#ciwcamp_sale_table").dataTable().fnDestroy();
            affiliate_sales_list("Pending");
       });
        
        /**
         *  this function is used get get count data for affiliates dashboard
         *
         * @since    1.0.0
         */	

        function ciwcamp_affiliate_dashboard_count_data_ajax()
        {
            var ciwcamp_affiliate_data = {
                'action': 'ciwcamp_affiliate_dashboard_count_action',
                'ciwcamp_affiliate_dash' : 'yes'
            };
            jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_affiliate_data, function(ciwcamp_response)
            {

                if(ciwcamp_response!="")
                {
                    var ciwcamp_res = JSON.parse(ciwcamp_response);
                    $("#ciwcamp-total-visits").text(ciwcamp_res[0]);
                    $("#ciwcamp-total-sales").text(ciwcamp_res[1]);
                    $("#ciwcamp-total-earnings").text(ciwcamp_res[2]);
                    $("#ciwcamp-balance").text(ciwcamp_res[3]);
                }
            });
                
        }


        /**
         * this function is used for get affiliate visit and sales graph
         *
         * @since    1.0.0
         */	
        function ciwcamp_affiliate_visits_conversion()
        {
            var ciwcamp_sale_monthly_data = {
                'action' : 'ciwcamp_affiliate_sales_and_visits_action',
                'ciwcamp_sales_data_type': 'ciwcamp_my_monthly_chart_data',
            
            };
            jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_sale_monthly_data, function(ciwcamp_response)
            {
                if(ciwcamp_response!="")
                {
                    var ciwcamp_res = JSON.parse(ciwcamp_response);
                    var ciwcamp_visits_array_data = ciwcamp_res[0];
                    var ciwcamp_sale_array_data = ciwcamp_res[1];
    
                    if (jQuery("#ciwcamp-visit-conversion").length) {
                        var ctx = document.getElementById("ciwcamp-visit-conversion").getContext('2d');
                        var bar = new Chart(ctx, {
                          type: 'line',
                          data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            datasets: [{
                              label: "Visits",
                              data: ciwcamp_sale_array_data,
                              backgroundColor:["rgba(255,255,255,0)"],
                              borderColor: ['#0275d8'],
                              borderWidth: 2,
                            },
                            {
                              label: "Sales",
                              data: ciwcamp_visits_array_data,
                              backgroundColor:["rgba(255,255,255,0)"],
                              borderColor: ['#5bc0de'],
                              borderWidth: 2,
                            } 
                            ]
                          },
                          options: {
                            responsive: true,
                            scales: {
                              yAxes: [{
                                barPercentage: 1,
                                ticks: {
                                  beginAtZero:true,
                                }
                              }]
                            }
                          }
                  
                        });
                    }
                    
                }
            });
        }


        /**
         * this function is used for get affiliate earnings graph
         *
         * @since    1.0.0
         */	

       function ciwcamp_affiliate_earning()
       {
            var ciwcamp_monthly_earning_data = {
                'action' : 'ciwcamp_my_earnings_action',
                'ciwcamp_type': 'ciwcamp_my_monthly_earning_data',
    
            };
            jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_monthly_earning_data, function(ciwcamp_response)
            {
                if(ciwcamp_response!="")
                {
                    var ciwcamp_res = JSON.parse(ciwcamp_response);
                    
                    if (jQuery("#ciwcamp-my-earnings").length) {
                        var ctx = document.getElementById("ciwcamp-my-earnings").getContext('2d');
                        var bar = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            datasets: [{
                            label: "Monthly Earning",
                            data: ciwcamp_res,
                            backgroundColor:["rgba(0,0,255,0.5)"],
                            borderColor: ['#058fd2'],
                            borderWidth: 2,
                            },
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                                barPercentage: .1,
                                ticks: {
                                beginAtZero:true,
                                }
                            }]
                            }
                        }
                
                        });
                    }
                    
                }
            });
       }


    $("#ciwcamp-copy-home-link").click(function()
    {
        var ciwcamp_home_url = $("#ciwcamp-home-url").val();
        $("#ciwcamp-home-url").select();
        document.execCommand('copy');
        toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_link_copied);
    });
   
    /**
     * this function is used for sale datatable 
     *
     * @since    1.0.0
     */

    function affiliate_sales_list(ciwcamp_status)
    {
        
        var  ciwcamp_sale_table = $(document).find('#ciwcamp_sale_table').DataTable( {
            "processing" : true,
            "serverSide" : true,
            "bsortable"  : true,
            "info"       : false,
            select       : true,
            "ajax"       : {
                data: {
                    action: 'ciwcamp_sale_list_action',
                    'ciwcamp_status' : ciwcamp_status
                    },
                type      : 'POST',
                dataType  : 'json',
                url       : ciwcamp_ajax_object.ciwcamp_ajax_url,
                
            },
            language: {
                search: "_INPUT_",
                searchPlaceholder: ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_text_search,
                'processing':  "<div class='ciwcamp-loader'><img src='"+ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_loader_src+"'/></div>"
            },
            columnDefs : [
                {
                    "targets": [0],
                    "orderable": false,
                    "searchable": true,
                }
            ],
            order : [[1, 'asc']],
        });
    }


    /**
     * this function is used for earning datatable
     *
     * @since    1.0.0
     */

   function affiliate_earnings_list(ciwcamp_type)
   {
       var  ciwcamp_sale_table = $(document).find('#ciwcamp_earnings_table').DataTable( {
           "processing" : true,
           "serverSide" : true,
           "bsortable"  : true,
           "info"       : false,
           select       : true,
           "ajax"       : {
               data: {
                   action: 'ciwcamp_earnings_list_action',
                   'ciwcamp_type' : ciwcamp_type
                   },
               type      : 'POST',
               dataType  : 'json',
               url       : ciwcamp_ajax_object.ciwcamp_ajax_url,
               
           },
           language: {
            search: "_INPUT_",
            searchPlaceholder: ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_text_search,
            'processing':  "<div class='ciwcamp-loader'><img src='"+ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_loader_src+"'/></div>"
            },
           columnDefs : [
               {
                   "targets": [0],
                   "orderable": false,
                   "searchable": true,
               }
           ],
           order : [[1, 'asc']],
       });
   }
        

    /**
     * this function used to send withdraw request ajax
     *
     * @since    1.0.0
     */

    function ciwcamp_affiliate_withdraw_request(ciwcamp_status)
    {
        var  ciwcamp_withdraw_table = $(document).find('#ciwcamp_withdraw_table').DataTable( {
            "processing" : true,
            "serverSide" : true,
            "bsortable"  : true,
            "info"       : false,
            select       : true,
            "ajax"       : {
                data: {
                    action: 'ciwcamp_affiliate_withdraw_request_list_action',
                    'ciwcamp_status' : ciwcamp_status
                    },
                type      : 'POST',
                dataType  : 'json',
                url       : ciwcamp_ajax_object.ciwcamp_ajax_url,
                
            }
            ,
            language: {
                search: "_INPUT_",
                searchPlaceholder: ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_text_search,
                'processing':  "<img src='"+ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_loader_src+"' />"
            },
            columnDefs : [
                {
                    "targets": [0],
                    "orderable": false,
                    "searchable": false,
                }
            ],
            order : [[2, 'asc']],
        });
    }
        $("#ciwcamp-request-withdraw-btn").click(function(){ 

            var ciwcamp_withdraw_amount = $("#ciwcamp-withdraw-amount").val();

            var ciwcamp_withdraw_method = $("#ciwcamp-withdraw-method").val();

            if(ciwcamp_withdraw_amount == "")
            {
                toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_amt_required);
            }
            else if(ciwcamp_withdraw_method == "")
            {
                toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_method_required);
            }
            else
            {
                var ciwcamp_withdraw_req_data = {
                    'action': 'ciwcamp_withdraw_amt_req_action',
                    'ciwcamp_withdraw_amt' : ciwcamp_withdraw_amount,
                    'ciwcamp_withdraw_method' : ciwcamp_withdraw_method
                };
                jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_withdraw_req_data, function(ciwcamp_response)
                {

                    if(ciwcamp_response==1)
                    {
                        toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_request_submitted);
                        $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
                        ciwcamp_affiliate_withdraw_request("all");
                        $("#ciwcamp-withdraw-form").trigger("reset"); 
                        $("#ciwcamp-request-for-withdraw").removeClass("show");
                        $("#ciwcamp-request-for-withdraw").css("display", "none");
                        $(".modal-backdrop").removeClass("modal-backdrop");
                    }
                    else if(ciwcamp_response==2)
                    {
                        toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_request_pending);
                    }
                    else if(ciwcamp_response==3)
                    {
                        toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_not_sufficient);
                    } 
                    else
                    {
                        toastr.warning(JSON.parse(ciwcamp_response));
                    }

                });
            }
        });
         

});
       
})( jQuery );