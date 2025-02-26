<?php

class ShowPostLatestByCategory_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'spr_widget', 
			esc_html__( 'Show Post Latest By Category', 'show-post-latest' ), 
			array( 'description' => esc_html__( 'Show Post Latest By Category', 'show-post-latest' ), ) 
		);
	}

	public function widget( $args, $instance ) {
		$isAvatar   = $instance[ 'isavatar' ] ? false : true;
		$isDescrip  = $instance[ 'description' ] ? false : true;
		$isAuthDate  = $instance[ 'author_date' ] ? false : true;
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		?>
			<div class="tvc-show-post-related">
				<ul>
					<?php $getposts = new WP_query(); 
					$i=1;
					$getposts->query('post_status=publish&showposts='.$instance['num'].'&post_type=post&cat='.$instance['cate'].''); ?>
	                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
	                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
	                	<li>
	                		<a href="<?php the_permalink(); ?>">
                				<?php if($isAvatar){ 
                					?>
                						<div class="image_post">
            								<?php $urlImage = get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_thumb_url( get_post_thumbnail_id(get_the_ID()) ) : TVC_SPLC_PLUGIN_URL .'/images/no-thumbnail.png'; ?>
	                          				<img src="<?php echo $urlImage; ?>">
                						</div>
		                             
		                        	<?php 
		                        	} 
		                        ?>
	                			<div class="content_post">
	                				<h2><?php the_title(); ?></h2>
	                				<?php 
	                					if($isDescrip){
	                						?>
	                							<p>
				                					<?php
					                                    $theExcerpt = get_the_excerpt();
					                                    if (strlen($theExcerpt) > 120) {
					                                        echo substr($theExcerpt, 0, 120) . '(...)';
					                                    } else {
					                                        echo $theExcerpt;
					                                    }
					                                ?>
				                				</p>
	                						<?php
	                					}
	                				?>
	                				<?php 
	                					if($isAuthDate){
	                						?>
	                							<span class="tvc_post_author">
	                								<?php the_author(); ?>
	                							</span>
				                				<span class="tvc_post_date">
				                					<?php echo get_the_date('d/m/Y'); ?>
				                				</span>
	                						<?php
	                					}
	                				?>
	                				
	                				
	                			</div>
	                		</a>
	                	</li>
	                	<?php $i++; ?>
	                <?php endwhile; wp_reset_query(); ?>	
				</ul>	
			</div>
		<?php

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Latest Post', 'show-post-latest' );
		$num = ! empty( $instance['num'] ) ? $instance['num'] : esc_html__( 'Number of posts to show', 'show-post-latest' );
		$cate = ! empty( $instance['cate'] ) ? $instance['cate'] : esc_html__( 'Category', 'show-post-latest' );
		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_attr_e( 'Title:', 'show-post-latest' ); ?>
		</label> 
		<input 
		class="widefat" 
		id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
		name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
		type="text" 
		value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'num' ) ); ?>">
			<?php esc_attr_e( 'Number of posts to show:', 'show-post-latest' ); ?>
		</label> 
		<input 
		class="widefat" 
		id="<?php echo esc_attr( $this->get_field_id( 'num' ) ); ?>" 
		name="<?php echo esc_attr( $this->get_field_name( 'num' ) ); ?>" 
		type="number" 
		value="<?php echo esc_attr( $num ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'cate' ) ); ?>">
			<?php esc_attr_e( 'Category:', 'show-post-latest' ); ?>
		</label> 
		 <?php
                wp_dropdown_categories( array(
                    'show_option_none'  => 'All Category',
                    'option_none_value' => 0,
                    'orderby'           => 'count',
                    'hide_empty'        => false,
                    'hierarchical'      => 1,
                    'name'              => $this->get_field_name( 'cate' ),
                    'id'                => 'recent_posts_category',
                    'class'             => 'widefat',
                    'selected'          => $instance['cate']
                ));
            ?>
		</p>

		<p>
	 	<div class="group-data">
            <input type="checkbox" name="<?php echo esc_attr($this->get_field_name('isavatar') ) ; ?>" <?php checked( $instance[ 'isavatar' ], 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'isavatar' ) ); ?>">
            <label for="<?php echo esc_attr( $this->get_field_id( 'isavatar' ) ); ?>">Hide Avatar</label>
        </div>
        <div class="group-data">
            <input type="checkbox" name="<?php echo esc_attr($this->get_field_name('description') ) ; ?>" <?php checked( $instance[ 'description' ], 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">Hide Description</label>
        </div>
        <div class="group-data">
            <input type="checkbox" name="<?php echo esc_attr($this->get_field_name('author_date') ) ; ?>" <?php checked( $instance[ 'author_date' ], 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'author_date' ) ); ?>">
            <label for="<?php echo esc_attr( $this->get_field_id( 'author_date' ) ); ?>">Hide Author/Date</label>
        </div>
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['num'] = ( ! empty( $new_instance['num'] ) ) ? sanitize_text_field( $new_instance['num'] ) : '';

		$instance['cate'] = ( ! empty( $new_instance['cate'] ) ) ? sanitize_text_field( $new_instance['cate'] ) : '';

		$instance['isavatar'] = ( ! empty( $new_instance['isavatar'] ) ) ? sanitize_text_field( $new_instance['isavatar'] ) : '';

		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? sanitize_text_field( $new_instance['description'] ) : '';

		$instance['author_date'] = ( ! empty( $new_instance['author_date'] ) ) ? sanitize_text_field( $new_instance['author_date'] ) : '';


		return $instance;
	}

}