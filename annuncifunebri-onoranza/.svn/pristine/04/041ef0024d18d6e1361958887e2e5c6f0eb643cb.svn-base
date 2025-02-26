<?php
if (!defined('ABSPATH')) exit;

global $annuncio;
include_once ABSPATH . 'wp-admin/includes/plugin.php';

function annfu_start_session()
{
    if (!session_id()) {
        session_start();
    }
}

function annfu_end_session()
{
    session_destroy();
}

function aioseo_filter_facebook_tags($facebookMeta)
{
    if (is_singular()) {
        $facebookMeta['og:title'] = '';
        $facebookMeta['og:image'] = '';
    }
    return $facebookMeta;
}

function aioseo_filter_canonical_url($url)
{
    if (is_singular()) {
        return '';
    }
    return $url;
}

function aioseo_filter_twitter_title($twitterMeta)
{
    if (is_singular()) {
        $twitterMeta['twitter:title'] = '';
        $twitterMeta['twitter:card'] = '';
    }
    return $twitterMeta;
}

function aioseo_filter_conflicting_shortcodes($conflictingShortcodes)
{
    $conflictingShortcodes = array_merge($conflictingShortcodes, [
        'annfu_annunci' => '[ANNFU_ANNUNCI]',
        'annfu_annuncio' => '[ANNFU_ANNUNCIO]',
        'annfu_diretta' => '[ANNFU_DIRETTA]',
    ]);

    return $conflictingShortcodes;
}

function aioseo_change_wordpress_seo_title()
{
    return true;
}

function annfu_remove_seo()
{
    if (is_page(ANNFU_PAGE_ANNUNCIO)) {
        if (defined('WPSEO_VERSION')) { // Yoast SEO
            global $wpseo_front;
            if (defined($wpseo_front)) {
                remove_action('wp_head', [$wpseo_front, 'head'], 1);
            } else {
                if (class_exists(Yoast\WP\SEO\Integrations\Front_End_Integration::class)) {
                    $front_end = YoastSEO()->classes->get(Yoast\WP\SEO\Integrations\Front_End_Integration::class);
                    remove_action('wpseo_head', [$front_end, 'present_head'], -9999);
                } else {
                    $wp_thing = WPSEO_Frontend::get_instance();
                    remove_action('wp_head', [$wp_thing, 'head'], 1);
                }
            }
        }
        if (defined('AIOSEO_VERSION')) { // All-In-One SEO
            global $aiosp;
            remove_action('wp_head', [$aiosp, 'wp_head']);
        }

        if (is_plugin_active('seo-by-rank-math/rank-math.php')) {
            remove_all_actions('rank_math/head');
        }

        if (is_plugin_active('autodescription/autodescription.php')) {
            remove_all_filters('pre_get_document_title', false);
            add_filter('pre_get_document_title', 'annfu_title', 10, 2);
        }
    }
}

function annfu_title($title)
{
    global $wp_query, $annuncio;
    $vars = $wp_query->query_vars;

    if (is_page([ANNFU_PAGE_ANNUNCIO, ANNFU_PAGE_DIRETTA]) && isset($vars['slug'])) {

        if (is_null($annuncio)) {
            $referer = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $response = wp_remote_get(ANNFU_SITE_API . "/v2/annunci/" . $vars['slug'], [
                'sslverify' => false,
                'timeout' => ANNFU_REMOTE_TIMEOUT,
                'headers' => ['of' => get_option('annfu_onoranza_funebre_id'), 'ref' => $referer]
            ]);
            $annuncio = json_decode(wp_remote_retrieve_body($response), true);
            if (is_null($annuncio)) {
                $wp_query->set_404();
                status_header(404);
            }
        }

        $annuncioData = $annuncio['data'];

        if (is_page(ANNFU_PAGE_ANNUNCIO)) {
            $title = (isset($annuncioData) && isset($annuncioData['nominativo']) ? $annuncioData['nominativo'] . ' - Necrologio e condoglianze su ' : '') . get_bloginfo('name');
        } elseif (is_page(ANNFU_PAGE_DIRETTA)) {
            $title = 'Diretta del funerale di ' . $annuncioData['nominativo'];
        }
    }

    return $title;
}

