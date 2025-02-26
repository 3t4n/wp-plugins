<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="wrap">  
<h2>We use your entry below to generate your service. Please enter precisely.</h2>

 <?php $url =  plugin_dir_url(__FILE__); ?>

      
 
<?php

global $current_user;
$get_token=get_user_meta($current_user->ID, 'joleado_token', true);
//echo $get_token;

 global $current_user;

 
 if(isset($_POST['submit_status']))
 {
  
     
     check_admin_referer( 'joleado_track_my_action', 'my_joleado_chat_settings' );
 
	$tok=sanitize_text_field($_POST['txthidtoken']);

	$url = 'http://plus.joleado.com/wp_api?action=get_code&wp_token='.$tok;

   $get_data=wp_remote_get($url);
   
   $response = wp_remote_retrieve_body($get_data);
   
  

    $chat_code = json_decode($response,true);



if($chat_code['livechat_status'] == "INPROGRESS")
{
    
    	echo $chat_code['livechat_status'];



}
else
{
	$code=$chat_code['livechat_code'];
	

	
	$get_code=get_user_meta($current_user->ID, 'joleado_chat', true);
if($get_code == '')
{
	
 add_user_meta($current_user->ID, 'joleado_chat', $code);

}
else
{
	
	update_user_meta($current_user->ID, 'joleado_chat', $code);

}

echo $chat_code['livechat_status'];
echo '<p>Your service has been successfully installed.</p>';
echo 'Please look for login instructions to come to your email provided.';
}

	 
 }
if(isset($_POST['submit']))
{
       check_admin_referer( 'joleado_submit_my_action', 'my_joleado_chat_settings' );
    
	$email=sanitize_email($_POST['txtemail']);
	$name=sanitize_text_field($_POST['txtname']);
	$lname=sanitize_text_field($_POST['txtlastname']);
	$company=sanitize_text_field($_POST['txtcompany']);
	
	$phone=sanitize_text_field($_POST['txtphone']);
	
	$url = 'https://plus.joleado.com/wp_api?action=create_store&encid=VvHDjHZHd4sT+ydM3HIWIaf8vfKVYbWO';


            //The JSON data.
            $jsonData = array(
             'email'=>$email,
             'firstName'=>$name,
             'lastName'=>$lname,
             'company'=>$company,
             
             'phone'=>$phone
            );
            
            //Encode the array into JSON.
        $jsonDataEncoded = json_encode($jsonData);
        
       

      $post_data= wp_remote_post( $url, array(
    'method'      => 'POST',
    'timeout'     => 45,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => array(),
    'body'        => $jsonDataEncoded,
    'cookies'     => array()
    )
);
       $result = wp_remote_retrieve_body( $post_data );
    
         $tok1=explode(":'",$result);
         $tok=substr($tok1[1], 0, -2);
         

 $get_token=get_user_meta($current_user->ID, 'joleado_token', true);
if($get_token == '')
{
 add_user_meta($current_user->ID, 'joleado_token', $tok);
}
else
{
	update_user_meta($current_user->ID, 'joleado_token', $tok);
}

echo '<p>Your request is submitted successfully</p>';
	
}
//API Url

?>

<?php
$get_token=get_user_meta($current_user->ID, 'joleado_token', true);
if($get_token !='')
{
?>
<form action="" method="post">
<input type="hidden" name="txthidtoken" id="txthidtoken" value="<?php echo $get_token;?>">

<?php wp_nonce_field( 'joleado_track_my_action', 'my_joleado_chat_settings' ); ?>

<input type="submit" name="submit_status" value="Track Status" class="button button-primary">
</form>
<?php } ?>

<?php
if($get_token =='')
{
	?>
<form action="" method="post">
<table class="form-table">
<tr>
<th><label>Email</label></th>
<td><input type="email" name="txtemail" id="txtemail" class="regular-text" required></td>
</tr>
<th><label>First Name:<label></th>
<td><input type="text" name="txtname" id="txtname" class="regular-text" required></td>
</tr>
<tr>
<th><label>Last Name</label></th>
<td><input type="text" name="txtlastname" id="txtlastname" class="regular-text"></td>
</tr>
<tr>
<th><label>Company</label></th>
<td><input type="text" name="txtcompany" id="txtcompany" class="regular-text" required></td>
</tr>

<tr>
<th><label>Phone</label></th>
<td><input type="text" name="txtphone" id="txtphone" class="regular-text" required></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><span style="float: left;width: 100%;margin-bottom: 15px;font-size: 12px;">Privacy: We do not share your information with anyone.</span><input type="submit" name="submit" value="Submit" class="button button-primary"></td>
</tr>
</table>

<?php wp_nonce_field( 'joleado_submit_my_action', 'my_joleado_chat_settings' ); ?>
</form>
<?php } else {?>
<h4>JOLEADO has been installed into your Wordpress experience.</h4>
<h4>For more information and/or support: www.joleadosystem.com or call 866.629.7020</h4>

<?php } ?>
