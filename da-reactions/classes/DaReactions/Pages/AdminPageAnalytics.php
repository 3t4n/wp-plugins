<?php
namespace DaReactions\Pages;
use DaReactions\Abstracts\AbstractAdminPage;
use DaReactions\Common;
use DaReactions\Data;
use DaReactions\Request;
use DaReactions\Utils;
use DateTime;
use Exception;
class AdminPageAnalytics extends AbstractAdminPage
{
    /**
     * @throws JsonException
     * @throws Exception
     */
    public function displayPage()
    {
        global $wpdb;
        $table_name = Data::getVotesTable();
        $filters = Request::getRequestData();
        $date_range = isset($filters['date-range']) ? $filters['date-range'] : '';
        $date_labels = [];
        switch ($date_range) {
            case 'today':
                $date_group = '%Y-%m-%d %H:00'; /// Hourly
                $start = (new DateTime())->setTime(0, 0);
                $end = (new DateTime())->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 3600) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'H:00';
                break;
            case 'yesterday':
                $date_group = '%Y-%m-%d %H:00'; /// Hourly
                $start = (new DateTime("now -1 days"))->setTime(0, 0);
                $end = (new DateTime("now - 1 days"))->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 3600) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'H:00';
                break;
            case 'this-week':
                $date_group = '%Y-%m-%d 00:00'; /// Daily
                $start = (new DateTime("Monday this week"))->setTime(0, 0);
                $end = (new DateTime("Sunday this week"))->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 86400) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'l j';
                break;
            case 'seven-days':
                $date_group = '%Y-%m-%d 00:00'; /// Daily
                $start = (new DateTime("now -7 days"))->setTime(0, 0);
                $end = (new DateTime())->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 86400) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'l j';
                break;
            case 'this-month':
                $date_group = '%Y-%m-%d 00:00'; /// Daily
                $start = (new DateTime("first day of this month"))->setTime(0, 0);
                $end = (new DateTime("last day of this month"))->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 86400) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'j';
                break;
            case 'thirty-days':
                $date_group = '%Y-%m-%d 00:00'; /// Daily
                $start = (new DateTime("now -30 days"))->setTime(0, 0);
                $end = (new DateTime())->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 86400) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'j F';
                break;
            case 'sixty-days':
                $date_group = '%Y-%m-%d 00:00'; /// Daily
                $start = (new DateTime("now -60 days"))->setTime(0, 0);
                $end = (new DateTime())->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 86400) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'j F';
                break;
            case 'ninety-days':
                $date_group = '%Y-%m-%d 00:00'; /// Daily
                $start = (new DateTime("now -90 days"))->setTime(0, 0);
                $end = (new DateTime())->setTime(23, 59);
                for ($i = $start->getTimestamp(); $i < $end->getTimestamp(); $i += 86400) {
                    $date_labels[] = (new DateTime())->setTimestamp($i)->format('Y-m-d H:i');
                }
                $label_format = 'j F';
                break;
            case 'this-year':
                $date_group = '%Y-%m-01 00:00'; /// Monthly
	            $start = ( new DateTime() )->setDate( gmdate( "Y" ), 1, 1 )->setTime( 0, 0 );
	            $end   = ( new DateTime() )->setDate( gmdate( "Y" ), 12, 31 )->setTime( 23, 59 );
                for ($i = 0; $i < 12; $i ++) {
                    $date_labels[] = (clone $start)->modify("+ $i months")->format('Y-m-d H:i');
                }
                $label_format = 'F';
                break;
            default:
                $date_group = '%Y-%m-01 00:00'; /// Monthly
                $date_start_record = $wpdb->get_var("SELECT DATE_FORMAT( created_at, '%Y-%m-01 00:00:00') FROM $table_name ORDER BY created_at LIMIT 1");
                $start = (new DateTime($date_start_record));
                $end = (new DateTime())->setTime(23, 59)->setTime(23, 59);
                $date_cycle = clone $start;
                while ($date_cycle < $end) {
                    $date_labels[] = $date_cycle->format('Y-m-d H:i');
                    $date_cycle->modify("+ 1 month");
                }
                $label_format = 'F y';
                break;
        }
        $date_start = $start->format('Y-m-d H:i:s');
        $date_end = $end->format('Y-m-d H:i:s');
        $reactions = Data::getAllReactions();
        $chart_options = [
            'type' => 'line',
            'data' => [
                'labels' => [],
                'datasets' => []
            ],
            "options" => [
                "maintainAspectRatio" => false
            ]
        ];
        $query_parts = [];
        $query_parts[] = 'SELECT';
        foreach ($reactions as $reaction) {
	        $query_parts[] = $wpdb->prepare(
		        'SUM(IF(emotion_id = %d, 1, 0)) AS "reaction-%d",',
		        $reaction->ID,
		        $reaction->ID
	        );
            $chart_options
            ['data']
            ['datasets']
            ['reaction-' . $reaction->ID] = [
                'label' => $reaction->label,
                'data' => [],
                'fill' => false,
                'borderColor' => $reaction->color,
                'tension' => 0.5
            ];
        }
	    $query_parts[] = $wpdb->prepare( 'DATE_FORMAT( created_at, %s) AS label', $date_group );
	    $query_parts[] = $wpdb->prepare( 'FROM %i', $table_name );
	    $query_parts[] = $wpdb->prepare( 'WHERE created_at BETWEEN %s AND %s', $date_start, $date_end );
        $query_parts[] = 'GROUP BY label';
        $query = implode(" \n", $query_parts);
	    $results = $wpdb->get_results( $query  /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ );
        foreach ($date_labels as $iValue) {
            $date_label = $iValue;
            if (count($results) > 0 && $date_label === $results[0]->label) {
                $result = array_shift($results);
                $chart_options['data']['labels'][] = (new DateTime($result->label))->format($label_format);
                foreach ($result as $key => $value) {
                    if ($key !== 'label') {
                        $chart_options['data']['datasets'][$key]['data'][] = $value;
                    }
                }
            } else {
                $chart_options['data']['labels'][] = (new DateTime($date_label))->format($label_format);
                foreach ($reactions as $reaction) {
                    $chart_options['data']['datasets']['reaction-' . $reaction->ID]['data'][] = 0;
                }
            }
        }
        $chart_options['data']['datasets'] = array_values($chart_options['data']['datasets']);
        $chart_data = $chart_options['data'];
        ?>
        <form id="forms-table" method="GET" action="<?php get_admin_url() ?>">
            <input type="hidden" name="da-reactions-nocache" value="true"/>
            <input type="hidden" name="page" value="da-reactions_analytics"/>
            <div class="wrap">
                <h1><?php esc_html_e( 'Analytics', 'da-reactions' ); ?></h1>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php Utils::printSelect(
                                Common::getDateRangeOptions(),
                                $date_range,
                                '',
                                'date-range'
                            );
                            ?>
                            <input
                                    type="submit" class="button action"
                                    value="<?php echo esc_attr_x( 'Apply', 'Submit button label',
                                        'da-reactions'); ?>">
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-12">
                            <h3><?php echo esc_html_x( 'All reactions chart', 'Graph title', 'da-reactions' ); ?></h3>
                        </div>
                        <div class="col-12">
                            <canvas
                                    id="allReactionsChart"
                                    class="graph-canvas"
                                    style="position: relative; height: 250px;"
                                    data-chart_data="<?php echo esc_attr( wp_json_encode( $chart_data, JSON_PRETTY_PRINT ) ) ?>"
                                    data-chart_type="line"
                            ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
    }
    /**
     * @return AdminPageAnalytics|null
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new self();
        }
        return $instance;
    }
}
