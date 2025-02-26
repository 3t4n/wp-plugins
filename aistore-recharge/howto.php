<?php 



 


function aistore_recharge_howtosetup_page()

{

?>

<div class="wrap">

<h1>Aistore Recharge </h1>

<p>This form is visible to only admin. In this step I explain steps to start </p>


<P> Talk to the support at <a href="https://api.whatsapp.com/send?phone=919682780263&text=Hello%20I%20need%20support%20for%20the%20Recharge%20plugin" target="_blank" >Talk to whatsapp +91 9682780263</a>

<h2>Step 1 </h2>

 <p>
Create  these Pages <br />

Page 1 for prepaid recharge form and insert this shortcode [ AISTORERECHARGEFORM type="prepaid" ]  Remove spaces <br />

Page 2 for postpaid recharge form and insert this shortcode [ AISTORERECHARGEFORM type="postpaid" ]  Remove spaces<br />

Page 3 for DTH recharge form and insert this shortcode [ AISTORERECHARGEFORM type="dth" ] Remove spaces <br />

Page 4 for electricity recharge form and insert this shortcode [ AISTORERECHARGEFORM type="electricity" ]  Remove spaces <br />

Page 5 for gas recharge form and insert this shortcode [ AISTORERECHARGEFORM type="gas" ]  Remove spaces<br />
 
 

Page 6 for water recharge form and insert this shortcode [ AISTORERECHARGEFORM type="water" ]  Remove spaces <br />

 
Page 7 for report of recharge   and insert this shortcode [ AistoreRechargeReport  ]  Remove spaces <br />


</p>



<h2>Step 2 </h2>

 <p>
 
 Register at api.sakshamapp.com and get  username and password.

</p>

  

<h2>Step 3 </h2>

 <p>
Visit setting page and provide username and password page
</p>

<h2>Step 4 </h2>

 <p>

Setup you payment gateway and ensure that order status mark<i> <b>order completed</b></i> when customer complete the payment.
otherwise it will not send request to server for the recharge.
</p>



<h2>Step 5</h2>

 <p>

 Find the callback url and login api.sakshamapp.com and visit profile page and set your call back url to the profile so that automatic callbacks can be handles.
 <b>
 
<?php echo site_url(); ?>/wp-json/aistoreRecharge/v1/AcceptCallback/</b>
</p>


 <?php 
 
}
?>