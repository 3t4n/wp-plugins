( function( $ ){
    $(document).ready(function(){
        var ids = [];
        $(".osnic_chartdiv").each( function(){
            var chartId = this.id;
            chartId = chartId.replace("osnic_chartContainer","");
            chartId = parseInt(chartId);
            ids.push(chartId);
        })
        
        $.post(ajaxObj.url, {
			action: 'displayOsChart',
			chartId: ids
		}, function(res) {
                    var res = JSON.parse(res);
                    $.each(res, function(i,chart){
                        var chart = new CanvasJS.Chart("osnic_chartContainer"+chart.id,
                        {
                          title:setTitle(chart.title),
                          data: [
                          {        
                            type: chart.type,
                            dataPoints: setDataPoints(chart.xaxis,chart.yaxis)
                          }
                          ]
                        });
                        chart.render();
                    })
		});
    })
})(jQuery);
            
