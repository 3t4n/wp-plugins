<script>







		jQuery(document).ready(function(){







			jQuery('#cube-3d-sliders-list .remove').click(function(){



				var c3s = jQuery(this).parent('form').parent('.cube-3d-slider');



				jQuery.post(ajaxurl, {action: 'remove_c3s', id: jQuery(this).attr('rel'), _ajax_nonce: '<?php echo esc_attr(wp_create_nonce( "remove_c3s" )); ?>' }, function(){



					jQuery(c3s).remove();



				});



			});







			//choix d'une image dans la librairie Wordpress



		    jQuery('.form_c3s .choose_img').click(function(e) {



		    	var _this = this;



		        e.preventDefault();



		        var image = wp.media({ 



		            title: 'Upload Image',



		            // mutiple: true if you want to upload multiple files at once



		            multiple: false



		        }).open()



		        .on('select', function(e){



		            // This will return the selected image from the Media Uploader, the result is an object



		            var uploaded_image = image.state().get('selection').first();



		            // We convert uploaded_image to a JSON object to make accessing it easier



		            // Output to the console uploaded_image



		            var image_url = uploaded_image.toJSON().url;



		            // Let's assign the url value to the input field



		            jQuery('.form_c3s input[name='+jQuery(_this).attr('rel')+']').val(image_url);



		        });



		    });







		    //accordion pour les faces des cubes



		    jQuery('.form_c3s .accordion').accordion({ heightStyle: "content", collapsible: true, active: false });







		    //formulaire nouveau slider



		    jQuery('.add_new_c3s').click(function(){







		    	jQuery('#form_new_c3s').toggle('fast');







		    });







		});







</script>







<h2>All cube 3D sliders</h2>



<a href="#" class="add_new_c3s"><img src="<?php echo esc_url(plugins_url( 'images/add.png', dirname(__FILE__))) ?>" /> Add a new cube 3d slider</a><br />



<form action="" method="post" class="form_c3s" id="form_new_c3s">



	<?php wp_nonce_field( 'edit_c3s' ) ?>



	<label>Name: </label><input type="text" name="name" /><br />



	<label>Width: </label><input type="text" name="width" />px<br />



	<div class="accordion">



		<h3>Front face</h3>



		<div>



			<label>Front face image: </label><input type="text" name="front_face_image" /> <button class="choose_img button-secondary" rel="front_face_image">Browser library</button><br />



			<label>Front face text: </label><?php wp_editor( '', 'front_face_text' ); ?>



		</div>



		<h3>Back face</h3>



		<div>



			<label>Back face image: </label><input type="text" name="back_face_image" /> <button class="choose_img button-secondary" rel="back_face_image">Browser library</button><br />



			<label>Back face text: </label><?php wp_editor( '', 'back_face_text' ); ?>



		</div>



		<h3>Right face</h3>



		<div>



			<label>Right face image: </label><input type="text" name="right_face_image" /> <button class="choose_img button-secondary" rel="right_face_image">Browser library</button><br />



			<label>Right face text: </label><?php wp_editor( '', 'right_face_text' ); ?>



		</div>



		<h3>Left face</h3>



		<div>



			<label>Left face image: </label><input type="text" name="left_face_image" /> <button class="choose_img button-secondary" rel="left_face_image">Browser library</button><br />



			<label>Left face text: </label><?php wp_editor( '', 'left_face_text' ); ?>



		</div>



		<h3>Top face</h3>



		<div>



			<label>Top face image: </label><input type="text" name="top_face_image" /> <button class="choose_img button-secondary" rel="top_face_image">Browser library</button><br />



			<label>Top face text: </label><?php wp_editor( '', 'top_face_text' ); ?>



		</div>



		<h3>Bottom face</h3>



		<div>



			<label>Bottom face image: </label><input type="text" name="bottom_face_image" /> <button class="choose_img button-secondary" rel="bottom_face_image">Browser library</button><br />



			<label>Bottom face text: </label><?php wp_editor( '', 'bottom_face_text' ); ?>



		</div>



	</div>



	<input type="submit" value="Add cube 3d slider" class="button button-primary" />



</form>







<div id="cube-3d-sliders-list">



<?php







if(sizeof($cubes) > 0)



