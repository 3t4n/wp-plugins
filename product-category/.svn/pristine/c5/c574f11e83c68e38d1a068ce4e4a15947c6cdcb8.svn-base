<?php
/**
 * Register and load the PCW Widget.
 *
 * @return void
 * @since 1.0.0
 */
function pcw_load_widget() {
	register_widget( 'product_category_widget' );
}
add_action( 'widgets_init', 'pcw_load_widget' );

/**
 * Class product_category_widget
 */
class Product_Category_Widget extends WP_Widget {

	/**
	 * Construct method.
	 */
	public function __construct() {
		parent::__construct(
			// Base ID of your PCW Widget.
			'product_category_widget',
			// PCW Widget name will appear in UI.
			esc_html__( 'Product Category', 'pcw_widget_domain' ),
			// PCW Widget description.
			array( 'description' => esc_html__( 'Design Your Product Category Page Dynamically.', 'pcw_widget_domain' ) )
		);
	}

	/**
	 * Enqueue Style & Script.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function pcw_custom_load() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}

	/**
	 * Creating PCW Widget front-end.
	 *
	 * @param array $args arguments.
	 * @param array $instance instance.
	 * @return void
	 * @since 1.0.0
	 */
	public function widget( $args, $instance ) {
		$title      = apply_filters( 'widget_title', $instance['title'] );
		$page       = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$per_page   = $instance['number'];
		$offset     = ( $page > 0 ) ? $per_page * ( $page - 1 ) : 1;
		$pagination = isset( $instance['pagination'] ) ? $instance['pagination'] : '';

		// Before and after PCW Widget arguments are defined by themes.
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
		}

