<div class="wrap">
<h1><?php echo $this->__('General Settings') ?></h1>

<p><?php echo sprintf($this->__('In order to display the calendar, put the placeholder <strong>%s</strong> at the position in your article where you want the calendar to appear. You can select a specific calendar by adding the id attribute like so: <strong>%s</strong>. You can find the ID in the administration area of your appointment scheduler under <strong>Configuration/Schedules</strong> in the text box <strong>HTML code</strong>.'), '[' . $view->placeHolder . ']', '[' . $view->placeHolder . ' id="..."]')?></p>

<form method="post" action="./options-general.php?page=<?php echo $view->settingOptionName ?>-settings&tab=general" id="<?php echo $view->settingOptionName ?>_settings" style="margin-top:2em;margin-left:1em;">


<table class="form-table">


  <tr>
    <th scope="row">
        <label for="calendarUrl" style="font-weight:bold;"><?php echo $this->__('Calendar URL') ?></label>
    </th>
    <td>
        <input type="text" name="calendarUrl" id="calendarUrl" class="regular-text" value="<?php echo esc_html($option['calendarUrl']) ?>">
        <p class="description"><?php echo $this->__('Enter here the location (URL, link) of your calendar installation, either on your server or on Appointmind.') ?></p>
    </td>
  <tr>


  <tr>
    <th scope="row">
        <label for="iframeWidth" style="font-weight:bold;"><?php echo $this->__('Iframe Dimensions') ?></label>
    </th>
    <td>
    	<?php echo $this->__('Width') ?>
        <input type="text" name="iframeWidth" id="iframeWidth" style="width:50px;" value="<?php echo esc_html($option['iframeWidth']) ?>">
        <?php echo $this->__('Height') ?>
        <input type="text" name="iframeHeight" id="iframeHeight" style="width:50px;" value="<?php echo esc_html($option['iframeHeight']) ?>">
        <p class="description"><?php echo $this->__('Enter here the width and height of the iframe that is being displayed in your article(s). Valid units are px and %.') ?></p>
    </td>
  <tr>


  <tr>
    <th scope="row">
        <label for="popupWidth" style="font-weight:bold;"><?php echo $this->__('Popup Dimensions') ?></label>
    </th>
    <td>
    	<?php echo $this->__('Width') ?>
        <input type="text" name="popupWidth" id="popupWidth" style="width:50px;" value="<?php echo esc_html($option['popupWidth']) ?>">
        <?php echo $this->__('Height') ?>
        <input type="text" name="popupHeight" id="popupHeight" style="width:50px;" value="<?php echo esc_html($option['popupHeight']) ?>">
        <p class="description"><?php echo $this->__('Enter here the width and height of the popup window that is being opened by a link in your sidebar if a visitor clicks on it. Valid units are px and %.') ?></p>
    </td>
  <tr>

  <tr>
    <th scope="row">
        <label for="widgetText" style="font-weight:bold;"><?php echo $this->__('Widget Text') ?></label>
    </th>
    <td>
        <textarea name="widgetText" id="widgetText" style="width:550px;height:200px;"><?php echo esc_html($option['widgetText']) ?></textarea>
        <p class="description"><?php echo $this->__('Standard text') ?>: <?php echo $this->__('Schedule an appointment with us online.') ?></p>
    </td>
  <tr>

  <tr>
    <th scope="row">
    </th>
    <td>
<p class="submit"><input type="submit" name="save" id="submit" class="button button-primary" value="<?php echo $this->__('Save') ?>"></p>
    </td>
  <tr>

</table>



</form>
</div>