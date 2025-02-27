=== WP DPE-GES ===
Contributors: sebastienrenaudeau
Tags: dpe, ges, diagnostic, energétique, émissions gaz effet de serre
Requires at least: 5.8
Tested up to: 6.6.2
Stable tag: 1.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Afficher le Diagnostic de Performance Énergétique (DPE) et/ou les émissions de Gaz à Effet de Serre (GES).

== Description ==

Ajoutez en toute décontraction le rapport énergétique DPE et GES d'un bien immobilier sur votre site.

Le résultat est entièrement généré en html/css, aucun javascript inutile, et offre un rendu idéal !

** NOUVEAUTÉ 2024**
L'extension prend en compte les nouveaux seuils pour les biens dont la surface est inférieure à 40m² et les biens situés au-dessus de 800 mètres d'altitude en zone climatique H1b, H1c et H2d.

Shortcode unique : l'ajout de la date du diagnostique en paramètre du shortcode [dpeges] permet de gérer l'affichage de l'ancien format si la date est inférieure au 01/07/2021. ^
Attention la date doit être au format anglais, vous pouver utiliser le filtre 'wpdpeges_date_diagnostic' pour convertir votre format de date en anglais.

**NOUVEAU DPE 2021**
Cette extension prend en charge l'affichage des nouvelles étiquettes DPE 2021.

**COMPATIBLE GUTENBERG**
Vous pouvez créer un bloc DPE-GES depuis le nouvel éditeur Gutenberg encore plus facilement.

== Installation ==

= Méthode Administration WordPress =
1. Allez dans votre administration de Wordpress `Extensions > Ajouter`
2. Rechercher `WP DPE-GES` (utiliser le formulaire de recherche)
3. Cliquez sur le bouton Installer et activer de l'extension

= Méthode FTP =
1. Téléchargez le dossier complet `wpdpeges` dans le répertoire `/wp-content/plugins/`
2. Activez l'extension depuis le menu 'Extension' dans WordPress

== Screenshots ==

1. Rendu html des diagnotics
2. Les boutons dans l'éditeur de texte facilite l'insertion des DPE/GES
3. Exemple de la fenètre de saisie de la valeur du DPE à insérer
4. Ajout du bloc DPE-GES depuis le nouvel éditeur Gutenberg
5. Paramétrage du bloc dans le nouvel éditeur Gutenberg
6. Une valeur vide affichera un DPE ou GES vierge

== Changelog ==
= 1.6 =
* Ajout du paramètre "not_subject" pour les biens non soumis au diagnostic
* Ajout des paramètres "date_diagnostic" et "date_diagnostic_meta_key"
* Ajout des paramètres "surface_value" et "surface_meta_key"
* Ajout des paramètres "altitude_value" et "altitude_meta_key"
* Ajout des paramètres "zone_climatique_value" et "zone_climatique_meta_key"
* Nouvelle fonction de recherche des lettres DPE et GES selon les seuils en fonction de la surface du bien, de l'altitude et de la zone climatique

= 1.5 =
* Retour du bouton dans l'éditeur classique
* Corrections CSS (desktop et mobile)
* Ajout de valeur dynamique via champs personnalisés (merci à @tsimmo pour la suggestion)

= 1.4 =
* Add new DPE 2021
* Fix Gutenberg issues
* Remove TinyMCE support

= 1.3 =
* Add blank DPE/GES if you set no value
* Add decimals values
* Add settings page to display shortcodes examples
* Fix compatibility with WooCommerce 3.8.0

= 1.2.1 =
* Fix css conflict

= 1.2 =
* Gutenberg compatible
* Fix css render

= 1.1 =
* Add French Translation

= 1.0 =
* Initial release.
