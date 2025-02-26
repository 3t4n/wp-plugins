<?php function toast_perc_builder($atts){ ?>
<?php ob_start(); ?>

<?php $width = $atts['width']; ?>
<?php $percentage = $atts['percentage']; ?>
<?php $color = $atts['color']; ?>
<?php $outline_path = $atts['outline_path']; ?>
<?php $stroke_width = $atts['line_width']; ?>
<?php $speed = $atts['speed']; ?>
<?php $delay = $atts['delay']; ?>

<?php 
if($stroke_width == 'thin'): $stroke_width = 1;
elseif($stroke_width == 'medium'):$stroke_width = 2;
elseif($stroke_width == 'thick'):$stroke_width = 3;
endif; ?>

<div class="toast-percentage" data-amount="<?php echo $percentage; ?>" data-speed="<?php echo $speed; ?>" data-delay="<?php echo $delay; ?>" style="width:<?php echo $width; ?>">

<?php if($outline_path == 'true'): ?>
<svg viewBox="0 0 36 36" class="outline-path">
  <path class="outline-path-circle" stroke-dasharray="100, 100" stroke-width="<?php echo $stroke_width; ?>" stroke="url(#g1)" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831"></path>

<defs>
   <radialGradient id="g1" cx="50%" cy="50%" r="53%">
            <stop stop-color="rgba(0,0,0,.25)" offset="80%"></stop>
            <stop stop-color="rgba(0,0,0,0.03)" offset="90%"></stop>
            <stop stop-color="rgba(0,0,0,0.03)" offset="90%"></stop>
            <stop stop-color="rgba(0,0,0,0.0675)" offset="100%"></stop>
        </radialGradient>
 </defs>
</svg>

<?php endif; ?>

<svg viewBox="0 0 36 36" class="percentage-svg">
  <path class="percentage-circle"
    stroke-dasharray="0, 100"
    stroke="<?php echo $color; ?>"
    stroke-width="<?php echo $stroke_width; ?>"
    style="transition:<?php echo $speed; ?>ms;"
    d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831"
  />
</svg>

<div class="percentage-number" style="color:<?php echo $color; ?>">0%</div>

</div>





<?php return ob_get_clean(); ?>
<?php } ?>
<?php add_shortcode('toast_percentage', 'toast_perc_builder'); ?>
<?php function toast_stat_builder($atts){ ?>
<?php ob_start(); ?>

<?php $color = $atts['color']; ?>
<?php $number = $atts['number']; ?>
<?php $speed = $atts['speed']; ?>
<?php $delay = $atts['delay']; ?>

<div class="toast-count-to-number" style="color:<?php echo $color; ?>" data-speed="<?php echo $speed; ?>" data-delay="<?php echo $delay; ?>"><?php echo $number; ?></div>


<?php return ob_get_clean(); ?>
<?php } ?>
<?php add_shortcode('toast_counter', 'toast_stat_builder'); ?>