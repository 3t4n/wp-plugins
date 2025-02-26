<?php
	/*
	Plugin Name: Advance Categorizer
	Plugin URI: http://www.fedmich.com/tools/wp-advance-categorizer
	Description: Allows you to add multiple categories using comma seperated text.
	Version: 0.3
	Author: Fedmich
	Author URI: http://www.fedmich.com/tools/wp-advance-categorizer
	*/
	
	define("FAC_VERSION", "0.3");
	
	if( function_exists('add_action') ) {
		add_action('admin_menu', 'adv_cat_post_box' );
	}
	
	function adv_cat_post_box() {
		add_meta_box('categorizer_sidebar_options','Advance Categorizer', 'categorizer_sidebar','post','side');
	}
	//	add_action('dbx_post_sidebar', 'categorizer_sidebar', 1);
	function categorizer_sidebar() {
	global $post_ID;
	?>
	<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready( function() {
		if(jQuery.trim(jQuery('input#categorizer_text').val())){
			categorizer_add();
		}
	});
	
	function categorizer_add(){
		var scats = jQuery.trim(jQuery('input#categorizer_text').val());
		if(scats){
		var cats = [];
		jQuery(scats.split(',')).each(function(d){
			var cat1 = jQuery.trim(this);
			jQuery('#categorychecklist .selectit, #categories-all .selectit').each(function(d){
				var cap = jQuery.trim(jQuery(this).html().replace(/<input.*?>/,''));
				if(cap==cat1){
					cats.push(this);
					return false;
				}
				
			});
		});
		jQuery('input',cats).each(function(){
			this.checked = true;
		});
		}
	}
	function categorizer_clear(){
		jQuery('#categories-all .selectit input').each(function(){this.checked=false});
	}
	
	//]]>
	</script>
		<div id="adv_categorizer">
			<p>
			<button class="button" onclick="categorizer_clear(); return false;" style="float: right">Clear</button>
			<label for="categorizer_text" class="selectit"><input type="text" id="categorizer_text" name="name" value="<?=isset($_GET['cat'])?$_GET['cat']:(isset($_GET['categories'])?$_GET['categories']:'');?>" style="width : 180px;" /> </label>
			<button class="button" onclick="categorizer_add(); return false;">Categorize</button>
			<br />
			<small>Comma seperated categories</small>
			</p>
		</div>
	<?php
	}

?>