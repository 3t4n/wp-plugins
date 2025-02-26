<style>
.projectname {
	border-radius: 2px;
	font-size: 14px;
	font-weight: 500;
}
.textarea {
	width: 600px;
	height: 100px;
	border-radius: 3px;
}
.add-btn {
	text-align: left;
}
#abcd {
	border: 1px solid #ccc;
	background: #e5e5e5;
	border-radius: 4px;
	padding: 7px;
}
.sub-project {
	width: 160px;
	padding: 3px;
	font-size: 16px;
	font-weight: bold;
}
.html-text-append #wp--wrap {
	width: 600px;
}
.html-text-append div#wp--editor-tools {
	display: none;
}
.html-text-append div#qt__toolbar {
	display: none;
}
.widget-outer-container {
	width: 100%;
	position: relative;
}
.widget-left-side {
	position: absolute;
	left: 0;
	top: 0;
	width: 480px;
}
.widget-right-side {
	width: 100%;
	padding-left: 480px;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
}
.widget-right-side iframe {
	border-left: thin solid #ccc;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
}
.widget-editor #wp--wrap, .widget-editor #wp--editor-container, .widget-editor textarea {
	width: 100%;
}
.widget-editor textarea {
	height: 210px !important;
	font-size: 12px;
}
#wpbody {
	width: 100%;
}
#wpcontent {
	background: #fff;
	width: 100%;
	margin: 0;
	padding-left: 180px;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
}
#wpbody-content {
	padding: 0;
}
.wrap {
	margin: 0;
	width: 100%;
}
.wrap form {
	width: 100%;
}
html, body {
	height: 100%;
}
#wpwrap, #wpcontent, #wpbody, #wpbody-content, .wrap, .wrap form, .widget-outer-container, .widget-right-side {
	height: 100%;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	margin: 0;
	overflow-y: hidden;
}

@media all and (max-width: 768px) {
.widget-right-side {
	display: none;
}
.widget-left-side { 
	position: relative;
	width: 100%;
}
.widget-editor textarea { 
	height: auto !important;
}
#wpwrap, #wpcontent, #wpbody, #wpbody-content, .wrap, .wrap form, .widget-outer-container, .widget-right-side {
	overflow: auto;
}
}
</style>

<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if(isset($_POST['project_submit']) && isset( $_POST['appocalypsisSave'])  && wp_verify_nonce($_POST['appocalypsisSave'], 'appcalypsisSaveChanges' )) {
       $settingValue =  $_POST[APCL_SETTING_KEY];
       $settingValue = sanitize_text_field($settingValue);
       update_option(APCL_SETTING_KEY, $settingValue); 
}
$settingValue = get_option(APCL_SETTING_KEY, "[SET YOUR KEY HERE]");
 
?>

<div class="wrap html-text-append">
  <form action="" method="post">
    <?php wp_nonce_field( 'appcalypsisSaveChanges', 'appocalypsisSave' ); ?>
    <div class="widget-outer-container">
      <div class="widget-left-side">
        <table id="myTable" class="table table-settings" width="96%">
          <tr>
            <td><h1 style="font-weight:300">Appocalypsis Widgets</h1></td>
          </tr>
          <tr>
            <td><strong> Steps to add APPOCALYPSIS Widgets to your Website:</strong>
              <ol>
                <li>Make sure you have an Account at <strong>Appocalypsis.com</strong>. If you do not have an Account <a href="https://www.appocalypsis.com/register" target="_blank">click here</a> to create one for FREE (up to 1000 pageviews per month)</li>
                <li><a href="https://www.appocalypsis.com/login" target="_blank">Log in</a> to your Account and navigate to the <a href="https://www.appocalypsis.com/websites" target="_blank">Websites</a> section</li>
                <li>Click on the Key and COPY the Key.</li>
                <li>Now PASTE the Key in the following field: <input type="text" id="<?php echo APCL_SETTING_KEY; ?>" name="<?php echo APCL_SETTING_KEY; ?>" value="<?php echo $settingValue; ?>" /></li>
                <li>Store the Key, click the following button: <input class="sub-project button button-primary" type="submit" name="project_submit" value="SAVE"/></li>
                <li>Navigate to the <a href="https://www.appocalypsis.com/websites" target="_blank">Websites</a> section and click Verify Website</li>
                <li>YOU ARE GOOD TO GO!!! Click here to <a href="https://www.appocalypsis.com/web-elements" target="_blank">manage</a> your widgets!</li>
              </ol></td>
          </tr>
          <tfoot>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td><br>
                If you face an trouble, feel free to visit our awesome <a href="https://www.appocalypsis.com/support" target="_blank">Support Center</a> <br>
                Latest Templates <a href="https://www.appocalypsis.com/templates" target="_blank">VIEW</a></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="widget-right-side">
      </div>
    </div>
  </form>
</div>
<style>
#wpfooter { 
    display: none !important;
}
</style>
