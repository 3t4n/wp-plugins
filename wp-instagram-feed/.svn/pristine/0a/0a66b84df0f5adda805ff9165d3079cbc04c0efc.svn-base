<?php wp_nonce_field( 'ifba_ui_meta_box_nonce', 'ifba_meta_box_nonce' );

global $post; 
$ifba_show_photos_from = get_post_meta($post->ID, '_ifba_show_photos_from', true); 
$ifba_user_id = get_post_meta($post->ID, '_ifba_user_id', true); 
$ifba_hashtag = get_post_meta($post->ID, '_ifba_hashtag', true); 
$ifba_location = get_post_meta($post->ID, '_ifba_location', true); 
$ifba_container_width = get_post_meta($post->ID, '_ifba_container_width', true); 
$ifba_date_posted = get_post_meta($post->ID, '_ifba_date_posted', true); 
$ifba_profile_picture = get_post_meta($post->ID, '_ifba_profile_picture', true); 
$ifba_caption_text = get_post_meta($post->ID, '_ifba_caption_text', true); 
$ifba_link_photos_to_instagram = get_post_meta($post->ID, '_ifba_link_photos_to_instagram', true); 
$ifba_show_photos_only = get_post_meta($post->ID, '_ifba_show_photos_only', true); 
$ifba_number_of_photos = get_post_meta($post->ID, '_ifba_number_of_photos', true); 
$ifba_feed_style = get_post_meta($post->ID, '_ifba_feed_style', true); 
$ifba_limit_post_characters = get_post_meta($post->ID, '_ifba_limit_post_characters', true); 
$ifba_thumbnail_size = get_post_meta($post->ID, '_ifba_thumbnail_size', true); 
$ifba_column_count = get_post_meta($post->ID, '_ifba_column_count', true); 
$ifba_feed_post_size = get_post_meta($post->ID, '_ifba_feed_post_size', true); 
$ifba_theme_selection = get_post_meta($post->ID, '_ifba_theme_selection', true); 
$ifba_private_access_token = get_post_meta($post->ID, '_ifba_private_access_token', true); 
$ifba_private_client_id = get_post_meta($post->ID, '_ifba_private_client_id', true); 

