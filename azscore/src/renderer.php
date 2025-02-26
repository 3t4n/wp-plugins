<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// a helper function to lookup "env_FILE", "env", then fallback, standard WP function, needed for compatibility with WP 3
if (!function_exists('getenv_docker')) {
	function getenv_docker($env, $default) {
		if ($fileEnv = getenv($env . '_FILE')) {
			return rtrim(file_get_contents($fileEnv), "\r\n");
		}
		else if (($val = getenv($env)) !== false) {
			return $val;
		}
		else {
			return $default;
		}
	}
}
// a helper function for development plugin
if (!function_exists('azscr_url_replacer')) {
	function azscr_url_replacer($map) {
        $res = $map;
		$urls = json_decode(getenv_docker('WORDPRESS_PLUGIN_AZ_URLS', '{}'), true);
        foreach ($urls as $lang => $url) {
            if (isset($res[$lang]) && isset($res[$lang]['base'])) {
                $res[$lang]['base'] = $url;
            }
        }

        return $res;
	}
}

function azscr_code($atts) {
    $settings = get_option('azscr_settings_options');
    $domainMap = azscr_url_replacer(array(
        'en' => array(
            'base' => 'https://azscore.com',
            'today' => array(
                'livescore',
                'livescore today',
                'livescore results',
                'livescores',
                'livescore',
                'livescore today',
                'livescore results',
                'livescores',
                'livescore results',
                'livescores'
            ),
            'live' => array(
                'mobile livescore',
                'mobile livescores',
                'mobilescore',
                'mobile score',
                'livescore mobile',
                'mobile scores',
                'mobile livescore',
                'mobile livescores',
                'mobilescore',
                'mobile score'
            ),
            'yesterday' => array(
                'livescore yesterday',
                'yesterday match result',
                'yesterday football results',
                'yesterday soccer results',
                'yesterday livescore',
                'football results yesterday',
                'livescore yesterday',
                'yesterday match result',
                'yesterday football results',
                'yesterday soccer results'
            ),
            'tomorrow' => array(
                'livescore tomorrow',
                'tomorrow match list',
                'tomorrow livescore',
                'livescore tomorrow',
                'tomorrow match list',
                'tomorrow livescore',
                'livescore tomorrow',
                'tomorrow match list',
                'tomorrow livescore',
                'tomorrow livescore'
            )
        ),
        'de' => array(
            'base' => 'https://azscore.de',
            'today' => array(
                'fußball live',
                'fußball heute',
                'fussball heute',
                'fußball heute ergebnisse',
                'fußball ergebnisse heute',
                'heute fußball',
                'fussball ergebnisse heute',
                'fussbal heute',
                'fussball score',
                'fussball score'
            ),
            'live' => array(
                'ergebnisse live',
                'ergebnisselive',
                'fußball live',
                'fussball live score',
                'fussball live',
                'ergebnisse live',
                'ergebnisselive',
                'ergebnisse live',
                'ergebnisselive',
                'fußball live'
            ),
            'yesterday' => array(
                'fußball gestern',
                'fussball gestern',
                'ergebnisse gestern',
                'fußball gestern abend',
                'fußball gestern ergebnisse',
                'fußball ergebnisse von gestern',
                'fußball gestern abend',
                'fußball gestern ergebnisse',
                'fußball ergebnisse von gestern',
                'fußball ergebnisse gestern'
            ),
            'tomorrow' => array(
                'fußball morgen',
                'fussball morgen',
                'fussballmatch morgen',
                'morgen spiele',
                'fusball morgen',
                'morgen fußball',
                'morgen spiele',
                'fusball morgen',
                'morgen fußball',
                'fußballspiele morgen'
            )
        ),
        'pt' => array(
            'base' => 'https://azscore.com.br',
            'today' => array(
                'jogos de hoje',
                'resultado dos jogos de hoje',
                'resultados dos jogos de hoje',
                'resultado do jogo de hoje',
                'todos os jogos de hoje',
                'resultado do jogo',
                'placar do jogo de hoje',
                'resultado jogos de hoje',
                'resultado jogos de hoje',
                'placar dos jogos de hoje'
            ),
            'live' => array(
                'futebol ao vivo',
                'placar ao vivo',
                'jogos ao vivo',
                'assistir futebol ao vivo',
                'futebol live',
                'jogo ao vivo',
                'assistir futebol ao vivo',
                'futebol live',
                'jogo ao vivo',
                'futebol ao vivo online'
            ),
            'yesterday' => array(
                'jogos de ontem',
                'resultado dos jogos de ontem',
                'jogo de ontem',
                'resultado do jogo de ontem',
                'resultados dos jogos de ontem',
                'jogos ontem',
                'resultado do jogo de ontem',
                'resultados dos jogos de ontem',
                'jogos ontem',
                'resultado jogos de ontem'
            ),
            'tomorrow' => array(
                'jogos de amanhã',
                'jogos de amanha',
                'jogo de amanhã',
                'jogo de amanhã',
                'jogos amanhã',
                'jogos amanha',
                'jogo amanhã',
                'jogo amanhã',
                'todos os jogos de amanhã',
                'jogo amanha'
            )
        ),
        'nl' => array(
            'base' => 'https://azscore.com/nl',
            'today' => array(
                'livescore voetbal',
                'livescore:voetbal',
                'livescore',
                'livescore voetbal',
                'livescore:voetbal',
                'livescore',
                'live scores voetbal',
                'livescore voetbal',
                'livescore:voetbal',
                'live scores voetbal'
            ),
            'live' => array(
                'voetbal vandaag live',
                'voetbal live vandaag',
                'live verslag voetbal',
                'voetbal vandaag live',
                'voetbal live vandaag',
                'live verslag voetbal',
                'live voetbal',
                'live voetbal',
                'live voetbal vandaag',
                'voetbal live'
            ),
            'yesterday' => array(
                'voetbal gisteren',
                'voetbal gister',
                'voetbal gisteren uitslag',
                'voetbal gisteren',
                'voetbal gister',
                'voetbal gisteren uitslag',
                'uitslag voetbal gisteren',
                'uitslag voetbal gisteren',
                'voetbal uitslagen gisteren',
                'gisteren voetbal'
            ),
            'tomorrow' => array(
                'voetbal morgen',
                'voetbalwedstrijden morgen',
                'voetbal wedstrijden morgen',
                'morgen voetbal',
                'voetbal morgen',
                'voetbalwedstrijden morgen',
                'voetbal wedstrijden morgen',
                'morgen voetbal',
                'wedstrijden morgen',
                'voetballen morgen'
            )
        ),
        'tr' => array(
            'base' => 'https://canliskor.biz.tr',
            'today' => array(
                'canlı skor',
                'canliskor',
                'canlı skor mobil',
                'canliskor mobil',
                'canlı skor mobil',
                'canliskor mobil',
                'mobil canlı skor',
                'canli skor',
                'maç sonuçları',
                'bugünkü futbol maçları'
            ),
            'live' => array(
                'maç sonuçları',
                'canlı maç sonuçları',
                'canli mac sonuclari',
                'maç sonuçları',
                'canlı maç sonuçları',
                'canli mac sonuclari',
                'canlı maç',
                'canlimacsonuclari',
                'canlimacsonuclari',
                'macskorlari'
            ),
            'yesterday' => array(
                'dünkü maç sonuçları',
                'dunku mac sonuclari',
                'türkiye dünkü maç sonuçları',
                'dünkü maç sonuçları',
                'dunku mac sonuclari',
                'türkiye dünkü maç sonuçları',
                'dünkü avrupa maç sonuçları',
                'dünkü avrupa maç sonuçları',
                'dünkü maç',
                'dünkü maç'
            ),
            'tomorrow' => array(
                'yarınki maçlar',
                'yarın kimin maçı var',
                'yarınki maçlar türkiye',
                'yarınki maçlar',
                'yarın kimin maçı var',
                'yarınki maçlar türkiye',
                'yarın hangi maçlar var',
                'yarinki maclar',
                'yarinki maclar',
                'yarın ne maçı var'
            )
        ),
        'it' => array(
            'base' => 'https://azscore.co.it',
            'today' => array(
                'risultati',
                'risultati calcio oggi',
                'livescore calcio',
                'livescore calcio',
                'livescore',
                'calcio oggi',
                'livescore calcio oggi',
                'ris calcio oggi',
                'ris calcio oggi',
                'risultati di calcio di oggi'
            ),
            'live' => array(
                'calcio live',
                'diretta calcio',
                'risultati in diretta calcio',
                'diretta risultati calcio',
                'risultati diretta calcio',
                'calcio live',
                'diretta calcio',
                'risultati in diretta calcio',
                'diretta risultati calcio',
                'risultati diretta calcio'
            ),
            'yesterday' => array(
                'risultati calcio ieri',
                'risultati di ieri',
                'risultati calcio ieri',
                'risultati di ieri',
                'serie a ieri',
                'diretta gol ieri',
                'risultati di ieri',
                'serie a ieri',
                'diretta gol ieri',
                'diretta gol ieri'
            ),
            'tomorrow' => array(
                'partite domani',
                'partite di domani',
                'partite calcio domani',
                'calcio domani',
                'le partite di domani',
                'diretta domani',
                'partita domani',
                'partite domani calcio',
                'partite domani calcio',
                'partite di calcio domani'
            )
        ),
        'fr' => array(
            'base' => 'https://azscore.fr',
            'today' => array(
                'match en direct',
                'football aujourd\'hui',
                'résultats des matchs d\'aujourd\'hui',
                'match en direct',
                'football aujourd\'hui',
                'résultats des matchs d\'aujourd\'hui',
                'match d\'aujourd\'hui',
                'match d\'aujourd\'hui',
                'score en direct',
                'les matchs d\'aujourd\'hui'
            ),
            'live' => array(
                'foot en direct',
                'football en direct',
                'score en ligne',
                'foot en direct',
                'football en direct',
                'score en ligne',
                'resultat foot',
                'resultat foot',
                'resultat foot direct',
                'resultat foot en direct'
            ),
            'yesterday' => array(
                'résultat foot hier',
                'livescore hier',
                 'match hier',
                'match d\'hier',
                'match hier soir',
                'score des matchs de football d\'hier',
                'match d\'hier soir',
                'results match hier',
                'livescore 24h hier soir',
                'resultat des matchs d\'hier'
            ),
            'tomorrow' => array(
                'match demain',
                'match de demain',
                'les matchs de demain',
                'tous les matchs de demain',
                'les match de demain',
                'match en direct demain',
                'matchs de demain',
                'match demain',
                'match de demain',
                'match de foot demain'
            )
        ),
        'ro' => array(
            'base' => 'https://azscore.com/ro',
            'today' => array(
                'livescore fotbal',
                'fotbal live',
                'rezultate fotbal live',
                'live score fotbal',
                'rezultate live',
                'scoruri live fotbal',
                'fotbal livescore',
                'scoruri live',
                'rezultate fotbal live',
                'fotbal live score'
            ),
            'live' => array(
                'fotbal live',
                'fotbal azi live',
                'meciuri azi',
                'meciuri live azi',
                'meciuri live',
                'fotbal azi',
                'fotbal live azi',
                'live fotbal',
                'meciuri fotbal azi',
                'meciuri azi live'
            ),
            'yesterday' => array(
                'fotbal ieri',
                'rezultate fotbal azi',
                'fotbal ieri',
                'rezultate meciuri ieri',
                'rezultate ieri fotbal',
                'fotbal ieri',
                'rezultate fotbal azi',
                'fotbal ieri',
                'rezultate meciuri ieri',
                'rezultate ieri fotbal'
            ),
            'tomorrow' => array(
                'meciuri maine',
                'fotbal maine',
                'meciuri fotbal maine',
                'meci maine',
                'meciuri mâine',
                'meciuri maine',
                'fotbal maine',
                'meciuri fotbal maine',
                'meci maine',
                'meciurile de maine'
            )
        )
    ));
    $uriMap = array(
        'today' => '',
        'live' => '/live',
        'yesterday' => '/yesterday',
        'tomorrow' => '/tomorrow'
    );

    $atts = shortcode_atts(
        array(
            'period' => 'today',
            'country-is' => '',
            'league-is' => ''
        ),
        $atts,
        'azscore'
    );

    $sport = 'football(soccer)';
    $hasLeague = $atts['country-is'] && $atts['league-is'];
    $league = '';

    $fields = array(
        'main_font',
        'tr_leagueHeader_bg',
        'fs_category',
        'fs_league',
        'color_category',
        'fw_category',
        'color_leagues',
        'fw_leagues',
        'color_date',
        'fw_date',
        'tr_leagueHeaderDate_bg',
        'color_date_single',
        'fw_date_single',
        'bg_match_row',
        'color_border_match_row',
        'hover_match_row',
        'color_team_name_row',
        'fw_team_name_row',
        'color_match_status',
        'fw_match_status',
        'fw_match_status_row',
        'color_live_status_row',
        'color_command_goal',
        'color_match_time',
        'fw_match_time',
        'bg_incident_row',
        'color_border_incident_row',
        'color_incident_text',
        'fw_incident_text',
        'color_incident_minutes',
        'fw_incident_minutes'
    );
    $result = '';
    $js = array();

    foreach ($fields as $val) {
        $tmp_val = isset($settings[$val]) ? $settings[$val] : 'null';

        if ($tmp_val != '') {
            $js[] = "window.{$val} = '{$tmp_val}';";
        }
    }

    if (!empty($js)) {
        $jsVars = implode(PHP_EOL.'            ', $js);
        // We can't use esc function here because I need not escaped quotes for valid JS code
        $result = "

        <script id='skin'>
            {$jsVars}
        </script>
        ";
    }

    $lang = isset($settings['lang']) ? $settings['lang'] : '';

    // check if lang supported in case not do it en
    if (!in_array($lang, array_keys($domainMap))) {
        $locale = substr(get_locale(), 0, 2);

        $lang = in_array($locale, array_keys($domainMap)) ? $locale : 'en';
    }

    $rnd = isset($settings['your_word_num']) ? $settings['your_word_num'] : 0;
    $period = in_array($atts['period'], array_keys($uriMap)) ? $atts['period'] : 'today';
    $url = $domainMap[$lang]['base'];
    $domain = $url.$uriMap[$period];
    $text = $domainMap[$lang][$period][$rnd];


    if ($hasLeague) {
        $league = 'league';
        $text = "{$atts['country-is']} ~ {$atts['league-is']} livescore";
        $domain = $url.$uriMap['today'];
    }

    $t = time();
    $t = $t - $t%(12*60*60);

    $result .= "

        <script type='text/javascript' src='".esc_url("{$url}/wp-plugin/js/api.0.1.js?t={$t}")."' api='livescore' async></script>
        <a
            href='".esc_attr($domain)."'
            sport='".esc_attr($sport)."'
            data-1='".esc_attr($period)."'
            data-2='".esc_attr($league)."'
            lang='".esc_attr($lang)."'
        >".esc_attr($text)."</a>
        ";

    // check author credit link is on or not. if not set it without link via iframe
    $c_link_is = isset($settings['c_link']) ? $settings['c_link'] : '';

    if ($c_link_is != 'on') {
        $result = "

        <iframe
            src='".esc_url("{$url}/wp-plugin?lang={$lang}&sport={$sport}&data-1={$period}&data-2={$league}&word={$text}")."'
            marginheight='0'
            marginwidth='0'
            scrolling='auto'
            height='5000'
            width='100'
            frameborder='0'
            id='azscoreframe'
            style='width: 100%; height: 5000px; max-width: 100%'
        ></iframe>
        ";
    }

    return $result;
}
