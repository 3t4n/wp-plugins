<script type="text/javascript">
    var usr_map_config = {
        'default': {
            'usrbrdrclr': '<?php echo sanitize_hex_color($this->options['usrbrdrclr']) ?>',
            'usrshowvisns': <?php echo esc_attr(isset($this->options['usrshowvisns'])) ? 'true' : 'false' ?>,
            'usrvisns': '<?php echo sanitize_hex_color($this->options['usrvisns']) ?>',
            'usrvisnshover': '<?php echo sanitize_hex_color($this->options['usrvisnshover']) ?>',
            'usrshowlakes': <?php echo esc_attr(isset($this->options['usrshowlakes'])) ? 'true' : 'false' ?>,
            'usrlakesfill': '<?php echo sanitize_hex_color($this->options['usrlakesfill']) ?>',
            'usrshowalaska': <?php echo esc_attr(isset($this->options['usrshowalaska'])) ? 'true' : 'false' ?>,
            'usrshowhawaii': <?php echo esc_attr(isset($this->options['usrshowhawaii'])) ? 'true' : 'false' ?>,
            'usrshowdc': <?php echo esc_attr(isset($this->options['usrshowdc'])) ? 'true' : 'false' ?>,
            'usrcallouts': <?php echo esc_attr(isset($this->options['usrcallouts'])) ? 'true' : 'false' ?>,
        },
    <?php foreach ($this->options['prepared_list'] as $item) { ?>
    'usrmap_<?php echo esc_attr($item['index']) ?>': {
            'hover': '<?php echo str_replace(array("\n", "\r", "\r\n", "'"), array('', '', '', "\'"), wp_kses_post($item['info_'])) ?>',
            'url': '<?php echo sanitize_url($item['url']) ?>',
            'targt': '<?php echo esc_attr($item['turl']) ?>',
            'upclr': '<?php echo sanitize_hex_color($item['upclr']) ?>',
            'ovrclr': '<?php echo sanitize_hex_color($item['ovrclr']) ?>',
            'dwnclr': '<?php echo sanitize_hex_color($item['dwnclr']) ?>',
            'enbl': <?php echo esc_attr($item['enbl']) ? 'true' : 'false' ?>,
            'title': 'usrvn_<?php echo esc_attr($item['index']) ?>'
        },
    <?php } ?>
}
</script>
