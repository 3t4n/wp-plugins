<?php
defined( 'ABSPATH' ) or die();
global $wpdb;

$template_post_id = style_1($post_id);
$accbox_content = get_post_meta($template_post_id, 'accbox_metabox_'.$template_post_id, true);
if(is_array($accbox_content)){  
  $acc_cust_css   		= $accbox_content[0]['acc_cust_css']; 
}else{
  $acc_cust_css   		= ""; 
}
?>
	<div class="container mt-5 mb-5">		  		
			<div class="example1">

				<div class="hr-accordion-wrapper">
					<h4 class="acc_title">		  			
	  					<?php if($accbox_content[0]['acc_title'][0] == 1){ echo esc_html(get_the_title()); } ?>	
	  				</h4>
				  <?php 
				  		if (is_array($accbox_content) && count($accbox_content) > 0){
							foreach ($accbox_content as $key => $value) {
								 $acc_title 	= esc_attr($value['mytext']);
								 $myfontawe		= $value['myfontawe'];
				 				 $acc_desc 		= $value['mydesc'];		 				
				 				 $active 		= "active-acc";
								 $openacc		= $value['openacc'];
					?>			
						  <div class="each-acc-row <?php  if($openacc == 1){ echo esc_html($active); } ?>">
							<div class="accordion-title"><i class="<?php echo $myfontawe; ?>"></i>&nbsp;<span class="title"><?php echo esc_attr($acc_title); ?></span></div>
							<div class="accordion-content">
								<p><?php echo do_shortcode($acc_desc); ?></p>
							</div>
						  </div>
					<?php } } ?>
				  <!--Each row end -->
				</div>
				<!-- hr-accordion-wrapper end here-->
			</div>
		</div>
<style type="text/css">
	<?php
		echo $acc_cust_css;
	?>
</style>