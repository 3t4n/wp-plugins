<?php
defined( 'ABSPATH' ) OR exit;

// require_once( ABSPATH . 'wp-load.php' );
// require_once( ABSPATH . "wp-includes/pluggable.php" );

define( 'HOB_AC_DIR_NAME', basename( plugin_dir_path(  dirname( __FILE__ , 1 ))) );

/**
 * Hob_ac_settings
 * 
 * @package Advanced Cookies
 * @author url: https://www.hob-france.com/
 * @author email info@hob-fr.com
 */
class Hob_ac_settings
  { 
    /**
     * liste_data_check_gestion
     *
     * @var array
     */
    private $liste_data_check_gestion = [
      'hod-ac-gs-check-google-analytics' => 'ac-gs-ga',
      'hod-ac-gs-check-google-ads' => 'ac-gs-gads',
      'hod-ac-gs-check-google-maps' => 'ac-gs-gm',
      'hod-ac-gs-check-calameo' => 'ac-gs-c',
      'hod-ac-gs-check-captcha-2' => 'ac-gs-rc2',
      'hod-ac-gs-check-captcha-3' => 'ac-gs-rc3',
      'hod-ac-gs-mailchimp' => 'ac-gs-mc',
      'hod-ac-gs-chatbot' => 'ac-gs-cb',
      'hod-ac-gs-facebook' => 'ac-gs-fb',
      'hod-ac-gs-twitter' => 'ac-gs-tw',
      'hod-ac-gs-google-plus' => 'ac-gs-gp',
      'hod-ac-gs-linkedin' => 'ac-gs-lki',
      'hod-ac-gs-pinterest' => 'ac-gs-pin',
      'hod-ac-gs-instagram' => 'ac-gs-insta',
      'hod-ac-gs-youtube' => 'ac-gs-yout',
      'hod-ac-gs-vimeo' => 'ac-gs-vimeo',
      'hod-ac-gs-dailymotion' => 'ac-gs-daily'
    ];
    
    /**
     * liste_data_text_gestion
     *
     * @var array
     */
    private $liste_data_text_gestion = [
      'hod-ac-gs-google-analytics-text' => 'ac-gs-ga-text',
      'hod-ac-gs-google-ads-text' => 'ac-gs-gads-text',
      'hod-ac-gs-google-maps-text' => 'ac-gs-gm-text',
      'hod-ac-gs-calameo-text' => 'ac-gs-c-text',
      'hod-ac-gs-captcha-2-text' => 'ac-gs-rc2-text',
      'hod-ac-gs-captcha-3-text' => 'ac-gs-rc3-text',
      'hod-ac-gs-mailchimp-text' => 'ac-gs-mc-text',
      'hod-ac-gs-chatbot-text' => 'ac-gs-cb-text',
      'hod-ac-gs-facebook-text' => 'ac-gs-fb-text',
      'hod-ac-gs-twitter-text' => 'ac-gs-tw-text',
      'hod-ac-gs-google-plus-text' => 'ac-gs-gp-text',
      'hod-ac-gs-linkedin-text' => 'ac-gs-lki-text',
      'hod-ac-gs-pinterest-text' => 'ac-gs-pin-text',
      'hod-ac-gs-instagram-text' => 'ac-gs-insta-text',
      'hod-ac-gs-youtube-text' => 'ac-gs-yout-text',
      'hod-ac-gs-vimeo-text' => 'ac-gs-vimeo-text',
      'hod-ac-gs-dailymotion-text' => 'ac-gs-daily-text'
    ];
    
    /**
     * liste_data_configuration
     *
     * @var array
     */
    private $liste_data_configuration = [
      'hod-ac-c-position-du-bandeau' => 'bas',
      'hod-ac-c-duree-du-consentement' => '30',
      'hod-ac-c-delai-du-bandeau' => '0',
      'hod-ac-c-texte-du-bandeau' => "Notre site utilise des cookies pour réaliser des statistiques de visites, partager des contenus sur les réseaux sociaux et améliorer votre expérience. En refusant les cookies, certains services seront amenés à ne pas fonctionner correctement. Nous conservons votre choix pendant 30 jours. Vous pouvez changer d'avis en cliquant sur le bouton 'Cookies' en bas à gauche de chaque page de notre site.",
      'hod-ac-c-texte-du-lien-en-savoir-plus' => "En savoir plus",
      'hod-ac-c-texte-du-bouton-acceptation' => "TOUT ACCEPTER",
      'hod-ac-c-texte-du-bouton-refus' => "TOUT REFUSER",
      'hod-ac-c-texte-du-bouton-parametre' => "PARAMETRAGE",
      'hod-ac-c-url-du-lien' => "#",
      'hod-ac-c-cookie-bouton' => "true",
      'hod-ac-c-post-alea' => "false",
      'hod-ac-c-bouton-position' => "false",
      'hod-ac-c-mode-affichage' => 'fixed',
      'hod-ac-c-bouton-texte' => 'COOKIES',
      'hod-ac-c-c-fond' => '#27323d',
      'hod-ac-c-c-texte-info' => '#acb8c1',
      'hod-ac-c-c-lien-savoir' => '#0065af',
      'hod-ac-c-c-bouton-acceptation' => '#0065af',
      'hod-ac-c-c-texte-acceptation' => '#e6dfdf',
      'hod-ac-c-c-bordure-acceptation' => '#0065af',
      'hod-ac-c-c-bouton-refus' => '#0065af',
      'hod-ac-c-c-texte-refus' => '#ffffff',
      'hod-ac-c-c-bordure-refus' => '#0065af',
      'hod-ac-c-c-bouton-parametre' => '#27323d',
      'hod-ac-c-c-texte-parametre' => '#ffffff',
      'hod-ac-c-c-bordure-parametre' => '#ffffff',
      'hod-ac-c-c-cookie_fond' => '#27323d',
      'hod-ac-c-c-cookie_fond-s' => '#ffffff',
      'hod-ac-c-c-cookie-texte' => '#ffffff',
      'hod-ac-c-c-cookie-texte-s' => '#27323d',
      'hod-ac-c-c-cookie-bordure' => '#27323d',
      'hod-ac-c-cookies-fonctionnel' => 'Ce site utilise des cookies pour assurer son bon fonctionnement et ne peuvent pas être désactivés de nos systèmes. Nous ne les utilisons pas à des fins publicitaires. Si ces cookies sont bloqués, certaines parties du site ne pourront pas fonctionner.',
      'hod-ac-c-mesure-audience' => 'Ce site utilise des cookies de mesure et d’analyse d’audience, tels que Google Analytics et Google Ads, afin d’évaluer et d’améliorer notre site internet.',
      'hod-ac-c-contenus-interactifs' => 'Ce site utilise des composants tiers, tels que Re CAPTCHA, GoogleMaps, MailChimp ou Calameo, qui peuvent déposer des cookies sur votre machine. Si vous décider de bloquer un composant, le contenu ne s’affichera pas.',
      'hod-ac-c-reseaux-sociaux' => 'Des plug-ins de réseaux sociaux et de vidéos, qui exploitent des cookies, sont présents sur ce site web. Ils permettent d’améliorer la convivialité et la promotion du site grâce à différentes interactions sociales.',
      'hod-ac-c-autre-cookie' => 'Ce site web utilise un certain nombre de cookies pour gérer, par exemple, les sessions utilisateurs.',
      'hod-ac-c-c-modal-corps-titre' => '#737e87',
      'hod-ac-c-c-modal-corps-texte'=> '#737e87',
      'hod-ac-c-c-modal-corps-lien' => '#0065af',
      'hod-ac-c-c-modal-cat-fond' => '#eef1f3',
      'hod-ac-c-c-modal-cat-fond-s' => '#737e87',
      'hod-ac-c-c-modal-cat-texte' => '#737e87',
      'hod-ac-c-c-modal-cat-texte-s' => '#ffffff',
      'hod-ac-c-c-modal-entete-fond' => '#27323d',
      'hod-ac-c-c-modal-entete-texte' => '#737e87',
      'hod-ac-c-c-cookie_fond' => '#27323d',
      'hod-ac-c-c-cookie_fond-s' => '#ffffff',
      'hod-ac-c-c-cookie-texte' => '#ffffff',
      'hod-ac-c-c-cookie-texte-s' => '#27323d',
      'hod-ac-c-c-cookie-bordure' => '#27323d',
      'hod-ac-c-c-modal-fond-accept' => '#ffffff',
      'hod-ac-c-c-modal-fond-accept-s' => '#3eb060',
      'hod-ac-c-c-modal-texte-accept' => '#3eb060',
      'hod-ac-c-c-modal-texte-accept-s' => '#ffffff',
      'hod-ac-c-c-modal-fond-reject' => '#ffffff',
      'hod-ac-c-c-modal-fond-reject-s' => '#0065af',
      'hod-ac-c-c-modal-texte-reject' => '#0065af',
      'hod-ac-c-c-modal-texte-reject-s' => '#ffffff',
      'hod-ac-c-c-modal-fond-valider' => '#ffffff',
      'hod-ac-c-c-modal-fond-valider-s' => '#0065af',
      'hod-ac-c-c-modal-texte-valider' => '#0065af',
      'hod-ac-c-c-modal-texte-valider-s' => '#ffffff'
    ];

    /**
     * options
     *
     * @return void
     */
    public function hob_ac_options(){
      update_option( 'hod-ac-token','', '', 'yes' );

      foreach ($this->liste_data_configuration as $key => $value) {
        update_option( $key, $value, '', 'yes' );
      }
    
      foreach ($this->liste_data_check_gestion as $key => $value) {
        update_option( $key,true, '', 'yes' );
      }

      foreach ($this->liste_data_text_gestion as $key => $value) {
        update_option( $key,__('Pour en savoir plus, cliquez sur le lien.','advancedcookies'), '', 'yes' );
      }

    }
  
    /**
     * delete_options
     *
     * @return void
     */
    public function hob_ac_delete_options(){
      delete_option( 'hod-ac-token');

      /* Gestion des services */
      foreach ($this->liste_data_configuration as $key => $value) {
        delete_option($key);
      }

      /* Gestion des services */
      foreach ($this->liste_data_check_gestion as $key => $value) {
        delete_option($key);
      }

      foreach ($this->liste_data_text_gestion as $key => $value) {
        delete_option($key);
      }
    }
  
      
    /**
     * update_configuration_params
     *
     * @return void
     */
    public function hob_ac_update_configuration_params(){
      foreach ($this->liste_data_configuration as $key => $value) {
        update_option( $key,sanitize_text_field($_POST[$key]), '', 'yes' );
      }
      exit;
    }
       
    /**
     * update_gestion_params
     *
     * @return void
     */
    public function hob_ac_update_gestion_params(){

      foreach ($this->liste_data_check_gestion as $key => $value) {
        update_option( $key,sanitize_text_field($_POST[$value]), '', 'yes' );
      }

      foreach ($this->liste_data_text_gestion as $key => $value) {
        update_option( $key,sanitize_text_field($_POST[$value]), '', 'yes' );
      }

    }
}