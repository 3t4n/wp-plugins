<?php 

//Add News Ticker Menu In Settings Options
function advance_newsticker_menu_options(){
	add_menu_page('Advance NewsTicker','Advance NewsTicker','manage_options','advance_newsticker_options','advance_newsticker_menu_options_cb', 'dashicons-admin-tools');
}
add_action('admin_menu','advance_newsticker_menu_options');

//News Ticker Callback Function

function advance_newsticker_menu_options_cb(){
	echo "<div class='wrap'>";
	echo "<h1>Welcome To All Advance News Ticker Options</h1>";
	settings_errors('newsticker_options');
	?>
	<form action="options.php" method="post">
		<?php 
			settings_fields( 'tickers_groups' ); 
			do_settings_sections( 'ticker' );
		?>
		<?php submit_button();?>
	</form>
	<?php
	echo "</div>";
	?>
	
	
	<table class="form-table">
		<h1>Documentation For News Ticker Plugin</h1>
		<h3>Your Just Put This Shortcode Any Where Our Below Shortcode <b style="color:red;font-size:20px;padding:3px">[advance_newsticker_shortcode]</b></h3>
	</table>
	<table class="form-table">
		<tbody>
			<tr class="user-description-wrap">
				<th><label for="shortcode">Use Can Use this Code</label></th>
				<td><textarea cols="100" rows="5" id="shortcode">[advance_newsticker_shortcode title="News" per_page_item="3" post_type="page" title_color="#fff" title_bg_color="#000" items_color="blue" items_bg_color="#fff" items_hover_color="#fff" effect_type="fade", controls"on"]</textarea>
				</td>
			</tr>
			</tbody>
		</table>
	<?php
}


/*Setting a Option Add */

function advance_newsticker_menu_options_input(){
	register_setting('tickers_groups','tickers_title');
	register_setting('tickers_groups','per_page_item');
	register_setting('tickers_groups','post_type');
	register_setting('tickers_groups','title_color');
	register_setting('tickers_groups','title_bg_color');
	register_setting('tickers_groups','items_color');
	register_setting('tickers_groups','items_bg_color');
	register_setting('tickers_groups','items_hover_color');
	register_setting('tickers_groups','effect_type');
	register_setting('tickers_groups','controls');
	
	add_settings_section('ticker_option','News Ticker Options Settings','advance_menu_options_secction','ticker');
	
	add_settings_field('ticker_title','Ticker Title:','advance_newsticker_options_title','ticker','ticker_option');
	add_settings_field('per_page_item','Per Page Item :','advance_newsticker_options_per_page_item','ticker','ticker_option');
	add_settings_field('post_type','Post Type :','advance_newsticker_options_post_type','ticker','ticker_option');
	add_settings_field('title_color','Title Font Color:','advance_newsticker_options_title_color','ticker','ticker_option');
	add_settings_field('title_bg_color','Title Background Color:','advance_newsticker_options_title_bg_color','ticker','ticker_option');
	add_settings_field('items_color','Items Font Color:','advance_newsticker_options_items_color','ticker','ticker_option');
	add_settings_field('items_bg_color','Items Background Color :','advance_newsticker_items_bg_color','ticker','ticker_option');
	add_settings_field('items_hover_color','Items Hover Color :','advance_newsticker_items_hover_color','ticker','ticker_option');
	add_settings_field('effect_type','Effect Type:','advance_newsticker_options_effect_type','ticker','ticker_option');
	add_settings_field('controls','Controls Options:','advance_newsticker_options_controls','ticker','ticker_option');
	
	
}
add_action('admin_init','advance_newsticker_menu_options_input');

function advance_newsticker_options_title(){
	$tickers_title = get_option('tickers_title');
	?>
	<input type="text" name="tickers_title" value="<?php advanceifelse($tickers_title,'Breaking News :');?>" id="" />
	<?php
}

function advance_newsticker_options_per_page_item(){
	$per_page_item = get_option('per_page_item');
	?>
	<input type="number" name="per_page_item" value="<?php advanceifelse($per_page_item,'6');?>" id="" />
	<?php
}

function advance_newsticker_options_post_type(){
	$post_type = get_option('post_type');
	if($post_type){
		$post_type;
	}
	else{
		$post_type=array('post');
	}
	$args = array(
	   'show_in_nav_menus' =>true
	);
	$i=0;
	foreach(get_post_types($args) as $key=>$types){
	?>
	<input type="checkbox" id="mytickerposttype" name="post_type[]" value="<?php echo $key;?>" <?php if(in_array("$key", $post_type)){echo 'checked="checked"';}?>/><?php echo ucwords($types);
	}
	$i++;
}

function advance_newsticker_options_title_color(){
	$title_color = get_option('title_color');
	?>
	<input type="text" data-default-color="#ffffff" class="advance_ticker_title_color" name="title_color" value="<?php advanceifelse($title_color,'#ffffff');?>" id="" />
	<?php
}

function advance_newsticker_options_title_bg_color(){
	$title_bg_color = get_option('title_bg_color');
	?>
	<input type="text" data-default-color="#ff0000" class="advance_ticker_title_bg_color"  name="title_bg_color" value="<?php advanceifelse($title_bg_color,'#ff0000');?>" id="" />
	<?php
}

function advance_newsticker_options_items_color(){
	$items_color = get_option('items_color');
	?>
	<input type="text" data-default-color="#000000" class="advance_ticker_items_color"  name="items_color" value="<?php advanceifelse($items_color,'#000000');?>" id="" />
	<?php
}


function advance_newsticker_items_bg_color(){
	$items_bg_color = get_option('items_bg_color');
	?>
	<input type="text" data-default-color="#ffffff" class="advance_ticker_items_bg_color"  name="items_bg_color" value="<?php advanceifelse($items_bg_color,'#ffffff');?>" id="" />
	<?php
}
function advance_newsticker_items_hover_color(){
	$items_hover_color = get_option('items_hover_color');
	?>
	<input type="text" data-default-color="#333333" class="advance_ticker_items_hover_color"  name="items_hover_color" value="<?php advanceifelse($items_hover_color,'#333333');?>" id="" />
	<?php
}

function advance_newsticker_options_effect_type(){
	$effect_type = get_option('effect_type');
	?>
	<input type="radio" name="effect_type" value="fade" <?php checked('fade',get_option('effect_type'),true);?> id=""/>Fade
	<input type="radio" name="effect_type" value="slide-left" <?php checked('slide-left',get_option('effect_type'),true);?> id=""/>Slide Left
	<input type="radio" name="effect_type" value="slide-right" <?php checked('slide-right',get_option('effect_type'),true);?> id=""/>Slide Right
	<input type="radio" name="effect_type" value="slide-down" <?php checked('slide-down',get_option('effect_type'),true);?> id=""/>Slide Down
	<input type="radio" name="effect_type" value="slide-up" <?php checked('slide-up',get_option('effect_type'),true);?> id=""/>Slide Up
	
	<?php
}

function advance_newsticker_options_controls(){
	$controls = get_option('controls');
	?>
	<input type="radio" name="controls" value="on" <?php checked('on',get_option('controls'),true);?> id=""/>On
	<input type="radio" name="controls" value="off" <?php checked('off',get_option('controls'),true);?> id=""/>Off
	
	<?php
}



function advance_menu_options_secction(){
	echo "Add Here Your Information";
}

//My function
function advanceifelse($cond,$text){
	if($cond){
		echo $cond;
	}
	else{
		echo $text;
	}
}

