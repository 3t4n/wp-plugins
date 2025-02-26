<?php
/* 
 * Plugin Name: Gfycat Embed
 * Description: Adds Media Embed support for Gfycat URLs, check settings > Media for options
 * Author: Raymond Selzer
 * Author URI: http://www.interslicedesigns.com
 * Plugin Version 1.0
 */

class Gfycat_Embed {
    
    var $options = array(
      'gfycat_autoplay' => 1,
      'gfycat_loop' => 1,
      'gfycat_max_width' => 702
    );
    
    function __construct()
    {
        add_action('init',array($this,'init'));
        add_action('admin_init',array($this,'admin_init'));
    }
    
    function admin_init()
    {
        foreach($this->options as $name=>$val)
        {
            register_setting('gfycat-settings', $name);
            
            if(get_option($name) === FALSE)
            {
                add_option($name,$val);
            }
        }
        
        if(isset($_POST['option_page']) && $_POST['option_page'] == 'media')
        {
            //new dBug($_POST);
            
            if(isset($_POST['gfycat_autoplay']))
            {
                update_option('gfycat_autoplay', 1);
            }
            else
            {
                update_option('gfycat_autoplay', 0);
            }
            
            if(isset($_POST['gfycat_loop']))
            {
                update_option('gfycat_loop', 1);
            }
            else
            {
                update_option('gfycat_loop', 0);
            }
            
            update_option('gfycat_max_width', $_POST['gfycat_max_width']);
        }

        add_settings_section('gfycat', 'Gfycat Embed Settings', array($this,'settings_section'), 'media');
        add_settings_field('gfycat-autoplay', 'Autoplay Gfycats', array($this,'autoplay_html'), 'media','gfycat');
        add_settings_field('gfycat-loop', 'Loop Gfycats', array($this,'loop_html'), 'media','gfycat');
        add_settings_field('gfycat-max-width', 'Max Gfycat Width', array($this,'max_width_html'), 'media','gfycat');
    }
    
    function max_width_html()
    {
        $option = get_option('gfycat_max_width');
        
        if($option === FALSE)
        {
            $option = $this->options['gfycat_max_width'];
        }
        
        echo '<input type="text" value="' . $option . '" name="gfycat_max_width" />';
    }
    
    function loop_html()
    {
        $option = get_option('gfycat_loop');
        
        if($option !== FALSE)
        {
            $option = intval($option) == $this->options['gfycat_loop'];
        }
        
        echo '<input type="checkbox" name="gfycat_loop" ' . checked($option, true, false) . ' />';
    }
    
    function autoplay_html()
    {
        $option = get_option('gfycat_autoplay');
        
        if($option !== FALSE)
        {
            $option = intval($option) == $this->options['gfycat_autoplay'];
        }
        
        echo '<input type="checkbox" name="gfycat_autoplay" ' . checked($option, true, false) . ' />';
    }
    
    function settings_section()
    {
        
    }
    
    function init()
    {
        add_action('wp_enqueue_scripts',array($this,'add_js'));
        wp_embed_register_handler('gfycat', '#http(s)?://(www\.)?gfycat.com/(.*)#i', array($this,'embed_gfycat_api'));
    }

    function add_js()
    {
        wp_enqueue_style('gfycat-embed-css',  plugins_url('gfycat-embed.css', __FILE__));
        wp_enqueue_script('jquery');
        wp_enqueue_script('gfycat-embed',  plugins_url('gfycat-embed.js', __FILE__));
    }
    public function embed_gfycat_api($matches)
    {
        $id = $matches[3];
        
        $url = 'http://gfycat.com/cajax/get/' . $id;
        $json_resp = wp_remote_get($url);
        
        $json = json_decode($json_resp['body']);
        
        $gfy = $json->gfyItem;
        
        $max_width = get_option('gfycat_max_width');
        $o_width = $gfy->width;
        $o_height = $gfy->height;
        $ratio = $o_height / $o_width;
        $width = $o_width > $max_width ? $max_width : $o_width;
        $height = $o_width > $max_width ? round($max_width * $ratio) : $o_height;
        
        $should_autoplay = intval(get_option('gfycat_autoplay')) == 1;
        $should_loop = intval(get_option('gfycat_loop')) == 1;
        
        $autoplay_html = $should_autoplay ? ' autoplay=""' : '';
        $loop_html = $should_loop ? ' loop=""' : '';
        
        $html = '<div class="gfycat-embed_shell"><video class="gfycat-embed_video" width="' . $width . '" height="' . $height . '"' . $autoplay_html . ' ' . $loop_html . ' muted="muted" style="display: block;" poster="//thumbs.gfycat.com/' . $id . '-poster.jpg">

            <source id="webmsource" src="' . $gfy->webmUrl . '" type="video/webm">
            <source id="mp4source" src="' . $gfy->mp4Url . '" type="video/mp4">
            View the gif directly: <a href="' . $gfy->gifUrl . '">' . $gfy->gifUrl . '</a>. 
        </video></div>';
        
        return $html;
    }
}

$gfycat = new Gfycat_Embed();