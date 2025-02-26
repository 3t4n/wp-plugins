<?php

namespace RankologyFno\Services\Table;

defined( 'ABSPATH' ) || exit;

use RankologyFno\Models\Table\TableInterface;
use RankologyFno\Core\Table\TableFactory;
use RankologyFno\Models\Table\TableStructure;
use RankologyFno\Models\Table\TableColumn;
use RankologyFno\Models\Table\Table;


class TableList {

    public function getTableSignificantKeywords(){
        $tableStructureImportantKeywords = new TableStructure([
            new TableColumn('id', [
                'type' => 'bigint(20)',
                'primaryKey' => true
            ]),
            new TableColumn('post_id', [
                'type' => 'bigint(20)',
                'index' => true,
            ]),
            new TableColumn('word', [
                'type' => 'varchar(100)',
                'index' => true,
            ]),
            new TableColumn('count', [
                'type' => 'int(11)',
            ]),
            new TableColumn('tf', [
                'type' => 'float',
            ]),
        ]);

        return new Table("rankology_significant_keywords", $tableStructureImportantKeywords, 1);
    }

    public function getTables(){
        return [
            "rankology_significant_keywords" => $this->getTableSignificantKeywords(),
        ];
    }
}
