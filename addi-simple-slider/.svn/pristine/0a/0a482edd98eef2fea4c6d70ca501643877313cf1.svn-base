<?php

function slider_options_array($id){
	
	$timeout_text = get_post_meta($id, "_ssd_timeout", true);
	$speed_text = get_post_meta($id, "_ssd_speed", true);
	$prev_text = get_post_meta($id, "_ssd_prev", true);
	$next_text = get_post_meta($id, "_ssd_next", true);
	$slider_Id = get_post_meta($id, "_ssd_id", true);
	$name_space = get_post_meta($id, "_ssd_namespace", true);
	
    $autoplay  = (get_post_meta($id, "_ssd_autoplay", true) == 'enabled') ? 'true' : 'false';
	
	$timeout = ($timeout_text != '') ? $timeout_text: '4000';
	$speed = ($speed_text != '') ? $speed_text: '500';
	
    $pager  = (get_post_meta($id, "_ssd_pager", true) == 'enabled') ? 'true' : 'false' ;
	$nav  = (get_post_meta($id, "_ssd_nav", true) == 'enabled') ? 'true' : 'false' ;
	$rand  = (get_post_meta($id, "_ssd_rand", true) == 'enabled') ? 'true' : 'false' ;
	$pause  = (get_post_meta($id, "_ssd_pause", true) == 'enabled') ? 'true' : 'false' ;
	$pauseControls  = (get_post_meta($id, "_ssd_pauseControls", true) == 'enabled') ? 'true' : 'false' ;
	
	$prevText = ($prev_text != '') ? $prev_text: 'Previous';
	$nextText = ($next_text != '') ? $next_text: 'Next';
	
	$sliderId = ($slider_Id != '') ? $slider_Id: 'rslides';
	
	$namespace = ($name_space != '') ? $name_space: 'rslides';
	
	$pagination  = (get_post_meta($id, "_ssd_pagination", true) == 'enabled') ? 'true' : 'false' ;
	
	return array($autoplay,$timeout,$speed,$pager,$nav,$rand,$pause,$pauseControls,
				 $prevText,$nextText,$sliderId, $namespace, $pagination);
}


function admin_slider_options_array($post){
	
	$timeout_text = get_post_meta($post->ID, "_ssd_timeout", true);
	$speed_text = get_post_meta($post->ID, "_ssd_speed", true);
	$prev_text = get_post_meta($post->ID, "_ssd_prev", true);
	$next_text = get_post_meta($post->ID, "_ssd_next", true);
	$slider_Id = get_post_meta($post->ID, "_ssd_id", true);
	$name_space = get_post_meta($post->ID, "_ssd_namespace", true);
		
	
    $autoplay  = (get_post_meta($post->ID, "_ssd_autoplay", true) == 'enabled') ? 'checked' : '' ;
	
	$timeout = ($timeout_text != '') ? $timeout_text: '4000';
	$speed = ($speed_text != '') ? $speed_text: '500';
	
    $pager  = (get_post_meta($post->ID, "_ssd_pager", true) == 'enabled') ? 'checked' : '' ;
	$nav  = (get_post_meta($post->ID, "_ssd_nav", true) == 'enabled') ? 'checked' : '' ;
	$rand  = (get_post_meta($post->ID, "_ssd_rand", true) == 'enabled') ? 'checked' : '' ;
	$pause  = (get_post_meta($post->ID, "_ssd_pause", true) == 'enabled') ? 'checked' : '' ;
	$pauseControls  = (get_post_meta($post->ID, "_ssd_pauseControls", true) == 'enabled') ? 'checked' : '' ;
	
	$prevText = ($prev_text != '') ? $prev_text: 'Previous';
	$nextText = ($next_text != '') ? $next_text: 'Next';
	
	$sliderId = ($slider_Id != '') ? $slider_Id: 'rslides';
	
	$namespace = ($name_space != '') ? $name_space: 'rslides';
	
	$pagination  = (get_post_meta($post->ID, "_ssd_pagination", true) == 'enabled') ? 'checked' : '' ;
	
	return array($autoplay,$timeout,$speed,$pager,$nav,$rand,$pause,$pauseControls, 
				 $prevText,$nextText,$sliderId, $namespace, $pagination);
	
	}


function style_array(){

return array('default','light-table','3024-day','3024-night','ambiance','base16-dark','base16-light','blackboard',
			 'cobalt','eclipse','elegant','erlang-dark','lesser-dark','mbo','mdn-like','midnight','monokai','neat',
			 'night','paraiso-dark','paraiso-light','pastel-on-dark','rubyblue','solarized dark','solarized light',
			 'the-matrix','tomorrow-night-eighties','twilight','vibrant-ink','xq-dark','xq-light');
}

