jQuery(document).ready(function ($) {
  // Disable upload button initially
  // $('#stl-file').prop('disabled', true);
  // $('#stl-file-label').addClass('disabled');
  // Define mesh variable in a higher scope
  var mesh;
  var loadedMeshName;

  // Function to convert hexadecimal color code to RGB
  function hexToRgb(hex) {
    // Remove '#' if present
    hex = hex.replace('#', '');
    // Parse hexadecimal string to integer
    var bigint = parseInt(hex, 16);
    // Extract RGB components
    var r = (bigint >> 16) & 255;
    var g = (bigint >> 8) & 255;
    var b = bigint & 255;
    // Return as Color3 object
    return new BABYLON.Color3(r / 255, g / 255, b / 255);
  }

  $('#color').on('change', function () {
    // Get the selected color from the color input
    var selectedColor = $(this).val();

    // Convert the selected color to RGB
    var colorRGB = hexToRgb(selectedColor);

    // Apply the new color to the 3D model
    if (mesh) {
      // Assuming `mesh` is the reference to your loaded 3D model mesh
      var material = mesh.material;
      if (material) {
        material.diffuseColor = colorRGB;
      }
    }
  });

  // Load the STL file asynchronously
  function canvasLoader(url, fileName) {
    // Create the Babylon.js engine
    var canvas = document.getElementById('renderCanvas');
    var engine = new BABYLON.Engine(canvas, true);

    // Create a scene
    var scene = new BABYLON.Scene(engine);
    scene.clearColor = new BABYLON.Color3(0.96, 0.96, 0.96); // Set background color to off-white

    // Create a camera
    var camera = new BABYLON.ArcRotateCamera('camera', 7, 5, 5, BABYLON.Vector3.Zero(), scene);
    camera.attachControl(canvas, false); // Disable default camera controls

    // Store initial camera state
    var initialRadius;
    var initialTarget = new BABYLON.Vector3(0, 0, 0); // Initialize initial target at origin

    // Add a directional light to the scene
    var light = new BABYLON.DirectionalLight('light', new BABYLON.Vector3(0, 1, 5), scene);
    light.shadowEnabled = false; // Disable shadows for the directional light

    // Load the STL file asynchronously
    BABYLON.SceneLoader.ImportMesh('', url + '/', fileName, scene, function (meshes) {
      // Do something with the loaded meshes if needed
      mesh = meshes[0]; // Update the outer scope `mesh` variable
      mesh.rotationQuaternion = null; // Disable auto-rotation

      // Get bounding box information of the loaded mesh
      var boundingInfo = mesh.getBoundingInfo();
      var size = boundingInfo.boundingBox.extendSizeWorld;

      // Calculate camera position and target based on the size of the mesh
      var distance = Math.max(size.x, size.y, size.z) * 2; // Adjust this multiplier as needed
      var target = boundingInfo.boundingBox.centerWorld;
      camera.setTarget(target);
      camera.radius = distance;

      // Store the initial camera state
      initialRadius = distance; // Store initial radius directly from calculated distance
      initialTarget.copyFrom(target); // Store initial target position

      // Adjust camera position to fit the mesh within the view
      var viewSize = engine.getRenderWidth() / engine.getRenderHeight();
      var fitHeightDistance = size.y / Math.sin(camera.fov / 2);
      var fitWidthDistance = size.x / viewSize / Math.sin(camera.fov / 2);
      camera.radius = Math.max(fitHeightDistance, fitWidthDistance);

      // Zoom out the camera
      camera.radius *= 1.5; // Adjust the multiplier as needed to zoom out

      // Apply a new material with a specific color to the mesh
      var material = new BABYLON.StandardMaterial('material', scene);
      material.diffuseColor = hexToRgb('#b2bec3');
      mesh.material = material;
    });

    // Run the render loop
    engine.runRenderLoop(function () {
      scene.render();
    });

    // Resize the canvas when the window is resized
    window.addEventListener('resize', function () {
      engine.resize();
    });

    // Zoom in and out functions
    var zoomFactor = 1.1; // Adjust the zoom factor as needed
    function zoomIn() {
      camera.radius /= zoomFactor;
    }

    function zoomOut() {
      camera.radius *= zoomFactor;
    }

    // Cancel zoom function
    function cancelZoom(event) {
      event.preventDefault(); // Prevent the default action
      if (mesh) {
        camera.radius = initialRadius;
        camera.setTarget(initialTarget); // Reset camera target to initial position
      }
    }

    // Assuming you have global variables to store API data

    // Remove mesh function
    function removeMesh() {
      if (mesh) {
        mesh.dispose(); // Dispose of the mesh object
        loadedMeshName = null; // Clear the loaded mesh name
        mesh = null; // Clear the reference to the mesh object
      }

      // Reset initial camera state
      initialRadius = 0;
      initialTarget = new BABYLON.Vector3(0, 0, 0);

      // Clear file input value if needed
      var fileInput = $('#stl-file')[0];
      fileInput.value = null;

      // Display the file input and its label again
      $('#stl-file-label').show();

      $('body').append(`
        <div id="confirmationMessage" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #ffffff; border-radius: 8px; padding: 20px 40px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-align: center; z-index: 1000; display: flex; flex-direction: column; align-items: center;">
          <p style="margin: 0; font-size: 16px; color: #333; text-align: center;">The mesh has been removed successfully.</p>
        </div>
      `);

      // Delay and then refresh the page
      setTimeout(() => {
        location.reload();
      }, 500); // .5-second delay
    }

    // Attach zoom functions to buttons
    $('#zoomIn').on('click', zoomIn);
    $('#zoomOut').on('click', zoomOut);
    $('#cancelZoom').on('click', cancelZoom);
    $('#removeMesh').on('click', removeMesh);
  }

  // $(document).ready(function () {
  //   // Initialize size update on page load
  //   updateMeshSize();

  //   // Update size when slider or unit changes
  //   $('#sizeSlider').on('input', updateMeshSize);
  //   $('#unitSelect').on('change', updateMeshSize);
  // });

  // jQuery(document).ready(function ($) {
  //   // Size conversion factors
  //   const unitConversion = {
  //     cm: 1, // base unit is cm
  //     mm: 10, // 1 cm = 10 mm
  //     in: 0.393701 // 1 cm = 0.393701 in
  //   };

  //   // Get references to the slider, value display, and unit selector
  //   var sizeSlider = $('#sizeSlider');
  //   var sizeValueDisplay = $('#sizeValue');
  //   var unitSelect = $('#unitSelect');

  //   // Function to update the size of the mesh based on the slider and selected unit
  //   function updateMeshSize() {
  //     var size = sizeSlider.val(); // Get the current slider value
  //     var selectedUnit = unitSelect.val(); // Get the selected unit

  //     // Convert size based on the selected unit
  //     var convertedSize = size * unitConversion[selectedUnit];

  //     // Display the size with the unit
  //     sizeValueDisplay.text(convertedSize.toFixed(2) + ' ' + selectedUnit);

  //     // Apply the scaling to the mesh (assuming the mesh is already loaded)
  //     if (mesh) {
  //       mesh.scaling = new BABYLON.Vector3(convertedSize, convertedSize, convertedSize);
  //     }
  //   }

  //   // Update the size when the slider value changes
  //   sizeSlider.on('input', updateMeshSize);

  //   // Update the size when the unit is changed
  //   unitSelect.on('change', updateMeshSize);

  //   // Initialize with the current values
  //   updateMeshSize(); // Set initial size on page load
  // });


  // Function to handle STL file upload and API request
  function initiateQueryData(event) {
    event.preventDefault();

    // Show the spinner and hide file input elements
    $('#spinner').show();
    $('#upload-file-message').hide();
    $('#stl-file').hide();
    $('#stl-file-label').hide();

    // Get the uploaded file
    var fileInput = $('#stl-file')[0];
    var file = fileInput.files[0];

    // Verify if a file is selected
    if (!file) {
      alert('Please select a file.');
      return;
    }

    // Get form input values
    var formData = getFormData(file);

    // Validate form inputs
    if (!isValidFormData(formData)) {
      displayFormErrors();
      return;
    }

    // Send AJAX request
    sendAjaxRequest(formData, file);
  }

  // Function to get form data
  function getFormData(file) {
    return {
      action: 'ppc3d_upload_stl_file',
      nonce: ppc3d_stl_parser_3d.nonce,
      stl_file: file,
      printing_technology: $('#printing_technology').val(),
      material: $('#material').val(),
      quality: $('#quality').val(),
      infill: $('#infill').val(),
      color: $('#color').val(),
      quantity: $('#quantity').val(),
      unit: 'mm',
      scale: '100',
    };
  }

  // Function to validate form data
  function isValidFormData(formData) {
    return formData.printing_technology !== '' &&
      formData.material !== '' &&
      formData.quality !== '' &&
      formData.infill !== '' &&
      formData.color !== '' &&
      formData.quantity !== '';
  }

  // Function to display form errors
  function displayFormErrors() {
    displayPrintingTechnologyErrorMessage('Please select printing technology.');
    displayMaterialErrorMessage('Please select material.');
    displayQualityErrorMessage('Please select quality.');
    displayInfillErrorMessage('Please select infill.');
    displayColorErrorMessage('Please select color.');
    displayQuantityErrorMessage('Please enter quantity.');
  }

  // Function to send AJAX request
  function sendAjaxRequest(formData, file) {
    var ajaxFormData = new FormData();

    for (var key in formData) {
      ajaxFormData.append(key, formData[key]);
    }

    $.ajax({
      url: ppc3d_stl_parser_3d.ajaxurl,
      type: 'POST',
      data: ajaxFormData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.success) {
          // Continue with other success actions, like updating UI, etc.
          handleSuccessResponse(response, file);
        } else {
          console.log('Error:', response.data.message);
        }
      },
      error: function () {
        console.log('Error during file upload');
      }
    });
  }

  // Function to handle successful response
  function handleSuccessResponse(response, file) {
    var arrayData;

    // Check if response is a string (indicating JSON data)
    if (typeof response === 'string') {
      try {
        arrayData = JSON.parse(response);
      } catch (e) {
        console.error('Error parsing JSON response:', e);
        alert('Error parsing response. Please try again.');
        return;
      }
    } else if (typeof response === 'object') {
      // If response is already an object, use it directly
      arrayData = response;
    } else {
      // Handle unexpected response type
      console.error('Unexpected response type:', typeof response);
      alert('Unexpected response format. Please try again.');
      return;
    }

    // Check if 'data' and 'formated_data' are present in the response
    if (arrayData && arrayData.data && arrayData.data.formated_data) {
      var data = arrayData.data.formated_data;

      // Update price and build output table
      updatePrice(data.price);
      buildOutputTables(data, file);

      // Locate and update the hidden input field
      const transientKeyField = $('#transient_key_field');
      if (transientKeyField.length) {
        transientKeyField.val(data.transientKey);
      } else {
        console.error('Hidden input field #transient_key_field not found.');
      }

      // Hide the spinner and show the buy button
      $('#buy-now-btn').show();
      $('#spinner').hide();

      // Load canvas
      canvasLoader(arrayData.data.rootUrl, arrayData.data.fileName);
    } else {
      console.error('Invalid data structure in response:', arrayData);
      alert('Invalid response data. Please try again.');
    }
  }

  // Function to handle error
  function handleError() {
    $('#spinner').hide();
    $('#stl-upload-message').html('An error occurred while uploading the file.');
  }

  // Function to update price
  function updatePrice(price) {
    $('#checkout-total-price').text(price);
    $('#checkout-total-price-modal').text(price);
  }

  // Function to build output tables
  function buildOutputTables(data, file) {
    var outputTable = `
    <table id="output">
      <tr><th>Price: </th><td><b>${data['price']}</b></td></tr>
      <tr><th>Material Volume: </th><td>${data['material_volume']}</td></tr>
      <tr><th>Support Material Volume: </th><td>${data['support_material']}</td></tr>
      <tr><th>Box Volume: </th><td>${data['box_volume']}</td></tr>
      <tr><th>Surface Area: </th><td>${data['total_surface_area']}</td></tr>
      <tr><th>Model Weight: </th><td>${data['total_grams']} Grams</td></tr>
      <tr><th>Model Dimensions (LxWxH): </th><td>${data['model_dimensions']}</td></tr>
      <tr><th>Number of Polygons: </th><td>${data['number_of_polygons']}</td></tr>
    </table>
  `;

    var outputTableNoPrice = outputTable.replace(/<tr><th>Price: <\/th><td><b>[^<]+<\/b><\/td><\/tr>/, '');
    var outputWithHeading = '<h2>Current Item Overview</h2>' + outputTableNoPrice;

    $('#stl-upload-message').html(outputTable);
    $('#modal-purchase-history').html(`
    ${outputTableNoPrice}
    <input type="file" value="${data['fileName']}" id="buy-file-send" name="buy-file-send" hidden>
  `);
    $('#stl-upload-message-tooltip').html(outputWithHeading).removeAttr('hidden');
  }

  // Event listener for file input change
  $('#stl-file').on('change', function (event) {
    initiateQueryData(event);
  });

  function displayPrintingTechnologyErrorMessage(message) {
    var data_printing_technology = $('#printing_technology').val();
    if (data_printing_technology && data_printing_technology != 0) {
      $('#printing-error-message').html('');
    } else {
      $('#printing-error-message').html(message);
    }
  }

  function displayMaterialErrorMessage(message) {
    var data_material = $('#material').val();
    if (data_material && data_material != 0) {
      $('#material-error-message').html('');
    } else {
      $('#material-error-message').html(message);
    }
  }

  function displayQualityErrorMessage(message) {
    var data_quality = $('#quality').val();
    if (data_quality && data_quality != 0) {
      $('#quality-error-message').html('');
    } else {
      $('#quality-error-message').html(message);
    }
  }

  function displayInfillErrorMessage(message) {
    var data_infill = $('#infill').val();
    if (data_infill !== '') {  // Check for non-empty value
      $('#infill-error-message').html('');
    } else {
      $('#infill-error-message').html(message);
    }
  }

  function displayColorErrorMessage(message) {
    var data_color = $('#color').val();
    if (data_color !== '') {  // Check for non-empty value
      $('#color-error-message').html('');
    } else {
      $('#color-error-message').html(message);
    }
  }

  function displayQuantityErrorMessage(message) {
    var data_quantity = $('#quantity').val();
    if (data_quantity !== '') {  // Check for non-empty value
      $('#quantity-error-message').html('');
    } else {
      $('#quantity-error-message').html(message);
    }
  }


  // Call checkRequiredFields when any of the form fields change
  $('#printing_technology').on('change', function () {
    initiateQueryData(event);
  });
  $('#material').on('change', function () {
    initiateQueryData(event);
  });
  $('#quality').on('change', function () {
    initiateQueryData(event);
  });
  $('#infill').on('change', function () {
    initiateQueryData(event);
  });
  $('#quantity').on('change', function () {
    initiateQueryData(event);
  });

  // Handle "Buy Now" button click to show the modal
  $('#buy-now-btn').on('click', function () {
    $('#buyNowModal').modal('show');
  });


  // Handle form submission inside the modal
  $('#submitPurchase').on('click', function () {
    var email = $('#inputEmail').val();
    var fileInput = $('#stl-file')[0].files[0];
    var tableData = $('#modal-purchase-history').html();

    var formData = new FormData();
    formData.append('action', 'send_purchase_emails');
    formData.append('email', email);
    formData.append('fileSend', fileInput);
    formData.append('tableData', tableData);

    // AJAX request to send email to admin
    $.ajax({
      url: ppc3d_stl_parser_3d.ajaxurl,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        // Close the modal
        $('#buyNowModal').modal('hide');

        // Show alert
        alert('Email sent successfully');
        // Handle success response
        console.log('Email sent successfully');
        // Optionally, display a success message or redirect the user
      },
      error: function (xhr, status, error) {
        // Handle error response
        console.error('Error sending email: ' + error);
      },
    });
  });

  createSelect();

  function createSelect() {
    $('select').each(function (index) {
      $(this).hide();
      wrapElement($(this), $('<div>'), index, $(this).attr('placeholder-text'));

      $(this)
        .find('option')
        .each(function () {
          // Custom tooltip icon
          var icon_tooltip = $('<i>', {
            class: 'fa fa-info-circle icon-tooltip',
          });

          // Custom tooltip
          var tooltip = $('<div>', {
            class: 'custom-tooltip',
            'data-description': $(this).attr('data-description'),
            style: 'display: none;',
          });

          var liElement = $('<li>', {
            class: 'select-dropdown__list-item',
            'data-value': $(this).val(),
            'data-description': $(this).attr('data-description'),
            text: $(this).text(),
          });
          ulElement.append(liElement);
          liElement.append(icon_tooltip); // Append tooltip icon to the wrapper
          liElement.append(tooltip); // Append tooltip to the wrapper
          tooltip.append($(this).attr('data-description'));

          liElement.on('click', function () {
            initiateQueryData(event);
            displyUl(this);
          });

          // Show tooltip on hover
          icon_tooltip.on('mouseenter', function () {
            var description = $(this).attr('data-description');
            tooltip.text(description);
            tooltip.show();
            // Positioning the tooltip relative to the active ul
            var iconPosition = icon_tooltip.offset();
            var iconWidth = icon_tooltip.outerWidth();
            var rightPosition = iconPosition.left + iconWidth;
            var topPosition = iconPosition.top;
            tooltip.css({
              position: 'absolute',
              left: rightPosition + 'px',
              top: topPosition + 'px',
            });
          });

          // Hide tooltip on mouse leave
          icon_tooltip.on('mouseleave', function () {
            tooltip.hide();
          });

          // Positioning the tooltip to the right of the parent
          icon_tooltip.css({
            position: 'absolute',
            right: '9px',
          });

          // Append tooltip to the body
          $('body').append(tooltip);
        });
    });
  }

  function wrapElement(el, wrapper, i, placeholder) {
    el.before(wrapper);
    wrapper.append(el);

    $(document).on('click', function (e) {
      let clickInside = wrapper.is(e.target) || wrapper.has(e.target).length;
      if (!clickInside) {
        let menu = wrapper.find('.select-dropdown__list');
        menu.removeClass('active');
      }
    });

    var buttonElement = $('<button>', {
      class: 'select-dropdown__button select-dropdown__button--' + i,
      'data-value': '',
      type: 'button',
    });
    var spanElement = $('<span>', {
      class: 'select-dropdown select-dropdown--' + i,
      text: placeholder,
    });
    var iElement = $('<i>', {
      class: 'zmdi zmdi-chevron-down',
    });
    ulElement = $('<ul>', {
      class: 'select-dropdown__list select-dropdown__list--' + i,
      id: 'select-dropdown__list-' + i,
    });

    wrapper.addClass('select-dropdown select-dropdown--' + i);
    wrapper.append(buttonElement);
    spanElement.append(iElement);
    buttonElement.append(spanElement);
    wrapper.append(ulElement);
  }

  function displyUl(element) {
    if ($(element).prop('tagName') == 'BUTTON') {
      selectDropdown = $(element).parent().find('ul');
      selectDropdown.toggleClass('active');
    } else if ($(element).prop('tagName') == 'LI') {
      var selectId = $(element).parent().parent().find('select').attr('id');
      selectElement(selectId, $(element).attr('data-value'));
      elementParentSpan = $(element).parent().parent().find('span');
      $(element).parent().toggleClass('active');
      elementParentSpan.text($(element).text());
      elementParentSpan.parent().attr('data-value', $(element).attr('data-value'));
    }
  }

  function selectElement(id, valueToSelect) {
    $('#' + id).val(valueToSelect);
  }

  $('.select-dropdown__button').on('click', function (e) {
    e.preventDefault();
    displyUl(this);
  });
});

