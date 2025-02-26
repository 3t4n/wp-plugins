<?php
// save data
if ( isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__)))
{ 
    $api_model            = sanitize_text_field( ( !empty( $_POST['api_model'] ) ) ? $_POST['api_model']  : '' );
    $api_temperature      = sanitize_text_field( ( !empty( $_POST['api_temperature'] ) ) ? $_POST['api_temperature']  : '' );
    $api_max_tokens       = sanitize_text_field( ( !empty( $_POST['api_max_tokens'] ) ) ? $_POST['api_max_tokens']  : '' );
    $frequency_penalty    = sanitize_text_field( ( !empty( $_POST['frequency_penalty'] ) ) ? $_POST['frequency_penalty']  : '' );
    $api_presence_penalty = sanitize_text_field( ( !empty( $_POST['api_presence_penalty'] ) ) ? $_POST['api_presence_penalty']  : '' );
    $api_n                = sanitize_text_field( ( !empty( $_POST['api_n'] ) ) ? $_POST['api_n']  : '' );

    $existing_api_model          = get_option( 'existing_api_model' );
    $existing_temperature        = get_option( 'existing_temperature' );
    $existing_max_tokens         = get_option( 'existing_max_tokens' );
    $existing_frequency_penalty  = get_option( 'existing_frequency_penalty' );
    $existing_presence_penalty   = get_option( 'existing_presence_penalty' );
    $existing_api_n              = get_option( 'existing_api_n' );

    if ( false !== $existing_api_model ) {

     update_option( 'existing_api_model', $api_model ); 
     update_option( 'existing_temperature', $api_temperature ); 
     update_option( 'existing_max_tokens', $api_max_tokens ); 
     update_option( 'existing_frequency_penalty', $frequency_penalty ); 
     update_option( 'existing_presence_penalty', $api_presence_penalty ); 
     update_option( 'existing_api_n', $api_n ); ?>

     <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator data update successfully', 'ai-chatgpt-content-and-image-generator') ?></div>
 <?php }else{
    add_option( 'existing_api_model', $api_model );
    add_option( 'existing_temperature', $api_temperature );
    add_option( 'existing_max_tokens', $api_max_tokens );
    add_option( 'existing_frequency_penalty', $frequency_penalty );
    add_option( 'existing_presence_penalty', $api_presence_penalty );
    add_option( 'existing_api_n', $api_n ); ?>
    <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator data saved successfully', 'ai-chatgpt-content-and-image-generator') ?></div>
<?php }  
}
$model_value                  = get_option( 'existing_api_model','text-davinci-003');
$temperature_value            = get_option( 'existing_temperature',0.9 );
$max_tokens_value             = get_option( 'existing_max_tokens',2048 );
$frequency_penalty_value      = get_option( 'existing_frequency_penalty', 0);
$presence_penalty_value       = get_option( 'existing_presence_penalty', 0.6);
$api_n_value                  = get_option( 'existing_api_n', 1);

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
              <input id="op-input" type="text" placeholder="<?php echo esc_html__('Enter Title', 'ai-chatgpt-content-and-image-generator') ?>" class="regular-text code" style="flex-grow: 1; margin-right: 1rem;">
              <button type="button" class="btn-process" id="subtitle">
               <?php echo esc_html__('Generate','ai-chatgpt-content-and-image-generator'); ?>
               <span class="btn-ring"></span>
           </button> 
       </div>
   </div>
   <div class="opaigpt-copytext">
      <div class="opaigpt-tooltip">
        <button onclick="opaigptCopyFunc()" onmouseout="opaigptoutFunc()" class="opaigptcopy-btn">
            <span class="opaigpt-tooltiptext" id="opaigptTooltip"><?php echo esc_html__('Copy','ai-chatgpt-content-and-image-generator'); ?></span>
            <?php echo esc_html__('Copy','ai-chatgpt-content-and-image-generator'); ?>
        </button>
    </div> 
