<?php

$metabox = array(
	'page-header',
);

foreach ($metabox as $m):
	if ( file_exists( dirname( __FILE__ ) . '/meta/'.$m.'.php' ) ) {
		require_once(dirname( __FILE__ ) . '/meta/'.$m.'.php' );
	}
endforeach;
