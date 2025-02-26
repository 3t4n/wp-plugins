<?php
/**
 * Add Shortcode 
 *
 * @return void
 * @author
 **/
add_shortcode( 'countdown-99plugin', 'nn_cd_shortcode' );

function nn_cd_shortcode( $atts ) {
	$values = shortcode_atts( array(
		'title'	=> 'Soon',
		'date'	=> '01/1/2015'
	), $atts);

	$no = rand();

	ob_start();

	echo  esc_attr( $values['title'] );
	echo "<div id='counddown-99plugin" . $no . "'> </div> ";
	?>
		<script type="text/javascript">
			jQuery(document).ready(function($){ 
				<?php
				$date =  strtotime( $values['date'] ); 
				
				$year	= date("Y", $date);
				$month	= date("n", $date);
				$date 	= date("d", $date);

				echo "$('#counddown-99plugin" . $no . "').countdown({until: new Date( " . $year . " , " . $month . "-1, " . $date . ")});";
				?>
			});
		</script>
	<?php return ob_get_clean();
}

function nncd_integrateWithVC() {
	vc_map( array(
		"name" => __( "CountDown by 99Plugins", "nn-count-down" ),
		"base" => "counddown-99plugin",
		"class" => "",
		"category" => __( "Content", "nn-count-down"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", "nn-count-down" ),
				"param_name" => "title",
				"value" => __( "New Title", "nn-count-down" ),
				"description" => __( "Title for Count Down.", "nn-count-down" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Date", "nn-count-down" ),
				"param_name" => "date",
				"value" => __( "15.12.2015", "nn-count-down" ),
				"description" => __( "ContDown To , example : 15.12.2015", "nn-count-down" )
			)
		)
	) );
}