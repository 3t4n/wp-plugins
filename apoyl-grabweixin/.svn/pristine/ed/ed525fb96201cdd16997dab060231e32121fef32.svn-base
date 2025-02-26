<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_GRABWEIXIN
 * @subpackage APOYL_GRABWEIXIN/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
$ajaxurl = admin_url('admin-ajax.php');
$file = apoyl_grabweixin_file('grabpic');
?>
<form
	action="<?php echo admin_url('admin-ajax.php?page=apoyl-grabweixin-settings');?>"
	name="apoyl-grabweixin-form" method="post">
	<input type="text" class="regular-text" value=""
		id="apoyl-grabweixin-weixinurl" name="apoyl-grabweixin-weixinurl">
        <?php
       wp_nonce_field("apoyl-grabweixin-settings",'apoyl_grabweixin_wpnonce');
        ?>
        <span id="apoyl-grabweixin-tips"></span> <input type="button"
		name="apoyl-grabweixin-grabbutton" id="apoyl-grabweixin-grabbutton"
		class="button button-primary"
		value="<?php _e('apoyl-grabweixin-grabbutton','apoyl-grabweixin')?>">
		
		<input type="button"
		name="apoyl-grabweixin-picgrabbutton" id="apoyl-grabweixin-picgrabbutton"
		class="button button-primary"
		value="<?php _e('apoyl-grabweixin-picgrabbutton','apoyl-grabweixin')?>">
</form>
<script>
    jQuery(document).ready(function() {

        if (typeof wp.data === 'object') {
            const { select} = wp.data;
            function hasHeadingBlock() {
                const blocks = select('core/block-editor').getBlocks();
                return blocks.some(block => block.name === 'core/heading');
            }
        }

        <?php if($file){ 
            include $file;
        }else{ ?>
    	jQuery('#apoyl-grabweixin-picgrabbutton').click(
     			 function() {
          	alert('<?php _e('alertcalldev_desc','apoyl-grabweixin')?>');
      	});
    	  <?php } ?>  	
        jQuery('#apoyl-grabweixin-grabbutton').click(function() {

            if(jQuery('.block-editor-default-block-appender__content').length >0)
      	  		jQuery('.block-editor-default-block-appender__content').focus();
            var weixinurl=jQuery('#apoyl-grabweixin-weixinurl').val();
           
        	jQuery('#apoyl-grabweixin-tips').html('<img src="<?php echo esc_url(APOYL_GRABWEIXIN_URL.'/admin/img/loading.gif');?>" height=15 style="vertical-align:text-bottom;"/>');
        	jQuery.ajax({
  			  type: "POST",
				  url:'<?php echo esc_url($ajaxurl);?>',
    			  data:{
        			  'action':'apoyl_grabweixin_ajax',
    			  	  'weixinurl':weixinurl,
    			  },
    			  async: true,
    			  success: function (data) { 
    				  var obj=JSON.parse(data);

        			  if(data!=0){
        				  jQuery('#apoyl-grabweixin-tips').html('<font color="green"><?php _e('success','apoyl-grabweixin')?></font>');
                          if(tinymce.get('content')!=null){
                              if(jQuery('#title').length >0){
                                  if(jQuery( '#title-prompt-text' ).length >0)
                                      jQuery('#title-prompt-text' ).html('');
                                  jQuery('#title').val(obj.post_title);
                              }
                              tinymce.get('content').setContent(obj.content);
                          }else{
                              if (typeof wp.data === 'object') {
                                  const { dispatch } = wp.data;
                                  if (!hasHeadingBlock()) {

                                      setTimeout(function(){

                                          dispatch('core/editor').editPost({ title:obj.post_title });
                                          dispatch('core/block-editor').insertBlock(
                                              wp.blocks.createBlock('core/heading', {
                                                  level: 0,
                                                  content: obj.content
                                              }),
                                              1
                                          );
                                      },300)

                                  }
                              }else {
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

                              }
                          }



        			  }else{
            			  jQuery('#apoyl-grabweixin-tips').html('<font color="red"><?php _e('fail','apoyl-grabweixin')?></font>');
        			  }
    			  },
    			  error: function(data){
    				  jQuery('#apoyl-grabweixin-tips').html('<font color="red"><?php _e('fail','apoyl-grabweixinh')?></font>');
    			  }
    			  
    			})	
        });
 
    });
</script>