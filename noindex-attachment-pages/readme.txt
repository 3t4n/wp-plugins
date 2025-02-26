=== Noindex Attachment Pages ===
Contributors: jruizcantero
Tags: attachment pages, google, seo, meta, robots, noindex, nofollow, seo noindex, seo robots meta
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=jruizcantero%40gmail%2ecom&lc=ES&item_name=Plugin%20Noindex%20Attachment%20Pages%20%2d%20Jose%20A%20Ruiz&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 3.0.1
Tested up to: 3.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add META ROBOTS NOINDEX to Attachment Pages in WordPress for better SEO

== Description ==
This plugin add the **tag META NOINDEX to attachment pages in WordPress**. When it's inserted some image, or any other multimedia file, into a post/page it can be linked to Attachment Page using [WordPress Theme Hierarchy](http://codex.wordpress.org/Template_Hierarchy) (attachment.php, image.php ...$mimetype.php, etc.) and this plugin will be able to doesn´t index Attachment Pages for improve SEO (Search Engine Optimization).
The plugin "WordPress SEO by Yoast" and some others plugins let you redirect Attatchment Pages to either post/page, but some times it's need use Attachment Pages without redirect and without index it inside search engines. (You can find [more info about it here](http://www.ampercent.com/prevent-indexing-wordpress-image-attachment-pages/9082/) )

So, the plugin "Noindex Attachment Pages" add next tag into HTML head for Attachment Pages;
`<meta name="robots" content="noindex,nofollow" />`
 

Any suggestions? You can write me or follow me on [Twitter @jruizcantero](http://twitter.com/jruizcantero).


= Descripción en Español =
Este plugin añade la **etiqueta META NOINDEX a las páginas de adjuntos en WordPress**. Cuándo se inserta alguna imagen, o cualquier otro archivo multimedia, en un post/págna se puede vincular a la página de adjuntos que proporciona WordPress utilizando la [jerarquía de archivos del Theme activo](http://codex.wordpress.org/Template_Hierarchy) (attachment.php, image.php ...$mimetype.php, etc.) y con este plugin puedes evitar que sean indexadas para mejorar el SEO (Search Engine Optimization).
El plugin de WordPress SEO by Yoast y algunos otros plugins permiten redireccionar las páginas de adjuntos al artículo o página correspondiente, pero en determinadas ocasiones puede que se desee utilizar las páginas de adjuntos sin que se redireccionen y sin que se indexen en los buscadores. (Puedes encontrar [más información sobre esto aquí](http://www.ampercent.com/prevent-indexing-wordpress-image-attachment-pages/9082/) )

Así que con el plugin Noindex Attachment Pages se añade concretamente la siguiente etiqueta en la cabecera HTML de cualquier página de adjuntos o página de archivos multimedia;
`<meta name="robots" content="noindex,nofollow" />`

Este plugin no tiene panel de opciones, simplemente actívalo.
 

Alguna sugerencia? Puedes esccribirme o seguirme en [Twitter @jruizcantero](http://twitter.com/jruizcantero).




== Installation ==
1. Upload "noindex-attachment-pages" folder to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.

= Instalación en Español =
1. Subir la carpeta "noindex-attachment-pages" al directorio "/wp-content/plugins/".
2. Activar el plugins desde el menú "Plugins" en WordPress.


== Frequently Asked Questions ==
= Is "Noindex Attachment Pages" incompatible with others SEO plugins? =
This plugin doesn´t check others SEO configurations for Attachment Pages, so you must use it carefully.

= ¿"Noindex Attachment Pages" es incompatible con otros plugins de SEO? =
Este plugin no realiza comprobaciones sobre otras configuraciones de SEO establecidas para las páginas de adjuntos, por lo que debes usarlo bajo tu responsabilidad.


== Screenshots ==
1. META tag NOINDEX added in attachment pages / Etiqueta META NOINDEX añadida en páginas de adjuntos


== Changelog ==

= 1.0 =
* Initial release.


== Upgrade Notice ==

= 1.0 =
* Initial release.