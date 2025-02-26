<?php
/*
 * Plugin Name: Advanced FAQ Creator by Category 
 * Plugin URI:
 * Description:  FAQ plugin that lets you create, organize and publicize your FAQs (frequently asked questions) in no time through your WordPress admin panel. Select from multiple responsive FAQ layouts and styles. Modern accordion style layout that fits into any site.
 * Version: 1.2
 * Author: wp-buy
 * Text Domain: advanced-faq-creator-by-category
 * Domain Path: /languages
 * Author URI:
 * License: GPL2
 */

//---------------------------------------------------------------------------------------------
//Load plugin textdomain to load translations
//---------------------------------------------------------------------------------------------
function codepressfaq_free_load_textdomain() {
  load_plugin_textdomain( 'advanced-faq-creator-by-category', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'codepressfaq_free_load_textdomain' );
//--------------------------------------------------------------------------------------------
define( 'AFAQCBC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AFAQCBC_PLUGIN_URL', plugin_dir_url(__FILE__) );

require_once( AFAQCBC_PLUGIN_DIR . '/control/controls-functions.php' );


require_once( AFAQCBC_PLUGIN_DIR . '/inc/getShortCode.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/autocomplete-search.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/modall.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/query.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/category-font-awesome.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/customTaxonomies.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/TaxonomiesImage.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/customPost.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/general-options.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/dashboard-and-admin-menu.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/assets.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/selectSlide.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/preview.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/shortCode.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/get-shortcode-cat.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/like-dislike.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/pubicSittingQuestion.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/like-dislike-options.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/search-options.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/category-options.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/question-options.php' );
require_once( AFAQCBC_PLUGIN_DIR . '/inc/css_custom-options.php' );

/*
* انشاء صفحة ووضع شورت كودعرض الكاتيقوري مع اسئلتها
* يتم استدعاء هذه الفنقشن عند تفعيل البلقن 
*/
if( ! function_exists( 'AFAQCBC_q_a_faq_activation_plugin' ) ) {
    function AFAQCBC_q_a_faq_activation_plugin()
    {
        if (is_admin() && !get_option('faq_cat_page')) {
            $my_post = array(
                'post_title' => wp_strip_all_tags('FAQ by category'),
                'post_content' => '[faq_by_category]',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_type' => 'page',
            );
            $page_id = wp_insert_post($my_post);
            add_option('faq_cat_page', $page_id);
            add_option('allow_rating_faq', 1);
            add_option('on_UNINSTALL_REMOVE_ALL_DATA', 2);
            add_option('empty_faq_message', 'This FAQ is empty!');
        }
    }

    register_activation_hook(__FILE__, 'AFAQCBC_q_a_faq_activation_plugin');
}
/*
* في لوحة تحكم الإداره داخل صفحة الاسئلة انشاء فلتره للأسئلة عن طريق إظهار الأسئلة الخاصه بفاق معين او كاتيقوري معينه وموضعها اعلى الجدول الخاص بعرض الاسئلة في لوحة التحكم
*/
if( ! function_exists( 'AFAQCBC_q_a_faq_filter_cars_by_taxonomies' ) ) {
    function AFAQCBC_q_a_faq_filter_cars_by_taxonomies($post_type, $which)
    {

        if ('question' !== $post_type)
            return;

        $taxonomies = array('faqs', 'faqscategory');

        foreach ($taxonomies as $taxonomy_slug) {

            $taxonomy_obj = get_taxonomy($taxonomy_slug);
            $taxonomy_name = $taxonomy_obj->labels->name;
            $terms = get_terms($taxonomy_slug);
            ?>
            <select name='<?php echo esc_attr($taxonomy_slug); ?>' id='<?php echo esc_attr($taxonomy_slug); ?>'
                    class='postform'>";
                <option value=""><?php sprintf(esc_attr__('Show All %s', 'advanced-faq-creator-by-category'), $taxonomy_name); ?></option>
                <?php foreach ($terms as $term) {
                    printf(
                        '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
                        $term->slug,
                        ((isset($_GET[$taxonomy_slug]) && ($_GET[$taxonomy_slug] == $term->slug)) ? ' selected="selected"' : ''),
                        $term->name,
                        $term->count
                    );
                } ?>
            </select>
            <?php
        }

    }

    add_action('restrict_manage_posts', 'AFAQCBC_q_a_faq_filter_cars_by_taxonomies', 10, 2);
}

/*
* استدعاء ملف جافا سكربت داخل منطقة الفاقس او التصنيفات التابعه للفاق
*/
if( ! function_exists( 'AFAQCBC_q_a_faq_pu_set_open_menu' ) ) {
    add_action('admin_head', 'AFAQCBC_q_a_faq_pu_set_open_menu');
    function AFAQCBC_q_a_faq_pu_set_open_menu()
    {
        $screen = get_current_screen();
        if ($screen->taxonomy == 'faqs' || $screen->taxonomy == 'faqscategory') {
            wp_enqueue_script('open-menu-parent', plugins_url('assets/js/admin_menu.js', __FILE__), array('jquery'));
        }
    }
}




/*
*  لجلب الصورة الخاصه للتصنيف في كل التيمبليت
*/
if( ! function_exists( 'AFAQCBC_get_category_image' ) ) {
    function AFAQCBC_get_category_image($term_id, $col = 12)
    {
        $image_id = get_term_meta($term_id, 'showcase-taxonomy-image-id', true);
        if ($col == 12) {
            $image_size = 'large';
        } else if ($col == 6) {
            $image_size = 'medium_large';
        } else {
            $image_size = 'medium';
        }
        $img = wp_get_attachment_image_src(absint($image_id), $image_size);
        return $img['0'];
    }
}

/*
*  لوضع اسم الفاق والكاتيقوري فوق اسم السؤال لما تدوس على اقرأ المزيد
*/
if( ! function_exists( 'AFAQCBC_q_a_faq_title_update' ) ) {
    function AFAQCBC_q_a_faq_title_update($title, $id = null)
    {
        if ($id != null) {
            //$post_type = get_post_type($id);
            $post = get_post($id);
            $post_id = get_the_id();
            if ($post instanceof WP_Post && $post->post_type == 'question' && is_single() && $post_id == $id) {
                $new_title = '<div id="befor_title_faqs"></div>';
                $new_title .= $title;
                return $new_title;
            }
        }
        return $title;
    }

    add_filter('the_title', 'AFAQCBC_q_a_faq_title_update', 10, 2);
}
/*
* لتخزين الكوكيز الخاص ب اسم الفاق والكاتيقوري الخاصه به حتى يتم عرضها اعلى الإسم للسؤال بإستخدام الفنقشن الي فوقها
*/

if( ! function_exists( 'AFAQCBC_hook_javascript' ) ) {
    function AFAQCBC_hook_javascript()
    {
        if (is_single()) {
            ?>
            <script type="text/javascript">
                var cookies_val = JSON.parse(AFAQCBC_getCook("q_<?php echo esc_js(get_the_id());?>"));
            
                if (cookies_val != null) {
                    $("#befor_title_faqs").html("<ul><li><a href='" + cookies_val.link_url + "'>" + cookies_val.faq_name + "</a></li><li><a href='<?php echo get_page_link(get_option('faq_cat_page'));?>?faq_id=" + cookies_val.faq_id + "&cat_id=" + cookies_val.cat_id + "'>" + cookies_val.cat_name + "</a></li></ul>");
                }

                function AFAQCBC_getCook(name) {
                    var nameEQ = encodeURIComponent(name) + "=";
                    var ca = document.cookie.split(';');
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
                    }
                    return null;
                }

            </script>
            <?php
        }
    }

    add_action('wp_footer', 'AFAQCBC_hook_javascript');

}








function AFAQCBC_filter_action_links( $links ) { 
	$links['settings'] = sprintf('<a href="%s">%s</a>', admin_url( 'admin.php?page=faqs_dashboard' ), __( 'Dashboard', 'advanced-faq-creator-by-category' )); 
	return $links;
}


add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'AFAQCBC_filter_action_links', 10, 1 );
