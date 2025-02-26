<?php

define('ppc3d_file', __FILE__); // Define the plugin file constant

function ppc3d_stl_parser_admin_menu()
{
  add_menu_page(
    'STL Parser', // Page title
    'STL Parser', // Menu title
    'manage_options', // Capability
    'stl_parser_settings', // Menu slug
    'ppc3d_stl_parser_settings_page', // Callback function
    plugins_url('../images/fav-icon-dashboard.png', ppc3d_file) // Use the constant for the image path
  );
}
add_action('admin_menu', 'ppc3d_stl_parser_admin_menu');

// Callback function to display settings page
function ppc3d_stl_parser_settings_page()
{
?>
  <div class="wrap">
    <h1>STL Parser Settings</h1>
    <form method="post" action="options.php">
      <?php settings_fields('ppc3d_stl_parser_settings_group'); ?>
      <?php do_settings_sections('stl_parser_settings'); ?>
      <?php submit_button(); ?>
    </form>
  </div>
  <!-- Modal HTML -->
  <div id="printingTechnologyModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2 id="modalTitle">Add Printing Technology Option</h2>
      </div>
      <div class="spacer">
        <form method="post" action="options.php" id="printingTechnologyForm">
          <div class="option-row">
            <label>Option Name</label>
            <input type="text" id="printingTechnologyOption" name="printing_technology"
              placeholder="Enter a printing technology">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="printingTechnologyDescription" name="printing_technology_description"
              placeholder="Add description for option"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="number" id="printingTechnologyValue" name="printing_technology_value"
              placeholder="Add value for option">
          </div>
          <button id="confirmPrintingTechnologyOption" class="button" type="button">Save Changes</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal for Printig Option -->
  <div id="editPrintingTechnologyModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Edit Printing Technology Option</h2>
      </div>
      <div class="spacer">
        <form method="post" action="options.php" id="editPrintingTechnologyForm">
          <input type="hidden" id="edit_currentOptionId" name="material_id" value="" />
          <input type="hidden" id="edit_originalOptionName" value="" />
          <div class="option-row">
            <label>Option Name</label>
            <input type="text" id="edit_printingTechnologyOption" name="printing_technology"
              placeholder="Enter a printing technology">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="edit_printingTechnologyDescription" name="printing_technology_description"
              placeholder="Add description for option"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="number" id="edit_printingTechnologyValue" name="printing_technology_value"
              placeholder="Add value for option">
          </div>
          <button id="confirmEditPrintingTechnologyOption" class="button" type="button">Update Changes</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal HTML -->
  <div id="materialModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Add Material Option</h2>
      </div>
      <div class="spacer">
        <form method="post" action="options.php" id="materialForm">
          <div class="option-row">
            <label>Option Name</label>
            <input type="text" id="materialOption" name="material" placeholder="Enter a material type">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="materialDescription" name="material_description"
              placeholder="Add description for option"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="number" id="materialValue" name="material_value" placeholder="Add value for option">
          </div>
          <button id="confirmMaterialOption" class="button" type="button">Save Changes</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal for Material Option -->
  <div id="editMaterialModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Edit Material Option</h2>
      </div>
      <div class="spacer">
        <form method="post" action="options.php" id="editMaterialForm">
          <input type="hidden" id="edit_currentMaterialId" name="material_id" value="" />
          <input type="hidden" id="edit_originalMaterialName" value="" />
          <div class="option-row">
            <label>Option Name</label>
            <input type="text" id="edit_materialOption" name="material" placeholder="Enter a material option">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="edit_materialDescription" name="material_description"
              placeholder="Add description for option"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="number" id="edit_materialValue" name="material_value" placeholder="Add value for option">
          </div>
          <button id="confirmEditMaterialOption" class="button" type="button">Update Changes</button>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal HTML -->
  <div id="qualityModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Add Quality Option</h2>
      </div>
      <div class="spacer">
        <form method="post" action="options.php" id="qualityForm">
          <div class="option-row">
            <label>Option Name</label>
            <input type="text" id="qualityOption" name="quality" placeholder="Enter a quality type">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="qualityDescription" name="quality_description"
              placeholder="Add description for option"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="number" id="qualityValue" name="quality_value" placeholder="Add value for option">
          </div>
          <button id="confirmQualityOption" class="button" type="button">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Edit Quality Modal -->
  <div id="editQualityModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Edit Quality Option</h2>
      </div>
      <div class="spacer">
        <form id="editQualityForm">
          <input type="hidden" id="edit_currentOptionId" value="">
          <input type="hidden" id="edit_originalOptionName" value="">
          <div class="option-row">
            <label for="edit_qualityOption">Quality Option</label>
            <input type="text" id="edit_qualityOption" name="qualityOption" placeholder="Enter quality option" required>
          </div>
          <div class="description-row">
            <label for="edit_qualityDescription">Description</label>
            <textarea id="edit_qualityDescription" name="qualityDescription" placeholder="Add description for option"
              required></textarea>
          </div>
          <div class="option-row">
            <label for="edit_qualityValue">Value</label>
            <input type="number" id="edit_qualityValue" name="qualityValue" placeholder="Add value for option" step="0.01"
              required>
          </div>
          <button id="confirmEditQualityOption" class="button" type="button">Update Changes</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal HTML -->
  <div id="infillModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Add Infill Option</h2>
      </div>
      <div class="spacer">
        <form method="post" action="options.php" id="infillForm">
          <div class="option-row">
            <label>Option Name</label>
            <input type="text" id="infillOption" name="infill" placeholder="Enter a infill type">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="infillDescription" name="infill_description"
              placeholder="Add description for option"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="number" id="infillValue" name="infill_value" placeholder="Add value for option">
          </div>
          <button id="confirmInfillOption" class="button" type="button">Save Changes</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal for Infill Option -->
  <div id="editInfillModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Edit Infill Option</h2>
      </div>
      <div class="spacer">
        <form method="post" id="editInfillForm">
          <input type="hidden" id="edit_currentInfillId" name="infill_id" value="" />
          <input type="hidden" id="edit_originalInfillName" value="" />
          <div class="option-row">
            <label>Infill Name</label>
            <input type="text" id="edit_infillOption" name="infill_option" placeholder="Enter infill name">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="edit_infillDescription" name="infill_description" placeholder="Enter description"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="number" id="edit_infillValue" name="infill_value" placeholder="Enter infill value">
          </div>
          <button id="confirmEditInfillOption" class="button" type="button">Update Changes</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal HTML -->
  <div id="colorModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Add Color Option</h2>
      </div>
      <div class="spacer">
        <form method="post" action="options.php" id="colorForm">
          <div class="option-row">
            <label>Option Name</label>
            <input type="text" id="colorOption" name="color" placeholder="Enter a color type">
          </div>
          <!-- <div class="option-row">
                        <label>Color Picker</label>
                        <input type="color" id="colorPicker" name="color_picker">
                    </div> -->
          <div class="description-row">
            <label>Description</label>
            <textarea id="colorDescription" name="color_description" placeholder="Add description for option"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="text" id="colorValue" name="color_value" placeholder="Add value for option">
          </div>
          <button id="confirmColorOption" class="button" type="button">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Edit COlor MOdal -->
  <div id="editColorModal" class="modal">
    <div class="modal-content">
      <svg class="close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="heading-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 14V30M30 22H14" stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M42 22C42 10.9543 33.0456 2 22 2C10.9543 2 2 10.9543 2 22C2 33.0456 10.9543 42 22 42C33.0456 42 42 33.0456 42 22Z"
            stroke="#0D95B3" stroke-width="3" />
        </svg>
        <h2>Edit Color Option</h2>
      </div>
      <div class="spacer">
        <form id="editColorForm">
          <input type="hidden" id="edit_currentColorId" value="" />
          <input type="hidden" id="edit_originalColorName" value="" />
          <div class="option-row">
            <label>Color Name</label>
            <input type="text" id="edit_colorOption" placeholder="Enter a color name">
          </div>
          <div class="description-row">
            <label>Description</label>
            <textarea id="edit_colorDescription" placeholder="Add a description for the color"></textarea>
          </div>
          <div class="option-row">
            <label>Value</label>
            <input type="text" id="edit_colorValue" placeholder="Add a value for the color">
          </div>
          <button id="confirmEditColorOption" class="button" type="button">Update Changes</button>
        </form>
      </div>
    </div>
  </div>


  <?php
}

