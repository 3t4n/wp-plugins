<?php
/**
 * Plugin Name: HAL
 * Plugin URI: http://www.ccsd.cnrs.fr
 * Description: Crée une page qui remonte les publications d'un auteur ou d'une structure en relation avec HAL et un widget des dernières publications d'un auteur ou d'une structure.
 * Version: 2.5
 * Author: CCSD
 * Author URI: http://www.ccsd.cnrs.fr
 * Text Domain: wp-hal
 * Domain Path: /lang/
 */


// Traduction de la description
__("Crée une page qui remonte les publications d'un auteur ou d'une structure en relation avec HAL et un widget des dernières publications d'un auteur ou d'une structure.", "wp-hal");

//Récupère les constantes
require_once("constantes.php");


if (wphal_locale == 'fr_FR') {
    define('wphal_lang', 'fr');
} elseif (wphal_locale == 'es_ES') {
    define('wphal_lang', 'es');
} else {
    define('wphal_lang', 'en');
}

function wphal_is_curl_installed() {
    $loaded_extentions = get_loaded_extensions();
    if  (in_array  ('curl', $loaded_extentions)) {
        return true;
    }
    else {
        return false;
    }
}

// Création du shortcode ('nom du shortcode', 'fonction appelée')
add_shortcode( 'cv-hal', 'wphal_cv_hal' );
add_shortcode( 'nb-doc', 'wphal_nb_doc' );