function annfu_head()
{
    global $wp_query, $annuncio;
    $vars = $wp_query->query_vars;

    if (get_option('annfu_search_console') != '') {
        echo '<meta name="google-site-verification" content="' . get_option('annfu_search_console') . '"/>';
    }

    wp_enqueue_style('af-pwa', ANNFU_PLUGIN_URL . 'css/pwa.css', false, ANNFU_VERSION, 'all');
    wp_enqueue_script('af-cookie', ANNFU_PLUGIN_URL . 'js/js.cookie.js', ['jquery'], false, true);

    if (is_page([ANNFU_PAGE_ANNUNCIO, ANNFU_PAGE_ANNUNCI, ANNFU_PAGE_DIRETTA]) || is_front_page() || is_active_widget(false, false, 'annfu_widget', true)) {
        wp_enqueue_script('af-alpinejs', 'https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js', false, false, true);
        wp_enqueue_script('af-select2', ANNFU_PLUGIN_URL . 'js/select2.min.js', ['jquery'], false, true);
        if (get_option('annfu_bootstrap', 4) == 4) {
            wp_enqueue_script('af-bootstrap', ANNFU_PLUGIN_URL . 'js/bootstrap4-annfu.min.js', ['jquery'], ANNFU_VERSION, true);
        } elseif (get_option('annfu_bootstrap') == 3) {
            wp_enqueue_script('af-jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', ANNFU_VERSION, true);
            wp_enqueue_script('af-bootstrap', ANNFU_PLUGIN_URL . 'js/bootstrap3-annfu.min.js', ['af-jquery'], ANNFU_VERSION, true);
        }
        wp_enqueue_script('jquery-ui-datepicker', ['jquery']);
        wp_enqueue_script('af-dropzone', ANNFU_PLUGIN_URL . 'js/dropzone.min.js', ['jquery'], false, true);
        wp_enqueue_script('af-slick', ANNFU_PLUGIN_URL . 'js/slick.min.js', ['jquery'], false, false);
        wp_enqueue_script('af-colorbox', ANNFU_PLUGIN_URL . 'js/jquery.colorbox.min.js', ['jquery'], false, false);
        wp_enqueue_script('af', ANNFU_PLUGIN_URL . 'js/annuncifunebri.js', false, ANNFU_VERSION, true);
        wp_enqueue_script('af-fiori', ANNFU_PLUGIN_URL . 'js/annuncifunebriFiori.js', false, ANNFU_VERSION, true);
        wp_enqueue_script('af-ricordi-floreali', ANNFU_PLUGIN_URL . 'js/annuncifunebriRicordiFloreali.js', false, ANNFU_VERSION, true);
        wp_enqueue_script('af-fotocordogli', ANNFU_PLUGIN_URL . 'js/annuncifunebriFotoCordogli.js', false, ANNFU_VERSION, true);
        wp_enqueue_script('af-analytics', 'https://admin.annuncifunebri.it/js/analytics.js');

        wp_enqueue_style('af-font-awesome', ANNFU_PLUGIN_URL . 'css/fa6-all.min.css', false, ANNFU_VERSION, 'all');
        wp_enqueue_style('af-font-awesome-compatibility', ANNFU_PLUGIN_URL . 'css/v5-font-face.min.css', false, ANNFU_VERSION, 'all');
        wp_enqueue_style('af-jquery-ui', ANNFU_PLUGIN_URL . 'css/jquery-ui.min.css', false, ANNFU_VERSION, 'all');
        if (get_option('annfu_bootstrap', 4) == 4) {
            wp_enqueue_style('af-bootstrap4', ANNFU_PLUGIN_URL . 'css/bootstrap4-annfu.min.css', false, ANNFU_VERSION, 'all');
        } elseif (get_option('annfu_bootstrap') == 3) {
            wp_enqueue_style('af-bootstrap3', ANNFU_PLUGIN_URL . 'css/bootstrap3-annfu.min.css', false, ANNFU_VERSION, 'all');
        }
        wp_enqueue_style('af-select2', ANNFU_PLUGIN_URL . 'css/select2.min.css', false, ANNFU_VERSION, 'all');
        wp_enqueue_style('af-dropzone', ANNFU_PLUGIN_URL . 'css/dropzone.min.css', false, ANNFU_VERSION, 'all');
        wp_enqueue_style('af-slick', ANNFU_PLUGIN_URL . 'css/slick.min.css', [], ANNFU_VERSION, 'all');
        wp_enqueue_style('af-colorbox', ANNFU_PLUGIN_URL . 'css/colorbox.min.css', [], ANNFU_VERSION, 'all');
        wp_enqueue_style('af', ANNFU_PLUGIN_URL . 'css/style.css', false, ANNFU_VERSION . date('YmdHi'), 'all');

        $template = get_annfu_template();
        if (file_exists(ANNFU_PLUGIN_PATH . 'css/style-' . $template . '.css')) {
            wp_enqueue_style('af-custom', ANNFU_PLUGIN_URL . 'css/style-' . $template . '.css', false, ANNFU_VERSION, 'all');
        }

        echo '<meta name="af-version" content="' . ANNFU_VERSION . '"/>';
    }

    if (is_page(ANNFU_PAGE_DIRETTA)) {
        wp_enqueue_script('annuncifunebri-streaming', 'https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js');
        if (isset($_POST['password'])) {
            setcookie('annuncifunebri_streaming', annfu_encrypt(hash('sha256', $_POST['password'])), time() + 3 * HOUR_IN_SECONDS, '/');
        }
    }

    if (is_page(ANNFU_PAGE_ANNUNCI)) {
        annfu_delete_annunci_cookies();
        annfu_add_annunci_cookies();
        $page = isset($vars['pg']) && is_numeric($vars['pg']) ? $vars['pg'] : 1;
        setcookie('annuncifunebri_page', annfu_encrypt($page), time() + MONTH_IN_SECONDS, '/');
    }

    if (isset($vars['comune']) && isset($vars['slug'])) {

        if (is_null($annuncio)) {
            $referer = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $response = wp_remote_get(ANNFU_SITE_API . "/v2/annunci/" . $vars['slug'], [
                'sslverify' => false,
                'timeout' => ANNFU_REMOTE_TIMEOUT,
                'headers' => ['of' => get_option('annfu_onoranza_funebre_id'), 'ref' => $referer]
            ]);
            $annuncio = json_decode(wp_remote_retrieve_body($response), true);
            if (is_null($annuncio)) {
                $wp_query->set_404();
                status_header(404);
            }
        }

        if (array_key_exists('metaData', $annuncio)) {
            $metaData = $annuncio['metaData'];
            $annuncioData = $annuncio['data'];
        } else {
            $annuncioData = $annuncio;
        }

        $cordoglioId = isset($_COOKIE['cordoglio_id']) ? esc_html($_COOKIE['cordoglio_id']) : null;
        if ($cordoglioId && array_key_exists('cordogli_approvati', $annuncio['data']) && in_array($cordoglioId, $annuncio['data']['cordogli_approvati'])) {
            unset($_COOKIE['cordoglio_id']);
            setcookie("cordoglio_id", "", time() - 3600 * 24);
        }


        $title = (isset($annuncioData) && isset($annuncioData['nominativo']) ? $annuncioData['nominativo'] . ' - Necrologio e condoglianze su ' : '') . get_bloginfo('name');
        echo '<title>' . $title . '</title>' . "\n";
        echo '<link rel="canonical" href="' . get_permalink() . $vars['comune'] . '/' . $vars['slug'] . '/" />' . "\n";
        echo '<meta name="description" content="' . substr(strip_tags($annuncioData['testo']), 0, 120) . '...\n' . '" />' . "\n";
        echo '<meta name="keywords" content="' . str_replace('"', '\'', $annuncioData['nominativo']) . ', ' . $annuncioData['onoranzaFunebre']['ragioneSociale'] . ', annuncio, annunci, funebri, onoranza, funebre, conforto, cordoglio, partecipazione, defunto, morto" />';
        echo '<meta property="og:site_name" content="' . get_site_url() . '"/>';
        if ($annuncioData['onoranzaFunebre']['slug'] == 'fratelliferrario') {
            echo '<meta property="og:title" content="' . str_replace('"', '\'', $annuncioData['nominativo']) . ' - Invia le tue Condoglianze Online"/>';
        } else if ($annuncioData['onoranzaFunebre']['slug'] == 'casasrl') {
            echo '<meta property="og:title" content="' . str_replace('"', '\'', $annuncioData['nominativo']) . ' - Casa funeraria Caliendo - Celestial"/>';
        } else {
            echo '<meta property="og:title" content="' . str_replace('"', '\'', $annuncioData['nominativo']) . ' - ' . $annuncioData['onoranzaFunebre']['ragioneSociale'] . '"/>';
        }
        echo '<meta property="og:type" content="profile" />';
        echo '<meta property="og:description" content="' . substr(strip_tags($annuncioData['testo']), 0, 120) . '... ' . $annuncioData['onoranzaFunebre']['ragioneSociale'] . '" />';
        echo '<meta property="og:url" content="' . get_permalink() . $vars['comune'] . '/' . $vars['slug'] . '/"/>';
        if (!is_null($annuncioData['facebookFoto'])) {
            echo '<meta property="og:image" content="' . annfu_fix_url($annuncioData['facebookFoto']) . '"/>';
        } elseif (get_option('annfu_epigrafe_facebook', 0) && $annuncioData['onoranzaFunebre']['showEpigrafeAnteprima'] && filter_var($annuncioData['fileEpigrafe'], FILTER_VALIDATE_URL) && substr($annuncioData['fileEpigrafe'], -4) != '.pdf') {
            echo '<meta property="og:image" content="' . annfu_fix_url($annuncioData['fileEpigrafe']) . '"/>';
            echo '<meta property="og:image:width" content="' . $annuncioData['fileEpigrafeWidth'] . '" />';
            echo '<meta property="og:image:height" content="' . $annuncioData['fileEpigrafeHeight'] . '" />';
        } elseif (!is_null($annuncioData['foto'])) {
            echo '<meta property="og:image" content="' . annfu_fix_url($annuncioData['foto']) . '"/>';
            echo '<meta property="og:image:width" content="300" />';
            echo '<meta property="og:image:height" content="360" />';
        }
        echo '<meta property="og:first_name" content="' . str_replace('"', '\'', $annuncioData['nome']) . '"/>';
        echo '<meta property="og:last_name" content="' . str_replace('"', '\'', $annuncioData['cognome']) . '"/>';
        echo '<meta property="fb:app_id" content="966242223397117"/>';

        echo '<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Article",
  "headline": "' . esc_html($annuncioData['nominativo']) . '",
  "author": {
	"@type": "Organization",
	"name": "' . $annuncioData['onoranzaFunebre']['ragioneSociale'] . '",
	"url": "' . get_site_url() . '",
	"address": {
	  "@type": "PostalAddress",
	  "streetAddress": "' . $annuncioData['onoranzaFunebre']['via'] . '",
	  "addressLocality": "' . $annuncioData['onoranzaFunebre']['comune'] . '",
	  "postalCode": "' . $annuncioData['onoranzaFunebre']['cap'] . '",
	  "addressCountry": "ITA"
	},
	"contactPoint" : [
      { 
        "@type" : "ContactPoint",
          "telephone" : "+39 ' . $annuncioData['onoranzaFunebre']['telefono1'] . '",
          "contactType" : "customer service",
          "contactOption" : "H24",
          "email": "' . $annuncioData['onoranzaFunebre']['mail'] . '"
      }
    ],
    "logo": {
      "@type": "ImageObject",
      "url": "' . $annuncioData['onoranzaFunebre']['logo'] . '"
    }
  },
  "url": "' . get_permalink() . '/' . $vars['comune'] . '/' . $vars['slug'] . '",
  "mainEntityOfPage": "' . get_permalink() . '/' . $vars['comune'] . '/' . $vars['slug'] . '",
  "image": "' . annfu_fix_url($annuncioData['foto']) . '",
  "genre": "necrologie",
  "description": "' . esc_html(strip_tags(str_replace(['’', '“', '”', "\\"], ["'", "\"", "\"", "/"], $annuncioData['apertura']))) . '",
  "articleBody": "' . esc_html(strip_tags(str_replace(['’', '“', '”', "\\"], ["'", "\"", "\"", "/"], $annuncioData['testo']))) . '",
  "datePublished": "' . date_i18n('c', strtotime($annuncioData['data'])) . '",
  "dateModified": "' . date_i18n('c', strtotime($annuncioData['updatedAt'])) . '",
  "publisher": {
    "@type": "Organization",
    "name": "' . $annuncioData['onoranzaFunebre']['ragioneSociale'] . '",
	"url": "' . get_site_url() . '",
	"address": {
	  "@type": "PostalAddress",
	  "streetAddress": "' . $annuncioData['onoranzaFunebre']['via'] . '",
	  "addressLocality": "' . $annuncioData['onoranzaFunebre']['comune'] . '",
	  "postalCode": "' . $annuncioData['onoranzaFunebre']['cap'] . '",
	  "addressCountry": "ITA"
	},
	"contactPoint" : [
      { 
        "@type" : "ContactPoint",
          "telephone" : "+39 ' . $annuncioData['onoranzaFunebre']['telefono1'] . '",
          "contactType" : "customer service",
          "contactOption" : "H24",
          "email": "' . $annuncioData['onoranzaFunebre']['mail'] . '"
      }
    ],
    "logo": {
      "@type": "ImageObject",
      "url": "' . $annuncioData['onoranzaFunebre']['logo'] . '"
    }
  }
}
</script>';
        if (isset($annuncioData['onoranzaFunebre']['openReplay']) && $annuncioData['onoranzaFunebre']['openReplay'] == 1) {
            include('_open-replay.php');
        }
    }
}

