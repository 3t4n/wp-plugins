<?php
if ( ! defined( 'ABSPATH' ) ) {
	die() || exit();
}

// process to actions
wp_enqueue_script( 'awsa-post-actions-script' );
?>

<div class="aw-form">
	<div class="aw-notice-box"></div>
	<?php wp_nonce_field( 'awsa-' . $post_type . '-actions-ajax-' . date( 'd' ) . $post_id, '_awpanonce' ); ?>
	<select name="awsa-post-action[action]" id="awsa-post-action-<?php echo $post_id; ?>" class="awsa-post-action" style="width: 100%" data-post-id="<?php echo $post_id; ?>">
		<option value=""><?php esc_html_e( 'Select an operation...', 'awsa-shipping' ); ?></option>
		<?php
		$actions        = array();
		$actions_groups = apply_filters( 'awsa_' . $post_type . '_actions', array(), $post_id );
		foreach ( $actions_groups as $id => $group ) {
			if ( isset( $group['actions'] ) && ! empty( $group['actions'] ) ) {
				echo '<optgroup label="' . $group['title'] . '">';
				foreach ( $group['actions'] as $action_key => $title ) {
					$can = apply_filters( 'awsa_' . $post_type . '_action_can', true, $action_key, $post_id );
					if ( $can === true ) {
						$actions[ $action_key ] = $title;
						echo '<option value="' . $action_key . '">' . $title . '</option>';
					}
				}
				echo '</optgroup>';
			}
		}
		?>
	</select>
	<div class="awsa-post-actions-box-properties">
		<?php
		foreach ( $actions as $action_key => $title ) {
			$name = 'awsa-actions-peroperties';
			echo '<p id="' . esc_attr( $action_key ) . '" class="hidden">';
						do_action( 'awsa_' . $post_type . '_action_html_properties', $action_key, $name, $post_id );
			echo '</p>';
		}
		?>
			   
	</div>

	<p style="direction: ltr">
		<button id="awsa-post-ajax-actions-<?php echo esc_attr( $post_id ); ?>" class="awsa-post-ajax-actions button button-secondary" style=""><?php esc_html_e( 'Run', 'awsa-shipping' ); ?></button>
	</p>
</div>
