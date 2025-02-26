<?php 





function aistore_recharge_settings_group()

{

    //register our settings

    register_setting('aistore_recharge_group', 'aistore_username');

    register_setting('aistore_recharge_group', 'aistore_password');

}



function aistore_recharge_settings_page()

{

?>

<div class="wrap">

<h1>Aistore Recharge </h1>

<p>This form is visible to only admin </p>





<P> Talk to the support at <a href="https://api.whatsapp.com/send?phone=919682780263&text=Hello%20I%20need%20support%20for%20the%20Recharge%20plugin" target="_blank" >Talk to whatsapp +91 9682780263</a>


 


<form method="post" action="options.php">

    <?php

    settings_fields('aistore_recharge_group');

?>

    <?php

    do_settings_sections('aistore_recharge_group');

?>

    <table class="form-table">

        <tr valign="top">

        <th scope="row">API Username</th>

        <td><input type="text" name="aistore_username" value="<?php

    echo esc_attr(get_option('aistore_username'));

?>" /></td>

        </tr>

         

        <tr valign="top">

        <th scope="row">API Password</th>

        <td><input type="text" name="aistore_password" value="<?php

    echo esc_attr(get_option('aistore_password'));

?>" /></td>

        </tr>

        

        

    </table>

    

    <?php

    submit_button();

?>

<p>You can get username and password via discussion with support team(whatsapp +91 9682780263). Their is a charge of Rs 5000 for this.   </p>

</form> 
 

<p> In case you find table not find error in the database please run this command and create table </p>

<?php


      

/////////////////////



    
    global $wpdb;
    
    
    
    
    
    $table_name = $wpdb->prefix . 'recharge';
    
    
    
    
     
        
        $sql = "CREATE TABLE " . $table_name . " (

 `id` int(10) NOT NULL AUTO_INCREMENT,

  `user_id` int(10) NOT NULL,

  `recharge_number` varchar(10) NOT NULL,

  `recharge_operator` varchar(25) NOT NULL,

  `recharge_amount` int(5) NOT NULL,

  `start_balance` int(10) NOT NULL,

  `end_balance` int(10) NOT NULL,

  `description` varchar(200) NOT NULL,

  `url_hit` varchar(250) NOT NULL,

  `url_response` varchar(1000) NOT NULL,

  `message` varchar(250) NOT NULL,

  `api_resp_id` varchar(250) NOT NULL,

  `operator_transaction_id` varchar(250) NOT NULL,

  `status_url` varchar(500) NOT NULL,

  `status_response` varchar(500) NOT NULL,

  `ip_address` varchar(20) NOT NULL,

  `status` varchar(10) NOT NULL DEFAULT 'Success',

  `Error` varchar(10) NOT NULL,

  PRIMARY KEY (`id`)  	 

		);";










///////////////////////////  
echo  $sql;




}?>