</div>
<div class="api-box">
   <div id="wp-editor-widget-container">
    <a class="close" href="<?php echo esc_url('javascript:WPEditorWidget.hideEditor()');?>"><span class="icon"></span></a>
    <div class="editor">
        <?php
        $settings = array(
            'textarea_rows' => 70,
            'editor_height' => 450,
        );
        wp_editor( '', 'op-response', $settings ); 
        ?>
    </div>
</div>
</div>
</div>
<div class="col-lg-4">
    <div class="form-box">
        <div class="api-box-faq-header">
            <h3><?php echo esc_html__('AI ChatGPT Content And Image Generator Settings', 'ai-chatgpt-content-and-image-generator'); ?></h3>
        </div>
        <form method="post">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('Model','ai-chatgpt-content-and-image-generator'); ?></label>
                <select class="form-control" name="api_model" value="<?php echo esc_attr($model_value);?>">
                    <option value="<?php echo esc_html__('text-davinci-003', 'ai-chatgpt-content-and-image-generator'); ?>" <?php  selected( $model_value, 'text-davinci-003') ?>><?php echo esc_html__('text-davinci-003','ai-chatgpt-content-and-image-generator');?></option>
                    <option value="<?php echo esc_html__('text-curie-001', 'ai-chatgpt-content-and-image-generator'); ?>" <?php  selected( $model_value, 'text-curie-001') ?>><?php echo esc_html__('text-curie-001','ai-chatgpt-content-and-image-generator'); ?></option>
                    <option value="<?php echo esc_html__('text-babbage-001', 'ai-chatgpt-content-and-image-generator'); ?>" <?php  selected( $model_value, 'text-babbage-001') ?>><?php echo esc_html__('text-babbage-001','ai-chatgpt-content-and-image-generator'); ?></option>
                    <option value="<?php echo esc_html__('text-ada-001', 'ai-chatgpt-content-and-image-generator'); ?>" <?php  selected( $model_value, 'text-ada-001') ?>><?php echo esc_html__('text-ada-001','ai-chatgpt-content-and-image-generator'); ?></option>
                </select>
            </div>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('Temperature','ai-chatgpt-content-and-image-generator');?></label>
                <input type="text" name="api_temperature" placeholder="<?php echo esc_html__('enter temperature', 'ai-chatgpt-content-and-image-generator'); ?>" value="<?php echo esc_attr($temperature_value);?>"  class="form-control">
            </div>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('Max Tokens','ai-chatgpt-content-and-image-generator');?></label>
                <input type="text" name="api_max_tokens" placeholder="<?php echo esc_html__('enter max tokens', 'ai-chatgpt-content-and-image-generator'); ?>" value="<?php echo esc_attr($max_tokens_value);?>"  class="form-control">
            </div>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('Frequency Penalty','ai-chatgpt-content-and-image-generator');?></label>
                <input type="text" name="frequency_penalty" placeholder="<?php echo esc_html__('enter frequency penalty', 'ai-chatgpt-content-and-image-generator'); ?>" value="<?php echo esc_attr($frequency_penalty_value);?>"  class="form-control">
            </div>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('Presence Penalty','ai-chatgpt-content-and-image-generator');?></label>
                <input type="text" name="api_presence_penalty" placeholder="<?php echo esc_html__('enter presence penalty', 'ai-chatgpt-content-and-image-generator'); ?>" value="<?php echo esc_attr($presence_penalty_value);?>"  class="form-control">
            </div>
            <div class="form-group">
                <label class="app-lable"><?php echo esc_html__('N','ai-chatgpt-content-and-image-generator');?></label>
                <input type="text" name="api_n" placeholder="<?php echo esc_html__('enter n', 'ai-chatgpt-content-and-image-generator'); ?>" value="<?php echo esc_attr($api_n_value);?>"  class="form-control">
            </div>
            <input type="submit" name="submit_content" id="submit" class="btn-save" value="<?php echo esc_html__('Save', 'ai-chatgpt-content-and-image-generator'); ?>" style="margin:auto;">
        </form>
    </div>
</div>
</div>
</div>