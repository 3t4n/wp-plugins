<?php
/*
Plugin Name: Limitar Creación de Blogs en Multisite
Plugin URI: https://github.com/ivanpastrana/limitar-blogs-multisite
Description: Impide que un usuario cree más de X blogs en un entorno Multisite. El límite es configurable y se pueden excluir superadministradores.
Version: 1.2
Author: Ivan Pastrana
Author URI: https://github.com/ivanpastrana
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: limitar-blogs
*/

// Evita el acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Añade una página de opciones al panel de administración de la red
function limitar_blogs_agregar_pagina_opciones() {
    add_submenu_page(
        'settings.php',
        __('Límite de Blogs', 'limitar-blogs'),
        __('Límite de Blogs', 'limitar-blogs'),
        'manage_network_options',
        'limitar-blogs',
        'limitar_blogs_pagina_opciones'
    );
}
add_action('network_admin_menu', 'limitar_blogs_agregar_pagina_opciones');

// Página de opciones del plugin
function limitar_blogs_pagina_opciones() {
    if (!current_user_can('manage_network_options')) {
        wp_die(esc_html__('No tienes permisos suficientes para acceder a esta página.', 'limitar-blogs'));
    }

    // Guardar opciones si se ha enviado el formulario
    if (isset($_POST['limitar_blogs_guardar_opciones'])) {
        check_admin_referer('limitar_blogs_opciones');

        // Validar y sanitizar entradas
        $limite_blogs = isset($_POST['limite_blogs']) ? intval($_POST['limite_blogs']) : get_site_option('limitar_blogs_limite', 5);
        $mensaje_error = isset($_POST['mensaje_error']) ? sanitize_text_field(wp_unslash($_POST['mensaje_error'])) : get_site_option('limitar_blogs_mensaje_error', __('Lo siento, no puedes crear más de X blogs.', 'limitar-blogs'));
        $excluir_superadmins = isset($_POST['excluir_superadmins']) ? 1 : 0;

        // Guardar en la base de datos
        update_site_option('limitar_blogs_limite', $limite_blogs);
        update_site_option('limitar_blogs_mensaje_error', $mensaje_error);
        update_site_option('limitar_blogs_excluir_superadmins', $excluir_superadmins);

        echo '<div class="notice notice-success"><p>' . esc_html__('Opciones guardadas correctamente.', 'limitar-blogs') . '</p></div>';
    }

    // Obtener valores guardados
    $limite_blogs = get_site_option('limitar_blogs_limite', 5);
    $mensaje_error = get_site_option('limitar_blogs_mensaje_error', __('Lo siento, no puedes crear más de X blogs.', 'limitar-blogs'));
    $excluir_superadmins = get_site_option('limitar_blogs_excluir_superadmins', 1);

    // Formulario de opciones
    echo '<div class="wrap">';
    echo '<h1>' . esc_html__('Límite de Blogs', 'limitar-blogs') . '</h1>';
    echo '<form method="post" action="">';
    wp_nonce_field('limitar_blogs_opciones');

    echo '<table class="form-table">';
    echo '<tr><th scope="row"><label for="limite_blogs">' . esc_html__('Límite de blogs', 'limitar-blogs') . '</label></th>';
    echo '<td><input name="limite_blogs" type="number" id="limite_blogs" value="' . esc_attr($limite_blogs) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="mensaje_error">' . esc_html__('Mensaje de error', 'limitar-blogs') . '</label></th>';
    echo '<td><input name="mensaje_error" type="text" id="mensaje_error" value="' . esc_attr($mensaje_error) . '" class="regular-text" /></td></tr>';

    echo '<tr><th scope="row"><label for="excluir_superadmins">' . esc_html__('Excluir superadministradores', 'limitar-blogs') . '</label></th>';
    echo '<td><input name="excluir_superadmins" type="checkbox" id="excluir_superadmins" value="1" ' . checked($excluir_superadmins, 1, false) . ' /></td></tr>';
    echo '</table>';

    submit_button(esc_html__('Guardar cambios', 'limitar-blogs'), 'primary', 'limitar_blogs_guardar_opciones');
    echo '</form>';
    echo '</div>';
}

// Función que revisa si un usuario es administrador de demasiados blogs
function limitar_blogs_es_admin_de_demasiados_blogs($user_id) {
    $limite_blogs = get_site_option('limitar_blogs_limite', 5);
    $blogs = get_blogs_of_user($user_id);
    $count = 0;

    foreach ($blogs as $blog) {
        switch_to_blog($blog->userblog_id);
        $user = get_userdata($user_id);
        if ($user && in_array('administrator', $user->roles)) {
            $count++;
        }
        restore_current_blog();

        if ($count >= $limite_blogs) {
            return true;
        }
    }

    return false;
}

// Validación al crear un nuevo blog
function limitar_blogs_validar_creacion_blog($result) {
    $user_id = get_current_user_id();
    $excluir_superadmins = get_site_option('limitar_blogs_excluir_superadmins', 1);

    if ($excluir_superadmins && is_super_admin($user_id)) {
        return $result;
    }

    if (limitar_blogs_es_admin_de_demasiados_blogs($user_id)) {
        $mensaje_error = get_site_option('limitar_blogs_mensaje_error', __('Lo siento, no puedes crear más de X blogs.', 'limitar-blogs'));
        $result['errors']->add('limite_blogs', esc_html($mensaje_error));
    }

    return $result;
}
add_filter('wpmu_validate_blog_signup', 'limitar_blogs_validar_creacion_blog');
