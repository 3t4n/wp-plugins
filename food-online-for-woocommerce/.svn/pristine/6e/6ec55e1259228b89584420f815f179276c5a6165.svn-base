<?php

if ( !defined( 'ABSPATH' ) ) {

    exit;

}




do_action('fdoe_loop_start');
$fdoe_color= get_option('fdoe_color','inherit');
$menu_color = $fdoe_color == '' ? 'inherit' : $fdoe_color ;
$fdoe_color_back = get_option('fdoe_color_back','inherit');
$menu_color_back = $fdoe_color_back == '' ? 'inherit' : $fdoe_color_back  ;

$fdoe_border_color = get_option('fdoe_border_color','#ddd');
$menu_border_color = $fdoe_border_color == '' ? '#ddd' : $fdoe_border_color  ;
$display_top_cat_menu = get_option('fdoe_cat_top_menu','no') == 'yes' ? 'flex' : 'none';
$left_container_classes_index_right = get_option('fdoe_hide_minicart', 'no') == 'yes' &&
										(get_option('fdoe_enable_delivery_switcher','no') == 'no' ||
										(get_option('fdoe_enable_delivery_switcher','no') != 'no' && get_option('fdoe_top_bar','no') == 'yes') ||
										get_option('fdoe_enable_delivery_switcher','no') == 'only_pickup' ||
										get_option('fdoe_is_prem', 'no') == 'no'
										) ? 0 :-3;
$left_container_classes_index_left = get_option('fdoe_left_menu', 'no') == 'yes' ? -2 :0;
$class_index = 12 + $left_container_classes_index_right + $left_container_classes_index_left;


?>

<style>
.woocommerce-pagination {
	display: none;
}

.woocommerce-result-count {
	display: none;
}

#the_menu,
#menu_headings,
div.fdoe-item:hover {
	background-color: <?php echo $menu_color_back;
	?>;
}

#the_menu .fdoe-item {
	border-right-color: <?php echo $menu_border_color;
	?>;
	border-bottom-color: <?php echo $menu_border_color;
	?>;
}

#menu_headings {
	display: <?php echo 'none';/* echo $display_top_cat_menu;*/
	?>;

}
.fdoe-dropdown-icon {
	color: <?php echo $menu_color
	?>;

}

</style>

<!-- Main container of the Menu -->

<div class="container-fluid fdoe_main_container" id="the_main_container">

	<div class="arorow">

		<div class="arocol-xs-12 arocol-sm-12 arocol-lg-12" >


			<div class="arorow fdoe-flex-1">
	<div id="fdoe-top-element"></div>
				<?php



                    do_action( 'fdoe_loop_start_2');


if(get_option('fdoe_left_menu', 'no')== 'yes'){
                    ?>
			<div class="hidden-xs arocol-sm-2 fdoe-less-gut" id="fdoe-left-left-container">
<?php
if(get_option('fdoe_loading_overlay','no') == 'yes'){
echo fdoe_output_leftbar_pre();
}
$is_sticky = get_option('fdoe_sticky_bar','no') == 'yes' ? 'fdoe-sticky' : '';

		echo '<div class="'.$is_sticky.'"  id="menu_headings_2" ><h4 class="Category_heading">';
			echo __( 'Menu', 'food-online-for-woocommerce' );
			echo '</h4></div>';


?>
			</div>

			<?php } ?>

			<div class="arocol-xs-12 arocol-sm-<?php echo $class_index; ?>  arocol-lg-<?php echo $class_index; ?> fdoe-less-gut" id="fdoe-left-container">
					<?php
					if(get_option('fdoe_loading_overlay','no') == 'yes'){
						echo fdoe_get_menu_pre();
					}?>
					<div class="fdoe">

						<div class="fdoe-products flex-container-column" id="the_menu"  >

							<?php if( get_option( 'fdoe_cat_top_menu_mobile','yes') == 'collapsed' ){
								$is_top = get_option('fdoe_cat_top_menu','no') !== 'yes' ? 'hidden-sm hidden-md hidden-lg' : '';
								?>
							<nav class="navbar navbar-default fdoe-top-sticky fdoe-sticky-mobile <?php echo $is_top; ?>">



							<div class="navbar-header fdoe-nav-header hidden-sm hidden-md hidden-lg">

      <span class="arocollapsed fdoe-collapse-button" data-toggle="arocollapse" data-target="#fdoe_products_id" aria-expanded="false">

	    <span class="fdoe-dropdown-title" ><?php echo __( 'Menu', 'food-online-for-woocommerce' ); ?></span>
		<i class="fdoe-dropdown-icon fas fa-caret-down fa-3x"></i>
      </span>

    </div>




  <div class="fdoe_menu_header arocollapse navbar-arocollapse" id="fdoe_products_id">

  <ul class="navbar-nav nav nav-tabs fdoe-menu-2"  id="menu_headings" >

  </ul>


</div>
</nav>
							<?php }
							else{?>
							<div id="fdoe_products_id" class="fdoe_menu_header fdoe-top-sticky fdoe-sticky-mobile">
								<ul class="nav nav-tabs fdoe-menu-2  " id="menu_headings" >
								</ul>

							</div>
							<?php }?>
