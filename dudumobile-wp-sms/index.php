<?php







/* 



Plugin Name: DuduMobile WP-SMS



Plugin URI: http://seyekuyinu.com/dudumobile-wp-sms



Description: Corporate SMS  solutions lets you communicate instantly with individuals or groups of customers; employees or suppliers, using DuduMobile's SMS message service. 



Author URI: http://www.seyekuyinu.com/



Author: Seye Kuyinu



Version: 1.0.1



*/















function my_plugin_menu() {







  add_menu_page('SMS Send Page', 'DuduMobile', 'administrator', 'send', 'dudu_fire',plugins_url('dudu/images/dudu.ico'));



  add_submenu_page('send','Edit Authentication Details for your DuduMobile account','Settings','administrator',1,'dudu_auth_settings');



  add_submenu_page('send','About getting a recharge', 'Order SMS', 'administrator','order','dudu_order');



}











function dudu_order(){



?>



<div class="wrap">



	<div id="icon-dudu-sms" class="icon32"><br/></div>



	<h2>How to Order SMS</h2>



	







	<h4>Please fill in your detail</h4>

</div>





<?php



}







function dudusettings_update(){



	update_option('dudu_username', $_POST['dudu_username']);



	update_option('dudu_password', $_POST['dudu_password']);



	update_option('dudu_sendername', $_POST['dudu_sendername']);











}







function dudu_auth_settings(){







if($_POST['dudu_update_settings'] == 'true'){ 



dudusettings_update(); 



?>



<div class = "updated"><p><strong><?php _e('Options Saved');?></strong></p></div><?php







}



	?>



<div class="wrap">



	<div id="icon-themes" class="icon32"><br/></div>



	<h2>DuduMobile SMS settings</h2>



	







	<h4>Please fill in your details</h4>







	<form method="post" action="">



		<input type="hidden" name="dudu_update_settings" value="true" />



	<p><input type="text" name="dudu_username" id="dudu_username" size="30" value="<?php echo get_option('dudu_username'); ?>" /> Your DuduMobile Username</p>



	<p><input type="password" name="dudu_password" id="dudu_password" size="30" value="<?php echo get_option('dudu_password'); ?>" /> Your DuduMobile Password</p>



    <p><input type="text" name="dudu_sendername" id="dudu_sendername" size="11" value="<?php echo get_option('dudu_sendername'); ?>" /> The SMS Display Name</p>



	



	<p><input type="submit" name="dudu_submit" value="Update Options" class="button" /></p>



	</form>























<?php



}







function dudu_fire() {



?>







 <div class="wrap">



	<div id="icon-themes" class="icon32"><br/></div>



    <h2>DuduMobile Compose SMS</h2>







			<script language="javascript">



			



			function textCounter(field,cntfield,maxlimit) {



			if (field.value.length > maxlimit) // if too long...trim it!



			field.value = field.value.substring(0, maxlimit);



			// otherwise, update 'characters left' counter



			else



			cntfield.value = maxlimit - field.value.length;



			}



			



			</script>



 



	<form name="myForm" action="" method="post">



        <input type="hidden" name="sms_hidden_value" value="true" />











<?php //the credit check part 



$user = get_option('dudu_username');



$pass = get_option('dudu_password');



$url = "http://smsapi.dudumobile.com/credit.php?user=$user&pass=$pass";



	$check = file($url);



	foreach($check as $result){



	



	//the output is $result







	







}











?>























		<h4>Current Balance: <strong><?php echo $result; ?> </strong> </h4>



		<h4>Phone Numbers:</h4>



		<input name="dudu_numbers" type="text" id="dudu_number" value="" size="30" />



 		<h4>Compose SMS:</h4>







		<textarea name="textcomposed" wrap="physical" cols="50" rows="5"



		onKeyDown="textCounter(myForm.textcomposed,myForm.remLen1,160)"



		onKeyUp="textCounter(myForm.textcomposed,myForm.remLen1,160)">



		</textarea>	<br/>







		<input readonly type="text" name="remLen1" size="3" maxlength="3" value="160">characters left<br/>



		<p><input type="submit" name="send_sms" value="Submit" class="button" /></p>



		<br>



	</form>







 </div>



<?php



		if(isset($_POST['send_sms'])){



    



		$user = get_option('dudu_username');



        $pass = get_option('dudu_password');



		$from = get_option('dudu_sendername');



		$from = rawurlencode($from); 







		$textcomposed = $_POST['textcomposed'];



		$textcomposed = rawurlencode($textcomposed);



	



		$dudu_numbers = $_POST['dudu_numbers'];



		$url = "http://smsapi.dudumobile.com/index.php?user=$user&pass=$pass&from=$from&to=$dudu_numbers&msg=$textcomposed";



		// do sendmsg call



		$send = file($url);



}











	







?>











<?php



}







add_action('admin_menu', 'my_plugin_menu');





/**

function addHeaderCode(){

	echo '<link type="text/css" rel="stylesheet" href="' .get_bloginfo('wpurl').'/wp-content/plugins/dudu/help.css"/>'."\n";

	if(function_exists('wp_enqueue_script')){	

		wp_enqueue_script('dudu_css', get_bloginfo('wpurl').'/plugin-series.css', array('prototype'), '0.1');

		}

		

}

**/



?>