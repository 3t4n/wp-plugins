( function( $ ){
    $(document).ready(function(){
        $("#os_selectChart").change(function(){
            var template = "";
            var chartTypes = ["column","line","spline","area","pie","doughnut"];
            var chart = $(this).val();
            if($.inArray(chart, chartTypes) != "-1"){
                var template = "column_chart.php";
            }
            if(template != ""){
            $.get(
                jscons.plugin_url+"/includes/templates/"+template,
                {'ChartType':chart,'type':'new'},
                function(data){
                    $("#os_load_mainContainer").html(data);
                }
            );
            }
            else{
               $("#os_load_mainContainer").html(""); 
            }
        })
    })
    
    
})(jQuery);


var $ = jQuery;
function column_chart(){
            var dataP = [];
            var yaxis = $("input[name='yaxis']").val();
            var xaxis = $("input[name='xaxis']").val();
            var dataPoints = setDataPoints(xaxis,yaxis);
            if(typeof dataPoints.error != "undefined"){
                setErrMsg(dataPoints.error,'red');
                return false;
            }
            var chartType = $("input[name='ChartType']").val();
//            validateDataP(yaxis);
            var chart = new CanvasJS.Chart("chartContainer",
            {
              title:setTitle($("input[name='title']").val()),
              data: [
              {        
                type: chartType,
                dataPoints: dataPoints
              }
              ]
            });

            chart.render();
}

function setErrMsg(error,color){
    $('#error_msg').html(error).attr('style','color:'+color);
}

function setTitle(title){
    return {text:title};
}



function setDataPoints(XPoints,YPoints){
    var i = 0;
    var Data = [];
    if(YPoints.length != 0){
        var YPointsArr = YPoints.split(",");
        if(XPoints.length == 0){
            for( i=0 ; i<YPointsArr.length ; i++ ){
                var set = {y:parseFloat(YPointsArr[i])};
                Data.push(set);
            }
        }
        else{
            var XPointsArr = XPoints.split(",");
            for( i=0 ; i<XPointsArr.length ; i++ ){
                var set = {y: parseFloat(YPointsArr[i]), label: XPointsArr[i]};
                Data.push(set);
            }
        }
    }
    else{
        var error = {error:"Y-axis Data cannot be empty"};
        return error;
    }
    return Data;
}

function submitChartFrm(){
    $("#create_chart_frm").submit(function(){
        var data = $(this).serializeArray();
        return data;
    })
}

    


