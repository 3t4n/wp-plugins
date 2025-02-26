(function( $ ) {
    'use strict';
  
    $(document).ready(function() {

    /**
	   *	this file is included for functionalility of admin dashboard page
	   *
	   * @since    1.0.0
	   */	

    var ciwcamp_monthly_data = {
        'action' : 'ciwcamp_monthly_visits_and_conversion_action',
        'ciwcamp_chart_type': 'ciwcamp_monthly_visits_and_conversion',
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_monthly_data, function(response)
        {
            if(response!="")
            {
                var ciwcamp_res = JSON.parse(response);
                var ciwcamp_conversion_array_data = ciwcamp_res[0];
                var ciwcamp_visits_array_data = ciwcamp_res[1];
                if(ciwcamp_visits_array_data != "" && ciwcamp_conversion_array_data !="")
                {
                  if (jQuery("#ciwcamp-visit-conversion").length) {

                      var ctx = document.getElementById("ciwcamp-visit-conversion").getContext('2d');
                      var bar = new Chart(ctx, {
                        type: 'line',
                        data: {
                          labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                          datasets: [{
                            label: "Visits",
                            data: ciwcamp_visits_array_data,
                            backgroundColor:["rgba(255,255,255,0)"],
                            borderColor: ['#00c851'],
                            borderWidth: 2,
                          },
                          {
                            label: "Conversion",
                            data: ciwcamp_conversion_array_data,
                            backgroundColor:["rgba(255,255,255,0)"],
                            borderColor: ['#fb3'],
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
            }
        });

    var ciwcamp_monthly_commission_data = {
        'action' : 'ciwcamp_monthly_sales_and_commission_action',
        'ciwcamp_chart_type': 'ciwcamp_monthly_sales_and_commission',
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_monthly_commission_data, function(response)
        {
            if(response!="")
            {
                var ciwcamp_res = JSON.parse(response);
                var ciwcamp_salePrice_array_data = ciwcamp_res[0];
                var ciwcamp_commission_array_data = ciwcamp_res[1];

                if (jQuery("#ciwcamp-sale-commission").length) {
                    var ctx = document.getElementById("ciwcamp-sale-commission").getContext('2d');
                    var bar = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [{
                        label: "Sale Price",
                        data: ciwcamp_salePrice_array_data,
                        backgroundColor:["rgba(255,255,255,0)"],
                        borderColor: ['#fb3'],
                        borderWidth: 2,
                        },
                        {
                        label: "Affiliate Commission",
                        data: ciwcamp_commission_array_data,
                        backgroundColor:["rgba(255,255,255,0)"],
                        borderColor: ['#ff3547'],
                        borderWidth: 2,
                        } 
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
        

    var ciwcamp_monthly_affiliate_registered_data = {
        'action' : 'ciwcamp_monthly_affiliate_registration_action',
        'ciwcamp_data_type': 'ciwcamp_monthly_affiliate_registration',
      };
      jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_monthly_affiliate_registered_data, function(response)
      {
          if(response!="")
          {
              var ciwcamp_res = JSON.parse(response);
              
              if (jQuery("#ciwcamp-registered-affiliate").length) {
                  var ctx = document.getElementById("ciwcamp-registered-affiliate").getContext('2d');
                  var bar = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                      datasets: [{
                      label: "Registered Affiliate",
                      data: ciwcamp_res,
                      backgroundColor:["#33b5e5"],
                      borderColor: ['#33b5e5'],
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

});
         
})( jQuery );