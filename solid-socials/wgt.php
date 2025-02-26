<?php
$options = get_option('solid_socials');

$twitterHandle = $options['twitter_handle'];
$headerHeight = $options['header_height'];
$position = $options['position'];
$display = $options['display_options'];
$fb_option = $options['fb_option'];
$link_love = $options['link_love'];



?>


     
<div class="solid_socials <?php if($position == 1) {echo 'solid_socials_left';} else {echo 'solid_socials_right';} ?>" style="top:<?php echo $headerHeight."px"; ?>">
    <!-- Facebook -->
    <div id="fb-root"></div>
    <ul>
	<?php if(in_array('facebook',$display)){ ?>
	<li>
	    <span class="solid_socials_btn facebookBtn">
		<span class="solid_socials_btnInner">
			<?php if($fb_option == 'like'){ ?>
		                     <div class="fb-like" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
			<?php }
			else { ?>
				    <div class="fb-share-button" data-href="" data-type="box_count"></div>
				   <?php } ?>
		</span>
	    </span>
	</li>
	<?php } ?>
	<!-- Twitter -->
	<?php if(in_array('twitter',$display)){ ?>
	<li>
	    <span class="solid_socials_btn twitterBtn">
		<span class="solid_socials_btnInner">
		    <a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo $twitterHandle; ?>" data-count="vertical"  data-text="">Tweet</a> 
		</span>
	    </span>
	</li>
	<?php } ?>
	<!-- Stumbleupon -->
	<?php if(in_array('stumbleupon',$display)){ ?>
	<li>
	    <span class="solid_socials_btn stumbleBtn">
		<span class="solid_socials_btnInner">
		     <su:badge layout="5"></su:badge>
		</span>
	    </span>
	</li>
	<?php } ?>
	<!-- linkedIn -->
	<?php if(in_array('linkedIn',$display)){ ?>
	<li>
	    <span class="solid_socials_btn linkedInBtn">
		<span class="solid_socials_btnInner">
		    <script type="IN/Share" data-counter="top"></script>
		</span>
	    </span>
	</li>
	<?php } ?>
	<!-- Google + -->
	<?php if(in_array('googleplus',$display)){ ?>
	<li>
	    <span class="solid_socials_btn googleplusBtn">
		<span class="solid_socials_btnInner">
		    <div class="g-plusone" data-size="tall" ></div>
		</span>
	    </span>
	</li>
	<?php } ?>
    </ul>
    <span id="solid_credits">
	<?php if($link_love == '1'){ ?><a href="http://codeanthology.com/coding/solid-socials" target="_blank";>SOLID</a><?php } ?>
	<span id="solid_hide" <?php if($link_love != '1'){ echo "class='solid_socials-text-center'"; }?>></span>
    </span>

</div>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://platform.linkedin.com/in.js"></script>
<script src=" <?php echo site_url(); ?>/wp-content/plugins/solid-socials/js/solid-socials.js"></script>

</script>

