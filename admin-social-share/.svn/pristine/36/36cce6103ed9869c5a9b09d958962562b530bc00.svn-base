<?php 
/*
Plugin Name: Admin Social Share 
Plugin URI: http://lawyernomics.avvo.com/wordpress/admin-social-share
Description: Quickly share posts and pages on Twitter, Facebook, Google+ and LinkedIn after a post or page has been published.
Version: 1.0
Author: Jake Martin of Avvo.com
Author URI: http://www.avvo.com
License: GPL2
*/

function avvo_social_update_messages( $messages ) {
  global $post, $post_ID;
		
		$head = "<h1 style='margin:10px 0'>Congrats on your new post! Be sure to share it!</h1>";
		$sep = "&nbsp;&nbsp;";
		$twitter = '<a href="https://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink($post_ID).'" data-text="'.get_the_title($post_ID).'">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

		$fb = "<div class='fb-like' data-href='".get_permalink($post_ID)."' data-send='true' data-width='120' data-show-faces='false'></div><div id='fb-root'></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id; js.src = '//connect.facebook.net/en_US/all.js#xfbml=1&appId=113318652140057';fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>";
		
		$gp = "<div class='g-plusone' data-href='".get_permalink($post_ID)."'></div><script type='text/javascript'>(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();</script>";
		
		$li = "<script src='//platform.linkedin.com/in.js' type='text/javascript'></script><script type='IN/Share' data-url='".get_permalink($post_ID)."' data-counter='right'></script>";
		
		$a = sprintf( __('Page updated. <a href="%s">View page</a>'), esc_url( get_permalink($post_ID) ) );		
		$b = sprintf( __('Post updated. <a href="%s">View post</a>'), esc_url( get_permalink($post_ID) ) );
		
		$a .= $head.$twitter.$sep.$fb.$sep.$gp.$sep.$li;
		$b .= $head.$twitter.$sep.$fb.$sep.$gp.$sep.$li;
		
		unset($head,$sep,$twitter,$fb,$gp,$li);
		
		// pages
		$messages['page'] = array(
			 0 => '', // Unused. Messages start at index 1.
			 1 => $a,
			 2 => __('Custom field updated.'),
			 3 => __('Custom field deleted.'),
			 4 => __('Page updated.'),
			 5 => isset($_GET['revision']) ? sprintf( __('Page restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => str_replace("updated","published",$a),
			 7 => __('Page saved.'),
			 8 => sprintf( __('Page submitted. <a target="_blank" href="%s">Preview page</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( __('Page scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview page</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( __('Page draft updated. <a target="_blank" href="%s">Preview page</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		);
		unset($a);
		// posts
		$messages['post'] = array(
			 0 => '', // Unused. Messages start at index 1.
			 1 => $b,
			 2 => __('Custom field updated.'),
			 3 => __('Custom field deleted.'),
			 4 => __('Page updated.'),
			 5 => isset($_GET['revision']) ? sprintf( __('Page restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => str_replace("updated","published",$b),
			 7 => __('Page saved.'),
			 8 => sprintf( __('Page submitted. <a target="_blank" href="%s">Preview page</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( __('Page scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview page</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( __('Page draft updated. <a target="_blank" href="%s">Preview page</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		);
		unset($b);

  return $messages;
}
add_filter( 'post_updated_messages', 'avvo_social_update_messages' );

?>