(function ($) {
    'use strict';

    $(function () {
        if ($('#ad-ink-admin #report').length > 0) {

            $("#ad-ink-admin [dimensions] [dimension]").click(function () {
                var dimension = $(this).attr("dimension");
                if ($(this).attr("active") !== undefined) {
                    $(this).removeClass("text-white bg-green-500 border-green-500");
                    $(this).removeAttr("active");
                    if (dimension === "date") {
                        $("#ad-ink-admin [dimensions] [dimension='hour']").removeClass("text-white bg-green-500 border-green-500");
                        $("#ad-ink-admin [dimensions] [dimension='hour']").removeAttr("active");
                    }
                } else {
                    $(this).addClass("text-white bg-green-500 border-green-500");
                    $(this).attr("active", true);
                    if (dimension === "hour") {
                        $("#ad-ink-admin [dimensions] [dimension='date']").addClass("text-white bg-green-500 border-green-500");
                        $("#ad-ink-admin [dimensions] [dimension='date']").attr("active", true);
                    }
                }

                getReport();
            });

            function getDimensions() {
                var dimensions = [];
                $("#ad-ink-admin [dimensions] [dimension][active]").each(function () {
                    dimensions.push($(this).attr("dimension"));
                });
                return dimensions;
            }

            function calculVtr(s, fq, m, tq, c) {
                let vtr = 0;
                if (s > 0) {
                    let c_r = c;
                    let tq_r = Math.max(0, tq - c);
                    let m_r = Math.max(0, m - tq);
                    let fq_r = Math.max(0, fq - m);
                    vtr = (c_r + tq_r * 0.75 + m_r * 0.5 + fq_r * 0.25) / s;
                }
                return vtr;
            }

            function setDatable(data) {
                var dimensions = getDimensions();
                datatable.column(0).visible(dimensions.indexOf("month") > -1);
                datatable.column(1).visible(dimensions.indexOf("date") > -1);
                datatable.column(2).visible(dimensions.indexOf("hour") > -1);
                datatable.column(3).visible(dimensions.indexOf("device") > -1);
                datatable.clear();
                datatable.rows.add(data);
                datatable.draw();
            }

            function setOverview(data) {
                var output = {
                    opportunities: 0,
                    impressions: 0,
                    fillrate: 0,
                    vtr: 0,
                    cpm: 0,
                    earnings: 0,
                    starts: 0,
                    first_quartiles: 0,
                    midpoints: 0,
                    third_quartiles: 0,
                    completes: 0,
                };
                for (let i = 0; i < data.length; i++) {
                    output.opportunities += data[i].opportunities;
                    output.impressions += data[i].impressions;
                    output.earnings += data[i].earnings;
                    output.starts += data[i].starts;
                    output.first_quartiles += data[i].first_quartiles;
                    output.midpoints += data[i].midpoints;
                    output.third_quartiles += data[i].third_quartiles;
                    output.completes += data[i].completes;
                }

                output.fillrate =
                    output.opportunities > 0 ?
                    output.impressions / output.opportunities :
                    0;
                output.cpm = Math.min(
                    output.impressions > 0 ?
                    (output.earnings / output.impressions) * 1000 :
                    0,
                    999
                );

                output.opportunities = filter_bignumber(output.opportunities)
                output.impressions = filter_bignumber(output.impressions)
                output.earnings = filter_currency(output.earnings)
                output.fillrate = filter_percentage(output.fillrate)
                output.cpm = filter_currency(output.cpm)
                output.vtr = filter_percentage(calculVtr(output.starts, output.first_quartiles, output.midpoints, output.third_quartiles, output.completes));

                $("#ad-ink-admin [overview] [opportunities]").text(output.opportunities);
                $("#ad-ink-admin [overview] [impressions]").text(output.impressions);
                $("#ad-ink-admin [overview] [earnings]").text(output.earnings);
                $("#ad-ink-admin [overview] [fillrate]").text(output.fillrate);
                $("#ad-ink-admin [overview] [cpm]").text(output.cpm);
                $("#ad-ink-admin [overview] [vtr]").text(output.vtr);
            }

            function getReport() {
                // get all values
                var url = $("#ad-ink-admin #api-url").val();
                var token = $("#ad-ink-admin #api-token").val();
                var startDate = $('#ad-ink-admin [daterangepicker]').data('daterangepicker').startDate.format("YYYY-MM-DD");
                var endDate = $('#ad-ink-admin [daterangepicker]').data('daterangepicker').endDate.format("YYYY-MM-DD");
                var dimensions = getDimensions();
                var filter = "websites," + $("#tag-id").val();

                // call report ajax
                $.ajax({
                        url: url + '/report',
                        method: "GET",
                        data: {
                            start_date: startDate,
                            end_date: endDate,
                            dimensions: dimensions.join(','),
                            filters: filter
                        },
                        headers: {
                            'Authorization': 'Bearer ' + token
                        }
                    })
                    .done(function (data) {
                        setOverview(data);
                        setDatable(data);
                    });
            }

            var dimensions = getDimensions();
            var datatable = $('#ad-ink-admin [datatable]').DataTable({
                searching: false,
                lengthChange: false,
                columnDefs: [{
                    "className": "text-center",
                    "targets": "_all"
                }],
                columns: [{
                        title: "Mois",
                        data: "date",
                        defaultContent: "-",
                        visible: dimensions.indexOf("month") > -1,
                        render: filter_monthdate
                    },
                    {
                        title: "Date",
                        data: "date",
                        defaultContent: "-",
                        visible: dimensions.indexOf("date") > -1,
                        render: filter_date
                    },
                    {
                        title: "Heure",
                        data: "date",
                        defaultContent: "-",
                        visible: dimensions.indexOf("hour") > -1,
                        render: filter_hour
                    },
                    {
                        title: "Appareil",
                        data: "device",
                        defaultContent: "-",
                        visible: dimensions.indexOf("device") > -1,
                        render: filter_device
                    },
                    {
                        title: "Vues",
                        data: "opportunities",
                        defaultContent: "-",
                        render: filter_bignumber
                    },
                    {
                        title: "Publicités",
                        data: "impressions",
                        defaultContent: "-",
                        render: filter_bignumber
                    },
                    {
                        title: "Remplissage",
                        data: "fillrate",
                        defaultContent: "-",
                        render: filter_percentage
                    },
                    {
                        title: "VTR",
                        data: "vtr",
                        defaultContent: "-",
                        render: filter_percentage
                    },
                    {
                        title: "CPM",
                        data: "cpm",
                        defaultContent: "-",
                        render: filter_currency
                    },
                    {
                        title: "Gains",
                        data: "earnings",
                        defaultContent: "-",
                        render: filter_currency
                    }
                ]
            });

            // daterangepicker
            var start = moment();
            var end = moment();
            var daterangepicker = $('#ad-ink-admin [daterangepicker]').daterangepicker({
                startDate: start,
                endDate: end,
                showCustomRangeLabel: true,
                alwaysShowCalendars: true,
                applyButtonClasses: "ad-ink-btn-green",
                cancelClass: "ad-ink-btn-white",
                locale: {
                    "format": "DD/MM/YYYY",
                    "customRangeLabel": "Personnalisé",
                    "applyLabel": "Accepter",
                    "cancelLabel": "Annuler",
                },
                ranges: {
                    'Ajourd\'hui': [moment(), moment()],
                    'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 derniers jours': [moment().subtract(6, 'days'), moment()],
                    '30 derniers jours': [moment().subtract(29, 'days'), moment()],
                    'Mois en cours': [moment().startOf('month'), moment().endOf('month')],
                    'Mois dernier': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, function (start, end) {
                $("#ad-ink-admin [daterangepicker] [daterangepicker-display]").html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
                getReport();
            });
            $("#ad-ink-admin [daterangepicker] [daterangepicker-display]").html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));

            getReport();
        }
    });
})(jQuery);