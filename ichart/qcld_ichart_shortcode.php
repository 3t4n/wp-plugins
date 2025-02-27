<?php 

global $pre_shortcode_instance;
$pre_shortcode_instance=0;

function qcld_iChart_modal() {

?>

<div class="ichart-chart-field-modal" id="ichart-qcld-chart-field-modal" style="display:none">
  	<div class="ichart-chart-field-modal-close">&times;</div>
  	<h1 class="ichart-chart-field-modal-title"><?php esc_html_e( 'Create iChart' , 'iChart' ); ?></h1>
 	<div style="position: absolute;right: 59px;">
		<input type="button" value="<?php esc_html_e( 'Generate Chart' , 'iChart' ); ?>" class="button button-primary button-large iChartgetallvalue" />
	</div>
	<div style="margin-top: 31px;margin-bottom: 20px;">
		<p style="font-size: 14px;
	    border-bottom: 1px solid #ddd;
	    padding-bottom: 10px;
	    margin-bottom: 10px;"><?php esc_html_e( 'iChart is a Project by' , 'iChart' ); ?> <a href="<?php echo esc_url('https://www.quantumcloud.com/'); ?>" style="text-decoration:none"><?php esc_html_e( 'Web Design Company - QuantumCloud' , 'iChart' ); ?></a> &nbsp; | &nbsp; <a style="color: #FCB214;font-size: 16px; font-weight: bold;text-decoration: none;" href="<?php echo esc_url(qcichart_upgrade_link); ?>" target="_blank" ><?php esc_html_e( 'Upgrade to Pro' , 'iChart' ); ?></a></p>

	</div>
  	<div class="ichart-chart-field-modal-icons">

		<div class="form-group">
			
			<label for="charttype"><?php esc_html_e( 'Select Chart Type' , 'iChart' ); ?></label>
			<select id="ichart-charttype" class="form-control">
				<option value="<?php esc_html_e( 'line' , 'iChart' ); ?>"><?php esc_html_e( 'Line' , 'iChart' ); ?></option>
				<option value="<?php esc_html_e( 'bar' , 'iChart' ); ?>"><?php esc_html_e( 'Bar' , 'iChart' ); ?></option>
				<option value="<?php esc_html_e( 'radar' , 'iChart' ); ?>"><?php esc_html_e( 'Radar' , 'iChart' ); ?></option>
				<option value="<?php esc_html_e( 'polarArea' , 'iChart' ); ?>"><?php esc_html_e( 'polarArea' , 'iChart' ); ?></option>
				<option value="<?php esc_html_e( 'pie' , 'iChart' ); ?>"><?php esc_html_e( 'pie' , 'iChart' ); ?></option>
				<option value="<?php esc_html_e( 'doughnut' , 'iChart' ); ?>"><?php esc_html_e( 'doughnut' , 'iChart' ); ?></option>
			</select>

		</div>
		<div class="form-group">
			<label for="datasettitle"><?php esc_html_e( 'Chart Title' , 'iChart' ); ?></label>
			<input type="text" id="ichart-charttitle" required/>
		</div>
		<div id="ichart-datasetcontainer" class="datasetcontainer">
			<p class="datasetheading"><?php esc_html_e( 'Dataset Area' , 'iChart' ); ?></p>
			<div class="form-group">
				<label for="datasettitle"><?php esc_html_e( 'Dataset Name' , 'iChart' ); ?></label>
				<input type="text" id="ichart-datasetname" required/>
			</div>
			<table id="ichart-iChartdatasettable" class="datasettable" cellspacing="0">
				<thead>
					<tr>
						<th class="manage-column column-cb check-column" scope="col"><?php esc_html_e( 'Label' , 'iChart' ); ?></th> 
						<th id="columnname" class="manage-column column-columnname" scope="col"><?php esc_html_e( 'Value' , 'iChart' ); ?></th>
						<th id="columnname" class="manage-column column-columnname" scope="col"><?php esc_html_e( 'Color' , 'iChart' ); ?></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th style="text-align:left" class="manage-column column-cb check-column" scope="col"><input type="button" id="ichart-ichartaddrow" value="+ Add row" class="button button-primary button-large" /></th>
						<th class="manage-column column-columnname" scope="col"></th>
					</tr>
				</tfoot>
				<tbody>
					<tr>
						<td class="check-column" scope="row"><input type="text" name="label[]" /></td>
						<td class="column-columnname"><input type="text" name="value[]" /></td>
						<td class="column-columnname"><input type="text" name="bgcolor[]" class="color-field" /></td>
						<td class="column-columnname"><a href="javascript:void(0);" class="button button-secondary iChartremoverow"><?php esc_html_e( 'Remove' , 'iChart' ); ?></a></td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<div id="ichart-configurationcontainer" class="configurationcontainer">
			<p class="datasetheading"><?php esc_html_e( 'Configuration Area' , 'iChart' ); ?></p>

			<table id="configtable" class="configtable" cellspacing="0">
				<tr>
					<td><?php esc_html_e( 'Width' , 'iChart' ); ?></td>
					<td><input type="text" id="ichart-width" name="width" placeholder="500px or 50%" class="" /></td>
				</tr>
				
				<tr>
					<td><?php esc_html_e( 'Background Color' , 'iChart' ); ?></td>
					<td><input type="text" id="ichart-backgroundcolor" name="backgroundcolor" class="color-field" /></td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'Border Color' , 'iChart' ); ?></td>
					<td><input type="text" id="ichart-bordercolor" name="bordercolor" class="color-field" /></td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'Pointer Style' , 'iChart' ); ?></td>
					<td><select name="pointerstyle" id="ichart-pointerstyle">
						<option value="<?php esc_html_e( 'circle' , 'iChart' ); ?>"><?php esc_html_e( 'Circle' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'triangle' , 'iChart' ); ?>"><?php esc_html_e( 'Triangle' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'rect' , 'iChart' ); ?>"><?php esc_html_e( 'Rect' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'rectRounded' , 'iChart' ); ?>"><?php esc_html_e( 'RectRounded' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'rectRot' , 'iChart' ); ?>"><?php esc_html_e( 'RectRot' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'cross' , 'iChart' ); ?>"><?php esc_html_e( 'Cross' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'crossRot' , 'iChart' ); ?>"><?php esc_html_e( 'CrossRot' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'star' , 'iChart' ); ?>"><?php esc_html_e( 'Star' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'line' , 'iChart' ); ?>"><?php esc_html_e( 'Line' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'dash' , 'iChart' ); ?>"><?php esc_html_e( 'Dash' , 'iChart' ); ?></option>
					</select></td>
				</tr>
				<tr id="linestyle">
					<td><?php esc_html_e( 'Line Style' , 'iChart' ); ?></td>
					<td><select name="lstyle" id="ichart-lstyle">
						<option value=""><?php esc_html_e( 'Default' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'stepped' , 'iChart' ); ?>"><?php esc_html_e( 'Stepped' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'filled' , 'iChart' ); ?>"><?php esc_html_e( 'Filled' , 'iChart' ); ?></option>
						<option value="<?php esc_html_e( 'dashed' , 'iChart' ); ?>"><?php esc_html_e( 'Dashed' , 'iChart' ); ?></option>
					</select></td>
				</tr>
				<tr id="aspectratio">
					<td><?php esc_html_e( 'Aspect Ratio' , 'iChart' ); ?></td>
					<td><select name="ichart-aspectratio" id="ichart-aspectratio">
						<option value="1"><?php esc_html_e( '1' , 'iChart' ); ?></option>
						<option value="2"><?php esc_html_e( '2' , 'iChart' ); ?></option>
						<option value="3"><?php esc_html_e( '3' , 'iChart' ); ?></option>
						<option value="4"><?php esc_html_e( '4' , 'iChart' ); ?></option>
						<option value="5"><?php esc_html_e( '5' , 'iChart' ); ?></option>
						<option value="6"><?php esc_html_e( '6' , 'iChart' ); ?></option>
						<option value="7"><?php esc_html_e( '7' , 'iChart' ); ?></option>
						<option value="8"><?php esc_html_e( '8' , 'iChart' ); ?></option>
						<option value="9"><?php esc_html_e( '9' , 'iChart' ); ?></option>
					</select></td>
				</tr>

			</table>
			
		</div>		
		<input type="button" value="Generate Chart" class="button button-primary button-large iChartgetallvalue" />
		<a style="color: #FCB214;font-size: 16px;font-weight: bold;text-decoration: none; display: inline-block; margin: 6px 10px;" href="<?php echo esc_url(qcichart_upgrade_link); ?>" target="_blank" ><?php esc_html_e( 'Upgrade to Pro' , 'iChart' ); ?></a>

  </div>
  <div class="ichart_shortcode_container" style="display:none;">
		<div class="qcpd_single_field_shortcode">
			<textarea style="width:100%;height:200px" id="ichart_shortcode_container"></textarea>
			<p><b><?php esc_html_e( 'Copy' , 'iChart' ); ?></b> <?php esc_html_e( 'the shortcode & use it any text block.' , 'iChart' ); ?> <button class="ichart_copy_close button button-primary button-small" style="float:right"><?php esc_html_e( 'Copy & Close' , 'iChart' ); ?></button></p>
		</div>
	</div>
