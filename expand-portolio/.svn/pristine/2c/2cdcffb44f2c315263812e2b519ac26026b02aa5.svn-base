<?php
add_action('add_meta_boxes','add_metabox_exp');
function add_metabox_exp() {add_meta_box('exp-box', 'ExpandPost Meta Data', 'h2cweb_inner_custom_box', 'porftfolio');}
function h2cweb_inner_custom_box($post) {
	$data = get_post_meta($post->ID, 'h2cweb_metadata', true);
	wp_nonce_field(plugin_basename( __FILE__ ), 'h2cweb_noncename');
	if (!$data || !$data['media'] || !$data['media']['video']) {$data['media']['video']='';}
	?>
	<p class="exp-meta-title"><?php _e('Media', 'h2cweb');?>:</p>
	<hr>
			
			
			
			<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 0px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	
}
</style>
<!-- Table goes in the document BODY -->
<table class="gridtable" width="100%">

<tr>
	<td width="290">
		<p>
			<?php _e('Video 1 Embed', 'h2cweb');?> : 
			<input type='text' name='h2cweb_metadata[media1][video1]' value='<?php echo $data['media1']['video1'];?>'>
		</p>
	</td>
	<td>
		<p>
			<?php echo __('Photo Link','h2cweb')." : ".h2cweb_medialibrary_uploader('exppic1',$data['media1']['pic1'], null, '', $post->ID);?>
			<input id="mediapic" name="h2cweb_metadata[media1][picid1]" value="<?php echo $data['media1']['picid1'];?>" type="hidden">
		</p>
	</td>
	
	<td>
		<p class="exp-meta-title"><?php _e('Caption Text 1', 'h2cweb');?>:</p>
			<p><textarea name="h2cweb_metadata[text1]" class="" cols="" rows="" style="width:100%;"><?php echo $data['text1'];?></textarea>
			</p>
	</td>
	<td>
		<p>
		<input name="h2cweb_metadata[section1][photo1]" type="checkbox" <?php if($data['section1']['photo1']) {echo "checked";}?>> 
		<?php _e('PhotoLink', 'h2cweb');?></p>
	</td>
	
</tr>


<tr>
	<td width="290">
		<p>
			<?php _e('Video 2 Embed', 'h2cweb');?> : 
			<input type='text' name='h2cweb_metadata[media2][video2]' value='<?php echo $data['media2']['video2'];?>'>
		</p>
	</td>
	<td>
		<p>
			<?php echo __('Photo Link','h2cweb')." : ".h2cweb_medialibrary_uploader('exppic2',$data['media2']['pic2'], null, '', $post->ID);?>
			<input id="mediapic" name="h2cweb_metadata[media2][picid2]" value="<?php echo $data['media2']['picid2'];?>" type="hidden">
		</p>
	</td>
	
	<td>
		<p class="exp-meta-title"><?php _e('Caption Text 2', 'h2cweb');?>:</p>
			<p><textarea name="h2cweb_metadata[text2]" class="" cols="" rows="" style="width:100%;"><?php echo $data['text2'];?></textarea>
			</p>
	</td>
	<td>
		<p>
		<input name="h2cweb_metadata[section2][photo2]" type="checkbox" <?php if($data['section2']['photo2']) {echo "checked";}?>> 
		<?php _e('PhotoLink', 'h2cweb');?></p>
	</td>
