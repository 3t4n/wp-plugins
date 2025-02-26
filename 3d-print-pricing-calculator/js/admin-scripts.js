jQuery(document).ready(function ($) {

  function showModal(isAdd) {
    if (isAdd) {
      $('#modalTitle').text('Add Printing Technology Option');
      $('#printingTechnologyForm')[0].reset();
      $('#currentOptionId').val('');
    }
    $('#printingTechnologyModal').css('display', 'block');
  }

  // Show modal when "Add Printing Technology Option" button is clicked
  $('#add-printing-technology-option').on('click', function () {
    showModal(true);
  });

  // Close modal handlers
  $('.close').on('click', function () {
    $('#printingTechnologyModal').css('display', 'none');
  });

  $(window).on('click', function (event) {
    if (event.target == $('#printingTechnologyModal')[0]) {
      $('#printingTechnologyModal').css('display', 'none');
    }
  });

  // Handle form submission for adding new option
  $('#confirmPrintingTechnologyOption').on('click', function () {
    var option = $('#printingTechnologyOption').val();
    var value = $('#printingTechnologyValue').val();
    var description = $('#printingTechnologyDescription').val();

    // Send AJAX request to save the option
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'add_printing_technology_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        printing_technology: option,
        printing_technology_value: value,
        printing_technology_description: description
      },
      success: function (response) {
        if (response.success) {
          alert('Option added successfully!');
          location.reload();
          $('#printingTechnologyModal').css('display', 'none');
        } else {
          alert(response.data);
        }
      },
      error: function (xhr, status, error) {
        alert('Error adding option. Please try again.' + error);
      },
    });
  });

  function showEditModal(currentValues) {
    $('#edit_currentOptionId').val(currentValues.id);
    $('#edit_originalOptionName').val(currentValues.option);
    $('#edit_printingTechnologyOption').val(currentValues.option);
    $('#edit_printingTechnologyValue').val(currentValues.value);
    $('#edit_printingTechnologyDescription').val(currentValues.description);
    $('#editPrintingTechnologyModal').css('display', 'block');
  }
  
  // Close modal handlers
  $('#editPrintingTechnologyModal .close').on('click', function() {
    $('#editPrintingTechnologyModal').css('display', 'none');
  });
  
  // Show edit modal when "Edit" button is clicked
  $('#printing-technology-container').on('click', '.edit-option', function () {
    var optionRow = $(this).closest('tr');
    var currentValues = {
        id: optionRow.data('option_id'),
        option: optionRow.find('input[name="printing_technology[]"]').val(),
        value: optionRow.find('input[name="printing_technology_value[]"]').val(),
        description: optionRow.find('textarea[name="printing_technology_description[]"]').val(),
    };
    showEditModal(currentValues);
  });
  
  // Handle edit form submission
  $('#confirmEditPrintingTechnologyOption').on('click', function () {
    var optionId = $('#edit_currentOptionId').val();
    var originalName = $('#edit_originalOptionName').val();
    var option = $('#edit_printingTechnologyOption').val();
    var value = $('#edit_printingTechnologyValue').val();
    var description = $('#edit_printingTechnologyDescription').val();
    
    if (option === originalName) {
      option = originalName; // Keep original value
    }
  
    $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: {
            action: 'edit_printing_technology_option',
            nonce: ppc3d_stl_parser_admin.nonce,
            option_id: optionId,
            original_name: originalName,
            printing_technology: option,
            printing_technology_value: value,
            printing_technology_description: description
        },
        success: function (response) {
            if (response.success) {
                updateTableRow(optionId, option, value, description);
                $('#editPrintingTechnologyModal').css('display', 'none');
                alert('Option updated successfully!');
                location.reload();
            } else {
                alert(response.data);
            }
        },
        error: function (xhr, status, error) {
            alert('Error updating option: ' + error);
        },
    });
  });
  
  function updateTableRow(optionId, newOption, value, description) {
    var row = $('tr[data-option_id="' + optionId + '"]');
    row.attr('data-option_id', newOption);
    row.find('input[name="printing_technology[]"]').val(newOption);
    row.find('input[name="printing_technology_value[]"]').val(value);
    row.find('textarea[name="printing_technology_description[]"]').val(description);
    
    // Update displayed text
    row.find('.option-name').text(newOption);
    row.find('.option-value').text(value);
    row.find('.option-description').text(description);
  }


  // Handle removal of dynamically added printing technology options
  $('#printing-technology-container').on('click', '.remove-option', function () {
    var optionRow = $(this).closest('tr');
    var optionName = optionRow.find('input[name="printing_technology[]"]').val();

    // AJAX request to delete the option from server-side settings
    $.ajax({
      url: ajaxurl, // Provided by WordPress
      type: 'POST',
      data: {
        action: 'delete_printing_technology_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        optionName: optionName,
      },
      success: function (response) {
        // Remove the option row if deletion is successful
        if (response.success) {
          optionRow.remove();
        } else {
          console.error('Error deleting printing technology option: ' + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error('Error deleting printing technology option: ' + error);
      },
    });
  });

  // Show modal when "Add Material Option" button is clicked
  $('#add-material-option').on('click', function () {
    $('#materialModal').css('display', 'block');
  });

  // Close the modal when the close button or outside the modal is clicked
  $('.close').on('click', function () {
    $('#materialModal').css('display', 'none');
  });

  $(window).on('click', function (event) {
    if (event.target == $('#materialModal')[0]) {
      $('#materialModal').css('display', 'none');
    }
  });

  $('#confirmMaterialOption').on('click', function () {
    var option = $('#materialOption').val();
    var value = $('#materialValue').val();
    var description = $('#materialDescription').val();

    // Send AJAX request to save the option
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'add_material_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        material: option,
        material_value: value,
        material_description: description,
      },
      success: function (response) {
        if (response.success) {

          alert('Option added successfully!');
          location.reload();

          $('#materialOption').val('');
          $('#materialDescription').val('');
          $('#materialValue').val('');

          $('#materialModal').css('display', 'none');
        } else {

          alert(response.data);
        }
      },
      error: function (xhr, status, error) {
        // Error adding option
        alert('Error adding option. Please try again.');
      },
    });
  });

  function showMaterialEditModal(currentValues) {
    $('#edit_currentOptionId').val(currentValues.id);
    $('#edit_originalOptionName').val(currentValues.option);
    $('#edit_materialOption').val(currentValues.option);
    $('#edit_materialValue').val(currentValues.value);
    $('#edit_materialDescription').val(currentValues.description);
    $('#editMaterialModal').css('display', 'block');
  }
  
  // Close modal handlers
  $('#editMaterialModal .close').on('click', function() {
    $('#editMaterialModal').css('display', 'none');
  });
  
  // Show edit modal when "Edit" button is clicked
  $('#material-options-container').on('click', '.edit-option', function () {
    var optionRow = $(this).closest('tr');
    var currentValues = {
        id: optionRow.data('option_id'),
        option: optionRow.find('input[name="material_options[]"]').val(),
        value: optionRow.find('input[name="material_options_value[]"]').val(),
        description: optionRow.find('textarea[name="material_options_description[]"]').val(),
    };
    showMaterialEditModal(currentValues);
  });

  // Handle edit form submission
  $('#confirmEditMaterialOption').on('click', function () {
    var optionId = $('#edit_currentOptionId').val();
    var originalName = $('#edit_originalOptionName').val();
    var option = $('#edit_materialOption').val();
    var value = $('#edit_materialValue').val();
    var description = $('#edit_materialDescription').val();
    
    if (option === originalName) {
      option = originalName; // Keep original value
    }
  
    $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: {
          action: 'edit_material_option',
          nonce: ppc3d_stl_parser_admin.nonce,
          option_id: optionId,
          original_name: originalName,
          material: option,
          material_value: value,
          material_description: description
        },
        success: function (response) {
            if (response.success) {
                updateTableRow(optionId, option, value, description);
                $('#editMaterialModal').css('display', 'none');
                alert('Option updated successfully!');
                location.reload();
            } else {
                alert(response.data);
            }
        },
        error: function (xhr, status, error) {
            alert('Error updating option: ' + error);
        },
    });
  });
  
  function updateTableRow(optionId, newOption, value, description) {
    var row = $('tr[data-option_id="' + optionId + '"]');
    row.attr('data-option_id', newOption);
    row.find('input[name="material_options[]"]').val(newOption);
    row.find('input[name="material-value[]"]').val(value);
    row.find('textarea[name="material-description[]"]').val(description);
    
    // Update displayed text
    row.find('.option-name').text(newOption);
    row.find('.option-value').text(value);
    row.find('.option-description').text(description);
  }


  // Handle removal of dynamically added material options
  $('#material-options-container').on('click', '.remove-option', function () {
    var optionRow = $(this).closest('tr');
    var optionName = optionRow.find('input[name="material_options[]"]').val();

    // AJAX request to delete the option from server-side settings
    $.ajax({
      url: ajaxurl, // Provided by WordPress
      type: 'POST',
      data: {
        action: 'delete_material_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        optionName: optionName,
      },
      success: function (response) {
        // Remove the option row if deletion is successful
        if (response.success) {
          optionRow.remove();
        } else {
          console.error('Error deleting material option: ' + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error('Error deleting material option: ' + error);
      },
    });
  });
////////////////////////////////////////////////////////////////////////////////////////
function showQualityModal(isAdd) {
  if (isAdd) {
    $('#modalTitle').text('Add Quality Option');
    $('#qualityForm')[0].reset();
    $('#currentOptionId').val('');
  }
  $('#qualityModal').css('display', 'block');
}

// Show modal when "Add Quality Option" button is clicked
$('#add-quality-option').on('click', function () {
  showQualityModal(true);
});

// Close modal handlers
$('.close').on('click', function () {
  $('#qualityModal').css('display', 'none');
});

$(window).on('click', function (event) {
  if (event.target == $('#qualityModal')[0]) {
    $('#qualityModal').css('display', 'none');
  }
});

// Handle form submission for adding new option
$('#confirmQualityOption').on('click', function () {
  var option = $('#qualityOption').val();
  var value = $('#qualityValue').val();
  var description = $('#qualityDescription').val();

  // Send AJAX request to save the option
  $.ajax({
    url: ajaxurl,
    type: 'POST',
    data: {
      action: 'add_quality_option',
      nonce: ppc3d_stl_parser_admin.nonce,
      quality: option,
      quality_value: value,
      quality_description: description
    },
    success: function (response) {
      if (response.success) {
        alert('Option added successfully!');
        location.reload();
        $('#qualityModal').css('display', 'none');
      } else {
        alert(response.data);
      }
    },
    error: function (xhr, status, error) {
      alert('Error adding option. Please try again.' + error);
    },
  });
});

// Edit Quality Option functionality
function showEditQualityModal(currentValues) {
  $('#edit_currentOptionId').val(currentValues.id);
  $('#edit_originalOptionName').val(currentValues.option);
  $('#edit_qualityOption').val(currentValues.option);
  $('#edit_qualityValue').val(currentValues.value);
  $('#edit_qualityDescription').val(currentValues.description);
  $('#editQualityModal').css('display', 'block');
}

// Close edit modal handlers
$('#editQualityModal .close').on('click', function() {
  $('#editQualityModal').css('display', 'none');
});

// Show edit modal when "Edit" button is clicked
$('#quality-options-container').on('click', '.edit-option', function () {
  var optionRow = $(this).closest('tr');
  var currentValues = {
    id: optionRow.data('option_id'),
    option: optionRow.find('input[name="quality_options[]"]').val(),
    value: optionRow.find('input[name="quality_options_value[]"]').val(),
    description: optionRow.find('textarea[name="quality_options_description[]"]').val(),
  };
  showEditQualityModal(currentValues);
});

// Handle edit form submission
$('#confirmEditQualityOption').on('click', function () {
  var optionId = $('#edit_currentOptionId').val();
  var originalName = $('#edit_originalOptionName').val();
  var option = $('#edit_qualityOption').val();
  var value = $('#edit_qualityValue').val();
  var description = $('#edit_qualityDescription').val();
  
  if (option === originalName) {
    option = originalName; // Keep original value
  }

  $.ajax({
    url: ajaxurl,
    type: 'POST',
    data: {
      action: 'edit_quality_option',
      nonce: ppc3d_stl_parser_admin.nonce,
      option_id: optionId,
      original_name: originalName,
      quality: option,
      quality_value: value,
      quality_description: description
    },
    success: function (response) {
      if (response.success) {
        updateQualityTableRow(optionId, option, value, description);
        $('#editQualityModal').css('display', 'none');
        alert('Option updated successfully!');
        location.reload();
      } else {
        alert(response.data);
      }
    },
    error: function (xhr, status, error) {
      alert('Error updating option: ' + error);
    },
  });
});

function updateQualityTableRow(optionId, newOption, value, description) {
  var row = $('tr[data-option_id="' + optionId + '"]');
  row.attr('data-option_id', newOption);
  row.find('input[name="quality[]"]').val(newOption);
  row.find('input[name="quality_value[]"]').val(value);
  row.find('textarea[name="quality_description[]"]').val(description);
  
  // Update displayed text
  row.find('.option-name').text(newOption);
  row.find('.option-value').text(value);
  row.find('.option-description').text(description);
}

  // Handle removal of dynamically added quality options
  $('#quality-options-container').on('click', '.remove-option', function () {
    var optionRow = $(this).closest('tr');
    var optionName = optionRow.find('input[name="quality_options[]"]').val();

    // AJAX request to delete the option from server-side settings
    $.ajax({
      url: ajaxurl, // Provided by WordPress
      type: 'POST',
      data: {
        action: 'delete_quality_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        optionName: optionName,
      },
      success: function (response) {
        // Remove the option row if deletion is successful
        if (response.success) {
          optionRow.remove();
        } else {
          console.error('Error deleting quality option: ' + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error('Error deleting quality option: ' + error);
      },
    });
  });

  // Show modal when "Add Infill Option" button is clicked
  $('#add-infill-option').on('click', function () {
    $('#infillModal').css('display', 'block');
  });

  // Close the modal when the close button or outside the modal is clicked
  $('.close').on('click', function () {
    $('#infillModal').css('display', 'none');
  });

  $(window).on('click', function (event) {
    if (event.target == $('#infillModal')[0]) {
      $('#infillModal').css('display', 'none');
    }
  });

  $('#confirmInfillOption').on('click', function () {
    var option = $('#infillOption').val();
    var value = $('#infillValue').val();
    var description = $('#infillDescription').val();

    // Send AJAX request to save the option
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'add_infill_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        infill: option,
        infill_value: value,
        infill_description: description,
      },
      success: function (response) {
        if (response.success) {

          alert('Option added successfully!');
          location.reload();

          $('#infillOption').val('');
          $('#infillDescription').val('');
          $('#infillValue').val('');

          $('#infillModal').css('display', 'none');
        } else {

          alert(response.data);
        }
      },
      error: function (xhr, status, error) {
        alert('Error adding option. Please try again.');
      },
    });
  });

//Update

function showEditInfillModal(currentValues) {
  $('#edit_currentInfillId').val(currentValues.id);
  $('#edit_originalInfillName').val(currentValues.option);
  $('#edit_infillOption').val(currentValues.option);
  $('#edit_infillValue').val(currentValues.value);
  $('#edit_infillDescription').val(currentValues.description);
  $('#editInfillModal').css('display', 'block');
}

// Close modal handlers
$('#editInfillModal .close').on('click', function() {
  $('#editInfillModal').css('display', 'none');
});

// Show edit modal when "Edit" button is clicked
$('#infill-container').on('click', '.edit-option', function () {
  var optionRow = $(this).closest('tr');
  var currentValues = {
    id: optionRow.data('infill_id'),
    option: optionRow.find('input[name="infill[]"]').val(),
    value: optionRow.find('input[name="infill_value[]"]').val(),
    description: optionRow.find('textarea[name="infill_description[]"]').val(),
  };
  showEditInfillModal(currentValues);
});

// Handle edit form submission
$('#confirmEditInfillOption').on('click', function () {
  var optionId = $('#edit_currentInfillId').val();
  var originalName = $('#edit_originalInfillName').val();
  var option = $('#edit_infillOption').val();
  var value = $('#edit_infillValue').val();
  var description = $('#edit_infillDescription').val();

  $.ajax({
    url: ajaxurl,
    type: 'POST',
    data: {
      action: 'edit_infill_option',
      nonce: ppc3d_stl_parser_admin.nonce,
      infill_id: optionId,
      original_name: originalName,
      infill: option,
      infill_value: value,
      infill_description: description,
    },
    success: function (response) {
      if (response.success) {
        updateInfillTableRow(optionId, option, value, description);
        $('#editInfillModal').css('display', 'none');
        alert('Option updated successfully!');
        location.reload();
      } else {
        alert(response.data);
      }
    },
    error: function (xhr, status, error) {
      alert('Error updating option: ' + error);
    },
  });
});

function updateInfillTableRow(optionId, newOption, value, description) {
  var row = $('tr[data-infill_id="' + optionId + '"]');
  row.attr('data-infill_id', newOption);
  row.find('input[name="infill_option[]"]').val(newOption);
  row.find('input[name="infill_value[]"]').val(value);
  row.find('textarea[name="infill_description[]"]').val(description);

  // Update displayed text
  row.find('.infill-name').text(newOption);
  row.find('.infill-value').text(value);
  row.find('.infill-description').text(description);
}


  // Handle removal of dynamically added options
  $('#infill-container').on('click', '.remove-option', function () {
    var optionRow = $(this).closest('tr');
    var optionName = optionRow.find('input[name="infill[]"]').val();

    // AJAX request to delete the option from server-side settings
    $.ajax({
      url: ajaxurl, // Provided by WordPress
      type: 'POST',
      data: {
        action: 'delete_infill_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        optionName: optionName,
      },
      success: function (response) {
        // Remove the option row if deletion is successful
        if (response.success) {
          optionRow.remove();
        } else {
          console.error('Error deleting infill option: ' + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error('Error deleting infill option: ' + error);
      },
    });
  });

  $; // Show modal when "Add Color Option" button is clicked
  $('#add-color-option').on('click', function () {
    $('#colorModal').css('display', 'block');
  });

  // Close the modal when the close button or outside the modal is clicked
  $('.close').on('click', function () {
    $('#colorModal').css('display', 'none');
  });

  $(window).on('click', function (event) {
    if (event.target == $('#colorModal')[0]) {
      $('#colorModal').css('display', 'none');
    }
  });

  $('#confirmColorOption').on('click', function () {
    var option = $('#colorOption').val();
    var value = $('#colorValue').val();
    var description = $('#colorDescription').val();

    // Send AJAX request to save the option
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'add_color_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        color: option,
        color_value: value,
        color_description: description,
      },
      success: function (response) {
        if (response.success) {

          alert('Option added successfully!');
          location.reload();

          $('#colorOption').val('');
          $('#colorDescription').val('');
          $('#colorValue').val('');

          $('#colorModal').css('display', 'none');
        } else {

          alert(response.data);
        }
      },
      error: function (xhr, status, error) {
        alert('Error adding option. Please try again.');
      },
    });
  });

  function showEditColorModal(currentValues) {
    $('#edit_currentColorId').val(currentValues.id);
    $('#edit_originalColorName').val(currentValues.color);
    $('#edit_colorOption').val(currentValues.color);
    $('#edit_colorValue').val(currentValues.value);
    $('#edit_colorDescription').val(currentValues.description);
    $('#editColorModal').css('display', 'block');
  }
  
  // Close modal handlers
  $('#editColorModal .close').on('click', function () {
    $('#editColorModal').css('display', 'none');
  });
  
  // Show edit modal when "Edit" button is clicked
  $('#color-container').on('click', '.edit-option', function () {
    var optionRow = $(this).closest('tr');
    var currentValues = {
      id: optionRow.data('color_id'),
      color: optionRow.find('input[name="color[]"]').val(),
      value: optionRow.find('input[name="color_value[]"]').val(),
      description: optionRow.find('textarea[name="color_description[]"]').val(),
    };
    showEditColorModal(currentValues);
  });
  
  // Handle edit form submission
  $('#confirmEditColorOption').on('click', function () {
    var colorId = $('#edit_currentColorId').val();
    var originalName = $('#edit_originalColorName').val();
    var color = $('#edit_colorOption').val();
    var value = $('#edit_colorValue').val();
    var description = $('#edit_colorDescription').val();
  
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'edit_color_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        color_id: colorId,
        original_name: originalName,
        color: color,
        color_value: value,
        color_description: description,
      },
      success: function (response) {
        if (response.success) {
          updateColorTableRow(colorId, color, value, description);
          $('#editColorModal').css('display', 'none');
          alert('Color option updated successfully!');
          location.reload();
        } else {
          alert(response.data);
        }
      },
      error: function (xhr, status, error) {
        alert('Error updating color option: ' + error);
      },
    });
  });
  
  function updateColorTableRow(colorId, newColor, value, description) {
    var row = $('tr[data-color_id="' + colorId + '"]');
    row.find('input[name="color[]"]').val(newColor);
    row.find('input[name="color_value[]"]').val(value);
    row.find('textarea[name="color_description[]"]').val(description);
  
    // Update displayed text
    row.find('.color-name').text(newColor);
    row.find('.color-value').text(value);
    row.find('.color-description').text(description);
  }
  

  // Handle removal of dynamically added options
  $('#color-container').on('click', '.remove-option', function () {
    var optionRow = $(this).closest('tr');
    var optionName = optionRow.find('input[name="color[]"]').val();

    // AJAX request to delete the option from server-side settings
    $.ajax({
      url: ajaxurl, // Provided by WordPress
      type: 'POST',
      data: {
        action: 'delete_color_option',
        nonce: ppc3d_stl_parser_admin.nonce,
        optionName: optionName,
      },
      success: function (response) {
        // Remove the option row if deletion is successful
        if (response.success) {
          optionRow.remove();
        } else {
          console.error('Error deleting color option: ' + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error('Error deleting color option: ' + error);
      },
    });
  });

  // // Initial setup based on checkbox state
  // updateToggleText();

  // // Handle click event on toggle link
  // $('#toggle-enable-disable').on('click', function (e) {
  //   e.preventDefault();

  //   // Toggle checkbox state
  //   var isChecked = $('#toggle-switch').prop('checked');
  //   $('#toggle-switch').prop('checked', !isChecked);

  //   // Update toggle link text and checkbox value
  //   updateToggleText();
  // });
});
