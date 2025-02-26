<?php

add_shortcode( 'wpframe_viewer', 'wpframe_frontend_content_viewer' );
function wpframe_frontend_content_viewer($attr) {
    $content = "";
    if( isset( $attr ) && isset( $attr['id'] ) && intval( $attr['id'] ) > 0) {
        $project = WpAframe_Project::GetProject( intval( $attr['id'] ) );
        $content = isset( $project ) && isset( $project->project_content ) &&
            isset( $project->project_status ) && $project->project_status == true ? $project->project_content : "";
    }

    return wpframe_content_viewer( $attr, $content );
}

function wpframe_content_viewer( $attr, $content = "" ) {
    wp_parse_args( $attr,
                  array (
                      "width" => "100%",
                      "height" => "300px",
                      "isStudio" => false,
                      "class" => "",
                      "sceneid" => ""
                  )
                 );

    $elemStyle = 'width:'.$attr['width'].'; height:'.$attr['height'].'; ';
    $inspector = "";
    $isEmbeded = "embedded";
    $studioButton = '';
    $studioScript = '';
    $studioInfoModal = '';
    $class = !empty($attr['class']) ? 'class="' . esc_attr($attr['class']) . '"' : '';
    
    if( isset( $attr['isStudio'] ) ) {
        $inspector = 'inspector="url: ' . plugin_dir_url( __FILE__ ) . '../aframe/inspector/aframe-inspector.min.js"';
        $elemStyle = 'width:100%; height:100%; position:fixed; top:0; left:0; ';
        $isEmbeded = "";
        $studioButton = '<a id="wp-aframe-start-studio-button" class="button button-primary inspector-button" href="#" onclick="StartStudio();"><span class="dashicons dashicons-layout"></span> Start Studio</a>';

        // Studio cume ade 1 je..jd takde masalah kalau gini..
        $studioScript = wpaframe_studio_script( admin_url( 'admin-ajax.php' ), $attr );
        $studioInfoModal = wpaframe_studio_project_info();
    }

    if( empty( $content ) )
        $content = isset( $attr['isStudio'] ) ?
            wpframe_content_studio_default_content( $isEmbeded, $inspector ) :
            wpframe_content_viewer_default_content( $isEmbeded );
    else
        $content = str_replace( "<a-scene", "<a-scene " . $inspector . " " . $isEmbeded, wp_unslash( $content ) );
    
    // Force add id
    if(!empty($attr['sceneid']))
        $content = str_replace( "<a-scene", "<a-scene id=\"" . esc_attr($attr['sceneid']) . "\" ", wp_unslash( $content ) );
    
    if(!is_admin())
        add_action('wp_footer', 'wpframe_viewer_footer');
    else
        add_action('admin_footer', 'wpframe_viewer_footer');

    $wpaframe_isFooterReady = true;
    return '<div id="wp-aframe-scene-wrap" '. $class .' style="' . esc_attr($elemStyle) . '">'
        . wpaframe_sanitize_content( $content ) 
        . '</div>' . $studioButton . $studioScript . $studioInfoModal . '
    ';
}

function wpframe_viewer_footer() {
    $viewer_script = wpaframe_get_managed_scripts("ezaframe_viewer_scripts", array(), $attr);
    echo wp_kses_post($viewer_script);
}

function wpframe_content_studio_default_content( $isEmbeded, $inspector ) {
    return '<a-scene ' . $isEmbeded . ' ' . $inspector . '>
      <a-box position="0 0.5 -3" rotation="0 45 0" color="#4CC3D9"></a-box>
      <a-sphere position="0 1.25 -5" radius="1.25" color="#EF2D5E"></a-sphere>
      <a-sky color="#ECECEC"></a-sky>
    </a-scene>';
}

function wpframe_content_viewer_default_content( $isEmbeded ) {
    return '<a-scene ' . $isEmbeded . ' keyboard-shortcuts="" screenshot="" vr-mode-ui="" device-orientation-permission-ui="">
      <a-box position="-1 0.5 -3" rotation="0 45 0" color="#4CC3D9" material="" geometry="" scale=""></a-box>

      <a-cylinder position="1 0.75 -3" radius="0.5" height="1.5" color="#FFC65D" material="" geometry="" rotation="" scale=""></a-cylinder>
      <a-plane position="0 0 -4" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" material="" geometry="" scale=""></a-plane>
      <a-sky color="#ECECEC" material="" geometry="" position="" rotation="" scale=""></a-sky>
    <a-entity position="0 1.5 -2.5" rotation="" scale="7 7 7" text__notfoundtext="align: center; color: #ff1f1f; value: Content Not Found!"></a-entity><canvas class="a-canvas a-grab-cursor" data-aframe-canvas="true" data-engine="three.js r137" __spector_context_type="webgl2" width="1920" height="929" style=""></canvas><div class="a-loader-title" style="display: none;">AFrame Studio ‹ MediAFrame — WordPress</div><a-entity camera="" position="" wasd-controls="" rotation="" look-controls="" aframe-injected=""></a-entity><div class="a-enter-vr" aframe-injected=""><button class="a-enter-vr-button" title="Enter VR mode with a headset or fullscreen mode on a desktop. Visit https://webvr.rocks or https://webvr.info for more information." aframe-injected=""></button></div><div class="a-enter-ar a-hidden" aframe-injected=""><button class="a-enter-ar-button" title="Enter AR mode with a headset or handheld device. Visit https://webvr.rocks or https://webvr.info for more information." aframe-injected=""></button></div><div class="a-orientation-modal a-hidden" aframe-injected=""><button aframe-injected="">Exit VR</button></div><a-entity light="" data-aframe-default-light="" aframe-injected=""></a-entity><a-entity light="" position="" data-aframe-default-light="" aframe-injected=""></a-entity></a-scene>';
}
