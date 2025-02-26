<?php
/**
 * Plugin option page
 * Created by PhpStorm.
 * User: mahmudsabuj
 * Date: 1/12/17
 * Time: 4:26 PM
 */


function ant_options_page() {
    add_options_page(
        'Any News Ticker',
        'Any News Ticker',
        'manage_options',
        'ant-any-news-ticker',
        'ant__news_ticker_functions_page'
    );
}
add_action( 'admin_menu', 'ant_options_page' );

//default options
$faq_load_options = array(
    'options_ID' => 'default_value'
);

if (is_admin()) :
    function ant_news_ticker_register_settings(){
        register_setting('ant_load_options', 'ant_news_ticker_options', 'ant_news_ticker_load_valid_options');
    }
    add_action('admin_init', 'ant_news_ticker_register_settings');

    //default value
    $ant_news_ticker_options = array(
        'ant_main_bg_color' => '#5b6079',
        'ant_title_color' => '#000000',
        'ant_title_bg_color' => '#f8f0db',
        'ant_ticker_border_radius' => '5px',
        'ant_ticker_text_color' => '#ffffff',
        'ant_number_of_posts' => '5',
        'ant_controls' => 'true',
        'ant_ticker_speed' => '200',
    );


    //retrieve post types
        $args = array(
            'public'   => true,
        );

        $output = 'names'; // names or objects, note names is the default
        $operator = 'and'; // 'and' or 'or'

        $post_types = get_post_types( $args, $output, $operator );

    //retrieve post type end here

function ant__news_ticker_functions_page(){
    global $ant_news_ticker_options;

    if (! isset($_REQUEST['update']))
        $_REQUEST['update']=false;
    ?>

    <div class="warp">
        <h2>Any News Ticker</h2>
        <input class="large-text code" type="text" disabled value='[any-ticker category_id="2"]'>

        <p><u><strong style="color:#58b70b;">DEFAULT SETTINGS</strong></u></p>
        <ul>
            <li>=> Display latest 5 posts from any category.</li>
            <li>=> Ticker speed .10 (ms)</li>
            <li>=> Left right control "On"</li>
            <li>=> Default ticker title “Latest Posts”</li>
        </ul>

        <p><u><strong>SHORTCODE CUSTOMIZATION</strong></u></p>
        <ul>
            <li>=> Use <u>category_id=”5”</u> to show specific category post. Replace "5" with your category ID</li>
        </ul>

        <?php if (false !==$_REQUEST['update']):?>
        <div class="updated fade"><p><strong><?php _e('Options Saved');?></strong></p></div>
        <?php endif;?>
        <form action="options.php" method="post">
            <?php $settings = get_option('ant_news_ticker_options',$ant_news_ticker_options);

            settings_fields('ant_load_options'); ?>
            <br/>
            <p class="text-center"><u><strong style="color:#58b70b;">TICKER DESIGN</strong></u></p>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><label for="ant_main_bg_color">Main Background Color</label></th>
                        <td><input name="ant_news_ticker_options[ant_main_bg_color]" type="text" id="ant_main_bg_color" value="<?php echo stripslashes($settings['ant_main_bg_color']);?>" class="my-color-field"/></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="ant_title_color">Title color</label></th>
                        <td><input name="ant_news_ticker_options[ant_title_color]" type="text" id="ant_title_color" value="<?php echo stripslashes($settings['ant_title_color']);?>" class="my-color-field"/></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="ant_title_bg_color">Title background color</label></th>
                        <td><input name="ant_news_ticker_options[ant_title_bg_color]" type="text" id="ant_title_bg_color" value="<?php echo stripslashes($settings['ant_title_bg_color']);?>" class="my-color-field"/></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="ant_ticker_border_radius">Border Radius</label></th>
                        <td><input name="ant_news_ticker_options[ant_ticker_border_radius]" type="number" id="ant_ticker_border_radius" value="<?php echo stripslashes($settings['ant_ticker_border_radius']);?>" class="small-text"/> px</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="ant_ticker_text_color">Ticker Text Color</label></th>
                        <td><input name="ant_news_ticker_options[ant_ticker_text_color]" type="text" id="ant_ticker_text_color" value="<?php echo stripslashes($settings['ant_ticker_text_color']);?>" class="my-color-field"/> </td>
                    </tr>

                    <tr valign="top">
                        <th class="text-center"><u><strong style="color:#58b70b;">TICKER CUSTOMIZATION</strong></u></th>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="ant_number_of_posts">Number of posts</label></th>
                        <td>
                            <input name="ant_news_ticker_options[ant_number_of_posts]" type="number" id="ant_number_of_posts" value="<?php echo stripslashes($settings['ant_number_of_posts']);?>" class="ant-number-of-posts"/>
                            <p class="description" id="tagline-description">Number of posts to show in the ticker</p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="ant_ticker_title">Ticker Title</label></th>
                        <td>
                            <input name="ant_news_ticker_options[ant_ticker_title]" type="text" id="antTickerTitle" value="<?php echo stripslashes($settings['ant_ticker_title']);?>" placeholder="Latest Posts" class="ant-ticker-title"/>
                            <p class="description" id="tagline-description">Enter Ticker Title here...</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="ant_controls">Left-right control</label></th>
                        <td>
                            <select name="ant_news_ticker_options[ant_controls]" id="ant_controls">
                                <option value="false" <?php if (stripslashes($settings['ant_controls']) == 'false'){echo 'selected';}?>>No</option>
                                <option value="true" <?php if (stripslashes($settings['ant_controls']) == 'true'){echo 'selected';}?>>Yes</option>
                            </select>
                            <p class="description" id="tagline-description">Enable or disable left right control bar </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="ant_ticker_speed">Ticker Speed</label></th>
                        <td>
                            <input name="ant_news_ticker_options[ant_ticker_speed]" type="number" id="ant_ticker_speed" max="999" value="<?php echo stripslashes($settings['ant_ticker_speed']);?>" class="ant-ticker-speed"/> MS
                            <p class="description" id="tagline-description">Enter ticker speed in milliseconds 100-999 </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="ant_post_type">Post Type</label></th>
                        <td>
                            <select name="ant_news_ticker_options[ant_post_type]" id="antPostType">
                                <?php
                                global $post_types;
                                foreach ( $post_types  as $post_type ) { ?>
                                    <option value="<?php echo $post_type?>"> <?php echo $post_type?> </option>
                                <?php } ?>
                            </select>
                            <?php echo stripslashes($settings["ant_post_type"]);?>
                            <p class="description" id="tagline-description">Select post types to show posts</p>
                        </td>
                    </tr>

                </tbody>
            </table>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
        </form>
        <p style="color: #00b500; font-weight: 700;"><span>Thanks for using Any News Ticker. DO NOT FORGET TO RATE US WITH 5 STAR RATING</span></p>
    </div>

<script type="text/javascript">
    document.getElementById('antPostType').value = '<?php echo stripslashes($settings["ant_post_type"]);?>';
</script>

<?php
}

