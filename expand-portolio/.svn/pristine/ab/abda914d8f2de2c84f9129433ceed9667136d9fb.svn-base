<?php
add_action('admin_menu', 'h2cweb_menu');
function h2cweb_menu() {
register_setting( 'plugin_options', 'plugin_options', 'plugin_options_validate' );
add_settings_section('plugin_main', 'Main Settings', 'plugin_section_text', 'plugin');
add_settings_field('plugin_text_string', 'Plugin Text Input', 'plugin_setting_string', 'plugin', 'plugin_main');
}


function settingsPage() {?>
	<div class="wrap">
	<div class="icon32" id="icon-tools"> <br> </div>	
	
	<h2>Expand Portfolio <?php _e('Settings', 'h2cweb');?></h2>
<?php
	global $exp;
	if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['expsubmit']) {
		$exp = $_POST["h2cweb_settings"];
		update_option('h2cweb_settings', $exp);
		echo '<p><strong>'.__("Settings saved!", "h2cweb").'</strong></p>';
	}
?>

<h2 class="nav-tab-wrapper">  
            <a href="?post_type=porftfolio&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Display Options</a>  
            <a href="?page=sandbox_theme_options&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Options</a>  
        </h2>  
		
		<form action="" method="post" name="h2cweb_form_set">
		<?php
		function display_options()
		{
		?>
		<p><?php _e('Poster Size', 'h2cweb');?>:</p>
		<p><label><?php _e('Width', 'h2cweb');?></label> : <input type="text" name="h2cweb_settings[poster][width]" value="<?php echo $exp['poster']['width'];?>"></p>
		<p><label><?php _e('Height', 'h2cweb');?></label> : <input type="text" name="h2cweb_settings[poster][height]" value="<?php echo $exp['poster']['height'];?>"></p>
		<hr>
		<?php
		}
		?>
		
		<p><?php _e('Slideshow Image Size', 'h2cweb');?>:</p>
		<p><label><?php _e('Width', 'h2cweb');?></label> : <input type="text" name="h2cweb_settings[slide][width]" value="<?php echo $exp['slide']['width'];?>"></p>
		<p><label><?php _e('Height', 'h2cweb');?></label> : <input type="text" name="h2cweb_settings[slide][height]" value="<?php echo $exp['slide']['height'];?>"></p>
		<hr>
		<!-- <p><?php //_e('Sections to be shown', 'h2cweb');?>:</p>
		<p><input name="h2cweb_settings[section][desc]" type="checkbox" <?php //if($exp['section']['desc']) {echo "checked";}?>> <?php //_e('Description', 'h2cweb');?></p>
		<p><input name="h2cweb_settings[section][vid]" type="checkbox" <?php //if($exp['section']['vid']) {echo "checked";}?>> <?php //_e('Video', 'h2cweb');?></p>
		<p><input name="h2cweb_settings[section][cmnt]" type="checkbox" <?php //if($exp['section']['cmnt']) {echo "checked";}?>> <?php //_e('Comments', 'h2cweb');?></p>
		<p><input name="h2cweb_settings[section][photo]" type="checkbox" <?php //if($exp['section']['photo']) {echo "checked";}?>> <?php //_e('Photo', 'h2cweb');?></p>
		<hr> 
		<p><?php //_e('Default theme areas to hide', 'h2cweb');?>:</p>
		<p><input type="text" name="h2cweb_settings[hide]" value="<?php //echo $exp['hide'];?>"></p>
		<p><em><?php //_e('CSS style selectors of default theme areas to hide. Seperated by comma.', 'h2cweb');?></em></p>-->

		<p><input type="submit" name="expsubmit" class="button button-primary" value="<?php _e('Save Settings', 'h2cweb');?>"></p>
		</form>
	</div>
	
	<script>
            jQuery(document).ready(function($) {
                // Switches option sections
                $('.group').hide();
                var activetab = '';
                if (typeof(localStorage) != 'undefined' ) {
                    activetab = localStorage.getItem("activetab");
                }
                if (activetab != '' && $(activetab).length ) {
                    $(activetab).fadeIn();
                } else {
                    $('.group:first').fadeIn();
                }
                $('.group .collapsed').each(function(){
                    $(this).find('input:checked').parent().parent().parent().nextAll().each(
                    function(){
                        if ($(this).hasClass('last')) {
                            $(this).removeClass('hidden');
                            return false;
                        }
                        $(this).filter('.hidden').removeClass('hidden');
                    });
                });

                if (activetab != '' && $(activetab + '-tab').length ) {
                    $(activetab + '-tab').addClass('nav-tab-active');
                }
                else {
                    $('.nav-tab-wrapper a:first').addClass('nav-tab-active');
                }
                $('.nav-tab-wrapper a').click(function(evt) {
                    $('.nav-tab-wrapper a').removeClass('nav-tab-active');
                    $(this).addClass('nav-tab-active').blur();
                    var clicked_group = $(this).attr('href');
                    if (typeof(localStorage) != 'undefined' ) {
                        localStorage.setItem("activetab", $(this).attr('href'));
                    }
                    $('.group').hide();
                    $(clicked_group).fadeIn();
                    evt.preventDefault();
                });
            });
        </script>
