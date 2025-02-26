<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$navigations = [
	'dashboard'    => esc_html__( 'Dashboard', 'affi-affiliate-marketing-for-woo' ),
	'product'      => esc_html__( 'Product', 'affi-affiliate-marketing-for-woo' ),
	'transaction'  => esc_html__( 'Transaction', 'affi-affiliate-marketing-for-woo' ),
	/*'mlm'          => esc_html__( 'MLM', 'affi-affiliate-marketing-for-woo' ),*/
	'notification' => esc_html__( 'Notification', 'affi-affiliate-marketing-for-woo' ),
	'payout'       => esc_html__( 'Payout', 'affi-affiliate-marketing-for-woo' ),
];
?>

    <ul>
		<?php
		foreach ( $navigations as $key_nav => $nav ) {
			$url   = add_query_arg( [ 'affi-tab' => $key_nav ] );
			$class = '';

			if ( $affi_tab == $key_nav || ( empty( $affi_tab ) && $key_nav == 'dashboard' ) ) {
				$class = 'affi-active';
				?>
                <li><a class="<?php echo esc_attr( $class ) ?>"><?php echo esc_html( $nav ); ?></a></li>
				<?php
			} else {
				?>
                <li><a href="<?php echo esc_url( $url ) ?>"
                       class="<?php echo esc_attr( $class ) ?>"><?php echo esc_html( $nav ); ?></a></li>
			<?php }
		}
		?>
    </ul>

<?php
