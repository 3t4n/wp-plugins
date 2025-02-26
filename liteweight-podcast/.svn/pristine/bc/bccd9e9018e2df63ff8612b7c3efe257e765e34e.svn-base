<?php
namespace PDP\PostType;

class Podcast{
    protected static $_instance = null;
    protected $post_type = 'podcast';

    /**
     * construct function
     */
    public function __construct(){
        add_action('init', [$this, 'init']);
        if ( is_admin() ) {
            add_filter( 'post_row_actions', [$this, 'pdp_remove_row_actions'], 10, 2 );
            add_action('edit_form_after_title', [$this, 'pdp_shortcode_area']);
            add_filter('manage_podcast_posts_columns', [$this, 'pdp_columns_head_only_podcast'], 10);
            add_action('manage_podcast_posts_custom_column', [$this, 'pdp_columns_content_only_podcast'], 10, 2);
            // add_filter('post_updated_messages', [$this, 'pdp_updated_messages']);

            add_action('admin_head-post.php', [$this, 'pdp_hide_publishing_actions']);
            add_action('admin_head-post-new.php', [$this, 'pdp_hide_publishing_actions']);	
            // add_filter( 'gettext', [$this, 'pdp_change_publish_button'], 10, 2 );
            
            add_filter( 'filter_block_editor_meta_boxes', [$this, 'remove_metabox'] );
            add_action('use_block_editor_for_post', [$this, 'forceGutenberg'], 10, 2);

            
            
        }
    }

    /**
     * Create instance function
     */
    public static function instance(){
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * init
     */
    public function init(){
        register_post_type( 'podcast',
            array(
                'labels' => array(
                        'name' => __( 'Podcasts'),
                        'singular_name' => __( 'Programs' ),
                        'add_new' => __( 'Add new program' ),
                        'add_new_item' => __( 'Add new Program' ),
                        'edit_item' => __( 'Edit' ),
                        'new_item' => __( 'New' ),
                        'view_item' => __( 'View' ),
                        'search_items'       => __( 'Search'),
                        'not_found' => __( 'Sorry, we couldn\'t find any item you are looking for.' )
                ),
            'public' => false,
            'show_ui' => true, 									
            // 'publicly_queryable' => true,
            // 'exclude_from_search' => true,
            'show_in_rest' => true,
            'menu_position' => 14,
            'menu_icon' => 'dashicons-microphone',
            'has_archive' => false,
            'hierarchical' => false,
            'capability_type' => 'page',
            'rewrite' => array( 'slug' => 'podcast' ),
            'supports' => array('title', 'editor'),
            'template' => [
                ['pdp/podcast']
            ],
            'template_lock' => 'all',
            )
        );

        // $labels = array(
        //     'name' => _x( 'Speakers', 'taxonomy general name' ),
        //     'singular_name' => _x( 'Speaker', 'taxonomy singular name' ),
        //     'search_items' =>  __( 'Search speaker' ),
        //     'all_items' => __( 'All speaker' ),
        //     'parent_item' => __( 'Parent ' ),
        //     'parent_item_colon' => __( 'Parent :' ),
        //     'edit_item' => __( 'Edit ' ), 
        //     'update_item' => __( 'Update ' ),
        //     'add_new_item' => __( 'Add New ' ),
        //     'new_item_name' => __( 'New ' ),
        //     'menu_name' => __( 'Speakers' ),
        //   );    
         
        // // Now register the taxonomy
         
        //   register_taxonomy('speaker',array('podcast'), array(
        //     'hierarchical' => true,
        //     'labels' => $labels,
        //     'show_ui' => true,
        //     'show_admin_column' => true,
        //     'query_var' => true,
        //     'rewrite' => array( 'slug' => 'speaker' ),
        //   ));
    }

    /**
     * Remove Row
     */
    function pdp_remove_row_actions( $idtions ) {
        global $post;
        if( $post->post_type == 'podcast') {
            unset( $idtions['view'] );
            unset( $idtions['inline hide-if-no-js'] );
        }
        return $idtions;
    }

    function pdp_shortcode_area(){
        global $post;	
        if($post->post_type== $this->post_type){
        ?>	
        <div class="pdp_playlist_shortcode">
                <div class="shortcode-heading">
                    <div class="icon"><span class="dashicons dashicons-format-audio"></span> <?php _e("WP Podcast", "pdp") ?></div>
                    <div class="text"> <a href="https://bplugins.com/support/" target="_blank"><?php _e("Supports", "pdp") ?></a></div>
                </div>
                <div class="shortcode-left">
                    <h3><?php _e("Shortcode", "pdp") ?></h3>
                    <p><?php _e("Copy and paste this shortcode into your posts, pages and widget:", "pdp") ?></p>
                    <div class="shortcode" selectable>[podcast id='<?php echo esc_attr($post->ID); ?>']</div>
                </div>
                <div class="shortcode-right">
                    <h3><?php _e("Template Include", "pdp") ?></h3>
                    <p><?php _e("Copy and paste the PHP code into your template file:", "pdp"); ?></p>
                    <div class="shortcode">&lt;?php echo do_shortcode('[podcast id="<?php echo esc_html($post->ID); ?>"]');
                    ?&gt;</div>
                </div>
            </div>
        <?php   
        }
    }
    
    // CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
    function pdp_columns_head_only_podcast($defaults) {
        unset($defaults['date']);
        $defaults['shortcode'] = 'ShortCode';
        $defaults['date'] = 'Date';
        return $defaults;
    }

    function pdp_columns_content_only_podcast($column_name, $post_ID) {
        if ($column_name == 'shortcode') {
            echo '<div class="pdp_front_shortcode"><input style="text-align: center; border: none; outline: none; background-color: #1e8cbe; color: #fff; padding: 4px 10px; border-radius: 3px;" value="[podcast id='. esc_attr($post_ID) . ']" ><span class="htooltip">Copy To Clipboard</span></div>';
        }
    }
    
    function pdp_updated_messages( $messages ) {
        $messages[$this->post_type][1] = __('Player updated ');
        return $messages;
    }

    public function pdp_hide_publishing_actions(){
        global $post;
        if($post->post_type == $this->post_type){
            echo '
                <style type="text/css">
                    #misc-publishing-actions,
                    #minor-publishing-actions{
                        display:none;
                    }
                </style>
            ';
        }
    }