const fileInput = document.getElementById('stl-file');
const selectionsDiv = document.querySelector('.form-selections-container');
const uploadStlFormRow = document.querySelector('#canvasColumn');

fileInput.addEventListener('change', function (event) {
  const selectedFiles = event.target.files;

  if (selectedFiles.length > 0) {
    selectionsDiv.style.display = 'flex';
    uploadStlFormRow.classList.remove('col-xl-9');
    uploadStlFormRow.classList.add('col-xl-7');
  } else {
    uploadStlFormRow.classList.remove('col-xl-7');
    uploadStlFormRow.classList.add('col-xl-9');
    selectionsDiv.style.display = 'none';
  }
});

// Set initial state on page load
document.addEventListener('DOMContentLoaded', function () {
  uploadStlFormRow.classList.add('col-xl-9');
  selectionsDiv.style.display = 'none';
});

function setElementValue(elementId, name) {
  const inputElement = document.getElementById(elementId);
  inputElement.value = name;

  inputElement.dispatchEvent(new Event('change'));

  setActiveButton(elementId, name);

  grayOutAccordionButton(elementId, name);
}

function setActiveButton(elementId, name) {
  const buttons = document.querySelectorAll(`.${elementId}-option`);
  const activeDescription = document.querySelector(`.${elementId}-active-description`);
  const hiddenNameInput = document.getElementById(`${elementId}_name`);
  const hiddenValueInput = document.getElementById(`${name}`);

  // Remove active class from all buttons
  buttons.forEach((button) => button.classList.remove('active'));

  // Find the selected button based on name
  const selectedButton = document.querySelector(`.${elementId}-option[data-name="${name}"]`);

  if (selectedButton) {
    // Add active class to the selected button
    selectedButton.classList.add('active');

    // Update description
    const description = selectedButton.getAttribute('data-description');
    if (activeDescription) {
      activeDescription.innerHTML = description;
    }

    // Update hidden inputs
    const dataName = selectedButton.getAttribute('data-name');
    const value = selectedButton.getAttribute('data-value');
    if (hiddenNameInput) {
      hiddenNameInput.value = dataName;
    }
    if (hiddenValueInput) {
      hiddenValueInput.value = value;
    }
  }
}


