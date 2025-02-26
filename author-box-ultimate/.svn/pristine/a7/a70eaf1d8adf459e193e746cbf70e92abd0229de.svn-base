<?php

function author_box_themes_flat($postid)
	{
		$author_box_social_links = get_option( 'author_box_social_links' );
		$author_box_bg_img = get_option( 'author_box_bg_img' );			
		$author_box_bg_color = get_option( 'author_box_bg_color' );			
		$author_box_about_the_author_text = get_option( 'author_box_about_the_author_text' );	

		$author_id = get_post_field( 'post_author', $postid );
		
		$author_bio = get_the_author_meta( 'description', $author_id );
		$author_name = get_the_author_meta( 'display_name', $author_id );
		$author_title = get_the_author_meta( 'title', $author_id );

		$author_box_display = "";
		$author_box_display .= '<style type="text/css">

		</style>';
		
		$author_box_display .= '<div class="author-box-flat" style="background:url('.$author_box_bg_img.') repeat scroll 0 0 '.$author_box_bg_color.';">';
		$author_box_display .= '<div class="about-the-author">'.$author_box_about_the_author_text.'</div>';	
		$author_box_display .= '<div class="author-thumb">'.get_avatar( $author_id, 100 ).'</div>';
		$author_box_display .= '<div class="author-info-box">
			<span class="author-name">'.$author_name.'</span>
			<i class="author-title">'.$author_title.'</i>
			<span class="author-bio">'.$author_bio.'</span>
		
		
		</div>';
		
		$author_box_display .= '<div class="author-social-links">'.author_box_get_user_social_links($author_id).'</div>';		
		$author_box_display .= '</div>';		
		
		
		
		
		
		
		
		
		
		
		return $author_box_display;
		
	}
	
	
	
	
	