?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var selected_feed_style = $('input[name=ifba_feed_style]:checked', '#ifba_style_selection_option').val();
            if (selected_feed_style == 'thumbnails') {
                $('#ifba_thumbnail_style_options').show();
                $('#ifba_column_count_settings').hide();
                $('#ifba_thumbnails_image').css('border', '2px inset #858585');
                $('#ifba_masonry_image').css('border', 'none');
                $('#ifba_blog_image').css('border', 'none');
            }
            if (selected_feed_style == 'blog_style') {
                $('#ifba_blog_masonry_style_options').show();
                $('#ifba_column_count_settings').hide();
                $('#ifba_blog_image').css('border', '2px inset #858585');
                $('#ifba_thumbnails_image').css('border', 'none');
                $('#ifba_masonry_image').css('border', 'none');

            }
            if (selected_feed_style == 'masonry') {
                $('#ifba_blog_masonry_style_options').show();
                $('#ifba_column_count_settings').show();
                $('#ifba_masonry_image').css('border', '2px inset #858585');
                $('#ifba_blog_image').css('border', 'none');
                $('#ifba_thumbnails_image').css('border', 'none');

            }
            if (selected_feed_style == 'vertical') {
                $('#ifba_blog_masonry_style_options').show();
                $('#ifba_column_count_settings').hide();
                $('#ifba_vertical_image').css('border', '2px inset #858585');
                $('#ifba_blog_image').css('border', 'none');
                $('#ifba_thumbnails_image').css('border', 'none');
                $('#ifba_masonry_image').css('border', 'none');

            }
            $('#ifba_style_selection_option input').on('change', function() {
                var feed_style_selection = $('input[name=ifba_feed_style]:checked', '#ifba_style_selection_option').val();
                if (feed_style_selection == 'thumbnails') {
                    $('#ifba_thumbnail_style_options').show();
                    $('#ifba_blog_masonry_style_options').hide();
                    $('#ifba_column_count_settings').hide();
                    $('#ifba_thumbnails_image').css('border', '2px inset #858585');
                    $('#ifba_vertical_image').css('border', 'none');
                    $('#ifba_masonry_image').css('border', 'none');
                    $('#ifba_blog_image').css('border', 'none');
                }
                if (feed_style_selection == 'blog_style') {
                    $('#ifba_thumbnail_style_options').hide();
                    $('#ifba_blog_masonry_style_options').show();
                    $('#ifba_column_count_settings').hide();
                    $('#ifba_blog_image').css('border', '2px inset #858585');
                    $('#ifba_vertical_image').css('border', 'none');
                    $('#ifba_thumbnails_image').css('border', 'none');
                    $('#ifba_masonry_image').css('border', 'none');
                }
                if (feed_style_selection == 'vertical') {
                    $('#ifba_thumbnail_style_options').hide();
                    $('#ifba_blog_masonry_style_options').show();
                    $('#ifba_column_count_settings').hide();
                    $('#ifba_vertical_image').css('border', '2px inset #858585');
                    $('#ifba_blog_image').css('border', 'none');
                    $('#ifba_thumbnails_image').css('border', 'none');
                    $('#ifba_masonry_image').css('border', 'none');
                }
                if (feed_style_selection == 'masonry') {
                    $('#ifba_thumbnail_style_options').hide();
                    $('#ifba_blog_masonry_style_options').show();
                    $('#ifba_column_count_settings').show();
                    $('#ifba_vertical_image').css('border', 'none');
                    $('#ifba_masonry_image').css('border', '2px inset #858585');
                    $('#ifba_blog_image').css('border', 'none');
                    $('#ifba_thumbnails_image').css('border', 'none');
                }
            });
        });
    </script>
    <style type="text/css">
        main {
            background: #FFF;
            width: 98%;
            padding: 1%;
            margin-top: 1%;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
        }
        
        main p {
            font-size: 13px;
        }
        
        main #ifba-tab1,
        main #ifba-tab2,
        main #ifba-tab3,
        main #ifba-tab4,
        main section {
            clear: both;
            padding-top: 30px;
            display: none;
        }
        
        #ifba-tab1-label,
        #ifba-tab2-label,
        #ifba-tab3-label,
        #ifba-tab4-label {
            font-weight: bold;
            font-size: 14px;
            display: block;
            float: left;
            padding: 10px 30px;
            border-top: 2px solid transparent;
            border-right: 1px solid transparent;
            border-left: 1px solid transparent;
            border-bottom: 1px solid #DDD;
        }
        
        main label:hover {
            cursor: pointer;
            text-decoration: underline;
        }
        
        #ifba-tab1:checked ~ #ifba-content1,
        #ifba-tab2:checked ~ #ifba-content2,
        #ifba-tab3:checked ~ #ifba-content3,
        #ifba-tab4:checked ~ #ifba-content4 {
            display: block;
        }
        
        main input:checked + #ifba-tab1-label,
        main input:checked + #ifba-tab2-label,
        main input:checked + #ifba-tab3-label,
        main input:checked + #ifba-tab4-label {
            border-top-color: #239bd4;
            border-right-color: #DDD;
            border-left-color: #DDD;
            border-bottom-color: transparent;
            text-decoration: none;
        }
        
        #ifba_show_photos_from_id,
        #ifba_show_photos_from_location,
        #ifba_show_photos_from_hashtag {
            margin-top: 2px;
        }
        
        .ifba_checkbox {
            width: 25px !important;
            height: 25px !important;
            border: 1px solid lightgrey !important;
            border-radius: 5px !important;
            margin-left: 10px !important;
        }
        
        .ifba_checkbox:checked:before {
            font-size: 30px !important;
        }
        
        #ifba_theme_selection_table tr td {
            vertical-align: top;
            display: inline-block;
        }

