<?php
// responsive table settings menu

add_action('admin_menu', 'rt_responsive_table_menu');

function rt_responsive_table_menu() {


$page_hook_suffix = add_menu_page('Responsive Table Settings', 'Responsive Table', 'administrator', __FILE__, 'rt_responsive_table_settings_page',plugins_url('/images/rt-icon.png', __FILE__));


add_action('admin_print_scripts-' . $page_hook_suffix, 'rt_responsive_table_settings_style');

}

function rt_responsive_table_settings_style() {

}

// register settings

function rt_responsive_table_register_mysettings() {


// row and col 

register_setting( 'rt_responsive_table-settings-group', 'rt_table_row' );
register_setting( 'rt_responsive_table-settings-group', 'rt_table_col' );


// header 

$row = get_option('rt_table_row');
$collum = get_option('rt_table_col');

for ($i = 1; $i <= $collum; $i++) {

register_setting( 'rt_responsive_table-settings-group', 'rt_table_header'.$i );

}



// row col

$row = get_option('rt_table_row');
$collum = get_option('rt_table_col');

for ($i = 1; $i <= $row; $i++) {

 for ($y = 1; $y <= $collum; $y++) {
		 		
		 register_setting( 'rt_responsive_table-settings-group', 'rt_table_header'.$y.'_row'.$i );		
	
		 }   
	
	}
	

}


add_action( 'admin_init', 'rt_responsive_table_register_mysettings' );

// setting page

function rt_responsive_table_settings_page() {

?>

<style>

table { 
  width: 100%; 

}

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
.responsive-table-settings-wrap {
  width: 99%;

}

.responsive-table-settings-wrap textarea {
  width: 100%;
}

.responsive-table-settings-wrap .rt-table-textbox {
  width: 100%;
}

.setting-head-wrap-right {
  float: right;
  margin-right: 15px;
}

.setting-head-wrap-left {
  display: inline-block;
  vertical-align: top;
  width: 40%;
}



@media only screen and (max-width:767px)  {

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		
		
		border: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		
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
	td:nth-of-type(<?php echo $i; ?>):before { content: "<?php echo get_option('rt_table_header'.$i); ?> "; }
	<?php
	}
	?>
}





</style>


<form method="post" action="options.php">

    <?php settings_fields( 'rt_responsive_table-settings-group' ); ?>

    <?php do_settings_sections( 'rt_responsive_table-settings-group' ); ?>


<h1> Responsive Table Settings </h1>

<p> Insert Shortcode in your page or post [responsivetable] </p>

<div class="setings-head-wrap">
<div class="setting-head-wrap-left">
<p>
 Set  Row <input type="text" name="rt_table_row" value="<?php echo get_option('rt_table_row'); ?>" />
 Set  Column <input type="text" name="rt_table_col" value="<?php echo get_option('rt_table_col'); ?>" />
 </p>
 </div>

 </div>

<div class="responsive-table-settings-wrap">

<table>
	<thead>
	
	<tr>
<?php

$row = get_option('rt_table_row');
$collum = get_option('rt_table_col');

for ($i = 1; $i <= $collum; $i++) {
?>
<th>  <input class="rt-table-textbox" type="text" name="<?php echo 'rt_table_header'.$i; ?>" value="<?php echo get_option('rt_table_header'.$i); ?>" /> </th>

<?php
}
?>
	</tr>


	</thead>
		
		<tbody>

		
<?php

$row = get_option('rt_table_row');
$collum = get_option('rt_table_col');

for ($i = 1; $i <= $row; $i++) {
?>
	<tr>
	
		 <?php for ($y = 1; $y <= $collum; $y++) {
		 
		 ?>
		 <td>
		 <textarea type="text" name="<?php echo 'rt_table_header'.$y.'_row'.$i; ?>"/> <?php echo get_option('rt_table_header'.$y.'_row'.$i); ?> </textarea>
		 </td>
		 <?php
		 } ?>   
		
	</tr>
   
<?php
	}
?>
	
	</tbody>
	
   </table>


   






 <?php submit_button(); ?>

</form>



<?php

}









?>