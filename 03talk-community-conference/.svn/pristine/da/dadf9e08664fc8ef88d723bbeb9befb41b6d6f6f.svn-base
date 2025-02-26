<script type="text/javascript">
function showbar(){
if  ( jQuery('#barstat').val() == "1"){
	jQuery('#conference_adminbar').hide();
	jQuery('#barstat').val("0"); 
}else{
	jQuery('#conference_adminbar').show(); 
	jQuery('#barstat').val("1"); 
	}
}
</script>
<?php 
if (get_option(conference_active) == "no")
{?>
		<div id="conference_container">
		<input type="hidden" id="barstat" class="barstat" value="0"/>
		<div id="conference_offline" style="background-color:#<?php echo get_option('conference_widget_color_offline');?>;">
		<div id="conference_data_container" style="padding-top:70px;">
		<div class="conference_status_offline" style="background-color:#<?php echo get_option('conference_widget_box_offline');?>;">
		<?php echo stripslashes(get_option('conference_widget_content_offline')); ?></div><!-- end conference_offline -->
		</div><!-- end conference_data_container -->
		<div id="conference_admin">
		<form method="post" action="/wp-content/plugins/03talk/03TALK.php">
		<?php wp_nonce_field('update-options'); ?>
		<input type="hidden" name="action" value="toggle">
		<a href="#" onclick="showbar(); return false;"><img src="/wp-content/plugins/03talk/images/status_offline.png" style="margin-left:230px;border:none;" title="Admin Quick Access" alt="Admin Quick Access" /></a>
		</div><!-- end conference_admin -->
		<div id="conference_adminbar" style="display:none;"><input id="conference_quickbox"  value="Admin Quick Password" onclick="jQuery('#conference_quickbox').val('');"  name="password" type="textbox"></form></div>
		</div><!-- end conference_container-->
		</div>
<?php }
else 
{ ?>
    	    <input type="hidden" id="barstat" class="barstat" value="0"/>
		<div id="conference_container">
		<div id="conference_online" style="background-color:#<?php echo get_option('conference_widget_color_online');?>;">
		<div id="conference_data_container">
		<div class="conference_number" style="background-color:#<?php echo get_option('conference_widget_box_online');?>;"><?php echo get_option('conference_number'); ?></div>
		<div class="conference_pin" style="background-color:#<?php echo get_option('conference_widget_box_online');?>;"><?php echo get_option('conference_pin'); ?></div>
		</div><!-- end conference_data_container -->
		<div id="conference_admin">
		<form method="post" action="/wp-content/plugins/03talk/03TALK.php">
		<?php wp_nonce_field('update-options'); ?>
		<input type="hidden" name="action" value="toggle">
		<a href="#" onclick="showbar(); return false;"><img src="/wp-content/plugins/03talk/images/status_offline.png" style="margin-left:230px;border:none;" title="Admin Quick Access" alt="Admin Quick Access" /></a>
		</div><!-- end conference_admin -->
		<div id="conference_adminbar" style="display:none;"><input id="conference_quickbox" name="password"  value="Admin Quick Password" onclick="jQuery('#conference_quickbox').val('');" type="textbox"></form></div>
		</div><!-- end conference_online -->
		</div> <!-- end conference_container -->
<?php }