<div class="wrap">
    <h2>DigitalPUSH &raquo; <?php esc_html_e( 'Settings', 'digitalpush-notifications' ); ?></h2>

    <?php
    if ( isset( $this->message ) ) {
        ?>
        <div class="alert alert-info"><?php echo $this->message; ?></div>
        <?php
    }
    if ( isset( $this->errorMessage ) ) {
        ?>
        <div class="alert alert-danger"><?php echo $this->errorMessage; ?></div>
        <?php
    }
    ?>
	<style>
	.dgptable { padding:10px !important; }
	.btn-outline-secondary:hover { background:#fff !important; box-shadow: inset 0 3px 5px rgba(0,0,0,.2); }
	.btn-outline-secondary:active { background:#fff !important; box-shadow: inset 0 3px 5px rgba(0,0,0,.2); }
	.btn-outline-secondary.active { background:#fff !important; box-shadow: inset 0 3px 5px rgba(0,0,0,.2); }
	</style>
	<link rel="stylesheet" href="<?php echo $this->plugin->url . '/css/bootstrap.min.css' ; ?>">
	<script src="<?php echo $this->plugin->url . '/js/jquery.min.js' ; ?>" type="text-javascript"></script>
	<script src="<?php echo $this->plugin->url . '/js/popper.min.js' ; ?>" type="text-javascript"></script>
	<script src="<?php echo $this->plugin->url . '/js/bootstrap.min.js' ; ?>" type="text-javascript"></script>
    <div id="poststuff">
    	<div id="post-body" class="metabox-holder columns-2">
    		<!-- Content -->
    		<div id="post-body-content">
				<div id="normal-sortables" class="meta-box-sortables ui-sortable">
	                <div class="postbox">

	                    <div class="inside">
		                    <form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">


						<h1 class="hndle">Widget settings</h1><br><br>
							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Code key :</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" name="dgp_key" id="dgp_key" style="border:1px solid #8bc34a; background:#dcedc8;color:#558b2f;width:100%;" value="<?php echo $this->settings['dgp_key']; ?>" onmouseover="document.getElementById('codekeyimg').style.display=''" onmouseout="document.getElementById('codekeyimg').style.display='none'">
								  <img id="codekeyimg" src="<?php echo $this->plugin->url . '/images/code_key.jpg' ; ?>" style="position:absolute;left:0px;top:100%;width:100%;z-index:100000;display:none;border:1px solid:#ddd;box-shadow:0px 2px 5px #ccc;">
								</div>
							  </div>


							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in enabled :</label>
								<div class="col-sm-6">
		                    		<select name="dgp_nativerequest" id="dgp_nativerequest" class="form-control">
		                    			<option value="1" <?php if($this->settings['dgp_nativerequest']=='1'){ echo 'selected'; } ?>>No</option>
		                    			<option value="0" <?php if($this->settings['dgp_nativerequest']=='0'){ echo 'selected'; } ?>>Yes</option>
		                    		</select>
								</div>
							  </div>


							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in delay :</label>
								<div class="col-sm-6">
		                    		<select name="dgp_delay" id="dgp_delay"  class="form-control">
		                    			<option value="0" <?php if($this->settings['dgp_delay']=='0'){ echo 'selected'; } ?>>No delay</option>
		                    			<option value="3000" <?php if($this->settings['dgp_delay']=='3000'){ echo 'selected'; } ?>>3 seconds</option>
		                    			<option value="5000" <?php if($this->settings['dgp_delay']=='5000'){ echo 'selected'; } ?>>5 seconds</option>
		                    			<option value="7000" <?php if($this->settings['dgp_delay']=='7000'){ echo 'selected'; } ?>>7 seconds</option>
		                    			<option value="10000" <?php if($this->settings['dgp_delay']=='10000'){ echo 'selected'; } ?>>10 seconds</option>
		                    		</select>
								</div>
							  </div>


							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in style :</label>
								<div class="col-sm-2">
		                    			<label>
		                    				<img src="<?php echo $this->plugin->url . '/images/overlay.jpg' ; ?>" style="max-width:100%;height:auto;border:1px solid #ddd;" class="img-fluid"><br>
		                    				<input class="form-control" type="radio" name="dgp_type" id="dgp_type1" value="overlay" <?php if($this->settings['dgp_type']=='overlay' || $this->settings['dgp_type']==''){ echo 'checked'; } ?>> Overlay
		                    			</label>
								</div>
								<div class="col-sm-2">
		                    			<label>
		                    				<img src="<?php echo $this->plugin->url . '/images/flying.jpg' ; ?>" style="max-width:100%;height:auto;border:1px solid #ddd;" class="img-fluid"><br>
		                    				<input class="form-control" type="radio" name="dgp_type" id="dgp_type2" value="flying" <?php if($this->settings['dgp_type']=='flying'){ echo 'checked'; } ?>> Flying&nbsp;box
		                    			</label>
								</div>
								<div class="col-sm-2">
		                    			<label>
		                    				<img src="<?php echo $this->plugin->url . '/images/balloon.jpg' ; ?>" style="max-width:100%;height:auto;border:1px solid #ddd;" class="img-fluid"><br>
		                    				<input class="form-control" type="radio" name="dgp_type" id="dgp_type3" value="balloon" <?php if($this->settings['dgp_type']=='balloon'){ echo 'checked'; } ?>> Balloon
		                    			</label>
								</div>
								<div class="col-sm-6 offset-sm-2">
									<br>
		                    			<span style="font-weight:800;color:green;">Tip!</span> If you have a <b>https://</b> website, you can bypass the pre-message and request the permission directly from your page:
										<ol>
											<li>Download the service worker JavaScript file : <a href="https://digitalpush.org/member/download-sw.php">Download the Service Worker SDK file</a></li>
											<li>Upload the service worker in your website's base directory. After uploading the file should be available here: <a target=_blank href="https://<?php echo parse_url(get_site_url())['host']; ?>/dgp-sw.js">https://<?php echo parse_url(get_site_url())['host']; ?>/dgp-sw.js</a></li>
										</ol>
								</div>
							  </div>
							  
							  
							  

							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in theme :</label>

								<div class="col-sm-6 btn-group">
									<label class="btn btn-outline-secondary <?php if($this->settings['dgp_theme']=='8bc34a' || $this->settings['dgp_theme']==''){ echo 'active'; } ?> btn-label1 col-md-2" style="display:inline-block;color:#8bc34a;font-weight:bold;text-align:left;"><input style="display:none;" autocomplete="off" type="radio" name="dgp_theme" value="8bc34a" <?php if($this->settings['dgp_theme']=='8bc34a' || $this->settings['dgp_theme']==''){ echo 'checked'; } ?>>Green</label>
									<label class="btn btn-outline-secondary <?php if($this->settings['dgp_theme']=='4285f4'){ echo 'active'; } ?> btn-label1 col-md-2" style="display:inline-block;color:#4285f4;font-weight:bold;text-align:left;"><input style="display:none;" autocomplete="off" type="radio" name="dgp_theme" value="4285f4" <?php if($this->settings['dgp_theme']=='4285f4'){ echo 'checked'; } ?>>Blue</label>
									<label class="btn btn-outline-secondary <?php if($this->settings['dgp_theme']=='a577f7'){ echo 'active'; } ?> btn-label1 col-md-2" style="display:inline-block;color:#a577f7;font-weight:bold;text-align:left;"><input style="display:none;" autocomplete="off" type="radio" name="dgp_theme" value="a577f7" <?php if($this->settings['dgp_theme']=='a577f7'){ echo 'checked'; } ?>>Purple</label>
									<label class="btn btn-outline-secondary <?php if($this->settings['dgp_theme']=='ff7200'){ echo 'active'; } ?> btn-label1 col-md-2" style="display:inline-block;color:#ff7200;font-weight:bold;text-align:left;"><input style="display:none;" autocomplete="off" type="radio" name="dgp_theme" value="ff7200" <?php if($this->settings['dgp_theme']=='ff7200'){ echo 'checked'; } ?>>Orange</label>
									<label class="btn btn-outline-secondary <?php if($this->settings['dgp_theme']=='616161'){ echo 'active'; } ?> btn-label1 col-md-2" style="display:inline-block;color:#616161;font-weight:bold;text-align:left;"><input style="display:none;" autocomplete="off" type="radio" name="dgp_theme" value="616161" <?php if($this->settings['dgp_theme']=='616161'){ echo 'checked'; } ?>>Grey</label>
									<label class="btn btn-outline-secondary <?php if(!in_array($this->settings['dgp_theme'],array('8bc34a','4285f4','a577f7','ff7200','616161'))){ echo 'active'; } ?> btn-label1 col-md-2" style="display:inline-block;font-weight:bold;text-align:left;background-image: linear-gradient(to left, violet, indigo, blue, green, orange, red);   -webkit-background-clip: text; color: <?php if(!in_array($this->settings['dgp_theme'],array('8bc34a','4285f4','a577f7','ff7200','616161'))){ echo '#'.$this->settings['dgp_theme']; } else { echo '#333333'; } ?>;" id="customlabel"><input style="display:none;" autocomplete="off" type="radio" name="dgp_theme" value="<?php if(!in_array($this->settings['dgp_theme'],array('8bc34a','4285f4','a577f7','ff7200','616161'))){ echo $this->settings['dgp_theme']; } else { echo '333333'; } ?>" id="customtheme"  <?php if(!in_array($this->settings['dgp_theme'],array('8bc34a','4285f4','a577f7','ff7200','616161'))){ echo 'checked'; } ?>><span id="customcolortext">Custom</span><input id="customcolor" type="color" style="display:none;" /></label>
								</div>
								
							  </div>




							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in title :</label>
								<div class="col-sm-6">
									<input name="dgp_title" id="dgp_title" class="form-control" type="text" value="<?php if($this->settings['dgp_title']==''){ echo 'Don\'t miss it!'; } else { echo $this->settings['dgp_title']; } ?>">
		                    		<small> &nbsp; Displayed on "Overlay" style only.</small>
								</div>
							  </div>




							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in message :</label>
								<div class="col-sm-6">
									<textarea name="dgp_message" id="dgp_message" class="form-control" style="border: 1px solid #7e8993;"><?php if($this->settings['dgp_message']==''){ echo 'Enable notifications to always stay up-to-date with the latest news!'; } else { echo $this->settings['dgp_message']; } ?></textarea>
		                    		<small> &nbsp; Displayed on "Overlay" and "Flying box" styles only.</small>
								</div>
							  </div>



							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in allow button text :</label>
								<div class="col-sm-6">
									<input name="dgp_allowbutton" id="dgp_allowbutton" class="form-control" type="text" style="max-width:200px;" value="<?php if($this->settings['dgp_allowbutton']==''){ echo 'ALLOW'; } else { echo $this->settings['dgp_allowbutton']; } ?>">
		                    		<small> &nbsp; Displayed on "Overlay" and "Flying box" pre-message only.</small>
								</div>
							  </div>


							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in reject button text :</label>
								<div class="col-sm-6">
										<input name="dgp_denybutton" id="dgp_denybutton" class="form-control" type="text" style="max-width:200px;" value="<?php if($this->settings['dgp_denybutton']==''){ echo 'No thanks'; } else { echo $this->settings['dgp_denybutton']; } ?>">
		                    			<small> &nbsp; Displayed on "Overlay" and "Flying box" styles only.</small>
								</div>
							  </div>


							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Double opt-in logo URL :</label>
								<div class="col-sm-6">
										<input name="dgp_bgimage" id="dgp_bgimage" class="form-control" type="text" value="<?php if($this->settings['dgp_bgimage']==''){ echo ''; } else { echo $this->settings['dgp_bgimage']; } ?>">
		                    			<small> &nbsp; Your website's logo. Type the full URL path including http:// or https://</small>
								</div>
							  </div>



						<h1 class="hndle">Auto-notifications on new posts</h1><br><br>
							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">Send notifications on new post :</label>
								<div class="col-sm-6">
		                    		<select name="dgp_autosend" id="dgp_autosend" class="form-control">
		                    			<option value="no" <?php if($this->settings['dgp_autosend']=='' || $this->settings['dgp_autosend']=='no' ){ echo 'selected'; } ?>>Do not send</option>
		                    			<option value="yes" <?php if($this->settings['dgp_autosend']=='yes' ){ echo 'selected'; } ?>>Yes, send!</option>
		                    		</select>
								</div>
							  </div>



							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right">API key :</label>
								<div class="col-sm-6">
		                    		<input style="border:1px solid #673ab7; background:#d1c4e9;color:#4527a0;width:100%;" name="dgp_api" id="dgp_api" class="form-control" type="text" value="<?php echo $this->settings['dgp_api']; ?>" onmouseover="document.getElementById('apikeyimg').style.display=''" onmouseout="document.getElementById('apikeyimg').style.display='none'">
		                    		<small>Required if you want to send notifications to your subscribers on each new post.</small>
		                    		<img id="apikeyimg" src="<?php echo $this->plugin->url . '/images/api_key.jpg' ; ?>" style="position:absolute;left:0px;bottom:100%;width:100%;z-index:100000;display:none;border:1px solid:#ddd;box-shadow:0px 2px 5px #ccc;">
								</div>
							  </div>


		                    	
		                    	<?php wp_nonce_field( $this->plugin->name, $this->plugin->name . '_nonce' ); ?>
							  <div class="form-group row">
								<label class="col-sm-2 col-form-label text-right"></label>
								<div class="col-sm-6">
									<input name="submit" type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save settings" />
								</div>
							  </div>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
						    </form>
	                    </div>
	                </div>
	                <!-- /postbox -->
				</div>
				<!-- /normal-sortables -->
    		</div>
    		<!-- /post-body-content -->

    		<!-- Sidebar -->
    		<div id="postbox-container-1" class="postbox-container">
    			<?php require_once( $this->plugin->folder . '/views/sidebar.php' ); ?>
    		</div>
    		
    		<!-- /postbox-container -->
    	</div>
	</div>
</div>

<script>
jQuery(document).ready(function($) {
	$(document).on('change', 'input[type=color]', function() {
	  this.parentNode.style.color = this.value;
	//  document.getElementById('customcolortext').innerHTML = this.value;
	  document.getElementById('customtheme').value=this.value.replace(/[^a-z0-9]/gi,'');
	});

	$("#customlabel").on('click',function(){
		document.getElementById("customcolor").focus();
		document.getElementById("customcolor").click();
	});

	$(".btn-label1").on('click',function(){
		$(".btn-label1").removeClass("active");
		$(this).addClass('active');
	});
});
</script>