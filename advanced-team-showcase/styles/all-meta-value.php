<?php
		
	#All Meta Value
    $atmswc_designation             = get_post_meta($post->ID, 'atmswc_designation', true);
    $atmswc_email                   = get_post_meta($post->ID, 'atmswc_email', true); 
    $atmswc_web                     = get_post_meta($post->ID, 'atmswc_web', true);
    $atmswc_biography               = get_post_meta($post->ID, 'atmswc_biography', true);
    $atmswc_telephone               = get_post_meta($post->ID, 'atmswc_telephone', true);

    // Show/Hide
    $designation_sh                 = get_post_meta($post->ID, 'designation_sh', true);
    $telephone_sh                   = get_post_meta($post->ID, 'telephone_sh', true);   
    $email_sh                       = get_post_meta($post->ID, 'email_sh', true);
    $web_sh                         = get_post_meta($post->ID, 'web_sh', true); 
    $biography_sh                   = get_post_meta($post->ID, 'biography_sh', true);

    // Social 
    $atmswc_fb                      = get_post_meta($post->ID, 'atmswc_fb', true);
    $atmswc_twitter                 = get_post_meta($post->ID, 'atmswc_twitter', true);    
    $atmswc_gplus                   = get_post_meta($post->ID, 'atmswc_gplus', true);
    $atmswc_linkedin                = get_post_meta($post->ID, 'atmswc_linkedin', true);   
    $atmswc_github                  = get_post_meta($post->ID, 'atmswc_github', true); 
    $atmswc_behance                 = get_post_meta($post->ID, 'atmswc_behance', true);    
    $atmswc_dribble                 = get_post_meta($post->ID, 'atmswc_dribble', true); 
    $atmswc_youtube                 = get_post_meta($post->ID, 'atmswc_youtube', true);


    // All Options Value
    $first_param                    = get_post_meta($postid, 'first_param', true);
    $second_param                   = get_post_meta($postid, 'second_param', true);
    $third_param                    = get_post_meta($postid, 'third_param', true);
    $fourth_param                   = get_post_meta($postid, 'fourth_param', true);
    $hide_box_shadow                = get_post_meta($postid, 'hide_box_shadow', true);
    $img_size                       = get_post_meta($postid, 'img_size', true);
    $img_height                     = get_post_meta($postid, 'img_height', true);
    $bg_color                       = get_post_meta($postid, 'bg_color', true);
    $txt_align                      = get_post_meta($postid, 'txt_align', true);
    $title_color                    = get_post_meta($postid, 'title_color', true);      
    $title_fontsize                 = get_post_meta($postid, 'title_fontsize', true); 
    $content_color                  = get_post_meta($postid, 'content_color', true);      
    $content_fontsize               = get_post_meta($postid, 'content_fontsize', true);        
    $opacity 						= get_post_meta($postid, 'opacity', true);		
    $opacity_color 					= get_post_meta($postid, 'opacity_color', true);	
    $bio_text_color 				= get_post_meta($postid, 'bio_text_color', true);
    $bio_fontsize 					= get_post_meta($postid, 'bio_fontsize', true);
    $designation_color 				= get_post_meta($postid, 'designation_color', true);	
    $designation_fontsize 			= get_post_meta($postid, 'designation_fontsize', true); 
    $telephone_color 			    = get_post_meta($postid, 'telephone_color', true);	
    $telephone_fontsize 			= get_post_meta($postid, 'telephone_fontsize', true); 
    $email_color 					= get_post_meta($postid, 'email_color', true);	
    $email_fontsize 				= get_post_meta($postid, 'email_fontsize', true); 
    $web_color 						= get_post_meta($postid, 'web_color', true);
    $web_fontsize    				= get_post_meta($postid, 'web_fontsize', true);
    $bio_social_icon 				= get_post_meta($postid, 'bio_social_icon', true);	
    $bio_social_textcolor 			= get_post_meta($postid, 'bio_social_textcolor', true);
    $bio_social_hcolor 				= get_post_meta($postid, 'bio_social_hcolor', true);	
    $bio_social_backcolor 			= get_post_meta($postid, 'bio_social_backcolor', true); 
    $bio_social_backhcolor 			= get_post_meta($postid, 'bio_social_backhcolor', true);
    $sort_array                     = get_post_meta($postid, 'sort_array', true);
    $sort_social                    = get_post_meta($postid, 'sort_social', true);