<?php
//save key
if ( isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__)))
{ 
    $api_key   = sanitize_text_field( ( !empty( $_POST['api_key'] ) ) ? $_POST['api_key']  : '' );

    $existing_api_key = get_option( 'api_script_key' );

    if ( false !== $existing_api_key ) {

        update_option( 'api_script_key', $api_key ); ?>
        <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator api key update successfully', 'ai-chatgpt-content-and-image-generator') ?></div>
    <?php }else{
        add_option( 'api_script_key', $api_key ); ?>
        <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator api key saved successfully', 'ai-chatgpt-content-and-image-generator') ?></div>
    <?php }  
}


$api_script_key = get_option( 'api_script_key' );
?>
<script>

   function opaigptEmptyKeyFun(){
      var opaigptkeyval = document.getElementById("opai_api_key").value;

      if(opaigptkeyval == "")
      {
        alert("Please Enter Valid API Key");
        return false;
    }
    else
    {
        jQuery("form#opaigpt_keyform").submit();
    }
} 

</script>

<div id="api-plugin-container">
    <div class="api-head">
        <div class="api-head__inside-container">
            <div class="api-head__logo-container">
                <img src="<?php echo esc_url(OPAIGPT_URL.'/assets/img/menu-icon/main-logo.png'); ?>">
                <p><?php echo esc_html__('AI ChatGPT Content And Image Generator', 'ai-chatgpt-content-and-image-generator') ?></p> 
            </div>
        </div>
    </div>
</div>
<div class="opaigptmain-div">
    <div class="row">
        <div class="col-lg-8">
            <div class="api-box">
                <h3><?php echo esc_html__('Enter API Key','ai-chatgpt-content-and-image-generator'); ?></h3>
                <h4><?php echo esc_html__('AI ChatGPT Content And Image Generator wordpress plugin','ai-chatgpt-content-and-image-generator');?></h4>
            </div>
            <div class="api-box">
                <form method="post" id="opaigpt_keyform">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
                    <div style="width: 100%; display: flex; flex-wrap: nowrap; box-sizing: border-box;">
                        <input type="text" id="opai_api_key" name="api_key" placeholder="<?php echo esc_html__('Enter Api Key', 'ai-chatgpt-content-and-image-generator') ?>" class="regular-text code" value="<?php echo esc_attr($api_script_key);?>" style="flex-grow: 1; margin-right: 1rem;">
                        <input type="button" name="submit_key" class="btn-save" value="<?php echo esc_html__('Save Key', 'ai-chatgpt-content-and-image-generator') ?>" onclick="opaigptEmptyKeyFun()">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-box">
                <div class="api-box-faq-header">
                    <h3><?php echo esc_html__('FAQ','ai-chatgpt-content-and-image-generator'); ?></h3>
                </div>
                <div class="api-setup-faq">
                   <a href="<?php echo esc_url('https://beta.openai.com/account/api-keys'); ?> " target="_blank" style = "text-decoration: none; font-size:15px;" >
                    <?php echo esc_html__('1. How to generate AI ChatGPT Content Generator token?','ai-chatgpt-content-and-image-generator');?></a>
                </div>
            </div>
        </div>
    </div>
</div>