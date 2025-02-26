<?php
/**
 * Render the Loop Settings for LearnDash Course Info Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

FLBuilderModel::default_settings(
	$settings,
	array(
		'post_type' => 'sfwd-courses',
	)
);
?>
<div id="fl-builder-settings-section-source" class="fl-loop-data-source-select fl-builder-settings-section">
	<table class="fl-form-table">
	<?php
	FLBuilder::render_settings_field(
		'user_id',
		array(
			'type'   => 'suggest',
			'label'  => __( 'User', 'bb-vapor-modules' ),
			'action' => 'fl_as_users', // Search posts.
			'data'   => 'users',
			'limit'  => 1,
		),
		$settings
	);
	FLBuilder::render_settings_field(
		'orderby',
		array(
			'type'    => 'select',
			'label'   => __( 'Order By', 'bb-vapor-modules' ),
			'default' => 'name',
			'options' => array(
				'none'     => __( 'None', 'bb-vapor-modules' ),
				'id'       => __( 'ID', 'bb-vapor-modules' ),
				'author'   => __( 'Author', 'bb-vapor-modules' ),
				'title'    => __( 'Title', 'bb-vapor-modules' ),
				'name'     => __( 'Name', 'bb-vapor-modules' ),
				'date'     => __( 'Date', 'bb-vapor-modules' ),
				'modified' => __( 'Modified', 'bb-vapor-modules' ),

			),
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'order',
		array(
			'type'    => 'select',
			'label'   => __( 'Order', 'bb-vapor-modules' ),
			'default' => 'ASC',
			'options' => array(
				'ASC'  => __( 'A-Z', 'bb-vapor-modules' ),
				'DESC' => __( 'Z-A', 'bb-vapor-modules' ),
			),
		),
		$settings
	);
	?>
	</table>
</div>
