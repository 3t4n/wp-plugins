<?php
/*

 * Administration Options Class For Fueto 2

 */
class fueto_Admin_Options
{

    /**

     * A Function To Hook To Admin Init.

     */
    function init()
    {
        //Register Settings
        wp_enqueue_style( 'fueto-css', FUETO_HTTP_PATH . 'css/fueto.css' );
        wp_enqueue_script( 'fuetobox-js', FUETO_HTTP_PATH . 'js/gBox.js' );        
        wp_enqueue_script( 'fueto-js', FUETO_HTTP_PATH . 'js/fueto.js' );
        
        register_setting( 'fueto_options_group' , 'fueto_options' );
        
        //Add The Settings Sections
        add_settings_section( 'fueto_locations', __( 'Locations' ),  array( 'fueto_Admin_Options' , 'location_options_callback' )  , 'fueto_options' );
        add_settings_section( 'fueto_options', __( 'General Options' ),  array( 'fueto_Admin_Options' , 'general_options_callback' )  , 'fueto_options' );
    }

    /**

     * Add The Menu Pages To The Administration Options

     */
    function add_menu_pages()
    {
        global $fueto_post_types;
        $page = add_options_page( __( 'Fueto Options' ), __( 'Fueto' ), 'manage_options', 'fueto_options' , array( 'fueto_Admin_Options' , 'Create_Options_Page' ) );
        //Add CSS And Javascript Specific To This Options Pages
        add_action( 'admin_print_styles-' . $page , array( 'fueto_Admin_Options' , 'enqueue_styles' ) );
        add_action( 'admin_print_scripts-' . $page , array( 'fueto_Admin_Options' , 'enqueue_scripts' ) );

        if( isset( $_POST['fueto_reset'] ) )
        {
            check_admin_referer( 'fueto-reset' );
            fueto_reset();
            wp_redirect( $_SERVER['HTTP_REFERER' ] );
        }

        if( isset( $_POST['fueto_remove'] ) )
        {
            check_admin_referer( 'deactivate-fueto' );
            fueto_2_remove();
        }

        /*

        * We can create The Meta Boxes Here

        */
        //Also on posts and pages

        self::add_meta_box( 'post' );
        self::add_meta_box( 'page' );
    }

    /*

     * Function to Enqueue The Styles For The Options Page

     */
    function enqueue_styles()
    {
      //  wp_enqueue_style( 'fueto-box-css', FUETO_HTTP_PATH . 'css/fueto_box.css' );
      //  wp_enqueue_style( 'fueto-css', FUETO_HTTP_PATH . 'css/fueto.css' );
    }

    /*

     * Function To Enqueue The Scripts For The Options Page

     */
    function enqueue_scripts()
    {
        wp_enqueue_script('jquery-ui-sortable',false,array('jquery','jquery-ui-core'));
    }

