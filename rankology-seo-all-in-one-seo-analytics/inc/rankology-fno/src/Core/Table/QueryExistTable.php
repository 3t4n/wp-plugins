<?php

namespace RankologyFno\Core\Table;

defined( 'ABSPATH' ) || exit;

use RankologyFno\Models\Table\TableInterface;

class QueryExistTable {

    public function exist(TableInterface $table){

        global $wpdb;

		$query = "SHOW TABLES LIKE '{$wpdb->prefix}{$table->getName()}'";
		try {
            $result = $wpdb->query( $query );

            if($result === 0){
                return false;
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}

