<?php
$post_types = get_post_types(array('public' => true));
// Select categories arguments
$args = array (
	'orderby' => 'name',
	'order' => 'ASC',
	'hide_empty' => 0
);

// Get all post categories
foreach ( $post_types as $post_type ) {

	// Get categories taxonomies
	$post_taxonomies = get_object_taxonomies ( $post_type );

	if (count ( $post_taxonomies ) > 0) {
		foreach ( $post_taxonomies as $tax ) {

			// check if category list it's items
			if (is_taxonomy_hierarchical ( $tax )) {

				$args = array (
					'hide_empty' => 0,
					'taxonomy' => $tax,
					'type' => $post_type
				);

				$categories = get_categories ( $args );

				$parent_categories = array ();
				$child_categories = array ();

				// function to display categories

				// Get parent categories
				foreach ( $categories as $category ) {

					if ($category->parent == 0) {
                        $parent_categories [] = $category;
					} else {
                        $child_categories [$category->parent] [] = $category;
					}
				}
			}
		}
	}
}
// Get all post tags
$tags = get_tags(array('get'=>'all'));
?>
<div id="category" class="aliexpress-box-tab" data-nav="category" >

	<div class="aliexpress-box-header">
		<h2 class="aliexpress-box-title"><?php esc_html_e( 'Categories & Tags', Auto_Aliexpress::DOMAIN ); ?></h2>
	</div>

    <div class="aliexpress-box-body">
        <div class="aliexpress-box-settings-row">
            <div class="aliexpress-box-settings-col-1">
                <span class="aliexpress-settings-label"><?php esc_html_e( 'Categories', Auto_Aliexpress::DOMAIN ); ?></span>
                <span class="aliexpress-description"><?php esc_html_e( 'Select post categories.', Auto_Aliexpress::DOMAIN ); ?></span>
            </div>
            <div class="aliexpress-box-settings-col-2">

                <label class="aliexpress-settings-label"><?php esc_html_e( 'Categories', Auto_Aliexpress::DOMAIN ); ?></label>

                <span class="aliexpress-description"><?php esc_html_e( 'Select your campaign post categories.', Auto_Aliexpress::DOMAIN ); ?></span>

                <select class="aliexpress-category-multi-select" multiple="true">
                    <?php
                    foreach ( $parent_categories as $parent_category ) {
                        auto_aliexpress_display_category( $parent_category, $child_categories, $settings['aliexpress-post-category']);
                    }
                    ?>
                </select>


            </div>
        </div>

        <div class="aliexpress-box-settings-row">
            <div class="aliexpress-box-settings-col-1">
                <span class="aliexpress-settings-label"><?php esc_html_e( 'Tags', Auto_Aliexpress::DOMAIN ); ?></span>
                <span class="aliexpress-description"><?php esc_html_e( 'Select post tags.', Auto_Aliexpress::DOMAIN ); ?></span>
            </div>
            <div class="aliexpress-box-settings-col-2">

                <label class="aliexpress-settings-label"><?php esc_html_e( 'Tags', Auto_Aliexpress::DOMAIN ); ?></label>

                <span class="aliexpress-description"><?php esc_html_e( 'Select your post tags.', Auto_Aliexpress::DOMAIN ); ?></span>

                <select class="aliexpress-tag-multi-select" multiple="true">
                    <?php
                    foreach ( $tags as $tag ) {
                        auto_aliexpress_display_tag($tag, $settings['aliexpress-post-tag']);
                    }
                    ?>
                </select>


            </div>
        </div>

   </div>

</div>