// Register and define settings
function ppc3d_stl_parser_register_settings()
{
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_stl_parser_cost_per_cc', 'floatval');
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_stl_parser_api_key', 'sanitize_text_field');
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_stl_parser_api_url', 'esc_url_raw');

  add_settings_section('stl_parser_settings_section', '', 'ppc3d_stl_parser_settings_section_callback', 'stl_parser_settings');

  // Add field for cost_per_cc
  add_settings_field('ppc3d_stl_parser_cost_per_cc_field', 'Cost per CC', 'ppc3d_stl_parser_cost_per_cc_field_callback', 'stl_parser_settings', 'stl_parser_settings_section');

  // Add field for API key
  add_settings_field('ppc3d_stl_parser_api_key_field', 'API Key', 'ppc3d_stl_parser_api_key_field_callback', 'stl_parser_settings', 'stl_parser_settings_section');

  // Add field for API URL
  add_settings_field('ppc3d_stl_parser_api_url_field', 'API URL', 'ppc3d_stl_parser_api_url_field_callback', 'stl_parser_settings', 'stl_parser_settings_section');

  // Register setting to enable/disable file upload section
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_show_file_upload_section', 'intval');

  // Add section for file upload settings
  add_settings_section('file_upload_settings_section', 'File Upload Settings', 'ppc3d_file_upload_settings_section_callback', 'stl_parser_settings');

  // Add fields for customizing options if file upload section is enabled
  add_settings_field('enable_technology_options_field', 'Printing Technology Options', 'ppc3d_enable_technology_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('printing_technology_options_field', '', 'ppc3d_printing_technology_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('enable_material_options_field', 'Material Options', 'ppc3d_enable_material_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('material_options_field', '', 'ppc3d_material_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('enable_quality_options_field', 'Quality Options', 'ppc3d_enable_quality_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('quality_options_field', '', 'ppc3d_quality_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('enable_infill_options_field', 'Infill Options', 'ppc3d_enable_infill_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('infill_options_field', '', 'ppc3d_infill_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('enable_color_options_field', 'Color Options', 'ppc3d_enable_color_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
  add_settings_field('color_options_field', '', 'ppc3d_color_options_field_callback', 'stl_parser_settings', 'file_upload_settings_section');
}
add_action('admin_init', 'ppc3d_stl_parser_register_settings');

// Section callback function
function ppc3d_stl_parser_settings_section_callback()
{
  echo '<p>Enter the cost per cubic centimeter for 3D printing.</p>';
}

// Field callback function for API key
function ppc3d_stl_parser_api_key_field_callback()
{
  $value = get_option('ppc3d_stl_parser_api_key');
  echo '<input type="text" name="ppc3d_stl_parser_api_key" value="' . esc_attr($value) . '" />';
}

// Field callback function for API URL
function ppc3d_stl_parser_api_url_field_callback()
{
  $value = get_option('ppc3d_stl_parser_api_url');
  echo '<input type="url" name="ppc3d_stl_parser_api_url" value="' . esc_attr($value) . '" />';
}

// Field callback function
function ppc3d_stl_parser_cost_per_cc_field_callback()
{
  $value = get_option('ppc3d_stl_parser_cost_per_cc');
  echo '<input type="number" step="0.01" name="ppc3d_stl_parser_cost_per_cc" value="' . esc_attr($value) . '" />';
}

// Section callback function for file upload settings
function ppc3d_file_upload_settings_section_callback()
{
  echo '<p>Configure options for the file upload section.</p>';
}

// Field callback function for printing technology options
function ppc3d_show_printing_technology_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_technology_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_printing_technology_options', array());
  ?>
    <div class="accordion" id="printingTechnologyAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="printingTechnologyHeading">
          <button id="printing_technology-accordion-button" class="accordion-button collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#printingTechnologyContent" aria-expanded="false"
            aria-controls="printingTechnologyContent">
            Printing Technology
          </button>
        </h2>
        <div id="printingTechnologyContent" class="accordion-collapse collapse" aria-labelledby="printingTechnologyHeading"
          data-bs-parent="#printingTechnologyAccordion">
          <div class="accordion-body">
            <p class="printing_technology-active-description"></p>
            <div class="option-selection">
              <?php foreach ($saved_options as $option => $value) : ?>
                <button type="button" class="printing_technology-option button-options"
                  data-name="<?php echo esc_attr($option); ?>" data-value="<?php echo esc_attr($value['value']); ?>"
                  data-description="<?php echo esc_attr($value['description']); ?>"
                  onclick="setPrintingTechnology('<?php echo esc_attr($option); ?>')">
                  <?php echo esc_attr($option); ?>
                </button>
              <?php endforeach; ?>
            </div>
            <input value="<?php echo esc_attr($option); ?>" name="printing_technology_name" id="printing_technology_name"
              aria-label="Selected Printing Technology Name" hidden>
            <input value="<?php echo esc_attr($value['value']); ?>" name="printing_technology" id="printing_technology"
              aria-label="Selected Printing Technology" hidden>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
}

function ppc3d_printing_technology_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_technology_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_printing_technology_options', array());
  ?>
    <div id="printing-technology-container">
      <table id="optionstable">
        <tr>
          <th class="th-option-name">Option Name</th>
          <th>Description</th>
          <th class="th-value">Value</th>
          <th class="th-action">Action</th>
        </tr>
        <?php foreach ($saved_options as $option => $value) : ?>
          <tr>
            <td>
              <input type="text" name="printing_technology[]" value="<?php echo esc_attr($option); ?>" hidden>
              <?php echo esc_attr($option); ?>
            </td>
            <td>
              <textarea name="printing_technology_description[]"
                hidden><?php echo esc_attr($value['description']); ?></textarea>
              <?php echo esc_attr($value['description']); ?>
            </td>
            <td>
              <input type="number" name="printing_technology_value[]" value="<?php echo esc_attr($value['value']); ?>" hidden>
              <?php echo esc_attr($value['value']); ?>
            </td>
            <td class="action-column">
              <div class="actions">
                <button type="button" class="edit-option">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.8124 2.85849L12.0388 1.54434C12.7163 0.818554 13.8146 0.818554 14.492 1.54434C15.1693 2.27012 15.1693 3.44685 14.492 4.17264L13.2654 5.48679M10.8124 2.85849L3.60771 10.5778C2.69307 11.5577 2.23573 12.0477 1.92433 12.6448C1.61291 13.2419 1.2996 14.6518 1 16C2.25833 15.679 3.57425 15.3433 4.13153 15.0096C4.68882 14.676 5.14614 14.186 6.06079 13.2061L13.2654 5.48679M10.8124 2.85849L13.2654 5.48679"
                      stroke="#0D95B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 18H14" stroke="#0D95B3" stroke-width="2" stroke-linecap="round" />
                  </svg>
                </button>
                <button type="button" class="remove-option">Delete</button>
                <!-- <button type="button" class="edit-option">Edit</button> -->
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <button type="button" id="add-printing-technology-option" class="admin-add-option-btn">Add Option</button>

    </div>

  <?php
  }
}

function ppc3d_validate_option($option, $value, $description, $is_color = false)
{
  if (empty($option)) {
    return 'Invalid input: The option cannot be empty.';
  }

  if (empty($description)) {
    return 'Invalid input: The description cannot be empty.';
  }

  if ($is_color) {
    // Validate color format (hexadecimal color code)
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $value)) {
      return 'Invalid input: The color value must be in the format #000000.';
    }
  } elseif ($value <= 0) {
    return 'Invalid input: The value must be greater than 0.';
  }

  return null; // Return null if no errors
}

