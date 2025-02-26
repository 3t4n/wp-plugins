<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// a helper function to lookup "env_FILE", "env", then fallback
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
if (!function_exists('sprttm_urlReplacer777')) {
	function sprttm_urlReplacer777($map) {
        $res = $map;
		$urls = json_decode(getenv_docker('WORDPRESS_PLUGIN_777_URLS', '{}'), true);
        foreach ($urls as $lang => $url) {
            if (isset($res[$lang]) && isset($res[$lang]['base'])) {
                $res[$lang]['base'] = $url;
            }
        }

        return $res;
	}
}
// a helper function for development plugin
if (!function_exists('sprttm_get777ServiceVersion')) {
	function sprttm_get777ServiceVersion() {
        $ver = getenv_docker('WORDPRESS_SERVICE_777_VER', 'v1');
        return $ver ? "/{$ver}" : $ver;
    }
}


return array(
    'ver' => sprttm_get777ServiceVersion(),
    'domainMap' => sprttm_urlReplacer777(array(
        'en' => array(
            'base' => 'https://777score.com',
            '/today' => array(
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
            '/live' => array(
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
            '/yesterday' => array(
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
            '/tomorrow' => array(
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
            ),
            '{tournament}' => array(
                '{tournament} results',
                '{tournament} results today',
                '{tournament} scores',
                '{tournament} result',
                '{tournament} live',
                '{tournament} livescore',
                '{tournament} scores',
                '{tournament} result',
                '{tournament} live',
                '{tournament} livescore',
            )
        ),
        // 'pt' => array(
        //     'base' => 'https://777score.com.br',
        //     '/today' => array(
        //         'jogos de hoje',
        //         'resultado dos jogos de hoje',
        //         'resultados dos jogos de hoje',
        //         'resultado do jogo de hoje',
        //         'todos os jogos de hoje',
        //         'resultado do jogo',
        //         'placar do jogo de hoje',
        //         'resultado jogos de hoje',
        //         'resultado jogos de hoje',
        //         'placar dos jogos de hoje'
        //     ),
        //     '/live' => array(
        //         'futebol ao vivo',
        //         'placar ao vivo',
        //         'jogos ao vivo',
        //         'assistir futebol ao vivo',
        //         'futebol live',
        //         'jogo ao vivo',
        //         'assistir futebol ao vivo',
        //         'futebol live',
        //         'jogo ao vivo',
        //         'futebol ao vivo online'
        //     ),
        //     '/yesterday' => array(
        //         'jogos de ontem',
        //         'resultado dos jogos de ontem',
        //         'jogo de ontem',
        //         'resultado do jogo de ontem',
        //         'resultados dos jogos de ontem',
        //         'jogos ontem',
        //         'resultado do jogo de ontem',
        //         'resultados dos jogos de ontem',
        //         'jogos ontem',
        //         'resultado jogos de ontem'
        //     ),
        //     '/tomorrow' => array(
        //         'jogos de amanhã',
        //         'jogos de amanha',
        //         'jogo de amanhã',
        //         'jogo de amanhã',
        //         'jogos amanhã',
        //         'jogos amanha',
        //         'jogo amanhã',
        //         'jogo amanhã',
        //         'todos os jogos de amanhã',
        //         'jogo amanha'
        //     ),
        //     '{tournament}' => array(
        //         'jogos do {tournament}',
        //         'jogos de hoje do {tournament}',
        //         'jogos de hoje {tournament}',
        //         '{tournament} hoje',
        //         'jogos do {tournament}',
        //         'jogos de hoje {tournament}',
        //         '{tournament} hoje',
        //         'jogos de hoje do {tournament}',
        //         'jogos do {tournament}',
        //         'jogos de hoje do {tournament}'
        //     )
        // ),
        // 'it' => array(
        //     'base' => 'https://777score.it',
        //     '/today' => array(
        //         'risultati',
        //         'risultati calcio oggi',
        //         'livescore calcio',
        //         'livescore calcio',
        //         'livescore',
        //         'calcio oggi',
        //         'livescore calcio oggi',
        //         'ris calcio oggi',
        //         'ris calcio oggi',
        //         'risultati di calcio di oggi'
        //     ),
        //     '/live' => array(
        //         'calcio live',
        //         'diretta calcio',
        //         'risultati in diretta calcio',
        //         'diretta risultati calcio',
        //         'risultati diretta calcio',
        //         'calcio live',
        //         'diretta calcio',
        //         'risultati in diretta calcio',
        //         'diretta risultati calcio',
        //         'risultati diretta calcio'
        //     ),
        //     '/yesterday' => array(
        //         'risultati calcio ieri',
        //         'risultati di ieri',
        //         'risultati calcio ieri',
        //         'risultati di ieri',
        //         'serie a ieri',
        //         'diretta gol ieri',
        //         'risultati di ieri',
        //         'serie a ieri',
        //         'diretta gol ieri',
        //         'diretta gol ieri'
        //     ),
        //     '/tomorrow' => array(
        //         'partite domani',
        //         'partite di domani',
        //         'partite calcio domani',
        //         'calcio domani',
        //         'le partite di domani',
        //         'diretta domani',
        //         'partita domani',
        //         'partite domani calcio',
        //         'partite domani calcio',
        //         'partite di calcio domani'
        //     ),
        //     '{tournament}' => array(
        //         '{tournament} oggi',
        //         'partite {tournament}',
        //         'partite di {tournament}',
        //         '{tournament} oggi',
        //         'partite {tournament}',
        //         'partite di {tournament}',
        //         '{tournament} oggi',
        //         'partite {tournament}',
        //         'partite di {tournament}',
        //         '{tournament} oggi'
        //     )
        // ),
        // // 'de' => array(
        // //     'base' => 'TODO',
        // //     '/today' => array(
        // //         'fußball live',
        // //         'fußball heute',
        // //         'fussball heute',
        // //         'fußball heute ergebnisse',
        // //         'fußball ergebnisse heute',
        // //         'heute fußball',
        // //         'fussball ergebnisse heute',
        // //         'fussbal heute',
        // //         'fussball score',
        // //         'fussball score'
        // //     ),
        // //     '/live' => array(
        // //         'ergebnisse live',
        // //         'ergebnisselive',
        // //         'fußball live',
        // //         'fussball live score',
        // //         'fussball live',
        // //         'ergebnisse live',
        // //         'ergebnisselive',
        // //         'ergebnisse live',
        // //         'ergebnisselive',
        // //         'fußball live'
        // //     ),
        // //     '/yesterday' => array(
        // //         'fußball gestern',
        // //         'fussball gestern',
        // //         'ergebnisse gestern',
        // //         'fußball gestern abend',
        // //         'fußball gestern ergebnisse',
        // //         'fußball ergebnisse von gestern',
        // //         'fußball gestern abend',
        // //         'fußball gestern ergebnisse',
        // //         'fußball ergebnisse von gestern',
        // //         'fußball ergebnisse gestern'
        // //     ),
        // //     '/tomorrow' => array(
        // //         'fußball morgen',
        // //         'fussball morgen',
        // //         'fussballmatch morgen',
        // //         'morgen spiele',
        // //         'fusball morgen',
        // //         'morgen fußball',
        // //         'morgen spiele',
        // //         'fusball morgen',
        // //         'morgen fußball',
        // //         'fußballspiele morgen'
        // //     ),
        // //    '{tournament}' => array(
        // //        '{tournament} heute',
        // //        '{tournament} ergebnisse',
        // //        'ergebnisse {tournament}',
        // //        '{tournament} heute',
        // //        '{tournament} ergebnisse',
        // //        'ergebnisse {tournament}',
        // //        '{tournament} heute',
        // //        '{tournament} ergebnisse',
        // //        'ergebnisse {tournament}',
        // //        '{tournament} heute'
        // //    )
        // // ),
        // // 'nl' => array(
        // //     'base' => 'TODO',
        // //     '/today' => array(
        // //         'livescore voetbal',
        // //         'livescore:voetbal',
        // //         'livescore',
        // //         'livescore voetbal',
        // //         'livescore:voetbal',
        // //         'livescore',
        // //         'live scores voetbal',
        // //         'livescore voetbal',
        // //         'livescore:voetbal',
        // //         'live scores voetbal'
        // //     ),
        // //     '/live' => array(
        // //         'voetbal vandaag live',
        // //         'voetbal live vandaag',
        // //         'live verslag voetbal',
        // //         'voetbal vandaag live',
        // //         'voetbal live vandaag',
        // //         'live verslag voetbal',
        // //         'live voetbal',
        // //         'live voetbal',
        // //         'live voetbal vandaag',
        // //         'voetbal live'
        // //     ),
        // //     '/yesterday' => array(
        // //         'voetbal gisteren',
        // //         'voetbal gister',
        // //         'voetbal gisteren uitslag',
        // //         'voetbal gisteren',
        // //         'voetbal gister',
        // //         'voetbal gisteren uitslag',
        // //         'uitslag voetbal gisteren',
        // //         'uitslag voetbal gisteren',
        // //         'voetbal uitslagen gisteren',
        // //         'gisteren voetbal'
        // //     ),
        // //     '/tomorrow' => array(
        // //         'voetbal morgen',
        // //         'voetbalwedstrijden morgen',
        // //         'voetbal wedstrijden morgen',
        // //         'morgen voetbal',
        // //         'voetbal morgen',
        // //         'voetbalwedstrijden morgen',
        // //         'voetbal wedstrijden morgen',
        // //         'morgen voetbal',
        // //         'wedstrijden morgen',
        // //         'voetballen morgen'
        // //     ),
        // //    '{tournament}' => array(
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //        '{tournament}',
        // //    )
        // // ),
        // // 'tr' => array(
        // //     'base' => 'TODO',
        // //     '/today' => array(
        // //         'canlı skor',
        // //         'canliskor',
        // //         'canlı skor mobil',
        // //         'canliskor mobil',
        // //         'canlı skor mobil',
        // //         'canliskor mobil',
        // //         'mobil canlı skor',
        // //         'canli skor',
        // //         'maç sonuçları',
        // //         'bugünkü futbol maçları'
        // //     ),
        // //     '/live' => array(
        // //         'maç sonuçları',
        // //         'canlı maç sonuçları',
        // //         'canli mac sonuclari',
        // //         'maç sonuçları',
        // //         'canlı maç sonuçları',
        // //         'canli mac sonuclari',
        // //         'canlı maç',
        // //         'canlimacsonuclari',
        // //         'canlimacsonuclari',
        // //         'macskorlari'
        // //     ),
        // //     '/yesterday' => array(
        // //         'dünkü maç sonuçları',
        // //         'dunku mac sonuclari',
        // //         'türkiye dünkü maç sonuçları',
        // //         'dünkü maç sonuçları',
        // //         'dunku mac sonuclari',
        // //         'türkiye dünkü maç sonuçları',
        // //         'dünkü avrupa maç sonuçları',
        // //         'dünkü avrupa maç sonuçları',
        // //         'dünkü maç',
        // //         'dünkü maç'
        // //     ),
        // //     '/tomorrow' => array(
        // //         'yarınki maçlar',
        // //         'yarın kimin maçı var',
        // //         'yarınki maçlar türkiye',
        // //         'yarınki maçlar',
        // //         'yarın kimin maçı var',
        // //         'yarınki maçlar türkiye',
        // //         'yarın hangi maçlar var',
        // //         'yarinki maclar',
        // //         'yarinki maclar',
        // //         'yarın ne maçı var'
        // //     ),
        // //    '{tournament}' => array(
        // //        'canli skor {tournament}',
        // //        '{tournament} maçları',
        // //        'canli skor {tournament}',
        // //        '{tournament} maçları',
        // //        'canli skor {tournament}',
        // //        '{tournament} maçları',
        // //        'canli skor {tournament}',
        // //        '{tournament} maçları',
        // //        'canli skor {tournament}',
        // //        '{tournament} maçları'
        // //    )
        // // ),
        // // 'fr' => array(
        // //     'base' => 'TODO',
        // //     '/today' => array(
        // //         'match en direct',
        // //         'football aujourd\'hui',
        // //         'résultats des matchs d\'aujourd\'hui',
        // //         'match en direct',
        // //         'football aujourd\'hui',
        // //         'résultats des matchs d\'aujourd\'hui',
        // //         'match d\'aujourd\'hui',
        // //         'match d\'aujourd\'hui',
        // //         'score en direct',
        // //         'les matchs d\'aujourd\'hui'
        // //     ),
        // //     '/live' => array(
        // //         'foot en direct',
        // //         'football en direct',
        // //         'score en ligne',
        // //         'foot en direct',
        // //         'football en direct',
        // //         'score en ligne',
        // //         'resultat foot',
        // //         'resultat foot',
        // //         'resultat foot direct',
        // //         'resultat foot en direct'
        // //     ),
        // //     '/yesterday' => array(
        // //         'résultat foot hier',
        // //         'livescore hier',
        // //             'match hier',
        // //         'match d\'hier',
        // //         'match hier soir',
        // //         'score des matchs de football d\'hier',
        // //         'match d\'hier soir',
        // //         'results match hier',
        // //         'livescore 24h hier soir',
        // //         'resultat des matchs d\'hier'
        // //     ),
        // //     '/tomorrow' => array(
        // //         'match demain',
        // //         'match de demain',
        // //         'les matchs de demain',
        // //         'tous les matchs de demain',
        // //         'les match de demain',
        // //         'match en direct demain',
        // //         'matchs de demain',
        // //         'match demain',
        // //         'match de demain',
        // //         'match de foot demain'
        // //     ),
        // //    '{tournament}' => array(
        // //        '{tournament}',
        // //        'match {tournament}',
        // //        'score {tournament}',
        // //        '{tournament}',
        // //        'match {tournament}',
        // //        'score {tournament}',
        // //        '{tournament}',
        // //        'match {tournament}',
        // //        'score {tournament}',
        // //        '{tournament}'
        // //    )
        // // ),
        // // 'ro' => array(
        // //     'base' => 'TODO',
        // //     '/today' => array(
        // //         'livescore fotbal',
        // //         'fotbal live',
        // //         'rezultate fotbal live',
        // //         'live score fotbal',
        // //         'rezultate live',
        // //         'scoruri live fotbal',
        // //         'fotbal livescore',
        // //         'scoruri live',
        // //         'rezultate fotbal live',
        // //         'fotbal live score'
        // //     ),
        // //     '/live' => array(
        // //         'fotbal live',
        // //         'fotbal azi live',
        // //         'meciuri azi',
        // //         'meciuri live azi',
        // //         'meciuri live',
        // //         'fotbal azi',
        // //         'fotbal live azi',
        // //         'live fotbal',
        // //         'meciuri fotbal azi',
        // //         'meciuri azi live'
        // //     ),
        // //     '/yesterday' => array(
        // //         'fotbal ieri',
        // //         'rezultate fotbal azi',
        // //         'fotbal ieri',
        // //         'rezultate meciuri ieri',
        // //         'rezultate ieri fotbal',
        // //         'fotbal ieri',
        // //         'rezultate fotbal azi',
        // //         'fotbal ieri',
        // //         'rezultate meciuri ieri',
        // //         'rezultate ieri fotbal'
        // //     ),
        // //     '/tomorrow' => array(
        // //         'meciuri maine',
        // //         'fotbal maine',
        // //         'meciuri fotbal maine',
        // //         'meci maine',
        // //         'meciuri mâine',
        // //         'meciuri maine',
        // //         'fotbal maine',
        // //         'meciuri fotbal maine',
        // //         'meci maine',
        // //         'meciurile de maine'
        // //     ),
        // //    '{tournament}' => array(
        // //        'meciuri din {tournament}',
        // //        'meciuri {tournament} azi',
        // //        'meciuri azi {tournament}',
        // //        'meciuri din {tournament}',
        // //        'meciuri {tournament} azi',
        // //        'meciuri azi {tournament}',
        // //        'meciuri din {tournament}',
        // //        'meciuri {tournament} azi',
        // //        'meciuri azi {tournament}',
        // //        'meciuri din {tournament}'
        // //    )
        // // )
    ))
);