function wphal_charger_languages() {
    load_plugin_textdomain('wp-hal', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}

add_action('plugins_loaded', 'wphal_charger_languages');

function wphal_action_links( $links, $file ) {
    if ( $file != plugin_basename( __FILE__ ))
        return $links;

    $settings_link = '<a href="admin.php?page=wp-hal.php">' . __( 'Paramètres', 'wp-hal' ) . '</a>';

    array_unshift( $links, $settings_link );

    return $links;
}

add_filter( 'query_vars', 'wphal_query_vars' );
function wphal_query_vars( $query_vars ) {
	$query_vars[] = 'hal_page';
	return $query_vars;
}

add_filter( 'plugin_action_links', 'wphal_action_links',10,2);
/**
 * @param $url
 * @return object
 */
function wphal_do_common_curl_call($url) {
	$response = wp_remote_get($url, [
		'timeout'=>20,
		'user-agent'=>"HAL Plugin Wordpress " . wphal_version,
		'headers' => ['Content-type'=> 'application/json']
	]);
	// we could ve parsed the response but if in general if no results then we get empty content
	$body = wp_remote_retrieve_body($response);
    // Récupération du résultat JSON
    $json = json_decode($body);
    return $json;
}

function wphal_clear_transients()
{
	global $wpdb;
	// delete all "hal namespace" transients
	$sql = "
            DELETE 
            FROM {$wpdb->options}
            WHERE option_name like '\_transient\_hal\_%'
            OR option_name like '\_transient\_timeout\_hal\_%'
        ";

	$wpdb->query($sql);
}

/**
 * fetches data from cache or download data from HAL API
 * @param $url
 * @return object
 */
function wphal_do_get_data($url) {
	$transient_id = 'hal_'.md5($url);
	if(!empty(get_option('option_erase_cache'))){
	    // we reset cache transient for hal namespace
		wphal_clear_transients();
		update_option('option_erase_cache', '');
	}
	$cache_expiration = empty(get_option('option_cache_timeout')) ? 1 * DAY_IN_SECONDS : intval(get_option('option_cache_timeout')) * MINUTE_IN_SECONDS;
	if ( false === ( $value = get_transient( $transient_id ) ) ) {
		$json = wphal_do_common_curl_call($url);
		if($json)
			set_transient( $transient_id, $json, $cache_expiration);
		return $json;
	} else{
		return $value;
	}
}

/**
 * PLUGIN SHORTCODE ND-DOC
 * @param $param
 * @return int
*/
function wphal_nb_doc($param)
{
    $idhal = wphal_verifSolr(get_option('option_idhal'));
    extract(shortcode_atts(array(
        'type' => get_option('option_type'),
        'id' => $idhal
    ),
        $param
    ));
    /**
     * @var  $id         :  defined by extract
     * @var  string $type :  defined by extract
     */
    $id = wphal_verifSolr($id);

    $url = wphal_api . '?q=*:*&fq=' . $type . ':(' . urlencode($id) . ')&rows=0&wt=json';

    $json =wphal_do_get_data($url);
    return $json->response->numFound;
}
/**
 * PLUGIN SHORTCODE CV-HAL
 * @param $param
 * @return string
 */
function wphal_cv_hal($param){
	$content = '';
    if ( !wphal_is_curl_installed() ) {
	    $content = 'CURL not installed, please check the <a href="https://wordpress.org/plugins/hal/faq/" target="_blank" id="curl">FAQ</a> with the code : CURL';
    } else {
        $possible_ids = ["authIdHal_s", "structId_i", "anrProjectId_i", "europeanProjectId_i", "collCode_s"];
        $option_choix = !empty(get_option('option_choix')) ? get_option('option_choix') : [];
        if(in_array('disciplines', $option_choix)){ //Lance les scripts pour le Graphique
            wp_enqueue_style('wp-hal-style2');

            wp_enqueue_script('wp-hal-script1');
            wp_enqueue_script('wp-hal-script2');
            wp_enqueue_script('wp-hal-script3');
        }
        $facetdomain = null;

        // those parameters are configured from plusing settings
	    $default_id = wphal_verifSolr(get_option('option_idhal'));
	    $default_type = get_option('option_type');
	    $default_contact = get_option('option_infocontact');
	    // here we merge with shortcode parameters
	    extract(shortcode_atts(array(
		    'type' => $default_type,
		    'id' => $default_id,
		    'contact' => $default_contact
	    ),
		    $param
	    ));
        $content = 'Plugin is not configured correctly or shortcode parameters are not valid, please check the <a href="https://doc.archives-ouvertes.fr/afficher-une-liste-de-publications-dans-wordpress/" target="_blank" id="wrong_params">documentation</a>';

	    /** @var  $id         :  defined by extract
	     * @var  string $type :  defined by extract
	     * @var  string $contact :  defined by extract
	     */
        if (!empty($id) && in_array($type, $possible_ids)) {
            $id = wphal_verifSolr($id);

            // in case the type is struct we need to split in order to build facet and display it back
            $structIDs =[];
            if($type=="structId_i"){
                $structIDs = explode(' OR ', $id);
            }

            $facets = wphal_buildfacet($option_choix, $structIDs);
            $facetQuery = !empty($facets) ? 'facet.field='.implode("&facet.field=", $facets).'&facet.limit=200&facet.mincount=1&facet=true':'';

            if (get_option('option_groupe') == 'grouper') {
                //cURL sur l'API pour récupérer les données
                $url = wphal_api . '?q=*:*&fq=' . $type . ':(' . urlencode($id) . ')&group=true&group.field=docType_s&group.limit=1000&fl=docid,citationFull_s&'.$facetQuery.'&sort=' . wphal_producedDateY . '&wt=json&json.nl=arrarr';
            } elseif (get_option('option_groupe') == 'paginer') {
                $url = wphal_api . '?q=*:*&fq=' . $type . ':(' . urlencode($id) . ')&fl=docid,citationFull_s&'.$facetQuery.'&sort=' . wphal_producedDateY . '&wt=json&json.nl=arrarr';
            }

            $json = wphal_do_get_data($url);
            if(!isset($json->error)){
            $hal_page = (get_query_var('hal_page')) ? get_query_var('hal_page') : 1;

            $content = '<div id="wphal-content">';
            if (is_array($option_choix) && !empty($option_choix)){
                $content .= '<ul id="wphal-menu">';
                $content .= '<li><a href="#publications" onclick="displayElem(\'publications\'); return false;" style="font-size:18px; text-decoration: none;">' . __('Publications', 'wp-hal') . '</a></li>';

                $content .= '<li><a href="#filtres" onclick="return false;" style="font-size:18px; text-decoration: none; cursor:default;">' . __('Filtres', 'wp-hal') . '</a>';
                $content .= '<ul id="wphal-filtres">';
                foreach ($option_choix as $option) {
                    if ($option == 'contact') {
                        $content .= '<li><a href="#contact" onclick="displayElem(\'wphal-contact\'); return false;" style="margin:1px; text-decoration: none;">' . __('Contact', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'disciplines') {
                        $content .= '<li><a href="#disciplines" onclick="displayElem(\'wphal-disciplines\'); return false;" style="margin:1px; text-decoration: none;">' . __('Disciplines', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'mots-clefs') {
                        $content .= '<li><a href="#keywords" onclick="displayElem(\'wphal-keywords\'); return false;" style="margin:1px; text-decoration: none;">' . __('Mots-clefs', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'auteurs') {
                        $content .= '<li><a href="#auteurs" onclick="displayElem(\'wphal-auteurs\'); return false;" style="margin:1px; text-decoration: none;">' . __('Auteurs', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'affiliated') {
                        $content .= '<li><a href="#affiliated" onclick="displayElem(\'wphal-affiliated\'); return false;" style="margin:1px; text-decoration: none;">' . __('Auteurs de la structure', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'revues') {
                        $content .= '<li><a href="#revues" onclick="displayElem(\'wphal-revues\'); return false;" style="margin:1px; text-decoration: none;">' . __('Revues', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'annee') {
                        $content .= '<li><a href="#annees" onclick="displayElem(\'wphal-annees\'); return false;" style="margin:1px; text-decoration: none;">' . __('Année de production', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'institution') {
                        $content .= '<li><a href="#insts" onclick="displayElem(\'wphal-insts\'); return false;" style="margin:1px; text-decoration: none;">' . __('Institutions', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'laboratoire') {
                        $content .= '<li><a href="#labs" onclick="displayElem(\'wphal-labs\'); return false;" style="margin:1px; text-decoration: none;">' . __('Laboratoires', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'departement') {
                        $content .= '<li><a href="#depts" onclick="displayElem(\'wphal-depts\'); return false;" style="margin:1px; text-decoration: none;">' . __('Départements', 'wp-hal');
                        $content .= '</a></li>';
                    }
                    if ($option == 'equipe') {
                        $content .= '<li><a href="#equipes" onclick="displayElem(\'wphal-equipes\'); return false;" style="margin:1px; text-decoration: none;">' . __('Équipes de recherche', 'wp-hal');
                        $content .= '</a></li>';
                    }
                }
                $content .= '</ul></li>';

                $content .= '</ul><br/><hr>';
            }

            $content .= '<div id="meta">
        <div class="display" id="wphal-contact" style="display: none;">
            <h3 class="wphal-titre">' . __('Contact', 'wp-hal');
            $content .= '</h3>

            <ul id="wphal-cont" style="list-style-type: none;">';

            if ($contact == 'yes' && $type == 'authIdHal_s') {
                $urlauthor = wphal_urlauthor . '?indent=true&fq=valid_s:PREFERRED&fl=fullName_s,idHal_s,hasCV_bool,arxivId_s,idrefId_s,isniId_s,orcidId_s,viafId_s&q=idHal_s:' . urlencode($id);
                $jsonauthor = wphal_do_get_data($urlauthor);

                foreach ($jsonauthor->response->docs as $i=>$doc) {
                    $content .= '<div class="wphal-infocontact" id="wphal-infocontact'.$i.'">';
                    if ($doc->fullName_s != '') {
                        $content .= '<li class="wphal-fullname"><span>Nom : </span><span>'. $doc->fullName_s .'</span></li>';
                    }
                    if ($doc->idHal_s != '') {
                        $content .= '<li class="wphal-idhal"><span>IdHAL : </span><span>' . $doc->idHal_s . '</span></li>';
                    }
                    if ($doc->hasCV_bool == true){
                        $content .= '<li class="wphal-cvhal"><span>CV HAL : </span><a href="'.esc_url(cvhal. $doc->idHal_s).'" target="_blank">CV de '.$doc->fullName_s.'</a></li>';
                    }
                    if (isset($doc->arxivId_s ) && is_array($doc->arxivId_s)) {
                        $content .= '<li class="wphal-"><span>arXiv : </span><span>';
                        foreach($doc->arxivId_s as $arxivId_s){
                            $content .= '<a href="' . esc_url($arxivId_s) . '" target="_blank">' . substr(strrchr($arxivId_s, "/"), 1) . '</a> ,';
                        }
                        $content .= '</span></li>';
                    }
                    if (isset($doc->idrefId_s ) && is_array($doc->idrefId_s)) {
                        $content .= '<li class="wphal-"><span>IdRef : </span><span>';
                        foreach($doc->idrefId_s as $idref){
                            $content .= '<a href="' . esc_url($idref) . '" target="_blank">' . substr(strrchr($idref, "/"), 1) . '</a> ,';
                        }
                        $content .= '</span></li>';
                    }
                    if (isset($doc->orcidId_s ) && $doc->orcidId_s != '') {
                        $content .= '<li class="wphal-"><span>ORCID : </span><span>';
                        foreach($doc->orcidId_s as $orcidId_s){
                            $content .= '<a href="' . esc_url($orcidId_s) . '" target="_blank">' . substr(strrchr($orcidId_s, "/"), 1) . '</a> ,';
                        }
                        $content .= '</span></li>';
                    }
                    if (isset($doc->viafId_s ) && $doc->viafId_s != '') {
                        $content .= '<li class="wphal-"><span>VIAF : </span><span>';
                        foreach($doc->viafId_s as $viafId_s){
                            $content .= '<a href="' . esc_url($viafId_s) . '" target="_blank">' . substr(strrchr($viafId_s, "/"), 1) . '</a> ,';
                        }
                        $content .= '</span></li>';
                    }
                    if (isset($doc->isniId_s ) && $doc->isniId_s != '') {
                        $content .= '<li class="wphal-"><span>ISNI : </span><span>';
                        foreach($doc->isniId_s as $isniId_s){
                            $content .= '<a href="' . esc_url($isniId_s) . '" target="_blank">' . substr(strrchr($isniId_s, "/"), 1) . '</a> ,';
                        }
                        $content .= '</span></li>';
                    }
                    $content .= '</div>';
                }
            }
            if (get_option('option_email') != '') {
                $content .= '<li><img alt="mail" src=" ' . esc_url(plugin_dir_url(__FILE__) . 'img/mail.svg').' " style=" width:16px; margin-left:2px; margin-right:2px;"/><a href="'.esc_url('mailto:' . get_option('option_email')) . '" target="_blank">' . get_option('option_email') . '</a></li>';
            }
            if (get_option('option_tel') != '') {
                $content .= '<li><img alt="phone" src=" ' . esc_url(plugin_dir_url(__FILE__) . 'img/phone.svg'). '" style="width:16px; margin-left:2px; margin-right:2px;"/>' . get_option('option_tel') . '</li>';
            }
            if (get_option('option_social0') != '') {
                $content .= '<li><a href="'.esc_url('http://www.facebook.com/' . get_option('option_social0')) . '" target="_blank"><img 
                alt="Facebook" src=" ' . esc_url(plugin_dir_url(__FILE__) . 'img/facebook.svg').'" style="width:32px; margin:4px;"/></a></li>';
            }
            if (get_option('option_social1') != '') {
                $content .= '<li><a href="'.esc_url('http://www.twitter.com/' . get_option('option_social1')) . '" target="_blank"><img 
                alt="Twitter" src=" ' . esc_url(plugin_dir_url(__FILE__) . 'img/twitter.svg').'" style="width:32px; margin:4px;"/></a></li>';
            }
            if (get_option('option_social2') != '') {
                $content .= '<li><a href="'.esc_url('https://plus.google.com/u/0/+' . get_option('option_social2')) . '" target="_blank"><img 
                alt="Google+" src=" ' . esc_url(plugin_dir_url(__FILE__) . 'img/google-plus.svg').'" style="width:32px; margin:4px;"/></a></li>';
            }
            if (get_option('option_social3') != '') {
                $content .= '<li><a href="'.esc_url('https://www.linkedin.com/in/' . get_option('option_social3')) . '" target="_blank"><img 
                alt="LinkedIn" src=" ' . esc_url(plugin_dir_url(__FILE__) . 'img/linkedin.svg').'" style="width:32px; margin:4px;"/></a></li>';
            }
            $content .= '</ul>
        </div>
        <div class="display" id="wphal-disciplines" style="display: none;">
            <h3 class="wphal-titre">' . __('Disciplines', 'wp-hal') . '</h3>';

            if (wphal_locale == 'fr_FR') {
                $facetdomain = isset($json->facet_counts->facet_fields->fr_domainAllCodeLabel_fs) ? $json->facet_counts->facet_fields->fr_domainAllCodeLabel_fs:null;
            } elseif (wphal_locale == 'es_ES') {
                $facetdomain = isset($json->facet_counts->facet_fields->es_domainAllCodeLabel_fs) ? $json->facet_counts->facet_fields->es_domainAllCodeLabel_fs:null;
            } else {
                $facetdomain = isset($json->facet_counts->facet_fields->en_domainAllCodeLabel_fs) ? $json->facet_counts->facet_fields->en_domainAllCodeLabel_fs:null;
            }

            if (!is_null($facetdomain) && !empty($facetdomain)) {
                $content .= '<div id="listdisci">';
                $content .= '<span id="tridisciplines">';
                $content .= '<button type="button" class="trial"  id="tridisci" onclick="toggleSort(this, true, \'wphal-discipline\', \'wphal-discipline\', \'tridisci\'); return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc"  id="trinbdisci" onclick="toggleSort(this, false, \'wphal-discipline\', \'wphal-discipline\', \'trinbdisci\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul id="wphal-discipline" class="wphal-discipline">';
                foreach ($facetdomain as $res) {
                    $name = explode(wphal_delimiter, $res[0]);
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=domainAllCode_s:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $content .= '</ul>';
                $content .= '</div>';

                $content .= '<div id="wphal-graph" style="display:none;">';
                $content .= '<div id="wphal-piedisci"></div>';
                $content .= '</div>';
                $content .= '<button type="button" style="text-decoration: none;" id="wphal-disci" onclick="visibilitedisci(\'listdisci\',\'wphal-graph\',\'tridisciplines\'); return false;" >' . __('Graphique', 'wp-hal');
                $content .= '</button>';
            }
            $content .= '</div>
        <div class="display" id="wphal-keywords" style="display: none;">
            <h3 class="wphal-titre">' . __('Mots-clefs', 'wp-hal') . '</h3>';
                if (isset($json->facet_counts->facet_fields->keyword_s) && !is_null($json->facet_counts->facet_fields->keyword_s) && !empty($json->facet_counts->facet_fields->keyword_s)) {
                $content .= '<div id="wphal-keys">';
                $r = 0;
                // CSS Nuage de mots
                $maxsize = 25;
                $minsize = 10;
                $maxval = max(array_values($json->facet_counts->facet_fields->keyword_s[1]));
                $minval = min(array_values($json->facet_counts->facet_fields->keyword_s[1]));
                if(!is_numeric($minval)) {$minval = 0;}
                if(!is_numeric($maxval)) {$maxval = 0;}
                $spread = ($maxval - $minval);
                $step = ($maxsize - $minsize) / $spread;
                $tab = array();
                foreach ($json->facet_counts->facet_fields->keyword_s as $res) {
                    $r = $r + 1;
                    if ($r > 20) {
                        break;
                    }
                    $tab[] = $res;
                }
                asort($tab); // Tri du tableau par ordre alphabétique
                foreach ($tab as $res) {
                    $size = round($minsize + (($res[1] - $minval) * $step));
                    $content .= '<a style="display: inline-block; font-size:' . $size . 'px" href="' . esc_url(halv3 . '?q=keyword_s:' . urlencode('"' . $res[0] . '"') . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $res[0] . '</a>&nbsp;';
                }
                $content .= '</div>';
                $content .= '<div id="keysuite" style="display:none;">';
                $content .= '<span id="trikeywords">';
                $content .= '<button type="button" class="trial" id="trikey" onclick="toggleSort(this, true, \'wphal-keyw\', \'wphal-keyword\', \'trikey\'); return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinbkey" onclick="toggleSort(this, false, \'wphal-keyw\', \'wphal-keyword\', \'trinbkey\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-keyword">';
                $content .= '<div id="wphal-keyw">';
                foreach ($json->facet_counts->facet_fields->keyword_s as $res) {
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=keyword_s:' . urlencode('"' . $res[0] . '"') . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $res[0] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $content .= '</div>';
                $content .= '</ul>';
                $content .= '</div>';
                $content .= '<button type="button" style="text-decoration: none;" id="wphal-key" onclick="visibilitekey(\'wphal-keys\',\'keysuite\', \'trikeywords\'); return false;" >' . __('Liste complète', 'wp-hal');
                $content .= '</button>';
            }
            $content .= '</div>
        <div class="display" id="wphal-auteurs" style="display: none;">
            <h3 class="wphal-titre">' . __('Auteurs', 'wp-hal') . '</h3>';
            if (isset($json->facet_counts->facet_fields->authIdLastNameFirstName_fs) && !is_null($json->facet_counts->facet_fields->authIdLastNameFirstName_fs) && !empty($json->facet_counts->facet_fields->authIdLastNameFirstName_fs)) {
                $content .= '<span id="triauteurs">';
                $content .= '<button type="button" class="trial" id="triaut" onclick="toggleSort(this, true, \'wphal-aut\', \'auteursuite\', \'triaut\'); return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinbaut" onclick="toggleSort(this, false, \'wphal-aut\', \'auteursuite\', \'trinbaut\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-auteurs" style="list-style-type: none;">';
                $content .= '<div id="wphal-aut">';
                $r = 0;
                foreach ($json->facet_counts->facet_fields->authIdLastNameFirstName_fs as $res) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $name = explode(wphal_delimiter, $res[0]);
                    if($name[0] == 0){
                        $q = 'authLastNameFirstName_s:'.urlencode("\"".$name[1]."\"");
                    }else{
                        $q = "authIdPerson_i:$name[0]";
                    }
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><img alt="user" src=" ' . esc_url(plugin_dir_url(__FILE__) . '/img/user.svg').'" style="width:16px; margin-left:2px; margin-right:2px;"/><a href="' . esc_url(halv3 . '?q='. $q . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="auteursuite" style="display:none;">';
                foreach ($json->facet_counts->facet_fields->authIdLastNameFirstName_fs as $res) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
                        $name = explode(wphal_delimiter, $res[0]);
                        if($name[0] == 0){
                            $q = 'authLastNameFirstName_s:'.urlencode("\"".$name[1]."\"");
                        }else{
                            $q = "authIdPerson_i:$name[0]";
                        }
                        $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><img alt="user" src=" ' . esc_url(plugin_dir_url(__FILE__) . '/img/user.svg').'" style="width:16px; margin-left:2px; margin-right:2px;"/><a href="' . esc_url(halv3 . '?q='. $q . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-auteur" onclick="visibilite(\'auteursuite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
        <div class="display" id="wphal-affiliated" style="display: none;">
            <h3 class="wphal-titre">' . __('Auteurs de la structure', 'wp-hal') . '</h3>';
            $parsed_facetfield = wphal_parse_affiliation_facet($json->facet_counts->facet_fields, $structIDs);
            if (!empty($parsed_facetfield)) {
                $content .= '<span id="triauteurs">';
                $content .= '<button type="button" class="trial" id="triaff" onclick="toggleSort(this, true, \'wphal-aff\', \'affiliateduite\', \'triaff\'); return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinbaff" onclick="toggleSort(this, false, \'wphal-aff\', \'affiliateduite\', \'trinbaff\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-auteurs" style="list-style-type: none;">';
                $content .= '<div id="wphal-aff">';
                $r = 0;
                foreach ($parsed_facetfield as $author=>$count) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $name = explode(wphal_delimiter, $author);
                    if($name[1] == 0){
                        $q = 'authLastNameFirstName_s:'.urlencode("\"".$name[2]."\"");
                    }else{
                        $q = "authIdPerson_i:$name[1]";
                    }
                    $content .= '<li class="metadata" data-percentage="' . $count . '"><img alt="user" src=" ' . esc_url(plugin_dir_url(__FILE__) . '/img/user.svg').'" style="width:16px; margin-left:2px; margin-right:2px;"/><a href="' . esc_url(halv3 . '?q='. $q . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[2] . '</a><span class="wphal-nbmetadata">' . $count . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="affiliateduite" style="display:none;">';
                foreach ($parsed_facetfield as $author=>$count) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
                        $name = explode(wphal_delimiter, $author);
                        if($name[1] == 0){
                            $q = 'authLastNameFirstName_s:'.urlencode("\"".$name[2]."\"");
                        }else{
                            $q = "authIdPerson_i:$name[1]";
                        }
                        $content .= '<li class="metadata" data-percentage="' . $count . '"><img alt="user" src=" ' . esc_url(plugin_dir_url(__FILE__) . '/img/user.svg').'" style="width:16px; margin-left:2px; margin-right:2px;"/><a href="' . esc_url(halv3 . '?q='. $q . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[2] . '</a><span class="wphal-nbmetadata">' . $count . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-auteur" onclick="visibilite(\'affiliateduite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
        <div class="display" id="wphal-revues" style="display: none;">
            <h3 class="wphal-titre">' . __('Revues', 'wp-hal') . '</h3>';
            if (isset($json->facet_counts->facet_fields->journalIdTitle_fs) && !is_null($json->facet_counts->facet_fields->journalIdTitle_fs) && !empty($json->facet_counts->facet_fields->journalIdTitle_fs)) {
                $content .= '<span id="trirevues">';
                $content .= '<button type="button" class="trial" id="trirev" onclick="toggleSort(this, true, \'wphal-rev\', \'revuesuite\', \'trirev\'); return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinbrev" onclick="toggleSort(this, false, \'wphal-rev\', \'revuesuite\', \'trinbrev\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-revues">';
                $content .= '<div id="wphal-rev">';
                $r = 0;
                foreach ($json->facet_counts->facet_fields->journalIdTitle_fs as $res) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $name = explode(wphal_delimiter, $res[0]);
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=journalId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="revuesuite" style="display:none;">';
                foreach ($json->facet_counts->facet_fields->journalIdTitle_fs as $res) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
                        $name = explode(wphal_delimiter, $res[0]);
                        $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=journalId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-revue" onclick="visibiliterevues(\'revuesuite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
        <div class="display" id="wphal-annees" style="display: none;">
            <h3 class="wphal-titre">' . __('Année de production', 'wp-hal') . '</h3>';
            if (isset($json->facet_counts->facet_fields->producedDateY_i) && !is_null($json->facet_counts->facet_fields->producedDateY_i) && !empty($json->facet_counts->facet_fields->producedDateY_i)) {
                $content .= '<span id="triannees">';
                $content .= '<button type="button" class="trial" id="trian" onclick="toggleSort(this, true, \'wphal-an\', \'anneesuite\', \'trian\'); return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinban" onclick="toggleSort(this, false, \'wphal-an\', \'anneesuite\', \'trinban\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-annees">';
                $content .= '<div id="wphal-an">';

                rsort($json->facet_counts->facet_fields->producedDateY_i);
                $r = 0;
                foreach ($json->facet_counts->facet_fields->producedDateY_i as $res) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=producedDateY_i:' . urlencode($res[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $res[0] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="anneesuite" style="display:none;">';
                foreach ($json->facet_counts->facet_fields->producedDateY_i as $res) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
                        $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=producedDateY_i:' . urlencode($res[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $res[0] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-annee" onclick="visibiliteannee(\'anneesuite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
        <div class="display" id="wphal-insts" style="display: none;">
            <h3 class="wphal-titre">' . __('Institutions', 'wp-hal') . '</h3>';
            if (isset($json->facet_counts->facet_fields->instStructIdName_fs) && !is_null($json->facet_counts->facet_fields->instStructIdName_fs) && !empty($json->facet_counts->facet_fields->instStructIdName_fs)) {
                $content .= '<span id="triinsts">';
                $content .= '<button type="button" class="trial" id="triinst" onclick="toggleSort(this, true, \'wphal-institu\', \'instsuite\', \'triinst\');  return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinbinst" onclick="toggleSort(this, false, \'wphal-institu\', \'instsuite\', \'trinbinst\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-insts">';
                $content .= '<div id="wphal-institu">';
                $r = 0;
                foreach ($json->facet_counts->facet_fields->instStructIdName_fs as $res) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $name = explode(wphal_delimiter, $res[0]);
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=instStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="instsuite" style="display:none;">';
                foreach ($json->facet_counts->facet_fields->instStructIdName_fs as $res) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
                        $name = explode(wphal_delimiter, $res[0]);
                        $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=instStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-inst" onclick="visibiliteinst(\'instsuite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
       <div class="display" id="wphal-labs" style="display: none;">
            <h3 class="wphal-titre">' . __('Laboratoires', 'wp-hal') . '</h3>';
            if (isset($json->facet_counts->facet_fields->labStructIdName_fs) && !is_null($json->facet_counts->facet_fields->labStructIdName_fs) && !empty($json->facet_counts->facet_fields->labStructIdName_fs)) {
                $content .= '<span id="trilabs">';
                $content .= '<button type="button" class="trial" id="trilab" onclick="toggleSort(this, true, \'wphal-labo\', \'labsuite\', \'trilab\');  return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinblab" onclick="toggleSort(this, false, \'wphal-labo\', \'labsuite\', \'trinblab\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-labs">';
                $content .= '<div id="wphal-labo">';

                $r = 0;
                foreach ($json->facet_counts->facet_fields->labStructIdName_fs as $res) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $name = explode(wphal_delimiter, $res[0]);
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=labStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="labsuite" style="display:none;">';
                foreach ($json->facet_counts->facet_fields->labStructIdName_fs as $res) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
                        $name = explode(wphal_delimiter, $res[0]);
                        $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=labStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-lab" onclick="visibilitelab(\'labsuite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
       <div class="display" id="wphal-depts" style="display: none;">
            <h3 class="wphal-titre">' . __('Départements', 'wp-hal') . '</h3>';
            if (isset($json->facet_counts->facet_fields->deptStructIdName_fs) && !is_null($json->facet_counts->facet_fields->deptStructIdName_fs) && !empty($json->facet_counts->facet_fields->deptStructIdName_fs)) {
                $content .= '<span id="tridept">';
                $content .= '<button type="button" class="trial" id="tridept" onclick="toggleSort(this, true, \'wphal-dpt\', \'deptsuite\', \'tridept\');  return false;" style="font-size:16px;  text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinbdept" onclick="toggleSort(this, false, \'wphal-dpt\', \'deptsuite\', \'trinbdept\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-depts">';
                $content .= '<div id="wphal-dpt">';
                $r = 0;
                foreach ($json->facet_counts->facet_fields->deptStructIdName_fs as $res) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $name = explode(wphal_delimiter, $res[0]);
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=deptStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="deptsuite" style="display:none;">';
                foreach ($json->facet_counts->facet_fields->deptStructIdName_fs as $res) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
                        $name = explode(wphal_delimiter, $res[0]);
                        $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=deptStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-dept" onclick="visibilitedept(\'deptsuite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
       <div class="display" id="wphal-equipes" style="display: none;">
            <h3 class="wphal-titre">' . __('Équipes de recherche', 'wp-hal') . '</h3>';
            if (isset($json->facet_counts->facet_fields->rteamStructIdName_fs) && !is_null($json->facet_counts->facet_fields->rteamStructIdName_fs) && !empty($json->facet_counts->facet_fields->rteamStructIdName_fs)) {
                $content .= '<span id="triequipe">';
                $content .= '<button type="button" class="trial" id="triequipe" onclick="toggleSort(this, true, \'wphal-rteam\', \'equipesuite\', \'triequipe\');  return false;" style="font-size:16px;text-decoration: none;" >Tri Alphabétique</button>';
                $content .= '<button type="button" class="trioc" id="trinbequipe" onclick="toggleSort(this, false, \'wphal-rteam\', \'equipesuite\', \'trinbequipe\'); return false;" style="font-size:16px;  text-decoration: none;">Tri Occurrence</button>';
                $content .= '</span>';
                $content .= '<ul class="wphal-equipes">';
                $content .= '<div id="wphal-rteam">';

                $r = 0;
                $name=[];
                foreach ($json->facet_counts->facet_fields->rteamStructIdName_fs as $res) {
                    $r = $r + 1;
                    if ($r > 10) {
                        break;
                    }
                    $name = explode(wphal_delimiter, $res[0]);
                    $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=rteamStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                }
                $i = 1;
                $content .= '<div id="equipesuite" style="display:none;">';
                foreach ($json->facet_counts->facet_fields->rteamStructIdName_fs as $res) {
                    if ($r < 10) {
                        break;
                    }
                    if ($i < $r) {
                        $i = $i + 1;
                    } else {
	                    $name = explode(wphal_delimiter, $res[0]);
                        $content .= '<li class="metadata" data-percentage="' . $res[1] . '"><a href="' . esc_url(halv3 . '?q=rteamStructId_i:' . urlencode($name[0]) . "+AND+" . $type . ':(' . $id . ')').'" target="_blank">' . $name[1] . '</a><span class="wphal-nbmetadata">' . $res[1] . '</span></li>';
                    }
                }
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</ul>';
                if ($r > 10) {
                    $content .= '<button type="button" style="text-decoration: none;" id="wphal-equipe" onclick="visibiliteequipe(\'equipesuite\'); return false;" >' . __('Liste complète', 'wp-hal');
                    $content .= '</button>';
                }
            }
            $content .= '</div>
    <div class="display" id="publications">';
            if (get_option('option_groupe') == 'grouper') {
                $doctype = file_get_contents(plugin_dir_path( __FILE__ ).'json'. DIRECTORY_SEPARATOR .'doctype_fr.json');
                $jsontype = json_decode($doctype);

//LISTE DES DOCUMENTS PAR GROUPE

                $content .= '<div class="counter-doc"><span class="wphal-nbtot">' . $json->grouped->docType_s->matches . ' </span>';
                $content .= __('documents', 'wp-hal'). '</div><br>';
                for ($i = 0; !empty($jsontype->response->result->doc[$i]); $i++) {
                    for ($d = 0; !empty($json->grouped->docType_s->groups[$d]); $d++) {
                        if ($json->grouped->docType_s->groups[$d]->groupValue == $jsontype->response->result->doc[$i]->str[0]){
                            $titre = $jsontype->response->result->doc[$i]->str[1];
                            $content .= '<div class="grp-div"><h3 class="wphal-titre-groupe">' . __($titre, 'wp-hal') . '<span class="wphal-nbmetadata" style="margin-left:10px;">' . $json->grouped->docType_s->groups[$d]->doclist->numFound . ' ' . _n('document', 'documents', $json->grouped->docType_s->groups[$d]->doclist->numFound, 'wp-hal') . '</span></h3>';
                            $content .= '<div class="grp-content">';
                            $content .= '<ul>';
                            foreach ($json->grouped->docType_s->groups[$d]->doclist->docs as $result) {
                                $content .= '<li>' . $result->citationFull_s . '</li>';
                            }
                            $content .= '</ul></div>';
                            $content .= '</div><br>';
                            break;
                        }
                    }
                }
            } elseif (get_option('option_groupe') == 'paginer') {

//LISTE DES DOCUMENTS AVEC PAGINATION
                $content .= '<div class="counter-doc"><span class="wphal-nbtot">' . $json->response->numFound . ' </span>';
                $content .= __('documents', 'wp-hal'). '</div><br>';

//--MODULE PAGINATION--//
                $messagesParPage = 10;

                $total = $json->response->numFound;

                $nombreDePages = ceil($total / $messagesParPage);

                if (isset($hal_page)) {
                    $pageActuelle = intval($hal_page);

                    if ($pageActuelle > $nombreDePages) {
                        $pageActuelle = $nombreDePages;
                    }
                } else {
                    $pageActuelle = 1;
                }
                $premiereEntree = ($pageActuelle - 1) * $messagesParPage;

                $url = wphal_api . '?q=*:*&fq=' . $type . ':(' . urlencode($id) . ')&fl=docid,citationFull_s,keyword_s,bookTitle_s,producedDate_s,authFullName_s&start=' . $premiereEntree . '&rows=' . $messagesParPage . '&sort=' . wphal_producedDateY . '&wt=json';
                $json = wphal_do_get_data($url);

//--MODULE PAGINATION--//
                $count_results = count($json->response->docs);
                if($count_results>0) {
	                $content .= '<ul>';
	                for ( $i = 0; $i <= $count_results - 1; $i ++ ) {
		                $content .= '<li>' . $json->response->docs[ $i ]->citationFull_s . '</li>';
	                }
	                $content .= '</ul>';
                } else {
	                $content = '<div> no results !</div>';
                }
                if($total> $messagesParPage) {
                    $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
                    $url = $base_url . $_SERVER["REQUEST_URI"];
                    $explodedURL= explode('?', $url);
                    $queryString = isset($explodedURL[1])?$explodedURL[1]:"";
                    $pagedHref = $explodedURL[0];
                    if(!empty($queryString)){
                        $parsedQueryString = [];
                        parse_str($queryString, $parsedQueryString);
                        if(isset($parsedQueryString["hal_page"])){
                            unset($parsedQueryString["hal_page"]);
                        }
                        $pagedHref .= '?';
                        foreach($parsedQueryString as $name => $value){
                            $pagedHref .= $name.'='.$value.'&';
                        }
                        // we add it back..
                        $pagedHref .= 'hal_page=';
                    }else {
                        $pagedHref .= '?hal_page=';
                    }

                //--AFFICHAGE PAGINATION--//
                    $precedents  = $pageActuelle - 2;
                    $suivants    = $pageActuelle + 2;
                    $precedent   = $pageActuelle - 1;
                    $suivant     = $pageActuelle + 1;
                    $penultimate = $nombreDePages - 1;

                    $content .= '<ul class="wphal-pagination">';
                //--BOUTON PRECEDENT--//
                    if ( $pageActuelle != 1 ) {
                        $content .= '<li><a href="'. $pagedHref . $precedent . '">&laquo;</a></li>';
                    }
                    if ( $nombreDePages <= 6 ) {// Cas 1 : 6 pages ou moins - Pas de troncature
                        for ( $i = 1; $i <= $nombreDePages; $i ++ ) {
                            if ( $i == $pageActuelle ) {
                                $content .= '<li class="active"><a href="#">' . $i . '</a></li>';
                            } else {
                                $content .= ' <li><a href="'. $pagedHref . $i . '">' . $i . '</a></li> ';
                            }
                        }
                    } elseif ( $nombreDePages >= 7 ) {// Cas 2 : 7 pages ou plus - Troncature
                        if ( $pageActuelle <= 3 ) {// Lorsque l'on est sur les trois premières pages
                            for ( $i = 1; $i <= 4; $i ++ ) {
                                if ( $i == $pageActuelle ) {
                                    $content .= '<li class="active"><a href="#">' . $i . '</a></li>';
                                } else {
                                    $content .= '<li><a href="'. $pagedHref . $i . '">' . $i . '</a></li>';
                                }
                            }
                            $content .= '<li class="disabled"><a href="#">&hellip;</a></li>';
                            $content .= '<li><a href="'. $pagedHref . $penultimate . '">' . $penultimate . '</a></li>';
                            $content .= '<li><a href="'. $pagedHref . $nombreDePages . '">' . $nombreDePages . '</a></li>';
                        }
                        if ( $pageActuelle >= 4 && $pageActuelle <= $penultimate - 2 ) {//Lorsque l'on arrive sur la quatrième page
                            $content .= '<li><a href="'.$pagedHref.'1">1</a></li>';
                            $content .= '<li class="disabled"><a href="#">&hellip;</a></li>';
                            $content .= '<li><a href="'. $pagedHref . $precedents . '">' . $precedents . '</a></li>';
                            $content .= '<li><a href="'. $pagedHref . $precedent . '">' . $precedent . '</a></li>';
                            $content .= '<li class="active"><a href="#">' . $pageActuelle . '</a></li>';
                            $content .= '<li><a href="'. $pagedHref . $suivant . '">' . $suivant . '</a></li>';
                            $content .= '<li><a href="'. $pagedHref . $suivants . '">' . $suivants . '</a></li>';
                            $content .= '<li class="disabled"><a href="#">&hellip;</a></li>';
                            $content .= '<li><a href="'. $pagedHref . $nombreDePages . '">' . $nombreDePages . '</a></li>';
                        }
                        if ( $pageActuelle >= $penultimate - 1 ) {
                            $content .= '<li><a href="'.$pagedHref.'1">1</a></li>';
                            $content .= '<li><a href="'.$pagedHref.'2">2</a></li>';
                            $content .= '<li class="disabled"><a href="#">&hellip;</a></li>';
                            for ( $i = $penultimate - 2; $i <= $nombreDePages; $i ++ ) {
                                if ( $i == $pageActuelle ) {
                                    $content .= '<li class="active"><a href="#">' . $i . '</a></li>';
                                } else {
                                    $content .= '<li><a href="'. $pagedHref . $i . '">' . $i . '</a></li>';
                                }
                            }
                        }
                    }
                //--BOUTON SUIVANT--//
                    if ( $pageActuelle < $nombreDePages ) {
                        $content .= '<li><a href="'. $pagedHref . $suivant . '">&raquo;</a></li>';
                    }
                    $content .= '</ul>';
                //--AFFICHAGE PAGINATION--//
                }
            }
            $content .= '</div>
    </div>
</div>';
        }}
        $content .= '<div class="wphal-footer">';
        $content .= '<p style="color:#B3B2B0">' . __("Documents récupérés de l'archive ouverte HAL", 'wp-hal') . '&nbsp;<a href="' . wphal_site . '" target="_blank"><img alt="logo" src=" ' . esc_url(plugin_dir_url(__FILE__) . 'img/logo-hal.png').'" style="width:90px;"></a></p>';
        $content .= '</div>';

//--AFFICHAGE GRAPHIQUE DOMAINE--//
        if (!is_null($facetdomain)) {
            foreach ($facetdomain as $res) {
                $name = explode(wphal_delimiter, $res[0])[1];
                $value = $res[1];
                $array[] = array($name, $value);
            }
            wp_localize_script('wp-hal-script4', 'WPWallSettings', $array);
        }
        $translation = array('liste' => __('Liste', 'wp-hal'), 'compl' => __('Liste complète', 'wp-hal'), 'princ' => __('Liste principale', 'wp-hal'), 'graph' => __('Graphique', 'wp-hal'), 'nuage' => __('Nuage de mots', 'wp-hal'));
        wp_localize_script('wp-hal-script4', 'translate', $translation);
    }
    // tags other that those will be stripped
    $allowed_html_tags = array(
        'div'     => array(
            'class'  => array(),
            'id' => array(),
            'style' => array(),
        ),
        "span"=> array(
            'class'  => array(),
            'id' => array(),
            'style' => array(),
        ),
        "img"=> array(
            'alt'  => array(),
            'src'  => array(),
            'style'  => array(),

        ),
        'p'     => array(
            'style'  => array(),
            'id' => array(),
        ),
        'h3'     => array(
            'id'  => array(),
            'class'  => array(),
            'style'  => array()
        ),
        'a'      => array(
            'href'  => array(),
            'target'  => array(),
            'title' => array(),
            'id'  => array(),
            'class'  => array(),
            'style'  => array(),
            'onclick'  => array(),
        ),
        'ul'     => array(
            'class'  => array(),
            'id'  => array(),
            'style'  => array(),
        ),
        'li'     => array(
            'class'  => array(),
            'id'  => array(),
            'data-percentage' => array()
        ),
        'button'     => array(
            'class'  => array(),
            'id'  => array(),
            'type' => array(),
            'style' => array(),
            'onclick' => array()
        )
        ,'br'     => array()
        ,'hr'     => array()
        ,'i'     => array(),
    );
    add_filter( 'safe_style_css', function( $styles ) {
        $styles[] = 'display';
        return $styles;
    } );
    return  wp_kses($content, $allowed_html_tags);
}

/**
 * build facet query based on the option choice
 *
 * @param array $option_choix
 * @param array $structIDs to build prefixed facet
 * @return array
 */
function wphal_buildfacet($option_choix, $structIDs)
{
    $facetQuery = [];
    if (is_array($option_choix) && !empty($option_choix)) {
        foreach ($option_choix as $option) {
            if ($option == 'disciplines') {
                $facetQuery[] = wphal_lang . '_domainAllCodeLabel_fs';
            }
            if ($option == 'mots-clefs') {
                $facetQuery[] = 'keyword_s';
            }
            if ($option == 'auteurs') {
                $facetQuery[] = 'authIdLastNameFirstName_fs';
            }
            if ($option == 'revues') {
                $facetQuery[] = 'journalIdTitle_fs';
            }
            if ($option == 'annee') {
                $facetQuery[] = 'producedDateY_i';
            }
            if ($option == 'institution') {
                $facetQuery[] = 'instStructIdName_fs';
            }
            if ($option == 'laboratoire') {
                $facetQuery[] = 'labStructIdName_fs';
            }
            if ($option == 'departement') {
                $facetQuery[] = 'deptStructIdName_fs';
            }
            if ($option == 'equipe') {
                $facetQuery[] = 'rteamStructIdName_fs';
            }
            if ($option == 'affiliated') {
                $facetField = 'structHasAuthIdHalPersonid_s';
                foreach($structIDs as $k => $structID){
                    $facetPrefix = $structID . wphal_delimiter;
                    $facetQuery[] = '&facet.field={!key=affiliated_' . $k . '+facet.prefix=' . urlencode($facetPrefix) . '}' . urlencode($facetField);
                }
            }
        }
    }
    return $facetQuery;
}

function wphal_verifSolr($values){
    $verifsolr = explode(',',$values);
    $numverif = count($verifsolr);
    $solrsql = '';
    if ($numverif<1024){
        $solrsql = str_replace(',',' OR ',$values);
    } else {
        $listsolrsql = explode(',',$values);
        for($i=0;$i<1024;$i++){
            if ($i == 0){
                $solrsql = $listsolrsql[$i];
            } else {
                $solrsql .= ' OR ';
                $solrsql .= $listsolrsql[$i];
            }
        }
    }

    return $solrsql;
}


/**
 * parses the affiliation facet
 *
 * @return array
 */
function wphal_parse_affiliation_facet($facet_fields, $structIDs)
{
    $result=[];
    foreach($structIDs as $k => $structID){
        if(isset($facet_fields->{'affiliated_'.$k}) && !empty($facet_fields->{'affiliated_'.$k})){
            foreach($facet_fields->{'affiliated_'.$k} as $r){
                $t = explode(wphal_delimiter_join, $r[0]);
                if (!isset($result[$t[1]])){
                    $result[$t[1]] = $r[1];
                }else {
                    $result[$t[1]] += $r[1];
                }
            }
        }
    }
    return $result;
}

function wphal_adding_style() {
    wp_register_style('wp-hal-style1', plugins_url('/css/style.css', __FILE__));
    wp_register_style('wp-hal-style2', plugins_url('/css/jquery.jqplot.css', __FILE__));

    wp_enqueue_style('wp-hal-style1');
}

function wphal_adding_script() {
    wp_register_script('wp-hal-script1',plugins_url('/js/jquery.jqplot.js', __FILE__));
    wp_register_script('wp-hal-script2',plugins_url('/js/jqplot.highlighter.js', __FILE__));
    wp_register_script('wp-hal-script3',plugins_url('/js/jqplot.pieRenderer.js', __FILE__));
    wp_register_script('wp-hal-script4',plugins_url('/js/cv-hal.js', __FILE__));


    wp_enqueue_script("jquery");
    wp_enqueue_script('wp-hal-script4', false, array(), false, true);
}

/**
 * Récupère les fichiers css et js
 */
if ( wphal_is_curl_installed() ) {
    add_action('wp_enqueue_scripts', 'wphal_adding_style');
    add_action('wp_enqueue_scripts', 'wphal_adding_script');
}

/**
 * Charge lorsque le plugin est désactivé
 */
register_deactivation_hook( __FILE__, 'wphal_reset_option' );

/**
 * Ajoute le widget wphal à l'initialisation des widgets
 */
add_action('widgets_init','wphal_init');

/**
 * Ajoute le menu à l'initialisation du menu admin
 */
add_action( 'admin_menu', 'wphal_menu' );

/**
 * Fonction de création du menu
 */
function wphal_menu() {
    add_menu_page( 'Options', 'Hal', 'manage_options', 'wp-hal.php', 'wphal_option' , '', 21);

    add_action( 'admin_init', 'wphal_register_settings' );
}


/**
 * Initialise le nouveau widget
 */
function wphal_init(){
    register_widget("wphal_widget");
}

/***********************************************************************************************************************
 * PLUGIN WIDGET
 **********************************************************************************************************************/

/**
 * Classe du widget wphal
 */

class wphal_widget extends WP_widget{
    /**
     * Défini les propriétés du widget
     */
    function __construct(){
        $options = array(
            "classname" => "wphal-publications",
            "description" => __("Afficher les dernières publications d'un auteur ou d'une structure.", 'wp-hal')
        );

        parent::__construct(
            'hal-publications',
            __("Publications HAL", 'wp-hal'),
            $options
        );
    }

    /**
     * Crée le widget
     * @param $args
     * @param $instance
     */
    function widget($args, $instance){
        if(isset($instance['idhal']) && !empty($instance['idhal'])) {
            $content = '';
            extract($args);
            /**
             * @var $before_widget : defined by extract
             * @var $before_title : defined by extract
             * @var $after_title : defined by extract
             * @var $after_widget : defined by extract
             */
            if (!wphal_is_curl_installed()) {
                $content = 'Please check the <a href="https://wordpress.org/plugins/hal/faq/" target="_blank" id="FAQ">FAQ</a> with the code : CURL';

            } else {
                $instance['idhal'] = wphal_verifSolr($instance['idhal']);
                $fieldName = $instance['typetext'] == 'title_s' ? 'title_s':'citationFull_s';

                $url = wphal_api . '?q=*:*&fq=' . $instance['select'] . ':' . urlencode($instance['idhal']) . '&fl=uri_s,' . $fieldName . '&sort=' . wphal_producedDateY . '&rows=' . $instance['nbdoc'] . '&wt=json';
                $json = wphal_do_get_data($url);

                $count_results = is_array($json->response->docs) ? count($json->response->docs) : 0;
                if (isset($json->response->docs) && $count_results > 0) {
                    $content = '<ul class="widhal-ul">';
                    for ($i = 0; $i < $count_results - 1; $i++) {
                        if ($fieldName == 'title_s') {
                            $typetext = $json->response->docs[$i]->title_s[0];
                        } else {
                            $typetext = $json->response->docs[$i]->citationFull_s;
                        }
                        $content .= '<li class="widhal-li"><a href="' . esc_url($json->response->docs[$i]->uri_s) . '" target="_blank">' . $typetext . '</a></li>';
                    }
                    $content .= '</ul>';
                } else {
                    $content = '<div> no results !</div>';
                }
            }
            // tags other that those will be stripped
            $allowed_html_tags = array(
                'div'     => array(
                    'class'  => array(),
                    'id' => array(),
                ),
                'h2'     => array(),
                'section'     => array(),
                'a'      => array(
                    'href'  => array(),
                    'target'  => array(),
                    'title' => array(),
                    'id'  => array(),
                    'class'  => array(),
                ),
                'ul'     => array(
                    'class'  => array(),
                    'id'  => array(),
                ),
                'li'     => array(
                    'class'  => array(),
                    'id'  => array(),
                )
            );
            $widget_block = $before_widget;
            $widget_block .= $before_title . $instance['titre'] . $after_title;
            $widget_block .= $content;
            $widget_block .= $after_widget;
            echo wp_kses($widget_block, $allowed_html_tags);
        }
    }

    /**
     * Sauvegarde des données
     * @param $new
     * @param $old
     */
    function update($new, $old){
        //the id must be provided
        if(isset($new['idhal']) && !empty($new['idhal'])) {
            $new['idhal'] = wphal_sanitize_username($new['idhal']);
            $new['nbdoc'] = wphal_sanitize_id($new['nbdoc']);
            return $new;
        }else
            return false;
    }

    /**
     * Formulaire du widget
     * @param $instance
     */
    function form($instance){

        $defaut = array(
            'titre' => __("Publications Hal", 'wp-hal'),
            'select' => "authIdHal_s",
            'typetext' => "title_s",
            'idhal' => "",
            'nbdoc' => 5
        );
        $instance = wp_parse_args($instance,$defaut);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id("titre"));?>"><?php echo esc_html(__('Titre','wp-hal')) .' :'?></label>
            <input value="<?php echo esc_js($instance['titre']);?>" name="<?php echo esc_attr($this->get_field_name("titre"));?>" id="<?php echo esc_attr($this->get_field_id("titre"));?>" class="widefat" type="text"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id("nbdoc"));?>"><?php echo esc_html(__("Nombre de documents affichés",'wp-hal')) .' :'?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id("nbdoc"));?>" name="<?php echo esc_attr($this->get_field_name("nbdoc"));?>" type="number" step="1" min="1" max="10" value="<?php echo esc_js($instance['nbdoc']);?>" size="3">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id("typetext"));?>"><?php echo esc_html(__("Type d'affichage",'wp-hal')) .' :'?></label>
            <select id="<?php echo esc_attr($this->get_field_id("typetext"));?>" name="<?php echo esc_attr($this->get_field_name("typetext"));?>">
                <option id="<?php echo esc_attr($this->get_field_id("Title"));?>" value="title_s" <?php echo esc_attr(($instance["typetext"] == "title_s")?'selected':''); ?>><label for="<?php echo wp_kses($this->get_field_id("Title"), []);?>"><?php echo esc_html(__("Titre", 'wp-hal'))?></label></option>
                <option id="<?php echo esc_attr($this->get_field_id("Citation"));?>" value="citationFull_s" <?php echo esc_attr(($instance["typetext"] == "citationFull_s")?'selected':''); ?>><label for="<?php echo esc_attr($this->get_field_id("Citation"));?>"><?php echo esc_html(__("Citation", 'wp-hal'), [])?></label></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id("select"));?>"><?php echo esc_html(__("Type d'Id",'wp-hal') .' :')?></label>
            <select id="<?php echo esc_attr($this->get_field_id("select"));?>" name="<?php echo esc_attr($this->get_field_name("select"));?>">
                <option id="<?php echo esc_attr($this->get_field_id("Idhal"));?>" value="authIdHal_s" <?php echo esc_attr(($instance["select"] == "authIdHal_s")?'selected':''); ?>><label for="<?php echo esc_attr($this->get_field_id("Idhal"));?>">Id Hal</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : laurent-capelli)','wp-hal'));?></span></option>
                <option id="<?php echo esc_attr($this->get_field_id("StructId"));?>" value="structId_i" <?php echo esc_attr(($instance["select"] == "structId_i")?'selected':''); ?>><label for="<?php echo esc_attr($this->get_field_id("StructId"));?>">Struct Id</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : 413106)','wp-hal'));?></span></option>
                <option id="<?php echo esc_attr($this->get_field_id("Anrproject"));?>" value="anrProjectId_i" <?php echo esc_attr(($instance["select"] == "anrProjectId_i")?'selected':''); ?>><label for="<?php echo esc_attr($this->get_field_id("Anrproject"));?>">anrProject Id</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : 1646)','wp-hal'));?></span></option>
                <option id="<?php echo esc_attr($this->get_field_id("Europeanproject"));?>" value="europeanProjectId_i" <?php echo esc_attr(($instance["select"] == "europeanProjectId_i")?'selected':''); ?>><label for="<?php echo esc_attr($this->get_field_id("Europeanproject"));?>">europeanProject Id</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : 17877)','wp-hal'));?></span></option>
                <option id="<?php echo esc_attr($this->get_field_id("Collection"));?>" value="collCode_s" <?php echo esc_attr(($instance["select"] == "collCode_s")?'selected':''); ?>><label for="<?php echo esc_attr($this->get_field_id("Collection"));?>">Collection</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : TICE2014)','wp-hal'));?></span></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id("idhal"));?>"><?php echo esc_html(__("Id",'wp-hal')) .' :'?></label>
            <input value="<?php echo esc_js($instance['idhal']);?>" name="<?php echo esc_attr($this->get_field_name("idhal"));?>" id="<?php echo esc_attr($this->get_field_id("idhal"));?>" type="text"/>
        </p>
    <?php
    }
}


function wphal_sanitize_id( $input ){
    if(is_numeric($input)){
        return $input;
    }
}

function wphal_sanitize_username($input)
{
    $allowed = array(".", "-", "_"); // you can add here more value, you want to allow.
    if(ctype_alnum(str_replace($allowed, '', $input ))) {
        return $input;
    }
}

function wphal_sanitize_phone( $input ){
    $phone_num = $input;
    $phone_num = preg_replace('/[^0-9]/', '', $phone_num);
    if(strlen($phone_num) === 10) {
        //Phone is 10 characters in length
        return $input;
    }
}


function wphal_register_settings() {
    register_setting( 'wphal_option', 'option_choix' );
    register_setting( 'wphal_option', 'option_type' );
    register_setting( 'wphal_option', 'option_groupe' );
    register_setting( 'wphal_option', 'option_idhal' , array(
        'type' => 'string',
        'sanitize_callback' => 'wphal_sanitize_username',
        'default' => NULL,
    ));
    register_setting( 'wphal_option', 'option_lang' );
    register_setting( 'wphal_option', 'option_infocontact' );
    register_setting( 'wphal_option', 'option_email' , array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_email',
        'default' => NULL,
    ));
    register_setting( 'wphal_option', 'option_tel' , array(
        'type' => 'string',
        'sanitize_callback' => 'wphal_sanitize_phone',
        'default' => NULL,
    ));
    register_setting( 'wphal_option', 'option_social0' , array(
        'type' => 'string',
        'sanitize_callback' => 'wphal_sanitize_username',
        'default' => NULL,
    ));
    register_setting( 'wphal_option', 'option_social1' , array(
        'type' => 'string',
        'sanitize_callback' => 'wphal_sanitize_username',
        'default' => NULL,
    ));
    register_setting( 'wphal_option', 'option_social2' , array(
        'type' => 'string',
        'sanitize_callback' => 'wphal_sanitize_username',
        'default' => NULL,
    ));
    register_setting( 'wphal_option', 'option_social3' , array(
        'type' => 'string',
        'sanitize_callback' => 'wphal_sanitize_username',
        'default' => NULL,
    ));
	register_setting( 'wphal_option', 'option_cache_timeout' , array(
        'type' => 'string',
        'sanitize_callback' => 'wphal_sanitize_id',
        'default' => NULL,
    ));
	register_setting( 'wphal_option', 'option_erase_cache' );
}

/**
 * Crée le menu d'option du plugin
 */
function wphal_option() {

    if (get_option('option_type')==''){
        update_option('option_type', 'authIdHal_s');
    }
    if (get_option('option_groupe')==''){
        update_option('option_groupe', 'paginer');
    }
    ?>
    <div class="wrap">
        <h2><?php echo esc_html(__('Plugin HAL','wp-hal'));?></h2>
        <form method="post" enctype="multipart/form-data" action="options.php">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <?php settings_fields( 'wphal_option' ); ?>
                        <?php do_settings_sections( 'wphal_option' ); ?>
                        <table class="form-table">
                            <tr style="vertical-align:top;">
                                <th scope="row" style="font-size: 18px;"><?php echo esc_html(__('Paramètre de la page :','wp-hal'));?></th>
                            </tr>
                            <tr style="vertical-align:top;">
                                <th scope="row"><label for="option_type"><?php echo esc_html(__('Type d\'Id','wp-hal'));?></label></th>
                                <td><select name="option_type">
                                        <option id="Idhal" value="authIdHal_s" <?php echo esc_attr(((get_option('option_type') == "authIdHal_s")?'selected':'')); ?>><label for="Idhal">Id Hal</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : laurent-capelli)','wp-hal'));?></span></option>
                                        <option id="StructId" value="structId_i" <?php echo esc_attr(((get_option('option_type') == "structId_i")?'selected':'')); ?>><label for="StructId">Struct Id</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : 413106)','wp-hal'));?></span></option>
                                        <option id="Anrproject" value="anrProjectId_i" <?php echo esc_attr(((get_option('option_type') == "anrProjectId_i")?'selected':'')); ?>><label for="Anrproject">anrProject Id</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : 1646)','wp-hal'));?></span></option>
                                        <option id="Europeanproject" value="europeanProjectId_i" <?php echo esc_attr(((get_option('option_type') == "europeanProjectId_i")?'selected':'')); ?>><label for="Europeanproject">europeanProject Id</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : 17877)','wp-hal'));?></span></option>
                                        <option id="Collection" value="collCode_s" <?php echo esc_attr(((get_option('option_type') == "collCode_s")?'selected':'')); ?>><label for="Collection">Collection</label><span style="font-style: italic;"> <?php echo esc_html(__('(Exemple : TICE2014)','wp-hal'));?></span></option>
                                    </select>
                                    <input type="text" name="option_idhal" id="option_idhal" value="<?php echo esc_js(get_option('option_idhal')); ?>"/>
                                </td>
                            </tr>
                            <tr style="vertical-align:top;">
                                <th scope="row"><?php echo esc_html(__('Affichage des documents','wp-hal'));?></th>
                                <td><input type="radio" name="option_groupe" id="paginer" value="paginer" <?php echo esc_attr((get_option('option_groupe') == "paginer")?'checked':''); ?>><label for="paginer"><?php echo esc_html(__('Documents avec pagination','wp-hal'));?></label><br>
                                    <input type="radio" name="option_groupe" id="grouper" value="grouper" <?php echo esc_js((get_option('option_groupe') == "grouper")?'checked':''); ?>><label for="grouper"><?php echo esc_html(__('Documents groupés par type','wp-hal'));?></label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align:top;">
                                <th scope="row"><?php echo esc_html(__('Choix des éléments menu(facette)','wp-hal'));?></th>
	                            <?php $option_choix = get_option('option_choix'); ?>
                                <td><input type="checkbox" name="option_choix[1]" id="Contact" value="contact" <?php echo esc_attr((isset($option_choix[1]) && $option_choix[1] == "contact")?'checked':''); ?>><label for="Contact"><?php echo esc_html(__('Contact','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[2]" id="Disciplines" value="disciplines" <?php echo esc_attr((isset($option_choix[2]) && $option_choix[2] == "disciplines")?'checked':''); ?>><label for="Disciplines"><?php echo esc_html(__('Disciplines','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[3]" id="Mots-clefs" value="mots-clefs" <?php echo esc_attr((isset($option_choix[3]) && $option_choix[3] == "mots-clefs")?'checked':''); ?>><label for="Mots-clefs"><?php echo esc_html(__('Mots-clefs','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[4]" id="Auteurs" value="auteurs" <?php echo esc_attr((isset($option_choix[4]) && $option_choix[4] == "auteurs")?'checked':''); ?>><label for="Auteurs"><?php echo esc_html(__('Auteurs','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[5]" id="Affiliated" value="affiliated" <?php echo esc_attr((isset($option_choix[5]) && $option_choix[5] == "affiliated")?'checked':''); ?>><label for="Affiliated"><?php echo esc_html(__('Auteurs de la structure','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[6]" id="Revues" value="revues" <?php echo esc_attr((isset($option_choix[6]) && $option_choix[6] == "revues")?'checked':''); ?>><label for="Revues"><?php echo esc_html(__('Revues','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[7]" id="Annee" value="annee" <?php echo esc_attr((isset($option_choix[7]) && $option_choix[7] == "annee")?'checked':''); ?>><label for="Annee"><?php echo esc_html(__('Année de production','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[8]" id="Institution" value="institution" <?php echo esc_attr((isset($option_choix[8]) && $option_choix[8] == "institution")?'checked':''); ?>><label for="Institution"><?php echo esc_html(__('Institutions','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[9]" id="Laboratoire" value="laboratoire" <?php echo esc_attr((isset($option_choix[9]) && $option_choix[9] == "laboratoire")?'checked':''); ?>><label for="Laboratoire"><?php echo esc_html(__('Laboratoires','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[10]" id="Departement" value="departement" <?php echo esc_attr((isset($option_choix[10]) && $option_choix[10] == "departement")?'checked':''); ?>><label for="Departement"><?php echo esc_html(__('Départements','wp-hal'));?></label><br/>
                                    <input type="checkbox" name="option_choix[11]" id="Equipe" value="equipe" <?php echo esc_attr((isset($option_choix[11]) && $option_choix[11] == "equipe")?'checked':''); ?>><label for="Equipe"><?php echo esc_html(__('Équipes de recherche','wp-hal'));?></label>
                                </td>
                            </tr>
                            <tr style="vertical-align:top;">
                                <th scope="row" style="font-size: 18px;"><?php echo esc_html(__('Contact :','wp-hal'));?></th>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo esc_html(__("Afficher les informations d'un chercheur ayant un IdHal ?",'wp-hal'));?></th>
                                <td><input type="radio" name="option_infocontact" id="wphal-yes" value="yes" <?php echo esc_attr((get_option('option_infocontact') == "yes")?'checked':''); ?>><label for="wphal-yes"><?php echo esc_html(__("Oui",'wp-hal'))?></label><br>
                                    <input type="radio" name="option_infocontact" id="wphal-no" value="no" <?php echo esc_attr((get_option('option_infocontact') ==  "no")?'checked':''); ?>><label for="wphal-no"><?php echo esc_html(__("Non",'wp-hal'))?></label><br>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="option_cache_timeout"><?php echo esc_html(__('Expiration cache  (minutes)','wp-hal'));?></label></th>
                                <td><input type="number" min="1440" style="width:300px;" placeholder="Default(1 day) : 1440" name="option_cache_timeout" id="option_cache_timeout" value="<?php echo esc_js(get_option('option_cache_timeout')); ?>"/><img alt="cache" src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/clock.svg');  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="option_erase_cache"><?php echo esc_html(__('Reinitialiser le cache','wp-hal'));?></label></th>
                                <td><input type="checkbox" name="option_erase_cache" id="option_erase_cache" value="1"/><img alt="option_erase_cache" src="<?php echo esc_url(plugin_dir_url( __FILE__ )."img/groom.svg");  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="option_email"><?php echo esc_html(__('Email','wp-hal'));?></label></th>
                                <td><input type="text" style="width:300px;" placeholder="Exemple : hi@mail.com" name="option_email" id="option_email" value="<?php echo esc_js(get_option('option_email')); ?>"/><img alt="email" src="<?php echo esc_url(plugin_dir_url( __FILE__ )."img/mail.svg");  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="option_tel"><?php echo esc_html(__('Téléphone','wp-hal'));?></label></th>
                                <td><input type="text" style="width:300px;" placeholder="Exemple : 06-01-02-03-04" name="option_tel" id="option_tel" value="<?php echo esc_js(get_option('option_tel'));?>"/><img alt="phone" src="<?php echo esc_url(plugin_dir_url( __FILE__ )."img/phone.svg");  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                            <tr>
                                <th><label for="option_social0">Facebook (http://www.facebook.com/)</label></th>
                                <td><input type="text" style="width:300px;" placeholder="Exemple : fa.book" name="option_social0" id="option_social0" value="<?php echo esc_js(get_option('option_social0')); ?>"/><img alt="facebook" src="<?php echo esc_url(plugin_dir_url( __FILE__ )."img/facebook.svg");  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                            <tr>
                                <th><label for="option_social1">Twitter (http://www.twitter.com/)</label></th>
                                <td><input type="text" style="width:300px;" placeholder="Exemple : tweet_heure" name="option_social1" id="option_social1" value="<?php echo esc_js(get_option('option_social1')); ?>"/><img alt="twitter" src="<?php echo esc_url(plugin_dir_url( __FILE__ )."img/twitter.svg");  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                            <tr>
                                <th><label for="option_social2">Google + (https://plus.google.com/u/0/+)</label></th>
                                <td><input type="text" style="width:300px;" placeholder="Exemple : goo.plus" name="option_social2" id="option_social2" value="<?php echo esc_js(get_option('option_social2')); ?>"/><img alt="google" src="<?php echo esc_url(plugin_dir_url( __FILE__ )."img/google-plus.svg");  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                            <tr>
                                <th><label for="option_social3">LinkedIn (https://www.linkedin.com/in/)</label></th>
                                <td><input type="text" style="width:300px;" placeholder="Exemple : link.dine" name="option_social3" id="option_social3" value="<?php echo esc_js(get_option('option_social3')); ?>"/><img alt="linkedin" src="<?php echo esc_url(plugin_dir_url( __FILE__ )."img/linkedin.svg");  ?>" style="vertical-align:middle; width:32px; margin-left:2px; margin-right:2px;"/></td>
                            </tr>
                        </table>
                        <?php
                        submit_button(__('Enregistrer','wp-hal'), 'primary large', 'submit', true); ?>
                    </div>
                    <div id="postbox-container-1" class="postbox-container">

                    </div>
                </div>
                <br class="clear"><br/>
            </div>
        </form>

    </div>

<?php
}


/**
 * Reset les données Hal
 */
function wphal_reset_option() {
    delete_option('option_choix');
    delete_option('option_type');
    delete_option('option_groupe');
    delete_option('option_idhal');
    delete_option('option_lang');
    delete_option('option_infocontact');
    delete_option('option_email');
    delete_option('option_tel');
    delete_option('option_social0');
    delete_option('option_social1');
    delete_option('option_social2');
    delete_option('option_social3');
	delete_option('option_cache_timeout');
	delete_option('option_erase_cache');
}

?>
