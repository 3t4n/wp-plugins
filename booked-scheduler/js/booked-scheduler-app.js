function BookedApp() {

    function schedule(args) {

        jQuery(document).ready(function ($) {

            window.onmessage = function (event) {
                const iFrame = document.querySelector('#booked-schedule-app').querySelector('iframe');
                if (event.data.type && event.data.type === "page-height" && iFrame.getAttribute('src').indexOf(event.origin) === 0) {
                    iFrame.width = '100%';
                    iFrame.height = event.data.height + 10;
                }
            };

            $.post(booked_scheduler_ajax.ajaxurl, {
                    _ajax_nonce: booked_scheduler_ajax.nonce,
                    action: args.action,
                    title: this.value,
                    data: args,
                }, function (r) {
                    if (r.success) {
                        const appContainer = document.querySelector('#booked-schedule-app')
                        appContainer.innerHTML = '<div>' + r.data.message + '</div>';
                    } else
                        document.querySelector('#booked-schedule-app').innerHTML = '<div class="booked-error-message">' + r.data.message + '</div>';
                }
            );
        });
    }

    return {
        schedule,
    };
}

jQuery(document).ready(function ($) {
    const booked = new BookedApp();
    const scheduleId = $('#booked-schedule-param-scheduleid').val();
    const resourceIds = $('#booked-schedule-param-resourceids').val();
    const action = $('#booked-schedule-param-action').val();
    const defaultview = $('#booked-schedule-param-defaultview').val();

    const jsParams = {
        scheduleId: scheduleId || null,
        resourceIds: resourceIds || null,
        action: action || null,
        defaultview: defaultview || null,
    }
    booked.schedule(jsParams);
});