<?php



// general settings

$fields['echelonso'] = array(
    'title'  => __( 'Echelon', $this->plugin_text_domain() ),
    'fields' => array(),
);

$fields['echelonso']['fields']['eso_acf_google_api_key'] = array(
    'type'        	=> 'text',
    'label'       	=> __( 'Google API Key', $this->plugin_text_domain() ),
    'description'   => __( 'Your Google API Key used for ACF Maps, ensure to enable JS Maps and Places.', $this->plugin_text_domain() ),
);

$fields['echelonso']['fields']['eso_activate_function_widgets'] = array(
    'type'   	 	=> 'checkbox',
    'label'       	=> __( 'Activate Function Widgets', $this->plugin_text_domain() ),
    'description'   => __( 'Activate all Echelon template function widgets.', $this->plugin_text_domain() ),
);

$fields['echelonso']['fields']['eso_activate_acf_widgets'] = array(
    'type'   	 	=> 'checkbox',
    'label'       	=> __( 'Activate ACF Widgets', $this->plugin_text_domain() ),
    'description'   => __( 'Activate all Echelon ACF widgets.', $this->plugin_text_domain() ),
);

$fields['echelonso']['fields']['eso_activate_custom_widgets'] = array(
    'type'   	 	=> 'checkbox',
    'label'       	=> __( 'Activate Custom Widgets', $this->plugin_text_domain() ),
    'description'   => __( 'Activate all custom Echelon widgets.', $this->plugin_text_domain() ),
);

// posts per page

$fields['echelonso_ppp_binding'] = array(
    'title'  => __( 'Echelon PPP Binding', $this->plugin_text_domain() ),
    'fields' => array(),
);

$all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

$bindings[0] = 'Use Reading Setting';

foreach ($all_custom_post_types as $k => $v) {
    $a = array('acf-field-group', 'acf-field', 'echelonso_layout');
    if (!in_array($k, $a)) {
        $bindings[$k] = 'Use ' . $v;
    }
}

$all_taxonomies = get_taxonomies( array ( '_builtin' => FALSE ) );
$show_ppp_binding = false;

foreach ($all_taxonomies as $k => $v) {
    $a = array('echelonso_layout_cat', 'echelonso_layout_tag');
    if (!in_array($k, $a)) {
        $fields['echelonso_ppp_binding']['fields']['echelonso_ppp_binding_' . $k] = array(
            'type'        => 'select',
            'options'     => $bindings,
            'label'       => __('Posts Per Page for ' . $k, $this->plugin_text_domain() ),
            'description'   => __( 'How to handle the Posts Per Page for the taxonomy ' . $k . '?', $this->plugin_text_domain() ),
        );
        $show_ppp_binding = true;
    }
}

siteorigin_panels_setting( 'echelonso_ppp_binding_echelonso_library_cat' );
