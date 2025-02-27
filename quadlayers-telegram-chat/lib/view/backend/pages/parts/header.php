<div class="wrap about-wrap full-width-layout qlwrap">

	<h1><?php echo esc_html( QLTGM_PLUGIN_NAME ); ?></h1>

	<p class="about-text"><?php printf( esc_html__( 'Thanks for using %s! We will do our best to offer you the best and improved communication experience with your users.', 'quadlayers-telegram-chat' ), QLTGM_PLUGIN_NAME ); ?></p>

	<p class="about-text">
		<?php // printf('<a href="%s" target="_blank">%s</a>', QLTGM_DEMO_URL, esc_html__('Purchase', 'quadlayers-telegram-chat')); ?></a>
		<?php printf( '<a href="%s" target="_blank">%s</a>', QLTGM_DEMO_URL, esc_html__( 'Demo', 'quadlayers-telegram-chat' ) ); ?></a> |
		<?php printf( '<a href="%s" target="_blank">%s</a>', QLTGM_DOCUMENTATION_URL, esc_html__( 'Documentation', 'quadlayers-telegram-chat' ) ); ?></a>
	</p>

	<?php
	printf(
		'<a href="%s" target="_blank"><div style="
				background: #006bff url(%s) no-repeat;
				background-position: top center;
				background-size: 130px 130px;
				color: #fff;
				font-size: 14px;
				text-align: center;
				font-weight: 600;
				margin: 5px 0 0;
				padding-top: 120px;
				height: 40px;
				display: inline-block;
				width: 140px;
				" class="wp-badge">%s</div></a>',
		'https://quadlayers.com/?utm_source=qltgm_admin',
		plugins_url( '/assets/backend/img/quadlayers.jpg', QLTGM_PLUGIN_FILE ),
		esc_html__( 'QuadLayers', 'quadlayers-telegram-chat' )
	);
	?>

	</div>
	<?php
	if ( isset( $submenu[ QLTGM_DOMAIN ] ) ) {
		if ( is_array( $submenu[ QLTGM_DOMAIN ] ) ) {
			?>
		<div class="wrap about-wrap full-width-layout qlwrap">
		<h2 class="nav-tab-wrapper">
			<?php
			if ( ! isset( $button ) ) {
			$button_model = new QuadLayers\QLTGM\Models\Button();
			$button       = $button_model->get();
			}
			foreach ( $submenu[ QLTGM_DOMAIN ] as $tab ) {
			$hide = '';
				if ( strpos( $tab[2], '.php' ) !== false ) {
				continue;
				}
				if ( $button['box'] == 'no' &&
				( 'admin.php?page=' . $tab[2] == 'admin.php?page=qltgm_box' ||
				'admin.php?page=' . $tab[2] == 'admin.php?page=qltgm_contacts' ) ) {
					$hide = 'hidden ';
				}
				?>
			<a href="<?php echo admin_url( 'admin.php?page=' . esc_attr( $tab[2] ) ); ?>" class="
								<?php
			echo esc_attr( $hide );
	echo esc_attr( $tab[2] );
								?>
				nav-tab<?php echo ( isset( $_GET['page'] ) && $_GET['page'] == $tab[2] ) ? ' nav-tab-active' : ''; ?> "><?php echo wp_kses_post( $tab[0] ); ?></a>
			<?php

			}
			?>
		</h2>
		</div>
	<?php
		}
	}
