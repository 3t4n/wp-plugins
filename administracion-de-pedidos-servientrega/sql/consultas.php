<?php
function sql_ordenes_por_cargar(){
	return "select pedidosordenes.* from
(select
	
    p.ID as IdOrder,
	Max(case when im.meta_key='_product_id' then im.meta_value end) idProducto,
    Max(case when im.meta_key='_qty' then im.meta_value end) cantidad,
    p.ID as NumberOrder,
    IFNULL(Max(CASE WHEN PROD.meta_key = '_weight' THEN PROD.meta_value END),0) PesoTotal,
    Max(CASE WHEN PROD.meta_key = '_price' THEN PROD.meta_value END) ValorDeclaradoTotal,
    concat('''',max( CASE WHEN pm.meta_key = '_shipping_city' and p.ID = pm.post_id THEN pm.meta_value END ) , '''') as DesCiudadDestino,
    concat('''',max( CASE WHEN pm.meta_key = '_shipping_address_1' and p.ID = pm.post_id THEN pm.meta_value END ), '''') as Direccion,
    CONCAT('''',MAX(CASE WHEN pm.meta_key = '_shipping_first_name' and p.ID = pm.post_id THEN pm.meta_value END),' ',MAX(CASE WHEN pm.meta_key = '_shipping_last_name' and p.ID = pm.post_id THEN pm.meta_value END), '''') AS Contacto,
    
    CONCAT('''',( select  order_item_name  from wp_woocommerce_order_items where order_id = p.ID LIMIT 1 ),'''') as DiceContener,
    IFNULL(Max(CASE WHEN PROD.meta_key = '_height' THEN PROD.meta_value END),0) Alto,
    IFNULL(Max(CASE WHEN PROD.meta_key = '_width' THEN PROD.meta_value END),0) Ancho,
    IFNULL(Max(CASE WHEN PROD.meta_key = '_length' THEN PROD.meta_value END),0) Largo,
    CONCAT('''',max( CASE WHEN pm.meta_key = '_shipping_state' and p.ID = pm.post_id THEN pm.meta_value END ),'''') as DesDptoDestino,
    CONCAT('''',max( CASE WHEN pm.meta_key = '_billing_email' and p.ID = pm.post_id THEN pm.meta_value END ),'''') as Correo_Electronico,
    CONCAT('''',max( CASE WHEN pm.meta_key = '_billing_phone' and p.ID = pm.post_id THEN pm.meta_value END ),'''') as Telefono,
    CONCAT('''',max( CASE WHEN pm.meta_key='_payment_method' and p.ID = pm.post_id THEN pm.meta_value ELSE '#N/A' END ),'''') as MetodoPago,
	CONCAT('''',p.post_date,'''') FechaCreacion,
	CONCAT('''',p.post_date,'''') FechaActualizacion

from
    wp_posts p 
    join wp_postmeta pm on p.ID = pm.post_id
    left join (SELECT pm.post_id post_id_cod FROM wp_postmeta pm where  pm.meta_key='_payment_method' and pm.meta_value='cod') COD on p.ID=post_id_cod
    join wp_woocommerce_order_items oi on p.ID = oi.order_id
    join wp_woocommerce_order_itemmeta im on oi.order_item_id=im.order_item_id
    left join (SELECT order_item_id prod_order_item_id,meta_value producto_id FROM wp_woocommerce_order_itemmeta WHERE meta_key='_product_id') PRODITEMMETA on oi.order_item_id=prod_order_item_id
    left join wp_postmeta PROD on PROD.post_id=producto_id
where
p.post_type = 'shop_order'
AND (p.post_status = 'wc-processing' or post_id_cod is not null)
AND prod_order_item_id is not null
group by
    p.ID,	oi.order_item_id) pedidosordenes
left join (select distinct idPedidoEnvio,IdOrder,idProducto from wp_PedidoEnvio) e  on pedidosordenes.IdOrder=e.IdOrder and pedidosordenes.idProducto=e.idProducto 
WHERE e.idPedidoEnvio is null";
	
}