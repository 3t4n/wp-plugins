<?php

function git_form($form_id)
{
  if(empty($form_id)){
    return false;
  }

  $GetClass = new git\GetData();

  $InputDataById = $GetClass->get_input_details_by_id($form_id);
  $InputCaptcha = $GetClass->get_captcha_details_by_id($form_id);
  $FormDataById = $GetClass->get_form_details_by_id($form_id);

  if(empty($InputDataById) && empty($FormDataById))
  {
    return false;
  }

  if(!empty($InputCaptcha))
  {
    $CaptchaData = unserialize($InputCaptcha->Input_Data);
    ?>
    <script type="text/javascript">
      var RecaptchaOptions = {
        theme : <?php echo '"'.$CaptchaData['theme'].'"'; ?>,
        lang : <?php echo '"'.$CaptchaData['language'].'"'; ?>
      };
    </script>
    <?php
  }

  $FormOptions = unserialize($FormDataById->Form_Options);

  ?>
  <div id="git-user-container" style="max-width: <?php if(isset($FormOptions['form_width'])){echo $FormOptions['form_width'];}else{echo '450px';}?>">
    <p style="display: none;" class="git_thanks_text"><?php echo $FormOptions['user_success_text']; ?></p>
    <?php if($FormOptions['form_loader'] === 'true')
    {
      ?>
      <img class="git-loader" style="display: none;" src="<?php echo plugins_url( 'get-in-touch/public/img/loader.gif' ) ?>">
      <?php
    }
    ?>
    <input type="hidden" name="git_form_hide" id="git_form_hide" value="<?php echo $FormOptions['form_hide']; ?>" />
    <input type="hidden" name="git_url_send_mail" id="git_url_send_mail" value="<?php echo plugins_url().'/get-in-touch/includes/send_contact_form_data.php'; ?>" />
    <input type="hidden" name="git_contact_form_formid" id="git_contact_form_formid" value="<?php echo $form_id; ?>" />
    <input type="hidden" value="<?php echo $FormOptions['git_check_for_stor_contact_form_data']; ?>" name="git_db_check" id="git_db_check" >
    <form class="contact-form" name="git-ui-contact-form" id="git-ui-contact-form" action="" method="post">
      <?php
      foreach($InputDataById as $InputData)
      {
        $UnserializedInputData = unserialize($InputData->Input_Data);
        if($InputData->Input_Type === 'text-field')
        {
          ?>
          <div class="git-fields-container">
            <?php    if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)</span>';}?></label>
              <?php
            }
            ?>
            <input placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin: 10px 0';}else echo 'margin-bottom: 10px'; ?>" type="text" class="git_textfield <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
            id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
            size="<?php echo $UnserializedInputData['size']; ?>" maxlength="<?php echo $UnserializedInputData['maxlen']; ?>">
            <i><p style="display: none;" class="git_error_text"><?php echo $FormOptions['user_error_validation_text']; ?></p></i>
          </div>
          <?php
        }
        if($InputData->Input_Type === 'phone')
        {
          ?>
          <div class="git-fields-container" id="phone">
            <?php
            if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)';}?></label>
              <?php
            }
            ?>
            <input placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" type="text" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin: 10px 0';}else echo 'margin-bottom: 10px'; ?>" class="git_phone <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
            id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
            size="<?php echo $UnserializedInputData['size']; ?>" maxlength="<?php echo $UnserializedInputData['maxlen']; ?>">
            <i><p style="display: none;" class="git_error_phone"><?php echo $FormOptions['user_error_validation_text']; ?></p></i>
          </div>
          <?php
        }
        if($InputData->Input_Type === 'email')
        {
          ?>
          <div class="git-fields-container">
            <?php
            if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)';}?></label>
              <?php
            }
            ?>
            <input placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" type="email" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin: 10px 0';}else echo 'margin-bottom: 10px'; ?>" class="git_emailtest <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
            id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
            size="<?php echo $UnserializedInputData['size']; ?>" maxlength="<?php echo $UnserializedInputData['maxlen']; ?>">
            <i><p style="display: none;" class="git_error_mail"><?php echo $FormOptions['user_error_email_validation_text']; ?></p></i>
          </div>
          <?php
        }
        if($InputData->Input_Type === 'textarea')
        {
          ?>
          <div class="git-fields-container">
            <?php
            if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)';}?></label>
              <?php
            }
            ?>
            <textarea placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin-top: 10px;margin-bottom: 10px';}else echo 'margin-bottom: 10px'; ?>" class="git_textareatest <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
              id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
              cols="<?php echo $UnserializedInputData['size']; ?>" rows="<?php echo $UnserializedInputData['maxlen']; ?>"></textarea>
              <i><p style="display: none;" class="git_error_textarea"><?php echo $FormOptions['user_error_validation_text']; ?></p></i>
            </div>
            <?php
          }
          if($FormOptions['form_captcha'] === 'true' && $InputData->Input_Type === 'captcha')
          {
            ?>
            <div class="git-fields-container" style="margin: 10px 0;">
              <input type="hidden" value="true" id="captcha_check" name="captcha_check">
              <?php
              $publickey = $UnserializedInputData['publickey'];
              $captchaval = recaptcha_get_html($publickey);
              ?>
              <?php
              echo $captchaval;
              ?>
              <i><p style="display: none;" class="git_error_captcha"></p></i>
            </div>
            <input type="hidden" name="git_captcha_privatekey" id="git_captcha_privatekey" value="<?php echo $UnserializedInputData['privatekey']; ?>" />
            <?php
          }
        }
        ?>
        <?php
        if(!isset($_GET['page']))
        {

          $color = git\color_inverse($FormOptions['button_color']);

          ?>
          <button style="<?php echo 'color:'.$color; ?>; background-color: <?php echo $FormOptions['button_color']; ?>" type="button" name="submit-contact-form" id="submit-contact-form" onClick="GITSubmitContactForm()" class="git-btn"><?php echo $FormOptions['button_text']; ?></button>
          <?php
        }
        ?>
      </div>
    </form>
  </div>
  <?php
}