function annfu_add_annunci_cookies()
{
    global $wp_query;
    $vars = $wp_query->query_vars;

    $variables = annfu_query_variables();
    foreach ($variables as $var) {
        if (isset($vars[$var]) && $vars[$var] != "") {
            if ($var == "dal" || $var == "al") {
                list($gg, $mm, $aa) = explode("/", $vars[$var]);
                setcookie('annuncifunebri_' . $var . '_en', annfu_encrypt($aa . "-" . $mm . "-" . $gg), time() + MONTH_IN_SECONDS, '/');
            }
            setcookie('annuncifunebri_' . $var, annfu_encrypt($vars[$var]), time() + MONTH_IN_SECONDS, '/');
        }
    }
}

function annfu_delete_annunci_cookies()
{
    $variables = annfu_query_variables();
    if (isset($_GET['reset']) || (isset($_GET['text']) && $_GET['text'] == '')) {
        setcookie('annuncifunebri_page', '', time() - 3600, '/');
        setcookie('annuncifunebri_dal_en', '', time() - 3600, '/');
        setcookie('annuncifunebri_al_en', '', time() - 3600, '/');
        foreach ($variables as $var) {
            setcookie('annuncifunebri_' . $var, '', time() - 3600, '/');
        }
    }

    if (isset($_GET['avanzata']) && $_GET['avanzata'] == 1) {
        setcookie('annuncifunebri_text', '', time() - 3600, '/');
        setcookie('annuncifunebri_regione', '', time() - 3600, '/');
        setcookie('annuncifunebri_provincia', '', time() - 3600, '/');
    } elseif (isset($_GET['avanzata']) && $_GET['avanzata'] == 0) {
        foreach ($variables as $var) {
            if ($var != 'text') setcookie('annuncifunebri_' . $var, '', time() - 3600, '/');
        }
    } else {
        foreach ($variables as $var) {
            if ($var != 'regione' && $var != 'provincia') setcookie('annuncifunebri_' . $var, '', time() - 3600, '/');
        }
    }
}

