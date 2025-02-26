<?php
/*
Plugin Name: 3-in-1 Mortgage Calculator - TheMortgageReports.com
Description: 3-in-1 Mortgage Calculator from TheMortgageReports.com
*/
?>
<?php
// Creating the widget 
class tmr_mortgage_calculator extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'tmr_mortgage_calculator', 

		// Widget name will appear in UI
		__('Mortgage Calculator - TheMortgageReports.com', 'tmr_mortgage_calculator_domain'), 

		// Widget description
		array( 'description' => __( '3-in-1 Mortgage Calculator from TheMortgageReports.com', 'tmr_mortgage_calculator_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$color_scheme = $instance['color_scheme'];
		$orientation = $instance['orientation'];

		$color_background = $instance[ 'color_background' ];
		$color_border = $instance[ 'color_border' ];
		$color_text = $instance[ 'color_text' ];

		$output = "";
		if ($orientation == 'vertical') {
			$output = '<div style="text-align:center!important;color:#{{color_text}}!important;width:192px!important;height:524px!important;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;border:7px solid #{{color_border}}!important;margin:10px auto;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;"><div style="display:block!important;width:100%!important;background:#{{color_border}}!important;height:22px;margin:0;padding:0;color:#{{color_text}};">Mortgage Calculator</div><p style="padding:0!important;margin:0!important"><iframe style="border:none!important;width:179px;height:469px;display:block;margin:0!important;" src="http://themortgagereports.com/wp-content/themes/community_updated/resources/mortgage-calculator-widget.php?bgc={{color_background}}&bdc={{color_border}}&txc={{color_text}}&lvisible=hide"></iframe></p><div style="display:block!important;width:100%!important;background:#{{color_border}}!important;height:21px;margin:0;padding:0;">TheMortgageReports.com</div></div>';
		} else {
			$output = '<div style="text-align:center!important;color:#{{color_text}}!important;width:370px!important;height:291px!important;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;border:10px solid #{{color_border}}!important;margin:10px auto;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;"><div style="display:block!important;width:100%!important;background:#{{color_border}}!important;height:22px;margin:0;padding:0;color:#{{color_text}};">Mortgage Calculator</div><p style="padding:0!important;margin:0!important"><iframe style="border:none!important;width:349px;height:235px;display:block;margin:0!important;" src="http://themortgagereports.com/wp-content/themes/community_updated/resources/mortgage-calculator-widget.php?bgc={{color_background}}&bdc={{color_border}}&txc={{color_text}}&orientation=horizontal&lvisible=hide"></iframe></p><div style="display:block!important;width:100%!important;background:#{{color_border}}!important;height:21px;margin:0;padding:0;">TheMortgageReports.com</div></div>';
		}

		$output = str_replace("{{color_text}}", $color_text, $output);
		$output = str_replace("{{color_border}}", $color_border, $output);
		$output = str_replace("{{color_background}}", $color_background, $output);

		echo $args['before_widget'];

		/* Widget Start */

		echo $output;

		/* Widget End */

		echo $args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'color_scheme' ] ) ) { $color_scheme = $instance[ 'color_scheme' ]; } else { $color_scheme = __( 'Gray', 'tmr_mortgage_calculator_domain' ); }
		if ( isset( $instance[ 'orientation' ] ) ) { $orientation = $instance[ 'orientation' ]; } else { $orientation = __( 'vertical', 'tmr_mortgage_calculator_domain' ); }

		if ( isset( $instance[ 'color_background' ] ) ) { $color_background = $instance[ 'color_background' ]; } else { $color_background = __( 'F1F2F3', 'tmr_mortgage_calculator_domain' ); }
		if ( isset( $instance[ 'color_border' ] ) ) { $color_border = $instance[ 'color_border' ]; } else { $color_border = __( 'D8D9DA', 'tmr_mortgage_calculator_domain' ); }
		if ( isset( $instance[ 'color_text' ] ) ) { $color_text = $instance[ 'color_text' ]; } else { $color_text = __( '656565', 'tmr_mortgage_calculator_domain' ); }

		if ( isset( $instance[ 'custom_table' ] ) ) { $custom_table = $instance[ 'custom_table' ]; } else { $custom_table = __( 'true', 'tmr_mortgage_calculator_domain' ); }
		// Widget admin form
		?>
		<script>
			function checkSelect() {
				console.log(document.getElementById("<?php echo $this->get_field_id( 'color_scheme' ); ?>").selectedOptions[0].value);
				if (document.getElementById("<?php echo $this->get_field_id( 'color_scheme' ); ?>").selectedOptions[0].value === "cust") {
					document.getElementById("<?php echo $this->get_field_id( 'custom_table' ); ?>").style.display = 'table';
					document.getElementById("<?php echo $this->get_field_id( 'color_text' ); ?>").disabled = false;
					document.getElementById("<?php echo $this->get_field_id( 'color_border' ); ?>").disabled = false;
					document.getElementById("<?php echo $this->get_field_id( 'color_background' ); ?>").disabled = false;
				} else {
					document.getElementById("<?php echo $this->get_field_id( 'custom_table' ); ?>").style.display = 'none';
					document.getElementById("<?php echo $this->get_field_id( 'color_text' ); ?>").disabled = true;
					document.getElementById("<?php echo $this->get_field_id( 'color_border' ); ?>").disabled = true;
					document.getElementById("<?php echo $this->get_field_id( 'color_background' ); ?>").disabled = true;
				}
			}
		</script>
		<style>
			#tmr-example-color-box{
				border:13px solid #<?php echo $color_border; ?>;
				color:#<?php echo $color_text; ?>;
				background:#<?php echo $color_background; ?>;
				padding:10px;
				text-align: center;
				-webkit-border-radius: 8px;
				-moz-border-radius: 8px;
				border-radius: 8px;
			}
		</style>
		<p></p>
		<div id="tmr-example-color-box">COLOR&nbsp;EXAMPLE</div>
		<p></p>
		<p>
			<label for="<?php echo $this->get_field_id( 'color_scheme' ); ?>">Color Scheme:</label> 
		</p>
		<p>
			<select class="widefat" id="<?php echo $this->get_field_id( 'color_scheme' ); ?>" name="<?php echo $this->get_field_name( 'color_scheme' ); ?>" onchange="checkSelect()">
				<option value="gray"  <?php if($color_scheme == "gray")   echo " selected='selected'"; ?>>Gray</option>
				<option value="green" <?php if($color_scheme == "green")  echo " selected='selected'"; ?>>Green</option>
				<option value="violet"<?php if($color_scheme == "violet") echo " selected='selected'"; ?>>Violet</option>
				<option value="blue"  <?php if($color_scheme == "blue")   echo " selected='selected'"; ?>>Blue</option>
				<option value="red"   <?php if($color_scheme == "red")    echo " selected='selected'"; ?>>Red</option>
				<option value="cust"  <?php if($color_scheme == "cust")   echo " selected='selected'"; ?>>Custom...</option>
			</select>
		</p>
		<table id="<?php echo $this->get_field_id( 'custom_table' ); ?>" <?php if($color_scheme != 'cust') echo "style='display:none'"; ?>>
			<tr>
				<td colspan="2">Customize Colors:</td>
			</tr>
			<tr>
				<td><input id="<?php echo $this->get_field_id( 'color_background' ); ?>" name="<?php echo $this->get_field_name( 'color_background' ); ?>" type="color" value="#<?php echo esc_attr( $color_background ); ?>"  maxlength="7" <?php if($color_scheme != 'cust') echo "disabled='disabled'"; ?>/></td>
				<td>Background</td>
			</tr>
			<tr>
				<td><input id="<?php echo $this->get_field_id( 'color_border' ); ?>" name="<?php echo $this->get_field_name( 'color_border' ); ?>" type="color" value="#<?php echo esc_attr( $color_border ); ?>"  maxlength="7" <?php if($color_scheme != 'cust') echo "disabled='disabled'"; ?>/></td>
				<td>Border</td>
			</tr>
			<tr>
				<td><input id="<?php echo $this->get_field_id( 'color_text' ); ?>" name="<?php echo $this->get_field_name( 'color_text' ); ?>" type="color" value="#<?php echo esc_attr( $color_text ); ?>" maxlength="7" <?php if($color_scheme != 'cust') echo "disabled='disabled'"; ?>/></td>
				<td>Text</td>
			</tr>
		</table>
		<p>
			<label><input type="radio" value="vertical" id="<?php echo $this->get_field_id( 'orientation' ); ?>-vertical" name="<?php echo $this->get_field_name( 'orientation' ); ?>" <?php if($orientation == "vertical")  echo " checked='checked'"; ?>/>&nbsp;Vertical</label><br>
			<label><input type="radio" value="horizontal" id="<?php echo $this->get_field_id( 'orientation' ); ?>-horizontal" name="<?php echo $this->get_field_name( 'orientation' ); ?>" <?php if($orientation == "horizontal")  echo " checked='checked'"; ?>/>&nbsp;Horizontal</label>
		</p>
		<?php 
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['color_scheme'] = ( ! empty( $new_instance['color_scheme'] ) ) ? strip_tags( $new_instance['color_scheme'] ) : '';
		$instance['orientation'] = ( ! empty( $new_instance['orientation'] ) ) ? strip_tags( $new_instance['orientation'] ) : '';
		switch ($instance['color_scheme']) {
			case "gray":
				$instance['color_background'] = 'F1F2F3';
				$instance['color_border'] = 'D8D9DA';
				$instance['color_text'] = '666666';
				break;
			case "green":
				$instance['color_background'] = 'dfe8e3';
				$instance['color_border'] = 'AEC0B6';
				$instance['color_text'] = '335B3F';
				break;
			case "violet":
				$instance['color_background'] = 'eeeff3';
				$instance['color_border'] = 'ACAFC0';
				$instance['color_text'] = '232D5C';
				break;
			case "blue":
				$instance['color_background'] = 'F1F6FE';
				$instance['color_border'] = '97B8F3';
				$instance['color_text'] = '183e85';
				break;
			case "red":
				$instance['color_background'] = 'f4e5e5';
				$instance['color_border'] = 'e8c4c5';
				$instance['color_text'] = '531615';
				break;
			case "cust":
				$instance['color_background'] = str_replace("#", "", ( ! empty( $new_instance['color_background'] ) ) ? strip_tags( $new_instance['color_background'] ) : '');
				$instance['color_border'] = str_replace("#", "", ( ! empty( $new_instance['color_border'] ) ) ? strip_tags( $new_instance['color_border'] ) : '');
				$instance['color_text'] = str_replace("#", "", ( ! empty( $new_instance['color_text'] ) ) ? strip_tags( $new_instance['color_text'] ) : '');
				break;
		}
		return $instance;
	}
} // Class tmr_mortgage_calculator ends here

// Register and load the widget
function tmr_mortgage_calculator_load_widget() {
	register_widget( 'tmr_mortgage_calculator' );
}
add_action( 'widgets_init', 'tmr_mortgage_calculator_load_widget' );
?>
