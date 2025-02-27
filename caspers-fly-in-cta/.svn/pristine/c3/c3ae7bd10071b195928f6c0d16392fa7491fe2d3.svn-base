<?php
/*
 * CSS Output for BOTTOM Fly-In
 */

	$flyinWidth = get_option('cpcta-width-percent');
    $position = get_option('cpcta-vert-slider-position');
?>

<style>
	.cpcta-flyin{
		position: fixed;
		bottom: 0;
		width: <?php echo $flyinWidth; ?>%;
		<?php 
		if($position == 'center'){
			echo "left: 50%;";
			echo "transform: translate(-50%);";
			echo "-webkit-transform: translate(-50%);"; // for safari
		} else if($position == 'left'){
			echo "left: 0;";	
		} else if($position == 'right'){
			echo "right: 0;";
		} ?>			
		min-width: 300px;
		z-index: <?php echo get_option('cpcta-zindex'); ?>
	}
	.cpcta-top-bar{
		color: <?php echo get_option('cpcta-top-bar-font-color'); ?>;
		background: <?php echo get_option('cpcta-top-bar-bkg-color'); ?>;
		text-align: center;
		<?php if($position != 'left') {echo "border-top-left-radius: 5px;"; } ?>
		<?php if($position != 'right') {echo "border-top-right-radius: 5px;"; } ?>
		padding: 0.5rem 0;
		font-size: 16px;
		font-weight: bold;
		cursor: pointer;
        position: relative;
	}
	.cpcta-close {    
      display: none;
      position: absolute;
      top: 15%;
      right: 2%;
      width: 24px;
      height: 24px;
      transition: 0.3s;
    }
    .slidOut .cpcta-close {
      display: block;
    }
    .cpcta-close:hover {
      transform: rotate(90deg);
    }
    .cpcta-close::before, .cpcta-close::after {
      content: '';
      position: absolute;
      height: 2px;
      width: 100%;
      top: 50%;
      right: 0;
      background: <?php echo get_option('cpcta-top-bar-font-color') ?>;
    }
    .cpcta-close::before {
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      -o-transform: rotate(45deg);
      transform: rotate(45deg);
    }
    .cpcta-close::after {
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }
	.cpcta-flyin .cpcta-content-panel{
		display: none;
		color: <?php echo get_option('cpcta-body-content-font-color'); ?>;
		background: <?php echo get_option('cpcta-body-content-bkg-color'); ?>;
		padding: 10px 20px 30px 20px;
		box-sizing: border-box;
	}
    .cpcta-flyin > .cpcta-content-panel {
        overflow: auto;
    }   
	.cpcta-flyin .cpcta-content-panel a{
		color: #000;
	}
	
	/* TABLET RESPONSIVENESS */
    @media screen and (max-width: 980px){
        <?php $flyinWidth = $flyinWidth + ($flyinWidth * .4); ?>
        .cpcta-flyin { width: <?php echo $flyinWidth; ?>%	}
    }
	
	/* MOBILE RESPONSIVENESS */
	@media screen and (max-width: 480px){
		.cpcta-flyin { width: 100%;	}
        .cpcta-close { display: none; }
	}
	
	/* USER-SET RESPONSIVE HIDDEN */
	<?php if(get_option('cpcta-mobile-hidden')) { $mobileWidth = get_option('cpcta-mobile-width'); ?>
	@media screen and (max-width: <?php echo $mobileWidth . "px"; ?>){
		.cpcta-flyin {
			display: none;
		}
	}
	<?php } ?>
</style>