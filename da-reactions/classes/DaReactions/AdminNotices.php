<?php /** @noinspection SuspiciousAssignmentsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
namespace DaReactions;
/**
 * Class AdminNotices
 * Handles admin notices and review requests.
 *
 * @package DaReactions
 */
class AdminNotices {
	/**
	 * API URL for external requests.
	 *
	 * @var string
	 */
    private static $api_url = 'https://www.danielealessandra.com/api/plugins/';
	/**
	 * Options instance to manage notice settings.
	 *
	 * @var Options
	 */
    private $options;
	/**
	 * AdminNotices constructor.
	 */
    public function __construct() {
        $this->options = Options::getInstance( 'notices' );
        $snooze_time   = $this->options->getOption( 'snooze_time', false );
	    if ( false === $snooze_time ) {
            $default_date = time();
            $this->options->saveOption( 'snooze_time', $default_date );
        }
    }
	/**
	 * Handles dismissal of notices via AJAX.
	 */
    public function dismissNotice() {
	    check_ajax_referer( 'da-reactions_dismiss_notice', 'nonce' );
        $reason = sanitize_text_field( $_POST['reason'] );
        switch ( $reason ) {
            case 'already-did':
                /// User don’t want to be bothered at all
                $this->options->saveOption( 'dismiss_forever', 'yes' );
                break;
            case 'snooze':
            case 'doing':
	        $this->options->saveOption( 'snooze_time', time() );
                break;
            default:
                wp_send_json_error(
                    array(
                        'success' => 'no',
                        'message' => __( 'Unknown reason', 'da-reactions' )
                    ),
                    403
                );
                exit();
        }
	    wp_send_json_success( [ 'success' => 'yes' ] );
    }
    /**
     * Displays admin notices.
     */
    public function showNotices()
    {
        $this->showReviewRequest();
    }
    /**
     * Renders a notice asking users to leave a review.
     *
     * @since 3.16.0
     */
    public function showReviewRequest() {
	    $dismiss_forever = $this->options->getOption( 'dismiss_forever', 'no' ) === 'yes';
        if ($dismiss_forever) {
            /// User don't want to be bothered again
            return;
        }
	    $snooze_time       = $this->options->getOption( 'snooze_time', 204051600 );
	    $seconds_in_a_week = WEEK_IN_SECONDS;
        if (time() - (int)$snooze_time < $seconds_in_a_week) {
            /// User don't want to be bothered yet
            return;
        }
        $total_votes = Data::getReactionsCount();
        if ($total_votes < 5000) {
            /// Too soon...
            return;
        }
        $display_total_votes = Utils::formatBigNumber($total_votes);
	    $image_url         = esc_url( DA_REACTIONS_URL . 'assets/src/images/icon-256x256.png' );
	    $message_title     = sprintf(
	    // translators: %s is the number of reactions
                __('You got already %s reactions! Great!', 'da-reactions'),
                $display_total_votes
            );
        $message_intro = __('Positive reviews from awesome users like you help others to feel confident about choosing DaReactions too.', 'da-reactions');
	    $message_request   = sprintf(
	    // translators: %1$s is the link to the rating site, %2$s is the rating site name
		    __( 'Could you take 60 seconds to go to <a href="%1$s" target="_blank">%2$s</a> and share your happy experiences?', 'da-reactions' ),
		    esc_url( $this->getRatingLink() ),
		    esc_html( $this->getRatingSite() )
	    );
        $message_greetings = __('I will be forever grateful. Thank you in advance for helping me out!', 'da-reactions');
	    $this->renderNotice( $message_title, $message_intro, $message_request, $message_greetings );
                        }
	/**
	 * Get the rating link based on environment.
	 *
	 * @return string
	 */
	private function getRatingLink() {
		return 'https://wordpress.org/support/plugin/da-reactions/reviews/?rate=5#rate-response';
                        }
	/**
	 * Get the rating site name based on environment.
	 *
	 * @return string
	 */
	private function getRatingSite() {
		return 'WordPress.org';
                }
	/**
	 * Renders the admin notice HTML.
	 *
	 * @param string $title
	 * @param string $intro
	 * @param string $request
	 * @param string $greetings
	 */
	private function renderNotice( $title, $intro, $request, $greetings ) {
		?>
        <div class="notice notice-success is-dismissible da-reactions-notice">
            <h4><?php echo esc_html( $title ); ?></h4>
            <p><?php echo esc_html( $intro ); ?><?php echo wp_kses( $request, 'post' ); ?></p>
            <p><?php echo esc_html( $greetings ); ?></p>
            <ul>
                <li><a href="#" class="button button-secondary da-reactions-dismiss"
                       data-reason="already_did"><?php esc_html_e( 'I already did', 'da-reactions' ); ?></a>
                </li>
                <li><a href="<?php echo esc_url( $this->getRatingLink() ); ?>" target="_blank"
                       class="button button-primary da-reactions-dismiss"
                       data-reason="am_now"><?php esc_html_e( 'Ok, you deserve it', 'da-reactions' ); ?></a>
                </li>
            </ul>
        </div>
        <script type="text/javascript">
            jQuery(function ($) {
                $('.da-reactions-dismiss').on('click', function (e) {
                    e.preventDefault();
                    var reason = $(this).data('reason');
                    $.post(ajaxurl, {
                        action: 'da_reactions_dismiss_review_notice',
                        nonce: '<?php echo esc_attr( wp_create_nonce( 'dismiss_review_notice' ) ) ?>',
                        reason: reason
                    });
                });
            });
        </script>
        <?php
    }
}