function annfu_header()
{
    if (get_option('annfu_abilita_notifiche_pwa', 0) == 1) {
        include('_download_pwa.php');
    }
}

function annfu_footer()
{
    if (get_option('annfu_abilita_notifiche_pwa', 0) == 1) {
        include('_allow_notifications.php');
    }
}

function annfu_query_variables()
{
    return ['text', 'regione', 'provincia', 'onoranza_funebre_id', 'nome', 'cognome', 'paese', 'dal', 'al'];
}

function annfu_query_annunci()
{
    global $wp_query;
    $vars = $wp_query->query_vars;
    $variables = annfu_query_variables();

    $limit = get_option('annfu_max_per_page', ANNFU_MAX_PER_PAGE);
    $page = isset($vars['pg']) && is_numeric($vars['pg']) ? $vars['pg'] : 1;

    $query = '?onoranza_funebre_id=' . get_option('annfu_onoranza_funebre_id');
    foreach ($variables as $var) {
        if (isset($vars[$var]) || isset($_COOKIE['annuncifunebri_' . $var])) {
            if ($var == "dal" || $var == "al") {
                if(get_query_var($var) != "") {
                    $query .= '&' . $var . '=' . annfu_get_date_parameter($var);
                } else {
                    $query .= '&' . $var . '=' . htmlspecialchars(annfu_decrypt($_COOKIE['annuncifunebri_' . $var . '_en']));
                }
            } else {
                $query .= '&' . $var . '=' . urlencode(htmlspecialchars(get_query_var($var, annfu_decrypt($_COOKIE['annuncifunebri_' . $var]))));
            }
        }
    }
    $query .= $limit != ANNFU_MAX_PER_PAGE ? "&limit=" . $limit : "";
    $query .= $page != 1 ? "&page=" . $page : "";

    return $query;
}


