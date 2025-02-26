<?php
/**
 * Provide an admin settings 
 * page for updating plugin settings
 *
 * This file is used to markup the 
 * admin-facing settings page for the plugin.
 *
 * PHP Version 7.4.9
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/admin/partials
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 * @since      1.0.0
 */
?>

<?php if ($related_posts): ?>

  <?php do_action('404_related_posts_before') ?>

  <div class="related-posts-404">

    <h2><?php _e('Maybe you meant:') ?></h2>

    <ol class="posts-list">

      <?php foreach ($related_posts as $post): setup_postdata($post); ?>

        <li>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <div class="detail">
            <span class="info"><?php echo get_post_type(); ?></span>
            <span class="info"><?php the_date(); ?></span>
            <span class="info"><?php the_author(); ?></span>
          </div>
        </li>

      <?php wp_reset_postdata(); endforeach; ?>

    </ol>

  </div>

  <?php do_action('404_related_posts_after') ?>

<?php endif; ?>

<style type="text/css">
.related-posts-404 .posts-list > li {
  border: 1px solid #ddd;
  padding: 15px;
  margin: 0 0 10px;
  background-color: rgba(240, 240, 240, 0.3);
}
.related-posts-404 .posts-list > li .detail {
  display: flex;
  flex-wrap: wrap;
}
.related-posts-404 .posts-list > li .detail .info {
  padding-right: 10px;
}
.related-posts-404 .posts-list > li .detail .info:empty {
  display: none;
}
.related-posts-404 .posts-list > li .detail .info::after {
  content: "/";
  margin-left: 10px;
  color: #888;
}
.related-posts-404 .posts-list > li .detail > .info:last-child::after {
  display: none;
}
</style>