.insta-default {
 width: 383px;
}
.insta-default a {
  padding: 15px 30px;
  display: block;
  background-color: #E33E5C;
  box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1);
  color: #FFF;
  font-size: 16px;
  border-radius: 4px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s;
}
.insta-default a:hover {
  box-shadow: 0 0 4px 3px rgba(0, 0, 0, 0.15);
  transition: all 0.3s;
}
.insta-default a i {
  color: #FFF;
  font-size: 18px;
}
    </style>
    <p style="text-align: center;
    background: white;
    border: 2px solid #239bd4;
    padding: 5px;
    font-size: 17px;">Copy this shortcode & paste into your Post or Page to show Instagram Feed<br/> <strong>[arrow_feed id='<?php echo $post->ID; ?>']</strong></p>
    <main>
        <input id="ifba-tab1" type="radio" name="ifba-tabs" checked>
        <label id="ifba-tab1-label" for="ifba-tab1">Feed Settings</label>
        <input id="ifba-tab2" type="radio" name="ifba-tabs">
        <label id="ifba-tab2-label" for="ifba-tab2">Add Your Access Token</label>
        <section id="ifba-content1">
            <h2 style="font-size: 17px;">Select Feed Style:</h2>
            <table id="ifba_style_selection_option">
                <tr>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input id="ifba_feed_style_vertical" type="radio" name="ifba_feed_style" value="vertical" <?php echo ($ifba_feed_style=='vertical' )? 'checked="checked"': ''; ?> <?php if($ifba_feed_style == ''){ echo 'checked="checked"';} ?>/>
                            <label for="ifba_feed_style_vertical"><strong>Vertical</strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_feed_style_vertical"> <img id="ifba_vertical_image" src="<?php echo plugins_url('images/vertical.png',__FILE__); ?>" /> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input id="ifba_feed_style_blog_style" type="radio" name="ifba_feed_style" value="blog_style" <?php echo ($ifba_feed_style=='blog_style' )? 'checked="checked"': ''; ?> />
                            <label for="ifba_feed_style_blog_style"><strong>Blog Style</strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_feed_style_blog_style"> <img id="ifba_blog_image" class="ifba_style_image" src="<?php echo plugins_url('images/blog_style.png',__FILE__); ?>" /> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input disabled id="ifba_feed_style_thumbnails" type="radio" name="" value="thumbnails" />
                            <label for="ifba_feed_style_thumbnails"><strong>Thumbnails <a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Locked)</a></strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_feed_style_thumbnails"> <img id="ifba_thumbnails_image" src="<?php echo plugins_url('images/thumbnails.png',__FILE__); ?>" /> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input disabled id="ifba_feed_style_masonry" type="radio" name="" value="masonry" />
                            <label for="ifba_feed_style_masonry"><strong>Masonry <a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Locked)</a></strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_feed_style_masonry"> <img id="ifba_masonry_image" class="ifba_style_image" src="<?php echo plugins_url('images/masonry.png',__FILE__); ?>" /> </label>
                        </p>
                    </td>
                </tr>
            </table>

            <table id="ifba_general_options">
                <tr>
                    <td style="vertical-align: top;">
                        <h3 style="margin: 6px;">Show Photos From:</h3> </td>
                    <td>
                        <table id="ifba_selection_table">
                            <tr>
                                <td>
                                    <input type="radio" id="ifba_show_photos_from_id" name="ifba_show_photos_from" value='userid' <?php checked( "userid", $ifba_show_photos_from); ?> <?php if($ifba_show_photos_from == ''){ echo 'checked="checked"';} ?>/>
                                    <label for="ifba_show_photos_from_id"><strong>User ID:</strong></label>
                                </td>
                                <td>
                                    <input type="text" id="ifba_show_photos_from_id_value" name="ifba_user_id" placeholder="Example: 355477699" value="<?php echo $ifba_user_id; ?>" /> <strong><a href="https://codeofaninja.com/tools/find-instagram-user-id" target="_blank">Click here to get your user id</a></strong> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> <span style="color: red;">Dont forget to add your Access Toke from the <strong>"Add Your Access Token"</strong> Tab</span>
                                    </span> </td>
                            </tr>
                           <!--  <tr>
                                <td>
                                    <input disabled type="radio" id="ifba_show_photos_from_hashtag" name="" value='hashtag' />
                                    <label for="ifba_show_photos_from_hashtag"><strong>Hashtag:</strong></label>
                                </td>
                                <td>
                                    <input disabled type="text" id="ifba_show_photos_from_hashtag_value" name="" value="" /><a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Premium Feature)</a> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> <span><strong>Example: awesome </strong></span> </td>
                            </tr> -->
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Number of Photos to Show: </h3> </td>
                    <td>
                        <input style="margin-left: 15px;" type="number" min="1" max="100" id="ifba_number_of_photos" name="ifba_number_of_photos" value="<?php if($ifba_number_of_photos == ''){ echo '20' ;}else{ echo $ifba_number_of_photos; } ?>" /> </td>
                </tr>
                <tr>
                    <td>
                        <h3>Change Date Posted Language: </h3>
                    </td>
                    <td>
                        <select name="" id="" value=>
                            <option value="en">English (Default)</option>
                            <option disabled value="ar">Arabic (Premium)</option>
                            <option disabled value="bn">Bangali (Premium)</option>
                            <option disabled value="cs">Czech (Premium)</option>
                            <option disabled value="da">Danish (Premium)</option>
                            <option disabled value="nl">Dutch (Premium)</option>
                            <option disabled value="fr">French (Premium)</option>
                            <option disabled value="de">German (Premium)</option>
                            <option disabled value="it">Italian (Premium)</option>
                            <option disabled value="ja">Japanese (Premium)</option>
                            <option disabled value="ko">Korean (Premium)</option>
                            <option disabled value="pt">Portuguese (Premium)</option>
                            <option disabled value="ru">Russian (Premium)</option>
                            <option disabled value="es">Spanish (Premium)</option>
                            <option disabled value="tr">Turkish (Premium)</option>
                            <option disabled value="uk">Ukranian (Premium)</option>
                        </select>
                    </td>
                </tr>
            </table>

            <table id="ifba_thumbnail_style_options" style="display: none;">
                <tr>
                    <td>
                        <h3>Thumbnail Size: </h3> </td>
                    <td>
                        <input style="width: 70px;margin-left: 106px;" type="number" id="ifba_thumbnail_size" name="ifba_thumbnail_size" value="<?php if($ifba_thumbnail_size == ''){ echo '250' ;}else{ echo $ifba_thumbnail_size; } ?>" /> px </td>
                </tr>
            </table>

            <table id="ifba_column_count_settings" style="display: none;">
                <tr>
                    <td>
                        <h3>Number of Columns in a Row: </h3> </td>
                    <td>
                        <input style="width: 70px;margin-left: ;" type="number" id="ifba_column_count" name="ifba_column_count" value="<?php if($ifba_column_count == ''){ echo '2' ;}else{ echo $ifba_column_count; } ?>" /> </td>
                </tr>
            </table>

            <table id="ifba_blog_masonry_style_options" style="display: none;">
                <tr>
                    <td>
                        <h3>Limit Post Caption Text: </h3> </td>
                    <td>
                        <input type="number" min="50" max="600" id="ifba_limit_post_characters" name="ifba_limit_post_characters" value="<?php if($ifba_limit_post_characters == ''){ echo '300' ;}else{ echo $ifba_limit_post_characters; } ?>" /> Characters <span>Minimum value is 50 & Maximum value is 600</span> </td>
                </tr>
                <tr>
                    <td>
                        <h3>Show Instagram Photos Only: </h3> </td>
                    <td>
                        <input type="checkbox" class="ifba_checkbox" name="ifba_show_photos_only" id="ifba_show_photos_only" value='1' <?php checked(1, $ifba_show_photos_only); ?> /> <span style="font-size: 13px;"><strong>(This will hide Post Caption Text, Profile Picture & Date Posted from your feed card)</strong></span> </td>
                </tr>
                <tr>
                    <td>
                        <h3>Hide Date Posted: </h3> </td>
                    <td>
                        <input type="checkbox" class="ifba_checkbox" name="ifba_date_posted" id="ifba_date_posted" value='1' <?php checked(1, $ifba_date_posted); ?> /> </td>
                </tr>
                <tr>
                    <td>
                        <h3>Hide Profile Picture: </h3> </td>
                    <td>
                        <input type="checkbox" class="ifba_checkbox" name="ifba_profile_picture" id="ifba_profile_picture" value='1' <?php checked( '1', $ifba_profile_picture); ?> /> </td>
                </tr>
                <tr>
                    <td>
                        <h3>Hide Post Caption Text: </h3> </td>
                    <td>
                        <input type="checkbox" class="ifba_checkbox" name="ifba_caption_text" id="ifba_caption_text" value='1' <?php checked( '1', $ifba_caption_text); ?> /> </td>
                </tr>
            </table>
            <br/>

            <h2 style=" font-size: 18px; margin: 0;padding: 3px;">Select Feed Template:</h2>
            <br/>
            <table id="ifba_theme_selection_table">
                <tr>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input type="radio" id="ifba_theme_selection_default" name="ifba_theme_selection" value="default" <?php echo ($ifba_theme_selection=='default' )? 'checked="checked"': ''; ?> <?php if($ifba_theme_selection == ''){ echo 'checked="checked"';} ?>/>
                            <label for="ifba_theme_selection_default"><strong>Default</strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_theme_selection_default"> <img style=" box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/default.png',__FILE__); ?>"> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input disabled type="radio" id="ifba_theme_selection_template0" name="" value="" />
                            <label for="ifba_theme_selection_template0"><strong>Dark <a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Locked)</a></strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_theme_selection_template0"> <img style="width: 200px;" src="<?php echo plugins_url('images/template0.png',__FILE__); ?>"> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input disabled type="radio" id="ifba_theme_selection_template1" name="" value="" />
                            <label for="ifba_theme_selection_template1"><strong>Pinterest Like Layout <a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Locked)</a></strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_theme_selection_template1"> <img style="width: 200px;" src="<?php echo plugins_url('images/template1.png',__FILE__); ?>"> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input disabled type="radio" id="ifba_theme_selection_template2" name="" value="" />
                            <label for="ifba_theme_selection_template2"><strong>Modern Light <a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Locked)</a></strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_theme_selection_template2"> <img style=" box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template2.png',__FILE__); ?>"> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input disabled type="radio" id="ifba_theme_selection_template3" name="" value="" />
                            <label for="ifba_theme_selection_template3"><strong>Modern Dark <a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Locked)</a></strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_theme_selection_template3"> <img style=" box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template3.png',__FILE__); ?>"> </label>
                        </p>
                    </td>
                    <td>
                        <p style="text-align: center;margin: 0;">
                            <input disabled type="radio" id="ifba_theme_selection_template4" name="" value="" />
                            <label for="ifba_theme_selection_template4"><strong>Space White <a href="https://www.arrowplugins.com/instagram-feed" target="_blank">(Locked)</a></strong></label>
                        </p>
                        <p style="text-align: center;margin: 5px;">
                            <label for="ifba_theme_selection_template4"> <img style=" box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template4.png',__FILE__); ?>"> </label>
                        </p>
                    </td>
                </tr>
            </table>
        </section>
         <?php 
  global $post;

 ?>
        <section id="ifba-content2">
            <div class="insta-default">
    <a href="http://instagram.safeasmilk.co/" target="_blank" class="insta-default"><i class="fa fa-instagram"></i> Click here to get your Access Token and User ID </a>
