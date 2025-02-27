<?php
/**
 * Class CustomColumn
 * @package DaReactions
 *
 * Adds a custom column to content lists
 *
 * @since 1.0.0
 */
namespace DaReactions;
/**
 * Class CustomColumn
 * @package DaReactions
 *
 * Adds a custom column to content lists
 *
 * @since 1.0.0
 */
class CustomColumn {
    /**
     * CustomColumn constructor.
     *
     * @param string $plugin_name
     */
    public function __construct( $plugin_name ) {}
    /**
     * Render data for custom column
     *
     * @param string $column The column slug
     *
     * @since 1.0.0
     */
    public function displayPostsReactions( $column )
    {
        if ( $column === 'da-reactions' ) {
            global $post;
            $reactions       = Data::getReactionsForContent( $post->ID, $post->post_type );
            $total = 0;
            foreach ( $reactions as $reaction ) {
                $total += $reaction->total;
            }
            foreach ( $reactions as $reaction ) {
                $size = $total > 0 ? 12 +(int)(25 * $reaction->total / $total) : 12;
                $image = FileSystem::getImageUrl( $reaction->file_name );
                $formattedLabel = $reaction->label;
                $formattedCount = Utils::formatBigNumber( $reaction->total );
                $formattedPercentage = (int) $reaction->percentage;
                $title = "$formattedLabel $formattedCount ($formattedPercentage%)";
	            echo wp_kses( sprintf(
		            '<img src="%1$s" alt="%2$s" title="%2$s" width="%3$d" height="%3$d" />',
		            $image,
		            $title,
		            $size
	            ), 'da-r-img');
            }
        }
    }
    /**
     * Adds 'da-reactions' to column list
     *
     * @param array $columns
     *
     * @return array
     *
     * @since 1.0.0
     */
    public function addReactionColumn( $columns ) {
        $options = Options::getInstance( 'general' );
        $post_type = get_query_var( 'post_type' );
        $reactions_enabled_for_post_type = $options->getOption( 'post_type_' . $post_type ) === 'on';
        if ( $reactions_enabled_for_post_type ) {
            return array_merge( $columns, array( 'da-reactions' => __( 'Reactions', 'da-reactions' ) ) );
        }
        return $columns;
    }
}