</tr>



	<tr>
		<td width="290">
			<p>
				<?php _e('Video 3 Embed', 'h2cweb');?> : 
				<input type='text' name='h2cweb_metadata[media3][video3]' value='<?php echo $data['media3']['video3'];?>'>
			</p>
		</td>
		<td>
			<p>
				<?php echo __('Photo Link','h2cweb')." : ".h2cweb_medialibrary_uploader('exppic3',$data['media3']['pic3'], null, '', $post->ID);?>
				<input id="mediapic" name="h2cweb_metadata[media2][picid2]" value="<?php echo $data['media3']['picid3'];?>" type="hidden">
			</p>
		</td>
	
		<td>
			<p class="exp-meta-title"><?php _e('Caption Text 3', 'h2cweb');?>:</p>
				<p><textarea name="h2cweb_metadata[text3]" class="" cols="" rows="" style="width:100%;"><?php echo $data['text3'];?></textarea>
			</p>
		</td>
		<td>
			<p>
			<input name="h2cweb_metadata[section3][photo3]" type="checkbox" <?php if($data['section3']['photo3']) {echo "checked";}?>> 
			<?php _e('PhotoLink', 'h2cweb');?></p>
		</td>
	</tr>
	
	
	<tr>
		<td width="290">
			<p>
				<?php _e('Video 4 Embed', 'h2cweb');?> : 
				<input type='text' name='h2cweb_metadata[media4][video4]' value='<?php echo $data['media4']['video4'];?>'>
			</p>
		</td>
		<td>
			<p>
				<?php echo __('Photo Link','h2cweb')." : ".h2cweb_medialibrary_uploader('exppic4',$data['media4']['pic4'], null, '', $post->ID);?>
				<input id="mediapic" name="h2cweb_metadata[media4][picid4]" value="<?php echo $data['media4']['picid4'];?>" type="hidden">
			</p>
		</td>
	
		<td>
			<p class="exp-meta-title"><?php _e('Caption Text 4', 'h2cweb');?>:</p>
				<p><textarea name="h2cweb_metadata[text4]" class="" cols="" rows="" style="width:100%;"><?php echo $data['text4'];?></textarea>
			</p>
		</td>
		<td>
			<p>
			<input name="h2cweb_metadata[section4][photo4]" type="checkbox" <?php if($data['section4']['photo4']) {echo "checked";}?>> 
			<?php _e('PhotoLink', 'h2cweb');?></p>
		</td>
	</tr>


	<tr>
		<td width="290">
			<p>
				<?php _e('Video 5 Embed', 'h2cweb');?> : 
				<input type='text' name='h2cweb_metadata[media5][video5]' value='<?php echo $data['media5']['video5'];?>'>
			</p>
		</td>
		<td>
			<p>
				<?php echo __('Photo Link','h2cweb')." : ".h2cweb_medialibrary_uploader('exppic5',$data['media5']['pic5'], null, '', $post->ID);?>
				<input id="mediapic" name="h2cweb_metadata[media5][picid5]" value="<?php echo $data['media5']['picid5'];?>" type="hidden">
			</p>
		</td>
	
		<td>
			<p class="exp-meta-title"><?php _e('Caption Text 5', 'h2cweb');?>:</p>
				<p><textarea name="h2cweb_metadata[text5]" class="" cols="" rows="" style="width:100%;"><?php echo $data['text5'];?></textarea>
			</p>
		</td>
		<td>
			<p>
			<input name="h2cweb_metadata[section5][photo5]" type="checkbox" <?php if($data['section5']['photo5']) {echo "checked";}?>> 
			<?php _e('PhotoLink', 'h2cweb');?></p>
		</td>
	</tr>


	

	
	<tr>
		<td width="290">
			<p>
				<?php echo __('Slideshow Link','h2cweb')." : ".h2cweb_medialibrary_uploader('exppic',$data['media']['pic'], null, '', $post->ID);?>
				<input  id="mediapic" name="h2cweb_metadata[media][picid]" value="<?php echo $data['media']['picid'];?>" type="hidden">
			</p>
		</td>
		<td>
			<p>
				<?php echo __('MP3','h2cweb')." : ".h2cweb_medialibrary_uploader('expmp3',$data['media']['mp3'], null, '', $post->ID);?>
			</p>
		</td>
	
		<td>
			<p class="exp-meta-title"><?php _e('Slider Caption Text', 'h2cweb');?>:</p>
				<p><textarea name="h2cweb_metadata[text]" class="" cols="" rows="" style="width:100%;"><?php echo $data['text'];?></textarea>
			</p>
		</td>
		<td>
			<p>
			<input name="h2cweb_metadata[section][photo]" type="checkbox" <?php if($data['section']['photo']) {echo "checked";}?>> 
			<?php _e('PhotoLink', 'h2cweb');?></p>
		</td>
	</tr>


</table>
		
		
	
	<h2><?php _e('Show Sections', 'h2cweb');?></h2>
	<hr>
	<!-- <p><input name="h2cweb_metadata[section][poster]" type="checkbox" <?php //if($data['section']['poster']) {echo "checked";}?>> <?php //_e('Poster Image', 'h2cweb');?></p> -->
	<p><input name="h2cweb_metadata[section][desc]" type="checkbox" <?php if($data['section']['desc']) {echo "checked";}?>> <?php _e('Description', 'h2cweb');?></p>
	<p><input name="h2cweb_metadata[section][cast]" type="checkbox" <?php if($data['section']['cast']) {echo "checked";}?>> <?php _e('Credits', 'h2cweb');?></p>
