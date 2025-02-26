<?php

global $post;
$fpfbip_page_url = get_post_meta($post->ID, '_fpfbip_page_url', true);
$fpfbip_album_pics_url = get_post_meta($post->ID, '_fpfbip_album_pics_url', true);
$fpfbip_no_of_post = get_post_meta($post->ID, '_fpfbip_no_of_post', true);
$fpfbip_display_style = get_post_meta($post->ID, '_fpfbip_display_style', true);
$fpfbip_default_tab = get_post_meta($post->ID, '_fpfbip_default_tab', true);
$fpfbip_date_format = get_post_meta($post->ID, '_fpfbip_date_format', true);
$fpfbip_container_background_color = get_post_meta($post->ID, '_fpfbip_container_background_color', true);
$fpfbip_post_background_color = get_post_meta($post->ID, '_fpfbip_post_background_color', true);
$fpfbip_header_background_color = get_post_meta($post->ID, '_fpfbip_header_background_color', true);
$fpfbip_header_text_color = get_post_meta($post->ID, '_fpfbip_header_text_color', true);
$fpfbip_title_color = get_post_meta($post->ID, '_fpfbip_title_color', true);
$fpfbip_likes_color = get_post_meta($post->ID, '_fpfbip_likes_color', true);
$fpfbip_controls_text_color = get_post_meta($post->ID, '_fpfbip_controls_text_color', true);
$fpfbip_title_font_size = get_post_meta($post->ID, '_fpfbip_title_font_size', true);
$fpfbip_title_font_weight = get_post_meta($post->ID, '_fpfbip_title_font_weight', true);
$fpfbip_likes_font_fize = get_post_meta($post->ID, '_fpfbip_likes_font_fize', true);
$fpfbip_base_font_size = get_post_meta($post->ID, '_fpfbip_base_font_size', true);
$fpfbip_load_more_text = get_post_meta($post->ID, '_fpfbip_load_more_text', true);
$fpfbip_cta_text = get_post_meta($post->ID, '_fpfbip_cta_text', true);
$fpfbip_cta_link = get_post_meta($post->ID, '_fpfbip_cta_link', true);
$fpfbip_title_font_family = get_post_meta($post->ID, '_fpfbip_title_font_family', true);
$fpfbip_general_font_family = get_post_meta($post->ID, '_fpfbip_general_font_family', true);
$fpfbip_show_hide_cover_image = get_post_meta($post->ID, '_fpfbip_show_hide_cover_image', true);
$fpfbip_show_hide_header = get_post_meta($post->ID, '_fpfbip_show_hide_header', true);
$fpfbip_show_hide_tabs = get_post_meta($post->ID, '_fpfbip_show_hide_tabs', true);
$fpfbip_show_hide_sorting = get_post_meta($post->ID, '_fpfbip_show_hide_sorting', true);
$fpfbip_show_hide_loading_mechanism = get_post_meta($post->ID, '_fpfbip_show_hide_loading_mechanism', true);
$fpfbip_show_hide_cta_button = get_post_meta($post->ID, '_fpfbip_show_hide_cta_button', true);
$fpfbip_show_hide_popup_details = get_post_meta($post->ID, '_fpfbip_show_hide_popup_details', true);
$fpfbip_show_hide_thumbnail_likes_comments = get_post_meta($post->ID, '_fpfbip_show_hide_thumbnail_likes_comments', true);
$fpfbip_show_hide_page_about_info = get_post_meta($post->ID, '_fpfbip_show_hide_page_about_info', true);
$fpfbip_item_display_mode = get_post_meta($post->ID, '_fpfbip_item_display_mode', true);


?>


<style>

@import url("http://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
@import url("http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


#fpfbip_tabs {
  min-width: 320px;
  width: 100%;
  margin: 0 auto;
  background: #fff;
  font-size: 16px;
}

#content1 {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

#content2 {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

#tab1 {
  display: none;
}

#tab2 {
  display: none;
}

#tab1_label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
  margin-left: 29%;
  margin-top: 5px;
}

#tab2_label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
  margin-top: 5px;
  
}


#tab1_label:hover {
  color: #888;
  cursor: pointer;
}

