<?php
/**
 * Render the Loop Settings for LearnDash LessonsModule..
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

FLBuilderModel::default_settings(
	$settings,
	array(
		'post_type' => 'sfwd-topic',
	)
);
?>
<div id="fl-builder-settings-section-source" class="fl-loop-data-source-select fl-builder-settings-section">
	<table class="fl-form-table">
	<?php
	$taxonomies = get_object_taxonomies( 'sfwd-topic', 'objects' );
	FLBuilder::render_settings_field(
		'course_id',
		array(
			'type'   => 'suggest',
			'label'  => __( 'Course', 'bb-vapor-modules' ),
			'action' => 'fl_as_posts', // Search posts.
			'data'   => 'sfwd-courses', // Slug of the post type to search.
			'limit'  => 1,
		),
		$settings
	);
	FLBuilder::render_settings_field(
		'num_courses',
		array(
			'type'    => 'unit',
			'label'   => __( 'Number of Topics to Display', 'bb-vapor-modules' ),
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
