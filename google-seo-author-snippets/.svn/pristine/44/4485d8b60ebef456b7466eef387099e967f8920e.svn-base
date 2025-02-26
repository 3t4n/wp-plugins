<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function gsas_support_form() {
	global $wpdb;
?>

    <div class = 'wrap' id="supportmain">
	<h3 style="margin-left:15px;padding-top:20px"> Contact Us </h3>
	<div style = 'width:60%';>
	    <div id = 'warn' style = 'display:none'> </div>
	    <div id = 'showMsg' style = "color:red;margin-left:30px;font-size:20px;" /> </div>
	<table >

	    <tr style="border-top: 1px solid #dddddd;">
		<td id="tdalign"><b> First name</b> <span class="mandatory">*</span></td><td id="tdalign"><input type="text" id="firstname" placeholder="First name" name="firstname" /></td>
		<td id="tdalign"> <b>Last name </b> <span class="mandatory">*</span></td><td id="tdalign"><input type="text" id="lastname" placeholder="Last name" name="lastname" />
		    <input type="hidden" id="smackmailid" name="smackmailid" value="helpdesk@smackcoders.com" />
		    <?php wp_nonce_field( 'gsas_nonce_value', 'gsas_nonce_field' ); ?>
		</td>
		<td id="tdalign"><b> Related To </b> </td>
		<td id="tdalign"><select name="subject" id = "msg">
			<option>Support</option>
		    </select>
		</td>
	    </tr>
	    <tr>
		<td id="tdalign"> <b> Message </b> <span class="mandatory">*</span></td>
		<td colspan="5">
		    <textarea class="form-control" rows="3" name="message" id="message" style="width:780px"></textarea>
		</td>
	    </tr>
	    <tr><td d="tdalign" colspan="6">
		    <div style = 'margin-top:25px;float:right;margin-right:50px' ><input class="button button-primary" type="submit" name="send_mail" onclick = "sendemail2smackers();" /></div>
		</td></tr>
	</table>
    </div>
    </div>
<?php
}

function FAQ(){ 
?>

<div>
    <h1>FAQ's:</h1>

    <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"> 
<div style="padding:3%;""><p style="padding:1%;color:white;background-color:#7722a4;margin-bottom: 0px; "> How to add multiple Snippets for one post? <br></p><span>

<p style="padding-left:4%;color:#090909;background-color:#c287eb;margin-top: 0px;">First select the one snippet and go to post page,there you will find the Added snippet fill the fields asked and publish it!<br><br>>Now if you like to add another snippet the go to the configurations page and select the another snippet which you like to use,then go to the post page there you will find the recently added snippet,Fill the fields asked in it..<br><br>>Now it is added to with th first added snippet!!. Similarly you can add any number of snippets for one post
<br><br>
 </p></span></div>

    </div><br>
    <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"> 
<div style="padding:3%;""><p style="padding:1%;color:white;background-color:#7722a4;margin-bottom: 0px; "> What is Based on Format? <br></p><span>

<p style="padding-left:4%;color:#090909;background-color:#c287eb;margin-top: 0px;">Based on format is giving snippets based on the post-format you use in the Posts.<br><br>
<span style="padding-left: 2%;">If you enabled this then the choice choosing snippets is not worked<br><br>
Snippets will comes as Follows:
</span><br><br>

<span style="padding-left: 3%;"> Audio -- Music snippets</span><br><br>
       <span style="padding-left: 3%;" >Video -- Video snippets   
   </span ><br><br>
Note: It is for only posts.

<br><br>
 </p></span></div>

    </div><br>

</div>



<?php }
?>