function ppc3d_add_printing_technology_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }

  // Ensure the required fields are set
  if (isset($_POST['printing_technology'], $_POST['printing_technology_value'], $_POST['printing_technology_description'])) {
    $option = sanitize_text_field(wp_unslash($_POST['printing_technology']));
    $value = floatval($_POST['printing_technology_value']);
    $description = sanitize_text_field(wp_unslash($_POST['printing_technology_description']));

    // Validate input
    $error_message = ppc3d_validate_option($option, $value, $description);
    if ($error_message) {
      wp_send_json_error($error_message);
      wp_die();
    }

    // Save the option
    $saved_options = get_option('ppc3d_printing_technology_options', array());

    // Check for duplicate name
    if (isset($saved_options[$option])) {
      wp_send_json_error('An option with this name already exists.');
      wp_die();
    }

    $saved_options[$option] = array(
      'name' => $option,
      'value' => $value,
      'description' => $description
    );
    update_option('ppc3d_printing_technology_options', $saved_options);

    wp_send_json_success('Printing technology option added successfully.');
  } else {
    wp_send_json_error('Invalid request.');
  }

  wp_die(); // This is required to terminate immediately and return a proper response
}
add_action('wp_ajax_add_printing_technology_option', 'ppc3d_add_printing_technology_option_callback');



//Callback Function for Printing Technnology Option
function ppc3d_edit_printing_technology_option_callback()
{
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    wp_send_json_error('Nonce verification failed.');
    wp_die();
  }

  // Validate required fields
  $required_fields = ['option_id', 'original_name', 'printing_technology', 'printing_technology_value', 'printing_technology_description'];
  foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
      wp_send_json_error("Missing required field: $field");
      wp_die();
    }
  }

  $old_option_id = sanitize_text_field(wp_unslash($_POST['option_id']));
  $original_name = sanitize_text_field(wp_unslash($_POST['original_name']));
  $new_option = sanitize_text_field(wp_unslash($_POST['printing_technology']));
  $new_value = floatval($_POST['printing_technology_value']);
  $new_description = sanitize_text_field(wp_unslash($_POST['printing_technology_description']));

  // Get existing options
  $saved_options = get_option('ppc3d_printing_technology_options', array());

  // Check if original option exists
  if (!isset($saved_options[$original_name])) {
    wp_send_json_error('Original option not found.');
    wp_die();
  }

  // Handle name change
  if ($original_name !== $new_option) {
    // Check if new name already exists (except for the current option)
    if (isset($saved_options[$new_option])) {
      wp_send_json_error('An option with this name already exists.');
      wp_die();
    }

    // Create new entry with new name
    $saved_options[$new_option] = [
      'name' => $new_option,
      'value' => $new_value,
      'description' => $new_description
    ];

    // Remove old entry
    unset($saved_options[$original_name]);
  } else {
    // Just update the existing entry
    $saved_options[$original_name] = [
      'name' => $new_option,
      'value' => $new_value,
      'description' => $new_description
    ];
  }

  // Save updated options
  if (update_option('ppc3d_printing_technology_options', $saved_options)) {
    wp_send_json_success([
      'message' => 'Option updated successfully',
      'new_name' => $new_option,
      'new_value' => $new_value,
      'new_description' => $new_description
    ]);
  } else {
    wp_send_json_error('Failed to update option.');
  }

  wp_die();
}
add_action('wp_ajax_edit_printing_technology_option', 'ppc3d_edit_printing_technology_option_callback');

