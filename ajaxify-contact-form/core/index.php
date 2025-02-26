<?php
$options = $acf_core_loader->settings;
//foreach ($options as $k => $v) {
//    echo "'".$k."'=>'".$v."',<br/>";
//}
//exit();
//var_dump($options);
//exit();
?>


<div class="acf-wrapper wrap sct-wordpress-<?php echo ACF_WP_VERSION; ?>">
<div class="acf-header">
<h2>
    <?php _e("AJAX Contact Form", "ajax-contact-form"); ?>
    <span class="sct-version"> | <?php echo $acf_core_loader->get('__version__'); ?></span></h2>
    <p class="promo-txt">Simple and nice AJAX contact form plugin for your Wordpress</p>
<form id="SSForm" method="post">

<?php settings_fields('ajax-contact-form'); ?>

<input type="hidden" name="Config" value="1" />
<div id="STabs">
<ul>
    <li><a href="#GeneralSettings"><strong>General</strong></a></li>
    <li><a href="#Translation"><strong>Translation</strong></a></li>

</ul>

<div id="GeneralSettings">
<h3>General Settings</h3>
<table class="form-table">
<tbody>
<tr valign="top">
    <th scope="row">Enable</th>
    <td>
        <fieldset>
            <legend class="screen-reader-text"><span>Enable</span></legend>

            <label for="EnableAJAXContacts">
                <input name="Enable" <?php echo  ($options['Enable'] == '1' ? 'checked' : '' ) ?> type="radio" id="EnableAJAXContacts" value="1" />
                Enabled
            </label>
            <label for="DisableAJAXContacts">
                <input name="Enable" <?php echo  ($options['Enable'] == '0' ? 'checked' : '' ) ?> type="radio" id="DisableAJAXContacts" value="0" />
                Disabled
            </label>
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">E-mail Subject</th>
    <td>
        <fieldset>
            <input name="EmailSubject" type="text" id="EmailSubject" value="<?php echo  $options['emailsubject'] ?>" class="" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Duplicate E-mail to sender</th>
    <td>
        <fieldset>
            <legend class="screen-reader-text"><span>Duplicate email to email sender</span></legend>

            <label for="SendEmailToSender">
                <input name="Enable" <?php echo  ($options['duplicateemail'] == '1' ? 'checked' : '' ) ?> type="radio" id="SendEmailToSender" value="1" />
                Enabled
            </label>
            <label for="SendEmailToSenderNot">
                <input name="Enable" <?php echo  ($options['duplicateemail'] == '0' ? 'checked' : '' ) ?> type="radio" id="SendEmailToSenderNot" value="0" />
                Disabled
            </label>
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Vertical position</th>
    <td>
        <fieldset>
            <input name="VPositionPx" type="text" id="VPositionPx" value="<?php echo  $options['VPositionPx'] ?>" class="" /> px or % from top
        </fieldset>
    </td>
</tr>
<!--<tr valign="top">-->
<!--    <th scope="row">Plugin Developer</th>-->
<!--    <td>-->
<!--        <fieldset>-->
<!--            <legend class="screen-reader-text"><span>Developer Copyright</span></legend>-->
<!--            <label for="DeveloperCopy">-->
<!--                <input name="ShowHeader" --><?php //echo ($options['DeveloperCopy'] ? 'checked' : '' ) ?><!-- type="checkbox" id="DeveloperCopy" value="1" />-->
<!--            </label>-->
<!--        </fieldset>-->
<!--    </td>-->
<!--</tr>-->
</tbody>
</table>
</div>

<div id="Translation">
<h3>Translation</h3>
<table class="form-table">
<tbody>

<tr valign="top">
    <th scope="row">Message</th>
    <td>
        <fieldset>
            <input name="Message" type="text" id="Message" value="<?php echo  $options['Message'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Your name</th>
    <td>
        <fieldset>
            <input name="Your_name" type="text" id="Your_name" value="<?php echo  $options['Your_name'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Email</th>
    <td>
        <fieldset>
            <input name="Email" type="text" id="Email" value="<?php echo  $options['Email'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Website</th>
    <td>
        <fieldset>
            <input name="Website" type="text" id="Website" value="<?php echo  $options['Website'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Send Message Button</th>
    <td>
        <fieldset>
            <input name="Send_Message" type="text" id="Send_Message" value="<?php echo  $options['Send_Message'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Success Text</th>
    <td>
        <fieldset>
            <input name="Success_Text" type="text" id="Success_Text" value="<?php echo  $options['Success_Text'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Close Button</th>
    <td>
        <fieldset>
            <input name="Close" type="text" id="Close" value="<?php echo  $options['Close'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>
<tr valign="top">
    <th scope="row">Required!</th>
    <td>
        <fieldset>
            <input name="Required" type="text" id="Required" value="<?php echo  $options['Required'] ?>" class="small-text" />
        </fieldset>
    </td>
</tr>

</tbody>
</table>
</div>

</div>
<p class="submit">
    <input type="submit" name="submit" id="submit" class="button-primary" value="Save settings" />
</p>
</form>

<script type="text/javascript">
jQuery(function(){
    jQuery('#STabs').tabs();
});
</script></div>