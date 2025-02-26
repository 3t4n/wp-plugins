<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	if ( isset($_POST['action']) ) {
		if ( ! isset( $_POST['p3d_price_requests_edit'] ) || ! wp_verify_nonce( $_POST['p3d_price_requests_edit'], 'update' ) ) {
			print 'Sorry, your nonce did not verify.';
			exit;
		}

		$post_error = false;
		$admin_attachment_file=$admin_attachment_url='';
		$price_request_id = (int)$_GET['price_request'];
		if (isset($_POST['p3dlite_admin_attachment_action'][$price_request_id]) && $_POST['p3dlite_admin_attachment_action'][$price_request_id]=='DELETE') {
	        	$sql = "update ".$wpdb->prefix."p3dlite_price_requests set admin_attachment='', admin_attachment_url='' where id='".(int)$price_request_id."'";			
			$wpdb->query($sql);
			unlink($price_request['admin_attachment']);
			$price_request['admin_attachment']=$price_request['admin_attachment_url']='';
		}

		if (isset($_FILES['p3dlite_admin_attachment']['tmp_name'][$price_request_id]) && strlen($_FILES['p3dlite_admin_attachment']['tmp_name'][$price_request_id])>0) {
			#$uploaded_file = p3d_upload_file('3dp_settings', 'p3d_admin_attachment');
			$uploadedfile = array(
				'name'     => $_FILES['p3dlite_admin_attachment']['name'][$price_request_id],
				'type'     => $_FILES['p3dlite_admin_attachment']['type'][$price_request_id],
				'tmp_name' => $_FILES['p3dlite_admin_attachment']['tmp_name'][$price_request_id],
				'error'    => $_FILES['p3dlite_admin_attachment']['error'][$price_request_id],
				'size'     => $_FILES['p3dlite_admin_attachment']['size'][$price_request_id]
			);
			if (isset($_FILES['p3dlite_admin_attachment']['error'][$price_request_id]) && $_FILES['p3dlite_admin_attachment']['error'][$price_request_id]) {
				echo '<div class="error"><p>Upload error code: '.$_FILES['p3dlite_admin_attachment']['error'][$price_request_id].'</p></div>';
				$post_error = true;

			}
			$upload_overrides = array( 'test_form' => false );
			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
#print_r($movefile);exit;
			if (isset( $movefile['error']) && $movefile['error']) {
				echo '<div class="error"><p>Upload error: '.$movefile['error'].'</p></div>';
				$post_error = true;

			}
			else {
				$admin_attachment_file = $movefile['file'];
				$admin_attachment_url = $movefile['url'];
			}
		}
		else {
			$admin_attachment_file = $price_request['admin_attachment'];
			$admin_attachment_url = $price_request['admin_attachment_url'];
		}
	}
	if ( isset($_POST['action']) && $_POST['action']=='save') {
		if ( ! isset( $_POST['p3d_price_requests_edit'] ) || ! wp_verify_nonce( $_POST['p3d_price_requests_edit'], 'update' ) ) {
			print 'Sorry, your nonce did not verify.';
			exit;
		}
		foreach ( $_POST['p3dlite_buynow'] as $id=>$price ) {
			$product_id = (int)$price_request['product_id'];
			$comments = sanitize_textarea_field($_POST['p3dlite_comments'][$id]);
			$weight = (float)$_POST['p3dlite_weight'][$id];
			$quantity = (int)$_POST['p3dlite_quantity'][$id];
			$length = (float)$_POST['p3dlite_length'][$id];
			$width = (float)$_POST['p3dlite_width'][$id];
			$height = (float)$_POST['p3dlite_height'][$id];
			$price = (float)$price;
			$printer = sanitize_text_field($_POST['p3dlite_printer'][$id]);
			$material = sanitize_text_field($_POST['p3dlite_material'][$id]);
			$infill = (float)$_POST['p3dlite_infill'][$id];
			if (isset($_POST['p3dlite_coating'])) {
				$coating = sanitize_text_field($_POST['p3dlite_coating'][$id]);
			}
			else {
				$coating = '';
			}
			$admin_delivery = sanitize_text_field($_POST['p3dlite_admin_delivery'][$id]);; 

			$update_array = array('admin_comment'=>$comments, 'printer'=>$printer, 'material'=>$material, 'coating'=>$coating, 'infill'=>$infill, 'price'=>$price, 'weight'=>$weight, 'quantity'=>$quantity, 'scale_x'=>$length, 'scale_y'=>$width, 'scale_z'=>$height, 'admin_attachment' => $admin_attachment_file, 'admin_attachment_url' => $admin_attachment_url, 'admin_delivery' => $admin_delivery);

//			if ((float)$price>0) {
//				$update_array['status']=1;
//			}

			$wpdb->update($wpdb->prefix.'p3dlite_price_requests', $update_array, array('id'=>$id));
#var_dump($wpdb->last_error);
#var_dump($wpdb->last_query);
			wp_redirect( admin_url( 'admin.php?page=p3dlite_price_requests&action=edit&price_request='.(int)$_GET['price_request'] ) );
		}

	}
	if ( isset($_POST['action']) && $_POST['action']=='update' && isset( $_POST['p3dlite_buynow'] ) && count( $_POST['p3dlite_buynow'] )>0 ) {
		if ( ! isset( $_POST['p3d_price_requests_edit'] ) || ! wp_verify_nonce( $_POST['p3d_price_requests_edit'], 'update' ) ) {
			print 'Sorry, your nonce did not verify.';
			exit;
		}
		$is_bundle = false;

		$body='';
		foreach ( $_POST['p3dlite_buynow'] as $id=>$price ) {

			$comments = sanitize_textarea_field($_POST['p3dlite_comments'][$id]);
			$weight = (float)$_POST['p3dlite_weight'][$id];
			$quantity = (int)$_POST['p3dlite_quantity'][$id];
			$length = (float)$_POST['p3dlite_length'][$id];
			$width = (float)$_POST['p3dlite_width'][$id];
			$height = (float)$_POST['p3dlite_height'][$id];
			$price = (float)$price;
			$admin_delivery = sanitize_text_field($_POST['p3dlite_admin_delivery'][$id]);; 
			$printer = sanitize_text_field($_POST['p3dlite_printer'][$id]);
			$material = sanitize_text_field($_POST['p3dlite_material'][$id]);
			$infill = (float)$_POST['p3dlite_infill'][$id];
			$infills_array = p3dlite_get_option( 'p3dlite_infills' );
			$infill_id = 0;
			$infill_name = '';
			if (is_array($infills_array) && count($infills_array)) {
				foreach ($infills_array as $inf_id => $inf_value) {
					if ($inf_value['infill']==$infill) {
						$infill_id = $inf_value['id'];
						$infill_name = $inf_value['name'];
					}
				}
			}

			if (isset($_POST['p3dlite_coating'])) {
				$coating = sanitize_text_field($_POST['p3dlite_coating'][$id]);
			}
			else {
				$coating = '';
			}
			$custom_attributes = '';
			$message = '';


			if ( count( $price_request ) ) {
				$email=$price_request['email'];
				if (strlen($email)==0) $email=$price_request['email_address'];
#				$variation=json_decode($price_request['attributes'], true);
				$filename=$price_request['model_file'];
#				$variation['attribute_pa_p3dlite_model']=rawurlencode( $variation['attribute_pa_p3dlite_model'] );

				if ( true ) {
					//echo $product_url;
					$price_request['price']=$price;


					$current_templates = get_option( 'p3dlite_email_templates' );
					$template_body = $current_templates['client_email_body'];
					$template_subject = $current_templates['client_email_subject'];
					$from = $current_templates['client_email_from'];


					$upload_dir = wp_upload_dir();
					$link = esc_url($upload_dir['baseurl'] ."/p3d/".rawurlencode($filename));
					$subject=esc_html__( "Your model's price" , '3dprint-lite' );



					$model_link = "<a href='".esc_url($link)."'>".esc_html($filename)."</a>";


					$dimensions=$price_request['scale_x']." &times; ".$price_request['scale_y']." &times; ".$price_request['scale_z']." ".esc_html__('cm', '3dprint-lite')."<br>";


					$replace_from = array('[quantity]', '[printer_name]', '[material_name]', '[coating_name]', '[infill]', '[infill_name]', '[model_file]', '[dimensions]', '[weight]', '[price]', '[price_total]', '[admin_comments]', '[admin_delivery]');
					$replace_to = array ($quantity, $printer, $material, 
							   $coating, (isset($infill) ? $infill : ''), $infill_name, $link, $dimensions, $weight,
							    p3dlite_format_price($price, $settings['currency'], $settings['currency_position']), p3dlite_format_price($price*$quantity, $settings['currency'], $settings['currency_position']), $comments, $admin_delivery);
					$subject=str_ireplace($replace_from, $replace_to, $template_subject);
					$body=str_ireplace($replace_from, $replace_to, $template_body);


					do_action('p3dlite_send_quote', $message);
					$headers = array();
					$headers[] = "From: $from";
					$headers[] = 'Content-Type: text/html; charset=UTF-8';

					$wpdb->update($wpdb->prefix.'p3dlite_price_requests', array('status'=>1, 'admin_comment'=>$comments, 'price'=>$price, 'printer'=>$printer, 'material'=>$material, 'coating'=>$coating, 'quantity'=>$quantity, 'weight'=>$weight, 'scale_x'=>$length, 'scale_y'=>$width, 'scale_z'=>$height, 'admin_attachment' => $admin_attachment_file, 'admin_attachment_url' => $admin_attachment_url, 'admin_delivery' => $admin_delivery), array('id'=>$id));

				}
#				else {
#					echo '<div class="error"><p>' . esc_html__('Please set the price.' ,'3dprint-lite').'</p></div>';
#				}
				
			}//if ( count( $price_requests ) ) 
		}//foreach ( $_POST['p3dlite_buynow'] as $key=>$price )

/*

*/

		$price_request_id = (int)$_GET['price_request'];

		$attachments = array();
		if (strlen($admin_attachment_file)) { //uploaded
			$attachments[]=$admin_attachment_file;
		}
		else if (isset($price_request['admin_attachment']) && strlen($price_request['admin_attachment'])) {
			$attachments[]=$price_request['admin_attachment'];
		}
#print_r($attachments);exit;

		if (wp_mail( $email, $subject, stripslashes($body), $headers, $attachments )) {
			//p3dlite_update_option( 'p3dlite_price_requests', $price_request );
			wp_redirect( admin_url( 'admin.php?page=p3dlite_price_requests' ) );
		} else {
			$wpdb->update($wpdb->prefix.'p3dlite_price_requests', array('status'=>3), array('id'=>$price_request_id));
			echo '<div class="error"><p>' . esc_html__('Could not email the quote! Check if your wordpress site can send emails and consider installing Easy WP SMTP plugin.' ,'3dprint-lite').'</p></div>';
		}


		$price_request_result = $wpdb->get_results( "select * from {$wpdb->prefix}p3dlite_price_requests where id='$price_request_id'", ARRAY_A );
		$price_request = $price_request_result[0];

		do_action('p3dlite_after_send_quotes');
	}//if ( isset( $_POST['p3dlite_buynow'] ) && count( $_POST['p3dlite_buynow'] )>0 )