// Callback function to delete printing technology option
function ppc3d_delete_printing_technology_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  if (isset($_POST['optionName'])) {
    $optionName = sanitize_text_field(wp_unslash($_POST['optionName']));

    // Get current printing technology options
    $printingTechnologyOptions = get_option('ppc3d_printing_technology_options', array());

    // Check if the option exists
    if (isset($printingTechnologyOptions[$optionName])) {
      // Remove the option
      unset($printingTechnologyOptions[$optionName]);
      update_option('ppc3d_printing_technology_options', $printingTechnologyOptions);

      // Return success response
      wp_send_json_success();
    } else {
      // Return error response if the option does not exist
      wp_send_json_error('Printing technology option does not exist.');
    }
  } else {
    // Return error response if option name is not provided
    wp_send_json_error('Option name not provided.');
  }
}
add_action('wp_ajax_delete_printing_technology_option', 'ppc3d_delete_printing_technology_option_callback');

// Field callback function for material options
function ppc3d_show_material_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_material_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_material_options', array());
  ?>
    <div class="accordion" id="materialAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="materialHeading">
          <button id="material-accordion-button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#materialContent" aria-expanded="false" aria-controls="materialContent">
            Material
          </button>
        </h2>
        <div id="materialContent" class="accordion-collapse collapse" aria-labelledby="materialHeading"
          data-bs-parent="#materialAccordion">
          <div class="accordion-body">
            <p class="material-active-description"></p>
            <div class="option-selection">
              <?php foreach ($saved_options as $option => $value) : ?>
                <button type="button" class="material-option button-options" data-name="<?php echo esc_attr($option); ?>"
                  data-value="<?php echo esc_attr($value['value']); ?>"
                  data-description="<?php echo esc_attr($value['description']); ?>"
                  onclick="setMaterial('<?php echo esc_attr($option); ?>')">
                  <?php echo esc_attr($option); ?>
                </button>
              <?php endforeach; ?>
            </div>
            <input value="<?php echo esc_attr($option); ?>" name="material_name" id="material_name"
              aria-label="Selected Material Name" hidden>
            <input value="<?php echo esc_attr($value['value']); ?>" name="material" id="material"
              aria-label="Selected Material" hidden>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
}

function ppc3d_material_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_material_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_material_options', array());
  ?>
    <div id="material-options-container">
      <table id="optionstable">
        <tr>
          <th class="th-option-name">Option Name</th>
          <th>Description</th>
          <th class="th-value">Value</th>
          <th class="th-action">Action</th>
        </tr>
        <?php foreach ($saved_options as $option => $value) : ?>
          <tr>
            <td>
              <input type="text" name="material_options[]" value="<?php echo esc_attr($option); ?>" hidden>
              <?php echo esc_attr($option); ?>
            </td>
            <td>
              <textarea name="material_options_description[]" hidden><?php echo esc_attr($value['description']); ?></textarea>
              <?php echo esc_attr($value['description']); ?>
            </td>
            <td>
              <input type="number" name="material_options_value[]" value="<?php echo esc_attr($value['value']); ?>" hidden>
              <?php echo esc_attr($value['value']); ?>
            </td>
            <td class="action-column">
              <div class="actions">
                <button type="button" class="edit-option">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.8124 2.85849L12.0388 1.54434C12.7163 0.818554 13.8146 0.818554 14.492 1.54434C15.1693 2.27012 15.1693 3.44685 14.492 4.17264L13.2654 5.48679M10.8124 2.85849L3.60771 10.5778C2.69307 11.5577 2.23573 12.0477 1.92433 12.6448C1.61291 13.2419 1.2996 14.6518 1 16C2.25833 15.679 3.57425 15.3433 4.13153 15.0096C4.68882 14.676 5.14614 14.186 6.06079 13.2061L13.2654 5.48679M10.8124 2.85849L13.2654 5.48679"
                      stroke="#0D95B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 18H14" stroke="#0D95B3" stroke-width="2" stroke-linecap="round" />
                  </svg>
                </button>
                <button type="button" class="remove-option">Delete</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <button type="button" id="add-material-option" class="admin-add-option-btn">Add Option</button>
    </div>
  <?php
  }
}

function ppc3d_add_material_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  // Ensure the required fields are set
  if (isset($_POST['material'], $_POST['material_value'], $_POST['material_description'])) {
    $option = sanitize_text_field(wp_unslash($_POST['material']));
    $value = floatval($_POST['material_value']);
    $description = sanitize_text_field(wp_unslash($_POST['material_description']));

    // Validate input
    $error_message = ppc3d_validate_option($option, $value, $description);
    if ($error_message) {
      wp_send_json_error($error_message);
      wp_die();
    }

    // Save the option
    $saved_options = get_option('ppc3d_material_options', array());

    if (isset($saved_options[$option])) {
      wp_send_json_error('An option with this name already exists.');
      wp_die();
    }

    $saved_options[$option] = array(
      'name' => $option,
      'value' => $value,
      'description' => $description
    );
    update_option('ppc3d_material_options', $saved_options);

    wp_send_json_success('Material option added successfully.');
  } else {
    wp_send_json_error('Invalid request.');
  }

  wp_die(); // This is required to terminate immediately and return a proper response
}
add_action('wp_ajax_add_material_option', 'ppc3d_add_material_option_callback');


function ppc3d_edit_material_option_callback()
{
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    wp_send_json_error('Nonce verification failed.');
    wp_die();
  }

  // Validate required fields
  $required_fields = ['option_id', 'original_name', 'material', 'material_value', 'material_description'];
  foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
      wp_send_json_error("Missing required field: $field");
      wp_die();
    }
  }

  // Sanitize and prepare input data
  $old_option_id = sanitize_text_field(wp_unslash($_POST['option_id']));
  $original_name = sanitize_text_field(wp_unslash($_POST['original_name']));
  $new_option = sanitize_text_field(wp_unslash($_POST['material']));
  $new_value = floatval($_POST['material_value']);
  $new_description = sanitize_text_field(wp_unslash($_POST['material_description']));

  // Get existing options
  $saved_options = get_option('ppc3d_material_options', array());

  // Check if original option exists
  if (!isset($saved_options[$original_name])) {
    wp_send_json_error('Original option not found.');
    wp_die();
  }

  // Handle name change
  if ($original_name !== $new_option) {
    // Check if new name already exists (except for the current option)
    if (isset($saved_options[$new_option])) {
      wp_send_json_error('An option with this name already exists.');
      wp_die();
    }

    // Create new entry with new name
    $saved_options[$new_option] = [
      'name' => $new_option,
      'value' => $new_value,
      'description' => $new_description
    ];

    // Remove old entry
    unset($saved_options[$original_name]);
  } else {
    // Just update the existing entry
    $saved_options[$original_name] = [
      'name' => $new_option,
      'value' => $new_value,
      'description' => $new_description
    ];
  }

  // Save updated options
  if (update_option('ppc3d_material_options', $saved_options)) {
    wp_send_json_success([
      'message' => 'Material option updated successfully',
      'new_name' => $new_option,
      'new_value' => $new_value,
      'new_description' => $new_description
    ]);
  } else {
    wp_send_json_error('Failed to update material option.');
  }

  wp_die();
}
add_action('wp_ajax_edit_material_option', 'ppc3d_edit_material_option_callback');