    public function forceGutenberg($use, $post)
    {
        if ($this->post_type === $post->post_type) {
            $isGutenberg = get_post_meta($post->ID, 'isGutenberg', true);

            // $pluginUpdated = 1629003686;
            // $publishDate = get_the_date('U', $post);
            // $currentDate = 1632486464;

            $gutenberg = get_option('pdp_option', ['pdp_gutenberg_enable' => true]);
            if(isset($gutenberg['pdp_gutenberg_enable'])){
                $gutenberg = (boolean) $gutenberg['pdp_gutenberg_enable'];
            }else {
                $gutenberg = true;
            }

            if($gutenberg){
                if($post->post_status == 'auto-draft' ){
                    update_post_meta($post->ID, 'isGutenberg', true);
                    return true;
                }
                if($isGutenberg){
                    return true;
                }else {
                    remove_post_type_support($this->post_type, 'editor');
                    return false;
                }
                return $use;
            }else {
                if($isGutenberg){
                    return true;
                }else {
                    remove_post_type_support($this->post_type, 'editor');
                    return false;
                }
            }
        }

        return $use;
    }

    function remove_metabox($metaboxs) {
        global $post;
        $screen = get_current_screen();

        if($screen->post_type === $this->post_type){
            return false;
        }
        return $metaboxs;
    }

    function pdp_change_publish_button( $translation, $text ) {
        if ( $this->post_type == get_post_type())
        if ( $text == 'Publish' )
            return 'Save';
        return $translation;
    }

    // public static function createBlock($id){
    //     //shares
    //     $shares = [
    //         '_pdp_facebook' => 'facebook',
    //         '_pdp_twitter' => 'twitter',
    //         '_pdp_linkedin' => 'linkedin',
    //         '_pdp_pinterest' => 'pinterest',
    //         '_pdp_stumbleupon' => 'stumbleupon',
    //         '_pdp_whatsapp' => 'whatsapp',
    //         '_pdp_email' => 'email',
    //     ];
    //     $newShares = [];
    //     foreach($shares as $key => $value){
    //         if(get_post_meta($id, $key, true) == 'on'){
    //             array_push($newShares, $value);
    //         }
    //     }

    //     //podcasts
    //     $podcasts = get_post_meta($id, '_pdp_re_', true);
    //     $newPodcasts = [];
    //     foreach($podcasts as $podcast){
    //         array_push($newPodcasts, [
    //             'title' => $podcast['_pdp_title'] ?? '',
    //             'audio' => $podcast['_pdp_audio']['url'] ?? '',
    //             'image' => $podcast['_pdp_image']['url'] ?? ''
    //         ]);
    //     }

    //     //controls 
    //     $controls = [
    //         'play' => true,
    //         'progress' => true,
    //         'current-time' => true,
    //         'mute' => true,
    //         'volume' => true,
    //         'settings' => get_post_meta($id, '_pdp_setting_button', true) !== 'on' ? true : false,
    //         'download' => get_post_meta($id, '_pdp_download_button', true) !== 'on' ? true : false
    //     ];

    //     return [
    //         'podcasts' => $newPodcasts, 
    //         'shares' => $newShares,
    //         'controls' => $controls,
    //         'theme' => get_post_meta($id, '_pdp_player_theme', true) == 'dark' ? 'dark' : 'light',
    //         'featureImage' => get_post_meta($id, '_pdp_disable_image', true) == 'on' ? false : true,
    //         'loop' => get_post_meta($id, '_pdp_audio_repeat', true) == 'once' ? false : true,
    //         'showLabel' => get_post_meta($id, '_pdp_social_label', true) == 'on' ? true : false,
    //         'showCount' => get_post_meta($id, '_pdp_social_count', true) == 'on' ? true : false,
    //         'share' => get_post_meta($id, '_pdp_disable_social', true) == 'on' ? false : true,
    //     ];
    // }
}
Podcast::instance();

// <!-- wp:shortcode -->
// [podcast id=3541]
// <!-- /wp:shortcode -->

// <!-- wp:pdp/podcast {"podcasts":[{"title":"title","audio":"http://localhost/freemius/wp-content/uploads/2021/04/বাবা-মানে-হাজার-বিকেল.mp3","image":"http://localhost/freemius/wp-content/plugins/liteweight-podcast/dist/img/default.png"}],"controls":{"play":true,"progress":true,"current-time":true,"mute":true,"volume":true,"settings":true,"downlaod":true,"Progress":true,"download":true}} /-->

// <!-- wp:pdp/podcast {"podcasts":[{"title":"titled","audio":"audio","image":"http://localhost/freemius/wp-content/plugins/liteweight-podcast/dist/img/default.png"}],"controls":{"play":true,"progress":true,"current-time":true,"mute":true,"volume":true,"settings":false,"downlaod":true,"download":true},"theme":"dark","featureImage":true,"loop":true,"showLabel":true,"showCount":true,"shares":["whatsapp","email"]} /-->
// add_action('init', function(){
//     echo $currentDate = current_time( 'U');
// });

// add_action('init', function(){
//     echo date( 'd, M Y', '1632586464' );
// });
