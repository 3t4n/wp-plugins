<?php

/**
 * @param $class_name
 */
function ninjaseo_class_loader($class_name)
{
    $class_file = NINJASEO_DIR . 'classes/class.'
                  . trim(strtolower(str_replace('\\', '_', $class_name)), '\\') . '.php';

    if (is_file($class_file)) {
        require_once $class_file;
    }
}

/**
 * @param $columns
 *
 * @return mixed
 */
function ninjaseo_add_columns($columns)
{
    global $settings;

    $add_column = $settings['pages']['page_sub_menu_label_1'];

    $columns[strtolower($add_column)] = $add_column;

    return $columns;
}

/**
 * @param $name
 * To show the analyze button column on posts and pages 
 */
function ninjaseo_show_columns($name)
{
    global $settings;
    global $post;
    $add_column = strtolower($settings['pages']['page_sub_menu_label_1']);

    $url = get_permalink( $results[$post->ID] );

    $results = json_decode(get_option('ninjaseo_keywords'), true);
    if ( ! is_array($results)) {
        $results = array();
    }

    $keyword = isset($results[$post->ID]) ? $results[$post->ID] : '';

    $results     = json_decode(get_option('ninjaseo_values'), true);
    if($keyword) {
        $analyze = 'foranalyze';
        $html_action = sprintf(
            '<span id="id-nf-data-%s"><a href="" onclick="return ninjaseo_get_value(%s,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')">%s</a></span><div id="tooltip'.$post->ID.'" style="display:none" class="tooltip">View results
  <span class="tooltiptext"><div id="tooltiptexts'.$post->ID.'">ninjaseo</div></span>
</div>',
            '%s',
            '%s',
            $url,
            $keyword,
            $analyze,
            $settings['pages']['page_sub_menu_loading'],
            $settings['pages']['page_sub_menu_loading_img'],
            $settings['pages']['page_sub_menu_default_value_1']
        );
    } else {
        $html_action = "<span id=\"id-nf-data-{$post->ID}\"><a href=\"#\" onclick=\"alert('Keyword is missing. Please add the keyword at the post editor.'); return false;\">{$settings['pages']['page_sub_menu_default_value_1']}</a></span>";
    }

    if (is_array($results) && array_key_exists($post->ID, $results)) {
    $html_action = sprintf('<span id="hide_previews_score'.$post->ID.'">'.$results[$post->ID].'</span>');
        $update      = 'fromupdate';
        $html_action .= sprintf(
            '<span id="id-nf-data-%s"><a href="" onclick="return ninjaseo_get_value(%s,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')">%s</a></span><div id="tooltip'.$post->ID.'" style="display:none" class="tooltip">View results
  <span class="tooltiptext"><div id="tooltiptexts'.$post->ID.'">ninjaseo</div></span>
</div>',
            '%s',
            '%s',
            $url,
            $keyword,
            $update,
            $settings['pages']['page_sub_menu_loading'],
            $settings['pages']['page_sub_menu_loading_img'],
            '&nbsp;|&nbsp;<span><img style="width: 13px;position: absolute;
    margin-top: 3px;" class="refresh_icon" src="'.plugins_url('/ninjaseo/classes/images/refresh.svg').'"></span>'
        );
    }
    switch ($name) {
        case $add_column:
            printf($html_action, $post->ID, $post->ID);
    }
}

/**
 * Manage Meta Data
 */
function ninjaseo_service_pages()
{
    global $post;

    switch ($post->post_name) {
        case 'action_1':
            $response = (string)mt_rand(1, 10);

            $results = json_decode(get_option('ninjaseo_values'), true);
            if ( ! is_array($results)) {
                $results = array();
            }
            $post_id = sanitize_text_field((int)$_POST['post_id']);
            if (isset($post_id) && is_numeric($post_id)) {                
                if ($post_id > 0) {
                    $results[$post_id] = $response;
                    update_option('ninjaseo_values', json_encode($results));
                }
            }

            die($response);

        case 'action_2':
        $post_id = sanitize_text_field((int)$_POST['post_id']);
            if (isset($post_id)) {
                if (is_numeric($post_id)) {
            $keyword = sanitize_text_field($_POST['keyword']);
                    $keyword = trim($keyword);
                    if ($post_id > 0 && strlen($keyword) > 0) {
                        $results[$post_id] = $keyword;
                        update_option('ninjaseo_keywords', json_encode($results));
                    }
                }

                die('SAVE');

            } else {
                $response = array(
                    0 => array(
                        'id'   => 1,
                        'name' => 'name-1',
                    ),
                    1 => array(
                        'id'   => 2,
                        'name' => 'name-2',
                    ),
                    2 => array(
                        'id'   => 3,
                        'name' => 'name-3',
                    ),
                );
                die(json_encode($response));
            }
    }
}

