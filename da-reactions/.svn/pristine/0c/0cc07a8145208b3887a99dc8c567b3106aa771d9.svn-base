<?php
namespace DaReactions\Plugins;
use DaReactions\Data;
use DaReactions\Frontend;
use DaReactions\Options;
use stdClass;
/**
 * Class WpForo
 * @package DaReactions\Plugins
 */
class WpForo {
    /**
     * @var Options
     * The options instance
     */
    private $options;
    /**
     * WpForo constructor
     * @since 3.23.0
     */
    public function __construct()
    {
        $this->options = Options::getInstance( 'general' );
    }
    /**
     * @return void
     * Render a select for the Options Page
     * @since 3.23.0
     */
    public function renderPositionSelect()
    {
        $field_name  = $this->options->getFieldName( 'wpforo_widget_position' );
        $saved_value = $this->options->getOption( 'wpforo_widget_position', 'after' );
        ?>
        <p>
            <select id="id_<?php echo esc_attr( $field_name ) ?>"
                    name="<?php echo esc_attr( $field_name ) ?>">
                <option value="none" <?php echo ( empty( $saved_value ) || $saved_value === 'none' ) ? 'selected = "selected"' : '' ?>>
			        <?php esc_html_e( 'Disabled', 'da-reactions' ); ?></option>
                <option value="before" <?php echo ( $saved_value === 'before' ) ? 'selected = "selected"' : '' ?>>
			        <?php esc_html_e( 'With content, before text', 'da-reactions' ); ?></option>
                <option value="after" <?php echo ( $saved_value === 'after' ) ? 'selected = "selected"' : '' ?>>
			        <?php esc_html_e( 'With content, after text', 'da-reactions' ); ?></option>
                <option value="toolbar" <?php echo ( $saved_value === 'toolbar' ) ? 'selected = "selected"' : '' ?>>
			        <?php esc_html_e( 'In toolbar', 'da-reactions' ); ?></option>
            </select>
        </p>
        <?php
    }
    /**
     */
    public function addButtonsToToolbar( $button, $name, $forum, $topic, $post )
    {
        if ( ! function_exists( 'WPF' ) ) {
            return $button;
        }
        $forum_id = (int) $forum['forumid'];
        $item_id = (int) $post['postid'];
        $item_type = 'wpforo' . $forum_id;
        $current_action = current_action();
        $saved_position = $this->options->getOption( 'wpforo_widget_position', 'none' );
        if (
            $current_action === 'wpforo_template_buttons' &&
            $saved_position === 'toolbar'
        ) {
            $reactions = Data::getReactionsForContent( $item_id, $item_type );
            $tooltip = '';
            foreach ( $reactions as $reaction ) {
                if ( $reaction->total > 0 ) {
                    $tooltip .= $reaction->label . ' (' . $reaction->total . ')' . "\n";
                }
            }
            $tooltip = empty( $tooltip ) ? 'Reactions' : $tooltip;
            $button = '<span class="wpf-action wpforo-reactions" wpf-tooltip="' . $tooltip . '">' . Frontend::getButtonsPlaceholder( $item_type, $item_id ) . '</span>' . $button;
        }
        return $button;
    }
    /**
     * @param string $content
     * @param array|stdClass $post
     *
     * @return string
     *
     * @since 3.23.0
     */
    public function addButtonsToContent( $content, $post )
    {
        if ( ! function_exists( 'WPF' ) ) {
            return $content;
        }
        $wpf = WPF();
        /** @noinspection NullPointerExceptionInspection */
        $board_id = $wpf->board->get_current( 'boardid' );
        $saved_position = $this->options->getOption( 'wpforo_widget_position', 'none' );
        if ( $saved_position === 'none' ) {
            return $content;
        }
        $item_type = 'wpforo' . ( $board_id > 0 ? $board_id : '' );
        if ( is_array( $post ) ) {
            $item_id = $post['postid'];
        } else {
            $item_id = $post->postid;
        }
        $current_filter = current_filter();
        $reactions_html = Frontend::getButtonsPlaceholder( $item_type, $item_id );
        if ( $current_filter === 'wpforo_content_after' && $saved_position === 'after' ) {
            return $content . ' ' . $reactions_html;
        }
        if ( $current_filter === 'wpforo_content_before' && $saved_position === 'before' ) {
            return $reactions_html . ' ' . $content;
        }
        return $content;
    }
}
