<?php
defined( 'ABSPATH' ) or exit;

class MPWPFormsWidget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			MPWP_PREFIX . '_widget',
			esc_attr__( '@MediaPost - Formulários de cadastro', 'mpwp_forms' ),
			array(
				'description' => esc_attr__( 'Formulários de cadastro integrados com sua conta @MediaPost', 'mpwp_forms' )
			) 
		);
	}

	/**
	 * Exibe o HTML do widget/formulário
	 *
	 * @params (array) $args e (array) $instance
	 */
	public function widget( $args, $instance ) {
		
		$form_id = apply_filters( 'widget_form_id', $instance['form_id'] );
		
		echo $args['before_widget'];
		
		if ( !empty( $form_id ) ) {
			$form = mpwpFormsGetFormHTML( $form_id );
			echo $form;
		}
		
		echo $args['after_widget'];
		
	}

	/**
	 * Salva as alterações feitas no widget
	 *
	 * @param (array) $new_instance
	 * @param (array) $old_instance
	 *
	 * @return (array) $instance
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = array(
			'form_id' => ( ! empty( $new_instance['form_id'] ) ) ? strip_tags( $new_instance['form_id'] ) : ""
		);

		return $instance;

	}
	
	/**
	 * Exibe o widget no menu widget do wordpress
	 *
	 * @param (array) $instance
	 */
	public function form( $instance ) {
		
		$instance['form_id'] = empty( $instance['form_id'] ) ? '' : $instance['form_id'];
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'form_id' ); ?>"><?php esc_attr_e( 'Formulários:', 'mpwp_forms' ) ?></label>
			<select id="<?php echo $this->get_field_id( 'form_id' ); ?>" name="<?php echo $this->get_field_name( 'form_id' ); ?>" class="widefat">
				<?php
				$forms = get_posts(
					array(
						'posts_per_page' => '100',
						'post_type' 	 => MPWP_POST_TYPE,
						'post_status' 	 => 'publish'
					)
				);
				if ( !empty( $forms ) ) {
					foreach ( $forms as &$form ) {
						printf( '<option value="%d" %s>%s</option>', $form->ID, selected( $instance['form_id'], $form->ID, false ), esc_html( $form->post_title ) );
					}		
				} else {
					printf( '<option value="">%s</option>', esc_attr__( 'Nenhum formlário encontrado.', 'mpwp_forms' ) );
				}
				?>
			</select>
		</p>
		<?php

	}
}

function mpwpFormsLoadWidget() {
	register_widget( 'MPWPFormsWidget' );
}
add_action( 'widgets_init', 'mpwpFormsLoadWidget' );
?>