/**
 * @param $post
 */
function ninjaseo_metabox_keyword_show($post)
{
    global $settings;

    $results = json_decode(get_option('ninjaseo_keywords'), true);
    if ( ! is_array($results)) {
        $results = array();
    }

    $value = isset($results[$post->ID]) ? 'value="' . $results[$post->ID] . '"'
        : 'placeholder="' . $settings['page_details']['pages_details_button_label_1'] . '"';

    echo '
<div>
    <div class="components-form-token-field__input-container">
    <input class="components-form-token-field__input" type="text" name="ninjaseo_keyword" id="id-nf-keyword" ' . $value . ' />
    </div>
    <p><input type="button" class="button button-primary" id="id-btn-nf-keyword" onclick="return ninjaseo_save_keyword(' .
         $post->ID . ',\'' . home_url($settings['page_details']['pages_details']) .
         '\')" value="'.$settings['page_details']['pages_details_button_label_1'].'" /><p id="success_message"></p></p><small></small><br><br><br><br><br>
    
</div>';
}

/**
 * Insert metabox into the post edit page
 */
function ninjaseo_add_metabox_shortcode()
{
    global $settings;

    add_meta_box(
        'ninjaseo_add_metabox_shortcode',
        $settings['shortcode']['short_code_label'],
        'ninjaseo_metabox_shortcode_show',
        'post',
        'side',
        'default',
        'high'
    );
}

/**
 * Save keyword field
 *
 * @param $post_id
 */
function ninjaseo_on_post_update($post_id)
{
    $ninjaseo_keyword = sanitize_text_field($_POST['ninjaseo_keyword']);
    if($_POST && isset($ninjaseo_keyword)){
        $results = json_decode(get_option('ninjaseo_keywords'), true);
        if ( ! is_array($results)) {
            $results = array();
        }
        $results[$post_id] = $ninjaseo_keyword;
        update_option('ninjaseo_keywords', json_encode($results));
    }
}
add_action( 'save_post', 'ninjaseo_on_post_update' );

/**
 * @param $post
 */
function ninjaseo_metabox_shortcode_show($post)
{
    global $settings;
    echo esc_html('
    <script>
    	const ninjaseo_url = \'' . home_url($settings['page_details']['pages_details']) . '\';
    	const ninjaseo_app = \'' . $settings['wp']['app'] . '\';
    	const ninjaseo_label = \'' . $settings['shortcode']['short_code_label'] . '\';
    </script>
    <span id="id-nf-selector"></span>
    ');
}

/**
 * Add metabox for keyword.
 */
function ninjaseo_add_metabox_keyword()
{
    $screens = array('post', 'page');
    foreach ($screens as $screen) {
        add_meta_box(
            'ninjaseo_add_metabox_keyword',
            'Keyword',
            'ninjaseo_metabox_keyword_show',
            $screen,
            'side',
            'high'
        );
    }
}

/**
 * To save the keyword.
 */
function ninjaseo_save_keyword() {
    $post_id = sanitize_text_field($_POST['post_id']);
    $ninjaseo_keyword = sanitize_text_field($_POST['keyword']);
    if($_POST && isset($ninjaseo_keyword)){
        $results = json_decode(get_option('ninjaseo_keywords'), true);
        if ( ! is_array($results)) {
            $results = array();
        }
        $results[$post_id] = sanitize_text_field($_POST['keyword']);
        update_option('ninjaseo_keywords', json_encode($results));
        echo esc_html("updated");
    }
    else {
        echo esc_html("not update");
    }
}

/**
 * To save the analyze score.
 */
function ninjaseo_save_score() {
    $post_id = sanitize_text_field($_POST['post_id']);
    $ninjaseo_values = sanitize_text_field($_POST['ninjaseo_values']);
    if($_POST && $ninjaseo_values && isset($_POST['ninjaseo_values'])){
        $results = json_decode(get_option('ninjaseo_values'), true);
        if ( ! is_array($results)) {
            $results = array();
        }
        $results[$post_id] = sanitize_text_field($_POST['ninjaseo_values']);
        update_option('ninjaseo_values', json_encode($results));
        echo esc_html("updated");
    }
    else {
        echo esc_html("not update");
    }
}
