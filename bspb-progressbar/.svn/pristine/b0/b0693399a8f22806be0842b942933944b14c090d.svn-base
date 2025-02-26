<?php
// We'll be outputting CSS
header('Content-type: text/css');

$settings = BSPB_Plugin()->options['settings'];
$animation = BSPB_Plugin()->options['animation'];
	$type = $settings['script'];
	$overlay_opacity_bar = $settings['overlay_opacity_bar'];
	$animate_opacity_bar_speeds = $animation['animate_opacity_bar_speeds'];
//['background_color'];transparent_background
if($animate_opacity_bar_speeds =='slow'){$animate_opacity_bar_speeds_seconds = '6s'; }
if($animate_opacity_bar_speeds =='normal'){$animate_opacity_bar_speeds_seconds = '4s'; }
if($animate_opacity_bar_speeds =='fast'){$animate_opacity_bar_speeds_seconds = '2s'; }
	  $configuration = BSPB_Plugin()->options['configuration'][$type];
	  $margin_type_text = $configuration['margin_type_text'];
	  $margin_type_value = $configuration['margin_type_value'];
	  $value_margin_text = $configuration['value_margin_text'];
	  $value_margin_value = $configuration['value_margin_value'];
	  $text_color = $configuration['text_color'];
	 // ['video_max_width'];
//$width = $options_general['width'];
//$height = $options_general['height'];
$width = $configuration['bar_width'];
$height = $configuration['bar_height'];
$angle = $animation['animate_opacity_bar_angles'];
//$angle = '90';
if ($type == 'vertical'){
	//$width = $configuration['bar_width'];
	if (($angle != 90)) {
	?>
.progress-bar.active {
    -webkit-animation: progress-bar-stripes-vertical <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    -o-animation: progress-bar-stripes-vertical <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    animation: progress-bar-stripes-vertical <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
}
<?php
	}
	else{
	?>
.progress-bar.active {
    -webkit-animation: progress-bar-stripes-horizontal <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    -o-animation: progress-bar-stripes-horizontal <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    animation: progress-bar-stripes-horizontal <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
}
<?php
	}
}
if ($type == 'horizontal'){
	//$color_bg = $options_general['color_bg'];
	//$height = $configuration['bar_height'];
	if (($angle != 0)) {
	?>
.progress-bar.active {
    -webkit-animation: progress-bar-stripes-horizontal <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    -o-animation: progress-bar-stripes-horizontal <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    animation: progress-bar-stripes-horizontal <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
}
<?php
	}
	else{
	?>
.progress-bar.active {
    -webkit-animation: progress-bar-stripes-vertical <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    -o-animation: progress-bar-stripes-vertical <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
    animation: progress-bar-stripes-vertical <?php echo $animate_opacity_bar_speeds_seconds; ?> linear infinite !important;
}
<?php
	}
}

if($settings['transparent_background']){
$color_bg = 'transparent';
}
else {
	$color_bg = $settings['background_color'];
	}

$color_bar = $settings['bar_color'];
?>
.progress {
  background-color: <?php echo $color_bg; ?> !important;
}
.progress-bar {
  background-color: <?php echo $color_bar; ?> !important;
}

.progress-bar-vertical {
  width: <?php echo $width; ?>% !important;
  height: <?php echo $height; ?>px !important;
}
.progress-bar-horizontal {
 	width: <?php echo $width; ?>% !important;
 	height: <?php echo $height; ?>px !important;
}
<?php
if($settings['opacity_bar']){
?>
.progress-bar-striped-horizontal {
background-image: linear-gradient(<?php echo $angle; ?>deg,rgba(255,255,255,.<?php echo $overlay_opacity_bar; ?>) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.<?php echo $overlay_opacity_bar; ?>) 50%,rgba(255,255,255,.<?php echo $overlay_opacity_bar; ?>) 75%,transparent 75%,transparent) !important;
    background-size: 40px 40px;
}

.progress-bar-striped-vertical {
background-image: linear-gradient(<?php echo $angle; ?>deg,rgba(255,255,255,.<?php echo $overlay_opacity_bar; ?>) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.<?php echo $overlay_opacity_bar; ?>) 50%,rgba(255,255,255,.<?php echo $overlay_opacity_bar; ?>) 75%,transparent 75%,transparent) !important;
    background-size: 40px 40px;
}
<?php } ?>

.progress {
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
}

.progress-bar-horizontal .title {
/*font-size: 14px;
  font-weight: 400;
  padding-left: 0;*/
  color: <?php echo $text_color; ?>;
}

.progress-bar-horizontal .value {
/*font-size: 14px;
  font-weight: 400;
  padding-left: 0;*/
  color: <?php echo $text_color; ?>;
}

/* TITLE POSITIONS */
/* --------------- */

/* BAR HORIZONTAL */
/* --------------- */
/* Top Left */
.progress-bar-horizontal .title.top-left {
<?php echo $margin_type_text; ?>: <?php echo $value_margin_text; ?>px;
  top: -<?php echo $height/2; ?>px !important;
  left: 0;
}

