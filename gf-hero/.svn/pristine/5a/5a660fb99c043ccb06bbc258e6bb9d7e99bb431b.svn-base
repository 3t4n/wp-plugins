<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

// Date Animation
// --------------

function tggh_date_anim_tooltips_1() {
    return array(
        tggh_gform_tooltip_id( 'date_anim' ) => tggh_gform_tooltip(
            tggh__( 'Picker Animation' ),
            tggh__( 'Select the animation to play when displaying the picker.' )
        )
    );
}

function tggh_date_anim_field_1() {
    $name = 'date_anim';

    $values = apply_filters( 'tggh_date_anim_values', array(
        'fadeIn' => tggh__( 'Fade in' ),
        'blind'  => tggh__( 'Blind' ),
        'slide'  => tggh__( 'Slide' )
    ) );
    asort( $values );

    tggh_gform_field_begin( $name, tggh__( 'Picker Animation' ) );

    tggh_select( array(
        'id' => tggh_gform_value_id( $name ),
        'none' => true,
        'options' => $values
    ) );

    tggh_feature_link( $name, tggh__( 'More animations...' ) );

    tggh_gform_field_end( $name );
}

// Date Highlight
// --------------

function tggh_date_highlight_tooltips_1() {
    return array(
        tggh_gform_tooltip_id( 'date_highlight' ) => tggh_gform_tooltip(
            tggh__( 'Highlight' ),
            tggh__( 'Select which date should be highlighted on the picker.' )
        )
    );
}

function tggh_date_highlight_field_1() {
    $name = 'date_highlight';

    $values = apply_filters( 'tggh_date_highlight_values', array(
        'today'  => tggh__( 'Today' )
    ) );
    asort( $values );

    tggh_gform_field_begin( $name, tggh__( 'Highlight' ) );

    tggh_select( array(
        'id' => tggh_gform_value_id( $name ),
        'none' => true,
        'options' => $values
    ) );

    tggh_feature_link( $name, tggh__( 'More options...' ) );

    tggh_gform_field_end( $name );
}

// Date Properties
// ---------------

function tggh_date_properties_tooltips_1() {
    return array(
        tggh_gform_tooltip_id( 'date_readonly' ) => tggh_gform_tooltip(
            tggh__( 'Read Only Input' ),
            tggh__( 'Select this option to prevent users from manually editing the input value.' )
        )
    );
}

function tggh_date_properties_field_1() {
    $name = 'date_properties';

    tggh_gform_field_begin( $name, tggh__( 'Properties' ) );

    $name_readonly = 'date_readonly';
?>
    <ul>
        <li>
            <?php do_action( 'tggh_before_' . $name_readonly . '_value' ) ?>
            <input type="checkbox" id="<?php esc_attr_e( tggh_gform_value_id( $name_readonly ) ) ?>">
            <?php do_action( 'tggh_before_' . $name_readonly . '_value' ) ?>
            <?php tggh_gform_field_label( $name_readonly, __( 'Read Only Input' ) ) ?>
        </li>
    </ul>
<?php

    tggh_feature_link( $name, tggh__( 'More properties...' ) );

    tggh_gform_field_end( $name );
}

// Date Filter
// -----------

function tggh_date_filter_tooltips_1() {
    return array(
        tggh_gform_tooltip_id( 'date_filter' ) => tggh_gform_tooltip(
            tggh__( 'Date Filter' ),
            tggh__( 'Specify which dates to keep enabled and which dates to disable.' )
        )
    );
}

function tggh_date_filter_field_1() {
    $name = 'date_filter';

    $values = apply_filters( 'tggh_date_filter_values', array(
        'today_and_future' => tggh__( 'Enable today and future dates' ),
        'future'           => tggh__( 'Enable only future dates' ),
        'weekdays'         => tggh__( 'Enable only weekdays' )
    ) );

    tggh_gform_field_begin( $name, tggh__( 'Date Filter' ) );

    tggh_select( array(
        'id' => tggh_gform_value_id( $name ),
        'none' => true,
        'options' => $values
    ) );

    tggh_feature_link( $name, tggh__( 'More filters...' ) );

    tggh_gform_field_end( $name );
}

// Date Time Zone
// --------------

