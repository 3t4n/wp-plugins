<?php
$nextItem = 'running_accounts';

$current_value = $this->get_option( $nextItem );
?>
<div class="fancy_radio_buttons status_buttons">
	<input type="radio" name="<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $current_value == '1' ) echo "checked='checked'"; ?> />
	<label class="green" for="<?php echo $nextItem; ?>1">Enabled</label>

	<input type="radio" name="<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$current_value || $current_value == '-1' ) echo "checked='checked'"; ?> />
	<label class="red" for="<?php echo $nextItem; ?>2">Disabled</label>
</div>

<div style="clear:both;"></div>