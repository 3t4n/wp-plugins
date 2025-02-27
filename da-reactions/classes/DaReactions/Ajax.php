<?php

/**
 * Class Ajax
 *
 * Manages all ajax requests
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
namespace DaReactions;

use DaReactions\Plugins\BuddyPress;
use Exception;
/**
 * Class Ajax
 *
 * Manages all ajax requests
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
class Ajax {
    /**
     * List of all third party supported plugins
     *
     * @var array $third_party_plugins
     *
     * @since 1.3.2
     */
    private $third_party_plugins;

    /**
     * Ajax constructor.
     *
     * @param Main $main
     *
     * @since 1.0.0
     */
    public function __construct( Main $main ) {
        $this->third_party_plugins = array();
        if ( $main->isBBPressInstalled() ) {
            $this->third_party_plugins['bbpress'] = true;
        }
    }

    /**
     * Invoked from frontend when user clicks on a reaction button
     *
     * @since 1.0.0
     */
    public function addReaction() {
        $item_id = (int) $_POST['id'];
        $nonce = sanitize_text_field( $_POST['nonce'] );
        $item_type = sanitize_text_field( $_POST['type'] );
        $reaction = (int) $_POST['reaction'];
        if ( !wp_verify_nonce( $nonce, $item_type . '-' . absint( $item_id ) ) ) {
            wp_send_json_error( array(
                'success' => 'no',
                'message' => __( 'Nonce error', 'da-reactions' ),
            ), 403 );
            exit;
        }
        if ( !User::userCanReact() && darea_fs()->is__premium_only() ) {
            wp_send_json_error( array(
                'success' => 'no',
                'message' => __( 'User cannot vote.', 'da-reactions' ),
            ), 403 );
            exit;
        }
        $reaction_inserted = Data::insertUserReaction( $item_id, $item_type, $reaction );
        if ( $reaction_inserted instanceof Error ) {
            wp_send_json( array(
                'success' => 'no',
                'message' => $reaction_inserted->getErrorString(),
            ) );
        }
        if ( !empty( $this->third_party_plugins ) ) {
            $this->warnThirdPartyPlugins(
                $item_id,
                $item_type,
                $reaction,
                true
            );
        }
        wp_send_json( array(
            'success'   => 'ok',
            'reactions' => Data::getReactionsForContent( $item_id, $item_type ),
        ) );
    }

    /**
     * Walk result and add image and use details
     *
     * @param $item
     */
    public function addDetails( $item ) {
        $this->addImages( $item );
        $this->addUserLink( $item );
    }

    /**
     * Add user link to results
     *
     * @param $item
     */
    public function addUserLink( $item ) {
        if ( function_exists( 'bp_core_get_user_domain' ) ) {
            $item->user_link = bp_core_get_user_domain( $item->user_id );
        } else {
            $item->user_link = get_author_posts_url( $item->user_id );
        }
    }

    /**
     * @return void
     */
    public function deleteVote() {
        if ( wp_verify_nonce( $_POST['nonce'], 'nonce' ) ) {
            global $wpdb;
            $vote_id = filter_input( INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT );
            $deleted = $wpdb->delete( Data::getVotesTable(), array(
                'ID' => $vote_id,
            ), array('%d') );
            if ( $deleted === 1 ) {
                wp_send_json( array(
                    'success' => 'ok',
                    'message' => sprintf( 
                        // translators: %d is the vote ID
                        _x( 'Deleted row #%d', 'AJAX response message', 'da-reactions' ),
                        $vote_id
                     ),
                ) );
                exit;
            }
        }
        wp_send_json_error( array(
            'success' => 'no',
            'message' => __( 'Nonce error', 'da-reactions' ),
        ), 403 );
        exit;
    }

    public function dismissReviewNotice() {
        if ( wp_verify_nonce( $_POST['nonce'], 'dismiss_review_notice' ) ) {
            $options = Options::getInstance( 'notices' );
            switch ( $_POST['reason'] ) {
                case 'maybe_later':
                case 'am_now':
                    $options->saveOption( 'snooze_time', time() );
                    break;
                case 'already_did':
                    $options->saveOption( 'dismiss_forever', 'yes' );
                    break;
            }
        }
    }

    /**
     * Add image full path
     *
     * @param $item
     */
    public function addImages( $item ) {
        $item->image = FileSystem::getImageUrl( $item->file_name );
    }

    /**
     * Get User list and reactions
     *
     * @since 3.0.0
     */
    public function getUsersReactions() {
        $item_id = (int) $_POST['id'];
        $item_type = sanitize_text_field( $_POST['type'] );
        $emotion_id = (int) $_POST['reaction'];
        $limit = (int) $_POST['limit'];
        $pagenum = 1;
        $nonce = sanitize_text_field( $_POST['nonce'] );
        if ( isset( $_POST['pageNum'] ) ) {
            $pagenum = max( (int) $_POST['pageNum'], 1 );
        }
        if ( !wp_verify_nonce( $nonce, $item_type . '-' . absint( $item_id ) ) ) {
            wp_send_json( array(
                'success' => 'no',
                'message' => __( 'Nonce error', 'da-reactions' ),
            ) );
            exit;
        }
        $data = Data::getReactionsAndUsersForContent(
            $item_id,
            $item_type,
            $emotion_id,
            $limit,
            $pagenum
        );
        $reactions = Data::getAllReactions();
        foreach ( $reactions as $reaction ) {
            $reaction->image = FileSystem::getImageUrl( $reaction->file_name );
            if ( (int) $reaction->ID === $emotion_id ) {
                $reaction->current = true;
            }
        }
        if ( is_array( $data['records'] ) ) {
            array_walk( $data['records'], array($this, 'addDetails') );
        }
        wp_send_json( array(
            'success'    => 'ok',
            'reactions'  => $data['records'],
            'pagination' => $data['pagination'],
            'buttons'    => $reactions,
        ) );
    }

    /**
     * Invoked from frontend to load button asynchronously
     * Must not validate nonce because it is not a security issue
     * And, most of all, some cache plugin may not work properly
     *
     * @since 1.0.0
     */
    public function loadButtons() {
        header( "Cache-Control: no-store, no-cache, must-revalidate, max-age=0" );
        header( "Cache-Control: post-check=0, pre-check=0", false );
        header( "Pragma: no-cache" );
        $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        $item_id = (int) $_POST['id'];
        $item_type = sanitize_text_field( $_POST['type'] );
        echo wp_kses( Frontend::getButtons( $item_type, $item_id ), 'da-r-post-with-svg' );
        exit;
    }

    /**
     * Invoked from backend to load buttons preview asynchronously
     *
     * @since 1.0.0
     */
    public function loadButtonsPreview() {
        header( 'Cache-Control: no-store, no-cache, must-revalidate, max-age=0' );
        header( 'Cache-Control: post-check=0, pre-check=0', false );
        header( 'Pragma: no-cache' );
        $item_id = 1;
        $item_type = 'preview';
        $template = '';
        if ( isset( $_POST['da-reactions_graphic']['use_template'] ) ) {
            $template = sanitize_text_field( $_POST['da-reactions_graphic']['use_template'] );
        } else {
            if ( isset( $_POST['da-reactions_graphic']['use_template_mobile'] ) ) {
                $template = sanitize_text_field( $_POST['da-reactions_graphic']['use_template_mobile'] );
            }
        }
        $size = 0;
        if ( isset( $_POST['da-reactions_graphic']['button_size'] ) ) {
            $size = (int) $_POST['da-reactions_graphic']['button_size'];
        } else {
            if ( isset( $_POST['da-reactions_graphic']['button_size_mobile'] ) ) {
                $size = (int) $_POST['da-reactions_graphic']['button_size_mobile'];
            }
        }
        $options = Options::getInstance( 'preview' );
        $alignment = '';
        if ( isset( $_POST['da-reactions_graphic']['buttons_alignment'] ) ) {
            $alignment = sanitize_text_field( $_POST['da-reactions_graphic']['buttons_alignment'] );
        } else {
            if ( isset( $_POST['da-reactions_graphic']['buttons_alignment_mobile'] ) ) {
                $alignment = sanitize_text_field( $_POST['da-reactions_graphic']['buttons_alignment_mobile'] );
            }
        }
        $options->setOption( 'button_size', $size );
        $options->setOption( 'button_size_mobile', $size );
        $options->setOption( 'buttons_alignment', $alignment );
        $options->setOption( 'buttons_alignment_mobile', $alignment );
        $nonce = sanitize_text_field( $_POST['nonce'] );
        if ( wp_verify_nonce( $nonce, 'nonce' ) ) {
            $reactions = Data::getReactionsForContent( $item_id, $item_type );
            $method = '';
            if ( isset( $_POST['da-reactions_graphic']['fade_method'] ) ) {
                $method = sanitize_text_field( $_POST['da-reactions_graphic']['fade_method'] );
            } else {
                if ( isset( $_POST['da-reactions_graphic']['fade_method_mobile'] ) ) {
                    $method = sanitize_text_field( $_POST['da-reactions_graphic']['fade_method_mobile'] );
                }
            }
            $value = '';
            if ( isset( $_POST['da-reactions_graphic']['fade_value'] ) ) {
                $value = sanitize_text_field( $_POST['da-reactions_graphic']['fade_value'] );
            } else {
                if ( isset( $_POST['da-reactions_graphic']['fade_value_mobile'] ) ) {
                    $value = sanitize_text_field( $_POST['da-reactions_graphic']['fade_value_mobile'] );
                }
            }
            $show_count = '';
            if ( isset( $_POST['da-reactions_graphic']['show_count'] ) ) {
                $show_count = sanitize_text_field( $_POST['da-reactions_graphic']['show_count'] );
            } else {
                if ( isset( $_POST['da-reactions_graphic']['show_count_mobile'] ) ) {
                    $show_count = sanitize_text_field( $_POST['da-reactions_graphic']['show_count_mobile'] );
                }
            }
            $style = Frontend::getInlineCss( $method, $value, $size ) . '
#wpwrap {
    padding-bottom: ' . ($size + 60) . 'px;
}        
div#reactions_preview {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: white;
    padding: 30px;
    z-index: 9990;
    box-sizing: border-box;
    opacity: 0.5;
}
div#reactions_preview:hover {
    opacity: 1;
}';
            $html = Frontend::renderTemplate(
                $template,
                $reactions,
                $options,
                $item_type,
                $item_id,
                $show_count
            );
            wp_send_json( array(
                'success' => true,
                'html'    => $html,
                'style'   => $style,
            ) );
        }
        exit;
    }

    public function resetCache() {
        if ( !wp_verify_nonce( $_POST['nonce'], 'nonce' ) ) {
            wp_send_json_error( array(
                'success' => 'no',
                'message' => __( 'Nonce error', 'da-reactions' ),
            ), 403 );
            exit;
        }
        Cache::deleteAll();
        wp_send_json( array(
            'success' => 'ok',
            'message' => _x( 'All cache deleted', 'Ajax response', 'da-reactions' ),
        ) );
        exit;
    }

    /**
     * Resets all files and database tables
     * @throws Exception
     */
    public function resetAll() {
        if ( !wp_verify_nonce( $_POST['nonce'], 'nonce' ) ) {
            wp_send_json_error( array(
                'success' => 'no',
                'message' => __( 'Nonce error', 'da-reactions' ),
            ), 403 );
            exit;
        }
        Deactivator::removeTables();
        Cache::deleteAll();
        Activator::createInitialTables();
        Activator::populateInitialData();
        Activator::setInitialOptions();
        Activator::createInitialFiles();
        wp_send_json( array(
            'success' => 'ok',
            'message' => _x( 'All data deleted', 'Ajax response', 'da-reactions' ),
        ) );
        exit;
    }

    /**
     * Send reaction to third party plugins
     *
     * @param $item_id
     * @param $item_type
     * @param $reaction
     * @param $operation_success
     *
     * @since 1.3.0
     *
     */
    public function warnThirdPartyPlugins(
        $item_id,
        $item_type,
        $reaction,
        $operation_success
    ) {
        if ( $operation_success && $this->third_party_plugins['buddypress'] ) {
            $bp_manager = new BuddyPress();
            $bp_manager->addActionToStream( $item_id, $item_type, $reaction );
        }
    }

}