function git_form_shortcode($form_id)
{
  if(empty($form_id)){
    return false;
  }

  $GetClass = new git\GetData();

  $InputDataById = $GetClass->get_input_details_by_id($form_id);
  $InputCaptcha = $GetClass->get_captcha_details_by_id($form_id);
  $FormDataById = $GetClass->get_form_details_by_id($form_id);

  if(empty($InputDataById) && empty($FormDataById))
  {
    return false;
  }
  if(!empty($InputCaptcha))
  {
    $CaptchaData = unserialize($InputCaptcha->Input_Data);
    ?>
    <script type="text/javascript">
      var RecaptchaOptions = {
        theme : <?php echo '"'.$CaptchaData['theme'].'"'; ?>,
        lang : <?php echo '"'.$CaptchaData['language'].'"'; ?>
      };
    </script>
    <?php
  }

  $FormOptions = unserialize($FormDataById->Form_Options);
  ob_start();
  ?>
  <div id="git-user-container" style="max-width: <?php if(isset($FormOptions['form_width'])){echo $FormOptions['form_width'];}else{echo '450px';}?>">
    <p style="display: none;" class="git_thanks_text"><?php echo $FormOptions['user_success_text']; ?></p>
    <?php if($FormOptions['form_loader'] === 'true')
    {
      ?>
      <img class="git-loader" style="display: none;" src="<?php echo plugins_url( 'get-in-touch/public/img/loader.gif' ) ?>">
      <?php
    }
    ?>
    <input type="hidden" name="git_form_hide" id="git_form_hide" value="<?php echo $FormOptions['form_hide']; ?>" />
    <input type="hidden" name="git_url_send_mail" id="git_url_send_mail" value="<?php echo plugins_url().'/get-in-touch/includes/send_contact_form_data.php'; ?>" />
    <input type="hidden" name="git_contact_form_formid" id="git_contact_form_formid" value="<?php echo $form_id; ?>" />
    <input type="hidden" value="<?php echo $FormOptions['git_check_for_stor_contact_form_data']; ?>" name="git_db_check" id="git_db_check" >
    <form class="contact-form" name="git-ui-contact-form" id="git-ui-contact-form" action="" method="post">
      <?php
      foreach($InputDataById as $InputData)
      {
        $UnserializedInputData = unserialize($InputData->Input_Data);
        if($InputData->Input_Type === 'text-field')
        {
          ?>
          <div class="git-fields-container">
            <?php    if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)</span>';}?></label>
              <?php
            }
            ?>
            <input placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin: 10px 0';}else echo 'margin-bottom: 10px'; ?>" type="text" class="git_textfield <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
            id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
            size="<?php echo $UnserializedInputData['size']; ?>" maxlength="<?php echo $UnserializedInputData['maxlen']; ?>">
            <i><p style="display: none;" class="git_error_text"><?php echo $FormOptions['user_error_validation_text']; ?></p></i>
          </div>
          <?php
        }
        if($InputData->Input_Type === 'phone')
        {
          ?>
          <div class="git-fields-container" id="phone">
            <?php
            if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)';}?></label>
              <?php
            }
            ?>
            <input placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" type="text" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin: 10px 0';}else echo 'margin-bottom: 10px'; ?>" class="git_phone <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
            id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
            size="<?php echo $UnserializedInputData['size']; ?>" maxlength="<?php echo $UnserializedInputData['maxlen']; ?>">
            <i><p style="display: none;" class="git_error_phone"><?php echo $FormOptions['user_error_validation_text']; ?></p></i>
          </div>
          <?php
        }
        if($InputData->Input_Type === 'email')
        {
          ?>
          <div class="git-fields-container">
            <?php
            if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)';}?></label>
              <?php
            }
            ?>
            <input placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" type="email" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin: 10px 0';}else echo 'margin-bottom: 10px'; ?>" class="git_emailtest <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
            id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
            size="<?php echo $UnserializedInputData['size']; ?>" maxlength="<?php echo $UnserializedInputData['maxlen']; ?>">
            <i><p style="display: none;" class="git_error_mail"><?php echo $FormOptions['user_error_email_validation_text']; ?></p></i>
          </div>
          <?php
        }
        if($InputData->Input_Type === 'textarea')
        {
          ?>
          <div class="git-fields-container">
            <?php
            if(isset($FormOptions['form_labels']) && $FormOptions['form_labels'] === 'true')
            {
              ?>
              <label for="<?php echo $UnserializedInputData['name']; ?>"><?php echo $UnserializedInputData['label'];?><?php if($FormOptions['git_mail_form_required_fields_text'] === 'true' && $UnserializedInputData['check'] === 'true'){echo '<span style="color: #e04545;"> (*)';}?></label>
              <?php
            }
            ?>
            <textarea placeholder="<?php echo $UnserializedInputData['placeholder']; ?>" style="<?php if($FormOptions['form_labels'] !== 'true'){echo 'margin-top: 10px;margin-bottom: 10px';}else echo 'margin-bottom: 10px'; ?>" class="git_textareatest <?php if($UnserializedInputData['check'] === 'true'){echo 'required';}?> <?php echo $UnserializedInputData['class']; ?>"
              id="git_contact_form_defined_text <?php echo $UnserializedInputData['id']; ?>" name="<?php echo $UnserializedInputData['name']; ?>"
              cols="<?php echo $UnserializedInputData['size']; ?>" rows="<?php echo $UnserializedInputData['maxlen']; ?>"></textarea>
              <i><p style="display: none;" class="git_error_textarea"><?php echo $FormOptions['user_error_validation_text']; ?></p></i>
            </div>
            <?php
          }
          if($FormOptions['form_captcha'] === 'true' && $InputData->Input_Type === 'captcha')
          {
            ?>
            <div class="git-fields-container" style="margin: 10px 0;">
              <?php
              $publickey = $UnserializedInputData['publickey'];
              $captchaval = recaptcha_get_html($publickey);
              ?>
              <?php
              echo $captchaval;
              ?>
              <i><p style="display: none;" class="git_error_captcha"></p></i>
            </div>
            <input type="hidden" name="git_captcha_privatekey" id="git_captcha_privatekey" value="<?php echo $UnserializedInputData['privatekey']; ?>" />
            <?php
          }
        }
        ?>
        <?php
        if(!isset($_GET['page']))
        {

          $color = git\color_inverse($FormOptions['button_color']);

          ?>
          <button style="<?php echo 'color:'.$color; ?>; background-color: <?php echo $FormOptions['button_color']; ?>" type="button" name="submit-contact-form" id="submit-contact-form" onClick="GITSubmitContactForm()" class="git-btn"><?php echo $FormOptions['button_text']; ?></button>
          <?php
        }
        ?>
      </div>
    </form>
  </div>
  <?php
  return ob_get_clean();
}
