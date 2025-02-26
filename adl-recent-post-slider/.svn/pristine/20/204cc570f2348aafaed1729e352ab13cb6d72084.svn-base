<?php


add_action('admin_init', 'adl_rec_post_admin_init');
function adl_rec_post_admin_init( ){
    add_action('admin_head-edit.php', 'adl_rec_post_admin_head'); // add script to admin head
    add_filter('current_screen', 'adl_rec_post_current_screen');
    // add featured post colums
    add_filter('manage_post_posts_columns', 'adl_rec_post_manage_posts_columns');
    add_action('manage_post_posts_custom_column', 'adl_rec_post_manage_posts_custom_columns', 10, 2);
}

function adl_rec_post_manage_posts_columns( $columns ) {
    //add new column name 'featured'
    $columns['featured'] = __('Featured', A_RCP_TEXTDOMAIN);
    return $columns;
    
}

function adl_rec_post_manage_posts_custom_columns($column_name, $post_id) {
    // display data for custom column named 'featured'.
    switch($column_name){
        case 'featured':
            $is_featured = get_post_meta($post_id, '_is_featured', true);
            $class = "dashicons ";
            $text = "";
            if ($is_featured == "yes") {
                $class.= " dashicons-star-filled";
                $text = "";
            } else {
                $class.= " dashicons-star-empty";
            }
            echo "<a href=\"#a-rcp-featured-posts-toggle\" class=\"a-rcp-featured-post-toggle {$class}\" data-post-id=\"{$post_id}\">$text</a>";

        break;


        default:
            break;

    }
}


// count total featured post
function a_rcp_total_featured() {
    $result = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_is_featured',
                'value' => 'yes'
            )
        ) ,
        'posts_per_page' => 1
    ));
    wp_reset_postdata();
    wp_reset_query();
    $totalFeaturedPosts = $result->found_posts;
    unset($result);
    return $totalFeaturedPosts;
}

function adl_rec_post_current_screen($screen) {
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return $screen;
    }
    add_filter('views_edit-post', 'adl_rpost_featured_post_counts_display');
    return $screen;
}

// show featured post counts on admin screen post screen
function adl_rpost_featured_post_counts_display($views) {
    $post_type = ((isset($_GET['post_type']) && $_GET['post_type'] != "") ? $_GET['post_type'] : 'post');
    $count = a_rcp_total_featured($post_type);

    $views['featured_post'] = "<p id=\"a-rcp-featured-post-filter\" >Published Featured Posts <span class=\"count\">({$count})</span></p>";
    return $views;
}





function adl_rec_post_admin_head() {
    $apsAjaxLoader = A_RCP_PLUGIN_URI .'/css/ajax-loader.gif';
?>
    <script type="text/javascript">
		jQuery(document).ready(function($){
			$('.a-rcp-featured-post-toggle').on("click",function(e){
				e.preventDefault();
				var _el=$(this);
				var post_id=_el.data('post-id');
				var data={action:'toggle_featured_post',post_id:post_id};
				var ajaxLoader = '<img src="<?php echo $apsAjaxLoader;?>" alt="ajax" width="20px" height="20px">';
				$.ajax({
				    url:ajaxurl,
				    data:data,
				    type:'post',
                    beforeSend: function()
                    {
                        _el.removeClass('dashicons-star-filled').removeClass('dashicons-star-empty');
                        _el.html(ajaxLoader);
                    },
					dataType:'json',
					success:function(data){
                        _el.html('');
                        $("#a-rcp-featured-post-filter span.count").text("("+data.total_featured+")");
                        if(data.featured_status=="yes"){
                            _el.addClass('dashicons-star-filled');
                        }else{
                            _el.addClass('dashicons-star-empty');
                        }
					}

				});
			});
		});
		</script>
<?php
}

if ( !function_exists('toggle_featured_post') ) {

    function toggle_featured_post() {
        header('Content-Type: application/json');
        $post_id = $_POST['post_id'];
        $is_featured = get_post_meta($post_id, '_is_featured', true);
        $toggleStatus = ('yes' == $is_featured) ? 'no' : 'yes';
        delete_post_meta($post_id, '_is_featured');
        add_post_meta($post_id, '_is_featured', $toggleStatus);
        echo json_encode(array(
            'ID' => $post_id,
            'featured_status' => $toggleStatus,
            'total_featured' => a_rcp_total_featured()
        ));
        die();
    }
}

add_action('wp_ajax_toggle_featured_post', 'toggle_featured_post');

