//Request Google Analytics
jQuery(document).ready(function ($) {
    //Tabs
    $("#rankology-tabs2 .hidden").removeClass('hidden');
    $("#rankology-tabs2").tabs();

    //Ajax
    $('.spinner').css("visibility", "visible");
    $('.spinner').css("float", "none");
    $.ajax({
        method: 'GET',
        url: rankologyAjaxRequestGoogleAnalytics.rankology_request_google_analytics,
        data: {
            action: 'rankology_request_google_analytics',
            _ajax_nonce: rankologyAjaxRequestGoogleAnalytics.rankology_nonce,
        },
        success: function (data) {
            if (data.success) {
                $('#rankology-ga-sessions').html(data.data.sessions);
                $('#rankology-ga-users').html(data.data.users);
                $('#rankology-ga-pageviews').html(data.data.pageviews);
                $('#rankology-ga-pageviewsPerSession').html(data.data.pageviewsPerSession);
                $('#rankology-ga-avgSessionDuration').html(data.data.avgSessionDuration);
                $('#rankology-ga-bounceRate').html(data.data.bounceRate + '%');
                $('#rankology-ga-percentNewSessions').html(data.data.percentNewSessions + '%');

                $('#rkseo-tabs-2').load(' #rkseo-tabs-2');
                $('#rkseo-tabs-3').load(' #rkseo-tabs-3');
                $('#rkseo-tabs-4').load(' #rkseo-tabs-4');
                $('#rkseo-tabs-5').load(' #rkseo-tabs-5');


                //Graph
                if (typeof ctxrankology !== 'undefined') {
                    var data = {
                        labels: data.data.sessions_graph_labels,
                        datasets: [
                            {
                                label: data.data.sessions_graph_title,
                                fill: true,
                                lineTension: 0.1,
                                backgroundColor: "#9ED8FF",
                                borderColor: "#2C97DF",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "#2C97DF",
                                pointBackgroundColor: "#9ED8FF",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "#9ED8FF",
                                pointHoverBorderColor: "#2C97DF",
                                pointHoverBorderWidth: 2,
                                pointRadius: 2,
                                pointHitRadius: 10,
                                data: data.data.sessions_graph_data,
                                spanGaps: false,
                            }
                        ]
                    };
                    var myLineChart = new Chart(ctxrankology, {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                xAxes: [{
                                    display: false
                                }]
                            }
                        }
                    });
                }
            }
        },
        complete: function () {
            $('.spinner').css("visibility", "hidden");
        }
    });
});
