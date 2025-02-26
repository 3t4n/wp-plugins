jQuery(document).ready(function ($) {
    function scbcfw_updateProgressBar(progress) {
        var progressBar = document.getElementById('progress-bar');
        progressBar.style.width = progress + '%';
    }

    $('#shipping-class-assign').on('click', function (e) {
        e.preventDefault();
        var form = $('#shipping-class-form');
        var data = form.serializeArray();
        var totalProcessed = 0;

        function scbcfw_processBatch(batchSize, offset) {
            $.ajax({
                url: ajaxurl,
                method: 'POST',
                data: {
                    action: 'scbcfw_process_shipping_class_batch',
                    product_cat: data.find(item => item.name === 'product_cat').value,
                    shipping_class: data.find(item => item.name === 'shipping_class').value,
                    scbcfw_nonce: data.find(item => item.name === 'scbcfw_nonce').value,
                    batch_size: batchSize,
                    offset: offset,
                },
                success: function (response) {
                    if (response.success) {
                        totalProcessed += response.data.processed_count;
                        var percentComplete = Math.min((totalProcessed / response.data.total_count) * 100, 100);
                        scbcfw_updateProgressBar(percentComplete);

                        if (totalProcessed < response.data.total_count) {
                            scbcfw_processBatch(batchSize, totalProcessed);
                            $('#ajax-response').html('');
                        } else {
                            $('#ajax-response').html('<div class="notice notice-success">' + response.data.message + '</div>');
                        }
                    } else {
                        $('#ajax-response').html('<div class="notice notice-error">' + response.data.message + '</div>');
                    }
                }
            });
        }

        scbcfw_processBatch(100, 0); // Process 100 products at a time
    });
});