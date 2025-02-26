<?php
class hsgpi_intermediate
{
	public static function hsgpi_admin()
	{
		global $wpdb;
		$current_page = isset($_GET['ac']) ? $_GET['ac'] : '';
		switch($current_page)
		{
			case 'add':
				require_once(HSGPI_DIR.'page'.DIRECTORY_SEPARATOR.'hsgpi-add.php');
				break;
			case 'edit':
				require_once(HSGPI_DIR.'page'.DIRECTORY_SEPARATOR.'hsgpi-edit.php');
				break;
			default:
				require_once(HSGPI_DIR.'page'.DIRECTORY_SEPARATOR.'hsgpi-show.php');
				break;
		}
	}
}

class hsgpi_validation
{
	public static function num_val($value)
	{
		$returnvalue = "valid";
		if( !is_numeric($value) ) 
		{ 
			$returnvalue = "invalid";
		}
		return $returnvalue;
	}
	
	public static function val_yn($value)
	{
		$returnvalue = "YES";
		if($value == "YES" || $value == "NO")
		{
			$returnvalue = $value;
		}
		return $returnvalue;
	}
	
	public static function val_tf($value)
	{
		$returnvalue = "true";
		if($value == "true" || $value == "false")
		{
			$returnvalue = $value;
		}
		return $returnvalue;
	}
}
?>