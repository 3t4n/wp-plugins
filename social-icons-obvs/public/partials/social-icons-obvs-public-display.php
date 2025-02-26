<?php
/**
 * The public-facing view of the plugin
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/public/partials
 */

$options = get_option( $this->plugin_name . '-options' );

// list of accounts
$accounts = array(
	'behance',
	'bitbucket',
	'dribbble',
	'facebook',
	'github',
	'instagram',
	'linkedin',
	'pinterest',
	'soundcloud',
	'tumblr',
	'twitter',
	'vimeo',
	'whatsapp',
	'youtube',
	'yunojuno',
);

// activated accounts
$active_accounts = array();

// check if account has been activated and push it into the new array
foreach ( $accounts as $account ) {

	if ( array_key_exists( $account, $options ) ) {

		$url = $options[ $account . '_url' ];
		$pos = $options[ $account . '_pos' ];

		array_push( $active_accounts, array(
			'name' => $account,
			'url' => $url,
			'index' => $pos,
		) );
	}
}

// function for sorting icons by index
if ( ! function_exists( 'sort_by_index' ) ) {

	function sort_by_index( $a, $b ) {
		return $a['index'] - $b['index'];
	}
}

// sort icons by index
usort( $active_accounts, 'sort_by_index' );

// custom options
$alignment = $options['alignment'];
$background = $options['background'];
$custom_background = '';
$shape = $options['shape'];
$size = $options['size'];
$spacing = $options['spacing'];

// set icon background
if ( 'custom' == $background ) {
	$custom_background = $options['custom-background'];
	$icon_style = 'style="background-color: ' . $custom_background .'"';
} else {
    $icon_style = '';
}

// check array isn’t empty
if ( ! empty( $active_accounts ) ) {
    ?>
    <div class="sio-icons">
        <ul class="sio-icons__list sio-icons__list--<?php echo esc_attr( $alignment ); ?> sio-icons__list--<?php echo esc_attr( $background ); ?> sio-icons__list--<?php echo esc_attr( $shape ); ?> sio-icons__list--<?php echo esc_attr( $size ); ?>">
			<?php
			foreach ( $active_accounts as $icon ) {

				$url = $icon['url'];

				if ( 'whatsapp' === $icon['name'] ) {
					$url = 'https://api.whatsapp.com/send?phone=' . $url;
				}
				?>
                <li class="sio-icons__list-item sio-icons__list-item--<?php echo esc_attr( $spacing ); ?>">
                    <a class="sio-icons__icon sio-icons__icon--<?php echo esc_attr( $icon['name'] ); ?>"
                       href="<?php echo esc_url( $url ); ?>"
                       title="<?php echo esc_attr( $icon['name'] ); ?>" <?php echo $icon_style; ?>></a>
                </li>
				<?php
			}
			?>
        </ul>
    </div>
    <?php
}
