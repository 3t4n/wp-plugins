<?php
/**
 * Plugin Name:       dejure.org Vernetzungsfunktion
 * Plugin URI:        https://dejure.org/vernetzung.html
 * Description:       Diese Erweiterung verlinkt automatisch zitierte <strong>Gesetze und Rechtsprechung</strong> (Aktenzeichen und Fundstellen) mit den Inhalten von dejure.org. <strong><a href="options-general.php?page=dejure.org-vernetzung.php">Einstellungen</a></strong>
 * Version:           1.98.1
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            dejure.org
 * Author URI:        https://dejure.org/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/*  Copyright 2024  dejure.org  (email : info@dejure.org)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined('ABSPATH') or die("No script kiddies please!");

define('DJO_VERSION', '1.98.1');

apply_filters('plugin_locale', 'de_DE');

function djo_install() {
	if (defined('ABSPATH') && is_admin()) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	}

	update_option('djo_cache_prefix', 'djo_'.wp_rand());
}

function djo_uninstall() {
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');

	delete_option('djo_cache_prefix');
	delete_option('djo_einstellungen');
}

function djo_update_db_check() {
	if (get_option('djo_cache_prefix') == '') {
		djo_install();
	}
}


function djo_init() {
	global $djo_nutzerdaten;
	$djo_nutzerdaten = djo_hole_einstellungen();
}
add_action('init', 'djo_init');
function djo_cache_leeren() {
	update_option('djo_cache_prefix', 'djo_'.wp_rand());
}

function djo_zwischenspeicherung() {
	global $djo_vernetzung_in_cache_schreiben;
	if (empty($djo_vernetzung_in_cache_schreiben)) {
		return;
	}
	if (is_array($djo_vernetzung_in_cache_schreiben)) {
		foreach ($djo_vernetzung_in_cache_schreiben as $vernetzung) {
			$key = get_option('djo_cache_prefix') . '_' . strlen($vernetzung[0]) . '-' . substr(md5($vernetzung[0]), 0, -1-strlen(strlen($vernetzung[0])));
			if ($vernetzung[0] == $vernetzung[1]) {
				$text = '<!-- idem -->';
			} else {
				$text = $vernetzung[1];
			}
			set_transient($key, $text, 172800);
		}
	}
	unset($djo_vernetzung_in_cache_schreiben);
}

function vernetzen_ueber_dejure_org($ausgangstext, $parameter = array()) {
	// Moegliche Parameter: Anbieterkennung / Dokumentkennung / target / class / AktenzeichenIgnorieren / zeitlimit_in_sekunden
	global $djo_vernetzung_erfolgt;
	$djo_vernetzung_erfolgt = 0;
	$uebergabe = 'Originaltext='.urlencode($ausgangstext);
	foreach ($parameter as $option => $wert) {
		if ($option == 'zeitlimit_in_sekunden') {
			$zeitlimit_in_sekunden = $wert;
		} else {
			$uebergabe .= '&'.urlencode($option).'='.urlencode($wert);
		}
	}
	if (empty($zeitlimit_in_sekunden)) {
		$zeitlimit_in_sekunden = 2;
	}
	$home_url = preg_replace('#^https?://#', '', home_url());

	$headers = [
		'User-Agent' => $home_url.' (Wordpress-Vernetzung '.DJO_VERSION.')',
		'Content-Type' => 'application/x-www-form-urlencoded',
		'Content-Length' => strlen($uebergabe),
	];
	$args = [
		'body' => $uebergabe,
		'headers' => $headers,
		'user-agent' => $home_url.' (Wordpress-Vernetzung '.DJO_VERSION.')',
		'timeout' => $zeitlimit_in_sekunden,
		'blocking' => true,
		'data_format' => 'body'
	];
	$response = wp_remote_post('https://rechtsnetz.dejure.org/dienste/vernetzung/vernetzen', $args);
	if (is_wp_error($response)) {
		return $ausgangstext;
	}
	$rueckgabe = wp_remote_retrieve_body($response);

	if (strlen($rueckgabe) < strlen($ausgangstext)) {
		return $ausgangstext;
	}
	$djo_vernetzung_erfolgt = 1;
	return $rueckgabe;
}

function vernetzen_ueber_cache($ausgangstext) {
	$temp = null;
	$key = get_option('djo_cache_prefix') . '_' . strlen($ausgangstext) . '-' . substr(md5($ausgangstext), 0, -1-strlen(strlen($ausgangstext)));;
	$rueckgabe = get_transient($key);
	if (!empty($rueckgabe)) {
		$temp = $rueckgabe;
		if ($temp == '<!-- idem -->') {
			return $ausgangstext;
		}
	}
	return $temp;
}

function djo_vernetzen($text) {
	global $djo_nutzerdaten;
	if (!preg_match("/§|&sect;|&#167;|Artikel|Art\.|[\/\.] ?[0-9][0-9](?![0-9\/])| [0-9][0-9]?[\/\.] ?[0-9][0-9](?![0-9\.])| [A-Z]+ [0-9][0-9]\. ?[0-9]|[0-9][0-9],/", $text) || preg_match("/<!-- *ohnedjo *-->/", $text)) {
		return $text;
	}
	// Folgende Zeile durch Entfernung der "//" aktivieren, falls aufgrund eines vorgeschalteten Plugins erforderlich
	// $text = preg_replace("/<span class=\"caps\">([^<]*)<\/span>/", "\\1", $text); # Sonderbehandlung fuer vorgeschaltete Plugins, die einen besonderen Span-Bereich um aufeinanderfolgede Großbuchstaben eingefuegt haben (wird meist nicht benoetigt und wirkt sich auch negativ auf Suchmaschinenerfassung aus)
	$ergebnis = vernetzen_ueber_cache($text);
	if (empty($ergebnis)) {
		$arr_parameter = array(
			'Anbieterkennung'		=> urlencode($djo_nutzerdaten['kontaktmail'].'|'.get_bloginfo('name')),
			'format'				=> $djo_nutzerdaten['linkstil'],
			'target'				=> $djo_nutzerdaten['linkziel'],
			'class'					=> $djo_nutzerdaten['class'],
			'buzer'					=> $djo_nutzerdaten['buzer'],
			'ohnehtags'				=> $djo_nutzerdaten['ohnehtags'],
			'version'				=> 'wordpress-'.DJO_VERSION,
			'zeitlimit_in_sekunden'	=> $djo_nutzerdaten['zeitlimit_in_sekunden'],
			'Schema'				=> 'https',
		);
		$ergebnis = vernetzen_ueber_dejure_org($text, $arr_parameter);
		$ergebnis = integritaetskontrolle_und_cache($text, $ergebnis);
	}
	return $ergebnis;
}

function integritaetskontrolle_und_cache($ausgangstext, $neuertext) {
	global $djo_vernetzung_in_cache_schreiben, $djo_vernetzung_erfolgt;
	if (preg_replace("/<a href=\"https?:\/\/dejure.org\/[^>]*>([^<]*)<\/a>/i", "\\1", trim($ausgangstext)) == preg_replace("/<a href=\"https?:\/\/dejure.org\/[^>]*>([^<]*)<\/a>/i", "\\1", trim($neuertext))) {
		$djo_vernetzung_in_cache_schreiben[] = array($ausgangstext, $neuertext, $djo_vernetzung_erfolgt); // Vorbereitet: Serververbindungsproblem in die DB schreiben
		djo_zwischenspeicherung();
		return $neuertext;
	} else {
		return $ausgangstext;
	}
}

function djo_hole_einstellungen() {
	global $djo_nutzerdaten_;
	if (is_array($djo_nutzerdaten_)) {
		return $djo_nutzerdaten_;
	}
	$djo_nutzerdaten_tmp = get_option('djo_einstellungen');
	$kommentarhinweis_vorbelegung = 'Hinweis: Gesetzes- und Rechtsprechungszitate werden automatisch <a href="https://dejure.org/vernetzung.html" target="_blank">über dejure.org verlinkt</a>';
	if (!empty($djo_nutzerdaten_tmp) && !is_array($djo_nutzerdaten_tmp)) {
		$djo_nutzerdaten_ = unserialize($djo_nutzerdaten_tmp);
	} elseif (is_array($djo_nutzerdaten_tmp) && isset($djo_nutzerdaten_tmp['kontaktmail'])) {
		$djo_nutzerdaten_ = $djo_nutzerdaten_tmp;
	} else {
		$djo_nutzerdaten_['kontaktmail']			= get_bloginfo('admin_email'); //Vorbelegung: E-Mail-Adresse des Admin
		$djo_nutzerdaten_['newsletter']				= 'nein';
		$djo_nutzerdaten_['linkziel']				= '';
		$djo_nutzerdaten_['class']					= '';
		$djo_nutzerdaten_['linkstil']				= 'weit';
		$djo_nutzerdaten_['kommentarhinweis']		= $kommentarhinweis_vorbelegung;
		$djo_nutzerdaten_['buzer']					= 0;
		$djo_nutzerdaten_['ohnehtags']				= 0;
		$djo_nutzerdaten_['zeitlimit_in_sekunden']	= 2;
		update_option('djo_einstellungen', serialize($djo_nutzerdaten_));
	}
	$djo_nutzerdaten_['kommentarhinweis_vorbelegung'] = $kommentarhinweis_vorbelegung;
	return $djo_nutzerdaten_;
}

function djo_einstellungen_menue() {
	global $djo_nutzerdaten;
	if (isset($_POST['Submit']) && check_admin_referer( 'djo_settings')):
		$djo_nutzerdaten = array (
			'kontaktmail'			=> (isset($_POST['kontaktmail']) ? sanitize_text_field(wp_unslash($_POST['kontaktmail'])) : ''),
			'newsletter'			=> (isset($_POST['newsletter']) ? sanitize_text_field(wp_unslash($_POST['newsletter'])) : 'nein'),
			'linkziel'				=> (isset($_POST['linkziel']) ? sanitize_text_field(wp_unslash($_POST['linkziel'])) : ''),
			'linkziel_neu'			=> (isset($_POST['linkziel_neu']) ? sanitize_text_field(wp_unslash($_POST['linkziel_neu'])) : ''),
			'class'					=> (isset($_POST['class']) ? sanitize_text_field(wp_unslash($_POST['class'])) : ''),
			'linkstil'				=> (isset($_POST['linkstil']) ? sanitize_text_field(wp_unslash($_POST['linkstil'])) : 'weit'),
			'kommentarhinweis'		=> (isset($_POST['kommentarhinweis']) ? sanitize_text_field(wp_unslash($_POST['kommentarhinweis'])) : ''),
			'buzer'					=> (empty($_POST['buzer'])) ? 0 : 1,
			'ohnehtags'				=> (empty($_POST['ohnehtags'])) ? 0 : 1,
			'zeitlimit_in_sekunden'	=> (isset($_POST['zeitlimit_in_sekunden']) ? sanitize_text_field(wp_unslash($_POST['zeitlimit_in_sekunden'])) : 2),
		);
		if ($djo_nutzerdaten['linkziel'] == 'neu') {
			$djo_nutzerdaten['linkziel'] = $djo_nutzerdaten['linkziel_neu'];
		} else {
			$djo_nutzerdaten['linkziel_neu'] = '';
		}
		update_option('djo_einstellungen', serialize($djo_nutzerdaten));
		if (!empty($_POST['cache_leeren']) && $_POST['cache_leeren'] == 'ja') {
			djo_cache_leeren();
			$djo_cache_geleert_hinweis = 'Cache geleert. Alle Beitr&auml;ge, Seiten und Kommentare werden, wenn sie jeweils angezeigt werden, neu verlinkt.';
		} else {
			$djo_cache_geleert_hinweis = 'Die &Auml;nderungen gelten f&uuml;r k&uuml;nftige Inhalte. Wenn sie auch auf bestehende Inhalte angewandt werden sollen, speichern Sie die Einstellungen bitte mit der Option "Cache leeren".';
		}

?>
<div class="updated">
<p><strong><?php esc_html_e('Einstellungen gespeichert.', 'dejureorg-vernetzungsfunktion') ?></strong></p>
<p><?php echo esc_html($djo_cache_geleert_hinweis); ?></p>
<a href="javascript:history.back()">Zur&uuml;ck</a>
</div>
<?php
	else:
		$djo_nutzerdaten = djo_hole_einstellungen();

?>
</style>
<div class="wrap">
<h2><?php echo esc_html_e('dejure.org-Rechtsvernetzung - Einstellungen', 'dejureorg-vernetzungsfunktion'); ?></h2>
<br />
<form name="djo_einstellungen" method="post" action="">
	<?php wp_nonce_field( 'djo_settings' ); ?>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="djo_nutzerdaten" />
	<fieldset class="options" style="padding:10px; background-color:#ffffe5; border:1px solid #e6e1a6;">
	<legend><h3><?php echo esc_html_e('Angaben zur Kommunikation mit dejure.org', 'dejureorg-vernetzungsfunktion'); ?></h3></legend>
	<table cellspacing="2" cellpadding="5" class="editform">
            <tr valign="baseline">
		<th style="text-align:left;" scope="row"><?php esc_html_e('Name des Blogs:', 'dejureorg-vernetzungsfunktion') ?></th>
		<td><strong><?php echo esc_html(get_bloginfo('name')); ?></strong></td>
	    </tr>
	    <tr valign="baseline">
		<th style="text-align:left;" scope="row"><?php esc_html_e('Kontakt-E-Mail-Adresse', 'dejureorg-vernetzungsfunktion') ?>:</th>
		<td><input name="kontaktmail" type="text" id="kontaktmail"
		    value="<?php echo esc_attr($djo_nutzerdaten['kontaktmail']); ?>" size="50" />
		    <br /><br />
		    <input type="checkbox" name="newsletter" value="ja"<?php if ($djo_nutzerdaten['newsletter'] == 'ja') echo esc_attr(' checked');?>>
                Bei Neuigkeiten zur dejure.org-Vernetzungsfunktion m&ouml;chte ich per E-Mail informiert werden.
		    <br /><br />
		    Diese Informationen werden im Rahmen der Serverkommunikation jeweils an dejure.org &uuml;bertragen und dienen im &uuml;brigen nur der Kommunikation bei technischen Problemen. <strong>Die Weitergabe der Daten an Dritte sowie eine Verwendung f&uuml;r Werbezwecke o.&auml;. ist ausgeschlossen!</strong>
		</td>
	    </tr>
	</table>
    </fieldset>
	<br />
    <fieldset class="options" style="padding:10px; background-color:#eee; border:1px solid #ddd;">
	<legend><h3><?php esc_html_e('Einstellungen zur Vernetzungsfunktion', 'dejureorg-vernetzungsfunktion') ?></h3></legend>
	<p style="padding:3px; background-color:#ffffe5; border:1px solid #e6e1a6;">(&Auml;nderungen werden f&uuml;r bestehende Beitr&auml;ge nur wirksam, wenn der Vernetzungs-Cache geleert wird: <input type="checkbox" name="cache_leeren" value="ja"> Cache leeren)</p>
	<table cellspacing="2" cellpadding="5" class="editform">
	    <tr valign="baseline">
		<th style="text-align:left;" scope="row">Links &ouml;ffnen:</th>
		<td><input type="radio" name="linkziel" value=""<?php if ($djo_nutzerdaten["linkziel"] == "") echo esc_attr(" checked"); ?>> im gleichen Fenster</td>
	    </tr>
            <tr valign="baseline">
		<th scope="row"></th>
		<td><input type="radio" name="linkziel" value="_blank"<?php if ($djo_nutzerdaten["linkziel"] == "_blank") echo esc_attr(" checked"); ?>> in neuem Fenster</td>
	    </tr>
            <tr valign="baseline">
		<th scope="row"></th>
		<td><input type="radio" name="linkziel" id="linkziel2" value="neu"<?php
                    if ($djo_nutzerdaten['linkziel'] != '' && $djo_nutzerdaten['linkziel'] != '_blank') echo esc_attr(' checked');
                ?>> in Fenster mit dem Namen <input name="linkziel_neu" type="text" id="linkziel_neu" onfocus="document.getElementById('linkziel2').checked='true'"
		    value="<?php
                        if ($djo_nutzerdaten['linkziel'] != '_blank') echo esc_attr($djo_nutzerdaten['linkziel']);
                ?>" size="20"/></td>
	    </tr>
		<tr><td>&nbsp;</td><td></td></tr>
	    <tr valign="baseline">
		<th style="text-align:left;" scope="row">CSS-Klasse f&uuml;r dejure.org-Links:</th>
		<td><input name="class" type="text" id="class" value="<?php echo esc_attr($djo_nutzerdaten["class"]); ?>" size="25" />
                <br />
			<strong>Hinweis:</strong> Im Normalfall kann das Feld leergelassen werden. Links zu dejure.org werden dann nicht anders als sonstige Links angezeigt.<br />Die Klasse muss, wenn noch nicht vorhanden, im Blog definiert werden.</td>
	    </tr>
		<tr><td>&nbsp;</td><td></td></tr>
	    <tr valign="baseline">
		<th style="text-align:left;" scope="row">Stil der dejure.org-Links:</th>
		<td><input type="radio" name="linkstil" value="schmal"<?php
                    if ($djo_nutzerdaten['linkstil'] == 'schmal') echo esc_attr(' checked');
                ?>> nur die Nummern der Vorschriften verlinken (Bsp.: &sect; <u>242</u> BGB; &sect;&sect; <u>278</u>, <u>254</u> BGB)
             <br />
		<input type="radio" name="linkstil" value="weit"<?php
                    if ($djo_nutzerdaten['linkstil'] != 'schmal') echo esc_attr(' checked');
                ?>> m&ouml;glichst lange Verlinkung (Bsp.: <u>&sect; 242 BGB</u>; <u>&sect;&sect; 278</u>, <u>254 BGB</u>) <span style="background-color:#e7f7d3;">[Vorgabe]</span></td>
	    </tr>
		<tr><td>&nbsp;</td><td></td></tr>
		<th style="text-align:left;" scope="row">Gesetzesumfang:</th>
		<td><input type="checkbox" name="buzer" value="1"<?php if ($djo_nutzerdaten['buzer'] == 1) echo esc_attr(' checked');?>> Zu <a href="http://buzer.de">buzer.de</a> verlinken f&uuml;r Gesetze, die bei dejure.org nicht vorhanden sind
	    </tr>
		<tr><td>&nbsp;</td><td></td></tr>
		<th style="text-align:left;" scope="row">&Uuml;berschriften ausschlie&szlig;en:</th>
		<td><input type="checkbox" name="ohnehtags" value="1"<?php if ($djo_nutzerdaten['ohnehtags'] == 1) echo esc_attr(' checked');?>> Keine Vernetzung innerhalb von &Uuml;berschriften (h1 bis h9)
	    </tr>
		<tr><td>&nbsp;</td><td></td></tr>
	    <tr valign="baseline">
		<th style="text-align:left;" scope="row">Maximale Wartezeit f&uuml;r Serverkommunikation:</th>
		<td><input name="zeitlimit_in_sekunden" type="text" id="zeitlimit_in_sekunden" value="<?php echo esc_attr($djo_nutzerdaten["zeitlimit_in_sekunden"]); ?>" size="3" /> Sekunden <span style="background-color:#e7f7d3;">[empfohlen: 2]</span>
                <br />
			<strong>Hinweis:</strong> Die Kommunikation dauert nur bei sehr gro&szlig;en Seiten l&auml;nger als 1 Sekunde.<br />Eine leichte Verz&ouml;gerung aufgrund der Serverkommunikation tritt wegen des eingebauten Caches nur sporadisch auf.</td>
	    </tr>
		<tr><td>&nbsp;</td><td></td></tr>
	    <tr valign="baseline">
		<th style="text-align:left;" scope="row">Diskussion:</th>
		<td>Vor das Editierfeld folgenden Hinweis ausgeben (kein Hinweis, wenn leer):
		<br />
		<textarea cols="60" rows="3" name="kommentarhinweis"><?php
			echo esc_html(htmlspecialchars($djo_nutzerdaten['kommentarhinweis']));
		?></textarea>
		<br />
		<button type="submit" onclick="document.forms.djo_einstellungen.kommentarhinweis.value='<?php
			echo esc_attr($djo_nutzerdaten['kommentarhinweis_vorbelegung']);
		?>'; return false;">Vorbelegung</button>
		</td>
	    </tr>

	</table>
    </fieldset>
    <p class="submit">
	<input type="submit" name="Submit" class="button button-primary"
	    value="<?php esc_attr_e('Einstellungen speichern', 'dejureorg-vernetzungsfunktion') ?> &raquo;" />
    </p>
</form>
</div>
<?php
    endif;
}

function djo_einstellungen() {
   add_options_page(__('dejure.org', 'dejureorg-vernetzungsfunktion'),__('dejure.org', 'dejureorg-vernetzungsfunktion'), 'manage_options', 'dejure.org-vernetzung', 'djo_einstellungen_menue');
}

function djo_kommentar_editierhinweis() {
	global $djo_nutzerdaten;
	echo '
<script language="javascript">
djo_kommentarhinweis = "'.esc_js(str_replace('"', '\"', $djo_nutzerdaten['kommentarhinweis'])).'"
if (djo_kommentarhinweis != "" && document.getElementById("commentform")) {
	djo_editierhinweis = document.createElement("p")
	djo_editierhinweis.innerHTML = djo_kommentarhinweis
	document.getElementById("commentform").parentNode.insertBefore(djo_editierhinweis, document.getElementById("commentform"))
}
</script>';
}

if (is_admin()) {
	register_activation_hook(__FILE__, 'djo_install');
	register_deactivation_hook(__FILE__, 'djo_uninstall');
	register_uninstall_hook(__FILE__, 'djo_uninstall' );

	add_action('admin_menu', 'djo_einstellungen');
}
add_action('plugins_loaded', 'djo_update_db_check');

add_filter('the_content', 'djo_vernetzen');
add_filter('comment_text', 'djo_vernetzen');
add_filter('shutdown', 'djo_zwischenspeicherung');
add_action('comment_form', 'djo_kommentar_editierhinweis');

?>
