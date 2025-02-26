<?php
/**
 * Render the Loop Settings for the LearnDash courses module.
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
	$taxonomies = get_object_taxonomies( 'sfwd-courses', 'objects' );
	FLBuilder::render_settings_field(
		'num_courses',
		array(
			'type'    => 'unit',
			'label'   => __( 'Number of Courses to Display', 'bb-vapor-modules' ),
			'default' => 10,
		),
		$settings
	);
	FLBuilder::render_settings_field(
		'term_orderby',
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
		'term_order',
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
	foreach ( $taxonomies as $bbvm_tax ) {
		FLBuilder::render_settings_field(
			'include_term_tax_' . $bbvm_tax->name,
			array(
				'type'   => 'suggest',
				'action' => 'fl_as_terms',
				'data'   => $bbvm_tax->name,
				'label'  => __( 'Select a term to include:', 'bb-vapor-modules' ) . ' ' . $bbvm_tax->label,
				'limit'  => 1,
			),
			$settings
		);
	}
	?>
	</table>
</div>