function tggh_date_time_zone_tooltips_1() {
    $items = apply_filters( 'tggh_date_time_zone_tooltip_items', array(
        '<li>' .
            '<b>' . esc_html( tggh__( 'User' ) ) . '</b>' .
            '<br>' .
            esc_html( tggh__(
                "Use the time zone on the user's computer " .
                'at the time they access the site.'
            ) ) .
        '</li>',

        '<li>' .
            '<b>' . esc_html( tggh__( 'Server' ) ) . '</b>' .
            '<br>' .
            esc_html( sprintf(
                tggh__(
                    'Use the server time zone, which is currently set to %s. ' .
                    'This can be changed under Settings → General → Timezone.'
                ),
                tggh_date_time_zone_format_current()
            ) ) .
        '</li>'
    ) );

    $tooltip = tggh_gform_tooltip_header( tggh__( 'Time Zone' ) ) . (
        esc_html(
            tggh__( 'Select the time zone to use in date and time calculations.' )
         ) .
        '<br><br>' .
        '<ul>' . implode( '', $items ). '</ul>'
    );

    return array(
        tggh_gform_tooltip_id( 'date_time_zone' ) => $tooltip
    );
}

function tggh_date_time_zone_field_1() {
    $name = 'date_time_zone';

    tggh_gform_field_begin( $name, tggh__( 'Time Zone' ) );

    $values = apply_filters( 'tggh_date_time_zone_values', array(
        '' => tggh__( 'User' ),
        'server' => (
            tggh__( 'Server' ) . ' ' .
            '(' . ( tggh_date_time_zone_format_current() ) . ')'
        )
    ) );

    tggh_select( array(
        'id' => tggh_gform_value_id( $name ),
        'none' => false,
        'options' => $values
    ) );

    tggh_feature_link( $name, tggh__( 'More time zone options...' ) );

    tggh_gform_field_end( $name );
}

function tggh_date_filter_time_zone_text_js_1() {
    tggh_add_text_js( array(
        'current_timezone_user' => tggh__( "Using the user's time zone." ),
        'current_timezone_server' => sprintf(
            tggh__( "Using the server's time zone: %s." ),
            tggh_date_time_zone_format_current()
        ),
        'current_timezone_tooltip' => (
            tggh__( 'See Advanced → Time Zone for more details.' )
        )
    ) );
}

add_action( 'tggh_after_date_filter_value', 'tggh_date_filter_time_zone_text_js_1' );

// Field Setup
// -----------

function tggh_gform_appearance_fields_1( $position ) {
    // See form_detail.php in Gravity Forms.

    if ( $position === 300 ) { // After "Custom CSS Class"
        tggh_date_highlight_field_1();
        tggh_date_anim_field_1();
    }
}

function tggh_gform_appearance_fields_last_1( $position ) {
    // See form_detail.php in Gravity Forms.

    if ( $position === 500 ) { // Last appearance position
        tggh_date_properties_field_1();
    }
}

function tggh_gform_standard_fields_1( $position ) {
    // See form_detail.php in Gravity Forms.

    if ( $position === 1225 ) { // After "Date Format"
        tggh_date_filter_field_1();
    }
}

function tggh_gform_advanced_fields_1( $position ) {
    // See form_detail.php in Gravity Forms.

    if ( $position === 155 ) { // After "Default Value"
        tggh_date_time_zone_field_1();
    }
}

function tggh_gform_tooltips_1( $tooltips ) {
    return array_merge(
        $tooltips,
        tggh_date_highlight_tooltips_1(),
        tggh_date_anim_tooltips_1(),
        tggh_date_properties_tooltips_1(),
        tggh_date_filter_tooltips_1(),
        tggh_date_time_zone_tooltips_1()
    );
}

add_action( 'gform_field_appearance_settings', 'tggh_gform_appearance_fields_1' );
add_action( 'gform_field_appearance_settings', 'tggh_gform_appearance_fields_last_1', PHP_INT_MAX );
add_action( 'gform_field_standard_settings', 'tggh_gform_standard_fields_1' );
add_action( 'gform_field_advanced_settings', 'tggh_gform_advanced_fields_1' );
add_filter( 'gform_tooltips', 'tggh_gform_tooltips_1' );
