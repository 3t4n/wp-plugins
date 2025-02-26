<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_fno_xml_sitemap_video_enable_callback()
{
    $options = get_option('rankology_xml_sitemap_option_name');

    $check = isset($options['rankology_xml_sitemap_video_enable']); ?>


<label for="rankology_xml_sitemap_video_enable">
    <input id="rankology_xml_sitemap_video_enable"
        name="rankology_xml_sitemap_option_name[rankology_xml_sitemap_video_enable]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Enable Video Sitemap', 'wp-rankology'); ?>
</label>


<p class="description">
    <?php esc_html_e('YouTube videos are automatically added when you create / save a post, page or post type.', 'wp-rankology'); ?>
</p>
<p class="description">
    <?php //printf(__('<a href="%s">Regenerate automatic XML Video sitemap for YouTube?</a>', 'wp-rankology'), admin_url('admin.php?page=rankology-import-export#tab=tab_rankology_tool_video')); ?>
</p>

<?php if (isset($options['rankology_xml_sitemap_video_enable'])) {
        esc_attr($options['rankology_xml_sitemap_video_enable']);
    }
}
