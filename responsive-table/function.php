<?php

// shortcode

function rt_responsive_table_shortcode( $atts ){


	ob_start();
	?> 

	
	<style>

table { 
  width: 100%; 
  border-collapse: inherit;
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
.responsive-table-shortcode-wrap {
  width: 100%;

}


@media only screen and (max-width:767px)  {

	
	.rt-table, .rt-thead, .rt-body, .rt-th, .rt-td, .rt-tr { 
		display: block; 
	}
	
	
	.rt-thead .rt-tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	.rt-tr {  }
	
	.rt-td { 
		
		border: none;
		border: 1px solid #ddd;
		position: relative;
		padding-left: 50%; 
		min-height: 30px;
		
	}
	
	.rt-td:before { 
		
		position: absolute;
		
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	
	
	
	<?php
	$row = get_option('rt_table_row');
$collum = get_option('rt_table_col');
for ($i = 1; $i <= $collum; $i++) {
	?>
	.rt-td:nth-of-type(<?php echo $i; ?>):before { content: "<?php echo get_option('rt_table_header'.$i); ?> "; }
	<?php
	}
	?>
	
}
</style>

<div class="responsive-table-shortcode-wrap">
<table class="rt-table">
	<thead class="rt-thead">
	<tr class="rt-tr">
	
	
	<?php
	$row = get_option('rt_table_row');
$collum = get_option('rt_table_col');
for ($i = 1; $i <= $collum; $i++) {
	?>
	<th class="rt-th"> <?php echo get_option('rt_table_header'.$i); ?> </th>
	<?php
	}
	?>
	
	</tr>
	<thead>
	
	<tbody class="rt-body">
	

	
	
	<?php
	
	$row = get_option('rt_table_row');
$collum = get_option('rt_table_col');

for ($i = 1; $i <= $row; $i++) {
?>
<tr class="rt-tr">
<?php

 for ($y = 1; $y <= $collum; $y++) {
 ?>
		 <td class="rt-td"> <?php echo get_option('rt_table_header'.$y.'_row'.$i); ?> </td>		
		 
	
	<?php
		 }  
?>		 
	</tr>
	<?php
	}
	
	?>
	

	
	
	</tbody>
	
	
		</table>
	</div>
	
	
	
	<?PHP
	return ob_get_clean();

}
add_shortcode( 'responsivetable', 'rt_responsive_table_shortcode' );

?>