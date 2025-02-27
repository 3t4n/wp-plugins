<?php
function load_cc_bmi_calc($id, $parameters)
{
    extract($parameters);
	
	// write_log('load_cc_bmi_calc $parameters');
	// write_log($parameters);
	
    // to keep compatibility with previous versions
    if (isset($allow_cc_urls)) { $dev_credit = $allow_cc_urls;}
    // ^^^^^^^

	// set defaults
	$title = isset($title) ? $title : 'BMI Calculator';

	$onlyunits = isset($onlyunits) ? $onlyunits : 'all';
	
	if($onlyunits == 'all'){
		$units = (isset($units)) ? $units : 'imperial';
	}
	else{
		$units = $onlyunits;
	}
	
	$dev_credit = isset($dev_credit) ? $dev_credit : 0;
	
	if ($dev_credit == 1) {
        load_cc_bmi_custom_colors($id, $parameters);
	}
		
?>


        <div id="CCB-calc" class="CCB-Widget-<?php echo $id; ?>">
            <div id="calc-header" class="CCB-calc-header-<?php echo $id; ?>">
                <h3><?php echo $title; ?></h3>
            </div>
            <div id="calc-controls">
                <div id="calc-options" <?php if($onlyunits != 'all'){ echo 'class="bmi-hidden"'; } ?>>
                    <input class="units" type="radio" id="<?php echo $id; ?>-radioImperial" name="<?php echo $id; ?>-units" value="imperial" <?php if($units === 'imperial'){ echo 'checked="checked"'; } ?>>
                    <label for="imperial">Imperial</label>
                    <input class="units" type="radio" id="<?php echo $id; ?>-radioMetric" name="<?php echo $id; ?>-units" value="metric" <?php if($units === 'metric'){ echo 'checked="checked"'; } ?>>
                    <label for="metric">Metric</label>
                </div>
                <div id="cal-data" role="form">
                    <div id="<?php echo $id; ?>-imperial" <?php if($units != 'imperial'){ echo 'class="bmi-hidden"'; } ?>>
                        <div class="form-group">
                            <label for="<?php echo $id; ?>-height-ft" class="col-200-4 control-label">Height</label>
                            <div class="col-200-8">
                                <div class="col-200-6 ft_input">
                                    <div class="input-group">
                                        <input type="tel" class="form-control integer height-ft ccb-form-control-<?php echo $id; ?>" id="<?php echo $id; ?>-height-ft" placeholder="ft">
                                        <span class="input-group-addon ccb-addon-<?php echo $id; ?>">ft</span>
                                    </div>
                                </div>
                                <div class="col-200-6 in_input">
                                    <div class="input-group">
                                        <input type="tel" class="form-control integer height-in ccb-form-control-<?php echo $id; ?>" id="<?php echo $id; ?>-height-in" placeholder="in">
                                        <span class="input-group-addon ccb-addon-<?php echo $id; ?>">in</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="<?php echo $id; ?>-weight-lbs" class="col-200-4 control-label">Weight</label>
                            <div class="col-200-8">
                                <div class="input-group">
                                    <input type="tel" class="form-control decimal weight-lbs ccb-form-control-<?php echo $id; ?>" id="<?php echo $id; ?>-weight-lbs" placeholder="lbs">
                                    <span class="input-group-addon ccb-addon-<?php echo $id; ?>">lbs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="<?php echo $id; ?>-metric" <?php if($units != 'metric'){ echo 'class="bmi-hidden"'; } ?>>
                        <div class="form-group">
                            <label for="<?php echo $id; ?>-height" class="col-200-4 control-label">Height</label>
                            <div class="col-200-8">
                                <div class="input-group">
                                    <input type="tel" class="form-control decimal height ccb-form-control-<?php echo $id; ?>" id="<?php echo $id; ?>-height" placeholder="enter height">
                                    <span class="input-group-addon ccb-addon-<?php echo $id; ?>">cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="<?php echo $id; ?>-weight" class="col-200-4 control-label">Weight</label>
                            <div class="col-200-8">
                                <div class="input-group">
                                    <input type="tel" class="form-control decimal weight ccb-form-control-<?php echo $id; ?>" id="<?php echo $id; ?>-weight" placeholder="enter weight">
                                    <span class="input-group-addon ccb-addon-<?php echo $id; ?>">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group BMI-Description-group">
                        <div class="col-200-12">
                            <div id="<?php echo $id; ?>-BMI-Description" class="alert alert-success BMI-Description bmi-hidden" role="alert">
                                <p class="form-control-static"><span id="<?php echo $id; ?>-BMI-value">BMI</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-200-5">
                            <button id="<?php echo $id; ?>-calculate_btn" class="btn btn-info btn-block calculate_btn center-block">Calculate</button>
                        </div>
                        <div class="col-200-5 col-200-offset-1">
                            <button id="<?php echo $id; ?>-clear_btn" class="btn btn-info btn-block clear_btn center-block">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="calc-footer" class="CCB-calc-footer-<?php echo $id; ?>">
                <?php if (($dev_credit) && (!$shortcode)) { ?>
                        <p>Provided by <a href="https://calculatorsworld.com/health/" target="_blank">CalculatorsWorld.com</a></p>
                <?php } else { ?>
                        <p>Provided by CalculatorsWorld.com</p>
                <?php }?>
            </div>

        </div>
		
		<?php 
}

