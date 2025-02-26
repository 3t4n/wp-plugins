<?php 
function admonpedidosservientrega_consultarenvios_ajax(){
 include "Utilidades.php";
include  plugin_dir_path(__DIR__ ) . 'arrays/pluginexterno/states/CO.php';
global $wpdb;




/*********************Cargar Tabla de Pedidos*********************/

require_once(plugin_dir_path(__DIR__ ) . 'sql/consultas.php');
$result2=$wpdb->get_results(sql_ordenes_por_cargar());


foreach ($result2 as $row)
{
	
	
	$concobro=0;
	
	
	
	if(strtoupper($row->MetodoPago)=="'COD'") $concobro=1;
	for($i=1;$i<=$row->cantidad;$i++)
	{
		

		$valinsert="(".$row->IdOrder.",".$row->idProducto.",".$i.",".$row->NumberOrder.",".$row->PesoTotal
						.",".$row->ValorDeclaradoTotal.",".$row->DesCiudadDestino.",".$row->Direccion.",".$row->Contacto
						.",".$row->DiceContener.",".$row->Alto.",".$row->Ancho.",".$row->Largo
						.",".$row->DesDptoDestino.",".$row->Correo_Electronico.",".$row->Telefono.",".$row->MetodoPago
						.",".$row->FechaCreacion.",".$row->FechaActualizacion.",".$concobro.",'1','',NOW())";


		$sqlinsert="INSERT INTO wp_PedidoEnvio
		(IdOrder, idProducto, nroItem,  NumberOrder, PesoTotal, ValorDeclaradoTotal, DesCiudadDestino, 
		Direccion, Contacto, DiceContener, Alto, Ancho, Largo, DesDptoDestino, Correo_Electronico, Telefono, TipoPago,  
		FechaCreacion, FechaActualizacion,concobro,nombreTienda,Num_Factura,FechaActualizacionEstado) values ".$valinsert;
		
		$wpdb->query($sqlinsert);
	}
}







/************************************************************************************************************/



 ?>
<html>
<head>
   
  
  
    
    
<style>
div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>

</head>
<script>

          jQuery('#datos').DataTable( {
                 "scrollY": 400,
                "scrollX": true,
                "order": [[ 3, "desc" ]],
                "paging":false,
                "searching":false
            } );
          
          jQuery("#selectAll").click(function() {
        //alert("asdfasdf");});
        jQuery("input[type=checkbox]").prop("checked", jQuery(this).prop("checked"));
              
          });
        
        jQuery("input[type=checkbox]").click(function() {
        	if (!jQuery(this).prop("checked")) {
        		jQuery("#selectAll").prop("checked", false);
        	}
        });
		
    jQuery(document).ready(function(){
          
      }
      );
</script>
<body>

<?php


$filtropedido=admonpedidosservientrega_SanitizeArrays(isset($_POST["filtroPedido"]) ? (array) $_POST["filtroPedido"] : array());



$where="";

if($filtropedido["enProceso"]=="1"){ $where .=" and idEstado<>11";}
if($filtropedido["enProceso"]=="0") {$where .=" and idEstado=11";}

if(!empty($filtropedido["nombreArchivo"])) $where .=" AND nombreArchivo='".$filtropedido["nombreArchivo"]."' ";
if(!empty($filtropedido["DesCiudadDestino"])) $where .=" AND DesCiudadDestino = '".$filtropedido["DesCiudadDestino"]."' ";
if(!empty($filtropedido["DesDptoDestino"])) $where .=" AND DesDptoDestino = '".$filtropedido["DesDptoDestino"]."' ";
if(!empty($filtropedido["TipoPago"])) $where .=" AND TipoPago = '".$filtropedido["TipoPago"]."' ";
if(is_numeric($filtropedido["ConCobro"])) $where .=" AND ConCobro =".$filtropedido["ConCobro"];
if(!empty($filtropedido["idEstado"]) && $filtropedido["enProceso"]=="1" ) $where .=" AND wp_PedidoEnvio.idEstado=".$filtropedido["idEstado"];
if(!empty($filtropedido["NumberOrder"])) $where .=" AND NumberOrder in (".$filtropedido["NumberOrder"].") ";
if(!empty($filtropedido["NroGuia"])) $where .=" AND NroGuia in (".$filtropedido["NroGuia"].")";
if(!empty($filtropedido["fromFC"]) && !empty($filtropedido["toFC"])) $where .=" AND date(FechaCreacion) BETWEEN '".$filtropedido["fromFC"]."' AND '".$filtropedido["toFC"]."'";
if(!empty($filtropedido["fromFM"]) && !empty($filtropedido["toFM"])) $where .=" AND date(FechaCreacion) BETWEEN '".$filtropedido["fromFM"]."' AND '".$filtropedido["toFM"]."'";





if(empty($where)){

echo "Seleccione los criterios para consultar los envíos";
echo
die();}
/*Ciudad de destino
	Dpto de destino
	Nombre destintario
	Teléfono*/
$sql="SELECT  nombreArchivo,IdOrder, NumberOrder, NroGuia,  case TieneRecoleccionEsp when 0 then 'No' 
        when 1 THEN 'Si' end TieneRecoleccionEsp, 
        case ConCobro when 0 then 'Normal' when 1 then 'Con cobro' end MercanciaPremier, idEstado DescEstado,
        DATE_FORMAT(FechaCreacion,'%d/%m/%Y') FechaCreacion,
        DATE_FORMAT(FechaActualizacion,'%d/%m/%Y') FechaActualizacion,
        PesoTotal,
        Contacto,DiceContener, Alto, Ancho, Largo, case when DesDptoDestino='DC' then 'CUN' else DesDptoDestino END DesDptoDestino, 
        Num_Factura, Correo_Electronico, Telefono, TipoPago, TieneRecoleccionEsp recEsporadica,
        ConCobro,DescripcionError,idPedidoEnvio,DesCiudadDestino,PickupRequestNumber,
        IdEstadoEnvio, Estado_Envio, Fecha_Entrega, Novedad, FechaActualizacionEstado,idProducto,nroItem,
		ValorDeclaradoTotal,Direccion
     
		
        FROM wp_PedidoEnvio
        /*inner join ps_EstadoEnvio on ps_PedidoEnvio.idEstado=ps_EstadoEnvio.IdEstado*/
        WHERE 1 ".$where;






	
	
	$result=$wpdb->get_results($sql);
	

?>

<table id='totalEnvios' class='table' style='width:100%'>
		<thead>
			<tr>
				<th><div class='custom-control form-check-custom'><input type='checkbox' class='form-check-input-custom selectAll' name='selectAll' id='selectAll' value='all'><label class='form-check-label-custom' for='selectAll'></label></div></th>
				<th>ID</th>
				<th>No. ORDEN</th>
				<th>No. GUÍA</th>
				<th>TIPO DE ENVÍO</th>
				<th>ESTADO DEL ENVÍO</th>
				<th>DESTINO</th>
				<th>DESTINATARIO</th>
				<th class='text-center'>RECOLECCIÓN</th>
				<th class='text-center'>ESTADO DE ENTREGA</th>
				<th class='no-sort text-center'>VER</th>
				<th>IdOrder</th>
				<th>ConCobro</th>
				<th>IdProducto</th>
				<th>NroItem</th>
				<th>recEsporadica</th>
				<th>Valor declarado total</th>
				<th>Dirección</th>
				<th>FechaCreacion</th>
				<th>FechaActualizacion</th>
				<th>Peso Total</th>
				<th>Contacto</th>
				<th>Dice Contener</th>
				<th>Alto</th>
				<th>Ancho</th>
				<th>Largo</th>
				<th>Correo Electrónico</th>
				<th>Teléfono</th>
				<th>DescripcionError</th>
				<th>Cod. Estado Envío</th>
				<th>Tipo Pago</th>
				
			</tr>
		</thead>
		<tbody>


<?php
foreach ($result as $row)
        
		{

				$estadosenvio = include plugin_dir_path(__DIR__ ) . 'arrays/estadosenvio.php';;
				
				$estadoenvio = array_search($row->DescEstado, $estadosenvio);
				
	?>			
				<tr>
				<td></td>
				<td><?php echo esc_html($row->idPedidoEnvio)?></td>
				<td><?php echo esc_html($row->NumberOrder)?></td>
				<td><?php echo esc_html($row->NroGuia)?></td>
				<td><?php echo esc_html($row->MercanciaPremier) ?></td>
				<td><span class='<?php echo esc_attr($estadosenvio[$row->DescEstado][1]) ?>'><?php echo esc_html($estadosenvio[$row->DescEstado][0]) ?></span></td>
				<td><?php echo esc_html($row->DesCiudadDestino . "," . $states['CO'][$row->DesDptoDestino])?></td>
				<td><?php echo esc_html($row->Contacto)?></td>
				<td class='text-center'><?php echo esc_html($row->TieneRecoleccionEsp)?></td>
				<td class='text-center'><?php echo esc_html($row->Estado_Envio. "-". $row->Novedad . "-".$row->Fecha_Entrega)?></td>
				<td class='text-center'><a href='#' onclick='detalleenvio(<?php echo esc_attr($row->idPedidoEnvio) ?>)' >
				<img src='<?php echo esc_attr( plugin_dir_url(__FILE__)."images/ico-ojo.svg") ?>' alt='Ver' /></a></td>
				
				<td><?php echo esc_html($row->IdOrder)?></td>
				<td><?php echo esc_html($row->ConCobro)?></td>
				<td><?php echo esc_html($row->idProducto)?></td>
				<td><?php echo esc_html($row->nroItem)?></td>
				<td><?php echo esc_html($row->recEsporadica)?></td>
				<td><?php echo esc_html($row->ValorDeclaradoTotal)?></td>
				<td><?php echo esc_html($row->Direccion)?></td>
				<td><?php echo esc_html($row->FechaCreacion)?></td>
				<td><?php echo esc_html($row->FechaActualizacion)?></td>
				<td><?php echo esc_html($row->PesoTotal)?></td>
				<td><?php echo esc_html($row->Contacto)?></td>
				<td><?php echo esc_html($row->DiceContener)?></td>
				<td><?php echo esc_html($row->Alto)?></td>
				<td><?php echo esc_html($row->Ancho)?></td>
				<td><?php echo esc_html($row->Largo)?></td>
				<td><?php echo esc_html($row->Correo_Electronico)?></td>
				<td><?php echo esc_html($row->Telefono)?></td>
				<td><?php echo esc_html($row->DescripcionError)?></td>
				<td><?php echo esc_html($row->DescEstado)?></td>
				<td><?php echo esc_html($row->TipoPago)?></td>
				</tr>
				
        
<?php			  
        
		}

?>


</tbody></table>


</body>
</html>
<?php 
}

