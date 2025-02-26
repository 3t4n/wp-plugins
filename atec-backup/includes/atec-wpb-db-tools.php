<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpb_db_tools { 

private $backupFile;
private $db;
private $tableCount;
private $lastTable;

private function atec_wpb_writeBackupHeader() 
{
	global $wpdb;
	// @codingStandardsIgnoreStart
	// There is no equivalent to the fopen/fwrite/fseek/fclose function in WP. 
	// WP_Filesystem_Direct::put_contents does not allow file append and reading the whole DB content into a single variable, in order to use put_contents, is inefficient and will potentially exceed the memory limit.
	
	$stmt = $this->db->prepare('SELECT @@character_set_database, @@collation_database');
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	fwrite($this->backupFile, 
"-- START_COMMENT --
-- atec Backup
-- © " . date('Y') . " Chris Ahrweiler.
-- URL: https://atecplugins.com/
--
-- Host: " . $this->db->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "
-- Generated on: " . date('Y-m-d H:i:s') . "
-- Server version: " . $this->db->getAttribute(PDO::ATTR_SERVER_VERSION) . "
-- CHARACTER: ".$result['@@character_set_database']."
-- COLLATE: ".$result['@@collation_database']."
-- PREFIX: ".$wpdb->prefix."
-- END_COMMENT --
\n
\n");
	// @codingStandardsIgnoreEnd
}

private function atec_wpb_backupAll($ex) 
{
	// @codingStandardsIgnoreStart
	// Using PDO to be compatible with MySQL/MariaDB
	set_time_limit(3600);
	$stmt = $this->db->query('SHOW TABLES');
	$tables = (array) $stmt->fetchAll(PDO::FETCH_COLUMN);
	// @codingStandardsIgnoreEnd
	$c=0;
	$nrTables=count($tables);
	$lastPercent=0;
	foreach ($tables as $table) 
	{
		$exclude=false;
		foreach ($ex as $x) { if (str_contains($table,$x)) { $exclude=true; break; } }
		if (!$exclude)
		{
			$c++;
			$percent=round($c/$nrTables)*100;
			if ($percent!==$lastPercent && $percent % 5==0) 
			{ echo '<span class="atec-counter">', esc_attr(round($percent)), '</span>'; atec_flush(); $lastPercent=$percent; }
			$this->atec_wpb_backupTableStructure($table);
			$this->atec_wpb_backupTableData($table);
		}
	}
	$this->tableCount = $c;
}

private function atec_wpb_backupTableStructure($tableName) 
{
	// @codingStandardsIgnoreStart
	// Using PDO to be compatible with MySQL/MariaDB
	$stmt = $this->db->prepare("SHOW CREATE TABLE $tableName");
	$stmt->execute();
	$tableStructure = $stmt->fetch(PDO::FETCH_ASSOC);
	// There is no equivalent to the fopen/fwrite/fseek/fclose function in WP. 
	// WP_Filesystem_Direct::put_contents does not allow file append and reading the whole DB content into a single variable, in order to use put_contents, is inefficient and will potentially exceed the memory limit.
	fwrite($this->backupFile, "\n\n" . $tableStructure['Create Table'] . ";\n-- END_COMMAND --\n");
	// @codingStandardsIgnoreEnd
}

private function atec_wpb_addslashes($str) 
{
	if (!is_null($str)) return addslashes($str);
	return $str;
}

private function atec_wpb_backupTableData($tableName) {
	// @codingStandardsIgnoreStart
	// Using PDO to be compatible with MySQL/MariaDB
	$stmt = $this->db->prepare("SELECT * FROM $tableName");
	$stmt->execute();
	$tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if (empty($tableData)) { return; }
	// There is no equivalent to the fopen/fwrite/fseek/fclose function in WP. 
	// WP_Filesystem_Direct::put_contents does not allow file append and reading the whole DB content into a single variable, in order to use put_contents, is inefficient and will potentially exceed the memory limit.
	$fields = array_keys($tableData[0]);
	fwrite($this->backupFile, "\n\n");
	fwrite($this->backupFile, "INSERT INTO `$tableName` (`" . implode('`, `', $fields) . "`) VALUES \n");
	foreach ($tableData as $row) 
	{
		$values = array_map(function($value) { return "'" . $this->atec_wpb_addslashes($value) . "'"; }, array_values($row));
		fwrite($this->backupFile, "(". implode(', ', $values) . "),\n");
	}
	fseek($this->backupFile, -2, SEEK_END);
	fwrite($this->backupFile, ";\n-- END_COMMAND --\n");
	// @codingStandardsIgnoreEnd
}

private function atec_wpb_zipBackup($backupPath) 
{
	$zipPath = str_replace('.sql','.zip',$backupPath);
	try 
	{
		$zip = new ZipArchive();
		$success = $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);
		if ($success) 
		{
			$success = $success && $zip->addFile($backupPath, basename($backupPath));
			if (method_exists($zip,'registerProgressCallback')) 
			$zip->registerProgressCallback(0.05, function ($r) { echo '<span class="atec-counter">', esc_attr(round($r*100)), '<span class="atec-fs-8">%</span></span>'; atec_flush(); });
			$success = $success && $zip->close();
			if (!class_exists('ATEC_fs')) @require('atec-fs.php');
			$afs = new ATEC_fs();
			if ($success && $afs->exists($zipPath)) { $afs->unlink($backupPath); return true; }
			throw new Exception('Failed to write ZIP archive.');
		} 
		else { throw new Exception('Failed to create ZIP archive.'); }
	}
	catch (Exception $e) { return $e->getMessage(); }
}

public function atec_wpb_backup($backupPath,$show=true,$excludes='')
{
	$excludes=rtrim(trim($excludes),"\n");
	$ex=$excludes===''?[]:explode("\n",$excludes);
	//https://stackoverflow.com/questions/41616790/how-is-the-keyword-finally-meant-to-be-used-in-php
	
	// @codingStandardsIgnoreStart
	// Using PDO to be compatible with MySQL/MariaDB
	try { $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD); } 
	catch (PDOException $e) { return $e->getMessage(); } 	

	try 
	{
		$this->db->exec('SET foreign_key_checks = 0');
		$this->db->beginTransaction();
			$this->backupFile = fopen($backupPath, 'wt');
			if (!$this->backupFile) { throw new Exception('Failed to open backup file for writing.'); }
			$this->atec_wpb_writeBackupHeader();
			$this->atec_wpb_backupAll($ex);
			// There is no equivalent to the fopen/fwrite/fseek/fclose function in WP. 
			// WP_Filesystem_Direct::put_contents does not allow file append and reading the whole DB content into a single variable, in order to use put_contents, is inefficient and will potentially exceed the memory limit.
			fwrite($this->backupFile, "\n-- End of database backup");
			fclose($this->backupFile);
		$this->db->commit();
		echo 
		'<span class="atec-counter">🏁</span>
		</div>
		<span class="atec-fs-14">', esc_attr(number_format($this->tableCount)), ' tables added.
			<br>Writing ZIP file now, please be patient . . .</span>
		</span>
		<div class="atec-fs-10 atec-mt-10" style="line-height: 10px; padding:10px 0;">';
			atec_flush(); 	
			$result = $this->atec_wpb_zipBackup($backupPath);
			echo '<span class="atec-counter">🏁</span></div>';
		if ($result!==true) { return $result; };
		return $this->tableCount;
	} 
	catch (Exception $e) 
	{
		$this->db->rollBack();
		return $e->getMessage();
	} 
	finally 
	{
		$this->db->exec('SET foreign_key_checks = 1');
	}
	// @codingStandardsIgnoreEnd
}