function save_editor_style($post_id){
$selectCss = (isset($_POST['select']) ? $_POST['select'] : 'default');
update_post_meta($post_id, "_ssd_select", $selectCss);	
}

function save_new_slider($post_id){
		/* Save Slider Images */
        $gallery_images = (isset($_POST['gallery_img']) ? $_POST['gallery_img'] : '');
        $gallery_images = strip_tags(json_encode($gallery_images));
        update_post_meta($post_id, "_ssd_gallery_images", $gallery_images);
		/* End of Save Slider Images */
		
		/* Save Caption Images */
        $caption_text = (isset($_POST['caption_img']) ? $_POST['caption_img'] : '');
        $caption_text = strip_tags(json_encode($caption_text));
        update_post_meta($post_id, "_ssd_caption_text", $caption_text);
		/* End of Save Caption Images */
		
		/*Save Slider Options*/
		$autoplay = (isset($_POST['ssd_autoplay']) ? "enabled" : '');
    	update_post_meta($post_id, "_ssd_autoplay", $autoplay);
		
		$timeout = (isset($_POST['ssd_timeout']) ? $_POST['ssd_timeout'] : '4000');
		update_post_meta($post_id, "_ssd_timeout", $timeout);
		
		$speed = (isset($_POST['ssd_speed']) ? $_POST['ssd_speed'] : '5000');
		update_post_meta($post_id, "_ssd_speed", $speed);
		
		$pager = (isset($_POST['ssd_pager']) ? "enabled" : '');
    	update_post_meta($post_id, "_ssd_pager", $pager);
		
		$nav = (isset($_POST['ssd_nav']) ? "enabled" : '');
    	update_post_meta($post_id, "_ssd_nav", $nav);
		
		$rand = (isset($_POST['ssd_rand']) ? "enabled" : '');
    	update_post_meta($post_id, "_ssd_rand", $rand);
		
		$pause = (isset($_POST['ssd_pause']) ? "enabled" : '');
    	update_post_meta($post_id, "_ssd_pause", $pause);
		
		$pauseControls = (isset($_POST['ssd_pauseControls']) ? "enabled" : '');
    	update_post_meta($post_id, "_ssd_pauseControls", $pauseControls);
		
		$prevText = (isset($_POST['ssd_prev']) ? $_POST['ssd_prev'] : 'Previous');
		update_post_meta($post_id, "_ssd_prev", $prevText);
		
		$nextText = (isset($_POST['ssd_next']) ? $_POST['ssd_next'] : 'Next');
		update_post_meta($post_id, "_ssd_next", $nextText);
		
		$sliderId = (isset($_POST['ssd_id']) ? $_POST['ssd_id'] : 'rslides');
		update_post_meta($post_id, "_ssd_id", $sliderId);
		
		$namespace = (isset($_POST['ssd_namespace']) ? $_POST['ssd_namespace'] : 'rslides');
		update_post_meta($post_id, "_ssd_namespace", $namespace);
		
		$selectCss = (isset($_POST['select']) ? $_POST['select'] : 'light-table');
		update_post_meta($post_id, "_ssd_select", $selectCss);
		
		$pagination = (isset($_POST['ssd_pagination']) ? "enabled" : '');
    	update_post_meta($post_id, "_ssd_pagination", $pagination);
		
		/*End of Save Slider Options*/

}

function create_url_image_text($html, $gallery_images, $caption_text){
	
	 $html .= '
	 <style>
	 .form, .text{width:100%}
	 
	 .form td.cap span{
		 font-weight:600;
		 color:#222;
		 margin-right:15px;
	 }
	 .form td{
		 padding-left:15px;
		 padding-right:10px;
	 }
	 .form td.cap{
	 	padding-bottom:30px; 
	 }
	 .form th{
		font-size:14px;
		font-weight:600; 
	 }
	 </style>
	 <table class="form">
	 <tr><td colspan="3" style="color:#a00; padding-left:0px; padding-bottom:5px;">* Use image caption if pagination is enabled in the slider options</td></tr>';

		for ($i = 0; $i <= 4; $i++) {
			$j = $i+1;
		
   			$html .= "<tr>
            <th><label for='Upload Images'>Image ".$j."</label></th>
            <td><input name='gallery_img[]' 
					   id='ssd_slider_upload".$j."'
					   type='hidden' value='".$gallery_images[$i]."'
					   class='text'/>
				<img id ='ssd_img_upload".$j."' src='".$gallery_images[$i]."' style='width:50%' />
			</td>
			<td><input id='upload_image_button".$j."'
					   type='button' 
					   value='Upload Image' 
					   class='button button-primary button-large'/>
			</td>
          	</tr>
			<tr><th><label for='Image Caption'></label></th>
			<td class='cap'>
				<span>Caption ".$j."</span>
					<input name='caption_img[]' 
						   id='ssd_caption_text".$j."'
						    type='text' value='".$caption_text[$i]."' 
							class='text'/>
			</td>
			</tr>";
		}
	$html .= "</table>";  

    return $html; 
	
}