// Callback function to delete material option
function ppc3d_delete_material_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  if (isset($_POST['optionName'])) {
    $optionName = sanitize_text_field(wp_unslash($_POST['optionName']));

    // Get current material options
    $materialOptions = get_option('ppc3d_material_options', array());

    // Check if the option exists
    if (isset($materialOptions[$optionName])) {
      // Remove the option
      unset($materialOptions[$optionName]);
      update_option('ppc3d_material_options', $materialOptions);

      // Return success response
      wp_send_json_success();
    } else {
      // Return error response if the option does not exist
      wp_send_json_error('Material option does not exist.');
    }
  } else {
    // Return error response if option name is not provided
    wp_send_json_error('Option name not provided.');
  }
}
add_action('wp_ajax_delete_material_option', 'ppc3d_delete_material_option_callback');

// Field callback function for quality options
function ppc3d_show_quality_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_quality_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_quality_options', array());
  ?>
    <div class="accordion" id="qualityAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="qualityHeading">
          <button id="quality-accordion-button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#qualityContent" aria-expanded="false" aria-controls="qualityContent">
            Quality
          </button>
        </h2>
        <div id="qualityContent" class="accordion-collapse collapse" aria-labelledby="qualityHeading"
          data-bs-parent="#qualityAccordion">
          <div class="accordion-body">
            <p class="quality-active-description"></p>
            <div class="option-selection">
              <?php foreach ($saved_options as $option => $value) : ?>
                <button type="button" class="quality-option button-options" data-name="<?php echo esc_attr($option); ?>"
                  data-value="<?php echo esc_attr($value['value']); ?>"
                  data-description="<?php echo esc_attr($value['description']); ?>"
                  onclick="setQuality('<?php echo esc_attr($option); ?>')">
                  <?php echo esc_attr($option); ?>
                </button>
              <?php endforeach; ?>
            </div>
            <input value="<?php echo esc_attr($option); ?>" name="quality_name" id="quality_name"
              aria-label="Selected Quality Name" hidden>
            <input value="<?php echo esc_attr($value['value']); ?>" name="quality" id="quality"
              aria-label="Selected quality" hidden>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
}
function ppc3d_quality_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_quality_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_quality_options', array());
  ?>
    <div id="quality-options-container">
      <table id="optionstable">
        <tr>
          <th class="th-option-name">Option Name</th>
          <th>Description</th>
          <th class="th-value">Value</th>
          <th class="th-action">Action</th>
        </tr>
        <?php foreach ($saved_options as $option => $value) : ?>
          <tr>
            <td>
              <input type="text" name="quality_options[]" value="<?php echo esc_attr($option); ?>" hidden>
              <?php echo esc_attr($option); ?>
            </td>
            <td>
              <textarea name="quality_options_description[]" hidden><?php echo esc_attr($value['description']); ?></textarea>
              <?php echo esc_attr($value['description']); ?>
            </td>
            <td>
              <input type="number" name="quality_options_value[]" value="<?php echo esc_attr($value['value']); ?>" hidden>
              <?php echo esc_attr($value['value']); ?>
            </td>
            <td class="action-column">
              <div class="actions">
                <button type="button" class="edit-option">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.8124 2.85849L12.0388 1.54434C12.7163 0.818554 13.8146 0.818554 14.492 1.54434C15.1693 2.27012 15.1693 3.44685 14.492 4.17264L13.2654 5.48679M10.8124 2.85849L3.60771 10.5778C2.69307 11.5577 2.23573 12.0477 1.92433 12.6448C1.61291 13.2419 1.2996 14.6518 1 16C2.25833 15.679 3.57425 15.3433 4.13153 15.0096C4.68882 14.676 5.14614 14.186 6.06079 13.2061L13.2654 5.48679M10.8124 2.85849L13.2654 5.48679"
                      stroke="#0D95B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 18H14" stroke="#0D95B3" stroke-width="2" stroke-linecap="round" />
                  </svg>
                </button>
                <button type="button" class="remove-option">Delete</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <button type="button" id="add-quality-option" class="admin-add-option-btn">Add Quality Option</button>
    </div>
  <?php
  }
}

function ppc3d_add_quality_option_callback()
{
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    wp_send_json_error('Nonce verification failed.');
    wp_die();
  }

  // Check if required fields are set
  if (!isset($_POST['quality'], $_POST['quality_value'], $_POST['quality_description'])) {
    wp_send_json_error('Invalid request: Missing required fields.');
    wp_die();
  }

  $option = sanitize_text_field(wp_unslash($_POST['quality']));
  $value = floatval($_POST['quality_value']);
  $description = sanitize_text_field(wp_unslash($_POST['quality_description']));

  // Validate input
  $error_message = ppc3d_validate_option($option, $value, $description);
  if ($error_message) {
    wp_send_json_error($error_message);
    wp_die();
  }

  // Save the option
  $saved_options = get_option('ppc3d_quality_options', array());

  if (isset($saved_options[$option])) {
    wp_send_json_error('An option with this name already exists.');
    wp_die();
  }

  $saved_options[$option] = array(
    'name' => $option,
    'value' => $value,
    'description' => $description
  );
  update_option('ppc3d_quality_options', $saved_options);

  wp_send_json_success('Quality option added successfully.');
  wp_die();
}
add_action('wp_ajax_add_quality_option', 'ppc3d_add_quality_option_callback');


