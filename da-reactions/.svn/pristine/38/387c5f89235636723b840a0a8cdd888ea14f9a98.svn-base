<?php
namespace DaReactions\Pages;
use DaReactions\Abstracts\AbstractAdminListPage;
use DaReactions\Lists\VotesList;
/**
 *
 */
class AdminPageVotesList extends AbstractAdminListPage {
    const PER_PAGE = 'da_r_votes_per_page';
    protected $table;
    public function displayPage() {
        $this->table = new VotesList();
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">
	            <?php echo esc_html_x( 'Votes list', 'List page title', 'da-reactions' ); ?>
            </h1>
            <?php
            $this->displayTable( $this->table ) ?>
        </div>
        <?php
    }
    public function addScreenOptions() {
        $option = 'per_page';
        $args = array(
            'label'   => _x( 'Votes per page', 'Screen option label', 'da-reactions' ),
            'default' => 10,
            'option'  => self::PER_PAGE
        );
        add_screen_option( $option, $args );
    }
    /**
     * @param $status
     * @param $option
     * @param $value
     *
     * @return mixed
     */
    public function setScreenOptions( $status, $option, $value ) {
        if ( self::PER_PAGE === $option ) {
            return $value;
        }
        return $status;
    }
    /**
     * @return AdminPageVotesList|null
     */
    public static function getInstance() {
        static $instance = null;
        if ( null === $instance ) {
            $instance = new self();
        }
        return $instance;
    }
}
