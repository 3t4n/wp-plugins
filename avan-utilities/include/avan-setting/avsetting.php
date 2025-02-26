<?php

  ///// Avan setting
  AVAN::createSection( $prefix, array(
    'id'    => 'avan_settools',
    'title' => __('Avan setting', 'avutilang'),
	'icon' => 'dashicons dashicons-screenoptions',
    'fields' => array(
		array(
		  'type'    => 'submessage',
		  'style'   => 'success',
		  'content' => __( 'To make a backup of the current settings of the plugin, you can use the following options. Keep the prepared file in a safe place and replace the previous backup whenever you need or make changes that cause problems.', 'avutilang'),
		),
		array(
			'type' => 'backup',
		),

    )
  ) );