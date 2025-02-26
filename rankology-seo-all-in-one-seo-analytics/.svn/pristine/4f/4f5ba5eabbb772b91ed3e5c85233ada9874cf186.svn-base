const chartEl = document.querySelector('#hourly-usage-chart');
if (typeof hourlyUsageData != "undefined") {
    new Chart(chartEl, {
        type: 'bar',
        data: hourlyUsageData,
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        autoSkip: false,
                        maxRotation: 90,
                        minRotation: 90,
                        callback: function (val, index) {
                            return '🕑 ' + this.getLabelForValue(val);
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
}