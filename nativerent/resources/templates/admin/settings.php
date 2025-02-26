<?php
/**
 * @var NativeRent\Admin\Views\Settings $view
 */

?>

<nrent-settings-form
	action="<?php echo esc_attr( $view->actionURL ); ?>"
	nonce="<?php echo esc_attr( wp_create_nonce( 'nrent_settings' ) ); ?>"
	settings="<?php echo esc_attr( json_encode( $view->adUnitsConfig ) ); ?>"
	regularEnabled="<?php echo esc_attr( $view->regularSettings ); ?>"
	ntgbEnabled="<?php echo esc_attr( $view->ntgbSettings ); ?>"
	ntgbCount="<?php echo count( $view->adUnitsConfig->ntgb->getActiveUnits() ); ?>"
	demoPage="<?php echo esc_attr( $view->demoPageURL ); ?>"
>
	<noscript>
		<?php
		esc_html_e(
			'Для интеграции необходимо включить JavaScript.',
			'nativerent'
		);
		?>
	</noscript>
</nrent-settings-form>

<script>
	(function () {
		window.addEventListener('load', function () {
			if (window.NRENT_FORM_COMPONENT_ERROR) {
				var root = document.querySelector('nrent-settings-form')
				var errMsg = document.createElement('h2')
				errMsg.classList.add('NativeRentAdmin_validationError')
				errMsg.textContent = 'Возникла ошибка при загрузке формы. ' +
					'Если вы используете блокировщик рекламы, то попробуйте отключить его и перезагрузить страницу.'
				root.insertAdjacentElement('afterend', errMsg)
			}
		})
	})()
</script>

