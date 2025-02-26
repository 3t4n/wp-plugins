<?php
/* This file is part of the Headline Rotator Plugin Version 1.0
**********************************************************************
Copyright 2009 Carter Fort  (email : carter@outtolunchproductions.com)
*/


?>

<div id="scrollup">
<?php query_posts('category_name=FrontPage&order=desc&showposts=5'); ?>

<?php while (have_posts()) : the_post(); ?>

<div class="headline">
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?>
<small><a href="<?php the_permalink(); ?>">Read more</a></small>
				</div>

<?php endwhile;?>
      
</div>
