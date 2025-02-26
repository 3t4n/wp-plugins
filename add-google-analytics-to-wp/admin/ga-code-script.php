<?php

function meetanshi_googlecode(){
    global $wpdb;
    global $result;
    $table_name = $wpdb->prefix . "m_analtics" ;
    $result = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = 1", ARRAY_A );	
	$result_check = $wpdb->get_results("SELECT * FROM $table_name" );
    $checkbox_box_check =$row->mit_flag;
	foreach($result_check as $row) {
		$checkbox_box_check =$row->mit_flag;
	}
	if ($checkbox_box_check > 0){
	?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_js($result['g_code']); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_js($result['g_code']); ?>');
    </script>
    <?php
								}
}
add_action('wp_head', 'meetanshi_googlecode');
?>