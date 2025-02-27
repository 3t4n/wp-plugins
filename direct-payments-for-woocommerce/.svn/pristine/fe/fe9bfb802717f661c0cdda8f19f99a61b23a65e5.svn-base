jQuery(document).ready(function($) {
    var currentOrderId;

    // Function to handle AJAX requests
    function makeAjaxRequest(action, type, data, successCallback) {
        $.ajax({
            url: orderDetailsAjax.ajax_url,
            type: type,
            data: data,
            success: function(response) {
                if (response.success) {
                    successCallback(response.data);
                } else {
                    alert('Error: ' + response.data);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                alert('Error. Please check the console for more information.');
            }
        });
    }

    // Function to format the date
    function formatDate(dateString) {
        const now = new Date();
        const date = new Date(dateString);

        if (date.toDateString() === now.toDateString()) {
            return `Today, ${formatTime(date)}`;
        } else {
            return formatDateAndTime(date);
        }
    }

    // Format time as 4:30pm
    function formatTime(date) {
        const hours = date.getHours();
        const minutes = date.getMinutes();
        const period = hours >= 12 ? 'pm' : 'am';
        const formattedHours = hours % 12 || 12;
        const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;
        return `${formattedHours}:${formattedMinutes}${period}`;
    }

    // Format date as 25/02/2024, 4:30pm
    function formatDateAndTime(date) {
        const day = date.getDate().toString().padStart(2, '0');
        const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-indexed
        const year = date.getFullYear();
        return `${day}/${month}/${year}, ${formatTime(date)}`;
    }

    // Function to get status class
// Function to get status class and icon
function getStatusClassAndIcon(status) {
    const statusIcons = {
        'pending': '<i class="bi bi-clock-fill pendingicn"></i>',
        'processing': '<i class="bi bi-clock-fill complticn"></i>',
        'confirmed': '<i class="bi bi-clock-fill complticn"></i>',
        'completed': '<i class="bi bi-check-circle-fill complticn"></i>',
        'cancelled': '<i class="bi bi-x-circle-fill cnclicn"></i>',
        'on-hold': '<i class="bi bi-clock-fill pendingicn"></i>',
        'auto-draft': '<i class="bi bi-clock-fill pendingicn"></i>'
    };

    const statusClasses = {
        'pending': 'status-pending',
        'processing': 'status-processing',
        'confirmed': 'status-confirmed',
        'completed': 'status-completed',
        'cancelled': 'status-cancelled',
        'on-hold': 'status-on-hold',
        'auto-draft': 'status-auto-draft'
    };

    const normalizedStatus = status.toLowerCase();
    const icon = statusIcons[normalizedStatus] || ''; // Fallback to empty if no icon found
    const statusClass = statusClasses[normalizedStatus] || 'status-default'; // Fallback to default class

    return {
        icon: icon,
        statusClass: statusClass
    };
}


    // View order details
    
// View order details
$('.view-order').on('click', function() {
    currentOrderId = $(this).data('order-id');

    makeAjaxRequest(
        'get_order_details',
        'GET',
        {
            action: 'get_order_details',
            id: currentOrderId,
            nonce: orderDetailsAjax.nonce
        },
        function(data) {
            var formattedDate = formatDate(data.date_created);
            var statusData = getStatusClassAndIcon(data.status); // Get both icon and class
            
            var headsHtml = ` 
            <div class="${statusData.statusClass}"><span class="status-text">${statusData.icon} ${data.status}</span></div> 
            `;
            $('#orderhead').html(headsHtml);

            // Display screenshot link if available
            var screenshotHtml = data.screenshot ? `<a href="${data.screenshot}" target="_blank">View Payment Proof</a>` : 'No screenshot available';

            var detailsHtml = `  
            <div class="text-start">
                <div class="rowt rowt-colts-1 rowt-colts-sm-2 rowt-colts-md-2">
                    <div class="colt tuma_desttp"> 
                <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                <div class="colt tuma_desttp2">Full name</div><div class="colt tuma_desttp3">${data.customer_name}</div></div></div>
 
                    <div class="colt tuma_desttp"> 
                <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                <div class="colt tuma_desttp2">Amount</div><div class="colt tuma_desttp3">${data.order_total} | <span class="links">Order #${data.order_id}</span></div></div></div>
 
                    <div class="colt tuma_desttp"> 
                <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                <div class="colt tuma_desttp2">Date</div><div class="colt tuma_desttp3">${formattedDate}</div></div></div>
 
                    <div class="colt tuma_desttp"> 
                <div class="colt ${statusData.statusClass}"><p><div class="colt tuma_desttp2">Payment status</div>
                <span class="status-text text-capitalize piip">${statusData.icon} ${data.status}</span></div></div>
                    
                <div class="colt tuma_desttp"> 
                <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                <div class="colt tuma_desttp2">Email address</div><div class="colt tuma_desttp3">${data.billing_email}</div></div></div>

  
                    <div class="colt tuma_desttp"> 
                <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                <div class="colt tuma_desttp2">Phone</div><div class="colt tuma_desttp3">${data.phone}</div></div></div>

 
                </div>
            </div>

            <div class="text-start">
                <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                    <div class="colt"><p><strong>Payment Method</strong><br/>${data.payment_method} | ${data.paydata}<p></div>
                    <div class="colt"><p><strong>Payment proof</strong><br/>${screenshotHtml}<p></div> 
                </div>
            </div>
            `;
            $('#orderDetails').html(detailsHtml);

            var isCancelled = data.status === 'cancelled';
            $('#cancelOrderBtn')
                .prop('disabled', isCancelled)
                .toggleClass('btn-secondary', isCancelled)
                .toggleClass('btn-danger', !isCancelled);

            //$('#orderDetailsModal').modal('show');
        }
    );
});



    // Confirm Order
    $('#confirmOrderBtn').on('click', function() {
        if (confirm("Are you sure you want to confirm this order?")) {
            makeAjaxRequest(
                'confirm_order',
                'POST',
                {
                    action: 'confirm_order',
                    id: currentOrderId,
                    nonce: orderDetailsAjax.nonce
                },
                function() {
                    alert('Order confirmed successfully!');
                    //$('#orderDetailsModal').modal('hide');
                    location.reload(); // Reload the page to update the order status
                }
            );
        }
    });

    // Cancel Order
    $('#cancelOrderBtn').on('click', function() {
        if (confirm("Are you sure you want to cancel this order?")) {
            makeAjaxRequest(
                'cancel_order',
                'POST',
                {
                    action: 'cancel_order',
                    id: currentOrderId,
                    nonce: orderDetailsAjax.nonce
                },
                function() {
                    alert('Order canceled successfully!');
                    //$('#orderDetailsModal').modal('hide');
                    location.reload(); // Reload the page to update the order status
                }
            );
        }
    });

    // Select All Orders
    $('#select-all').on('change', function() {
        $('input[name="post[]"]').prop('checked', $(this).prop('checked'));
    });
});
