<?php

function qs_darkmode_optins_dynamic_render_callback( $block_attributes, $content ) {
   
    $stylesheet = array(
   
       
    );
    
    if(isset($block_attributes['width'])){
        $stylesheet['.qs-dark-mood-layout-common .md_switch .switch + label'] = array(
            "width" => $block_attributes['width'].'px'
        );  
    }

    if(isset($block_attributes['marginLeft'])){
        $stylesheet['.qs-dark-mood-layout-common .md_switch .switch:checked + label:after'] = array(
            "margin-left" => $block_attributes['marginLeft'].'px'
        );  
    }
    if(isset($block_attributes['height'])){
        $stylesheet['.qs-dark-mood-layout-common .md_switch .switch + label '] = array(
            "height" => $block_attributes['height'].'px'
        );  
    }
    
    if(isset($block_attributes['topMargin'])){
        $stylesheet['.qs-dark-mood-layout-common'] = array(
            "margin-top" => $block_attributes['topMargin'].'px'
        );  
    }

    if(isset($block_attributes['bottomMargin'])){
        $stylesheet['.qs-dark-mood-layout-common '] = array(
            "margin-bottom" => $block_attributes['bottomMargin'].'px'
        );  
    }

    if(isset($block_attributes['itextColor'])){
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label:after'] = array(
            "background-color" => $block_attributes['itextColor']
        );  
    }

    if(isset($block_attributes['textColor'])){

        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label:after'] = array(
            "background-color" => $block_attributes['textColor']
        );  
         
    }
    
    if(isset($block_attributes['itextBackground'])){
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label:before'] = array(
            "background" => $block_attributes['itextBackground']
        );  
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label:before'] = array(
            "background" => $block_attributes['itextBackground']
        );  
    }

  

    if(isset($block_attributes['textBackground'])){
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label:before'] = array(
            "background" => $block_attributes['textBackground']
        ); 
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label:before'] = array(
            "background" => $block_attributes['textBackground']
        ); 
    }

    if(isset($block_attributes['swictherTop']) || isset($block_attributes['swictherLeft'])){
       
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label:after'] = array(
          
        );
        
        if(isset($block_attributes['swictherLeft'])){
           
            $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label:after']['left'] = $block_attributes['swictherLeft'].'px';
        }
        if(isset($block_attributes['swictherTop'])){
            $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label:after']['top'] = $block_attributes['swictherTop'].'px';
        }
   
    }
    if(isset($block_attributes['iswictherTop']) || isset($block_attributes['ileft'])){
  
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label:after'] = array(
          
        );
      
        if(isset($block_attributes['ileft'])){

            $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label:after']['left'] = $block_attributes['ileft'].'px';
        }
        if(isset($block_attributes['iswictherTop'])){
            $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label:after']['top'] = $block_attributes['iswictherTop'].'px';
        }
   
    }

    if(isset($block_attributes['borderColor'])){

        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label'] = array(
            "border-color" => $block_attributes['borderColor']
        );

        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch:checked + label'] = array(
            "border-color" => $block_attributes['borderColor']
        );

    }
    if(isset($block_attributes['iborderColor'])){

        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label'] = array(
            "border-color" => $block_attributes['iborderColor']
        );
        $stylesheet['.qs-dark-mood-layout-common .switch_common .switch + label'] = array(
            "border-color" => $block_attributes['iborderColor']
        );

    }

    if(isset($block_attributes['blockId'])){
        $block_id = sprintf('[data-ublock="%s"]',trim($block_attributes['blockId']));
    }else{
        $block_id = '';
    }
    
    ob_start();
    echo "<style>";
    echo qs_dark_mode_css_array_to_css($stylesheet,$block_id); 
    echo "</style>";
    echo sprintf('<div data-ublock="%s">',isset($block_attributes['blockId'])?$block_attributes['blockId'] : '');
    echo do_shortcode('[qs-dark-mode]');
    echo '</div>';
    $out = ob_get_clean();
    return $out;
}