<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpb_files_tools {

private $dirsArr, $fileCount, $dirCount;

private function atec_wpb_dirs_array($dir)
{
	// @codingStandardsIgnoreStart
	// Much faster and less memory usage than WP_Filesystem_Direct::dirlist(
	$dir_handle = opendir($dir);
	if (is_resource($dir_handle))
	{
		while(($f = readdir($dir_handle)) == true)  
		{
			if ($f==='.' || $f==='..') continue;
			$fullpath=$dir.$f;
			if (is_dir($fullpath)) 
			{ 
				$this->dirsArr[]=$fullpath;
				$this->atec_wpb_dirs_array($fullpath.DIRECTORY_SEPARATOR); 
			}
		} 
		closedir($dir_handle);
	}
	// @codingStandardsIgnoreEnd
}
	
public function atec_wpb_backup($zipPath,$show=true,$excludes='',$scanPath='')
{
	if ($scanPath==='') $scanPath=get_home_path();
	$excludes=rtrim(trim($excludes),"\n");
	$ex=$excludes===''?[]:explode("\n",$excludes);
	// https://stackoverflow.com/questions/36287554/php-ziparchive-file-permissions
	// @codingStandardsIgnoreStart
	try 
	{
		$zip = new ZipArchive();
		$success = $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);
		$fileCount = 0; $dirCount = 0; $error='';
		$uCount=0; $uMax=1024;
		if ($success)
		{
			// Uploading/Download can take some time
			set_time_limit(3600);
			$reg = '/atec_backup(\S+)\.zip/m'; // Do not backup the backup files
			foreach ($ex as $key=>$value) $ex[$key]=trim($value);
			$this->atec_wpb_dirs_array($scanPath.DIRECTORY_SEPARATOR);
			array_unshift($this->dirsArr,$scanPath);
			$nrDirs=count($this->dirsArr);
			$lastPercent=0; $c=0;
			foreach ($this->dirsArr as $d)
			{               			
				$c++; $percent=round($c/$nrDirs*100);
				if ($percent!==$lastPercent && $percent % 5==0) 
				{ echo '<span class="atec-counter">', esc_attr(round($percent)), '<span class="atec-fs-8">%</span></span>'; atec_flush(); $lastPercent=$percent; }
				// Much faster and less memory usage than WP_Filesystem_Direct::dirlist(
				$dir_handle = opendir($d.DIRECTORY_SEPARATOR);
				if (is_resource($dir_handle))
				{
					while((($f = readdir($dir_handle)) == true) && $success)  
					{
						if ($f==='.' || $f==='..' || $f==='.DS_Store') continue;
						$fullpath=$d.DIRECTORY_SEPARATOR.$f;
						$relativePath = str_replace($scanPath,'',$fullpath);
						if ($relativePath==='') continue;
						$exclude=false;
						foreach ($ex as $x) { if (str_contains($fullpath,$x)) { $exclude=true; break; } }
						if (!$exclude && !preg_match($reg, $fullpath)) 
						{ 
							if (!is_dir($fullpath)) 
							{ 
								if (is_readable($fullpath)) 
								{
									$fileCount++; $uCount++;
									$success = $success && @$zip->addFile($fullpath, $relativePath);
								}
								else 
								{ $success=false; $error='File is not readable: '.$relativePath; }
							}
							elseif ($fullpath!==$scanPath && $relativePath!==rtrim($scanPath,DIRECTORY_SEPARATOR))
							{
								if (is_readable($fullpath)) 
								{
									$dirCount++;
									$success = $success && @$zip->addEmptyDir($relativePath); // || $zip->getStatusString()==='File already exists');
								}
								else 
								{ $success=false; $error='Directory is not readable: '.$relativePath; }

							}
							else continue;
							@$zip->setExternalAttributesName($relativePath,ZipArchive::OPSYS_UNIX, fileperms($fullpath) << 16);
						}
					}
				}
				if ($uCount>$uMax) { $uCount=0; @$zip->close(); @$zip->open($zipPath); } //echo '<span>♾️</span>'; 
			}
			unset($this->dirsArr); 

			if (!$success) echo '<span class="atec-counter">🚩</span></div>';
			else
			{
				echo 
				'<span class="atec-counter">🏁</span></div>
				<span class="atec-fs-12">', 
					esc_attr(number_format($fileCount)), ' files and ', esc_attr(number_format($dirCount)), ' folders added.
					<br>Closing ZIP file now, please be patient . . .</span>
				</span>
				<div class="atec-fs-10 atec-mt-10" style="line-height: 10px; padding:10px 0;">';
					atec_flush();
					if (method_exists($zip,'registerProgressCallback')) 
					$zip->registerProgressCallback(0.05, function ($r) { echo '<span class="atec-counter">', esc_attr(round($r*100)), '<span class="atec-fs-8">%</span></span>'; atec_flush(); });
					$success = $success && @$zip->close();
				echo '<span class="atec-counter">🏁</span></div>';
				//echo '<strong>ZIP status: </strong>'.$zip->getStatusString().'.';
			}
		}
		else { throw new Exception('Failed to create ZIP archive. '.$error); }
	}
	catch (Exception $e) { return $e->getMessage(); }
	return $fileCount;
	// @codingStandardsIgnoreEnd
}

public function atec_wpb_restore($zipPath,$restorePath='') 
{
	if ($restorePath==='') $restorePath=get_home_path();
	echo '<span class="atec-counter">🏁</span></div>';
	// @codingStandardsIgnoreStart
	$zip = new ZipArchive();
	$success = $zip->open($zipPath, ZipArchive::RDONLY);
	if ($success)
	{
		// Uploading/Download can take some time
		set_time_limit(3600);
		$success = $success && $zip->extractTo($restorePath);
		if ($success) $count = $zip->count();
		$success = $success && $zip->close();
	}
	// @codingStandardsIgnoreEnd
	return $success?$count:'Restoring files failed.';
}

function __construct() {
	
$this->dirsArr=[];
	
}}
?>