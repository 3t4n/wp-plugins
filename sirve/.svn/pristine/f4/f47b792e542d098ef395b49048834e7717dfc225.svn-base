<?php 
    /*
    * Sirve Settings 
    */

    class Sirve_Admin_Settings{

        function __construct(){
            add_action( 'admin_menu', [$this,'add_menu'], 99 );
            add_action( 'admin_init', [$this,'register_settings'] );
            add_action( 'init', [$this, 'sirve_flush_rewrite_rules'], 9999);
            
        }

        public function add_menu(){
            add_submenu_page( 
                'edit.php?post_type=sirve', 
                __('Settings','sirve'), 
                __('Settings','sirve'), 
                'manage_options',
                'sirve-settings', 
                [$this, 'sirve_options'],  
                99
            );
        }
    
        public function sirve_options(){ ?>
                <div class="wrap">
                    <?php $this->save_message(); ?>  
                    
                    <h2 class="nav-tab-wrapper">
                        <a class="nav-tab" id="defaultOpen" onclick="sirve_settings_tab_options(event, 'sirve_general_setting')"><?php echo esc_html__( 'General Setting', 'sirve' ); ?></a>
                        <a class="nav-tab" onclick="sirve_settings_tab_options(event, 'sirve_archive_setting')"><?php echo esc_html__( 'Grid Setting', 'sirve' )?></a>
                        <a class="nav-tab" onclick="sirve_settings_tab_options(event, 'sirve_style_setting')"><?php echo esc_html__( 'Global Style', 'sirve' )?></a>
                    </h2>

                    <form method="post" action="options.php">
                        <?php settings_fields( 'sirve-plugin-settings-group' ); ?>
                        <?php do_settings_sections( 'sirve-plugin-settings-group' ); ?>
                        <!-- General Setting -->
                        <div id="sirve_general_setting" class="sirve_tabcontent">
                            <!-- Title General Setting-->
                            <h2><?php echo esc_html__( 'General Setting', 'sirve' ); ?></h2>
                            
                            <table class="form-table sirve-form-table">
                                
                                <!-- Disable Detail Page -->
                                <tr>
                                    <th scope="row">
                                        <label for="sirve_use_theme_archive"><?php echo esc_html__( 'Use Theme Archive Page:', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <input type="checkbox" id="sirve_use_theme_archive" name="sirve_use_theme_archive" value="yes" <?php checked( get_option('sirve_use_theme_archive'), 'yes' )?>><br>
                                        <span><?php echo esc_html__( 'If you want you can use theme archive style.', 'sirve') ?></span>
                                    </td>
                                </tr>
                            
                                <!-- Show Post Excerpt -->
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="sirve_archive_page_width"><?php echo esc_html__( 'Page Width: ', 'sirve' ); ?></th></label>
                                    <td>
                                        <input type="number" min="500" id="sirve_archive_page_width" name="sirve_archive_page_width" placeholder="<?php echo esc_attr__( '1200', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_archive_page_width','1200') ); ?>" /><?php echo esc_html__( ' Px', 'sirve' ) ?></br>
                                        <span><?php echo esc_html__( 'Select the number of Page Width. The default is value 1200px.', 'sirve') ?></span>
                                    </td>
                                </tr>
                            
                                <!-- Archive Page Style -->
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="sirve_archive_page_style"> <?php echo esc_html__( 'Archive Page Style:', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <select id="sirve_archive_page_style" class="sirve_select_control" name="sirve_archive_page_style" value="<?php echo esc_attr( get_option('sirve_archive_page_style') ); ?>" >
                                            <option <?php selected( get_option('sirve_archive_page_style'), 'style-1' ); ?> value="style-1" ><?php echo esc_html__('Style 1', 'sirve'); ?></option>
                                            <option <?php selected( get_option('sirve_archive_page_style'), 'style-2' ); ?> value="style-2"><?php echo esc_html__('Style 2', 'sirve'); ?></option>
                                            <option <?php selected( get_option('sirve_archive_page_style'), 'style-3' ); ?> value="style-3"><?php echo esc_html__('Style 3', 'sirve'); ?></option>
                                            <option <?php selected( get_option('sirve_archive_page_style'), 'style-4' ); ?> value="style-4"><?php echo esc_html__('Style 4', 'sirve'); ?></option>
                                            
                                        </select></br>
                                        <span><?php echo esc_html__( 'Select the Archive Page style. The default is Style 1.', 'sirve'); ?></span>
                                    </td>
                                </tr>
                                <!-- Disable Detail Page -->
                                <tr>
                                    <th scope="row">
                                        <label for="sirve_single_page"><?php echo esc_html__( 'Disable Detail Page:', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <input type="checkbox" id="sirve_single_page" name="sirve_single_page" value="yes" <?php checked( get_option('sirve_single_page'), 'yes' )?>><br>
                                        <span><?php echo esc_html__( 'If you don\'t need the detail page for this post type, Disable it.', 'sirve') ?></span>
                                    </td>
                                </tr>

                                <!-- Enable Disable Button Link Options -->
                                <?php if(get_option('sirve_single_page') != 'yes'): ?>
                                    <tr>
                                        <th scope="row">
                                            <label for="sirve_single_page_button_link_enable"><?php echo esc_html__( 'Disable Detail Page Button Link:', 'sirve' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="checkbox" id="sirve_single_page_button_link_enable" name="sirve_single_page_button_link_enable" value="yes" <?php checked( get_option('sirve_single_page_button_link_enable'), 'yes' )?>><br>
                                            <span><?php echo esc_html__( 'If you don\'t need the detail page button Link, Disable it.', 'sirve') ?></span>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <!-- Show Post Excerpt -->
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="sirve_post_grid_word"><?php echo esc_html__( 'Show Post Excerpt: ', 'sirve' ); ?></th></label>
                                    <td>
                                        <input type="number" id="sirve_post_grid_word" name="sirve_post_grid_word" placeholder="<?php echo esc_attr__( '40', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_post_grid_word','40') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Select the number of List post grid word. The default is value 40.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- List Per Pages -->
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="sirve_par_pages"><?php echo esc_html__( 'List Per Pages: ', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <input type="number" id="sirve_par_pages" name="sirve_par_pages" placeholder="<?php echo esc_attr__( '15', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_par_pages','15') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Select the number of List per page. The default is value 15.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Post Order -->
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="sirve_post_order"><?php echo esc_html__( 'Post Order:', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <select class="sirve_select_control" id="sirve_post_order" name="sirve_post_order" value="<?php echo esc_attr( get_option('sirve_post_order') ); ?>" >
                                            <option <?php selected( get_option('sirve_post_order'), 'DESC' ); ?> value="<?php echo esc_attr( 'DESC' ); ?>" ><?php echo esc_html__('Descending ', 'sirve'); ?></option>
                                            <option <?php selected( get_option('sirve_post_order'), 'ASC' ); ?> value="<?php echo esc_attr( 'ASC' ); ?>"><?php echo esc_html__('Ascending', 'sirve'); ?></option>                                            
                                        </select></br>
                                        <span><?php echo esc_html__( 'Select whether your List to be shown in Ascending or Descending order.', 'sirve'); ?></span>
                                    </td>
                                </tr>
                                <!-- Post Order By -->
                                <tr valign="top">
                                    <th scope="row"> 
                                        <label for="sirve_post_order_by"><?php echo esc_html__( 'Post Order By:', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <select id="sirve_post_order_by" class="sirve_select_control" name="sirve_post_order_by" value="<?php echo esc_attr( get_option('sirve_post_order_by') ); ?>" >
                                            <option <?php selected( get_option('sirve_post_order_by'), 'ID' ); ?> value="<?php echo esc_attr( 'ID' ); ?>">
                                                <?php echo esc_html__('ID', 'sirve'); ?>
                                            </option>   
                                            <option <?php selected( get_option('sirve_post_order_by'), 'title' ); ?> value="<?php echo esc_attr( 'title' ); ?>">
                                                <?php echo esc_html__('Title', 'sirve'); ?>
                                            </option>
                                            <option <?php selected( get_option('sirve_post_order_by'), 'date' ); ?> value="<?php echo esc_attr( 'date' ); ?>">
                                                <?php echo esc_html__('Date', 'sirve'); ?>
                                            </option>                                          
                                            <option <?php selected( get_option('sirve_post_order_by'), 'modified' ); ?> value="<?php echo esc_attr( 'modified' ); ?>">
                                                <?php echo esc_html__('Modified Date', 'sirve'); ?>
                                            </option>         
                                            <option <?php selected( get_option('sirve_post_order_by'), 'rand' ); ?> value="<?php echo esc_attr( 'rand' ); ?>">
                                                <?php echo esc_html__('Random Order', 'sirve'); ?>
                                            </option>                                   
                                        </select></br>
                                        <span><?php echo esc_html__( 'Select whether your post order is to be shown based on various attributes.', 'sirve'); ?></span>
                                    </td>
                                </tr>

                                <!-- Frontend Menu Text -->
                                <tr valign="top">
                                    <th scope="row"> 
                                        <label for="sirve_frontend_menu_text"><?php echo esc_html__( 'Frontend Tab Menu Text:', 'sirve' )?></label></th>
                                    <td>
                                        <input type="text" id="sirve_frontend_menu_text" name="sirve_frontend_menu_text" placeholder="<?php echo esc_attr__( 'All Listing', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_frontend_menu_text') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Set the text to show what appears as “Frontend Tab Menu Text”. Here, the default text is “All Listing”', 'sirve') ?></span>
                                    </td>
                                </tr>

                                <!-- Button 1 Text -->
                                <tr valign="top">
                                    <th scope="row"> 
                                        <label for="sirve_button_one_text"><?php echo esc_html__( 'Button 1 Text:', 'sirve' )?></label></th>
                                    <td>
                                        <input type="text" id="sirve_button_one_text" name="sirve_button_one_text" placeholder="<?php echo esc_attr__( 'Live Preview', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_button_one_text') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Text to show what appears as “Button 1 Text”. The default text is “Live Preview”.', 'sirve') ?></span>
                                    </td>
                                </tr>

                                <!-- Button 2 Text -->
                                <tr valign="top">
                                    <th scope="row"> 
                                        <label for="sirve_single_page_button_text"><?php echo esc_html__( 'Button 2 Text:', 'sirve' )?></label></th>
                                    <td>
                                        <input type="text" id="sirve_single_page_button_text" name="sirve_single_page_button_text" placeholder="<?php echo esc_attr__( 'More Details', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_single_page_button_text') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Text to show what appears as “Button 2 Text”. The default text is “More Details”.', 'sirve') ?></span>
                                    </td>
                                </tr>

                            </table>
                            <?php submit_button() ?>
                        </div>

                        <!-- General Setting -->
                        <div id="sirve_archive_setting" class="sirve_tabcontent">
                            <!-- Title Grid Setting-->
                            <h2><?php echo esc_html__( 'Grid Setting', 'sirve' ); ?></h2>

                            <table class="form-table sirve-form-table">
                                <!-- Archive Page Content Show -->
                                <tr>
                                    <th scope="row">
                                        <label><?php echo esc_html__( 'Disable Directory Page Elements:', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <input type="checkbox" id="sirve_archive_page_image" name="sirve_archive_page_image" value="yes" <?php checked( get_option('sirve_archive_page_image'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Image', 'sirve') ?></span><br>

                                       
                                        <input type="checkbox" id="sirve_archive_page_title" name="sirve_archive_page_title" value="yes" <?php checked( get_option('sirve_archive_page_title'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Title', 'sirve') ?></span><br>

                                        <input type="checkbox" id="sirve_archive_page_description" name="sirve_archive_page_description" value="yes" <?php checked( get_option('sirve_archive_page_description'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Description', 'sirve') ?></span><br>

                                        <input type="checkbox" id="sirve_archive_page_category" name="sirve_archive_page_category" value="yes" <?php checked( get_option('sirve_archive_page_category'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Category', 'sirve') ?></span><br>

                                        <input type="checkbox" id="sirve_archive_page_tags" name="sirve_archive_page_tags" value="yes" <?php checked( get_option('sirve_archive_page_tags'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Tags', 'sirve') ?></span><br>

                                        <input type="checkbox" id="sirve_archive_page_buttons" name="sirve_archive_page_buttons" value="yes" <?php checked( get_option('sirve_archive_page_buttons'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Buttons', 'sirve') ?></span>
                                        
                                    </td>
                                </tr>


                                 <!-- Archive Category Page Content Show -->
                                 <tr>
                                    <th scope="row">
                                        <label><?php echo esc_html__( 'Disable Archive Page Elements:', 'sirve' ); ?></label>
                                    </th>
                                    <td>
                                        <input type="checkbox" id="sirve_category_archive_page_image" name="sirve_category_archive_page_image" value="yes" <?php checked( get_option('sirve_category_archive_page_image'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Image', 'sirve') ?></span><br>

                                       
                                        <input type="checkbox" id="sirve_category_archive_page_title" name="sirve_category_archive_page_title" value="yes" <?php checked( get_option('sirve_category_archive_page_title'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Title', 'sirve') ?></span><br>

                                        <input type="checkbox" id="sirve_category_archive_page_description" name="sirve_category_archive_page_description" value="yes" <?php checked( get_option('sirve_category_archive_page_description'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Description', 'sirve') ?></span><br>

                                        <input type="checkbox" id="sirve_category_archive_page_category" name="sirve_category_archive_page_category" value="yes" <?php checked( get_option('sirve_category_archive_page_category'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Category', 'sirve') ?></span><br>
                                        
                                        <input type="checkbox" id="sirve_category_archive_page_tags" name="sirve_category_archive_page_tags" value="yes" <?php checked( get_option('sirve_category_archive_page_tags'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Tags', 'sirve') ?></span><br>

                                        <input type="checkbox" id="sirve_category_archive_page_buttons" name="sirve_category_archive_page_buttons" value="yes" <?php checked( get_option('sirve_category_archive_page_buttons'), 'yes' )?>>
                                        <span><?php echo esc_html__( 'Buttons', 'sirve') ?></span>
                                        
                                    </td>
                                </tr>

                                <!-- Frontend Category lable -->
                                <tr valign="top">
                                    <th scope="row"> 
                                        <label for="sirve_fontend_category_lable"><?php echo esc_html__( 'Category Label:', 'sirve' )?></label></th>
                                    <td>
                                        <input type="text" id="sirve_fontend_category_lable" name="sirve_fontend_category_lable" placeholder="<?php echo esc_attr__( 'Category: ', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_fontend_category_lable') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Set the text to show what appears as “Frontend Category Lable”. Here, the default text is “Category”', 'sirve') ?></span>
                                    </td>
                                </tr>

                                <!-- Frontend Category lable -->
                                <tr valign="top">
                                    <th scope="row"> 
                                        <label for="sirve_fontend_tag_lable"><?php echo esc_html__( 'Tags Label:', 'sirve' )?></label></th>
                                    <td>
                                        <input type="text" id="sirve_fontend_tag_lable" name="sirve_fontend_tag_lable" placeholder="<?php echo esc_attr__( 'Tags: ', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_fontend_tag_lable') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Set the text to show what appears as “Frontend Tags Lable”. Here, the default text is Tags', 'sirve') ?></span>
                                    </td>
                                </tr>

                                <!-- Frontend Category Separator -->
                                <tr valign="top">
                                    <th scope="row"> 
                                        <label for="sirve_fontend_category_and_tag_separator"><?php echo esc_html__( 'Separator Label:', 'sirve' )?></label></th>
                                    <td>
                                        <input type="text" id="sirve_fontend_category_and_tag_separator" name="sirve_fontend_category_and_tag_separator" placeholder="<?php echo esc_attr__( ',', 'sirve' ) ?>" value="<?php echo esc_attr( get_option('sirve_fontend_category_and_tag_separator') ); ?>" /></br>
                                        <span><?php echo esc_html__( 'Set the text to show what appears as “Frontend category separator”. Here, the default Separato symbol is “,”', 'sirve') ?></span>
                                    </td>
                                </tr>

                            </table>
                            <?php submit_button() ?>
                        </div>

                        <!-- Style settings Section -->
                        <div id="sirve_style_setting" class="sirve_tabcontent">
                            <h2><?php echo esc_html__( 'Global Style', 'sirve' ) ?></h2>
                            <table class="form-table">
                                <!-- Text Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Text Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker"  data-alpha-enabled="true" name="sirve_button_1_text_color" value="<?php echo esc_attr(  get_option('sirve_button_1_text_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Text Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Text Hover Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Text Hover Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_1_text_hover_color" value="<?php echo esc_attr( get_option('sirve_button_1_text_hover_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Text Hover Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Background Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Background Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_1_bg_color" value="<?php echo esc_attr(  get_option('sirve_button_1_bg_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Background Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Background Hover Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Background Hover Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_1_bg_hover_color" value="<?php echo esc_attr( get_option('sirve_button_1_bg_hover_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Background  Hover Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Boder Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Boder Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_1_boder_color" value="<?php echo esc_attr( get_option('sirve_button_1_boder_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Boder Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <!-- Sirve Settings -->
                            <h2><?php echo esc_html__( 'Button 2 Style', 'sirve' ) ?></h2>
                            <table class="form-table">
                                <!-- Text Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Text Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker"  data-alpha-enabled="true" name="sirve_button_2_text_color" value="<?php echo esc_attr(  get_option('sirve_button_2_text_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Text Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Text Hover Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Text Hover Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_2_text_hover_color" value="<?php echo esc_attr( get_option('sirve_button_2_text_hover_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Text Hover Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Background Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Background Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_2_bg_color" value="<?php echo esc_attr(  get_option('sirve_button_2_bg_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Background Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Background Hover Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Background Hover Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_2_bg_hover_color" value="<?php echo esc_attr( get_option('sirve_button_2_bg_hover_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Background  Hover Color for the List.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                <!-- Boder Color -->
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Boder Color:', 'sirve' ) ?></th>
                                    <td> 
                                        <input type="text" class="sirve_color-picker" data-alpha-enabled="true" name="sirve_button_2_boder_color" value="<?php echo esc_attr( get_option('sirve_button_2_boder_color')) ?>"/></br>
                                        <span><?php echo esc_html__( 'Change the Button Boder Hover Color for the Lists.', 'sirve') ?></span>
                                    </td>
                                </tr>
                            </table>

                            <hr>
                            <!-- Sirve Custom CSS -->
                            <table class="form-table">     
                                <tr valign="top">
                                    <th scope="row"><?php echo esc_html__( 'Sirve Custom CSS:', 'sirve' ) ?></th>
                                    <td> 
                                        <textarea rows="4" cols="50" name="sirve_coustom_css" placeholder="<?php echo esc_attr__( '.example{ color: red; }', 'sirve' ) ?>"><?php echo esc_attr( get_option('sirve_coustom_css') ) ?></textarea></br>
                                        <span><?php echo esc_html__( 'Put Any Custom CSS as you want.', 'sirve') ?></span>
                                    </td>
                                </tr>
                                
                            </table> 
                            <?php submit_button() ?>
                        </div>                       
                    </form>
                </div>

                <script>
                    function sirve_settings_tab_options(evt, className) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("sirve_tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("nav-tab");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" nav-tab-active", "");
                        }
                        document.getElementById(className).style.display = "block";
                        evt.currentTarget.className += " nav-tab-active";
                    }

                    window.onload = function () {
                        startTab();
                    };

                    function startTab() {
                        document.getElementById("defaultOpen").click();
                    }

                </script>
            <?php
        }
        
        public function register_settings() { // whitelist options
            
            //register our settings
            register_setting( 'sirve-plugin-settings-group', 'sirve_use_theme_archive');
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_width');
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_style');
            register_setting( 'sirve-plugin-settings-group', 'sirve_par_pages' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_single_page' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_single_page_button_link_enable' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_post_grid_word' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_post_order' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_post_order_by' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_show_par_click' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_titel_limit' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_frontend_menu_text' );
            //Global Button Text
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_one_text' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_single_page_button_text' );
            //Archive Page setting
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_image' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_title' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_description' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_category' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_tags' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_archive_page_buttons' );
            //Category Archive setting
            register_setting( 'sirve-plugin-settings-group', 'sirve_category_archive_page_image' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_category_archive_page_title' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_category_archive_page_description' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_category_archive_page_category' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_category_archive_page_tags' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_category_archive_page_buttons' );
            

            //Category lable
            register_setting( 'sirve-plugin-settings-group', 'sirve_fontend_category_lable' );
            //Tag lable
            register_setting( 'sirve-plugin-settings-group', 'sirve_fontend_tag_lable' );
            //Separator
            register_setting( 'sirve-plugin-settings-group', 'sirve_fontend_category_and_tag_separator' );

            //Button 1 Style
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_1_text_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_1_text_hover_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_1_bg_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_1_bg_hover_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_1_boder_color' );
            //Button 2 Style
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_2_text_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_2_text_hover_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_2_bg_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_2_bg_hover_color' );
            register_setting( 'sirve-plugin-settings-group', 'sirve_button_2_boder_color' );
            //Custom CSS
            register_setting( 'sirve-plugin-settings-group', 'sirve_coustom_css' );
            
        }
        // Sirve Settings Save Message
        public function save_message() {
            
            if( isset($_GET['settings-updated']) ): ?>
                <div class="updated notice is-dismissible"> 
                    <p><strong><?php esc_html_e('Successfully Settings Saved.', 'sirve') ?></strong></p>
                </div>
        <?php endif; 
        } 
        // sirve_flush_rewrite_rules
        function sirve_flush_rewrite_rules() {
            if( !empty($_REQUEST['submit'])){
                $htsirve_single_page = (isset($_REQUEST['sirve_single_page'])) ? sanitize_text_field( $_REQUEST['sirve_single_page'] ) : '';
                if(get_option( 'sirve_single_page') != $htsirve_single_page ){
                    update_option('sirve_flush_links', true);
                }
            }

            if(!is_admin() && get_option('sirve_flush_links', true) == true){
                flush_rewrite_rules();
                update_option('sirve_flush_links', false);
            }
        }
    }

    new Sirve_Admin_Settings();