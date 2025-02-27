(function ($) {
  $(document).ready(function () {
    // alphanumeric regex
    var regex = /^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9]+$/;
    var errorMessage = 'The tracker ID entered by you doesn\'t look correct. Please enter the correct tracker ID to proceed.';

    $('#tracker-settings-form').on('submit', function (e) {
      var trackerId = $.trim($('#leadfeeder_tracker_id').val());

      if (trackerId === '') {
        return;
      }

      // strip v1 from tracker id if present
      if (trackerId.indexOf('v1') === 0) {
        trackerId = trackerId.split('_')[1];
      }

      // ensure 16 chars
      if (trackerId.length !== 16) {
        $('#dealfront-validation-errors').css('display', 'block');
        $('#dealfront-validation-errors #message-text').html(errorMessage);
        e.preventDefault();
      }

      // ensure alphanumeric
      if (!regex.test(trackerId)) {
        $('#dealfront-validation-errors').css('display', 'block');
        $('#dealfront-validation-errors #message-text').html(errorMessage)
        e.preventDefault();
      }
    });
  });
}(jQuery));