function grayOutAccordionButton(elementId, value) {
  const accordionButton = document.getElementById(`${elementId}-accordion-button`);

  if (!accordionButton) {
    console.error(`Accordion button with id '${elementId}-accordion-button' not found.`);
    return;
  }

  const svgImage =
    'url(\'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13" fill="none"%3E%3Cpath d="M1 8.5L4.5 12L15 1" stroke="%230D95B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/%3E%3C/svg%3E\')';

  if (value && value !== '') {
    accordionButton.classList.add('grayed-out');

    // Set background image to ::after pseudo-element
    accordionButton.style.setProperty('--after-background-image', svgImage);
  } else {
    accordionButton.classList.remove('grayed-out');

    // Remove background image from ::after pseudo-element
    accordionButton.style.removeProperty('--after-background-image');
  }
}

function setPrintingTechnology(name) {
  setElementValue('printing_technology', name);
}

function setMaterial(name) {
  setElementValue('material', name);
}

function setQuality(name) {
  setElementValue('quality', name);
}

function setInfill(name) {
  setElementValue('infill', name);
}

function setColor(name) {
  setElementValue('color', name);
}

function setQuantity() {
  const quantityInput = document.getElementById('quantity');

  if (quantityInput) {
    const value = quantityInput.value;

    // Call grayOutAccordionButton with elementId 'quantity' and the current value
    grayOutAccordionButton('quantity', value);
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const quantityInput = document.getElementById('quantity');
  const quantityDecrement = document.getElementById('quantityDecrement');
  const quantityIncrement = document.getElementById('quantityIncrement');

  // Decrement button click handler
  quantityDecrement.addEventListener('click', function () {
    const currentValue = parseInt(quantityInput.value) || 0;
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
      quantityInput.dispatchEvent(new Event('change')); // Trigger change event
    }
  });

  // Increment button click handler
  quantityIncrement.addEventListener('click', function () {
    const currentValue = parseInt(quantityInput.value) || 0;
    quantityInput.value = currentValue + 1;
    quantityInput.dispatchEvent(new Event('change')); // Trigger change event
  });
});

