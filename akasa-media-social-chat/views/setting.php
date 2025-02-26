 <div class="wrap about-wrap">

 	<h1 class="title-plugins-ms">Welcome to Akasa Media JSC</h1>


<div class="ms-about-text">
Thank you for updating to the latest version! Akasa Media Social Live chat is a huge step forward in website. Look at all that's new.
</div>

<div class="ms-logo-template"></div>


<div class="list-button-social">

<a href="#" ><span class="dashicons dashicons-facebook"></span> Facebook</a>
<a href="#" ><span class="dashicons dashicons-twitter"></span> Twitter</a>
<a href="#" ><span class="dashicons dashicons-googleplus"></span> Google plus</a>

</div>


   <form method="post" action="options.php">
 <?php settings_fields('ms-group-plugins'); ?>

<div class="setting-social-plugins">
<ul class="tabs">
  <li class="active" rel="tab1">Facebook</li>
  <li rel="tab2">Zalo</li>
  <li rel="tab3">Skype</li>
</ul>

<div class="tab_container">



<div class="content-tab">


  <div id="tab1" class="tab_content">
  

<input type="text" id="linkfacebokpage" value="<?=get_option('linkfacebokpage'); ?>" class="form-input-setting" name="linkfacebokpage" placeholder="Link Page Facebook" />

<input type="text"  value="<?=get_option('appidfacebook'); ?>" id="appidfacebook" class="form-input-setting" name="appidfacebook" placeholder="App ID" />

<input type="text" name="pageidfacebook" value="<?=get_option('pageidfacebook'); ?>" id="pageidfacebook" class="form-input-setting" placeholder="Page ID" />


<ul>





<li>
	<div class="left">
  <label class="switch switch-flat">
	<input class="switch-input" <?php 
	if(get_option('enablecheckboxfb')){
		echo 'checked';
	}
	?> name="enablecheckboxfb" id="enablecheckboxfb" type="checkbox" />
	<span class="switch-label" data-on="On" data-off="Off"></span> 
	<span class="switch-handle"></span> 
</label>
<div class="info-text-switch">
<h4>Enable Facebook live Chat</h4>
<p>Enable Facebook live chat on website.</p>

</div>
</div>

	<div class="right">
<img src="<?=$linkplugins; ?>static/images/facebook-chat.png" class="border-bottom" />
	</div>
</li>



<li>

		<div class="left">
  <label class="switch switch-flat">
	<input <?php 
	if(get_option('customercheckboxfb')){
		echo 'checked';
	}
	?>  class="switch-input" name="customercheckboxfb" id="customercheckboxfb" type="checkbox" />
	<span class="switch-label" data-on="On" data-off="Off"></span> 
	<span class="switch-handle"></span> 
</label>
<div class="info-text-switch">
<h4>Enable Facebook live Customer chat</h4>
<p>Enable Facebook live Customer chat on website. Application requests AppID and page_id and Whitelisted Domains in Customer Chat Facebook.</p>
</div>
</div>

	<div class="right">
<img src="<?=$linkplugins; ?>static/images/fbctchat.png" />

</div>


</li>




</ul>



  </div>
  <!-- #tab1 -->



  <div id="tab2" class="tab_content">
  




<input type="text" name="oaidzalo" value="<?=get_option('oaidzalo'); ?>" id="oaidzalo" class="form-input-setting" placeholder="Oaid Zalo" />

<input type="text" value="<?=get_option('messagezalo'); ?>" name="messagezalo" id="messagezalo" class="form-input-setting" placeholder="Welcome Message" />

<input type="text" value="<?=get_option('autopopupzalo'); ?>" name="autopopupzalo" id="autopopupzalo" class="form-input-setting" placeholder="Zalo Autopopup" />

<input type="text" value="<?=get_option('widthzalo'); ?>" name="widthzalo" id="widthzalo" class="form-input-setting" placeholder="Width" />

<input type="text" value="<?=get_option('heightzalo'); ?>" name="heightzalo" id="heightzalo" class="form-input-setting" placeholder="Height" />


<ul>






<li>
	<div class="left">
  <label class="switch switch-flat">
	<input <?php 
	if(get_option('enablezalolive')){
		echo 'checked';
	}
	?>  class="switch-input" name="enablezalolive" id="enablezalolive" type="checkbox" />
	<span class="switch-label" data-on="On" data-off="Off"></span> 
	<span class="switch-handle"></span> 
</label>
<div class="info-text-switch">
<h4>Enable Zalo live Chat</h4>
<p>Enable Zalo live chat on website.</p>

</div>
</div>

	<div class="right">
<img src="<?=$linkplugins; ?>static/images/icon-128x128-4.png" class="border-bottom" />
	</div>
</li>






</ul>






  </div>
  <!-- #tab1 -->




  <div id="tab3" class="tab_content">
  	

<input type="text" name="contactidskype"  value="<?=get_option('contactidskype'); ?>"  id="contactidskype" class="form-input-setting" placeholder="Contact ID Skype" />


<ul>




<li>
	<div class="left">
  <label class="switch switch-flat">
	<input <?php 
	if(get_option('enableskypelive')){
		echo 'checked';
	}
	?> class="switch-input" name="enableskypelive" id="enableskypelive" type="checkbox" />
	<span class="switch-label" data-on="On" data-off="Off"></span> 
	<span class="switch-handle"></span> 
</label>
<div class="info-text-switch">
<h4>Enable Skype live Chat</h4>
<p>Enable Skype live chat on website.</p>

</div>
</div>

	<div class="right">
<img src="<?=$linkplugins; ?>static/images/skype.png" class="border-bottom" />
	</div>
</li>






</ul>





  </div>



















</div>






</div>

</div>


<div class="end-setting-plugins">
<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Setting">
</div>

</form>


</div>

</div>