</div>

<?php

}
add_action( 'admin_footer', 'qcld_iChart_modal');

function qc_ichart_clean($string) {
   $string = str_replace(' ', '-', strtolower($string)); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

add_shortcode('qcld-ichart', 'qciChart_textlist_full_shortcode_chart');
function qciChart_textlist_full_shortcode_chart($atts = array()){
	ob_start();
	if(is_admin()){
		return;
	}
	
	global $pre_shortcode_instance;
	extract( shortcode_atts(
		array(
			'label' 			=> 'january,February,March,April',
			'value' 			=> '80,-30,20,-50',
			'type' 				=> 'line',
			'title' 			=> 'Demo Title',
			'datasetname'		=> 'Demo',
			'backgroundcolor' 	=> '',
			'width' 			=> '100%',
			'bgcolor' 			=> '',
			'bordercolor' 		=> '',
			'pointerstyle' 		=> 'circle',
			'linestyle' 		=> "",
			'aspectratio' 		=> '1',
		), $atts
	));
	$label = explode(',', esc_attr($label));
	$label = '"'.implode('","',$label).'"';
	
	$pre_shortcode_instance++;
	$_ex = qc_ichart_clean($title).'-'.$pre_shortcode_instance;

	$yaxis_display = 'false';
	$yaxis_gridline = 'false';
	if( $type == 'line' || $type == 'bar' ){
		$yaxis_display = 'true';
		$yaxis_gridline = 'true';
	}


	$arr = explode (",", $value);
	$values = '';
   	foreach ($arr as $elem) 
      $values .= filter_var( $elem, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION).',' ;
      

    wp_enqueue_script( 'ichart-chart-js');
    wp_enqueue_script( 'ichart-plugin-deferred');

	$scripts = "jQuery(window).on('load',function(){
	var ctx = document.getElementById('myiChart".esc_attr($_ex)."');

	var myChart = new Chart(ctx, {
	    type: '".esc_js($type)."',
	    data: {
	        labels: [".($label)."],
	        datasets: [{
	            label: '".($datasetname)."',
	            data: [".esc_js($values)."],";
				
				if(strlen($bgcolor)>2 and $type!='line' and $type!='radar'){
					$scripts .= "backgroundColor: [".($bgcolor)."],";
				}else{
					$scripts .= "backgroundColor: '".($backgroundcolor)."',";
				}
				
				if( $type=='line' || $type=='radar'){ 
					$scripts .= "pointBackgroundColor: [".($bgcolor)."],";
				}
				
				if($bordercolor!=''){
					$scripts .= "borderColor: '".($bordercolor)."',";
				}
			
	            $scripts .= "pointRadius: 8,
				pointHoverRadius: 11,";
				
				if($linestyle=='filled'){
					$scripts .= "fill: true";
				}elseif($linestyle=='stepped'){
					$scripts .= "steppedLine: true,
					fill: false";
				}elseif($linestyle=='dashed'){
					$scripts .= "borderDash: [5, 5],
					fill: false";
				}else{
					$scripts .= "fill: false";
				}
				
	       $scripts .= " }]
	    },
	    options: {
	    	aspectRatio: ".esc_js($aspectratio).",";
	    if( ($type == 'line' || $type == 'bar' || $type == 'radar') && ( $datasetname == '' || empty($datasetname) || !isset($datasetname) )  ){
		    $scripts .= "legend: {
	            display: false
	        },";
	    } 
			$scripts .= "elements: {
						point: {
							pointStyle: '".esc_js($pointerstyle)."'
						}
					},
					title: {
	                        display: true,
	                        text: '".esc_js($title)."'
	                    },
			tooltips: {
	                    mode: 'index',
	                    intersect: false,
	                },
	                hover: {
	                    mode: 'nearest',
	                    intersect: true
	                },
				scales: {
                    yAxes: [{
                        display: ".esc_js($yaxis_display).",
                        gridLines: {
                            display: ".esc_js($yaxis_gridline).",
                        },
                        ticks: {
                            beginAtZero: true,
                            min: 0
                        }
                    }],
                },

                plugins: {
			      deferred: {
			        delay: 500
			      }
			    }

		    }
		});
	});";

	wp_add_inline_script( 'ichart-chart-js',  $scripts );

?>
<!-- This site is using iChart - https://www.quantumcloud.com/products/ -->
<div style="width:<?php echo esc_attr($width); ?>;margin:0 auto;">
	<canvas id="myiChart<?php echo esc_attr($_ex); ?>"></canvas>
</div>
	

<?php

	$content = ob_get_clean();
    return $content;
}
