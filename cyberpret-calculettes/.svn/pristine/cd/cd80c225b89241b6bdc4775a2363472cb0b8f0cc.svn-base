<?php
//////////////
// Variables
//////////////

// Attention, les attributs sont tous passés en minuscule !
// 	((get_option('lienCyberpret')==0) ? '&amp;affRef=1' : NULL). // Obsolète
$cyberpret_add_url = "fromMobile=1".
	((get_option('noH2')==1) ? '&amp;noH2=1' : NULL).
	((strlen(get_option('localization'))>0) ? '&amp;localization='.urlencode( esc_attr( get_option('localization') ) ) : NULL).
	((strlen(get_option('tableau_amortissement'))>0) ? '&amp;tableau_amortissement='.urlencode( esc_attr( get_option('tableau_amortissement') ) ) : NULL).
	((strlen(get_option('devise'))>0) ? '&amp;devise='.urlencode( esc_attr( get_option('devise') ) ) : NULL).
	((strlen(get_option('couleurfond'))>3) ? '&amp;couleurFond='.urlencode( esc_attr( get_option('couleurfond') ) ) : NULL).
	((strlen(get_option('couleurp'))>3) ? '&amp;couleurP='.urlencode( esc_attr( get_option('couleurp') ) ) : NULL).
	((strlen(get_option('couleurlien'))>3) ? '&amp;couleurLien='.urlencode( esc_attr( get_option('couleurlien') ) ) : NULL).
	((strlen(get_option('couleurlienhover'))>3) ? '&amp;couleurLienHover='.urlencode( esc_attr( get_option('couleurlienhover') ) ) : NULL).
	((strlen(get_option('couleurh2'))>3) ? '&amp;couleurH2='.urlencode( esc_attr( get_option('couleurh2') ) ) : NULL).
	((strlen(get_option('couleurh3'))>3) ? '&amp;couleurH3='.urlencode( esc_attr( get_option('couleurh3') ) ) : NULL).
	((strlen(get_option('couleurh4'))>3) ? '&amp;couleurH4='.urlencode( esc_attr( get_option('couleurh4') ) ) : NULL).
	((strlen(get_option('couleurchamp'))>3) ? '&amp;couleurChamp='.urlencode( esc_attr( get_option('couleurchamp') ) ) : NULL).
	((strlen(get_option('couleurmisevaleur1'))>3) ? '&amp;couleurMiseValeur1='.urlencode( esc_attr( get_option('couleurmisevaleur1') ) ) : NULL).
	((strlen(get_option('couleurerreur'))>3) ? '&amp;couleurErreur='.urlencode( esc_attr( get_option('couleurerreur') ) ) : NULL).
	((strlen(get_option('couleurencadrement'))>3) ? '&amp;couleurEncadrement='.urlencode( esc_attr( get_option('couleurencadrement') ) ) : NULL).
	((strlen(get_option('couleurencadrementfond'))>3) ? '&amp;couleurEncadrementFond='.urlencode( esc_attr( get_option('couleurencadrementfond') ) ) : NULL).
	((strlen(get_option('couleurtableth'))>3) ? '&amp;couleurTableTh='.urlencode( esc_attr( get_option('couleurtableth') ) ) : NULL).
	((strlen(get_option('couleurtableimpaires'))>3) ? '&amp;couleurTableImpaires='.urlencode( esc_attr( get_option('couleurtableimpaires') ) ) : NULL).
	((strlen(get_option('couleurtablepaires'))>3) ? '&amp;couleurTablePaires='.urlencode( esc_attr( get_option('couleurtablepaires') ) ) : NULL).
	"&url_site=".urlencode(strtolower(dirname($_SERVER['SERVER_PROTOCOL'])) . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])."&wp_plugin=1";

///////////////////////////////////

// Script permettant de modifier dynamiquement la hauteur d'iframe appelée. Il faut ajouter cette fonction à chaque shortcode.
function cyberpretAddJqueryScript()
{
	wp_register_script('iframe_resizer', plugins_url('../js/iframe-resizer/iframeResizer.min.js', __FILE__), array('jquery'),'2.6.1');
	wp_enqueue_script('iframe_resizer');
	wp_register_script('iframe-resizer-Cyberpret', plugins_url('../js/iframe-resizer/cyberpretScript.js', __FILE__), "", "");
	wp_enqueue_script('iframe-resizer-Cyberpret', array('iframe_resizer'));
}

