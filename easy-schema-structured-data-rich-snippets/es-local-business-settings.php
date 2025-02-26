<!-- 'local business tab' -->
<div id="es_local_business_options" style="display: none;">
   <div class="tab">
      <div class="tab_intro_banner">
         <span class="tab_heading_span">Local Business Schema: Boost Your Google Local Ranking</span>
         <p class="tab_tagline">When people search for businesses on Google Search or maps, Google may display a prominent knowledge panel with details about a business that matched the query the user has searched for. When users search for a type of business on Google (for example, 'Plumber in Chicago' or 'Italian Restaurants London'), they may see a carousel of businesses that relate to the search query.</p>
      </div>
      <div class="local_split_informational_boxes">
         <div class="local_top_split_left">
              <div class="es_local_business_multistep_wrapper">
          <div class="es_local_multistep_form">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active" id="es_local_progress_step_one">Step 1</li>
                    <li class="inactive" id="es_local_progress_step_two">Step 2</li>
                    <li class="inactive" id="es_local_progress_step_three">Step 3</li>
                    <li class="inactive" id="es_local_progress_step_four">Step 4</li>
                    <li class="inactive" id="es_local_progress_step_five">Step 5</li>
                </ul>
              <div id="es_local_business_step_one" class="es_local_multistep_steps" style="display: block;">
                  <div class="local_business_settings_split_forms_wrapper">
               <table class="form-table local_multistep">
                  <tr>
                     <th class="th-subhead"><?php esc_html_e( 'Local Business Type', 'schema-set' );?></th>
                     <td>
                        <select class="local_select_type" name="local_business_type">
                           <option value="LocalBusiness" selected><?php esc_html_e( 'LocalBusiness', 'schema-set' );?></option>
                           <option value="AnimalShelter" selected><?php esc_html_e( 'AnimalShelter', 'schema-set' );?></option>
                           <option value="AutomotiveBusiness" selected><?php esc_html_e( 'AutomotiveBusiness', 'schema-set' );?></option>
                           <option value="ChildCare" selected><?php esc_html_e( 'ChildCare', 'schema-set' );?></option>
                           <option value="Dentist" selected><?php esc_html_e( 'Dentist', 'schema-set' );?></option>
                           <option value="DryCleaningOrLaundry" selected><?php esc_html_e( 'DryCleaningOrLaundry', 'schema-set' );?></option>
                           <option value="EmergencyService" selected><?php esc_html_e( 'EmergencyService', 'schema-set' );?></option>
                           <option value="EmploymentAgency" selected><?php esc_html_e( 'EmploymentAgency', 'schema-set' );?></option>
                           <option value="EntertainmentBusiness" selected><?php esc_html_e( 'EntertainmentBusiness', 'schema-set' );?></option>
                           <option value="FinancialService" selected><?php esc_html_e( 'FinancialService', 'schema-set' );?></option>
                           <option value="FoodEstablishment" selected><?php esc_html_e( 'FoodEstablishment', 'schema-set' );?></option>
                           <option value="GovernmentOffice" selected><?php esc_html_e( 'GovernmentOffice', 'schema-set' );?></option>
                           <option value="HealthAndBeautyBusiness" selected><?php esc_html_e( 'HealthAndBeautyBusiness', 'schema-set' );?></option>
                           <option value="HomeAndConstructionBusiness" selected><?php esc_html_e( 'HomeAndConstructionBusiness', 'schema-set' );?></option>
                           <option value="InternetCafe" selected><?php esc_html_e( 'InternetCafe', 'schema-set' );?></option>
                           <option value="LegalService" selected><?php esc_html_e( 'LegalService', 'schema-set' );?></option>
                           <option value="Library" selected><?php esc_html_e( 'Library', 'schema-set' );?></option>
                           <option value="LodgingBusiness" selected><?php esc_html_e( 'LodgingBusiness', 'schema-set' );?></option>
                           <option value="MedicalBusiness" selected><?php esc_html_e( 'MedicalBusiness', 'schema-set' );?></option>
                           <option value="ProfessionalService" selected><?php esc_html_e( 'ProfessionalService', 'schema-set' );?></option>
                           <option value="RadioStation" selected><?php esc_html_e( 'RadioStation', 'schema-set' );?></option>
                           <option value="RealEstateAgent" selected><?php esc_html_e( 'RealEstateAgent', 'schema-set' );?></option>
                           <option value="RecyclingCenter" selected><?php esc_html_e( 'RecyclingCenter', 'schema-set' );?></option>
                           <option value="SelfStorage" selected><?php esc_html_e( 'SelfStorage', 'schema-set' );?></option>
                           <option value="ShoppingCenter" selected><?php esc_html_e( 'ShoppingCenter', 'schema-set' );?></option>
                           <option value="SportsActivityLocation" selected><?php esc_html_e( 'SportsActivityLocation', 'schema-set' );?></option>
                           <option value="Store" selected><?php esc_html_e( 'Store', 'schema-set' );?></option>
                           <option value="TelevisionStation" selected><?php esc_html_e( 'TelevisionStation', 'schema-set' );?></option>
                           <option value="TouristInformationCenter" selected><?php esc_html_e( 'TouristInformationCenter', 'schema-set' );?></option>
                           <option value="TravelAgency" selected><?php esc_html_e( 'TravelAgency', 'schema-set' );?></option>
                           <option value="<?php echo esc_attr( $jsonschema_local_business_type ); ?>" selected><?php echo esc_attr( $jsonschema_local_business_type );?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e( 'Business Name', 'schema-set' ) ?></th>
                     <td><input type="text" name="local_business_name" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_name ); ?>" placeholder="<?php esc_attr_e('Enter your business name', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Business Image URL', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_image" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_image ); ?>" placeholder="<?php esc_attr_e('Enter your business image URL', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Business Logo URL', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_logo" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_logo ); ?>" placeholder="<?php esc_attr_e('Enter your business logo URL', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Website Address (URL)', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_url" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_url ); ?>" placeholder="<?php esc_attr_e('Enter your website URL', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Business Telephone Number', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_telephone" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_telephone ); ?>" placeholder="<?php esc_attr_e('Enter your business telephone number', 'schema-set')?>"></td>
                  </tr>
                  </table>
         </div>
              </div>
              <div id="es_local_business_step_two" class="es_local_multistep_steps" style="display: none;">
                  <table class="form-table local_multistep">
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Currencys Accepted', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_currency" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_currency ); ?>" placeholder="<?php esc_attr_e('Currencies seperated by comma (USD, GBP)', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Price Range', 'schema-set') ?>
                     <div class="help-tip prince_range">
                         <div class="help-tooltip-special-div">
                         <div class="container-price-range">
                              <span class="price-range-explain"><strong class="pricerange-strong">Price Range explained:</strong> The Schema type 'priceRange' lets Google know how expensive your products or services are to your customers. The Price range Schema allows Google to serve more relevant search results to users for certain search queries, for example when users search for 'Cheap Hotel' or 'Expensive Italian Restaraunt' they may be shown search results that are more relevant based on the price range Schema type.</span>
                              <span class="price-range-explain"><strong class="pricerange-strong">How to input price range:</strong> The price range schema should be in your local currency and accepts three different input types based on your business location:</span>
                              <span class="price-range-explain-usa">For a business in the USA it would be:</span>
                              <ul class="list-do-pr">
                                 <li><span class="dashicons dashicons-plus-alt"></span>For a business that offers low cost products / services: $</li>
                                 <li><span class="dashicons dashicons-plus-alt"></span>For a business that offers medium cost products / services: $$</li>
                                 <li><span class="dashicons dashicons-plus-alt"></span>For a business that offers high cost products / services: $$$</li>
                              </ul>
                        </div>
                        </div>
                     </div>
                     </th>
                     <td><input type="text" name="local_business_price" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_price ); ?>" placeholder="<?php esc_attr_e('Price range for example: $$', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Payment Methods', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_payment" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_payment ); ?>" placeholder="<?php esc_attr_e('Payment methods accepted (Cash, Credit Card)', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Business Description', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_description" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_description ); ?>" placeholder="<?php esc_attr_e('Enter a description of your business', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Business Legal Name', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_legal" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_legal ); ?>" placeholder="<?php esc_attr_e('Enter the legal trading name of your business', 'schema-set')?>"></td>
                  </tr>
               </table>
              </div>
              <div id="es_local_business_step_three" class="es_local_multistep_steps" style="display: none;">
               <table class="form-table local_multistep">
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Street', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_steet" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_street ); ?>" placeholder="<?php esc_attr_e('Street name and building no. of your business', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Town', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_town" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_town ); ?>" placeholder="<?php esc_attr_e('Enter the town of your business', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('City', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_city" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_city ); ?>" placeholder="<?php esc_attr_e('Enter the city of your business', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Zip / Postcode', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_zip" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_zip ); ?>" placeholder="<?php esc_attr_e('Zip code / post code of your business', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Country', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_country" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_country ); ?>" placeholder="<?php esc_attr_e('Enter the country of your business', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Latitude', 'schema-set') ?><div class="help-tip latitude"><p class="tooltip">Need help with getting your Latitude &amp; Longitude? Check out this guide by Google here: <a class="coord-link" href="<?php echo esc_url( 'https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=en' ); ?>" target="_blank">Get the coordinates of a place</a></p></div></th>
                     <td><input type="text" name="local_business_lat" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_lat ); ?>" placeholder="<?php esc_attr_e('Enter Latitude', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Longitude', 'schema-set') ?><div class="help-tip longitude"><p class="tooltip">Need help with getting your Latitude &amp; Longitude? Check out this guide by Google here: <a class="coord-link" href="<?php echo esc_url( 'https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=en' ); ?>" target="_blank">Get the coordinates of a place</a></p></div></th>
                     <td><input type="text" name="local_business_long" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_long ); ?>" placeholder="<?php esc_attr_e('Enter Longitude', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Google Map Link', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_map" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_map ); ?>" placeholder="<?php esc_attr_e('Google map link', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Areas Served', 'schema-set') ?></th>
                     <td><input type="text" name="local_business_area_served" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_area_served ); ?>" placeholder="<?php esc_attr_e('Areas served seperated by comma', 'schema-set')?>"></td>
                  </tr>
               </table>
              </div>
              <div id="es_local_business_step_four" class="es_local_multistep_steps" style="display: none;">
               <table class="form-table open-hours local_multistep">
                    <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Monday', 'schema-set') ?></th>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_opening_monday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_opening_monday ); ?>" placeholder="<?php esc_attr_e('Monday opening hours', 'schema-set')?>"></td>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_closing_monday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_closing_monday ); ?>" placeholder="<?php esc_attr_e('Monday closing hours', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Tuesday', 'schema-set') ?></th>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_opening_tuesday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_opening_tuesday ); ?>" placeholder="<?php esc_attr_e('Tuesday opening hours', 'schema-set')?>"></td>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_closing_tuesday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_closing_tuesday ); ?>" placeholder="<?php esc_attr_e('Tuesday closing hours', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Wednesday', 'schema-set') ?></th>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_opening_wednesday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_opening_wednesday ); ?>" placeholder="<?php esc_attr_e('Wednesday opening hours', 'schema-set')?>"></td>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_closing_wednesday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_closing_wednesday ); ?>" placeholder="<?php esc_attr_e('Wednesday closing hours', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Thursday', 'schema-set') ?></th>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_opening_thursday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_opening_thursday ); ?>" placeholder="<?php esc_attr_e('Thursday opening hours', 'schema-set')?>"></td>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_closing_thursday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_closing_thursday ); ?>" placeholder="<?php esc_attr_e('Thursday closing hours', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Friday', 'schema-set') ?></th>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_opening_friday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_opening_friday ); ?>" placeholder="<?php esc_attr_e('Friday opening hours', 'schema-set')?>"></td>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_closing_friday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_closing_friday ); ?>" placeholder="<?php esc_attr_e('Friday closing hours', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Saturday', 'schema-set') ?></th>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_opening_saturday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_opening_saturday ); ?>" placeholder="<?php esc_attr_e('Saturday opening hours', 'schema-set')?>"></td>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_closing_saturday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_closing_saturday ); ?>" placeholder="<?php esc_attr_e('Saturday closing hours', 'schema-set')?>"></td>
                  </tr>
                  <tr>
                     <th scope="row" class="th-subhead"><?php esc_html_e('Sunday', 'schema-set') ?></th>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_opening_sunday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_opening_sunday ); ?>" placeholder="<?php esc_attr_e('Sunday opening hours', 'schema-set')?>"></td>
                     <td class="es-local-business-hours-td"><input class="local_business_opening_hours" type="text" name="local_business_closing_sunday" style="width:100%;" value="<?php echo esc_attr( $jsonschema_local_business_closing_sunday ); ?>" placeholder="<?php esc_attr_e('Sunday closing hours', 'schema-set')?>"></td>
                  </tr>
               </table>
      </div>
      <div id="es_local_business_step_five" class="es_local_multistep_steps" style="display: none;">
          <div class="es_local_settings_sliders_wrapper">
                <table class="form-table">
         <tr class="tr_checkbox_slider">
            <th scope="row" class="local-schema-all-heading" style="width: 575px;"><?php esc_html_e('Activate local business Schema on all of your pages?', 'schema-set') ?></th>
            <td>
               <label class="switch" for="checkbox_local_display">
               <input type="checkbox" name="local_business_display_wide" id="checkbox_local_display" value="1" <?php checked( '1', esc_attr( get_option( 'local_business_display_wide' ) ) ); ?> />
               <div class="slider round"></div>
               <label>
            </td>
         </tr>
         <tr class="tr_checkbox_slider">
            <th scope="row" class="local-schema-shortcode-heading" style="width: 575px;"><?php esc_html_e('Display this Schema using the [local_schema] shortcode', 'schema-set') ?></th>
            <td>
               <label class="switch" for="checkbox_local_shortcode">
               <input type="checkbox" name="local_business_display_shortcode" id="checkbox_local_shortcode" value="1" <?php checked( '1', esc_attr( get_option( 'local_business_display_shortcode' ) ) ); ?> />
               <div class="slider round"></div>
               <label>
            </td>
         </tr>
      </table>
      </div>
      </div>
              </div>
              <div class="es_local_form_button_wrapper noselect">
                  <div id="es_local_form_before_button"><span class="noselect">Back</span></div>
                  <div id="es_local_form_after_button"><span class="noselect">Next</span></div>
              </div>
    </div>
         </div>
         <div class="local_schema_right_side_stacked_boxes">
         <div class="split-column-guides">
            <span class="inclusion-heading">What you should do</span>
            <ul class="list-do local_business_list">
               <li><span class="dashicons dashicons-yes"></span>Add all your business information</li>
               <li><span class="dashicons dashicons-yes"></span>Use accurate &amp; complete information</li>
               <li><span class="dashicons dashicons-yes"></span>Enter information matching the 'Google my business' profile for your business</li>
               <li><span class="dashicons dashicons-yes"></span>Test your Schema using the Rich Results Test</li>
            </ul>
         </div>
        <div class="split-column-guides">
            <span class="inclusion-heading">Local business structured data</span>
            <p class="local_under_tagline">Using Local business structured data (Schema), you can give Google the information they need to display your business prominently such as your opening hours, telephone number, location, and much more. Websites that use the correct local business schema markup will usually <strong class="local-business-intro-strong">rank significantly better</strong> within Google search locally than websites that lack structured data.</p>
         </div>
         </div>
      </div>
   </div>
</div>