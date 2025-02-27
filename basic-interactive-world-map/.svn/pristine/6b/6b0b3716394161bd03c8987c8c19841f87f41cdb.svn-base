<script type="text/javascript">
    var wd_map_config = {
        'default': {
            'wdbrdrclr': '<?php echo sanitize_hex_color($this->options['wdbrdrclr']) ?>',
            'wdshowvisns': <?php echo esc_attr(isset($this->options['wdshowvisns'])) ? 'true' : 'false' ?>,
            'wdvisns': '<?php echo sanitize_hex_color($this->options['wdvisns']) ?>',
            'wdvisnshover': '<?php echo sanitize_hex_color($this->options['wdvisnshover']) ?>',
        },
    <?php foreach ($this->options['prepared_list'] as $item) { ?>
    'wdmap_<?php echo esc_attr($item['index']) ?>': {
            'hover': '<?php echo str_replace(array("\n", "\r", "\r\n", "'"), array('', '', '', "\'"), wp_kses_post($item['info_'])) ?>',
            'url': '<?php echo sanitize_url($item['url']) ?>',
            'targt': '<?php echo esc_attr($item['turl']) ?>',
            'upclr': '<?php echo sanitize_hex_color($item['upclr']) ?>',
            'ovrclr': '<?php echo sanitize_hex_color($item['ovrclr']) ?>',
            'dwnclr': '<?php echo sanitize_hex_color($item['dwnclr']) ?>',
            'enbl': <?php echo esc_attr($item['enbl']) ? 'true' : 'false' ?>,
            'title': 'wdvn_<?php echo esc_attr($item['index']) ?>'
        },
    <?php } ?>
}
</script>
