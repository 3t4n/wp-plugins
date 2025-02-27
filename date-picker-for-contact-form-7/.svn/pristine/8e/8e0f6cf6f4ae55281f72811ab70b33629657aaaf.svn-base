<?php
/**
* This class is loaded on the front-end since its main job is
* to display the WhatsApp box.
*/
class GMDPCF_Display {
	
	public function __construct () {
		add_action('wpcf7_init', array($this, 'GMDPCF_cf7_datepicker_add_tag_generator'));
		add_action( 'admin_init', array($this, 'GMDPCF_add_products_tag_generator_menu'));
		add_action( 'wpcf7_validate_datepicker', array($this, 'GMDPCF_products_validation_filter'), 20, 2);
		add_action( 'wpcf7_validate_datepicker*', array($this, 'GMDPCF_products_validation_filter'), 20, 2);
	}
	
	public function GMDPCF_cf7_datepicker_add_tag_generator()
	{
		
		wpcf7_add_form_tag( array( 'datepicker', 'datepicker*' ),array($this, 'GMDPCF_wpcf7_cfpl_products_shortcode_handler'),true);
		
		
		
	}
	public function GMDPCF_wpcf7_cfpl_products_shortcode_handler( $tag )
	{
		
		if (empty($tag->name)) 
		{
			return '';
		}
		
		$validation_error = wpcf7_get_validation_error( $tag->name );
		$class = wpcf7_form_controls_class( $tag->type, 'datepicker' );
	
		if ( $validation_error ) 
		{
			$class .= ' wpcf7-not-valid';
		}
		/*echo "<pre>";
		print_r($tag);
		echo "</pre>";*/
		$atts = array();
		$atts['size']		= $tag->get_size_option( '40' );
		$atts['maxlength']	= $tag->get_maxlength_option();
		$atts['class']		= $tag->get_class_option( $class );
		$atts['id']			= $tag->get_id_option();
		$atts['tabindex']	= $tag->get_option( 'tabindex', 'int', true );
		$atts['class']		.= ' gmdpcf_datepicker';
		$value = (string) reset( $tag->values );
		if ( $tag->has_option( 'placeholder' ) ) {
			$atts['placeholder'] = $value;
			$value = '';
		}
		$value = $tag->get_default_option( $value );
		$value = wpcf7_get_hangover( $tag->name, $value );
		$atts['value'] = $value;

		$atts['format'] = $tag->get_option( 'format', '', true );
		$atts['min_val'] = $tag->get_option( 'min_val', '', true );
		if($atts['min_val']==''){
			$atts['min_val'] = 'no_limit';
		}
		$atts['max_val'] = $tag->get_option( 'max_val', '', true );
		if($atts['max_val']==''){
			$atts['max_val'] = 'no_limit';
		}
		if(!empty($tag->get_option( 'disable_weekdays'))){
			$atts['disable_weekdays'] = implode("|",$tag->get_option( 'disable_weekdays'));
		}else{
			$atts['disable_weekdays'] = '';
		}
		

		if ( $tag->has_option( 'readonly' ) ) 
		{
			$atts['readonly'] = 'readonly';
		}

		if ( $tag->is_required() ) 
		{
			$atts['aria-required'] = 'true';
		}
		$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

		$atts['type']	= 'text';
		$atts['name']	= $tag->name;
		$atts = wpcf7_format_atts($atts);
        $this->fields[$tag->name]   = $tag->values;
        $this->names[]  = $tag->name;   
      


        ob_start();
        ?>
        <span  class="wpcf7-form-control-wrap <?php echo sanitize_html_class( $tag->name )?>" data-name="<?php echo sanitize_html_class( $tag->name )?>">
        	<input <?php echo $atts;?> />
        	<?php echo $validation_error;?>
		</span >
        <?php
        $html = ob_get_clean();
		return $html;
	}
	public function GMDPCF_add_products_tag_generator_menu()
	{
		$tag_generator = WPCF7_TagGenerator::get_instance();
		$tag_generator->add( 'datepicker', __( 'Date Picker', 'gmdpcf' ),array($this, 'GMDPCF_wpcf7_tag_products_generator_menu'),array('version'=>2) );
	}
	function GMDPCF_wpcf7_tag_products_generator_menu( $contact_form, $args = '' ) {
		$args = wp_parse_args( $args, array() );
		$type = 'datepicker';
		
		?>
		<header class="description-box">
			<h3>datepicker form tag generator</h3>
		</header> 
		<div class="control-box">
			
			<fieldset>
				<legend><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></legend>
				<input type="hidden" data-tag-part="basetype" value="datepicker" >
				<label>
				<input type="checkbox" data-tag-part="type-suffix" value="*">This is a required field.
				</label>
			</fieldset>
			<fieldset>
				<legend>Name</legend>
				<input type="text" data-tag-part="name" pattern="[A-Za-z][A-Za-z0-9_\-]*">
			</fieldset>
			<fieldset>
				<legend>Id</legend>
				<input type="text" data-tag-part="option" data-tag-option="id:" pattern="[A-Za-z][A-Za-z0-9_\-]*">
			</fieldset>
			<fieldset>
				<legend>Default value</legend>
				<input type="text" data-tag-part="value" ><br/>
				<label>
					<input type="checkbox" data-tag-part="option" data-tag-option="placeholder"> Use this text as the placeholder.	
				</label>

			</fieldset>
			<fieldset>
				<legend>Class</legend>
				<input type="text" data-tag-part="option" data-tag-option="class:" pattern="[A-Za-z0-9_\-\s]*" class="classval" >
			</fieldset>
			<fieldset>
				<legend>Date Format</legend>
				<input type="text" data-tag-part="option" data-tag-option="format:" >
				<code>Example: yy-mm-dd</code>
				<a href="https://api.jqueryui.com/datepicker/#option-dateFormat" target="_blank">Date Format</a>
			</fieldset>
			<fieldset>
				<legend>Min Date</legend>
				<div>
					<select class="min_type">
						<option value="no_limit">No Limit</option>
						<option value="current">Current Date</option>
						<option value="set_date">Set Date</option>
						<option value="field_name">Linked Field Name</option>
					</select>
					<div class="min_set_date_upper" style="display: none;">
						<input type="text" name="min_set_date" class="min_set_date"  id="<?php echo esc_attr( $args['content'] . '-min_set_date' ); ?>" /><code>Example: <?php echo date('Y-m-d');?></code>
					</div>
					<div class="min_current_upper" style="display: none;">
						<select class="min_current_type">
							<option value="plus">+</option>
							<option value="minus">-</option>
						</select>
						<input type="number" name="min_current" class="min_current"  id="<?php echo esc_attr( $args['content'] . '-min_current' ); ?>" value="0" /></code>
						<select class="min_current_days">
							<option value="days">Days</option>
							<option value="weeks">Weeks</option>
							<option value="months">Months</option>
							<option value="year">Years</option>
						</select>
					</div>
					<div class="min_field_name_upper" style="display: none;">
						<input type="text" name="min_field_name" class="min_field_name"  id="<?php echo esc_attr( $args['content'] . '-min_field_name' ); ?>" /><code>Example: datepicker-1</code>
					</div>
					<input type="hidden" data-tag-part="option" data-tag-option="min_val:" class="min_val">
				</div>
			</fieldset>
			<fieldset>
				<legend>Max Date</legend>
				<div>
					<select class="max_type">
						<option value="no_limit">No Limit</option>
						<option value="current">Current Date</option>
						<option value="set_date">Set Date</option>
						<option value="field_name">Linked Field Name</option>
					</select>
					<div class="max_set_date_upper" style="display: none;">
						<input type="text" name="max_set_date" class="max_set_date"  id="<?php echo esc_attr( $args['content'] . '-max_set_date' ); ?>" /><code>Example: <?php echo date('Y-m-d');?></code>
					</div>
					<div class="max_current_upper" style="display: none;">
						<select class="max_current_type">
							<option value="plus">+</option>
							<option value="minus">-</option>
						</select>
						<input type="number" name="max_current" class="max_current"  id="<?php echo esc_attr( $args['content'] . '-max_current' ); ?>" value="0" /></code>
						<select class="max_current_days">
							<option value="days">Days</option>
							<option value="weeks">Weeks</option>
							<option value="months">Months</option>
							<option value="year">Years</option>
						</select>
					</div>
					<div class="max_field_name_upper" style="display: none;">
						<input type="text" name="max_field_name" class="max_field_name"  id="<?php echo esc_attr( $args['content'] . '-max_field_name' ); ?>" /><code>Example: datepicker-1</code>
					</div>
					<input type="hidden" data-tag-part="option" data-tag-option="max_val:"  name="max_val" class="max_val" />
				</div>
			</fieldset>

			<fieldset>
				<legend>Disable Week Days</legend>
				<div>
					<label>
						<input type="checkbox"  data-tag-part="option" data-tag-option="disable_weekdays:sunday" disabled /> 
						<?php echo esc_html( __( 'sunday', 'contact-form-7' ) ); ?>
					</label>
					<label>
						<input type="checkbox"  data-tag-part="option" data-tag-option="disable_weekdays:monday" disabled /> 
						<?php echo esc_html( __( 'monday', 'contact-form-7' ) ); ?>
					</label>
					<label>
						<input type="checkbox"  data-tag-part="option" data-tag-option="disable_weekdays:tuesday" disabled /> 
						<?php echo esc_html( __( 'tuesday', 'contact-form-7' ) ); ?>
					</label>
					<label>
						<input type="checkbox"  data-tag-part="option" data-tag-option="disable_weekdays:thursday" disabled /> 
						<?php echo esc_html( __( 'thursday', 'contact-form-7' ) ); ?>
					</label>
					<label>
						<input type="checkbox"  data-tag-part="option" data-tag-option="disable_weekdays:friday" disabled /> 
						<?php echo esc_html( __( 'friday', 'contact-form-7' ) ); ?>
					</label>
					<label>
						<input type="checkbox"  data-tag-part="option" data-tag-option="disable_weekdays:saturday" disabled /> 
						<?php echo esc_html( __( 'saturday', 'contact-form-7' ) ); ?>
					</label>
					<br/>
					<a href="https://www.codesmade.com/store/date-picker-for-contact-form-7-pro/" target="_blank" >Get Pro Version for this feature</a>
				</div>
								
						
			</fieldset>
			<fieldset>
				<legend>Disable Dates</legend>

				<input type="text" data-tag-part="option" data-tag-option="disable_date:" placeholder="<?php echo date('Y-m-d');?>|<?php echo date('Y-m-d');?>" disabled>
				<code>Example: <?php echo date('Y-m-d');?>|<?php echo date('Y-m-d');?></code>
				<br>
				<a href="https://www.codesmade.com/store/date-picker-for-contact-form-7-pro/" target="_blank" >Get Pro Version for this feature</a>
			</fieldset>
			<fieldset>
				<legend>Active Dates</legend>
				<input type="text" data-tag-part="option" data-tag-option="active_date:" placeholder="<?php echo date('Y-m-d');?>|<?php echo date('Y-m-d');?>" disabled>
				<code>Example: <?php echo date('Y-m-d');?>|<?php echo date('Y-m-d');?></code>
								<br>
								<a href="https://www.codesmade.com/store/date-picker-for-contact-form-7-pro/" target="_blank" >Get Pro Version for this feature</a>
			</fieldset>
		</div>
		<div class="insert-box">
			<div class="flex-container">
				<input type="text" class="code" readonly="readonly" onfocus="this.select();" data-tag-part="tag">
				<div class="submitbox">
					<input type="button" class="button button-primary insert-tag" value="Insert Tag" />
				</div>
	    	</div/>
			<p class="mail-tag-tip">
				<label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'calculation-for-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
			    </label>
			</p>
		</div>
		<?php
	}
	public function GMDPCF_products_validation_filter($result,$tag )
	{
		$tag = new WPCF7_Shortcode( $tag );
		$name = $tag->name;
		
		if ( isset( $_POST[$name] ) && is_array( $_POST[$name] ) ) {
			foreach ( $_POST[$name] as $key => $value ) {
				if ( '' === $value )
					unset( $_POST[$name][$key] );
			}
		}

		$empty = ! isset( $_POST[$name] ) || empty( $_POST[$name] ) && '0' !== $_POST[$name];
		if ( $tag->is_required() && $empty ) {

			$result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
		}
		return $result;
	}
	
	
}
?>