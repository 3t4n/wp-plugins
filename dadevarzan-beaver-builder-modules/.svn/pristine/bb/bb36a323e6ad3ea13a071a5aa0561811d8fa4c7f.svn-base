.fl-node-<?php echo $id; ?> .border path {
	fill: #<?php echo $settings->border_color; ?>;
}
.fl-node-<?php echo $id; ?> .province path {
	fill: #<?php echo $settings->disabled_province_color; ?>;
}
.fl-node-<?php echo $id; ?> .province path.dv-tooltip-enabled {
	fill: #<?php echo $settings->province_color; ?>;
}
.fl-node-<?php echo $id; ?> .island path {
	fill: #<?php echo $settings->island_color; ?>;
}
.fl-node-<?php echo $id; ?> .sea path, .fl-node-<?php echo $id; ?> .lake path {
	fill: #<?php echo $settings->sea_color; ?>;
}
.fl-node-<?php echo $id; ?> .province path.dv-tooltip-enabled:hover, .fl-node-<?php echo $id; ?> .island path:hover, .fl-node-<?php echo $id; ?> .province path.hover, .fl-node-<?php echo $id; ?> .island path.hover {
	fill: #<?php echo $settings->hover_color; ?>;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'tooltip_typography',
	'selector' 	=> ".dv-map-tooltip",
) );