<?php }
function stylingPage() {?>
	<div class="wrap exp-setting">
	<div class="icon32" id="icon-tools"> <br /> </div>    <h2>Expand Portfolio Styles</h2>
<?php 
	$style = get_option('h2cweb_style');
	if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['expsubmit']) {
		$style = $_POST["expstyle"];
		update_option('h2cweb_style', $style);
		echo '<p><strong>'.__("Settings saved!", "h2cweb").'</strong></p>';
	}
?>
	<form name="h2cweb_form_stl" action="" method="post">
	<table border="0" cellpadding="5" cellspacing="0" width="100%">


	<tr valign="top">
	
	<td width="50%">
	<!-- <p><label>Style Embed Code</label> : <input type="text" name="expstyle[embed]" value='<?php //echo $style['embed'];?>'> <label><em>Third party style code like google fonts</em></label></p> -->
	<p><label>Font</label> : 
	
	<span style="margin-right:30px; float:right;">
	<input type="text" size="40" name="expstyle[font]" value="<?php echo $style['font'];?>"> 
	</span>
	<label><br>	<em>Standard web font or embeded font name</em></label>	
	</p>
	
	<p><label>Color</label> : 
		<span style="margin-right:30px; float:right;">
			#<input type="text" size="40" name="expstyle[color]" value="<?php echo $style['color'];?>">
		</span>
		<label><br>
		<em>Hexadecimal color code</em></label>
	</p>
	
	<p>
		<label>Font Size</label> : 
		<span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[size]" value="<?php echo $style['size'];?>">px
		</span>
	</p>
	
	<p>
		<label>Background Color</label> : 
		<span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[bgcolor]" value="<?php echo $style['bgcolor'];?>">
		</span>
	</p>
	
	<p><label>Background Image</label> : 
		<span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[bgpic]" value="<?php echo $style['bgpic'];?>"></span><br> 
		<label>
		<em style="float:left;">Background picture url</em></label>
	
	</p>
	<br>
	<hr>
	
	<p><label>Title Font</label> : 
		<span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[title][font]" value="<?php echo $style['title']['font'];?>">
		</span>
	</p>
	
	<p><label>Title Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[title][color]" value="<?php echo $style['title']['color'];?>">
		</span>
	</p>
	<p><label>Title Font Size</label> : 
		<span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[title][size]" value="<?php echo $style['title']['size'];?>">px</span>
	</p>
	<p><label>Date Font</label> : 
		<span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[date][font]" value="<?php echo $style['date']['font'];?>">
		</span>
	</p>
	
	<p><label>Date Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[date][color]" value="<?php echo $style['date']['color'];?>">
		</span>
	</p>
	
	<p><label>Date Font Size</label> :
		<span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[date][size]" value="<?php echo $style['date']['size'];?>">px
		</span>
	</p>
	
	<p><label>Title Section Background Color</label> :  
		<span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[title][bgcolor]" value="<?php echo $style['title']['bgcolor'];?>">
		</span>
	</p>
	
	<p><label>Title Section Background Image</label> : 	
		<span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[title][bgpic]" value="<?php echo $style['title']['bgpic'];?>">
		</span>
	</p>
	<hr>
	<p><label>Click to Expand Image</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[tap][bgpic]" value="<?php echo $style['tap']['bgpic'];?>"></span> 
		<label><br><em>The image comes on hovering over the main image</em></label></p>
	<hr>
	<p><label>Description Font</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[desc][font]" value="<?php echo $style['desc']['font'];?>">
		</span> 
	</p>
	
	<p><label>Description Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[desc][color]" value="<?php echo $style['desc']['color'];?>">
	</span> 
	</p>
	
	<p><label>Description Font Size</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[desc][size]" value="<?php echo $style['desc']['size'];?>">px
		</span> 
	</p>
	
	<p><label>Description Background Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[desc][bgcolor]" value="<?php echo $style['desc']['bgcolor'];?>">
		</span> 
	</p>
	
	<p><label>Description Background Image</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[desc][bgpic]" value="<?php echo $style['desc']['bgpic'];?>"></span> 
	</p>
	
	<hr>
	<p><label>Credits Font</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[credit][font]" value="<?php echo $style['credit']['font'];?>">
		</span> 
	</p>
	
	<p><label>Credits Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[credit][color]" value="<?php echo $style['credit']['color'];?>">
		</span> 
	</p>
	
	<p><label>Credits Link Font</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[credita][font]" value="<?php echo $style['credita']['font'];?>">
		</span> 
	</p>
	
	<p><label>Credits Link Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[credita][color]" value="<?php echo $style['credita']['color'];?>">
		</span> 
	</p>
	
	<p><label>Credits Font Size</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[credit][size]" value="<?php echo $style['credit']['size'];?>">px</span> 
	</p>
	
	<p><label>Credits Background Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[credit][bgcolor]" value="<?php echo $style['credit']['bgcolor'];?>">
		</span> 
	</p>
	<p><label>Credits Background Image</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[credit][bgpic]" value="<?php echo $style['credit']['bgpic'];?>"> <label><em></em></label>
		</span> 
	</p>
	</td>
	<td width="50%">
	<!-- <hr> -->
	<p><label>Comments Font</label> :  <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[cmnt][font]" value="<?php echo $style['cmnt']['font'];?>">
		</span> 
	</p>
	<p><label>Comments Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmnt][color]" value="<?php echo $style['cmnt']['color'];?>">
		</span> 
	</p>
	<p><label>Comments Author Color</label> :<span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmnta][color]" value="<?php echo $style['cmnta']['color'];?>">
		</span> 
	</p>
	<p><label>Comments Font Size</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[cmnt][size]" value="<?php echo $style['cmnt']['size'];?>">px
		</span> 
	</p>
	<p><label>Comments Background Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmnt][bgcolor]" value="<?php echo $style['cmnt']['bgcolor'];?>">
		</span> 
	</p>
	<p><label>Comments Background Image</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[cmnt][bgpic]" value="<?php echo $style['cmnt']['bgpic'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Font</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[cmntf][font]" value="<?php echo $style['cmntf']['font'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmntf][color]" value="<?php echo $style['cmntf']['color'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Font Size</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[cmntf][size]" value="<?php echo $style['cmntf']['size'];?>">px
		</span> 
	</p>
	
	<p><label>CommentForm Box Font</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[cmntfb][font]" value="<?php echo $style['cmntfb']['font'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Box Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmntfb][color]" value="<?php echo $style['cmntfb']['color'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Box Font Size</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[cmntfb][size]" value="<?php echo $style['cmntfb']['size'];?>">px
		</span> 
	</p>
	
	<p><label>CommentForm Box Border Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmntfb][border]" value="<?php echo $style['cmntfb']['border'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Box Background Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmntfb][bgcolor]" value="<?php echo $style['cmntfb']['bgcolor'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Background Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[cmntf][bgcolor]" value="<?php echo $style['cmntf']['bgcolor'];?>">
		</span> 
	</p>
	
	<p><label>CommentForm Background Image</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[cmntf][bgpic]" value="<?php echo $style['cmntf']['bgpic'];?>">
		</span> 
	</p>
	<hr>
	<p><label>Slideshow Text Font</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[more][font]" value="<?php echo $style['more']['font'];?>">
	</span> 
	</p>
	
	<p><label>Slideshow Text Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[more][color]" value="<?php echo $style['more']['color'];?>">
		</span> 
	</p>
	
	<p><label>Slideshow Text Font Size</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[more][size]" value="<?php echo $style['more']['size'];?>">px
		</span> 
	</p>
	
	<p><label>Slideshow Text Background Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[more][bgcolor]" value="<?php echo $style['more']['bgcolor'];?>">
		</span> 
	</p>
	<p><label>Slideshow Text Background Image</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[more][bgpic]" value="<?php echo $style['more']['bgpic'];?>">
		</span> 
	</p>
	
	<hr>
	<p><label>Subheading Font</label> :  <span style="margin-right:30px; float:right;">
		<input type="text" size="40" name="expstyle[subhd][font]" value="<?php echo $style['subhd']['font'];?>"></span><br> <label><em>Subheadings are 'CAST &amp; CREWS' and 'LEAVE A REPLY'</em></label>
	</p>
	
	<p><label>Subheading Color</label> : <span style="margin-right:30px; float:right;">
		#<input type="text" size="40" name="expstyle[subhd][color]" value="<?php echo $style['subhd']['color'];?>"></p>
	<p><label>Subheading Font Size</label> : <span style="margin-right:30px; float:right;">
		<input type="text" size="38" name="expstyle[subhd][size]" value="<?php echo $style['subhd']['size'];?>">px
	</span> 
	</p>
	<!-- <p><label></label> : <input type="text" name="expstyle[][]" value="<?php //echo $style[''][''];?>"> <label><em></em></label></p> -->
	</td>
	</tr>
	</table>
	<p><input type="submit" name="expsubmit" class="button button-primary" value="<?php _e('<span class="success">Save Settings</span>', 'h2cweb');?>"></p>
	</form>
	</div>
<?php
}
?>