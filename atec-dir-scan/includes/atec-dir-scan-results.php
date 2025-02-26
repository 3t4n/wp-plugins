<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpds_results { 
	
private $atec_wpds_root, $atec_wpds_home, $totalCount, $totalSize, $dirSizeArr, $inclFoldersize;

private function foldersize($dir): array
{
	$count=0; $size = filesize(rtrim($dir,DIRECTORY_SEPARATOR));
	// @codingStandardsIgnoreStart
	// Much faster and less memory usage than WP_Filesystem_Direct::dirlist(
	$dir_handle = opendir($dir);
	if (is_resource($dir_handle))
	{
		while(($f = readdir($dir_handle)) == true)  
		{
			if ($f==='.' || $f==='..') continue;
			$fullpath=$dir.$f;
			if (is_dir($fullpath)) { $result=$this->foldersize($fullpath.DIRECTORY_SEPARATOR); $size+=$result[1]; $count+=$result[0]; }
			else { $count++; $size+=@filesize($fullpath)??0; }
		} 
		closedir($dir_handle);
	}
	// @codingStandardsIgnoreEnd
	return [$count,$size];
}

public function lightBox($fullpath,$filename,$icon)
{
	$fullpath=str_replace($this->atec_wpds_root, $this->atec_wpds_home, $fullpath);
	echo '<span onclick="lightBox(\'', esc_html($fullpath), '\',\'', esc_attr($icon), '\');">', esc_html($filename), '</a>';
}

public function atec_wpds_find_files($dir,$depth,&$level)
{
	// @codingStandardsIgnoreStart
	// Much faster and less memory usage than WP_Filesystem_Direct::dirlist(
	$dir_handle = opendir($dir);
	if (is_resource($dir_handle))
	{
		while(($f = readdir($dir_handle)) == true)  
		{
			if ($f==='.' || $f==='..') continue;
			$count=substr_count($dir,DIRECTORY_SEPARATOR)-$depth;
			while ($count<$level) { echo '</ul></li>'; $level--; }
	
			$fullpath=$dir.$f;
			if (is_dir($fullpath)) 
			{ 		
				if ($this->inclFoldersize)
				{
					$total=$this->foldersize($fullpath.DIRECTORY_SEPARATOR);
					$class=$total[1]>1000000 || $total[0]>100?'atec-red':'';
					echo '<li>', esc_attr($f), ' – <span class="', esc_html($class), '">', 
					esc_attr(size_format($total[1])),' (',esc_attr($total[0]),' <span class="small">', esc_attr__('files','atec-dir-scan'), '</span>)</span><ul>'; 
				}
				else echo '<li>', esc_attr($f), '<ul>';
				$level++;
				$this->atec_wpds_find_files($fullpath.DIRECTORY_SEPARATOR,$depth,$level);
			}
			else
			{
				$this->totalCount++;
				$size=filesize($fullpath); 
				$this->totalSize+=$size;
				$ext=pathinfo($f, PATHINFO_EXTENSION);
				$icon=getIcon($ext);
				$preview=!in_array($icon,['media-default','media-archive']) && $ext!=='php';
				echo '
				<li ', ($preview?'class="blue"':''), ' data-jstree=\'{"icon":"dashicons dashicons-',esc_attr($icon),'"}\'>';
					if ($preview) $this->lightBox($fullpath,$f,$icon);			
					else echo esc_attr($f);
				echo ' – <span class="',esc_html($size>1000000?'atec-red':''),'">',esc_attr(size_format($size)),'</span>
				</li>';
			}
		}
		closedir($dir_handle);
	}
	// @codingStandardsIgnoreEnd
}
	
function __construct() {
	
$this->atec_wpds_root=ABSPATH;
if (!(DIRECTORY_SEPARATOR=='/')) $this->atec_wpds_root=str_replace('/','\\',$this->atec_wpds_root);
$this->atec_wpds_home=get_home_url().DIRECTORY_SEPARATOR;

$this->totalCount=0;
$this->totalSize=0;
$this->dirSizeArr=[];

function getIcon($ext): string
{
	$icon='media-default';
	if ($ext!=='')
	switch ($ext) {
		case (in_array($ext,['xls','xlsx','csv','numbers'])): $icon='media-spreadsheet'; break;
		case (in_array($ext,['ppt','pptx','key'])): $icon='media-interactive'; break;
		case (in_array($ext,['doc','docx','pages'])): $icon='media-document'; break;
		case (in_array($ext,['php','html','html','json','css','js'])): $icon='media-code'; break;
		case (in_array($ext,['txt','log'])): $icon='media-text'; break;
		case (in_array($ext,['pdf'])): $icon='pdf'; break;
		case (in_array($ext,['aac','aiff','flac','m4a','m4p','mp3','ogg','wav','webm'])): $icon='media-audio'; break;
		case (in_array($ext,['mp4','mov','avi','wmv','webm','flv'])): $icon='media-video'; break;
		case (in_array($ext,['rar','zip','gz','tar'])): $icon='media-archive'; break;
		case (in_array($ext,['svg','png','gif','jpeg','jpg','apng','bmp','ico','webp'])): $icon='format-image'; break;
	}
	return $icon;
}
	
// @codingStandardsIgnoreStart
// Scanning can take some time.
set_time_limit(3600);
// @codingStandardsIgnoreEnd

echo '<div class="atec-page">';
	atec_header(__DIR__,'wpds','Dir Scan');	
	
	echo '<div class="atec-main">';
		atec_progress();
		
		$url			= atec_get_url();
		$nonce 	= wp_create_nonce(atec_nonce());
		$action		= atec_clean_request('action');
		$nav			= atec_clean_request('nav');
		if ($nav==='') $nav='Dashboard';
			
		atec_nav_tab_dashboard($url, $nonce, $nav, __DIR__);
		echo
		'<div class="atec-g atec-border">';
			atec_flush();
			
			if ($nav=='Info') { @require('atec-info.php'); new ATEC_info(__DIR__,$url,$nonce); }
			else
			{
				$this->inclFoldersize = $action==='foldersize';

				atec_little_block(__('Root','atec-dir-scan').': '.esc_attr($this->atec_wpds_root));
				atec_flush();
				echo '
				<div class="atec-g atec-border">
								
					<div id="dirScanButtons" class="atec-btn-div atec-dn">
						<div class="atec-dilb">'; 
						atec_nav_button($url,$nonce,'foldersize','','Calculate folder size',false);
						echo '
						<a class="atec-ml-10 alignleft" id="jsTreeCloseAll" href="" onclick="return jsTreeCloseAll();"><button class="button button-secondary">', esc_attr__('Close all','atec-dir-scan'), '</button></a>
						<a class="atec-ml-10 alignleft" id="jsTreeOpenAll" href="" onclick="return jsTreeOpenAll();"><button class="button button-secondary">', esc_attr__('Open all','atec-dir-scan'), '</button></a>
						</div>
					</div>
					
					<div id="dirScanLoading">', esc_attr__('Loading directory tree','atec-dir-scan'), ' . . . ';
						if (function_exists('atec_loader_dots')) atec_loader_dots();
					echo '
					</div>';
				
					$level=0;
				
					atec_flush();
					$start=microtime(true);
					echo '<div id="dirScan" class="atec-dn"><ul>';
						$this->atec_wpds_find_files($this->atec_wpds_root,substr_count($this->atec_wpds_root,DIRECTORY_SEPARATOR),$level);
					echo '</ul></div>';
					$stop=microtime(true);
				
					echo '
					<br>
					<div id="summary" class="atec-dn">
						<table class="atec-table atec-table-tiny">
							<tr><td class="atec-label">', esc_attr__('Time','atec-dir-scan'), ':</td><td>',esc_attr(number_format(round($stop-$start),2)),' <small>s</small></td></tr>
							<tr><td class="atec-label">', esc_attr__('Files','atec-dir-scan'), ':</td><td>',esc_attr(number_format($this->totalCount)),'</td></tr>
							<tr><td class="atec-label">', esc_attr__('Size','atec-dir-scan'), ':</td><td>',esc_attr(number_format($this->totalSize)),' Bytes | ',esc_html(size_format($this->totalSize)),'</td></tr>
						</table>
					</div>
				</div>';
			}
	echo '
		</div>
	</div>
</div>';

@require('atec-footer.php');

atec_reg_inline_script('wpds_dir_scan', '
jQuery(function () 
{
	jQuery("#dirScan")
	.jstree({"plugins" : [ "themes", "html_data", "sort" ]})
	.bind("select_node.jstree", function (e, data) { data.instance.toggle_node(data.node); })
	.bind("ready.jstree", function()
	{ 
		jQuery("#dirScanLoading").fadeOut(); 
		jQuery("#dirScanButtons, #dirScan, #summary").removeClass("atec-dn"); 
	});
	jQuery(document).keyup(function(e) { if (e.keyCode == 27 && instance) { instance.close(); } })
});', true);

}}

new ATEC_wpds_results;
?>