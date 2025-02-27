<?php
/*
 *
 * CSS Output for SIDE Fly-In
 *
 */
 
$position = get_option('cpcta-hori-slider-position');
$angle = get_option('cpcta-hori-slider-topbar-angle');
?>
<style>
	.cpcta-flyin *  { transition: 1s; }
	.cpcta-flyin {
		min-width: 300px;
		max-height: 100%;
		position: relative;
	}

	.cpcta-flyin.cpcta-offScreenLeft .cpcta-top-bar {
		left: 0;
	}

	.cpcta-flyin.cpcta-offScreenLeft.slidOut .cpcta-content-panel {
		left: 0;
	}
	
	.cpcta-flyin.cpcta-offScreenRight .cpcta-top-bar {
		right: 0;
	}

	@media screen and (min-width: 480px) {
		/* on mobile screens, the tab should not slide out */
		.cpcta-flyin.cpcta-offScreenRight.slidOut .cpcta-top-bar {
			right: 400px;
		}

		.cpcta-flyin.cpcta-offScreenLeft.slidOut .cpcta-top-bar {
			left: 400px;
		}
	}

	.cpcta-flyin.cpcta-offScreenRight.slidOut .cpcta-content-panel {
		right: 0;
	}

	.cpcta-flyin .cpcta-top-bar {
		position: fixed;
		top: 150px;
		<?php if($position == 'right' && $angle == 'vertical') : ?>
			/* right: 0; */
			border-top-left-radius: 5px;
			border-bottom-left-radius: 5px;
		<?php elseif( $position == 'left' && $angle == 'vertical') : ?>
			/* left: 0; */
			border-top-right-radius: 5px;
			border-bottom-right-radius: 5px;
		<?php elseif( $position == 'right' && $angle == 'horizontal' ) : ?>
			right: 0px;
			border-top-right-radius: 5px;
			border-top-left-radius: 5px;
		<?php elseif( $position == 'left' && $angle == 'horizontal' ) : ?>
			left: 0;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
		<?php endif; ?>
    width: <?php echo get_option('cpcta-width-pixel'); ?>px;
		background: <?php echo get_option('cpcta-top-bar-bkg-color'); ?>;
		color: <?php echo get_option('cpcta-top-bar-font-color'); ?>;
		text-align: center;
	/*	border-top-right-radius: 5px; */
		padding: 8px 10px;
		font-size: 16px;
		font-weight: bold;
		cursor: pointer;
		<?php if( $angle == 'horizontal' ) : ?>
            transform: rotate(-90deg);
            <?php if( $position == 'right' ) : ?>
                transform-origin: bottom right;
            <?php elseif( $position == 'left' ) : ?>
                transform-origin: top left;
                top: <?php echo 150 + get_option('cpcta-width-pixel'); ?>px /* this offsets the top position when the top-bar is rotated around the top left corner */
            <?php endif; ?>
		<?php endif; ?>
	}
	.cpcta-flyin .cpcta-top-bar .up {
		/*color: #E88C38;*/
		padding: 0 10px;
		font-weight: bold;
		font-size: 18px;
	}
    .cpcta-close {    
      
    }
    @media screen and (max-width: 480px){
      .cpcta-close {
        position: relative;
        float: right;
        transition: 0.3s;
        width: 28px;
        height: 28px;
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
          background: <?php echo get_option('cpcta-top-bar-bkg-color') ?>;
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
    }
	.cpcta-flyin .cpcta-content-panel {
		position: fixed;
		<?php if( $position == 'right' ) : ?>
			right: -400px;
		<?php elseif ( $position == 'left' ) : ?>
			left: -400px;
		<?php endif; ?>
		top: 0;
		background: <?php echo get_option('cpcta-body-content-bkg-color'); ?>;
		color: <?php echo get_option('cpcta-body-content-font-color'); ?>;
		padding: 10px 20px 30px 20px;
		box-sizing: border-box;
		/* text-align: center; */
		height: 100%;
		max-width: 100%;
		width: 400px;
	}
    .cpcta-flyin > div.cpcta-content-panel {
        overflow: auto;
    }
	.cpcta-flyin .cpcta-content-panel a{
		color: #000;
	}
	.cpcta-flyin .cpcta-content-panel .cta{
		margin-top: 15px;
	}
	.cpcta-flyin .cpcta-content-panel a.button{
		color: #000;
		background: #6C942F;
		text-transform: uppercase;
		padding: 10px;
		margin: 15px 0 0 0;
	}
	
	div.cpcta-content-panel.slidOut {
	<?php 
		if($position == 'right'){
			echo "right: 0px;";
		} else if($position == 'left'){
			echo "left: 0px;";	
		}
	?>
	}
	div.cpcta-top-bar.slidOut { 
	<?php 
		if( $position == 'right' && get_option('cpcta-hori-slider-topbar-angle') == 'vertical' ){
			echo "right: 400px;";
		} else if( $position == 'left' && get_option('cpcta-hori-slider-topbar-angle') == 'vertical' ){
			echo "left: 400px;";	
		} else if( $position == 'right' && get_option('cpcta-hori-slider-topbar-angle')=='horizontal' ) {
			echo "right: 400px;";
		} else if( $position == 'left' && get_option('cpcta-hori-slider-topbar-angle')=='horizontal' ) {
			echo "left: 400px;";
		}
	?>	
	}
	
	<?php if(get_option('cpcta-mobile-hidden')) { $mobileWidth = get_option('cpcta-mobile-width'); ?>
	@media screen and (max-width: <?php echo $mobileWidth . "px"; ?>){
		.cpcta-flyin {
			display: none;
		}
	}
	<?php } ?>
	
</style>