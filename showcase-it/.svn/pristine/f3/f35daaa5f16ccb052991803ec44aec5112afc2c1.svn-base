<?php

/**
 * Plugin Name: Showcase It
 * Description: A lite Weight Plugin that helps you showcase your Books and other items in your WordPress Website.
 * Plugin URI:  https://wordpress.org/plugins/
 * Version:    1.0.3
 * Author: bPlugins LLC
 * Author URI: http://bplugins.com
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bp-showcase
 * Domain Path:  /languages
 */

/* Plugin Initialization */
define('BPBS_PLUGIN_DIR', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' ); 
define('BPBS_PLUGIN_VERSION', '1.0.3' ); 

add_action('plugin_loaded','bpbs_textdomain');
function bpbs_textdomain(){
    load_textdomain('bp-showcase', BPBS_PLUGIN_DIR.'languages');

}

// Register Scripts and style
function bpbs_assets(){

    wp_register_script( 'bpbs-showcase-two', plugin_dir_url( __FILE__). 'public/js/showcase-two.js', array('jquery'), '', true );
    wp_enqueue_script('bpbs-showcase-two');
    // style
    wp_register_style( 'bpbs-showcase-two', plugin_dir_url( __FILE__). 'public/css/showcase-style-two.css', BPBS_PLUGIN_VERSION );
    wp_register_style( 'bpbs-showcase-three', plugin_dir_url( __FILE__). 'public/css/showcase-style-three.css', BPBS_PLUGIN_VERSION );

    wp_register_style( 'bpbs-movie-style', plugin_dir_url( __FILE__ ). '/public/css/movie-style.css');
    wp_register_style( 'bpbs-fontawesome', plugin_dir_url( __FILE__ ). '/public/css/all.min.css');

            
    wp_enqueue_style('bpbs-showcase-two');
    wp_enqueue_style('bpbs-showcase-three');
    wp_enqueue_style('bpbs-fontawesome');


}
add_action('wp_enqueue_scripts', 'bpbs_assets');


// Additional admin style
function bpbs_admin_style(){
    wp_register_style( 'bpbs-admin-style', plugin_dir_url( __FILE__ ). 'public/css/admin-style.css');
    wp_register_style( 'bpbs-ads-style', plugin_dir_url( __FILE__ ). 'admin/ads/style.css');
    wp_enqueue_style( 'bpbs-admin-style' );
    wp_enqueue_style( 'bpbs-ads-style' );
}
add_action('admin_enqueue_scripts', 'bpbs_admin_style');


if( ! function_exists( 'csf_add_my_custom_css' ) ) {
  function csf_add_my_custom_css() {
    wp_enqueue_style( 'bpbs-admin-style' );

  }
  add_action('csf/enqueue', 'csf_add_my_custom_css' );
}

// Shortcode for Showcase  Viewer
function bpbs_showcase_shortcode( $atts ){
    extract( shortcode_atts( array(

            'id'    => null,

    ), $atts )); ob_start(); ?>
<?php 

$bpbs_showcase = get_post_meta( $id, 'bpbs_showcase_', true ); ?>

<?php if( isset($bpbs_showcase['bpbs_books']) && is_array($bpbs_showcase['bpbs_books'])): ?>
<div class="container">
  <div class="main">
    <ul id="bk-list" class="bk-list align clearfix">

    <?php foreach( $bpbs_showcase['bpbs_books'] as $bpbs_book): $bookId = 'book'.uniqid(); ?>

      <!-- Star Book One -->
      <?php if( $bpbs_showcase['bpbs_type'] ==='book' && $bpbs_showcase['book_style'] ==='one' ): 
            wp_enqueue_style('bpbs-showcase-two');
        
        ?>
        <li>
            <div id="<?php echo esc_attr($bookId); ?>" class="bk-book book-1 bk-bookdefault">
              <div class="bk-front">
                <div class="bk-cover-back"></div>
                <div class="bk-cover">
                  <h2>
                    <span><?php echo esc_html($bpbs_book['book_writer_name']); ?></span>
                    <span><?php echo esc_html($bpbs_book['book_name']); ?></span>
                  </h2>
                </div>
              </div>

              <div class="bk-page">

              <?php 
                $book_pages = isset($bpbs_book['book_inner_pages']) ? $bpbs_book['book_inner_pages'] : array();
                foreach( $book_pages as $book_inner_page ): ?>
                <div class="bk-content bk-content-current">
                  <p>
                    <?php echo esc_html($book_inner_page['book_page_text']); ?>
                  </p>
                </div>
                <?php endforeach; ?>

                <nav>
                  <span class="bk-page-prev">&lt;</span
                  ><span class="bk-page-next">&gt;</span>
                </nav>
              </div>
              <div class="bk-back">
                <?php if( '1' === $bpbs_book['back_cover_img']): ?>
                <img
                  src="<?php echo esc_url($bpbs_book['cover_img']['url']); ?>"
                  alt="cat"
                />
                <?php endif; ?>
                <p>
                    <span><?php echo esc_html($bpbs_book['back_cover_content']); ?></span>
                </p>
              </div>
              <div class="bk-right"></div>
              <div class="bk-left">
                <h2>
                  <span><?php echo esc_html($bpbs_book['book_writer_name']); ?></span>
                  <span><?php echo esc_html($bpbs_book['book_name']); ?></span>
                </h2>
              </div>
              <div class="bk-top"></div>
              <div class="bk-bottom"></div>
            </div>
            <div class="bk-info">
              <button class="bk-bookback"><?php echo esc_html($bpbs_book['btn_text_1']); ?></button>
              <button class="bk-bookview"><?php echo esc_html($bpbs_book['btn_text_2']); ?></button>
              <h3>
                <span><?php echo esc_html($bpbs_book['book_writer_name']); ?></span>
                <span><?php echo esc_html($bpbs_book['book_name']); ?></span>
              </h3>
              <p>
                <?php echo esc_html($bpbs_book['book_dsc']); ?>
              </p>
            </div>
        </li>
        <?php endif; ?>
        <!-- End of Book One -->
        <?php if( $bpbs_showcase['bpbs_type'] ==='book' && $bpbs_showcase['book_style'] ==='two' ): 
              wp_enqueue_style('bpbs-showcase-two'); ?>

        <li>
        <div id="<?php echo esc_attr($bookId); ?>" class="bk-book book-3 bk-bookdefault">
          <div class="bk-front">
            <div class="bk-cover-back"></div>
            <div class="bk-cover">
              <h2>
                <span><?php echo esc_html($bpbs_book['book_name']); ?></span>
                <span><?php echo esc_html($bpbs_book['book_name']); ?></span>
              </h2>
            </div>
          </div>
          <div class="bk-page">
            <?php 
            $book_pages = isset($bpbs_book['book_inner_pages']) ? $bpbs_book['book_inner_pages'] : array();
            foreach( $book_pages as $book_inner_page ): ?>
            <div class="bk-content bk-content-current">
              <p>
                <?php echo esc_html($book_inner_page['book_page_text']); ?>
              </p>
            </div>
            <?php endforeach; ?>
            <nav>
              <span class="bk-page-prev">&lt;</span
              ><span class="bk-page-next">&gt;</span>
            </nav>
          </div>
          <div class="bk-back">
            <?php if( '1' === $bpbs_book['back_cover_img']): ?>
            <img
              src="<?php echo esc_url($bpbs_book['cover_img']['url']); ?>"
              alt="cat"
            />
            <?php endif; ?>
            <p>
                <span><?php echo esc_html($bpbs_book['back_cover_content']); ?></span>
            </p>
          </div>
          <div class="bk-right"></div>
          <div class="bk-left">
            <h2>
              <span><?php echo esc_html($bpbs_book['book_writer_name']); ?></span>
              <span><?php echo esc_html($bpbs_book['book_name']); ?></span>
            </h2>
          </div>
          <div class="bk-top"></div>
          <div class="bk-bottom"></div>
        </div>
        <div class="bk-info">
          <button class="bk-bookback"><?php echo esc_html($bpbs_book['btn_text_1']); ?></button>
          <button class="bk-bookview"><?php echo esc_html($bpbs_book['btn_text_2']); ?></button>
          <h3>
            <span><?php echo esc_html($bpbs_book['book_writer_name']); ?></span>
            <span><?php echo esc_html($bpbs_book['book_name']); ?></span>
          </h3>
          <p>
          <?php echo esc_html($bpbs_book['book_dsc']); ?>
          </p>
        </div>
      </li>   

    <?php endif; ?>

      <style>
        <?php $id   = "#$bookId"; ?>

        <?php echo esc_attr($id); ?>.book-1 .bk-front > div,
        <?php echo esc_attr($id); ?>.book-1 .bk-back,
        <?php echo esc_attr($id); ?>.book-1 .bk-left,
        <?php echo esc_attr($id); ?>.book-1 .bk-front:after {
          background-color: <?php echo esc_attr($bpbs_book['book_bg_color']); ?>;
        }
        <?php echo esc_attr($id); ?>.book-1 .bk-cover{
          background-image: url('<?php echo esc_url($bpbs_book['book_cover_photo']['url']); ?>')
        }

        <?php echo esc_attr($id); ?>.book-3 .bk-front > div,
        <?php echo esc_attr($id); ?>.book-3 .bk-back,
        <?php echo esc_attr($id); ?>.book-3 .bk-left,
        <?php echo esc_attr($id); ?>.book-3 .bk-front:after {
          background-color: <?php echo esc_attr($bpbs_book['book_bg_color']); ?>;
        }
        <?php echo esc_attr($id); ?>.book-3 .bk-cover{
          background-image: url('<?php echo esc_url($bpbs_book['book_cover_photo']['url']); ?>')
        }

        .bk-cover h2 span,
        .bk-left h2 span {
          color: <?php echo esc_attr($bpbs_book['cover_text_color']); ?>;
        }
        /* Book Button */
        .bk-info button {
          background: <?php echo esc_attr($bpbs_book['book_btn_bg']); ?>;
          color: <?php echo esc_attr($bpbs_book['btn_text_color']); ?>;
          font-size: <?php echo esc_attr($bpbs_book['book_btn_font_size']); ?>px;
          border-radius: <?php echo esc_attr($bpbs_book['book_btn_border_radius']); ?>px;
        }
      </style>

      <?php 
      /* Movie Style */
      if( $bpbs_showcase['bpbs_type'] ==='movie'){
        ?>
        <style>
        .bk-list li {
	        width: 100%;
          margin-right: 0;
        }
        </style>
        <?php 
      }
      ?>
     <?php endforeach; ?>
    </ul>
  </div>
</div>
<!-- End of Book container -->
<?php endif; ?>

<!-- Start of Movie container -->
<?php if( isset($bpbs_showcase['bpbs_movies']) && is_array($bpbs_showcase['bpbs_movies'])): ?>
<?php if( $bpbs_showcase['bpbs_type'] ==='movie') : wp_enqueue_style('bpbs-movie-style'); ?>

      <?php foreach($bpbs_showcase['bpbs_movies'] as $movies): ?>
      <div class="bpbs_movies">
      <div class="movie_item">
      <div class="movie_poster_wrapper">
        <div class="movie_poster">
          <img src="<?php echo esc_url($movies['movie_poster']['url']); ?>" alt="<?php echo esc_attr($movies['movie_name']); ?> " />
          <div class="movie_resolution"><?php echo esc_html($movies['movie_resolution']); ?></div>
        </div>
        <div class="movie_download">
            <a href="<?php echo esc_url($movies['movie_download']); ?>" target="_blank">Download</a>
          </div>
      </div>
        <!-- End Poster -->
        <div class="movie_details">
          <div class="movie_header">
            <h2><?php echo esc_html($movies['movie_title']); ?></h2>
            <p class="movie_release"><?php echo esc_html($movies['movie_name']); ?> : <?php echo esc_html($movies['movie_release_date']); ?></p>
            <div class="movie_du_tag">
              <span><i class="far fa-clock"></i><?php echo esc_html($movies['movie_duration']); ?></span>
              <p><?php echo esc_html($movies['movie_type']); ?></p>
            </div>
          </div>
          <div class="movie_rating">
            <div class="rating_point">
              <?php 
                $ratings_star = isset($movies['movie_rating_star']) ? $movies['movie_rating_star'] : null;
                echo esc_html($ratings_star).".0"; 
              ?>
            </div>
            <div class="rating_data">
              <span class="rating">

              <?php 
                $ratings = $ratings_star;
                $rating_num   = intval($ratings);

                for($i=1; $i <= $rating_num; $i++ ){
                  if( $rating_num > 5 ) {
                    break;
                  }else{ ?>
                    <i class="fas fa-star"></i>
                  <?php }
                }
              
              ?>
              </span>
              <span class="imdb_rating">IMDB: <?php echo esc_html($ratings_star); ?>.0 / 5.0</span>
            </div>
          </div>
          <!-- End Rating -->

          <div class="movie_director">
            <span><i class="fas fa-bullhorn"></i></span>
            <p><?php echo esc_html($movies['movie_director']); ?> </p>
          </div>
          <div class="movie_cast">
            <span><i class="fas fa-user-friends"></i></span>
            <p><?php echo esc_html($movies['movie_casting']); ?> </p>
          </div>
          <div class="movie_dsc">
            <span><i class="fas fa-file-alt"></i></span>
            <p><?php echo esc_html($movies['movie_dsc']); ?></p>
          </div>
          <div class="movie_language">
            <span><i class="fas fa-language"></i></span>
            <p><?php echo esc_html($movies['movie_language']); ?></p>
          </div>
          <div class="movie_orgin">
            <span><i class="fas fa-globe-americas"></i></span>
            <p><?php echo esc_html($movies['movie_origin']); ?></p>
          </div>
        </div> <!-- End movie_details -->
      </div> <!-- End movie_item -->
    </div> <!-- End bpbs_movie -->
    <?php endforeach; ?>
<?php endif; ?>
<?php endif; ?>
<!-- End of Movie container -->

<?php   
    return ob_get_clean();

}
add_shortcode( 'showcase', 'bpbs_showcase_shortcode' );


// Custom post-type for bpbs
function bpbs_showcase(){
    $labels = array(
        'name'                  => __( 'Showcase', 'bp-showcase' ),
        'menu_name'             => __( 'Showcase', 'bp-showcase' ),
        'name_admin_bar'        => __( 'Showcase', 'bp-showcase' ),
        'add_new'               => __( 'Add New Showcase', 'bp-showcase' ),
        'add_new_item'          => __( 'Add New Showcase ', 'bp-showcase' ),
        'new_item'              => __( 'New Showcase ', 'bp-showcase' ),
        'edit_item'             => __( 'Edit Showcase ', 'bp-showcase' ),
        'view_item'             => __( 'View Showcase ', 'bp-showcase' ),
        'all_items'             => __( 'All Showcases', 'bp-showcase' ),
        'not_found'             => __( 'Sorry, we couldn\'t find the Feed you are looking for.' )
    ); 
    $args = array(
        'labels'             => $labels,
        'description'        => __('Showcase Options.', 'bp-showcase'),
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-welcome-view-site',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'showcase' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title'),
    );
    register_post_type( 'bpbs-showcase', $args );
}
add_action( 'init', 'bpbs_showcase');
    


