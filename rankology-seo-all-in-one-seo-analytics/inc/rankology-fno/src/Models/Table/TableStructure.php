<?php

namespace RankologyFno\Models\Table;

defined( 'ABSPATH' ) || exit;

use RankologyFno\Models\Table\TableStructureInterface;

class TableStructure implements TableStructureInterface{
    public $columns;
    public function __construct($columns){
        $this->columns = $columns;
    }


    /**
     * @return array
     */
	public function getColumns(){
        return $this->columns;
    }


}
