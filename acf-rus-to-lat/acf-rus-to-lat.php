<?php

	/*
	Plugin Name: Advanced Custom Fields: Rus-To-Lat
	Plugin URI: https://wordpress.org/plugins/acf-rus-to-lat/
	Description: Дополнение для Advanced Custom Fields (ACF) - очищает имена дополнительных полей от ненужных символов и преобразует в латынь.
	Author: Serg <preslilvs@yandex.ru>
	Version: 2.0.0
	*/


	class ACF_RusToLat {

		function __construct()
		{
			// Уведомления о расширенной версии плагина с пользовательским интерфейсовм.
			// После скрытия больше не надоедают

			require_once dirname(__FILE__) . '/admin-notices.php';
			WACFR_Admin_Notices::instance(__FILE__);
			
			add_action('acf/field_group/admin_enqueue_scripts', array($this, 'enqueue_script'));
		}


		/*
		*  enqueue_script
		*
		*  @description:
		*  @since 1.0.0
		*  @created: 31/08/16
		*/
		function enqueue_script()
		{

			if( function_exists('wp_add_inline_script') ) {
				wp_add_inline_script('acf-field-group', $this->script());
			} else {
				add_action('admin_footer', array($this, 'script_to_footer'));
			}
		}


		/*
		*  script_to_footer
		*
		*  @description:
		*  @since 1.0.0
		*  @created: 31/08/16
		*/
		function script_to_footer()
		{

			$script = $this->script();

			echo '<script type="text/javascript">' . $script . '</script>';
		}


		/*
		*  script
		*
		*  @description: Return script data
		*  @since 1.0.0
		*  @created: 31/08/16
		*  @update: 21/04/17
		*/
		function script()
		{

			ob_start();
			?>
			(function($){
			// transliterate field-name
			acf.addFilter('generate_field_object_name', function(val){
			return replace_field(val);
			});

			$(document).on('keyup change', '.acf-field .field-name', function(){

			if ( $(this).is(':focus') ){
			return false;
			}else{
			var val = $(this).val();
			val = replace_field( val );

			if ( val !== $(this).val() ) {
			$(this).val(val);
			<!--						$(this).closest('.acf-field-object').find('li.li-field-key').text(val);-->
			}
			}

			});
			
			function replace_field( val ){
			console.log(val);
			val = $.trim(val);
			var table = {
			'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
			'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
			'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
			'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya'
			}

			$.each( table, function(k, v){
			var regex = new RegExp( k, 'g' );
			val = val.replace( regex, v );
			});

			val = val.replace( /[^\w\d-_]/g, '' );
			val = val.replace( /_+/g, '_' );
			val = val.replace( /^_?(.*)$/g, '$1' );
			val = val.replace( /^(.*)_$/g, '$1' );

			return val;
			}
			})(jQuery)
			<?php
			$script = ob_get_contents();
			ob_end_clean();

			return $script;
		}
	}

	new ACF_RusToLat();
