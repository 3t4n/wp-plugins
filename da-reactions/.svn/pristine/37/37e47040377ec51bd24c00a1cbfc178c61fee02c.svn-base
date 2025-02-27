<?php
namespace DaReactions\Plugins;
use DaReactions\Frontend;
use DaReactions\Options;
/**
 * Class BBPress
 * @package DaReactions\Plugins
 */
class BBPress {
    /**
     * @var string $options
     * The name of the group for saved options
     *
     * @since 3.7.0
     */
    private $options;
    /**
     * BBPress constructor.
     *
     * @since 3.7.0
     */
    public function __construct() {
        $this->options = Options::getInstance( 'general' );
    }
    /**
     * @param $content
     * @param $post_id
     *
     * @return false|mixed|string
     */
    public function addButtonsToForumTopicOrReply( $content, $post_id ) {
        if ( is_admin() ) {
            return false;
        }
        $post = get_post( $post_id );
        if ( ! $post ) {
            return false;
        }
        $enabled = $this->options->getOption( 'bbp_' . $post->post_type . '_enabled' ) === 'on';
        if ( ! $enabled ) {
            return $content;
        }
        $item_type = $post->post_type;
        $item_id   = $post->ID;
        $append    = Frontend::getButtonsPlaceholder( $item_type, $item_id );
        return $content . $append;
    }
}
