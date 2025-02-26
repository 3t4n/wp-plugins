=== 99 Minutos ===
Plugin Name: 99 minutos
Contributors: operez97
Donate link: #
Tags: paquetería, mensajería, envíos, woocommerce, commerce, e-commerce,
Requires at least: 4.5
Tested up to: 5.5
Stable tag: 1.1.0
Requires PHP: 5.6
Plugin URI: https://www.client.99minutos.com/
Version: 1.1.0
Author: 99 Minutos Developers
Author URI: https://www.client.99minutos.com/
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

== Description ==

La aplicación de 99 minutos sirve como enlace entre el servicio carrier de entregas de 99minutos y WooCommerce de tal manera que facilita el seguimiento de guías y recolección de los envíos, además de mostrar de manera precisa que métodos de envió se tienen habilitados y qué costo se les esta brindando por parte del vendedor a lo clientes. 
Otra gran funcionalidad que incorpora es el manejo de fulfillment lo cual permite que el vendedor apruebe o no la creación de una guía.
Todo esto con rastreo en tiempo real y notificaciones en vivo.

El plugin usa servicios de terceros como el de la API de 99 minutos: https://prd-dot-precise-line-76299minutos.appspot.com/api/v1/autorization/order para la creación de órdenes.

Puedes conocer más acerca de estos servicios en: https://developers99minutos.docs.apiary.io/# ó conoce a la empresa en https://www.mx.99minutos.com

Conoce todos nuestros términos y condiciones en: https://www.mx.99minutos.com/terminos.html


[youtube https://www.youtube.com/watch?v=seQOByzbYKI]


== Installation ==
1. Existen dos formas de instalar el plugin de 99 Minutos: automática o manual.
    1.1. De forma manual: Copia los archivos del plugin al directorio "/wp-content/plugins/99minutos".
    1.2. Instalación automática: Dirígete a la sección "Plugins" de WordPress, la cual se encuentra en el menú de navegación lateral de tu administrador, busca "99 minutos" y haz clic en instalar.
2. Activa el plugin en la sección de “Plugins instalados” de WordPress.
3. Una vez activado, ve a la sección "99 minutos" y configura el plugin.
4. No olvides que en cada uno de tus productos es necesario ingresar el peso de los mismos.

== Screenshots ==
1. Registro de la dirección de recolección.
2. Configuración de los métodos de envío.
3. Ejemplo de checkout.

== Functionalities ==
* Realiza los envíos de tus productos con la extensión de 99 minutos.
* Ingresa tu API Key y gestiona cada uno de tus envíos.
* Si existe cobertura en la zona de envío, se realiza el cálculo de forma automática dependiendo del peso del producto.
* 99 Minutos cuenta con 4 diferentes tipos de envío: Same day, Next day, CO2 Free y 99 minutos.
* El proceso de tipo de envío se realiza de forma automática.

== Frequently Asked Questions ==

= ¿En qué unidades de peso debe de configurarse el plugin para que funcione correctamente? =
El plugin de 99 Minutos, debe de estar configurado en gramos o kilogramos, recuerda que en la sección de “Productos” puedes modificar las dimensiones de tus envíos.

= ¿En qué países funciona el plugin de 99 Minutos? =
Por el momento únicamente funciona para México, aunque esperamos extender las funcionalidades del plugin con todos los países con los que tenemos convenios.

= ¿Cómo puedo saber en qué lugares de la República Mexicana tiene cobertura 99 Minutos? =
El plugin de 99 minutos tiene incluido la validación de códigos postales en los cuales tenemos cobertura, tanto para tu e-commerce, como para tus clientes.

= ¿Cómo se realiza el envío por 99 Minutos? =
Una vez que un cliente realice una compra en tu tienda y seleccione alguna opción de 99 minutos, el cliente únicamente tendrá que seleccionar el tipo de envío, posteriormente se generará automáticamente el envío y tu podrás verificar la orden en la sección de “Pedidos” de WooCommerce.

= ¿Qué tipo de métodos de envío tiene 99 Minutos? =
Contamos con cuatro tipos de envíos: Entrega el mismo día (válido únicamente para la CDMX), entrega al día siguiente, entrega en 99minutos (válido únicamente para la CDMX) y envío sustentable, libre de CO2 (válido únicamente para la CDMX).

= ¿Los envíos tienen un horario de recolección específico? =
El servicio de recolección es en un horario abierto, sin embargo, para el tipo de envío “Entrega el mismo día” y "Entrega en 99minutos", la orden de compra deberá generarse antes de la 2:00 p.m. (Same Day) y antes de las 5:00 p.m. (99minutos), además, únicamente es válido para la CDMX, después de ese horario esas opciones no serán desplegables.
