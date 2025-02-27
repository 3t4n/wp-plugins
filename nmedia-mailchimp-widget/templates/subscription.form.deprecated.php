<?php

$fields     = isset($form_meta['vars']) ? $form_meta['vars'] : null;
if($fields == null) return '';

$interests  = isset($form_meta['interests']) ? $form_meta['interests'] : '';

//rendering custom css
echo '<style>';
echo $this->get_option('_form_css');
echo '</style>';

$button_title = isset($formStyles['buttonlable']) ? $formStyles['buttonlable'] : __('Subscribe', 'nm-mailchimp');
?>

<div class="nm-mc-form">
<form id="mc-<?php echo $form_meta['listid'];?>">
    <input type="hidden" name="listid" value="<?php echo $form_meta['listid'];?>">
    <input type="hidden" name="grouping1" value="<?php echo esc_attr(json_encode($groupings));?>">

    <div class="wrapper-form" style="transition: width 2s; width: <?php echo $formStyles['fromWidth']; ?>%;">
      <div class="form-container">
        <div class="header-text" style="background-color: <?php echo $formStyles['headerBg']; ?>;">
          <h4  style="color: <?php echo $formStyles['headerTextColor']; ?>;"><?php echo $formStyles['headerText']; ?></h4>
        </div>
        <div style="background-color:<?php echo $formStyles['sectionBackgroundColor']; ?>;">
          
        <div id="live-form">
          <?php
          if($fields){
              foreach($fields as $field){
                  
                  
                  if($field['checked'] == 'true'){
                      
                      $field_id   = $field['tag'];
                      $title      = sprintf(__("%s", "nm-mailchimp"), $field['name']);
                      $type       = $field['field_type'];
                      $required   = ($field['req'] == 'true' ? 'required' : '');
                      
                      echo '<p>';
                      switch($type){
                          
                          case 'text' || 'email' || 'number' || 'date':
                              
                              echo '<input placeholder="'.$title.'" type="'.$type.'" name="vars['.$field_id.']" '.$required.'>';
                              
                              break;
                      }
                      
                      echo '</p>';
                  }
                  
              }
          }

      if ( is_array( $interests ) ) {
        foreach ( $interests as $interest ) {
        foreach ( $interest['groups'] as $group ) {
            echo '<label for="' . $group['id'] . '">' .
             '<input id="'  . $group['id'] . '" type="checkbox" name="intrests[' . $interest['id'] . '][' . $group['id'] . ']" value="' . $group['name'] . '">'
                    . $group['name'] . '<br></label>';
          }
        }
      }
          
          ?>

        </div>
                      </div>
        <div class="footer-text" style="background-color: <?php echo $formStyles['footerBg']; ?>;">
          
          <!-- <button >{{subForm.buttonlable}}</button>  -->
          <button style="color: <?php echo $formStyles['buttonFontColor']; ?>; background-color: <?php echo $formStyles['btnBackground']; ?>;" type="submit"><?php printf(__("%s", "nm-mailchimp"), $button_title);?></button>
            

        </div>
      </div>
    </div>

    <?php
    //   User consent 
        
            $user_consent = $this->get_option('_user_consent');
            if ( $user_consent != '' ) {
                
                echo '<div class="nmmc-user-consent">';
                echo '<label style="width:100%" for="nmmc_consent"><input id="nmmc_consent" type="checkbox" required> ';
                printf(__("%s", 'nm-mailchimp'), $user_consent);
                echo '</label>';
                echo '</div>';
            }
            ?>

    <span style="display:none;" class="sending-form"><img src="<?php echo $this->plugin_meta['url'];?>/images/loading.gif"></span>
    <span class="sending-form-error"></span>
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
           
           
      data = data + '&action=nm_mailchimp_subscribe_user';

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
                   
                   if(get_option('_form_redirect') != ''){
                       window.location.reload(get_option('_form_redirect'));
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