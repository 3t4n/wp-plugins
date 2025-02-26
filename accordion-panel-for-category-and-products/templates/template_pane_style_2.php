<?php if ( ! defined( 'ABSPATH' ) ) exit;   $vcode = $this->_config["vcode"];  ?>
 <script type='text/javascript' language='javascript'>
	var default_category_id_<?php echo esc_js( $vcode ); ?> = '<?php echo esc_js( $this->_config["category_id"] ); ?>';
	var request_obj_<?php echo esc_js( $vcode ); ?> = {
			category_id:'<?php echo esc_js( $this->_config["category_id"] ); ?>',  
			hide_product_price:'<?php echo esc_js( $this->_config["hide_product_price"] ); ?>', 
			hide_product_title:'<?php echo esc_js( $this->_config["hide_product_title"] ); ?>',
			product_price_color:'<?php echo esc_js( $this->_config["price_text_color"] ); ?>',
			product_title_color:'<?php echo esc_js( $this->_config["title_text_color"] ); ?>',
			price_tab_text_color:'<?php echo esc_js( $this->_config["price_tab_text_color"] ); ?>', 
			price_tab_background_color:'<?php echo esc_js( $this->_config["price_tab_background_color"] ); ?>',
			header_text_color:'<?php echo esc_js( $this->_config["header_text_color"] ); ?>', 
			header_background_color:'<?php echo esc_js( $this->_config["header_background_color"] ); ?>',
			display_title_price_over_image:'<?php echo esc_js( $this->_config["display_title_price_over_image"] ); ?>', 
			number_of_product_display:'<?php echo esc_js( $this->_config["number_of_product_display"] ); ?>', 
			vcode:'<?php echo esc_js( $vcode ); ?>'
		}
 </script> 
 
 <?php $_categories = $this->_config["category_id"]; ?>
  
 <div id="categoryaccordionpanel" style="width:<?php echo esc_attr( $this->_config["tp_widget_width"] ); ?>"  class="pane_style_2 <?php echo ( ( trim( $this->_config["display_title_price_over_image"] ) == "yes" ) ? "disp_title_over_img" : "" ); ?>">
	<?php if($this->_config["hide_widget_title"]=="no"){ ?>
		<div class="ik-price-tab-title-head" style="background-color:<?php echo esc_attr( $this->_config["header_background_color"] ); ?>;color:<?php echo esc_attr( $this->_config["header_text_color"] ); ?>"  >
			<?php echo $this->_config["widget_title"]; ?>   
		</div>
	<?php } ?> 
	<span class='wp-load-icon'>
		<img width="18px" height="18px" src="<?php echo ACP_MEDIA.'images/loader.gif'; ?>" />
	</span>
	<div class="wea_content lt-grid">
		<?php 
			
			$_category_res = array();
			
			if( trim($_categories)=="0" || trim($_categories) == "" )
				$_category_res = $this->getCategories();
			else 
				$_category_res = $this->getCategories($_categories);
				 
			
			if( count( $_category_res ) > 0 ) {
				foreach($_category_res as $_category){ 
					$_category_name = $_category->category;
					$_category_id = $_category->id;
					?>
					<div class="item-price-list">
						<div class="price-item"  onmouseout="acp_cat_tab_ms_out( this )" onmouseover="acp_cat_tab_ms_hover( this )" id="<?php echo esc_js( $vcode.'-'.$_category_id ); ?>" onclick="ACP_fillProducts( this.id, '<?php echo esc_js( $_category_id ); ?>', request_obj_<?php echo esc_js( $vcode ); ?>, 1 )"  style="color:<?php echo esc_attr( $this->_config["price_tab_text_color"] ); ?>;background-color:<?php echo esc_attr( $this->_config["price_tab_background_color"] ); ?>;" >
							<div class="price-item-text"  onmouseout="acp_cat_tab_ms_out( this.parentNode )" onmouseover="acp_cat_tab_ms_hover( this.parentNode )">
								<?php echo $_category_name; ?>
							</div>
							<div class="ld-price-item-text"></div>
							<div class="clr"></div>
						</div>						
						<div class="item-products"></div>
						<div class="clr"></div>
					 </div> 
					 <div class="clr"></div>
				   <?php
				}
			} 
		?>
		<div class="clr"></div>
	</div>
</div>