<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>




<div class="wrap">
	<?php echo "<h2>".__(access_denied_plugin_name.' Help')."</h2>";?>
    <br />

		  
        
        
<h3>Have any issue ?</h3>

<p>Feel free to Contact with any issue for this plugin <a href="<?php echo access_denied_wp_url; ?>"><?php echo access_denied_conatct_url; ?></a>
</p>

<?php

$access_denied_customer_type = get_option('access_denied_customer_type');
$access_denied_version = get_option('access_denied_version');


?>
<?php
if($access_denied_customer_type=="free")
	{
		echo '<p>You are using <strong> '.$access_denied_customer_type.' version  '.$access_denied_version.'</strong> of '.access_denied_plugin_name.', To get more feature you could try our premium version. ';
		
		echo '<a href="'.access_denied_pro_url.'">'.access_denied_pro_url.'</a></p>';
		
		
	}
elseif($access_denied_customer_type=="pro")
	{
		echo '<p>Thanks for using <strong> '.$access_denied_customer_type.' version  '.$access_denied_version.'</strong> of <strong>'.access_denied_plugin_name.'</strong> </p>';
	}

 ?>




<?php
if($access_denied_customer_type=="free")
	{
?>
<br />
<b>Premium Version Features</b><br />

<ul class="access_denied-pro-features">

	<li>Life Time Automatic Update.</li>
	<li>Life Time Support via forum.</li>
	<li>7 Days Refund.</li>
</ul>



</p>
        
        
        
      <?php
      }
	  
	  ?>  
      
<br /> 
<h3>Please share this plugin with your friends?</h3>
<table>
<tr>
<td width="100px"> 
<!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>

<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-href="<?php echo access_denied_share_url; ?>"></div>

</td>
<td width="100px">
<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo access_denied_share_url; ?>&amp;width=100&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=743541755673761" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>

 </td>
<td width="100px"> 





<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo access_denied_share_url; ?>" data-text="Access Denied">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>

</tr>

</table>
        
        
         
</div>
<style type="text/css">
.access_denied-pro-features{}

.access_denied-pro-features li {
  list-style: disc inside none;
}

</style>