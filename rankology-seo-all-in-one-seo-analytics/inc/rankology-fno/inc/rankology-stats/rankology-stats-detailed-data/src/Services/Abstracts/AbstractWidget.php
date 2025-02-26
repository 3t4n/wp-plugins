<?php

namespace Rankology_Stats\Detailed_Data\Services\Abstracts;

use RANKOLOGY_STATS\DB;
abstract class AbstractWidget
{
    public abstract function register();
    protected function _buildQuery($args = [])
    {
        global $wpdb;
        // Prepare Default Args
        $defaults = array('post_id' => '', 'page_id' => '', 'post_type' => '', 'from_date' => '', 'to_date' => '', 'sql_select' => '', 'sql_where' => '', 'sql_group' => '', 'sql_order' => '', 'sql_limit' => '');
        $args = wp_parse_args($args, $defaults);
        // Table Names
        $visitorTable = DB::table('visitor');
        $visitorRelationTable = DB::table("visitor_relationships");
        $pagesTable = DB::table('pages');
        // Build Query
        $sql = (!empty($args['sql_select']) ? $args['sql_select'] : "SELECT DISTINCT `" . $visitorTable . "`.*") . " FROM `" . $visitorTable . "` INNER JOIN `" . $visitorRelationTable . "` ON `" . $visitorRelationTable . "`.`visitor_id` = `" . $visitorTable . "`.`ID`  INNER JOIN `" . $pagesTable . "` ON `" . $pagesTable . "`.`page_id` = `" . $visitorRelationTable . "` . `page_id`";
        $sql .= ' ';
        // Add Where
        $where[] = "`" . $pagesTable . "`.`type`='" . $args['post_type'] . "'";
        if (!empty($args['page_id'])) {
            $pageUri = $wpdb->get_var($wpdb->prepare("SELECT `uri` FROM `" . $pagesTable . "` WHERE `page_id` = %d", $args['page_id']));
            $where[] = "`" . $pagesTable . "`.`uri` = '" . $pageUri . "'";
        } else {
            $where[] = "`" . $pagesTable . "`.`id` = " . $args['post_id'];
        }
        $where[] = "last_counter BETWEEN '{$args['from_date']}' AND '{$args['to_date']}'";
        if (!empty($args['sql_where'])) {
            $where[] = $args['sql_where'];
        }
        $sql .= ' WHERE ' . \implode(' AND ', $where);
        $sql .= ' ';
        // Group By
        if (!empty($args['sql_group'])) {
            $sql .= $args['sql_group'];
            $sql .= ' ';
        }
        // Order By
        if (empty($args['sql_order'])) {
            $sql .= 'ORDER BY `' . DB::table('visitor') . '`.`ID` DESC';
        } else {
            $sql .= $args['sql_order'];
        }
        // limit
        if (!empty($args['sql_limit'])) {
            $sql .= ' ';
            $sql .= $args['sql_limit'];
        }
        // Return Query
        return $sql;
    }
}
