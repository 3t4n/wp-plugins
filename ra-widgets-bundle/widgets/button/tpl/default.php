<?php
$classes = array();
$classes[] = 'btn';
$classes[] = 'btn-' . $design;
$classes[] = 'icon-' . $icon_position;

$classes[] = $class ? $class : '';

$widget_id = $args['widget_id'];
$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

$attributes = array();

$attributes['class'] = esc_attr( implode( ' ', $classes ) );
$attributes['target'] = esc_attr( $target );
$attributes['href'] = sow_esc_url( $url );
$attributes['id'] = 'btn-' . (int)$widget_id;
$attributes['data-instance'] = (int)$widget_id;

if ( is_array( $attrs ) && !is_wp_error( $attrs ) ) {
	foreach ( $attrs as $attr ) {
		$att = $attr['attribute'];
		$val = $attr['value'];

		$attributes[$att] = $val;
	}
}
?>

<a <?php foreach( $attributes as $name => $value ) echo $name . '="' . $value . '" ' ?>>
    <span class="button-wrap">
	    	<?php if( !empty( $icon ) ) {
	    		$icon_styles = array();
	    		if ( !empty( $icon_size ) ) $icon_styles[] = 'font-size:' .intval( $icon_size ). 'px';
	    		if ( !empty( $icon_color ) ) $icon_styles[] = 'color:' .$icon_color. '';

	    		$icon = siteorigin_widget_get_icon( $icon, $icon_styles );
			} ?>
			<?php
			switch ($icon_position ) {
				case 'right':
					echo esc_html( $title ) . $icon;
					break;
				case 'center':
					echo $icon . esc_html( $title );
					break;
				case 'left':
				default:
					echo $icon . esc_html( $title );
					break;
			} ?>
	</span>
</a>
