<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpd_memory { function __construct($memlimit,$url,$nonce) {		

$peak		= '-/-';
$percent	= '';

$iniMem = ini_get('memory_limit');
$phpMemLimit = function_exists('atec_KMG_2_Int')?atec_KMG_2_Int($iniMem):wp_convert_hr_to_bytes($iniMem);

$memlimit = $memlimit!=''?$memlimit:(defined('WP_MEMORY_LIMIT')?WP_MEMORY_LIMIT:'40M');
$wpMemLimit = function_exists('atec_KMG_2_Int')?atec_KMG_2_Int($memlimit):wp_convert_hr_to_bytes($memlimit);
	
$wpMaxMemLimit	 = function_exists('atec_KMG_2_Int')?atec_KMG_2_Int(WP_MAX_MEMORY_LIMIT):wp_convert_hr_to_bytes(WP_MAX_MEMORY_LIMIT);

if (function_exists('memory_get_peak_usage')) { $peak=memory_get_peak_usage(true); $percent='('.round($peak/$wpMemLimit*100,1).' %)'; }

echo '
<div class="atec-g">
	<div style="padding-top: 10px;">
		  <table class="atec-table atec-table-td-first">
			<thead><tr><th>PHP memory limit</th><th>WP memory limit</th><th>WP max. memory limit</th><th>memory usage (peak)</th></thead>
			<tbody>
			  <tr>
				<td>',esc_html(size_format($wpMaxMemLimit)),'</td>
				<td>            		
					  <form name="setMemLimit" method="post" action="',esc_url($url),'&action=memlimit&nav=Memory&_wpnonce=',esc_attr($nonce),'">
						<select style="margin-bottom: 10px;" name="memlimit">';
						$mega=1024*1024; $start=16*$mega; $memArr=[];
						for($i = 1; $i <= 10; $i++) { $start*=2; if ($start<=$phpMemLimit) $memArr[] = $start; }
						if (!in_array($wpMemLimit, $memArr)) { $memArr[] = $wpMemLimit; sort($memArr); }
						foreach($memArr as $mem)
						{
						  $selected=$mem==$wpMemLimit?' SELECTED':'';
						  echo '<option value="',esc_attr($mem/$mega),'M" ',esc_attr($selected),'>',esc_html(size_format($mem)),'</option>';
						}
						echo '</select>
						<input type="submit" name="submit" id="submit" class="button button-primary" value="Submit">
					  </form>
				  </td>
				<td>', esc_html(size_format($wpMaxMemLimit)),'</td>
				<td>', esc_html(size_format($peak)),' ',esc_attr($percent),'</td>
			  </tr>
			</tbody>
		  </table>
		  
		  <a href="', esc_url($url),'/&action=defaultMemLimit&_wpnonce=',esc_attr($nonce),'"><button class="button button-secondary">Reset to default</button></a>
	</div>
</div>';

}}

?>