<?php
// Kolom dan pilihan setting
echo'<font color="#666666" face="Georgia"><p>';
echo'<font face="Georgia"><h2>Account Configuration</h2></font>';
echo'Please do your button settings with your Liberty Reserve account! For your customers to send any amount  <br>';
echo'You only need to add <em>shortcode</em> <code>[libertyreserve]</code> to display Payment Button on a post, page or widgets.';
echo'<br><br>';

echo'<hr width="800" align="left" color="#CCCCCC" size="-1">'; // GARIS
echo '<form method="post" action="options.php" >'; wp_nonce_field('update-options');	
// account_number
echo 'Enter you account number (required). Examples: U1234567, X3214567<br>';
echo '<input type="text" name="account_number" value="' . get_option('account_number') . '" size="100" style="background:#FFFFCC"/>';
echo'<br>';echo'<br>';
// successful_payment_url
echo' Enter the page you wish your customers to go after a <font color="#0000FF">successful payment</font> <em>Examples: http://www.example.com/success.html</em><br>';
echo' <input type="text" name="successful_payment_url" value="' . get_option('successful_payment_url') . '" size="100" style="background:#FFFFCC"/> ';
echo'<br>';echo'<br>';
// canceled_payment_url
echo' Enter the page you wish your customers to go after a <font  color="#FF0000">failed/canceled payment</font>  <em>Examples: http://www.example.com/fail.html</em><br>';
echo' <input type="text" name="canceled_payment_url" value="' . get_option('canceled_payment_url') . '" size="100" style="background:#FFFFCC"/> ';
echo'<br>';echo'<br>';

echo'<h3>Advanced Options</h3>';
echo'<hr width="800" align="left" color="#CCCCCC" size="-1">'; // GARIS
echo'<font face="Lucida Sans">The following options allow you to authenticate the LR response and make sure that the transaction was made exactly as you requested. In order to use these advanced options you will have to create a SCI store inside your account: <a href="https://www.libertyreserve.com/en/login" target="_blank" title="Login Liberty Reserve">login to your account</a> , go to " <font color="#0000FF">Merchant Tools</font> ", select " <font color="#0000FF">Create new store</font> " and fill all the appropriate fields. </font>';
echo'<br>';echo'<br>';
// store_name
echo' Enter the store name';
echo' <input type="text" name="store_name" value="' . get_option('store_name') . '" size="100" style="background:#FFFFCC"/> ';
echo'<br>';echo'<br>';
// override_status_url
echo' Override the status URL that was specified in your store settings. You may enter URL or email link. <br><em>Examples: http://www.example.com/status.aspx, mailto:mymail@example.com</em><br>';
echo' <input type="text" name="override_status_url" value="' . get_option('override_status_url') . '" size="100" style="background:#FFFFCC"/> ';
echo'<br>';echo'<br>';
// Gambar tombol
echo' Image Button URL';
echo' <input type="text" name="image_button_url" value="' . get_option('image_button_url') . '" size="100" style="background:#FFFFCC"/> ';
echo'<br>';

echo '<input type="hidden" name="action" value="update" />';
echo '<input type="hidden" name="page_options" value="account_number,successful_payment_url,canceled_payment_url,store_name,override_status_url,image_button_url" />';
echo '<p class="submit"><input type="submit" name="Submit" value="Save Changes" /></p>';

echo '<p>
<h2>ATTENTION PLEASE !</h2>
<ol>
  <li>Your customers send payments  any amount</li>
  <li>Currency USD</li>
  <li>All method the transaction data = GET </li>
</ol>
</p>';
echo'<br>';echo'<br>';
//
echo'
<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	color: #999999;
	font-family: Georgia, "Times New Roman", Times, serif;
}
-->
</style>
<div align="center" class="style1">Providing web design services, web development, web optimization and online marketing.<br> We are competent and focused on the manufacture of professional web services, web company, web school. <br>We help your business to do marketing, online publicity and promotions on the internet who managed optimally. <br><br> 
<a href="https://sci.libertyreserve.com/en?lr_acc=U0407178&lr_store=SILMARWENY&lr_currency=LRUSD&lr_success_url=http%3a%2f%2fsilmarweny.com%2fpayment-confirmation%2f&lr_success_url_method=GET&lr_fail_url=http%3a%2f%2fsilmarweny.com%2f&lr_fail_url_method=GET&lr_status_url=mailto%3angadiluwih%40gmail.com&lr_status_url_method=GET" alt="DONATIONS With Liberty Reserve!" target="_blank"><img src="https://www.libertyreserve.com/downloads/banners/accept2.gif" alt="DONATIONS With Liberty Reserve!" border="0" title="DONATIONS With Liberty Reserve!"/></a>
</div><br>';
echo'
<style type="text/css">
<!--
.style1 {
	color: #999999;
	font-family: "Lucida Sans";
	font-size: 9px;
}
-->
</style>
<div align="center"><span class="style1">Liberty Reserve Payment WPPlugin &copy; 2010 - 2011 <a href="http://profiles.wordpress.org/users/papadestra/" target="_blank">Papa Destra.</a> &nbsp;-&nbsp;<a href="http://www.papadestra.com" target="_blank">http://www.papadestra.com</a><br>SUPPORT PROJECT : SILMARWENY - <a href="http://www.silmarweny.com" target="_blank">http://www.silmarweny.com</a></span></div><br>';

?>