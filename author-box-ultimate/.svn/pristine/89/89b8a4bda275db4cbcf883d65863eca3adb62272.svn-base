<?php	
/**
 * Social Share Button main setting page.
 *
 * @author 		ParaTheme
 * @version     1.0
 */
	if ( ! defined('ABSPATH')) exit; // exit if direct access.

	if(empty($_POST['author_box_hidden']))
		{
			$author_box_enable = get_option( 'author_box_enable' );	
			$author_box_themes = get_option( 'author_box_themes' );
			$author_box_bg_img = get_option( 'author_box_bg_img' );
			$author_box_bg_color = get_option( 'author_box_bg_color' );			
			$author_box_posttype = get_option( 'author_box_posttype' );			
			$author_box_social_links = get_option( 'author_box_social_links' );
			$author_box_user_profile_social = get_option( 'author_box_user_profile_social' );
			$author_box_about_the_author_text = get_option( 'author_box_about_the_author_text' );					
			$author_box_social_links_margin = get_option( 'author_box_social_links_margin' );		
			
			
		}
	else
		{
	
		if($_POST['author_box_hidden'] == 'Y') {
			//Form data sent

			
			$author_box_enable = $_POST['author_box_enable'];
			update_option('author_box_enable', $author_box_enable);			

			$author_box_themes = $_POST['author_box_themes'];
			update_option('author_box_themes', $author_box_themes);
			
			$author_box_bg_img = $_POST['author_box_bg_img'];
			update_option('author_box_bg_img', $author_box_bg_img);			

			$author_box_bg_color = $_POST['author_box_bg_color'];
			update_option('author_box_bg_color', $author_box_bg_color);
			
			$author_box_social_links_margin = $_POST['author_box_social_links_margin'];
			update_option('author_box_social_links_margin', $author_box_social_links_margin);
			

			if(!empty($_POST['author_box_posttype']))
				{
					$author_box_posttype = $_POST['author_box_posttype'];
				}
			else
				{
					$author_box_posttype = "";
				}
				
			update_option('author_box_posttype', $author_box_posttype);			
			

			
			$author_box_social_links = stripslashes_deep($_POST['author_box_social_links']);
			update_option('author_box_social_links', $author_box_social_links);
			
			$author_box_user_profile_social = stripslashes_deep($_POST['author_box_user_profile_social']);
			update_option('author_box_user_profile_social', $author_box_user_profile_social);			
					
			$author_box_about_the_author_text = $_POST['author_box_about_the_author_text'];
			update_option('author_box_about_the_author_text', $author_box_about_the_author_text);			
					

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>

			<?php
		} 
	}
	
	
	


	
	
	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".author_box_plugin_name." Settings</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="author_box_hidden" value="Y">
        <?php settings_fields( 'author_box_plugin_options' );
				do_settings_sections( 'author_box_plugin_options' );
			
		?>
       
	<br />
	<div class="author-box-settings">
        <ul class="tab-nav">
            <li nav="1" class="nav1 active">Author Box Options</li>
            <li nav="2" class="nav2">Style</li>
            <li nav="3" class="nav3">Content</li>
        
        </ul>

        <ul class="box">
            <li style="display: block;" class="box1 tab-box active">
                <div class="option-box">
                    <p class="option-title">Author Box Enable ?</p>
                    <p class="option-info">To display author box on post you need to enable first. you can disable any time if you don't want display author box under post.</p>
                    
                    <select name="author_box_enable">
                        <option value="yes" <?php  if($author_box_enable=='yes') echo "selected"; ?>>Yes</option>
                        <option value="no" <?php  if($author_box_enable=='no') echo "selected"; ?>>No</option>
                       
                    </select>
                </div>
				



				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Please report any issue via support forum <a href="<?php echo author_box_qa_url;?>"><?php echo author_box_qa_url;?></a>.</p>
                </div>



				<div class="option-box">
                    <p class="option-title">Display only these social Links.</p>
                    <p class="option-info">Slecet which social link will display on author box.</p>
                    
                    
                    <?php 

			if(empty($author_box_user_profile_social))
				{
					$author_box_user_profile_social = array("facebook"=>"facebook","twitter"=>"twitter","googleplus"=>"googleplus","pinterest"=>"pinterest","mail"=>"mail","website"=>"website","skype"=>"skype");
					
				}

			if(empty($author_box_social_links))
				{
					$author_box_social_links = array("facebook"=>"facebook","twitter"=>"twitter","googleplus"=>"googleplus","pinterest"=>"pinterest","mail"=>"mail","website"=>"website","skype"=>"skype");
					
				}


					foreach ($author_box_user_profile_social as $value) {
						if(!empty($value))
							{

									
									
								
								?>

<label><input type="checkbox" name="author_box_social_links[<?php echo $value; ?>]" value="<?php echo $value; ?>" <?php if($author_box_social_links[$value] == $value) echo "checked"; ?> /><?php echo $value; ?></label><br />

					<?php
									
							}
					}
					
					?>
                    
                    
                    
                    
                    


                </div>







				<div class="option-box">
                    <p class="option-title">Display input field on user profile.</p>
                    <p class="option-info">By adding bellow input you can control extra input field on user profile. if you want to remove one profile field then please empty this field and save changes or to add new profile field simply click add new. some default profile fields are facebook, twitter, googleplus, pinterest, mail, website, skype.</p>
                    <table class="user-profile-social">
                    
                    
                    <?php 








					foreach ($author_box_user_profile_social as $value) {
						if(!empty($value))
							{
								?>
							<tr><td>
							<input type="text" name="author_box_user_profile_social[<?php echo $value; ?>]" value="<?php if(isset($author_box_user_profile_social[$value])) echo $author_box_user_profile_social[$value]; else echo $value; ?>"  /><br />
							</td>
							</tr>
								<?php
							
							}
					}
					
					?>
 
                    
                    </table> 
                    

                    <div class="button new_user_profile_social">Add New</div>

                </div>





				<div class="option-box">
                    <p class="option-title">about the author text.</p>
                    <p class="option-info"></p>
					<input name="author_box_about_the_author_text" placeholder="About The Author" size="30" type="text" value="<?php  if(!empty($author_box_about_the_author_text)) echo $author_box_about_the_author_text; else echo "About The Author"; ?>" />
                </div>








            </li>
            <li class="box2 tab-box">
				<div class="option-box">
                    <p class="option-title">Author Box Themes ?</p>
                    <p class="option-info">Choose different themes for author box which is suit your website template.</p>
                    
                    <select name="author_box_themes">
                        <option value="flat" <?php  if($author_box_themes=='flat') echo "selected"; ?>>Flat</option>
                       
                    </select>
                </div>
                
                
                
				<div class="option-box">
                    <p class="option-title">Background Image.</p>
                    <p class="option-info">Background image for author box area. if you don't want to display any background image simply empty text field bellow images. click on images to select you can input your own background image by providing image url to text field.</p>



            <script>
            jQuery(document).ready(function(jQuery)
                {
                        jQuery(".author-box-bg-img-list li").click(function()
                            { 	
                                jQuery('.author-box-bg-img-list li.bg-selected').removeClass('bg-selected');
                                jQuery(this).addClass('bg-selected');
                                
                                var author_box_bg_img = jQuery(this).attr('data-url');
            
                                jQuery('#author_box_bg_img').val(author_box_bg_img);
                                
                            })	
            
                                
                })
            
            </script> 





			 <?php
            
            
            
                $dir_path = author_box_plugin_dir."css/bg/";
                $filenames=glob($dir_path."*.png*");

                if(empty($author_box_bg_img))
                    {
                    $author_box_bg_img = "";
                    }
            
            
                $count=count($filenames);
                
            
                $i=0;
                echo "<ul class='author-box-bg-img-list' >";
            
                while($i<$count)
                    {
                        $filelink= str_replace($dir_path,"",$filenames[$i]);
                        
                        $filelink= author_box_plugin_url."css/bg/".$filelink;
                        
                        
                        if($author_box_bg_img==$filelink)
                            {
                                echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                            }
                        else
                            {
                                echo '<li   data-url="'.$filelink.'">';
                            }
                        
                        
                        echo "<img  width='70px' height='50px' src='".$filelink."' />";
                        echo "</li>";
                        $i++;
                    }
                    
                echo "</ul>";
                
                echo "<input style='width:100%;' value='".$author_box_bg_img."'    placeholder='Please select image or left blank' id='author_box_bg_img' name='author_box_bg_img'  type='text' />";
            	
				echo '<p class="option-title">Background Color.</p>';
				echo '<p class="option-info">Background color for author box area.</p>';
				
                echo "<input  value='".$author_box_bg_color."'    placeholder='#18c967' id='author_box_bg_color' name='author_box_bg_color'  type='text' />";            
            
            ?>






                </div>                
                
                
                
                
                
				<div class="option-box">
                    <p class="option-title">Margin for social links.</p>
                    <p class="option-info">Margin for social links on author box, you can use any format 10px 10px, or 10px.</p>
					<input name="author_box_social_links_margin" placeholder="0px 5px" size="10" type="text" value="<?php  if(!empty($author_box_social_links_margin)) echo $author_box_social_links_margin; else echo "0px 5px"; ?>" />
                </div>

                
                
            </li>

            <li class="box3 tab-box">
				<div class="option-box">
                    <p class="option-title">Display share button On These Post Type Only.</p>
                    <p class="option-info">By choosing post type you can filter display author box only these post type.</p>
                    
                    <?php

					$post_types = get_post_types( '', 'names' ); 
					
					foreach ( $post_types as $post_type ) {
					
					   echo '<label for="author_box_posttype['.$post_type.']"><input type="checkbox" name="author_box_posttype['.$post_type.']" id="author_box_posttype['.$post_type.']"  value ="1" '; 
					   if ( isset( $author_box_posttype[$post_type] ) ) echo "checked"; 
					   echo' >'. $post_type.'</label><br />' ;
					}
					
					?>
                </div>
            </li>

</ul>







<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>
	</div>

</div>
