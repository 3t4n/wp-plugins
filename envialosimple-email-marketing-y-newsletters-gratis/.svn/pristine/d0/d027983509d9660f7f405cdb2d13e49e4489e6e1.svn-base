<?php
/*--- endpoints ---*/
//getForms
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contactsform7/getForms', array(
        'methods' => 'GET',
        'callback' => 'contactsform7_getforms',
        'permission_callback' => function () {
            return true;
        }
    ));
});
//getFieldsById
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contactsform7/getFieldsById', array(
        'methods' => 'GET',
        'callback' => 'contactsform7_getFieldsById',
        'permission_callback' => function () {
            return true;
        }
    ));
});
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contactsform7/getFormById', array(
        'methods' => 'POST',
        'callback' => 'contactsform7_getFormById',
        'permission_callback' => function () {
            return true;
        }
    ));
});
//getConfig
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contactsform7/getConfig', array(
        'methods' => 'GET',
        'callback' => 'contactsform7_getconfig',
        'permission_callback' => function () {
            return true;
        }
    ));
});
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contactsform7/setConfig', array(
        'methods' => 'POST',
        'callback' => 'contactsform7_setconfig',
        'permission_callback' => function () {
            return true;
        }
    ));
});
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contactsform7/getAllConfigs', array(
        'methods' => 'POST',
        'callback' => 'contactsform7_getallconfigs',
        'permission_callback' => function () {
            return true;
        }
    ));
});
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contactsform7/deleteById', array(
        'methods' => 'POST',
        'callback' => 'contactsform7_delete',
        'permission_callback' => function () {
            return true;
        }
    ));
});
/*-----------------*/


/*--- functions ---*/
function contactsform7_getforms() {
    $forms = get_posts(array(
        'post_type'     => 'wpcf7_contact_form',
        'numberposts'   => -1
    ));
    return $forms;
}
function contactsform7_getFieldsById() {
    $form_ID = sanitize_text_field($_GET['id']);
    $ContactForm = WPCF7_ContactForm::get_instance( $form_ID );
    $form_fields = $ContactForm->scan_form_tags();
    return $form_fields;
}
function contactsform7_getFormById($req) {
    $data = $req->get_params();
    $id = $data['id'];
    $contactForm = WPCF7_ContactForm::get_instance( $id );
    if($contactForm) {
        $data = [
            'id' => $id,
            'title' => $contactForm->title
        ];
        return $data;
    }
    return null;

}
function contactsform7_getconfig() {
    $id = sanitize_text_field($_GET['id']);
    return json_decode(get_option('es_config_contactform7_active_'.$id));
}
function contactsform7_setconfig($req) {
    $data = $req->get_params();
    $id = $data['id'];
    $value = json_encode($data['value']);
    update_option('es_config_contactform7_active_'.$id, $value);
    return true;
}
function contactsform7_getallconfigs($req) {
    global $wpdb;
    $data = $req->get_params();
    
    $filterName = (!empty($data['filter']))?"AND wp_posts.post_title LIKE '%".esc_sql($data['filter'])."%'":'';
    $order = (!empty($data['order']))?esc_sql($data['order']):"DESC";
    $orderBy = (!empty($data['orderby']))?"ORDER BY ".esc_sql($data['orderby'])." ".$order:"ORDER BY contactFormId ".esc_sql($order);
    $page = (!empty($data['page']))?(esc_sql($data['page'])-1):"0";
    $limit = (!empty($data['limit']))?esc_sql($data['limit']):"10";

    $queryCount = "SELECT count(option_id) as count FROM wp_options WHERE wp_options.option_name LIKE 'es_config_contactform7_active_%' ";

    $query = "
        SELECT wp_options.option_value,
            wp_posts.ID as contactFormId,
            wp_posts.post_title as contactFormName
        FROM wp_options
        INNER JOIN wp_posts 
            ON (wp_posts.post_type = 'wpcf7_contact_form' 
                AND wp_posts.ID = (SUBSTRING_INDEX(wp_options.option_name, 'es_config_contactform7_active_', -1))
                ".$filterName."
            )
        WHERE wp_options.option_name LIKE 'es_config_contactform7_active_%'
        ".$orderBy."
        LIMIT ".$page.",".$limit."
    ";
    
    $countForms = $wpdb->get_results($queryCount);
    $forms = array();
    $forms['count'] = $countForms[0]->count;
    if($forms['count'] > 0) {
        $forms['forms'] = $wpdb->get_results($query);
    } else {
        $forms['forms'] = null;
    }
    
    return $forms;
}

function contactsform7_delete($req) {
    $data = $req->get_params();
    $id = $data['id'];
    try {
        delete_option('es_config_contactform7_active_'.$id);
        return new WP_REST_Response(['status'=>'ok'], 200);
    } catch (\Throwable $th) {
        return new WP_REST_Response(['status'=>'error'], 500);
    }
}
/*-----------------*/