{



	foreach($cubes as $cube)



	{



		$cube->anim_axes = explode(',', $cube->anim_axes);



		echo '<div class="cube-3d-slider"><form action="" method="post" class="form_c3s">';



		wp_nonce_field( 'update_c3s_'.(int)$cube->id, "_wpnonce", true );



		echo '<label>Name : </label><input type="text" name="name" value="'.esc_attr($cube->name).'" /><input type="hidden" name="id" value="'.(int)$cube->id.'" /> <br />';



		echo '<label>Width : </label>';



		echo '<input type="text" name="width" value="'.(int)$cube->width.'" />px<br />';



		echo '<div class="accordion">



			<h3>Front face</h3>



			<div>



				<label>Front face image: </label><input type="text" name="front_face_image" value="'.esc_url($cube->front_face_image).'" /> <button class="choose_img" rel="front_face_image">Browser library</button><br />



				<label>Front face text: </label>';



			wp_editor( $cube->front_face_text, 'front_face_text_'.(int)$cube->id, array('textarea_name' => 'front_face_text')  );



			echo '</div>



			<h3>Back face</h3>



			<div>



				<label>Back face image: </label><input type="text" name="back_face_image" value="'.esc_url($cube->back_face_image).'" /> <button class="choose_img" rel="back_face_image">Browser library</button><br />



				<label>Back face text: </label>';



			wp_editor( $cube->back_face_text, 'back_face_text_'.(int)$cube->id, array('textarea_name' => 'back_face_text')  );



			echo '</div>



			<h3>Right face</h3>



			<div>



				<label>Right face image: </label><input type="text" name="right_face_image" value="'.esc_url($cube->right_face_image).'" /> <button class="choose_img" rel="right_face_image">Browser library</button><br />



				<label>Right face text: </label>';



			wp_editor( $cube->right_face_text, 'right_face_text_'.(int)$cube->id, array('textarea_name' => 'right_face_text')  );



			echo '</div>



			<h3>Left face</h3>



			<div>



				<label>Left face image: </label><input type="text" name="left_face_image" value="'.esc_url($cube->left_face_image).'" /> <button class="choose_img" rel="left_face_image">Browser library</button><br />



				<label>Left face text: </label>';



			wp_editor( $cube->left_face_text, 'left_face_text_'.$cube->id, array('textarea_name' => 'left_face_text') );



			echo '</div>



			<h3>Top face</h3>



			<div>



				<label>Top face image: </label><input type="text" name="top_face_image" value="'.esc_url($cube->top_face_image).'" /> <button class="choose_img" rel="top_face_image">Browser library</button><br />



				<label>Top face text: </label>';



			wp_editor( $cube->top_face_text, 'top_face_text_'.(int)$cube->id, array('textarea_name' => 'top_face_text')  );



			echo '</div>



			<h3>Bottom face</h3>



			<div>



				<label>Bottom face image: </label><input type="text" name="bottom_face_image" value="'.esc_url($cube->bottom_face_image).'" /> <button class="choose_img" rel="bottom_face_image">Browser library</button><br />



				<label>Bottom face text: </label>';



			wp_editor( $cube->bottom_face_text, 'bottom_face_text_'.(int)$cube->id, array('textarea_name' => 'bottom_face_text')  );



			echo '</div>



		</div>';



		echo '<input type="image" src="'.esc_url(plugins_url( 'images/save.png', dirname(__FILE__))).'" title="Save" />	



		<img title="Remove this cube 3d slider" class="remove action" rel="'.(int)$cube->id.'" src="'.esc_url(plugins_url( 'images/remove.png', dirname(__FILE__))).'" />



		Shortcode : <input type="text" value="[cube-3d-slider id='.(int)$cube->id.']" readonly onClick="this.select()" />



		</form>



		</div>';



	}



}



else



	echo '<p>No Cube 3D slider created yet !</p>';







?>



</div>







<h2>Need more options ? Look at <a href="https://www.info-d-74.com/en/produit/cube-3d-slider-pro-plugin-wordpress-2/" target="_blank">Cube 3D Slider Pro!</a><br />



and like InfoD74 to discover my new plugins: <a href="https://www.facebook.com/infod74/" target="_blank"><img src="<?php echo esc_url(plugins_url( 'images/fb.png', dirname(__FILE__))) ?>" alt="" /></a></h2>