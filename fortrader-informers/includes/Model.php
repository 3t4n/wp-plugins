<?php

class FtiModel{

	public $id;
	public $lang;
	public $title;
	public $catId;
	public $catTitle;
	public $styleId;
	public $styleTitle;
	public $height;
	public $width;
	public $url;
	
	public static $formats = array(
		'id' => '%d',
		'lang' => '%s',
		'title' => '%s',
		'catId' => '%d',
		'catTitle' => '%s',
		'styleId' => '%d',
		'styleTitle' => '%s',
		'height' => '%d',
		'width' => '%d',
		'url' => '%s',
	);
	public function getInformerCode(){
		return '<iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:' . $this->height . 'px" scrolling="no" src="' . FtiHelper::get('ftUrl') . $this->url . '"></iframe>';
	}
	public function save(){
		global $wpdb;
		

		$paramsArr = array();
		$formatsArr = array();
		
		foreach( self::$formats as $key => $val ){
			$paramsArr[$key] = $this->{$key};
			$formatsArr[] = $val;
		}

		$wpdb->replace( 
			self::getTableName(), 
			$paramsArr,
			$formatsArr
		);
		return $wpdb->insert_id;
	}
	public static function count( $where = false, $params = false ){
		global $wpdb;
		if( !$where || !$params ) {
			$where = ' 1=1 ';
			$params = 1;
		}
		return $wpdb->get_var( $wpdb->prepare( 
			"
				SELECT COUNT(*)
				FROM ".self::getTableName()." 
				WHERE $where
			", 
			$params
		));
	}
	public static function destroy($ids){
		if( !$ids ) return false;
		if( !is_array( $ids ) ) $ids = array( $ids );
		
		global $wpdb;
		
		$idsStr = implode(',', $ids);
		
		return $wpdb->query(
			"
				DELETE FROM ".self::getTableName()." 
				WHERE id IN ($idsStr)
			"
		);
	}
	public static function getAll(){
		global $wpdb;

		$results =  $wpdb->get_results(
		"
			SELECT * 
			FROM ".self::getTableName()." 
			WHERE 1=1
		"
		, ARRAY_A);
		if( !$results ) return false;
		$modelArr = array();
		foreach( $results as $row ){
			$modelArr[] = self::rowToModel( $row );
		}
		return $modelArr;
	}
	public static function forPage( $currentPage, $perPage, $where = false, $params = false ){
		global $wpdb;
		if( !$where || !$params ) {
			$where = ' 1=1 ';
			$params = array(1);
		}
		$params[] = '%d';$params[] = '%d';
		$currentPage = ($currentPage-1) * $perPage;
		
		$results =  $wpdb->get_results( $wpdb->prepare(
			"
				SELECT * 
				FROM ".self::getTableName()." 
				WHERE $where
				LIMIT $currentPage, $perPage
			", 
			$params
		), ARRAY_A);
		if( !$results ) return false;
		$modelArr = array();
		foreach( $results as $row ){
			$modelArr[] = self::rowToModel( $row );
		}
		return $modelArr;
	}
	public static function findOneByWhere( $where, $params ){
		global $wpdb;
		if( !$where || !$params ) return false;
		$result =  $wpdb->get_row( $wpdb->prepare( 
			"
				SELECT * 
				FROM ".self::getTableName()." 
				WHERE $where
			", 
			$params
		), ARRAY_A);
		if( !$result ) return false;
		
		return self::rowToModel( $result );
	}
	public static function findOneByTitle( $title ){
		global $wpdb;
		
		$result =  $wpdb->get_row( $wpdb->prepare( 
			"
				SELECT * 
				FROM ".self::getTableName()." 
				WHERE title = %s
			", 
			$title
		), ARRAY_A);
		if( !$result ) return false;
		
		return self::rowToModel( $result );
	}
	public static function find($id){
		if( !$id ) return false;
		
		global $wpdb;
		
		$result =  $wpdb->get_row( $wpdb->prepare( 
			"
				SELECT * 
				FROM ".self::getTableName()." 
				WHERE id = %d
			", 
			$id
		), ARRAY_A);
		
		if( !$result ) return false;
		
		return self::rowToModel( $result );
	}
	public static function rowToModel( $row ){
		if( !$row ) return false;
		$model = new self;
		foreach( $row as $property => $value ){
			$model->{$property} = $value;
		}
		return $model;
	}
	public static function create( $params ){
		if( !$params ) return false;
		
		global $wpdb;
		
		$formatsArr = array();
		foreach( $params as $key => $val ){
			if( !isset( self::$formats[$key] ) ) return false;
			$formatsArr[] = self::$formats[$key];
		}
		
		if( !$formatsArr ) return false;
		
		$wpdb->insert(
			self::getTableName(), 
			$params, 
			$formatsArr
		);
		
		$id = $wpdb->insert_id;
		if( !$id ) return false;
		return self::find($id);
	}
	
	public static function getTableName(){
		global $wpdb;
		return  $wpdb->prefix . 'ft_informers';
	}
}