function annfu_annunci_shortcode()
{
    if (get_option('annfu_onoranza_funebre_id') != '') {
        ob_start();
        include_once('annunci.php');
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    } else {
        return 'Plugin Annunci Funebri non configurato';
    }
}

function annfu_annunci_register_shortcode()
{
    add_shortcode('ANNFU_ANNUNCI', 'annfu_annunci_shortcode');
}

function annfu_ultimi_annunci_shortcode()
{
    if (get_option('annfu_onoranza_funebre_id') != '') {
        ob_start();
        include_once('ultimi-annunci.php');
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    } else {
        return 'Plugin Annunci Funebri non configurato';
    }
}

function annfu_ultimi_annunci_register_shortcode()
{
    add_shortcode('ANNFU_ULTIMI_ANNUNCI', 'annfu_ultimi_annunci_shortcode');
}

function annfu_annuncio_shortcode()
{
    if (get_option('annfu_onoranza_funebre_id') != '') {
        ob_start();
        include_once('annuncio.php');
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    } else {
        return 'Plugin Annunci Funebri non configurato';
    }
}

function annfu_annuncio_register_shortcode()
{
    add_shortcode('ANNFU_ANNUNCIO', 'annfu_annuncio_shortcode');
}

function annfu_diretta_shortcode()
{
    if (get_option('annfu_onoranza_funebre_id') != '') {
        ob_start();
        include_once('diretta.php');
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    } else {
        return 'Plugin Annunci Funebri non configurato';
    }
}

function annfu_diretta_register_shortcode()
{
    add_shortcode('ANNFU_DIRETTA', 'annfu_diretta_shortcode');
}

// aggiungo le variabili che mi servono nella riscrittura degli URL
function annfu_add_query_vars($aVars)
{
    $aVars[] = "text";
    $aVars[] = "slug";
    $aVars[] = "regione";
    $aVars[] = "provincia";
    $aVars[] = "regione_id";
    $aVars[] = "provincia_id";
    $aVars[] = "comune";
    $aVars[] = "nome";
    $aVars[] = "cognome";
    $aVars[] = "paese";
    $aVars[] = "dal";
    $aVars[] = "al";
    $aVars[] = "pg";

    return $aVars;
}

// riscrivo gli URL come mi serve
function annfu_rewrite_rules()
{
    add_rewrite_rule(ANNFU_PAGE_DIRETTA . '/([^/]+)$', 'index.php?pagename=' . ANNFU_PAGE_DIRETTA . '&slug=$matches[1]', 'top');
    add_rewrite_rule(ANNFU_PAGE_ANNUNCIO . '/([^/]+)/([^/]+)$', 'index.php?pagename=' . ANNFU_PAGE_ANNUNCIO . '&comune=$matches[1]&slug=$matches[2]', 'top');
    add_rewrite_rule(ANNFU_PAGE_ANNUNCI . '/(\d+)/?$', 'index.php?pagename=' . ANNFU_PAGE_ANNUNCI . '&pg=$matches[1]', 'top');
    add_rewrite_rule(ANNFU_PAGE_ANNUNCI . '/([^/]+)/?$', 'index.php?pagename=' . ANNFU_PAGE_ANNUNCI . '&regione=$matches[1]', 'top');
    add_rewrite_rule(ANNFU_PAGE_ANNUNCI . '/([^/]+)/([^/]+)/?$', 'index.php?pagename=' . ANNFU_PAGE_ANNUNCI . '&regione=$matches[1]&provincia=$matches[2]', 'top');
    add_rewrite_rule(ANNFU_PAGE_ANNUNCI . '/([^/]+)/([^/]+)/(\d+)/?$', 'index.php?pagename=' . ANNFU_PAGE_ANNUNCI . '&regione=$matches[1]&provincia=$matches[2]&pg=$matches[3]', 'top');
    add_rewrite_rule(ANNFU_PAGE_AF_VERSION, 'index.php?af-version=' . ANNFU_VERSION, 'top');
    flush_rewrite_rules();
}

function annfu_add_endpoints()
{
    if (is_page([ANNFU_PAGE_ANNUNCIO, ANNFU_PAGE_ANNUNCI, ANNFU_PAGE_DIRETTA])) {
        header("Cache-Control: no-cache");
    }

    add_rewrite_endpoint(ANNFU_PAGE_ANNUNCIO, EP_PAGES);
}

function annfu_rewrite_tag()
{
    add_rewrite_tag('%pagename%', '([^&]+)');
    add_rewrite_tag('%regione%', '([^&]+)');
    add_rewrite_tag('%provincia%', '([^&]+)');
    add_rewrite_tag('%comune%', '([^&]+)');
    add_rewrite_tag('%slug%', '([^&]+)');
    add_rewrite_tag('%annuncio%', '([^&]+)');
}

