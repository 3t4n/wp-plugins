<div class="panel-group" id="accordion">
	<?php query_posts('post_type=akbootstrapfaq&post_status=publish&order=ASC'); ?>
	<?php $counter = 1; ?>
	<?php while(have_posts()) : the_post(); ?>
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
				<br/>
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
	<?php $counter++; ?>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
</div>