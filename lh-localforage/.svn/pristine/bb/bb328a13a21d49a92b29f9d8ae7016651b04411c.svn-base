<?php

// If this file is called directly, abandon ship.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (!class_exists('LH_Register_file_class')) {


class LH_Register_file_class {
    
 var $script_atts;
 var $name;
 var $our_handle;
 var $has_run;
 
 static function get_script_src_by_handle($handle) {
    global $wp_scripts;
    if(isset($wp_scripts->registered[$handle]->src)) {
        
        return $wp_scripts->registered[$handle];
    } else {
        
        return false;
        
    }
}


 static function get_style_src_by_handle($handle) {
    global $wp_styles;
    
    if(isset($wp_styles->registered[$handle]->src)) {
        
        return $wp_styles->registered[$handle];
    } else {
        
        return false;
        
    }
}
 


public function add_attributes($tag, $handle, $src){
     
if (!empty($this->our_handle) && ($handle == $this->our_handle)){
    
if (!empty($this->script_atts)){
    
$implode = implode(" ", $this->script_atts);





if (empty($this->has_run)){

$this->script_atts = false;
$this->our_handle = false;
$this->has_run = true;
return str_replace( ' src', ' '.$implode.' src', $tag );

}



    
}   
    
}

return $tag;
     
     
 }
 
 
 public function maybe_prefetch(){
    
if (!wp_script_is( $this->name, 'done' )){
    


if ($script = self::get_script_src_by_handle($this->name)){
    
echo '<link rel="prefetch" href="'.esc_url(apply_filters('script_loader_src', add_query_arg('ver', $script->ver,$script->src),$this->name)).'" as="script" />
';  

}
    
    
}

if (!wp_style_is( $this->name, 'done' )){
    
if ($style = self::get_style_src_by_handle($this->name)){
    
echo '<link rel="prefetch" href="'.esc_url(apply_filters('style_loader_src', add_query_arg('ver', $style->ver,$style->src),$this->name)).'" as="style" />
';  

}
    
}
    
    
    
}
    
    
    public function __construct( $name, $file_path, $url, $is_script = false, $deps = array(), $in_footer = true, $atts = array(), $media = 'all', $prefetch = true) {
        
$this->has_run = false; 
$this->name = $name;   

        if ( isset($file_path) && file_exists( $file_path ) ) {
            if ( $is_script ) {
                wp_register_script( $name, $url, $deps, filemtime($file_path), $in_footer ); 

            } else {
                wp_register_style( $name, $url, $deps, filemtime($file_path), $media );

            } // end if

if (!empty($prefetch)) {          
            
//asynchronously prime the cache
add_action( 'wp_footer', array($this,'maybe_prefetch'), PHP_INT_MAX );

}
            
         $this->our_handle = $name;    
            
        } // end if
	  
if (isset($atts) and is_array($atts) and isset($is_script) && empty($this->has_run)){
    
    $this->script_atts = $atts;
	      
	      
	  add_filter( 'script_loader_tag', array($this, 'add_attributes'),10,3);
		
		
}
		
    } // end load_file
    
    
}


}


?>