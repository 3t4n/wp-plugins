<?php
/*
 * Page Name: Style
 */

use CounterBox\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/style.php' );
$field    = new CreateFields( $options, $page_opt );

?>

    <div class="wpie-fieldset">
        <div class="wpie-legend"><?php esc_html_e( 'Style', 'counter-box' ); ?></div>
        <div class="wpie-fields">
			<?php $field->create( 'width' ); ?>
			<?php $field->create( 'height' ); ?>
			<?php $field->create( 'background' ); ?>
			<?php $field->create( 'border_radius' ); ?>
        </div>
        <div class="wpie-fields">
		    <?php $field->create( 'border_style' ); ?>
		    <?php $field->create( 'border_width' ); ?>
		    <?php $field->create( 'border_color' ); ?>
        </div>
    </div>

<?php