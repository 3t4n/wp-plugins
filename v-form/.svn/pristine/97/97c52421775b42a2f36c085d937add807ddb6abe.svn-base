<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;


if ( isset($_GET['vformname']) ) {
  $vformname = $_GET['vformname'];

  if ( strpos($vformname, '<script>') !== false || strpos($vformname, '</script>') !== false ) {
      wp_die('Invalid input detected.');
  }

  $vformname = sanitize_text_field( $vformname );
  $vformname = esc_html( $vformname );
}


if ( isset($_GET['vformselect']) ) {
  $vformselect = $_GET['vformselect'];

  if ( strpos($vformselect, '<script>') !== false || strpos($vformselect, '</script>') !== false ) {
      wp_die('Invalid input detected.');
  }

  $vformselect = sanitize_text_field( $vformselect );
  $vformselect = esc_html( $vformselect );
}


?>
<div class="wrap" id="vform-main">
  <style>
  .subscription-page-column_next-order-date {
    width: 162px;
  }
  .subscription-page-column_status {
    width: 238px;
  }
  .selectfrmdetails {
    font-size: 16px;
    font-weight: bold;
}
.subscription-page-column_customer {
    width: 150px;
}


.bv-page__segment {
  width:100%;
}

.bv-card__content {
  background-repeat: initial;
}
  </style>
  <div class="vform_body">

      <header class="bv-page__header"><span class="bv-icon bv-page__header-icon" aria-label="receipt"><svg class="bv-icon__icon" viewBox="0 0 24 24">
            <path class="bv-icon__path" fill="currentColor" d="M18,1.88134723 L19.276,1.24263912 C19.609,1.07671494 20,1.31960394 20,1.69043447 L20,21.8097939 C20,21.9997071 19.893,22.1726281 19.724,22.2575893 L18.447,22.8942983 C18.166,23.0352339 17.834,23.0352339 17.553,22.8942983 L16,22.1186528 L14.447,22.8942983 C14.166,23.0352339 13.834,23.0352339 13.553,22.8942983 L12,22.1186528 L10.447,22.8942983 C10.166,23.0352339 9.834,23.0352339 9.553,22.8942983 L8,22.1186528 L6.447,22.8942983 C6.166,23.0352339 5.834,23.0352339 5.553,22.8942983 L4.276,22.2575893 C4.107,22.1726281 4,21.9997071 4,21.8097939 L4,1.69043447 C4,1.31960394 4.391,1.07671494 4.724,1.24263912 L6,1.88134723 L7.553,1.10570169 C7.834,0.964766102 8.166,0.964766102 8.447,1.10570169 L10,1.88134723 L11.553,1.10570169 C11.834,0.964766102 12.166,0.964766102 12.447,1.10570169 L14,1.88134723 L15.553,1.10570169 C15.834,0.964766102 16.166,0.964766102 16.447,1.10570169 L18,1.88134723 Z M18.1102941,3.97140537 L16.0735294,2.9534882 L14.4919816,3.74440984 C14.2058162,3.88691825 13.8677132,3.88691825 13.5815478,3.74440984 L12,2.9534882 L10.4184522,3.74440984 C10.1322868,3.88691825 9.79418382,3.88691825 9.50801838,3.74440984 L7.92647059,2.9534882 L5.88970588,3.97140537 L5.88970588,21.0465118 L7.47125368,20.2555902 C7.75741912,20.1130818 8.09552206,20.1130818 8.3816875,20.2555902 L9.96323529,21.0465118 L11.5447831,20.2555902 C11.8309485,20.1130818 12.1690515,20.1130818 12.4552169,20.2555902 L14.0367647,21.0465118 L15.6183125,20.2555902 C15.9044779,20.1130818 16.2425809,20.1130818 16.5287463,20.2555902 L18.1102941,21.0465118 L18.1102941,3.97140537 Z M9.22505006,7.41455997 C8.71419588,7.41455997 8.30006674,7.00391852 8.30006674,6.49736663 C8.30006674,5.99081473 8.71419588,5.58017328 9.22505006,5.58017328 L14.7749499,5.58017328 C15.2858041,5.58017328 15.6999333,5.99081473 15.6999333,6.49736663 C15.6999333,7.00391852 15.2858041,7.41455997 14.7749499,7.41455997 L9.22505006,7.41455997 Z M9.22505006,11.0828067 C8.71419588,11.0828067 8.30006674,10.6721652 8.30006674,10.1656133 C8.30006674,9.65906142 8.71419588,9.24841998 9.22505006,9.24841998 L12.9249833,9.24841998 C13.4358375,9.24841998 13.8499666,9.65906142 13.8499666,10.1656133 C13.8499666,10.6721652 13.4358375,11.0828067 12.9249833,11.0828067 L9.22505006,11.0828067 Z M9.22505006,14.75158 C8.71419588,14.75158 8.30006674,14.3409386 8.30006674,13.8343867 C8.30006674,13.3278348 8.71419588,12.9171933 9.22505006,12.9171933 L14.7749499,12.9171933 C15.2858041,12.9171933 15.6999333,13.3278348 15.6999333,13.8343867 C15.6999333,14.3409386 15.2858041,14.75158 14.7749499,14.75158 L9.22505006,14.75158 Z M9.22505006,18.4198267 C8.71419588,18.4198267 8.30006674,18.0091853 8.30006674,17.5026334 C8.30006674,16.9960815 8.71419588,16.58544 9.22505006,16.58544 L12.9249833,16.58544 C13.4358375,16.58544 13.8499666,16.9960815 13.8499666,17.5026334 C13.8499666,18.0091853 13.4358375,18.4198267 12.9249833,18.4198267 L9.22505006,18.4198267 Z"></path>
          </svg></span>
        <div class="bv-page__header-content">
          <h1 class="bv-page__title">View Entries</h1>
          <p class="bv-page__description">View your users form entries...</p>
        </div>
        <div class="inner-help-vform">
      		<span>i</span>
      		<h1>Information</h1>
      		<p>Having Issue Related The Plugin, just Email Us at: <code>vforminfo@gmail.com</code><br>We will contact you within 24hrs.</p>
          <p>Upgrade To Premium and unlock your form power.<a href="https://onlinetool24.co.in/vform/" target="_blank">Upgrade To Premium</a></p>      	</div>
      </header>

      <section class="bv-page__segment">
        <div class="bv-page__segment-content">
          <div class="bv-card">
            <div class="bv-card__content">
              <div class="bv-flex bv-flex--justify-evenly subscription-page-filters">


                <div class="bv-flex__item bv-flex__item--align-center subscription-page-filters__search-btn">

                  <select class="bv-button vform-selct-frm">
                    <option disabled selected>Select Your Form</option>
                  <?php
                    $vformdata = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform ORDER BY 'id' DESC", OBJECT );
                    foreach ( $vformdata as $keyone=>$valueone ) {
                      $frnmvfrm = $vformdata[$keyone]->formname;
                      $frndt = $vformdata[$keyone]->id;
                      echo "<option data-formname='".esc_html($frnmvfrm)."' value='".esc_html($frndt)."'>".esc_html($frnmvfrm)."</option>";
                    }
                   ?>
                  </select>

                  <?php
                    if(isset($vformname)){
                      ?>
                      <span class="selectfrmdetails">Selected Form:<?php echo esc_html_e($vformname,'vform'); ?> </span>
                      <?php
                    }
                  ?>

                </div>
              </div>
              <div class="bv-datalist subscriptions-page-datalist">
                <div class="bv-datalist__controls bv-datalist__controls--top">
                  <div class="bv-datalist__summary">Showing of </div>
                  <div class="bv-datalist__page-options"><label for="bv-datalist-1--page-options" class="bv-datalist__page-options-field"><span class="bv-datalist__page-options-label">Items per page: </span>
                      <div class="bv-select bv-select--has-value bv-select--small bv-datalist__page-options-select"><select id="bv-datalist-1--page-options" class="bv-select__select-element">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select><span class="bv-icon bv-select__icon" aria-label="chevronDown"><svg class="bv-icon__icon" viewBox="0 0 24 24">
                            <path class="bv-icon__path" fill="currentColor" d="M3.75261265,6.34153452 C3.38894463,5.92588561 2.75718344,5.88374677 2.34153452,6.24741478 C1.92588561,6.6110828 1.88374677,7.24284399 2.24741478,7.65849291 L11.2524148,18.2364929 C11.6508167,18.6918404 12.3591606,18.6918563 12.757583,18.2365268 L21.763583,7.6585268 C22.1272697,7.24289426 22.0851593,6.61113117 21.6695268,6.24744443 C21.2538943,5.8837577 20.6221312,5.9258681 20.2584444,6.34150064 L12.0050479,16.0594019 L3.75261265,6.34153452 Z"></path>
                          </svg></span></div>
                    </label></div>
                </div>

                <div class="bv-datalist__items" tabindex="0">
                  <div class="bv-datalist__header">
                    <div class="bv-datalist__header-content">
                      <div class="subscription-page-column_subscription-id"><span role="button" tabindex="-1" class="subscription-page-header with-button">Sr No.<span class="bv-icon" aria-label="caretDown"><svg class="bv-icon__icon" viewBox="0 0 24 24">
                              <path class="bv-icon__path" fill="currentColor" d="M12.8118723,15.1351783 L16.2385256,11.2353476 C16.8362974,10.5543471 16.3427965,9.50030096 15.4264988,9.50030096 L8.57319213,9.50030096 C7.65689445,9.50030096 7.16339353,10.5543471 7.76187946,11.2353476 L11.1885328,15.1351783 C11.6156146,15.6216072 12.3840763,15.6216072 12.8118723,15.1351783"></path>
                            </svg></span></span></div>
                      <div class="subscription-page-column_next-order-date"><span class="subscription-page-header">Full Name</span></div>
                      <div class="subscription-page-column_customer"><span class="subscription-page-header">Email</span></div>
                      <div class="subscription-page-column_customer"><span class="subscription-page-header">Comment</span></div>
                      <div class="subscription-page-column_status"><span class="subscription-page-header">Time Taken to fill the form **NEW</span></div>

                    </div>
                  </div>


                  <?php
                  $getvfid = sanitize_text_field($vformselect);
                    
                  $form_id = intval($getvfid); // Assuming formid is an integer
                  $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid = %d ORDER BY id DESC";
                  $vformdata2 = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);


                  // $vformdata2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid='".$getvfid."' ORDER BY 'id' DESC", OBJECT );
                    foreach ( $vformdata2 as $keyone2=>$valueone2 ) {
                      $cntvfr = $keyone2+1;
                      $ttcnt = count($vformdata2);
                      ?>
                      <script>
                      jQuery(function($){
                        $('.bv-datalist__summary').text('Showing Of <?php echo esc_html_e($ttcnt,'vform'); ?> Entries');
                      });
                      </script>
                                <div class="bv-datalist__item bv-datalist__item--is-clickable bv-datalist__item--is-selection-start bv-datalist__item--is-selection-end">
                <div class="bv-datalist__item-content"><div role="button" tabindex="0"><div class="subscription-page-row__content"><div class="subscription-page-column_subscription-id"><div class="sub-id-column"><a class="react-router-link react-router-link__as-link" href="">
                  <span class=""><?php echo esc_html_e($cntvfr,'vform'); ?></span></a></div></div>
                  <div class="subscription-page-column_next-order-date"><div role="button" tabindex="-1" class="sub-next-order-date-column with-button with-button__style-as-link"><span class="next-order-date-column__next-date subscriptions-page-text"><?php echo esc_html_e($vformdata2[$keyone2]->firstname,'vform')." ".esc_html_e($vformdata2[$keyone2]->lastname,'vform'); ?></span><span class="next-order-date-column__next-date subscriptions-page-text vform-showdescription"></span><span class="next-order-date-column__last-date-title subscriptions-page-text">Submitted At </span>
                    <span class="next-order-date-column__last-date"><?php echo esc_html_e($vformdata2[$keyone2]->currentdate,'vform'); ?></span></div></div>
                    <div class="subscription-page-column_customer">
                      <div role="button" class="sub-customer-column with-button with-button__style-as-link"><span class="subscription-page-customer-column__name subscriptions-page-text"><code><?php echo  esc_html_e(str_replace("~","<br>",$vformdata2[$keyone2]->email),'vform'); ?></code></span></div>
                    </div>
                    <div class="subscription-page-column_customer">
                      <div role="button" class="sub-customer-column with-button with-button__style-as-link"><span class="subscription-page-customer-column__name subscriptions-page-text">
                        <?php
                             echo esc_html_e($vformdata2[$keyone2]->paragraphtext,'vform');
                         ?>
                      </span></div>
                    </div>
                    <div class="subscription-page-column_status"><div class="status-pill"><span class="bv-pill pillstatus2 bv-pill--with-success"><span class="bv-pill__label">  <?php
                          $tmtake = $vformdata2[$keyone2]->usertimetakes;
                      ?>
                      <script>
                      var txtvform = '<?php echo html_entity_decode(esc_html($tmtake)); ?>';
                        var objvform = JSON.parse(txtvform);
                        var fulltimetkvform = "Days: "+objvform.days+", Hours: "+objvform.hours+", Minute; "+objvform.minute+", Second: "+objvform.second;
                        document.write(fulltimetkvform);
                      </script>
                    </span></span></div></div>

                    </div></div>
                    </div>
                    </div>


                    <?php
                  }
                 ?>

                </div>
                <div class="bv-datalist__controls bv-datalist__controls--bottom"></div>
              </div>
              <div class="bv-flex relative-cursors-paginator-wrapper__controls">
                <div class="relative-cursors-paginator"><button class="bv-button bv-button--is-disabled bv-paginator__button bv-paginator__button--previous" disabled=""><span class="bv-button__text"><span class="bv-icon" aria-label="chevronLeft"><svg class="bv-icon__icon" viewBox="0 0 24 24">
                          <path class="bv-icon__path" fill="currentColor" d="M17.2364792,3.75261265 C17.6521281,3.38894463 17.6942669,2.75718344 17.3305989,2.34153452 C16.9669309,1.92588561 16.3351697,1.88374677 15.9195208,2.24741478 L5.34152081,11.2524148 C4.88617335,11.6508167 4.8861574,12.3591606 5.34148692,12.757583 L15.9194869,21.763583 C16.3351195,22.1272697 16.9668826,22.0851593 17.3305693,21.6695268 C17.694256,21.2538943 17.6521456,20.6221312 17.2365131,20.2584444 L7.5186118,12.0050479 L17.2364792,3.75261265 Z"></path>
                        </svg></span></span></button><button class="bv-button bv-paginator__button bv-paginator__button--next" aria-busy="false"><span class="bv-button__text"><span class="bv-icon" aria-label="chevronRight"><svg class="bv-icon__icon" viewBox="0 0 24 24">
                          <path class="bv-icon__path" fill="currentColor" d="M7.34153452,20.2584148 C6.92588561,20.6220828 6.88374677,21.253844 7.24741478,21.6694929 C7.6110828,22.0851418 8.24284399,22.1272806 8.65849291,21.7636126 L19.2364929,12.7586126 C19.6918404,12.3602108 19.6918563,11.6518668 19.2365268,11.2534444 L8.6585268,2.24744442 C8.24289426,1.88375768 7.61113117,1.92586808 7.24744443,2.34150062 C6.8837577,2.75713316 6.9258681,3.38889625 7.34150064,3.75258298 L17.0594019,12.0059795 L7.34153452,20.2584148 Z"></path>
                        </svg></span></span></button></div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
</div>
