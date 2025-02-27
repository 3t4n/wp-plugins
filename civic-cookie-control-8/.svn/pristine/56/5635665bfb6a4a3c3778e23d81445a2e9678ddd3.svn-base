<?php
include plugin_dir_path(__FILE__) . 'govuk-cookiecontrol-public-inputs.php';
$page_id = get_the_ID();
$page_content = get_post_field('post_content', $page_id);
if (!has_shortcode($page_content, 'ccc_gov_uk_block')  && !empty($ccc_options_optionalCookiesName)) : ?>
  <div class="ccc-govuk-wrapper">
    <div id="ccc-cookie-banner-govuk" class="govuk-cookie-banner cookie-banner ccc-cookie-banner fixed-top ccc-govuk-block-group" data-ccc-alternativeLang="<?php echo $ccc_options_altLanguages; ?>" data-nosnippet role="region" aria-label="Cookies Banner" hidden>
      <div class="govuk-cookie-banner__message govuk-width-container cookie-banner--main">
        <div class="govuk-grid-row">
          <div class="govuk-grid-column-two-thirds">
            <h2 class="govuk-cookie-banner__heading govuk-heading-m"><?php echo esc_html(wp_unslash($ccc_options_title)); ?></h2>
            <div class="govuk-cookie-banner__content">
              <div class="govuk-body">
                <?php echo wp_kses(preg_replace("/\r\n|\r|\n/", '<br/>', wp_unslash($ccc_options_intro)), $allowedHTML); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="govuk-button-group">
          <button data-ccc-govuk="ccc-gov-uk-accept-settings" type="button" class="govuk-button cookie-banner-button--accept" data-module="govuk-button" value="accept">
            <?php echo esc_html(wp_unslash($ccc_options_acceptSettings)); ?>
          </button>
          <button data-ccc-govuk="ccc-gov-uk-reject-settings" type="button" class="govuk-button  cookie-banner-button--reject" data-module="govuk-button" value="reject">
            <?php echo esc_html(wp_unslash($ccc_options_rejectSettings)); ?>
          </button>
          <a class="govuk-link" href="<?php echo esc_url($ccc_options_privacyURL); ?>"><?php echo esc_html(wp_unslash($ccc_options_privacyName)); ?></a>
        </div>
      </div>
      <div class="govuk-cookie-banner__message cookie-banner--accept govuk-width-container" role="alert" hidden>
        <div class="govuk-grid-row">
          <div class="govuk-grid-column-two-thirds">
            <div class="govuk-cookie-banner__content">
              <div class="govuk-body"><?php echo wp_kses(preg_replace("/\r\n|\r|\n/", '<br/>', wp_unslash($ccc_options_govUkacceptMessage)), $allowedHTML);  ?></div>
            </div>
          </div>
        </div>
        <div class="govuk-button-group">
          <button type="button" class="govuk-button cookie-banner-accept--hide" data-module="govuk-button" value="hide-accept">
            <?php echo esc_html(wp_unslash($ccc_options_closeLabel)); ?>
          </button>
        </div>
      </div>
      <div class="govuk-cookie-banner__message cookie-banner--reject govuk-width-container" role="alert" hidden>
        <div class="govuk-grid-row">
          <div class="govuk-grid-column-two-thirds">
            <div class="govuk-cookie-banner__content">
              <div class="govuk-body"><?php echo  wp_kses(preg_replace("/\r\n|\r|\n/", '<br/>', wp_unslash($ccc_options_govUkrejectMessage)), $allowedHTML); ?></div>
            </div>
          </div>
        </div>
        <div class="govuk-button-group">
          <button type="button" class="govuk-button cookie-banner-reject--hide " data-module="govuk-button" value="hide-reject">
            <?php echo esc_html(wp_unslash($ccc_options_closeLabel)); ?>
          </button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>