#	$price_requests=p3dlite_get_option( 'p3dlite_price_requests' );

//		wp_redirect( admin_url( 'admin.php?page=p3dlite_printers' ) );

#p3dlite_check_install();

#echo 

$currency_rate = 1;
if (isset($price_request['estimated_price_currency']) && strlen($price_request['estimated_price_currency'])) {
	$currency_rate = p3dlite_get_currency_rate($price_request['estimated_price_currency']);
}

$price_requests = array();
$price_requests[]=$price_request;




?>
<script language="javascript">
function p3litedRemoveAttachment(obj) {
	jQuery(obj).hide();

	jQuery('#p3dlite-cross').hide();
	jQuery('#p3dlite-admin-attachment').hide();
	jQuery('#p3dlite_admin_attachment_action').val('DELETE');
}
</script>
	<form method="post" action="admin.php?page=p3dlite_price_requests&action=edit&price_request=<?php echo (int)$_GET['price_request']?>" enctype="multipart/form-data">
				<input id="p3dlite_action" type="hidden" name="action" value="update" />
				<?php    wp_nonce_field( 'update', 'p3d_price_requests_edit' ); ?>
				<input type="hidden" id="p3dlite_currency_rate" value="<?php echo esc_attr($currency_rate);?>">
				<br style="clear:both">
				<button class="button-secondary" type="button" onclick="location.href='<?php echo esc_url(admin_url( 'admin.php?page=p3dlite_price_requests' ));?>'"><b>&#8592;<?php esc_html_e('Back to price requests', '3dprint-lite');?></b></button>
