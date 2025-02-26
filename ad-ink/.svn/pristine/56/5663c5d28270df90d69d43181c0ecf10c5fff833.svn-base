(function ($) {
    'use strict';

    $(function () {
        if ($('#ad-ink-admin #affiliation').length > 0) {


            var start = moment().startOf("month");
            var end = moment().endOf("month");

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

            var datatable = $('#ad-ink-admin [datatable]').DataTable({
                searching: false,
                lengthChange: false,
                columnDefs: [{
                    "className": "text-center",
                    "targets": "_all"
                }],
                columns: [{
                        title: "Jour",
                        data: "date",
                        defaultContent: "-",
                        render: filter_date
                    },
                    {
                        title: "Gains",
                        data: "earnings",
                        defaultContent: "-",
                        render: filter_currency
                    }
                ]
            });


            function setDatable(data) {
                datatable.clear();
                datatable.rows.add(data);
                datatable.draw();
            }

            function getReport() {
                // get all values
                var url = $("#ad-ink-admin #api-url").val();
                var token = $("#ad-ink-admin #api-token").val();
                var startDate = $('#ad-ink-admin [daterangepicker]').data('daterangepicker').startDate.format("YYYY-MM-DD");
                var endDate = $('#ad-ink-admin [daterangepicker]').data('daterangepicker').endDate.format("YYYY-MM-DD");
                // call report ajax
                $.ajax({
                        url: url + '/affiliation/report',
                        method: "GET",
                        data: {
                            start_date: startDate,
                            end_date: endDate
                        },
                        headers: {
                            'Authorization': 'Bearer ' + token
                        }
                    })
                    .done(function (data) {
                        setDatable(data);
                    });
            }

            getReport();
        }
    });
})(jQuery);