<?php

	if(!defined('ABSPATH'))
	{
		die("Can't Access");
	}

  	global $wpdb;

	if (isset($_POST['btnAddNewProduct'])) 
	{
		
        $product_name = sanitize_text_field($_POST['product_name']);

        $table= $wpdb->prefix.'aplbcp_products_list';
		$update=$wpdb->insert($table,
                        array('product_list_name' => $product_name));
        
        $productListId = $wpdb->insert_id;

		
		$productNameArray = array_map('sanitize_text_field',$_POST['product_second_name']);
		$i=0;

		$table= $wpdb->prefix.'aplbcp_products';
		foreach ($productNameArray as $productName) 
		{
			$product_name = sanitize_text_field($productName);
			if($product_name != "")
			{
				$product_name = sanitize_text_field($product_name);
                $product_image = sanitize_text_field($_POST['productImageUrl'][$i]);
				$product_desc = wp_kses_post($_POST['product_desc'][$i]);
				$product_boy_now_link = sanitize_url($_POST['product_boy_now_link'][$i]);
                $product_price = sanitize_text_field($_POST['product_price'][$i]);

				$insert=$wpdb->insert($table, array(
                                                    'product_list_id' => $productListId,
													'product_image' => $product_image,
													'product_name' => $product_name,
													'product_desc' => $product_desc,
													'buy_now_link' => $product_boy_now_link,
													'product_price' => $product_price
												));
			}
			$i++;

		}

	
		if($insert)
		{
			$url='admin.php?page=aplbcp_list_all&success=1';
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
	}
	else
	{
		$url='admin.php?page=aplbcp_list_all&success=0';
		?>
			<script>window.location.href='<?php echo esc_attr($url); ?>'</script>;
		<?php
	}

	
?>