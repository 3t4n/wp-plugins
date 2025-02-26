<?php //In this bit we will check if the user wants to display custom html
 if (get_option('fbac_home_style') == 'fbac_custom_home'){ echo stripslashes(get_option('fbac_home_custom_html'));}

//Next we check if the user wants to use the "Like-Reveal" feature
 elseif (get_option('fbac_home_style') == 'fbac_reveal_code'){      
//Now we wil parse the $_REQUEST sent by Facebook
     function parsePageSignedRequest() {
    if (isset($_REQUEST['signed_request'])) {
      $encoded_sig = null;
      $payload = null;
      list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
      $sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
      $data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
      return $data;
    }
    return false;
  }
    
  if($signed_request = parsePageSignedRequest()) {
    if($signed_request->page->liked) {     
   if (get_option('fbac_what_after_reveal')== 'show_blog_after_reveal'){fbac_show_this_blog();}else{
     echo  stripslashes(get_option('fbac_after_reveal'));}

     } else {     
     
    
     echo stripslashes(get_option('fbac_before_reveal'));
     }

     } else {
         //'You can only view this page via a Facebook iFrame.';
       fbac_show_this_blog();
         }
         
  } else {fbac_show_this_blog();}
     
     
//Otherwise we just go ahead and show the blog
function fbac_show_this_blog() {
   ?>
<?php get_header(); ?>
     <div id="container">
 
            <div id="content">
            
            
            
             
            <?php /* Top post navigation?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                <div id="nav-above" class="navigation">
                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'fbac-wordpress-facebook' )) ?></div>
                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'fbac-wordpress-facebook' )) ?></div>
                </div><!-- #nav-above -->
<?php }  */ ?>
            <?php /* The Loop — with comments! */ ?>
           <?php query_posts("posts_per_page=5"); ?>
<?php while ( have_posts() ) : the_post() ?>
 <div class="fbac-content bottom-border"><!-- Marketing Warrior post excerpt -->
<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class()  */?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  >
<div class="attachment-post-thumbnail">
<?php the_post_thumbnail(); ?>
</div>
<?php /* an h2 title  */  ?>
                    <h2 class="entry-title post-link"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'fbac-wordpress-facebook'), the_title_attribute('echo=0') ); ?>" rel="bookmark" class="post-link"><?php the_title(); ?></a></h2>
 
<?php /* Microformatted, translatable post meta   ?>
                    <div class="entry-meta">
                        <span class="meta-prep meta-prep-author"><?php _e('By ', 'fbac-wordpress-facebook'); ?></span>
                        <span class="author vcard"><a class="url fn n post-link" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'fbac-wordpress-facebook' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
                        <span class="meta-sep"> | </span>
                        <span class="meta-prep meta-prep-entry-date grey-text"><?php _e('Published ', 'fbac-wordpress-facebook'); ?></span>
                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                        <?php edit_post_link( __( 'Edit', 'fbac-wordpress-facebook' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
                    </div><!-- .entry-meta -->
 <?php */ ?>
<?php /* The entry content */ ?>
                    <div class="entry-content">
<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'fbac-wordpress-facebook' )  ); ?>
<?php //wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'fbac-wordpress-facebook' ) . '&after=</div>') ?>
                    </div><!-- .entry-content -->

<?php /* Microformatted category and tag links along with a comments link */ ?>
    <?php /*entry-utility is not used in this theme but you can access it by uncommenting this section ?>                <div class="entry-utility">
                        <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'your-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
                        <span class="meta-sep"> | </span>
                        <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'your-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'your-theme' ), __( '1 Comment', 'your-theme' ), __( '% Comments', 'your-theme' ) ) ?></span>
                        <?php edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
                    </div><!-- #entry-utility --> <?php */ ?>
                </div><!-- #post-<?php the_ID(); ?> -->
 </div><!-- .fbac-content -->
<?php /* Close up the post div and then end the loop with endwhile */ ?>      
 
<?php endwhile; ?>
                    <?php /* Bottom post navigation   ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                <div id="nav-below" class="navigation">
                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'fbac-wordpress-facebook' )) ?></div>
                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'fbac-wordpress-facebook' )) ;?></div>
                </div><!-- #nav-below -->
<?php }*/  ?>
            </div><!-- #content -->
 
        </div><!-- #container -->
 
        <?php get_sidebar(); ?>
    <?php get_footer(); ?>
    <?php } ?>
