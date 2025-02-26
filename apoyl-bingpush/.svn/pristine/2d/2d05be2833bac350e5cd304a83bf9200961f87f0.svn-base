<?php
/*
 * @link       http://www.girltm.com
 * @since      1.0.0
 * @package    Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/public/partials
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
?>
<script>
    jQuery(document).ready(function() {

        jQuery('.apoyl_bingpush_btn').click(function() {
            var aid=jQuery(this).attr('attraid');
        	jQuery('.apoyl_bingpush_tips').html('<img src="<?php echo  plugin_dir_url(__FILE__).'../img/wpspin.gif';?>" height=15 style="vertical-align:text-bottom;"/>');
        	jQuery.ajax({
  			  type: "POST",
				  url:'<?php echo esc_url($ajaxurl);?>',
    			  data:{
        			  'action':'apoyl_bingpush_ajaxpush',
    			  	  'aid':aid,
    			  	  'subject':'<?php echo get_the_title();?>',
    			  	  'url':'<?php  echo esc_url($url);?>',
    			  	  '_ajax_nonce':'<?php echo $nonce;?>',
    			  },
    			  async: true,
    			  success: function (data) { 
        			  if(data==1){
            			  jQuery('.apoyl_bingpush_tips').replaceWith('<img src="<?php echo  plugin_dir_url(__FILE__).'../img/bing.png';?>" height=20 title="<?php _e('pushsuccess','apoyl-bingpush')?>" style="vertical-align:text-bottom;" />');
        			  }else{
            			  jQuery('.apoyl_bingpush_tips').html('<?php _e('pushfail','apoyl-bingpush')?>');
        			  }
    			  },
    			  error: function(data){
    				  jQuery('.apoyl_bingpush_tips').html('<?php _e('pushfail','apoyl-bingpush')?>');
    			  }
    			  
    			})	
        });
 
    });
</script>