//function load_cc_bmi_custom_colors($id, $bg_color, $border_color, $text_color)
function load_cc_bmi_custom_colors($id, $parameters)
{
    extract($parameters);
	
	// write_log('load_cc_bmi_custom_colors $parameters');
	// write_log($parameters);	
	
?>
<style type="text/css">
    #CCB-calc #calc-header.CCB-calc-header-<?php echo $id; ?> H3 a,  #CCB-calc #calc-header.CCB-calc-header-<?php echo $id; ?> H3 a:visited,
    #CCB-calc .CCB-calc-header-<?php echo $id; ?>   {
    <?php echo (isset( $header_footer_bg_color) ? "background-color:" . esc_attr($header_footer_bg_color) . "!important;": ""); ?>
    <?php echo (isset( $header_footer_text_color) ? "color:" . esc_attr($header_footer_text_color) . " !important;": ""); ?>
}


    div#CCB-calc.CCB-Widget-<?php echo $id; ?> {
        <?php echo (isset( $border_color) ? "border-color:" . esc_attr($border_color) . "!important;" : ""); ?>
        <?php echo (isset( $bg_color) ? "background-color:" . esc_attr($bg_color) . "!important;": ""); ?>
        <?php echo (isset( $text_color) ? "color:" . esc_attr($text_color) . " !important;": ""); ?>
    }


    .CCB-Widget-<?php echo $id; ?> input[type=text], .CCB-Widget-<?php echo $id; ?> input[type=tel] {
        <?php echo (isset( $border_color) ? "border-color:" . esc_attr($border_color) . ";": ""); ?>
        <?php echo (isset( $text_color) ? "color:" . esc_attr($text_color) . ";": ""); ?>
        <?php echo (isset( $input_bg_color) ? "background-color:" . esc_attr($input_bg_color) . ";": ""); ?>
    } 

    .ccb-form-control-<?php echo $id; ?>,  .ccb-addon-<?php echo $id; ?> {
        <?php echo (isset( $border_color) ? "border-color:" . esc_attr($border_color) . "!important;" : ""); ?>
    }

    .ccb-addon-<?php echo $id; ?> {
        <?php echo (isset( $header_footer_bg_color) ? "background-color:" . esc_attr($header_footer_bg_color) . "!important;": ""); ?>
        <?php echo (isset( $header_footer_text_color) ? "color:" . esc_attr($header_footer_text_color) . " !important;": ""); ?>
    }

    #CCB-calc #calc-footer.CCB-calc-footer-<?php echo $id; ?> p, #CCB-calc #calc-footer.CCB-calc-footer-<?php echo $id; ?> p a, #CCB-calc #calc-footer.CCB-calc-footer-<?php echo $id; ?> p a:visited,
    #CCB-calc #calc-footer.CCB-calc-footer-<?php echo $id; ?> {
    <?php echo (isset( $header_footer_bg_color) ? "background-color:" . esc_attr($header_footer_bg_color) . "!important;": ""); ?>
    <?php echo (isset( $header_footer_text_color) ? "color:" . esc_attr($header_footer_text_color) . " !important;": ""); ?>
}

    button#<?php echo $id; ?>-calculate_btn, button#<?php echo $id; ?>-clear_btn{
        <?php echo (isset( $button_border_color) ? "border-color:" . esc_attr($button_border_color) . "!important;": ""); ?>
        <?php echo (isset( $button_text_color) ? "color:" . esc_attr($button_text_color) . "!important;": ""); ?>
        <?php echo (isset( $button_bg_color) ? "background-color:" . esc_attr($button_bg_color) . "!important;": ""); ?>
    }

</style>
<?php 
}
?>