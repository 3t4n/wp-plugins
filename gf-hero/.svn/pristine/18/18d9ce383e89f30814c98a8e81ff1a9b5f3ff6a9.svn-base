<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

require_once __DIR__ . '/base/common.php';

// Levels
// ------

function tggh_is_max_level_reached( $feature_name ) {
    static $max_levels = array(
        'date_anim'        => 2,
        'date_filter'      => 3,
        'date_highlight'   => 1,
        'date_properties'  => 1,
        'date_time_zone'   => 3,
        'merge_tag_random' => 2,
        'merge_tag_unique' => 3
    );

    return (
        empty( $max_levels[$feature_name] ) ||
        tggh_get_level() >= $max_levels[$feature_name]
    );
}

// Assets
// ------

function tggh_admin_enqueue_scripts() {
    tggh_enqueue( 'script', 'base/common.js' );

    tggh_enqueue( 'script', 'base/admin.js', array(
        tggh_asset_handle( 'base/common.js' )
    ) );

    tggh_enqueue( 'style', 'base/admin.css' );

    tggh_enqueue_levels( 'admin', array(
        'script_deps' => tggh_asset_handle( 'base/admin.js' ),
        'style_deps' => tggh_asset_handle( 'base/admin.css' )
    ) );
}

function tggh_gform_noconflict_scripts( $handles ) {
    global $tggh_enqueued;
    return array_merge( $handles, $tggh_enqueued['script'] );
}

function tggh_gform_noconflict_styles( $handles ) {
    global $tggh_enqueued;
    return array_merge( $handles, $tggh_enqueued['style'] );
}

add_action( 'admin_enqueue_scripts', 'tggh_admin_enqueue_scripts' );
add_filter( 'gform_noconflict_scripts', 'tggh_gform_noconflict_scripts' );
add_filter( 'gform_noconflict_styles', 'tggh_gform_noconflict_styles' );

tggh_require_levels( 'admin' );

// Fields
// ------

function tggh_documentation_link( $name ) {
    switch ( $name ) {
        case 'date_anim':        $page = 'date-animations';     break;
        case 'date_highlight':   $page = 'date-highlights';     break;
        case 'date_properties':  $page = 'date-properties';     break;
        case 'date_filter':      $page = 'date-filters';        break;
        case 'date_time_zone':   $page = 'date-time-zones';     break;
        case 'merge_tag_random': $page = 'generate-random-ids'; break;
        case 'merge_tag_unique': $page = 'generate-unique-ids'; break;
    }

    if ( empty( $page ) ) {
        return TGGH_URL . 'documentation/';
    } else {
        return TGGH_URL . 'documentation/' . urlencode( $page );
    }
}

function tggh_feature_link( $feature, $text, $echo = true ) {
    if ( tggh_is_max_level_reached( $feature ) ) {
        return;
    }

    $url = tggh_documentation_link( $feature ) . '?l=' . tggh_get_level();

    if ( ! $echo ) {
        ob_start();
    }
?>
    <a href="<?php esc_attr_e( $url ) ?>" class="tggh_more_link" target="_blank"><?php
        esc_html_e( $text )
    ?></a>
<?php

    if ( ! $echo ) {
        return ob_get_clean();
    }
}

function tggh_gform_value_id( $name ) {
    return 'tggh_field_' . $name . '_value';
}

function tggh_gform_tooltip_id( $name ) {
    return 'tggh_field_' . $name;
}

function tggh_gform_setting( $name ) {
    return 'tggh_field_' . $name . '_setting';
}

function tggh_gform_tooltip_header( $text ) {
    return '<h6>' . esc_html( $text ) . '</h6>';
}

function tggh_gform_tooltip( $header, $text ) {
    return tggh_gform_tooltip_header( $header ) . esc_html( $text );
}

function tggh_gform_field_label( $name, $title, $class = 'section_label' ) {
?>
    <label for="<?php esc_attr_e( tggh_gform_value_id( $name ) ) ?>" class="<?php esc_attr_e( $class ) ?>">
        <?php esc_html_e( $title ); ?>
        <?php gform_tooltip( tggh_gform_tooltip_id( $name ) ); ?>
    </label>
<?php
}

function tggh_gform_field_begin( $name, $title ) {
    do_action( 'tggh_before_' . $name . '_field' );

?>
    <li class="<?php esc_attr_e( tggh_gform_setting( $name ) ) ?> tggh_field_setting field_setting">
        <?php tggh_gform_field_label( $name, $title ) ?>
        <?php do_action( 'tggh_before_' . $name . '_value' ) ?>
<?php
}

function tggh_gform_field_end( $name ) {
?>
        <?php do_action( 'tggh_after_' . $name . '_value' ) ?>
    </li>
<?php
    do_action( 'tggh_after_' . $name . '_field' );
}

function tggh_select( $params ) {
    $none = isset( $params['none'] )
        ? (
            is_bool( $params['none'] )
                ? ( $params['none'] ? tggh__( 'None' ) : null )
                : $params['none']
        )
        : null;

    $options = is_array( $params['options'] ) ? $params['options'] : array();
?>
    <select<?php echo empty( $params['id'] ) ? '' : ' id="' . esc_attr( $params['id'] ) . '"' ?>>
        <?php if ( is_string( $none ) ) { ?>
            <option value=""><?php esc_html_e( $none ) ?></option>
        <?php } ?>
        <?php foreach ( $options as $value => $text ) { ?>
            <option value="<?php esc_attr_e( $value ) ?>"><?php
                esc_html_e( $text )
            ?></option>
        <?php } ?>
    </select>
<?php
}

// Utilities
// ---------

function tggh_add_text_js( $text ) {
?>
    <script type="text/javascript">
        tggh.add_text( <?php echo json_encode( $text ) ?> );
    </script>
<?php
}
