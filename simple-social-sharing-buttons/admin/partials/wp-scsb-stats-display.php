<?php

/**
 * Provide a stats area for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.2803media.fr/
 * @since      1.0.0
 *
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2 class=""><?php _e( 'Simple social sharing buttons - Statistics', 'wp-scsb' ); ?></h2>
    <br />
	<?php 
	
		global $wpdb;
		$datas = array();
		$scsb = "SELECT * FROM `$wpdb->options` WHERE `option_name` LIKE '_transient_scsb_%' AND option_value LIKE '%day%'";
		$result = $wpdb->get_results($scsb, 'ARRAY_A' );
        foreach( $result as $var){
			$option_value = unserialize($var['option_value']);
			
			$day = $option_value['day'];
			$day = explode('-',$day);
			$dayarray = array($day[2],$day[1],$day[0]);
			$day = implode('-',$dayarray);
			$option_value['newday'] = $day;
			$datas[$option_value['day']] = $option_value;
			//print_r($option_value);
			//$datas[] = ;
		}
		//print_r($result);
		//print_r($datas);
	
		$datasm = array();
		$scsbm = "SELECT * FROM `$wpdb->options` WHERE `option_name` LIKE '_transient_scsb_%' AND option_value LIKE '%month%'";
		$resultm = $wpdb->get_results($scsbm, 'ARRAY_A' );
        foreach( $resultm as $varm){
			$option_valuem = unserialize($varm['option_value']);
			
			$daym = $option_valuem['month'];
			$daym = explode('-',$daym);
			$dayarraym = array($daym[1],$daym[0]);
			$daym = implode('-',$dayarraym);
			$option_valuem['newmonth'] = $daym;
			$datasm[$option_valuem['month']] = $option_valuem;
			//print_r($option_value);
			//$datas[] = ;
		}
	
		$datast = array();
		$scsbt = "SELECT * FROM `$wpdb->options` WHERE `option_name` LIKE '_transient_scsb_%' AND option_value LIKE '%date%'";
		$resultt = $wpdb->get_results($scsbt, 'ARRAY_A' );
        foreach( $resultt as $vart){
			$option_valuet = unserialize($vart['option_value']);
			
			//print_r($option_valuet);
			
			foreach($option_valuet as $key=>$val){
				//echo $key;
				if($key != 'date'){
					if(isset($datast[$key])){
						$datast[$key] = $datast[$key] + $option_valuet[$key];
					} else {
						$datast[$key] = $option_valuet[$key];
					}
				}
			}
			//$datas[] = ;
		}
	//print_r($datast);
					
	?>
	<h3><?php _e( 'Last 30 days', 'wp-scsb' ); ?></h3>
	<div id="visionmensuelle" style="height: 250px;"></div>

	<h3><?php _e( 'Last 12 month', 'wp-scsb' ); ?></h3>
	<div id="visionmensuellem" style="height: 250px;"></div>

	<h3><?php _e( 'Top 10 posts or pages', 'wp-scsb' ); ?></h3>
	<?php
		$podium = get_transient( 'scsb_top');
		//print_r($podium);
		foreach($podium as $top){
			echo '<p><div class="rubrique_top"><span class="top_post_title"><a href="'.get_permalink($top['post_id']).'">'.get_the_title($top['post_id']).'</a></span>';
			echo '<span class="top_post_share">'.custom_number_format($top['value'],1,'classic').'</span></div></p><div class="clear"></div>';
		}
	?>
</div>   

<script>
	Morris.Line({
	  element: 'visionmensuelle',
	  data: [
	  <?php 
	  	foreach($datas as $data){
	  ?>	
	    { y: '<?php echo $data["newday"]; ?>', a: <?php if($data["total"] != ''){ echo $data["total"]; } else { echo '0';} ?>, b: <?php if($data["facebook"] != ''){ echo round($data["facebook"],2); } else { echo '0';} ?>,c: <?php if($data["twitter"] != ''){ echo round($data["twitter"],2); } else { echo '0';} ?>,d: <?php if($data["linkedin"] != ''){ echo round($data["linkedin"],2); } else { echo '0';} ?>,e: <?php if($data["pinterest"] != ''){ echo round($data["pinterest"],2); } else { echo '0';} ?>,f: <?php if($data["google-plus"] != ''){ echo round($data["google-plus"],2); } else { echo '0';} ?>},
	  <?php } ?>  
	    ],
	  xkey: 'y',
	  ykeys: ['a','b','c','d','e','f'],
	  labels: ['total','facebook','twitter','linkedin','pinterest','google-plus'],
	  xLabels: ['day'],
	  lineColors: ['#FF4081', '#3b5998', '#55acee', '#0077b5', '#cc2127', '#dd4b39']
	});
	
	Morris.Line({
	  element: 'visionmensuellem',
	  data: [
	  <?php 
	  	foreach($datasm as $data){
	  ?>	
	    { y: '<?php echo $data["newmonth"]; ?>', a: <?php if($data["total"] != ''){ echo $data["total"]; } else { echo '0';} ?>, b: <?php if($data["facebook"] != ''){ echo round($data["facebook"],2); } else { echo '0';} ?>,c: <?php if($data["twitter"] != ''){ echo round($data["twitter"],2); } else { echo '0';} ?>,d: <?php if($data["linkedin"] != ''){ echo round($data["linkedin"],2); } else { echo '0';} ?>,e: <?php if($data["pinterest"] != ''){ echo round($data["pinterest"],2); } else { echo '0';} ?>,f: <?php if($data["google-plus"] != ''){ echo round($data["google-plus"],2); } else { echo '0';} ?>},
	  <?php } ?>  
	    ],
	  xkey: 'y',
	  ykeys: ['a','b','c','d','e','f'],
	  labels: ['total','facebook','twitter','linkedin','pinterest','google-plus'],
	  xLabels: ['day'],
	  lineColors: ['#FF4081', '#3b5998', '#55acee', '#0077b5', '#cc2127', '#dd4b39']
	});
</script>