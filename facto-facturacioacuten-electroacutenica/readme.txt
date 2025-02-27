=== Plugin Name ===
Contributors: Integración Facturación Electrónica Facto.cl
Donate link: https://www.facto.cl/
Tags: Plugins de integración con factura electrónica
Requires at least: 5.1
Tested up to: 6.7.1
Requires PHP: 5.6
Stable tag: 3.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Con este plugin Integra el módulo FACTO con tu sitio web y automatiza la emisión de documentos electrónicos cada vez que recibes una compra. Paga de acuerdo a tu monto de documentos emitidos a través de la API.

== Description ==

== Descripción de la Integración Facto & Woocommerce ==

Conoce las Ventajas:
<ul>
<li type="circle">Ahorra tiempo  emitiendo el documento tributario simultáneamente al momento de la compra en tu tienda online.</li>
<li type="circle">Mejora la atención  al cliente, entregando la boleta o factura de manera inmediata por email.</li>
<li type="circle">Evita errores por doble digitación de las ventas realizadas.</li>
<li type="circle">Ahorra costos, ya que esto reemplaza el sistema tradicional de impresoras térmicas certificadas con el envío físico de timbres a SII.</li>
</ul>


Información Técnica:
<ul>
<li type="circle">Desarrollado por Facto.cl facturación electrónica.</li>
<li type="circle">Probado en Wordpress versión: 6.7.1</li>
<li type="circle">Probado en Woocommerce versión: 9.4.2</li>
<li type="circle">Versión actual: 3.0.3</li>
<li type="circle">Para mayor información visitar: <a href="https://www.facto.cl/producto/integracion-facto-woocommerce/" target="_blank">Facto.cl</a>.</li>
</ul>


== Installation ==


1. Instale el plugin.
2. Crear llaves API dentro de su cuenta Facto.cl.
3. Asignar llaves creadas en el administrador de el plugin.
4. Configurar las opciones en las otras pestañas del plugin.

AVANZADO: PARA UTILIZAR PRODUCTOS AFECTOS Y EXENTOS DE IVA SIMULTANEAMENTE O PARA USAR IMPUESTOS ESPECIFICOS

NOTA: Esta es una modalidad AVANZADA. Para el general de nuestros usuarios se recomienda no utilizar el sistema de manejo de impuestos de woocommerce. Por ahora sólo soporta IVA e impuestos específicos para Ley de Alcoholes (ILA). Por ahora sólo soporta productos digitales para el caso boleta.

1. Luego de instalado el plugin, ingresar a los ajustes del mismo y habilitar en la pestaña AVANZADO la opción "Gestionar el IVA mediante woocommerce"
2. En woocommerce, ingresar a Configuración (Settings), en la pestaña General, habilitar la opción "Activar tasas de impuestos y cálculos" (Enable tax rates and calculations)
3. En la pestaña impuestos (Tax) de woocommerce, ingresar a "Tasas estándar" (Standard rates) y agregar una nueva fila con código de país "CL" y nombre de impuesto "IVA" (mantener mayúsculas) y tasa en 19%.
4. Marcar la opción para elegir que ese impuesto sea aplicado a los envíos.
5. En los productos existentes y nuevos, revisar que tengan marcada en "Estado de impuesto" (Tax status) la opción de "Afecto" (Taxable) si son afectos o "Ninguno" (None) si son exentos.
6. Realizar pruebas usando el modo PRUEBAS del plugin para comprobar que todo esté operando correctamente
7. Al usar esta modalidad, el plugin cambiará automáticamente entre boleta afecta/exenta y factura afecta/exenta según corresponda a los productos en el carrito, independiente del tipo de documento que elija la persona al comprar.
8. Para efectos de despliegue de los precios, en woocommerce >> Ajustes >> Impuestos se debe modificar los campos "Mostrar precios en la tienda", "Mostrar precios en el carrito y en el pago" y "Visualización del total de impuestos" para mostrar los precios ya sean netos (opción "sin impuestos") o totales (opción "impuestos incluidos").
9. Para crear impuestos específicos debe dirigirse a woocommerce >> Ajustes >> Impuestos y escribir el tipo de impuesto en el campo "Clases de impuestos adicionales" (ILA cerveza, ILA vino, ILA destilados), los nombres deben ser EXACTAMENTE como aparece entre paréntesis, en caso contrario FACTO no detectará correctamente el impuesto y la emisión NO funcionará.
9.1 Se agregará una pestaña correspondiente al tipo de impuesto específico, haga click en una pestaña y configure el impuesto. Una fila debe ser para el IVA y otra para el impuesto específico.
9.2 Se debe configurar los impuestos de la siguiente forma, cada uno en su respectiva clase:
ILA cerveza
Código de país: CL
Tarifa: 20.5
Nombre: ILA cerveza
Prioridad: 2
Compuesto: NO marcar
Envío: NO marcar
ILA vino
Código de país: CL
Tarifa: 20.5
Nombre: ILA vino
Prioridad: 2
Compuesto: NO marcar
Envío: NO marcar
ILA destilados
Código de país: CL
Tarifa: 31.5
Nombre: ILA destilados
Prioridad: 2
Compuesto: NO marcar
Envío: NO marcar

