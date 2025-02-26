<?php

if ( ! defined('ABSPATH')) exit; // exit if direct access.


function author_box_get_user_social_links($author_id)
	{
		
		
		$author_box_social_links_margin = get_option( 'author_box_social_links_margin' );
		$author_box_social_links = get_option( 'author_box_social_links' );
		$social_links  = '';
		
		foreach ($author_box_social_links as $value) {
			if(!empty($value))
				{
					if($value == 'mail')
						{
							$author_meta = get_the_author_meta( $value, $author_id );
							if(!empty($author_meta))
								{
									$social_links .= '<a style="margin:'.$author_box_social_links_margin.';" title="'.$author_meta.'" class="'.$value.'" href="mailto:'.$author_meta.'"></a>';
								}
							
						}
						
					else if($value == 'skype')
						{
							$author_meta = get_the_author_meta( $value, $author_id );
							if(!empty($author_meta))
								{
									$social_links  .= '<a style="margin:'.$author_box_social_links_margin.';" title="'.$author_meta.'" class="'.$value.'" href="#"></a>';
								}
							
						}						
						
					else
						{	
							$author_meta = get_the_author_meta( $value, $author_id );
							if(!empty($author_meta))
							{
								$social_links  .= '<a style="margin:'.$author_box_social_links_margin.';" target="_blank" title="'.$author_meta.'" class="'.$value.'" href="'.$author_meta.'"></a>';
							}
							
						}
					
					
					
					
				}
			
			

		}
		
		
		
		return $social_links;
		
		
	
	}


















add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );

function add_extra_social_links( $user )
{
    ?>
        <h3>Author Box Profile Links</h3>

        <table class="form-table">
        
                    <tr>                    
                	<th><label for="title">Title</label></th>
                	<td><input type="text" name="title" value="<?php echo esc_attr(get_the_author_meta( 'title', $user->ID )); ?>" class="regular-text" placeholder="ex: CEO" />
                    </td>
                    </tr>
        
		<?php
		
		$author_box_user_profile_social = get_option( 'author_box_user_profile_social' );
		
		
		
            foreach ($author_box_user_profile_social as $value) {
                if(!empty($value))
                    {
                        ?>
                    <tr>                    
                	<th><label for="<?php echo $value; ?>"><?php echo ucfirst($value); ?></label></th>
                	<td><input type="text" name="<?php echo $value; ?>" value="<?php echo esc_attr(get_the_author_meta( $value, $user->ID )); ?>" class="regular-text" />
                    </td>
                    </tr>
                        <?php
                    
                    }
        
              
              
            }
        
        ?>
        


        </table>
    <?php
}





add_action( 'personal_options_update', 'save_extra_social_links' );
add_action( 'edit_user_profile_update', 'save_extra_social_links' );

function save_extra_social_links( $user_id )
{
	update_user_meta( $user_id, 'title', sanitize_text_field( $_POST['title'] ) );
	
	$author_box_user_profile_social = get_option( 'author_box_user_profile_social' );
		
	foreach ($author_box_user_profile_social as $value) {
		if(!empty($value))
			{
				update_user_meta( $user_id,$value, sanitize_text_field( $_POST[$value] ) );
			
			}
		}
	

}








function author_box_dark_color($input_color)
	{
		if(empty($input_color))
			{
				return "";
			}
		else
			{
				$input = $input_color;
			  
				$col = Array(
					hexdec(substr($input,1,2)),
					hexdec(substr($input,3,2)),
					hexdec(substr($input,5,2))
				);
				$darker = Array(
					$col[0]/2,
					$col[1]/2,
					$col[2]/2
				);
		
				return "#".sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
			}

		
		
	}
	
	
	


