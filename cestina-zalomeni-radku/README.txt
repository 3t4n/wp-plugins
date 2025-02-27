=== Čeština: zalomení řádků ===
Contributors: marekvratil
Tags: čeština, gramatika, zalamování, spisovná čeština, tvrdá mezera, nezlomitelná mezera, zalomení řádků
Requires at least: 4.0.1
Tested up to: 6.1
Requires PHP: 7.0
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Grammar rules for Czech language with related to word wrapping at the end of line.

== Description ==

Zalomení řádků a nevhodné výrazy na jejich konci jsou častým problémem a nešvařem. 
Při úpravě textů by na některých místech nemělo dojít k zalomení řádku, aby text plynule navazoval, jeho členění bylo přehledné a čtení pohodlné. Typickým příladem jsou neslabičné předložky v, s, z, k na konec řádku a také předložky a spojky a, i, o, u.
[Detailní informace o zalamování](http://prirucka.ujc.cas.cz/?id=880) naleznete na webu Ústavu pro jazyk český.
Plugin neošetřuje všechny možnosti, ale pouze některé základní a nahrazuje bežnou mezeru za "tvrdou, nezlomitelnou mezeru", která je reprezetována znakovou entitou.

== Installation ==

1. Upload the plugin files to the /wp-content/plugins/plugin-name directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

Plugin ovlivňuje výstup obsahu těchto funkcí:

* comment_author
* term_name
* link_name
* link_description
* link_notes
* bloginfo
* wp_title
* widget_title
* widget_text
* term_description
* the_title
* the_content
* the_excerpt
* comment_text
* single_post_title
* list_cats


V případě potřeby je možné aplikaci pluginu na jednotlivé položky vypnout pomocí funkce:

<code>
		function remove_filter_from_bozimediazalomeni(array $filters) {
     		unset($filters['the_title']);
        	return $filters;
      	}
      	add_filter('bozimediazalomeni_filtry', 'remove_filter_from_bozimediazalomeni');
</code>

Stejným způsobem je možné také filtr doplnit o další položky.

<code>
		function add_filter_to_bozimediazalomeni(array $filters) {
			$filters['the_title'] = 'the_title';
			return $filters;
		}
		add_filter('bozimediazalomeni_filtry', 'add_filter_to_bozimediazalomeni');
</code>

**Vestavěná je také podpora pro plugin ACF** - Advanced Custom Fields. Plugin je aplikován na základní pole:

* text
* text area
* wisiwig editor


== Changelog ==

= 1.0.3 =
* FIX widget text filter.

= 1.0.2 =
* Minor PHP update.

= 1.0.1 =
* Update settings options.

= 1.0.0 =
* Initial release.