function create_slider_editor($content, $textarea_theme, $select_options){
	
	$html1 = '<form action="" method="post">
				<table class="form-table"><tbody><tr valign="top"><td>
				<textarea cols="50" 
						  rows="80" 
						  name="newcontent" 
						  id="newcontent1" tabindex="1">'.$content.'
			 	</textarea>
				</td>
				</tr>
				<tr><td>
				</tbody>
				</table>
				<input type="submit" 
						name="sub" 
						value="Update File" 
						class="button button-primary button-large" 
						style="margin-right:50px">
			    Select a theme: <select onchange="selectTheme()" 
							            id="select" name="select" 
										style="margin-right:30px">';
								/*$textarea_theme = get_post_meta($post->ID, "_ssd_select", true);
							    $select_options = style_array();*/
				for ($i = 0; $i <= 30; $i++) {
				  if($textarea_theme == $select_options[$i] )	{
				  $html1 .= '<option selected>'.$select_options[$i].'</option>';
				  }
				  else {$html1 .= '<option>'.$select_options[$i].'</option>';}
				}
	$html1 .='</select><input type="submit" 
							  name="saveCss" 
							  value="Update Editor Theme" 
							  class="button button-primary button-large" 
							  action="save_editor_style($post_id)">				
			  </form>
			  <script type="text/javascript">
			        var editor = CodeMirror.fromTextArea(document.getElementById("newcontent1"),{
				         mode:"text/css",
				         lineNumbers:true
			         });
			      editor.setSize("",500);
			      var input = document.getElementById("select");
			      var theme = input.options[input.selectedIndex].innerHTML;
			
			      editor.setOption("theme", theme);
			      function selectTheme() {
				     var theme = input.options[input.selectedIndex].innerHTML;
				      editor.setOption("theme", theme);
			      }
			</script>';
			
		return $html1;		
}

function create_slider_options_panel($admin_options){
	
	 $html .= '<table class="form-table">';
     $html .= "<tr>
            	<th style=''><label>Enable Auto Play</label></th>
            	<td><input type='checkbox'".$admin_options[0]." name='ssd_autoplay' value='enabled'/></td>
				<th style=''><label>Random Play</label></th>
            	<td><input type='checkbox'".$admin_options[5]." name='ssd_rand' value='enabled'/></td>
          	</tr>
          	<tr>
            	<th style=''><label>Timout between next fade</label></th>
            	<td><input type='text' name='ssd_timeout' value='".$admin_options[1]."' /></td>
				<th style=''><label>Enable pause</label></th>
            	<td><input type='checkbox'".$admin_options[6]." name='ssd_pause' value='enabled'/></td>
          	</tr>
          	<tr>
            	<th style=''><label>Speed of fade effect</label></th>
            	<td><input type='text' name='ssd_speed' value='".$admin_options[2]."' /></td>
				<th style=''><label>Enable Pause Controls</label></th>
            	<td><input type='checkbox'".$admin_options[7]." name='ssd_pause' value='enabled'/></td>
          	</tr>
			<tr>
            	<th style=''><label>Enable Pager</label></th>
            	<td><input type='checkbox'".$admin_options[3]." name='ssd_pager' value='enabled'/></td>
				<th style=''><label>Text of Previous Control</label></th>
            	<td><input type='text' name='ssd_prev' value='".$admin_options[8]."' /></td>
          	</tr>
			<tr>
            	<th style=''><label>Enable Navigation</label></th>
            	<td><input type='checkbox'".$admin_options[4]." name='ssd_nav' value='enabled'/></td>
				<th style=''><label>Text of Next Control</label></th>
            	<td><input type='text' name='ssd_next' value='".$admin_options[9]."' /></td>
          	</tr>
			<tr>
            	<th style=''><label>Slider Id</label></th>
            	<td><input type='text' name='ssd_id' value='".$admin_options[10]."' /></td>
				<th style=''><label>Slider Namespace</label></th>
				<td><input type='text' name='ssd_namespace' value='".$admin_options[11]."' /></td>
          	</tr>
			<tr>
            	<th style=''><label>Pagination</label></th>
            	<td><input type='checkbox' ".$admin_options[12]." name='ssd_pagination' value='enabled'/></td>
          	</tr>
			</table>";  

        return $html;
}

?>