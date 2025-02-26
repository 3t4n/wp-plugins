<?php
/*
Plugin Name: Optimizador SEO de Atributos Alt y Title para Imágenes
Plugin URI: https://webprowp.com/optimizador-seo-alt-title/
Description: Optimiza automáticamente los atributos alt y title de las imágenes para mejorar el SEO y la accesibilidad, incluyendo imágenes destacadas.
Version: 3.5
Author: WebProWP
Author URI: https://webprowp.com
Text Domain: optimizador-seo-de-atributos-alt-y-title-para-imagenes
Domain Path: /languages
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Evitar el acceso directo al archivo
if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

// Cargar el dominio de texto para traducciones
add_action('plugins_loaded', 'seo_optimizer_load_textdomain');
function seo_optimizer_load_textdomain() {
    load_plugin_textdomain('optimizador-seo-de-atributos-alt-y-title-para-imagenes', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

// Registrar hook de activación para establecer opciones predeterminadas
register_activation_hook(__FILE__, 'seo_optimizer_plugin_activate');
function seo_optimizer_plugin_activate() {
    // Solo agregar opciones si no existen
    $options = [
        'seo_optimizer_enable_function' => 'no',
        'seo_optimizer_attribute_option' => 'page_title_and_focus_keyword',
        'seo_optimizer_preserve_existing_attributes' => 'no',
        'seo_optimizer_custom_template' => '',
        'seo_optimizer_replace_hyphens' => 'yes',
        'seo_optimizer_replace_underscores' => 'yes',
        'seo_optimizer_replace_periods' => 'yes',
        'seo_optimizer_replace_commas' => 'yes',
        'seo_optimizer_replace_numbers' => 'yes',
        'seo_optimizer_text_case_option' => 'none',
        'seo_optimizer_modify_featured_image' => 'yes',
    ];

    foreach ($options as $key => $value) {
        if (!get_option($key)) {
            add_option($key, $value);            
        }
    }    
}

// Registrar hook de desactivación para limpiar opciones (Opcional: Puedes comentar esto si prefieres mantener las opciones al desactivar)
register_deactivation_hook(__FILE__, 'seo_optimizer_plugin_deactivate');
function seo_optimizer_plugin_deactivate() {
    // Si prefieres mantener las opciones al desactivar, comenta o elimina las siguientes líneas
    /*
    $options = [
        'seo_optimizer_enable_function',
        'seo_optimizer_attribute_option',
        'seo_optimizer_preserve_existing_attributes',
        'seo_optimizer_custom_template',
        'seo_optimizer_replace_hyphens',
        'seo_optimizer_replace_underscores',
        'seo_optimizer_replace_periods',
        'seo_optimizer_replace_commas',
        'seo_optimizer_replace_numbers',
        'seo_optimizer_text_case_option',
        'seo_optimizer_modify_featured_image',
    ];

    foreach ($options as $key) {
        delete_option($key);
        error_log("SEO Optimizer: Opción '$key' eliminada.");
    }
    */    
}

// Registrar hook de desinstalación para limpiar opciones
register_uninstall_hook(__FILE__, 'seo_optimizer_plugin_uninstall');
function seo_optimizer_plugin_uninstall() {
    $options = [
        'seo_optimizer_enable_function',
        'seo_optimizer_attribute_option',
        'seo_optimizer_preserve_existing_attributes',
        'seo_optimizer_custom_template',
        'seo_optimizer_replace_hyphens',
        'seo_optimizer_replace_underscores',
        'seo_optimizer_replace_periods',
        'seo_optimizer_replace_commas',
        'seo_optimizer_replace_numbers',
        'seo_optimizer_text_case_option',
        'seo_optimizer_modify_featured_image',
    ];

    foreach ($options as $key) {
        delete_option($key);        
    }    
}

