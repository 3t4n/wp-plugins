<?php
$setting = get_option( $prefix . 'forward_parameters' );
?>
<input type="radio" name="<?php echo esc_attr( $prefix ) ?>forward_parameters" id="<?php echo esc_attr( $prefix ) ?>forward_parameters"
       class="option-field "
       style="" value="1" <?php if ( $setting == '1' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $prefix ) ?>forward_parameters">Yes</label>
<br>
<input type="radio" name="<?php echo esc_attr( $prefix ) ?>forward_parameters" id="<?php echo esc_attr( $prefix ) ?>forward_parameters"
       class="option-field "
       style="" value="0" <?php if ( $setting == '0' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $prefix ) ?>forward_parameters">No</label>
<br>
<p class="desc">Forward parameters to affiliate links ?</p>
