<?php
// save data
if ( isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__)))
{ 

   $img_size                  = sanitize_text_field( ( !empty( $_POST['img_size'] ) ) ? $_POST['img_size']  : '' );
   $num_images                = sanitize_text_field( ( !empty( $_POST['num_images'] ) ) ? $_POST['num_images']  : '' );

   $existing_img_size           = get_option( 'existing_img_size' );
   $existing_num_images         = get_option( 'existing_num_images' );

   if ( false !== $existing_img_size ) {

    update_option( 'existing_img_size', $img_size ); 
    update_option( 'existing_num_images', $num_images ); ?>

    <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator data update successfully', 'ai-chatgpt-content-and-image-generator') ?></div>

<?php }else{
    add_option( 'existing_img_size', $img_size );
    add_option( 'existing_num_images', $num_images ); ?>
    <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator data saved successfully', 'ai-chatgpt-content-and-image-generator') ?></div>
<?php }  
}
$img_size_value    = get_option( 'existing_img_size','1024x1024');
$img_num_value     = get_option( 'existing_num_images', 6);
?>
<div id="api-plugin-container">
    <div class="api-head">
        <div class="api-head__inside-container">
            <div class="api-head__logo-container">
               <img src=" <?php echo esc_url(OPAIGPT_URL.'/assets/img/menu-icon/main-logo.png'); ?>">
               <p><?php echo esc_html__('AI ChatGPT Content And Image Generator', 'ai-chatgpt-content-and-image-generator') ?></p> 
           </div>
       </div>
   </div>
</div>
<div class="opaigptmain-div">
  <div class="row">
   <div class="col-lg-8">
    <div class="api-box">
     <div style="width: 100%; display: flex; flex-wrap: nowrap; box-sizing: border-box;">
      <input id="image-input" type="text" placeholder="<?php echo esc_html__('Enter Title', 'ai-chatgpt-content-and-image-generator') ?>" class="regular-text code" style="flex-grow: 1; margin-right: 1rem;">
      <button type="button" class="btn-process" id="imagetitle">
         <?php echo esc_html__('Generate','ai-chatgpt-content-and-image-generator'); ?>
         <span class="btn-ring"></span>
     </button>   
 </div>
</div>
<div class="api-box-img">
 <a class="opaigpt_image_select_all" style="display: none"><?php echo esc_html__('Select All','ai-chatgpt-content-and-image-generator'); ?></a><br><br>
 <div id="image-response">
 </div>
 <button type="button" class="button button-primary image-generator-save" style="display: none"> <?php echo esc_html__('Save to Media', 'ai-chatgpt-content-and-image-generator') ?></button>
 <div class="progress-main">
    <h2><?php echo esc_html__('Downloading Images', 'ai-chatgpt-content-and-image-generator') ?></h2>      
    <div class="opaigpt-convert-progress opaigpt-convert-bar">
        <span></span>
        <small><?php echo esc_html__('0%', 'ai-chatgpt-content-and-image-generator') ?></small>
    </div>
    <div class="opaigpt_message" style="text-align: center;margin-top: 10px;"></div>