// Añadir página de configuración al menú de administración
add_action('admin_menu', 'seo_optimizer_add_admin_menu');
function seo_optimizer_add_admin_menu() {
    add_options_page(
        __('Optimizador SEO de Atributos Alt y Title para Imágenes', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        __('Optimizador SEO Alt y Title', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        'manage_options',
        'seo_optimizer_settings',
        'seo_optimizer_options_page'
    );    
}

// Registrar ajustes
add_action('admin_init', 'seo_optimizer_settings_init');
function seo_optimizer_settings_init() {
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_enable_function', 'sanitize_text_field');
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_attribute_option', 'sanitize_text_field');
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_preserve_existing_attributes', 'sanitize_text_field');
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_custom_template', 'sanitize_textarea_field');
    // Registrar opciones de filtrado de nombres de archivo
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_replace_hyphens', 'sanitize_text_field');
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_replace_underscores', 'sanitize_text_field');
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_replace_periods', 'sanitize_text_field');
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_replace_commas', 'sanitize_text_field');
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_replace_numbers', 'sanitize_text_field');
    // Registrar opción de formato de texto
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_text_case_option', 'sanitize_text_field');
    // Registrar opción para modificar imagen destacada
    register_setting('seo_optimizer_settings_group', 'seo_optimizer_modify_featured_image', 'sanitize_text_field');

    add_settings_section(
        'seo_optimizer_settings_section',
        __('Configuración del Plugin', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        'seo_optimizer_settings_section_callback',
        'seo_optimizer_settings'
    );

    add_settings_field(
        'seo_optimizer_enable_function',
        __('Habilitar Función', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        'seo_optimizer_enable_function_render',
        'seo_optimizer_settings',
        'seo_optimizer_settings_section'
    );

    add_settings_field(
        'seo_optimizer_attribute_option',
        __('Opciones de Atributo de Imagen', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        'seo_optimizer_attribute_option_render',
        'seo_optimizer_settings',
        'seo_optimizer_settings_section'
    );

    // Campo de plantilla personalizada
    add_settings_field(
        'seo_optimizer_custom_template',
        '',
        'seo_optimizer_custom_template_render',
        'seo_optimizer_settings',
        'seo_optimizer_settings_section'
    );

    // Campos de filtrado de nombres de archivo
    add_settings_field(
        'seo_optimizer_filename_filters',
        '',
        'seo_optimizer_filename_filters_render',
        'seo_optimizer_settings',
        'seo_optimizer_settings_section'
    );

    // Campo de opción de formato de texto
    add_settings_field(
        'seo_optimizer_text_case_option',
        __('Formato de Texto', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        'seo_optimizer_text_case_option_render',
        'seo_optimizer_settings',
        'seo_optimizer_settings_section'
    );

    add_settings_field(
        'seo_optimizer_preserve_existing_attributes',
        __('Conservar Atributos Existentes', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        'seo_optimizer_preserve_existing_attributes_render',
        'seo_optimizer_settings',
        'seo_optimizer_settings_section'
    );

    // Campo para modificar imagen destacada
    add_settings_field(
        'seo_optimizer_modify_featured_image',
        __('Modificar Imagen Destacada', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'),
        'seo_optimizer_modify_featured_image_render',
        'seo_optimizer_settings',
        'seo_optimizer_settings_section'
    );   
}

// Encolar scripts y estilos de administración
add_action('admin_enqueue_scripts', 'seo_optimizer_enqueue_admin_scripts');
function seo_optimizer_enqueue_admin_scripts($hook) {
    // Verificar si estamos en la página de configuración del plugin
    if ($hook !== 'settings_page_seo_optimizer_settings') {
        return;
    }

    // URL del directorio del plugin
    $plugin_dir = plugin_dir_url(__FILE__);

    // Encolar archivo CSS
    wp_enqueue_style(
        'seo_optimizer_admin_css',
        $plugin_dir . 'assets/css/admin.css',
        array(),
        '1.0.0'
    );

    // Encolar archivo JS
    wp_enqueue_script(
        'seo_optimizer_admin_js',
        $plugin_dir . 'assets/js/admin.js',
        array('jquery'),
        '1.0.0',
        true // Cargar en el footer
    );
}

// Renderizar checkbox para habilitar la función
function seo_optimizer_enable_function_render() {
    $option = get_option('seo_optimizer_enable_function', 'no');
    ?>
    <input type='checkbox' name='seo_optimizer_enable_function' <?php checked($option, 'yes'); ?> value='yes'>
    <label><?php esc_html_e('Habilitar o deshabilitar la modificación automática de los atributos alt y title de las imágenes.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label>
    <?php    
}

// Renderizar opciones de atributo de imagen
function seo_optimizer_attribute_option_render() {
    $option = get_option('seo_optimizer_attribute_option', 'page_title_and_focus_keyword');
    ?>
    <select name="seo_optimizer_attribute_option" id="seo_optimizer_attribute_option">
        <option value="custom_template" <?php selected($option, 'custom_template'); ?>>
            <?php esc_html_e('Plantilla Personalizada', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
        <option value="page_title_and_focus_keyword" <?php selected($option, 'page_title_and_focus_keyword'); ?>>
            <?php esc_html_e('Título de la Página y Palabra Clave de Yoast/Rank Math', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
        <option value="filename" <?php selected($option, 'filename'); ?>>
            <?php esc_html_e('Nombre de Archivo', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
        <option value="page_title" <?php selected($option, 'page_title'); ?>>
            <?php esc_html_e('Título de la Página', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
    </select>
    <p><?php esc_html_e('Selecciona cómo deseas asignar los atributos alt y title de las imágenes.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></p>
    <?php
}

// Renderizar campo de plantilla personalizada
function seo_optimizer_custom_template_render() {
    $template = get_option('seo_optimizer_custom_template');
    ?>
    <div id="seo_optimizer_custom_template_container" style="display: none; margin-top: 20px;">
        <h3><?php esc_html_e('Plantilla Personalizada', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></h3>
        <input type='text' name='seo_optimizer_custom_template' id='seo_optimizer_custom_template' value='<?php echo esc_attr($template); ?>' size='50'>
        <p><?php esc_html_e('Usa etiquetas como %%filename%%, %%posttitle%%, %%sitetitle%%, %%yoastfocuskw%%, %%rankmathfocuskw%% para crear tu plantilla personalizada.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></p>
    </div>
    <?php
}

// Renderizar filtros de nombres de archivo
function seo_optimizer_filename_filters_render() {
    ?>
    <div id="seo_optimizer_filename_filters_container" style="display: none; margin-top: 20px;">
        <h3><?php esc_html_e('Opciones de Filtrado de Nombres de Archivo', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></h3>
        <?php
        $replace_hyphens = get_option('seo_optimizer_replace_hyphens', 'yes');
        $replace_underscores = get_option('seo_optimizer_replace_underscores', 'yes');
        $replace_periods = get_option('seo_optimizer_replace_periods', 'yes');
        $replace_commas = get_option('seo_optimizer_replace_commas', 'yes');
        $replace_numbers = get_option('seo_optimizer_replace_numbers', 'yes');
        ?>
        <input type='checkbox' name='seo_optimizer_replace_hyphens' <?php checked($replace_hyphens, 'yes'); ?> value='yes'>
        <label><?php esc_html_e('Reemplazar guiones (-) por espacios', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label><br>
        <input type='checkbox' name='seo_optimizer_replace_underscores' <?php checked($replace_underscores, 'yes'); ?> value='yes'>
        <label><?php esc_html_e('Reemplazar guiones bajos (_) por espacios', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label><br>
        <input type='checkbox' name='seo_optimizer_replace_periods' <?php checked($replace_periods, 'yes'); ?> value='yes'>
        <label><?php esc_html_e('Reemplazar puntos (.) por espacios', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label><br>
        <input type='checkbox' name='seo_optimizer_replace_commas' <?php checked($replace_commas, 'yes'); ?> value='yes'>
        <label><?php esc_html_e('Reemplazar comas (,) por espacios', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label><br>
        <input type='checkbox' name='seo_optimizer_replace_numbers' <?php checked($replace_numbers, 'yes'); ?> value='yes'>
        <label><?php esc_html_e('Reemplazar todos los números (0-9) por espacios', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label><br>
    </div>
    <?php
}

// Renderizar opción de formato de texto
function seo_optimizer_text_case_option_render() {
    $option = get_option('seo_optimizer_text_case_option', 'none');
    ?>
    <select name="seo_optimizer_text_case_option">
        <option value="none" <?php selected($option, 'none'); ?>>
            <?php esc_html_e('Sin cambios', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
        <option value="uppercase" <?php selected($option, 'uppercase'); ?>>
            <?php esc_html_e('Todas las palabras en mayúsculas', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
        <option value="lowercase" <?php selected($option, 'lowercase'); ?>>
            <?php esc_html_e('Todas las palabras en minúsculas', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
        <option value="ucfirst" <?php selected($option, 'ucfirst'); ?>>
            <?php esc_html_e('Primera letra en mayúscula y el resto en minúsculas', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
        <option value="ucwords" <?php selected($option, 'ucwords'); ?>>
            <?php esc_html_e('Primera letra de cada palabra en mayúscula y el resto en minúsculas', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?>
        </option>
    </select>
    <p><?php esc_html_e('Selecciona cómo deseas formatear el texto de los atributos alt y title.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></p>
    <?php
}

// Renderizar checkbox para conservar atributos existentes (Solo para `alt`)
function seo_optimizer_preserve_existing_attributes_render() {
    $option = get_option('seo_optimizer_preserve_existing_attributes', 'no');
    ?>
    <input type='checkbox' name='seo_optimizer_preserve_existing_attributes' <?php checked($option, 'yes'); ?> value='yes'>
    <label><?php esc_html_e('Conservar los atributos alt existentes y actualizar solo los que falten.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label>
    <?php
}

// Renderizar checkbox para modificar imagen destacada
function seo_optimizer_modify_featured_image_render() {
    $option = get_option('seo_optimizer_modify_featured_image', 'yes');
    ?>
    <input type='checkbox' name='seo_optimizer_modify_featured_image' <?php checked($option, 'yes'); ?> value='yes'>
    <label><?php esc_html_e('Habilitar o deshabilitar la modificación de los atributos alt y title de la imagen destacada.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></label>
    <?php
}

// Callback para la sección de configuración
function seo_optimizer_settings_section_callback() {
    echo '<p>' . esc_html__('Configura las opciones del plugin según tus necesidades.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes') . '</p>';
}

// Página de opciones del plugin
function seo_optimizer_options_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Optimizador SEO de Atributos Alt y Title para Imágenes', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></h1>
        <!-- Aviso de respaldo -->
        <div style="background-color: #ffebe8; border-left: 4px solid #c00; padding: 1em; margin-top: 20px;">
            <p><strong><?php esc_html_e('Advertencia:', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></strong> <?php esc_html_e('Antes de usar este plugin, se recomienda hacer una copia de seguridad de tu base de datos.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></p>
        </div>
        <form action='options.php' method='post' style="margin-top: 20px;">
            <?php
            settings_fields('seo_optimizer_settings_group');
            do_settings_sections('seo_optimizer_settings');
            submit_button();
            ?>
        </form>

        <!-- Sección de versión premium -->
        <h2 style="margin-top: 40px;"><?php esc_html_e('Procesar Todas las Imágenes (Función Premium)', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></h2>
        <p><?php esc_html_e('Esta función te permite actualizar los atributos alt y title de todas las imágenes en la biblioteca de medios de forma masiva. Disponible en la versión Premium.', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></p>
        <a href="https://webprowp.com/optimizador-seo-alt-title/" target="_blank" class="button button-primary"><?php esc_html_e('Obtener la Versión Premium', 'optimizador-seo-de-atributos-alt-y-title-para-imagenes'); ?></a>
    </div>
    <?php
}

// Función para generar el texto de los atributos
function seo_optimizer_generate_attribute_text($attribute_option, $filename, $post_title, $site_title, $yoast_focus_keyword, $rankmath_focus_keyword, $custom_template) {
    $attribute_text = '';
    switch ($attribute_option) {
        case 'custom_template':
            $attribute_text = $custom_template;
            // Reemplazar marcadores de posición con valores
            $attribute_text = str_replace('%%filename%%', $filename, $attribute_text);
            $attribute_text = str_replace('%%posttitle%%', $post_title, $attribute_text);
            $attribute_text = str_replace('%%sitetitle%%', $site_title, $attribute_text);
            $attribute_text = str_replace('%%yoastfocuskw%%', $yoast_focus_keyword, $attribute_text);
            $attribute_text = str_replace('%%rankmathfocuskw%%', $rankmath_focus_keyword, $attribute_text);
            break;
        case 'filename':
            $attribute_text = $filename;

            // Aplicar filtros según las opciones seleccionadas
            if (get_option('seo_optimizer_replace_hyphens', 'yes') === 'yes') {
                $attribute_text = str_replace('-', ' ', $attribute_text);
            }
            if (get_option('seo_optimizer_replace_underscores', 'yes') === 'yes') {
                $attribute_text = str_replace('_', ' ', $attribute_text);
            }
            if (get_option('seo_optimizer_replace_periods', 'yes') === 'yes') {
                $attribute_text = str_replace('.', ' ', $attribute_text);
            }
            if (get_option('seo_optimizer_replace_commas', 'yes') === 'yes') {
                $attribute_text = str_replace(',', ' ', $attribute_text);
            }
            if (get_option('seo_optimizer_replace_numbers', 'yes') === 'yes') {
                $attribute_text = preg_replace('/[0-9]/', ' ', $attribute_text);
            }

            // Eliminar espacios múltiples y recortar
            $attribute_text = preg_replace('/\s+/', ' ', $attribute_text);
            $attribute_text = trim($attribute_text);

            break;
        case 'page_title':
            $attribute_text = $post_title;
            break;
        case 'page_title_and_focus_keyword':
        default:
            $attribute_text = trim($post_title);
            if ($yoast_focus_keyword !== '') {
                $attribute_text .= ' - ' . $yoast_focus_keyword;
            }
            if ($rankmath_focus_keyword !== '') {
                $attribute_text .= ' - ' . $rankmath_focus_keyword;
            }
            break;
    }
   
    return $attribute_text;
}

// Función para aplicar el formato de texto seleccionado
function seo_optimizer_apply_text_format($text) {
    $text_case_option = get_option('seo_optimizer_text_case_option', 'none');
    switch ($text_case_option) {
        case 'uppercase':
            $text = mb_strtoupper($text, 'UTF-8');
            break;
        case 'lowercase':
            $text = mb_strtolower($text, 'UTF-8');
            break;
        case 'ucfirst':
            $text = mb_strtolower($text, 'UTF-8');
            $text = seo_optimizer_mb_ucfirst($text);
            break;
        case 'ucwords':
            $text = mb_strtolower($text, 'UTF-8');
            $text = seo_optimizer_mb_ucwords($text);
            break;
        case 'none':
        default:
            // No se aplican cambios
            break;
    }
    
    return $text;
}

// Funciones multibyte para ucfirst y ucwords
if (!function_exists('seo_optimizer_mb_ucfirst')) {
    function seo_optimizer_mb_ucfirst($string, $encoding = 'UTF-8') {
        $strlen = mb_strlen($string, $encoding);
        if ($strlen === 0) {
            return '';
        }
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}

if (!function_exists('seo_optimizer_mb_ucwords')) {
    function seo_optimizer_mb_ucwords($string, $encoding = 'UTF-8') {
        $words = explode(' ', $string);
        $words = array_map(function($word) use ($encoding) {
            return seo_optimizer_mb_ucfirst($word, $encoding);
        }, $words);
        return implode(' ', $words);
    }
}

// Función para obtener el ID de la imagen a partir de la URL usando caché
function seo_optimizer_get_image_id_by_url($image_url) {
    $image_url = esc_url_raw($image_url);
    // Generar una clave de caché única basada en la URL de la imagen
    $cache_key = 'seo_optimizer_attachment_id_' . md5($image_url);

    // Intentar obtener el ID del adjunto desde la caché
    $attachment_id = wp_cache_get($cache_key, 'seo_optimizer_attachment_ids');

    if (false === $attachment_id) {
        // Si no está en caché, obtener el ID usando la función de WordPress
        $attachment_id = attachment_url_to_postid($image_url);
        // Almacenar en caché para futuras consultas (por ejemplo, durante 1 hora)
        wp_cache_set($cache_key, $attachment_id, 'seo_optimizer_attachment_ids', HOUR_IN_SECONDS);
    }

    if ($attachment_id) {       
        return $attachment_id;
    } else {        
        return null;
    }
}

// Hook en 'the_content' para modificar imágenes en el contenido
add_filter('the_content', 'seo_optimizer_modify_image_alt_title_in_content');
function seo_optimizer_modify_image_alt_title_in_content($content) {
    // Verificar si la función está habilitada
    $is_enabled = get_option('seo_optimizer_enable_function', 'no');
    if ($is_enabled !== 'yes') {        
        return $content;
    }

    // Obtener opciones seleccionadas
    $attribute_option = get_option('seo_optimizer_attribute_option', 'page_title_and_focus_keyword');
    $custom_template = get_option('seo_optimizer_custom_template', '');

    // Obtener ID del post o página actual
    $post_id = get_the_ID();
    if (!$post_id) {
        global $post;
        if (isset($post->ID)) {
            $post_id = $post->ID;
        }
    }

    if (!$post_id) {       
        return $content;
    }

    // Obtener título del post o página
    $post_title = get_the_title($post_id);

    // Obtener título del sitio
    $site_title = get_bloginfo('name');

    // Obtener palabra clave de enfoque de Yoast
    $yoast_focus_keyword = get_post_meta($post_id, '_yoast_wpseo_focuskw', true);
    if (!$yoast_focus_keyword) {
        $yoast_focus_keyword = '';
    }

    // Obtener palabra clave de enfoque de Rank Math
    $rankmath_focus_keyword = get_post_meta($post_id, 'rank_math_focus_keyword', true);
    if (!$rankmath_focus_keyword) {
        $rankmath_focus_keyword = '';
    }
    
    // Usar DOMDocument para procesar el contenido
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
    $images = $dom->getElementsByTagName('img');

    $images_modified = 0;

    foreach ($images as $img) {
        $img_src = $img->getAttribute('src');

        // Obtener ID de la imagen a partir de src
        $attachment_id = seo_optimizer_get_image_id_by_url($img_src);

        if ($attachment_id) {
            // Obtener nombre de archivo con extensión
            $file_path = get_attached_file($attachment_id);
            if ($file_path) {
                $filename_with_ext = basename($file_path);
                // Eliminar extensión de archivo
                $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);

                // Generar texto para atributos basado en la opción seleccionada
                $attribute_text = seo_optimizer_generate_attribute_text($attribute_option, $filename, $post_title, $site_title, $yoast_focus_keyword, $rankmath_focus_keyword, $custom_template);

                // Aplicar formato de texto seleccionado
                $attribute_text = seo_optimizer_apply_text_format($attribute_text);

                // Actualizar texto alt
                if (get_option('seo_optimizer_preserve_existing_attributes', 'no') !== 'yes' || !$img->getAttribute('alt')) {
                    $img->setAttribute('alt', esc_attr($attribute_text));
                    update_post_meta($attachment_id, '_wp_attachment_image_alt', sanitize_text_field($attribute_text));                    
                }

                // Actualizar texto title
                $img->setAttribute('title', esc_attr($attribute_text));
                wp_update_post(array(
                    'ID' => $attachment_id,
                    'post_title' => sanitize_text_field($attribute_text),
                ));                

                $images_modified++;
            }
        }
    }
    
    // Guardar el contenido modificado
    $body = $dom->getElementsByTagName('body')->item(0);
    $new_content = '';
    foreach ($body->childNodes as $child) {
        $new_content .= $dom->saveHTML($child);
    }

    return $new_content;
}

// Modificar atributos de todas las imágenes, incluyendo imágenes destacadas
add_filter('wp_get_attachment_image_attributes', 'seo_optimizer_modify_image_attributes', 10, 3);
function seo_optimizer_modify_image_attributes($attr, $attachment, $size) {
    // Verificar si la función está habilitada
    $is_enabled = get_option('seo_optimizer_enable_function', 'no');
    if ($is_enabled !== 'yes') {        
        return $attr;
    }

    // Obtener opción para modificar imagen destacada
    $modify_featured = get_option('seo_optimizer_modify_featured_image', 'yes');

    // Obtener contexto de la imagen
    $image_context = isset($attr['class']) ? $attr['class'] : '';

    // Si la imagen es destacada y la opción está deshabilitada, no modificarla
    if (strpos($image_context, 'wp-post-image') !== false && $modify_featured !== 'yes') {       
        return $attr;
    }

    // Obtener ID del post actual
    $post_id = get_the_ID();
    if (!$post_id) {
        global $post;
        if (isset($post->ID)) {
            $post_id = $post->ID;
        }
    }
    if (!$post_id) {        
        return $attr;
    }

    // Obtener opciones seleccionadas
    $attribute_option = get_option('seo_optimizer_attribute_option', 'page_title_and_focus_keyword');
    $custom_template = get_option('seo_optimizer_custom_template', '');

    // Obtener título del post
    $post_title = get_the_title($post_id);

    // Obtener título del sitio
    $site_title = get_bloginfo('name');

    // Obtener palabra clave de enfoque de Yoast
    $yoast_focus_keyword = get_post_meta($post_id, '_yoast_wpseo_focuskw', true);
    if (!$yoast_focus_keyword) {
        $yoast_focus_keyword = '';
    }

    // Obtener palabra clave de enfoque de Rank Math
    $rankmath_focus_keyword = get_post_meta($post_id, 'rank_math_focus_keyword', true);
    if (!$rankmath_focus_keyword) {
        $rankmath_focus_keyword = '';
    }

    // Obtener nombre de archivo con extensión
    $file_path = get_attached_file($attachment->ID);
    if ($file_path) {
        $filename_with_ext = basename($file_path);
        // Eliminar extensión de archivo
        $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);

        // Generar texto para atributos basado en la opción seleccionada
        $attribute_text = seo_optimizer_generate_attribute_text($attribute_option, $filename, $post_title, $site_title, $yoast_focus_keyword, $rankmath_focus_keyword, $custom_template);

        // Aplicar formato de texto seleccionado
        $attribute_text = seo_optimizer_apply_text_format($attribute_text);

        // Actualizar texto alt
        if (get_option('seo_optimizer_preserve_existing_attributes', 'no') !== 'yes' || !isset($attr['alt']) || empty($attr['alt'])) {
            $attr['alt'] = esc_attr($attribute_text);
            update_post_meta($attachment->ID, '_wp_attachment_image_alt', sanitize_text_field($attribute_text));            
        }

        // Actualizar texto title
        $attr['title'] = esc_attr($attribute_text);
        wp_update_post(array(
            'ID' => $attachment->ID,
            'post_title' => sanitize_text_field($attribute_text),
        ));        
    } else {
       
    }

    return $attr;
}
?>
