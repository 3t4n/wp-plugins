<?php
$ccc_admin_default = $this->ccc_get_default_values_public();
$ccc_options = get_option('civic_cookiecontrol_settings_v9');
$ccc_options_title = isset($ccc_options['titleText']) && $ccc_options['titleText'] !== ""  ? $ccc_options['titleText'] : $ccc_admin_default['titleText'];
$ccc_options_intro = isset($ccc_options['introText'])  &&  $ccc_options['introText'] !== ""  ? $ccc_options['introText'] : $ccc_admin_default['introText'];
$ccc_options_privacyName = isset($ccc_options['privacyName']) && $ccc_options['privacyName'] !== "" ? $ccc_options['privacyName'] : "";
$ccc_options_privacyURL = isset($ccc_options['privacyURL'])  && $ccc_options['privacyURL'] !== "" ? esc_url($ccc_options['privacyURL']) : "";
$ccc_options_acceptSettings = isset($ccc_options['acceptSettings'])  && $ccc_options['acceptSettings'] !== ""  && $ccc_options['acceptSettings'] !== "" ? $ccc_options['acceptSettings'] : $ccc_admin_default['acceptSettings'];
$ccc_options_rejectSettings =  isset($ccc_options['rejectSettings']) && $ccc_options['rejectSettings'] !== ""  ? $ccc_options['rejectSettings'] :  $ccc_admin_default['rejectSettings'];
$ccc_options_closeLabel =  isset($ccc_options['closeLabel'])   && $ccc_options['closeLabel'] !== "" ? $ccc_options['closeLabel'] :  $ccc_admin_default['closeLabel'];
$ccc_options_altLanguages =  isset($ccc_options['altLanguages']) ? "true" : "false";
$ccc_options_govUkacceptMessage =  !empty($ccc_options['govUkacceptMessage'])  ? $ccc_options['govUkacceptMessage'] : $ccc_admin_default['govUkacceptMessage'];
$ccc_options_govUkrejectMessage =  !empty($ccc_options['govUkrejectMessage']) ? $ccc_options['govUkrejectMessage'] : $ccc_admin_default['govUkrejectMessage'];
$ccc_options_optionalCookiesName = isset($ccc_options['optionalCookiesName']) ? $ccc_options['optionalCookiesName'] : [];
$ccc_options_govUkFormSuccessMessage =  !empty($ccc_options['govUkFormSuccessMessage']) ? $ccc_options['govUkFormSuccessMessage'] : $ccc_admin_default['govUkFormSuccessMessage'];
$ccc_options_acceptRecommended = isset($ccc_options['acceptRecommended'])  && $ccc_options['acceptRecommended'] !== ""   ? $ccc_options['acceptRecommended'] : $ccc_admin_default['acceptRecommended'];
$ccc_options_onText =  isset($ccc_options['onText']) && $ccc_options['onText'] !== "" ? $ccc_options['onText'] : $ccc_admin_default['onText'];
$ccc_options_offText =  isset($ccc_options['offText']) && $ccc_options['offText'] !== ""  ? $ccc_options['offText'] : $ccc_admin_default['offText'];
$ccc_options_initialState  =  isset($ccc_options['initialState']) ? $ccc_options['initialState'] : $ccc_admin_default['initialState'];
$ccc_options_optionalCookiesLabel = !empty($ccc_options['optionalCookiesLabel'])  ? $ccc_options['optionalCookiesLabel'] : [];
$ccc_options_optionalCookiesDescription =  !empty($ccc_options['optionalCookiesDescription']) ? $ccc_options['optionalCookiesDescription'] : [];
$ccc_cookie = isset($_COOKIE['CookieControl']) ? sanitize_text_field($_COOKIE['CookieControl']) : "";
$ccc_cookie_decode = json_decode (stripslashes($ccc_cookie));
$ccc_cookie_optional_categories =  isset($ccc_cookie_decode->optionalCookies) ? array_values ((array) $ccc_cookie_decode->optionalCookies) : [];
$ccc_options_govUkFormNecessaryTitle = isset($ccc_options['govUkFormNecessaryTitle']) && $ccc_options['govUkFormNecessaryTitle'] !== "" ? $ccc_options['govUkFormNecessaryTitle'] : "";
$ccc_options_govUkFormNecessaryMessage =  !empty($ccc_options['govUkFormNecessaryMessage']) ? $ccc_options['govUkFormNecessaryMessage'] : "";
$allowedHTML = array(
  'a'      => array(
    'href'  => array(),
    'title' => array(),
    'target' => array()
  ),
  'br'     => array(),
  'em'     => array(),
  'strong' => array(),
  'p'      => array(),
  'ul'     => array(),
  'ol'     => array(),
  'li'     => array(),
  'b' => array(),
  'span' => array(),
); 
?>