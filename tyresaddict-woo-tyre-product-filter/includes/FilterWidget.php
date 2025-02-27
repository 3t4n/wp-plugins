<?php

/**
 * The main Filter widget
 *
 * @since      1.0.0
 * @package    TyresAddict/TyreFilter
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TyreFilter;


/**
 * Widget class
 */
class FilterWidget extends \WP_Widget 
{
	const shortcode = 'tyresaddict-tyre-filter';
	const default_options = [ 
		'category' => ''
	];


	// Register widget with WordPress.

	function __construct() 
	{
		parent::__construct(
			'tyresaddict_woo_tyre_filter_wgt', // Base ID
			__( 'TyresAddict Tyre Product Filter', Plugin::lang ), // Name
			[ 'description' => __( 'TyresAddict Tyre Product Filter. Tyres by size and parameters like season.', Plugin::lang ), ] // Args
		);
	}


	public function register() 
	{
		add_shortcode( FilterWidget::shortcode, [ $this, 'widget_shortcode' ] );
	}
	
	
	public function widget_shortcode( $atts, $content = null ) 
	{
		if ( !Woo::is_product_list() )
			return;

	    $atts = array_change_key_case( (array) $atts, CASE_LOWER );		
	    $options = shortcode_atts( self::default_options, $atts );

		if ( $options['category'] != '' && !Woo::product_category_of( $options['category'] ) )
			return;

		ob_start();
			$this->template( $options );
		return ob_get_clean();
	}
	
	public static function template( $options )
	{
		$params['tyre_width']	= DB::tyre_width();
		$params['tyre_profile']	= DB::tyre_profile();
		$params['tyre_r']		= DB::tyre_r();

		$params['brands'] 		= Db::brands();
		$params['car_types'] 	= Db::car_types();
		$params['seasons']		= DB::seasons();

		$params['r_width']		= Request::width();
		$params['r_profile']	= Request::profile();
		$params['r_r']			= Request::r();
		$params['r_season']		= Request::season();
		$params['r_car_type']	= Request::car_type();
		$params['r_brand']		= Request::brand();


		$params['form_url']		= ( $options['category'] == '' ) ? Woo::shop_url() : Woo::category_url( $options['category'] );
		wp_enqueue_style( Plugin::name );
		wp_enqueue_script( Plugin::name );
		wp_localize_script( Plugin::name, 'taw_tyre_filter', [
			'ajax_url'   => admin_url( 'admin-ajax.php' ),
		] );

		$template = new Template();
		$template->display('filter', 'white', $params);
	}
	
	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 */
	public function widget( $args, $instance ) 
	{
		if ( !Woo::is_product_list() )
			return;

		$category = !empty( $instance['category'] ) ? $instance['category'] : '';

		if ( $category != '' && !Woo::product_category_of( $category ) )
			return;

		echo $args['before_widget'];
	
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		$this->template( [ 'category' => $category ] );
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 */
	public function form( $instance ) 
	{
		$title 			= !empty( $instance['title'] ) ? $instance['title'] : '';
		$category_slug 	= !empty( $instance['category'] ) ? $instance['category'] : '';

		$categories = Woo::top_product_categories();
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?=__( 'Title:', Plugin::lang ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?= esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?=__( 'Work and show only in category:', Plugin::lang ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?=esc_html( $this->get_field_name( 'category' ) ); ?>">
			 	<option 
			 		<?php selected( '', $category_slug ); ?>
			 		value=""><?=__('All categories', Plugin::lang ) ?></option>
			 	<?php foreach( $categories as $slug => $category ): ?>
				 	<option 
				 		<?php selected( $slug, $category_slug ); ?>
				 		value="<?=$slug ?>"><?=esc_html( $category ) ?></option>
			 	<?php endforeach ?>
			</select>
		</p>

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 */
	public function update( $new_instance, $old_instance ) 
	{
		$instance = [];
		$instance['title'] 		= ( !empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['category'] 	= ( !empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';

		PluginOptions::update( 'category', $instance['category'] );
		return $instance;
	}

} // class FilterWidget


