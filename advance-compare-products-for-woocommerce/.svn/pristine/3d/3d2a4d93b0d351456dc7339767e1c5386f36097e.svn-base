<?php
/**
* Plugin Name: Compare Products Lite for WooCommerce
* Plugin URI: http://www.phoeniixx.com/
* Description: Compare Product lite for Woo Commerce Plugin gives your customers, an option to side-by-side compare, multiple choices of a product, on a common popup window. The customers could do this side-by-side comparison, on the basis of multiple features like Price, Availability, Colors, Size etc., thus getting assistance in choosing the most suitable option. 
* Version: 1.3.5
* Text Domain: pcp
* Domain Path: /i18n/languages/
* Author: Phoeniixx
* Author URI: http://www.phoeniixx.com/
* License: GPL2
*/ 


if(!isset($_SESSION)){
	
	session_start();
		
}

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    // Put your plugin code here

	require_once(ABSPATH . 'wp-settings.php');
	
	require_once('compare_settings.php');
	
	$pcp_compare_data=get_option('data_compare_product');
	
	$pcp_table_dataa = get_option('data_compare_table_product');
	
	if(!empty($pcp_compare_data) || !empty($pcp_table_dataa)){
		
		extract($pcp_table_dataa);	
		
		extract($pcp_compare_data);	
		
		if(isset($fields_attr)){
			
			$fields_attr=unserialize($fields_attr);
		
		}
	}
	
	add_action('wp_head', 'phoen_frontend_add_assets_file');
	
	function phoen_frontend_add_assets_file(){	
		
		wp_enqueue_script('wp-color-picker'); 
		
		wp_enqueue_style('wp-color-picker');		
		
		wp_enqueue_style( 'style_colorbox_request', plugin_dir_url(__FILE__).'css/pcp_colorbox.css' );
		
		wp_enqueue_style( 'style_custom_request', plugin_dir_url(__FILE__).'css/custom_css.css' );
		
		wp_enqueue_script("pcp-colorbox-min-js", plugin_dir_url(__FILE__)."js/pcp_colorbox-min.js",array('jquery'),'',true);
				
		wp_enqueue_script( 'compare-ajax-request', plugin_dir_url(__FILE__) . 'js/pcp_custom.js', array( 'jquery' ) );	
		
		wp_localize_script( 'compare-ajax-request', 'CompareAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		
		$pcp_compare_data=get_option('data_compare_product');
		
		$pcp_table_dataa = get_option('data_compare_table_product');
	
		if(!empty($pcp_compare_data) || !empty($pcp_table_dataa)){
		
			extract($pcp_table_dataa);	
			
			extract($pcp_compare_data);	
			
			if(isset($fields_attr) || $fields_attr!=''){
				
				$fields_attr = unserialize($fields_attr);
			
			}
		}
		?>
		<div class="compare_lite_box_overlay" style='display:none'>
			<div id='pcpinline_content' style='padding:10px; background:#fff;'>
			<span class="compare_close_pcp">&times;</span>
			<h2 class="plugin_heading"><?php echo ($table_text!='')?$table_text:'Compare Table'; ?></h2>
				<div class="compare_table_overflow">
					<table class="compare_heading">
							<tr class="compare_popup_heading_row"><td> &nbsp; </td></tr>						
							<?php if(in_array('title',$fields_attr)){?><tr class="compare_popup_heading_row"><td class="compare_text_tit">Title </td></tr><?php } ?>
							<?php if(in_array('description',$fields_attr)){?><tr class="compare_popup_heading_row"><td class="compare_text_desc">Description </td></tr><?php } ?>
							<?php if(in_array('image',$fields_attr)){?><tr class="compare_popup_heading_row"><td class="compare_text_image"> Image </td></tr><?php } ?>
							<?php if(in_array('price',$fields_attr)){?><tr class="compare_popup_heading_row"><td class="compare_text_prc"> Price </td></tr><?php } ?>
							<?php if(in_array('stock',$fields_attr)){?><tr class="compare_popup_heading_row"><td class="compare_text_avl">Availability </td></tr><?php } ?>
							<?php if(isset($dynamic_attributes)&&!empty($dynamic_attributes)){
						
							foreach($dynamic_attributes as $dynamic_attribute => $dynamic_attribute_value){
							?>
								<tr class="compare_text_<?php echo $dynamic_attribute;?>_row compare_popup_heading_row"><td class="compare_textp_attr" style="padding:4px;"><?php echo ucfirst($dynamic_attribute);?> </td></tr>
							
							<?php
							}
							
							
						}?>
							
							<?php if(in_array('add-to-cart',$fields_attr)){?><tr class="compare_popup_heading_row"><td>Add to cart </td></tr><?php } ?>
						</table>
					<div class="table_class">
					<div class="tabel_data">
						<table class="compare_item">
					
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
		<style>
		.compare_prod_image img{
			max-width:<?php echo ($pcp_image_width!='' && $pcp_image_width>0)?$pcp_image_width:220 ?>px!important;
			max-height:<?php echo ($pcp_image_height!='' && $pcp_image_height>0)?$pcp_image_height:154 ?>px!important;
		}
		</style>
		<script>
			var compare_bt_txt = '<?php echo (!empty($bt_lk_text))?$bt_lk_text:'Compare';?>';
		</script>
		<?php
	}	
	
	add_action('admin_head','phoen_admin_assests_file');
	
	function phoen_admin_assests_file(){
		
		wp_enqueue_script( 'compare-admin-script', plugin_dir_url(__FILE__) . 'js/pcp_admin_script.js', array( 'jquery' ) );	
		
	}
	
	add_action('admin_menu', 'pcp_comapre_tab');

		function pcp_comapre_tab(){
			
			$page_title="Compare Product";
			$menu_title="Compare";
			$capability="manage_options";
			$menu_slug="pcp-compare-manager";
			$plugin_dir_url =  plugin_dir_url(__FILE__);
			add_menu_page( 'phoeniixx', __( 'Phoeniixx', 'phe' ), 'nosuchcapability', 'phoeniixx', NULL, $plugin_dir_url.'/images/logo-wp.png', 57 );
			add_submenu_page( 'phoeniixx', $page_title, $menu_title, $capability, $menu_slug ,'compare_settings');

		}
		
		
		function pcp_shop_display_compare() {
			$pcp_compare_data=get_option('data_compare_product');
			//print_r($pcp_compare_data);
			$pcp_table_dataa = get_option('data_compare_table_product');
	
			if(!empty($pcp_compare_data) || !empty($pcp_table_dataa)){
				
				extract($pcp_table_dataa);	
			
				extract($pcp_compare_data);
				//print_r($fields_attr);
				
				if(isset($fields_attr) || $fields_attr!=''){
					$fields_attr=unserialize($fields_attr);
				}
			}
			if(isset($bt_product_page)&& ($bt_product_page==1)){
				if(isset($fields_attr ) || $fields_attr!=''){
					$fields_attr;//=unserialize($fields_attr);
				}
			}
				if(isset($auto_open)&& ($auto_open==1)){
					wp_enqueue_script("pcp-quick-js", plugin_dir_url(__FILE__)."js/quick_display.js",array('jquery'),'',true);	
				}			 
				if(!isset($_SESSION['compare_data'])){
					$compare_data=array();
					$_SESSION['compare_data']=$compare_data;
				}
				$compare_product=$_SESSION['compare_data'];
				
				
				wp_enqueue_style( 'style_custom_request', plugin_dir_url(__FILE__).'css/custom_css.css' );
				
				global $product;
				
				if($is_enable==1 && $bt_product_page == 1){
				
				if (!empty($product)) { ?>
					
					<span class="image_loader" ><a class="pcpcompare compare_shop_popup <?php echo ($is_button=='Button')?'button':'';?>" style="background:<?php if($is_button=='Button'){ if($cmp_bt_clr!=''){echo $cmp_bt_clr;}else{ echo '#ebe9eb';}} ?>; color:<?php echo ($cmp_txt_clr!='')?$cmp_txt_clr:'#515151'?>; " data-value="<?php echo $product->id ;?>" href="javascript:void(0)"><?php if(in_array($product->id,$compare_product)){ echo "Added"; }else{ if(isset($bt_lk_text)){ echo ($bt_lk_text!='')?$bt_lk_text:'compare' ;}}?></a></span>
					
					<?php
				}
				}
			}
		
	register_activation_hook(__FILE__, 'phoen_create_compare_pages');
	
	function phoen_create_compare_pages() {
		//post status and options
		
		$pcpp_genral_ = get_option('data_compare_product');
		
		if((!isset($pcpp_genral_) || empty($pcpp_genral_))){
			
			$fields_attr = Array(	'image', 'title', 'price','add-to-cart','description',
									'stock'
								);
			
			$pcp_data = array('is_enable'=>1,'is_button'=>'Button','bt_lk_text'=>'Compare',
							
							'bt_product_page'=>1,'pcpp_button_in_image_'=>1,
							
							'bt_product_list'=>1,'table_text'=>'Compare Table',
							
							'fields_attr'=>serialize($fields_attr),'pcp_image_width'=>220,
							
							'pcp_image_height'=>154,
						);
		
			update_option('data_compare_product',$pcp_data);
		}
		
		$pcp_table_dataa = get_option('data_compare_table_product');
		
		if((!isset($pcp_table_dataa) || empty($pcp_table_dataa))){
			
			$fields_attr = Array(	'image', 'title', 'price','add-to-cart','description',
									'stock'
								);
			
			$pcp_data = array(  'table_text'=>'Compare Table',
							
								'fields_attr'=>serialize($fields_attr),'pcp_image_width'=>220,
								
								'pcp_image_height'=>154,
							);
		
			update_option('data_compare_table_product',$pcp_data);
		}
		
		
	}
		
		add_action( 'woocommerce_after_shop_loop_item', 'pcp_shop_display_compare', 11);
		
		add_action( 'wp_ajax_pcp_data_retrive', 'pcp_data_retrive' );

		add_action( 'wp_ajax_nopriv_pcp_data_retrive', 'pcp_data_retrive' );
		
		function pcp_data_retrive(){
						
			global $product;
			
			$pcp_compare_data = get_option('data_compare_product');
			
			$pcp_table_dataa = get_option('data_compare_table_product');
	
			if(!empty($pcp_compare_data) || !empty($pcp_table_dataa)){
				
				extract($pcp_table_dataa);	
						
				extract($pcp_compare_data);	
				
				if(isset($fields_attr) || $fields_attr!=''){
				
					$fields_attr = unserialize($fields_attr);
				
				}
			}
			
			$compare_data = $_SESSION['compare_data'];
			
			if(isset($_POST['prod_id'])){
							
				$product_id=$_POST['prod_id'];
				
				if(!in_array($product_id,$compare_data)){
						
					$compare_data[] = $product_id;
					
					$_SESSION['compare_data'] = $compare_data;
					
				}
				
				
				if(!isset($div_data)){

					$div_data = '';
					
				}
				
				if(empty($div_data)){
					
					$div_data['first_div'] = '';
					
					//remove button row
					$div_data['first_div'] = '<tr class="compare_popup_remove_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
				
						$div_data['first_div'] .= '<td class="remove_popup" style="padding:4px;"><span class="remove_class_page_loader">
												<a class="button remove_product_id" data-value="'.$com_pro_id.'" >Remove</a></span >
											</td>';	
									
					}
				
					$div_data['first_div'] .='</tr>';
					
					//title row
					$div_data['first_div'] .= '<tr class="compare_popup_title_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$related = $all_product->get_related();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('title',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_tit" style="padding:4px;">';
							
								$pr_title= get_the_title($com_pro_id) ;
									
								$div_data['first_div'] .= $pr_title;
									
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';	
					
					//description Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_desc_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('description',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_desc" style="padding:4px;">';
							
								if($description_excerpt_enable == 1){
										
									$pr_desc= $all_product->post->post_content;
									
									preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $pr_desc, $pr_desc_image);
									
									$pr_desc_with_out_image = strip_tags($pr_desc);
									
									if(strlen($pr_desc_with_out_image)> $description_excerpt_count){
										
										$pr_desc_with_out_image = substr($pr_desc_with_out_image, 0, $description_excerpt_count)."...";
										
										$pr_desc = $pr_desc_image[0].$pr_desc_with_out_image;
									
									
									}else{
										
										$pr_desc;
									
									}
										
								}else{
									
									$pr_desc = $all_product->post->post_content;
								
								}
																				
								$div_data['first_div'] .= $pr_desc ;
									
									
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';					
				
					//image Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_image_row compare_popup_data_row" style="height:'.($pcpp_image_height).'px">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
													
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
					
						if($product_image!=''){

							$product_image;
							
						}else{ 
							
							$product_image = plugins_url()."/woocommerce/assets/images/placeholder.png";
						}
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('image',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_image" style="padding:4px;"><img class="woocommerce-placeholder" src="'.$product_image.'" alt="Placeholder" ></td>';
							
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
				
					//price Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_price_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
					
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
					
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('price',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_prc" style="padding:4px;">';
							
								$pr_price= $all_product->price;
								
								if(!empty($pr_price)){
								
									$div_data['first_div'] .= get_woocommerce_currency_symbol();
									$div_data['first_div'] .= $pr_price;
								
								}else{
									$div_data['first_div'] .= "-";
								}
								
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
					
					//stock Row
						
					$div_data['first_div'] .= '<tr class="compare_popup_stock_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('stock',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_avl" style="padding:4px;">';
							
								$pr_stock=$all_product->stock_status;
								
								$div_data['first_div'] .= $pr_stock;
								
								$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
					
					//all attributes row 
					if(isset($dynamic_attributes)&&!empty($dynamic_attributes)){
							
						foreach($dynamic_attributes as $dynamic_attribute => $dynamic_attribute_value){ 
						
						$div_data['first_div'] .= '<tr class="compare_popup_'.$dynamic_attribute.'_row compare_popup_data_row">';
						
							foreach($compare_data as $com_pro_id){
								
								$_pf = new WC_Product_Factory();
								
								$all_product=$_pf->get_product($com_pro_id);
								
								$all_product->get_availability();
								
								$pr_type = $all_product->product_type;
								
								$related = $all_product->get_related();
								
								$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
								
								$product_type = esc_attr( $all_product->product_type );
								
								$attributes = $all_product->get_attributes();
								
								$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
								
								$product_image=$src[0];
								
								if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
									return;
								}

								//$rating_count = $review_count = count( get_product_reviews( $com_pro_id ) );
								//$average      = get_average_rating( $com_pro_id );
								
								$pcp_colors = wc_get_product_terms( $all_product->id, $dynamic_attribute_value );
								$comma_pcp_color = array();
								foreach($pcp_colors as $pcp_color){
									$comma_pcp_color[] = $pcp_color->name;
								}
								$comma_pcp_color = implode(',',$comma_pcp_color);
								
									$div_data['first_div'] .= '<td class="compare_prod_attr compare_prod_'.$dynamic_attribute.'" style="padding:4px;">';
								
									if(isset($comma_pcp_color) && !empty($comma_pcp_color)){
									
										$div_data['first_div'] .= $comma_pcp_color;
										
									}else{
										
										$div_data['first_div'] .= "-";
										
									}
									
								$div_data['first_div'] .= '</td>'; 
																		
							}
					
							$div_data['first_div'] .='</tr>';
						}
					}
					
					//Add to cart row
						
					$div_data['first_div'] .= '<tr class="compare_popup_cart_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
													
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('add-to-cart',$fields_attr)){
							
								$div_data['first_div'].='<td class="popup_add_cart" style="padding:4px;"><a href="'.$all_product->add_to_cart_url().'" data-product_id="'.$com_pro_id.'"  class="button '.$pur.' product_type_'.$product_type.'">'.$all_product->add_to_cart_text().'</a></td>';
							
							}
						}								
					}
				
					$div_data['first_div'] .='</tr>';
				
				}
				else{
					
					//remove button row
					$div_data['first_div'] = '<tr class="compare_popup_remove_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
													
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
				
					$div_data['first_div'] .= '<td class="remove_popup" style="padding:4px;">
												<span class="remove_class_page_loader"><a class="button remove_product_id" data-value="'.$com_pro_id.'" >Remove</a></span >
											</td>';	
									
					}
				
					$div_data['first_div'] .='</tr>';
					
					//title row
					$div_data['first_div'] .= '<tr class="compare_popup_title_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('title',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_tit" style="padding:4px;">';
							
								$pr_title= get_the_title($com_pro_id) ;
										
									$div_data['first_div'] .= $pr_title;
									
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';	
					
					//description Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_desc_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
													
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('description',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_desc" style="padding:4px;">';
							
								if($description_excerpt_enable == 1){
										
										$pr_desc= $all_product->post->post_content;
										
										preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $pr_desc, $pr_desc_image);
										
										$pr_desc_with_out_image = strip_tags($pr_desc);
										
										if(strlen($pr_desc_with_out_image)> $description_excerpt_count){
											
											$pr_desc_with_out_image = substr($pr_desc_with_out_image, 0, $description_excerpt_count)."...";
											$pr_desc = $pr_desc_image[0].$pr_desc_with_out_image;
										}else{
											$pr_desc;
										}
										
									}else{
										$pr_desc = $all_product->post->post_content;
									}
									
									$div_data['first_div'] .= $pr_desc ;
									
									
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';					
				
					//image Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_image_row compare_popup_data_row" style="height:'.($pcpp_image_height).'px"  >';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if($product_image!=''){

							$product_image;
							
						}else{ 
							
							$product_image = plugins_url()."/woocommerce/assets/images/placeholder.png";
						}
							
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('image',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_image" style="padding:4px;"><img class="woocommerce-placeholder" src="'.$product_image.'" alt="Placeholder" ></td>';
							
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
				
					//price Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_price_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
								
							if(in_array('price',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_prc" style="padding:4px;">';
							
								$pr_price= $all_product->price;
								
								if(!empty($pr_price)){
								
									$div_data['first_div'] .= get_woocommerce_currency_symbol();
									$div_data['first_div'] .= $pr_price;
								
								}else{
									$div_data['first_div'] .= "-";
								}
								
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
					
					//stock Row
						
					$div_data['first_div'] .= '<tr class="compare_popup_stock_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
					
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
											
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('stock',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_avl" style="padding:4px;">';
							
								$pr_stock=$all_product->stock_status;
								
								$div_data['first_div'] .= $pr_stock ;
								
								$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
					
					//all attributes row 
					if(isset($dynamic_attributes)&&!empty($dynamic_attributes)){
							
						foreach($dynamic_attributes as $dynamic_attribute => $dynamic_attribute_value){ 
						
						$div_data['first_div'] .= '<tr class="compare_popup_'.$dynamic_attribute.'_row compare_popup_data_row">';
						
							foreach($compare_data as $com_pro_id){
								
								$_pf = new WC_Product_Factory();
								
								$all_product=$_pf->get_product($com_pro_id);
								
								$all_product->get_availability();
								
								$pr_type = $all_product->product_type;
								
								$related = $all_product->get_related();
								
								$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
								
								$product_type = esc_attr( $all_product->product_type );
								
								$attributes = $all_product->get_attributes();
								
								$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
								
								$product_image=$src[0];
								
								if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
									return;
								}

								//$rating_count = $review_count = count( get_product_reviews( $com_pro_id ) );
								//$average      = get_average_rating( $com_pro_id );
								
								$pcp_colors = wc_get_product_terms( $all_product->id, $dynamic_attribute_value );
								$comma_pcp_color = array();
								foreach($pcp_colors as $pcp_color){
									$comma_pcp_color[] = $pcp_color->name;
								}
								$comma_pcp_color = implode(',',$comma_pcp_color);
								
									$div_data['first_div'] .= '<td class="compare_prod_attr compare_prod_'.$dynamic_attribute.'" style="padding:4px;">';
								
									if(isset($comma_pcp_color) && !empty($comma_pcp_color)){
									
										$div_data['first_div'] .= $comma_pcp_color;
										
									}else{
										
										$div_data['first_div'] .= "-";
										
									}
									
								$div_data['first_div'] .= '</td>'; 
																		
							}
					
							$div_data['first_div'] .='</tr>';
						}
					}
					//Add to cart row
						
					$div_data['first_div'] .= '<tr class="compare_popup_cart_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('add-to-cart',$fields_attr)){
							
								$div_data['first_div'].='<td class="popup_add_cart" style="padding:4px;"><a href="'.$all_product->add_to_cart_url().'" data-product_id="'.$com_pro_id.'"  class="button '.$pur.' product_type_'.$product_type.'">'.$all_product->add_to_cart_text().'</a></td>';
							
							}
						}								
					}
				
					$div_data['first_div'] .='</tr>';
				} 
					
				echo json_encode($div_data); 
			}
			die();
		}
				
		
		add_action( 'wp_ajax_pcp_product_id_remove', 'pcp_product_id_remove' );

		add_action( 'wp_ajax_nopriv_pcp_product_id_remove', 'pcp_product_id_remove' );
		
		function pcp_product_id_remove(){
			
			$pcp_compare_data=get_option('data_compare_product');
			
			$pcp_table_dataa = get_option('data_compare_table_product');
			
			if(!empty($pcp_compare_data) || !empty($pcp_table_dataa)){
				
				extract($pcp_table_dataa);	
			
				extract($pcp_compare_data);	
				
				if(isset($fields_attr) || $fields_attr!=''){
				
					$fields_attr=unserialize($fields_attr);
				
				}
			
			}
			
			$remove_pro_id = $_POST['remove_prod_id'];
			
			$compare_data1 = $_SESSION['compare_data'];
			
			if(!empty($remove_pro_id)){
				
			$compare_data = $_SESSION['compare_data'];
			
			foreach ($compare_data as $key => $value){
				
				if ($value == $remove_pro_id) {
				
					unset($compare_data[$key]);
					
					$_SESSION['compare_data'] = $compare_data;
				} 
			}
				
			$compare_data = $_SESSION['compare_data'];
				
			if(!empty($compare_data)){
					
				if(!isset($div_data)){

					$div_data = '';
				
				}
				
				if(empty($div_data)){
					
					$div_data['first_div'] = '';
					
					//remove button row
					$div_data['first_div'] = '<tr class="compare_popup_remove_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
				
						$div_data['first_div'] .= '<td class="remove_popup">
													<a class="button remove_product_id" data-value="'.$com_pro_id.'" >Remove</a>
												</td>';	
										
						}
				
						$div_data['first_div'] .='</tr>';
					
					//title row
					$div_data['first_div'] .= '<tr class="compare_popup_title_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
												
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
												
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('title',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_tit">';
							
								$pr_title= get_the_title($com_pro_id) ;
									
								$div_data['first_div'] .= $pr_title ;//= substr($pr_title, 0, 20)."...";
								
								$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';	
					
					//description Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_desc_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
												
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
					
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('description',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_desc">';
							
								$pr_desc= $all_product->post->post_content;
									
								if($description_excerpt_enable == 1){
									
									$pr_desc= $all_product->post->post_content;
									
									preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $pr_desc, $pr_desc_image);
									
									$pr_desc_with_out_image = strip_tags($pr_desc);
									
									if(strlen($pr_desc_with_out_image)> $description_excerpt_count){
										
										$pr_desc_with_out_image = substr($pr_desc_with_out_image, 0, $description_excerpt_count)."...";
										$pr_desc = $pr_desc_image[0].$pr_desc_with_out_image;
									}else{
										$pr_desc;
									}
									
								}else{
									
									$pr_desc = $all_product->post->post_content;
								}
									
								$div_data['first_div'] .= $pr_desc ;
									
								$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';					
				
					//image Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_image_row compare_popup_data_row" style="height:'.($pcpp_image_height).'px">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
												
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						
						if($product_image!=''){

							$product_image;
							
						}else{ 
							
							$product_image = plugins_url()."/woocommerce/assets/images/placeholder.png";
						}
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('image',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_image"><img class="woocommerce-placeholder" src="'.$product_image.'" alt="Placeholder" ></td>';
							
							}
						}
					}
				
					$div_data['first_div'] .='</tr>';
				
					//price Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_price_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('price',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_prc">';
							
								$pr_price= $all_product->price;
								
								if(!empty($pr_price)){
								
									$div_data['first_div'] .= get_woocommerce_currency_symbol();
									$div_data['first_div'] .= $pr_price;
								
								}else{
									$div_data['first_div'] .= "-";
								}
								
								$div_data['first_div'] .= '</td>'; 
							}
						}
					}
				
					$div_data['first_div'] .='</tr>';
					
					//stock Row
						
					$div_data['first_div'] .= '<tr class="compare_popup_stock_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
								
							if(in_array('stock',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_avl">';
							
								$pr_stock=$all_product->stock_status;
								
								$div_data['first_div'] .= $pr_stock ;
									
								$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
					
					//all attributes row 
					
					if(isset($dynamic_attributes)&&!empty($dynamic_attributes)){
							
						foreach($dynamic_attributes as $dynamic_attribute => $dynamic_attribute_value){ 
						
						$div_data['first_div'] .= '<tr class="compare_popup_'.$dynamic_attribute.'_row compare_popup_data_row">';
						
							foreach($compare_data as $com_pro_id){
								
								$_pf = new WC_Product_Factory();
								
								$all_product=$_pf->get_product($com_pro_id);
								
								$all_product->get_availability();
								
								$pr_type = $all_product->product_type;
								
								$related = $all_product->get_related();
								
								$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
								
								$product_type = esc_attr( $all_product->product_type );
								
								$attributes = $all_product->get_attributes();
								
								$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
								
								$product_image=$src[0];
								
								if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
									return;
								}

								//$rating_count = $review_count = count( get_product_reviews( $com_pro_id ) );
								//$average      = get_average_rating( $com_pro_id );
								
								$pcp_colors = wc_get_product_terms( $all_product->id, $dynamic_attribute_value );
								$comma_pcp_color = array();
								foreach($pcp_colors as $pcp_color){
									$comma_pcp_color[] = $pcp_color->name;
								}
								$comma_pcp_color = implode(',',$comma_pcp_color);
								
									$div_data['first_div'] .= '<td class="compare_prod_attr compare_prod_'.$dynamic_attribute.'" style="padding:4px;">';
								
									if(isset($comma_pcp_color) && !empty($comma_pcp_color)){
									
										$div_data['first_div'] .= $comma_pcp_color;
										
									}else{
										
										$div_data['first_div'] .= "-";
										
									}
									
								$div_data['first_div'] .= '</td>'; 
																		
							}
					
							$div_data['first_div'] .='</tr>';
						}
					}
					
					//Add to cart row
						
					$div_data['first_div'] .= '<tr class="compare_popup_cart_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
					
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
								
							if(in_array('add-to-cart',$fields_attr)){
							
								$div_data['first_div'].='<td class="popup_add_cart"><a href="'.$all_product->add_to_cart_url().'" data-product_id="'.$com_pro_id.'"  class="button '.$pur.' product_type_'.$product_type.'">'.$all_product->add_to_cart_text().'</a></td>';
							
							}
						}								
					}
				
					$div_data['first_div'] .='</tr>';
				
				}
				else{
					
					//remove button row
					$div_data['first_div'] = '<tr class="compare_popup_remove_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						
						$div_data['first_div'] .= '<td class="remove_popup">
														<a class="button remove_product_id" data-value="'.$com_pro_id.'" >Remove</a>
													</td>';	
									
					}
				
					$div_data['first_div'] .='</tr>';
					
					//title row
					$div_data['first_div'] .= '<tr class="compare_popup_title_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('title',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_tit">';
							
								$pr_title= get_the_title($com_pro_id) ;
									
									/* if(strlen($pr_title)>20){ */
										
										$div_data['first_div'] .= $pr_title ;//= substr($pr_title, 0, 20)."...";
									
									/* }else{
										
										$div_data['first_div'] .= $pr_title;
									} */
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';	
					
					//description Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_desc_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('description',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_desc">';
							
								$pr_desc= $all_product->post->post_content;
									
									if($description_excerpt_enable == 1){
										
										$pr_desc= $all_product->post->post_content;
										
										preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $pr_desc, $pr_desc_image);
										
										$pr_desc_with_out_image = strip_tags($pr_desc);
										
										if(strlen($pr_desc_with_out_image)> $description_excerpt_count){
											
											$pr_desc_with_out_image = substr($pr_desc_with_out_image, 0, $description_excerpt_count)."...";
											$pr_desc = $pr_desc_image[0].$pr_desc_with_out_image;
										}else{
											$pr_desc;
										}
										
									}else{
										$pr_desc = $all_product->post->post_content;
									}
									
									$div_data['first_div'] .= $pr_desc ;
									
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';					
				
					//image Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_image_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if($product_image!=''){

							$product_image;
							
						}else{ 
							
							$product_image = plugins_url()."/woocommerce/assets/images/placeholder.png";
						}
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('image',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_image"><img class="woocommerce-placeholder" src="'.$product_image.'" alt="Placeholder" ></td>';
							
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
				
					//price Row
					
					$div_data['first_div'] .= '<tr class="compare_popup_price_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
							
							if(in_array('price',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_prc">';
							
								$pr_price= $all_product->price;
								
								if(!empty($pr_price)){
								
									$div_data['first_div'] .= get_woocommerce_currency_symbol();
									$div_data['first_div'] .= $pr_price;
								
								}else{
									$div_data['first_div'] .= "-";
								}
								
							$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
					
					//stock Row
						
					$div_data['first_div'] .= '<tr class="compare_popup_stock_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$product_type = esc_attr( $all_product->product_type );
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						if(isset($fields_attr) && !empty($fields_attr)){ 
								
							if(in_array('stock',$fields_attr)){
							
								$div_data['first_div'] .= '<td class="compare_prod_avl">';
							
								$pr_stock=$all_product->stock_status;
									
								$div_data['first_div'] .= $pr_stock ;//= substr($pr_stock, 0, 20)."...";
									
								$div_data['first_div'] .= '</td>'; 
							}
						}
															
					}
				
					$div_data['first_div'] .='</tr>';
					
					
					//Add to cart row
						
					$div_data['first_div'] .= '<tr class="compare_popup_cart_row compare_popup_data_row">';
					
					foreach($compare_data as $com_pro_id){
						
						$_pf = new WC_Product_Factory();
						
						$all_product=$_pf->get_product($com_pro_id);
						
						$all_product->get_availability();
						
						$pur = $all_product->is_purchasable() && $all_product->is_in_stock() ? 'add_to_cart_button' : '';
						
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($com_pro_id),'full');
						
						$product_image=$src[0];
						
						
							if(isset($fields_attr) && !empty($fields_attr)){ 
								
								if(in_array('add-to-cart',$fields_attr)){
								
									$div_data['first_div'].='<td class="popup_add_cart"><a href="'.$all_product->add_to_cart_url().'" data-product_id="'.$com_pro_id.'"  class="button '.$pur.' product_type_'.$product_type.'">'.$all_product->add_to_cart_text().'</a></td>';
								
								}
							}								
					}
				
					$div_data['first_div'] .='</tr>';
					} 
					
					echo json_encode($div_data);
				}
				
			}
			
			die();
		}

		if($is_button == 'Button' && $pcpp_button_in_image_ == 1){
			
			add_action( 'woocommerce_before_shop_loop_item_title', create_function('', 'echo "<div class=\"img-wrap\">";'), 5, 2);
		
			add_action( 'woocommerce_before_shop_loop_item_title',create_function('', 'echo "</div>";'), 12, 2);
			
		}
		
		add_action('woocommerce_single_product_summary','pcp_product_display_compare',37);
		
		function pcp_product_display_compare(){
			
			$pcp_compare_data=get_option('data_compare_product');
			
			$pcp_table_dataa = get_option('data_compare_table_product');
	
			if(!empty($pcp_compare_data) || !empty($pcp_table_dataa)){
				
				extract($pcp_table_dataa);	
			
				extract($pcp_compare_data);	
				
				if(isset($fields_attr) || $fields_attr!=''){
					$fields_attr=unserialize($fields_attr);
				}
			}
			if(isset($bt_product_list)&& ($bt_product_list==1)){
			global $product;
			
			if(isset($fields_attr) || $fields_attr!=''){
					$fields_attr;
				}
			if(isset($auto_open)&& ($auto_open==1)){
				wp_enqueue_script("pcp-quick-js", plugin_dir_url(__FILE__)."js/quick_display.js",array('jquery'),'',true);	
			}
			
			if(!isset($_SESSION['compare_data'])){
				$compare_data=array();
				$_SESSION['compare_data']=$compare_data;
			}
			
			$compare_product=$_SESSION['compare_data'];
			
			wp_enqueue_style( 'style_custom_request', plugin_dir_url(__FILE__).'css/custom_css.css' );
			
			if($is_enable==1){
			?>
			<a class="pcpcompare compare_product_popup <?php echo ($is_button=='Button')?'button':'';?>" style="background:<?php if($is_button=='Button'){ if($cmp_bt_clr!=''){echo $cmp_bt_clr;}else{ echo '#ebe9eb';}} ?>; color:<?php echo ($cmp_txt_clr!='')?$cmp_txt_clr:'#515151'?>; " data-value="<?php echo $product->id ;?>" href="javascript:void(0)"><?php if(in_array($product->id,$compare_product)){ echo "Added"; }else{ if(isset($bt_lk_text)){ echo ($bt_lk_text!='')?$bt_lk_text:'compare' ;}}?></a>
			<?php
				}
			}
		}
		
}
else
{ 
	?>
		<div class="error notice is-dismissible " id="message"><p>Please <strong>Activate</strong> WooCommerce Plugin First, to use it.</p><button class="notice-dismiss" type="button"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
	<?php 
}  

?>