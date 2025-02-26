<?php
/*
 * Template for showing Settings Meta Info on Shortcode Post Screen.
 */
global $post;
// if we have array value then extract it
(array_key_exists('general_setting', $args) && !empty($args['general_setting']))
    ? extract($args['general_setting'])
    : array();
?>

<div id="team-tabs-container">
    <!--Tabs Menu-->
    <ul class="team-tabs-menu">
        <li class="current" ><a href="#team-tab-1"><?php esc_html_e('General Settings', ADL_TEAM_TEXTDOMAIN); ?></a></li>
        <li><a href="#team-tab-2"><?php esc_html_e('Style Settings', ADL_TEAM_TEXTDOMAIN); ?></a></li>
    </ul>
    <!--TABS Container-->
    <div class="team-tab">
        <!--TABS LISTS-->
        <!-- TABS 1 Package Data-->
        <div id="team-tab-1" class="team-tab-content">
            <div class="cmb2-wrap form-table">
                <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

                    <!--Member Display Type-->
                    <div class="cmb-row cmb-type-multicheck">
                        <div class="cmb-th">
                            <label ><?php esc_html_e('Member Display Type', ADL_TEAM_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li><input type="radio" class="cmb2-option query_type" name="gs[query_type]" id="query_type1" value="date" <?= (@$query_type == "date") ? "checked" : ((empty($query_type)) ? "checked": '') ; ?>> <label for="query_type1" ><?php esc_html_e('Arrange Members by Date', ADL_TEAM_TEXTDOMAIN); ?></label></li>
                                <li><input type="radio" class="cmb2-option query_type" name="gs[query_type]" id="query_type2" value="title" <?php checked('title', @$query_type); ?>> <label for="query_type2" ><?php esc_html_e('Arrange Members by Title', ADL_TEAM_TEXTDOMAIN); ?></label></li>
                                </ul>
                            <p class="cmb2-metabox-description"><?php esc_html_e('You can choose your favorite option to display members on your website. Options like Arrange Members Randomly, Arrange Members by Designation(s) and ID(s) are available in Pro verison.', ADL_TEAM_TEXTDOMAIN); ?></p>
                        </div>
                    </div>

                    <!--Arrange Type-->
                    <div class="cmb-row cmb-type-multicheck">
                        <div class="cmb-th">
                            <label ><?php esc_html_e('Arrange Type', ADL_TEAM_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li><input type="radio" class="cmb2-option" name="gs[arrange_type]" id="arrange_type1" value="ASC" <?= (@$arrange_type == "ASC") ? "checked" : ((empty($arrange_type)) ? "checked": '');?>> <label for="arrange_type1" ><?php esc_html_e('Ascending', ADL_TEAM_TEXTDOMAIN); ?></label></li>
                                <li><input type="radio" class="cmb2-option" name="gs[arrange_type]" id="arrange_type2" value="DESC" <?php  checked('DESC', @$arrange_type); ?>> <label for="arrange_type2" ><?php esc_html_e('Descending', ADL_TEAM_TEXTDOMAIN); ?></label></li>
                            </ul>
                            <p class="cmb2-metabox-description"><?php esc_html_e('You can arrange members by ascending or descending when displaying on your website', ADL_TEAM_TEXTDOMAIN); ?></p>
                        </div>
                    </div>


                    <!--Link member to detail page ????-->
                    <div class="cmb-row cmb-type-radio">
                        <div class="cmb-th">
                            <label for="show_member_detail"><?php esc_html_e('Show member detail page', ADL_TEAM_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li><label class="checkbox">
                                        <input type="checkbox" name="gs[show_member_detail]" id="show_member_detail"  value="yes" <?= (@$show_member_detail != 'no') ? 'checked' : '';  ?> class="checkbox__input" />
                                        <div class="checkbox__switch"></div>
                                    </label>
                                </li>
                            </ul>
                            <p class="cmb2-metabox-description"><?php esc_html_e('By enabling this, you can link every member to a detail page. User can see member\'s details by clicking member name on your website', ADL_TEAM_TEXTDOMAIN); ?></p>
                        </div>
                    </div>

                    <!--show details by popup ????-->
                    <div class="cmb-row cmb-type-multicheck">
                        <div class="cmb-th">
                            <label ><?php esc_html_e('Show member detail on', ADL_TEAM_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li><input type="radio" class="cmb2-option" name="gs[popup_show]" id="popup_show1" value="yes" <?= (@$popup_show == "yes") ? "checked" : ((empty($popup_show)) ? "checked": '');?>> <label for="popup_show1" ><?php esc_html_e('Popup', ADL_TEAM_TEXTDOMAIN); ?></label></li>
                                <li><input type="radio" class="cmb2-option" name="gs[popup_show]" id="popup_show2" value="no" <?php  checked('no', @$popup_show); ?>> <label for="popup_show2" ><?php esc_html_e('Page', ADL_TEAM_TEXTDOMAIN); ?></label></li>
                            </ul>
                        </div>
                    </div>

                <!--Crop Image ????-->
                <div class="cmb-row cmb-type-radio">
                    <div class="cmb-th">
                        <label for="crop_image"><?php esc_html_e('Crop large Image', ADL_TEAM_TEXTDOMAIN); ?></label>
                    </div>

                    <div class="cmb-td">
                        <ul class="cmb2-radio-list cmb2-list">
                            <li><label class="checkbox">
                                    <input type="checkbox" name="gs[crop_image]" id="crop_image"  value="yes" <?= (@$crop_image != 'no') ? 'checked' : '';  ?> class="checkbox__input" />
                                    <div class="checkbox__switch" id="crop_switch"></div>
                                </label>
                            </li>
                        </ul>
                        <p class="cmb2-metabox-description"><?php esc_html_e('You can crop large image to fit on your website by enabling this option', ADL_TEAM_TEXTDOMAIN); ?></p>
                    </div>

                </div>

                    <!-- Upscaling image ????-->
                    <div class="cmb-row cmb-type-radio">
                        <div class="cmb-th">
                            <label for="image_upscale"><?php esc_html_e('Enable Image Upscaling', ADL_TEAM_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li>
                                    <label class="checkbox">
                                        <input type="checkbox" name="gs[image_upscale]" id="image_upscale"  value="yes" <?= (@$image_upscale != 'no') ? 'checked' : '';  ?> class="checkbox__input" />
                                        <div class="checkbox__switch" id="crop_switch"></div>
                                    </label>
                                </li>
                            </ul>
                            <p class="cmb2-metabox-description"><?php esc_html_e('You can Enable Image upscaling if your image size is smaller than the cropping size and it does not show up after enabling image cropping feature. ', ADL_TEAM_TEXTDOMAIN); ?></p>
                        </div>
                    </div>
                </div> <!-- end cmb2-metabox -->
            </div> <!-- end cmb2-wrap -->
        </div> <!-- end team-tab-1 -->


        <!-- TABS 2 STYLE SETTINGS-->
        <div id="team-tab-2" class="team-tab-content">
            <div class="cmb2-wrap form-table" id="adlTeamAccordion">
                <h2>Select and Customize a Theme</h2>
                <div class="accordion-item">
                    <?php
                        $ADL_team->loadView('meta-shortcode/partials/select-theme', array( 'theme_name' => @$theme_name,));
                        $ADL_team->loadView('meta-shortcode/themes/style1', array( 'st1' => @$st1,));
                        $ADL_team->loadView('meta-shortcode/themes/style4', array( 'st4' => @$st4,));

                    ?>
                </div> <!--ends accordion-item-->

                <h2>Customize Fonts Style</h2>
                <div class="accordion-item">
                    <?php $ADL_team->loadView('meta-shortcode/partials/fonts', array( 'fs' => @$fs,)); ?>
                </div> <!--ends according-item -->


            </div> <!-- end cmb2-wrap -->
        </div> <!-- end team-tab-2 -->


        <!-- TAB 3 SUPPORT-->


    </div> <!-- end team-tab -->
</div> <!-- end team-tabs-container -->




<!-- Shortcode usage code -->
<?php $ADL_team->loadView('meta-shortcode/partials/shortcode'); ?>
