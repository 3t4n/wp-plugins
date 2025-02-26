=== Autogestiones Gestor ===
Contributors: Autogestiones
Tags: autogestiones, plugin, woocommerce
Requires at least: 5.0
Tested up to: 6.4.3 
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin para autogestiones.

== Descripción ==

Este plugin permite mejorar la experiencia de integración con Autogestiones. 
Como por ejemplo crear accesos directos a recursos tales como
 - Productos
 - Clientes
 - Listado de Precios
 - Vendedores
 - Comprobantes de Venta
 - Cobros
 - Configuración de la integración

El dominio siempre será app.autogestiones.net, api.autogestiones.net, www.api.autogestiones.net o www.app.autogestiones.net con https

También añadirá un campo para el número de documento en tu checkout de WooCommerce para que luego Autogestiones lo facture automáticamente

Se crearán rutas de accesos protegidas para que Autogestiones pueda mostrar si la integración fue exitosa.

Si lo es, mostrará los datos fiscales

En caso que hayas confundido de número de Cuenta de Autogestiones Cloud, tendrás la opción de presionar "Vincular a otra Cuenta de Autogestiones Cloud"

Ante cualquier consulta puede abrir un ticket enviando un email a:

soporte@autogestiones.net

== Instalación ==

1. Primero, asegúrese de haber (creado una Cuenta de Autogestiones Cloud)[https://app.autogestiones.net/registrar/] en Autogestiones.
2. Activa el plugin desde el menú Plugins de WordPress.
3. Ir a Mi Autogestiones -> Conectar Cuenta de Autogestiones Cloud
4. Colocar ID de Cuenta de Autogestiones Cloud registrada en Autogestiones y presionar conectar Cuenta de Autogestiones Cloud
5. Lee atentamente la consensión de accesos y en caso de estar de acuerdo presiona "aprobar" la integración
6. Una vez cerrado puedes verificar la integración apretando 'Actualizar' o recargando la página

== Screenshots ==
1. Página vinculación exitosa
2. Campo personalizado para el N° de Doc. del Cliente (Varía según país)
3. Menú desplegable de Autogestiones

== Changelog ==
= 1.0.4 =
* Update Routes and Naming:
    1. AutoCuenta is Autogestiones Cloud Account
= 1.0.4 =
* Fix bug:
    1. Case when Document Type Not Found
= 1.0.2 =
* Fix bug:
    1. Disallowed direct file access to plugin files.
    2. Escaped variables and options when echoed to prevent security vulnerabilities.
    3. Removed a redundant and useless function
* Added a new feature:
    *. Implemented internationalization support for document types. Now the plugin can adapt to different countries and display the appropriate document type, such as CUIT/DNI in Argentina or equivalent types in other countries like Mexico


= 1.0.1 =
* Fix bug:
    1. Tested Up To Value is Out of Date, Invalid, or Missing
    2. Disallowing Direct File Access to plugin files
    3. Loading SVG efficiently
    4. Variables and options must be escaped when echo'd
    5. Generic function/class/define/namespace names
    6. Nonces and User Permissions Needed for Security


= 1.0.0 =
* Versión inicial.

== Licencia ==

Este plugin está bajo la Licencia Pública General de GNU v2 o posterior.

== Créditos ==

Autogestiones - Desarrollador del plugin

== Contacto ==

Si tienes preguntas o comentarios, por favor contáctenos en [soporte@autogestiones.net].