///////////////////////////////////

// Calculette de bureau

function cyberpretCalcBureau_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-simple.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 975px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretImmo'></iframe>\r\n";
	/*if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>&copy; <a href='http://www.cyberpret.com'
target='_blank'>Cyberpret</a> ".date("Y")."</p>\r\n";*/
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcBureau', 'cyberpretCalcBureau_shortcode' );

///////////////////////////////////

// Crédit immobilier (calculette simple)

function cyberpretCalcCreditImmo_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-credit-immobilier.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 975px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretImmo'></iframe>\r\n";
	/*if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Calculatrice immobilière conçue par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";*/
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcCreditImmo', 'cyberpretCalcCreditImmo_shortcode' );

///////////////////////////////////

// APL
//Depuis le 1er Janvier 2020 les aides au logement acquisition ont été supprimées

///////////////////////////////////

// Capacité de prêt immobilier
function cyberpretCalcCapacite_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-capacite-pret-immobilier.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 1080px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretCapacite'></iframe>\r\n";
	/*if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Calculatrice immobilière conçue par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";*/
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcCapacite', 'cyberpretCalcCapacite_shortcode' );

///////////////////////////////////

// Frais de notaire
function cyberpretCalcNotaire_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-frais-notaire.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 500px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretNotaire'></iframe>\r\n";
	/*if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Une calculette développée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";*/
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcNotaire', 'cyberpretCalcNotaire_shortcode' );

///////////////////////////////////

// PTZ+
function cyberpretCalcPtz_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-pret-taux-zero-plus.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 750px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretPtz'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation réalisée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcPtz', 'cyberpretCalcPtz_shortcode' );

///////////////////////////////////

// Rachat de crédit immobilier
function cyberpretCalcRachat_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-rachat-pret.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 900px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretRachat'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Gracieusement mis à disposition par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcRachat', 'cyberpretCalcRachat_shortcode' );

///////////////////////////////////

// Hypothèque et IPPD
function cyberpretCalcHypotheque_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-hypotheque.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 850px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretHypotheque'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'><a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a>, spécialiste du calcul immobilier</p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcHypotheque', 'cyberpretCalcHypotheque_shortcode' );

///////////////////////////////////

// Caution crédit logement
function cyberpretCalcCautionCreditLogement_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-caution-credit-logement.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 900px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretCCL'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation offerte par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcCautionCreditLogement', 'cyberpretCalcCautionCreditLogement_shortcode' );

///////////////////////////////////

// Caution SACCEF
function cyberpretCalcCautionSaccef_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-caution-saccef.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 750px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretSaccef'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation offerte par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcCautionSaccef', 'cyberpretCalcCautionSaccef_shortcode' );

///////////////////////////////////

// Comparatif taux fixe / taux CAPE révisable
function cyberpretCalcTauxFixeRevisable_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-taux-fixe-revisable.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Un comparatif mis à disposition par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcTauxFixeRevisable', 'cyberpretCalcTauxFixeRevisable_shortcode' );

///////////////////////////////////

// Comparateur taux fixe / taux mixte
function cyberpretCalcTauxFixeMixte_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-taux-fixe-mixte.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Un comparatif mis à disposition par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcTauxFixeMixte', 'cyberpretCalcTauxFixeMixte_shortcode' );

///////////////////////////////////

// Prêt modulable
function cyberpretCalcModulable_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-pret-modulable.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'><a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a>, spécialiste de la simulation immobilière</p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcModulable', 'cyberpretCalcModulable_shortcode' );

///////////////////////////////////

// Prêt progressif
function cyberpretCalcProgressif_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-pret-progressif.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Une calculatrice développée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcProgressif', 'cyberpretCalcProgressif_shortcode' );

///////////////////////////////////
// TEG
function cyberpretCalcTeg_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-teg.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Calcul effectué par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcTeg', 'cyberpretCalcTeg_shortcode' );