</div>

<br/>

            
            <p><strong>Access Token: </strong>
                <input style="width: 80%;" type="text" value="<?php echo $ifba_private_access_token; ?>" name="ifba_private_access_token" id="ifba_private_access_token"></p>
        </section>
        <section id="ifba-content3">
            <h3>Heading Text</h3>
            <p>Fusce pulvinar porttitor dui, eget ultrices nulla tincidunt vel. Suspendisse faucibus lacinia tellus, et viverra ligula. Suspendisse eget ipsum auctor, congue metus vel, dictum erat. Aenean tristique euismod molestie. Nulla rutrum accumsan nisl, ac semper sapien tincidunt et. Praesent tortor risus, commodo et sagittis nec, aliquam quis augue. Aenean non elit elementum, tempor metus at, aliquam felis.</p>
        </section>
        <section id="ifba-content4">
            <h3>Here Are Many Words</h3>
            <p>Vivamus convallis lectus lobortis dapibus ultricies. Sed fringilla vitae velit id rutrum. Maecenas metus felis, congue ut ante vitae, porta cursus risus. Nulla facilisi. Praesent vel ligula et erat euismod luctus. Etiam scelerisque placerat dapibus. Vivamus a mauris gravida urna mattis accumsan. Duis sagittis massa vel elit tincidunt, sed molestie lacus dictum. Mauris elementum, neque eu dapibus gravida, eros arcu euismod metus, vitae porttitor nibh elit at orci. Vestibulum laoreet id nulla sit amet mattis.</p>
        </section>
       <div class="">
            <h3>Like the plugin? Share with friends & family!</h3>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://wordpress.org/plugins/wp-instagram-feed/" data-text="Display your Facebook, Twitter, Instagram, Pinterest & VK posts on your site your way using the Social Feed WordPress plugin!" data-via="arrowplugins" data-dnt="true">Tweet</a>
            <a href="https://twitter.com/arrowplugins?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @arrowplugins</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            <div id="fb-root" style="display: none;"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=340145266536074&autoLogAppEvents=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div style="vertical-align: top;" class="fb-share-button" data-href="https://wordpress.org/plugins/wp-instagram-feed/" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share Instagram Feed Plugin</a></div>
            <div class="fb-like" data-href="https://www.facebook.com/wparrowplugins" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" style="display: block; float: left; margin-right: 4px;"></div>
            <script src="//platform.linkedin.com/in.js" type="text/javascript">
              lang: en_US
            </script>
            <script type="IN/Share" data-url="https://wordpress.org/plugins/wp-instagram-feed/"></script>
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <div class="g-plusone" data-size="medium" data-href="https://wordpress.org/plugins/wp-instagram-feed/"></div>
        </div>
    </main>


