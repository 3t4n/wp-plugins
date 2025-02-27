<?php

// print_r($form_meta);

$list_id        = isset($form_meta['list_id']) ? $form_meta['list_id'] : '';
$fields         = isset($form_meta['merge_fields']) ? $form_meta['merge_fields'] : '';
$interests      = isset($form_meta['interests']) ? $form_meta['interests'] : '';
$sub_type       = isset($form_meta['sub_type']) ? $form_meta['sub_type'] : '';
$create_user    = isset($form_meta['wp_user']) ? $form_meta['wp_user'] : '';
$user_role      = isset($form_meta['user_role']) ? $form_meta['user_role'] : '';

//rendering custom css
echo '<style>';
echo $this->get_option('_form_css');
echo '</style>';
$button_title = isset($formStyles['buttonlable']) ? $formStyles['buttonlable'] : __('Subscribe', 'nm-mailchimp');
?>

<div class="nm-mc-form">
<form id="mc-<?php echo $list_id; ?>">
    <input type="hidden" name="listid" value="<?php echo $list_id; ?>">
    <input type="hidden" name="create_user" value="<?php echo $create_user; ?>">
    <input type="hidden" name="user_role" value="<?php echo $user_role; ?>">

    <div class="wrapper-form" style="transition: width 2s; width: <?php echo $formStyles['fromWidth']; ?>%;">
      <div class="form-container">
        <div class="header-text" style="background-color: <?php echo $formStyles['headerBg']; ?>;">
          <h4  style="color: <?php echo $formStyles['headerTextColor']; ?>;"><?php echo $formStyles['headerText']; ?></h4>
        </div>
        <div style="background-color:<?php echo $formStyles['sectionBackgroundColor']; ?>;">
          
            <div id="live-form">
                <label for="mcemail"><?php _e( 'Email', 'nm-mailchimp' ); ?></label>
                <br>
                <input type="email" name="vars[EMAIL]">
                <br>
              <?php
                if(is_array($fields)){
                    foreach ($fields as $field) {
                        echo '<label for="'.$field['id'].'">'.$field['label'].'</label>';
                        echo '<br>';     
                        echo '<input type="text" id="'.$field['id'].'" name="vars['.$field['id'].']">';
                        echo '<br>';
                    }
                }
                
                if( ! empty($interests) ) {
                    if($sub_type == 'mannual'){
                        foreach ($interests as $interest) {
                            echo '<label><input type="checkbox" name="interests['.$interest['id'].']"> '.$interest['label'].'</label><br>';
                        }
                    } else {
                        foreach ($interests as $interest) {
                            echo '<input type="hidden" name="interests['.$interest['id'].']">';
                        }                    
                    }
                }
              
              
            //   User consent 
        
            $user_consent = $this->get_option('_user_consent');
            if ( $user_consent != '' ) {
                
                echo '<div class="nmmc-user-consent">';
                echo '<label for="nmmc_consent"><input id="nmmc_consent" type="checkbox" required> ';
                printf(__("%s", 'nm-mailchimp'), $user_consent);
                echo '</label>';
                echo '</div>';
            }
            ?>
              
    
            </div>
        </div>
        
        
        
        <div class="footer-text" style="background-color: <?php echo $formStyles['footerBg']; ?>;">
            <span style="display:none;" class="sending-form">
                <img src="<?php echo $this->plugin_meta['url'];?>/images/loading.gif">
            </span>
            <span class="sending-form-error"></span>            
            <button
                style="color: <?php echo $formStyles['buttonFontColor']; ?>;
                background-color: <?php echo $formStyles['btnBackground']; ?>;"
                type="submit">
              <?php printf(__("%s", "nm-mailchimp"), $button_title);?>
            </button>
        </div>
      </div>
    </div>
</form>

</div>

<script type="text/javascript">
    <!--
    jQuery(function($){
       
       $(".nm-mc-form form").submit(function(e){
           
           e.preventDefault();
           $(this).find('.sending-form').show();
           $(this).find('.sending-form-error').html('');
           
           var _form = $(this);
           
           var data = $(this).serialize();
           
           
			data = data + '&action=nm_mailchimp_subscribe_user_version_six';

           $.ajax({
              type: "POST",
              url: nm_mailchimp_vars.ajaxurl,
              data: data,
              success: function(resp){
                    var resp = $.parseJSON(resp);
                    
                    if(resp.status === 'error'){
                        $(_form).find('.sending-form-error').html(resp.message).css('color', 'red');    
                    }else{
                        $(_form).find('.sending-form-error').html(resp.message).css('color', 'green');    
                    }
                    
                   $(_form).find('.sending-form').hide();
                   $("#TB_window").remove();
                   $("#TB_overlay").remove();
                   
                   if(get_option_mc('_form_redirect') != ''){
                       window.location = get_option_mc('_form_redirect');
                   }
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                 $(_form).find('.sending-form').hide();
                 $(_form).find('.sending-form-error').html(nm_mailchimp_vars.messages.error_subscription).css('color','red');
              }
            });
           
           
       });
    });
    
    
    //>
</script>