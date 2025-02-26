<?php

 /**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://cubixsol.org/
 * @since      1.0.0
 *
 * @package    Auto_refresh_post_page
 * @subpackage auto_refresh_post_page/admin/partials
 *                                                                
 * 
 *  ________      ___  ___      ________      ___      ___    ___  ________       ________      ___          
 * |\   ____\    |\  \|\  \    |\   __  \    |\  \    |\  \  /  /||\   ____\     |\   __  \    |\  \         
 * \ \  \___|    \ \  \\\  \   \ \  \|\ /_   \ \  \   \ \  \/  / /\ \  \___|_    \ \  \|\  \   \ \  \        
 *  \ \  \        \ \  \\\  \   \ \   __  \   \ \  \   \ \    / /  \ \_____  \    \ \  \\\  \   \ \  \       
 *   \ \  \____    \ \  \\\  \   \ \  \|\  \   \ \  \   /     \/    \|____|\  \    \ \  \\\  \   \ \  \____  
 *	  \ \_______\   \ \_______\   \ \_______\   \ \__\ /  /\   \      ____\_\  \    \ \_______\   \ \_______\
 *	   \|_______|    \|_______|    \|_______|    \|__|/__/ /\ __\    |\_________\    \|_______|    \|_______|
 *	   								   			      |__|/ \|__|    \|_________|       
                      																										   
 */
if (!defined('ABSPATH')) {
	exit;
}
 
// Generate a nonce
$nonce = wp_create_nonce('ARPP_store_refresh_settings_nonce');
 ?>


 <h1>Set Refresh Frequency</h1>
 <hr class="cb-divider" />
    <tr>
	<th style="text-align: left;">
		<input type="checkbox" class="js-select-all">&nbsp;Select All 
		&nbsp;
		<input type="number" placeholder="Enter Time in Seconds globally" class="timeField" id="timeField" min="0" oninput="updateGlobalTime(this)">
		<select id="globalTimeUnit" class="globalTimeUnit" onchange="updateGlobalTimeUnit(this)">
			<option value="seconds">Seconds</option>
			<option value="minutes">Minutes</option>
			<option value="hours">Hours</option>
		</select>
	</th>
	</tr>
		
 <table class="cb-tab-content__table cb-tab-content__table--padding wp-list-table widefatsett fixedsett striped table-view-list pages"><br>&nbsp;
		
    <tr>
	    <td class="check_title setting_head">Enable/Disable</td>
	    <td class="setting_head">Title</td>
	    <td class="setting_head">Seconds</td>
    </tr>

	<?php
	    $args = array(
		    'public' => true
	    );
	  
		$output = 'names'; // names or objects, note names is the default   $number = !empty($value) ? $value : ''; 
		$operator = 'or'; // 'and' or 'or'
		$post_types = get_post_types( $args, $output, $operator );
		  
		foreach ($post_types as $post_type) { ?>
			<tr>
				<?php
				$array_from_db = get_option('ARPP_my_option_name');
		
				// Checkbox logic: Match the exact key with the `checkbox-` prefix
				$checkbox_key = "checkbox-" . $post_type;
				$checkbox = isset($array_from_db[$checkbox_key]) && $array_from_db[$checkbox_key] == 1 ? "checked" : "";
		
				// Time field logic
				$duration_key = "duration-" . $post_type;
				$repeat_time = isset($array_from_db[$duration_key]) ? $array_from_db[$duration_key] : "";
		
				// Time unit logic
				$time_unit_key = "time_unit-" . $post_type;
				$time_unit = isset($array_from_db[$time_unit_key]) ? $array_from_db[$time_unit_key] : "seconds";
				?>
				<td class="check_title">
					<input type="checkbox" name="checkbox-<?php echo esc_html($post_type); ?>" value="1" 
						class="js-cb-customization js-select-single" 
						id="cb-feedback-<?php echo esc_html($post_type); ?>" 
						<?php echo esc_html($checkbox); ?>>
				</td>
				<td>
					<?php echo esc_html($post_type); ?>&nbsp;
				</td>
				<td>
					<input type="number" name="duration-<?php echo esc_html($post_type); ?>" 
						   value="<?php echo esc_html($repeat_time); ?>" 
						   placeholder="Enter Time in Seconds" 
						   class="js-time-field" 
						   min="0">
					<select name="time_unit-<?php echo esc_html($post_type); ?>" class="js-time-unit">
						<option value="seconds" <?php selected($time_unit, 'seconds'); ?>>Seconds</option>
						<option value="minutes" <?php selected($time_unit, 'minutes'); ?>>Minutes</option>
						<option value="hours" <?php selected($time_unit, 'hours'); ?>>Hours</option>
					</select>
				</td>
			</tr>
    <?php } ?> 
 </table>
	 
	  <!-- end of no multilingual div -->
 <br>
 <br>
 <hr class="cb-divider" />
 <input type="hidden" name="nonce_entry" class="nonce_entry" value="<?php echo esc_html($nonce); ?>">
 <!-- <div class="cb-tab-content__sticky-save js-cb-customization-sticky"> -->
 <button type="submit" id="cb_global_save_post" class="">
	<?php echo ( esc_html__( 'Save Post', 'auto-refresh-post-page' ) ); ?>
 </button>

	  <!-- </div> -->
 <div class="sucess_msg" ></div>
 

 <script>



function updateGlobalTime(globalInput) {
    var timeFields = document.querySelectorAll('.js-time-field');
    timeFields.forEach(function(timeField) {
        timeField.value = globalInput.value;
    });

    // Automatically check all individual checkboxes if global input is used
    document.querySelectorAll('.js-select-single').forEach(function(checkbox) {
        checkbox.checked = true;
    });
}

// Function to update all time unit fields with the global dropdown value
function updateGlobalTimeUnit(globalSelect) {
    var timeUnits = document.querySelectorAll('.js-time-unit');
    timeUnits.forEach(function(timeUnit) {
        timeUnit.value = globalSelect.value;
    });

    // Automatically check all individual checkboxes if global select is used
    document.querySelectorAll('.js-select-single').forEach(function(checkbox) {
        checkbox.checked = true;
    });
}

// Get the "Select All" checkbox
var selectAllCheckbox = document.querySelector('.js-select-all');
selectAllCheckbox.addEventListener('click', function() {
    var checkboxes = document.querySelectorAll('.js-select-single');
    var timeFields = document.querySelectorAll('.js-time-field');
    var timeUnits = document.querySelectorAll('.js-time-unit');
    var globalTime = document.querySelector('#timeField').value;
    var globalUnit = document.querySelector('#globalTimeUnit').value;

    // Apply the global setting to all individual fields and checkboxes
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });

    if (selectAllCheckbox.checked) {
        timeFields.forEach(function(timeField) {
            timeField.value = globalTime;
        });
        timeUnits.forEach(function(timeUnit) {
            timeUnit.value = globalUnit;
        });
    }
});
</script>


