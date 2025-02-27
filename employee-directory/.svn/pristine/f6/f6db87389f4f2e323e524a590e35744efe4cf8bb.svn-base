<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'EMD_MB_Datetime_Field' ) )
{
	class EMD_MB_Datetime_Field extends EMD_MB_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			$url_css = EMD_MB_CSS_URL . 'jqueryui';
			wp_register_script( 'jquery-ui-timepicker', EMD_MB_JS_URL . 'jqueryui/jquery-ui-timepicker-addon.js', array( 'jquery-ui-datepicker', 'jquery-ui-slider' ), '0.9.7', true );
			wp_enqueue_style( 'jquery-ui-timepicker-css', "{$url_css}/jquery-ui-timepicker-addon.css");
			$deps = array( 'jquery-ui-datepicker', 'jquery-ui-timepicker' );

                        $locale = get_locale();
                        $date_vars['closeText'] = __('Done','empd-com');
                        $date_vars['prevText'] = __('Prev','empd-com');
                        $date_vars['nextText'] = __('Next','empd-com');
                        $date_vars['currentText'] = __('Today','empd-com');
                        $date_vars['monthNames'] = Array(__('January','empd-com'),__('February','empd-com'),__('March','empd-com'),__('April','empd-com'),__('May','empd-com'),__('June','empd-com'),__('July','empd-com'),__('August','empd-com'),__('September','empd-com'),__('October','empd-com'),__('November','empd-com'),__('December','empd-com'));
                        $date_vars['monthNamesShort'] = Array(__('Jan','empd-com'),__('Feb','empd-com'),__('Mar','empd-com'),__('Apr','empd-com'),__('May','empd-com'),__('Jun','empd-com'),__('Jul','empd-com'),__('Aug','empd-com'),__('Sep','empd-com'),__('Oct','empd-com'),__('Nov','empd-com'),__('Dec','empd-com'));
                        $date_vars['dayNames'] = Array(__('Sunday','empd-com'),__('Monday','empd-com'),__('Tuesday','empd-com'),__('Wednesday','empd-com'),__('Thursday','empd-com'),__('Friday','empd-com'),__('Saturday','empd-com'));
                        $date_vars['dayNamesShort'] = Array(__('Sun','empd-com'),__('Mon','empd-com'),__('Tue','empd-com'),__('Wed','empd-com'),__('Thu','empd-com'),__('Fri','empd-com'),__('Sat','empd-com'));
                        $date_vars['dayNamesMin'] = Array(__('Su','empd-com'),__('Mo','empd-com'),__('Tu','empd-com'),__('We','empd-com'),__('Th','empd-com'),__('Fr','empd-com'),__('Sa','empd-com'));
                        $date_vars['weekHeader'] = __('Wk','empd-com');

			$time_vars['timeOnlyTitle'] = __('Choose Time','empd-com');
			$time_vars['timeText'] = __('Time','empd-com');
			$time_vars['hourText'] = __('Hour','empd-com');
			$time_vars['minuteText'] = __('Minute','empd-com');
			$time_vars['secondText'] = __('Second','empd-com');
			$time_vars['millisecText'] = __('Millisecond','empd-com');
			$time_vars['timezoneText'] = __('Time Zone','empd-com');
			$time_vars['currentText'] = __('Now','empd-com');
			$time_vars['closeText'] = __('Done','empd-com');

                        $vars['date'] = $date_vars;
                        $vars['time'] = $time_vars;
                        $vars['locale'] = $locale;

			wp_enqueue_script( 'emd-mb-datetime', EMD_MB_JS_URL . 'datetime.js', $deps, EMD_MB_VER, true );
                        wp_localize_script( 'emd-mb-datetime', 'dtvars', $vars);
		}

		/**
		 * Get field HTML
		 *
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $meta, $field )
		{
			if($meta != '')
                        {
                                if($field['js_options']['timeFormat'] == 'hh:mm')
                                {
                                        $getformat = 'Y-m-d H:i';
                                }
                                else
                                {
                                        $getformat = 'Y-m-d H:i:s';
                                }
				if(DateTime::createFromFormat($getformat,$meta)){
                                	$meta = DateTime::createFromFormat($getformat,$meta)->format(self::translate_format($field));
				}
                        }
                        return sprintf(
                                '<input type="text" class="emd-mb-datetime" name="%s" value="%s" id="%s" size="%s" data-options="%s" readonly/>',
                                $field['field_name'],
                                $meta,
                                isset( $field['clone'] ) && $field['clone'] ? '' : $field['id'],
                                $field['size'],
                                esc_attr( wp_json_encode( $field['js_options'] ) )
                        );
		}

		/**
		 * Calculates the timestamp from the datetime string and returns it
		 * if $field['timestamp'] is set or the datetime string if not
		 *
		 * @param mixed $new
		 * @param mixed $old
		 * @param int   $post_id
		 * @param array $field
		 *
		 * @return string|int
		 */
		/*static function value( $new, $old, $post_id, $field )
		{
			if ( !$field['timestamp'] )
				return $new;

			$d = DateTime::createFromFormat( self::translate_format( $field ), $new );
			return $d ? $d->getTimestamp() : 0;
		}*/

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field = wp_parse_args( $field, array(
				'size'       => 30,
				'js_options' => array(),
				'timestamp'  => false,
			) );

			// Deprecate 'format', but keep it for backward compatible
			// Use 'js_options' instead
			$field['js_options'] = wp_parse_args( $field['js_options'], array(
				'dateFormat'      => empty( $field['format'] ) ? 'yy-mm-dd' : $field['format'],
				'timeFormat'      => 'hh:mm:ss',
				'showButtonPanel' => true,
				'separator'       => ' ',
				'changeMonth' => true,
				'changeYear' => true,
				'yearRange' => '-100:+10',
			) );

			return $field;
		}

		/**
		 * Returns a date() compatible format string from the JavaScript format
		 *
		 * @see http://www.php.net/manual/en/function.date.php
		 *
		 * @param array $field
		 *
		 * @return string
		 */
		static function translate_format( $field )
		{
			return strtr( $field['js_options']['dateFormat'], self::$date_format_translation )
				. $field['js_options']['separator']
				. strtr( $field['js_options']['timeFormat'], self::$time_format_translation );
		}
		static function save( $new, $old, $post_id, $field )
                {
                        $name = $field['id'];
                        if ( '' === $new)
                        {
                                delete_post_meta( $post_id, $name );
                                return;
                        }
                        if($field['js_options']['timeFormat'] == 'hh:mm')
                        {
                                $getformat = 'Y-m-d H:i';
                        }
                        else
                        {
                                $getformat = 'Y-m-d H:i:s';
                        }
			if(DateTime::createFromFormat(self::translate_format($field), $new)){
                        	$new = DateTime::createFromFormat(self::translate_format($field), $new)->format($getformat);
                        	update_post_meta( $post_id, $name, $new );
			}
                }
	}
}
