=== ES Custom Fields Interface  Version: 3.20 ===
Plugin URI: http://cmsus.wordpress.com/es-custom-fields-interface/
Contributors: Enzo Sforna
Donate link: http://cmsus.wordpress.com
Tags: custom fields, interface
Requires at least: 2.6.0
Tested up to: 2.9.x
Stable tag: 3.20

This plugin adds form element(s) in Write Post panel and/or Write Page panel, which act as a custom field(s) of Post and/or Page.

== Description ==
This plugin adds form element(s) in Write Post panel and/or Write Page panel, which act as a custom field(s) of Post and/or Page.
The custom fields are of this types: fieldset, checkbox, radio, select, textarea, textfield, filefield, imagefield, datefield.

== Frequently Asked Questions ==
= This plugin use custom database? =
No. This plugin use standard database of WordPress.

== Screenshots ==
1. This screen shot description corresponds to screenshot-1.png
File config.txt :

[fieldset_articoli_in_evidenza]
label = Articoli in Evidenza
type = fieldset
help = Gli articoli rimangono in evidenza fino alla data di scadenza
color = red
style=compact

[cf_expiry]
label = Data scadenza
type = datefield
help = Clicca sul campo e scegli una data

[cf_expiry_flag]
label = Visualizza Data scadenza
type = checkbox
values = 1
labels = Visualizza data
default =
help = Spunta per visualizzare data
style = extended

[cf_icon]
label = Icona
type = imagefield
size = 48
help = Scegli una immagine e poi clicca su Inserisci nel campo personalizzato: img tag completo

[fieldset_articoli_in_evidenza_close]
type = fieldset

[fieldset_articoli_correlati]
label = Articoli Correlati
type = fieldset
help = Gli articoli con lo stesso valore Serie sono correlati
color = green

[cf_serie]
label = Serie
type = textfield
default = Test
size = 36
help = Digita un testo

[fieldset_articoli_correlati_close]
type = fieldset

2. This is the second screen shot screenshot-2.png

[fieldset_categories1]
label = categories1
type = fieldset
help = categories
color=fuchsia

[checkbox_categories]
label = checkbox_categories style scroll
type = checkbox
values = categories
help = Seleziona uno o più valori
style = scroll

[fieldset_categories1_close]
type = fieldset


3. This is the second screen shot screenshot-2.png
This example adds form elements only in Write Post panel

[fieldset_argomenti_in_evidenza]
page=post
label = Argomenti/Categorie/Tematiche in Evidenza
type = fieldset
help = Gli argomenti in Evidenza saranno linkati come desiderato
color = blue

[textchild_link_to]
page=post
label = Link custom
type = textfield
size = 16
help = Digita un link
parent = custom

[radio_link_to]
page=post
label = Argomenti linkati a
type = radio
values = post#category#tag#none#custom
labels = Articolo: corpo stesso articolo#Categoria con lo stesso nome#Tag con lo stesso nome#Nessuno#Custom: altro articolo, pagina, ... @custom
help = Seleziona una tipologia  
style = extended

[fieldset_argomenti_in_evidenza_close]
page=post
type = fieldset

== Installation ==
Unpack the file "es-custom-fields-interface.zip"
For change language copy language.xx in language.js (partial translation)
Upload the folder "es-custom-fields-interface" to "wp-content/plugins/."
Activate from WP's Plugin Management page.

==  Configuration ==
This plugin supports the following types of form element:
fieldset, checkbox, radio, select, textfield, textarea, filefield, imagefield.
To specify the custom fields, edit the file "config.txt"

== Changelog ==
= 3.10 =
* Added categories list, tags list, pages list, posts list.
= 3.00beta =
* Added fieldset type.
* Added datefield type.
* Added childs fields inside of checkbox, radio and select.
= 2.00beta =
* Added to filefield support for file Open Office Write .odt, .ott, .sxw, .stw
* Added to filefield support for file Open Office Calc .ods, .ots, .sxc, .stc
= 1.00beta =
* First version.
== Upgrade Notice ==
= 3.10 =
Use this version

== History ==
This plugin takes the idea from
"rc: custom_field_gui" (Author: Joshua Sigar, See http://rhymedcode.net/projects/custom-field-gui/)
and
"Custom Field Gui Utility" (Author: Tomohiro Okuwaki, See http://www.tinybeans.net/blog/download/wp-plugin/cfg-utility.html);

used part of the code as mentioned in the source.
== End ========================================