/* Top Right */
.progress-bar-horizontal .title.top-right {
margin-right: <?php echo $value_margin_text; ?>px;
  top: -<?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Top Center */
.progress-bar-horizontal .title.top-center {
  top: -<?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Bottom Left */
.progress-bar-horizontal .title.bottom-left {
	margin-left: <?php echo $value_margin_text; ?>px;
  bottom: -<?php echo $height/2; ?>px !important;

  left: 0;
}

/* Bottom Right */
.progress-bar-horizontal .title.bottom-right {
  bottom: -<?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Bottom Center */
.progress-bar-horizontal .title.bottom-center {
  bottom: -<?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Inside Left */
.progress-bar-horizontal .title.inside-left {
  top: <?php echo $height/2; ?>px !important;
  left: 0;
}

/* Inside Right */
.progress-bar-horizontal .title.inside-right {
  top: <?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Inside Center */
.progress-bar-horizontal .title.inside-center {
  top: <?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* VALUE POSITIONS */
/* --------------- */
/* Top Left */
.progress-bar-horizontal .value.top-left {
  top: -<?php echo $height/2; ?>px !important;
  left: 0;
}

/* Top Right */
.progress-bar-horizontal .value.top-right {
  top: -<?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Top Center */
.progress-bar-horizontal .value.top-center {
  top: -<?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Bottom Left */
.progress-bar-horizontal .value.bottom-left {
  bottom: -<?php echo $height/2; ?>px !important;
  left: 0;
}

/* Bottom Right */
.progress-bar-horizontal .value.bottom-right {
  bottom: -<?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Bottom Center */
.progress-bar-horizontal .value.bottom-center {
  bottom: -<?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Inside Left */
.progress-bar-horizontal .value.inside-left {
  top: <?php echo $height/2; ?>px !important;
  left: 0;
}

/* Inside Right */
.progress-bar-horizontal .value.inside-right {
  top: <?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Inside Center */
.progress-bar-horizontal .value.inside-center {
  top: <?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* BAR VERTICAL */
/* --------------- */
/* Top Left */
.progress-bar-vertical .title.top-left {
  top: -<?php echo $height/4; ?>px !important;
  left: 0;
}

/* Top Right */
.progress-bar-vertical .title.top-right {
  top: -<?php echo $height/4; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Top Center */
.progress-bar-vertical .title.top-center {
  top: -<?php echo $height/4; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Bottom Left */
.progress-bar-vertical .title.bottom-left {
  bottom:  -<?php echo $height/4; ?>px !important;
  left: 0;
}

/* Bottom Right */
.progress-bar-vertical .title.bottom-right {
  bottom:  -<?php echo $height/4; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Bottom Center */
.progress-bar-vertical .title.bottom-center {
  bottom:  -<?php echo $height/4; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Inside Left */
.progress-bar-vertical .title.inside-left {
  top: <?php echo $height/2; ?>px !important;
  left: 0;
}

/* Inside Right */
.progress-bar-vertical .title.inside-right {
  top: <?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Inside Center */
.progress-bar-vertical .title.inside-center {
  top: <?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* VALUE POSITIONS */
/* --------------- */
/* Top Left */
.progress-bar-vertical .value.top-left {
  top: -<?php echo $height/4; ?>px !important;
  left: 0;
}

/* Top Right */
.progress-bar-vertical .value.top-right {
  top: -<?php echo $height/4; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Top Center */
.progress-bar-vertical .value.top-center {
  top: -<?php echo $height/4; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Bottom Left */
.progress-bar-vertical .value.bottom-left {
  bottom: -<?php echo $height/4; ?>px !important;
  left: 0;
}

/* Bottom Right */
.progress-bar-vertical .value.bottom-right {
  bottom: -<?php echo $height/4; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Bottom Center */
.progress-bar-vertical .value.bottom-center {
  bottom: -<?php echo $height/4; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }

/* Inside Left */
.progress-bar-vertical .value.inside-left {
  top: <?php echo $height/2; ?>px !important;
  left: 0;
}

/* Inside Right */
.progress-bar-vertical .value.inside-right {
  top: <?php echo $height/2; ?>px !important;
  right: 0 !important;
  left: inherit;
  }

/* Inside Center */
.progress-bar-vertical .value.inside-center {
  top: <?php echo $height/2; ?>px !important;
  width: 100%;
  text-align: center;
  /*right: 0 !important;*/
  }




/* Bar animations
 -------------------------
VERTICAL
 WebKit*/
@-webkit-keyframes progress-bar-stripes-vertical {
  from  { background-position: 0px 40px; }
  to    { background-position: 0 0; }
}

/* Spec and IE10+ */
@keyframes progress-bar-stripes-vertical {
  from  { background-position: 0px 40px; }
  to    { background-position: 0 0; }
}

/*HORIZONTAL
 WebKit*/
@-webkit-keyframes progress-bar-stripes-horizontal {
  from  { background-position: 40px 0; }
  to    { background-position: 0 0; }
}

/* Spec and IE10+ */
@keyframes progress-bar-stripes-horizontal {
  from  { background-position: 40px 0; }
  to    { background-position: 0 0; }
}
