<script type="text/javascript">(function(c,d){if(!c._7S){var f="initialize identify update track trackLinks evaluate ping showForm".split(" "),a=d.createElement("script"),g="https:"===d.location.protocol?"https:":"http:",e,b=0;c._7S={_:[]};var h=function(a){return function(){this._.push([a,arguments])}};for(;b<8;)e=f[b++],c._7S[e]=h(e);a.type="text/javascript";a.async=!0;a.src=g+"//api.7segments.com/js/7segments-1.1.min.js";d.getElementsByTagName("head")[0].appendChild(a)}})(window,document);

<?php if ( ! $ignore ) : ?>
    _7S.initialize({
        token: '<?php echo esc_js( $settings['api_key'] ); ?>'
    });
<?php endif; ?>

</script>

