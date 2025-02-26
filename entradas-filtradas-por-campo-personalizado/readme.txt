=== Entradas filtradas por campo personalizado ===

Contributors: Daniel Casabona Gomez
Author URI: http://casabona.tk/
Tags: campos personalizados, entradas, filtrar
Requires at least: 
Tested up to: 3.8
Stable tag: 1.01
License: MIT
License URI: http://opensource.org/licenses/MIT


== Description ==

El plugin permite mostrar las entradas (mediante la imagen destacada) utilizando un campo personalizado con un límite inferior y superior.

Ejemplo: Si tenemos una serie de entradas con un campo personalizado llamado "precio", podemos filtrar con un mínimo y un máximo y de esta forma mostrar sólo las entradas que nos interese.

Los campos obligatorios para que el campo funcione son: 

-Nombre del campo personalizado.
-Límite inferior.
-Límite superior.

Los campos opcionales son:

-Título.
-Número máximo de entradas a mostrar.

Se adjunta archivo CSS muy fácil de modificar para adaptar el plugin a nuestra página.

== Installation ==

1. Instala el plugin
2. Coloca el widget en la zona que te interese.
3. Configura el plugin desde el panel de widgets.

== Frequently Asked Questions ==

¿Qué pasa si la entrada no tiene una imagen destacada asociada?

Esa entrada no se mostrará.

¿Puedo modificar el tamaño de las imagenes del widget?

Si puedes. Tienes dos opciones:

1. Fija el tamaño máximo: Accede a la hoja de estilos que tiene el plugin (style.css) y en la clase "ordena_elemento" añade el campo "width" junto al tamaño que quieras, borra el campo "max-width".
2. Establece el tamaño máximo al que puede llegar la imagen: Accede a la hoja de estilos que tiene el plugin (style.css) y modifica de la clase "ordena_elemento" el campo "max-width".

== Screenshots ==

1. La primera imagen nos muestra el cuadro de configuración.

2. La segunda imagen nos muestras el resultado al utilizar el widget.

== Changelog ==

= 1.0 =
* Versión inicial.= 1.01 =* Corrección readme.txt

