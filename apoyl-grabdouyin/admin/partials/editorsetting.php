<?php
/*
 * @link   
 * @since 1.0.0
 * @package APOYL_GRABDOUYIN
 * @subpackage APOYL_GRABDOUYIN/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$ajaxurl = admin_url('admin-ajax.php');

?>
<form
	action="<?php echo esc_url(admin_url('admin-ajax.php?page=apoyl-grabdouyin-settings'));?>"
	name="apoyl-grabdouyin-form" method="post">
	<input type="text" class="regular-text" value=""
		id="apoyl-grabdouyin-url" name="apoyl-grabdouyin-url">
        <?php
       wp_nonce_field("apoyl-grabdouyin-settings",'apoyl_grabdouyin_wpnonce');
        ?>
        <span id="apoyl-grabdouyin-tips"></span> <input type="button"
		name="apoyl-grabdouyin-button" id="apoyl-grabdouyin-button"
		class="button button-primary"
		value="<?php esc_html_e('apoyl-grabdouyin-button','apoyl-grabdouyin')?>">

</form>
<script>
    jQuery(document).ready(function() {
	
        jQuery('#apoyl-grabdouyin-button').click(function() {
            if(jQuery('.block-editor-default-block-appender__content').length >0)
      	  		jQuery('.block-editor-default-block-appender__content').focus();
            var apoyl_grabdouyin_url=jQuery('#apoyl-grabdouyin-url').val();
           
        	jQuery('#apoyl-grabdouyin-tips').html('<img src="<?php echo esc_url(APOYL_GRABDOUYIN_URL.'/admin/img/loading.gif');?>" height=15 style="vertical-align:text-bottom;"/>');
        	jQuery.ajax({
  			  type: "POST",
				  url:'<?php echo esc_url($ajaxurl);?>',
    			  data:{
        			  'action':'apoyl_grabdouyin_ajax',
    			  	  'apoyl_grabdouyin_url':apoyl_grabdouyin_url,
                      'apoyl-grabdouyin-wpnonce':'<?php echo esc_attr(wp_create_nonce('apoyl-grabdouyin-ajax'));?>'
    			  },
    			  async: true,
    			  success: function (data) { 
    				  var obj=JSON.parse(data);
		
    				  if(obj.error_open==1){
    					  jQuery('#apoyl-grabdouyin-tips').html('<font color="red"><?php esc_html_e('fail','apoyl-grabdouyin')?>'+obj.error_msg+'</font>');
    					  return;
    				  }
        			  if(data!=0){
        				  jQuery('#apoyl-grabdouyin-tips').html('<font color="green"><?php esc_html_e('success','apoyl-grabdouyin')?></font>');
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
            			  jQuery('#apoyl-grabdouyin-tips').html('<font color="red"><?php esc_html_e('fail','apoyl-grabdouyin')?></font>');
        			  }
    			  },
    			  error: function(data){
    				  jQuery('#apoyl-grabdouyin-tips').html('<font color="red"><?php esc_html_e('fail','apoyl-grabdouyin')?></font>');
    			  }
    			  
    			})	
        });
 
    });
</script>