function ant_news_ticker_load_valid_options($input){
    global $ant_news_ticker_options;

    $settings = get_option('ant_news_ticker_options', $ant_news_ticker_options);

    $input['ant_main_bg_color'] = wp_filter_post_kses($input['ant_main_bg_color']);
    $input['ant_title_color'] = wp_filter_post_kses($input['ant_title_color']);
    $input['ant_title_bg_color'] = wp_filter_post_kses($input['ant_title_bg_color']);
    $input['ant_ticker_border_radius'] = wp_filter_post_kses($input['ant_ticker_border_radius']);
    $input['ant_ticker_text_color'] = wp_filter_post_kses($input['ant_ticker_text_color']);
    $input['ant_number_of_posts'] = wp_filter_post_kses($input['ant_number_of_posts']);
    $input['ant_controls'] = wp_filter_post_kses($input['ant_controls']);
    $input['ant_ticker_speed'] = wp_filter_post_kses($input['ant_ticker_speed']);
    $input['ant_post_type'] = wp_filter_post_kses($input['ant_post_type']);
    $input['ant_ticker_title'] = wp_filter_post_kses($input['ant_ticker_title']);

    return $input;
}

endif; //end of is_admin()

function any_option_styles(){
    global $ant_news_ticker_options;
    $ant_settings = get_option('ant_news_ticker_options', $ant_news_ticker_options);
    ?>

    <style type="text/css">
        .ticker-title{
            color: <?php echo $ant_settings['ant_title_color'];?>;
            background: <?php echo $ant_settings['ant_title_bg_color'];?>;
        }
        .ticker-wrapper.has-js{
            border-radius: <?php echo $ant_settings['ant_ticker_border_radius'];?>px;
            background-color: <?php echo $ant_settings['ant_main_bg_color'];?>;
        }
        .ticker,.ticker-content{
            background-color: <?php echo $ant_settings['ant_main_bg_color'];?>;
        }
        .ticker-content a{
            color: <?php echo $ant_settings['ant_ticker_text_color'];?>;
        }
        .ticker-content{
            padding:7px 0;
        }
        .ticker-swipe {
            background-color: <?php echo $ant_settings['ant_main_bg_color'];?>;
        }

    </style>

<?php
}

add_action('wp_head', 'any_option_styles');

?>