function ppc3d_edit_quality_option_callback()
{
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    wp_send_json_error('Nonce verification failed.');
    wp_die();
  }

  // Validate required fields
  $required_fields = ['option_id', 'original_name', 'quality', 'quality_value', 'quality_description'];
  foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
      wp_send_json_error("Missing required field: $field");
      wp_die();
    }
  }

  $old_option_id = sanitize_text_field(wp_unslash($_POST['option_id']));
  $original_name = sanitize_text_field(wp_unslash($_POST['original_name']));
  $new_option = sanitize_text_field(wp_unslash($_POST['quality']));
  $new_value = floatval($_POST['quality_value']);
  $new_description = sanitize_text_field(wp_unslash($_POST['quality_description']));

  // Get existing options
  $saved_options = get_option('ppc3d_quality_options', array());

  // Check if original option exists
  if (!isset($saved_options[$original_name])) {
    wp_send_json_error('Original option not found.');
    wp_die();
  }

  // Handle name change
  if ($original_name !== $new_option) {
    // Check if new name already exists (except for the current option)
    if (isset($saved_options[$new_option])) {
      wp_send_json_error('An option with this name already exists.');
      wp_die();
    }

    // Create new entry with new name
    $saved_options[$new_option] = [
      'name' => $new_option,
      'value' => $new_value,
      'description' => $new_description
    ];

    // Remove old entry
    unset($saved_options[$original_name]);
  } else {
    // Just update the existing entry
    $saved_options[$original_name] = [
      'name' => $new_option,
      'value' => $new_value,
      'description' => $new_description
    ];
  }

  // Save updated options
  if (update_option('ppc3d_quality_options', $saved_options)) {
    wp_send_json_success([
      'message' => 'Option updated successfully',
      'new_name' => $new_option,
      'new_value' => $new_value,
      'new_description' => $new_description
    ]);
  } else {
    wp_send_json_error('Failed to update option.');
  }

  wp_die();
}
add_action('wp_ajax_edit_quality_option', 'ppc3d_edit_quality_option_callback');

// Callback function to delete quality option
function ppc3d_delete_quality_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  if (isset($_POST['optionName'])) {
    $optionName = sanitize_text_field(wp_unslash($_POST['optionName']));

    // Get current quality options
    $qualityOptions = get_option('ppc3d_quality_options', array());

    // Check if the option exists
    if (isset($qualityOptions[$optionName])) {
      // Remove the option
      unset($qualityOptions[$optionName]);
      update_option('ppc3d_quality_options', $qualityOptions);

      // Return success response
      wp_send_json_success();
    } else {
      // Return error response if the option does not exist
      wp_send_json_error('Quality option does not exist.');
    }
  } else {
    // Return error response if option name is not provided
    wp_send_json_error('Option name not provided.');
  }
}
add_action('wp_ajax_delete_quality_option', 'ppc3d_delete_quality_option_callback');

// Field callback function for infill options
function ppc3d_show_infill_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_infill_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_infill_options', array());
  ?>
    <div class="accordion" id="infillAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="infillHeading">
          <button id="infill-accordion-button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#infillContent" aria-expanded="false" aria-controls="infillContent">
            Infill
          </button>
        </h2>
        <div id="infillContent" class="accordion-collapse collapse" aria-labelledby="infillHeading"
          data-bs-parent="#infillAccordion">
          <div class="accordion-body">
            <p class="infill-active-description"></p>
            <div class="option-selection">
              <?php foreach ($saved_options as $option => $value) : ?>
                <button type="button" class="infill-option button-options" data-name="<?php echo esc_attr($option); ?>"
                  data-value="<?php echo esc_attr($value['value']); ?>"
                  data-description="<?php echo esc_attr($value['description']); ?>"
                  onclick="setInfill('<?php echo esc_attr($option); ?>')">
                  <?php echo esc_attr($option); ?>
                </button>
              <?php endforeach; ?>
            </div>
            <input value="<?php echo esc_attr($option); ?>" name="infill_name" id="infill_name"
              aria-label="Selected Infill Name" hidden>
            <input value="<?php echo esc_attr($value['value']); ?>" name="infill" id="infill" aria-label="Selected Infill"
              hidden>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
}
function ppc3d_infill_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_infill_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_infill_options', array());
  ?>
    <div id="infill-container">
      <table id="optionstable">
        <tr>
          <th class="th-option-name">Option Name</th>
          <th>Description</th>
          <th class="th-value">Value</th>
          <th class="th-action">Action</th>
        </tr>
        <?php foreach ($saved_options as $option => $value) : ?>
          <tr>
            <td>
              <input type="text" name="infill[]" value="<?php echo esc_attr($option); ?>" hidden>
              <?php echo esc_attr($option); ?>
            </td>
            <td>
              <textarea name="infill_description[]" hidden><?php echo esc_attr($value['description']); ?></textarea>
              <?php echo esc_attr($value['description']); ?>
            </td>
            <td>
              <input type="number" name="infill_value[]" value="<?php echo esc_attr($value['value']); ?>" hidden>
              <?php echo esc_attr($value['value']); ?>
            </td>
            <td class="action-column">
              <div class="actions">
                <button type="button" class="edit-option">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.8124 2.85849L12.0388 1.54434C12.7163 0.818554 13.8146 0.818554 14.492 1.54434C15.1693 2.27012 15.1693 3.44685 14.492 4.17264L13.2654 5.48679M10.8124 2.85849L3.60771 10.5778C2.69307 11.5577 2.23573 12.0477 1.92433 12.6448C1.61291 13.2419 1.2996 14.6518 1 16C2.25833 15.679 3.57425 15.3433 4.13153 15.0096C4.68882 14.676 5.14614 14.186 6.06079 13.2061L13.2654 5.48679M10.8124 2.85849L13.2654 5.48679"
                      stroke="#0D95B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 18H14" stroke="#0D95B3" stroke-width="2" stroke-linecap="round" />
                  </svg>
                </button>
                <button type="button" class="remove-option">Delete</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <button type="button" id="add-infill-option" class="admin-add-option-btn">Add Infill Option</button>
    </div>

  <?php
  }
}

