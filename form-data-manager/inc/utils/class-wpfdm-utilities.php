<?php 

if ( !class_exists( 'WPFDM_Utilities' ) ) {

/** 
*
* @since 1.0.0
* 
* WPFDM_Utilities is a class that handles all functions that are not attached to a specific class and that can be used in more than one place.
*
*/
class WPFDM_Utilities {

    /**
    *
    * @since 1.0.0
    * 
    * Checks whether the string $haystack starts or not with the string $needle
    *
    */
    public static function startsWith($haystack, $needle){
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Converts the date (and optionaly the time) from the raw mysql format to the WP format, chosen by WP user
    *
    */
    public static function mysql2WPdate ( $input_date , $with_time = true ) {
		
		$date_format = get_option('date_format');
		$format = "{$date_format}";

		if($with_time) {
			$time_format = get_option('time_format');
			$format 	.= " {$time_format}";
		}

		$timestamp = strtotime($input_date);

		$output_date = date_i18n($format, $timestamp);

		return $output_date;

	}

	/** 
	*
    * @since 1.0.0
    * 
    * This function prints the errors, stored in the global array $errors, in HTML format, using the Bootstrap Toasts framwork.
    *
    */
	public static function display_errors() {
		
		global $errors;

		if( empty( $errors ) ) {
			return;
		}

		foreach ( $errors as $error ) {
		?>

		<div class="row mt-3">
			<div class="col-md-12">
				<div class="toast toast_error" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
					<div class="toast-body">
						<p>
							<span><?php echo esc_html( $error );?></span>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</p>
					</div>
				</div>
			</div>
		</div>

		<script>
			jQuery(document).ready(function(){
				jQuery('.toast_error').toast('show');
	        });
		</script>
		<?php 
		}
	}

}

}

?>