jQuery(document).ready(function ($) {
  $('#checkoutForm').on('submit', function (event) {
    event.preventDefault(); // Prevent the form from refreshing the page

    var formData = new FormData(this); // Create FormData object from the form

    $('#loadingSpinner').show();

    $.ajax({
      type: 'POST',
      url: '/wp-json/custom/v1/form_submission', // Adjust the endpoint URL as per your setup
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.success) {
          // Hide the buyNowModal
          $('#buyNowModal').modal('hide');
          $('#loadingSpinner').hide();

          // Show the modal with the order confirmation message
          $('#orderCode').text(response.data.orderNumber);
          $('#adminEmail')
            .text(response.data.adminEmail)
            .attr('href', 'mailto:' + response.data.adminEmail);
          ;

          $('#orderConfirmationModal').modal('show');
        } else {
          $('#formMessage').html('<p class="error">' + response.data.message + '</p>');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $('#loadingSpinner').hide();
        $('#formMessage').html('<p class="error">Error: ' + textStatus + '</p>');
        console.log('Error details:', errorThrown);
      },
    });
  });

  // Attach event handler to close button for orderConfirmationModal
  $('#orderConfirmationModal .close').on('click', function () {
    console.log('Order Confirmation close button clicked');
    $('#orderConfirmationModal').modal('hide');
  });

  // Attach event handler to close button for buyNowModal
  $('#buyNowModal .close').on('click', function () {
    console.log('Buy Now close button clicked');
    $('#buyNowModal').modal('hide');
  });
});
