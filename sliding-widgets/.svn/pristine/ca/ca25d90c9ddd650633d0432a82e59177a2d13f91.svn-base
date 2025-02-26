<!-- slider div for top-->
<div id="wpbs_slider">
    <div id="wpbs__cont">
        <div class="widgetcont">
            <?php dynamic_sidebar('Sliding Widget'); ?>
        </div>
    </div>
    <div class="icon_label" id="icon_label">
        <div class="wpbs_handle">
            <?php if ($icon_label != '') echo $icon_label; ?>
        </div>
    </div>    
</div>
<script>
    var wpssclose_ = 0;
    jQuery('#icon_label').click(function () {
        if (wpssclose_ == 1) {
            jQuery('#wpbs_slider').animate({
                top: '-=<?php echo $height; ?>'
            }, 400, function () {
                // Animation complete.
            });
            wpssclose_ = 0;
        } else {
            jQuery('#wpbs_slider').animate({
                top: '+=<?php echo $height; ?>'
            }, 400, function () {
                // Animation complete.
            });
            wpssclose_ = 1;
        }
    });
</script>