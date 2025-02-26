<?php
	
	if(!defined('ABSPATH'))
    {
        die("Can't Access");
    }

  	global $wpdb;

	if (isset($_POST['btnAddNewProduct'])) 
	{
		$product_list_id = sanitize_text_field($_POST['product_list_id']);
        $product_name = sanitize_text_field($_POST['product_name']);

        $table= $wpdb->prefix.'aplbcp_products_list';
		$update=$wpdb->update($table,
                        array('product_list_name' => $product_name)
                        ,array('product_id' => $product_list_id));
		
		
		$productIdArray = array_map('sanitize_text_field',$_POST['product_id']);
		$i=0;
  
		$table= $wpdb->prefix.'aplbcp_products';
		foreach ($productIdArray as $productId) 
		{
			$product_id = sanitize_text_field($productId);
			if($product_id != "")
			{
				$product_name = sanitize_text_field($_POST['product_second_name'][$i]);
                $product_image = sanitize_text_field($_POST['productImageUrl'][$i]);
				$product_desc = wp_kses_post($_POST['product_desc'][$i]);
				$product_boy_now_link = sanitize_url($_POST['product_boy_now_link'][$i]);
				$product_price = sanitize_text_field($_POST['product_price'][$i]);


				$update=$wpdb->update($table, array(
													'product_image' => $product_image,
													'product_name' => $product_name,
													'product_desc' => $product_desc,
													'buy_now_link' => $product_boy_now_link,
													'product_price' => $product_price),
                                                array('id'=>$product_id));
			}
			$i++;

		}

	
			$url='admin.php?page=aplbcp_list_all&updatedsuccess=1';
		?>
			<script>window.location.href='<?php echo esc_attr($url); ?>'</script>;
	<?php
	}
	else
	{
		$url='admin.php?page=aplbcp_list_all&success=0';
	?>
		<script>window.location.href='<?php echo esc_attr($url); ?>'</script>;
	<?php
	}

	
?>