		// This is where you run the code and display the output.
		echo wp_kses_post( $args['after_widget'] );
		if ( 'parent-cat' == $instance['select'] ) :
			$prod_categories = get_terms(
				'product_cat',
				array(
					'parent'     => 0,
					'orderby'    => $instance['orderby'],
					'order'      => $instance['order'],
					'hide_empty' => false,
					'number'     => $per_page,
					'offset'     => $offset,
				)
			);
		else :
			$prod_categories = get_terms(
				'product_cat',
				array(
					'orderby'    => $instance['orderby'],
					'order'      => $instance['order'],
					'hide_empty' => 0,
					'number'     => $per_page,
					'offset'     => $offset,
				)
			);
		endif;
		?>
		<div class="woocommerce">
			<?php
			if ( 'default-style' == $instance['select_style'] ) :
				?>
				<div class="product-container <?php echo esc_attr( $instance['radio'] ); ?> columns-<?php echo esc_attr( $instance['columns'] ); ?>">
			<?php else : ?>
				<div class="product-container columns-<?php echo esc_attr( $instance['columns'] ); ?>">
			<?php endif; ?>
				<?php
				foreach ( $prod_categories as $prod_cat ) :
					$cat_thumb_id           = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
					$shop_catalog_img       = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
					$empty_shop_catalog_img = plugins_url( 'product-category\admin\images\placeholder.png' );
					$term_link              = get_term_link( $prod_cat, 'product_cat' );
					?>
					<div class="product-cats">
						<div class="pro-img">
							<?php
							if ( 'default-style' == $instance['select_style'] ) :
								?>
								<?php if ( $shop_catalog_img ) : ?>
									<a href="<?php echo esc_url( $term_link ); ?>"><img src="<?php echo esc_url( $shop_catalog_img[0] ); ?>" /></a>
								<?php else : ?>
									<a href="<?php echo esc_url( $term_link ); ?>"><img src="<?php echo esc_url( $empty_shop_catalog_img ); ?>" class="pcw-placeholder" /></a>
								<?php endif; ?>
							<?php else : ?>
								<?php if ( $shop_catalog_img ) : ?>
									<a href="<?php echo esc_url( $term_link ); ?>"><img style="border-radius: <?php echo esc_attr( $instance['select2'] ); ?>" src="<?php echo esc_url( $shop_catalog_img[0] ); ?>" /></a>
								<?php else : ?>
									<a href="<?php echo esc_url( $term_link ); ?>"><img style="border-radius: <?php echo esc_attr( $instance['select2'] ); ?>" src="<?php echo esc_url( $empty_shop_catalog_img ); ?>" /></a>
									<?php endif; ?>
							<?php endif; ?>
						</div>
						<div class="pro-name">
							<?php
							if ( 'default-style' == $instance['select_style'] ) :
								?>
								<a href="<?php echo esc_attr( $term_link ); ?>"><?php echo esc_html( $prod_cat->name ); ?> <?php echo esc_html( "($prod_cat->count)" ); ?></a>
								<?php else : ?>
								<a style="
								font-size: <?php echo esc_attr( $instance['select3'] ); ?>;
								font-weight: <?php echo esc_attr( $instance['select4'] ); ?>;
								font-family: <?php echo esc_attr( $instance['select5'] ); ?>;
								letter-spacing: <?php echo esc_attr( $instance['select6'] ); ?>;
									<?php if ( ! empty( $instance['bg_color'] ) ) : ?>
										color: <?php echo esc_attr( $instance['bg_color'] ); ?>
									<?php endif; ?>
								"
								href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $prod_cat->name ); ?> <?php echo esc_html( "($prod_cat->count)" ); ?></a>
							<?php endif; ?>
						</div>
						<?php
						if ( 'true' == $instance['description'] ) :
							?>
							<div class="pro-desc">
								<?php echo esc_html( $prod_cat->description ); ?>
							</div>
						<?php endif; ?>
					</div>
					<?php
					endforeach;
				wp_reset_postdata();
				?>
			</div>
			<?php
			if ( 'show' === $pagination ) {
				?>
				<nav class="woocommerce-pagination pcw-product-cat">
					<?php
					$big   = 999999999;
					$total = wp_count_terms( 'product_cat' );
					echo wp_kses_post(
						paginate_links(
							array(
								'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'    => '',
								'prev_text' => __( '&#x2190;' ),
								'next_text' => __( '&#x2192;' ),
								'type'      => 'list',
								'total'     => ceil( $total / $per_page ),
								'current'   => max( 1, get_query_var( 'paged' ) ),
							)
						)
					);
					?>
				</nav>
				<?php
			}
			?>
		</div>
		<?php
	}

	/**
	 * PCW Widget Backend.
	 *
	 * @since 1.0.0
	 * @param array $instance - escaping output.
	 */
	public function form( $instance ) {

		if ( isset( $instance['title'] ) && isset( $instance['select'] ) ) {
			$title = $instance['title'];
		} else {
			$title = esc_html__( 'New title', 'pcw_widget_domain' );
		}

		// PCW Widget admin form.
		?>
		<script type='text/javascript'>
		jQuery(document).ready(function($) {
			jQuery('#<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>').wpColorPicker();
			jQuery(".form1, .form2").hide();
			jQuery(".select-style").on('change', function (){
				if(this.value == 'your-style'){
					jQuery(".form1").css("display", "block");
					jQuery(".form2").css("display", "none");
				}
				else{
					jQuery(".form1").css("display", "none");
					jQuery(".form2").css("display", "block");
				}
			}).trigger( "change" );
		});
		</script>
		<p>
		<h2 for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php __( 'Title:' ); ?></h2>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		<br>
		<div class="cat-selection">
		<h2>Display Category:</h2>
		<select for="<?php echo esc_attr( $this->get_field_id( 'select' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select' ) ); ?>" class="select-cat">
			<option <?php selected( $instance['select'], 'parent-cat' ); ?> value="parent-cat">Parent-Category</option>
			<option <?php selected( $instance['select'], 'subcat' ); ?> value="subcat">Parent-Category + Sub-Category</option>
		</select>
		</div>
		<div class="style-selection">
		<h2>Select Style:</h2>
		<select for="<?php echo esc_attr( $this->get_field_id( 'select_style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select_style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select_style' ) ); ?>" class="select-style">
			<option>-- Select --</option>
			<option <?php selected( $instance['select_style'], 'your-style' ); ?> value="your-style">Pick Your Style</option>
			<option <?php selected( $instance['select_style'], 'default-style' ); ?> value="default-style">Default Style</option>
		</select>
		</div>
		<br>
		<ul class="admin_pro_cat">
			<form class="form1" >
			<h2>Pick Your Style:</h2>
			<div class="admin-content">
			<li>Image Border Radius</li>
			<select for="<?php echo esc_attr( $this->get_field_id( 'select2' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select2' ) ); ?>">
				<option <?php selected( $instance['select2'], '0px' ); ?> value="0px">0px</option>
				<option <?php selected( $instance['select2'], '5px' ); ?> value="5px" selected>5px</option>
				<option <?php selected( $instance['select2'], '10px' ); ?> value="10px">10px</option>
				<option <?php selected( $instance['select2'], '15px' ); ?> value="15px">15px</option>
				<option <?php selected( $instance['select2'], '20px' ); ?> value="20px">20px</option>
			</select>
			<br><br>
			<li>Text Font Size</li>
			<select for="<?php echo esc_attr( $this->get_field_id( 'select3' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select3' ) ); ?>">
				<option <?php selected( $instance['select3'], '8px' ); ?> value="8px">8px</option>
				<option <?php selected( $instance['select3'], '10px' ); ?> value="10px">10px</option>
				<option <?php selected( $instance['select3'], '12px' ); ?> value="12px">12px</option>
				<option <?php selected( $instance['select3'], '14px' ); ?> value="14px" selected>14px</option>
				<option <?php selected( $instance['select3'], '16px' ); ?> value="16px">16px</option>
				<option <?php selected( $instance['select3'], '18px' ); ?> value="18px">18px</option>
			</select>
			<br><br>
			<li>Text Font Weight</li>
			<select for="<?php echo esc_attr( $this->get_field_id( 'select4' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select4' ) ); ?>">
				<option <?php selected( $instance['select4'], '200' ); ?> value="200">200</option>
				<option <?php selected( $instance['select4'], '300' ); ?> value="300">300</option>
				<option <?php selected( $instance['select4'], '400' ); ?> value="400">400</option>
				<option <?php selected( $instance['select4'], '500' ); ?> value="500" selected>500</option>
				<option <?php selected( $instance['select4'], '600' ); ?> value="600">600</option>
				<option <?php selected( $instance['select4'], '700' ); ?> value="700">700</option>
				<option <?php selected( $instance['select4'], '800' ); ?> value="800">800</option>
			</select>
			<br><br>
			<li>Text Font Family</li>
			<select for="<?php echo esc_attr( $this->get_field_id( 'select5' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select5' ) ); ?>">
				<option <?php selected( $instance['select5'], "'Roboto', sans-serif" ); ?> value="'Roboto', sans-serif">Roboto</option>
				<option <?php selected( $instance['select5'], "'Poppins', sans-serif" ); ?> value="'Poppins', sans-serif" selected>Poppins</option>
				<option <?php selected( $instance['select5'], "'Open Sans', sans-serif" ); ?> value="'Open Sans', sans-serif">Open Sans</option>
				<option <?php selected( $instance['select5'], "'Lato', sans-serif" ); ?> value="'Lato', sans-serif">Lato</option>
				<option <?php selected( $instance['select5'], "'Montserrat', sans-serif" ); ?> value="'Montserrat', sans-serif">Montserrat</option>
				<option <?php selected( $instance['select5'], "'Oswald', sans-serif" ); ?> value="'Oswald', sans-serif">Oswald</option>
				<option <?php selected( $instance['select5'], "'Raleway', sans-serif" ); ?> value="'Raleway', sans-serif">Raleway</option>
				<option <?php selected( $instance['select5'], "'Titillium Web', sans-serif" ); ?> value="'Titillium Web', sans-serif">Titillium Web</option>
				<option <?php selected( $instance['select5'], "'Lobster', cursive" ); ?> value="'Lobster', cursive">Lobster</option>
				<option <?php selected( $instance['select5'], "'Arvo', serif" ); ?> value="'Arvo', serif">Arvo</option>
				<option <?php selected( $instance['select5'], "'Josefin Sans', sans-serif" ); ?> value="'Josefin Sans', sans-serif">Josefin Sans</option>
				<option <?php selected( $instance['select5'], "'Great Vibes', cursive" ); ?> value="'Great Vibes', cursive">Great Vibes</option>
				<option <?php selected( $instance['select5'], "'Courgette', cursive" ); ?> value="'Courgette', cursive">Courgette</option>
				<option <?php selected( $instance['select5'], "'Amaranth', sans-serif" ); ?> value="'Amaranth', sans-serif">Amaranth</option>
				<option <?php selected( $instance['select5'], "'Special Elite', cursive" ); ?> value="'Special Elite', cursive">Special Elite</option>
				<option <?php selected( $instance['select5'], "'Salsa', cursive" ); ?> value="'Salsa', cursive">Salsa</option>
				<option <?php selected( $instance['select5'], "'Bungee Shade', cursive" ); ?> value="'Bungee Shade', cursive">Bungee Shade</option>
				<option <?php selected( $instance['select5'], "'Trade Winds', cursive" ); ?> value="'Trade Winds', cursive">Trade Winds</option>
				<option <?php selected( $instance['select5'], "'Chango', cursive" ); ?> value="'Chango', cursive">Chango</option>
			</select>
			<br><br>
			<li>Text Letter Spacing</li>
			<select for="<?php echo esc_attr( $this->get_field_id( 'select6' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select6' ) ); ?>">
				<option <?php selected( $instance['select6'], '0px' ); ?> value="0px">0px</option>
				<option <?php selected( $instance['select6'], '1px' ); ?> value="1px" selected>1px</option>
				<option <?php selected( $instance['select6'], '2px' ); ?> value="2px">2px</option>
				<option <?php selected( $instance['select6'], '3px' ); ?> value="3px">3px</option>
				<option <?php selected( $instance['select6'], '4px' ); ?> value="4px">4px</option>
				<option <?php selected( $instance['select6'], '5px' ); ?> value="5px">5px</option>
			</select>
			<br><br>
			<li>Text Color</li>
			<input for="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bg_color' ) ); ?>" value="<?php echo esc_attr( $instance['bg_color'] ); ?>" class="color-picker">
			</div>
			</form>
			<form class="form2" >
				<h3>Default Style:</h3>
				<div class="admin-content">
					<label class="container">Style One
						<input <?php if ( $instance['radio'] == 'style1' ) : echo 'checked'; endif; ?> id="<?php echo esc_attr( $this->get_field_id( 'radio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'radio' ) ); ?>" type="radio" name="radio" value="style1"><br><br>
					<span class="checkmark"></span>
					</label>
					<label class="container">Style Two
					<input <?php if($instance['radio'] == 'style2'): echo 'checked';  endif; ?> id="<?php echo esc_attr( $this->get_field_id( 'radio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'radio' ) ); ?>" type="radio" name="radio" value="style2"><br><br>
					<span class="checkmark"></span>
					</label>
					<label class="container">Style Three
					<input <?php if($instance['radio'] == 'style3'): echo 'checked';  endif; ?> id="<?php echo esc_attr( $this->get_field_id( 'radio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'radio' ) ); ?>" type="radio" name="radio" value="style3"><br><br>
					<span class="checkmark"></span>
					</label>
					<label class="container">Style Four
					<input <?php if($instance['radio'] == 'style4'): echo 'checked';  endif; ?> id="<?php echo esc_attr( $this->get_field_id( 'radio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'radio' ) ); ?>" type="radio" name="radio" value="style4"><br><br>
					<span class="checkmark"></span>
					</label>
					<label class="container">Style Five
					<input <?php if($instance['radio'] == 'style5'): echo 'checked';  endif; ?> id="<?php echo esc_attr( $this->get_field_id( 'radio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'radio' ) ); ?>" type="radio" name="radio" value="style5"><br><br>
					<span class="checkmark"></span>
					</label>
				</div>
			</form>
		</ul>
		<div class="number-selection">
		<h2>Enter Number Of Categories:</h2>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>" />
		</div>
		<div class="column-selection">
		<h2>Enter Number Of Columns:</h2>
		<input placeholder="Max: 6" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['columns'] ); ?>" />
		</div>
		<div class="orderby-selection">
		<h2>Orderby:</h2>
		<select for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>">
			<option <?php selected( $instance['orderby'], 'name' ); ?> value="name" selected>Name</option>
			<option <?php selected( $instance['orderby'], 'slug' ); ?> value="slug">Slug</option>
		</select>
		</div>
		<div class="order-selection">
		<h2>Order:</h2>
		<select for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>">
			<option <?php selected( $instance['order'], 'ASC' ); ?> value="ASC" selected>ASC</option>
			<option <?php selected( $instance['order'], 'DESC' ); ?> value="DESC">DESC</option>
		</select>
		</div>
		<div class="desc-selection">
		<h2>Show Description:</h2>
		<select for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>">
			<option <?php selected( $instance['description'], 'true' ); ?> value="true" selected>Yes</option>
			<option <?php selected( $instance['description'], 'false' ); ?> value="false">No</option>
		</select>
		</div>
		<div class="desc-selection">
		<h2>Show/Hide Pagination:</h2>
		<select for="<?php echo esc_attr( $this->get_field_id( 'pagination' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'pagination' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pagination' ) ); ?>">
			<option <?php selected( $instance['pagination'], 'show' ); ?> value="show" selected>Show</option>
			<option <?php selected( $instance['pagination'], 'hide' ); ?> value="hide">Hide</option>
		</select>
		</div>
		<?php
	}

	/**
	 * Updating PCW Widget replacing old instances with new.
	 *
	 * @since 1.0.0
	 * @param array $new_instance - New instance.
	 * @param array $old_instance - Old instance.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = array();
		$instance['title']        = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['select']       = ( ! empty( $new_instance['select'] ) ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
		$instance['select_style'] = ( ! empty( $new_instance['select_style'] ) ) ? wp_strip_all_tags( $new_instance['select_style'] ) : '';
		$instance['select2']      = ( ! empty( $new_instance['select2'] ) ) ? wp_strip_all_tags( $new_instance['select2'] ) : '';
		$instance['select3']      = ( ! empty( $new_instance['select3'] ) ) ? wp_strip_all_tags( $new_instance['select3'] ) : '';
		$instance['select4']      = ( ! empty( $new_instance['select4'] ) ) ? wp_strip_all_tags( $new_instance['select4'] ) : '';
		$instance['select5']      = ( ! empty( $new_instance['select5'] ) ) ? wp_strip_all_tags( $new_instance['select5'] ) : '';
		$instance['select6']      = ( ! empty( $new_instance['select6'] ) ) ? wp_strip_all_tags( $new_instance['select6'] ) : '';
		$instance['bg_color']     = ( ! empty( $new_instance['bg_color'] ) ) ? wp_strip_all_tags( $new_instance['bg_color'] ) : '';
		$instance['radio']        = ( ! empty( $new_instance['radio'] ) ) ? wp_strip_all_tags( $new_instance['radio'] ) : '';
		$instance['number']       = ( ! empty( $new_instance['number'] ) ) ? wp_strip_all_tags( $new_instance['number'] ) : '';
		$instance['columns']      = ( ! empty( $new_instance['columns'] ) ) ? wp_strip_all_tags( $new_instance['columns'] ) : '';
		$instance['orderby']      = ( ! empty( $new_instance['orderby'] ) ) ? wp_strip_all_tags( $new_instance['orderby'] ) : '';
		$instance['order']        = ( ! empty( $new_instance['order'] ) ) ? wp_strip_all_tags( $new_instance['order'] ) : '';
		$instance['description']  = ( ! empty( $new_instance['description'] ) ) ? wp_strip_all_tags( $new_instance['description'] ) : '';
		$instance['pagination']   = ( ! empty( $new_instance['pagination'] ) ) ? wp_strip_all_tags( $new_instance['pagination'] ) : '';
		return $instance;
	}
}