<!--	<p><input name="h2cweb_metadata[section][vid]" type="checkbox" <?php //if($data['section']['vid']) {echo "checked";}?>> <?php // _e('Video', 'h2cweb');?></p>
-->
	<p><input name="h2cweb_metadata[section][cmnt]" type="checkbox" <?php if($data['section']['cmnt']) {echo "checked";}?>> <?php _e('Comments', 'h2cweb');?></p>
	
	<p class="exp-meta-title"><?php _e('Title &amp; Credits', 'h2cweb');?>:</p>
	<hr>
		<p class="exp-meta-subtitle"><?php _e('Title &amp; Credit', 'h2cweb');?> #1</p>
			<p><label style="float:left;"><?php _e('Title', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:200px;">
			<input type="text" size="60" name="h2cweb_metadata[title][0][title]" value="<?php echo $data['title'][0]['title'];?>">
			</span>
		</p><br>
	
		<p><label style="float:left;"><?php _e('Link URL', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:172px;">
		<input type="text" size="60" name="h2cweb_metadata[title][0][url]" value="<?php echo $data['title'][0]['url'];?>">
		</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Credit', 'h2cweb');?> :  </label><span style="text-align:center; float:left;margin-left:190px;">
		<input type="text" size="60" name="h2cweb_metadata[title][0][credit]" value="<?php echo $data['title'][0]['credit'];?>"></span>
		</p><br>
		
		<div id="emtc2" style="display:none;">
		<p class="exp-meta-subtitle"><?php _e('Title &amp; Credit', 'h2cweb');?> #2</p>
		<p><label style="float:left;"><?php _e('Title', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:200px;">
			<input type="text" size="60" name="h2cweb_metadata[title][1][title]" value="<?php echo $data['title'][1]['title'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Link URL', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:172px;">
			<input type="text" size="60" name="h2cweb_metadata[title][1][url]" value="<?php echo $data['title'][1]['url'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Credit', 'h2cweb');?> :  </label><span style="text-align:center; float:left;margin-left:190px;">
			<input type="text" size="60" name="h2cweb_metadata[title][1][credit]" value="<?php echo $data['title'][1]['credit'];?>">
			</span>
		</p><br>
		
		<p id="emtb2"><input type="button" class="button button-primary" value="<?php _e('Add Another', 'h2cweb');?>" onClick="emtc(3);"></p>
		</div>
		
		<div id="emtc3" style="display:none;">
		<p class="exp-meta-subtitle"><?php _e('Title &amp; Credit', 'h2cweb');?> #3</p>
		<p><label style="float:left;"><?php _e('Title', 'h2cweb');?> : </label>
			<span style="text-align:center; float:left;margin-left:200px;">
			<input type="text" size="60" name="h2cweb_metadata[title][2][title]" value="<?php echo $data['title'][2]['title'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Link URL', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:172px;">
			<input type="text" size="60" name="h2cweb_metadata[title][2][url]" value="<?php echo $data['title'][2]['url'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Credit', 'h2cweb');?> :  </label><span style="text-align:center; float:left;margin-left:190px;">
			<input type="text" size="60" name="h2cweb_metadata[title][2][credit]" value="<?php echo $data['title'][2]['credit'];?>">
			</span>
		</p><br>
		
		<p id="emtb3"><input type="button" class="button button-primary" value="<?php _e('Add Another', 'h2cweb');?>" onClick="emtc(4);"></p>
		</div>
		
		
		<div id="emtc4" style="display:none;">
		<p class="exp-meta-subtitle"><?php _e('Title &amp; Credit', 'h2cweb');?> #4</p>
		<p><label style="float:left;"><?php _e('Title', 'h2cweb');?> : </label>
			<span style="text-align:center; float:left;margin-left:200px;">
			<input type="text" size="60" name="h2cweb_metadata[title][3][title]" value="<?php echo $data['title'][3]['title'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Link URL', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:172px;">
			<input type="text" size="60" name="h2cweb_metadata[title][3][url]" value="<?php echo $data['title'][3]['url'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Credit', 'h2cweb');?> :  </label><span style="text-align:center; float:left;margin-left:190px;">
			<input type="text" size="60" name="h2cweb_metadata[title][3][credit]" value="<?php echo $data['title'][3]['credit'];?>">
			</span>
		</p><br>
		<p id="emtb4"><input type="button" class="button button-primary" value="<?php _e('Add Another', 'h2cweb');?>" onClick="emtc(5);"></p>
		</div>
		
		
		<div id="emtc5" style="display:none;">
		<p class="exp-meta-subtitle"><?php _e('Title &amp; Credit', 'h2cweb');?> #5</p>
		<p><label style="float:left;"><?php _e('Title', 'h2cweb');?> : </label>
			<span style="text-align:center; float:left;margin-left:200px;">
			<input type="text" size="60" name="h2cweb_metadata[title][4][title]" value="<?php echo $data['title'][4]['title'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Link URL', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:172px;">
			<input type="text" size="60" name="h2cweb_metadata[title][4][url]" value="<?php echo $data['title'][4]['url'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Credit', 'h2cweb');?> :  </label><span style="text-align:center; float:left;margin-left:190px;">
			<input type="text" size="60" name="h2cweb_metadata[title][4][credit]" value="<?php echo $data['title'][4]['credit'];?>">
			</span>
		</p><br>		
		<p id="emtb5"><input type="button" class="button button-primary" value="<?php _e('Add Another', 'h2cweb');?>" onClick="emtc(6);"></p>
		</div>
		
		
		<div id="emtc6" style="display:none;">
		<p class="exp-meta-subtitle"><?php _e('Title &amp; Credit', 'h2cweb');?> #6</p>
		<p><label style="float:left;"><?php _e('Title', 'h2cweb');?> : </label>
			<span style="text-align:center; float:left;margin-left:200px;">
			<input type="text" size="60" name="h2cweb_metadata[title][5][title]" value="<?php echo $data['title'][5]['title'];?>"></span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Link URL', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:172px;">
			<input type="text" size="60" name="h2cweb_metadata[title][5][url]" value="<?php echo $data['title'][5]['url'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Credit', 'h2cweb');?> :  </label><span style="text-align:center; float:left;margin-left:190px;">
			<input type="text" size="60" name="h2cweb_metadata[title][5][credit]" value="<?php echo $data['title'][5]['credit'];?>">
			</span>
		</p><br>
		<p id="emtb6"><input type="button" class="button button-primary" value="<?php _e('Add Another', 'h2cweb');?>" onClick="emtc(7);"></p>
		</div>
		
		
		<div id="emtc7" style="display:none;">
		<p class="exp-meta-subtitle"><?php _e('Title &amp; Credit', 'h2cweb');?> #7</p>
		<p><label style="float:left;"><?php _e('Title', 'h2cweb');?> : </label>
			<span style="text-align:center; float:left;margin-left:200px;">
			<input type="text" size="60" name="h2cweb_metadata[title][6][title]" value="<?php echo $data['title'][6]['title'];?>">
			</span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Link URL', 'h2cweb');?> : </label><span style="text-align:center; float:left;margin-left:172px;">
			<input type="text" size="60" name="h2cweb_metadata[title][6][url]" value="<?php echo $data['title'][6]['url'];?>"></span>
		</p><br>
		
		<p><label style="float:left;"><?php _e('Credit', 'h2cweb');?> :  </label><span style="text-align:center; float:left;margin-left:190px;">
			<input type="text" size="60" name="h2cweb_metadata[title][6][credit]" value="<?php echo $data['title'][6]['credit'];?>"></span>
		</p><br>
		
		</div>
		<p id="emtb1"><input type="button" class="button button-primary" value="<?php _e('Add Another', 'h2cweb');?>" onClick="emtc(2);"></p>
	</form>
	<?php
}
add_action('save_post','save_metabox_exp');
add_action('publish_post','save_metabox_exp');
add_action('edit_post','save_metabox_exp');
function save_metabox_exp($post_id) {
	if (isset($_REQUEST['h2cweb_metadata'])) {
		$h2cweb_metadata = $_REQUEST['h2cweb_metadata'];
		$h2cweb_metadata['media']['mp3'] = $_REQUEST['expmp3'];
		$h2cweb_metadata['media']['pic'] = $_REQUEST['exppic'];
		$h2cweb_metadata['media1']['pic1'] = $_REQUEST['exppic1'];
		$h2cweb_metadata['media2']['pic2'] = $_REQUEST['exppic2'];
		$h2cweb_metadata['media3']['pic3'] = $_REQUEST['exppic3'];
		$h2cweb_metadata['media4']['pic4'] = $_REQUEST['exppic4'];
		$h2cweb_metadata['media5']['pic5'] = $_REQUEST['exppic5'];
		$h2cweb_metadata['media6']['pic6'] = $_REQUEST['exppic6'];
		update_post_meta($post_id, 'h2cweb_metadata', $h2cweb_metadata);
	}
}
if ( is_admin() ) {
	add_action( 'init', 'h2cweb_mlu_init' );
	$is_posts_page = 0;
	$_current_url =  strtolower( strip_tags( trim( $_SERVER['REQUEST_URI'] ) ) );
	if ( ( substr( basename( $_current_url ), 0, 8 ) == 'post.php' ) || substr( basename( $_current_url ), 0, 12 ) == 'post-new.php' ) {
		$is_posts_page = 1;
	}
	$_page = '';
	if ( ( isset( $_REQUEST['page'] ) ) ) {
		$_page = strtolower( strip_tags( trim( $_REQUEST['page'] ) ) );
	}
			add_action( 'admin_print_styles', 'h2cweb_mlu_css', 0 );
			add_action( 'admin_print_scripts', 'h2cweb_mlu_js', 0 );
}
if ( ! function_exists( 'h2cweb_mlu_init' ) ) {
	function h2cweb_mlu_init () {
		register_post_type( 'regulusframework', array(
			'labels' => array(
				'name' => __( 'RegulusFramework Internal Container', 'h2cweb' ),
			),
			'public' => true,
			'show_ui' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => false,
			'supports' => array( 'title', 'editor' ),
			'query_var' => false,
			'can_export' => true,
			'show_in_nav_menus' => false
		) );
	}
}
if ( ! function_exists( 'h2cweb_mlu_css' ) ) {
	function h2cweb_mlu_css () {
		$_html = '';
		$_html .= '<link rel="stylesheet" href="' . includes_url() .'js/thickbox/thickbox.css" type="text/css" media="screen" />' . "\n";
		$_html .= '<script type="text/javascript">
		var tb_pathToImage = "' . includes_url() . 'js/thickbox/loadingAnimation.gif";
	    var tb_closeImage = "' . includes_url() . 'js/thickbox/tb-close.png";
	    </script>' . "\n";
	    echo $_html;
	}
}
if ( ! function_exists( 'h2cweb_mlu_js' ) ) {
	function h2cweb_mlu_js () {
		wp_register_script( 'h2cweb-medialibrary-uploader', h2cweb_URL . '/js/h2cweb-medialibrary-uploader.js', array( 'jquery', 'thickbox' ) );
		wp_enqueue_script( 'h2cweb-medialibrary-uploader' );
		wp_enqueue_script( 'media-upload' );
	}
}
if ( ! function_exists( 'h2cweb_medialibrary_uploader' ) ) {
	function h2cweb_medialibrary_uploader ($_id, $_value, $_mode = 'full', $_desc = '', $_postid = 0 ) {
		$output = '';
		$id = '';
		$class = '';
		$int = '';
		$value = '';
		$id = strip_tags( strtolower( $_id ) );
		if ( $_postid != 0 ) {
			$int = $_postid;
		} else {
			$int = h2cweb_mlu_get_silentpost( $id );
		}
		if ( $_mode == 'postmeta' ) {
			$value = get_post_meta($_postid, $id, true );
		} else {
			$value = get_option( $id );
		}
		if ( $_value != '' && $value == '' ) {
			$value = $_value;
		}
		if ( $value ) { $class = ' has-file'; }
		$field_type = 'text';
		if ( $_mode == 'min' ) { $field_type = 'hidden'; }
		$output .= '<input type="' . $field_type . '" name="' . $id . '" id="' . $id . '" value="' . esc_attr( $value ) . '" class="upload' . $class . '" />';
		$output .= '<input id="upload_' . $id . '" class="upload_button button" type="button" value="' . __( 'Upload', 'h2cweb' ) . '" rel="' . $int . '" />';
		return $output;
	}
}
if ( ! function_exists( 'h2cweb_mlu_get_silentpost' ) ) {
	function h2cweb_mlu_get_silentpost ( $_token ) {
		global $wpdb;
		$_id = 0;
		$_token = strtolower( str_replace( ' ', '_', $_token ) );
		if ( $_token ) {
			$_args = array( 'post_parent' => '0', 'post_type' => 'regulusframework', 'post_name' => 'regulus-wf-' . $_token, 'post_status' => 'draft', 'comment_status' => 'closed', 'ping_status' => 'closed' );
			$_posts = get_post( $_args );
			if ( count( $_posts ) ) {
				$_id = $_posts->ID;
			} else {
				$_words = explode( '_', $_token );
				$_title = join( ' ', $_words );
				$_title = ucwords( $_title );
				$_post_data = array( 'post_title' => $_title );
				$_post_data = array_merge( $_post_data, $_args );
				$_id = wp_insert_post( $_post_data );
			}
		}
		return $_id;
	}
}
?>