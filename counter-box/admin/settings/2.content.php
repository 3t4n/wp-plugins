<?php
/*
 * Page Name: Content
 */

use CounterBox\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/content.php' );
$field    = new CreateFields( $options, $page_opt );
?>

    <div class="wpie-fieldset">
        <div class="wpie-fields is-column">
			<?php $field->create( 'content' ); ?>
        </div>
        <div class="wpie-fields is-column wpie-box-countdown wpie-box-timer">
            You can use the next shortcodes in the content for display the counters:
            <ul>
                <li><b>{day}</b> - display of days count</li>
                <li><b>{hour}</b> - display of hours count</li>
                <li><b>{min}</b> - display of minutes count</li>
                <li><b>{sec}</b> - display of seconds count</li>
            </ul>
            <p class="wpie-color-orange">For Example: Left {day} : {hour} : {min} : {sec}</p>
        </div>
        <div class="wpie-fields is-column wpie-box-counter">
            You can use the next shortcodes in the content for display the counters:
            <ul>
                <li><b>{counter}</b> - display of counter</li>
            </ul>
            <p class="wpie-color-orange">For Example: Counter: {counter}</p>
        </div>
    </div>
<?php
