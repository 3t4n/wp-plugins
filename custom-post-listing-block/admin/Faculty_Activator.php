<?php
if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}

class Faculty_Activator {
    public function __construct(){
        add_action( 'init', array($this,'cpl_register_post_type') );
        register_block_type( 'e-learning-faculty/faculty', array(
            'render_callback' => array($this,'cpl_faculty_post'),
        ) );
    }
    public function cpl_register_post_type(){
        $labels = array(
            'name'                  => _x( 'Faculty', 'Post type general name', 'cpl' ),
            'singular_name'         => _x( 'Faculty', 'Post type singular name', 'cpl' ),
            'menu_name'             => _x( 'Faculty', 'Admin Menu text', 'cpl' ),
            'name_admin_bar'        => _x( 'Faculty', 'Add New on Toolbar', 'cpl' ),
            'add_new'               => __( 'Add New', 'cpl' ),
            'add_new_item'          => __( 'Add New Faculty', 'cpl' ),
            'new_item'              => __( 'New Faculty', 'cpl' ),
            'edit_item'             => __( 'Edit Faculty', 'cpl' ),
            'view_item'             => __( 'View Faculty', 'cpl' ),
            'all_items'             => __( 'All Faculty', 'cpl' ),
            'search_items'          => __( 'Search Faculty', 'cpl' ),
            'parent_item_colon'     => __( 'Parent Faculty:', 'cpl' ),
            'not_found'             => __( 'No faculty found.', 'cpl' ),
            'not_found_in_trash'    => __( 'No faculty found in Trash.', 'cpl' ),
            'featured_image'        => _x( 'Faculty Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'cpl' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'cpl' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'cpl' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'cpl' ),
            'archives'              => _x( 'Faculty archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'cpl' ),
            'insert_into_item'      => _x( 'Insert into faculty', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'cpl' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this faculty', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'cpl' ),
            'filter_items_list'     => _x( 'Filter faculty list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'cpl' ),
            'items_list_navigation' => _x( 'Faculty list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'cpl' ),
            'items_list'            => _x( 'Faculty list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'cpl' ),
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'faculty' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        );
     
        register_post_type( 'faculty', $args );
    }
    function cpl_faculty_post( $attributes, $content ) {

        // WP_Query arguments
        $args = array(
            'post_type'              => array( 'faculty' ),
            'post_status'            => array( 'publish' ),
            'posts_per_page'         => 4,
        );
        // The Query
        $query = new WP_Query( $args );
        $html = '<h2 class="text-medium-38 font-weight-600 text-transform-capitalize color-black margin-bottom-10 word-wrap">Our Faculty</h2>
				<p class="text-small-16 color-charcoal-light margin-bottom-42 padding-lr-60">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they.</p>
				<div class="row post-list">';
        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $post_id = get_the_ID();
                $social_icon = '';
                $fb_url = get_post_meta($post_id,'fb_url',true);
                $tw_url = get_post_meta($post_id,'tw_url',true);
                $go_url = get_post_meta($post_id,'go_url',true);
                $li_url = get_post_meta($post_id,'li_url',true);
                $socials = array('fa-facebook-f'=>$fb_url,'fa-twitter'=>$tw_url,'fa-google-plus'=>$go_url,'fa-linkedin'=>$li_url);
                foreach($socials as $key=>$social){
                    if(!empty($social)){
                        $social_icon .= '<li class="list-group-item"><a href="'.$social.'" target="_blank"><span><i class="fa '.$key.'" aria-hidden="true"></i></span></a></li>';
                    }
                }
                $html .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-bottom-30 wow slideInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">
						<div class="team-detail-block linear-transition">
							<div class="team-image position-relative">
								<img class="img100 height-100 img-object-fit-cover" src="'.get_the_post_thumbnail_url().'" alt="Image">
								<div class="md-color-overlay redishpink-overlay opacity-0 linear-transition"></div>
								<div class="team-image-hover linear-transition padding-lr-10 position-absolute position-left position-right margin-top-21">
									<a class="faculty-name text-medium-22 font-weight-600 color-black margin-bottom-6 display-block" href="#">'.get_the_title().'</a>
									<small class="color-bright-gray text-extra-small-12 font-weight-400 text-transform-uppercase margin-bottom-9 display-block">'.get_the_excerpt().'</small>
									<div class="social-media-icons white-gray-icon small-icon-20 display-none linear-transition">
										<ul class="md-person-social list-group">'.$social_icon .'</ul>
									</div>
								</div>
							</div>
							<div class="team-detail-onhover opacity-0 linear-transition padding-top-21">
								<p class="text-small-16 color-charcoal-light margin-bottom-22">'.get_the_content().'</p>
							</div>
						</div>
					</div>';
            }
        } else {
            // no posts found
        }
        $html .= '</div>';
        // Restore original Post Data
        wp_reset_postdata();

        return $html;
    }

}

