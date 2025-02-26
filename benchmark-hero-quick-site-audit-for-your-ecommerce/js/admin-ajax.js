window.addEventListener('load', function () {
    let startButton = document.getElementById('sybm-start-btn');
    let overallFooter = document.querySelector('.overall-footer');

    function enableStatusHandler() {
        let statusInterval = setInterval(() => {
            console.log('Checking status of the current job...')

            StoreYaBenchmarkAjaxHandler.getJobStatus()
                .then(res => {
                    if (!res.in_process) {
                        console.log('Job is completed. Reloading the current page...')
                        window.location.reload();
                    }
                })
        }, 10000);
    }

    startButton.addEventListener('click', function () {
        let isRefreshRequest = !!this.dataset.refresh;

        startButton.classList.add('disabled');

        if (document.querySelector('.overall-notification')) {
            document.querySelector('.overall-notification').remove();
        }

        StoreYaBenchmarkAjaxHandler.runAnalysis()
            .then(res => {
                let message;

                if (res.success) {
                    message = '<b>Your report is being generated</b><br>';
                    message += '<span>Please wait while we analyze your online store.<span>';
                    enableStatusHandler();
                } else {
                    message = '<b>Something went wrong...</b><br>';
                    message += '<span>Please visit us again later and click the refresh button.<span>';
                }

                return message;
            })
            .then(message => {
                let notification = document.createElement('div');
                notification.innerHTML = message;
                notification.classList.add('overall-notification');
                overallFooter.insertAdjacentElement('afterbegin', notification);
            })
    });
});

const StoreYaBenchmarkAjaxHandler = (() => {
    const ajaxURL = sybmVariables.ajaxURL;

    const runAnalysis = (refresh = false) => {
        let params = {
            action: 'sybm_run_analysis'
        };

        if (refresh) {
            params.refresh = true;
        }

        let queryString = new URLSearchParams(params);

        return fetch(`${ajaxURL}?${queryString}`)
            .then(data => data.json())
            .then(res => {
                return res
            })
            .catch(err => {
                return {
                    success: false
                }
            })
    }

    const getJobStatus = () => {
        let params = {
            action: 'sybm_get_job_status'
        };

        let queryString = new URLSearchParams(params);

        return fetch(`${ajaxURL}?${queryString}`)
            .then(data => data.json())
            .then(res => {
                return res
            })
            .catch(err => {
                return {
                    success: false
                }
            })
    }

    return {
        runAnalysis,
        getJobStatus
    }
})();