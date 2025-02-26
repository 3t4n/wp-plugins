<?php

function wpaframe_studio_script( $ajaxUrl, $data ) {
    wp_enqueue_media();

    $project_id = isset( $data ) && isset( $data["project_id"] ) ? intval( $data["project_id"] ) : 0;
    $project_name = isset( $data ) && isset( $data["project_name"] ) ? intval( $data["project_name"] ) : "";
    $project_description = isset( $data ) && isset( $data["project_description"] ) ? sanitize_textarea_field( $data["project_description"] ) : "";

    $scripts = wpaframe_get_managed_scripts("ezaframe_studio_scripts", array(
        "wpaframe-studio-script" => plugin_dir_url( __FILE__ ) . '../assets/studio.min.js'
    ), $data);

    $nonce = wp_create_nonce( "wp-aframe-studio-nonce" );
    return '<script>
    var projectID = '.$project_id.';
    var ajaxUrl = "' . $ajaxUrl . '";
    var snonce = "'.$nonce.'";
    </script>' . $scripts;
}

function wpaframe_studio_project_info() {
    return '
        <div class="studio_project_info" id="studio_project_info">
            <div class="warp">
                <h2>Project Info</h2>
                <div>
                    <h3>Project Title</h3>
                    <input name="project_name" id="project_name" >
                </div>
                <div>
                    <h3>Project Description</h3>
                    <textarea name="project_description" id="project_description"></textarea>
                </div>
                <div>
                    <h3>Shortcode</h3>
                    <code id="wpaframe-shortcode"></code>
                </div>

                <a onclick="HideInfoEditor(); return false;" id="closeButton" class="button button-primary button-large">Close</a>
            </div>
        </div>
    ';
}

function wpaframe_admin_studio_page() {
    $content = "";
    $project_id = 0;
    $project_name = "No Title";
    $project_description = "";

    if( isset( $_GET['pid'] ) && intval( $_GET['pid'] ) > 0 ) {
        $project = WpAframe_Project::GetProject( intval( $_GET['pid'] ) );

        if( $project != null && isset( $project->project_content ) )
            $content = $project->project_content;

        if( $project != null && isset( $project->project_id ) )
            $project_id = intval( $project->project_id );

        if( $project != null && isset( $project->$project_name ) )
            $project_name = intval( $project->$project_name );
        if( $project != null && isset( $project->$project_description ) )
            $project_description = sanitize_textarea_field( $project->$project_description );
    }

    echo '<div class="wrap">';
    echo wpframe_content_viewer(
        array(
            "width" => "100%",
            "height" => "700px",
            "isStudio" => true,
            "project_id" => $project_id,
            "project_name" => $project_name,
            "project_description" => $project_description
        ), $content );
    echo '</div>';
}

function wpaframe_get_managed_scripts($filter_name, $default, $data) {
    $exclude = get_site_option( $filter_name . "-exclude", array() );

    $exclude = apply_filters( $filter_name . "-exclude", $exclude, $data );

    $other_scripts = apply_filters( $filter_name, $default, $data );

    $scripts = "";
    foreach( $other_scripts as $script_id => $script_url ) {
        if( !in_array( $script_id, $exclude ) )
            $scripts  = '<script id="' . esc_attr($script_id) . '" src="' . esc_attr($script_url) . '"></script>';
    }

    return $scripts;
}

// Enqueue script
function wpaframe_enqueue_managed_scripts($filter_name, $default) {
    $exclude = get_site_option( $filter_name . "-exclude", array());

    $exclude = apply_filters( $filter_name . "-exclude", $exclude );

    $other_scripts = apply_filters( $filter_name, $default );
    $scripts = "";
    foreach($other_scripts as $script_id => $script_url) {
        if(!in_array($script_id, $exclude))
            wp_enqueue_script( $script_id, $script_url );
    }
}
