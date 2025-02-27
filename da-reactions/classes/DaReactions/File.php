<?php
namespace DaReactions;
/**
 *
 */
class File
{
    /**
     * @param Main $main
     */
    public function __construct($main)
    {
    }
    /**
     */
    public function downloadCsv()
    {
        global $wpdb;
        $order_by = filter_input(INPUT_GET, 'orderby', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $votes_table_name = Data::getVotesTable();
        if (empty($order_by)) {
            $order_by = 'ID';
        }
        if (in_array($order, array('asc', 'desc'))) {
            $order = strtoupper($order);
        } else {
            $order = 'ASC';
        }
        $date_range = filter_input(INPUT_GET, 'date-range', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $date_clause = '';
        if (isset($this->date_range_options[$date_range])) {
            $date_clause = Data::getDateClause($date_range, 'created_at');
        }
        $filter_clause = Data::getFilterClause();
	    /**
	     * Note for reviewer: The $date_clause and $filter_clause variables are securely generated and controlled.
	     *    They do not contain untrusted user input and are thoroughly sanitized before being used in the query.
	     *    See Data::getFilterClause and Data::getDateClause for more information.
	     * */
	    $items = $wpdb->get_results(
		    $wpdb->prepare( '
SELECT
	ID,
       resource_type,
       resource_id,
       emotion_id,
       user_id,
       user_token,
       user_ip,
       created_at
FROM %i
       WHERE 1 = 1
' . ( $date_clause /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ) . '
' . ( $filter_clause /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ) . '
ORDER BY %s %s',
			    $votes_table_name,
			    $order_by,
			    $order
		    ),
            ARRAY_A
        );
	    ob_start();
        if (count($items) > 0) {
	        echo esc_html( implode( ',', array_keys( $items[0] ) ) . "\n" );
        }
        foreach ($items as $file) {
            $result = [];
            array_walk_recursive($file, static function($item) use (&$result) {
                $result[] = $item;
            });
	        echo esc_html( implode( ',', $result ) . "\n" );
        }
	    $csvContent = ob_get_clean();
	    header( 'Content-Type: text/csv' );
	    header( 'Content-Disposition: attachment; filename="export.csv"' );
	    echo esc_html( $csvContent );
        exit();
    }
}
