<?php 

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

if ( ! empty( $_POST ) && check_admin_referer( 'phoen_compare_table_my_action', 'phoen_compare_table_my_fields' ) ) {
	
	if(isset($_POST['pcp_table_setting']) &&  $_POST['pcp_table_setting'] == 'Save Changes'){

		$table_text= sanitize_text_field( $_POST['pcp_table_text'] );
		
		$pcp_woocompare_fields_attrs = isset( $_POST['pcp_woocompare_fields_attrs'] ) ? (array) $_POST['pcp_woocompare_fields_attrs'] : array();

		$fields_attr = array_map( 'esc_attr', $pcp_woocompare_fields_attrs );
		
		$pcp_image_width= sanitize_text_field( $_POST['pcp_image_width'] );
		
		$pcp_image_height= sanitize_text_field( $_POST['pcp_image_height'] );
		
		$dynamic_attributes = isset( $_POST['pcpp_woocompare_fields_attributes'] ) ? (array) $_POST['pcpp_woocompare_fields_attributes'] : array();

		$dynamic_attributes = array_map( 'esc_attr', $dynamic_attributes );
		
		$pcp_table_data = array('table_text'=>$table_text,
								
								'fields_attr'=>serialize($fields_attr),'dynamic_attributes'=>$dynamic_attributes, 
								
								'pcp_image_width'=>$pcp_image_width,'pcp_image_height'=>$pcp_image_height,);
		
		update_option('data_compare_table_product',$pcp_table_data);
	} 
	
}
	$pcp_table_dataa = get_option('data_compare_table_product');
	
	if(!empty($pcp_table_dataa)){
	
		extract($pcp_table_dataa);

		$fields_attr=unserialize($fields_attr);
	
	}
	//print_r($fields_attr);
	
	// all attributes:	
	$attribute_taxonomies = wc_get_attribute_taxonomies();
	
	$taxonomy_terms = array();

	if ( $attribute_taxonomies ) :
		foreach ($attribute_taxonomies as $tax) :
		if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
			$taxonomy_terms[$tax->attribute_name] = get_terms( wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0' );
		endif;
	endforeach;
	endif;

	$all_terms = array_keys($taxonomy_terms);
		



?>
<style>
				.form-table th {
					width: 270px;
					padding: 25px;
				}
				.form-table td {
					
					padding: 20px 10px;
				}
				.form-table {
					background-color: #fff;
				}
				

				.px-multiply{ color:#ccc; vertical-align:bottom;}

				.long{ display:inline-block; vertical-align:middle; }

				.wid{ display:inline-block; vertical-align:middle;}

				.up{ display:block;}

				.grey{ color:#b0adad;}
#pho_wcpc_box.postbox h3{ padding:0 0 0 10px;}
	</style>
<form method="post" id="pcp_table_form">
<?php wp_nonce_field( 'phoen_compare_table_my_action', 'phoen_compare_table_my_fields' ); ?>
<h3>Compare Table Settings</h3>
	<div class="meta-box-sortables" id="normal-sortables">
				<div class="postbox " id="pho_wcpc_box">
					<h3><span class="upgrade-setting">Upgrade to the PREMIUM VERSION</span></h3>
					<div class="inside">
						<div class="pho_check_pin">

							<div class="column two">
								<!----<h2>Get access to Pro Features</h2>----->

								<p>Switch to the premium version </p>

								<div class="pho-upgrade-btn">
										<a target="_blank" href="http://www.phoeniixx.com/product/advance-compare-products-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
	
	<table class="form-table">
			<tbody>
				<tr valign="top">
					<th class="titledesc" scope="row">
						<label for="pcp_woocompare_table_text">Table title</label>
					</th>
					<td class="forminp forminp-text">
						<input type="text"  value="<?php echo esc_attr($table_text!='')? $table_text: "Compare Table" ;?>" style="" id="pcp_woocompare_table_text" name="pcp_table_text"> <span class="description">Type the text to use for table title.</span>
					</td>
				</tr>
				<tr valign="top">
					<th class="titledesc" scope="row">
						<label for="pcp_woocompare_fields_attrs">Fields to show</label>
					</th>

					<td class="forminp attributes">
						<p class="description">Select the fields to show in comparison table </p>
						<ul class="fields ui-sortable">
							<li class="ui-sortable-handle">
								<label>
									<input type="checkbox" <?php if(isset($fields_attr)){ if(in_array('image',$fields_attr)){echo "checked";}}?> value="image" id="pcp_woocompare_fields_attrs_image" name="pcp_woocompare_fields_attrs[]"> Image
								</label>
							</li>
							<li class="ui-sortable-handle">
								<label>
									<input type="checkbox" <?php if(isset($fields_attr)){ if(in_array('title',$fields_attr)){echo "checked";} }?>  value="title" id="pcp_woocompare_fields_attrs_title" name="pcp_woocompare_fields_attrs[]"> Title								
								</label>
							</li>
							<li class="ui-sortable-handle">
								<label>
									<input type="checkbox" <?php if(isset($fields_attr)){ if(in_array('description',$fields_attr)){echo "checked";} }?>  value="description" id="pcp_woocompare_fields_attrs_description" name="pcp_woocompare_fields_attrs[]"> Description
								</label>
							</li>
							<li class="ui-sortable-handle">
								<label>
									<input type="checkbox" <?php if(isset($fields_attr)){ if(in_array('price',$fields_attr)){echo "checked";} }?>  value="price" id="pcp_woocompare_fields_attrs_price" name="pcp_woocompare_fields_attrs[]"> Price								
								</label>
							</li>
							
							<li class="ui-sortable-handle">
								<label>
									<input type="checkbox" <?php if(isset($fields_attr)){ if(in_array('stock',$fields_attr)){ echo "checked";} }?> value="stock" id="pcp_woocompare_fields_attrs_stock" name="pcp_woocompare_fields_attrs[]"> Availability
								</label>
							</li>
							<li class="ui-sortable-handle">
								<label>
									<input type="checkbox" <?php if(isset($fields_attr)){ if(in_array('add-to-cart',$fields_attr)){echo "checked";}} ?>  value="add-to-cart" id="pcp_woocompare_fields_attrs_add-to-cart" name="pcp_woocompare_fields_attrs[]"> Add to cart
								</label>
							</li>
							
							<?php foreach($all_terms as $attribute_name){?>
							<li class="ui-sortable-handle">
								<label>
									<input type="checkbox" <?php if(isset($dynamic_attributes)) { echo (in_array("pa_".$attribute_name,$dynamic_attributes))?"checked":'' ;} ?>  value="pa_<?php echo esc_attr($attribute_name);?>" id="pcpp_woocompare_fields_attributes['<?php echo esc_attr($attribute_name);?>']" name="pcpp_woocompare_fields_attributes[<?php echo esc_attr($attribute_name);?>]"> <?php echo ucfirst(esc_attr($attribute_name));?>
								</label>
							</li> 
							<?php }?>
						</ul>
						
					</td>
				</tr>
				<tr valign="top">
					<th class="titledesc" scope="row">Image size</th>
					<td class="forminp image_width_settings">
						<input type="number" min="0" size="4" value="<?php echo esc_attr($pcp_image_width!='' && $pcp_image_width>0)?$pcp_image_width:220?>" id="pcp_image_width" name="pcp_image_width"> X
						<input type="number" min="0" size="4" value="<?php echo esc_attr($pcp_image_height!='' && $pcp_image_height>0)?$pcp_image_height:154?>" id="pcp_image_height" name="pcp_image_height">px
	
						<p class="description">Set the size for the images</p>

					</td>
				</tr>
			</tbody>
		</table>  
	<br />
	<input type="submit" value="Save Changes" class="button-primary" name="pcp_table_setting"  style="float: left; margin-right: 10px;">
</form>