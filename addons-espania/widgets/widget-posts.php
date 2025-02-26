<?php
add_action('widgets_init', create_function('', 'return register_widget("AddonsEspaniaPostsWidget");'));

class AddonsEspaniaPostsWidget extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'description' => __('Advanced widget for displaying the recent posts or posts from the selected categories or tags.', 'espania' ) );
        $control_ops = array( 'width' => 400 );
        parent::__construct( false, __( '&raquo; [Espania] Posts', 'espania' ), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        
		echo $before_widget;
		echo $before_title; 
		echo $title;
        echo $after_title;
		
                switch ($instance['order_by']) {
                    case 'none' : $order_query = ''; break;
					case 'comment_asc' : $order_query = '&orderby=comment_count&order=ASC'; break;
                    case 'comment_desc' : $order_query = '&orderby=comment_count&order=DESC'; break;
                    case 'id_asc' : $order_query = '&orderby=ID&order=ASC'; break;
                    case 'id_desc' : $order_query = '&orderby=ID&order=DESC'; break;
                    case 'date_asc' : $order_query = '&orderby=date&order=ASC'; break;
                    case 'date_desc' : $order_query = '&orderby=date&order=DESC'; break;
                    case 'title_asc' : $order_query = '&orderby=title&order=ASC'; break;
                    case 'title_desc' : $order_query = '&orderby=title&order=DESC'; break;
                    default : $order_query = '&orderby=' . $instance['order_by'];
                    
                }
                switch ($instance['filter']) {
                    case 'cats' : $filter_query = '&cat=' . trim($instance['filter_cats']) ; break;
                    case 'category' : $filter_query = '&cat=' . trim($instance['selected_category']) ; break;
                    case 'tags' : $filter_query = '&tag=' . trim($instance['filter_tags']) ; break;
                    default : $filter_query = '';
                }
				?>
				<ul class="espania-posts-widget">
				<?php
                query_posts('posts_per_page=' . $instance['posts_number'] . $filter_query . $order_query);
                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li class="clearfix">
                        <?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( $instance['featured_image_width'], $instance['featured_image_height'] ), array( "class" => $instance['featured_image_align'] ) ); ?></a> <?php } ?>
                        <?php if ( $instance['display_title'] ) { ?> <h6 class="posts-widgettitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6><?php } ?>
                        <?php
                            if( $instance['display_date'] || $instance['display_author'] || $instance['display_comments'] ) {
                                ?><div class="posts-widget-meta"><?php 
                                    if($instance['display_date'] ) {
                                       echo get_the_date();
                                    }
                                    if($instance['display_author']) {
                                       echo ' '; _e('By', 'themater'); echo ' '; the_author();
                                    } 
									if($instance['display_comments']) {
                                       echo ' '; comments_number( 'With 0 comments', 'With 1 comment', 'With % comments' );
                                    } ?>
                                </div><?php 
                            }
                            if($instance['display_content'] || $instance['display_read_more']) {
                                ?><div class="posts-widget-entry"><?php 
                                    if($instance['display_content'] ) {
                                        if($instance['content_type'] == 'the_content') {
                                            the_content("");
                                        } else {
                                            $get_the_excerpt_length = $instance['excerpt_length'] ? $instance['excerpt_length'] : 16;
                                            echo espania_shorten( get_the_excerpt(), $get_the_excerpt_length );
                                        }
                                    }
                                    
                                    if($instance['display_read_more']) {
                                        ?> <a class="posts-widget-more" href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permalink to ', 'themater' ); the_title_attribute(); ?>"><?php _e('Read More &raquo;','themater'); ?></a><?php 
                                    }?>
                                </div><?php
                            }
                        ?>
                    </li>
					
                <?php
                endwhile; 
                endif;
                wp_reset_query();
				?>
				</ul>
				
		<?php		
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {	
    	$instance = $old_instance;
		$params = array( 'title', 'posts_number', 'order_by', 'display_title', 'display_date', 'display_author', 'display_comments', 'content_type', 'display_content', 'display_featured_image', 'display_read_more', 'excerpt_length', 'featured_image_width', 'featured_image_height', 'featured_image_align', 'filter', 'filter_cats', 'selected_category', 'filter_tags' );
		foreach ( $params as $k ) {
			$instance[$k] = strip_tags( $new_instance[$k] );
		}
        return $instance;
    }
    
    function form($instance) {	
		$defaults = array(
			'title' => 'Recent Posts',
			'posts_number' => '5',
			'order_by' => 'none',
			'display_title' => 'true',
			'display_date' => 'true',
			'display_author' => 'true',
			'display_comments' => 'true',
			'display_content' => 'true',
			'display_featured_image' => 'true',
			'display_read_more' => 'true',
			'content_type' => 'the_excerpt',
			'excerpt_length' => '26',
			'featured_image_width' => '90',
			'featured_image_height' => '60',
			'featured_image_align' => 'alignleft',
			'filter' => 'recent',
			'filter_cats' => '',
			'filter_tags' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
        
        ?>
        
        <div class="espania-widget">
            <table width="100%">
                <tr>
                    <td class="espania-widget-label" width="25%"><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content" width="75%"><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                </tr>
                
                <tr>
                    <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('posts_number'); ?>"><?php _e( 'Number Of Posts:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('posts_number'); ?>" name="<?php echo $this->get_field_name('posts_number'); ?>" type="number" value="<?php echo esc_attr($instance['posts_number']); ?>" /></td>
                </tr>
                
                <tr>
                    <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('order_by'); ?>"><?php _e( 'Order Posts By:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content">
                        <select id="<?php echo $this->get_field_id('order_by'); ?>" name="<?php echo $this->get_field_name('order_by'); ?>">
                            <option value="none" <?php selected('none', $instance['order_by']); ?> ><?php _e( 'None (Default)', 'espania' ); ?></option>
							<option value="comment_asc" <?php selected('comment_asc', $instance['order_by']); ?> ><?php _e( 'Comment Count ( Ascending )', 'espania' ); ?></option>
                            <option value="comment_desc" <?php selected('comment_desc', $instance['order_by']); ?> ><?php _e( 'Comment Count ( Descending )', 'espania' ); ?></option>
                            <option value="id_asc" <?php selected('id_asc', $instance['order_by']); ?> ><?php _e( 'ID ( Ascending )', 'espania' ); ?></option>
                            <option value="id_desc" <?php selected('id_desc', $instance['order_by']); ?> ><?php _e( 'ID ( Descending )', 'espania' ); ?></option>
                            <option value="date_asc" <?php selected('date_asc', $instance['order_by']); ?>><?php _e( 'Date ( Ascending )', 'espania' ); ?></option>
                            <option value="date_desc" <?php selected('date_desc', $instance['order_by']); ?>><?php _e( 'Date ( Descending )', 'espania' ); ?></option>
                            <option value="title_asc" <?php selected('title_asc', $instance['order_by']); ?>><?php _e( 'Title ( Ascending )', 'espania' ); ?></option>
                            <option value="title_desc" <?php selected('title_desc', $instance['order_by']); ?>><?php _e( 'Title ( Descending )', 'espania' ); ?></option>
                            <option value="rand" <?php selected('rand', $instance['order_by']); ?>><?php _e( 'Random', 'espania' ); ?></option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td class="espania-widget-label"><?php _e( 'Display Elements:', 'espania' ); ?></td>
                    <td class="espania-widget-content">
                        <input type="checkbox" id="<?php echo $this->get_field_id('display_title'); ?>" name="<?php echo $this->get_field_name('display_title'); ?>"  <?php checked('true', $instance['display_title']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_title'); ?>"><?php _e( 'Post Title', 'espania' ); ?></label>
                        <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_date'); ?>" name="<?php echo $this->get_field_name('display_date'); ?>"  <?php checked('true', $instance['display_date']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_date'); ?>"><?php _e( 'Date', 'espania' ); ?></label>
                        <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_author'); ?>" name="<?php echo $this->get_field_name('display_author'); ?>"  <?php checked('true', $instance['display_author']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_author'); ?>"><?php _e( 'Author', 'espania' ); ?></label>
                        <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_comments'); ?>" name="<?php echo $this->get_field_name('display_comments'); ?>"  <?php checked('true', $instance['display_comments']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_comments'); ?>"><?php _e( 'Comments', 'espania' ); ?></label>
					    <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_content'); ?>" name="<?php echo $this->get_field_name('display_content'); ?>"  <?php checked('true', $instance['display_content']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_content'); ?>"><?php _e( 'The Content / The Excerpt', 'espania' ); ?></label>
                        <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_featured_image'); ?>" name="<?php echo $this->get_field_name('display_featured_image'); ?>"  <?php checked('true', $instance['display_featured_image']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_featured_image'); ?>"><?php _e( 'Thumbnail', 'espania' ); ?></label>
                        <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_read_more'); ?>" name="<?php echo $this->get_field_name('display_read_more'); ?>"  <?php checked('true', $instance['display_read_more']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_read_more'); ?>"><?php _e( '"Read More" Link', 'espania' ); ?></label>
                    </td>
                </tr>
                
                <tr>
                    <td class="espania-widget-label"><?php _e( 'Content Type:', 'espania' ); ?></td>
                    <td class="espania-widget-content">
                        <input type="radio" name="<?php echo $this->get_field_name('content_type'); ?>" <?php checked('the_content', $instance['content_type']); ?> value="the_content" /> <?php _e( 'The Content', 'espania' ); ?><br />
                        <input type="radio" name="<?php echo $this->get_field_name('content_type'); ?>" <?php checked('the_excerpt', $instance['content_type']); ?> value="the_excerpt" /> <?php _e( 'The Excerpt', 'espania' ); ?> &nbsp; <label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e( 'Length:', 'espania' ); ?></label> <input style="width: 40px;" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" type="text" value="<?php echo esc_attr($instance['excerpt_length']); ?>" /> <span class="tt-widget-help"><?php _e( 'words', 'espania' ); ?></span>
                    </td>
                </tr>
                
                <tr>
                    <td class="espania-widget-label"><?php _e( 'Thumbnail:', 'espania' ); ?></td>
                    <td class="espania-widget-content">
                        <label for="<?php echo $this->get_field_id('featured_image_width'); ?>"><?php _e( 'Width:', 'espania' ); ?></label> <input type="text" style="width: 40px;" id="<?php echo $this->get_field_id('featured_image_width'); ?>" name="<?php echo $this->get_field_name('featured_image_width'); ?>" value="<?php echo esc_attr($instance['featured_image_width']); ?>" /> 
						 &nbsp; <label for="<?php echo $this->get_field_id('featured_image_height'); ?>"><?php _e( 'Height:', 'espania' ); ?></label> <input type="text" style="width: 40px;" id="<?php echo $this->get_field_id('featured_image_height'); ?>" name="<?php echo $this->get_field_name('featured_image_height'); ?>" value="<?php echo esc_attr($instance['featured_image_height']); ?>"  />  
                         &nbsp; <label for="<?php echo $this->get_field_id('featured_image_align'); ?>"><?php _e( 'Float:', 'espania' ); ?></label> <select id="<?php echo $this->get_field_id('featured_image_align'); ?>" name="<?php echo $this->get_field_name('featured_image_align'); ?>" style="width:70px;">
                            <option value="alignleft" <?php selected('alignleft', $instance['featured_image_align']); ?> ><?php _e( 'Left', 'espania' ); ?></option>
                            <option value="alignright"  <?php selected('alignright', $instance['featured_image_align']); ?>><?php _e( 'Right', 'espania' ); ?></option>
                            <option value="aligncenter" <?php selected('aligncenter', $instance['featured_image_align']); ?>><?php _e( 'Center', 'espania' ); ?></option>
                        </select>
                    </td>
                </tr>
            
                <tr>
                    <td class="espania-widget-label"><?php _e( 'Filter:', 'espania' ); ?></td>
                    <td class="espania-widget-content" style="padding-top: 5px;">
                        <input type="radio" name="<?php echo $this->get_field_name('filter'); ?>" <?php checked('recent', $instance['filter']); ?> value="recent" /> <?php _e( 'Show Recent Posts', 'espania' ); ?><br /><br />
                       
                        <input type="radio" name="<?php echo $this->get_field_name('filter'); ?>" <?php checked('category', $instance['filter']); ?> value="category" /> <?php _e( 'Show Posts from a sinle category:', 'espania' ); ?><br />
                        <select name="<?php echo $this->get_field_name('selected_category'); ?>">
                        <?php
                            $categories = get_categories('hide_empty=0');
                            foreach ($categories as $category) {
                                $category_selected = $this->get_field_name('selected_category') == $category->cat_ID ? ' selected="selected" ' : '';
                                ?>
                                <option value="<?php echo $category->cat_ID; ?>" <?php selected($category->cat_ID, $instance['selected_category']); ?> ><?php echo $category->cat_name; ?></option>
                                <?php
                            }
                        ?>
                        </select>
                        <br /><br />
                        
                        <input type="radio" name="<?php echo $this->get_field_name('filter'); ?>" <?php checked('cats', $instance['filter']); ?> value="cats" /> <label for="<?php echo $this->get_field_id('filter_cats'); ?>"><?php _e( 'Show posts from selected categories:', 'espania' ); ?></label>
                        <br /><span class="espania-widget-help"><?php _e( 'Category IDs ( e.g: 5,9,24 )', 'espania' ); ?></span>
                        <br /><input class="widefat" id="<?php echo $this->get_field_id('filter_cats'); ?>" name="<?php echo $this->get_field_name('filter_cats'); ?>" type="text" value="<?php echo esc_attr($instance['filter_cats']); ?>" />
                        
                        <br /><br /><input type="radio" name="<?php echo $this->get_field_name('filter'); ?>" <?php checked('tags', $instance['filter']); ?> value="tags" /> <label for="<?php echo $this->get_field_id('filter_tags'); ?>"><?php _e( 'Show only posts tagged with:', 'espania' ); ?></label>
                        <br /><span class="espania-widget-help"><?php _e( 'Tag slugs ( e.g: computer,news,business-news )', 'espania' ); ?></span>
                        <br /><input class="widefat" id="<?php echo $this->get_field_id('filter_tags'); ?>" name="<?php echo $this->get_field_name('filter_tags'); ?>" type="text" value="<?php echo esc_attr($instance['filter_tags']); ?>" />
                        
                    </td>
                </tr>
                
            </table>
          </div>
        <?php 
    }
} 
?>