function ppc3d_add_infill_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  // Check if required fields are set
  if (!isset($_POST['infill'], $_POST['infill_value'], $_POST['infill_description'])) {
    wp_send_json_error('Invalid request: Missing required fields.');
    wp_die();
  }

  $option = sanitize_text_field(wp_unslash($_POST['infill']));
  $value = floatval($_POST['infill_value']);
  $description = sanitize_text_field(wp_unslash($_POST['infill_description']));

  // Validate input
  $error_message = ppc3d_validate_option($option, $value, $description);
  if ($error_message) {
    wp_send_json_error($error_message);
    wp_die();
  }

  // Save the option
  $saved_options = get_option('ppc3d_infill_options', array());

  if (isset($saved_options[$option])) {
    wp_send_json_error('An option with this name already exists.');
    wp_die();
  }

  $saved_options[$option] = array(
    'name' => $option,
    'value' => $value,
    'description' => $description
  );
  update_option('ppc3d_infill_options', $saved_options);

  // Return success response
  wp_send_json_success('Infill option added successfully.');
  wp_die();
}
add_action('wp_ajax_add_infill_option', 'ppc3d_add_infill_option_callback');


//edit infill

function ppc3d_edit_infill_option_callback()
{
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    wp_send_json_error('Nonce verification failed.');
    wp_die();
  }

  // Validate required fields
  $required_fields = ['infill_id', 'original_name', 'infill', 'infill_value', 'infill_description'];
  foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
      wp_send_json_error("Missing required field: $field");
      wp_die();
    }
  }

  $old_infill_id = sanitize_text_field(wp_unslash($_POST['infill_id']));
  $original_name = sanitize_text_field(wp_unslash($_POST['original_name']));
  $new_infill = sanitize_text_field(wp_unslash($_POST['infill']));
  $new_value = floatval($_POST['infill_value']);
  $new_description = sanitize_text_field(wp_unslash($_POST['infill_description']));

  // Retrieve and update options
  $saved_options = get_option('ppc3d_infill_options', array());

  if (!isset($saved_options[$original_name])) {
    wp_send_json_error('Original option not found.');
    wp_die();
  }

  if ($original_name !== $new_infill) {
    if (isset($saved_options[$new_infill])) {
      wp_send_json_error('An option with this name already exists.');
      wp_die();
    }

    $saved_options[$new_infill] = [
      'value' => $new_value,
      'description' => $new_description
    ];
    unset($saved_options[$original_name]);
  } else {
    $saved_options[$original_name] = [
      'value' => $new_value,
      'description' => $new_description
    ];
  }

  if (update_option('ppc3d_infill_options', $saved_options)) {
    wp_send_json_success('Option updated successfully.');
  } else {
    wp_send_json_error('Failed to update option.');
  }

  wp_die();
}
add_action('wp_ajax_edit_infill_option', 'ppc3d_edit_infill_option_callback');


// Callback function to delete infill option
function ppc3d_delete_infill_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  if (isset($_POST['optionName'])) {
    $optionName = sanitize_text_field(wp_unslash($_POST['optionName']));

    // Get current infill options
    $infillOptions = get_option('ppc3d_infill_options', array());

    // Check if the option exists
    if (isset($infillOptions[$optionName])) {
      // Remove the option
      unset($infillOptions[$optionName]);
      update_option('ppc3d_infill_options', $infillOptions);

      // Return success response
      wp_send_json_success();
    } else {
      // Return error response if the option does not exist
      wp_send_json_error('Infill option does not exist.');
    }
  } else {
    // Return error response if option name is not provided
    wp_send_json_error('Option name not provided.');
  }
}
add_action('wp_ajax_delete_infill_option', 'ppc3d_delete_infill_option_callback');

// Field callback function for color options
function ppc3d_show_color_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_color_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_color_options', array());
  ?>
    <div class="accordion" id="colorAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="colorHeading">
          <button id="color-accordion-button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#colorContent" aria-expanded="false" aria-controls="colorContent">
            Color
          </button>
        </h2>
        <div id="colorContent" class="accordion-collapse collapse" aria-labelledby="colorHeading"
          data-bs-parent="#colorAccordion">
          <div class="accordion-body">
            <p class="color-active-description"></p>
            <div class="option-selection">
              <?php foreach ($saved_options as $option => $value) : ?>
                <button style="background-color: <?php echo esc_attr($value['value']) ?>" type="button" class="color-option"
                  data-name="<?php echo esc_attr($option); ?>" data-value="<?php echo esc_attr($value['value']); ?>"
                  data-description="<?php echo esc_attr($value['description']); ?>"
                  onclick="setColor('<?php echo esc_attr($option); ?>')">
                </button>
              <?php endforeach; ?>
            </div>
            <input value="<?php echo esc_attr($option); ?>" name="color_name" id="color_name"
              aria-label="Selected Color Name" hidden>
            <input value="<?php echo esc_attr($value['value']); ?>" name="color" id="color" aria-label="Selected color"
              hidden>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
}
function ppc3d_color_options_field_callback()
{
  $enabled = get_option('ppc3d_enable_color_options', 0);
  if ($enabled) {
    $saved_options = get_option('ppc3d_color_options', array());
  ?>
    <div id="color-container">
      <table id="optionstable">
        <tr>
          <th class="th-option-name">Option Name</th>
          <th>Description</th>
          <th class="th-value">Value</th>
          <th class="th-action">Action</th>
        </tr>
        <?php foreach ($saved_options as $option => $value) : ?>
          <tr>
            <td>
              <input type="text" name="color[]" value="<?php echo esc_attr($option); ?>" hidden>
              <?php echo esc_attr($option); ?>
            </td>
            <td>
              <textarea name="color_description[]" hidden><?php echo esc_attr($value['description']); ?></textarea>
              <?php echo esc_attr($value['description']); ?>
            </td>
            <td>
              <input type="text" name="color_value[]" value="<?php echo esc_attr($value['value']); ?>" hidden>
              <?php echo esc_attr($value['value']); ?>
            </td>
            <td class="action-column">
              <div class="actions">
                <button type="button" class="edit-option">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.8124 2.85849L12.0388 1.54434C12.7163 0.818554 13.8146 0.818554 14.492 1.54434C15.1693 2.27012 15.1693 3.44685 14.492 4.17264L13.2654 5.48679M10.8124 2.85849L3.60771 10.5778C2.69307 11.5577 2.23573 12.0477 1.92433 12.6448C1.61291 13.2419 1.2996 14.6518 1 16C2.25833 15.679 3.57425 15.3433 4.13153 15.0096C4.68882 14.676 5.14614 14.186 6.06079 13.2061L13.2654 5.48679M10.8124 2.85849L13.2654 5.48679"
                      stroke="#0D95B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 18H14" stroke="#0D95B3" stroke-width="2" stroke-linecap="round" />
                  </svg>
                </button>
                <button type="button" class="remove-option">Delete</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <button type="button" id="add-color-option" class="admin-add-option-btn">Add Color Option</button>
    </div>

  <?php
  }
}