  	function Create_Options_Page()
    {
        global $fueto_options;

        $processed = json_decode(fueto_processed(),1);
        $fueto_options['progress_bar_fill'] = $processed['num'];
        $remaining_posts = $processed['remaining for analysis'];
        $total_post = $processed['total posts'];
        $remaining_time = $processed['time'];
        $remaining = $processed["remaining"];
	?>

		<script src='<?php echo FUETO_HTTP_PATH?>/js/jscolor.js'></script>

		<div id="top_header"></div>

        <div id="fueto_header">
    	    <div class="fueto_logo"></div>
        </div>

        <div id="fueto_content">
    	    
            <form  method="post" action="options.php" id="form1" autocomplete="off">
                <input id="remaining_posts" type="hidden" value="<?php echo $fueto_options['progress_bar_fill']?>" />
                <input id="" name="fueto_options[progress_bar_fill]" type="hidden" value="<?php echo $fueto_options['progress_bar_fill']?>" />
                <input id="close_postit" name="fueto_options[close_postit]" type="hidden" value="<?php echo $fueto_options['close_postit']?>" />
                <?if($fueto_options['width_warning'] != ''):?>
                <div id="warning_width">
                    <div class="btn_close">
                        <a><img id="close_warning_width_btn" src="<?php echo FUETO_HTTP_PATH?>/images/btn_close.png" border="0" alt="Close" title="Close" /></a>
                    </div>
					<p><b>Warning:</b> Your style sheets have a smaller width than required, that's why Fueto is not showing on your blog. Please check your style sheets to correct this problem.</p>
                    <?
                        $element = explode(';', $fueto_options['width_warning']);
                        if($element)
                        {
                            foreach($element as $html)
                            {
                                list($tag, $id) = explode(':', $html);
                                if($tag != null)
                                {
                                    $htmlTag = htmlentities('<'.$tag.' id=\''.$id.'\'>');
                                }
                                ?>
                                    <p><?=$htmlTag?></p>
                                <?
                            }
                        }
                    ?>
                </div>
                <?endif;?>
                <?php if($fueto_options['close_postit'] == 0){ ?>
                <div id="postit">
        	        <div class="index_box">
            	        
                        <div class="principal_text">We're indexing each of your blog posts.</div>
                        
                        <div class="clear"></div>
                        
                        <div class="progress_bar">
                	        <div  style="width:<?php echo $fueto_options['progress_bar_fill']?>%;" class="progress_bar_fill"></div>
                        </div> 

                        <a class="btn_index">
                            <img width="53px" src="<?php echo FUETO_HTTP_PATH?>/images/btn_index_start.png" border="0" alt="start" title="start" />
                        </a>

                        <div class="clear"></div>

                        <div class="second_text" id="process_msj">Flueto-Indexing <?php echo $remaining;?> of <?php echo $total_post?> urls. Remaining: <?php echo $remaining_time?></div>
                    </div>

        	        <div class="separator"></div>

                    <div class="form_box">
            	        <div class="principal_text"> Want to know when we're done?</div>
                        <div class="clear"></div>
                        <input type="text" name="txt_email" id="txt_email" value="Your email here" />
                        <a class="btn_form">
                            <img id="fueto_send_mail" src="<?php echo FUETO_HTTP_PATH?>/images/btn_send.png" border="0" align="Send" title="Send" />
                        </a>
                        <div class="clear"></div>
                        <div class="second_text">We'll email you once your blog indexing is complete.</div>
                    </div>

                    <div class="btn_close">
            	        <a><img id="close_postit_btn" src="<?php echo FUETO_HTTP_PATH?>/images/btn_close.png" border="0" alt="Close" title="Close" /></a>
                    </div>
                </div>
                <?php }?>

    	        <div class="clear"></div>

                <div class="panel_large">
        	        <div class="panel_title_large"></div>
                    <?php echo fueto_html('admin'); ?>
                </div>

                <div class="clear"></div>
                
                <div class="panel">
        	        
                    <div class="panel_title_1"></div>

                    <div class="panel_inner_content">

                        <div class="row_separator"></div>
                        <div class="col_left">Text in blue button:</div>
                        <div class="col_right">
                            <input name="fueto_options[button]" type="text" class="panel_input" value="<?php echo $fueto_options['button']?>" />
                        </div>

                        <div class="row_separator"></div>
                        <input value="1" name="fueto_options[glass]" type="hidden"  />
                        <div class="col_left">Border background color:</div>
                        <div class="col_right">
                            <input value='<?php echo $fueto_options['style']['border_color']?>' name='fueto_options[style][border_color]' type="text" class="panel_input_color color" />
                        </div>

                        <div class="row_separator"></div>
                        <div class="col_left">Search width:</div>
                        <div class="col_right">
                            <select name="fueto_options[style][search_width]" class="panel_select">
                            <?php for($width = 50; $width <= 300; $width){ 
							        $selected = "";
                                    if ($fueto_options['style']['search_width'] == $width)
                                    {
                                        $selected = "selected='selected'";
							        }
					        ?>
                                <option <?php echo $selected; ?> value='<?php echo $width?>'><?php echo $width?>&nbsp;</option>
                            <? 
						        $width = $width + 5;
						        }
					        ?>
                            </select> px
                        </div>
                        
                        <div class="row_separator"></div>
                        <input type="hidden" name="fueto_options[style][bee_width]" value="62" />
                        <input type="hidden" name="fueto_options[style][glass_width]" value="28" />
                        <div class="col_left">Font color:</div>
                        <div class="col_right">
                            <input value="<?php echo $fueto_options['style']['font_color']?>" type="text" class="panel_input_color color" name="fueto_options[style][font_color]" />
                        </div>

                        <div class="row_separator"></div>
                        <div class="col_left">Autocomplete:</div>
                        <div class="col_right">
                            <input type="checkbox" name="fueto_options[autocomplete]" value="true" <?=!empty($fueto_options['autocomplete']) ? 'checked="checked"' : ''?> />
                        </div>                        
                        
                        <div class="row_separator"></div>

			        </div>

                </div>

                <div class="panel">

        	        <div class="panel_title_2"></div>

                    <div class="panel_inner_content">

                        <div class="row_separator"></div>
                        <div class="col_left_2">Open results in new window:</div>
                        <div class="col_right_2">
				        <?
					        $checked = '';
					        if (!empty( $fueto_options['new_window']))
                            {
						        $checked = "checked='checked'";
                            }
				        ?>
                            <input disabled name='fueto_options[new_window]' type="checkbox" />
				        </div>

                        <div class="row_separator"></div>
                        <div class="col_left_2">Number of results per page:</div>
                        <div class="col_right_2">
                            <select name='fueto_options[results]' class="panel_select">
                               <?php 
                                    for($results = 5; $results <=25 ; $results)
                                    { 
                                        $selected = "";
                                        if ($fueto_options['results'] == $results)
                                        {
                                            $selected = "selected='selected'";
    							        }
					           ?>
                               <option <?php echo $selected; ?> value='<?php echo $results?>'><?php echo $results?></option>
                               <?
                                        $results = $results + 5;
						            }
                                ?>
                                &nbsp;
                            </select>
                        </div>

                        <div class="row_separator"></div>
                        <div class="col_left_2">Search results looking:</div>
                        <div class="col_right_2">
                            <input type="radio"  disabled="disabled" /> Like Fueto<br/>
                            <input disabled="disabled" type="radio" checked="checked" /> Like my blog
                        </div>

                        <div class="row_separator"></div>
                            <div class="one_col">Help us grow: Have your blog participate in our <u>SocialProxy</u>.
				                <?php
					            $checked = "";
					            if (!empty($fueto_options['help_grow']))
                                {
						            $checked = 'checked="checked"';
					            }
				                ?>
				                <input id="socialproxy" type="checkbox" name="fueto_options[help_grow]" <?php echo $checked?> />
                            </div>
                        
                        <div class="row_separator"></div>

			        </div>

                </div>

                <div class="clear"></div>
                
                <div class="terms">
                    <?php 
                        $checked = '';
                        if (!empty($fueto_options['chk_terms']))
                        {
                            $checked = "checked='checked'";
                        }
                    ?>
        	        <input type="checkbox" <?php echo $checked?> name="fueto_options[chk_terms]" id="chk_terms" /> Yes, I agree to the <a href="#" onclick="gBox.width='730px';gBox.openID('terms-conditions');">Terms of Service</a>
                    
                    <div id="terms_box-conditions" style="display: none;">
                        <div id="terms-conditions">
                            <!--div id="black_background"></div-->
                            <div id="terms_box">
    		                    
                                <div class="fueto_header">
                                    <div class="title">Fueto Terms of Service</div>
                                    <div class="close_button"><a href="#"><img style="cursor:pointer;" src="<?php echo FUETO_HTTP_PATH?>/images/btn_close_terms.png" onclick="gBox.close();" border="0" alt="Close" title="Close" /></a></div>
                                </div>

                                <div class="fueto_content">
            	                    <div class="title">1. Fueto Hosts Your Posts</div>
                                    <p>Fueto is a fully-hosted, API-based outsourced search engine for blogs and websites. The big difference with Fueto is that social signals are the most important signals we use to rank search results.</p>
                                    <p>In order to index your content faster, to operate more efficiently, and to keep our secret sauce, well... secret, we need to transfer your blog posts to our own servers. When someone does a search on your blog, we process it and serve it from our own server infrastructure.</p>
                                    <p>The two main reasons being:</p>
                                    <p>a. Our secret sauce (FuetoIndex) resides in our servers, and it has to remain in our servers for protection.</p>
                                    <p>b. Our relevance engine requires special software installations that not all the servers hosting WP can handle.</p>
                                    
                                    <div class="title">2. Fueto Saves Search Queries</div>
                                    <p>In order to speed up the process, your readers will access the posts they're really after, and we'll save the queries your readers perform on your blog. With them we will be able to pre-populate future searches, cache the results, and do all background processing related activities. This is all intended to improve the search experience you offer to your blog readers.</p>
                                    
                                    <div class="title">3. Be Part Of The SocialProxy Initiative</div>
                                    <p>In order to grow this way of experiencing search, we need your help.</p>
                                    <p>Fueto's main goal is to improve blog search, your blog, and everyone else's as well, by taking social signals as the most important relevance factor in a search query.</p>
                                    <p>In order to achieve our ambitious goal, we have to go through a bit of heavy lifting on your behalf. We need to ping 8 social networks for EVERY single url you have in your blog, and every blog that runs Fueto as a search provider.</p>
                                    <p>That's why we created SocialProxy, so no blog in the world will be limited by their own resources and infrastructure.</p>
                                    <p>By joining the SocialProxy initiative that Fueto is leading, we'll be able to use a bit of your idle  infrastructure (bandwidth), to help others and your own blog. It doesn't affect you, your blog, your infrastructure, or your hosting at all. It helps Fueto tons when it comes to growing our community of bloggers. That means that bloggers such as yourself can benefit from it. It's just a setting and if you change your mind later, you just uncheck the box, and you're out of the SocialProxy.</p>
                                    <p>When you are participating in the SocialProxy initiative, we'll be able to offer true real-time updates (your latest posts). Your posts will be immediately searchable, although they may not rank immediately. Depending how much SocialProxy power we have available at the time, ranking make take a bit more or less time than normal as our own FuetoIndex FuetoIndex needs some power to work.</p>

    			                    <div class="title">4. Customize The Look And Feel Of Search Results</div>
                                    <p>You can customize the search results Fueto offers your blog to match your blog's look and feel. Or you can use the default Fueto-style search results appearance.</p>
                                    <p>Additionally, you may also customize the look and feel of the search box which will be displayed on your blog.</p>
                                    <br/><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php settings_fields( 'fueto_options_group' ); ?>
            </form>

            <form id="fueto_reset_form" action="" method="POST">
                <?php wp_nonce_field('fueto-reset'); ?>
			    <input type="hidden" id="fueto_reset" name="fueto_reset" value="1" />
            </form>

            <form id="fueto_remove_form" action="plugins.php" method="POST">
	            <?php wp_nonce_field('deactivate-fueto'); ?>
			    <input type="hidden" id="fueto_remove" name="fueto_remove" value="1" />
            </form>

            <div class="buttons">
        	    <a><img  onclick="document.getElementById('form1').submit();" src="<?php echo FUETO_HTTP_PATH?>/images/btn_save.png" /></a>
                <a><img onclick="document.getElementById('fueto_reset_form').submit();" src="<?php echo FUETO_HTTP_PATH?>/images/btn_reset.png" /></a>
            </div>
        </div>
	<?php
	}
    
    function add_meta_box( $page )
    {
        add_meta_box( 'fueto_off' , __( 'Disable fueto' ), array( 'fueto_Admin_Options' , 'create_meta_box' ) , $page, 'side', 'default' );
    }
    
    function create_meta_box()
    {
    	global $post;
        
        $fuetooff = false;
        $checked = '';

        if ( get_post_meta( $post->ID,'_fuetooff',true ) )
        {
            $checked = 'checked="checked"';
        }
        
        wp_nonce_field( 'update_fueto_off' , 'fueto_nonce' );
        echo '<input type="checkbox" id="fuetooff" name="fuetooff" ' . $checked . ' /> <p class="description">' . __('Check This To Disable fueto 2 On This Post Only.') . '</p>';
    }

}

?>