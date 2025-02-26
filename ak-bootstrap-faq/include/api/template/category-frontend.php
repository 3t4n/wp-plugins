<?php
$counter = 1;
$categories = get_categories();
foreach ($categories as $category) {
	$cat_loop = new WP_Query('category_name='.$category->cat_name.'&post_type=akbootstrapfaq&post_status=publish&order=ASC');
	if($cat_loop->post_count >0 ) {
	?>
		<div class="faqHeader"><?php echo $category->cat_name; ?></div>
		<?php while ($cat_loop->have_posts()) : $cat_loop->the_post(); ?>
			<?php if($counter == 1) { ?>
				<div class="panel panel-default faqPanel">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo ucfirst(akbootstrapfaq_convertNumber($counter)); ?>"><?php the_title(); ?></a>
						</h4>
					</div>
					<div id="collapse<?php echo ucfirst(akbootstrapfaq_convertNumber($counter)); ?>" class="panel-collapse collapse in">
						<div class="panel-body">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php }else { ?>
				<div class="panel panel-default faqPanel">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo ucfirst(akbootstrapfaq_convertNumber($counter)); ?>"><?php the_title(); ?></a>
						</h4>
					</div>
					<div id="collapse<?php echo ucfirst(akbootstrapfaq_convertNumber($counter)); ?>" class="panel-collapse collapse">
						<div class="panel-body">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php
		$counter++;
		endwhile;
	}
}
?>