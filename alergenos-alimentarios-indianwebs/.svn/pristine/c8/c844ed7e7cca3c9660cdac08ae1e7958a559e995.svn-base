<?php
 /*
Plugin Name: Alergenos Alimentarios IndianWebs
Plugin URI: http://indianwebs.com/plugins
Description: Agrega iconos de alérgenos alimentarios a tus entradas o paginas.
Version: 1.1
Author: Cristopher Quispe
Author URI: http://indianwebs.com/
License: GPLv2 or later
 */
 global $wp_version;
 $exit_msg='El Plugin Alergenos requiere WordPress 3.0 o una version superior. <a href="http://codex.wordpress.org/Upgrading_WordPress">Actualiza WordPress!</a>';
 if (version_compare($wp_version,"3.0","<"))
 {
     exit ($exit_msg);
 }
 function agregar_estilo_tooltip() {

	wp_register_style('estilo', plugins_url('/css/tooltip.css', __FILE__));

	wp_enqueue_style('estilo');

}

add_action( 'wp_enqueue_scripts', 'agregar_estilo_tooltip' );

 // Comprobar que no exista la clase.
 if ( !class_exists('Alergenos_Iconos') ) :
 class Alergenos_Iconos
 {

      // url del plugin
     var $plugin_url;
     var $select_option;
     // WordPress hooks
     function Alergenos_Iconos()
     {
     $this->plugin_url = trailingslashit( WP_PLUGIN_URL.'/'.dirname( plugin_basename(__FILE__) ));
       $this->select_option = get_option('tinyemoopt');
        // agregar scripts action
        add_action('admin_print_scripts-post.php',  array(&$this,'agregar_scripts'));
        add_action('admin_print_scripts-page.php',  array(&$this,'agregar_scripts'));
        add_action('admin_print_scripts-post-new.php',  array(&$this,'agregar_scripts'));
        add_action('admin_print_scripts-page-new.php',  array(&$this,'agregar_scripts'));
        // agregar tinyMCE handlig
        add_action( 'init', array( &$this, 'agregar_a_tinymce' ));
        // admin_menu hook
        add_action('admin_menu', array( &$this, 'alergenos_configuracion' ));
     }

     function agregar_a_tinymce()
 {

 wp_register_script( 'tinyemo', $this->plugin_url.'js/tinymce-emoticons.js' );
 if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
     return;
     if ( get_user_option('rich_editing') == 'true' )
     {
         add_filter( 'mce_external_plugins', array( &$this,'agregar_tinymce_plugin' ) );
         add_filter( 'mce_buttons', array( &$this,'agregar_tinymce_boton' ));
     }
 }

 function agregar_tinymce_plugin( $plugin_array )
    {
        $plugin_array['tinyemo'] = $this->plugin_url.'js/tinyemo-mceplugin.js';
        return $plugin_array;
    }
    function agregar_tinymce_boton( $buttons )
    {
        array_push( $buttons, "separator", 'btnTinyEmo' );
        return $buttons;
    }

     function install()
     {

     }


     function alergenos_configuracion() {
$plugin_hook = add_submenu_page('options-general.php','Alérgenos Aliment.','Alérgenos Aliment.','administrator','alergenos_configuracion',array( &$this, 'mostrar_configuracion' ));
add_action('admin_print_scripts-' . $plugin_hook, array(&$this,'agregar_scripts'));
}

function mostrar_configuracion() {
$html = '<style>#tinyemo-options a.active img{border: 4px solid #21759b;;}</style><div class="wrap"><form action="options.php" method="post" name="options" id="tinyemo-options">';
$this->select_option = 'familia-1';
$this->select_option = get_option('tinyemoopt');
$html .= '<h2>Configuración de iconos de alérgenos alimentarios</h2>
<p>Activa la familia de iconos que deseas insertar.</p>
' . wp_nonce_field('update-options') . '
<table class="form-table" width="100%" cellpadding="10">
<tbody>
<tr>
<td scope="row" align="left" style="width: 26%; vertical-align: top;">';
if($this->select_option == 'familia-1')
$html .= '<a href="#" class="active" title="familia-1 emoticons" alt="familia-1"><img src="'.$this->plugin_url.'images/familia-1.jpg" /></a>';
else
$html .= '<a href="#" title="familia-1 emoticons" alt="familia-1"><img src="'.$this->plugin_url.'images/familia-1.jpg" /></a>';
$html .= '</td>
<td scope="row" align="left" style="width: 28%; vertical-align: top;">';
if($this->select_option == 'familia-2')
$html .= '<a href="#" class="active" title="familia-2 emoticons" alt="familia-2"><img src="'.$this->plugin_url.'images/familia-2.jpg" /></a>';
else
$html .= '<a href="#" title="familia-2 emoticons" alt="familia-2"><img src="'.$this->plugin_url.'images/familia-2.jpg" /></a>';
$html .= '</td>
<td scope="row" align="left" style="vertical-align: top;">';
if($this->select_option == 'familia-3')
$html .= '<a href="#" class="active" title="familia-3 emoticons" alt="familia-3"><img src="'.$this->plugin_url.'images/familia-3.jpg" /></a>';
else
$html .= '<a href="#" title="familia-3 emoticons" alt="familia-3"><img src="'.$this->plugin_url.'images/familia-3.jpg" /></a>';
$html .= '</td>

</tr>
<tr>

<td scope="row" align="left" style="vertical-align: top;">';
if($this->select_option == 'familia-4')
$html .= '<a href="#" class="active" title="familia-4 emoticons" alt="familia-4"><img src="'.$this->plugin_url.'images/familia-4.jpg" /></a>';
else
$html .= '<a href="#" title="familia-4 emoticons" alt="familia-4"><img src="'.$this->plugin_url.'images/familia-4.jpg" /></a>';
$html .= '</td>

<td scope="row" align="left" style="vertical-align: top;">';
if($this->select_option == 'familia-5')
$html .= '<a href="#" class="active" title="familia-5 emoticons" alt="familia-5"><img src="'.$this->plugin_url.'images/familia-5.jpg" /></a>';
else
$html .= '<a href="#" title="familia-5 emoticons" alt="familia-5"><img src="'.$this->plugin_url.'images/familia-5.jpg" /></a>';
$html .= '</td>

<td scope="row" align="left" style="vertical-align: top;">';
if($this->select_option == 'familia-6')
$html .= '<a href="#" class="active" title="familia-6 emoticons" alt="familia-6"><img src="'.$this->plugin_url.'images/familia-6.jpg" /></a>';
else
$html .= '<a href="#" title="familia-6 emoticons" alt="familia-6"><img src="'.$this->plugin_url.'images/familia-6.jpg" /></a>';
$html .= '</td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="tinyemoopt" id="option-value" value="familia-1" />
<input type="hidden" name="page_options" value="tinyemoopt" />

<input type="submit" name="Submit" value="Guardar" class="button button-primary"/></form>

</div>';

echo $html;

}

 // Agrega los scripts
     function agregar_scripts($hook)
     {

        $nonce=wp_create_nonce('tinyemo-nonce');
        wp_enqueue_script('jquery');
        wp_register_style( 'tinyemo-scroll-style', plugins_url('css/jquery.mCustomScrollbar.css', __FILE__) );
        wp_enqueue_style( 'tinyemo-scroll-style' );

         wp_enqueue_script('tinyemo-scroll', $this->plugin_url.'js/jquery.mCustomScrollbar.concat.min.js', array('jquery'));
         wp_enqueue_script('tinyemo', $this->plugin_url.'js/tinymce-emoticons.js', array('jquery'));
         wp_localize_script('tinyemo', 'tinyEmoSettings',array('tinyEmo_url' => $this->plugin_url, 'select_option' => $this->select_option, 'nonce' => $nonce));
     }
    }

    endif;

 if ( class_exists('Alergenos_Iconos') ) :
     $Alergenos_Iconos = new Alergenos_Iconos();
     if (isset($Alergenos_Iconos))
     {
         register_activation_hook( __FILE__,array(&$Alergenos_Iconos, 'install') );
     }
 endif;
 ?>