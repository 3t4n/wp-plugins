<div class="wrap">
	<?php echo "<h2>".__(author_box_plugin_name.' - Help')."</h2>";?>
    <br />

		  
        
        
<h3>Have any issue ?</h3>

<p>Feel free to Contact with any issue for this plugin, Ask any question via forum <a href="<?php echo author_box_qa_url;?>"><?php echo author_box_qa_url;?></a> <strong style="color:#139b50;">(free)</strong>



</p>

<?php

$author_box_customer_type = get_option('author_box_customer_type');
$author_box_version = get_option('author_box_version');


?>
<?php
if($author_box_customer_type=="free")
	{

		echo '<p>You are using <strong> '.$author_box_customer_type.' version  '.$author_box_version.'</strong> of <strong>'.author_box_plugin_name.'</strong>.';
		
		echo '<a href="'.author_box_pro_url.'">'.author_box_pro_url.'</a></p>';
		
	}
elseif($author_box_customer_type=="pro")
	{

		echo '<p>Thanks for using <strong> '.$author_box_customer_type.' version  '.$author_box_version.'</strong> of <strong>'.author_box_plugin_name.'</strong> </p>';	
		
		
	}

 ?>




<?php
if($author_box_customer_type=="free")
	{
?>
<br />



<!-- 

<b>Premium Version Features</b><br />
<ul class="author_box-pro-features">

	<li style="color:#139b50;">Life time free update.</li>
	<li style="color:#139b50;">Life time support via forum.</li>
	<li style="color:#139b50;">7 Days refund.</li>

    

</ul>

-->




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
<div class="g-plusone" data-size="medium" data-href="<?php echo author_box_share_url; ?>"></div>

</td>
<td width="100px">
<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo author_box_share_url; ?>&amp;width=100&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=743541755673761" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>

 </td>
<td width="100px"> 





<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo author_box_share_url; ?>" data-text="<?php echo author_box_plugin_name; ?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>

</tr>

</table>
        
        
         
</div>
<style type="text/css">
.author_box-pro-features{}

.author_box-pro-features li {
  list-style: disc inside none;
}

</style>