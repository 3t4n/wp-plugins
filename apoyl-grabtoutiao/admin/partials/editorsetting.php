<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_GRABTOUTIAO
 * @subpackage APOYL_GRABTOUTIAO/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$ajaxurl = admin_url('admin-ajax.php');
$file = apoyl_grabtoutiao_file('grabpic');

?>
<form
	action="<?php echo esc_url(admin_url('admin-ajax.php?page=apoyl-grabtoutiao-settings'));?>"
	name="apoyl-grabtoutiao-form" method="post">
	<input type="text" class="regular-text" value=""
		id="apoyl-grabtoutiao-toutiaourl" name="apoyl-grabtoutiao-toutiaourl">
        <?php
        wp_nonce_field("apoyl-grabtoutiao-settings");
        ?>
        <span id="apoyl-grabtoutiao-tips"></span> <input type="button"
		name="apoyl-grabtoutiao-grabbutton" id="apoyl-grabtoutiao-grabbutton"
		class="button button-primary"
		value="<?php esc_html_e('apoyl-grabtoutiao-grabbutton','apoyl-grabtoutiao')?>">
				<input type="button"
		name="apoyl-grabtoutiao-picgrabbutton" id="apoyl-grabtoutiao-picgrabbutton"
		class="button button-primary"
		value="<?php _e('apoyl-grabtoutiao-picgrabbutton','apoyl-grabtoutiao')?>">
		
		
</form>
<script>
    jQuery(document).ready(function() {
        <?php if($file){ 
            
            include $file;
        }else{ ?>
    	jQuery('#apoyl-grabtoutiao-picgrabbutton').click(
     			 function() {
          	alert('<?php _e('alertcalldev_desc','apoyl-grabtoutiao')?>');
      	});
    	  <?php } ?>  	
        jQuery('#apoyl-grabtoutiao-grabbutton').click(function() {
            if(jQuery('.block-editor-default-block-appender__content').length >0)
      	  		jQuery('.block-editor-default-block-appender__content').focus();
            var toutiaourl=jQuery('#apoyl-grabtoutiao-toutiaourl').val();
           
        	jQuery('#apoyl-grabtoutiao-tips').html('<img src="<?php echo esc_url(APOYL_GRABTOUTIAO_URL.'/admin/img/loading.gif');?>" height=15 style="vertical-align:text-bottom;"/>');
        	jQuery.ajax({
  			  type: "POST",
				  url:'<?php echo esc_url($ajaxurl);?>',
    			  data:{
        			  'action':'apoyl_grabtoutiao_ajax',
    			  	  'toutiaourl':toutiaourl,
    			  },
    			  async: true,
    			  success: function (data) { 
    				  var obj=JSON.parse(data);
      		
        			  if(data!=0){
        				  jQuery('#apoyl-grabtoutiao-tips').html('<font color="green"><?php esc_html_e('success','apoyl-grabtoutiao')?></font>');
						  if(jQuery('.wp-block-post-title'))
        				  	jQuery('.wp-block-post-title').html(obj.post_title);
        				  if(jQuery('#title').length >0){
            				 if(jQuery( '#title-prompt-text' ).length >0)
        					 		jQuery('#title-prompt-text' ).html('');
        				  	jQuery('#title').val(obj.post_title);
        				  }
        				
        				  if(jQuery('.block-editor-rich-text__editable').length >0)
        				  	jQuery('.block-editor-rich-text__editable').first().html(obj.content);
        				
        				  if(tinymce.get('content')!=null){
        					  tinymce.get('content').setContent(obj.content);
        				  }
        			  }else{
            			  jQuery('#apoyl-grabtoutiao-tips').html('<font color="red"><?php esc_html_e('fail','apoyl-grabtoutiao')?></font>');
        			  }
    			  },
    			  error: function(data){
    				  jQuery('#apoyl-grabtoutiao-tips').html('<font color="red"><?php esc_html_e('fail','apoyl-grabtoutiaoh')?></font>');
    			  }
    			  
    			})	
        });
 
    });
</script>