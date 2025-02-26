<?php
/**
 * Countdown size
 * available options are: large, medium, small, xsmall
 */
 $size = 'small';
 /**
 * Position from top for the countdown
 * For this image the default is 120px
 */
 $position = 'style="top: '.'115'.'px"';
?>

<?php $uId = str_replace('wb_countdown_widget-', '', $args['widget_id']); ?>
<?php $JSDateString = $instance['date'].'T'.$instance['hour'].':'.$instance['min'].':'.$instance['sec'].$instance['timezone'];?>
<?php $imageSource = trailingslashit( plugin_dir_url( __FILE__ ) ).'bg-images/'.$instance['background']; ?>
<?php $fitToWidth = $instance['fit-to-width'] ? 'fit-to-width' : ''; ?>
<?php
/**
* Other available themes: countdown, countdown-alt-1
*/
$instance[ 'theme' ] = 'countdown-alt-2';
?>
<?php
    /**
    * This part is because the third style/countdown-alt-2/ wouldn't center
    */

    $clockPosAddon = '';
    if($instance['theme'] == 'countdown-alt-2')
    {
        switch($size)
        {
            case 'large':
                $clockPosAddon = '-cal-lg';
                break;
            case 'medium':
                $clockPosAddon = '-cal-md';
                break;
            case 'small':
                $clockPosAddon = '-cal-sm';
                break;
            case 'xsmall':
                $clockPosAddon = '-cal-xs';
                break;
        }
    }

?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600,700' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Righteous" rel="stylesheet" type="text/css">


<div class="clock-container">
    <div class="image-container <?php echo $fitToWidth; ?>">
        <img class="countdown-image <?php echo $fitToWidth; ?>" src="<?php echo $imageSource; ?>" alt="" >
    </div>
    <div class="clock-position<?php echo $clockPosAddon; ?>" <?php echo $position;?> >
		<div class="alt-<?php echo $uId; ?>"><?php echo $JSDateString; ?></div><!-- UTC -->
	</div>
    <?php if($instance['author']): ?><small><a href="http://www.leiaslibrary.se/episode-vii-countdown-widget/" title="Leia's Library - Get your own Episode VII Countdown here" target="_blank">Countdown by Leia's Library</a></small><?php endif;?>
</div>

<script>
window.jQuery(function ($) {
    "use strict";

    $('.alt-<?php echo $uId; ?>').countDown({
        css_class: '<?php echo $size; ?> <?php echo $instance['style']; ?> <?php echo $instance['theme']; ?>',
        with_seconds:     false,
        separator_days:   ':',
        label_dd:         '<?php echo $instance['title_days']; ?>',
        label_hh:         '<?php echo $instance['title_hours']; ?>',
        label_mm:         '<?php echo $instance['title_minutes']; ?>',
    });

});
</script>
