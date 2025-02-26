<?php
//blocking direct access the file
if ( ! defined( 'ABSPATH' ) ) {
    die( '&ldquo;the door is shut it was made by those who are dead&rdquo;' );
}

if( !class_exists('GBQuickLaunch') ):
    class GBQuickLaunch{
        private $settings;
        function __construct(){
            $this->settings = $this->GetGBQuickLaunchSettings();

            $this->hooks();

            $this->init();

        }

        //PRIVATE

        /*
         * call : * in class
         * do : return array of settings
         */
        private function GetGBQuickLaunchSettings(){
            return array(
                'id' => 'gb-quick-launch',
                'slug' => 'gbqllinks',
                'title' => __('GB Quick Launch Links','gb-quick-launch'),
                'singular' => __('GB Quick Launch Link','gb-quick-launch'),
            );
        }

        /*
         * call : __construct
         * do : Initiate the class
         */
        private function init(){

        }

        //PUBLIC

        /*
         * call : init
         * do : add hooks & filters
         */
        public function hooks(){
            add_action("wp_footer",array($this,"get_buttons"),10);
            add_action( 'wp_enqueue_scripts', array($this,'GBQuickLaunchEnqueue') );
        }

        /*
         * call : hooks /add_action( 'wp_enqueue_scripts', array($this,'GBQuickLaunchEnqueue') );
         * do : register scripts and styles
         */
        public function GBQuickLaunchEnqueue(){
            wp_register_script("gbql-script",GBQLURL . "/core/js/gbql.js",array("jquery"),GBQL);
            wp_register_style("gbql-style",GBQLURL . "/core/css/gbql.css","",GBQL);
        }

        /*
         * call : hooks /add_action( 'wp_enqueue_scripts', array($this,'GBQuickLaunchEnqueue') );
         * do : register scripts and styles
         */
        public function GetMainButton($buttons_settings){
            ?>
            <div class="gbql-main-button-con">
                <?php
                if(isset($buttons_settings["gbql_main_icon"]) && !empty($buttons_settings["gbql_main_icon"]) && is_numeric($buttons_settings["gbql_main_icon"])):
                    $image = wp_get_attachment_image_src( intval($buttons_settings["gbql_main_icon"]),"full" );
                    if($image):
                        ?>
                        <a href="#" class="gbql-main-button">
                            <img src="<?php echo esc_url($image[0]) ?>" width="<?php echo esc_attr($image[1]) ?>" height="<?php echo esc_attr($image[2]) ?>" title="" alt="" />
                        </a>
                    <?php endif ?>
                <?php endif ?>
            </div>
            <?php
        }

        /*
         * call : hooks // add_shortcode("gbql",array($this,"get_buttons"));
         * do : output the gbql shortcode
         */
        public function get_buttons(){
            wp_enqueue_script("gbql-script");
            wp_enqueue_style("gbql-style");
            $buttons = array();

            //get the latest 3 gbql posts
            $buttons_posts = get_posts(array(
                'posts_per_page'   => -1,
                'post_status' => 'publish',
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => $this->settings['id'],
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => 'gbql_button_view',
                        'value' => '3',
                        'compare' => '=',
                    ),
                    array(
                        'key' => 'gbql_button_view',
                        'value' => (wp_is_mobile() ? '2':'1'),
                        'compare' => '=',
                    )
                )
                //gbql_button_view
            ));
            if($buttons_posts){
                $return_buttons = array();
                foreach ($buttons_posts as $btn){
                    $buttons[] = new GBQuickLaunchButton($btn);
                }
            }
            $buttons_settings = get_option("gbql_settings");
            if($buttons && !empty($buttons) && $buttons_settings && !empty($buttons_settings)): ?>
                <?php //last stop todo: add a case fore custom top left
                    if(isset($buttons_settings["gbql_main_position"]) && $buttons_settings["gbql_main_position"] == 'custom'):
                        if(is_numeric($buttons_settings["custom-css-top"]) && is_numeric($buttons_settings["custom-css-left"])): ?>
                        <style>
                            .gbql-buttons-wrap.custom{
                                top: <?php echo esc_html($buttons_settings["custom-css-top"]); ?>%;
                                left: <?php echo esc_html($buttons_settings["custom-css-left"]); ?>%;
                            }
                            .gbql-buttons-wrap.custom .gbql-wrap-all .gbql-buttons-con{
                                order:2;
                            }
                            <?php if($buttons_settings["custom-css-top"] >= 50): ?>
                            .gbql-buttons-wrap ul.gbql-buttons-con > li.code.gbql-open > .gbql-button > .gbql-code-con{
                                bottom:100%;
                            }
                            <?php else: ?>
                            .gbql-buttons-wrap ul.gbql-buttons-con > li.code.gbql-open > .gbql-button > .gbql-code-con{
                                top:100%;
                            }
                            <?php endif; ?>
                        </style>
                    <?php
                        endif;
                    endif;
                ?>
                <aside class="gbql-buttons-wrap <?php echo esc_attr(isset($buttons_settings["gbql_main_position"]) ? esc_attr($buttons_settings["gbql_main_position"]) : "BR-"); ?> <?php echo esc_attr(wp_is_mobile() ? "mob" : ""); ?>">
                    <div class="gbql-wrap-all">
                        <?php
                        if(isset($buttons_settings["gbql_main_position"]) && ($buttons_settings["gbql_main_position"] == "BL" || $buttons_settings["gbql_main_position"] == "TL")){
                            $this->GetMainButton($buttons_settings);
                        }
                        ?>
                        <ul class="gbql-buttons-con">
                        <?php foreach ($buttons as $btn): $classes = apply_filters("gbql_button_classes",array(), $btn); ?>
                            <li class="gbql-button-wrap <?php echo esc_attr(!empty($classes) && is_array($classes) ? implode(" ",$classes) : $btn->get_type()); ?>">
                                <div class="gbql-button">
                                    <?php echo $btn->get_html();?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php
                        if(isset($buttons_settings["gbql_main_position"]) && ($buttons_settings["gbql_main_position"] == "BR" || $buttons_settings["gbql_main_position"] == "TR" || $buttons_settings["gbql_main_position"] == "custom")){
                            $this->GetMainButton($buttons_settings);
                        }
                        ?>
                    </div>
                </aside>
            <?php
            endif;
        }
    }

//End fo "do only if class NOT exists"
endif;
//Return the GBQuickLaunch class object
function GBQuickLaunch(){
    global $GBQuickLaunch;

    if( !isset($GBQuickLaunch) ){
        $GBQuickLaunch = new GBQuickLaunch();
    }

    return $GBQuickLaunch;
}