<?php

/**
 * COPY protect
 */

function sangoplus_copyprotect_loginuser1() {
	$options1 = get_option( 'copyprotect_options' );
	$options2 = get_option( 'protectuser_options' );
	$options3 = get_option( 'protectfunction_options' );
	if ( $options1['copyprotectCheckbox1'] ) {
		if ( $options2 === 'loginuser' && $options3 === 'rightclick' && ! is_user_logged_in() ) {
			?>
<script>
document.body.oncontextmenu = function () {return false;}
let isDownCommand = false;
const KEY_CODE_MAP = {
  C: 67,
  COMMAND: 91
};
window.addEventListener('keydown', (event) => {
	if(event.keyCode === KEY_CODE_MAP.COMMAND) {
	isDownCommand = true;
	}
	if(isDownCommand) {
	if(event.keyCode === KEY_CODE_MAP.C) {
	event.preventDefault();
	}
	}
});
window.addEventListener('keyup', (event) => {
	if(event.keyCode === KEY_CODE_MAP.COMMAND) {
	isDownCommand = false;
	}
});
</script>
			<?php
		}
		if ( $options2 === 'alluser' && $options3 === 'rightclick' ) {
			?>
<script>
document.body.oncontextmenu = function () {return false;}
let isDownCommand = false;
const KEY_CODE_MAP = {
  C: 67,
  COMMAND: 91
};
window.addEventListener('keydown', (event) => {
  if(event.keyCode === KEY_CODE_MAP.COMMAND) {
	isDownCommand = true;
  }
  if(isDownCommand) {
	if(event.keyCode === KEY_CODE_MAP.C) {
	  event.preventDefault();
	}
  }
});
window.addEventListener('keyup', (event) => {
	if(event.keyCode === KEY_CODE_MAP.COMMAND) {
	isDownCommand = false;
	}
});
</script>
			<?php
		}
	}
}
add_action( 'wp_footer', 'sangoplus_copyprotect_loginuser1' );

/* protect2 */
function customizer_sangoplus_protectstylecss() {
	$options1 = get_option( 'copyprotect_options' );
	$options2 = get_option( 'protectuser_options' );
	$options3 = get_option( 'protectfunction_options' );
	if ( $options1['copyprotectCheckbox1'] ) {
		if ( $options2 === 'loginuser' && $options3 === 'textdrag' && ! is_user_logged_in() ) {
			?>
	<style type="text/css">
	body{user-select:none;-webkit-user-select:none;-ms-user-select:none;-moz-user-select:none;-khtml-user-select:none;-webkit-user-drag:none;-khtml-user-drag:none}
	</style>
			<?php
		}
		if ( $options2 === 'alluser' && $options3 === 'textdrag' ) {
			?>
	<style type="text/css">
	body{user-select:none;-webkit-user-select:none;-ms-user-select:none;-moz-user-select:none;-khtml-user-select:none;-webkit-user-drag:none;-khtml-user-drag:none}
	</style>
			<?php
		}
		if ( $options2 === 'loginuser' && $options3 === 'imgkeep' && ! is_user_logged_in() ) {
			?>
	<style type="text/css">
	img{pointer-events:none;-webkit-touch-callout:none;-webkit-user-select:none;-moz-touch-callout:none;-moz-user-select:none;touch-callout:none;user-select:none}
	</style>
			<?php
		}
		if ( $options2 === 'alluser' && $options3 === 'imgkeep' ) {
			?>
	<style type="text/css">
	img{pointer-events:none;-webkit-touch-callout:none;-webkit-user-select:none;-moz-touch-callout:none;-moz-user-select:none;touch-callout:none;user-select:none}
	</style>
			<?php
		}
	}
}
add_action( 'wp_head', 'customizer_sangoplus_protectstylecss', 1000 );
