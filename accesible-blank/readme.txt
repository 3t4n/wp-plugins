=== Accesible _blank ===
Contributors: ceslava
Author URI: http://ceslava.com/blog
Plugin URI: http://ceslava.com/blog/plugins-wordpress/accesible-_blank/ 
Donate link: http://ceslava.com/blog
Tags: accesible, target, links, SEO, javascript, external, enlaces, posts, comments
Requires at least: 1.5
Tested up to: 2.7
Stable tag: 1.1.0

Open links in a new window but in a accesible way. 
Abre enlaces en una nueva ventana cumpliendo los est&aacute;ndares de accesibilidad.

== Description ==

English:

See a live demo at the official webpage | Demo y p&aacute;gina oficial:
[ceslava.com](http://ceslava.com/blog/plugins-wordpress/accesible-_blank/ "Accesible _blank plugin page")

This plugin searches the text for links outside of the domain of the blog and open them in a new window but in a accesible way. It adds the attribute rel="external" and by javascript those external links are open in a new window.       

It stands for Web Content Accessibility Guidelines.

Spanish:

Demo y p&aacute;gina oficial:
[ceslava.com](http://ceslava.com/blog/plugins-wordpress/accesible-_blank/ "Accesible _blank plugin page")

Est&aacute; basado en el plugin para WordPress de Javi Moya External Links New Window que a&ntilde;ade la funcionalidad de poder abrir enlaces externos en una nueva ventana. El problema es que no era accesible, ya que el atributo _blank no cumple los est&aacute;ndares W3C. 

Accesible _blank busca todos los enlaces fuera de tu dominio y les a&ntilde;ade rel="external". Todos los enlaces que tengan el atributo external se abrir&aacute;n en una nueva ventana. Es accesible porque el atributo _blank (deprecated) se a&ntilde;ade por javascript y no en el XHTML.

Para avisar a los usuarios se a&ntilde;ade el atributo title a los enlaces externos con el texto "(se abre en nueva ventana)", si title ya tiene contenido se a&ntilde;ade a &eacute;l.

Cumple las Pautas de Accesibilidad al Contenido en la Web (WCAG).





== Installation ==

English:

1. Upload folder `accesible_blank` to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. English speakers may edit accesible_blank.js in order to translate the title by default: (se abre en nueva ventana) into english (open in a new window)

Spanish:

1. Sube la carpeta accesible_blank a tu directorio de plugins  

2. Act&iacute;valo desde el panel de administraci&oacute;n de WP.

[ceslava.com](http://ceslava.com/blog/plugins-wordpress/accesible-_blank/ "Accesible _blank plugin page")

== Frequently Asked Questions ==

= Next versions | Pr&oacute;ximas versiones =

New languages, translations and Panel Administration with some new feautures.

You can join the debte about opening links in a new window here:


[External links | Open in a new window vs. same window](http://justtellmewhy.com/becauses/design/external-links-open-in-a-new-window-vs-same-window/ "Justtellmewhy.com | External links | Open in a new window vs. same window")


En pr&oacute;ximas versiones a&ntilde;adir&eacute; un idiomas y un panel de control para personalizar distintas opciones:

    * aplicar o no a img
    * aplicar o no a comentarios
    * especificar dominios para enlaces internos
    * posibilidad de que los usuarios desactiven el plugin
    * desactivar title
    * editar el texto por defecto de title
    
Puedes sumarte al debate sobre abrir o no enlaces en una nueva ventana:

[Abrir enlace externo | Misma ventana vs. Nueva ventana](http://pqpq.es/porqueses/internet/abrir-enlace-externo-misma-ventana-vs-nueva-ventana/ "pqpq.es | Abrir enlace externo | Misma ventana vs. Nueva ventana")



== Screenshots ==

You can see a demo at the official webpage | Demo y p&aacute;gina oficial:
[ceslava.com](http://ceslava.com/blog/plugins-wordpress/accesible-_blank/ "Accesible _blank plugin page")