///////////////////////////////////
// Calcul Prêt Parcours Résidentiel Paris
function cyberpretCalcPPRParis_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-pret-parcours-residentiel-paris.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation réalisée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcPPRParis', 'cyberpretCalcPPRParis_shortcode' );

///////////////////////////////////
// Calcul prêt Paris Logement 0%
function cyberpretCalcPretParisLogement0_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-paris-logement-0.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Une calculette <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcPretParisLogement0', 'cyberpretCalcPretParisLogement0_shortcode' );

///////////////////////////////////
// Comparatif prêt amortissable / In Fine
function cyberpretCalcAmortissableInFine_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-amortissable-in-fine.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Comparateur développé par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcAmortissableInFine', 'cyberpretCalcAmortissableInFine_shortcode' );

///////////////////////////////////
// Calculatrice de lissage de prêt
function cyberpretCalcLissagePret_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-lissage-pret.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Outil de calcul immobilier réalisé par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcLissagePret', 'cyberpretCalcLissagePret_shortcode' );

///////////////////////////////////
// Calcul de l'imposition des plus-values
function cyberpretCalcImpotPlusValue_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-impot-plus-value.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Une simulation offerte par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcImpotPlusValue', 'cyberpretCalcImpotPlusValue_shortcode' );

///////////////////////////////////
// Optimisation de votre épargne
function cyberpretCalcEpargne_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-epargne.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Outil de calcul conçu par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcEpargne', 'cyberpretCalcEpargne_shortcode' );

///////////////////////////////////
// Calcul de l'imposition des plus-values
function cyberpretCalcDefiscPinel_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-defiscalisation-pinel.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Calculatrice développée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcDefiscPinel', 'cyberpretCalcDefiscPinel_shortcode' );

///////////////////////////////////
// Calcul du capital restant dû
function cyberpretCalcCapitalRestantDu_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-capital-restant-du.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation proposée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcCapitalRestantDu', 'cyberpretCalcCapitalRestantDu_shortcode' );

///////////////////////////////////
// Calcul du prêt à taux zéro de Caen
function cyberpretCalcPtzCaen_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-ptz-caen.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'><a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a>, expert en calcul immobilier</p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcPtzCaen', 'cyberpretCalcPtzCaen_shortcode' );

///////////////////////////////////
// Calcul du prêt à taux zéro de Marseille
function cyberpretCalcPtzMarseille_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-ptz-marseille.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Calculatrice mise à disposition par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcPtzMarseille', 'cyberpretCalcPtzMarseille_shortcode' );

///////////////////////////////////
// Calcul du prêt à taux zéro de Toulouse
function cyberpretCalcPtzToulouse_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-ptz-toulouse.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation réalisée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcPtzToulouse', 'cyberpretCalcPtzToulouse_shortcode' );

///////////////////////////////////
// Calculatrice de Prêt In Fine
function cyberpretCalcInFine_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-pret-in-fine.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation réalisée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcInFine', 'cyberpretCalcInFine_shortcode' );

///////////////////////////////////
// Calculatrice de prêt Duo
function cyberpretCalcDuo_shortcode() {
	global $cyberpret_add_url;
	cyberpretAddJqueryScript();
	$aAjouter = "<div class='cyberpretCalculettes'>\r\n";
	$aAjouter .= "<iframe src='https://www.cyberpret.com/iframe-calculatrices/calculatrice-pret-duo.php?$cyberpret_add_url' scrolling='auto' frameborder='0' seamless style='width: 100%; height: 620px; margin: 0 auto 20px auto; overflow: hidden; border-radius:6px;' name='iframeCyberpretFixeRevisable'></iframe>\r\n";
	//if (get_option('liencyberpret')>0) $aAjouter .= "<p style='text-align: center; font-size: 0.8em;'>Simulation réalisée par <a href='http://www.cyberpret.com' target='_blank'>CyberPrêt.com</a></p>\r\n";
	$aAjouter .= "</div>\r\n";
    return $aAjouter;
}
add_shortcode( 'cyberpretCalcDuo', 'cyberpretCalcDuo_shortcode' );
///////////////////////////////////
?>