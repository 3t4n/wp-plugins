<?php
include plugin_dir_path(__FILE__) . 'govuk-cookiecontrol-public-inputs.php';
$count_inside = 0;
$output = "";
if ($ccc_options_initialState === "GOVUK" && !empty($ccc_options_optionalCookiesName)) :
  $output .= '<div class="ccc-govuk-wrapper"><div class="govuk-notification-banner govuk-notification-banner--success ccc-cookie-form-message ccc-govuk-wrapper" role="alert" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner" hidden>
  <div class="govuk-notification-banner__header">
    <h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">
      Success
    </h2>
  </div>
  <div class="govuk-notification-banner__content">  <div class="govuk-notification-banner__heading">
   ' . wp_kses(preg_replace("/\r\n|\r|\n/", '<br/>', wp_unslash($ccc_options_govUkFormSuccessMessage)), $allowedHTML) . '
  </div>
</div>
</div>
<div class="ccc-govuk-block-group ccc-govuk-shortcode">    
    <h2  data-ccc-govuk-details="ccc-gov-uk-title" class="govuk-heading-m">' . esc_html(wp_unslash($ccc_options_title)) . '</h2>
    <div  data-ccc-govuk-details="ccc-gov-uk-description" class="govuk-body">' . wp_kses(preg_replace("/\r\n|\r|\n/", '<br/>', wp_unslash($ccc_options_intro)), $allowedHTML) . '</div>
  </div></div>';
  if ($layout === "single") {
    $output .= '<div class="ccc-govuk-wrapper"><form class="cookie-category-form cookie-category-form--single" action="" method="post" novalidate="">';
    foreach ($ccc_options_optionalCookiesName as $i => $val) {
      $output .= '<h3 data-ccc-govuk-details="ccc-gov-uk-category-title-' . $count_inside . '" class="govuk-heading-m">' . esc_html(wp_unslash($ccc_options_optionalCookiesLabel[$i])) . '</h3>
        <div class="govuk-form-group ccc-govuk-form-group" data-index="' . $count_inside . '">
          <fieldset class="govuk-fieldset">
            <legend data-ccc-govuk-details="ccc-gov-uk-category-description-' . $count_inside . '" class="govuk-fieldset__legend">' . esc_html(wp_unslash($ccc_options_optionalCookiesDescription[$i])) . '</legend>
            <div class="govuk-cookiecontrol-radios govuk-radios">
                  <div class="govuk-radios__item">
                    <input class="govuk-radios__input" id="accept-' . $count_inside . '" name="cookieChoice' . $count_inside . '" type="radio" value="accept" data-ccc-govuk="accepted-' . $count_inside . '" ' . (!empty($ccc_cookie_optional_categories[$count_inside]) ? checked($ccc_cookie_optional_categories[$count_inside], 'accepted', false) : "") . '><label data-ccc-govuk-details="ccc-gov-uk-category-accept-' . $count_inside . '" class="govuk-label govuk-radios__label" for="accept-' . $count_inside . '">' . esc_html(wp_unslash($ccc_options_onText)) . '</label>          
                  </div>
                  <div class="govuk-radios__item">
                    <input class="govuk-radios__input" id="reject-' . $count_inside . '" name="cookieChoice' . $count_inside . '" type="radio" value="reject" data-ccc-govuk="revoked-' . $count_inside . '" ' .  (!empty($ccc_cookie_optional_categories[$count_inside]) ? checked($ccc_cookie_optional_categories[$count_inside], 'revoked', false) : "checked") . '><label data-ccc-govuk-details="ccc-gov-uk-category-reject-' . $count_inside . '" class="govuk-label govuk-radios__label" for="reject-' . $count_inside . '">' . esc_html(wp_unslash($ccc_options_offText)) . '</label>          
                  </div>
            </div>
          </fieldset>
        </div>';
      $count_inside++;
    }
    if ($ccc_options_govUkFormNecessaryTitle) {
      $output .= '<h3  data-ccc-govuk-details="ccc-gov-uk-title" class="govuk-heading-m">' . esc_html(wp_unslash($ccc_options_govUkFormNecessaryTitle)) . '</h3>';
    }
    if ($ccc_options_govUkFormNecessaryMessage) {
      $output .= '<div class="govuk-body">
        ' . wp_kses(preg_replace("/\r\n|\r|\n/", '<br/>', wp_unslash($ccc_options_govUkFormNecessaryMessage)), $allowedHTML) . '
       </div>';
    }
    $output .= '<button type="submit" id="ccc-gov-uk-category-accept-recommended-all" data-ccc-govuk-details="ccc-gov-uk-category-accept-recommended-all" class="govuk-button" data-module="govuk-button">' . esc_html(wp_unslash($ccc_options_acceptRecommended)) . '</button></form></div>';
  } else {
    foreach ($ccc_options_optionalCookiesName as $i => $val) {
      $output .= '<div class="ccc-govuk-wrapper"><h3 data-ccc-govuk-details="ccc-gov-uk-category-title-' . $count_inside . '" class="govuk-heading-s">' . esc_html(wp_unslash($ccc_options_optionalCookiesLabel[$i])) . '</h3>
    <form class="cookie-category-form" action="" method="post" novalidate="">  
    <div class="govuk-form-group ccc-govuk-form-group" data-index="' . $count_inside . '">
      <fieldset class="govuk-fieldset">
        <legend data-ccc-govuk-details="ccc-gov-uk-category-description-' . $count_inside . '" class="govuk-fieldset__legend">' . esc_html(wp_unslash($ccc_options_optionalCookiesDescription[$i])) . '</legend>
        <div class="govuk-cookiecontrol-radios govuk-radios">
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="accept-' . $count_inside . '" name="cookieChoice' . $count_inside . '" type="radio" value="accept" data-ccc-govuk="accepted-' . $count_inside . '" ' . (!empty($ccc_cookie_optional_categories[$count_inside]) ? checked($ccc_cookie_optional_categories[$count_inside], 'accepted', false) : "") . '><label data-ccc-govuk-details="ccc-gov-uk-category-accept-' . $count_inside . '" class="govuk-label govuk-radios__label" for="accept-' . $count_inside . '">' . esc_html(wp_unslash($ccc_options_onText)) . '</label>          
              </div>
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="reject-' . $count_inside . '" name="cookieChoice' . $count_inside . '" type="radio" value="reject" data-ccc-govuk="revoked-' . $count_inside . '" ' . (!empty($ccc_cookie_optional_categories[$count_inside]) ? checked($ccc_cookie_optional_categories[$count_inside], 'revoked', false) : "checked") . '><label data-ccc-govuk-details="ccc-gov-uk-category-reject-' . $count_inside . '" class="govuk-label govuk-radios__label" for="reject-' . $count_inside . '">' . esc_html(wp_unslash($ccc_options_offText)) . '</label>          
              </div>
        </div>
      </fieldset>
    </div>
    <button data-ccc-govuk-details="ccc-gov-uk-category-accept-recommended-' . $count_inside . '" class="govuk-button" data-module="govuk-button">' . esc_html(wp_unslash($ccc_options_acceptRecommended)) . '</button>
  </form></div>';
      $count_inside++;
    }
  }

endif;