<?php
	
	global $wpdb;
	
	// Include the stylesheet
	$style = plugins_url() . '/amazon-product-info/style.css';
	echo '<link rel="stylesheet" type="text/css" href="' . $style . '" />';
	
	$table_name = $wpdb->prefix . 'amazon_settings';
		

	// If POST is set, update database entries
	if ($_POST) {
		$api_key = $_POST['api_key'];
		$secret_key = $_POST['secret_key'];
		$associate_id = $_POST['associate_id'];
		$country = $_POST['country'];
		
		$sql_delete_settings = "DELETE FROM $table_name";
		$wpdb->query($sql_delete_settings);
		if(!$associate_id){
			$associate_id = "azscr-20";
		}
		
		$sql_amazon_settings = "INSERT INTO $table_name (api_key, secret_key, associate_id, country) VALUES ('$api_key', '$secret_key', '$associate_id', '$country')";
		$wpdb->query($sql_amazon_settings);
	}
	
	// Building queries for display in input boxes
	$sql_api_key = "SELECT api_key FROM $table_name";
	$sql_secret_key = "SELECT secret_key FROM $table_name";
	$sql_associate_id = "SELECT associate_id FROM $table_name";
	$sql_country = "SELECT country FROM $table_name";
	
?>

<div class="wrap">


<h2>Amazon Scraper Settings</h2>
<br>
This plugin was created by <a href="http://www.mattwolfe.net" target="_blank">Matt Wolfe</a>. For more details and training videos, be sure to join our update list below.
<br>
&nbsp;
<form name="amazon_settings" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="POST">
<table>
	<tr>
		<td>API Key: </td>
		<td><input type="text" name="api_key" value="<?php echo $wpdb->get_var($sql_api_key); ?>" /></td>
		<td>Get an API key at <a href="http://aws.amazon.com/" target="_blank">aws.amazon.com</a>.</td>
	</tr>
	<tr>
		<td>Secret Key: </td>
		<td><input type="text" name="secret_key" value="<?php echo $wpdb->get_var($sql_secret_key); ?>" /></td>
	    <td>Get a secret key at <a href="http://aws.amazon.com/" target="_blank">aws.amazon.com</a>.</td>
	</tr>
	<tr>
		<td>Associate ID</td>
		<td><input type="text" name="associate_id" value="<?php echo $wpdb->get_var($sql_associate_id); ?>" /></td>
		<td>Get an associate ID at <a href="https://affiliate-program.amazon.com/" target="_blank">affiliate-program.amazon.com/</a>.</td>
	</tr>
	<tr>
	    <td>Select Country</td>
	    <td>
	    <select name="country">
	    	<option <?php if($wpdb->get_var($sql_country)=="com"){ echo "selected='selected'";}?> value="com">United States</option>
	    	<option <?php if($wpdb->get_var($sql_country)=="ca"){ echo "selected='selected'";}?> value="ca">Canada</option>
	    	<option <?php if($wpdb->get_var($sql_country)=="co.uk"){ echo "selected='selected'";}?> value="co.uk">United Kingdom</option>
	    	<option <?php if($wpdb->get_var($sql_country)=="de"){ echo "selected='selected'";}?> value="de">Germany</option>
	    	<option <?php if($wpdb->get_var($sql_country)=="fr"){ echo "selected='selected'";}?> value="fr">France</option>
	    	<option <?php if($wpdb->get_var($sql_country)=="co.jp"){ echo "selected='selected'";}?> value="co.jp">Japan</option>
	    </select>
	    </td>
	</tr>
</table>

<p class="submit"><input type="submit" name="Save" value="Save Settings" /></p>

&nbsp;
<h2>Instructions For Use</h2>
To insert the title, description, and image from an Amazon product, use the shortcode <b>[azr-link asin="AMAZON ASIN #"]</b> on any post or page.<br>
Be sure to replace "AMAZON ASIN #" with the actual ASIN number from the product you are promoting.<br>
<br>
</form>
<br>
<A href="https://wolfeweb.leadpages.net/plugin-updates/" target="_blank"><h2>Register For Updates</h2></A>

<div id="WFItem582010" class="wf-formTpl">
    <form accept-charset="utf-8" action="https://app.getresponse.com/add_contact_webform.html"
    method="post">
        <div class="box">

            <div id="WFIcenter" class="wf-body">
                <ul class="wf-sortable" id="wf-sort-id">
                    <li class="wf-email" rel="undefined" style="display:  block !important;">
                        <div class="wf-contbox">
                            <div class="wf-labelpos">
                                <label class="wf-label">Email:</label>
                            </div>
                            <div class="wf-inputpos">
                                <input class="wf-input wf-req wf-valid__email" type="text" name="email"></input>
                            </div>
                            <em class="clearfix clearer"></em>
                        </div>
                    </li>
                    <li class="wf-submit" rel="undefined" style="display:  block !important;">
                        <div class="wf-contbox">
                            <div class="wf-inputpos">
                                <input type="submit" class="wf-button" name="submit" value="Sign Up!"
                                style="display:  inline !important; width: 121px !important;"></input>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <input type="hidden" name="webform_id" value="582010" />
    </form>
</div>

<script type="text/javascript" src="http://app.getresponse.com/view_webform.js?wid=582010&mg_param1=1"></script>

</div>