function ppc3d_add_color_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  // Check if required fields are set
  if (!isset($_POST['color'], $_POST['color_value'], $_POST['color_description'])) {
    wp_send_json_error('Invalid request: Missing required fields.');
    wp_die();
  }

  $option = sanitize_text_field(wp_unslash($_POST['color']));
  $value = sanitize_text_field(wp_unslash($_POST['color_value']));
  $description = sanitize_text_field(wp_unslash($_POST['color_description']));

  // Validate input for color option
  $error_message = ppc3d_validate_option($option, $value, $description, true);
  if ($error_message) {
    wp_send_json_error($error_message);
    wp_die();
  }

  // Save the option
  $saved_options = get_option('ppc3d_color_options', array());

  if (isset($saved_options[$option])) {
    wp_send_json_error('An option with this name already exists.');
    wp_die();
  }

  $saved_options[$option] = array(
    'name' => $option,
    'value' => $value,
    'description' => $description
  );
  update_option('ppc3d_color_options', $saved_options);

  // Return success response
  wp_send_json_success('Color option added successfully.');
  wp_die();
}
add_action('wp_ajax_add_color_option', 'ppc3d_add_color_option_callback');

//Color ni siya
function ppc3d_edit_color_option_callback()
{
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    wp_send_json_error('Nonce verification failed.');
    wp_die();
  }

  // Validate required fields
  $required_fields = ['color_id', 'original_name', 'color', 'color_value', 'color_description'];
  foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
      wp_send_json_error("Missing required field: $field");
      wp_die();
    }
  }

  $colorId = sanitize_text_field(wp_unslash($_POST['color_id']));
  $originalName = sanitize_text_field(wp_unslash($_POST['original_name']));
  $newColor = sanitize_text_field(wp_unslash($_POST['color']));
  $newValue = sanitize_text_field(wp_unslash($_POST['color_value']));
  $newDescription = sanitize_text_field(wp_unslash($_POST['color_description']));

  // Get existing options
  $saved_options = get_option('ppc3d_color_options', []);

  // Handle name change
  if ($originalName !== $newColor) {
    if (isset($saved_options[$newColor])) {
      wp_send_json_error('A color with this name already exists.');
      wp_die();
    }

    // Create new entry with new name
    $saved_options[$newColor] = [
      'value' => $newValue,
      'description' => $newDescription,
    ];

    // Remove old entry
    unset($saved_options[$originalName]);
  } else {
    // Update existing entry
    $saved_options[$originalName] = [
      'value' => $newValue,
      'description' => $newDescription,
    ];
  }

  // Save updated options
  if (update_option('ppc3d_color_options', $saved_options)) {
    wp_send_json_success([
      'message' => 'Color option updated successfully.',
      'new_name' => $newColor,
      'new_value' => $newValue,
      'new_description' => $newDescription,
    ]);
  } else {
    wp_send_json_error('Failed to update color option.');
  }

  wp_die();
}
add_action('wp_ajax_edit_color_option', 'ppc3d_edit_color_option_callback');



// Callback function to delete color option
function ppc3d_delete_color_option_callback()
{
  // Verify nonce
  if (! isset($_POST['nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ppc3d_upload_stl_nonce')) {
    // Nonce verification failed
    wp_die('Nonce verification failed. Please refresh the page and try again.');
  }
  if (isset($_POST['optionName'])) {
    $optionName = sanitize_text_field(wp_unslash($_POST['optionName']));

    // Get current color options
    $colorOptions = get_option('ppc3d_color_options', array());

    // Check if the option exists
    if (isset($colorOptions[$optionName])) {
      // Remove the option
      unset($colorOptions[$optionName]);
      update_option('ppc3d_color_options', $colorOptions);

      // Return success response
      wp_send_json_success();
    } else {
      // Return error response if the option does not exist
      wp_send_json_error('Color option does not exist.');
    }
  } else {
    // Return error response if option name is not provided
    wp_send_json_error('Option name not provided.');
  }
}
add_action('wp_ajax_delete_color_option', 'ppc3d_delete_color_option_callback');

function ppc3d_enable_technology_options_field_callback()
{
  $value = get_option('ppc3d_enable_technology_options', 0);
  ?>
  <div class="toggle-switch">
    <input type="checkbox" id="toggle-switch" name="ppc3d_enable_technology_options" value="1"
      <?php checked(1, $value); ?> />
    <label for="toggle-switch"></label>
  </div>
<?php
}

function ppc3d_enable_material_options_field_callback()
{
  $value = get_option('ppc3d_enable_material_options', 0);
?>
  <div class="toggle-switch">
    <input type="checkbox" id="material-toggle-switch" name="ppc3d_enable_material_options" value="1"
      <?php checked(1, $value); ?> />
    <label for="material-toggle-switch"></label>
  </div>
<?php
}

function ppc3d_enable_quality_options_field_callback()
{
  $value = get_option('ppc3d_enable_quality_options', 0);
?>
  <div class="toggle-switch">
    <input type="checkbox" id="quality-toggle-switch" name="ppc3d_enable_quality_options" value="1"
      <?php checked(1, $value); ?> />
    <label for="quality-toggle-switch"></label>==
  </div>
<?php
}

function ppc3d_enable_infill_options_field_callback()
{
  $value = get_option('ppc3d_enable_infill_options', 0);
?>
  <div class="toggle-switch">
    <input type="checkbox" id="infill-toggle-switch" name="ppc3d_enable_infill_options" value="1"
      <?php checked(1, $value); ?> />
    <label for="infill-toggle-switch"></label>
  </div>
<?php
}


function ppc3d_enable_color_options_field_callback()
{
  $value = get_option('ppc3d_enable_color_options', 0);
?>
  <div class="toggle-switch">
    <input type="checkbox" id="color-toggle-switch" name="ppc3d_enable_color_options" value="1"
      <?php checked(1, $value); ?> />
    <label for="color-toggle-switch"></label>
  </div>
<?php
}


// Register a setting to save the value of the toggle switch
function ppc3d_register_enable_technology_options_setting()
{
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_enable_technology_options', 'intval');
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_enable_material_options', 'intval');
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_enable_quality_options', 'intval');
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_enable_infill_options', 'intval');
  register_setting('ppc3d_stl_parser_settings_group', 'ppc3d_enable_color_options', 'intval');
}
add_action('admin_init', 'ppc3d_register_enable_technology_options_setting');
