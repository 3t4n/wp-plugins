<?php
$setting = get_option( $prefix . 'open_in_new_tab' );
?>
<input type="radio" name="<?php echo esc_attr( $prefix ) ?>open_in_new_tab" id="<?php echo esc_attr( $prefix ) ?>open_in_new_tab"
       class="option-field "
       style="" value="1" <?php if ( $setting == '1' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $prefix ) ?>open_in_new_tab">Yes</label>
<br>
<input type="radio" name="<?php echo esc_attr( $prefix ) ?>open_in_new_tab" id="<?php echo esc_attr( $prefix ) ?>open_in_new_tab"
       class="option-field "
       style="" value="0" <?php if ( $setting == '0' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $prefix ) ?>open_in_new_tab">No</label>
<br>
<p class="desc">Should links open in a new browser tab by default?</p>