== Preguntas frecuentes ==

¿El plugin es gratuito?

Para conocer los valores, por favor visitar: <a href="https://www.facto.cl/producto/integracion-facto-api/">Facto.cl</a>.


¿Hay algún cobro adicional?

Existe un cobro adicional por concepto de habilitación y certificación de boleta electrónica. Esto en caso de que se requiera emitir boletas electrónicas a través de tu tienda (Si ya eres cliente FACTO y actualmente ya emites boletas electrónicas desde nuestra plataforma FACTO, este cobro no aplica)


¿Que documentos soporta el plugin?

- Factura electrónica afecta
- Boleta electrónica afecta
- Factura electrónica exenta
- Boleta electrónica exenta
- Factura de exportación electrónica


== Changelog ==
= 3.0.3 =
* CORRECCION: Se corrigió el envío del SKU para el descuento de stock en la bodega de Facto.
= 3.0.2 =
* CORRECCION: Se toma país Chile por defecto en caso que ninguno haya sido seleccionado
= 3.0.1 =
* CORRECCION: Se corrigió tipo de cambio para casos en que no se tiene plugin de cambio de moneda.
= 3.0 =
* MEJORA: Agrega soporte para factura de exportación para ventas en que la dirección de facturación está fuera de Chile.
= 2.4.2 =
* CORRECCION: Mejoras de seguridad.

= 2.4.1 =
* MEJORA: Log ahora tiene filtro por rango de fecha.

= 2.4 =
* MEJORA: Se incluye impuesto específico para Ley de Alcoholes (ILA).

= 2.3.5 =
* CORRECCION: Corrección error javascript en el checkout

= 2.3.4 =
* MEJORA: Soporte wordpress 5.9
* MEJORA: Soporte para tiendas en que el frontend no utiliza jQuery

= 2.3.3 =
* MEJORA: Se mejoró texto del checkout para aclarar cuando el documento será emitido manualmente por un administrador.

= 2.3.2 =
* MEJORA: Se guarda el folio y fecha del documento en el administrador de woocommerce, junto a cada pedido.

= 2.3.1 =
* CORRECCION: Se mejoró la detección de encoding de la base de datos al emitir facturas con acentos o símbolos especiales.

= 2.3 =
* MEJORA: Se agregó la posibilidad de elegir entre redondeo por valores BRUTOS o NETOS. Esto resolverá el descuadre en el valor total entre los pedidos y la boleta/factura generada

= 2.2.7 =
* MEJORA: Se agrego la opcion de seleccionar si agregar o no el envio al documento y si este se agrega con o sin IVA.

= 2.2.6 =
* CORRECCION: Se corrigió error al utilizar estado de pedido COMPLETADO cuando el método de pago estaba en modo manual. Ahora los pedidos al cambiar de estado se facturarán correctamente.

= 2.2.5 =
* MEJORA: Se mejoró el sistema de detección de múltiples intentos simultáneos de facturación, evitando duplicidad de transacciones

= 2.2.4 =
* MEJORA: Ahora el módulo soporta productos con múltiples variaciones cada una con diferente SKU

= 2.2.3 =
* CAMBIO: El módulo ya no soporta $HTTP_SERVER_VARS, por tanto se abandona soporta para PHP menor a 5.4

= 2.2.2 =
* MEJORA: Validación de que la extensión PHP mbstring esté instalada (se utiliza para gestionar acentos)
* CORRECCION: Botón de generación manual en administrador no funcionaba en firefox.

