<?php
// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'fbac-wordpress-facebook', TEMPLATEPATH . '/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);
 
// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'fbac-wordpress-facebook') . get_query_var('paged');
    }
} // end get_page_number

?><?php
// Custom callback to list comments in the fbac-wordpress-facebook style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author vcard"><?php commenter_link() ?></div>
        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'fbac-wordpress-facebook'),
                    get_comment_date(),
                    get_comment_time(),
                    '#comment-' . get_comment_ID() );
                    edit_comment_link(__('Edit', 'fbac-wordpress-facebook'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'fbac-wordpress-facebook') ?>
          <div class="comment-content">
            <?php comment_text() ?>
        </div>
        <?php // echo the comment reply link
            if($args['type'] == 'all' || get_comment_type() == 'comment') :
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply','fbac-wordpress-facebook'),
                    'login_text' => __('Log in to reply.','fbac-wordpress-facebook'),
                    'depth' => $depth,
                    'before' => '<div class="comment-reply-link">',
                    'after' => '</div>'
                )));
            endif;
        ?>
<?php } // end custom_comments ?>
<?php
// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ;?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'fbac-wordpress-facebook'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'fbac-wordpress-facebook'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'fbac-wordpress-facebook') ?>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
<?php } // end custom_pings?>
<?php
// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
    $commenter = get_comment_author_link();
    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
        $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
    } else {
        $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link

// For category lists on category archives: Returns other categories except the current one (redundant)
function cats_meow($glue) {
    $current_cat = single_cat_title( '', false );
    $separator = "\n";
    $cats = explode( $separator, get_the_category_list($separator) );
    foreach ( $cats as $i => $str ) {
        if ( strstr( $str, ">$current_cat<" ) ) {
            unset($cats[$i]);
            break;
        }
    }
    if ( empty($cats) )
        return false;
 
    return trim(join( $glue, $cats ));
} // end cats_meow


// For tag lists on tag archives: Returns other tags except the current one (redundant)
function tag_ur_it($glue) {
    $current_tag = single_tag_title( '', '',  false );
    $separator = "\n";
    $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
    foreach ( $tags as $i => $str ) {
        if ( strstr( $str, ">$current_tag<" ) ) {
            unset($tags[$i]);
            break;
        }
    }
    if ( empty($tags) )
        return false;
 
    return trim(join( $glue, $tags ));
} // end tag_ur_it


// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => 'Primary Navigation'
) );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 200, 200, true ); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size


//Change excerpt length (number of words)
function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');


//Change the excerpt end  k
function new_excerpt_more($more) {
       global $post;
	return ''; ///In this case we want to leave it empty
}
add_filter('excerpt_more', 'new_excerpt_more');


function fbac_color_options ($fbac_color=''){
    $fbac_color = get_option('fbac_color_scheme');
    $fbac_css_path= plugins_url('fbac_converter/fb_theme/colors/'.$fbac_color.'.css');
    
echo     ' <link rel="stylesheet" type="text/css" href="'.$fbac_css_path.'" /> ';

    
    }


?>
<?php
function fbac_menu(){

$menu_links = get_option('fbac_menu_links');
//print_r($menu_links);
?>
<ul>
<?php
if ($menu_links !=''){
foreach($menu_links as $details => $link){
?>
<li>
<a href="<?php echo $link['url'];?>"><?php
echo $link['text']; ?>
</a></li>

 <?php
}//foreach $menu_links
}//if $menu_links
?>
</ul>
<?php
} //fbac_menu

?>