</div>
</div>
</div>
<div class="col-lg-4">
    <div class="form-box">
        <div class="api-box-faq-header">
            <h3><?php echo esc_html__('Image Settings', 'ai-chatgpt-content-and-image-generator'); ?></h3>
        </div>
        <form method="post">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('Size:','ai-chatgpt-content-and-image-generator'); ?></label>
                <select class="form-control" name="img_size" value="<?php echo esc_attr($img_size_value);?>">
                    <option value="<?php echo esc_html__('256x256', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_size_value, '256x256') ?>><?php echo esc_html__('256x256','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('512x512', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected($img_size_value,"512x512")?>><?php echo esc_html__('512x512','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('1024x1024', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected($img_size_value, "1024x1024")?>><?php echo esc_html__('1024x1024','ai-chatgpt-content-and-image-generator');?></option>
                </select>
            </div>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('# of:','ai-chatgpt-content-and-image-generator');?></label>
                <select class="form-control" name="num_images" value="<?php echo esc_attr($img_num_value);?>">
                    <option value="<?php echo esc_html__('1', 'ai-chatgpt-content-and-image-generator') ?>" <?php  selected( $img_num_value, '1') ?>><?php echo esc_html__('1','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('2', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '2') ?>><?php echo esc_html__('2','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('3', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '3') ?>><?php echo esc_html__('3','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('4', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '4') ?>><?php echo esc_html__('4','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('5', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '5') ?>><?php echo esc_html__('5','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('6', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '6') ?>><?php echo esc_html__('6','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('7', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '7') ?>><?php echo esc_html__('7','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('8', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '8') ?>><?php echo esc_html__('8','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('9', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '9') ?>><?php echo esc_html__('9','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('10', 'ai-chatgpt-content-and-image-generator') ?>" <?php selected( $img_num_value, '10') ?>><?php echo esc_html__('10','ai-chatgpt-content-and-image-generator');?></option>
                </select>
            </div>
            <input type="submit" name="submit_img" id="submit" class="btn-save" value="<?php echo esc_html__('Save', 'ai-chatgpt-content-and-image-generator'); ?>" style="margin:auto;">
        </form>
    </div>
</div>
</div>
</div>
<script>
    jQuery(document).ready(function (jQuery) {
        var opaigpt_ajax_url  = '<?php echo esc_js( admin_url( 'admin-ajax.php') ) ?>';
        var opaigpt_btn_save  = jQuery('.image-generator-save');
        var opaigpt_message   = jQuery('.opaigpt_message');
        var progressBar       = jQuery('.progress-main');

        opaigpt_btn_save.click(function (){
         var items = [];
         jQuery('.image-item-select').each(function (idx, select){
            if(jQuery(select).prop('checked')){
                items.push(jQuery(select).attr('data-id'));
            }
        });
         function opaigptLoading(btn){
            btn.attr('disabled','disabled');
            if(!btn.find('spinner').length){
                btn.append('<span class="spinner"></span>');
            }
            btn.find('.spinner').css('visibility','unset');
        }
        if(items.length){

            progressBar.show();
            progressBar.removeClass('opaigpt_error')
            progressBar.find('span').css('width',0);
            progressBar.find('small').html('0/'+items.length);
            opaigpt_message.empty();
            opaigptLoading(opaigpt_btn_save);
            opaigptSaveImage(items,0,opaigpt_btn_save);
        }
        else{
            alert('Please select least one image to save');
        }
    });
        function opaigptRmLoading(btn){
            btn.removeAttr('disabled');
            btn.find('.spinner').remove();
        }
        function opaigptSaveImage(items,start, btn){

            if(start >= items.length){
                progressBar.find('small').html(items.length+'/'+items.length);
                progressBar.find('span').css('width','100%');
                opaigpt_message.html('Save images to media successfully');
                opaigptRmLoading(btn);
                setTimeout(function (){
                    opaigpt_message.empty();
                    progressBar.remove();
                },2000)
            }
            else{                
                var id = items[start];
                var item = jQuery('.image-item-'+id);
                var data = item.find('input').serialize();
                data += '&action=opai_save_image_media';             

                jQuery.ajax({
                    url: opaigpt_ajax_url,
                    dataType: 'JSON',
                    type: 'POST',
                    data: data,
                    success: function (res){                       
                        if(res.status === 'success'){
                            var currentPos = start+1;
                            var percent = Math.ceil(currentPos*100/items.length);
                            progressBar.find('small').html(currentPos+'/'+items.length);
                            progressBar.find('span').css('width',percent+'%');
                            opaigptSaveImage(items, start+1, btn);
                        }
                        else{
                            progressBar.addClass('opaigpt_error');
                            alert(res.msg);
                            opaigptRmLoading(btn);
                        }
                    },
                    error: function (){
                        progressBar.addClass('opaigpt_error');
                        alert('Something went wrong');
                        opaigptRmLoading(btn);
                    }
                })
            }
        }
    });
</script>