/*-------------------------------------------------------------------------------*/
/*   Additional Features
/*-------------------------------------------------------------------------------*/

// Hide & Disabled View, Quick Edit and Preview Button 
function bpbs_remove_row_actions( $idtions ) {
	global $post;
    if( $post->post_type == 'bpbs-showcase' ) {
		unset( $idtions['view'] );
		unset( $idtions['inline hide-if-no-js'] );
	}
    return $idtions;
}

if ( is_admin() ) {
add_filter( 'post_row_actions','bpbs_remove_row_actions', 10, 2 );}

// HIDE everything in PUBLISH metabox except Move to Trash & PUBLISH button
function bpbs_hide_publishing_actions(){
    $my_post_type = 'bpbs-showcase';
    global $post;
    if($post->post_type == $my_post_type){
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
add_action('admin_head-post.php', 'bpbs_hide_publishing_actions');
add_action('admin_head-post-new.php', 'bpbs_hide_publishing_actions');	

/*-------------------------------------------------------------------------------*/
// Remove post update massage and link 
/*-------------------------------------------------------------------------------*/

function bpbs_updated_messages( $messages ) {
    $messages['bpbs-showcase'][1] = __('Shortcode updated ', 'bp-showcase');
    return $messages;
}
add_filter('post_updated_messages','bpbs_updated_messages');

/*-------------------------------------------------------------------------------*/
/* Change publish button to save.
/*-------------------------------------------------------------------------------*/
add_filter( 'gettext', 'bpbs_change_publish_button', 10, 2 );
function bpbs_change_publish_button( $translation, $text ) {
if ( 'bpbs-showcase' == get_post_type())
if ( $text == 'Publish' )
    return 'Save';

return $translation;
}


/*-------------------------------------------------------------------------------*/
/* Footer Review Request .
/*-------------------------------------------------------------------------------*/

add_filter( 'admin_footer_text','bpbs_admin_footer');	 
function bpbs_admin_footer( $text ) {
    if ( 'bpbs-showcase' == get_post_type() ) {
        $url = 'https://wordpress.org/plugins/showcase-image-viewer/reviews/?filter=5#new-post';
        $text = sprintf( __( 'If you like <strong> Showcase</strong> please leave us a <a href="%s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating. Your Review is very important to us as it helps us to grow more. ', 'bp-showcase' ), $url );
    }

    return $text;
}

/*-------------------------------------------------------------------------------*/
/* ONLY CUSTOM POST TYPE POSTS .
/*-------------------------------------------------------------------------------*/
	
add_filter('manage_bpbs-showcase_posts_columns', 'bpbs_columns_head_only_showcase', 10);
add_action('manage_bpbs-showcase_posts_custom_column', 'bpbs_columns_content_only_showcase', 10, 2);
 
// CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
function bpbs_columns_head_only_showcase($defaults) {
    $defaults['directors_name'] = 'ShortCode';
    return $defaults;
}
function bpbs_columns_content_only_showcase($column_name, $post_ID) {
    if ($column_name == 'directors_name') {
        // show content of 'directors_name' column
		echo '<input onClick="this.select();" value="[showcase id='. $post_ID . ']" >';
    }
}

/*-------------------------------------------------------------------------------*/
/* Shortcode Generator area  .
/*-------------------------------------------------------------------------------*/
	
add_action('edit_form_after_title','bpbs_shortcode_area');
function bpbs_shortcode_area(){
	global $post;	
	if($post->post_type =='bpbs-showcase') : ?>	
		<div class="shortcode_gen">
			<label for="bpbs_shortcode"><?php esc_html_e('Copy this shortcode and paste it into your post, page, or text widget content', 'bp-showcase') ?>:</label>

			<span>
				<input type="text" id="bpbs_shortcode" onfocus="this.select();" readonly="readonly"  value="[showcase id=<?php echo $post->ID; ?>]" /> 		
			</span>

		</div>
	<?php endif;
}

// After activation redirect
register_activation_hook(__FILE__, 'bpbs_plugin_activate');
add_action('admin_init', 'bpbs_plugin_redirect');

function bpbs_plugin_activate() {
	add_option('bpbs_plugin_do_activation_redirect', true);
}

function bpbs_plugin_redirect() {
    if (get_option('bpbs_plugin_do_activation_redirect', false)) {
        delete_option('bpbs_plugin_do_activation_redirect');
        wp_redirect('edit.php?post_type=bpbs-showcase&page=bpbs-support');
    }
}



// External files Inclusion

require_once 'inc/csf/csf-config.php';
if( class_exists( 'CSF' )) {
  require_once 'inc/csf/metabox-options.php';
}
require_once 'admin/ads/submenu.php';