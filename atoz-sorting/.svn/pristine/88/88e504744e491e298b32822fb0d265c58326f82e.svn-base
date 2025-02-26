<?php
/*
Plugin Name: AtoZ Sorting
Description: A simple plugin to sort your posts by "A to Z", i.e. Alphabetically. It supports regular posts as well as Custom_Post_Type. You can also control the number of posts to display and order them in different ways.
Version: 1.1
Author: Solaiman Sadek
Author URI: http://solaimansadek.blogspot.com/
*/


function atoz_sorting_function($atts){

            extract(shortcode_atts(array(
            	'post_type'  => 'post',
            	'number'     => '15',
            	'order_by'   => 'title',
				'order'      => 'ASC',
            ), $atts));

            // check what order by method user selected
			switch ($order_by) {
				case 'date':
					$order_by = 'post_date';
					break;
				case 'title':
					$order_by = 'title';
					break;
				case 'popular':
					$order_by = 'comment_count';
					break;
				case 'random':
					$order_by = 'rand';
					break;
			}

			// check what order method user selected (DESC or ASC)
			switch ($order) {
				case 'DESC':
					$order = 'DESC';
					break;
				case 'ASC':
					$order = 'ASC';
					break;
			}

            $first_char = $_GET['letter'];
            $all_link = get_page_link(); ?>

            <div class="atoz_sorting_style">
                <ul>
                    <li><a href="<?php echo $all_link; ?>">All</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=A">A</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=B">B</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=C">C</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=D">D</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=E">E</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=F">F</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=G">G</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=H">H</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=I">I</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=J">J</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=K">K</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=L">L</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=M">M</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=N">N</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=O">O</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=P">P</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=Q">Q</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=R">R</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=S">S</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=T">T</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=U">U</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=V">V</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=W">W</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=X">X</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=Y">Y</a></li>
                    <li><a href="<?php echo $all_link; ?>?&letter=Z">Z</a></li>
                </ul>
            </div>

            <div>
                <?php

                    if (!isset($first_char)) {

                        /* Default action while no letter selected */

                            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                            $my_query = new WP_Query( 
                                    array (
                                        'post_type'        => $post_type,
                                        'posts_per_page'   => $number,
                                        'post_status'      => 'publish',
                                        'orderby'          => $order_by, 
                                        'order'            => $order,
                                        'paged'            => $paged,
                                    )
                                );
                            if ( $my_query->have_posts() ) {
                            	while ($my_query->have_posts()) : $my_query->the_post(); ?>
	                            <li class="p_list"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
	                            <?php
	                            endwhile;
                            }

                            else {
                            	echo "<br><h4>Sorry! Nothing found in this [post_type] or [post_type] may not exist.</h4><br>";
                            }

                            ?>

                            <div class="pagination">
                                <?php
                                $big = 999999999; // need an unlikely integer

                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $my_query->max_num_pages,
                                    'prev_text'    => __('&laquo; Prev'),
                                    'next_text'    => __('Next &raquo;'),
                                ) );
                                ?>
                            </div>

                            <?php
                            wp_reset_query();
                        /*End Default action*/
                    }

                    else{

                        /* If any letter is selected then executes*/

                        global $wpdb;

                        $postids=$wpdb->get_col($wpdb->prepare("
                            SELECT      ID
                            FROM        $wpdb->posts
                            WHERE       SUBSTR($wpdb->posts.post_title,1,1) = %s
                            ORDER BY    $wpdb->posts.post_title",$first_char)); 

                            if ($postids) {
                            $args=array(
                              'post__in'        => $postids,
                              'post_type'       => $post_type,
                              'post_status'     => 'publish',
                              'orderby'         => $order_by, 
                              'order'           => $order,
                              'posts_per_page'  => -1,
                              'caller_get_posts'=> 1
                            );

                            $my_query = new WP_Query($args);
                            if( $my_query->have_posts() ) {
                             
                              while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <li class="p_list"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                                <?php
                              endwhile;
                            }

                            else{echo '<br><h4>Sorry! Nothing found with Letter: '.$first_char.'</h4><br>';}

                            wp_reset_query();
                            }

                         /*End of execution*/
                    }

                 ?>
            </div>
<?php }
add_shortcode('atoz_sorting', 'atoz_sorting_function');



function atoz_sorting_css() {

	echo "
	<style type='text/css'>
		.atoz_sorting_style {
			overflow: hidden;
            text-align: center;
			border-bottom: 1px dashed gainsboro;
            border-top: 1px dashed gainsboro;
		}
		.atoz_sorting_style ul {
			list-style: none !important;
		}
		.atoz_sorting_style ul li{
			float: left;
			margin: 6px;
		}
		.atoz_sorting_style ul li a{
			text-decoration: none;
		}
		.atoz_sorting_style ul li a:hover{
			text-decoration: underline;
		}
        .nav-previous {
            float: left;
            width: 50%;
        }
        .nav-next {
            float: right;
            text-align: right;
            width: 50%;
        }
        .p_list {
            background: white;
            padding: 10px;
            margin: 10px 0px;
            font-size: 20px;
            list-style: none;
        }
        .p_list a {
            text-decoration: none;
        }
        .pagination {
            border-bottom: 1px dashed gainsboro;
            border-top: 1px dashed gainsboro;
            padding: 8px 0px;
        }
        .pagination a {
            padding: 0px 8px;
            text-decoration: none;
        }
        .pagination a:hover {
            text-decoration: underline;
        }
	</style>
	";
}

add_action( 'wp_head', 'atoz_sorting_css' );

?>