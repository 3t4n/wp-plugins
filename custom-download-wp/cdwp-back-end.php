<?php
// Добавляем шорткод "download"
add_shortcode('download', 'cdwp_download_shortcode');

if (!function_exists('cdwp_download_shortcode'))
{
    function cdwp_download_shortcode($cdwp_atts)
    {
        // Атрибуты шорткода
        $cdwp_atts = shortcode_atts(array(
            'id' => '',
            'href' => '',
            'title' => '',
            'type' => 'doc',
            'size' => '',
            'parent' => '',
            'h3' => 'no',
        ) , $cdwp_atts, 'download');

    $dwn_id = $cdwp_atts['id']; // ID файла
    $href = $cdwp_atts['href']; // Ссылка на файл
    $title = $cdwp_atts['title']; // Название файла
    $type = $cdwp_atts['type']; // Формат файла
    $size = $cdwp_atts['size']; // Размер файла
    $parent = $cdwp_atts['parent']; // Ссылка на родительскую статью файла
    $h3 = $cdwp_atts['h3']; // Обернуть название файла в H3 (yes/no)

    if ($dwn_id)
    { // Если есть id то выводим все данные на автомате
        $href = wp_get_attachment_url($dwn_id);
        $title = get_the_title($dwn_id);
        $size = size_format(filesize(get_attached_file($dwn_id)) , 2);
    }

    if ($parent) $title = "<a href=" . $parent . ">" . $title . "</a>"; // Обёртываем название файла в ссылку
    if ($h3 == "yes") $title = '<h3>' . $title . '</h3>'; // Обёртываем название файла в H3
    if($size) $p_size = '<p class="download-file-size">Размер: '.$size.'</p>'; // temp

    // Удаляем слово "скачать" из названия файла
    $title_replace = array(
        'Скачать' => '',
        'образец' => 'Образец'
    );

    $title = str_replace(array_keys($title_replace) , $title_replace, $title);

    // Выводим результат шорткода
$output = <<<HTML
<div class="download {$type}">
    <div class="download-icon"></div>
    <div class="download-info">
        <div class="download-file-name">{$title}</div>
        {$p_size}
    </div>
    <div class="download-button-area">
        <a href="{$href}" class="download-button" target="_blank" rel="noopener noreferrer nofollow">Скачать</a>
    </div>

</div>
HTML;
    

    return $output;
}}

// Добавляем шорткод в произвольные поля файлов
function cdwp_custom_field($form_fields, $post)
{

    $form_fields['download-shorcode-filed'] = array(
        'label' => __('Шорт код') ,
        'input' => 'html',
        'html' => '<input type="text" id="attachment-details-two-column-copy-link" value="[download id=&#34;' . $post->ID . '&#34;]" readonly="">',
    );
    return $form_fields;
}

add_filter('attachment_fields_to_edit', 'cdwp_custom_field', null, 2);

// Выводим кнопку "Добавить файл" над редактором
if (get_option('cdwp_media_button') == 0)
{

    add_action('wp_enqueue_media', 'cdwp_media_button_js_file');
    function cdwp_media_button_js_file()
    {
        wp_enqueue_script('media_button', plugin_dir_url(__FILE__) . 'js/cdwp_media_button.js', array(
            'jquery'
        ) , '1.0', true);
    }

    add_action('media_buttons', 'cdwp_media_button');
    function cdwp_media_button()
    {
        echo '<a href="#" id="insert-cdwp-media" class="button">Добавить файл</a>';
    }

}

