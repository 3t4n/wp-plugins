<?php
defined( 'ABSPATH' ) or die();
global $wpdb;

$template_post_id = style_3($post_id);
$accbox_content = get_post_meta($template_post_id, 'accbox_metabox_'.$template_post_id, true);
$template_post_id;
if(is_array($accbox_content)){  
  $acc_cust_css       = $accbox_content[0]['acc_cust_css'];  
}else{
  $acc_cust_css       = ""; 
}
?>
	<div class="container">
		 <div class="col-md-12">
		  <h3 class="acc_title"><?php if($accbox_content[0]['acc_title'][0] == 1){ echo esc_html(get_the_title()); } ?>	
			  </h3>
		</div>	
    	 <div class="faq">
      		<?php
      			if (is_array($accbox_content) && count($accbox_content) > 0){				
    				foreach ($accbox_content as $key => $value) {
    					 $acc_title 	= esc_attr($value['mytext']);
                         $myfontawe     = $value['myfontawe'];
    	 				 $acc_desc 		= $value['mydesc'];				 				 
    	 				 $active 		= "jquery-accordion-active";
    	 				 $style 		= "display:block";
                         $openacc		= $value['openacc'];
    	 		?>		 
    	        <div class="faqitem <?php if($openacc == 1){ echo esc_html($active); } ?>">
    	            <div class="header">
    	                <h6 class=""><i class="<?php echo $myfontawe; ?>"></i>&nbsp;<?php echo esc_html($acc_title); ?></h6>
    	                <i class="fa fa-plus"></i>
    	                <i class="fa fa-minus"></i>
    	            </div>
    	            <div class="content" style="<?php if($openacc == 1){ echo esc_html($style); } ?>"><?php echo do_shortcode($acc_desc); ?></div>
    	        </div>
    	    <?php } } ?>
        </div>
      </div>  

<style type="text/css">
    .faq {
        width: 100%;
        border: 1px solid #222;
    }

    .faqitem .header {
        padding: 15px;
        background: #C0392B;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .faqitem .header h4 {
        margin: 0;
        color: #fff;
    }

    .faqitem .header .fa.fa-minus {
        display: none;
    }

    .faqitem.jquery-accordion-active .fa.fa-minus {
        display: block;
    }

    .faqitem.jquery-accordion-active .fa.fa-plus {
        display: none;
    }

    .faqitem .content {
        padding: 15px;
        display: none;
    }
    <?php
        echo $acc_cust_css;
    ?>
</style>