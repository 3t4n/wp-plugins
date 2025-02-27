<?php
namespace DaReactions\Abstracts;
use WP_List_Table;
/**
 *
 */
abstract class AbstractAdminListPage extends AbstractAdminPage
{
    /**
     * @var WP_List_Table
     */
    private $table;
    /**
     * @return WP_List_Table
     */
    public function getTable()
    {
        return $this->table;
    }
    /**
     * @param WP_List_Table $table
     */
    public function setTable(WP_List_Table $table)
    {
        $this->table = $table;
    }
    public function displayTable(WP_List_Table $table = null)
    {
	    if ( $table !== null ) {
            $this->table = $table;
        }
        $this->table->prepare_items();
	    $page_url = add_query_arg( 'page', 'da-reactions_votes_list', admin_url( 'admin.php' ) );
	    echo '<form id="forms-table" method="GET" action="' . esc_url( $page_url ) . '">';
	    $nocache_value = isset( $_GET['da-reactions-nocache'] ) ? 'true' : 'false';
	    echo '<input type="hidden" name="da-reactions-nocache" value="' . esc_attr( $nocache_value ) . '">';
        $this->table->display();
        echo '</form>';
    }
}