<?php
foreach ($price_requests as $price_request) {
	#$attributes=json_decode($price_request['attributes'], true);
	$file_url = $original_file_url = '';

	$upload_dir = wp_upload_dir();
	$filepath = $upload_dir['basedir']."/p3d/".$price_request['model_file'];
#	$original_file = p3dlite_get_original($price_request['model_file']);
	$original_file = $price_request['model_file'];
	$link = esc_url($upload_dir['baseurl'] ."/p3d/". rawurlencode($price_request['model_file'])) ;
#	$file_url = "<a href='".$link."'>".esc_html(p3dlite_basename( $price_request['model_file'] ))."</a>";

?>
				<hr>
				<h3><?php echo '#'.esc_html((int)$price_request['id']);?></h3>
				<div>
				<table id="price_request-<?php echo esc_attr((int)$price_request['id']);?>" data-id="<?php echo esc_attr((int)$price_request['id']);?>" class="form-table price_request">
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Status', '3dprint-lite' );?></th>
						<td>
							<?php 
							$request_status = $price_request['status'];

							switch ($request_status) {
								case "0":
									echo '<span class="p3dlite-request-received">'.esc_html__('Request received', '3dprint-lite').'</span>';
								break;
								case "1":
									echo '<span class="p3dlite-quote-sent">'.esc_html__('Quote sent', '3dprint-lite').'</span>';
								break;
								case "2":
									echo '<span class="p3dlite-order-placed">'.esc_html__('Order placed', '3dprint-lite').'</span>';
								break;
								case "3":
									echo '<span class="p3dlite-failed-email">'.esc_html__('Failed to send out e-mail', '3dprint-lite').'</span>';
								break;
							}
							?>
						</td>
					</tr>
					<?php if ($price_request['buynow_link']) { ?>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Buy Now URL', '3dprint-lite' );?></th>
						<td>
							<a href="<?php echo esc_url($price_request['buynow_link']);?>">Link</a>
						</td>
					</tr>
					<?php } ?>
					<?php if ($price_request['thumbnail_url']) { ?>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Thumbnail', '3dprint-lite' );?></th>
						<td>
							<a href="<?php echo esc_url($price_request['thumbnail_url']);?>"><img class="p3dlite-thumb" src="<?php echo esc_url($price_request['thumbnail_url']);?>"></a>
						</td>
					</tr>
					<?php } ?>

				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Model File', '3dprint-lite' );?></th>
						<td>
							<?php echo "<a href='".esc_url($link)."'>".esc_html(p3dlite_basename( $price_request['model_file'] ))."</a>";?>
						</td>
					</tr>


				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Quantity', '3dprint-lite' );?></th>
						<td>
							<?php #echo $price_request['quantity'];?>
							<input type="number" step="1" min="0" name="p3dlite_quantity[<?php echo (int)$price_request['id'];?>]" value="<?php echo (int)$price_request['quantity'];?>">
						</td>
					</tr>



				 	<tr valign="top">
						<th scope="row"><?php _e( 'Printer', '3dprint-lite' );?></th>
						<td>
							<input type="text" name="p3dlite_printer[<?php echo (int)$price_request['id'];?>]" value="<?php echo esc_attr($price_request['printer']);?>">
						</td>
					</tr>
				 	<tr valign="top">
						<th scope="row"><?php _e( 'Material', '3dprint-lite' );?></th>
						<td>
							<input type="text" name="p3dlite_material[<?php echo (int)$price_request['id'];?>]" value="<?php echo esc_attr($price_request['material']);?>">
						</td>
					</tr>
					<?php if ($price_request['coating']) { ?>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Coating', '3dprint-lite' );?></th>
						<td>
							<input type="text" name="p3dlite_coating[<?php echo (int)$price_request['id'];?>]" value="<?php echo esc_attr($price_request['coating']);?>">
						</td>
					</tr>
					<?php } ?>
					<?php if ($price_request['infill']) { ?>
				 	<tr valign="top">
						<th scope="row"><?php _e( 'Infill', '3dprint-lite' );?></th>
						<td>
							<?php #echo $price_request['infill'];?> 
							<input class="p3dlite-infill" type="number" step="any" min="0" max="100" name="p3dlite_infill[<?php echo (int)$price_request['id'];?>]" value="<?php echo (float)$price_request['infill'];?>">%
						</td>
					</tr>
					<?php } ?>

				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Model Length', '3dprint-lite' );?></th>
						<td>
							<input type="number" step="any" min="0" name="p3dlite_length[<?php echo (int)$price_request['id'];?>]" value="<?php echo (float)$price_request['scale_x'];?>"><?php esc_html_e('cm', '3dprint-lite'); ?>
						</td>
					</tr>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Model Width', '3dprint-lite' );?></th>
						<td>
							<input type="number" step="any" min="0" name="p3dlite_width[<?php echo (int)$price_request['id'];?>]" value="<?php echo (float)$price_request['scale_y'];?>"><?php esc_html_e('cm', '3dprint-lite'); ?>
						</td>
					</tr>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Model Height', '3dprint-lite' );?></th>
						<td>
							<input type="number" step="any" min="0" name="p3dlite_height[<?php echo (int)$price_request['id'];?>]" value="<?php echo (float)$price_request['scale_z'];?>"><?php esc_html_e('cm', '3dprint-lite'); ?>
						</td>
					</tr>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Dimensions', '3dprint-lite' );?></th>
						<td>
							<?php echo (float)$price_request['scale_x']." &times; ".(float)$price_request['scale_y']." &times; ".(float)$price_request['scale_z']." ".esc_html__('cm', '3dprint-lite');?> 
						</td>
					</tr>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Resize Scale', '3dprint-lite' );?></th>
						<td>
							<?php echo (float)$price_request['scale'];?> 
						</td>
					</tr>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Unit', '3dprint-lite' );?></th>
						<td>
							<?php echo esc_html($price_request['unit']);?> 
						</td>
					</tr>
				 	<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Weight', '3dprint-lite' );?></th>
						<td>
							<input type="number" step="any" min="0" name="p3dlite_weight[<?php echo (int)$price_request['id'];?>]" value="<?php echo (float)$price_request['weight'];?>"><?php esc_html_e('g', '3dprint-lite'); ?>
						</td>
					</tr>



					<tr valign="top">
						<th scope="row">
							<?php esc_html_e( 'Customer E-mail', '3dprint-lite' ); ?>
						</th>
						<td>
							<?php echo esc_html($price_request['email']);?>
						</td>
					</tr>


					<tr valign="top">
						<th scope="row">
							<?php esc_html_e( 'Customer Notes', '3dprint-lite' ); ?>
						</th>
						<td>
							<?php echo esc_html($price_request['request_comment']);?>
						</td>
					</tr>

					<tr valign="top">
						<th scope="row">
							<?php esc_html_e( 'Admin Notes', '3dprint-lite' ); ?>
						</th>
						<td>
							<textarea style="resize: both;" name="p3dlite_comments[<?php echo (int)$price_request['id'];?>]"><?php echo esc_html($price_request['admin_comment']);?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php _e( 'Admin Attachment', '3dprint-lite' ); ?>
						</th>
						<td>
							<input type="hidden" name="p3dlite_admin_attachment_action[<?php echo (int)$price_request['id'];?>]" id="p3dlite_admin_attachment_action" value=""> 
							<input type="file" name="p3dlite_admin_attachment[<?php echo (int)$price_request['id'];?>]" accept="image/*,video/*,application/pdf,application/zip"> 
							
							<span id="p3dlite-admin-attachment">

							<?php 
							if (isset($price_request['admin_attachment']) && strlen($price_request['admin_attachment'])) {
?>
							<a id="p3dlite-cross" title="<?php esc_attr_e('Remove', '3dprint-lite');?>" href="javascript:p3dliteRemoveAttachment(this);" class="p3dlite-cross">X</a>
<?php
								echo '<a href="'.esc_url($price_request['admin_attachment_url']).'" target="_blank">'.basename ($price_request['admin_attachment']).'</a>'; 
							}
							elseif (isset($admin_attachment_file) && strlen($admin_attachment_file)) {
?>
							<a id="p3dlite-cross" title="<?php esc_attr_e('Remove', '3dprint-lite');?>" href="javascript:p3dliteRemoveAttachment(this);" class="p3dlite-cross">X</a>
<?php

								echo '<a href="'.esc_url($admin_attachment_url).'" target="_blank">'.basename ($admin_attachment_file).'</a>';
							}
							?> 
							</span>
							<br>
							<?php _e( 'Accepts: image, video, PDF, ZIP', '3dprint-lite' ); ?><br>
							<?php
							$max_upload_size = wp_max_upload_size();
							if ( ! $max_upload_size ) {
								$max_upload_size = 0;
							}
							?>

							<p class="max-upload-size">
							<?php
								printf(
									__( 'Maximum upload file size: %s.', '3dprint-lite' ),
									esc_html( size_format( $max_upload_size ) )
								);
							?>
							</p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php _e( 'Estimated Delivery Date', '3dprint-lite' ); ?>
						</th>
						<td>

							<input name="p3dlite_admin_delivery[<?php echo (int)$price_request['id'];?>]" type="text" value="<?php echo esc_html($price_request['admin_delivery']);?>">
						</td>
					</tr>


					<tr valign="top">
						<th scope="row">
							<?php esc_html_e( 'Estimated Unit Price', '3dprint-lite' ); ?>
						</th>
						<td>
							<?php echo esc_html(p3dlite_format_price($price_request['estimated_price'], $settings['currency'], $settings['currency_position']));?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php esc_html_e( 'Estimated Total Price', '3dprint-lite' ); ?>
						</th>
						<td>
							<?php echo esc_html(p3dlite_format_price ($price_request['estimated_price'] * $price_request['quantity'], $settings['currency'], $settings['currency_position']));?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php esc_html_e( 'Set Unit Price', '3dprint-lite' ); ?>
						</th>
						<td>

							<input class="p3dlite-price" type="number" step="0.01" name="p3dlite_buynow[<?php echo (int)$price_request['id'];?>]" value="<?php echo (float)$price_request['price'];?>"><?php echo esc_html($settings['currency']);?>
						</td>
					</tr>
				</table>
				</div>

				<br style="clear:both">

<?php

				$db_printers=p3dlite_get_option( 'p3dlite_printers' );
				$db_infills=p3dlite_get_option( 'p3dlite_infills' );
				$db_materials=p3dlite_get_option( 'p3dlite_materials' );

				uasort($db_printers, function($a, $b) {
					return strcmp($a['name'], $b['name']);
				});
?>
				<div class="p3dlite-reslice">
					<button disabled type="button" onclick="jQuery(this).closest('.p3dlite-reslice').find('.p3dlite-reslice-options').slideToggle();"><?php esc_html_e('Re-Slice Options', '3dprint-lite');?></button>
					<br style="clear:both">
					<div class="p3dlite-reslice-options" style="display:none;padding-top:20px;">
						<input type="hidden" class="p3dlite-unit" value="<?php echo esc_attr($price_request['unit']); ?>">
						<input type="hidden" class="p3dlite-resize-scale" value="<?php echo esc_attr($price_request['scale']); ?>">
						<input type="hidden" class="p3dlite-product-id" value="<?php echo (int)$price_request['product_id']; ?>">
						<input type="hidden" class="p3dlite-request-id" value="<?php echo (int)$price_request['id']; ?>">
						<b><?php esc_html_e('Printer', '3dprint-lite');?>:</b><br>
						<select class="p3dlite-reslice-printer">
						<?php 
							$default_infill = false;
							foreach ($db_printers as $printer) {
								if (!$default_infill) $default_infill = $printer['default_infill'];
								echo '<option data-type="'.esc_attr($printer['type']).'" value="'.(int)$printer['id'].'">#'.(int)$printer['id'].' '.esc_html($printer['name']).'</option>';
							}
						?>
						</select>
						<br>
						<b><?php esc_html_e('Infill', '3dprint-lite');?>:</b><br>
						<select class="p3dlite-reslice-infill">
						<?php 
							foreach ($db_infills as $infill) {
								if ($infill['infill']==$default_infill) $selected = 'selected'; else $selected = '';
								echo '<option '.esc_html($selected).' value="'.esc_attr((int)$infill['infill']).'">'.esc_html($infill['name']).'</option>';
							}
						?>
						</select>
						<br>
						<b><?php esc_html_e('Material', '3dprint-lite');?>:</b><br>

						<select class="p3dlite-reslice-material">
						<?php 
							foreach ($db_materials as $material) {
								if ($material['id']==$price_request['material_id']) $selected = 'selected';
								else $selected = '';
								echo '<option '.esc_html($selected).' data-type="'.esc_attr($material['type']).'" value="'.esc_attr((int)$material['id']).'">#'.esc_html((int)$material['id']).' '.esc_html($material['name']).'</option>';
							}
						?>
						</select>

					<!-- todo  Slicer option?  -->
					<p class="submit">
						<button type="button" class="button-secondary" onclick="p3dAnalyseModel('<?php echo esc_html(basename($filepath)); ?>', this);"><?php esc_html_e('Re-Slice', '3dprint-lite');?></button>&nbsp;
						<span style="display:none;" class="p3dlite-analyse-status"><?php esc_html_e('Analysing', '3dprint-lite');?></span>&nbsp;<span class="p3dlite-analyse-percent"></span>
					</p>
					<p>
						<span class="p3dlite-console"></span>
					</p>
					</div>

				</div>
<?php
} //foreach $price_requests
?>

							<div id="p3dlite-price-request-totals">
							<?php

								$estimated_total = 0;
								$set_total = 0;
								foreach ($price_requests as $price_request) {
									$currency_rate = 1;
									if (isset($price_request['estimated_price_currency']) && strlen($price_request['estimated_price_currency'])) {
										$currency_rate = p3dlite_get_currency_rate($price_request['estimated_price_currency']);
									}

									$estimated_total+=$price_request['estimated_price'] * $price_request['quantity'] * $currency_rate;
									$set_total+=$price_request['price'] * $price_request['quantity'] * $currency_rate;
								}

								$estimated_total_html = p3dlite_format_price($estimated_total, $settings['currency'], $settings['currency_position']);
								$set_total_html = p3dlite_format_price($set_total, $settings['currency'], $settings['currency_position']);

								echo "<p class=\"p3dlite-totals\">".esc_html__('Estimated Price Total', '3dprint-lite').": ".esc_html($estimated_total_html)." </b>";
								echo "<p class=\"p3dlite-totals\">".esc_html__('Set Price Total' ,'3dprint-lite').": ".esc_html($set_total_html)." </b>";
							?>
							</div>

				<p class="submit">
					<input type="submit" class="button-secondary" onclick="document.getElementById('p3dlite_action').value='save'" value="<?php esc_html_e( 'Save', '3dprint-lite' ) ?>" />&nbsp;
					<input type="submit" class="button-primary" value="<?php esc_html_e( 'Save & Notify Customer', '3dprint-lite' ) ?>" />
				</p>
	</form>