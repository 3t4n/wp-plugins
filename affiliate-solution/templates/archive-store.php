<?php
get_header();
?>
<div class="container">
	<div id="products" class="row list-group">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="item  col-xs-4 col-lg-4">
			<div class="thumbnail">
				<div class="caption">
					<h3 class="group inner list-group-item-heading"><a href="<?php echo get_the_permalink(); ?>" ><?php the_title(); ?></a></h3>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<p class="lead"><?php echo get_post_meta(get_the_ID(), "store_guidelines", true); ?></p>
						</div>
						<div class="col-xs-12 col-md-6 text-center">
							<a class="btn btn-success" href="<?php echo get_the_permalink(); ?>">See Offers</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
	</div>
</div>
<?php
get_footer();
?>

