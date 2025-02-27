<?php
if (! defined ( 'WPINC' )) {
	exit ( 'Please do not access our files directly.' );
}
function ecpt_textsliders_free_knowledgebase_setting() 
{
	global $wpdb, $wp_roles;
	echo "<br />";

	$setting_panel_head = 'How To Use Text Sliders:';
	ecpt_textsliders_free_knowledgebase_setting_panel_head ( $setting_panel_head );
	$textsliders_free_knowledgebase_default_how_to_bar_id = 'textsliders_free_knowledgebase_textsliders_shortcode';
	$textsliders_free_knowledgebase_how_to_bar_title = 'How to add content for text slider';
	
	$textsliders_free_knowledgebase_how_to_bar_content = '';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<div style="padding: 30px 20px 20px 20px;">';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<h2>How to add content for text slider</h2>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '#1 Login Wordpress Admin Area.';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '#2 Click "Text Sliders" Menu.';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';

	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '#3 Just like add wordpress standard posts, add text slider title & content in Text Slider editor.';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '</div>';
	
	ecpt_textsliders_free_knowledgebase_howto_setting_panel ( $textsliders_free_knowledgebase_default_how_to_bar_id,$textsliders_free_knowledgebase_how_to_bar_title,$textsliders_free_knowledgebase_how_to_bar_content );	

	$textsliders_free_knowledgebase_default_how_to_bar_id = 'textsliders_free_knowledgebase_show_textslider_on_frontend';
	$textsliders_free_knowledgebase_how_to_bar_title = 'How to show text slider in front end';
	
	$textsliders_free_knowledgebase_how_to_bar_content = '';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<div style="padding: 30px 20px 20px 20px;">';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<h2>How to show text slider in front end</h2>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= "Use shortcode [textsliders] in any posts or pages to show text slider in front end.";
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</div>';
	
	ecpt_textsliders_free_knowledgebase_howto_setting_panel ( $textsliders_free_knowledgebase_default_how_to_bar_id,$textsliders_free_knowledgebase_how_to_bar_title,$textsliders_free_knowledgebase_how_to_bar_content );

	
	$textsliders_free_knowledgebase_default_how_to_bar_id = 'textsliders_free_knowledgebase_add_textslider_on_sidebar';
	$textsliders_free_knowledgebase_how_to_bar_title = 'How to add text slider on sidebar';
	
	$textsliders_free_knowledgebase_how_to_bar_content = '';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<div style="padding: 30px 20px 20px 20px;">';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '#1 Login Wordpress Admin Area.';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '#2 Click "Appearance" menu';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';

	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '#3 Click "Widgets" sub menu';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= '#4 Drag "Text Slider" into your sidebar';
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '</div>';
	
	ecpt_textsliders_free_knowledgebase_howto_setting_panel ( $textsliders_free_knowledgebase_default_how_to_bar_id,$textsliders_free_knowledgebase_how_to_bar_title,$textsliders_free_knowledgebase_how_to_bar_content );
	
	
	$textsliders_free_knowledgebase_default_how_to_bar_id = 'textsliders_free_knowledgebase_show_post_text_slider';
	$textsliders_free_knowledgebase_how_to_bar_title = 'How to show post text slider on front end';
	
	$textsliders_free_knowledgebase_how_to_bar_content = '';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<div style="padding: 30px 20px 20px 20px;">';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= "Use shortcode [postsliders] in any posts or pages to show post text slider in front end.";
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '</div>';
	
	ecpt_textsliders_free_knowledgebase_howto_setting_panel ( $textsliders_free_knowledgebase_default_how_to_bar_id,$textsliders_free_knowledgebase_how_to_bar_title,$textsliders_free_knowledgebase_how_to_bar_content );
	/*
	 version 3.6.1
	 */
	$textsliders_free_knowledgebase_default_how_to_bar_id = 'textsliders_free_knowledgebase_show_woocommerce_text_slider';
	$textsliders_free_knowledgebase_how_to_bar_title = 'How to show woocommerce text slider on front end';
	
	$textsliders_free_knowledgebase_how_to_bar_content = '';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<div style="padding: 30px 20px 20px 20px;">';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= "Use shortcode [woocommercesliders] to insert woocommerce text slider in your wordpress post or pages. It will show all of your woocommerce products' text and description in the woocommerce text slider, simple and light. Also users can add to cart directly from woocommerce text slider";
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '</div>';
	
	ecpt_textsliders_free_knowledgebase_howto_setting_panel ( $textsliders_free_knowledgebase_default_how_to_bar_id,$textsliders_free_knowledgebase_how_to_bar_title,$textsliders_free_knowledgebase_how_to_bar_content );
	/*
	 version 3.6.1, added woocommerce text slider tips
	 */
	// 3.6.7
	$textsliders_free_knowledgebase_default_how_to_bar_id = 'textsliders_free_knowledgebase_support_url_text_slider';
	$textsliders_free_knowledgebase_how_to_bar_title = 'How to get support for text sliders plugin';
	
	$textsliders_free_knowledgebase_how_to_bar_content = '';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<div style="padding: 30px 20px 20px 20px;">';
	$textsliders_free_knowledgebase_how_to_bar_content .= '<p>';
	$textsliders_free_knowledgebase_how_to_bar_content .= "Please submit your question of feature request on ". ' <a href="https://textsliders.com/forums/" target="_blank">'. "text sliders support forum".'</a>'.", we are happy to help you, in the current time, we can not offer support on wordpress official forum, thanks";
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '</p>';
	
	$textsliders_free_knowledgebase_how_to_bar_content .= '</div>';
	
	ecpt_textsliders_free_knowledgebase_howto_setting_panel ( $textsliders_free_knowledgebase_default_how_to_bar_id,$textsliders_free_knowledgebase_how_to_bar_title,$textsliders_free_knowledgebase_how_to_bar_content );	
	
}
function ecpt_textsliders_free_knowledgebase_howto_setting_panel($textsliders_free_knowledgebase_how_to_bar_id, $textsliders_free_knowledgebase_how_to_bar_title = '',$textsliders_free_knowledgebase_how_to_bar_content = '') 
{
	global $wpdb, $wp_roles;
	?>
<div class="wrap">
	<div id="dashboard-widgets-wrap">
		<div id="dashboard-widgets" class="metabox-holder">
			<div id="post-body">
				<div id="dashboard-widgets-main-content">
					<div class="postbox-container" style="width: 90%;">
						<div
							class="postbox text-slider-how-to-each-bar"
							id="text-slider-how-to-each-bar-id"
							data-user-role="<?php echo $textsliders_free_knowledgebase_how_to_bar_id ?>">					
							<span id='text-sliders-bar-item-<?php echo $textsliders_free_knowledgebase_how_to_bar_id; ?>'>+</span>
							<h3 class='hndle'
								style='padding: 10px; ! important; border-bottom: 0px solid #eee !important;'>
	<?php
	echo $textsliders_free_knowledgebase_how_to_bar_title;
	?>
									</h3>

						</div>
						<div class="inside textslider-free-howto-settings postbox"
							style='padding-left: 10px; border-top: 1px solid #eee;'
							id=<?php echo $textsliders_free_knowledgebase_how_to_bar_id ?>>
							<?php echo $textsliders_free_knowledgebase_how_to_bar_content; ?>
							<br />
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="clear: both"></div>
<?php
}

function ecpt_textsliders_free_knowledgebase_setting_panel_head($title)
{
	?>
<div style='margin:0px 5px 10px 5px;'>
	<div style='float:left;margin-right:10px;'>
	<img src='<?php echo TEXT_SLIDERS_PLUGIN_URL;  ?>/asset/images/text.png' style='width:30px;height:30px;'>
	</div> 
	<div style='padding-top:5px; font-size:22px;'>
		<i>
		<?php
			echo $title;
		?>
		</i>
	</div>
	<div style='clear:both'></div>
</div>
<?php
/*
		<div style='padding-top:5px; font-size:22px;'><?php echo $title; ?></div>
		<div style='clear:both'></div>
*/		
?>
<?php 
}

ecpt_textsliders_free_knowledgebase_setting();
