<?php
/*
 * Page Name: Settings
 */

use CounterBox\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/settings.php' );
$field    = new CreateFields( $options, $page_opt );
$id       = $options['id'] ?? '';
?>

    <div class="wpie-fieldset">
        <div class="wpie-fields">
			<?php $field->create( 'type' ); ?>
        </div>
        <div class="wpie-fieldset wpie-box-countdown">
            <div class="wpie-fields">
				<?php $field->create( 'dayweek' ); ?>
				<?php $field->create( 'date' ); ?>
				<?php $field->create( 'time' ); ?>
				<?php $field->create( 'timezone' ); ?>
            </div>
        </div>
        <div class="wpie-fieldset wpie-box-timer">
            <div class="wpie-fields">
				<?php $field->create( 'day' ); ?>
				<?php $field->create( 'hours' ); ?>
				<?php $field->create( 'minutes' ); ?>
				<?php $field->create( 'seconds' ); ?>
            </div>
        </div>

        <div class="wpie-fieldset wpie-box-counter">
            <div class="wpie-legend"><?php esc_html_e( 'Number range', 'counter-box' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'start' ); ?>
				<?php $field->create( 'finish' ); ?>
				<?php $field->create( 'base_number' ); ?>
            </div>
        </div>

        <div class="wpie-fieldset wpie-box-counter">
            <div class="wpie-legend"><?php esc_html_e( 'Speed range', 'counter-box' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'speed_min' ); ?>
				<?php $field->create( 'speed_max' ); ?>
            </div>
        </div>
        <div class="wpie-fieldset wpie-box-counter">
            <div class="wpie-legend"><?php esc_html_e( 'Increase / Decrease', 'counter-box' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'increment_min' ); ?>
				<?php $field->create( 'increment_max' ); ?>
				<?php $field->create( 'change_number' ); ?>
            </div>
        </div>

        <div class="wpie-fieldset wpie-box-counter">
            <div class="wpie-legend"><?php esc_html_e( 'Number options', 'counter-box' ); ?></div>
            <div class="wpie-fields">
			    <?php $field->create( 'rounding' ); ?>
            </div>
        </div>

    </div>


<?php
