<?php

namespace RankologyFno\Services\Table;

defined( 'ABSPATH' ) || exit;

use RankologyFno\Models\Table\TableInterface;
use RankologyFno\Core\Table\QueryCreateTable;
use RankologyFno\Core\Table\QueryExistTable;

class TableManager {
    public $queryCreateTable;
    public $queryExistTable;
   
    public function __construct(){
        $this->queryCreateTable = new QueryCreateTable();
        $this->queryExistTable = new QueryExistTable();
    }

    public function exist(TableInterface $table){
        return $this->queryExistTable->exist($table);
    }

    public function create(TableInterface $table){
        if($this->exist($table)){
            return;
        }

        $this->queryCreateTable->create($table);
    }

    public function createTablesIfNeeded($tables){
        foreach ($tables as $key => $table) {
            $this->create($table);
        }
    }

}