#tab2_label:hover {
  color: #888;
  cursor: pointer;
}

#tab1:checked + #tab1_label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid orange;
  border-bottom: 1px solid #fff;
}

#tab2:checked + #tab2_label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid orange;
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2 {
  display: block;
}

@media screen and (max-width: 650px) {
 #tab1_label {
    font-size: 0;
  }

  #tab2_label {
    font-size: 0;
  }

 #tab1_label:before {
    margin: 0;
    font-size: 18px;
  }

  #tab2_label:before {
    margin: 0;
    font-size: 18px;
  }
}
@media screen and (max-width: 400px) {
 #tab1_label {
    padding: 15px;
  }

  #tab2_label {
    padding: 15px;
  }
}



</style>




<main id="fpfbip_tabs">

<div id="fpfbip_header">
		
		<h1 id="fpfbip_header_text">Facebook Fan Page</h1>

	</div>

  <input id="tab1" type="radio" name="tabs" checked>
  <label id="tab1_label" for="tab1">General Settings</label>

  <input id="tab2" type="radio" name="tabs">
  <label id="tab2_label" for="tab2">Show/Hide Stuff</label>

  <section id="content1">


<style>
	
	#fpfbip_main_container{
		width: 100%;
		background-color: #fff;
	}

	#fpfbip_header {
		text-align: center;
		background-color: #3b5998;
		padding: 5px 0px;
	}

	#fpfbip_header_text {
		margin: 0px;
		line-height: 1em;
		font-size: 2em;
		color: #fff;
	}

	#fpfbip_general_settings {
		padding: 10px;
		font-size: 16px;
	}

	.fpfbip_table_data{
		padding-top: 10px;
		padding-bottom: 10px;
	}

