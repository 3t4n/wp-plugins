=== Mail Categories === 
Contributors: christiancabrero
Tags: categories, mail, plugin, notification, seo 
Requires at least: 3.0.1 
Tested up to: 6.0
Stable tag: 6.0 
License: GPLv2 or later 
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
 
Crea un informe de la ultima entrada de cada categoría y avisa por email si hace tiempo que no se publican entradas en el tiempo especificado.
 
== Description == 
 
Plugin que realiza un informe de la última entrada de cada categoría. Permite configurar el tiempo en el que serán consideradas antiguas y notificar por email si no se ha escrito en el tiempo especificado. 
 
* Contributors: Christian Cabrero 
* Tags: categories, mail, plugin, notification, seo 
* Requires at least: 3.0.1 
* Tested up to: 4.3, 4.5.1, 6.0 
     
== Installation == 
 
1. Descargar el archivo "mail-categories.zip" y subir a Wordpress con el administrador de plugins o introducir los archivos en una carpeta con el nombre "mail-categories" en la ruta de Wordpress "/wp-content/plugins/". 
2. Activar el plugin desde el administrador de plugins de wordpress. 
3. Aparecerá un nuevo menú bajo "Ajustes" llamado "Mail Categories" para configurar el plugin. 
 
== Frequently Asked Questions == 
 
= ¿Es un plugin gratuito? = 
 
Totalmente y lo seguirá siendo. 
 
= ¿Notifica también de etiquetas? = 
 
No, era la idea inicial pero será implementado en próximas actualizaciones. 
 
= ¿Permite seleccionar de que categorías notificar? = 
 
Aún no, pero podrá ser implementado en el futuro.

= ¿Porqué no me notifica por email si lo he activado? =

El cron de Wordpress no es un cron real, esto quiere decir que sólo ejecuta eventos automáticos si hay visitas. Por ejemplo: Si designas que las entradas sean consideradas antiguas tras 30 días, necesitarás al menos una visita el día 30 o posterior para que se ejecute el envío de email.

= No funciona el envío de email =

La versión 1.0 tenía un error sólamente se enviaban los emails si la fecha de envío no era igual a la fecha de la entrada. En la versión 2.0 se envía un email cada día a modo de recordatorio. En la versión 3.0 introduciré una función para habilitar el envío cada día o sólo el día de "vencimiento" de la entrada.

== Screenshots == 
 
1. Configuración
2. Opciones guardadas
3. Email de reporte
 
== Changelog == 

= 2.0 =

* 17/06/2022
* Arreglado error de envío de email si no era igual la fecha de publicación a la fecha de envío de emails
* Añadido botón para probar el envío de email
* Modificada plantilla de email

= 1.0 =

* Comprobación y limpieza de formulario (sanitize)
* Acceso directo protegido (abspath)* Nonces formulario
* Cron que comprueba cada día (si hay visitas)
 
= 0.9 = 
* Cambio de formato del email 
* Cambio de ubicación snnipet comprueba_fecha 
* Capturas de pantalla 
 
= 0.8 = 
* Colores de estado en ajustes del plugin 
* Elimininado checkbox categorías/etiquetas 
 
= 0.7 = 
* Añadido snnipet loop que comprueba entradas 
* Limpieza de código y comentarios 
 
= 0.6 = 
* Añadida comprobación fecha actual 
* Añadida comprobación fecha último post 
* Guardado de opciones del formulario 
 
= 0.5 = 
* Snnipet de envío por email 
* Eliminado resumen y estadisticas de entradas 
* Añadidas categorías de entradas 
* Añadido permalink 
* Añadido titulo de entrada 
 
= 0.4 = 
* Formato de email básico 
* Eliminación de librerías innecesarias 
* Eliminación de snnipets innecesarios 
* Cambio a menú de ajustes con icono 
 
= 0.3 = 
* Creación e instalación del plugin .zip 
* Información y estadisticas de entradas 
* Añadido formulario de opciones 
 
= 0.2 = 
* Instalación manual 
* Submenú de ajustes 
* Creación de archivo readme.txt 
 
= 0.1 = 
* Cabecera del archivo principal 
* Creación de archivos principales 
* Inyección de motivación 
 
== Upgrade Notice == 
 
= 1.1 = 
* Cron real o solución a visita el día específico
* Comprobación de id's ilimitados o seleccionables
* Reorganización de código o creación de clases