= 2.2.1 =
* CORRECCION: Validación para el caso en que los datos de la orden no están disponibles por borrado de productos u otros cambios fatales
* MEJORA: Soporte para Wordpress 5.5

= 2.2.0 =
* MEJORA: Ahora el módulo soporta el uso de documentos afectos y exentos de manera automática al utilizar el modo AVANZADO y el manejo de impuestos por parte de woocommerce. Por ahora soporta sólo IVA, no impuestos específicos. Por ahora sólo soporta productos digitales para caso boleta.

= 2.1.6 =
* CORRECCION: Las librerías NUSOAP que sirven para conectar a FACTO ahora validan que no exista otro módulo que también las use para evitar conflictos por duplicación de la librería.

= 2.1.5 =
* CORRECCION: El formulario AVANZADO no permitía guardar las opciones

= 2.1.4 =
* CORRECCION: Al usar el modo avanzado de manejo de impuestos por woocommerce, no es necesario quitar el valor de IVA al gasto de envío pues ya es neto.

= 2.1.3 =
* CORRECION: La razón social ahora se guarda sin acentos en post meta, para mejorar compatibilidad.
* NUEVA FUNCIONALIDAD: El módulo ahora comprueba si es que no se ha seleccionado ningún tipo de documento activo y genera una alerta para ser configurado.
* MEJORA: Actualización del look del plugin con la nueva imagen corporativa de Facto

= 2.1.2 =
* NUEVA FUNCIONALIDAD: El módulo ahora comprueba que woocommerce esté activo y muestra un aviso en caso contrario.

= 2.1.1 =
* CORRECCION: Sistema de wordpress.org no tomó la librería nusoap dentro del release, la cual es obligatoria para la generación de los documentos electrónicos. Presentando un error al momento de emitir.

= 2.1 =
* MEJORA: Se ha cambiado el nombre de las tablas de facturación y de log para utilizar el prefijo de wordpress
* CORRECCION: En algunas instalaciones el plugin no podía crear sus tablas de operaciones. El nuevo uso de los prefijos debería solucionar esto
* CORRECCION: Ahora es posible desde el administrador emitir documentos de pedidos que no tengan un registro en la tabla de medio de pago


= 2.0.3 =
* CORRECCION: Mejora javascript para casos en que el valor del combo de selección no es correcto en checkout

= 2.0.2 =
* CORRECCION: Se maneja correctamente el total con descuentos cuando se utiliza el manejo de impuestos de woocommerce
* CORRECCION: Selección de datos de factura electrónica durante checkout no era correctamente desplegado

= 2.0.1 =
* Resuelto problema de conexión

= 2.0 =
* Cambios visuales y de usabilidad en pantalla de configuración
* Nuevo modo PRUEBAS
* Nueva opción Ajustes dentro de la lista de plugins
* Reorganización del código y mayor soporte
* Correcciones al modo de valores netos o brutos

= 1.6.9 =
* Cambio en validación de generación de orden

= 1.6.8 =
* Corrige y evita duplicidad en documentos.
* Corrige link para obtener documento al refrescar.

= 1.6.8 =
* Corrige y evita duplicidad en documentos.
* Corrige link para obtener documento al refrescar.

= 1.6.7 =
* Corrige error al generar documentos de manera manual.

= 1.6.6 =
* Evita documentos duplicados.

= 1.6.5 =
* Corrige calcular iva.

= 1.6.4 =
* Permite sicronizar sku y descontar stock de bodega en facto.
* Permite gestionar el IVA mediante woocommerce.

= 1.6.3 =
* Se agrega validaciión de RUT al generar factura.

= 1.6.2 =
* Corrige seleccionar documento en checkout.

= 1.6.1 =
* Mejora la función insertar datos y crear DTE.

= 1.6 =
* Se realiza actualización wp 5.1.1.
* Genera boletas sin necesidad de ingresar datos adicionales.

= 1.5 =
* Corrige generación de documento con monto = 0.

= 1.4 =
* Mejora a flujo de pago exitoso.

= 1.3 =
* Corrección error generar boleta woocommerce.

= 1.2 =
* Corrección a validador y formato de RUT chileno.

= 1.1 =
* Soporta generación  de dte manuales en administrador.

= 1.0 =
* Soporta documentos electrónicos.