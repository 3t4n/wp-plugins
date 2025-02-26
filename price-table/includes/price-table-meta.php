<?php


function price_table_posttype_register() {
 
        $labels = array(
                'name' => _x('Price Table', 'price_table'),
                'singular_name' => _x('Price Table', 'price_table'),
                'add_new' => _x('New Price Table', 'price_table'),
                'add_new_item' => __('New Price Table'),
                'edit_item' => __('Edit Price Table'),
                'new_item' => __('New Price Table'),
                'view_item' => __('View Price Tables'),
                'search_items' => __('Search Price Tables'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'price_table' , $args );

}

add_action('init', 'price_table_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_price_table()
	{
		$screens = array( 'price_table' );
		foreach ( $screens as $screen )
			{
				add_meta_box('price_table_metabox',__( 'Price Table Options','price_table' ),'meta_boxes_price_table_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_price_table' );


function meta_boxes_price_table_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_price_table_input', 'meta_boxes_price_table_input_nonce' );
	
	
	$price_table_data = get_post_meta( $post->ID, 'price_table_data', true );
	$price_table_data_price = get_post_meta( $post->ID, 'price_table_data_price', true );
	$price_table_data_header = get_post_meta( $post->ID, 'price_table_data_header', true );	
	$price_table_data_signup_url = get_post_meta( $post->ID, 'price_table_data_signup_url', true );		
	$price_table_data_signup_text = get_post_meta( $post->ID, 'price_table_data_signup_text', true );
	
	$price_table_themes = get_post_meta( $post->ID, 'price_table_themes', true );
	$price_table_themes_pack = get_post_meta( $post->ID, 'price_table_themes_pack', true );
	$price_table_themes_text_pack = get_post_meta( $post->ID, 'price_table_themes_text_pack', true );	
	$price_table_themes_pack_custom_header = get_post_meta( $post->ID, 'price_table_themes_pack_custom_header', true );
	$price_table_themes_pack_custom_price = get_post_meta( $post->ID, 'price_table_themes_pack_custom_price', true );	
	$price_table_themes_pack_custom_signup = get_post_meta( $post->ID, 'price_table_themes_pack_custom_signup', true );
	
	$price_table_themes_text_pack_custom_header = get_post_meta( $post->ID, 'price_table_themes_text_pack_custom_header', true );	
	$price_table_themes_text_pack_custom_price = get_post_meta( $post->ID, 'price_table_themes_text_pack_custom_price', true );	
	$price_table_themes_text_pack_custom_signup = get_post_meta( $post->ID, 'price_table_themes_text_pack_custom_signup', true );		
	
	
	$price_table_themes_text_size_pack_header = get_post_meta( $post->ID, 'price_table_themes_text_size_pack_header', true );	
	$price_table_themes_text_size_pack_price = get_post_meta( $post->ID, 'price_table_themes_text_size_pack_price', true );	
	$price_table_themes_text_size_pack_signup = get_post_meta( $post->ID, 'price_table_themes_text_size_pack_signup', true );		
	
	
	
	
	
	$price_table_ribbons = get_post_meta( $post->ID, 'price_table_ribbons', true );
	
	$price_table_col_duration= get_post_meta( $post->ID, 'price_table_col_duration', true );		
	$price_table_col_width= get_post_meta( $post->ID, 'price_table_col_width', true );		
	$price_table_col_img = get_post_meta( $post->ID, 'price_table_col_img', true );		
	$price_table_col_img_height = get_post_meta( $post->ID, 'price_table_col_img_height', true );			
	
	$price_table_bg_img = get_post_meta( $post->ID, 'price_table_bg_img', true );
	$price_table_font_family = get_post_meta( $post->ID, 'price_table_font_family', true );
	$price_table_font_family_custom = get_post_meta( $post->ID, 'price_table_font_family_custom', true );	
	
	
	if(empty($price_table_data))
		{
			$price_table_data = array ( array(1,2),  array(1,2) );
		}

	if(empty($price_table_data_price))
		{
			$price_table_data_price = array('$5','$10');
		}
		
	if(empty($price_table_data_header))
		{
			$price_table_data_header = array('Basic Plan','Pro Plan');
		}		
		
		
		
	if(empty($price_table_data_signup_url))
		{
			$price_table_data_signup_url = array('http://hello.com/signup1','http://hello.com/signup2');
		}
				
	if(empty($price_table_data_signup_text))
		{
			$price_table_data_signup_text = array('Sign Up 1','Sign Up 2');
		}		
		
		
	if(empty($price_table_themes_pack))
		{
			$price_table_themes_pack = array('','','');
		}
	if(empty($price_table_themes_text_pack))
		{
			$price_table_themes_text_pack = array('','','');
		}		
			
		
	if(empty($price_table_ribbons))
		{
			$price_table_ribbons = array('','','');
		}
		
		
	if(empty($price_table_col_duration))
		{
			$price_table_col_duration = array('','','');
		}			
	if(empty($price_table_col_img))
		{
			$price_table_col_img = array('','','');
		}	
			
	if(empty($price_table_col_width))
		{
			$price_table_col_width = array('','','');
		}			

?>




    <div class="para-settings">


        
        
        <ul class="tab-nav"> 
        
            <li nav="1" class="nav1 active">Shortcode</li>          
            <li nav="2" class="nav2">Table Data</li>        
            <li nav="3" class="nav3">More</li>
            <li nav="4" class="nav4">Even More</li>            
            <li nav="5" class="nav5">Themes</li>
            
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            
            <li style="display: block;" class="box1 tab-box active">
            
                <div class="option-box">
                    <p class="option-title">Shortcode</p>
                    <p class="option-info">Copy this shortcode and paste on page or post where you want to display price table, Use PHP code to your themes file to display price table.</p>
                <br /> 
                <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[price_table <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                <br />
                PHP Code:<br />
                <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[price_table id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
                
                </div> 
            
 			</li>           
            
            
            
            <li style="display: none;" class="box2 tab-box">            
            
				<div class="option-box">
                    <p class="option-title">Table Data</p>
                    <p class="option-info"></p>
                    
                    <div class="table-tools">
                    <span class="table-add-column">Add Column</span>
                    <span class="table-add-row">Add Row</span>
                    </div>
                    <?php //print_r($price_table_data); ?>
                    <div class="price-table-admin-container">
                    <table id="price-table-admin" class="draggable" cellspacing="0" cellpadding="2">
                    
                    <?php
					
					
					
					
						//Price row
						$nosort = '';	 //nosort
						$nodrag_nodrop = 'nodrag nodrop'; //nodrag nodrop
						$handle_move = '<span title="Move this column." class="column-drag-handle"></span>';
						$remove_column = '<span title="Remove this column" class="remove-column"></span>';
						$remove_row = '';	 //nosort
						
						echo '<tr class="'.$nodrag_nodrop.'" >';
                        $i=0;
                        foreach($price_table_data_price as $key => $value)
                            {

								?>
								<td class="<?php echo $nosort; ?>" ><?php echo $remove_column; ?>  <?php echo $remove_row; ?> <?php echo $handle_move; ?>
                                </td>
                                <?php

							$i++;
							}
							echo '</tr>';	
					
					
					
					
					
					
					
						//Price row
						$nosort = '';	 //nosort
						$nodrag_nodrop = 'nodrag nodrop'; //nodrag nodrop
						$handle_move = '';
						$remove_column = '';
						$remove_row = '';	 //nosort
						
						echo '<tr class="'.$nodrag_nodrop.'" >';
                        $i=0;
                        foreach($price_table_data_price as $key => $value)
                            {

								?>
								<td class="<?php echo $nosort; ?>" ><?php echo $remove_column; ?>  <?php echo $remove_row; ?> <?php echo $handle_move; ?><div class="price">Price</div><input title="Column Price, ex: $25" placeholder="Column Price. ex: $25" name="price_table_data_price[col_<?php echo $i ?>]" type="text" value="<?php echo $value; ?>" />
                                </td>
                                <?php

							$i++;
							}
							echo '</tr>';
							



						//Column Header
						$nosort = '';	 //nosort
						$nodrag_nodrop = 'nodrag nodrop'; //nodrag nodrop
						$handle_move = '';
						$remove_column = '';
						$remove_row = '';	 //nosort
						
						echo '<tr class="'.$nodrag_nodrop.'" >';
                        $i=0;
                        foreach($price_table_data_header as $key => $value)
                            {

								?>
								<td class="<?php echo $nosort; ?>" ><?php echo $remove_column; ?>  <?php echo $remove_row; ?> <?php echo $handle_move; ?><div class="header">Column Header</div><input title="Column Header, ex: Basic" placeholder="Column Header. ex: Basic" name="price_table_data_header[col_<?php echo $i ?>]" type="text" value="<?php echo $value; ?>" />
                                </td>
                                <?php

							$i++;
							}
							echo '</tr>';












							
						//Signup Text row
						$nosort = '';	 //nosort
						$nodrag_nodrop = 'nodrag nodrop'; //nodrag nodrop
						$handle_move = '';
						$remove_column = '';
						$remove_row = '';	 //nosort
						
						echo '<tr class="'.$nodrag_nodrop.'" >';
                        $i=0;
                        foreach($price_table_data_signup_url as $key => $value)
                            {

								?>

								<td class="<?php echo $nosort; ?>" ><?php echo $remove_column; ?>  <?php echo $remove_row; ?> <?php echo $handle_move; ?><div class="signup-url">SignUp URL</div><input title="SignUp URL, ex: http://hello.com/signup" placeholder="SignUp URL" name="price_table_data_signup_url[col_<?php echo $i ?>]" type="text" value="<?php echo $price_table_data_signup_url[$key]; ?>" />
                                
								<div class="signup-text">SignUp Text</div><input title="SignUp Text, ex: SignUp" placeholder="SignUp Text" name="price_table_data_signup_text[col_<?php echo $i ?>]" type="text" value="<?php echo $price_table_data_signup_text[$key]; ?>" />
                                
                                </td>

                                <?php

							$i++;
							}
							echo '</tr>';				
							
											
							
							
							
							
							
							
							
					
					
					

					
					
					?>
                    
                    
                                            
                    <?php
                   		//print_r($price_table_data);
                        
                        $i=0;
                        foreach($price_table_data as $key1=> $value1)
                            {
								$nodrag_nodrop = '';

                                echo '<tr class="'.$nodrag_nodrop.'" id="'.$i.'" >';
								
								
                                $t=0;
                                foreach($value1 as $key2 => $value2)
                                    {
										
										$nosort = '';
										$handle = '';
										$remove_column = '';

										if($t == 0 )
											{
											$remove_row = '<span title="Remove this row." class="remove-row"></span>';	 //nosort
											}	
										else
											{
												$remove_row = '';
											}											
											

											
											
                                    ?>
                                    
                    
                                        <td class="<?php echo $nosort; ?>" >  <?php echo $remove_column; ?>  <?php echo $remove_row; ?> <?php echo $handle; ?><input name="price_table_data[row_<?php echo $i; ?>][col_<?php echo $t; ?>]" type="text" value="<?php echo $value2; ?>" /></td>
                                    
                                    <?php
                                        
									
										  
										    
                                     $t++;
                                    }
                                    
                                echo '</tr>';
                                $i++;
                                
                                
                                }
                    
                    ?>
                    
                    </table>
                    </div>
                    




<script>

	jQuery(document).ready(function() {

		// Initialise the table
		jQuery("#price-table-admin").tableDnD();

	});

</script>

<script>


jQuery('#price-table-admin').dragtable({dragHandle:'.column-drag-handle'});





</script>



                </div>            
            


				                
                
                
                
                            
            </li>

            
            <li style="display: none;" class="box3 tab-box ">
            



            	<div class="option-box">
                    <p class="option-title">Column Price Duration Text</p>
                    <p class="option-info"></p>

                    <div class="price-table-duration-container">
                    <table id="price-table-duration">
                    <?php

						echo '<tr >';
                        $u=0;
                        foreach($price_table_data_price as $key => $value)
                            {
								if(empty($price_table_col_width[$key]))
									{
										$price_table_col_width[$key] = '';	
									}

								?>
								<td>
								<input placeholder="Ex: per month." type="text" name="price_table_col_duration[col_<?php echo $u; ?>]"  value="<?php echo $price_table_col_duration[$key]; ?>"/>
                                
                                </td>
                                <?php

							$u++;
							}
							echo '</tr>';
					
					
					?>
                    
                    </table>
                    </div>

                </div>  









            
            	<div class="option-box">
                    <p class="option-title">Column Custom Width</p>
                    <p class="option-info"></p>

                    <div class="price-table-width-container">
                    <table id="price-table-width">
                    <?php

						echo '<tr >';
                        $u=0;
                        foreach($price_table_data_price as $key => $value)
                            {
								if(empty($price_table_col_width[$key]))
									{
										$price_table_col_width[$key] = '';	
									}

								?>
								<td>
								<input placeholder="ex: 200px." type="text" name="price_table_col_width[col_<?php echo $u; ?>]"  value="<?php echo $price_table_col_width[$key]; ?>"/>
                                
                                </td>
                                <?php

							$u++;
							}
							echo '</tr>';
					
					
					?>
                    
                    </table>
                    </div>

                </div>  
            
            
            
            
            	<div class="option-box">
                    <p class="option-title">Column Ribbons</p>
                    <p class="option-info"></p>
                    <div class="price-table-more-container">
                    <table id="price-table-more">
                    <?php
                    

						
						echo '<tr >';
                        $u=0;
                        foreach($price_table_data_price as $key => $value)
                            {
								if(empty($price_table_ribbons[$key]))
									{
										$price_table_ribbons[$key] = 'none';	
									}

								?>
								<td>
								<select name="price_table_ribbons[col_<?php echo $u; ?>]">
                                <option value="none" <?php if($price_table_ribbons[$key]=='none') echo 'selected' ?>>None</option>                                
                                <option value="free" <?php if($price_table_ribbons[$key]=='free') echo 'selected' ?>>Free</option>
                                <option value="save" <?php if($price_table_ribbons[$key]=='save') echo 'selected' ?>>Save</option>                    
                                <option value="best" <?php if($price_table_ribbons[$key]=='best') echo 'selected' ?>>Best</option>
                                <option value="pro" <?php if($price_table_ribbons[$key]=='pro') echo 'selected' ?>> Pro</option>                                
                                <option value="gift" <?php if($price_table_ribbons[$key]=='gift') echo 'selected' ?>>Gift</option>                                
                                <option value="sale" <?php if($price_table_ribbons[$key]=='sale') echo 'selected' ?>>Sale</option>                                   
                                <option value="new" <?php if($price_table_ribbons[$key]=='new') echo 'selected' ?>>New</option>                                
                                <option value="top" <?php if($price_table_ribbons[$key]=='top') echo 'selected' ?>>Top</option>                                  
                                <option value="fresh" <?php if($price_table_ribbons[$key]=='fresh') echo 'selected' ?>>Fresh</option>                                 
                                <option value="dis_10" <?php if($price_table_ribbons[$key]=='dis_10') echo 'selected' ?>>-10%</option> 

                                <option value="dis_20" <?php if($price_table_ribbons[$key]=='dis_20') echo 'selected' ?>>-20%</option> 
                                <option value="dis_30" <?php if($price_table_ribbons[$key]=='dis_30') echo 'selected' ?>>-30%</option>
                                <option value="dis_40" <?php if($price_table_ribbons[$key]=='dis_40') echo 'selected' ?>>-40%</option>
                                <option value="dis_50" <?php if($price_table_ribbons[$key]=='dis_50') echo 'selected' ?>>-50%</option>
                                <option value="dis_60" <?php if($price_table_ribbons[$key]=='dis_60') echo 'selected' ?>>-60%</option>
                                <option value="dis_70" <?php if($price_table_ribbons[$key]=='dis_70') echo 'selected' ?>>-70%</option>
                                <option value="dis_80" <?php if($price_table_ribbons[$key]=='dis_80') echo 'selected' ?>>-80%</option>
                                <option value="dis_90" <?php if($price_table_ribbons[$key]=='dis_90') echo 'selected' ?>>-90%</option>
                                <option value="dis_100" <?php if($price_table_ribbons[$key]=='dis_100') echo 'selected' ?>>-100%</option>



                          
                                
                                
                                </select>
                                </td>
                                <?php

							$u++;
							}
							echo '</tr>';
					
					
					?>
                    
                    </table>
                    </div>
                </div>
                
                
                
                
            	<div class="option-box">
                
               
                
                    <p class="option-title">Column Video or Images</p>
                    <p class="option-info"></p>
					
                    <div class="price-table-img-container">
                    <table id="price-table-img">
                    <?php

						echo '<tr >';
                        $u=0;
                        foreach($price_table_data_price as $key => $value)
                            {
								if(empty($price_table_col_img[$key]))
									{
										$price_table_col_img[$key] = '';	
									}

								?>
								<td>
								<input placeholder="image or video url." type="text" name="price_table_col_img[col_<?php echo $u; ?>]"  value="<?php echo $price_table_col_img[$key]; ?>"/>
                                
                                </td>
                                <?php

							$u++;
							}
							echo '</tr>';
					
					
					?>
                    
                    </table>
                    </div>


                
                    <p class="option-title">Height for Image or Video Row</p>
                    <p class="option-info"></p> 
					<input placeholder="ex: 150px" type="text" name="price_table_col_img_height" value="<?php if(!empty($price_table_col_img_height)) echo $price_table_col_img_height; ?>" />


                </div> 
                
               
                
            </li>            
            
            
            <li style="display: none;" class="box4 tab-box ">
            	<div class="option-box">
                    <p class="option-title">Background image for table area</p>
                    <p class="option-info"></p>
					<script>
                    jQuery(document).ready(function(jQuery)
                        {
                                jQuery(".price_table_bg_list li").click(function()
                                    { 	
                                        jQuery('.price_table_bg_list li.bg-selected').removeClass('bg-selected');
                                        jQuery(this).addClass('bg-selected');
                                        
                                        var price_table_bg_img = jQuery(this).attr('data-url');
                    
                                        jQuery('#price_table_bg_img').val(price_table_bg_img);
                                        
                                    })	
                    
                                        
                        })
                    
                    </script> 
                    
                    
					<?php
                    
                    
                    
                        $dir_path = price_table_plugin_dir."css/bg/";
                        $filenames=glob($dir_path."*.png*");
                    
                    
                        $price_table_bg_img = get_post_meta( $post->ID, 'price_table_bg_img', true );
                        
                        if(empty($price_table_bg_img))
                            {
                            $price_table_bg_img = "";
                            }
                    
                    
                        $count=count($filenames);
                        
                    
                        $i=0;
                        echo "<ul class='price_table_bg_list' >";
                    
                        while($i<$count)
                            {
                                $filelink= str_replace($dir_path,"",$filenames[$i]);
                                
                                $filelink= price_table_plugin_url."css/bg/".$filelink;
                                
                                
                                if($price_table_bg_img==$filelink)
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
                        
                        echo "<input style='width:100%;' value='".$price_table_bg_img."'    placeholder='Please select image or left blank' id='price_table_bg_img' name='price_table_bg_img'  type='text' />";
                    
                    
                    
                    ?>
                    
                    
                    
                    
                    
                </div>
                
                
				<div class="option-box">
                    <p class="option-title">Font for this table</p>
                    <p class="option-info">You can add you own google font by select "Csutom" from font list and type font name inyo text field. get more google fonr here <a href="https://www.google.com/fonts#">https://www.google.com/fonts</a></p>
                    
                    <?php
                    
					$google_fonts = array(
						'Open Sans',		
						'Shadows Into Light',
						'Josefin Slab',
						'Arvo',						
						'Lato',						
						'Vollkorn',						
						'Abril Fatface',
						'Ubuntu',						
						'PT Sans',						
						'Old Standard TT',	
						'Droid Sans',
						'Anivers',						
						'Junction',						
						'Fertigo',	
						'Aller',							
						'Audimat',							
						'Delicious',
						'Prociono',						
						'Fontin',						
						'Fontin-Sans',						
						'Chunkfive',						
	
						
						
						
												
						);
					?>
                    
                    
                    <select class="price_table_font_family" name="price_table_font_family"  >
                     	<option value="" >Select</option>                   
                    <?php
                    
						foreach($google_fonts as $font)
							{
								echo '<option value="'.$font.'" ';
								
								if($price_table_font_family == $font)echo "selected";
								
								echo '>'.$font.'</option>';								
								
								
							}
					?>

                    </select>
                    <br /><br />
                    
                    <?php
                    	if($price_table_font_family=='custom')
							{
								$style = 'display:block;';
							}
						else
							{
								$style = 'display:none;';
							}
					?>
                    <input placeholder="ex: Open Sans" type="text" style=" <?php echo $style; ?> " class="price_table_font_family_custom" name="price_table_font_family_custom" value="<?php if(!empty($price_table_font_family_custom)) echo $price_table_font_family_custom; ?>" />
                    
                    
                </div>
                
                
                
                
                
            </li>            
            <li style="display: none;" class="box5 tab-box ">
            	<div class="option-box">
                    <p class="option-title">Themes</p>
                    <p class="option-info"></p>
                    <select class="price_table_themes" name="price_table_themes"  >
                    <option  value="flat" <?php if($price_table_themes=="flat")echo "selected"; ?>>Flat</option>

                    </select>
                </div>
         
                
            	<div class="option-box">
                    <p class="option-title">Column Background Color Pack</p>
                    <p class="option-info">Custom Background Color only for premium version</p>
                    <div class="price-table-themes-pack-container">
                    <table id="price-table-themes-pack">
                    <?php
                    

						
						echo '<tr >';
                        $u=0;
                        foreach($price_table_data_price as $key => $value)
                            {
								if(empty($price_table_themes_pack[$key]))
									{
										$price_table_themes_pack[$key] = 'none';	
									}

								?>
								<td>
								<select class="price_table_themes_pack" col="<?php echo $u; ?>" name="price_table_themes_pack[col_<?php echo $u; ?>]">
                                                          
                                <option value="pack1" <?php if($price_table_themes_pack[$key]=='pack1') echo 'selected' ?>>Pack 1</option>
                                <option value="pack2" <?php if($price_table_themes_pack[$key]=='pack2') echo 'selected' ?>>Pack 2</option>                                
                                <option value="pack3" <?php if($price_table_themes_pack[$key]=='pack3') echo 'selected' ?>>Pack 3</option>                                
                                <option value="pack4" <?php if($price_table_themes_pack[$key]=='pack4') echo 'selected' ?>>Pack 4</option>                                 
                                <option value="pack5" <?php if($price_table_themes_pack[$key]=='pack5') echo 'selected' ?>>Pack 5</option>                                
                                <option value="pack6" <?php if($price_table_themes_pack[$key]=='pack6') echo 'selected' ?>>Pack 6</option>                           
                                <option value="pack7" <?php if($price_table_themes_pack[$key]=='pack7') echo 'selected' ?>>Pack 7</option>
                                <option value="pack8" <?php if($price_table_themes_pack[$key]=='pack8') echo 'selected' ?>>Pack 8</option>                                
                                <option value="pack9" <?php if($price_table_themes_pack[$key]=='pack9') echo 'selected' ?>>Pack 9</option>                                  
                                <option value="pack10" <?php if($price_table_themes_pack[$key]=='pack10') echo 'selected' ?>>Pack 10</option>                                
                                <option value="pack11" <?php if($price_table_themes_pack[$key]=='pack11') echo 'selected' ?>>Pack 11</option>                                 
                                <option value="pack12" <?php if($price_table_themes_pack[$key]=='pack12') echo 'selected' ?>>Pack 12</option>                                 
                                

                                </select>
                                
                                  <div class="price_table_themes_pack_custom price_table_themes_pack_custom<?php echo $u; ?>" col="<?php echo $u; ?>" >
                                  	<br/>Header<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_pack_custom_header[$key])) echo $price_table_themes_pack_custom_header[$key]; ?>" class="color" name="price_table_themes_pack_custom_header[<?php echo $key; ?>]" />
                                     <br/>Price<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_pack_custom_price[$key])) echo $price_table_themes_pack_custom_price[$key]; ?>" class="color" name="price_table_themes_pack_custom_price[<?php echo $key; ?>]" />
                                    <br/>Signup<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_pack_custom_signup[$key])) echo $price_table_themes_pack_custom_signup[$key]; ?>" class="color" name="price_table_themes_pack_custom_signup[<?php echo $key; ?>]" />                                                                        
                                  </div>
                                
                                
                                </td>
                                <?php

							$u++;
							}
							echo '</tr>';
					
					
					?>
                    
                    </table>
                    </div>
                </div>
                
                
                
            	<div class="option-box">
                    <p class="option-title">Column Text Color Pack</p>
                    <p class="option-info">Custom Color only for premium version.</p>
                    <div class="price-table-themes-text-pack-container">
                    <table id="price-table-themes-text-pack">
                    <?php
                    

						
						echo '<tr >';
                        $u=0;
                        foreach($price_table_data_price as $key => $value)
                            {
								if(empty($price_table_themes_text_pack[$key]))
									{
										$price_table_themes_text_pack[$key] = 'none';	
									}

								?>
								<td>
								<select col="<?php echo $u; ?>" class="price_table_themes_text_pack" name="price_table_themes_text_pack[col_<?php echo $u; ?>]">
                                                           
                                <option value="pack1" <?php if($price_table_themes_text_pack[$key]=='pack1') echo 'selected' ?>>Pack 1</option>
                                <option value="pack2" <?php if($price_table_themes_text_pack[$key]=='pack2') echo 'selected' ?>>Pack 2</option>                                
                                <option value="pack3" <?php if($price_table_themes_text_pack[$key]=='pack3') echo 'selected' ?>>Pack 3</option>                                
                                <option value="pack4" <?php if($price_table_themes_text_pack[$key]=='pack4') echo 'selected' ?>>Pack 4</option>                                 
                                <option value="pack5" <?php if($price_table_themes_text_pack[$key]=='pack5') echo 'selected' ?>>Pack 5</option>                                
                                <option value="pack6" <?php if($price_table_themes_text_pack[$key]=='pack6') echo 'selected' ?>>Pack 6</option>                           
                                <option value="pack7" <?php if($price_table_themes_text_pack[$key]=='pack7') echo 'selected' ?>>Pack 7</option>                                 
                                

                                </select>
                                
                              
                                  <div class="price_table_themes_text_pack_custom price_table_themes_text_pack_custom<?php echo $u; ?>" col="<?php echo $u; ?>" >
                                  
                                  	<br/>Header<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_text_pack_custom_header[$key])) echo $price_table_themes_text_pack_custom_header[$key]; ?>" class="color" name="price_table_themes_text_pack_custom_header[<?php echo $key; ?>]" />
                                     <br/>Price<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_text_pack_custom_price[$key])) echo $price_table_themes_text_pack_custom_price[$key]; ?>" class="color" name="price_table_themes_text_pack_custom_price[<?php echo $key; ?>]" />
                                    <br/>Signup<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_text_pack_custom_signup[$key])) echo $price_table_themes_text_pack_custom_signup[$key]; ?>" class="color" name="price_table_themes_text_pack_custom_signup[<?php echo $key; ?>]" />                                                                        
                                  </div>
                                
                                
                                </td>
                                <?php

							$u++;
							}
							echo '</tr>';
					
					
					?>
                    
                    </table>
                    </div>
                </div>
                
                
                
                
            	<div class="option-box">
                    <p class="option-title">Column Text Font Size</p>
                    <p class="option-info">Custom Font Size only for premium version.</p>
                    <div class="price-table-themes-text-size-pack-container">
                    <table id="price-table-themes-text-size-pack">
                    <?php
                    

						
						echo '<tr >';
                        $u=0;
                        foreach($price_table_data_price as $key => $value)
                            {
								if(empty($price_table_themes_text_size_pack_header[$key]))
									{
										$price_table_themes_text_size_pack_header[$key] = '25px';	
									}
									
								if(empty($price_table_themes_text_size_pack_price[$key]))
									{
										$price_table_themes_text_size_pack_price[$key] = '23px';	
									}									
									
								if(empty($price_table_themes_text_size_pack_signup[$key]))
									{
										$price_table_themes_text_size_pack_signup[$key] = '17px';	
									}									

								?>
								<td>
								
                                  <div class="price_table_themes_text_size_pack" >
                                  
                                  	<br/>Header<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_text_size_pack_header[$key])) echo $price_table_themes_text_size_pack_header[$key]; ?>"  name="price_table_themes_text_size_pack_header[<?php echo $key; ?>]" />
                                    
                                     <br/>Price<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_text_size_pack_price[$key])) echo $price_table_themes_text_size_pack_price[$key]; ?>" name="price_table_themes_text_size_pack_price[<?php echo $key; ?>]" />
                                    
                                    <br/>Signup<br/>
                                  	<input size="7" type="text" value="<?php if(!empty($price_table_themes_text_size_pack_signup[$key])) echo $price_table_themes_text_size_pack_signup[$key]; ?>" name="price_table_themes_text_size_pack_signup[<?php echo $key; ?>]" />                                                                        
                                  </div>
                                  
                                
                                
                                </td>
                                <?php

							$u++;
							}
							echo '</tr>';
					
					
					?>
                    
                    </table>
                    </div>
                </div> 
                
                
                
            </li>  
        
        </ul>
        
 

    </div> <!-- para-settings -->



