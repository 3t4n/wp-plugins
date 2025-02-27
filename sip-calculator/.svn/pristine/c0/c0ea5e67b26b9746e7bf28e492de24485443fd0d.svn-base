jQuery(document).ready(function(){
  loadResult();
  var result = {};
  // console.log(sip_calc_style.calc_chart_type);

  function validateInput() {
    if (invstamount.value == "" || invstperiod.value == "" || expreturn.value == "") {
      return false;

    }
    return true;
  }


  function createGraph() { 
    if(sip_calc_style.result_with_chart == 'true'){
      if(sip_calc_style.calc_chart_type == 'doughnut_chart'){
        var ctx = document.getElementById('myChart').getContext('2d');
        stackedBar = new Chart(ctx, {
            type: "doughnut",
            data: {
              labels: [sip_calc_style.calc_chart_invested_amount_text,sip_calc_style.calc_chart_profit_earned_text],
              datasets: [{
              data: [
                      [result.amount_invested], 
                      [result.profit_earned]
                    ],
                backgroundColor: [
                  sip_calc_style.investd_amount_color,
                  sip_calc_style.profit_amount_color
                ],
                borderColor: [
                  sip_calc_style.investd_amount_color,
                  sip_calc_style.profit_amount_color
                ],
                borderWidth: 3
              }]
            },
            options: {
              plugins: {
                legend: {
                  labels: {
                    font: {
                        size: 14
                    }
                  }
                }
              }, 
              cutout: 140,
              responsive: true,
              maintainAspectRatio: false,
            }
          });
      }else if(sip_calc_style.calc_chart_type == 'bar_chart'){

        var ctx = document.getElementById('myChart').getContext('2d');
        stackedBar = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Amount in Rs'],
            datasets: [{
                label: sip_calc_style.calc_chart_invested_amount_text,
                data: [result.amount_invested],
                backgroundColor: sip_calc_style.investd_amount_color,
              },
              {
                label: sip_calc_style.calc_chart_profit_earned_text,
                data: [result.profit_earned],
                backgroundColor: sip_calc_style.profit_amount_color,
              }
            ]
          },
          options: {
            scales: {
              xAxes: [{
                stacked: true
              }],
              yAxes: [{
                stacked: true
              }]
            }
          }
        });
      }else if(sip_calc_style.calc_chart_type == 'pie_chart'){

        var ctx = document.getElementById('myChart').getContext('2d');
        var oilData = {
            labels: [sip_calc_style.calc_chart_invested_amount_text, sip_calc_style.calc_chart_profit_earned_text],
            datasets: [
                {
                    data: [result.amount_invested, result.profit_earned],
                    backgroundColor: [
                        sip_calc_style.investd_amount_color,
                        sip_calc_style.profit_amount_color
                    ],
                    borderColor:  [sip_calc_style.investd_amount_color, sip_calc_style.profit_amount_color],
                    borderWidth: [3,3]
                }]
        };
        stackedBar = new Chart(ctx, {
          type: 'pie',
          data: oilData
        });
      }else if(sip_calc_style.calc_chart_type == 'polar_area_chart'){

        var ctx = document.getElementById('myChart').getContext('2d');

        var birdsData = {
          labels: [sip_calc_style.calc_chart_invested_amount_text, sip_calc_style.calc_chart_profit_earned_text],
          datasets: [{
            data: [result.amount_invested, result.profit_earned],
            // backgroundColor: [
            //   "rgba(255, 0, 0, 0.5)",
            //   "rgba(100, 255, 0, 0.5)",
            // ]
            backgroundColor: [
              sip_calc_style.investd_amount_color,
              sip_calc_style.profit_amount_color
            ]
          }]
        };

        stackedBar = new Chart(ctx, {
          type: 'polarArea',
          data: birdsData
        });
      }

    }
  }



  function createTable() {
    if(sip_calc_style.result_with_table == 'true'){
      var var_year = Number(invstperiod.value);
      var table_dynamic = ``;
      for (var i = 0; i < 11; i++) {

        var proj_result = calculateProjectedData(var_year);
        table_dynamic += `
        <tr>
          <td>${var_year} years </td>
          <td>₹ ${invstamount.value}</td>
          <td>₹ ${proj_result.expected_amount}</td>
         </tr> 
        `
        var_year += 3;

      }
      tab_cap.innerText = `Projected SIP returns for various time durations. [ @${expreturn.value} ]`;
      projectTable.innerHTML = table_dynamic;
    }
  }

  function loadResult() {
    result = calculateSIP();
    // window.scrollBy(0, 350);

    rf1.innerText = 'Rs. ' + result.expected_amount.toLocaleString('en-IN');
    rf2.innerText = 'Rs. ' + result.amount_invested.toLocaleString('en-IN');
    rf3.innerText = 'Rs. ' + result.profit_earned.toLocaleString('en-IN');
    createGraph();
    createTable();
    // console.log(result);
  }


  var rangeslider1 = jQuery('#sip-amount-investment');
  var rangeslider2 = jQuery('#sip-amount-year-range');
  var rangeslider3 = jQuery('#sip-amount-return-range');
  var amount1 = jQuery('#invstamount');
  var amount2 = jQuery('#invstperiod');
  var amount3 = jQuery('#expreturn');
  var amount4 = jQuery('#invst_type');
  var amount5 = jQuery('#inflation');
  var amount = document.getElementById('invstamount');
  var period = document.getElementById('invstperiod');
  var year = document.getElementById('expreturn');


  // var amount = document.getElementById('js-amount-input');

  // amount.addEventListener("change", function() {
  //     let amount_v = parseInt(this.value);
  //     if (amount_v < 100) this.value = 100;
  //     if (amount_v > 100000) this.value = 100000;
  //     if (amount_v) {
  //         $rangeslider.val(this.value).change();
  //     }
  //     if (validateInput()) {
  //         bar_chart.destroy();
  //         loadResult();
  //     }
  // });

  rangeslider1.rangeslider({
    polyfill: false
  }).on('input', function() {
    amount1[0].value = this.value;
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });

  amount1.on('input', function() {
    var amount_inv = parseInt(this.value);
    var sip_min_invested_amount = sip_calc_style.sip_min_invested_amount;
    var sip_max_invested_amount = sip_calc_style.sip_max_invested_amount;
    // console.log(sip_max_invested_amount);
    if (amount_inv < sip_min_invested_amount) this.value = sip_min_invested_amount;
    if (amount_inv > sip_max_invested_amount) this.value = sip_max_invested_amount;
    if (amount_inv) {
      rangeslider1.val(this.value).change();
    }
    // rangeslider1.val(this.value).change();
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });


  rangeslider2.rangeslider({
    polyfill: false
  }).on('input', function() {
    amount2[0].value = this.value;
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });

  amount2.on('input', function() {
    var amount_period = parseInt(this.value);
    var sip_min_investment_period = sip_calc_style.sip_min_investment_period;
    var sip_max_investment_period = sip_calc_style.sip_max_investment_period;
    if (amount_period < sip_min_investment_period) this.value = sip_min_investment_period;
    if (amount_period > sip_max_investment_period) this.value = sip_max_investment_period;
    if (amount_period) {
      rangeslider2.val(this.value).change();
    }
    // rangeslider2.val(this.value).change();
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });

  rangeslider3.rangeslider({
    polyfill: false
  }).on('input', function() {
    amount3[0].value = this.value;
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });

  amount3.on('input', function() {
    var amount_return = parseInt(this.value);
    var sip_min_expected_annual = sip_calc_style.sip_min_expected_annual;
    var sip_max_expected_annual = sip_calc_style.sip_max_expected_annual;
    if (amount_return < sip_min_expected_annual) this.value = sip_min_expected_annual;
    if (amount_return > sip_max_expected_annual) this.value = sip_max_expected_annual;
    if (amount_return) {
      rangeslider3.val(this.value).change();
    }
    // rangeslider3.val(this.value).change();
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });

  jQuery(amount4).on('change', function(){
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });

  jQuery(amount5).on('change', function() {
    // rangeslider4.val(this.value).change();
    if(sip_calc_style.result_with_chart == 'true'){
      stackedBar.destroy();
    }
    loadResult();
  });

});