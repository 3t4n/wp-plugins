jQuery(document).ready(function ($) {
  // Handle button click
  $('.anipo-get-barcode-button').on('click', function (e) {
    e.preventDefault(); // Prevent the default behavior (page reload)

    let orderId = document.getElementById('order-id').value;
    let orderWeight = document.getElementById('order-weight').value;
    let orderBoxSize = document.getElementById('order-box-size').value;
    let orderBoxType = document.getElementById('order-box-type').value;
    let orderSendType = document.getElementById('order-send-type').value;
    let orderPaymentType = document.getElementById('anipo-payment-type').value;

    // Show the loader
    $('#anipo-ajax-loader').show();

    // Make the AJAX request
    $.ajax({
      url: barcodeAjax.ajax_url,  // Use the admin-ajax.php URL passed to JavaScript
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'anipo_get_order_barcode',
        order_id: orderId,
        order_weight: orderWeight,
        order_box_size: orderBoxSize,
        order_box_type: orderBoxType,
        order_send_type: orderSendType,
        order_payment_type: orderPaymentType,
        nonce: barcodeAjax.nonce  // Security nonce
      },
      success: function (response) {
        // Hide the loader
        $('#anipo-ajax-loader').hide();
        // If success, alert the response
        if (response.success) {
          if (response.data.status) {
            let currentUrl
            if (+response.data.data?.print_type === 1) {
              currentUrl = "print-barcode-order.html"
            } else if (+response.data.data?.print_type === 2) {
              currentUrl = "print-barcode-order-two.html"
            } else {
              currentUrl = "print-postal-receipt.html"
            }
            let data = encodeURIComponent(JSON.stringify(response.data.data));
            let printUrl = barcodeAjax.admin_url + `HTML/${currentUrl}?&data=${data}`;
            let printWindow = window.open(printUrl, '_blank');
            printWindow.onafterprint = function () {
              printWindow.close();
            };
          } else {
            alert(response.data.message);
          }
        } else {
          alert(response);  // Show error message
        }
        location.reload();
      },
      error: function (xhr, status, error) {
        // Hide the loader
        $('#anipo-ajax-loader').hide();
        alert('An error occurred: ' + error);  // Handle error
        location.reload();
      }
    });
  });
  // Show modal when button is clicked
  $('.anipo-show-barcode-modal-button').on('click', function (e) {
    e.preventDefault(); // Prevent the default behavior (page reload)
    let orderId = $(this).data('order-id');
    let orderWeight = $(this).data('order-weight');
    let isVoluminous = $(this).data('is-voluminous');
    $('#anipo-barcode-modal #order-box-type').val('0').prop('disabled', false);
    if (isVoluminous === 1) {
      $('#anipo-barcode-modal #order-box-type').val('1').prop('disabled', true);
    }
    $('#anipo-barcode-modal #order-id').val(orderId); // Set order ID in the form
    $('#anipo-barcode-modal #order-weight').val(orderWeight); // Set order Weight in the form
    $('#anipo-barcode-modal').fadeIn(); // Show the modal
  });

  // Close the modal
  $('.anipo-close-modal').on('click', function (e) {
    e.preventDefault(); // Prevent the default behavior (page reload)
    $('#anipo-barcode-modal').fadeOut();
  });

  // When the user clicks anywhere outside the modal content, close the modal
  $(window).click(function (event) {
    if ($(event.target).is('#anipo-barcode-modal')) {
      $('#anipo-barcode-modal').fadeOut(); // Hide the modal if the overlay is clicked
    }
  });
});

function anipoUpdateCheckboxValue(checkbox) {
  checkbox.value = checkbox.checked ? '1' : '0';
}
