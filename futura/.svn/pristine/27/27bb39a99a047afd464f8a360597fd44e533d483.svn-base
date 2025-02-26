<?php

require_once dirname(__FILE__).'/functions.php';

class Futura_Front{

    public $content_percentage;
    public $title_percentage;
    public $excerpt_percentage;
    public $image_percentage;
    public $tag_percentage;
    public $taxonomy_percentage;
    public $custom_field_percentage;
    public $author_percentage;
    public $display_style;
    public $activate_style;

    function __construct(){
        add_action( 'wp_enqueue_scripts', array($this, 'futura_scripts') );
        add_action( 'wp_footer', array($this, 'futura_related_post'), 1);
        add_filter( 'the_content', array($this, 'futura_the_content'), 100 );
        add_action( 'wp_footer', array($this, 'futura_footer'), 10);
        add_action( 'wp_ajax_futura_ajax_get_related_post', array($this, 'futura_ajax_get_related_post'));
        add_action( 'wp_ajax_nopriv_futura_ajax_get_related_post', array($this, 'futura_ajax_get_related_post'));
        add_action( 'wp_head', array($this, 'update_setting_front'), 10);
        add_action( 'wp_head', array($this, 'set_percentage_params'), 20);
        add_action( 'wp_head', array($this, 'load_style'), 100);
        add_action( 'futura_front_title', 'futura_front_title', 10);
        add_action( 'futura_post_title', 'futura_post_title', 10, 1);
        add_action( 'futura_content_summary', 'futura_content_summary', 10, 2);
        add_action( 'futura_the_author', 'futura_the_author', 10, 1);
        add_filter( 'futura_front_title_filter', 'futura_get_front_title', 10);
        add_shortcode('futura_related_id', array($this, 'futura_related_id'));
        add_shortcode('futura_show_related_posts', array($this, 'futura_sc_show_related_posts'));
        add_shortcode('futura_specify_open_content', array($this, 'futura_sc_specify_open_content'));
    }

    function futura_scripts(){

        wp_enqueue_script( 'futura_script', plugins_url( 'assets/js/script.js', dirname(__FILE__) ), array(), FUTURA_V, true );

        $display_style = $this->get_display_style();
        $this->display_style = $display_style;
        (get_option('futura_deactivate_style'))?$activate_style=0:$activate_style=1;
        $this->activate_style = $activate_style;

        if(($display_style == "footer_fixed" || $display_style == "after_content" || is_page('futura_search')) && $activate_style){
            wp_enqueue_style('futura_styles', plugins_url( '/assets/css/style.css', dirname(__FILE__) ), array(), FUTURA_V, 'all');		        
        }

    }

    function get_display_style(){
        $post_types = Futura::get_target_post_types();
        $futura_display = get_option('futura_display');
        if(in_array(get_post_type(), $post_types) && $futura_display=="footer_fixed" && is_singular()){
            return "footer_fixed";
        }elseif(in_array(get_post_type(), $post_types) && $futura_display=="after_content" && is_singular()){
            return "after_content";
        }
    }


    function load_style(){

        ?>
        <script>
            window.jQuery || document.write('<script src="<?php print get_home_url(); ?>/wp-includes/js/jquery/jquery.js">\x3C/script>')
        </script>        
        <?php        

        $this->style_admin_panel();

        $display_style = $this->display_style;
        $activate_style = $this->activate_style;
        if(!$activate_style){return;}
        if($display_style == "footer_fixed"){
            $this->style_footer_fixed();
        }elseif($display_style == "after_content"){
            $this->style_after_content();
        }


    }

