<?php
/**
** A base module for the following types of tags:
** 	[rangeslider]  # rangeslider
**/
/* form_tag handler */
if (!defined('ABSPATH'))
exit;

if (!class_exists('ESRSCF_rangeslider_front')) {

class ESRSCF_rangeslider_front {

   protected static $range_instance;


		public static function range_instance() {

			
		      	if (!isset(self::$range_instance)) {

		        	self::$range_instance = new self();


		        	self::$range_instance->rangeslider_init();

		        }

		        return self::$range_instance;
	     }


	    function ESRSCF_add_form_tag_rangeslider() {

			wpcf7_add_form_tag( array( 'rangeslider', 'rangeslider*' ),array($this,'ESRSCF_rangeslider_form_tag_handler' ), array('name-attr' => true) );

		}


		function  ESRSCF_rangeslider_form_tag_handler( $tag ) {
			
				if ( empty( $tag->name ) ) {

				 	return '';
				 	
				}

				$validation_error = wpcf7_get_validation_error( $tag->name );

				$class = wpcf7_form_controls_class( $tag->type );

				$class .= ' wpcf7-validates-as-rangeslider';

			    $range_attribute = array();

				$range_attribute['class'] = $tag->get_class_option( $class );

				$range_attribute['id'] = $tag->get_id_option();

				$range_attribute['readonly'] = 'readonly';
				
				if ( $tag->has_option( 'readonly' ) ) {

					$range_attribute['readonly'] = 'readonly';

				}

				$range_attribute['class'] .= " esrscf7caloc_slider";

				$range_attribute['value'] = $tag->get_option( 'min' )[0];

				$range_attribute['type'] = 'hidden';

				$range_attribute['name'] = $tag->name;
				
				$range_attribute = wpcf7_format_atts( $range_attribute );

				$range_attsa['step'] = $tag->get_option( 'step' )[0];

				$range_attsa['min'] = $tag->get_option( 'min' )[0];

				$range_attsa['max'] = $tag->get_option( 'max' )[0];

			    $range_attsa['prefix'] = $tag->get_option( 'Prefix' )[0];

				$range_attsa['prefixpos'] = $tag->get_option( 'calslider' )[0];
				
				$range_attsa['esrstoltip'] = $tag->get_option( 'esrstoltip' )[0];
				
				$range_attsa['slideredge'] = $tag->get_option( 'slideredge' )[0];
			  
			    $range_attsa['color'] = $tag->get_option( 'color' )[0];

			    $range_attsa['tooltip-color'] = $tag->get_option( 'tooltip-color' )[0];

			    $range_attsa = wpcf7_format_atts( $range_attsa );

				$html = sprintf(
				'<div class="esrscfcf7caloc_slider_div" id="occf7cal_slider_div" %4$s><span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span></div>',


				sanitize_html_class( $tag->name ), $range_attribute, $validation_error, $range_attsa);



				return $html;
	
			
		}

		function ESRSCF_add_tag_generator_rangesliderplus() {

			$tag_generator = WPCF7_TagGenerator::get_instance();

			$tag_generator->add( 'rangeslider-plus', __( 'rangeslider-plus', 'contact-form-7' ),array($this,'ESRSCF_tag_generator_rangesliderplus'));	 

		}

		function ESRSCF_tag_generator_rangesliderplus( $contact_form, $args = '' ) {

				$args = wp_parse_args( $args, array() );

				$wpcf7_contact_form = WPCF7_ContactForm::get_current();

				$contact_form_tags = $wpcf7_contact_form->scan_form_tags();

				$type = 'rangeslider';

			?>
			<div class="control-box">
				<fieldset>
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
									<input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" />
								</td>
							</tr>
							
							<tr>
								<th scope="row"><?php echo esc_html( __( 'Choose Range for Slider','contact-form-7')); ?></th>
									<td>
										<fieldset>
											<legend class="screen-reader-text"><?php echo esc_html( __( 'Range', 'contact-form-7' ) ); ?></legend>
											<label>
											<?php echo esc_html( __( 'Min-value', 'contact-form-7' ) ); ?>
											<input type="number" name="min" min="1" value="1" class="numeric option" />
											</label>
											&ndash;
											<label>
											<?php echo esc_html( __( 'Max-value', 'contact-form-7' ) ); ?>
											<input type="number" name="max" min="1" value="100" class="numeric option" />
											</label>
										</fieldset>
									</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-step' ); ?>"><?php echo esc_html( __( 'Step', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
									<input type="number" name="step" min="1" value="1" class="stepvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-step' ); ?>" />
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-color' ); ?>"><?php echo esc_html( __( 'Slider-color', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
								<input type="color" name="color" class="oneline option" id="<?php echo esc_attr( $args['content'] . '-color' ); ?>" />
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-tooltip-color' ); ?>"><?php echo esc_html( __( 'Slider-tooltip-color', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
								<input type="color" name="tooltip-color" class="oneline option" id="<?php echo esc_attr( $args['content'] . '-tooltip-color' ); ?>" />
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-prefix' ); ?>"><?php echo esc_html( __( 'Prefix', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
									<input type="text" name="Prefix" class="Prefixvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-Prefix' ); ?>" />
									<?php echo esc_html( __( 'Use this prefix of the value', 'contact-form-7' ) ); ?>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-prefixposition' ); ?>">
										<?php echo esc_html( __( 'Prefix Position', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
									<label><input type="radio" name="calslider" value="left" class="option" checked="checked" /> <?php echo esc_html( __( 'left', 'contact-form-7' ) ); ?></label>
									<label><input type="radio" name="calslider" value="right" class="option" /> <?php echo esc_html( __( 'right', 'contact-form-7' ) ); ?></label>
									
								</td>
							</tr>				
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-tooltipposition' ); ?>">
										<?php echo esc_html( __( 'Tooltip Position', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
									<label><input type="radio" name="esrstoltip" value="left" class="option" /> <?php echo esc_html( __( 'left', 'contact-form-7' ) ); ?></label>
									<label><input type="radio" name="esrstoltip" value="right" class="option" /> <?php echo esc_html( __( 'right', 'contact-form-7' ) ); ?></label>
									<label><input type="radio" name="esrstoltip" value="top" class="option" checked="checked" /> <?php echo esc_html( __( 'top', 'contact-form-7' ) ); ?></label>
									<label><input type="radio" name="esrstoltip" value="bottom" class="option" /> <?php echo esc_html( __( 'bottom', 'contact-form-7' ) ); ?></label>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
									<input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" />
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'contact-form-7' ) ); ?>
									</label>
								</th>
								<td>
									<input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" />
								</td>
							</tr>

						</tbody>
					</table>
				</fieldset>
			</div>
			<div class="insert-box">

				<input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly" onfocus="this.select()"/>

				<div class="submitbox">

				<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
				</div>

				<br class="clear" />

				<p class="description mail-tag"><label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" /></label></p>
			</div>
			<?php
		}

	 
		function rangeslider_init() {

	        add_action('wpcf7_init',array($this, 'ESRSCF_add_form_tag_rangeslider'),10, 0 );

	        add_action('wpcf7_admin_init',array($this, 'ESRSCF_add_tag_generator_rangesliderplus'), 18, 0 );

	    }    

    }

  ESRSCF_rangeslider_front::range_instance();

}






