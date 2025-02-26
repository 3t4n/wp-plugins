<?php
namespace AewElementorLayout\Traits;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


trait RenderData{
	protected function aew_render_thumbnail() {	

		$settings = $this->get_settings();

		$show_image = $settings['show_image'];

		if ( 'yes' !== $show_image ) {
			return;
		}

		$post_thumbnail_size = $settings['post_thumbnail_size'];
			
		if ( has_post_thumbnail() ) :  ?>
			<div class="img-holder">
				<?php the_post_thumbnail( $post_thumbnail_size ); ?>
			</div> 
        <?php endif;
	}
	protected function aew_render_thumbnail_testimonial() {	

		$settings = $this->get_settings();

		$show_image = $settings['show_image'];

		if ( 'yes' !== $show_image ) {
			return;
		}
			
		if ( has_post_thumbnail() ) :  ?>
			<div class="img-holder">
				<?php the_post_thumbnail(); ?>
			</div> 
        <?php endif;
	}

	protected function aew_render_title() {	

		$settings = $this->get_settings();

		$show_title = $settings['show_title'];

		if ( 'yes' !== $show_title ) {
			return;
		}

		$title_tag = $settings['title_tag'];
		$postId = get_the_ID();
		$post_type = get_post_type( $postId );
	?>
		
		<<?php echo $title_tag; ?>  class="post-title">
		<?php if($post_type == 'abt_promotion'){ ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		<?php } else { ?>
			<?php the_title(); ?>
		<?php } ?>
		</<?php echo $title_tag; ?>>
		
		<?php
	}

	protected function aew_render_content() {	

		$settings = $this->get_settings();

		$show_content = $settings['show_content'];

		if ( 'yes' !== $show_content ) {
			return;
		}
			the_content(); 
	}

	protected function aew_render_meta() {

		$settings = $this->get_settings();

		$meta_data = $settings['meta_data'];

		if ( empty( $meta_data ) ) {
			return;
		}
		
		?>
		 <div class="info">
            <ul>
			<?php

			if ( in_array( 'date', $meta_data ) ) { ?>

				<li>
					<a href="#">
						<?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?>
					</a>
				</li>

				<?php
			}

			if ( in_array( 'author', $meta_data ) ) { ?>

				<li><a href="#"><?php the_author(); ?></a></li>

				<?php 
			}

			if ( in_array( 'comments', $meta_data ) ) { ?>
				
				<li><a href="#"><?php comments_number(); ?></a></li>

				<?php
			}
			?>
			</ul>
		</div>
		<?php

	}

	protected function aew_render_category() {

		$settings = $this->get_settings();

		$meta_data = $settings['meta_data'];

		if ( empty( $meta_data ) ) {
			return;
		}
		
		if ( in_array( 'categories', $meta_data ) ) {

			$categories_list = get_the_category_list( esc_html__( ' ', 'post-grid-elementor-addon' ) ); 

				if ( $categories_list ) {

				    printf( '<div class="category">%s</div>', $categories_list );
				}
				
			}

	}
	
	public function aew_excerpt_length( $length ) {

		$settings = $this->get_settings();

		$excerpt_length = (!empty( $settings['excerpt_length'] ) ) ? absint( $settings['excerpt_length'] ) : 1;

		return absint( $excerpt_length );
	}


	public function aew_excerpt_more( $more ) {
		return '&hellip;';
	}

	protected function aew_render_excerpt( $value = null ) {

		$settings = $this->get_settings();

		$show_excerpt = $settings['show_excerpt'];
		

		if ( 'yes' !== $show_excerpt ) {
			return;
		}
		
		add_filter( 'excerpt_more', [ $this, 'aew_excerpt_more' ], 20 );
		add_filter( 'excerpt_length', [ $this, 'aew_excerpt_length' ], 9999 );

		?>
		<?php 
		
			the_excerpt();
				
		    ?>
		<?php

		remove_filter( 'excerpt_length', [ $this, 'aew_excerpt_length' ], 9999 );
		remove_filter( 'excerpt_more', [ $this, 'aew_excerpt_more' ], 20 );
	}

	protected function aew_render_disclaimer( $value = null ) {

		$settings = $this->get_settings();

		$show_disclaimer = $settings['show_disclaimer'];
		

		if ( 'yes' !== $show_disclaimer ) {
			return;
		}
			$custom = get_post_custom(get_the_ID());
			
			if ($custom['abt_disclaimer'][0]){ ?>
			<p class="disclaimer"><?php echo esc_html($custom['abt_disclaimer'][0]); ?></p>
		<?php }
	}

	protected function aew_render_position( $value = null ) {
		$settings = $this->get_settings();

		
			$custom = get_post_custom(get_the_ID());
			
			if ($custom['abt_position'][0]){ ?>
			<span class="organization">
			<?php echo esc_html($custom['abt_position'][0]); ?>
			</span>
		<?php }
	}

	protected function aew_render_readmore() {

		$settings = $this->get_settings();

		$show_read_more = $settings['show_read_more'];
		$read_more_text = $settings['read_more_text'];

		if ( 'yes' !== $show_read_more ) {
			return;
		}
		?>
		<a class="btn apply-btn" href="<?php the_permalink(); ?>"><?php echo esc_html( $read_more_text ); ?></a>
		<?php

	}
}