    function style_footer_fixed(){
        ?>
        <style id="futura_footer_fixed">
            #futura_related_posts_wrap{
                background-color: <?php print get_option('futura_html_posts_wrap_bg_color'); ?>;
            }
            #futura_related_posts_wrap h3{
                font-size:<?php print get_option('futura_html_h3_font_size'); ?>;
                font-weight:normal; 
                margin-bottom:15px;
                margin-top:0;
                margin-bottom: 15px;
                border-left: 5px solid <?php print get_option('futura_html_border_title_color'); ?>;;
                padding-left: 15px;
            }
            .futura_related_post_text .title{
                margin-bottom:5px;
                line-height:1.5;
                font-size:<?php print get_option('futura_post_title_font_size'); ?>;
            }
            .futura_related_post_text .content{
                margin-bottom:5px;
                line-height:1.5;
                font-size:<?php print get_option('futura_summary_font_size'); ?>;
                color :#7c7c7c;
            }
            .futura_related_post_text .author{
                color :#7c7c7c;
                font-size:<?php print get_option('futura_author_font_size'); ?>;
            }
        </style>
        <?php
    }


    function style_after_content(){
        $post_per_page = get_option('futura_number_of_posts');
        if($post_per_page >= 3){
            $width = "32%";
        }else{
            $width = "49%";
        }

        $futura_html_border_color = get_option('futura_html_border_color');
        $futura_html_h3_font_size =  get_option('futura_html_h3_font_size');
        $futura_html_border_title_color = get_option('futura_html_border_title_color');
        $futura_post_title_font_size = get_option('futura_post_title_font_size');
        $futura_summary_font_size = get_option('futura_summary_font_size');
        $futura_author_font_size = get_option('futura_author_font_size');

        ?>
        <style id="footer_after_content">
        #futura_related_posts .futura_related_post_box{
            width:<?php print $width; ?>;
        }         
        #futura_related_after_content_wrap{
            background-color: <?php print get_option('futura_html_posts_wrap_bg_color'); ?>;
        }   
        #futura_related_after_content_wrap {
            border-top-color: <?php print $futura_html_border_color; ?>;
            border-bottom-color: <?php print $futura_html_border_color; ?>;
        }
        #futura_related_after_content_wrap h3{
            font-size:<?php print $futura_html_h3_font_size; ?>;
            border-left-color: <?php print $futura_html_border_title_color; ?>;
        }
        #futura_related_after_content_wrap h3:before,
        #futura_related_after_content_wrap h3:after{
            content:none;
        }
        .futura_related_post_text .title{
            margin-bottom:5px;
            line-height:1.5;
            font-size:<?php print $futura_post_title_font_size; ?>;
        }
        .futura_related_post_text .content{
            margin-bottom:5px;
            line-height:1.5;
            font-size:<?php print $futura_summary_font_size; ?>;
            color :#7c7c7c;
        }
        .futura_related_post_text .author{
            color :#7c7c7c;
            font-size:<?php print $futura_author_font_size; ?>;
        }
        </style>        
        <?php
    }

    function style_admin_panel(){
        if(current_user_can('manage_options') && is_singular(Futura::get_target_post_types()) ):?>
            <style>
                #futura_live_setting{
                    position:fixed;
                    top:40px;
                    right:0;
                    background:white;
                    z-index:1000;
                    padding:10px;
                    width:250px;
                }
                #futura_live_setting input[type="submit"]{
                    background:gray;
                    color:white;
                }
                #futura_live_setting .close{
                    cursor:pointer;
                    position:absolute;
                    right:15px;
                    top:10px;
                    width:20px;
                    height:20px;
                }
                #futura_live_setting .close span::before,#futura_live_setting .close span::after{
                    display: block;
                    content: "";
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 84%;
                    height: 16%;
                    margin: -8% 0 0 -42%;
                    background: gray;                    
                }
                #futura_live_setting .close span::before{
                    transform: rotate(-45deg);
                }                
                #futura_live_setting .close span::after{
                    transform: rotate(45deg);                    
                }     
                #futura_live_setting .futura_paramet_setting_title{
                    cursor:pointer;
                    display:flex;
                    align-items: center;
                }
                #futura_live_setting .futura_paramet_setting_title img{
                    margin-right:5px;
                    margin-top:3px;
                }
                #futura_live_setting input{
                    max-width:70%;
                    display:inline;
                    padding:5px;
                    text-align:right;
                }     
            </style>

            <div id="futura_live_setting">
                <div class="futura_paramet_setting_title"><img src="<?php print plugins_url( '/assets/images/logo-color.svg', dirname(__FILE__) ) ; ?>" alt="Futura" style="width:20px;height:20px;"><div style="padding-top:5px;"><?php _e( 'parameter setting', 'futura' ) ?></div></div>
                <form method="POST" action="<?php print get_permalink(); ?>" style="display:none;">
                    <input type="hidden" name="futura_live_setting" value="1">
                    <input type="hidden" name="futura_post_id" value="<?php print get_the_ID(); ?>">
                    <?php require_once dirname(__FILE__).'/../assets/template/percentage.php'; ?>
                    <span class="close"><span></span></span>
                </form>
            </div>
            <script>
            jQuery(function($){
                $('.futura_paramet_setting_title').click(function(){
                    $("#futura_live_setting form").show('slow');
                });
            });
            </script>
        <?php endif;
    }


    function futura_related_post(){
        if($this->display_style == "footer_fixed"){
            ?>
            <div id="futura_related_posts_wrap">
                <div id="futura_text_area">
                    <?php do_action("futura_front_title"); ?>
                    <?php if(get_option('futura_payment_status') != "active"): ?>
                    <div class="futura_text_bottom_area">
                        <div class="futura_text_bottom_area_title"><?php _e( 'Related posts using FUTURA technology.', 'futura' ); ?></div>
                        <div><small>Recommended by</small></div>
                        <div><a href="https://futura.site" target="_blank"><img src="<?php print plugins_url( '/assets/images/logo-rectangle-black.svg', dirname(__FILE__) ) ; ?>" alt="Futura"></a></div>
                    </div>
                    <?php endif; ?>
                </div>
                <div id="futura_related_posts" class="futura_fixed"></div>
                <div class="close"><span></span></div>
                <?php if(get_option('futura_payment_status') == "trial"): ?>
                    <?php print futura_get_front_footer(); ?>
                <?php endif; ?>
            </div>
            <?php
        }

    }


    function futura_the_content($content){

        global $more;
        if($more == 0){return $content;}

        $post_types = Futura::get_target_post_types();
        if($this->display_style == "after_content"){
            $display_device_option = get_option('futura_displya_device');
            $html = '<div id="futura_related_after_content_wrap" class="'.$display_device_option.'">';
            $html .= apply_filters( "futura_front_title_filter" , "");
            $html .= '<div id="futura_related_posts" class="futura_after_content"></div>';
            if(get_option('futura_payment_status')  == "trial"): 
                $html .= futura_get_front_footer();
            endif;
            $html .= '</div>';

            return $content.$html;
        }else if($this->display_style == "footer_fixed"){
            $html = '<div id="futura_open_s"></div>';
            return $content.$html;
        }
        return $content;

    }

    function update_setting_front(){
        if(filter_input( INPUT_POST, 'futura_live_setting', FILTER_SANITIZE_NUMBER_INT )){
            $post_id = filter_input( INPUT_POST, 'futura_post_id', FILTER_SANITIZE_NUMBER_INT );
            $content =  filter_input( INPUT_POST, 'content_percentage', FILTER_SANITIZE_NUMBER_INT );
            $title =  filter_input( INPUT_POST, 'title_percentage', FILTER_SANITIZE_NUMBER_INT );
            $excerpt =  filter_input( INPUT_POST, 'excerpt_percentage', FILTER_SANITIZE_NUMBER_INT );
            $image =  filter_input( INPUT_POST, 'image_percentage', FILTER_SANITIZE_NUMBER_INT );
            $tag =  filter_input( INPUT_POST, 'tag_percentage', FILTER_SANITIZE_NUMBER_INT );
            $tax =  filter_input( INPUT_POST, 'tax_percentage', FILTER_SANITIZE_NUMBER_INT );
            $cf =  filter_input( INPUT_POST, 'cf_percentage', FILTER_SANITIZE_NUMBER_INT );
            $author =  filter_input( INPUT_POST, 'author_percentage', FILTER_SANITIZE_NUMBER_INT );
            $percentage_array = compact("content", "title", "excerpt", "image", "tag", "tax", "cf", "author");
            update_post_meta($post_id, 'futura_percentage_for_post', json_encode($percentage_array));
            update_post_meta($post_id, 'futura_related_posts', '');
        }
    }


    function set_percentage_params($post_id=null){
        if($post_id == null){
            $post_id = get_queried_object_id();
        }
        $percents = get_post_meta($post_id, 'futura_percentage_for_post', true);
        if($percents){
            $percents = json_decode($percents);
            $this->content_percentage =  $percents->content;
            $this->title_percentage =  $percents->title;
            $this->excerpt_percentage =  $percents->excerpt;
            $this->image_percentage =  $percents->image;
            $this->tag_percentage =  $percents->tag;
            $this->taxonomy_percentage =  $percents->tax;
            $this->custom_field_percentage =  $percents->cf;
            $this->author_percentage = $percents->author;
        }else{
            $this->content_percentage =  get_option('futura_content_percentage');
            $this->title_percentage = get_option('futura_title_percentage');
            $this->excerpt_percentage = get_option('futura_excerpt_percentage');
            $this->image_percentage =  get_option('futura_image_percentage');
            $this->tag_percentage = get_option('futura_tag_percentage');
            $this->taxonomy_percentage = get_option('futura_tax_percentage');
            $this->custom_field_percentage = get_option('futura_cf_percentage');
            $this->author_percentage = get_option('futura_author_percentage');
        }

        return;
    }


    function futura_footer(){
        $post_types = Futura::get_target_post_types();
        if(!in_array(get_post_type(), $post_types) ){return;}
        if(is_singular()==false){return;}
        $id = get_the_ID();
        $terms = Futura::get_terms($id, get_post_type());
        ?>
        <script>
        jQuery(function($){
            if($("#futura_related_posts").length == 0){
                return;
            }
            var admin_ajax_url  = '<?php echo admin_url('admin-ajax.php', __FILE__); ?>';
            $.ajax({
                type: 'POST',
                url: admin_ajax_url,
                data: {
                        'action': 'futura_ajax_get_related_post',
                        'futura_ajax_get_related_post': 1,
                        'wp_content_id': "<?php the_ID(); ?>",
                        'author': "<?php print get_the_author_meta('nickname'); ?>",
                        'wp_post_type': "<?php print get_post_type(); ?>",
                        "number_of_posts" : $('#futura_related_posts').data('numbrer_of_posts'),
                        'secure': '<?php echo wp_create_nonce('futura_ajax_get_related_post_nonce') ?>',
                },success: function(data){
                    if(data){
                        $('#futura_related_posts_wrap').addClass('futura_posts_wrap');
                        $("#futura_related_posts").html(data);
                        var ref_id = localStorage.getItem('futura_ref_id');
                        var nth = 0;
                        var is_ref_same = 0;
                        $('.futura_related_post_box').each(function(){
                            if(ref_id == $(this).attr('data-futura_id') && $(this).hasClass("futura_hide")==false){
                                $(this).addClass('futura_hide');
                                nth += 1;
                                is_ref_same = 1;
                            }else if( $(this).hasClass("futura_hide")==false){
                                nth += 1;
                            }
                        });
                        if(is_ref_same){
                            nth += 1;
                            $('#futura_related_posts .futura_hide:nth-child('+nth+')').removeClass('futura_hide');
                        }
                        $('.futura_related_post_box:eq('+(nth-1)+')').css('margin-right','0px');
                        localStorage.setItem('futura_ref_id', "<?php the_ID(); ?>");                        
                    }else{
                        $('#futura_related_after_content_wrap').css('display', 'none');$('#futura_related_posts_wrap').css('display', 'none');$('.widget.futura-related').css('display', 'none');
                    }
                },
                // error: function () {
                //     $("#futura_related_posts").text("error");
                // }
            })
        });
        </script>
        <?php
    }


    function futura_ajax_get_related_post(){
        if(filter_input( INPUT_POST, 'futura_ajax_get_related_post', FILTER_SANITIZE_STRING )){
            check_ajax_referer('futura_ajax_get_related_post_nonce','secure');
            $post_id = filter_input( INPUT_POST, 'wp_content_id', FILTER_SANITIZE_STRING );
            $related_posts = $this->get_stored_post($post_id);
            if(!empty($related_posts) && $this->is_same_model_version()){
                $is_new = 0;
                $payment_status = get_option('futura_payment_status');
            }else{
                $data = $this->make_post_data($post_id);
                $_array = json_decode($this->get_related_post($data), true);
                if(empty($_array)){
                    ?>
                    <script>jQuery(function($){$('#futura_related_after_content_wrap').css('display', 'none');$('#futura_related_posts_wrap').css('display', 'none');$('.widget.futura-related').css('display', 'none');});</script>
                    <?php die();
                }
                $related_posts = $_array["posts"];
                array_splice($related_posts, 11);
                $is_new_post = $_array["status"]["is_new_post"];
                $payment_status = $_array["status"]["payment_status"];
                update_option('futura_payment_status', $payment_status);
            }

            $ids = array();
            $post_per_page = get_option('futura_number_of_posts');

            $array = explode(",", get_post_meta($post_id, 'futura_include_post', 1));
            if(empty($related_posts)){die();}
            foreach($related_posts as $arr){
                $id = $arr[0];
                $array[] = $id;
            }
            $exclude_ids = explode(",", get_post_meta($post_id, 'futura_exclude_post', 1));
            $store = array();
            $futura_items_display = get_option('futura_items_display');
            $array = array_unique($array);
            $array = array_filter($array, 'strlen');
            if(empty($array)){
                die();
            }
            $i=0;
            foreach($array as $id){
                $id = trim($id);
                if($id == ""){continue;}
                if(in_array($id, $exclude_ids)){continue;}
                if(get_post_status($id)!="publish"){continue;}
                $store[] = $id;
                ?>
                <div class="futura_related_post_box <?php if(get_option('futura_record_setting')): print 'futura_click_record'; endif; ?> <?php if($i>=$post_per_page): print 'futura_hide'; endif; ?>" data-futura_id="<?php print $id; ?>">

                    <?php if(current_user_can('manage_options')) :?>
                            <div class="futura_remove_post" data-futura_post_id="<?php print $post_id; ?>" data-futura_remove_post="<?php print $id; ?>"><?php _e( 'Remove this post', 'futura' ); ?></div>
                    <?php endif; ?>

                    <div style="" class="futura_related_post_image <?php if(preg_match('/thumbnail_pc/', $futura_items_display)){print 'futura_pc';} ?> <?php if(preg_match('/thumbnail_sp/', $futura_items_display)){print 'futura_sp';} ?>">
                        <a href="<?php print get_the_permalink($id); ?>" <?php do_action( 'futura_maybe_add_event_tracking'); ?> data-futura_post_id="<?php print $id; ?>">
                            <?php $this->futura_thumbnail($id, "rectangle"); ?>
                        </a>
                    </div>
                    <div class="futura_related_post_text">
                        <div style="" class="title <?php if(preg_match('/title_pc/', $futura_items_display)){print 'futura_pc';} ?> <?php if(preg_match('/title_sp/', $futura_items_display)){print 'futura_sp';} ?>">
                            <a href="<?php print get_the_permalink($id); ?>" <?php do_action( 'futura_maybe_add_event_tracking'); ?> data-futura_post_id="<?php print $id; ?>"><?php do_action("futura_post_title", $id); ?></a>
                        </div>
                        <div style="" class="content <?php if(preg_match('/content_pc/', $futura_items_display)){print 'futura_pc';} ?> <?php if(preg_match('/content_sp/', $futura_items_display)){print 'futura_sp';} ?>"><?php do_action("futura_content_summary", $id, 50); ?></div>
                        <div style="" class="author <?php if(preg_match('/author_pc/', $futura_items_display)){print 'futura_pc';} ?> <?php if(preg_match('/author_sp/', $futura_items_display)){print 'futura_sp';} ?>"><?php do_action("futura_the_author", $id); ?></div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
            <?php
            if($is_new_post && current_user_can('manage_options')){
                ?><small><?php _e( 'This post is not analyzed yet.', 'futura' ); ?></small><?php
            }else{
                update_post_meta($post_id, 'futura_related_posts', implode(',', $store));
                if(current_user_can('manage_options')){
                    ?><small><?php _e( 'This post is analyzed.', 'futura' ); ?></small><?php
                }
            }
            ?>
            <script>
            jQuery(function($){
                var admin_ajax_url  = '<?php echo admin_url('admin-ajax.php', __FILE__); ?>';

                var futura_image_box_width = $('.futura_related_post_image').width();
                var futura_image_height = futura_image_box_width*3/4;
                $('.futura_related_post_image').css('height', futura_image_height+'px').css('overflow-y', 'hidden');

                $('.futura_remove_post').on('click', function(){
                    var elem = $(this);
                    var post_id = elem.data('futura_post_id');
                    var remove_post_id = elem.data('futura_remove_post');
                    $.ajax({
                        type: 'POST',
                        url: admin_ajax_url,
                        data: {
                                'action': 'futura_ajax_remove_post',
                                'futura_remove_post': 1,
                                'post_id': post_id,
                                'remove_post_id':remove_post_id,
                                'secure': '<?php echo wp_create_nonce('futura_ajax_remove_post_nonce') ?>'
                        },success: function(data){
                            elem.text(data);
                        }
                    });        

                });

                $('.futura_click_record a').on('click', function(){
                    var post_id = <?php print $post_id; ?>;
                    var target_id = $(this).data('futura_post_id');
                    $.ajax({
                        type: 'POST',
                        url: admin_ajax_url,
                        data: {
                                'action': 'futura_ajax_record_click',
                                'futura_click_record': 1,
                                'post_id': post_id,
                                'target_id':target_id,
                                'secure': '<?php echo wp_create_nonce('futura_ajax_record_click_nonce') ?>'
                        },success: function(data){
                            //console.log(data);
                        }
                    });  
                });
            });
            </script>
            <?php
        }
        die();
    }


    function make_post_data($post_id){
        $this->set_percentage_params($post_id);

        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');   
        $content_percentage = $this->content_percentage;
        $title_percentage =  $this->title_percentage;
        $excerpt_percentage =  $this->excerpt_percentage;
        $image_percentage =  $this->image_percentage;
        $tag_percentage =  $this->tag_percentage;
        $taxonomy_percentage =  $this->taxonomy_percentage;
        $custom_field_percentage =  $this->custom_field_percentage;
        $author_percentage = $this->author_percentage;            

        $tags = Futura::get_tags($post_id);
        $custom_field = Futura::get_custom_field($post_id, "related");

        if(filter_input( INPUT_POST, 'wp_post_type', FILTER_SANITIZE_STRING )){
            $post_type = filter_input( INPUT_POST, 'wp_post_type', FILTER_SANITIZE_STRING );
        }else{
            $post_type = get_post_type();
        }

        $terms = Futura::get_terms($post_id, $post_type);

        if(filter_input( INPUT_POST, 'author', FILTER_SANITIZE_STRING )){
            $author = filter_input( INPUT_POST, 'author', FILTER_SANITIZE_STRING );
        }else{
            global $post;
            $author = get_the_author_meta('nickname', $post->post_author);
        }

        $data = array(
            'user_id' => $user_id,
            'wp_content_id' => $post_id,
            'wp_post_type' => $post_type,
            'license_key' => $license_key,
            'title' => get_the_title($post_id),
            'tag' => $tags,
            'taxonomy' => $terms,
            'custom_field' => $custom_field,
            'author' => $author,

            'content_percentage' => $content_percentage,
            'excerpt_percentage' => $excerpt_percentage,
            'image_percentage' => $image_percentage,
            'tag_percentage' => $tag_percentage,
            'taxonomy_percentage' => $taxonomy_percentage,
            'custom_field_percentage' => $custom_field_percentage,
            'author_percentage' => $author_percentage,

        );
        return $data;
    }


    function get_related_post($array){
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/related_post/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }else{
            return $return["body"];
        }
    }
    

    public function futura_thumbnail($id, $type){
        if( has_post_thumbnail( $id )):
            print get_the_post_thumbnail( $id, 'medium' );
        elseif($thumbnail_url = get_option('futura_default_thumbnail')):
            ?><img src="<?php print $thumbnail_url ; ?>" alt="<?php print get_the_title($id); ?>"><?php
        else:
            ?><img src="<?php print plugins_url( '../assets/images/no-image-'.$type.'.svg', __FILE__ ) ; ?>" alt="<?php print get_the_title($id); ?>"><?php
        endif;
    }


    function get_stored_post($id){
        $id_list = get_post_meta($id, 'futura_related_posts', true);
        $id_list = preg_replace('/^,/', '', $id_list);
        $array = explode(',', $id_list);        
        if(empty($array[0])){
            return array();
        }
        $new_array = array();
        foreach($array as $id){
            $new_array[] = array($id);
        }
        return $new_array;
    }


    function is_same_model_version(){
        $stored_version = get_option('futura_stored_version');
        $check_version = get_option('futura_check_version');
        if($stored_version && $stored_version == $check_version){
            return 1;
        }
        $version = $this->get_model_version();
        if($version){
            update_option('futura_stored_version', $version);
            update_option('futura_check_version', $version);    
        }
        return 0;
    }


    function get_model_version(){
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $array = array(
            'user_id' => $user_id,
            'license_key' => $license_key,
        );

        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/model_version/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }
        $return = json_decode($return["body"], true);

        if(isset($return["response"]["error"])){
            return "";            
        }else{
            return $return["response"];
        }

    }


    function futura_related_id($atts){
        if(is_single()==false){return;}
        if(isset($atts[0])==false){
            return;
        }
        $ranks = preg_split('/,/', $atts[0]);
        $post_id = get_the_ID();

        $related_posts = $this->get_stored_post($post_id);
        if(!empty($related_posts) && $this->is_same_model_version()){
            $is_new = 0;
            $payment_status = get_option('futura_payment_status');
        }else{
            $data = $this->make_post_data($post_id);
            $_array = json_decode($this->get_related_post($data), true);
            if(empty($_array)){return;}
            $related_posts = $_array["posts"];
            array_splice($related_posts, 11);  
            $is_new = $_array["status"]["is_new_post"];      
        }

        if(empty($related_posts)){return;}
        $_tmep = array("");

        foreach($related_posts as $post){
            $_temp[] = $post[0];
        }
        $array = explode(",", get_post_meta($post_id, 'futura_include_post', 1));
        $exclude_ids = explode(",", get_post_meta($post_id, 'futura_exclude_post', 1));
        foreach($ranks as $rank){
            if(isset($_temp[$rank-1]) && in_array($_temp[$rank-1], $exclude_ids)==false){
                $array[] = $_temp[$rank-1];
            }
        }
        $array = array_unique($array);

        if($is_new==0){
            update_post_meta($post_id, 'futura_related_posts', implode(',', $array));
        }

        if(isset($atts[1]) && $atts[1]){
            $array['is_new'] = $is_new;
        }

        return json_encode($array);
        
    }
  
    function futura_sc_show_related_posts(){
        ob_start();
        ?><div id="futura_related_post_in_content"></div> <?php        
        $html = ob_get_contents();
        ob_end_clean();
        return $html;                
    }

    function futura_sc_specify_open_content(){
        ob_start();
        ?><div id="futura_open_box"></div> <?php        
        $html = ob_get_contents();
        ob_end_clean();
        return $html;                        
    }


}


