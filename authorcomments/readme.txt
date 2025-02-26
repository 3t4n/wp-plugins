=== Author Page Comments ===
Contributors: harrysudana
Tags: author, comments

GNU/GPL AuthorComment is a plugins that help to administrate Comment in Author Page as like a testimonial for author.

== Description ==

GNU/GPL AuthorComment is a plugins that help to administrate Comment in Author Page as like a testimonial for author.

See the [Documentation] (http://webwoke.com/wp-plugins/authorcomments.html)

== Installation ==

* Copy and paste the plugins in your plugins folder.

* Copy and Paste author.php and authorcomments.php in your theme folder.

* If you already have author.php, please copy and paste the tag below.


`<!-- begin -->`
`<?php `
`	$htmlAC = new authorcomments();`
`	$authorcomment = $htmlAC->loadACpostid($curauth->ID);`
`	if(sizeof($authorcomment)>0){`
`?>`
`		<li class="widget">`
`		<h3>Send Author Comment</h3>`
`		<ul>`
`            <?php $r = new WP_Query(array('showposts' => '1', 'post_type'=>'authorcomments', 'ID'=>$authorcomment[0]->ID, `
`                           'nopaging' => 0, 'post_status' => 'inherit')); ?>`
                           
`		<?php if ($r->have_posts()) : while ($r->have_posts()) : $r->the_post();`
`                      $withcomments = 1; `
`                      comments_template("/authorcomments.php");`
`			endwhile; endif; ?>`
`		</ul>`
`		</li>`
`<?php `
`	}`
`?>`
`<!-- end -->`


* Here is authorcomments.php look like.

`<!-- begin -->`
`<?php
/**
 * @package WordPress
 * @subpackage Author Comment Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<div class="title">
	
	<?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;
    </div>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<div class="title"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></div>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<input type="hidden" name="redirect_to" id="redirect_to" value="<?php echo "..".$_SERVER['REQUEST_URI']; ?>" />

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php //comment_id_fields(); ?>
</p>
<?php //do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
<!-- end -->`


* Activate Your Plugins