private function atec_wpb_drop($table,$AB='') { $this->db->exec("DROP TABLE IF EXISTS `$AB$table`"); }

private function atec_wpb_table_exists($table)
{
	// @codingStandardsIgnoreStart
	// Using PDO to be compatible with MySQL/MariaDB
	$stmt = $this->db->prepare("SHOW TABLES LIKE '$table'");
	$stmt->execute();
	$tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return !empty($tableData);
	// @codingStandardsIgnoreEnd
}

public function atec_wpb_restore($zipPath,$wpbDirPath) {
	// @codingStandardsIgnoreStart
	$zip = new ZipArchive();
	$success = $zip->open($zipPath, ZipArchive::RDONLY);
	if ($success) 
	{
		set_time_limit(3600);
		$zip->extractTo($wpbDirPath);
		$zip->close();
		$backupPath=str_replace('.zip','.sql',$zipPath);
	}
	else { return 'Restore failed - can not open ZIP file.'; }
	// @codingStandardsIgnoreEnd

	if (!class_exists('ATEC_fs')) @require('atec-fs.php');
	$afs = new ATEC_fs();

	$backupContent = $afs->get($backupPath);
	$afs->unlink($backupPath);
	if (!$backupContent) { return 'Can not read backup file.'; }		
	
	// @codingStandardsIgnoreStart
	// Using PDO to be compatible with MySQL/MariaDB
	try { $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD); } 
	catch (PDOException $e) { return $e->getMessage(); } 	
	
	$reg = '/[\n|\s|\S]*-- END_COMMENT --\n([\n|\s|\S]*)/';
	$backupContent = preg_replace($reg, "$1", $backupContent);
	$queries = explode("-- END_COMMAND --\n", $backupContent);
	
	try
	{		
		$this->db->exec('SET SQL_MODE="ALLOW_INVALID_DATES"');
		$this->db->exec('SET FOREIGN_KEY_CHECKS = 0');	
		$this->lastTable='';
		$this->db->beginTransaction();
		$drop = false; $AB='@AB@';
		$c=0;
		$nrTables=count($queries);
		$lastPercent=0;
		foreach ($queries as $query) 
		{ 
			if (($query = trim($query))!=='')
			{
				$c++;
				$percent=round($c/$nrTables)*100;
				if ($percent!==$lastPercent && $percent % 5==0) 
				{ echo '<span class="atec-counter">', esc_attr(round($percent)), '</span>'; atec_flush(); $lastPercent=$percent; }
				$isCreate = false;
				preg_match('/CREATE TABLE `(\w+)`/', $query, $matches);
				if (isset($matches[1])) 
				{
					$isCreate = true;
					$table = $matches[1];
					$this->tableCount++;
					$stmt = $this->db->prepare("SHOW TABLES LIKE '$table'");
					$stmt->execute();
					$tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
					if ($this->atec_wpb_table_exists($table)) $this->db->exec("RENAME TABLE `$table` TO `$AB$table`");
					if ($this->lastTable!==$table) { $this->lastTable = $table; 	$drop = true; }
					
				}
				$result = $this->db->exec($query);
				if ($isCreate && $drop) { $this->atec_wpb_drop($this->lastTable,$AB); }
			}
		}
		$this->atec_wpb_drop($this->lastTable,$AB);
		$this->db->exec('SET FOREIGN_KEY_CHECKS = 1');	
		if ($this->db->inTransaction()) $this->db->commit();
		echo '<span class="atec-counter">🏁</span></div>';
		return $this->tableCount;
	} 
	catch (PDOException $e) 
	{
		echo '<span class="atec-counter">🚩</span></div>';
		$table=$this->lastTable;
		if ($this->atec_wpb_table_exists($AB.$table)) 
		{
			$this->atec_wpb_drop($table,'');
			$this->db->exec("RENAME TABLE `$AB$table` TO `$table`");
		}
		// if ($this->db->inTransaction()) $this->db->rollBack();	
		// rollBack() works with InnoDB only – so need my own rollBack();
		return $e->getMessage();
	}
	// @codingStandardsIgnoreEnd
}

function __construct() {
	
$this->tableCount = 0;

}}
?>