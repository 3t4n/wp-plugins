<?php 
		

add_action( 'add_meta_boxes', 'wts_add_custom_box' );
function wts_add_custom_box() {
	global $post;
	global $current_user;
		add_meta_box( 
			'wts_test_item',
			__( 'Tip Data', 'wl' ),
			'wts_test_item',
			'tip' , 'advanced', 'high'
		);

	
	
		
}
function wts_test_item(){
	global $post;
	
	
	echo '

	<div class="tw-bs">
	
	<div class="borderofblock">
		<div class="tip_container tip_preview">
		
			<div class="tip_icon"><i class="feat_icon glyphicon '.( get_post_meta( $post->ID, 'icon_input', true ) ? get_post_meta( $post->ID, 'icon_input', true ) : 'glyphicon-adjust' ).'"></i></div>
		
			<div class="tip_title"></div>
			<div class="tip_content"></div>
		</div>
	
	</div>
	
	<br>
	
	
		<div class="form-horizontal">  
        <fieldset>  
		
		<div class="control-group"> 
			<legend>Tip Settings<div class="slide_sign">+</div></legend>
		</div>
		
		<div class="block">
		<div class="control-group">  
            <label class="control-label" for="select01">Container Margin</label>  
            <div class="controls">  
              <select class="cont_margin_field trace" name="cont_margin">  ';
				for($i=0; $i<30; $i++){
				echo '<option value="'.$i.'px"  '.( get_post_meta($post->ID, 'cont_margin', true) == $i || ( !get_post_meta($post->ID, 'cont_margin', true) && $i == '10' )  ? ' selected ' : '' ).' >'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div>
		
		<div class="control-group">  
            <label class="control-label" for="select01">Container Padding</label>  
            <div class="controls">  
              <select class="cont_padding_field trace" name="cont_padding">  ';
				for($i=0; $i<30; $i++){
				echo '<option value="'.$i.'px"  '.( get_post_meta($post->ID, 'cont_padding', true) == $i || ( !get_post_meta($post->ID, 'cont_padding', true) && $i == '10' ) ? ' selected ' : '' ).' >'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div>
		  
		<div class="control-group">  
            <label class="control-label" for="input01">Tip Border Width (px)</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge border_width_filed trace" name="border_width" value="'.( get_post_meta( $post->ID, 'border_width', true ) ? get_post_meta( $post->ID, 'border_width', true ) : '0' ).'">  
            </div>  
          </div>   
		
		<div class="control-group">  
            <label class="control-label" for="input01">Tip Border Radius (px)</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge border_radius_filed trace" name="border_radius" value="'.( get_post_meta( $post->ID, 'border_radius', true ) ? get_post_meta( $post->ID, 'border_radius', true ) : '0' ).'">  
            </div>  
          </div>
		  
		  <div class="control-group">  
            <label class="control-label" for="input01">Border Color</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge border_color_filed color trace" name="border_color" value="'.( get_post_meta( $post->ID, 'border_color', true ) ? get_post_meta( $post->ID, 'border_color', true ) : '#000' ).'">  
            </div>  
          </div>
		  
		
		
		<div class="control-group">  
            <label class="control-label" for="select01">Blocks Margin</label>  
            <div class="controls">  
              <select class="blocks_margin_field trace" name="blocks_margin">  ';
				for($i=0; $i<30; $i++){
				echo '<option value="'.$i.'px" '.( get_post_meta($post->ID, 'blocks_margin', true) == $i || ( !get_post_meta($post->ID, 'blocks_margin', true) && $i==10 )  ? ' selected ' : '' ).'>'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div>
		  
		  <div class="control-group">  
            <label class="control-label" for="select01">Backgound</label>  
            <div class="controls">  
              <select class="bg_type_field trace" name="bg_type">  
			  <option value="image" '.( get_post_meta( $post->ID, 'bg_type', true ) == 'image' ? ' selected ' : '' ).' >Image
			  <option value="color" '.( get_post_meta( $post->ID, 'bg_type', true ) == 'color' ? ' selected ' : '' ).'>Color			
              </select>  
            </div>  
          </div>
		  
		 <div class="control-group">  
            <label class="control-label" for="input01">Background Color</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge bg_color_filed color trace" name="bg_color" value="'.( get_post_meta( $post->ID, 'bg_color', true ) ? get_post_meta( $post->ID, 'bg_color', true ) : '#000' ).'">  
            </div>  
          </div>
		  
		  
		  <div class="control-group">  
            <label class="control-label" for="input01">Background Image</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge trace upl_url" name="bg_image" value="'.( get_post_meta( $post->ID, 'bg_image', true ) ? get_post_meta( $post->ID, 'bg_image', true ) : plugins_url('/images/corebg.jpg', __FILE__ ) ).'">  
			  <input type="button" class="btn btn-success upl_button" value="Upload" />
            </div>  
          </div>
		  
		 </div>
		

		
		<div class="control-group"> 
			<br>
			<legend>Icon Settings<div class="slide_sign">+</div></legend>
		</div>
		
		<div class="block">
		<div class="control-group">  
            <label class="control-label" for="select01">Use Icon</label>  
            <div class="controls">  
              <select class="icon_pos_field trace" name="icon_pos">  
				<option value="none" '.( get_post_meta($post->ID, 'icon_pos', true) == 'none'  ? ' selected ' : '' ).'>None
				<option value="left" '.( get_post_meta($post->ID, 'icon_pos', true) == 'left'  ? ' selected ' : '' ).'>Left
				<option value="right" '.( get_post_meta($post->ID, 'icon_pos', true) == 'right'  ? ' selected ' : '' ).'>Right
              </select>  
            </div>  
        </div>
		
		<div class="control-group">  
            <label class="control-label" for="select01">Icon Size</label>  
            <div class="controls">  
              <select class="icon_size_field trace" name="icon_size">  ';
				for($i=30; $i<200; $i= $i+5){
				echo '<option value="'.$i.'px" '.( get_post_meta($post->ID, 'icon_size', true) == $i || (!get_post_meta($post->ID, 'icon_size', true) && $i == '70px' )  ? ' selected ' : '' ).'>'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div> 
		
		<div class="control-group">  
            <label class="control-label" for="select01">Select Icon</label>  
            <div class="controls">  
				<button type="button" id="convert" data-iconset="glyphicon" class="btn btn-default" role="iconpicker"></button>
				<input name="icon_input" class="icon_input_field" value="'.( get_post_meta($post->ID, 'icon_input', true) ? get_post_meta($post->ID, 'icon_input', true) : 'glyphicon-adjust' ).'" />
	
            </div>  
        </div>
		
		<div class="control-group">  
            <label class="control-label" for="input01">Icon Color</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge icon_color_filed color trace" name="icon_color" value="'.( get_post_meta( $post->ID, 'icon_color', true ) ? get_post_meta( $post->ID, 'icon_color', true ) : '#fff' ).'">  
            </div>  
        </div>
		
		
		<div class="control-group">  
            <label class="control-label" for="select01">Icon Margin</label>  
            <div class="controls">  
              <select class="icon_margin_field trace" name="icon_margin">  ';
				for($i=0; $i<30; $i++){
				echo '<option value="'.$i.'px"  '.( get_post_meta($post->ID, 'icon_margin', true) == $i || ( !get_post_meta($post->ID, 'icon_margin', true) && $i == 5 )  ? ' selected ' : '' ).' >'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div>
		
		</div>
	
		<div class="control-group"> 
			<br>
			<legend>First Row Settings<div class="slide_sign">+</div></legend>
		</div>
         <div class="block">  
          <div class="control-group">  
            <label class="control-label" for="input01">Content</label>  
            <div class="controls">  
              <textarea name="tip_title" rows="5" class="widefat tip_title_filed trace">'.(  count( get_post_meta( $post->ID, 'tip_title') ) > 0 ? get_post_meta( $post->ID, 'tip_title', true ) : 'Tip Title' ).'</textarea>
			  
            </div>  
          </div>  
		  
		  <div class="control-group">  
            <label class="control-label" for="input01">First Row Color</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge title_color_filed color trace" name="title_color" value="'.( get_post_meta( $post->ID, 'title_color', true ) ? get_post_meta( $post->ID, 'title_color', true ) : '#fff' ).'">  
            </div>  
          </div>
		  
		  <div class="control-group">  
            <label class="control-label" for="select01">First Row Font Size</label>  
            <div class="controls">  
              <select class="title_size_field trace" name="title_size">  ';
				for($i=10; $i<100; $i++){
				echo '<option value="'.$i.'px" '.( get_post_meta($post->ID, 'title_size', true) == $i || ( !get_post_meta($post->ID, 'title_size', true) && $i == 30 )  ? ' selected ' : '' ).'>'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div> 
		  
		  <div class="control-group">  
            <label class="control-label" for="select01">First Row Line Height</label>  
            <div class="controls">  
              <select class="title_line_height_field trace" name="title_line_height">  ';
				for($i=10; $i<100; $i++){
				echo '<option value="'.$i.'px" '.( get_post_meta($post->ID, 'title_line_height', true) == $i || ( !get_post_meta($post->ID, 'title_line_height', true) && $i == 30 )  ? ' selected ' : '' ).'>'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div> 
		  
		  <div class="control-group">  
            <label class="control-label" for="select01">First Row Align</label>  
            <div class="controls">  
              <select class="title_align_field trace" name="title_align">  
			  <option value="left" '.( get_post_meta( $post->ID, 'title_align', true ) == 'left' ? ' selected ' : '' ).' >Left
			  <option value="center" '.( get_post_meta( $post->ID, 'title_align', true ) == 'center' || !get_post_meta( $post->ID, 'title_align', true ) ? ' selected ' : '' ).'>Center
			  <option value="right" '.( get_post_meta( $post->ID, 'title_align', true ) == 'right' ? ' selected ' : '' ).'>Right
			  <option value="justify" '.( get_post_meta( $post->ID, 'title_align', true ) == 'justify' ? ' selected ' : '' ).'>Justify
				
              </select>  
            </div>  
          </div>
		 </div> 
		<div class="control-group"> 
			<br>
			<legend>Second Row Settings<div class="slide_sign">+</div></legend>
		</div>

		 <div class="block">
		   <div class="control-group">  
            <label class="control-label" for="textarea">Content</label>  
            <div class="controls">  
              <textarea class="widefat tip_content_filed trace" name="tip_content" rows="5">'.(  count( get_post_meta( $post->ID, 'tip_content') ) > 0  ? get_post_meta( $post->ID, 'tip_content', true ) : 'Tip Content' ).'</textarea>
            </div>  
          </div>  
		  
		  <div class="control-group">  
            <label class="control-label" for="input01">Second Row Color</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge content_color_filed color trace" name="content_color" value="'.( get_post_meta( $post->ID, 'content_color', true ) ? get_post_meta( $post->ID, 'content_color', true ) : '#fff' ).'">  
            </div>  
          </div>
		  <div class="control-group">  
            <label class="control-label" for="select01">Second Row Font Size</label>  
            <div class="controls">  
              <select class="content_size_field trace" name="content_size">  ';
				for($i=10; $i<100; $i++){
				echo '<option value="'.$i.'px" '.( get_post_meta($post->ID, 'content_size', true) == $i || ( !get_post_meta($post->ID, 'content_size', true) && $i == 20 ) ? ' selected ' : '' ).'>'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div>
		  
		  <div class="control-group">  
            <label class="control-label" for="select01">Second Row Line Height</label>  
            <div class="controls">  
              <select class="content_line_height_field trace" name="content_line_height">  ';
				for($i=10; $i<100; $i++){
				echo '<option value="'.$i.'px" '.( get_post_meta($post->ID, 'content_line_height', true) == $i || ( !get_post_meta($post->ID, 'content_line_height', true) && $i == 20 ) ? ' selected ' : '' ).'>'.$i.'px';
				}
		echo '
              </select>  
            </div>  
          </div>
		  
		  <div class="control-group">  
            <label class="control-label" for="select01">Second Row Align</label>  
            <div class="controls">  
              <select class="content_align_field trace" name="content_align">  
			  <option value="left" '.( get_post_meta( $post->ID, 'content_align', true ) == 'left' ? ' selected ' : '' ).' >Left
			  <option value="center" '.( get_post_meta( $post->ID, 'content_align', true ) == 'center' || !get_post_meta( $post->ID, 'content_align', true ) ? ' selected ' : '' ).'>Center
			  <option value="right" '.( get_post_meta( $post->ID, 'content_align', true ) == 'right' ? ' selected ' : '' ).'>Right
			  <option value="justify" '.( get_post_meta( $post->ID, 'content_align', true ) == 'justify' ? ' selected ' : '' ).'>Justify
				
              </select>  
            </div>  
          </div>
		  
		  
		    
          
		</div>
        </fieldset>  
</div>  

	
	</div>
	';	
}


add_action( 'save_post', 'wts_save_postdata' );
function wts_save_postdata( $post_id ) {
global $current_user; 
 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }
  /// User editotions
  if( get_post_type( $post_id ) == 'tip' ){
		foreach( $_POST as $key=>$value ){
			update_post_meta( $post_id, $key, $value );
		}
  }
		
  
  
}

?>