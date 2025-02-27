<?php

// Add the code in the theme footer
add_action('wp_footer', 'mostra_valori_opzioni_footer');


// Function to insert CSS codes into the <head> tag
function css_js_head_front_developress() {
    $custom_css = get_option('custom_css');
    if (!empty($custom_css)) {

        echo '<style type="text/css">' . $custom_css . '</style>';
    }
  
    $plugin_url = plugin_dir_url( __FILE__ );
    $visibility = get_option('visibility');

    switch ($visibility) {
      case "everywhere":
      echo "";
      break;
      case "desktop":
      wp_enqueue_style( 'plugin-style', $plugin_url . 'css/only_desktop.css' );
      break;
      case "tablet":
      wp_enqueue_style( 'plugin-style', $plugin_url . 'css/only_tablet.css' );
      break;
      case "phone":
      wp_enqueue_style( 'plugin-style', $plugin_url . 'css/only_phone.css' );
      break;
      case "phone_tablet":
      wp_enqueue_style( 'plugin-style', $plugin_url . 'css/only_phone_tablet.css' );
      break;
      default:
      echo "";
      break;
  }

}
add_action('wp_head', 'css_js_head_front_developress', 100);


// Link to settings page from plugins screen
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );
function add_action_links ( $links ) {
	$mylinks = array(
		'<a href="' . admin_url( 'options-general.php?page=stickybar-settings' ) . '">Settings</a>',
	);
	return array_merge( $links, $mylinks );
}



// CSS and JS management

function developress_enqueue_scripts_js_frontend() {
    wp_enqueue_script( 'js_frontend_developress', plugin_dir_url( __FILE__ ) . 'js/js-frontend.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'developress_enqueue_scripts_js_frontend' );

function developress_enqueue_scripts_js_backend() {
    wp_enqueue_script( 'js_frontend_developress', plugin_dir_url( __FILE__ ) . 'js/js-backend.js', array(), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'developress_enqueue_scripts_js_backend' );

function developress_enqueue_scripts_css_backend() {
    wp_enqueue_style( 'css_frontend_developress', plugin_dir_url( __FILE__ ) . 'css/css-backend.css', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'developress_enqueue_scripts_css_backend' );

function developress_enqueue_scripts_css_frontend() {
    wp_enqueue_style( 'css_frontend_developress', plugin_dir_url( __FILE__ ) . 'css/css-frontend.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'developress_enqueue_scripts_css_frontend' );


function developress_enqueue_fontawasome_css_frontend() {
    wp_enqueue_style( 'font_awesome_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3' );
}
add_action( 'wp_enqueue_scripts', 'developress_enqueue_fontawasome_css_frontend' );

function developress_enqueue_fontawasome_css_backend() {
    wp_enqueue_style( 'font_awesome_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3' );
}
add_action( 'admin_enqueue_scripts', 'developress_enqueue_fontawasome_css_backend' );

function developress_enqueue_bootstrap_css() {
    // Verifica se siamo nella pagina delle impostazioni del tuo plugin
    if (isset($_GET['page']) && $_GET['page'] === 'stickybar-settings') {
        // Carica il file CSS di Bootstrap solo nella pagina delle impostazioni del tuo plugin
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    }
}
add_action( 'admin_enqueue_scripts', 'developress_enqueue_bootstrap_css' );

function developress_enqueue_popper_js() {
    // Verifica se siamo nella pagina delle impostazioni del tuo plugin
    if (isset($_GET['page']) && $_GET['page'] === 'stickybar-settings') {
        // Carica il file JavaScript di Popper solo nella pagina delle impostazioni del tuo plugin
        wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), false, true);
    }
}
add_action( 'admin_enqueue_scripts', 'developress_enqueue_popper_js' );

function developress_enqueue_bootstrap_js() {
    // Verifica se siamo nella pagina delle impostazioni del tuo plugin
    if (isset($_GET['page']) && $_GET['page'] === 'stickybar-settings') {
        // Carica il file JavaScript di Bootstrap solo nella pagina delle impostazioni del tuo plugin
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js', array('jquery', 'popper-js'), false, true);
    }
}
add_action( 'admin_enqueue_scripts', 'developress_enqueue_bootstrap_js' );

function developress_enqueue_backend_select2_scripts() {

    // Enqueue Select2 CSS
    wp_enqueue_style('select2_css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), '4.0.13');

    // Enqueue Select2 JS
    wp_enqueue_script('select2_js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);

    // Enqueue your custom JS for Select2 initialization
    wp_enqueue_script('custom_select2_init', plugin_dir_url(__FILE__) . 'js/custom-select2.js', array('jquery', 'select2_js'), null, true);

}
add_action('admin_enqueue_scripts', 'developress_enqueue_backend_select2_scripts');