<?php
$speed = absint($instance['scroll']['speed']);
$offset = str_replace('px', '' , $instance['scroll']['offset']);
?>

<script type="text/javascript">
(function($) {
    $(document).ready(function(){
        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - <?php echo esc_attr($offset); ?>
                }, <?php echo esc_attr($speed); ?>);
            }
        });
    });
})(jQuery)
</script>
