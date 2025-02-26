<?php
/*
Plugin Name: Animate Your Content
Plugin URI: http://www.fides-it.nl/animate-content-plugin
Description: Simple shortcodes for adding animation effects to blocks of content
Version: 1.0.0
Author: Fides
Author URI: http://fides-it.nl
*/

/*  Copyright 2014 Dennis Dam (dennis@fides-it.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define ("ANIMATE_YOUR_CONTENT_VERSION", "1.0.0");
define( 'fidesit_ayc_path', plugin_dir_path(__FILE__) );



class AnimateYourContentPlugin {

    /*--------------------------------------------*
     * Constants
     *--------------------------------------------*/
    const name = 'Animate Your Content';
    const slug = 'anictrl';

    public $nrOfElements=0;
    public $child_count=0;
    public $parent_attrs=array();


    /**
     * Constructor
     */
    function __construct() {
        //Hook up to the init action
        add_action( 'init', array( $this, 'init' ) );
    }

    /**
     * Runs when the plugin is initialized
     */
    public function init() {

        // Load JavaScript and Stylesheets
        $this->register_scripts_and_styles();
        add_shortcode("animation-set", array( $this, 'animationSet'));
        add_shortcode("animation-element", array( $this, 'animationElement'));
        //http://sww.co.nz/solution-to-wordpress-adding-br-and-p-tags-around-shortcodes/
        remove_filter( 'the_content', 'wpautop' );
        add_filter( 'the_content', 'wpautop' , 12);
    }

    /**
     * Registers and enqueues stylesheets for the administration panel and the
     * public facing site.
     */
    private function register_scripts_and_styles() {
        wp_register_script( "gsapTweenMax", 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js');
        wp_enqueue_script( "gsapTweenMax" );

        wp_register_script( "fidesit_ayc", plugins_url("js/ayc.js", __FILE__), array( 'jquery' ) ); //depends on jquery
        wp_enqueue_script( "fidesit_ayc" );
    } // end register_scripts_and_styles

    public function animationSet($args, $content = null) {
        $id = "fidesit_ayc_".sanitize_key($args["id"]);

        $defaults = array(
            'time' => 2.0,
            'type' => "animation-element",
            'delay_increment' => 0
        );
        $this->parent_attrs = wp_parse_args( $args, $defaults );
        $this->child_count=0;

        wp_add_inline_style( $id, "#".$id."{
            display:none;
        }" );

        $result= '<div ayc_type="animation-set" id="'.$id.'">'.do_shortcode($content).'</div>';

        $this->parent_attrs=array();

        return $result;
    }

    public function animationElement($args, $content = null) {

        $this->nrOfElements+=1;

        $defaults = $this->parent_attrs;

        $r = wp_parse_args( $args, $defaults );

        if (!array_key_exists('delay', $r)){
            $r['delay']=((float)$r['delay_increment'])*(float)$this->child_count;
        }
        unset($r['delay_increment']);
        $this->child_count+=1;
        return '
            <div id="ayc_'.$this->nrOfElements.'" ayc_type="animation-element" '.$this->shortcode_args_to_html_attrs($r).'>'.do_shortcode($content).'</div>
        ';
    }

    public function shortcode_args_to_html_attrs($args){
        $final_arr = array();
        foreach ($args as $key=>$value){
            if (in_array($key, array("class", "style"))){
                $final_arr[$key]=$value;
            } else
            if (in_array($key, array("type", "effect","time", "id"))){
                $final_arr["ayc_".$key]=$value;
            } else {
                $final_arr["gsap_".$key]=$value;
            }
        }

        $result="";
        foreach ($final_arr as $key => $value){
            $result.=' '.$key.'="'.$value.'"';
        }

        return $result;
    }


} // end class
new AnimateYourContentPlugin();

?>