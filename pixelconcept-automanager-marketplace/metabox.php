<?php

function pxc_amm_admin_init()
{	// add a meta box for each of the wordpress page types: posts and pages
	foreach (array('page') as $type) 
	{
		add_meta_box(
			'pxc_amm_all_meta', 
			__('pxc-amm-page-integration-meta', 'pxc_amm'), 
			'pxc_amm_meta_setup', 
			$type, 
			'normal', 
			'high'
		);
	}
}

function pxc_amm_meta_setup($post, $box)
{	
	// instead of writing HTML here, lets do an include
	include(PXC_AMM_PLUGIN_DIR . '/metabox/meta.php');
}

add_action('admin_init','pxc_amm_admin_init');