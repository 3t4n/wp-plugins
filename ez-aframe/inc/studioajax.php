<?php

// Primitive templates
add_action( "wp_ajax_wpaframe_get_templates", "wpaframe_get_templates" );
function wpaframe_get_templates() {
    $default = array(
        "groups" => array(
            array(
                "name" => "Premitives",
                "id" => "premitive"
            )
        ),
        "items" => array(
            array (
                "name" => "Box",
                "element" => "a-box",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Circle",
                "element" => "a-circle",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Cone",
                "element" => "a-cone",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Cursor",
                "element" => "a-cursor",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Curvedimage",
                "element" => "a-curvedimage",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Cylinder",
                "element" => "a-cylinder",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Dodecahedron",
                "element" => "a-dodecahedron",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Icosahedron",
                "element" => "a-icosahedron",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Image",
                "element" => "a-image",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Light",
                "element" => "a-light",
                "parentId" => "premitive"
            ),
            //array (
            //    "name" => "Link",
            //    "element" => "a-link",
            //    "parentId" => "premitive"
            //),
            array (
                "name" => "Octahedron",
                "element" => "a-octahedron",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Plane",
                "element" => "a-plane",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Ring",
                "element" => "a-ring",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Sky",
                "element" => "a-sky",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Sound",
                "element" => "a-sound",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Sphere",
                "element" => "a-sphere",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Tetrahedron",
                "element" => "a-tetrahedron",
                "parentId" => "premitive"
            ),
            array (
                "name" => "text",
                "element" => "a-text",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Torus knot",
                "element" => "a-torus-knot",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Torus",
                "element" => "a-torus",
                "parentId" => "premitive"
            ),
            array (
                "name" => "Triangle",
                "element" => "a-triangle",
                "parentId" => "premitive"
            ),
            array (
                "name" => "video",
                "element" => "a-video",
                "parentId" => "premitive"
            ),
            array (
                "name" => "videosphere",
                "element" => "a-videosphere",
                "parentId" => "premitive"
            )
        )
    );

    $default = apply_filters( 'ezaframe_get_studio_templates', $default );

    echo json_encode( $default );
    die();
}

// Get project info from admin
add_action( "wp_ajax_wpaframe_get_project", "wpaframe_studio_get_project" );
function wpaframe_studio_get_project() {
    $project = WpAframe_Project::GetProject( intval( $_REQUEST['project_id'] ), "project_id, project_name, project_description" );

    echo json_encode( $project );

    die();
}

// Save project to database
add_action( "wp_ajax_wpaframe_studiosave", "wpaframe_studio_save" );
function wpaframe_studio_save() {
    global $wpdb;
    $result = 1;
    $nonce = !empty( $_REQUEST['nonce'] ) ? wp_unslash( $_REQUEST['nonce'] ) : "no nonce";
    $message = "";
    $imageUrl = "";
    $wpdb->suppress_errors = true;
    $wpdb->show_errors = true;

    $project_id = 0;
    if ( wp_verify_nonce( $nonce, "wp-aframe-studio-nonce" ) ) {    // Update
        if( isset( $_REQUEST['project_id'] ) && intval( $_REQUEST['project_id'] ) > 0) {
            $result = WpAframe_Project::Update( intval( $_REQUEST['project_id'] ), array(
                "project_name" => sanitize_text_field(!empty( $_REQUEST['project_name'] ) ? $_REQUEST['project_name'] : "No Title"),
                "project_content" => wpaframe_sanitize_content(!empty( $_REQUEST['project_content'] ) ? $_REQUEST['project_content'] : ""),
                "project_description" => sanitize_textarea_field(!empty( $_REQUEST['project_description'] ) ? $_REQUEST['project_description'] : "")
            ), 1 );

            $project_id = intval( $_REQUEST['project_id'] );
            $message = "Update " . ( intval( $result ) > 0 ? "Succesfull" : "Failed" );
        }
        else {          // Insert
            $result = WpAframe_Project::Insert( array(
                "project_name" => sanitize_text_field(!empty( $_REQUEST['project_name'] ) ? $_REQUEST['project_name'] : "No Title"),
                "project_content" => wpaframe_sanitize_content(!empty( $_REQUEST['project_content'] ) ? $_REQUEST['project_content'] : ""),//wp_slash
                "project_description" => sanitize_textarea_field(!empty( $_REQUEST['project_description'] ) ? $_REQUEST['project_description'] : "")
            ));
            $project_id = $wpdb->insert_id;
            $message = "Insert " . ( intval( $result ) > 0 ? "Succesfull" : "Failed" );
        }
        
        // Save project screenshot
        if(intval($result) > 0) {
            $imageUrl = wpaframe_studio_save_screenshot( $project_id, stripslashes_deep($_REQUEST['project_screenshot']) );
        }
        else if( empty( $message ) )
            $message = "failed";
    }
    else {
        $result = 1;
        $message = "Invalid nonce";
    }
    
    echo json_encode( array(
        "error_code" => intval( $result ) > 0 ? 0 : 1,
        "res" => $result,
        "project_id" => $project_id,
        "message" => $message,
        "img_url" => $imageUrl,
        "udir" => wp_upload_dir()
    ));

    wp_die();
}

// Save screenshot to custom folder
function wpaframe_studio_save_screenshot( $project_id, $dataUrl ) {
    if( empty( $dataUrl ) )
        return;

    $upload_dir = wp_upload_dir();

    $data = base64_decode(str_replace('data:image/jpeg;base64,', '', stripslashes_deep( $dataUrl ) ) );
    
    $dirName = $upload_dir['wpa-basedir'] . '/project_thumb/';
    if( !is_dir( $dirName ) )
        wp_mkdir_p( $dirName );
    
    $fileName = intval($project_id) . ".jpg";
    $filePath = realpath($dirName) . '/' . $fileName;
    
    file_put_contents( $filePath, $data );

    return $upload_dir['wpa-baseurl'] . '/project_thumb/' . $fileName;
}
