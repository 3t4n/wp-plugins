jQuery(document).ready(function($) {
    $("#acima_cancel_order").on("click", function(event) {
        event.preventDefault();
        var order_id = acimaRefund.orderId;
        console.log("Cancelling order: " + order_id);

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                action: "acima_cancel_order",
                order_id: order_id,
                nonce: acimaRefund.nonce
            },
            success: function(response) {
                console.log("Success:", response);
                alert(response.data.message);
                setTimeout(function() {
                    location.reload();
                }, 2000);
            },
            error: function(response) {
                console.log("Error:", response);
                try {
                    var errorResponse = JSON.parse(response.responseText);
                    var errorMessage = errorResponse.data.message || acimaRefund.errorMessage;
                } catch (e) {
                    var errorMessage = acimaRefund.errorMessage;
                }
                alert("Error: " + errorMessage);
            }
        });
    });
});