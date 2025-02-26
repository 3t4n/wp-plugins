<div id="six-storage-move-in-short-code" class="six-storage-grid-container-root six-storage-grid-p0 six-storage-online-root-class">
    <?php echo do_shortcode("[six_storage_online_storage_discount_slider]"); ?>
    <?php
        use SixStorageOnline\Base\Six_Storage_SettingsKeys;
        $obj = new Six_Storage_SettingsKeys(); 
    ?>

        <?php
            if(function_exists('pll_get_post')){
         $rentnowUrl_page =  get_permalink(pll_get_post(get_option('six_storage_rent_now_page_id')));
        }else{
            $rentnowUrl_page = get_permalink(get_option('six_storage_rent_now_page_id'));
        }
        ?>
    <style>
        .six-storage-btnPromocode{
            background-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
        }
        .six-storage-rentsingleUnit{
            background-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color));?> !important;
        }

        .six-storage-aligntext {
            background-color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        #six-storage-discount_carousel {
            background-color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        .six-storage-primary-background-color {
            background-color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        .six-storage-secondary-background-color {
            background-color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }

        .six-storage-primary-color {
            color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        .six-storage-secondary-color {
            color: <?php echo esc_html(get_option($obj->six_storage_online_text_color));
            ?> !important;
        }

        /* dropdown text-color secondary */
        .six-storage-dropdown-content li>a,
        .six-storage-dropdown-content li>span {
            color: <?php echo esc_html(get_option($obj->six_storage_online_text_color));
            ?> !important;
        }

        /* Date-picker secondary */
        .six-storage-datepicker-date-display {
            background-color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }

        /*Date-picker date-selected color */
        .six-storage-datepicker-table td.six-storage-is-selected {
            background-color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }

        /*Date-picker buttons-color */
        .six-storage-datepicker-cancel,
        .six-storage-datepicker-clear,
        .six-storage-datepicker-today,
        .six-storage-datepicker-done {
            color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }

        #six-storage-sign {
            color: <?php echo esc_html(get_option($obj->six_storage_online_text_color));
            ?> !important;
        }

        .six-storage-modal-footer-text {
            color: <?php echo esc_html(get_option($obj->six_storage_online_text_color));
            ?> !important;
        }

        .six-storage-primary-border-bottom-color {
            border-bottom-color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        .six-storage-secondary-border-bottom-color {
            border-bottom-color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }

        .six-storage-primary-border-left-color {
            border-left-color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        .six-storage-secondary-border-left-color {
            border-left-color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }

        .six-storage-primary-border-color {
            border-color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
            color: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        .six-storage-secondary-border-color {
            border-color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
            color: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }

        .six-storage-primary-background {
            background: <?php echo esc_html(get_option($obj->six_storage_online_primary_color));
            ?> !important;
        }

        .six-storage-secondary-background {
            background: <?php echo esc_html(get_option($obj->six_storage_online_secondary_color));
            ?> !important;
        }
    </style>

<div id ="six-storage-location-list-container">

<div id = "six-storage-location-search-icons">

</div>

<div id ="six-storage-no-locations-show"></div>
</div>

<div class="six-storage-row cc" data-url="<?php echo esc_attr($rentnowUrl_page) ?>"  id ="six-storage-location-list-row-container">
</div>
</div>
    <div  id="six-storage-loading-container" style="display: none"></div>
    <div id="six-storage-moveIn-page-one-load-container" style="display:none;">
        <div class="six-storage-grid-container six-storage-grid-xs-p0 six-storage-grid-p0" id="six-storage-movein-container">
            <?php 
                if (function_exists('pll_get_post')) {
                    $thankyou_translated_Page = get_permalink(pll_get_post(get_option('six_storage_thankyou_page_id')));
                    echo "<input type='hidden' id='six-storage-dashboard-url' value=". esc_attr($thankyou_translated_Page).">";
                } else{
                    $thankyou_url = get_permalink(get_option('six_storage_thankyou_page_id'));
                    echo "<input type='hidden' id='six-storage-dashboard-url' value=".esc_attr($thankyou_url).">";
                }
            ?>
            <div id="six-storage-unit-lists" class="six-storage-grid-w-100 six-storage-overflow-x-hidden six-storage-overflow-y-scroll six-storage-custom-scroller six-storage-hide-native-scrollbar six-storage-scroll-hide" style="display:none;">
                <div class="six-storage-row cc">
                    <div class="six-storage-col six-storage-l12 six-storage-s12">
                        <h5 class="six-storage-fs-title cc six-storage-grid-mt20 six-storage-grid-mb-30 six-storage-text-center">
                            <!--Rent Now--><?php $rentNowBeftextTrans= get_option('six_storage_online_fs_rent_now_custom_word'); $rentNowTransTxt = esc_html_e($rentNowBeftextTrans,'6storage-rentals'); echo esc_html("$rentNowTransTxt") ?>
                        </h5>
                        <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-secondary-border-bottom-color">
                        <?php 
                            $sixStorageMoveinFlowNote = get_option('six-storage-moveinnote');
                            $sixStorageStoragedetails = get_option('six_storage_online_storage_details'); 
                            $sixStorageAddonsdetails = get_option('six_storage_online_addons_details'); 
                            $sixStorageTenantdetails = get_option('six_storage_online_tenant_details'); 
                            $six_storage_online_payment_details = get_option('six_storage_online_payment_details');
                            $sixStorageToggleVal =  get_option('six_storage_online_move_in_flow_note_toggle'); 
                          
                        ?>
    
                            <p class= "six-storage-text-center six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-text-white six-storage-move-in-flow-note-msg six-storage-align-items-center" ><?php $sixStorageToggleVal == '1' ? esc_html_e($sixStorageMoveinFlowNote,'6storage-rentals') : ''?></p>
            
                    </div>
                </div>
                <div class="six-storage-row cc six-storage-header-action-wrapper six-storage-white six-storage-grid-m10 six-storage-z-index-2 six-storage-grid-p10" id="six-storage-top-container-buttons" style="display: none;">
                    <div class="six-storage-col six-storage-l6 six-storage-m12 six-storage-s12">
                        <div id="six-storage-selected-units-contianer" class="six-storage-grid-d-flex six-storage-flex-wrap"></div>
                    </div>
                    <div class="six-storage-col six-storage-l6 six-storage-m12 six-storage-s12">
                        <div class="six-storage-btn-action-container six-storage-grid-w-100 six-storage-grid-d-flex six-storage-justify-content-end" id="six-storage-rent-now-container" style="display: none;">
                            <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mr10" id="six-storage-reserve-now" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_reservation_toggle") == true || get_option("six_storage_online_fc_reservation_toggle") == 1) ? "" : "none") ?>;">
                                <!--Reserve Now--><?php esc_html_e('Reserve Now','6storage-rentals'); ?>
                            </button>
                            <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mr10" id="six-storage-rent-now" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_rent_now_toggle") == true || get_option("six_storage_online_fc_rent_now_toggle") == 1) ? "" : "none") ?>;">
                                <!--Rent Now--><?php esc_html_e('Rent Now','6storage-rentals'); ?>
                            </button>
                            <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mr10" id="six-storage-enquiry" onclick="sixStorageNewEnquiryModal(this)" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_enquiry_toggle") == true || get_option("six_storage_online_fc_enquiry_toggle") == 1) ? "" : "none") ?>;">
                                <?php esc_html_e('Inquire','6storage-rentals'); ?>
                            </button>
                            <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-btn" onclick="sixStorageGridToggle(this)" style="display:none;"id="six-storage-grid-list">
                                <!--Grid--> <?php esc_html_e('Grid','6storage-rentals'); ?>
                            </button>
                        </div>
                        <div style="display: none;" id="six-storage-rent-now-err" class="six-storage-invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="six-storage-row cc six-storage-grid-mb0" <?php if(get_option($obj->six_storage_online_fc_location_toggle) == '0' && get_option($obj->six_storage_online_fc_building_toggle) == '0' && get_option($obj->six_storage_online_fc_unit_type_toggle) == '0'
                    &&  get_option($obj->six_storage_online_fc_unit_size_filter_toggle) == '0' && get_option($obj->six_storage_online_fc_sort_by_toggle) == '0' && get_option($obj->six_storage_online_fc_amenity_toggle) == '0' && get_option($obj->six_storage_online_fc_business_user_toggle) == '0' && get_option($obj->six_storage_online_fc_moveindate_toggle) == '0' && get_option($obj->six_storage_online_fc_storage_category_toggle) == '0'){ echo esc_attr('style="display:none;"'); } ?> >
                    <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-grid-mt10 six-storage-grid-xs-p0 six-storage-s12 six-storage-grid-p10">
                    <?php
                            $filterClass;
                            if(get_option($obj->six_storage_online_fc_location_toggle) == '0' && get_option($obj->six_storage_online_fc_building_toggle) == '0' && get_option($obj->six_storage_online_fc_unit_type_toggle) == '0'&&  get_option($obj->six_storage_online_fc_unit_size_filter_toggle) == '0' && get_option($obj->six_storage_online_fc_sort_by_toggle) == '0' && get_option($obj->six_storage_online_fc_amenity_toggle) == '0' && get_option($obj->six_storage_online_fc_price_range_toggle) == '0' && get_option("six_storage_online_fc_storage_category_toggle") == 1){
                                $filterClass ='six-storage-col six-storage-s12 six-storage-l2 cc applyfilterbutton';

                            }else {
                                $filterClass ='six-storage-col six-storage-s12 six-storage-l3 cc applyfilterbutton';
                            }
                           
                        ?>
                        <div class="six-storage-grid-pt30 six-storage-grid-p30 six-storage-leftsidebar six-storage-grey six-storage-lighten-4 six-storage-grid-d-flex six-storage-flex-column" id="six-storage-movein-form-container">
                            <form id='six-storage-template-ajax-url' class="six-storage-border-none six-storage-grid-shadow-none six-storage-grid-p0 cc six-storage-grid-position-sticky six-storage-z-index-1" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>" data-group_sizes="<?php echo esc_attr($this->six_storage_groupUnitsSizes) ?>" data-rent_single_unit="<?php echo esc_attr(get_option("six_storage_online_rent_single_unit")) ?>" data-inclusive_of_tax="<?php echo esc_attr($this->six_storage_groupUnitsSizes) ?>">
                                
                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" <?php if(get_option($obj->six_storage_online_fc_moveindate_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                    <i class="six-storage-material-icons notranslate six-storage-dateicon-append six-storage-grey-text">date_range</i>
                                    <input class="cc" id="six-storage-dtmoveindate" type="text" placeholder=""
                                        readonly="readonly">
                                    <label class="cc" for="six-storage-dtmoveindate">
                                        <!--Choose your move in date--><?php esc_html_e('Choose your move in date','6storage-rentals'); ?>
                                    </label>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-dvTenantType" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_business_user_toggle") == true || get_option("six_storage_online_fc_business_user_toggle") == 1) ? "" : "none") ?>;">
                                    <select class="cc" id="six-storage-tenant_type" data-settings_name="IsBusinessUser">
                                    <option value="" disabled selected><!--Select Tenant Type--><?php esc_html_e('Select Tenant Type','6storage-rentals'); ?></option>
                                        <option value="true"><!--Business User--><?php esc_html_e('Business User','6storage-rentals'); ?></option>
                                        <option value="false"><!--Personal User--><?php esc_html_e('Personal User','6storage-rentals'); ?></option>
                                    </select>
                                    <label for="six-storage-tenant_type cc"><?php esc_html_e('Choose your Tenant Type','6storage-rentals'); ?></label>
                                    <div style="display: none;" id="six-storage-tenantType-err" class="six-storage-invalid-feedback"><?php esc_html_e('Please Select Tenant Type','6storage-rentals'); ?></div>
                                </div>

                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-storage-type-input" style="display:<?php echo esc_attr((get_option("six_storage_online_fc_storage_category_toggle") == true || get_option("six_storage_online_fc_storage_category_toggle") == 1) ? "" : "none") ?>;">

                                    <select class="cc" id="six-storage-storage-type">
                                        
                                    </select>
                                    <label for="six-storage-storage-type cc"><!--Choose your Storage Type--> <?php esc_html_e('Choose your Storage Category','6storage-rentals'); ?></label>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-dvLocation" style="display:<?php echo esc_attr((get_option("six_storage_online_fc_location_toggle") == true || get_option("six_storage_online_fc_location_toggle") == 1) ? "" : "none") ?>;">
                                    <select class="cc" id="six-storage-location">
                                        <!-- <option value="" disabled selected>Select Location</option>  -->
                                    </select>
                                    <label for="six-storage-location cc"><!--Choose your Location--> <?php esc_html_e('Choose your Location','6storage-rentals'); ?><span class="six-storage-text-danger">*</span></label>
                                    <div style="display: none;" id="six-storage-tenantLocation-err" class="six-storage-invalid-feedback"><?php esc_html_e('Please Select Location','6storage-rentals'); ?></div>
                                </div>  
                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-dvBuilding" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_building_toggle") == true || get_option("six_storage_online_fc_building_toggle") == 1) ? "" : "none") ?>;">
                                    <select class="cc" id="six-storage-building">
                                        <option disabled selected value=""><!--Select Building--><?php esc_html_e('Select Building','6storage-rentals'); ?></option>
                                    </select>
                                    <label for="six-storage-building cc"><!--Choose your Building--><?php esc_html_e('Choose your Building','6storage-rentals'); ?></label>
                                </div>

                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-dvUnitType" style="display:<?php echo esc_attr((get_option("six_storage_online_fc_group_the_unit_based_on_size_toggle") == 0 && get_option("six_storage_online_fc_unit_type_toggle") == 1) ? "" : "none") ?>;">
                                    <select class="cc" id="six-storage-unit-type" name="unitType">
                                        <option disabled selected value=""><!--Select Unit Type--><?php esc_html_e('Select Unit Type','6storage-rentals'); ?></option>
                                    </select>
                                    <label for="six-storage-unit-type cc"><!--Choose your Unit Type--><?php esc_html_e('Choose your Unit Type','6storage-rentals'); ?></label>
                                    
                                </div>

                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-unit-type-dimensionsdv" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_group_the_unit_based_on_size_toggle") == 0 && get_option("six_storage_online_fc_unit_size_filter_toggle") == 1) ? "" : "none") ?>;">
                                    <select class="cc" id="six-storage-unit-type-dimensions" name="unitTypeDimensions" >
                                        <option value="" disabled selected><?php esc_html_e('Please Select','6storage-rentals'); ?></option>
                                    </select>
                                    <label for="six-storage-unit-type-dimensions cc"><?php esc_html_e('Choose Unit Type Dimensions','6storage-rentals'); ?></label>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-price-range-div" 
                                
                                <?php if(get_option($obj->six_storage_online_fc_price_range_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                
                                    <label class="cc six-storage-active" id="six-storage-pricerange-label"><?php esc_html_e('Price Range','6storage-rentals'); ?></label>
                                    <div id="six-storage-range-slider">
                                        <span class="slider-range-value"></span>
                                    </div>
                                    <span><?php esc_html_e('Min:','6storage-rentals'); ?>&nbsp;<span id="six-storage-price-min"></span></span>
                                    <span style="float:right;"><?php esc_html_e('Max:','6storage-rentals'); ?>&nbsp;<span id="six-storage-price-max"></span></span>
                                </div>

                                <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-amenity"style="display: <?php echo esc_attr((get_option("six_storage_online_fc_amenity_toggle") == true || get_option("six_storage_online_fc_amenity_toggle") == 1) ? "" : "none") ?>;">
                                    <select class="cc" id="six-storage-amenitytype"> 
                                        <option disabled selected value="" ><!--Select Amenity--><?php esc_html_e('Select Amenity','6storage-rentals'); ?></option>
                                    </select>
                                    <label for="six-storage-amenitytype cc"><?php esc_html_e('Choose the Amenity','6storage-rentals'); ?></label>
                                </div>

                                <div class="six-storage-col six-storage-s12 six-storage-l3 cc" id="six-storage-multiple-sorting" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_sort_by_toggle") == true || get_option("six_storage_online_fc_sort_by_toggle") == 1) ? "" : "none") ?>;"> 
                                    <div class="six-storage-input-field six-storage-col six-storage-s12 six-storage-l12 cc" style="display: <?php echo esc_attr((get_option("six_storage_online_fc_sort_by_toggle") == true || get_option("six_storage_online_fc_sort_by_toggle") == 1) ? "" : "none") ?>;"> 
                                    <select class="cc" id="six-storage-sorting">
                                            <option value="" selected disabled> <?php esc_html_e('Select Sort By','6storage-rentals'); ?> </option>
                                            <option value="UnitSize"> <?php esc_html_e('Unit Size','6storage-rentals'); ?> </option>
                                            <option value="UnitPrice"> <?php esc_html_e('Unit Price','6storage-rentals'); ?></option>
                                            <?php $six_storage_unitnumber = esc_attr__('Unit Number','6storage-rentals'); 
                                             echo (get_option("six_storage_online_fc_group_the_unit_based_on_size_toggle") == 0) ? "<option value='UnitNumber'>$six_storage_unitnumber</option>" : ""?>
                                        </select>
                                        <label for="six-storage-sorting cc"><?php esc_html_e('Sort By','6storage-rentals'); ?></label>
                                    </div>
                                    <span class="six-storage-tooltipped six-storage-sort-icon" data-sortvalue="Ascending" data-position="right" data-tooltip="<?php esc_html_e('Ascending','6storage-rentals'); ?>" id="six-storage-sort-icon" style="cursor:pointer;"><i id="six-storage-sort-icon-itag" style="transform: rotate(180deg);" class="six-storage-material-icons cc" >sort</i></span>
                                </div>
                                <div class ="<?php echo esc_attr($filterClass);?> six-storage-disabled" style = "display:none;" id = "sixStorageApplyfilterbutton">
                                    <span class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mr10" id="six-storage-applyfilter" style="display:inline-block">
                                        <!--Reserve Now--><?php esc_html_e('Apply filter','6storage-rentals'); ?>
                                    </span>
                                </div>                
                        </div>
                        <div class="six-storage-d-none">
                             <!--Reserve test--><?php esc_html_e('Reserve test','6storage-rentals'); ?>
                            <h4 class="six-storage-text-white cc" id="six-storage-bufferTimeDescription"></h4>
                        </div>
                        <div id="six-storage-enquiry-container" style="display:none;">
                            <div class="six-storage-row cc">
                                <div class="six-storage-col six-storage-s6 six-storage-m6 six-storage-l6">
                                    <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mr10" id="six-storage-view-units"><?php esc_html_e('View Units','6storage-rentals'); ?></button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="action" id="action" value="six_storage_move_in_unit_search">
                        <input type="hidden" name="six_storage_plugin_url" id="six-storage-online-plugin-url" value="<?php esc_attr($this->six_storage_plugin_url) ?>">
                        </form>
                    </div>
                </div>
                <div class="six-storage-no-unit-data six-storage-grid-mt10" style="display:none" id="six-storage-initial-msg">
                    <div class="six-storage-grid-mt10 six-storage-tenant-content six-storage-primary-background-color six-storage-grid-d-flex six-storage-flex-column six-storage-justify-content-center six-storage-grid-pl30 six-storage-grid-pr30 six-storage-grid-pb30  six-storage-grid-pt30 six-storage-text-white">
                        <span>
                            <!--Choose a Storage Type--><?php esc_html_e('Choose a Storage Type.','6storage-rentals'); ?>
                        </span>
                        <span>
                            <!--Pick a Size--><?php esc_html_e('Pick a Size.','6storage-rentals'); ?>
                        </span>
                        <span>
                            <!--Then Storage--><?php esc_html_e('Then Storage!','6storage-rentals'); ?>
                        </span>
                    </div>
                </div>
                <div class="six-storage-col six-storage-l12 six-storage-m12 six-storage-no-unit-data six-storage-grid-mt10" id = "six-storage-no-units-data" style="display:none;">
                    <div class="six-storage-grid-mt10 six-storage-tenant-content six-storage-primary-background-color six-storage-grid-d-flex six-storage-flex-column six-storage-justify-content-center six-storage-grid-pl30 six-storage-grid-pr30 six-storage-grid-pb30  six-storage-grid-pt30 six-storage-text-white">
                        <span id="six-storage-no-units">
                          
                        </span>
                    </div>
                </div> 

                <div class="six-storage-col six-storage-l12 six-storage-m12 six-storage-no-unit-data six-storage-grid-mt10" id ="six-storage-no-units-available-here">
                    
                </div> 



                <div class="six-storage-col six-storage-l12 six-storage-m12 six-storage-no-unit-data six-storage-grid-mt10" id="six-storage-no-records-found">
                    
                </div> 

                

                   
                <div class="six-storage-col six-storage-l12 six-storage-m12 six-storage-custom-scroller six-storage-position-relative" id="six-storage-online-unit-collection-contianer"></div>
                <div class = "six-storage-update-button-container">
                <div class="six-storage-col" id="six-storage-prevous-button-container"></div>
                <div class="six-storage-col" id="six-storage-load-more-container"></div>
                </div>
            </div>
            <div style="display: none;" id="six-storage-unit-details" class="six-storage-grid-container">
                <h5 class="six-storage-fs-title cc six-storage-grid-mt30 six-storage-text-center six-storage-grid-w-100">
                    <!--Selected Storage--><?php $selectedStorageBeftextTrans= get_option('six_storage_online_fs_selected_storage_custom_word'); $selectedStorageTransTxt = esc_html_e($selectedStorageBeftextTrans,'6storage-rentals'); echo esc_attr("$selectedStorageTransTxt") ?>
                </h5>
                <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-secondary-border-bottom-color">
                
                    <p class= "six-storage-text-center six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-text-white six-storage-move-in-flow-note-msg six-storage-align-items-center" ><?php $sixStorageToggleVal == '1' ? esc_html_e($sixStorageStoragedetails) : ''?></p>
                
                <div class=" six-storage-grid-d-flex six-storage-flex-wrap six-storage-col cc six-storage-s12 six-storage-grid-p0 six-storage-justify-content-center six-storage-grid-mt15 six-storage-grid-ml15">
                    <p class="six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-grey six-storage-lighten-4 six-storage-text-white six-storage-rounded-10 six-storage-grid-d-flex six-storage-align-items-center">
                        <i class="six-storage-grid-position-relative six-storage-material-icons notranslate six-storage-grid-mr10">house_siding</i>
                        <!-- Please review your storage(s) and payment cycle-->
                        <?php $paymentCycleBeftextTrans= get_option('six_storage_online_review_your_storage_custom_word'); $paymentCycleTransTxt = esc_html_e($paymentCycleBeftextTrans,'6storage-rentals'); echo esc_attr("$paymentCycleTransTxt") ?>
                    </p>
                </div>
                <div class="six-storage-row cc  six-storage-selectedUnits-2 six-storage-grid-d-flex six-storage-justify-content-center six-storage-grid-d-flex  six-storage-mt-60 six-storage-flex-wrap">
                    <div class="six-storage-input-field six-storage-col six-storage-m12 six-storage-l3 six-storage-s12 cc  six-storage-grid-ml0"
                        <?php if(get_option($obj->six_storage_online_fc_moveindate_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                        <i class="six-storage-material-icons notranslate six-storage-dateicon-append six-storage-grey-text">date_range</i>
                        <input class="cc" id="six-storage-movein-date" type="text" readonly="readonly" placeholder=" " />
                        <label class="cc"><b>
                                <!--Move-In Date--><?php esc_html_e('Move-In Date','6storage-rentals'); ?>
                            </b></label>
                    </div>
                

                 
                 <div class="six-storage-input-field six-storage-col six-storage-l3 six-storage-m12 six-storage-s12 cc  six-storage-grid-ml0" id ="six-storage-invoice_period_hide">
                    <select class="cc" id="six-storage-invoice-period-new">

                            </select>
                            <label class="cc">
                            <b> <!--Invoice Period--><?php esc_html_e('Invoice Period','6storage-rentals'); ?></b>
                        </label>
                       
                    </div>


           


               <div class="six-storage-input-field six-storage-col six-storage-l3 six-storage-m12 six-storage-s12 cc  six-storage-grid-ml0"  id ="invoice_recurring_hide">
                        <select class="cc" id="six-storage-invoice-reccuring-new">
                            
                        </select>
                        <label class="cc">
                            <b> <!--Invoice Recurring--><?php esc_html_e('Invoice Recurring','6storage-rentals'); ?> </b>
                        </label>
                    </div>



                    <div class="six-storage-input-field six-storage-col six-storage-l3 six-storage-m12 six-storage-s12 cc  six-storage-grid-ml0" style = "display:none;">
                        <select class="cc" id="six-storage-invoice-period">
                            <?php
                                foreach ($this->six_storage_invoice_period as $key => $six_storage_invoice_period) {
                                    $selected = $six_storage_invoice_period["preferred"] ? "selected" : "";
                                    echo '<option value="' . esc_attr($six_storage_invoice_period['invoicePeriodId']) . '" ' . esc_attr($selected) . '>' . esc_attr($six_storage_invoice_period['invoicePeriod']) . '</option>';
                                }
                            ?>
                        </select>
                        <label class="cc">
                            <b> <!--Invoice Period--><?php esc_html_e('Invoice Period','6storage-rentals'); ?></b>
                        </label>
                    </div>
                 


                    <div class="six-storage-input-field six-storage-col six-storage-l3 six-storage-m12 six-storage-s12 cc  six-storage-grid-ml0" data-settings_name="Customer Invoice Type" style="display:none;">
                        <select class="cc" id="six-storage-invoice-reccuring">
                            <?php
                                foreach ($this->six_storage_invoice_reccuring as $key => $six_storage_invoice_reccuring) {
                                    $selected = $six_storage_invoice_reccuring['recurringType'] == "FirstOfMonth" ? "selected" : "";
                                    echo '<option value="' . esc_attr($six_storage_invoice_reccuring['recurringTypeId']) . '" ' . esc_attr($selected) . '>' . esc_attr($six_storage_invoice_reccuring['recurringLabel']) . '</option>';
                                }
                            ?>
                        </select>
                        <label class="cc">
                            <b> <!--Invoice Recurring--><?php esc_html_e('Invoice Recurring','6storage-rentals'); ?> </b>
                        </label>
                    </div>




                    <div  id="six-storage-additional-months-div" class="six-storage-input-field six-storage-col six-storage-l3 six-storage-m12 six-storage-s12 cc  six-storage-grid-ml0" <?php if(get_option($obj->six_storage_online_fs_of_additional_months_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                        <input class="cc" id="six-storage-additional-months" min="0" maxlength="1" type="number" onkeypress="return (event.charCode !=8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <= 57))" value="<?php echo esc_attr(get_option($obj->six_storage_online_fc_additional_month_custom_word)) ?>" data-original-title="Advance rent by Day(s)" min="0" max="12" onkeypress="return sixStorageIsNumber(this);"  oninput="validity.valid||(value='');">
                        <label class="cc" id="six-storage-addition-month-label">
                            <b> <!--Additional Months--><?php esc_html_e('Additional Months','6storage-rentals'); ?> </b>
                        </label>
                        <div style="display: none;" id="six-storage-additional-months-err" class="six-storage-invalid-feedback"></div>
                    </div>
                </div>
                <div class="six-storage-row cc six-storage-grid-d-flex  six-storage-text-right six-storage-grid-mb15 six-storage-col six-storage-justify-content-center" id="six-storage-moveinstep-rental-period"></div>
                <div class="six-storage-row  cc six-storage-selected-units-info six-storage-grid-d-flex six-storage-justify-content-center six-storage-flex-wrap six-storage-grid-mb5" id="six-storage-unit-details-container"></div>
            </div>
            <div style="display:none;" class="six-storage-row  cc  six-storage-flex-wrap" id="six-storage-addons-container">
         
            <p class= "addons-test six-storage-text-center six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-text-white six-storage-move-in-flow-note-msg six-storage-align-items-center" ><?php $sixStorageToggleVal == '1' ? esc_html_e($sixStorageAddonsdetails,'6storage-rentals') : ''?></p>
            </div>
            <div style="display:none;" class="six-storage-white six-storage-grid-mb20" id="six-storage-tenant-details">
                <div class="six-storage-row  cc six-storage-grid-mt30">
                    <h5 class="six-storage-fs-title cc six-storage-text-center six-storage-grid-w-100">
                        <?php esc_html_e('Tenant Details','6storage-rentals'); ?></h5>
                    <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-secondary-border-bottom-color">
                    
                        <p class= "six-storage-text-center six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-text-white six-storage-move-in-flow-note-msg six-storage-align-items-center" ><?php $sixStorageToggleVal == '1' ? esc_html_e($sixStorageTenantdetails) : ''?></p>
                    
                </div>
                <div class="six-storage-row cc six-storage-grid-mb20">
                    <div class=" six-storage-grid-d-flex six-storage-flex-wrap six-storage-col cc six-storage-s12 six-storage-justify-content-center">
                        <p class="six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-grey six-storage-lighten-4 six-storage-text-white six-storage-rounded-10 six-storage-grid-d-flex six-storage-align-items-center">
                            <i class="six-storage-grid-position-relative six-storage-material-icons notranslate six-storage-grid-mr10">design_services</i>
                            <!--Please fill in your details--><?php esc_html_e('Please fill in your details','6storage-rentals'); ?>
                        </p>
                    </div>
                </div>
                <div class="six-storage-row cc six-storage-grid-d-flex six-storage-justify-content-center six-storage-flex-wrap">
                    <div class="six-storage-col six-storage-m12 six-storage-l6 six-storage-grid-border-right six-storage-grid-ml0 six-storage-tenant-info-div six-storage-mx-auto six-storage-grid-xs-p0"
                        id="six-storage-tenant-info-div">
                        
                        <div class="six-storage-modal" id="six-storage-dashboard-modal">
                            <div class="six-storage-modal-container-header six-storage-secondary-background">
                                <div class="six-storage-title" id="six-storage-modalTitle-photo">
                                </div>
                                <div>
                                    <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat">&times;</button>
                                </div>
                            </div>
                            <div class="six-storage-modal-content six-storage-grid-p0">
                            <div class="six-storage-modal-container-body six-storage-grid-xs-p0" id="six-storage-dashboard-modal-Body">
                            </div>
                            </div>
                        </div>
                        <div class="six-storage-row  cc six-storage-grid-pt20 six-storage-grid-pb20 six-storage-flexbox-important six-storage-flex-wrap">
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_first_name_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                <?php if(get_option($obj->six_storage_online_fs_ti_first_name_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_firstname" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_first_name_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--First Name--><?php esc_html_e('First Name','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_firstname-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter First Name--><?php esc_html_e('Please Enter First Name','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_last_name_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                <?php if(get_option($obj->six_storage_online_fs_ti_last_name_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_lastname" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_last_name_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Last Name--><?php esc_html_e('Last Name','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_lastname-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter Last Name--><?php esc_html_e('Please Enter Last Name','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_email_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_email_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_email" class="cc" tabindex="-1" type="email"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_email_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Email--><?php esc_html_e('Email','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_email-err" class="six-storage-invalid-feedback">
                                    <!--Please Enter Email--><?php esc_html_e('Please Enter Email','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-phone-input six-storage-phone-field-1 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_phone1_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_phone1_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_phone1" class="cc six-storage-telephone" type="tel"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_phone1_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="six-storage-phone-label six-storage-active cc" id="six-storage-phone1Label">
                                    <!--Phone1--><?php esc_html_e('Phone1','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_phone1-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter Phone 1--><?php esc_html_e('Please Enter Phone 1','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-phone-input six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_phone2_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_phone2_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_phone2" class="cc six-storage-telephone" type="tel"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_phone2_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="six-storage-phone-label cc six-storage-active" id="six-storage-phone2Label">
                                    <!--Phone2--><?php esc_html_e('Phone2','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_phone2-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter Phone 2--><?php esc_html_e('Please Enter Phone 2','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_dob_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_dob_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <i class="six-storage-material-icons notranslate six-storage-dateicon-append six-storage-grey-text">date_range</i>
                                <input id="six_storage_dob" class="cc six-storage-mobile-margin-bottom cc" autofocus type="text"
                                    placeholder=" " readonly="readonly"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_dob_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Date Of Birth--><?php esc_html_e('Date Of Birth','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_dob-err" class="six-storage-invalid-feedback">
                                    <!--Please Select Data Of Birth--><?php esc_html_e('Please Select Date Of Birth','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_address1_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_address1_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_address1" type="text" class="cc"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_address1_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Address Line 1--><?php esc_html_e('Address Line 1','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_address1-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter Address Line 1--><?php esc_html_e('Please Enter Address Line 1','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_address2_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_address2_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_address2" type="text" class="cc"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_address2_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                    <?php if(get_option($obj->six_storage_online_fs_ti_address2_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Address Line 2--><?php esc_html_e('Address Line 2','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_address2-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter Address Line 2--><?php esc_html_e('Please Enter Address Line 2','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_state_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                <?php if(get_option($obj->six_storage_online_fs_ti_state_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_state" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_state_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--State--><?php esc_html_e('State','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_state-err" class="six-storage-invalid-feedback">
                                    <?php esc_html_e('Please Select State','6storage-rentals'); ?></div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_zip_postalcode_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_zip_postalcode_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_zip_code" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_zip_postalcode_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Zip Code--><?php esc_html_e('Zip Code','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_zip_code-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter Zip Code--><?php esc_html_e('Please Enter Zip Code','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6  six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_city_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                <?php if(get_option($obj->six_storage_online_fs_ti_city_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_city" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_city_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--City--><?php esc_html_e('City','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_city-err" class="six-storage-invalid-feedback">
                                    <!--Please Enter City--><?php esc_html_e('Please Enter City','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_country_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_country_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_country" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_country_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Country--><?php esc_html_e('Country','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_country-err" class="six-storage-invalid-feedback">
                                    <!--Please Enter Country--><?php esc_html_e('Please Enter Country','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_website_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_website_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_company_website" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_website_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Website--> <?php esc_html_e('Website','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_company_website-err" class="six-storage-invalid-feedback">
                                    <!--Please Enter Website--><?php esc_html_e('Please Enter Website','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_taxid_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_taxid_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_company_tax_id" class="cc" type="text"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_taxid_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Tax ID--> <?php esc_html_e('Tax ID','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_company_tax_id-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Enter Tax ID--> <?php esc_html_e('Please Enter Tax ID','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ti_SSN_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                <?php if(get_option($obj->six_storage_online_fs_ti_SSN_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <input id="six_storage_ssn_number" class="cc" type="text"  maxlength="15" onfocus="sixStorageClearConfidential()"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_SSN_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <label class="cc">
                                    <!--Country--><?php esc_html_e('Social Security Number','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six_storage_ssn_number-err" class="six-storage-invalid-feedback">
                                    <!--Please Enter Country--><?php esc_html_e('Please Enter Social Security Number','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div id="sixStorageRentLeadSource" class="six-storage-input-field six-storage-col six-storage-l6 six-storage-m6 six-storage-s12 cc six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_of_lead_source_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                <?php if(get_option($obj->six_storage_online_fs_of_lead_source_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                <label class="six-storage-active cc">
                                    <!--How did you find us--><?php esc_html_e('How did you find us','6storage-rentals'); ?>?
                                </label>
                                <div class="six-storage-flex-grow-1">
                                    <input class="six-storage-file-path six-storage-validate cc" onfocus="sixStorageTenLoadLeadSource();"
                                        autocomplete="six-storage-new-username" id="six_storage_lead_sourcetext" type="text" />
                                    <i class="six-storage-material-icons six-storage-tiny six-storage-vtwo-tenantinfo-lead">arrow_drop_down</i>
                                    <input type="hidden" autocomplete="six-storage-new-username" id="six_storage_lead_source"
                                        <?php if(get_option($obj->six_storage_online_fs_of_lead_source_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                        <?php if(get_option($obj->six_storage_online_fs_of_lead_source_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> />
                                </div>
                                <div class="six-storage-unit-accordion six-storage-grid-w-100 six-storage-custom-scroller" id="six_storage_lead_sourceaccord" style="display:none">
                                    <ul class="six-storage-collapsible cc six_storage_lead_sourceaccord six-storage-custom-scroller six-storage-addon-collapsible"
                                        autocomplete="off" id="sixStorage-tenant-lead">

                                    </ul>
                                </div>
                                <div style="display: none;" id="six_storage_lead_source-err" class="six-storage-invalid-feedback">
                                    <!--Please Select Lead Source--><?php esc_html_e('Please Select Lead Source','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div id="six-security-gate-access-field" class="six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0" style="display:none;">

                            </div>
                            <div class="six-storage-row cc" id="six-storage-tenant-custom-field">

                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m12 cc" 
                                <?php if(get_option($obj->six_storage_online_fs_of_key_in_safe_box_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                <!-- <div >
                                <label class="six-storage-switch">
                                    <input id="six-storage-unit-key-in-safe-box" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                Unit key in safe box
                            </div> -->

                                <div class="six-storage-switch cc six-storage-grid-d-flex six-storage-align-items-center six-storage-checkboxRequired" id="six-stoarge-movein-safe-key-togg"
                                    <?php if(get_option($obj->six_storage_online_fs_of_key_in_safe_box_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                    <label class="six-storage-hiderequired cc six-storage-label-hider">
                                        <input type="checkbox" class="cc" id="six-storage-unit-key-in-safe-box"
                                            <?php if(get_option($obj->six_storage_online_fs_of_key_in_safe_box_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                        <span class="six-storage-lever six-storage-swich-box-toggle"></span>
                                    </label>
                                    <!--Unit key in safe box--> <?php esc_html_e('Unit key in safe box','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m12 six-storage-grid-mt20 six-storage-grid-mb30" style="display: none" data-settings_name="IsBusinessUser">
                                <label class="six-storage-container-checkbox">
                                    <input id="business-user" type="checkbox" data-settings_name="IsBusinessUser">
                                    <span style="margin-right:5px;" class="six-storage-checkmark"></span>
                                    <!--Business User--> <?php esc_html_e('Business User','6storage-rentals'); ?>
                                </label>
                            </div>
                            <div id="six-storage-company-details" class="six-storage-grid-d-flex six-storage-flex-wrap six-storage-grid-w-100  six-storage-s12 six-storage-grid-p0 six-storage-col cc" style="display: none;">
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_companyname_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                    
                                    <?php if(get_option($obj->six_storage_online_fs_ti_companyname_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <input id="six_storage_company_name" class="cc" type="text"
                                        <?php if(get_option($obj->six_storage_online_fs_ti_companyname_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <label class="cc">
                                        <!--Company Name--> <?php esc_html_e('Company Name','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_company_name-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter Company Name-->
                                        <?php esc_html_e('Please Enter Company Name','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                    data-settings_name="IsCodiceFiscale" style="" >
                                    <input id="six_storage_company_codice_fiscale" class="cc" type="text"
                                        data-settings_name="IsCodiceFiscale">
                                    <label class="cc">
                                        <!--Codice Fiscale--> <?php esc_html_e('Codice Fiscale','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_company_codice_fiscale-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter Codice Fiscale--><?php esc_html_e('Please Enter Codice Fiscale','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field  six-storage-col six-storage-m6 six-storage-grid-ml0" data-settings_name="PECAddress" style="">
                                    <input id="six_storage_company_pec_address" class="cc" type="text"
                                        data-settings_name="PECAddress">
                                    <label class="cc">
                                        <!--PEC Address--> <?php esc_html_e('PEC Address','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_company_pec_address-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter PEC Address--><?php esc_html_e('Please Enter PEC Address','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12 six-storage-grid-ml0"
                                    data-settings_name="TransmissionChannelID" style="">
                                    <input id="six_storage_company_tranmission_channel_id" class="cc" type="text"
                                        data-settings_name="TransmissionChannelID">
                                    <label class="cc">
                                        <!--Tranmission Channel ID-->
                                        <?php esc_html_e('Tranmission Channel ID','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_company_tranmission_channel_id-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter Tranmission Channel ID--><?php esc_html_e('Please Enter Tranmission Channel ID','6storage-rentals'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="six-storage-grid-form-group six-storage-col six-storage-l12 six-storage-grid-mt20 six-storage-grid-ml0"
                                <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                <!-- <div >
                                <label class="six-storage-switch">
                                    <input id="delivery-address-is-same-as-above" type="checkbox" checked="true" onchange="sixStorageDeliveryAddressIsSame();">
                                    <span class="slider round"></span>
                                </label>
                                Delivery address is same as above
                            </div> -->

                                <div class="six-storage-switch cc six-storage-checkboxdeliveryRequired six-storage-align-items-center six-storage-grid-d-flex" id="six-storage-movein-delivery-add-togg">
                                    <label class="six-storage-hiderequired cc six-storage-label-hider-1">
                                        <input type="checkbox" class="cc" id="delivery-address-is-same-as-above"
                                            onchange="sixStorageDeliveryAddressIsSame();">
                                        <span class="six-storage-lever six-storage-swich-box-toggle"></span>
                                    </label>
                                    <!--Delivery address is same as above-->
                                    <?php esc_html_e('Delivery address is same as above','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div class="six-storage-clearfix six-storage-row  cc" id="six-storage-deliveryaddress-1"
                                <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                <p class="six-storage-col six-storage-l9 six-storage-grid-w-100 cc six-storage-h-5">
                                    <!--Delivery address--> <?php esc_html_e('Delivery address','6storage-rentals'); ?>
                                </p>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12"
                                    <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <textarea id="six_storage_delivery_address1" class="six-storage-materialize-textarea cc"
                                        
                                        <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>></textarea>

                                    <label class="cc">
                                        <!--Address1--><?php esc_html_e('Address1','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_delivery_address1-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter Address1--><?php esc_html_e('Please Enter Address1','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12"
                                    <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <textarea id="six_storage_delivery_address2" class="six-storage-materialize-textarea cc"
                                        
                                        <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>></textarea>
                                    <label class="cc">
                                        <!--Address2--><?php esc_html_e('Address2','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_delivery_address2-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter Address2--><?php esc_html_e('Please Enter Address Line 2','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12"
                                    <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <input id="six_storage_delivery_country" class="cc" type="text" 
                                        <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <label class="cc">
                                        <!--Country--><?php esc_html_e('Country','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_delivery_country-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter Country--><?php esc_html_e('Please Enter Country','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12"
                                    <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <input id="six_storage_delivery_state" class="cc" type="text" 
                                        <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <label class="cc">
                                        <!--State--><?php esc_html_e('State','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_delivery_state-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter State--><?php esc_html_e('Please Enter State','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12"
                                    <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <input id="six_storage_delivery_city" class="cc" type="text" 
                                        <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <label class="cc">
                                        <!--City--><?php esc_html_e('City','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_delivery_city-err"
                                        class="six-storage-invalid-feedback">
                                        <!--Please Enter City--><?php esc_html_e('Please Enter City','6storage-rentals'); ?>
                                    </div>
                                </div>
                                <div class="six-storage-input-field six-storage-col six-storage-m6 six-storage-s12"
                                    <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <input id="six_storage_delivery_zip_code" class="cc" type="text" 
                                        <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>>
                                    <label class="cc">
                                        <!--Zip Code--><?php esc_html_e('Zip Code','6storage-rentals'); ?>
                                    </label>
                                    <div style="display: none;" id="six_storage_delivery_zip_code-err" class="six-storage-invalid-feedback">
                                        <!--Please Enter Zip Code--><?php esc_html_e('Please Enter Zip Code','6storage-rentals'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="six-storage-col six-storage-m12 six-storage-l6 six-storage-identity-div six-storage-s12 six-storage-grid-xs-p0" id="six-storage-identity-container">



                    <div class= "" id= "six-storage-movein-profile-picture-upload-div" >
                            <div id="six-storage-move-in-profile-pic" class="six-storage-pic-wrapper" >
                                <img src="" class="six-storage-gambar cc six-storage-img-responsive six-storage-img-thumbnail" id="six-storage-item-img-output" />
                                <div class="six-storage-profile-pic six-storage-text-center" >
                                    <div class="six-storage-profile-pic six-storage-text-center">
                                        <div class="six-storage-profile-pic-action six-storage-grid-mt10" style="display: <?php echo esc_attr((get_option("six_storage_online_movein_profile_picture_toggle") == 1) ? "" : "none") ?>;" >
                                            <a class="six-storage-text-center cc six-storage-user-action-dd six-storage-rounded-circle six-storage-grid-d-inline-block six-storage-grid-ml-auto six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center six-storage-dropdown-trigger" id="six-storage-updatePicture-dropdown-list" href="#" data-target="six-storage-profileImage-dropdown">
                                                <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-ml15 cc"><?php esc_html_e('camera / Upload Photo','6storage-rentals'); ?></button>
                                            </a>
                                            <ul class='six-storage-dropdown-content cc six-storage-updateprofile-action-lists' id="six-storage-profileImage-dropdown">
                                                <li class="cc" style="display:none;" id="six-storage-select-options-view-btn"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" id="six-storage-select-options-view-photo"><!--View Photo--> <?php esc_html_e('View Photo','6storage-rentals'); ?></a></li>
                                                <li class="cc" id="six-storage-select-options-take-photo"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" ><!--Take Photo--> <?php esc_html_e('Take Photo','6storage-rentals'); ?></a></li>
                                                <li class="cc" id="six-storage-select-options-upload-photo"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" ><!--Upload Photo--> <?php esc_html_e('Upload Photo','6storage-rentals'); ?></a></li>
                                                <li class="cc" style="display:none;" id="six-storage-select-options-remove-btn"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" id="six-storage-remove-photo"><!--Remove Photo--> <?php esc_html_e('Remove Photo','6storage-rentals'); ?></a></li>
                                            </ul>
                                            <div style="display: none;" id="six_storage_upload_photo_err"
                                                class="six-storage-invalid-feedback">
                                                <!--Please Enter Address Line 1--><?php esc_html_e('Please upload photo ID','6storage-rentals'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="six-storage-row  cc"
                            <?php if(get_option($obj->six_storage_online_fs_ti_identitydocument_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } else { echo esc_attr ('data-element_hidden=false');  } ?>
                             id="dv-identity">
                            <p class="six-storage-col six-storage-l9 six-storage-m12 six-storage-grid-w-100 py-3 six-storage-six-storage-font-size-15 cc six-storage-grid-mt20 six-storage-grid-mb30">
                                <!--ID Details & File Upload--><?php esc_html_e('ID Details & File Uploads','6storage-rentals'); ?>
                            </p>
                            <div class="six-storage-input-field six-storage-col six-storage-l6 six-storage-s12 six-storage-m6 cc  six-storage-z-index-1"
                                    <?php if(get_option($obj->six_storage_online_fs_ti_identitydocument_is_mandatory) == '0'){ echo esc_attr ('data-element_required=false'); } else { echo esc_attr ("data-element_required='true'"); } ?>>

                                <select id="six-storage-identity_type" class="cc" value=""
                                    <?php if(get_option($obj->six_storage_online_fs_ti_identitydocument_is_mandatory) == '0'){ echo esc_attr ('data-element_required=false'); } else { echo esc_attr ("data-element_required='true'"); } ?>
                                ></select>
                                <label class="cc">
                                    <!--Identity Type--><?php esc_html_e('Identity Type','6storage-rentals'); ?>
                                </label>
                                <div style="display: none;" id="six-storage-identity_type-err" class="six-storage-invalid-feedback">
                                    <!--Please Select Identity Type--><?php esc_html_e('Please Select Identity Type','6storage-rentals'); ?>
                                </div>
                            </div>
                            <div id="six-storage-identity-fields-container" class="six-storage-row  cc six-storage-grid-m0 six-storage-grid-w-100">
                            </div>
                            <div class="six-storage-input-field six-storage-col six-storage-m12 six-storage-text-center"
                                <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                <div class="six-storage-upload-btn-wrapper"
                                data-settings_name="" <?php if(get_option($obj->six_storage_online_fs_ti_identitydocument_toggle) == '0'){ echo "data-element_hidden='true'"; }?>
                                <?php if(get_option($obj->six_storage_online_fs_ti_identitydocument_toggle) == '0'){ echo esc_attr ("data-element_required='false'"); } ?>
                                    <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                    <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                    <button id="six-storage-id-documents" class="six-storage-btn-upload six-storage-primary-border-color cc"
                                        <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                        <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                        <i class="six-storage-material-icons notranslate six-storage-primary-color">file_upload</i>
                                        <!--File Uploads--><?php esc_html_e('File Uploads','6storage-rentals'); ?>
                                    </button>
                                    <input id="six_storage_documentFile"
                                        accept=".jpg, .jpeg, .png, .doc, .xls, .xlsx, .doc, .docx, .txt, .pdf" type="file"
                                        name="documentFile"
                                        <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                        <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>
                                         />
                                </div>
                                <div style="display: block;" id="six_storage_size_indication_msg"
                                    class="six-storage-img-note-text">
                                    <!--Please Upload File--> <?php esc_html_e('Please upload below 5 MB file','6storage-rentals'); ?>
                                </div>
                                <div style="display: none;" id="six_storage_documentFiles-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please Upload File--> <?php esc_html_e('Please Upload File','6storage-rentals'); ?>
                                </div>
                                <div style="display: none;" id="six_storage_documentFiles_valid-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please validate File--> <?php esc_html_e('Please upload the file with valid file name','6storage-rentals'); ?>
                                </div>
                                <div style="display: none;" id="six_storage_documentFiles_size-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please validate File--> <?php esc_html_e('Uploaded file size is empty','6storage-rentals'); ?>
                                </div>
                                <div style="display: none;" id="six_storage_size_exceeded-err"
                                    class="six-storage-invalid-feedback">
                                    <!--Please validate File--> <?php esc_html_e('File size exceeded max limit 5 MB','6storage-rentals'); ?>
                                </div>
                                <div style="display: none;" id="six_storage_server_size_mismatch"
                                    class="six-storage-invalid-feedback">
                                    <!--Please validate File--> <?php esc_html_e('Contact hosting provider to increase max upload size','6storage-rentals'); ?>
                                </div>
                            </div>
                            <ul id="six-storage-upload-list" class="six-storage-upload-list cc six-storage-grid-w-100"
                                <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                            </ul>
                        </div>
                            <?php  
                                $sixStorageFileUpload = get_option($obj->six_storage_online_file_upload_note);
                            ?>
                        <div id="six-storage-file-upload-note" class= "six-storage-file-upload-message-div">
                                <p class= "six-storage-text-center six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-text-white six-storage-file-upload-note-msg six-storage-align-items-center"><?php esc_html_e($sixStorageFileUpload,'6storage-rentals'); ?></p>
                        </div>
                        

                        <div  id="six-storage-render-emergency-info" <?php if(get_option($obj->six_storage_online_fs_ti_emergencycontact_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none;" class="six-storage-white" id="six-storage-preview-payment">
                <div class="six-storage-row  cc six-storage-grid-mb30 six-storage-grid-mt20">
                    <h5 class="six-storage-fs-title cc six-storage-text-center six-storage-grid-w-100">
                        <!--Preview & Payment--><?php esc_html_e('Preview & Payment','6storage-rentals'); ?>
                    </h5>
                    <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-secondary-border-bottom-color">
                    
                        <p class= "six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-text-white six-storage-move-in-flow-note-msg six-storage-align-items-center six-storage-text-center" ><?php $sixStorageToggleVal == '1' ? esc_html_e($six_storage_online_payment_details) : ''?></p>
                    
                </div>
                <div class="six-storage-row  cc six-storage-grid-d-flex six-storage-justify-content-center six-storage-flex-column six-storage-align-items-center">
                    <div class="six-storage-col cc six-storage-l10 six-storage-m12 six-storage-s12 six-storage-grid-margin-auto six-storage-grid-xs-p0" id="six-storage-rapyd-alignment">
                        <div class="six-storage-grid-d-flex six-storage-flex-wrap six-storage-justify-content-center">
                            <p class="cc six-storage-note-box six-storage-grey-text six-storage-text-darken-3 cc six-storage-font-size-18  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-grey six-storage-lighten-4 six-storage-text-white six-storage-rounded-10 six-storage-grid-d-flex six-storage-align-items-center">
                                <i class="six-storage-grid-position-relative six-storage-material-icons notranslate six-storage-grid-mr10">pending_actions</i>
                                <!--Please review your details and payment. If you like to change, click on the edit button-->
                                <?php esc_html_e('Please review your details and payment. If you like to change, click on the edit button','6storage-rentals'); ?>
                                <i class="six-storage-material-icons notranslate">edit</i>
                            </p>
                        </div>

                       
                        <ul class="six-storage-collapsible cc " id="six-storage-move-in-accordion">
                            <li class="cc">
                                <div class="six-storage-collapsible-header cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold six-storage-justify-content-between six-storage-align-items-center six-storage-grey six-storage-lighten-5"
                                    id="six-storage-user-details-btn">
                                    <h6 class="six-storage-grid-m0 cc"><b>
                                            <!--Tenant Details--><?php esc_html_e('Tenant Details','6storage-rentals'); ?>
                                        </b></h6>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
                                <div class="six-storage-collapsible-body cc">
                                    <div id="six-storage-user-details">
                                        <div class="six-storage-grid-card-body">
                                            <div class="six-storage-row  cc six-storage-grid-d-flex six-storage-flex-wrap six-storage-justify-content-center">
                                                <div class="six-storage-col six-storage-l6 six-storage-m12 six-storage-grid-mb30 six-storage-grid-d-flex six-storage-grid-ml0 six-storage-s12">
                                                    <div class="six-storage-content-box six-storage-grid-pr30 six-storage-grid-pl30 six-storage-grid-pt10 six-storage-grid-border six-storage-grid-w-100">
                                                        <!-- <h6 class="six-storage-top-title cc six-storage-white six-storage-grid-pr15 six-storage-grid-pl15 six-storage-grid-six-storage-position-relative six-storage-grid-d-inline-block">
                                                        <b>Tenant Details</b>
                                                    </h6> -->
                                                        <table class="six-storage-grid-table cc six-storage-grid-table-borderless six-storage-grid-shadow-sm six-storage-rounded six-storage-table-left">
                                                            <thead class="grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                <tr class="cc">
                                                                    <th colspan="2"
                                                                        class="cc six-storage-grid-border-bottom">
                                                                        <!--Tenant Details--><?php esc_html_e('Tenant Details','6storage-rentals'); ?>
                                                                        <i class="six-storage-material-icons notranslate six-storage-grey-text six-storage-cursor-pointer six-storage-edit-icon"
                                                                            id="six-storage-edit-tenant-details">edit</i>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="cc">
                                                                    <td class="cc">
                                                                        <!--Tenant Name--><?php esc_html_e('Tenant Name','6storage-rentals'); ?>:
                                                                    </td>
                                                                    <td class="cc" id="six-storage-name-display"></td>
                                                                </tr>
                                                                <tr class="cc">
                                                                    <td class="cc">
                                                                        <!--Email Id:--><?php esc_html_e('Email Id','6storage-rentals'); ?>:
                                                                    </td>
                                                                    <td class="cc" id="six-storage-email-display"></td>
                                                                </tr>
                                                                <tr class="cc">
                                                                    <td class="cc">
                                                                        <!--Mobile:-->
                                                                        <?php esc_html_e('Mobile','6storage-rentals'); ?>:
                                                                    </td>
                                                                    <td class="cc" id="six-storage-phone1-display"></td>
                                                                </tr>
                                                                <tr class="cc">
                                                                    <td class="cc">
                                                                        <!--Address:-->
                                                                        <?php esc_html_e('Address','6storage-rentals'); ?>:
                                                                    </td>
                                                                    <td class="cc" id="six-storage-address-display">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="six-storage-col six-storage-m12 six-storage-l6 six-storage-grid-d-flex six-storage-flex-wrap six-storage-grid-mb30 six-storage-grid-ml0 six-storage-s12">
                                                    <div class="six-storage-content-box six-storage-grid-pr30 six-storage-grid-pl30 six-storage-grid-pt10  six-storage-grid-mb30 six-storage-grid-border six-storage-grid-w-100"
                                                        <?php if(get_option($obj->six_storage_online_fs_ad_delivery_address_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                                        <h6 class="six-storage-top-title cc six-storage-white six-storage-grid-pr15 six-storage-grid-pl15 six-storage-grid-six-storage-position-relative six-storage-grid-d-inline-block">
                                                            <b class="six-storage-d-none">
                                                                <!--Delivery Details--><?php esc_html_e('Delivery Details','6storage-rentals'); ?>
                                                            </b>
                                                        </h6>
                                                        <table class="six-storage-grid-table cc six-storage-grid-table-borderless six-storage-grid-shadow-sm six-storage-rounded six-storage-table-left">
                                                            <thead class="grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                <tr class="cc">
                                                                    <th colspan="2" class="six-storage-grid-border-bottom">
                                                                        <!--Delivery Details--><?php esc_html_e('Delivery Details','6storage-rentals'); ?>
                                                                        <i class="six-storage-material-icons notranslate six-storage-grey-text six-storage-cursor-pointer six-storage-edit-icon" id="six-storage-edit-delivery-details">edit</i>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="cc">
                                                                <td class="cc"><!--Delivery Address:--><?php esc_html_e('Delivery Address','6storage-rentals'); ?>:</td>
                                                                    <td class="cc" id="six-storage-delivery-address-display">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="six-storage-content-box six-storage-grid-pr30 six-storage-grid-pl30 six-storage-grid-pt10 six-storage-grid-border six-storage-grid-w-100"  <?php if(get_option($obj->six_storage_online_fs_ti_identitydocument_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } else { echo esc_attr("data-element_hidden='false'");  } ?>>
                                                        <table class="six-storage-grid-table cc six-storage-grid-table-borderless six-storage-grid-shadow-sm six-storage-rounded six-storage-table-left">
                                                            <thead class="grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                <tr class="cc">
                                                                    <th colspan="2" class="cc six-storage-grid-border-bottom">
                                                                        <!--Identity Details--><?php esc_html_e('Identity Details','6storage-rentals'); ?>
                                                                        <i class="six-storage-material-icons notranslate six-storage-grey-text six-storage-cursor-pointer six-storage-edit-icon" id="six-storage-edit-id-details">edit</i>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="cc">
                                                                    <td class="cc">
                                                                        <!--ID Type:--><?php esc_html_e('ID Type','6storage-rentals'); ?>:
                                                                    </td>
                                                                    <td class="cc" id="six-storage-identity_type-display">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody id="six-storage-user-identification-details">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="cc">
                                <div class="six-storage-collapsible-header cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold  six-storage-justify-content-between six-storage-align-items-center six-storage-grey six-storage-lighten-5"
                                    id="six-storage-final-unit-details-btn">
                                    <h6 class="six-storage-grid-m0 cc"><b>
                                            <!--Storage Details--><?php esc_html_e('Storage Details','6storage-rentals'); ?>
                                        </b></h6>

                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>

                                </div>
                                <div class="six-storage-collapsible-body cc">

                                    <div style="display: none;" id="six-storage-final-unit-details">
                                        <div class="six-storage-grid-card-body">
                                            <div class="six-storage-row  six-storage-grid-d-flex six-storage-justify-content-center six-storage-flex-wrap"
                                                id="six-storage-units-details-display">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="cc">
                                <div class="six-storage-collapsible-header cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold six-storage-justify-content-between six-storage-align-items-center six-storage-grey six-storage-lighten-5"
                                    id="six-storage-addon-details-btn">
                                    <h6 class="six-storage-grid-m0 cc"><b>
                                            <!--Addon Details--><?php esc_html_e('Addon Details','6storage-rentals'); ?>
                                        </b></h6>

                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>

                                </div>
                                <div class="six-storage-collapsible-body cc">
                                    <div style="display: none;" id="six-storage-addon-details" class="six-storage-collapse"
                                        aria-labelledby="headingThree" data-parent="#six-storage-accordionExample">
                                        <div class="six-storage-grid-card-body">
                                            <i class="six-storage-material-icons notranslate six-storage-grey-text six-storage-cursor-pointer six-storage-addserviceediticon six-storage-edit-icon"
                                                onclick="sixStorageGotoAddon();">edit</i>
                                            <div class="six-storage-row cc six-storage-grid-pt30 six-storage-flexbox-important six-storage-align-items-center six-storage-flex-column">
                                                <div class="six-storage-col six-storage-m12 six-storage-l8 six-storage-grid-ml0 six-storage-grid-mb30 six-storage-grid-mt20 six-storage-s12"
                                                    <?php if(get_option($obj->six_storage_online_fs_ad_insurance_toggle) == '0'){ echo esc_attr('data-element_hidden=true'); } ?>>
                                                    <div class="six-storage-content-box six-storage-grid-pr30 six-storage-grid-pl30 six-storage-grid-pt10 six-storage-grid-border six-storage-grid-w-100">
                                                        <h6 class="six-storage-top-title cc six-storage-white six-storage-grid-pr15 six-storage-grid-pl15 six-storage-grid-six-storage-position-relative six-storage-grid-d-inline-block">
                                                            <!--Insurance Details-->
                                                            <?php esc_html_e('Insurance Details','6storage-rentals'); ?>
                                                        </h6>
                                                        <div class="six-storage-grid-table-responsive">
                                                            <table class="six-storage-grid-table cc six-storage-grid-shadow-sm six-storage-text-center six-storage-grid-bg-white six-storage-online-mobile-view-bottom-scroller">
                                                                <thead class="cc six-storage-grid-border-bottom grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                    <tr class="cc">
                                                                        <th class="cc" scope="col">
                                                                            <!--Storage No--><?php esc_html_e('Storage No','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Insurance Name--><?php esc_html_e('Insurance Name','6storage-rentals'); ?>
                                                                        </th>
                                                                        <!-- <th scope="col">Insured Amount(Incl Tax)</th> -->
                                                                        <th class="cc" scope="col">
                                                                            <!--Premium for payment period--><?php esc_html_e('Premium for payment period','6storage-rentals'); ?>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="six-storage-tbodyInsurancePreview">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="six-storage-col six-storage-m12 six-storage-l8 six-storage-grid-ml0 six-storage-grid-mb30 six-storage-grid-mt20 six-storage-s12"
                                                    >
                                                    <div class="six-storage-content-box six-storage-grid-pr30 six-storage-grid-pl30 six-storage-grid-pt10 six-storage-grid-border six-storage-grid-w-100">
                                                        <h6 class="six-storage-top-title six-storage-white cc six-storage-grid-pr15 six-storage-grid-pl15 six-storage-grid-six-storage-position-relative six-storage-grid-d-inline-block">
                                                            <!--Services Details--><?php esc_html_e('Services Details','6storage-rentals'); ?>
                                                        </h6>
                                                        <div class="six-storage-grid-table-responsive">
                                                            <table class="six-storage-grid-table cc six-storage-grid-shadow-sm six-storage-text-center six-storage-grid-bg-white six-storage-online-mobile-view-bottom-scroller">
                                                                <thead class="cc six-storage-grid-border-bottom grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                    <tr class="cc">
                                                                        <th class="cc" scope="col">
                                                                            <!--Storage No--><?php esc_html_e('Storage No','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Service Name--><?php esc_html_e('Service Name','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Price(Incl Tax)--><?php esc_html_e('Price (Incl Tax)','6storage-rentals'); ?><span
                                                                                id="six-storage-serviceTaxtooltip"></span>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="six-storage-service-details">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="six-storage-col six-storage-m12 six-storage-l8 six-storage-grid-ml0 six-storage-grid-mb30 six-storage-grid-mt20 six-storage-s12"
                                                    <?php if(get_option($obj->six_storage_online_fs_ad_merchandise_toggle) == '0'){ echo esc_attr('data-element_hidden=true'); } ?>>
                                                    <div class="six-storage-content-box six-storage-grid-pr30 six-storage-grid-pl30 six-storage-grid-pt10 six-storage-grid-border six-storage-grid-w-100">
                                                        <h6 class="six-storage-top-title cc six-storage-white six-storage-grid-pr15 six-storage-grid-pl15 six-storage-grid-six-storage-position-relative six-storage-grid-d-inline-block">
                                                            <!--Product Details--><?php esc_html_e('Product Details','6storage-rentals'); ?>
                                                        </h6>
                                                        <div class="six-storage-grid-table-responsive">
                                                            <table class="six-storage-grid-table six-storage-product-details-table-six-storage cc six-storage-grid-shadow-sm six-storage-text-center six-storage-grid-bg-white six-storage-online-mobile-view-bottom-scroller">
                                                                <thead class="cc six-storage-grid-border-bottom grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                    <tr class="cc">
                                                                        <th class="cc" scope="col">
                                                                            <!--Storage No--><?php esc_html_e('Storage No','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Product Name--><?php esc_html_e('Product Name','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Qty--><?php esc_html_e('Qty','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Price(Incl Tax)--><?php esc_html_e('Price (Incl Tax)','6storage-rentals'); ?><span
                                                                                id="six-storage-productTaxtooltip"></span>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="six-storage-merchandise-details-preview">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="six-storage-col six-storage-m12 six-storage-l8 six-storage-grid-ml0 six-storage-grid-mb30 six-storage-grid-mt20 six-storage-s12" style="display: none">
                                                    <div class="six-storage-content-box six-storage-grid-pr30 six-storage-grid-pl30 six-storage-grid-pt10 six-storage-grid-border six-storage-grid-w-100">
                                                        <h6 class="six-storage-top-title cc six-storage-white six-storage-grid-pr15 six-storage-grid-pl15 six-storage-grid-six-storage-position-relative six-storage-grid-d-inline-block" style="display: none">
                                                            <!--Vehicle Details-->
                                                            <?php esc_html_e('Vehicle Details','6storage-rentals'); ?>
                                                        </h6>
                                                        <div class="six-storage-grid-table-responsive" style="display: none">
                                                            <table class="six-storage-grid-table cc six-storage-grid-shadow-sm six-storage-text-center six-storage-grid-bg-white six-storage-online-mobile-view-bottom-scroller">
                                                                <thead class="cc six-storage-grid-border-bottom grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                    <tr class="cc">
                                                                        <th class="cc" scope="col">
                                                                            <!--Storage No--><?php esc_html_e('Storage No','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Vehicle Brand--><?php esc_html_e('Vehicle Brand','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Model-->
                                                                            <?php esc_html_e('Model','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--Vehicle No-->
                                                                            <?php esc_html_e('Vehicle No','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--License No-->
                                                                            <?php esc_html_e('License No','6storage-rentals'); ?>
                                                                        </th>
                                                                        <th class="cc" scope="col">
                                                                            <!--License State-->
                                                                            <?php esc_html_e('License State','6storage-rentals'); ?>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="cc">
                                                                        <td class="cc">122</td>
                                                                        <td class="cc">
                                                                            <!--Maruthi--><?php esc_html_e('Maruthi','6storage-rentals'); ?>
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--Swift--><?php esc_html_e('Swift','6storage-rentals'); ?>
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--Tn--><?php esc_html_e('Tn','6storage-rentals'); ?>
                                                                            1252
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--VS--><?php esc_html_e('VS','6storage-rentals'); ?>123456
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--Sydney--><?php esc_html_e('Sydney','6storage-rentals'); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="cc">
                                                                        <td class="cc">122</td>
                                                                        <td class="cc">
                                                                            <!--Maruthi--><?php esc_html_e('Maruthi','6storage-rentals'); ?>
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--Swift--><?php esc_html_e('Swift','6storage-rentals'); ?>
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--Tn --><?php esc_html_e('Tn','6storage-rentals'); ?>1252
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--VS--><?php esc_html_e('VS','6storage-rentals'); ?>123456
                                                                        </td>
                                                                        <td class="cc">
                                                                            <!--Sydney--><?php esc_html_e('Sydney','6storage-rentals'); ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="cc six-storage-active">
                                <div class="six-storage-collapsible-header cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold six-storage-justify-content-between six-storage-align-items-center six-storage-grey six-storage-lighten-5" id="six-storage-agreement-signature-btn">
                                    <h6 class="six-storage-grid-m0 cc"><b>
                                            <!--Agreement--> <?php esc_html_e('Agreement & Signature','6storage-rentals'); ?> 
                                        </b></h6>

                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>

                                </div>
                                <div class="six-storage-collapsible-body cc">
                                    <div id="six-storage-agreement-signature">
                                        <div class="six-storage-grid-card-body">
                                            <div class="six-storage-row  cc">
                                                <div class="six-storage-col six-storage-l12 six-storage-s12 six-storage-m12 six-storage-mx-auto six-storage-float-none">
                                                    <p class="cc">
                                                        <!--Read the lease agreement before you sign--><?php esc_html_e('Read the lease agreement before you sign','6storage-rentals'); ?>
                                                    </p>
                                                    <div id="six-storage-online-render-button-leaseagreement"></div>
                                                    <div id="six-storage-online-render-unit-button-leaseagreement" class="six-storage-grid-p10"></div>
                                                    <div class="six-storage-max-width overflow-scroll" id="six-storage-dvLicenceAgreement">
                                                </div>
                                            </div>
                                            <div class="six-storage-row cc  six-storage-justify-content-end six-storage-d-flex six-storage-flex-wrap six-storage-grid-mt15">
                                                <div class="six-storage-col six-storage-m6 six-storage-float-none">

                                                </div>
                                            </div>
                                            <div class="six-storage-row cc six-storage-grid-mt10 six-storage-flexbox-important six-storage-flex-wrap  six-storage-justify-content-between">
                                                <div class="six-storage-col six-storage-m12 six-storage-l6 six-storage-s12 six-storage-grid-mb30">
                                                    <table class="cc six-storage-grid-table  six-storage-grid-bg-light six-storage-grid-shadow-sm six-storage-grid-mb0">
                                                        <thead >
                                                            <tr class="cc">
                                                                <th colspan="2" class="cc six-storage-grid-border-bottom grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                    <!--Price Details--><?php esc_html_e('Price Details','6storage-rentals'); ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="cc">
                                                                <td class="cc six-storage-current-rent-exclusive">
                                                                    <!--Rent(Excl. of VAT):--><?php esc_html_e('Rent (Excl Of Tax)','6storage-rentals'); ?>:<span
                                                                        id="six-storage-currentInvoiceRentTaxPrev"></span>
                                                                </td>
                                                                <td class="cc" id="six-storage-subTotal">$150</td>
                                                            </tr>
                                                            <tr class="cc"  <?php if(get_option($obj->six_storage_online_fs_ad_insurance_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                                                <td class="cc" style ="display:none;" id = "sixStorageInsurancehide">
                                                                    <!--Insurance:--><?php esc_html_e('Insurance','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-insurance_rate"></td>
                                                            </tr>
                                                            <tr class="cc" <?php if(get_option($obj->six_storage_online_fs_ad_services_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                                                <td class="cc" id="six-storage-services_toggle_id" style="display: none">
                                                                    <!--Service:--><?php esc_html_e('Service','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-service_rate"></td>
                                                            </tr>
                                                            <tr  class="cc"
                                                                <?php if(get_option($obj->six_storage_online_fs_ad_merchandise_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                                                <td class="cc" id = "merchandise_row" style = "display:none;">
                                                                    <!--Merchandise:-->
                                                                    <?php esc_html_e('Merchandise','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-merchandise_rate"></td>
                                                            </tr>
                                                            <tr class="cc">
                                                                <td class="cc">
                                                                    <!--Tax:--><?php esc_html_e('Tax','6storage-rentals'); ?>:<span
                                                                        id="six-storage-currentInvoice"></span>
                                                                </td>
                                                                <td class="cc" id="six-storage-taxAmount"></td>
                                                            </tr>
                                                            <tr class="cc">
                                                                <td class="cc">
                                                                    <div class="six-storage-input-field" >
                                                                        <input id="six-storage-promoCodetext" class="cc" type="text">
                                                                        <label class="cc">
                                                                            <!--Promo Code--><?php esc_html_e('Promo Code','6storage-rentals'); ?>
                                                                        </label>
                                                                        <div style="display: none;" id="six-storage-promoCodetext-err" class="six-storage-invalid-feedback">
                                                                            <!--Please Enter Valid Promocode--><?php esc_html_e('Please Enter Valid Promocode','6storage-rentals'); ?>
                                                                        </div>
                                                                        <div style="display: none;" id="six-storage-promoCodetextvalid-err" class="six-storage-invalid-feedback">
                                                                            <!--Please Enter Promocode--><?php esc_html_e('Please Enter Promocode','6storage-rentals'); ?>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="cc">
                                                                    <button type="button" id="six-storage-btnPromocode" class="six-storage-waves-effect six-storage-waves-light six-storage-shadow-none six-storage-btn six-storage-secondary-background-color cc">
                                                                        <!--Apply--><?php esc_html_e('Apply','6storage-rentals'); ?>
                                                                    </button>

                                                                    <button type="button" id="six-storage-btnPromocodeRemove" class="six-storage-waves-effect six-storage-waves-light six-storage-shadow-none six-storage-btn cc">
                                                                        <!--Remove--><?php esc_html_e('Remove','6storage-rentals'); ?>
                                                                    </button>
                                                                
                                                                </td>
                                                            </tr>
                                                            <tr class="cc" id="six-storage-deposit_amount_table_row" style="display: none;">
                                                                <td class="cc">
                                                                    <!--Deposit:--><?php esc_html_e('Deposit','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-depositamount">kr. 0</td>
                                                            </tr>
                                                            <tr class="cc">
                                                                <td class="cc">
                                                                    <!--Net Amount--><?php esc_html_e('Net Amount','6storage-rentals'); ?>
                                                                </td>
                                                                <td class="cc" id="six-storage-netAmount"></td>
                                                            </tr>
                                                            <tr class="cc" id="six-storage-discount_amount_table_row" style="display: none;">
                                                                <td class="cc">
                                                                    <!--Discount:--><?php esc_html_e('Discount','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-discountAmount"></td>
                                                            </tr>
                                                            <tr class="cc six-storage-font-weight-bold">
                                                                <td class="cc">
                                                                    <!--Total--><?php esc_html_e('Total','6storage-rentals'); ?>
                                                                </td>
                                                                <td class="cc" id="six-storage-totalAmount"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php $display_next_invoice = get_option('six_storage_online_display_next_invoice') == "1" ? "" : "display:none";  ?>
                                                <div class="six-storage-col six-storage-m12 six-storage-l6 six-storage-s12 six-storage-grid-mb30 six-storage-grid-ml0" style="<?php echo esc_attr($display_next_invoice) ?>">
                                                    <table
                                                        class="cc six-storage-grid-table six-storage-table-info six-storage-grid-bg-light six-storage-grid-shadow-sm six-storage-grid-mb0">
                                                        <thead >
                                                            <tr class="cc">
                                                                <th colspan="2" class="cc six-storage-grid-border-bottom grid-thead-light six-storage-grey six-storage-lighten-4">
                                                                    <!--Next invoice Summary--><?php esc_html_e('Next invoice Summary','6storage-rentals'); ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="cc">
                                                                <td class="cc">
                                                                    <!--Next billing date:--><?php esc_html_e('Next billing date','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_billing_date">
                                                                </td>
                                                            </tr>
                                                            <tr class="cc">
                                                                <td class="cc">
                                                                    <!--Rent (excl tax):--><?php esc_html_e('Rent (excl tax)','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_rental_rate">
                                                                </td>
                                                            </tr>
                                                            <tr  class="cc"
                                                                <?php if(get_option($obj->six_storage_online_fs_ad_insurance_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                                                >
                                                                <td class="cc" style ="display:none;" id = "sixStorageInsurancehide-summary">
                                                                    <!--Insurance:--><?php esc_html_e('Insurance','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_insurance_rate">
                                                                </td>
                                                            </tr>
                                                            <tr class="cc" <?php if(get_option($obj->six_storage_online_fs_ad_services_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>>
                                                                <td class="cc" id="six-storage-services_toggle_id-summary" style="display: none">
                                                                    <!--Service:--><?php esc_html_e('Service','6storage-rentals'); ?>:
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_service_rate">
                                                                </td>
                                                            </tr>
                                                            <tr class="cc">
                                                                <td class="cc">
                                                                    <!--Tax:--><?php esc_html_e('Tax','6storage-rentals'); ?>:<span
                                                                        id="six-storage-nextInvoiceTax"></span>
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_tax_amount"></td>
                                                            </tr>
                                                            <tr class="cc">
                                                                <td class="cc">
                                                                    <!--Net Amount--><?php esc_html_e('Net Amount','6storage-rentals'); ?>
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_net_amount"></td>
                                                            </tr>
                                                            <tr class="cc"
                                                                id="six-storage-nextInvoice_discount_amount_table_row"
                                                                style="display: none;">
                                                                <td class="cc">
                                                                    <!--Discount--><?php esc_html_e('Discount','6storage-rentals'); ?>
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_discount"></td>
                                                            </tr>
                                                            <tr class="six-storage-font-weight-bold cc">
                                                                <td class="cc">
                                                                    <!--Total next invoice--><?php esc_html_e('Total next invoice','6storage-rentals'); ?>
                                                                </td>
                                                                <td class="cc" id="six-storage-nextinvoice_gross_amount">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="six-storage-col six-storage-m12 six-storage-l6 six-storage-s12 six-storage-grid-mb30 six-storage-grid-ml0">
                                                    <div class="six-storage-tenant-chckbox six-storage-grid-mb15">
                                                        <div class="six-storage-grid-w-100" id="six-storage-terms_conditions">

                                                        </div>
                                                        <div class="six-storage-grid-w-100">
                                                            <label class="cc">
                                                                <input type="checkbox" class="cc six-storage-input-field"
                                                                    id="six-storage-lease-agreement"
                                                                    onchange="sixStorageDisplayEsign();" />
                                                                <span>
                                                                    <!--I have read the lease agreement--><?php esc_html_e('I have read the lease agreement','6storage-rentals'); ?>
                                                                </span>
                                                            </label>
                                                            <div style="display: none;" id="six-storage-lease-agreement-err"
                                                                class="six-storage-invalid-feedback">
                                                                <!--Please confirm that you have read the lease agreement.--><?php esc_html_e('Please confirm that you have read the lease agreement','6storage-rentals'); ?><span>.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div <?php if(get_option($obj->six_storage_online_fs_ti_tenantsignature_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?>
                                                        
                                                        <?php if(get_option($obj->six_storage_online_fs_ti_tenantsignature_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>
                                                        id="tenant-esign">
                                                        <div id="six-storage-signature-pad" class="six-storage-white six-storage-rounded p-3" style="display: none">
                                                            <h6 class="six-storage-border-bottom cc six-storage-border-light six-storage-grid-pb15 six-storage-grid-text-center  six-storage-grey-text six-storage-text-darken-3 six-storage-grid-m0">
                                                                <b>
                                                                    <!--Electronic Signature--><?php esc_html_e('Electronic Signature','6storage-rentals'); ?>
                                                                </b></h6>
                                                            <div class="six-storage-signature-pad--body">
                                                                <canvas id="six-storage-signature-canvas"></canvas>
                                                            </div>
                                                            <div class="six-storage-signature-pad--footer">
                                                                <div class="six-storage-signature-pad--actions">
                                                                    <div class="six-storage-grid-d-flex six-storage-justify-content-center  six-storage-grid-mt10">
                                                                        <button type="button" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-red six-storage-clear  six-storage-grid-mr10  six-storage-grid-mb10" id="six-storage-canvas-clear" data-action="clear">
                                                                            <!--Clear--><?php esc_html_e('Clear','6storage-rentals'); ?>
                                                                        </button>
                                                                        <button style="display: none;" type="button" class="button six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mr10  six-storage-grid-mb" id="six-storage-canvas-change-color" data-action="change-color">
                                                                            <!--Change color--><?php esc_html_e('Change color','6storage-rentals'); ?>
                                                                        </button>
                                                                        <button type="button" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mr10  six-storage-grid-mb10" id="six-storage-canvas-undo" data-action="undo" style="display:none">
                                                                            <!--Undo--><?php esc_html_e('Undo','6storage-rentals'); ?>
                                                                        </button>

                                                                    </div>
                                                                    <div>
                                                                        <button style="display: none;" type="button" class="six-storage-btn-blue cc six-storage-button six-storage-save" id="six-storage-canvas-save-png" data-action="save-png">
                                                                            <!--Save as PNG--><?php esc_html_e('Save as PNG','6storage-rentals'); ?>
                                                                        </button>
                                                                        <button style="display: none;" type="button" class="six-storage-btn-blue cc six-storage-button six-storage-save" id="six-storage-canvas-save-jpg" data-action="save-jpg">
                                                                            <!--Save as JPG--><?php esc_html_e('Save as JPG','6storage-rentals'); ?>
                                                                        </button>
                                                                        <button style="display: none;" type="button" class="six-storage-btn-blue cc six-storage-button six-storage-save" id="six-storage-canvas-save-svg" data-action="save-svg">
                                                                            <!--Save as SVG--><?php esc_html_e('Save as SVG','6storage-rentals'); ?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="six-storage-invalid-feedback" id="six-storage-esign-error" style="display:none;">
                                                                <!--Please provide signature and proceed for payment.--><?php esc_html_e('Please provide signature and proceed for payment','6storage-rentals'); ?><span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="six-storage-row cc six-storage-grid-w-100 six-storage-flexbox-important six-storage-flex-wrap six-storage-justify-content-center">
                                                <div class="six-storage-l12 six-storage-text-center">
                                                    <div class="six-storage-invalid-feedback"
                                                        id="six-storage-termsAndCondition-error" style="display:none;">
                                                        <!--Please Read All the Terms and Conditions--><?php esc_html_e('Please Read All the Terms and Conditions','6storage-rentals'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="six-storage-row cc six-storage-grid-w-100 six-storage-flexbox-important six-storage-flex-wrap six-storage-justify-content-center">
                                                <div class="six-storage-l12 six-storage-text-center" id="six-storage-section-paylater">
                            
                                                </div>
                                            </div>
                                            <div class="six-storage-row cc six-storage-grid-w-100 six-storage-flex-wrap six-storage-justify-content-center">
                                                <div class="six-storage-l12 six-storage-text-center" id="six-storage-MoveInWithoutPayment" style="display:none;">
                                                    <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color" id="six-storage-PennilessMoveInNow">
                                                        <!--Penniless Move In--><?php esc_html_e('Penniless Move In','6storage-rentals'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="six-storage-divider" style="margin-bottom: 15px;"></div>

                                            <div class="six-storage-row cc six-storage-grid-w-100 six-storage-flexbox-important six-storage-flex-wrap six-storage-justify-content-center">
                                                <div class="six-storage-col six-storage-l6 six-storage-m12 six-storage-s12 cc six-storage-grid-margin-auto" id='six-storage-payment-selection' style="display:none;">

                                                </div>
                                                <p class ="six-storage-grid-text-warning" id="six-storage-no-payment-gateway-msg"></p>
                                            </div>
                                            <div  class="six-storage-row cc six-storage-grid-w-100 six-storage-flexbox-important six-storage-flex-wrap six-storage-justify-content-center" id="six-storage-payment-form-div">
                                               <div id ="six-storage-save-card-movin-approval">
                                                <div class="six-storage-l12 six-storage-col cc six-storage-grid-p1 six-storage-s12 six-storage-grid-margin-auto six-storage-text-center" id="six-storage-card_actions" style="display: none;">
                                                    <p class="six-storage-grid-mb0 cc" id="six-storage-saveCardSection">
                                                        <label>
                                                            <input type="checkbox" class="cc" id="six-storage-save_card_autopay" onchange="return sixStorageSavedCardCheckBox();" />
                                                            <span>
                                                                <!--Save this card for future transaction--><?php esc_html_e('Save this card for future transaction','6storage-rentals'); ?>
                                                            </span>
                                                        </label>
                                                    </p>
                                                    <p class="six-storage-grid-mb0 cc" id="six-storage-use-save-card-container" >
                                                        <label>
                                                            <input type="checkbox" class="cc" id="six-storage-turn_on_autopay" onchange="return sixStorageChangeSavecard();" />
                                                            <span>
                                                                <!--Use the saved card for future recurring payments--><?php esc_html_e('Use the saved card for future recurring payments','6storage-rentals'); ?>
                                                            </span>
                                                        </label>
                                                    </p>
                                                </div>

                                            </div>

                                                 

                                                <div id ="six-storagemovinapproval-note">
                                                <div class="six-storage-l12  six-storage-col cc six-storage-grid-p1 six-storage-s12 six-storage-grid-m0 six-storage-text-center" id="six-storage-autopay-notes" style="display: none;">
                                                    <p class="cc six-storage-font-weight-400 six-storage-units-description-cont">
                                                        <!--Save this card for future transaction--><?php _e('Note: The below card details will be saved for autopayments.','6storage-rentals'); ?>
                                                    </p>
                                                </div>  

                                                  </div>
                                                </div> 

                                                <div class="six-storage-l12  six-storage-col cc six-storage-grid-p1 six-storage-s12 six-storage-grid-m0 six-storage-text-center" id="six-storage-iban-notes" style="display: none;">
                                                    <p class="cc six-storage-font-weight-400 six-storage-units-description-cont">
                                                        <!--Save this card for future transaction--><?php esc_html_e('Save this card for future transaction','6storage-rentals'); ?>
                                                    </p>
                                                </div>

                                                <div class="six-storage-col six-storage-l12 six-storage-s12  six-storage-grid-p0 cc" id="six-storage-creditgrid-card-payment">
                                                    <div class="six-storage-payment-form" id="six-storage-dvPaymentForm">

                                                    </div>
                                                </div>

                                                <div class="six-storage-col six-storage-l12 six-storage-s12  six-storage-grid-p0 cc six-storage-text-center" id="six-storage-book-now-pay-later" style="display:none;">
                                                    <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color" id="six-storage-paylater-book-now">
                                                        <!--Proceed  & Move-In--><?php esc_html_e('Proceed  & Move-In','6storage-rentals'); ?>
                                                    </button>
                                                    <!-- onclick="return sixStorageSaveMoveinDetails(false);" -->
                                                </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="six-storage-col six-storage-l9 six-storage-grid-d-flex six-storage-grid-mb20 six-storage-grid-mt30 six-storage-justify-content-center" id="six-storage-stepping-buttons" style="display: none ">
                <button id="six-storage-cancel-movein" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc materialize-red six-storage-grid-mr15 cc">
                    <!--Cancel--><?php esc_html_e('Cancel','6storage-rentals'); ?>
                </button>
                <button id="six-storage-go-back" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color cc">
                    <!--Previous--><?php esc_html_e('Previous','6storage-rentals'); ?>
                </button>
                <button id="six-storage-next-step" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-ml15 cc">
                    <!--Next Step--><?php esc_html_e('Next Step','6storage-rentals'); ?>
                </button>
            </div>
        </div>
        <div class="six-storage-modal six-storage-custom-scroller sm" id="six-storage-movein-modal">
            <div class="six-storage-modal-container-header six-storage-secondary-background">
                <div class="six-storage-title" id="six-storage-modalTitle">
                </div>
                <div>
                    <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat cc">&times;</button>
                </div>
            </div>
            <div class="six-storage-modal-content six-storage-white" id="six-storage-movein-modal-Body">
            </div>
        </div>
        <div id="six-storage-movein-signup-modal-term" style="display:none" class="six-storage-movein-signup-terms-modal">
            <div class="six-storage-movein-signup-terms-modal-content">
                <span class="six-storage-movein-signup-terms-close">&times;</span>
                <div class="six-storage-movein-signup-terms-msg">
                    <p class= "cc" ><?php esc_html_e('By clicking "Sign Up", you agree to our Terms of Use and Privacy Policy. You consent to receive phone calls and SMS messages from us to provide updates on your order and/or for marketing purposes. Message frequency depends on your activity. You may opt-out by texting "STOP" to 86753. Message and data rates may apply.','6storage-rentals'); ?> </p>
                </div>
            </div>
        </div>
        <div class="six-storage-modal" id="six-storage-browser-compatibility-modal" style="display:none">
            <div class="six-storage-modal-container-header">
                <div class="six-storage-title">
                    <!--Better Browser, Better Experience--><?php esc_html_e(' Better Browser, Better Experience','6storage-rentals'); ?>
                </div>
                <div>
                    <button id="six-storage-browser-comp-btn cc" class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat ">&times;</button>
                </div>
            </div>
            <div class="six-storage-modal-content six-storage-text-center" id="six-storage-browser-compatibility-Body">
                <img class="cc" width="300" src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/undraw_mobile_browsers_lib5.svg" alt="Browser Compatiblity ">
                <p class="six-storage-grey-text cc six-storage-grid-mt15 six-storage-text-title">
                    <!--Improve your experience, in one of the up to date version of the chrome, Firefox and Edge--><?php esc_html_e('Improve your experience, in one of the up to date version of the chrome, Firefox and Edge','6storage-rentals'); ?>
                </p>

                <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc secondary six-storage-modal-close cc" onclick="localStorage.setItem('ieBrowserLoaded', true);" id="six-storage-browser-comp-btn">
                    <!--Ok--><?php esc_html_e('Ok','6storage-rentals'); ?>
                </button>
            </div>
        </div>
        <!-- Modal Structure -->
        <div class="six-storage-alert-wrapper six-storage-d-none" id="six-storage-success-msg">
            <div class="six-storage-alert-box green six-storage-lighten-1 six-storage-grid-d-flex six-storage-justify-content-between  six-storage-align-items-center" id="six-storage-dv-alert">
                <div class="six-storage-text-section six-storage-grid-d-flex six-storage-align-items-center">
                    <div class="six-storage-icon-alert-box green six-storage-lighten-3 six-storage-rounded-circle six-storage-grid-mr10 six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center">
                        <i class="six-storage-material-icons notranslate six-storage-white-text six-storage-font-size-30" id="six-storage-alert-icon">thumb_up</i>
                    </div>
                    <p class="six-storage-alert-text cc six-storage-font-weight-bold six-storage-grid-m0 six-storage-white-text six-storage-alert-message" id="six-storage-alert-message">
                        <!--Successfully Updated--> <?php esc_html_e('Successfully Updated','6storage-rentals'); ?>
                    </p>
                </div>
                <div class="six-storage-action-close" onclick="sixStorageCloseAlert();">
                    <a class="cc six-storage-btn-floating six-storage-btn-large six-storage-waves-effect six-storage-waves-light six-storage-transparent six-storage-icon-alert-box six-storage-flexbox-important six-storage-align-items-center six-storage-justify-content-center six-storage-rounded-circle six-storage-text-decoration-none">
                        <i class="six-storage-material-icons notranslate six-storage-white-text">close</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="six-storage-row cc">
            <div class="cc six-storage-col six-storage-s12 six-storage-m12 six-storage-brand-name-div">
                <p class="cc six-storage-poweredByrentnowfooter sixStoragefloatright"><b> Powered By </b> <a class="cc" href="https://www.6storage.com/" target="_blank">6Storage</a></p>        
            </div> 
            <div class="six-storage-plugin-version-div">
                <p class="six-storage-plugin-version sixStoragefloatright">v<?php echo esc_attr($this->six_storage_plugin_version)?></p>
            </div>   
        </div> 
    </div>
</div>