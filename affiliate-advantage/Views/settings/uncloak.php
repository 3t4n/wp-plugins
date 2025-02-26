<?php
$setting = get_option( $prefix . 'uncloak' );
?>
<input type="radio" name="<?php echo esc_attr( $prefix ) ?>uncloak" id="<?php echo esc_attr( $prefix ) ?>uncloak" class="option-field " style=""
       value="1" <?php if ( $setting == '1' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $prefix ) ?>uncloak">Yes</label>
<br>
<input type="radio" name="<?php echo esc_attr( $prefix ) ?>uncloak" id="<?php echo esc_attr( $prefix ) ?>uncloak" class="option-field " style=""
       value="0" <?php if ( $setting == '0' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $prefix ) ?>uncloak">No</label>
<br>
<p class="desc">Uncloak links to keep in compliance with some affiliate networks Eg amazon ?</p>
