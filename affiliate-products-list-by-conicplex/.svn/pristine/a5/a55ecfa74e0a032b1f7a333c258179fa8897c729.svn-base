<?php
	
    if(!defined('ABSPATH'))
    {
        die("Can't Access");
    }

  	global $wpdb;

	if (isset($_GET['product_id'])) 
	{
		$product_id = sanitize_text_field($_GET['product_id']);

        $table= $wpdb->prefix.'aplbcp_products_list';
		$delete=$wpdb->delete($table,
                        array('product_id' => $product_id));

        $table= $wpdb->prefix.'aplbcp_products';
        $delete=$wpdb->delete($table,
                        array('product_list_id' => $product_id));

        $url='admin.php?page=aplbcp_list_all&deletesuccess=1';
        ?>
        <script>window.location.href='<?php echo esc_attr($url); ?>'</script>;
        <?php
        exit();
	}
	else
	{
        $url='admin.php?page=aplbcp_list_all&success=0';
        ?>
        <script>window.location.href='<?php echo esc_attr($url); ?>'</script>;
        <?php
        exit();
	}

	
?>