function annfu_text_url($link, $text, $blank = null)
{
    $htmlLink = $text;
    if (filter_var($link, FILTER_VALIDATE_URL)) {
        $htmlLink = "<a href=\"{$link}\" " . (!is_null($blank) ? "target=\"_blank\"" : "") . ">{$text}</a>";
    }

    return $htmlLink;
}

function annfu_script_defer($tag, $handle)
{
    return 'af-alpinejs' !== $handle ? $tag : str_replace(' src', ' defer src', $tag);
}

function get_annfu_version()
{
    register_rest_route('annfu', '/version', [
        'methods' => 'GET',
        'callback' => 'annfu_version',
    ]);
}

function annfu_version()
{
    return ['version' => ANNFU_VERSION];
}

function get_annfu_template()
{
    $template = get_option('annfu_template', 'default');

    return $template == '' ? 'default' : $template;
}

// menu
function annfu_menu()
{
    add_menu_page(__('Annunci Funebri', 'af'), __('Annunci Funebri', 'af'), 'edit_others_pages', 'af-plugin', 'annfu_admin', ANNFU_IMG . 'af.png');
}

// script e css
function annfu_admin_scripts($hook)
{
    if ('toplevel_page_af-plugin' != $hook) {
        return;
    }
    wp_enqueue_script('af-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, false, true);
    wp_enqueue_script('af-ace', ANNFU_PLUGIN_URL . 'js/ace/ace.js', false, false, true);
    wp_enqueue_script('af-bootstrap4', ANNFU_PLUGIN_URL . 'js/bootstrap4-annfu.min.js', ['jquery'], false, true);
    wp_enqueue_script('af-cp', ANNFU_PLUGIN_URL . 'js/bootstrap-colorpicker.min.js', ['jquery'], false, true);
    wp_enqueue_script('af', ANNFU_PLUGIN_URL . 'js/annuncifunebriAdmin.js', false, false, true);
    wp_enqueue_style('af', ANNFU_PLUGIN_URL . 'css/style.css', false, '1.0', 'all');
    wp_enqueue_style('af-bootstrap4', ANNFU_PLUGIN_URL . 'css/bootstrap4-annfu.min.css', false, '1.0', 'all');
    wp_enqueue_style('af-cp', ANNFU_PLUGIN_URL . 'css/bootstrap-colorpicker.min.css', false, '1.0', 'all');
}

function annfu_get_testi_aggiuntivi()
{
    return [
        'cima_annuncio' => 'Testo visibile in cima all\'annuncio',
        'fondo_annuncio' => 'Testo visibile in fondo all\'annuncio',
        'fondo_form_cordogli' => 'Testo visibile in fondo alla form di inserimento cordogli',
        'invito_download_pwa_android' => 'Testo del pulsante per il download della PWA (solo Android)',
        'invito_download_pwa_ios' => 'Testo di invito al download della PWA (solo iOS)'
    ];
}

// pagina di amministrazione
function annfu_admin()
{
    require_once('backoffice.php');
}

//salvataggio del form
function annfu_register_settings()
{
    register_setting('af-settings', 'annfu_onoranza_funebre_id');
    register_setting('af-settings', 'annfu_page_annunci');
    register_setting('af-settings', 'annfu_page_annuncio');
    register_setting('af-settings', 'annfu_page_diretta');
    register_setting('af-settings', 'annfu_max_per_page');
    register_setting('af-settings', 'annfu_pages');
    register_setting('af-settings', 'annfu_ultimi_annunci');
    register_setting('af-settings', 'annfu_ultimi_annunci_per_slide');
    register_setting('af-settings', 'annfu_bootstrap');
    register_setting('af-settings', 'annfu_template');
    register_setting('af-settings', 'annfu_link_fiori');
    register_setting('af-settings', 'annfu_lightbox');
    register_setting('af-settings', 'annfu_breadcrumbs');
    register_setting('af-settings', 'annfu_search_console');
    register_setting('af-settings', 'annfu_poweredby');
    register_setting('af-settings', 'annfu_abilita_notifiche_pwa');
    register_setting('af-settings', 'annfu_notifiche_pwa_fixed');
    register_setting('af-settings', 'annfu_epigrafe_facebook');
    register_setting('af-settings', 'annfu_custom_privacy');
    register_setting('af-settings', 'annfu_css');
    register_setting('af-settings', 'annfu_css_pwa');
    $afOptionColors = annfu_get_options();
    foreach ($afOptionColors as $k => $v) {
        register_setting('af-settings', $k);
    }
    $testi = annfu_get_testi_aggiuntivi();
    foreach ($testi as $k => $v) {
        register_setting('af-settings', 'annfu_' . $k);
    }
}

function annfu_get_options()
{
    return [
        //annunci - ricerca ///////////////////////////////////////////////////////////////////////////
        'id_bg_annfu_annunci_filter' => [
            'css' => '#annfu_annunci_filter .front, #annfu_annunci_filter .back',
            'property' => 'background-color',
            'default' => '#fafafa',
            'description' => 'Sfondo box'],
        'id_annfu_annunci_filter' => [
            'css' => '#annfu_annunci_filter .front, #annfu_annunci_filter .back',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore box'],
        'class_bg_annfu_filter_submit' => [
            'css' => '.annfu_filter_submit',
            'property' => 'background-color',
            'default' => '#dcdcdc',
            'description' => 'Sfondo pulsante'],
        'class_annfu_filter_submit' => [
            'css' => '.annfu_filter_submit',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore pulsante'],
        //annunci - elenco ////////////////////////////////////////////////////////////////////////////
        'id_border_annfu_annunci' => [
            'css' => '.annfu_annunci',
            'property' => 'border-color',
            'default' => '#f2f2f2',
            'description' => 'Bordo contenitore annunci'],
        'id_bg_annfu_annunci' => [
            'css' => '.annfu_annunci',
            'property' => 'background-color',
            'default' => '#fafafa',
            'description' => 'Sfondo contenitore annunci'],
        'class_border_annfu_annunci_wrapper' => [
            'css' => '.annfu_annunci_wrapper',
            'property' => 'border-color',
            'default' => '#dcdcdc',
            'description' => 'Bordo annuncio'],
        'class_bg_annfu_annunci_wrapper' => [
            'css' => '.annfu_annunci_wrapper',
            'property' => 'background-color',
            'default' => '#ffffff',
            'description' => 'Sfondo annuncio'],
        'class_annfu_annunci_wrapper' => [
            'css' => '.annfu_annunci_wrapper',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore testo annuncio'],
        'class_annfu_annunci_nominativo' => [
            'css' => 'h2.annfu_annunci_nominativo a',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore titolo annuncio'],
        'class_border_hover_annfu_annunci_wrapper' => [
            'css' => '.annfu_annunci_wrapper:hover',
            'property' => 'border-color',
            'default' => '#4f5064',
            'description' => 'Bordo annuncio (hover)'],
        'class_bg_hover_annfu_annunci_wrapper' => [
            'css' => '.annfu_annunci_wrapper:hover',
            'property' => 'background-color',
            'default' => '#4f5064',
            'description' => 'Sfondo annuncio (hover)'],
        'class_hover_annfu_annunci_wrapper' => [
            'css' => '.annfu_annunci_wrapper:hover',
            'property' => 'color',
            'default' => '#ffffff',
            'description' => 'Colore testo annuncio (hover)'],
        'class_hover_annfu_annunci_nominativo' => [
            'css' => '.annfu_annunci_wrapper:hover h2.annfu_annunci_nominativo a',
            'property' => 'color',
            'default' => '#ffffff',
            'description' => 'Colore titolo annuncio (hover)'],
        'class_bg_hover_annfu_add_cordoglio' => [
            'css' => '.annfu_annunci_wrapper:hover h2.annfu_add_cordoglio',
            'property' => 'background-color',
            'default' => '#ffffff',
            'description' => 'Sfondo aggiungi cordoglio'],
        'class_hover_annfu_add_cordoglio' => [
            'css' => '.annfu_annunci_wrapper:hover h2.annfu_add_cordoglio',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore aggiungi cordoglio'],
        //annuncio //////////////////////////////////////////////////////////////////////////////////
        'class_border_annfu_annuncio_wrapper' => [
            'css' => '.annfu_annuncio_wrapper',
            'property' => 'border-color',
            'default' => '#d2d2d2',
            'description' => 'Bordo annuncio'],
        'class_annfu_annuncio_wrapper' => [
            'css' => '.annfu_annuncio_wrapper',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore testo annuncio'],
        'class_h2_annfu_annuncio_wrapper' => [
            'css' => '.annfu_annuncio_wrapper h2',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore testo nominativo'],
        //annuncio - form cordoglio /////////////////////////////////////////////////////////////////
        'class_annfu_form_cordoglio_wrapper' => [
            'css' => '.annfu_form_cordoglio_wrapper',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore form cordoglio'],
        'class_h2_annfu_form_cordoglio_wrapper' => [
            'css' => '.annfu_form_cordoglio_wrapper h2',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore titolo form cordoglio'],
        'class_bg_annfu_invio' => [
            'css' => '.annfu_invio',
            'property' => 'background-color',
            'default' => '#dcdcdc',
            'description' => 'Sfondo pulsante'],
        'class_annfu_invio' => [
            'css' => '.annfu_invio',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore pulsante'],
        'class_bg_hover_annfu_invio' => [
            'css' => '.annfu_invio:hover',
            'property' => 'background-color',
            'default' => '#ffffff',
            'description' => 'Sfondo pulsante (hover)'],
        'class_hover_annfu_invio' => [
            'css' => '.annfu_invio:hover',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore pulsante (hover)'],
        //annuncio - cordogli ///////////////////////////////////////////////////////////////////////
        'class_annfu_cordoglio_intestazione' => [
            'css' => '.annfu_cordoglio_intestazione strong',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore nominativo cordoglio'],
        'class_annfu_data_cordoglio' => [
            'css' => '.annfu_data_cordoglio',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore data cordoglio'],
        'class_border_annfu_cordoglio_intestazione' => [
            'css' => '.annfu_cordoglio_intestazione',
            'property' => 'border-bottom-color',
            'default' => '#d2d2d2',
            'description' => 'Bordo cordoglio'],
        'class_annfu_cordoglio_testo' => [
            'css' => '.annfu_cordoglio_testo',
            'property' => 'color',
            'default' => '#000000',
            'description' => 'Colore testo cordoglio'],
    ];
}

function annfu_get_options_values()
{
    $values = [];
    $afOptions = annfu_get_options();
    foreach ($afOptions as $k => $v) {
        $values[$k] = !get_option($k) ? $v['default'] : get_option($k);
    }

    return $values;
}

function annfu_reset_options()
{
    if (isset($_GET['_reset'])) {
        $afOptions = annfu_get_options();
        foreach ($afOptions as $k => $v) {
            delete_option($k);
        }
    }
    wp_redirect(admin_url('admin.php?page=af-plugin'));
}

function annfu_fix_url($url)
{
    if (substr($url, 0, 2) == "//") {
        $url = "https:" . $url;
    }
    return $url;
}

function annfu_create_sitemap()
{
    $response = wp_remote_get(ANNFU_SITE_API . '/v2/annunci?limit=50&onoranza_funebre_id=' . get_option('annfu_onoranza_funebre_id'), ['sslverify' => false, 'timeout' => ANNFU_REMOTE_TIMEOUT]);
    $r = json_decode(wp_remote_retrieve_body($response), true);

    $sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
    $sitemap .= "<url><loc>" . get_site_url() . "</loc><changefreq>Daily</changefreq><priority>1.0</priority></url>\n";
    $sitemap .= "<url><loc>" . get_site_url() . '/' . ANNFU_PAGE_ANNUNCI . "/</loc><changefreq>Daily</changefreq><priority>1.0</priority></url>\n";
    if (isset($r['data'])) {
        foreach ($r['data'] as $annuncio) {
            $link = get_site_url() . '/' . ANNFU_PAGE_ANNUNCIO . '/' . $annuncio['comune']['slug'] . '/' . $annuncio['slug'] . '/';
            $sitemap .= "<url>" .
                "<loc>" . $link . "</loc>" .
                "<lastmod>" . date("Y-m-d\TH:i:s", strtotime($annuncio['updatedAt'])) . "+02:00</lastmod>" .
                "<changefreq>Weekly</changefreq>" .
                "<priority>0.5</priority>" .
                "</url>\n";
        }
    }
    $sitemap .= "</urlset>";

    $fop = fopen(ABSPATH . "sitemap_AF.xml", 'w');
    fwrite($fop, $sitemap);
    fclose($fop);
}

function annfu_cron_schedules($schedules)
{
    if (!isset($schedules["sitemapAF"])) {
        $schedules["sitemapAF"] = [
            'interval' => 24 * 60 * 60,
            'display' => __('Once every day')];
    }

    return $schedules;
}

function annfu_cron()
{
    wp_schedule_event(time(), 'sitemapAF', 'annfu_create_sitemap');
}

function annfu_plugin_activation()
{
    $testo = "*Attivato* plugin AF (" . ANNFU_VERSION . ") su " . get_site_url() . " (" . get_bloginfo('name') . " - ver." . get_bloginfo('version') . " " . get_bloginfo('admin_email') . ") #ID: " . get_option('annfu_onoranza_funebre_id', 'N/D');

    wp_remote_post(ANNFU_SITE_API . '/v2/wp-log', ['body' => ['testo' => $testo]]);
}

function annfu_plugin_deactivation()
{
    $testo = "*Disattivato* plugin AF (" . ANNFU_VERSION . ") su " . get_site_url() . " (" . get_bloginfo('name') . ") #ID: " . get_option('annfu_onoranza_funebre_id', 'N/D');

    wp_remote_post(ANNFU_SITE_API . '/v2/wp-log', ['body' => ['testo' => $testo]]);
}

function annfu_upgrade_completed($upgrader_object, $options)
{
    if ($options['action'] == 'update' && $options['type'] == 'plugin' && isset($options['plugins'])) {
        foreach ($options['plugins'] as $plugin) {
            if (strpos($plugin, 'annuncifunebri-onoranza')) {
                $testo = "*Aggiornato* plugin AF (" . ANNFU_VERSION . ") su " . get_site_url() . " (" . get_bloginfo('name') . " - ver." . get_bloginfo('version') . " " . get_bloginfo('admin_email') . ") #ID: " . get_option('annfu_onoranza_funebre_id', 'N/D');
                wp_remote_post(ANNFU_SITE_API . '/v2/wp-log', ['body' => ['testo' => $testo]]);
            }
        }
    }
}

function annfu_encryption_params()
{
    $ciphering = "BF-CBC";
    $encryptionIv = get_option('annfu_encryptioniv');
    if (!$encryptionIv) {
        $encryptionIv = substr(md5(microtime()), 0, 8);
        add_option('annfu_encryptioniv', $encryptionIv);
    }
    $encryptionKey = get_option('annfu_encryptionkey');
    if (!$encryptionKey) {
        $encryptionKey = substr(md5(php_uname()), 0, 16);
        add_option('annfu_encryptionkey', $encryptionKey);
    }

    return [
        'ciphering' => $ciphering,
        'options' => 0,
        'encryption_iv' => $encryptionIv,
        'encryption_key' => $encryptionKey
    ];
}

function annfu_encrypt($value)
{
    $params = annfu_encryption_params();
    return base64_encode(openssl_encrypt($value, $params['ciphering'], $params['encryption_key'], $params['options'], $params['encryption_iv']));
}

function annfu_decrypt($value)
{
    $params = annfu_encryption_params();
    return openssl_decrypt(base64_decode($value), $params['ciphering'], $params['encryption_key'], $params['options'], $params['encryption_iv']);
}

function annfu_get_date_parameter($value)
{
    list($d, $m, $y) = explode('%2F', $value);

    return $y . '-' . $m . '-' . $d;
}