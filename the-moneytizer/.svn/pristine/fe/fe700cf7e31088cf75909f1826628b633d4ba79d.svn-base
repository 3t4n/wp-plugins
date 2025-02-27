window.onload = function() {
    var defaultBehavior = Chart.defaults.global.legend.onClick;
    Chart.defaults.global.legend.onClick = function(e, legendItem) {
        defaultBehavior.call(this, e, legendItem);
        changeChartDisplay(legendItem);
    };

    var data = {
        action: 'load_statistics',
        _nonce: nonceSettings['load_statistics']
    };
    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
        res = JSON.parse(response.substr(0, response.length-1));
        if(res.status == "no data"){
            jQuery_money('#global_statistics').css('display','none');
            jQuery_money('#global_statistics_label').html('<i class="bi bi-info-circle"></i>&nbsp;'+res.msg);
            jQuery_money('#global_statistics_label').css('display','block');
            return;
        }
        var result = JSON.parse(response.substr(0, response.length-1));
        window.chart_result = result;
        window.globalChart.data.labels = result['Date'];
        window.globalChart.update();
        for(const [key, values] of Object.entries(result)) {
            if(key==''||key=='Date'){
                continue;
            }
            if(key.includes('CPM')){
                var dataset = {};
                dataset.label = key;
                dataset.data = values.values;
                dataset.borderColor = [];
                dataset.backgroundColor = [];
                for(var l=0;l<dataset.data.length;l++){
                    dataset.borderColor = values.borderColor;
                    dataset.backgroundColor = values.backgroundColor;
                }
                dataset.order = 2
                dataset.yAxisID = 'y-axis-1'
                dataset.type = 'bar';
                dataset.borderWidth = 1;
                window.globalChart.data.datasets.push(dataset);
            } else {
                a_values = values.values.map(Number)
                var dataset = {};
                dataset.label = key;
                dataset.data = a_values;
                for(var l=0;l<dataset.data.length;l++){
                    dataset.borderColor = values.borderColor;
                    dataset.backgroundColor = values.backgroundColor;
                }
                
                dataset.order = 1
                dataset.yAxisID = 'y-axis-2'
                dataset.type = 'bar';
                dataset.borderWidth = 1;
                window.globalChart.data.datasets.push(dataset);
            }
        }
        window.globalChart.update();
        window.globalChart.data.datasets.forEach(element => {
            element._meta[0].hidden = true;
            if(element.label.includes('Total')){
                element._meta[0].hidden = false;
            }
            
        });
        window.globalChart.update();
    });
    var ctx = document.getElementById('global_statistics');
    window.globalChart = new Chart(ctx, {
        type: 'line',
        data: {},
        options: {
            legend: {
                labels: {
                    filter: function(item, chart) {
                        return !item.text.includes('CPM');
                    },
                    fontColor: '#222'
                }
            },
            responsive: true,
            hoverMode: 'index',
            stacked: false,
            scales: {
                yAxes: [{
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                }, {
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'right',
                    id: 'y-axis-2',

                    // grid line settings
                    gridLines: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                }],
            }
        }
    });
}

function changeChartDisplay(e){
    window.globalChart.data.datasets.forEach(el => {
        if(el.label==e.text+' CPM'){
            if(e.hidden){
                el._meta[0].hidden = false;
            } else {
                el._meta[0].hidden = true;
            }
        }
    });
    window.globalChart.update();
}