</style>



    
    <div id="fpfbip_main_container">
	

	<div id="fpfbip_general_settings">
		

		<table style="width: 100%;">
			
			<tr>
				<td class="fpfbip_table_data" style="width: 40%;"><strong>Facebook Page Url:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" placeholder="http://www.example.com/example" name="fpfbip_page_url" value="<?php echo $fpfbip_page_url; ?>"></td>
			</tr>


			<tr>
				<td class="fpfbip_table_data"><strong>Facebook Album Photos Url:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" placeholder="https://www.facebook.com/pg/Google/photos/?tab=album&album_id=10150696970852838" name="fpfbip_album_pics_url" value="<?php echo $fpfbip_album_pics_url; ?>">


				</td>
			</tr>


			<tr>
				<td class="fpfbip_table_data"><strong>No of Posts:</strong></td>
				<td class="fpfbip_table_data"><input type="number" min="1" value="<?php if($fpfbip_no_of_post == ''){ echo '1' ;}else{ echo $fpfbip_no_of_post; } ?>" style="width: 90%;" name="fpfbip_no_of_post"></td>
			</tr>


			<tr>
				<td class="fpfbip_table_data"><strong>Display Style:</strong></td>
				<td class="fpfbip_table_data">


				<label for="fpfbip_list_view" style="display: inline-block;text-align: center;vertical-align: top;margin-top: 18px;">
					
					<input type="radio" id="fpfbip_list_view" name="fpfbip_display_style" value="list" <?php checked( "list", $fpfbip_display_style); ?> checked="checked"> 

					<strong>List</strong>
					
					<br />

					<img src="<?php echo plugins_url('images/list.png',__FILE__); ?>" width="150px" >

				</label>
				
				<label for="fpfbip_double_list_view" style="display: inline-block;text-align: center;vertical-align: top;">

					<strong><a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong>

					<br />
					
					<input type="radio" id="fpfbip_double_list_view" name="fpfbip_display_style" disabled="disabled" value="double-list">

					<strong>Double List</strong>

					<br />


					
					<img src="<?php echo plugins_url('images/double_list.png',__FILE__); ?>" width="150px" >

				</label>
				
				<label for="fpfbip_grid_view" style="display: inline-block;text-align: center;vertical-align: top;">
					
					<strong><a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong>

					<br />


					<input type="radio" id="fpfbip_grid_view" name="fpfbip_display_style" disabled="disabled" value="grid" >

					<strong>Grid</strong>

					<br />
					
					<img src="<?php echo plugins_url('images/grid.png',__FILE__); ?>" width="150px" >

				</label>


				</td>
			</tr>


			<tr>

				<td class="fpfbip_table_data"><strong>Item Display Mode:</strong></td>

				<td class="fpfbip_table_data">

					<label for="fpfbip_item_display_modes">
						<input type="radio" id="fpfbip_item_display_modes" checked="checked" name="fpfbip_item_display_mode" value="link" <?php checked( "link", $fpfbip_item_display_mode); ?> >
						<strong>Link</strong>
					</label>


				<label for="fpfbip_item_display_mode">
						<input type="radio" id="fpfbip_item_display_mode" disabled="disabled" name="fpfbip_item_display_mode" value="popup">
						<strong>Popup  <a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong>
					</label>


				</td>
				
			</tr>


			<tr>
				<td class="fpfbip_table_data"><strong>Default Tab to Display:</strong></td>
				
				<td class="fpfbip_table_data">
					

					<label for="fpfbip_posts_tab">

						<input type="radio" id="fpfbip_posts_tab" name="fpfbip_default_tab" value="Posts" <?php checked( "Posts", $fpfbip_default_tab); ?> checked="checked"> <strong>Posts</strong>
					
					</label>

					<label id="fpfbip_photos_tab">

						<input type="radio" id="fpfbip_photos_tab" disabled="disabled" name="fpfbip_default_tab" value="Photos"> <strong>Photos</strong>
					
					</label>

					<label for="fpfbip_videos_tab">

						<input type="radio" id="fpfbip_videos_tab" name="fpfbip_default_tab" value="Videos" disabled="disabled" > <strong>Videos</strong>
					
					</label>

					<label for="fpfbip_albums_tab">

						<input type="radio" id="fpfbip_albums_tab" name="fpfbip_default_tab" value="Album Pics" disabled="disabled" > <strong>Album Pics  <a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong>
					
					</label>


				</td>
			</tr>


			<tr>
				<td class="fpfbip_table_data"><strong>Date Format:</strong></td>
				
				<td class="fpfbip_table_data">
					
					<label for="fpfbip_relaive_format">

						<input type="radio" id="fpfbip_relaive_format" name="fpfbip_date_format" checked="checked" value="relative" <?php checked( "relative", $fpfbip_date_format); ?> > <strong>Relative</strong>

					</label>

					<label for="fpfbip_specific_format">

						<input type="radio" id="fpfbip_specific_format" name="fpfbip_date_format" value="specific" disabled="disabled"> <strong>Specific  <a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong>

					</label>

				</td>
			</tr>


			<tr>
				<td class="fpfbip_table_data"><strong>Container Background Color:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" class="color_picker" name="fpfbip_container_background_color" value="<?php if($fpfbip_container_background_color == ''){ echo '#eceff1' ;}else{ echo $fpfbip_container_background_color; } ?>"></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Post Background Color:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" class="color_picker" name="fpfbip_post_background_color" value="<?php echo $fpfbip_post_background_color; ?>"></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Header Background Color:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" class="color_picker" name="fpfbip_header_background_color" value="<?php echo $fpfbip_header_background_color; ?>"></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Title Font Size:</strong></td>
				<td class="fpfbip_table_data"><input type="text" value="<?php if($fpfbip_title_font_size == ''){ echo '1' ;}else{ echo $fpfbip_title_font_size; } ?>" style="width: 90%;" name="fpfbip_title_font_size">

					<strong> em.</strong>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Title Font Weight:</strong></td>
				
				<td class="fpfbip_table_data">
					
					<label for="fpfbip_font_weight_normal">

						<input type="radio" id="fpfbip_font_weight_normal" name="fpfbip_title_font_weight" checked="checked" value="normal" <?php checked( "normal", $fpfbip_title_font_weight); ?> > <strong>Normal</strong>
						
					</label>

					<label for="fpfbip_font_weight_bold">

						<input type="radio" id="fpfbip_font_weight_bold" name="fpfbip_title_font_weight" value="bold" disabled="disabled"> <strong>Bold  <a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong>
						
					</label>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Likes/Date Font Size:</strong></td>
				<td class="fpfbip_table_data"><input type="text" value="<?php if($fpfbip_likes_font_fize == ''){ echo '1' ;}else{ echo $fpfbip_likes_font_fize; } ?>" style="width: 90%;" name="fpfbip_likes_font_fize">

					<strong> em.</strong>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Base Font Size:</strong></td>
				<td class="fpfbip_table_data"><input type="text" placeholder="example: 16px" value="<?php if($fpfbip_base_font_size == ''){ echo '10' ;}else{ echo $fpfbip_base_font_size; } ?>" style="width: 90%;" name="fpfbip_base_font_size">

					<strong> px.</strong>

				</td>

			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>CTA Text:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" name="fpfbip_cta_text" value="<?php echo $fpfbip_cta_text; ?>"></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>CTA link:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" placeholder="http://www.example.com" name="fpfbip_cta_link" value="<?php echo $fpfbip_cta_link; ?>"></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Header Text Color:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" class="color_picker" name="fpfbip_header_text_color" disabled="disabled"><strong><a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;vertical-align: top;">Buy Premium</a></strong></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Title Color:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" class="color_picker" name="fpfbip_title_color" disabled="disabled"><strong><a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;vertical-align: top;">Buy Premium</a></strong></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Likes Color:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" class="color_picker" name="fpfbip_likes_color" disabled="disabled"><strong><a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;vertical-align: top;">Buy Premium</a></strong></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Controls Text Color:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" class="color_picker" name="fpfbip_controls_text_color" disabled="disabled"><strong><a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;vertical-align: top;">Buy Premium</a></strong></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>Title Font Family:</strong></td>
				<td class="fpfbip_table_data"><input type="text" id="fpfbip_title_font_family" style="width: 90%;"  disabled="disabled"><strong>  <a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;vertical-align: super;">Buy Premium</a></strong></td>
			</tr>

			<tr>
				<td class="fpfbip_table_data"><strong>General Font Family:</strong></td>
				<td class="fpfbip_table_data"><input type="text" id="fpfbip_general_font_family" style="width: 90%;" disabled="disabled"><strong>  <a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;vertical-align: super;">Buy Premium</a></strong></td>
			</tr>

			

			

			

			

			<tr>
				<td class="fpfbip_table_data"><strong>Load More Text:</strong></td>
				<td class="fpfbip_table_data"><input type="text" style="width: 90%;" readonly="readonly" name="fpfbip_load_more_text" value="<?php echo "Load More..." ?>"> <br/>
				<strong>  <a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong>
				</td>
			</tr>

			

			


		</table>


	</div>

