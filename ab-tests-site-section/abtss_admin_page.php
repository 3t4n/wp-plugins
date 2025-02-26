<?php
add_action('admin_menu', 'abtss_menu');

function abtss_menu() {
add_options_page( "A/B Site Section", "A/B Site Section", "delete_users", "abtss", "abtss");
}


function abtss(){


if(isset($_POST['tcrsupc'])){
update_option("test_customer_redirect_section_url", $_POST['test_customer_redirect_section_url']);
update_option("test_customer_redirect_section_url_path", $_POST['test_customer_redirect_section_url_path']);
update_option("test_customer_interval", $_POST['test_customer_interval']);

$tcrsu=get_option("test_customer_redirect_section_url");
$tcrsup=get_option("test_customer_redirect_section_url_path");
$tci=get_option("test_customer_interval");
}else{
$tcrsu=get_option("test_customer_redirect_section_url");
$tcrsup=get_option("test_customer_redirect_section_url_path");
$tci=get_option("test_customer_interval");
}

?>


<div class="wrap">
<?php screen_icon(); ?>
<h2><?php _e('A/B Testing Site Section'); ?></h2>

<div id="container">

		
		<section id="main">
You need for some user a different page?<br />
For example you have two different online stores and want to test them against each other.<br />
This is your plugin.<br />
<form method="POST" action="">




		


<hr>


<br>
First Specify the URL you want to replace:<br />
<input type="text" name="test_customer_redirect_section_url" value="<?php echo $tcrsu; ?>" size=120 /><br />
Specify the re-direction of the URL above:<br />
<input type="text" name="test_customer_redirect_section_url_path" value="<?php echo $tcrsup; ?>" size=120 /><br />
Last but not least specify the request interval when it happen.<br>(Be careful with low numbers as some action produce a lot requests.)<br />
<input type="text" name="test_customer_interval" value="<?php echo $tci; ?>" size=5 /> <?php $rr=get_option("redirect_requests");echo " requests: ".$rr; ?><br />
<input type="hidden" name="tcrsupc" value="" size=5 />Suggestion is 100
<hr>
<br><br><input size="50" type="submit"  class="button button-primary button-large" value="Save changes"></form>
</div>
<?php
}



?>