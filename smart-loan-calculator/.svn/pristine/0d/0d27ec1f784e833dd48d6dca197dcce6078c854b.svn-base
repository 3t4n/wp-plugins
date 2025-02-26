    function wpbox_create_donut(principal,interest,total_payments){

    Highcharts.chart('wpbox-chart-1', {

    chart: {
      type: 'pie',
      backgroundColor: 'transparent',
      style: { fontFamily: 'var(--default-font)' },
      // renderTo: 'container'
    },
    credits: {
     enabled: false,
},
tooltip: {
        formatter: function (s) {
            return this.key + ':<br/>'+this.series.name+''+
                '</b><b>' + INT(this.y) + '</b>';
        }
    },
    title: {
      verticalAlign: 'middle',
      floating: true,
      text: ''
    },
    plotOptions: {
      pie: {
        innerSize: '70%',
        size:'100%',//'70%', //'70%'
        dataLabels: { enabled: false }, //false
        showInLegend: true,
      }
    },

    legend: {
   // layout: 'vertical',
   labelFormatter: function () {
    // console.log(this);
var formatted = '<span style="font-size: 0.9em;">' + this.name + ' <br> <b>'+ INT(this.y) + '</b> </span>';
return formatted;
},


 },

   

     series: [{
      name: '',
            data: [{
                name: 'Principal',
                y: principal,
                color:'var(--principle-clr)',
            }, {
                name: 'Interest',
                y: interest ,
                color:'var(--interest-clr)',
            },{
                name: 'Total Payments',
                y: total_payments,
                color:'var(--payments-clr)',
            }]
        }],
  




});

}

    wpbox_create_donut(100,200,300);