</div>

  </section>

  <section id="content2">


  <style>
	
	#fpfbip_second_container{
		width: 100%;
		background-color: #fff;
	}

	#fpfbip_show_hide_stuff {
		padding: 10px;
		font-size: 16px;
	}

	.fpfbip_table_data2{
		padding-top: 10px;
		padding-bottom: 10px;
	}

</style>



    
    <div id="fpfbip_second_container">
	

	<div id="fpfbip_show_hide_stuff">
		
		<div style="width:80%;text-align: center;margin: 0 auto;"><strong><a href="https://www.arrowplugins.com/facebook-fanpage" target="blank" style="text-decoration: none;">Buy Premium</a></strong></div>

		<table style="width: 100%;border: 2px solid #eee;margin-top: 5px;padding-left: 10px;width:80%;margin: 0 auto;margin-top: 10px;">
			
			<tr>
				<td class="fpfbip_table_data2" style="width: 60%;"><strong>Show/Hide Cover Image:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_cover_image">

					<input type="radio" id="fpfbip_show_hide_cover_image" name="fpfbip_show_hide_cover_image" value="true" disabled="disabled"> <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_cover_imagee">

					<input type="radio" id="fpfbip_show_hide_cover_imagee" style="margin-left: 10px;" name="fpfbip_show_hide_cover_image" value="false" disabled="disabled">  <strong>Hide</strong>
						
					</label>

				</td>
			</tr>


			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide Header:</strong></td>
				<td class="fpfbip_table_data2">

					<label for="fpfbip_show_hide_header">

					<input type="radio" id="fpfbip_show_hide_header"  name="fpfbip_show_hide_header" value="false" disabled="disabled">  <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_headerr">

					<input type="radio" id="fpfbip_show_hide_headerr" style="margin-left: 10px;" name="fpfbip_show_hide_header" value="true" disabled="disabled"> <strong>Hide</strong>
						
					</label>
					
				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide Tabs:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_tabs">

					<input type="radio" id="fpfbip_show_hide_tabs"  name="fpfbip_show_hide_tabs" value="false" disabled="disabled">  <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_tabss">

					<input type="radio" id="fpfbip_show_hide_tabss" style="margin-left: 10px;" name="fpfbip_show_hide_tabs" value="true" disabled="disabled">  <strong>Hide</strong>
						
					</label>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide Sorting:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_sorting">

					<input type="radio" id="fpfbip_show_hide_sorting"  name="fpfbip_show_hide_sorting" value="false" disabled="disabled">  <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_sortings">

					<input type="radio" id="fpfbip_show_hide_sortings" style="margin-left: 10px;" name="fpfbip_show_hide_sorting" value="true" disabled="disabled" > <strong>Hide</strong>
						
					</label>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide Loading Mechanism:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_loading_mechanism">

					<input type="radio" id="fpfbip_show_hide_loading_mechanism"  name="fpfbip_show_hide_loading_mechanism" value="false" disabled="disabled" > <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_loading_mechanisms">

					<input type="radio" id="fpfbip_show_hide_loading_mechanisms" style="margin-left: 10px;" name="fpfbip_show_hide_loading_mechanism" value="true" disabled="disabled"> <strong>Hide</strong>
						
					</label>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide CTA Button:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_cta_button">

					<input type="radio" id="fpfbip_show_hide_cta_button"  name="fpfbip_show_hide_cta_button" value="false" disabled="disabled"> <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_cta_buttonn">

					<input type="radio" id="fpfbip_show_hide_cta_buttonn" style="margin-left: 10px;" name="fpfbip_show_hide_cta_button" value="true" disabled="disabled"> <strong>Hide</strong>
						
					</label>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide Popup Details:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_popup_details">

					<input type="radio" id="fpfbip_show_hide_popup_details"  name="fpfbip_show_hide_popup_details" value="false" disabled="disabled"> <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_popup_detail">

					<input type="radio" id="fpfbip_show_hide_popup_detail" style="margin-left: 10px;" name="fpfbip_show_hide_popup_details" value="true" disabled="disabled"> <strong>Hide</strong>
						
					</label>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide Thumbnail Likes Comments Date:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_thumbnail_likes_comments">

					<input type="radio" id="fpfbip_show_hide_thumbnail_likes_comments"  name="fpfbip_show_hide_thumbnail_likes_comments" value="false" disabled="disabled"> <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_thumbnail_likes_comment">

					<input type="radio" id="fpfbip_show_hide_thumbnail_likes_comment" style="margin-left: 10px;" name="fpfbip_show_hide_thumbnail_likes_comments" value="true" disabled="disabled"> <strong>Hide</strong>
						
					</label>

				</td>
			</tr>

			<tr>
				<td class="fpfbip_table_data2"><strong>Show/Hide Page About Info:</strong></td>
				<td class="fpfbip_table_data2">
					
					<label for="fpfbip_show_hide_page_about_info">

					<input type="radio" id="fpfbip_show_hide_page_about_info" name="fpfbip_show_hide_page_about_info" value="false" disabled="disabled"> <strong>Show</strong>
						
					</label>

					<label for="fpfbip_show_hide_page_about_infos">

					<input type="radio" id="fpfbip_show_hide_page_about_infos" style="margin-left: 10px;" name="fpfbip_show_hide_page_about_info" value="true" disabled="disabled"> <strong>Hide</strong>
						
					</label>

				</td>
			</tr>



		</table>


	</div>

</div>

   
  </section>

</main>




