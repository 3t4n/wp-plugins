jQuery(document).ready(function($) {
  $('#button-save-greeting').on('click', function(e) {
      e.preventDefault();

      jQuery.ajax({
          method: 'POST',
          dataType: 'json',
          url: ajax_object.ajax_url,
          data: {
              action: "my_save_settings",
              ch_greeting_field: $('#ch_greeting_field').val(),
              achat_greetings_option:$('#achat-greetings-hidden').val()

          },
          success: function(response) {
              console.log('Success response:', response);
              showToast('Settings saved successfully!');
          },
          complete: function(response) {
              console.log('Complete response:', response);
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.error('AJAX Error:', textStatus, errorThrown);
              console.error('Response:', jqXHR.responseText);
          }
      });
  });
  $('#button-save-def').on('click', function(e) {
    e.preventDefault();

    jQuery.ajax({
        method: 'POST',
        dataType: 'json',
        url: ajax_object.ajax_url,
        data: {
            action: "autochat_def_settings",
            ch_def_reply_option: $('#ch_def_reply_field').val(),
            achat_default_reply_option:$('#achat-default-rply-hidden').val()

        },
        success: function(response) {
            console.log('Success response:', response);
            showToast('Settings saved successfully!');
        },
        complete: function(response) {
            console.log('Complete response:', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX Error:', textStatus, errorThrown);
            console.error('Response:', jqXHR.responseText);
        }
    });
});

$('.inner-button-save').on('click', function(e) {
  e.preventDefault();
  var form = $(this).closest('form');
  var formData = form.serializeArray();
  formData.push({ name: 'action', value: 'save_far_plugin_settings' });

  $.ajax({
      method: 'POST',
      url: ajax_object.ajax_url,
      data: formData,
      success: function(response) {
          showToast('Settings saved successfully!');
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error('AJAX Error:', textStatus, errorThrown);
          console.error('Response:', jqXHR.responseText);
      }
  });
});

$('.modal-del-btn').on('click', function(e) {
  e.preventDefault();
  var form = $(this).closest('form');
  var formData = form.serializeArray();
  formData.push({ name: 'action', value: 'save_far_plugin_settings' });

  $.ajax({
      method: 'POST',
      url: ajax_object.ajax_url,
      data: formData,
      success: function(response) {
          showToast('Settings saved successfully!');
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error('AJAX Error:', textStatus, errorThrown);
          console.error('Response:', jqXHR.responseText);
      }
  });
});
function showToast(message) {
  var toast = $('.toast');
  toast.text(message);
  toast.addClass('show');
  setTimeout(function() {
      toast.removeClass('show');
  }, 5000);
}

// FUNCTIONS FOR NEW SETTINGS PAGE 

 // Initially hide both areas
 $('#bubbleTextArea').hide();
 $('#bubbleIconArea').hide();

 // Handle the change event of the dropdown
 $('#bubbleType').change(function() {
     var selectedValue = $(this).val();
     if (selectedValue == 'text') {
         $('#bubbleTextArea').show();
         $('#bubbleIconArea').hide();
     } else if (selectedValue == 'icon') {
         $('#bubbleTextArea').hide();
         $('#bubbleIconArea').show();
     } else if (selectedValue == 'text_icon') {
         $('#bubbleTextArea').show();
         $('#bubbleIconArea').show();
     }
 });


 // Default image source
 var defaultImageSrc = 'img/avatar.png';

 // Hide the remove button initially
 $('.remove-button').hide();

 // Handle file input change event
 $('#icon-file').change(function(event) {
     var input = event.target;

     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function(e) {
             $('.upload-image').attr('src', e.target.result);
             // Show the remove button after file selection
             $('.remove-button').show();
         };

         reader.readAsDataURL(input.files[0]);
     }
 });

 // Handle remove button click event
 $('.remove-button').click(function() {
     // Reset the file input
     $('#icon-file').val('');

     // Restore the default image
     $('.upload-image').attr('src', defaultImageSrc);

     // Hide the remove button again
     $('.remove-button').hide();
 });

//popup code start

// if (localStorage.getItem('isConnected') === 'true') {
//     $('#autochat-popup1').hide(); // Ensure the popup is hidden
//     $('.ac-integration-manage-display').addClass('ac-integration-manage-display-block');
//     $('.tawk-connect-button').addClass('tawk-connect-button-display-none');
// }

// Click event for the Connect button
$('.tawk-connect-button').click(function () {
    $('#autochat-popup1').fadeIn();
    $('.ac-integration-manage-display').addClass('ac-integration-manage-display-block');
    $('.tawk-connect-button').addClass('tawk-connect-button-display-none');

    // Store the state in local storage
    // localStorage.setItem('isConnected', 'true');
});
// Click event for the Manage button
$('.tawk-manage-button').click(function () {
    $('#autochat-popup2').fadeIn();
});

// Close popup when clicking the close button or outside the popup
$('.autochat-close').click(function(event) {
    if ($(event.target).is('.autochat-popup-overlay, .autochat-close')) {
        $(this).closest('.autochat-popup-overlay').fadeOut();
    }
});

// Prevent event bubbling on popup content
$('.autochat-popup-content').click(function(event) {
    event.stopPropagation();
});

// Reset button
$('#autochat-reset').click(function() {
    $('#autochat-tawk-input').val('');
});

// Cancel button
$('#autochat-cancel').click(function() {
    $('#autochat-popup1').fadeOut();
});
$('#autochat-manage-cancel').click(function() {
    $('#autochat-popup2').fadeOut();
});

// Connect Tawk.to button with validation
$('#autochat-connect-tawk').click(function() {
    var inputVal = $('#autochat-tawk-input').val().trim();
    if (inputVal === '') {
        alert('Please fill in the textarea before connecting.');
    } else {
        $('#autochat-popup1').fadeOut(function() {
            $('#autochat-popup2').fadeIn();
        });
    }
});


});


document.addEventListener('DOMContentLoaded', function() {
    const selectBox = document.getElementById('icon-selector');
    const selected = selectBox.querySelector('.selected');
    const optionsContainer = selectBox.querySelector('.options');
    const optionsList = optionsContainer.querySelectorAll('div');

    selected.addEventListener('click', function() {
        optionsContainer.style.display = optionsContainer.style.display === 'none' ? 'block' : 'none';
    });

    optionsList.forEach(option => {
        option.addEventListener('click', function() {
            const icon = option.getAttribute('data-icon');
            const value = option.getAttribute('data-value');
            const text = option.textContent.trim();

            selected.innerHTML = `<img src="${icon}" alt="${text}"><span>${text}</span>`;
            optionsContainer.style.display = 'none';
        });
    });

    document.addEventListener('click', function(event) {
        if (!selectBox.contains(event.target)) {
            optionsContainer.style.display = 'none';
        }
    });
});