<?php
/**
 * @var NativeRent\Admin\Views\AuthForm $view
 */

?>

<nrent-auth-form
	action="<?php echo esc_attr( $view->actionURL ); ?>"
	nonce="<?php echo esc_attr( wp_create_nonce( 'nrent_auth' ) ); ?>"
	login="<?php echo esc_attr( $view->login ); ?>"
	error="<?php echo esc_attr( isset( $view->errors[0] ) ? $view->errors[0] : '' ); ?>"
>
	<noscript>
		<?php
		esc_html_e(
			'Для интеграции необходимо включить JavaScript.',
			'nativerent'
		);
		?>
	</noscript>
</nrent-auth-form>
