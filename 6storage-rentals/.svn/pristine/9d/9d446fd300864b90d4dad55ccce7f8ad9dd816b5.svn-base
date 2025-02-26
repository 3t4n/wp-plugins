<?php
    use SixStorageOnline\Base\Six_Storage_SettingsKeys;
    $obj = new Six_Storage_SettingsKeys(); 
?>
<style>
     .six-storage-update-btn-prmiary{
          background-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-primary-background-color{
          background-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-background-color{
          background-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-color{
          color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-color{
          color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-border-bottom-color{
          border-bottom-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-border-bottom-color{
          border-bottom-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-border-left-color{
          border-left-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-border-left-color{
          border-left-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-border-color{
          border-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
          color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-border-color{
          border-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
          color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-background{
          background:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-background{
          background:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }
     #six-storage-leases .six-storage-lease-action-lists{
          height: 54px;
          width:250px;
     }
</style>
<div id="six-storage-dashboard-page-load-container" class="six-storage-online-root-class" style="display:none;">
<div id="six-storage-online-dashboard-short-code" class="six-storage-grid-container-root">
<div  id="six-storage-loading-container">
     <div class="six-storage-progress">
          <div class="six-storage-indeterminate"></div>
     </div>
</div>
<a href="javascript:void(0)" id = "sixStorage-top-dashboard-btn" style="float:right;" class="six-storage-dashboard-btn-top cc six-storage-primary-color six-storage-text-decoration-none six-storage-text-center six-storage-user-action-dd six-storage-rounded-circle 
            six-storage-grid-d-inline-block six-storage-grid-ml-auto six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center six-storage-dropdown-trigger six-storage-grid-mt10 six-storage-profile-icon" data-target="six-storage-profile-dropdown" >
             <i class="six-storage-material-icons six-storage-color-inherit six-storage-small">account_circle</i>
             <i class="six-storage-material-icons six-storage-color-inherit">keyboard_arrow_down</i>
         </a>
         <ul id="six-storage-profile-dropdown" class="cc six-storage-white six-storage-dropdown-content">
         <li class="six-storage-grid-p0 cc" id="six-storage-select-options-user">
               <a href="#" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400">
                    <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">person_outline</i>
                    <span id="six-storage-user-name"></span>
               </a>
         </li>
         <li class="six-storage-divider six-storage-grid-p0 cc"></li>
         <li  class="six-storage-grid-p0 cc six-storage-select-options-mb" id="six-storage-select-options-dashboard">
             <a href="#dashboard" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400" onclick="return sixStorageToggleNavigation('dashboard');">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">dashboard</i>
                 <!--Dashboard--> <?php esc_html_e('Dashboard','6storage-rentals'); ?>
             </a>
         </li>
         <li  class="six-storage-grid-p0 cc six-storage-select-options-mb" id="six-storage-select-options-profile">
             <a href="#profile" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 font-weight-400" onclick="return sixStorageToggleNavigation('profile');">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">perm_identity</i>
                 <!--Profile--> <?php esc_html_e('Profile','6storage-rentals'); ?>
             </a>
         </li>
         <li  class="six-storage-grid-p0 cc six-storage-select-options-mb" id="six-storage-select-options-password">
             <a class="six-storage-modal-trigger six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400" href="javascript:void(0)" onclick="return sixStorageOpenPasswordModel();">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none ">visibility</i>
                 <!--Password--> <?php esc_html_e('Update Password','6storage-rentals'); ?>
             </a>
         </li>
         <li class="six-storage-divider six-storage-grid-p0 cc"></li>
         <li  class="six-storage-grid-p0 six-storage-select-options-mb cc" id="six-storage-select-options-logout">
             <a href="javascript:void(0)" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400" id="six-storage-log-out-btn">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">power_settings_new</i>
                 <!--Log Out--> <?php esc_html_e('Log Out','6storage-rentals'); ?>
             </a>
         </li>
     </ul>
<div class="six-storage-grid-container six-storage-grid-pt40 six-storage-main-content-dashboard" id="six-storage-dashboard-container">
     <?php 
          if (function_exists('pll_get_post')) {
               $dashboard_translated_Page = get_permalink(pll_get_post(get_option('six_storage_dashboard_page_id')));
               echo "<input type='hidden' id='six-storage-dashboard-url' value=".esc_attr($dashboard_translated_Page).">";
               $signIn_translated_page = get_permalink(pll_get_post(get_option('six_storage_sign_in_page_id')));
               echo "<input type='hidden' id='six-storage-log-in-url' value=".esc_attr($signIn_translated_page).">";
          }
          else{
               $dashboard_url = get_permalink(get_option('six_storage_dashboard_page_id'));
               echo "<input type='hidden' id='six-storage-dashboard-url' value=".esc_attr($dashboard_url).">";
               $signIn_url = get_permalink(get_option('six_storage_sign_in_page_id'));
               echo "<input type='hidden' id='six-storage-log-in-url' value=".esc_attr($signIn_url).">";
          }
     ?>
     <div class="six-storage-row cc six-storage-grey six-storage-lighten-5 six-storage-grid-p25 six-storage-rounded-15 six-storage-grid-xs-p0">
          <div class="cc six-storage-grid-d-flex six-storage-justify-content-center six-storage-flex-wrap six-storage-w-100" id="sixstorage_dashoard-data-table">
               <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 six-storage-grid-margin-auto">
                    <ul class="six-storage-tabs six-storage-grid-d-flex cc six-storage-flex-nowrap six-storage-justify-content-center six-storage-border-bottom-2 six-storage-dashboard-action-navbar">
                         <li class="six-storage-tab six-storage-col six-storage-l4 cc six-storage-transparent six-storage-grid-m0 six-storage-border-none six-storage-grid-p0" id="six-storage-defaultOpen" onclick="sixStorageOpenPage('leases')">
                              <a class="six-storage-grid-d-flex six-storage-justify-content-center six-storage-align-items-center six-storage-flexbox-important six-storage-text-decoration-none six-storage-grid-xs-p0">
                                   <i class="six-storage-material-icons notranslate six-storage-grid-mr10 six-storage-text-decoration-none">home_work</i>
                                   <span class="six-storage-navbar-text six-storage-dashboard-tab-text"><!--Leases--><?php esc_html_e('Leases','6storage-rentals'); ?></span>
                              </a>
                         </li>
                         <li class="six-storage-tab six-storage-col six-storage-l4 cc six-storage-transparent six-storage-grid-m0 six-storage-border-none six-storage-grid-p0 six-storage-defaultOpen-Invoice" id="six-storage-defaultOpen" onclick="sixStorageOpenPage('invoices')">
                              <a class="six-storage-active six-storage-grid-d-flex six-storage-justify-content-center six-storage-align-items-center six-storage-flexbox-important six-storage-text-decoration-none six-storage-grid-xs-p0">
                                   <i class="six-storage-material-icons notranslate six-storage-grid-mr10 six-storage-text-decoration-none">pending_actions</i>
                                   <span class="six-storage-navbar-text six-storage-dashboard-tab-text">
                                        <!--Invoices--> <?php esc_html_e('Invoices','6storage-rentals'); ?>
                                   </span>

                              </a>
                         </li>
                         <li class="six-storage-tab six-storage-col six-storage-l4 cc six-storage-transparent six-storage-grid-m0 six-storage-border-none six-storage-grid-p0" id="six-storage-defaultOpen" onclick="sixStorageOpenPage('transactions')">
                              <a  class=" six-storage-grid-d-flex six-storage-justify-content-center six-storage-align-items-center six-storage-flexbox-important six-storage-text-decoration-none six-storage-grid-xs-p0">
                                   <i class="six-storage-material-icons notranslate six-storage-grid-mr10 six-storage-text-decoration-none">credit_card</i>
                                   <span class="six-storage-navbar-text six-storage-dashboard-tab-text">
                                        <!--Transactions--> <?php esc_html_e('Transactions','6storage-rentals'); ?>
                                   </span>

                              </a>
                         </li>
                    </ul>
               </div>

               <div id="six-storage-leases" class="six-storage-col six-storage-s12 six-storage-card-content six-storage-white six-storage-z-depth-1 six-storage-rounded-15">
                    <div class="six-storage-row cc">
                    <div class="six-storage-grid-w-100 six-storage-dashboard-mob-head-text six-storage-leasetab six-storage-col cc s12 six-storage-grid-text-center six-storage-grid-mt10" style="display:none;">
                         <p class="cc"><!--Leases--><?php esc_html_e('Leases','6storage-rentals'); ?></p>
                    </div>  
                       <div class="six-storage-m12 six-storage-col six-storage-s12  six-storage-grid-mt15 cc six-storage-grid-d-flex six-storage-justify-content-end">
                              <div class="six-storage-grey six-storage-lighten-4 six-storage-grid-p5 six-storage-font-weight-bold six-storage-text-right six-storage-grid-ml-auto six-storage-border-left-primary-5 six-storage-secondary-border-left-color six-storage-rental-period-div six-storage-grey-text six-storage-text-darken-1">
                                   <span><!--Total balance amount to be paid--><?php esc_html_e('Total balance amount to be paid','6storage-rentals'); ?>:&nbsp;</span><span class="six-storage-grid-text-danger six-storage-total-due" id="six-storage-total-due"></span>
                              </div>
                         </div>
                    </div>
                    <div class="six-storage-grid-w-100 six-storage-topSearchUnits">
                         <div class="six-storage-searchunit" style="display:none">
                              <input type="text" class="six-storage-grid-form-control" placeholder="<?php esc_html_e('Search','6storage-rentals'); ?>.." name="search2" id="six-storage-rented-units-search" onchange="sixStorageGetRentedUnits();">
                              <span>
                                   <i class="six-storage-material-icons notranslate">search</i>
                              </span>
                         </div>
                         <div class="six-storage-grid-col-md-8 six-storage-text-right">
                              <h6 class="six-storage-h-6 cc six-storage-grid-m0 six-storage-text-blue" id="six-storage-action-message"></h6>
                         </div>
                    </div>
                    <div class="six-storage-grid-w-100 six-storage-leasetab six-storage-col cc six-storage-s12">
                         <div class="six-storage-grid-table-responsive">

                         <div id = "six_storage_loading">Loading ........</div>
                              <table class="six-storage-centered cc six-storage-leaseInfo six-storage-table-header-fixed" id ="six_storage_dashboard_table" style ="visibility:hidden;">
                                   <thead class="six-storage-grey six-storage-lighten-5">
                                        <tr class="cc">
                                             <th class="cc" scope="col" style="display: none"> <!--Select--> <?php esc_html_e('Select','6storage-rentals'); ?></th>
                                             <th id="mobile_responsive_font_size" class="cc" scope="col"> <!--Storage Details--> <?php esc_html_e('Storage Details','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Price Details--> <?php esc_html_e('Price Details','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Move-in Details--> <?php esc_html_e('Move-in Details','6storage-rentals'); ?></th>
                                             <th class="cc six-storage-min-w-25" scope="col"> <!--Storage Status--> <?php esc_html_e('Storage Status','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Actions--> <?php esc_html_e('Docs','6storage-rentals'); ?></th>  
                                             <th class="cc" scope="col" <?php if(get_option($obj->six_storage_online_fc_schedule_moveout_toggle) == '0'  ){ echo esc_attr('style=display:none;'); } ?>   > <!--Actions--> <?php esc_html_e('Actions','6storage-rentals'); ?></th>                                 
                                       </tr>
                                   </thead>
                                   <tbody id="six-storage-rented-units-table" class="six-storage-custom-scroller">
                                   </tbody>
                              </table>
                         </div>
                    </div>
                    <ul class="six-storage-pagination six-storage-leases-tab-pagination">
                                <li class="active six-storage-leases-tab-pagination-next"></li> 
                                <li class="active six-storage-leases-tab-pagination-previous"></li>                                                              
                    </ul>
               </div>
               <div id="six-storage-invoices" class="six-storage-col six-storage-s12 six-storage-card-content six-storage-white six-storage-z-depth-1 six-storage-rounded-15">
                    <div class="six-storage-row cc">
                    <div class="six-storage-grid-w-100 six-storage-dashboard-mob-head-text six-storage-leasetab six-storage-col cc six-storage-s12 six-storage-grid-text-center six-storage-grid-mt10" style="display:none;">
                         <p class="cc"> <!--Invoices--> <?php esc_html_e('Invoices','6storage-rentals'); ?></p>
                    </div>
                         <div class="six-storage-m12 six-storage-col six-storage-s12  six-storage-grid-mt15 cc six-storage-grid-d-flex six-storage-justify-content-end">
                              <div class="six-storage-grey six-storage-lighten-4 six-storage-grid-p10 six-storage-font-weight-bold six-storage-text-right six-storage-grid-ml-auto six-storage-border-left-primary-5 six-storage-secondary-border-left-color six-storage-rental-period-div six-storage-grey-text six-storage-text-darken-1" id="six-storage-total-payment-invoices">
                              </div>
                         </div>
                    </div>
                    <div class="six-storage-grid-w-100 six-storage-topSearchUnits grid-row six-storage-grid-m0 six-storage-row cc six-storage-flexbox-important six-storage-align-items-center six-storage-flex-wrap">
                         <div class="six-storage-grid-mr10" style="display: none">
                              <div class="six-storage-multiselect">
                                   <div class="six-storage-selectBox" onclick="showCheckboxes()">
                                        <select class="six-storage-grid-form-control cc">
                                             <option> <!--Select an option--> <?php esc_html_e('Select an option','6storage-rentals'); ?></option>
                                        </select>
                                        <div class="six-storage-overSelect"></div>
                                   </div>
                                   <div id="six-storage-checkboxes">
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span> <!--All Units--> <?php esc_html_e('All Units','6storage-rentals'); ?>
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span> <!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1001 
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span><!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1002
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span><!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1003
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span><!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1003
                                        </label>
                                   </div>
                              </div>
                         </div>

                         <div class="six-storage-searchunit" style="display:none">
                              <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                                   <input type="text" class="six-storage-grid-form-control" placeholder="<?php esc_html_e('Search','6storage-rentals'); ?>.." name="search2">
                                   <span>
                                        <i class="six-storage-material-icons notranslate">search</i>
                                   </span>
                              </form>
                         </div>
                         <div class="six-storage-col cc six-storage-m8 six-storage-s12 six-storage-text-left">
                              <h6 class="six-storage-h-6 cc six-storage-grid-m0 six-storage-text-blue" id="six-storage-action-message-invoices"></h6>
                         </div>
<!--                          
                         <div id="error-message" style="display: none;" class="six-storage-grid-text-danger six-storage-grid-mt15 six-storage-grid-mb15 six-storage-col cc six-storage-m12 six-storage-s12"></div> -->

                         <div class="six-storage-paynowBtn six-storage-grid-mt15 six-storage-grid-mb15 six-storage-col cc six-storage-m12 six-storage-s12 six-storage-text-right" id="six-storage-paynow-button-container" style="display: none;">
                              <button type="button" class="cc six-storage-btn primary six-storage-waves-effect six-storage-waves-light six-storage-flexbox-important six-storage-align-items-center six-storage-grid-ml-auto six-storage-grid-pt5 six-storage-grid-pb5" id="six-storage-button-pay-now" onclick="sixStorageRenderPayNowPopup();">

                                   <!--Pay Now--> <?php esc_html_e('Pay Now','6storage-rentals'); ?>
                                   <i class="six-storage-material-icons notranslate six-storage-grid-ml15">credit_card</i>
                              </button>
                         </div>

                         <div class="six-storage-paynowBtn six-storage-grid-mt15 six-storage-grid-mb15 six-storage-col cc six-storage-m12 six-storage-s12 six-storage-text-right" id="six-storage-paynow-button-container-ptwofour" style="display: none;">
                              <button type="button" class="cc six-storage-btn primary six-storage-waves-effect six-storage-waves-light six-storage-flexbox-important six-storage-align-items-center six-storage-grid-ml-auto six-storage-grid-pt5 six-storage-grid-pb5" id="six-storage-button-pay-now-ptwofour" >

                                   <!--Pay Now--> <?php esc_html_e('Pay Now','6storage-rentals'); ?>
                                   <i class="six-storage-material-icons notranslate six-storage-grid-ml15">credit_card</i>
                              </button>
                         </div>

                        

                    </div>
                    <div class="six-storage-grid-w-100 six-storage-topSearchUnits six-storage-text-right six-storage-grid-mt0  six-storage-grid-mb0">
                         <h6 class="six-storage-h-6 cc six-storage-grid-m0 six-storage-text-blue six-storage-d-none" id="six-storage-total-payment-invoices"><span><!--Total Amount--> <?php esc_html_e('Total Amount','6storage-rentals'); ?></span> : <strong>kr. 0</strong></h6>
                         <input type="hidden" id="six-storage-total-Netamount" />
                    </div>
                    <div class="six-storage-grid-w-100 six-storage-leasetab six-storage-col cc six-storage-s12">
                         <div class="six-storage-grid-table-responsive ">
                              <table class="six-storage-centered six-storage-leaseInfo cc six-storage-table-header-fixed">
                                   <thead class="six-storage-grey six-storage-lighten-5">
                                        <tr class="cc">
                                             <th class="cc" scope="col"> <!--Select--> <?php esc_html_e('Select','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Storage Details--> <?php esc_html_e('Storage Details','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Invoice Details--> <?php esc_html_e('Invoice Details','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Invoice Amount--> <?php esc_html_e('Invoice Amount','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Balance--> <?php esc_html_e('Balance','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Payment Receipt--> <?php esc_html_e('Payment Receipt','6storage-rentals'); ?></th>
                                        </tr>
                                   </thead>
                                   <tbody id="six-storage-invoices-list" class="six-storage-custom-scroller">
                                   </tbody>
                              </table>
                              <ul class="six-storage-pagination six-storage-invoices-tab-pagination">
                                                                        
                              </ul>                             
                         </div>
                    </div>
               </div>
               <div id="six-storage-transactions" class="six-storage-col six-storage-s12 six-storage-card-content six-storage-white six-storage-z-depth-1 six-storage-rounded-15">
                    <div class="six-storage-grid-w-100 six-storage-dashboard-mob-head-text six-storage-leasetab six-storage-col cc six-storage-s12 six-storage-grid-text-center six-storage-grid-mt10" style="display:none;">
                         <p class="cc"> <!--Transactions--> <?php esc_html_e('Transactions','6storage-rentals'); ?><p>
                    </div>
                    <div class="six-storage-row cc six-storage-flexbox-important six-storage-align-items-center six-storage-justify-content-end six-storage-online-width-auto">
                         <div class="six-storage-s12 six-storage-col six-storage-m3  six-storage-grid-mt15 cc  six-storage-justify-content-end six-storage-d-none">
                              <div class="six-storage-input-field six-storage-col six-storage-s12 cc">
                                   <select class="cc">
                                        <option class="cc" value="" disabled selected><!--Choose your option--> <?php esc_html_e('Choose your option','6storage-rentals'); ?></option>
                                        <option class="cc" value="1"><!--Option--> <?php esc_html_e('Option','6storage-rentals'); ?>1</option>
                                        <option class="cc" value="2"><!--Option--> <?php esc_html_e('Option','6storage-rentals'); ?>2</option>
                                        <option class="cc" value="3"><!--Option--> <?php esc_html_e('Option','6storage-rentals'); ?>3</option>
                                   </select>
                                   <label class="cc"> <!--Select Unit--> <?php esc_html_e('Select Unit','6storage-rentals'); ?></label>
                              </div>
                         </div>
                         <div class="six-storage-grid-mt25 six-storage-grid-pr10">
                              <a class='six-storage-dropdown-trigger six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-flexbox-important six-storage-align-items-center  six-storage-white-text six-storage-text-decoration-none' href='#' data-target='six-storage-dropdown1'><span><!--Get Statement--> <?php esc_html_e('Get Statement','6storage-rentals'); ?></span><i class="six-storage-material-icons notranslate six-storage-white-text six-storage-grid-ml15 six-storage-grid-d-inline-flex six-storage-align-items-center  six-storage-text-decoration-none">share</i></a>
                              <ul id='six-storage-dropdown1' class='six-storage-dropdown-content cc six-storage-transaction-dd-content'>
                                   <li class="cc"><a class="six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none" href="javascript:void(0)" onclick="return sixStorageGetTenantTransactionsStatement();"><i class="six-storage-material-icons notranslate six-storage-grid-mr10">mail_outline</i>
                                             <span class="six-storage-grid-d-flex"><!--Email me--> <?php esc_html_e('Email me','6storage-rentals'); ?></span>
                                        </a></li>
                                   <!-- <li class="cc"><a href="javascript:void(0)"><i class="six-storage-material-icons notranslate green-text">receipt</i>Excel</a></li> -->
                              </ul>
                         </div>
                    </div>
                    <div class="six-storage-grid-w-100 six-storage-topSearchUnits" style="display: none">
                         <div class="six-storage-grid-mr10">
                              <div class="six-storage-multiselect">
                                   <div class="six-storage-selectBox" onclick="showCheckboxes()">
                                        <select class="six-storage-grid-form-control cc">
                                             <option><!--Select an option--> <?php esc_html_e('Select an option ','6storage-rentals'); ?></option>
                                        </select>
                                        <div class="six-storage-overSelect"></div>
                                   </div>
                                   <div id="six-storage-checkboxes">
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span><!--All Units--> <?php esc_html_e('All Units','6storage-rentals'); ?>
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span> <!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1001
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span> <!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1002
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span> <!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1003
                                        </label>
                                        <label class="six-storage-container-checkbox">
                                             <input type="checkbox" checked="checked">
                                             <span class="six-storage-checkmark"></span> <!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?> 1004
                                        </label>
                                   </div>
                              </div>
                         </div>
                         <div class="six-storage-searchunit" style="display:none">
                              <input type="text" class="six-storage-grid-form-control" placeholder="<?php esc_html_e('Search','6storage-rentals'); ?>.." name="search2">
                              <span>
                                   <i class="six-storage-material-icons notranslate">search</i>
                              </span>
                         </div>
                         <div class="six-storage-grid-pl20 six-storage-SelectedUnits">
                              <P class="cc"><!--Selected Units--> <?php esc_html_e('Selected Units','6storage-rentals'); ?> <span><!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?>:101, <?php esc_html_e('Unit','6storage-rentals'); ?></span><span><!--Unit--> <?php esc_html_e('Unit','6storage-rentals'); ?>:102 <?php esc_html_e('Unit','6storage-rentals'); ?></span></P>
                         </div>
                    </div>
                    <div class="six-storage-grid-w-100 six-storage-leasetab six-storage-col cc six-storage-s12">
                         <div class="six-storage-grid-table-responsive">
                              <table class="six-storage-centered six-storage-leaseInfo cc six-storage-table-header-fixed" id="six-storage-transactions-grid">
                                   <thead class="six-storage-grey six-storage-lighten-5">
                                        <tr class="cc">
                                             <th class="cc" scope="col"><!--Date--> <?php esc_html_e('Date','6storage-rentals'); ?></th>
                                             <th class="cc six-storage-min-w-18" scope="col"><!--Category--> <?php esc_html_e('Category','6storage-rentals'); ?></th>
                                             <th class="cc six-storage-min-w-30" scope="col"><!--Description--> <?php esc_html_e('Description','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Debit--> <?php esc_html_e('Debit','6storage-rentals'); ?></th>
                                             <th class="cc six-storage-white-space-nowrap" scope="col"> <!--Credit--> <?php esc_html_e('Credit','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Balance--> <?php esc_html_e('Balance','6storage-rentals'); ?></th>
                                             <th class="cc" scope="col"> <!--Actions--> <?php esc_html_e('Actions','6storage-rentals'); ?></th>
                                        </tr>
                                   </thead>
                                   <tbody id="six-storage-transactions-grid-body" class="six-storage-custom-scroller">
                                   </tbody>
                              </table>
                              <ul class="six-storage-pagination six-storage-transaction-tab-pagination">
                                      
                            </ul>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<section class="six-storage-profile-section six-storage-main-content-dashboard" id="six-storage-profile-container" style="display: none ;">
     <div class="six-storage-grid-container cc six-storage-grid-pt40 six-storage-grid-xs-p0">
          <div class="six-storage-profile-wrapper six-storage-grey six-storage-lighten-5 six-storage-rounded-15">
               <div class="six-storage-row cc six-storage-grid-m0">
                    <div class="six-storage-col six-storage-s12 six-storage-text-center">
                         <h5 class="cc six-storage-grid-d-flex six-storage-justify-content-center six-storage-grid-mb25 six-storage-grid-mt30 six-storage-secondary-color"><i class="six-storage-material-icons notranslate six-storage-grid-mr10">settings</i> <!--Settings--> <?php esc_html_e('Profile','6storage-rentals'); ?></h5>
                    </div>
               </div>
               <div class="six-storage-row cc six-storage-flexbox-important six-storage-justify-content-center six-storage-grid-pb25 six-storage-flex-column six-storage-align-items-center">
                    <div class="six-storage-col six-storage-s12 six-storage-l8 cc six-storage-grid-margin-auto six-storage-grid-xs-p0">
                         <div class="six-storage-collapse-container six-storage-addon-collapsible">
                              <ul class="six-storage-collapsible cc">
                                   <li class="cc six-storage-active" id="six-storage-profile-tab" onclick="return sixStorageLoadProfilePage();">
                                        <div class="six-storage-collapsible-header cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold six-storage-justify-content-between six-storage-align-items-center six-storage-grid-mb0">
                                             <div class="six-storage-header-title six-storage-grid-d-flex six-storage-align-items-center six-storage-secondary-color">
                                                  <i class="six-storage-material-icons notranslate">person_outline</i><!--Personal Details--> <?php esc_html_e('Personal Details','6storage-rentals'); ?>
                                             </div>
                                             <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                             </svg>
                                        </div>
                                        <div class="six-storage-collapsible-body cc six-storage-white">
                                             <section class="six-storage-personal-detail">
                                                  <div class="six-storage-row cc six-storage-flexbox-important six-storage-flex-wrap six-storage-align-items-center">
                                                       <div class="six-storage-col cc six-storage-m4 six-storage-s12 six-storage-secondary-background-color six-storage-grid-d-flex six-storage-align-self-strech six-storage-grid-d-flex-column six-storage-align-items-center six-storage-justify-content-center">
                                                            <div class="six-storage-pic-wrapper six-storage-grid-p30 six-storage-text-center">
                                                                 <div class="six-storage-profile-pic six-storage-text-center">
                                                                      <img src="" class="six-storage-gambar cc six-storage-img-responsive six-storage-img-thumbnail" id="six-storage-item-img-output" />
                                                                      <!-- <svg width="8rem" height="8rem" viewBox="0 0 16 16" class="bi bi-person-circle six-storage-white-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                           <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                                                                           <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                                           <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                                                                      </svg> -->
                                                                      <!-- <img width="8rem" height="8rem" id="imgUpdate" class="bi cc bi-person-circle six-storage-white-text"> -->
                                                                      <div class="six-storage-profile-pic-action six-storage-grid-mt10" style="display: <?php echo esc_attr((get_option("six_storage_online_fs_ti_tenantphoto_toggle") == true || get_option("six_storage_online_fs_ti_tenantphoto_toggle") == 1) ? "" : "none") ?>;" >
                                                                           <a class="six-storage-text-center cc six-storage-user-action-dd six-storage-rounded-circle six-storage-grid-d-inline-block six-storage-grid-ml-auto six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center six-storage-dropdown-trigger" id="six-storage-updatePicture-dropdown-list" href="#" data-target="six-storage-profileImage-dropdown">
                                                                                <i class="six-storage-grey-text six-storage-material-icons notranslate">camera_alt</i>
                                                                           </a>
                                                                           <h6 class="cc six-storage-white-text six-storage-grid-p0 six-storage-camera-upload-inline"> 
                                                                               <!-- Tenant Info  --> <?php esc_html_e('Camera/Upload','6storage-rentals'); ?>
                                                                           </h6>
                                                                           <ul class='six-storage-dropdown-content cc six-storage-updateprofile-action-lists' id="six-storage-profileImage-dropdown">
                                                                                <li class="cc" style="display:none;" id="six-storage-select-options-view-btn"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" id="six-storage-select-options-view-photo"><!--View Photo--> <?php esc_html_e('View Photo','6storage-rentals'); ?></a></li>
                                                                                <li class="cc" id="six-storage-select-options-take-photo"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" ><!--Take Photo--> <?php esc_html_e('Take Photo','6storage-rentals'); ?></a></li>
                                                                                <li class="cc" id="six-storage-select-options-upload-photo"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" ><!--Upload Photo--> <?php esc_html_e('Upload Photo','6storage-rentals'); ?></a></li>
                                                                                <li class="cc" style="display:none;" id="six-storage-select-options-remove-btn"><a href="javascript:void(0)" class="six-storage-text-decoration-none cc" id="six-storage-remove-photo"><!--Remove Photo--> <?php esc_html_e('Remove Photo','6storage-rentals'); ?></a></li>
                                                                           </ul>
                                                                      </div>
                                                                 </div>
                                                                 <h5 class="cc six-storage-white-text six-storage-profile-name six-storage-grid-p0"></h5>
                                                                 <h6 class="six-storage-white-text cc" id="businessUser"></h6>
                                                            </div>
                                                       </div>
                                                       <div class="six-storage-col cc six-storage-m8 six-storage-s12 six-storage-grey six-storage-lighten-4 six-storage-grid-xs-p0">
                                                            <div class="six-storage-profile-form-wrapper six-storage-non-edit-form  six-storage-grid-xs-p0">
                                                                 <div class="six-storage-row cc six-storage-grid-mb25">
                                                                      <div class="six-storage-col cc six-storage-s12 six-storage-m12 six-storage-grid-d-flex six-storage-justify-content-between six-storage-align-items-center six-storage-grid-mb0">
                                                                           <p class="cc six-storage-grey-text six-storage-text-darken-2 six-storage-text-title-dashboard">
                                                                                <!-- Tenant Info  --> <?php esc_html_e('Tenant Info','6storage-rentals'); ?>
                                                                           </p>
                                                                           <div onclick="sixStorageToggleFormField()"><i class="six-storage-material-icons notranslate six-storage-cursor-pointer">edit</i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_first_name_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>  <?php if(get_option($obj->six_storage_online_fs_ti_first_name_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12  six-storage-grid-mb0">
                                                                           <label for="six-storage-firstName_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"> <!--Firstname--> <?php esc_html_e('Firstname','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12  six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-firstName_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-firstName_edit" type="text" class="cc six-storage-grid-m0" <?php if(get_option($obj->six_storage_online_fs_ti_first_name_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> placeholder="<?php esc_html_e('Enter Firstname','6storage-rentals'); ?>" />
                                                                                     <div style="display: none;" id="six-storage-firstName_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Firstname--><?php esc_html_e('Please Enter Firstname','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_last_name_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?> <?php if(get_option($obj->six_storage_online_fs_ti_last_name_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12  six-storage-grid-mb0">
                                                                           <label for="six-storage-lastName_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Lastname--> <?php esc_html_e('Lastname','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12  six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-lastName_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-lastName_edit" type="text" class="cc six-storage-grid-m0" <?php if(get_option($obj->six_storage_online_fs_ti_last_name_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> placeholder="<?php esc_html_e('Enter Lastname','6storage-rentals'); ?>" />
                                                                                     <div style="display: none;" id="six-storage-lastName_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Lastname--><?php esc_html_e('Please Enter Lastname','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_SSN_is_mandatory) == '1'){ echo esc_attr ("data-element_required='true'"); } ?> style="display: <?php echo ((get_option("six_storage_online_fs_ti_SSN_toggle") == true || get_option("six_storage_online_fs_ti_SSN_toggle") == 1) ? "" : "none") ?>;">
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12  six-storage-grid-mb0">
                                                                           <label for="six-storage-ssn_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"> <!--Firstname--> <?php esc_html_e('SSN','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12  six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-ssn_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-ssn_edit" maxlength="15" type="text"  onfocus="sixStorageClearConfidential()" class="cc six-storage-grid-m0" <?php if(get_option($obj->six_storage_online_fs_ti_SSN_is_mandatory) == '1'){ echo esc_attr("data-element_required='true'"); } ?> placeholder="<?php esc_html_e('SSN','6storage-rentals'); ?>" />
                                                                                     <div style="display: none;" id="six-storage-ssn_edit-err" class="six-storage-invalid-feedback"><!--Please Enter SSN--><?php esc_html_e('Please Enter SSN','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_phone1_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                                                 <?php if(get_option($obj->six_storage_online_fs_ti_phone1_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-phoneNumber_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Mobile--> <?php esc_html_e('Mobile','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-phoneNumber_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-phone-input six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-phoneNumber_edit" type="text" class="cc six-storage-grid-m0 six-storage-telephone" <?php if(get_option($obj->six_storage_online_fs_ti_phone1_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> placeholder="<?php esc_html_e('Enter Mobile','6storage-rentals'); ?>" disabled="disabled" />
                                                                                </div>
                                                                                <div style="display: none;" id="six-storage-phoneNumber_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Mobile--><?php esc_html_e('Please Enter Mobile','6storage-rentals'); ?></div>
                                                                           </div>
                                                                      </div>
                                                                 </div>


                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_phone2_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>

                                                                 <?php if(get_option($obj->six_storage_online_fs_ti_phone2_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                                                 
                                                                 
                                                                 <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-phone2Label" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Phone 2--> <?php esc_html_e('Phone 2','6storage-rentals'); ?></label>
                                                                 </div>

                                                                 <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-phoneNumber2_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-phone-input six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-phoneNumber2_edit" type="text" class="cc six-storage-grid-m0 six-storage-telephone" <?php if(get_option($obj->six_storage_online_fs_ti_phone2_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> placeholder="<?php esc_html_e('Enter Phone 2','6storage-rentals'); ?>"  />
                                                                                     <div style="display: none;" id="six-storage-phoneNumber2_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Phone 2--><?php esc_html_e('Please Enter Phone 2','6storage-rentals'); ?></div>
                                                                                </div>
                                                                               
                                                                           </div>
                                                                      </div>
                                                                    </div>

                                                                <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_email_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                
                                                                      <?php if(get_option($obj->six_storage_online_fs_ti_email_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12  six-storage-grid-mb0">
                                                                           <label for="six-storage-email_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Email--><?php esc_html_e('Email','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12  six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-email_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-email_edit" type="text" class="cc six-storage-grid-m0" placeholder="<?php esc_html_e('Enter Email','6storage-rentals'); ?>" <?php if(get_option($obj->six_storage_online_fs_ti_email_is_mandatory) == '1') { echo esc_attr('data-element_required="true"'); }; ?> disabled="disabled" />
                                                                                </div>
                                                                                <div style="display: none;" id="six-storage-email_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Email--><?php esc_html_e('Please Enter Email','6storage-rentals'); ?></div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_address1_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?> <?php if(get_option($obj->six_storage_online_fs_ti_address1_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-addressLineOne_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Address Line 1--><?php esc_html_e('Address Line 1','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                            <div class="six-storage-edit-text" id="six-storage-addressLineOne_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <textarea id="six-storage-addressLineOne_edit" type="text" class="cc six-storage-grid-m0 six-storage-materialize-textarea" rows="2" style="resize: none;"  <?php if(get_option($obj->six_storage_online_fs_ti_address1_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?>  placeholder="<?php esc_html_e('Enter Address Line 1','6storage-rentals'); ?>"></textarea>
                                                                                     <div style="display: none;" id="six-storage-addressLineOne_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Address Line 1--><?php esc_html_e('Please Enter Address Line 1','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_address2_is_mandatory) == '1'){ echo esc_attr ("data-element_required='true'"); } ?> style="display: <?php echo ((get_option("six_storage_online_fs_ti_address2_toggle") == true || get_option("six_storage_online_fs_ti_address2_toggle") == 1) ? "" : "none") ?>;">
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-addressLineTwo_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Address Line 2--><?php esc_html_e('Address Line 2','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-addressLineTwo_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <textarea id="six-storage-addressLineTwo_edit" type="text" class="cc six-storage-grid-m0 six-storage-materialize-textarea" rows="2" style="resize: none;" <?php if(get_option($obj->six_storage_online_fs_ti_address2_toggle) == '0'){ echo esc_attr("data-element_hidden='true'"); } ?> <?php if(get_option($obj->six_storage_online_fs_ti_address2_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> placeholder="<?php esc_html_e('Enter Address Line 2','6storage-rentals'); ?>"></textarea>
                                                                                     <div style="display: none;" id="six-storage-addressLineTwo_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Address Line 2--><?php esc_html_e('Please Enter Address Line 2','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center"  <?php if(get_option($obj->six_storage_online_fs_ti_city_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?>
                                                                      <?php if(get_option($obj->six_storage_online_fs_ti_city_is_mandatory) == '1') { echo esc_attr ("data-element_required='true'"); }; ?>>


                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-city_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--City--><?php esc_html_e('City','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-city_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-city_edit" type="text" class="cc six-storage-grid-m0"  <?php if(get_option($obj->six_storage_online_fs_ti_city_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> placeholder="<?php esc_html_e('Enter City','6storage-rentals'); ?>"  />
                                                                                     <div style="display: none;" id="six-storage-city_edit-err" class="six-storage-invalid-feedback"><!--Please Enter City--><?php esc_html_e('Please Enter City','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center"  <?php if(get_option($obj->six_storage_online_fs_ti_state_is_mandatory) == '1'){ echo esc_attr ("data-element_required='true'"); } ?> style="display: <?php echo ((get_option("six_storage_online_fs_ti_state_toggle") == true || get_option("six_storage_online_fs_ti_state_toggle") == 1) ? "" : "none") ?>;">
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-state_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--State--><?php esc_html_e('State','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-state_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-state_edit" type="text" class="cc six-storage-grid-m0"  <?php if(get_option($obj->six_storage_online_fs_ti_state_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> placeholder="<?php esc_html_e('Enter State','6storage-rentals'); ?>"  />
                                                                                     <div style="display: none;" id="six-storage-state_edit-err" class="six-storage-invalid-feedback"><!--Please Enter State--><?php esc_html_e('Please Enter State','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center"  <?php if(get_option($obj->six_storage_online_fs_ti_zip_postalcode_is_mandatory) == '1'){ echo esc_attr ("data-element_required='true'"); } ?> style="display: <?php echo ((get_option("six_storage_online_fs_ti_zip_postalcode_toggle") == true || get_option("six_storage_online_fs_ti_zip_postalcode_toggle") == 1) ? "" : "none") ?>;">
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-zipCode_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Postalcode--><?php esc_html_e('Postal Code','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-zipCode_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-zipCode_edit"  <?php if(get_option($obj->six_storage_online_fs_ti_zip_postalcode_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> type="text" class="cc six-storage-grid-m0" placeholder="<?php esc_html_e('Please Enter Postal Code','6storage-rentals'); ?>"  />
                                                                                     <div style="display: none;" id="six-storage-zipCode_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Postalcode--><?php esc_html_e('Please Enter Postal Code','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-profile-align-center" <?php if(get_option($obj->six_storage_online_fs_ti_country_is_mandatory) == '1'){ echo esc_attr ("data-element_required='true'"); } ?> style="display: <?php echo ((get_option("six_storage_online_fs_ti_country_toggle") == true || get_option("six_storage_online_fs_ti_country_toggle") == 1) ? "" : "none") ?>;">
                                                                      <div class="six-storage-col cc six-storage-l4 six-storage-s12 six-storage-grid-mb0">
                                                                           <label for="six-storage-country_edit" class="cc six-storage-grid-d-inline-block six-storage-custom-label six-storage-position-relative"><!--Country--><?php esc_html_e('Country','6storage-rentals'); ?></label>
                                                                      </div>
                                                                      <div class="six-storage-col cc six-storage-l8 six-storage-s12 six-storage-grid-mb0">
                                                                           <div class="six-storage-edit-text" id="six-storage-country_display">
                                                                           </div>
                                                                           <div class="six-storage-edit-control six-storage-d-none">
                                                                                <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0 six-storage-mobile-padding-left-0">
                                                                                     <input id="six-storage-country_edit" type="text" class="cc six-storage-grid-m0" placeholder="<?php esc_html_e('Enter Country','6storage-rentals'); ?>" <?php if(get_option($obj->six_storage_online_fs_ti_country_is_mandatory) == '1') { echo esc_attr("data-element_required='true'"); }; ?> />
                                                                                     <div style="display: none;" id="six-storage-country_edit-err" class="six-storage-invalid-feedback"><!--Please Enter Country--><?php esc_html_e('Please Enter Country','6storage-rentals'); ?></div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="six-storage-row cc six-storage-grid-mt20 six-storage-profile-detail-actions six-storage-d-none">
                                                                      <div class="six-storage-col six-storage-s12 cc six-storage-text-center six-storage-invalid-feedback" id="six-storage-profile-update-response"></div>
                                                                      <div class="six-storage-col six-storage-s12 cc six-storage-text-center">
                                                                           <button class="cc six-storage-waves-effect six-storage-waves-light six-storage-btn six-storage-primary-background six-storage-grid-m10" onclick="sixStorageUpdateProfile()"><!--Save--><?php esc_html_e('Save','6storage-rentals'); ?></button>
                                                                           <button class="cc six-storage-waves-effect six-storage-waves-light six-storage-btn six-storage-red six-storage-grid-m10" onclick="sixStorageToggleFormField()"><!--Cancel--><?php esc_html_e('Cancel','6storage-rentals'); ?></button>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </section>
                                        </div>
                                   </li>
                                   <li class="cc" id="six-storage-card-details-container" onclick="return sixStorageCheckPaymentmode();">
                                        <div class="six-storage-collapsible-header cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold six-storage-justify-content-between six-storage-align-items-center six-storage-grid-mb0">
                                             <div class="six-storage-header-title six-storage-grid-d-flex six-storage-align-items-center six-storage-secondary-color">
                                                  <i class="six-storage-material-icons notranslate">credit_card</i><!--My Cards--> <?php esc_html_e('My Cards','6storage-rentals'); ?>
                                             </div>
                                             <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                             </svg>
                                        </div>
                                        <div class="six-storage-collapsible-body cc six-storage-white">
                                             <div id="six-storage-card-action-sepa">
                                                  
                                             </div>
                                        </div>
                                   </li>
                                   <li class="cc" id="six-storage-identification-documents" onclick="return sixStorageGetUserDocuments();" <?php if(get_option($obj->six_storage_online_fs_ti_upload_document_toggle) == '0'){ echo esc_attr ("data-element_hidden='true'"); } ?> >
                                        <div class="six-storage-collapsible-header six-storage-secondary-color cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold six-storage-justify-content-between six-storage-align-items-center six-storage-grid-mb0">
                                             <div class="six-storage-header-title six-storage-grid-d-flex six-storage-align-items-center six-storage-secondary-color">
                                             <i class="six-storage-material-icons notranslate">text_snippet</i> <!--ID Detail and File Upload--> <?php esc_html_e('File Uploads','6storage-rentals'); ?>
                                             </div>
                                             <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                             </svg>
                                        </div>
                                        <div class="six-storage-collapsible-body cc six-storage-white">
                                             <div class="six-storage-document-section">
                                                  <div class="six-storage-row cc">
                                                       <div class="six-storage-col cc six-storage-m6 six-storage-s6">
                                                            <p class="cc six-storage-grey-text six-storage-text-darken-2 six-storage-text-title six-storage-text-bold"> <!--Existing Files--> <?php esc_html_e('Existing Files','6storage-rentals'); ?></p>
                                                       </div>
                                                       <div class="six-storage-col cc six-storage-m6 six-storage-s6 six-storage-grid-d-flex six-storage-justify-content-end six-storage-justify-content-start-mob">
                                                            <button data-target="six-storage-document-upload" id="six-storage-document-upload-btn" class="cc six-storage-waves-effect six-storage-waves-light btn six-storage-primary-background-color" onclick="return sixStorageUploadDocumentModal();">
                                                                 <i class="six-storage-material-icons notranslate six-storage-grid-mr10">cloud_upload</i>
                                                                 <span><!--File Uploads--> <?php esc_html_e('File Uploads','6storage-rentals'); ?></span>
                                                            </button>
                                                       </div>
                                                  </div>
                                                  <div class="six-storage-row cc">
                                                       <div class="six-storage-col cc six-storage-s12 six-storage-l12">
                                                            <div class="six-storage-table-doc-wrapper six-storage-leasetab">
                                                                 <table class="six-storage-table six-storage-centered cc six-storage-grid-table six-storage-leasetab six-storage-table-header-fixed">
                                                                      <thead>
                                                                           <tr class="cc">
                                                                                <th class="cc"> <!--Upload Date--> <?php esc_html_e('Upload Date','6storage-rentals'); ?></th>
                                                                                <th class="cc"> <!--File Name--> <?php esc_html_e('File Name','6storage-rentals'); ?></th>
                                                                                <th class="cc"> <!--Check Document--> <?php esc_html_e('View File','6storage-rentals'); ?></th>
                                                                           </tr>
                                                                      </thead>

                                                                      <tbody id="six-storage-tbody-documents-table">

                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                        </div>
                                   </li>
                                   <li class="cc" id="six-storage-insurance-policy"  <?php if(get_option($obj->six_storage_online_fs_ad_insurance_toggle) == '0'){ echo esc_attr('data-element_hidden="true"'); } ?> >
                                        <div class="six-storage-collapsible-header six-storage-secondary-color cc six-storage-grey-text six-storage-text-darken-3 six-storage-font-weight-bold six-storage-justify-content-between six-storage-align-items-center six-storage-grid-mb0" onclick="return sixStorageGetTenantInsuranceDetails()">
                                             <div class="six-storage-header-title six-storage-grid-d-flex six-storage-align-items-center six-storage-secondary-color">
                                             <i class="six-storage-material-icons notranslate">security</i> <!--Insurance Document--> <?php esc_html_e('My Insurance','6storage-rentals'); ?>
                                             </div>
                                             <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                             </svg>
                                        </div>
                                        <div class="six-storage-collapsible-body cc six-storage-white">

                                        <div class="six-storage-insurance-section">
                                        
                                                  <div class="six-storage-row cc">
                                                       <div class="six-storage-col cc six-storage-s12 six-storage-l12 six-storage-custom-scroller-insurance six-storage-custom-scroller">
                                                            <div class="six-storage-leasetab six-stoarge-insurance-table">
                                                                 <!-- <table class="six-storage-grid-table cc six-storage-grid-shadow-sm six-storage-text-center six-storage-grid-bg-white">
                         
                                                                 </table> -->
                                                                      

                                                                      <div id="sixStorageGetTenetInsurancedetails">

                                                                      
                                                                      </div>
                                                                 
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                        </div>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section> 
<section id="sixStorageInsurancePage" style="display: none ;">
 <div>
 <div class="six-storage-grid-container  six-storage-grid-p5 cc  six-storage-grid-mt40 six-storage-grid-xs-p0 six-storage-primary-background-color">

 <div class="six-storage-row cc six-storage-grid-m0">
  <div class="six-storage-col six-storage-s12 six-storage-l6 six-storage-text-left">
   <p class="cc six-storage-grid-d-flex six-storage-justify-content-center six-storage-text-white six-storage-grid-mb25 six-storage-grid-mt30"> <?php esc_html_e('TENANT INSURANCE PLANS','6storage-rentals'); ?></p>                  
  </div>
    <div class="six-storage-col six-storage-s12 six-storage-l6 six-storage-text-left ">
     <h6 class="cc six-storage-grid-d-flex six-storage-justify-content-center six-storage-text-white six-storage-grid-mb25 six-storage-grid-mt30 six-storage-grid-p10"> <?php esc_html_e('KNOW MORE OF WHAT YOUR INSURANCE PLAN COVERS','6storage-rentals'); ?></h5>
    </div>
  </div>
 </div>
     </div>

 <div class="six-storage-grid-container six-storage-row cc six-storage-grid-mt40">

 <div class="six-storage-col six-storage-s12 six-storage-l6 cc">
   <form action="#" id="six-storage-insuance-selection-structure">
     <?php esc_html_e('Payment Option','6storage-rentals'); ?>
   
   </form>
   <div class="six-storage-col six-storage-s12 six-storage-l12 six-storage-text-center ">
   <div id="six-storage-insuranceContinueBuynowErrormsg" class="six-storage-invalid-feedback cc six-storage-grid-d-flex six-storage-justify-content-center" style="display: none;" > 
   <?php esc_html_e('Please Select the Insurance Plan','6storage-rentals'); ?>
    </div> </div>



 </div>

   <div class="six-storage-col six-storage-s12 six-storage-l6 cc six-storage-insurance-message"> 
      <p>   
      <?php esc_html_e("Storage insurance protects against loss of the contents of your storage unit under certain circumstances. The types of damage covered depends on your specific policy and carrier, but it will usually cover events that are out of your control like lightning, vandalism, wind, tornadoes, hurricanes, fire, smoke, hail, explosions, plumbing leaks, and burglary.",'6storage-rentals'); ?>      
     </p>
  <div>

 </div>
 </div>

  <div class="six-storage-down-arrow"></div>

  <div class="six-storage-col six-storage-l12 six-storage-grid-d-flex six-storage-grid-mb20 six-storage-grid-mt20 six-storage-grid-p15 six-storage-justify-content-center six-storage-mobile-res-buttons" id="six-storage-stepping-buttons" style="display: flex;">
  
     <button id="six-storage-insurance-go-back" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-border-radius cc"> <?php esc_html_e('Back ','6storage-rentals'); ?> </button>
     <button id="six-storage-insurance-buy-now" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-secondary-background-color six-storage-grid-ml15 six-storage-border-radius  six-storage-grid-ml40 cc" style="display: block;"> <?php esc_html_e('Continue Buying','6storage-rentals'); ?></button>
     <button id="six-storage-own-insurance" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-secondary-background-color six-storage-grid-ml15 six-storage-border-radius  six-storage-grid-ml40 cc" style="display: none;"><?php esc_html_e('Save Insurance','6storage-rentals'); ?></button>
     <button id="six-storage-change-insurance" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-secondary-background-color six-storage-grid-ml15 six-storage-border-radius  six-storage-grid-ml40 cc" style="display: none;"><?php esc_html_e('Change Plan','6storage-rentals'); ?></button>
 
</div>
</section> 
<section id="sixStorageBuynowPage" style="display:none;">
 <div class="six-storage-row cc six-storage-grid-mt40">

  <div class="six-storage-col six-storage-s12 six-storage-l6 cc six-storage-grid-mt40">
  <div class="six-storage-grid-border six-storage-max-width overflow-scroll" style="height:780px" id="six-storage-buying-insurance-agreement">
   
   </div>

  </div>
 

  <div class="six-storage-col six-storage-s12 six-storage-l6 cc" id="payment-container" style=""> 

  <div class="six-storage-tenant-chckbox six-storage-grid-mb15 six-storage-grid-mt20">
  
  <div >
     <label class="cc">
        <input type="checkbox" class="cc six-storage-input-field" id="six-storage-insurance-condition" onchange="sixStorageDisplayInsurancePaymentform();">
        <span>
           <!--I have read the lease agreement-->  <?php esc_html_e('I have read & accepted the insurance terms & conditions','6storage-rentals'); ?>
        </span>
     </label>
     <div style="display: none;" id="six-storage-insurance-terms-err" class="six-storage-invalid-feedback">
        <!--Please confirm that you have read the lease agreement.-->Please confirm that you have read the insurance terms & conditions<span></span>
     </div>
  </div>
</div>

        <div  class="six-storage-modal-container-header six-storage-secondary-background six-storage-z-depth-2 six-storage-border-left-right-radius paymentDetailsHeader">
          <div class="six-storage-col six-storage-s12 six-storage-l12 six-storage-text-center ">
      <h6 class="cc six-storage-grid-d-flex six-storage-justify-content-center six-storage-primary-color six-storage-grid-mb25 six-storage-grid-mt30 six-storage-grid-p10 six-storage-color-white"> <?php esc_html_e('PAYMENT DETAILS','6storage-rentals'); ?></h5>
      </div>

       </div>
       <div  class="six-storage-col six-storage-s12 six-storage-card-content six-storage-white six-storage-z-depth-2 six-storage-active six-storageborder-radius-bottom paymentDetailsBody"  style="height:730px;">

       <div class="six-storage-grid-table-responsive" >
        <table class="six-storage-grid-table cc six-storage-grid-shadow-sm six-storage-text-center six-storage-grid-bg-white ">
     
          <tbody id="sixStorageGetInsuranceUnitTenantDetails" >
          
          
          </tbody>
        </table>
          </div>

          <div class="six-storage-l12 six-storage-text-center" id="six-storage-section-payment-option" style="display: none">

          </div>
          <div class="six-storage-col six-storage-l12 six-storage-s12  six-storage-grid-p0 cc six-storage-text-center" id="six-storage-insurance-pay-later-div" style="display: none;">
               <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color"  id="six-storage-insurance-paylater-button">  <?php esc_html_e('Pay Later','6storage-rentals'); ?> </button>
          </div>
          <div id="six-storage-insurance-paymentform-Body">
              



          </div>


         
       </div>
      
    
       <div>
   </div>

 </div>

 <div class="six-storage-col six-storage-l12 six-storage-grid-d-flex six-storage-grid-mb20 six-storage-grid-mt70 six-storage-justify-content-center" id="six-storage-stepping-buttons" style="display: flex;">
     <button id="six-storage-insurance-go-back" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color cc" onclick="sixStorageInsuranceGoprevious()"><!--Previous--><?php esc_html_e('Previous ','6storage-rentals'); ?></button>
     
 </div>

</section>
<?php if (function_exists('pll_get_post')) {
        $dashboard_url_page = get_permalink(pll_get_post(get_option('six_storage_dashboard_page_id')));
    }
    else{
        $dashboard_url_page = get_permalink(get_option('six_storage_dashboard_page_id'));
    }?>
<section class="six-storage-grid-pt10" id="six-storage_buy-insurance-thank-you-page" style="display: none;">
 <div class="six-storage-grid-row six-storage-moveinSuccess">
    <div class="six-storage-grid-col-md-12">
        <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/insurance-success.svg" width="400" class="six-storage-grid-margin-auto cc grid-p35">
        <div >
            <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                <!--You have successfully Moved in--><?php esc_html_e('Insurance Purchased Successfully','6storage-rentals'); ?><span></span>
            </h5>
            <p class="six-storage-grey-text cc six-storage-grid-mb15 six-storage-d-none"> Check your email for Order Details or view Dashboard</p>
        </div>
        <a class="six-storage-waves-effect six-storage-insurance-btn six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mb15 six-storage-grid-pr20 six-storage-grid-pl20" href="<?php echo esc_attr($dashboard_url_page) ?>"><!--Go to Dashboard--><?php esc_html_e('Continue','6storage-rentals'); ?></a>
    </div>
 </div>
</section>

<section  id="six-storage_change-insurance-thank-you-page" style="display: none;">
 <div class="six-storage-grid-row six-storage-moveinSuccess">
    <div class="six-storage-grid-col-md-12">
        <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/insurance-success.svg" width="400" class="six-storage-grid-margin-auto cc grid-p35">
        <div >
            <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                <!--You have successfully Moved in--><?php esc_html_e('Insurance Changed Successfully','6storage-rentals'); ?><span>.</span>
            </h5>
            <p class="six-storage-grey-text cc six-storage-grid-mb15 six-storage-d-none" > Check your email for Order Details or view Dashboard</p>
        </div>
        <a class="six-storage-waves-effect six-storage-insurance-btn six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mb15 six-storage-grid-pr20 six-storage-grid-pl20" href="<?php echo esc_attr($dashboard_url_page) ?>"><!--Go to Dashboard--><?php esc_html_e('Continue','6storage-rentals'); ?></a>
    </div>
 </div>
</section>
<section  id="six-storage_save-insurance-thank-you-page" style="display: none;">
 <div class="six-storage-grid-row six-storage-moveinSuccess">
    <div class="six-storage-grid-col-md-12">
        <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/insurance-success.svg" width="400" class="six-storage-grid-margin-auto cc grid-p35">
        <div >
            <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                <!--You have successfully Moved in--><?php esc_html_e('Insurance Saved Successfully','6storage-rentals'); ?><span></span>
            </h5>
            <p class="six-storage-grey-text cc six-storage-grid-mb15 six-storage-d-none" > Check your email for Order Details or view Dashboard</p>
        </div>
        <a class="six-storage-waves-effect six-storage-insurance-btn six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mb15 six-storage-grid-pr20 six-storage-grid-pl20" href="<?php echo esc_attr($dashboard_url_page) ?>"><!--Go to Dashboard--><?php esc_html_e('Continue','6storage-rentals'); ?></a>
    </div>
 </div>
</section>

<section  id="six-storage_buy-insurance-failed-page" style="display: none;">
 <div class="six-storage-grid-row six-storage-moveinSuccess">
    <div class="six-storage-grid-col-md-12">
        <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/insurance-failed.svg" width="400" class="six-storage-grid-margin-auto cc grid-p35">
        <div >
            <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                <!--You have successfully Moved in--><?php esc_html_e('Insurance Not Purchased','6storage-rentals'); ?><span></span>
            </h5>
            
        </div>
        <a class="six-storage-waves-effect six-storage-insurance-btn six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mb15 six-storage-grid-pr20 six-storage-grid-pl20" href="<?php echo esc_attr($dashboard_url_page) ?>"><!--Go to Dashboard--><?php esc_html_e('Continue','6storage-rentals'); ?></a>
    </div>
 </div>
</section>
  
<section  id="six-storage_change-insurance-failed-page" style="display: none;">
 <div class="six-storage-grid-row six-storage-moveinSuccess">
    <div class="six-storage-grid-col-md-12">
        <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/insurance-failed.svg" width="400" class="six-storage-grid-margin-auto cc grid-p35">
        <div >
            <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                <!--You have successfully Moved in--><?php esc_html_e('Insurance Plan Not Changed','6storage-rentals'); ?><span></span>
            </h5>
            
        </div>
        <a class="six-storage-waves-effect six-storage-insurance-btn six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mb15 six-storage-grid-pr20 six-storage-grid-pl20" href="<?php echo esc_attr($dashboard_url_page) ?>"><!--Go to Dashboard--><?php esc_html_e('Continue','6storage-rentals'); ?></a>
    </div>
 </div>
</section>

<section  id="six-storage_save-insurance-failed-page" style="display: none;">
 <div class="six-storage-grid-row six-storage-moveinSuccess">
    <div class="six-storage-grid-col-md-12">
        <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/insurance-failed.svg" width="400" class="six-storage-grid-margin-auto cc grid-p35">
        <div >
            <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                <!--You have successfully Moved in--><?php esc_html_e('Insurance Not Saved','6storage-rentals'); ?><span></span>
            </h5>
            
        </div>
        <a class="six-storage-waves-effect six-storage-insurance-btn six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mb15 six-storage-grid-pr20 six-storage-grid-pl20" href="<?php echo esc_attr($dashboard_url_page) ?>"><!--Go to Dashboard--><?php esc_html_e('Continue','6storage-rentals'); ?></a>
    </div>
 </div>
</section>
<div id="six-storage-document-upload" class="six-storage-modal cc">
     <div class="six-storage-modal-container-header six-storage-secondary-background">
          <div class="six-storage-title">
               <!--File Uploads--> <?php esc_html_e('File Uploads','6storage-rentals'); ?>
          </div>
          <div>
               <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat">&times;</button>
          </div>
     </div>
     <form autocomplete="off" id="six-storage-upload-file-input" class="cc">
          <div class="six-storage-modal-content six-storage-position-relative">
               <div class="six-storage-row cc">
                    <div class="six-storage-input-field six-storage-col six-storage-s12 cc" data-element_required="'true'">
                         <input type="text" class="cc" id="six-storage-user-document-name" autocomplete="off" />
                         <label class="six-storage-active cc"> <!--File Name--> <?php esc_html_e('File Name','6storage-rentals'); ?></label>
                         <div style="display: none;" id="six-storage-user-document-name-err" class="six-storage-invalid-feedback"> <!--Please Enter File Name--> <?php esc_html_e('Please Enter File Name','6storage-rentals'); ?></div>
                    </div>
                    <div class=" cc six-storage-s12 six-storage-col">
                         <div class="cc six-storage-grid-d-flex six-storage-align-items-center">
                              <div class="cc six-storage-file-field six-storage-input-field six-storage-grid-mb0 six-storage-grid-d-flex six-storage-align-items-center six-storage-flex-grow-1">
                                   <div class="six-storage-btn cc six-storage-secondary-background six-storage-choose-file">
                                        <span> <!--Choose a file--> <?php esc_html_e('Choose a file','6storage-rentals'); ?></span>
                                        <input type="file" accept=".jpg, .jpeg, .png, .doc, .xls, .xlsx, .doc, .docx, .txt, .pdf" class="cc" id="six-storage-user-document-upload" />
                                   </div>
                                   <div class="six-storage-file-path-wrapper six-storage-flex-grow-1 six-storage-choose-file-input"> 
                                        <input class="six-storage-file-path six-storage-validate cc" onchange = "sixStorageUploadUserDocumentValidation();" type="text" placeholder="<?php esc_html_e('Choose a file','6storage-rentals'); ?>" />
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
                              </div>
                              <i class="six-storage-material-icons sixStorageClearUploadFileicon  notranslate six-storage-grey-text six-storage-cursor-pointer six-storage-tooltipped" data-position="bottom" data-tooltip="Clear" onclick="return sixStorageClearUploadFile();">cancel</i>
                         </div>
                      

                         <div style="display: none;" id="six-storage-user-document-upload-err" class="six-storage-invalid-feedback"> <!--Please choose a file to upload--> <?php esc_html_e('Please choose a file to upload','6storage-rentals'); ?></div>
                    </div>
               </div>
               <div class="six-storage-text-center six-storage-white">
                    <a href="javascript:void(0)" class="six-storage-waves-effect six-storage-waves-light cc six-storage-btn six-storage-secondary-background" style="color:white;" onclick="return sixStorageUploadUserDocuments();"><!--Save--><?php esc_html_e('Save','6storage-rentals'); ?></a>
               </div>
          </div>
     </form>
</div>


<div id="six-storage-insurance-proof-document" class="six-storage-modal cc">
     <div class="six-storage-modal-container-header six-storage-secondary-background">
          <div class="six-storage-title">
               <!--Insurance Proof Uploads--> <?php esc_html_e('Insurance Proof Uploads','6storage-rentals'); ?>
          </div>
          <div>
               <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat">&times;</button>
          </div>
     </div>
     <form autocomplete="off" id="six-storage-Insurance-proof-form" class="cc">
          <div class="six-storage-modal-content six-storage-position-relative">
               <div class="six-storage-row cc">
                    <div class="six-storage-input-field six-storage-col six-storage-s12 cc" data-element_required="'true'">
                         <input type="text" class="cc" id="six-storage-insurance-document-name" autocomplete="off" />
                         <label class="six-storage-active cc"> <!--File Name--> <?php esc_html_e('File Name','6storage-rentals'); ?></label>
                         <div style="display: none;" id="six-storage-insurance-document-name-err" class="six-storage-invalid-feedback"> <!--Please Enter File Name--> <?php esc_html_e('Please Enter File Name','6storage-rentals'); ?></div>
                    </div>
                    <div class=" cc six-storage-s12 six-storage-col">
                         <div class="cc six-storage-grid-d-flex six-storage-align-items-center">
                              <div class="cc six-storage-file-field six-storage-input-field six-storage-grid-mb0 six-storage-grid-d-flex six-storage-align-items-center six-storage-flex-grow-1">
                                   <div class="six-storage-btn cc six-storage-secondary-background six-storage-choose-file">
                                        <span> <!--Choose a file--> <?php esc_html_e('Choose a file','6storage-rentals'); ?></span>
                                        <input type="file" accept=".jpg, .jpeg, .png, .doc, .xls, .xlsx, .doc, .docx, .txt, .pdf" class="cc" id="six-storage-insurance-document-upload" />
                                   </div>
                                   <div class="six-storage-file-path-wrapper six-storage-flex-grow-1 six-storage-choose-file-input"> 
                                        <input class="six-storage-file-path six-storage-validate cc" onchange = "sixStorageUploadUserDocumentValidation();" type="text" placeholder="<?php esc_html_e('Choose a file','6storage-rentals'); ?>" />
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
                              </div>
                              <i class="six-storage-material-icons sixStorageClearUploadFileicon  notranslate six-storage-grey-text six-storage-cursor-pointer six-storage-tooltipped" data-position="bottom" data-tooltip="Clear" onclick="return sixStorageClearUploadFile();">cancel</i>
                         </div>
                      

                         <div style="display: none;" id="six-storage-user-document-upload-err" class="six-storage-invalid-feedback"> <!--Please choose a file to upload--> <?php esc_html_e('Please choose a file to upload','6storage-rentals'); ?></div>
                    </div>
               </div>
               <div class="six-storage-text-center six-storage-white">
                    <a href="javascript:void(0)" class="six-storage-waves-effect six-storage-waves-light cc six-storage-btn six-storage-secondary-background" style="color:white;" onclick="return sixStorageInsuranceUploadDocuments();"><!--Save--><?php esc_html_e('Save','6storage-rentals'); ?></a>
               </div>
          </div>
     </form>
</div>



<div id="six-storage-card-modal" class="six-storage-modal cc">
     <div class="six-storage-modal-container-header six-storage-secondary-background">
          <div class="six-storage-title">
               <!--Payment Form--> <?php esc_html_e('Payment Form','6storage-rentals'); ?>
          </div>
          <div>
               <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat">&times;</button>
          </div>
     </div>
     <div id="six-storage-addCardDetailModalContent" class="six-storage-modal-content six-storage-position-relative six-storage-grid-xs-p0">
     </div>
</div>

<div class="six-storage-modal" id="six-storage-dashboard-modal">
     <div class="six-storage-modal-container-header six-storage-secondary-background">
          <div class="six-storage-title" id="six-storage-modalTitle">
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
<div class="six-storage-modal cc" id="six-storage-insurance-dashboard-modal">
     <div class="six-storage-modal-container-header cc six-storage-insurance-header">
          <div class="six-storage-title six-storage-insurance-title six-storage-insurance-title" id="six-storage-modalTitle">
          </div>
          
          <div>
               <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat">&times;</button>
          </div>
     </div>
     <div class="six-storage-modal-content six-storage-grid-p0"  id="dashboard_corner_fix">
          <div class="six-storage-modal-container-body six-storage-grid-xs-p0" id="six-storage-insurance-dashboard-modal-Body">
          </div>
     </div>
</div>
<div class="six-storage-modal" id="six-storage-paymentform-modal">
     <div class="six-storage-modal-container-header six-storage-secondary-background">
          <div class="six-storage-title" id="six-storage-paymentformtitle"></div>
          <div>
               <button id = "six-storage-payment-close-btn" class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat">&times;</button>
               <input type="hidden" id="six-storage-amount-payable" />
          </div>
     </div>
     <div class="six-storage-modal-content" id="six-storage-paymentform-Body">
         <div id="six-storage-payment-selection"> </div>
        <div id="six-storage-payapayment-form"> </div>
     </div>
</div>
<div id="six-storage-overlay"></div>

<!-- Modal Structure -->
<div id="six-storage-password-update" class="six-storage-modal cc six-storage-xs">
     <div class="six-storage-modal-container-header six-storage-secondary-background">
          <div class="six-storage-title">
               <!--Update Password--> <?php esc_html_e('Update Password','6storage-rentals'); ?>
          </div>
          <div>
               <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat">&times;</button>
          </div>
     </div>
     <div class="six-storage-modal-content six-storage-grid-p0">
          <form onsubmit="return sixStorageUpdatePassword(event)" class="cc">
          <!-- Hubspot Ignore Form -->
          <label for="cc-num" style="display:none;">credit card HubspotCollectedFormsWorkaround</label>
          <input name="cc-num" style="display:none;" required="" value="HubspotCollectedFormsWorkaround" id="cc-num" />
          <!--  -->
          <div class="six-storage-row cc six-storage-grid-d-flex six-storage-flex-wrap six-storage-justify-content-center six-storage-grid-m0">
               <div class="six-storage-col cc six-storage-m10 six-storage-s12 six-storage-grid-margin-auto">
                    <div class="six-storage-input-field  cc six-storage-grid-mt15">
                         <a class="six-storage-waves-effect six-storage-btn-small  six-storage-prefix six-storage-suffix  six-storage-grid-shadow-none six-storage-transparent six-storage-text-center"><i class="six-storage-grid-position-relative  six-storage-material-icons notranslate six-storage-grey-text" toggle="six-storage-currentPassword" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                         <input id="six-storage-currentPassword" type="password" class="six-storage-validate cc" placeholder="<?php esc_html_e('Current Password','6storage-rentals'); ?>" autocomplete="off" />
                         <!-- <label for="currentPassword">Current Password</label> -->
                         <div style="display: none;" id="six-storage-currentPassword-err" class="six-storage-invalid-feedback"> <!--Please Enter Current Password--> <?php esc_html_e('Please Enter Current Password','6storage-rentals'); ?></div>
                    </div>
                    <div class="six-storage-input-field  cc six-storage-grid-mt15">
                         <a class="six-storage-waves-effect six-storage-btn-small  six-storage-prefix six-storage-suffix  six-storage-grid-shadow-none six-storage-transparent six-storage-text-center"><i class="six-storage-grid-position-relative six-storage-material-icons notranslate six-storage-grey-text" toggle="six-storage-newPassword" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                         <input id="six-storage-newPassword" type="password" class="six-storage-validate cc"  placeholder="<?php esc_html_e('New Password','6storage-rentals'); ?>" maxlength="12" autocomplete="off" />
                         <!-- <label for="newPassword">New Password</label> -->
                         <div style="display: none;" id="six-storage-newPassword-err" class="six-storage-invalid-feedback"> <!--Please Enter Password--> <?php esc_html_e('Please Enter Password','6storage-rentals'); ?></div>
                    </div>
                    <div class="six-storage-input-field  cc six-storage-grid-mt15">
                         <a class="six-storage-waves-effect six-storage-btn-small  six-storage-prefix six-storage-suffix  six-storage-grid-shadow-none six-storage-transparent six-storage-text-center"><i class="six-storage-grid-position-relative  six-storage-material-icons notranslate six-storage-grey-text" toggle="six-storage-confirmNewPassword" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                         <input id="six-storage-confirmNewPassword" type="password" class="six-storage-validate cc"  placeholder="<?php esc_html_e('Confirm New Password','6storage-rentals'); ?>" maxlength="12" autocomplete="off" />
                         <!-- <label for="confirmNewPassword">Confirm New Password</label> -->
                         <div style="display: none;" id="six-storage-confirmNewPassword-err" class="six-storage-invalid-feedback" style="display: none"> <!--Password Not Matched--> <?php esc_html_e('Password Not Matched','6storage-rentals'); ?></div>
                         <div style="display: none;" id="six-storage-confirmNewPassword-message" class="six-storage-invalid-feedback" style="display: none"> <!--New password is same as current password--> <?php esc_html_e('Password must have eight characters containing at least one lowercase letter (a-z), one number (0-9) & one uppercase letter (A-Z)','6storage-rentals'); ?></div>
                         <div class="six-storage-invalid-feedback six-storage-custom-error-message six-storage-grid-p0 six-storage-s12 cc six-storage-col" style="display: none;" id="six-storage-password-update-reponse"></div>
                     </div>
               </div>            
          </div>
          <div class="six-storage-row cc six-storage-grid-d-flex six-storage-flex-wrap six-storage-justify-content-center six-storage-grid-m0" style="padding:18px;">
               <div class="six-storage-col cc six-storage-s12 six-storage-text-center">
                    <button type="submit"  class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-update-btn-prmiary six-storage-grid-btn" > <!--Update Password--> <?php esc_html_e('Update Password','6storage-rentals'); ?></button>
               </div>
          </div>
          </form>
     </div>
     <!-- <div class="modal-footer six-storage-text-center">
          <a href="javascript:void(0)" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc secondary six-storage-grid-btn" onclick="return sixStorageUpdatePassword();">Update Password</a>
     </div> -->
</div>

<!-- Modal Structure -->
<div class="six-storage-alert-wrapper six-storage-d-none" id="six-storage-success-msg">
     <div class="six-storage-alert-box green lighten-1 six-storage-grid-d-flex six-storage-justify-content-between  six-storage-align-items-center" id="six-storage-dv-alert">
          <div class="six-storage-text-section six-storage-grid-d-flex six-storage-align-items-center">
               <div class="six-storage-icon-alert-box green six-storage-lighten-3 six-storage-rounded-circle six-storage-grid-mr10 six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center">
                    <i class="six-storage-material-icons notranslate six-storage-white-text six-storage-font-size-30" id="six-storage-alert-icon">thumb_up</i>
               </div>
               <p class="cc six-storage-alert-text six-storage-font-weight-bold six-storage-grid-m0 six-storage-white-text six-storage-alert-message" id="six-storage-alert-message"> <!--Successfully Updated--> <?php esc_html_e('Successfully Updated','6storage-rentals'); ?></p>
          </div>
          <div class="six-storage-action-close" onclick="sixStorageCloseAlert();">
               <a class="six-storage-btn-floating six-storage-btn-large six-storage-waves-effect six-storage-waves-light six-storage-transparent six-storage-icon-alert-box six-storage-flexbox-important six-storage-align-items-center six-storage-justify-content-center six-storage-rounded-circle six-storage-text-decoration-none">
                    <i class="six-storage-material-icons notranslate six-storage-white-text">close</i>
               </a>
          </div>
     </div>
</div>

<div id="six-storage-credit_card_action_confirm" class="six-storage-modal six-storage-d-none">
     <div class="six-storage-modal-content">
          <h4 class="cc" id="card_confirmation_header">Modal Header </h4>
          <p class="cc"><!--Are you sure do you want to delete card--> <?php esc_html_e('Are you sure do you want to delete card','6storage-rentals'); ?>?</p>
     </div>
     <div class="six-storage-modal-footer six-storage-white">
          <a href="javascript:void(0)" class="six-storage-modal-close six-storage-waves-effect six-storage-waves-green six-storage-btn-flat" id="confirm_model" onclick=""> <!--Agree--> <?php esc_html_e('Agree','6storage-rentals'); ?></a>
     </div>
</div>
</div>

<script>
     var expanded = false;

     function showCheckboxes() {
          var checkboxes = document.getElementById("six-storage-checkboxes");
          if (!expanded) {
               checkboxes.style.display = "block";
               expanded = true;
          } else {
               checkboxes.style.display = "none";
               expanded = false;
          }
     }
</script>
<div class="six-storage-row cc">
<div class="cc six-storage-col six-storage-s12 six-storage-m12 six-storage-brand-name-div">
          <p class="cc six-storage-poweredBydashboardfooter sixStoragefloatright"><b> Powered by </b> <a class="cc" href="https://www.6storage.com/" target="_blank">6Storage</a>
    </div>
</div> 
</div>