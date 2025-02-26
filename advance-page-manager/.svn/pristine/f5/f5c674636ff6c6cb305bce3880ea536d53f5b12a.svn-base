<?php 
class CMysql {
	var $lastsql = '';
	
	function mysql_login() {
		global $_CONFIG;
		
		mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
  		mysql_select_db(DB_NAME);
        
		@mysql_query('SET CHARACTER SET utf8');
		@mysql_query('SET NAME utf8');
		
		
	}

    function sqlarray($query) {
        $res = $this->query($query);
        $arr = array();
        while ($my = mysql_fetch_assoc($res)) {
            array_push($arr, $my);
        }
        return $arr;
    }
    
    function lastsql() {
    	return $this->lastsql;
    }
	
	function updateID($tabelle, $id, $keyValuePair) {
		return $this->update($tabelle, array('id'=>(int)$id), $keyValuePair);
	}
	
	function update($tabelle, $whereKeyValuePair, $keyValuePair) {
		if (is_array($keyValuePair)) {
			foreach ($keyValuePair as $key=>$val) {
				$queryUpdate .= '`'.mysql_real_escape_string($key).'` = "'.mysql_real_escape_string($val).'",';
			}
			
			if (is_array($whereKeyValuePair)) {
				$where =  ' WHERE ';
				foreach ($whereKeyValuePair as $key=>$val) {
					$where .= '`'.mysql_real_escape_string($key).'` = "'.mysql_real_escape_string($val).'" AND ';
				}
			}
			
			$where = substr($where, 0, strlen($where) - 4);
			$queryUpdate = substr($queryUpdate, 0, strlen($queryUpdate) - 1);
			
			$this->query('UPDATE '.$tabelle.' SET '.$queryUpdate.$where);
			
		}
	}
	
	function delete($tabelle, $id) {
		$this->query('DELETE FROM '.$tabelle.' WHERE id = "'.(int)$id.'"');
	}
	
	function insert($tabelle, $keyValuePair) {
		if (is_array($keyValuePair)) {
			foreach ($keyValuePair as $key=>$val) {
				$queryKeys .= '`'.mysql_real_escape_string($key).'`,';
				
				if ($val == 'NOW()') {
					$queryValues .= mysql_real_escape_string($val).',';
				} else {
					$queryValues .= '"'.mysql_real_escape_string($val).'",';
				}
			}
			$queryKeys = substr($queryKeys, 0, strlen($queryKeys) - 1);
			$queryValues = substr($queryValues, 0, strlen($queryValues) - 1);
			
			$this->query('INSERT INTO '.$tabelle.' ('.$queryKeys.') VALUES ('.$queryValues.')');
		}
		return mysql_insert_id();
	}
	
	function query($query) {
		$this->lastsql = $query;
		$res = @mysql_query($query);
		if (mysql_errno() != 1062  && mysql_error()) {
			echo mysql_errno().':'.mysql_error().'<br>'.$query.'<br>';
	 	}
		return $res;
	}

	function query_first($query) {
		$res = $this->query($query);
		$arr = @mysql_fetch_assoc($res);
		return $arr;
	}
}
?>