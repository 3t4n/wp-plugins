<?php
        // reset the default values (if we edit a post)
	$custom_options = get_post_custom($post->ID);
	foreach($this->ads_values as $k=>$v)
	{
            if(isset($custom_options[$k][0])) {
                $this->ads_values[$k] =  $custom_options[$k][0]; 
            }
	}
?>
      <!-- Ads Type field -->
      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo __('Ads Type',$this->plugin_name) ?></label>
        <select name="ads_type" id='ads_type' class='form-control'>
                <option value='ads_intro'><?php echo __('Intro',$this->plugin_name) ?></option>
                <option value='ads_content'><?php echo __('Inside Articles',$this->plugin_name) ?></option>
                <option value='ads_hidden'><?php echo __('Hidden Layer',$this->plugin_name) ?></option>
            </select>
      </div>


      <!-- Ads content type -->
      <div class="form-group" id='content-meta'>
        <label><?php echo __('Ads Content',$this->plugin_name) ?></label>
        <select name="ads_content" id='ads_content' class='form-control'>
                <option value="yt"><?php echo __('Youtube',$this->plugin_name) ?></option>
                <option value="vimeo"><?php echo __('Vimeo',$this->plugin_name) ?></option>
                <option value="soundcloud"><?php echo __('Soundcloud',$this->plugin_name) ?></option>
                <option value="adsense"><?php echo __('Google Adsense',$this->plugin_name) ?></option>
                <option value="fb"><?php echo __('Facebook Feed',$this->plugin_name) ?></option>
                <option value="code"><?php echo __('Free Code',$this->plugin_name) ?></option>
                <option value="code_box"><?php echo __('Code Inside Box',$this->plugin_name) ?></option>
                <option value='image'><?php echo __('Image',$this->plugin_name) ?></option>
            </select>
      </div>
	  

    <!-- Options Boxes -->
    <div  id='link-meta' class='opt_box init-hide'>
        <h4 class='box-header'><?php echo __('Link Options',$this->plugin_name) ?></h4>
        <hr />
        <div class='form-group'>
                <label><?php echo __('Link',$this->plugin_name) ?></label>
                <input value='<?php echo $this->ads_values['ads_link']; ?>'  name='ads_link' class='form-control' type="text"  />

                <label><?php echo __('Target',$this->plugin_name) ?></label>
                <select class='form-control' name='ads_link_target'>
                    <option value='_blank'><?php echo __('New Tab',$this->plugin_name) ?></option>
                    <option value='parent'><?php echo __('Same Tab',$this->plugin_name) ?></option>
                </select>
        </div>
    </div>

    <div  id='media-meta' class='opt_box init-hide'>
                    <h4 class='box-header'><?php echo __('Video Options',$this->plugin_name) ?></h4>
                    <hr />
                    <div class='form-group'>
                        <label><?php echo __('Video link',$this->plugin_name) ?></label>
                        <input value='<?php echo $this->ads_values['ads_media_link']; ?>'  class='form-control' name='ads_media_link' type="text"  /><br />

                        <label><?php echo __('Width',$this->plugin_name) ?></label>
                        <input value='<?php echo $this->ads_values['ads_media_w']; ?>'  class='form-control' name='ads_media_w' type="text"  /><br />

                        <label><?php echo __('Height',$this->plugin_name) ?></label>
                        <input value='<?php echo $this->ads_values['ads_media_h']; ?>'  class='form-control' name='ads_media_h' type="text"  /><br />
                    </div>
                    <hr />
    </div>


	<div id='fb-meta' class='opt_box init-hide'>
	  	<h4 class='box-header'><?php echo __('Facebook Options',$this->plugin_name) ?></h4> <hr />
	  	<div class='form-group'>
                    <label><?php echo __('Facebook link',$this->plugin_name) ?></label>
                    <input value='<?php echo $this->ads_values['ads_fb_link']; ?>'  class='form-control' type="text" name='ads_fb_link' /><br />

                    <label><?php echo __('Theme',$this->plugin_name) ?></label>
                    <select name='ads_fb_theme' class='form-control'>
                            <option value='light'><?php echo __('light',$this->plugin_name) ?></option>
                            <option value='dark'><?php echo __('Dark',$this->plugin_name) ?></option>
                    </select>
                </div>
                <div class='form-group'>
                    <label><?php echo __('Width',$this->plugin_name) ?></label>
                    <input value='<?php echo $this->ads_values['ads_fb_w']; ?>'  class='form-control' name='ads_fb_w' type="text"  />

                    <label><?php echo __('Height',$this->plugin_name) ?></label>
                    <input value='<?php echo $this->ads_values['ads_fb_h']; ?>'  class='form-control' name='ads_fb_h' type="text"  />
                </div>

                <div class='form-group'>
                    <div class="checkbox">
                        <label><input value='true'  name='ads_fb_friends' id='ads_fb_friends' type="checkbox">
                          <?php echo __("Show Friends' Faces",$this->plugin_name) ?></label>
                    </div>
                    <div class="checkbox">
                        <label><input value='true'  name='ads_fb_header' id='ads_fb_header' type="checkbox">
                          <?php echo __('Show Header',$this->plugin_name) ?></label>
                    </div>
                    <div class="checkbox">
                        <label><input value='true'  name='ads_fb_posts' id='ads_fb_posts' type="checkbox">
                          <?php echo __('Show Posts',$this->plugin_name) ?></label>
                    </div>
                    <div class="checkbox">
                        <label><input value='true'  name='ads_fb_border' id='ads_fb_border' type="checkbox">
                          <?php echo __('Show Border',$this->plugin_name) ?></label>
                    </div>
                </div>

	    <hr />
	</div>

	<div id='sound-meta' class='opt_box init-hide'>
	  	<h4 class='box-header'><?php echo __('Soundcloud Options',$this->plugin_name) ?></h4>
	  	<hr />
	  	<div class='form-group'>
                <label><?php echo __('Soundcloud Link',$this->plugin_name) ?></label>
                <input value='<?php echo $this->ads_values['ads_sound_link']; ?>'  class='form-control' type="text" name='ads_sound_link' /><br />

                <label><?php echo __('Frame Width',$this->plugin_name) ?></label>
                <input value='<?php echo $this->ads_values['ads_sound_w']; ?>'  class='form-control' type="text" name='ads_sound_w' /><br />

                <label><?php echo __('Frame Height',$this->plugin_name) ?></label>
                <input value='<?php echo $this->ads_values['ads_sound_h']; ?>'  class='form-control' type="text" name='ads_sound_h' /><br />

                <div class="checkbox">
                        <label><input   name='ads_sound_autoplay' id='ads_sound_autoplay' type="checkbox" value="true">
                          <?php echo __('Autoplay',$this->plugin_name) ?></label>
                </div>

                <div class="checkbox">
                        <label><input   name='ads_sound_visual' id='ads_sound_visual' type="checkbox" value="true">
                          <?php echo __('Full Visual View',$this->plugin_name) ?></label>
                </div>

                <div class="checkbox">
                        <label><input   name='ads_sound_comments' id='ads_sound_comments' type="checkbox" value="true">
                          <?php echo __('Show Comments',$this->plugin_name) ?></label>
                </div>

                <div class="checkbox">
                        <label><input   name='ads_sound_user' id='ads_sound_user' type="checkbox" value="true">
                          <?php echo __('Show User',$this->plugin_name) ?></label>
                </div>
	    </div>
	    <hr />
	</div>

	<div class='form-group init-hide opt_box' id='adsense-meta'>
	  	<label><?php echo __('adsense',$this->plugin_name) ?></label>
	  	<textarea name='ads_adsense' class='form-control'><?php echo $this->ads_values['ads_adsense']; ?></textarea>
	</div>

	<div class='form-group init-hide opt_box' id='code-meta'>
	  	<label><?php echo __('Code',$this->plugin_name) ?></label>
	  	<textarea name='ads_code' class='form-control'><?php echo $this->ads_values['ads_code']; ?></textarea>
	</div>

	<div class='form-group init-hide opt_box' id='code_box-meta'>
	  	<label><?php echo __('Code',$this->plugin_name) ?></label>
	  	<textarea name='ads_code_box' class='form-control'><?php echo $this->ads_values['ads_code_box']; ?></textarea>

	  	<label><?php echo __('Box Width',$this->plugin_name) ?></label>
	  	<input value='<?php echo $this->ads_values['ads_code_box_w']; ?>'  type='text' class='form-control' name='ads_code_box_w' />

	  	<label><?php echo __('Box Height',$this->plugin_name) ?></label>
	  	<input value='<?php echo $this->ads_values['ads_code_box_h']; ?>'  type='text' class='form-control' name='ads_code_box_h' />

	  	<label><?php echo __('Box Border Width',$this->plugin_name) ?></label>
	  	<input value='<?php echo $this->ads_values['ads_code_box_b_w']; ?>'  type='text' class='form-control' name='ads_code_box_b_w' />

	  	<label><?php echo __('Box Border Color',$this->plugin_name) ?></label>
	  	<input value='<?php echo $this->ads_values['ads_code_box_b_c']; ?>'  type='text' class='form-control' id='ads_code_box_b_c' name='ads_code_box_b_c' />
	</div>

	<div class='form-group init-hide opt_box' id='image-meta'>
            <div class='form-group'>
                <label><?php echo __('Image',$this->plugin_name) ?></label> <br />
                <button id="upload_image_button" class='btn btn-primary'><?php echo __('Upload Image',$this->plugin_name) ?></button>
                <img id='ads_image_thumbnail' src='<?php echo $this->ads_values['ads_image_file'] ?>' width='84' height='64' class='<?php echo (empty($this->ads_values['ads_image_file'])) ? "init-hide" : ""; ?>'/>
                <input id="ads_image_file" type="hidden" name="ads_image_file" value="<?php echo $this->ads_values['ads_image_file'] ?>" />
            </div>
            <div class='form-group'>
                <label><?php echo __('Link',$this->plugin_name) ?></label>
                <input value='<?php echo $this->ads_values['ads_image_link']; ?>' type='text' class='form-control' id='ads_image_link' name='ads_image_link' />

                <label><?php echo __('Width',$this->plugin_name) ?></label>
                <input value='<?php echo $this->ads_values['ads_image_width']; ?>' type='text' class='form-control' id='ads_image_width' name='ads_image_width' />

                <label><?php echo __('Height',$this->plugin_name) ?></label>
                <input value='<?php echo $this->ads_values['ads_image_height']; ?>' type='text' class='form-control' id='ads_image_height' name='ads_image_height' />
            </div>
	</div>

	<!-- View In -->
	<div class="form-group  init-hide" id='view_in-meta'>
	    <label><?php echo __('View In',$this->plugin_name) ?></label>
	    <select name='ads_view_in' id='ads_view_in' class='form-control'>
                    <option value='all'><?php echo __('All',$this->plugin_name) ?></option>
                    <option value='home'><?php echo __('Homepage',$this->plugin_name) ?></option>
                    <option value='post'><?php echo __('Post Page',$this->plugin_name) ?></option>
                    <option value='page'><?php echo __('Page',$this->plugin_name) ?></option>
                    <option value='category'><?php echo __('Category',$this->plugin_name) ?></option>

                    <option value='author'><?php echo __('Author Page',$this->plugin_name) ?></option>
                    <option value='archive'><?php echo __('Archive',$this->plugin_name) ?></option>
                    <option value='search'><?php echo __('Search',$this->plugin_name) ?></option>
                    <option value='404'><?php echo __('Not Found 404',$this->plugin_name) ?></option>

                    <option value='posts'><?php echo __('Specific Posts',$this->plugin_name) ?></option>
                    <option value='pages'><?php echo __('Specific Pages',$this->plugin_name) ?></option>
                    <option value='spec_category'><?php echo __('Specific Categories',$this->plugin_name) ?></option>
            </select> <br />
		<div class='init-hide view_in_opt' id='ads_categories'>
                    <select multiple='multiple' class='form-control' name='ads_categories[]' id='ads_categories'>
                            <?php
                                // list all categories
                                $cats = get_all_category_ids();
                                foreach($cats as $id) {
                                        echo "<option value='{$id}'>".get_cat_name($id)."</option>";
                                }
                             ?>
                    </select>
		</div>
		<div class='init-hide view_in_opt' id='ads_post_ids'>
			<label><?php echo __('Posts IDs',$this->plugin_name) ?></label>
			<input value='<?php echo $this->ads_values['ads_post_ids']; ?>'  class='form-control'  name='ads_post_ids' />
		</div>
		<div class='init-hide view_in_opt' id='ads_page_ids'>
			<label><?php echo __('Pages IDs',$this->plugin_name) ?></label>
			<input value='<?php echo $this->ads_values['ads_page_ids']; ?>'  class='form-control'  name='ads_page_ids' />
		</div>
		
	</div>

	<!-- Ads Dates -->
	<div class="form-group" id="date-meta">
		<label><?php echo __('Starts at',$this->plugin_name) ?></label>
		<input value='<?php echo gmdate("d-m-Y",$this->ads_values['ads_start_at']); ?>'  class='form-control' id='ads_start_at' name='ads_start_at' /> 

		<label><?php echo __('Ends at',$this->plugin_name) ?></label>
		<input value='<?php echo gmdate("d-m-Y",$this->ads_values['ads_end_at']); ?>'  class='form-control' id='ads_end_at' name='ads_end_at' /> 
	</div>

	<script>
	jQuery(document).ready(function(){
		// set <select> options values
		jQuery('#ads_type').val('<?php echo $this->ads_values['ads_type'] ?>');
		jQuery('#ads_content').val('<?php echo $this->ads_values['ads_content'] ?>');
		jQuery('#ads_link_target').val('<?php echo $this->ads_values['ads_link_target'] ?>');
		jQuery('#ads_fb_theme').val('<?php echo $this->ads_values['ads_fb_theme'] ?>');
		jQuery('#ads_view_in').val('<?php echo $this->ads_values['ads_view_in'] ?>');
		

		
		<?php 
			// set <checkbox> value
                        if($this->ads_values['ads_fb_friends'] == 'on') {echo "jQuery('#ads_fb_friends').prop('checked',true);";}
			if($this->ads_values['ads_fb_header'] == 'on') {echo "jQuery('#ads_fb_header').prop('checked',true);";}
			if($this->ads_values['ads_fb_posts'] == 'on') {echo "jQuery('#ads_fb_posts').prop('checked',true);";}
			if($this->ads_values['ads_fb_border'] == 'on') {echo "jQuery('#ads_fb_border').prop('checked',true);";}
			if($this->ads_values['ads_sound_autoplay'] == 'true') {echo "jQuery('#ads_sound_autoplay').prop('checked',true);";}
			if($this->ads_values['ads_sound_visual'] == 'true') {echo "jQuery('#ads_sound_visual').prop('checked',true);";}
			if($this->ads_values['ads_sound_comments'] == 'true') {echo "jQuery('#ads_sound_comments').prop('checked',true);";}
			if($this->ads_values['ads_sound_user'] == 'true') {echo "jQuery('#ads_sound_user').prop('checked',true);";}
		?>
		// set <select multi> values
		<?php if(isset($custom_options['ads_categories'])) { ?>
		var categories = '<?php echo implode(',',$custom_options['ads_categories']) ?>';
		jQuery.each(categories.split(","), function(i,e){
			if(jQuery.trim(e) !== '')
		    { jQuery("#ads_categories option[value='" + jQuery.trim(e) + "']").prop("selected", true); }
		});
		<?php } ?>

                // set which options should be displayed or hidden
                opt_display('<?php echo $this->ads_values['ads_content']; ?>');
                view_in_display('<?php echo $this->ads_values['ads_type']; ?>');

                <?php if($this->ads_values['ads_type'] == 'ads_hidden') {
                      ?> jQuery('#content-meta').hide();
                                    opt_display('link'); <?php
                } else { ?>
                    jQuery('#content-meta').show();
                            jQuery('#link-meta').hide(); view_in_opt_display('');
                 <?php }  ?>

                view_in_opt_display('<?php echo $this->ads_values['ads_view_in']; ?>');
            });
	</script>