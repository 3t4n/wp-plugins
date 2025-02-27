<?php 
add_shortcode( 'faq', 'flfaq_shortcode' );
function flfaq_shortcode( $atts ) {

	ob_start();
	
	// define attributes and their defaults
	extract( shortcode_atts( array ('ids' => '', 'category' => '','style' => 'pretty'), $atts ) );
	
	if($ids) :
		$idarray = explode(',', $ids);
		$args = array('post_type' => 'faq', 'posts_per_page' => -1, 'post__in' => $idarray);
	elseif ($category) :
		$args = array('post_type' => 'faq', 'posts_per_page' => -1, 'faq-category' => $category, 'orderby' => 'menu_order', 'order' => 'ASC');
	else :
		$args = array('post_type' => 'faq', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC');
	endif;
	
	
	global $post;
	$flfaq = new WP_Query( $args );
	if ( $flfaq->have_posts() ) : 
		if($style=='pretty') : 
			echo '<div class="faq-pretty">';
			echo '<ul>';
			while ($flfaq->have_posts()) : $flfaq->the_post(); 
				$faqid = $post->ID; 
	?>
				<li class="faq-item" id="<?php echo $faqid; ?>">
					<div class="faq-question" id="<?php echo $faqid; ?>"><?php the_title(); ?></div>
					<div class="faq-answer" rel="<?php echo $faqid; ?>"><?php the_content(); ?></div>
				</li>
	<?php 
			endwhile;
			echo '</ul>';
			echo '</div>';
		elseif($style=='list') :
			echo '<div id="faq-list">';
				echo '<ul class="faq-list-question">';
					while ($flfaq->have_posts()) : $flfaq->the_post();
						$faqid = $post->ID; 
						echo '<li><a href="#'.$faqid.'">'. get_the_title() .'</a></li>';
					endwhile;
				echo '</ul>';
				echo '<div class="clear"></div>';
				echo '<ul class="faq-list-answer">';
					while ($flfaq->have_posts()) : $flfaq->the_post();
						$faqid = $post->ID;
						echo '<li id="'.$faqid.'">'. wpautop(get_the_content()) .'</li>';
					endwhile;
				echo '</ul>';
			echo '</div>';
			
		elseif($style="block") :
			echo '<div id="faq-block">';
			echo '<ul>';
			while ($flfaq->have_posts()) : $flfaq->the_post(); 
			?>
				<li class="faq-block-item">
					<div class="faq-block-question"><?php the_title(); ?></div>
					<div class="faq-block-answer"><?php the_content(); ?></div>
				</li>
			<?php 
			endwhile;
			echo '</ul>';
			echo '</div>';
		endif;
	else :
		echo 'Please add some FAQ to display here';
	endif; 
	wp_reset_query();
	$myvariable = ob_get_clean();
	return $myvariable;
}