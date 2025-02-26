<?php 
class ESSITCO_AMS_Store_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array( 
		  'classname' => 'essitco_ams_store_widget',
		  'description' => 'This is an Example Widget',
		);
		parent::__construct( 'essitco_ams_store_widget', 'Featured Stores', $widget_options );
	}
	
	public function widget( $args, $instance ) {
	  $title = apply_filters( 'widget_title', $instance[ 'title' ] );
	  echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

	  <?php $this->getFeatureStore($instance[ 'per_page' ]); ?>

	  <?php echo $args['after_widget'];
	}
	
	public function form( $instance ) {
	  $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
	  $per_page = ! empty( $instance['per_page'] ) ? $instance['per_page'] : '5'; ?>
	  <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
	  </p>
	  <p>
		<label for="<?php echo $this->get_field_id( 'per_page' ); ?>">Per Page:</label>
		<input class="tiny-text" type="number" id="<?php echo $this->get_field_id( 'per_page' ); ?>" name="<?php echo $this->get_field_name( 'per_page' ); ?>" value="<?php echo esc_attr( $per_page ); ?>" step="1" min="1" size="3" />
	  </p><?php 
	}
	
	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	  $instance[ 'per_page' ] = strip_tags( $new_instance[ 'per_page' ] );
	  return $instance;
	}
	
	public function getFeatureStore($per_page){
		$args = array(
			'post_type'     => 'store',
			'posts_per_page'=> $per_page,
			'post_status'   => 'publish',
			'orderby' 		=> array( 'meta_value_num' => 'ASC', 'date' =>'DESC' ),
			'order'         => 'ASC',
			'meta_query'    => array(
				'relation' => 'AND',
				array(
					'key' => 'is_featured',
					'value' => 'active',
					'compare' => '='
				)
			)
		);
		$stores = new WP_Query( $args );
		if( $stores->have_posts() ){
			echo '<ul class="AMS-featured-stores">';
			while($stores->have_posts()) : $stores->the_post();?>
				<li>
					<div class="AMS-width-40">
						<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'AMS-featured-stores-img' ) ); ?>
					</div>
					<div class="AMS-width-60">
						<h3><a href="<?php the_permalink(get_the_ID()) ?>"><?php the_title(); ?></a></h3>
						<p><?php echo substr(get_the_content(), 0, 20); ?>...</p>
						<span class="AMS-read-more"><a href="<?php the_permalink(get_the_ID()) ?>">Read More</a></span>
					</div>
				</li>
			<?php endwhile;
			echo '</ul>';
		}else{
			echo "no featured store available.";
		}
	}
}

class ESSITCO_AMS_offer_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array( 
		  'classname' => 'essitco_ams_offer_widget',
		  'description' => 'This is an Example Widget',
		);
		parent::__construct( 'essitco_ams_offer_widget', 'Featured Offers', $widget_options );
	}
	
	public function widget( $args, $instance ) {
	  $title = apply_filters( 'widget_title', $instance[ 'title' ] );
	  echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

	  <?php $this->getFeatureOffers($instance[ 'per_page' ]); ?>

	  <?php echo $args['after_widget'];
	}
	
	public function form( $instance ) {
	  $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
	  $per_page = ! empty( $instance['per_page'] ) ? $instance['per_page'] : '5'; ?>
	  <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
	  </p>
	  <p>
		<label for="<?php echo $this->get_field_id( 'per_page' ); ?>">Per Page:</label>
		<input class="tiny-text" type="number" id="<?php echo $this->get_field_id( 'per_page' ); ?>" name="<?php echo $this->get_field_name( 'per_page' ); ?>" value="<?php echo esc_attr( $per_page ); ?>" step="1" min="1" size="3" />
	  </p><?php 
	}
	
	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	  $instance[ 'per_page' ] = strip_tags( $new_instance[ 'per_page' ] );
	  return $instance;
	}
	
	public function getFeatureOffers($per_page){
		$args = array(
			'post_type'     => 'offer',
			'posts_per_page'=> $per_page,
			'post_status'   => 'publish',
			'orderby' 		=> array( 'meta_value_num' => 'ASC', 'date' =>'DESC' ),
			'order'         => 'ASC',
			'meta_query'    => array(
				'relation' => 'AND',
				array(
					'key' => 'is_featured',
					'value' => 'active',
					'compare' => '='
				),
				array(
					'key' => 'offer_start_date',
					'value' => current_time( 'timestamp' ),
					'compare' => '<='
				),
				array(
					'key' => 'offer_expire_date',
					'value' => current_time( 'timestamp' ),
					'compare' => '>='
				)
			)
		);
		$offers = new WP_Query( $args );
		if( $offers->have_posts() ){
			include(__dir__ .'/../templates/offer-loop.php');
		}else{
			echo "no featured offer available.";
		}
	}
}

function register_ESSITCO_AMS_Widget() { 
  register_widget( 'ESSITCO_AMS_Store_Widget' );
  register_widget( 'ESSITCO_AMS_offer_Widget' );
}
add_action( 'widgets_init', 'register_ESSITCO_AMS_Widget' );
?>