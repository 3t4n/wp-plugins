<div id="es_logo_options" style="display: none;">
   <div class="tab">
       <div class="tab_intro_banner">
      <span class="tab_heading_span">Logo Schema Markup</span>
      <p class="tab_tagline">Specify the image Google Search should use for your organization's logo in the Search results &amp; the Google knowledge panel. Letting Google know which image to use for your logo ensures that when possible, the image appears in the search results about the company. Adding logo Schema markup is a <strong>strong signal</strong> for Google Search to display the image in knowledge panels &amp; when people search for your business.</p>
      </div>
      <div class="logo_split_informational_boxes">
      <div class="logo_top_split_left">
          <div class="es_logo_form_wrapper">
          <h3 class="logo_schema_title">Logo schema settings</h3>
          <div class="es_logo_form">
      <table class="form-table">
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Website URL:', 'schema-set') ?></th>
            <td><input type="text" name="logo_schema_url" style="width:100%;" value="<?php echo esc_attr( $logo_schema_url ); ?>" placeholder="<?php esc_attr_e('Enter your website url', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Image URL:', 'schema-set') ?></th>
            <td><input type="text" name="logo_schema_image" style="width:100%;" value="<?php echo esc_attr( $logo_schema_image ); ?>" placeholder="<?php esc_attr_e('Enter your company image url', 'schema-set')?>"></td>
         </tr>
      </table>
      </div>
      </div>
      <div class="logo_display_options">
      <table class="form-table">
         <h3 class="opening-hours-title">Display Options</h3>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Activate Logo Schema?', 'schema-set') ?></th>
            <td>
                <label class="switch" for="checkbox_logo_activate">
                    <input type="checkbox" name="logo_schema_active" id="checkbox_logo_activate" value="1" <?php checked( '1', esc_attr( get_option( 'logo_schema_active' ) ) ); ?> />
                    <div class="slider round"></div>
                <label>
            </td>
         </tr>
      </table>
      </div>
      </div>
      <div class="logo-split-column-guides">
         <div class="column-child-guides">
            <span class="inclusion-heading">What you should do:</span>
            <ul class="list-do">
               <li><span class="dashicons dashicons-yes"></span>Use the same logo as displayed on your website</li>
               <li><span class="dashicons dashicons-yes"></span>Test your Schema using the Rich Results Test</li>
            </ul>
         </div>
      </div>
      </div>
   </div>
</div>