<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_price_table_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_price_table_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_price_table_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_price_table_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$price_table_data = stripslashes_deep( $_POST['price_table_data'] );	
	$price_table_data_price = stripslashes_deep( $_POST['price_table_data_price'] );
	$price_table_data_header = stripslashes_deep( $_POST['price_table_data_header'] );			
	$price_table_data_signup_url = stripslashes_deep( $_POST['price_table_data_signup_url'] );	
	$price_table_data_signup_text = stripslashes_deep( $_POST['price_table_data_signup_text'] );	
	

	
	$price_table_themes = sanitize_text_field( $_POST['price_table_themes'] );
	$price_table_themes_pack = stripslashes_deep( $_POST['price_table_themes_pack'] );
	$price_table_themes_text_pack = stripslashes_deep( $_POST['price_table_themes_text_pack'] );	
	
	$price_table_themes_pack_custom_header = stripslashes_deep( $_POST['price_table_themes_pack_custom_header'] );	
	$price_table_themes_pack_custom_price = stripslashes_deep( $_POST['price_table_themes_pack_custom_price'] );	
	$price_table_themes_pack_custom_signup = stripslashes_deep( $_POST['price_table_themes_pack_custom_signup'] );	
	
	$price_table_themes_text_pack_custom_header = stripslashes_deep( $_POST['price_table_themes_text_pack_custom_header'] );
	$price_table_themes_text_pack_custom_price = stripslashes_deep( $_POST['price_table_themes_text_pack_custom_price'] );	
	$price_table_themes_text_pack_custom_signup = stripslashes_deep( $_POST['price_table_themes_text_pack_custom_signup'] );		

	$price_table_themes_text_size_pack_header = stripslashes_deep( $_POST['price_table_themes_text_size_pack_header'] );
	$price_table_themes_text_size_pack_price = stripslashes_deep( $_POST['price_table_themes_text_size_pack_price'] );	
	$price_table_themes_text_size_pack_signup = stripslashes_deep( $_POST['price_table_themes_text_size_pack_signup'] );		


	
	
	
	
	$price_table_col_duration = stripslashes_deep( $_POST['price_table_col_duration'] );	
	$price_table_col_width = stripslashes_deep( $_POST['price_table_col_width'] );
		
	$price_table_ribbons = stripslashes_deep( $_POST['price_table_ribbons'] );
	$price_table_col_img = stripslashes_deep( $_POST['price_table_col_img'] );	
	$price_table_col_img_height = sanitize_text_field( $_POST['price_table_col_img_height'] );
	
	$price_table_bg_img = sanitize_text_field( $_POST['price_table_bg_img'] );
	$price_table_font_family = sanitize_text_field( $_POST['price_table_font_family'] );
	$price_table_font_family_custom = sanitize_text_field( $_POST['price_table_font_family_custom'] );	
	

  // Update the meta field in the database.
	update_post_meta( $post_id, 'price_table_data', $price_table_data );	
	update_post_meta( $post_id, 'price_table_data_price', $price_table_data_price );
	update_post_meta( $post_id, 'price_table_data_header', $price_table_data_header );	
	update_post_meta( $post_id, 'price_table_data_signup_url', $price_table_data_signup_url );
	update_post_meta( $post_id, 'price_table_data_signup_text', $price_table_data_signup_text );

	update_post_meta( $post_id, 'price_table_themes', $price_table_themes );
	update_post_meta( $post_id, 'price_table_themes_pack', $price_table_themes_pack );
	update_post_meta( $post_id, 'price_table_themes_text_pack', $price_table_themes_text_pack );	

	update_post_meta( $post_id, 'price_table_themes_pack_custom_header', $price_table_themes_pack_custom_header );
	update_post_meta( $post_id, 'price_table_themes_pack_custom_price', $price_table_themes_pack_custom_price );	
	update_post_meta( $post_id, 'price_table_themes_pack_custom_signup', $price_table_themes_pack_custom_signup );


	update_post_meta( $post_id, 'price_table_themes_text_pack_custom_header', $price_table_themes_text_pack_custom_header );
	update_post_meta( $post_id, 'price_table_themes_text_pack_custom_price', $price_table_themes_text_pack_custom_price );
	update_post_meta( $post_id, 'price_table_themes_text_pack_custom_signup', $price_table_themes_text_pack_custom_signup );	


	update_post_meta( $post_id, 'price_table_themes_text_size_pack_header', $price_table_themes_text_size_pack_header );
	update_post_meta( $post_id, 'price_table_themes_text_size_pack_price', $price_table_themes_text_size_pack_price );	
	update_post_meta( $post_id, 'price_table_themes_text_size_pack_signup', $price_table_themes_text_size_pack_signup );

	update_post_meta( $post_id, 'price_table_col_duration', $price_table_col_duration );	
	update_post_meta( $post_id, 'price_table_col_width', $price_table_col_width );		
	update_post_meta( $post_id, 'price_table_ribbons', $price_table_ribbons );	
	update_post_meta( $post_id, 'price_table_col_img', $price_table_col_img );	
	update_post_meta( $post_id, 'price_table_col_img_height', $price_table_col_img_height );
	
	update_post_meta( $post_id, 'price_table_bg_img', $price_table_bg_img );
	update_post_meta( $post_id, 'price_table_font_family', $price_table_font_family );
	update_post_meta( $post_id, 'price_table_font_family_custom', $price_table_font_family_custom );	

	
}
add_action( 'save_post', 'meta_boxes_price_table_save' );


























?>