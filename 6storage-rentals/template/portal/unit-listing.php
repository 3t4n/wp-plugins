<div id="six-storage-unit-listing-short-code" class="six-storage-grid-container-root six-storage-online-root-class">
     <div  id="six-storage-loading-container" style="display: none"></div>
     <div class="cc six-storage-row">
          <div class="col six-storage-s12">
               <h6 class="six-storage-text-center cc six-storage-priser-head six-storage-secondary-text six-storage-font-weight-bold"><!--Unit Prices--><?php esc_html_e('Unit Prices','6storage-rentals'); ?>:</h6>
          </div>
     </div>
     <div class="cc six-storage-row six-storage-justify-content-center six-storage-flexbox-important" style="display: <?php echo (get_option("six_storage_online_fc_business_user_toggle") == true || get_option("six_storage_online_fc_business_user_toggle") == 1) ? "" : "none " ?>;">
          <ul class="cc six-storage-tabs six-storage-priser-tabs six-storage-transparent six-storage-grid-d-flex six-storage-justify-content-center six-storage-flex-wrap  six-storage-overflow-inherit six-storage-grid-mb20">
               <li class="cc six-storage-tab six-storage-transparent six-storage-grid-ml0 six-storage-border-none six-storage-overflow-inherit grid-m10" id="six-storage-homePersonaluser-list"><a class="six-storage-booku-btn six-storage-primary-text overflow-inherit" id="six-storage-homePersonaluser" href="javascript:void(0);" onclick="return getUnits(false);"><!--Personal User--><?php esc_html_e('Personal User','6storage-rentals'); ?></a></li>
               <li class="cc six-storage-tab six-storage-transparent six-storage-grid-ml0 six-storage-border-none six-storage-overflow-inherit grid-m10" id="six-storage-homeBusinessuser-list"><a href="javascript:void(0);" class="six-storage-booku-btn six-storage-primary-text six-storage-overflow-inherit" id="six-storage-homeBusinessuser" onclick="return getUnits(true);"><!--Business User--><?php esc_html_e('Business User','6storage-rentals'); ?></a></li>
          </ul>
     </div>
     <div class="six-storage-container">
          <form id='six-storage-template-ajax-url' class="six-storage-border-none cc six-storage-grid-shadow-none six-storage-grid-p0 six-storage-grid-position-sticky six-storage-z-index-1" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" 
          data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" 
          data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" 
          data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>" 
          data-group_sizes="<?php echo esc_attr($this->six_storage_groupUnitsSizes) ?>" data-rent_single_unit="<?php echo esc_attr(get_option("six_storage_online_rent_single_unit")) ?>" 
          data-inclusive_of_tax="<?php echo esc_attr($this->six_storage_inclusiveofTax) ?>">
               <div class="six-storage-col six-storage-l9 m12 six-storage-no-unit-data six-storage-grid-mt10" id="six-storage-no-units-data" style="display:none">
                    <div class="six-storage-grid-mt10 six-storage-tenant-content six-storage-grid-d-flex six-storage-flex-column six-storage-justify-content-center six-storage-grid-pl30 six-storage-grid-pr30 six-storage-grid-pb30  six-storage-grid-pt30 six-storage-text-white">
                         <span><!--No units available--><?php esc_html_e('No units available','6storage-rentals'); ?></span>
                    </div>
               </div>
               <div class="six-storage-col six-storage-l9 six-storage-m12 six-storage-max-height-100 six-storage-overflow-y-scroll six-storage-custom-scroller position-relative" id="six-storage-online-unit-collection-contianer"></div>

               <div class="six-storage-grid-table-responsive">
                    <table class="six-storage-striped cc six-storage-whitespace-pre-table">
                         <tbody id="six-storage-booking-types">

                         </tbody>
                    </table>
               </div>
          </form>
     </div>
</div>