<?php
/**
 *
 * scrollStyleCss Class
 *
 *  register settings API
 *
 * @package AtlScrollTop
 *
 */

namespace atlScrollTop;


class scrollStyleCss extends OptionsVariables {

    /* Register Settings style */
	public function __construct() {
	    parent::__construct();

		add_action('wp_head',[$this,'styleSettingsApi']);

	}


	/* Style Settings Scroll */
	public function styleSettingsApi() { ?>

        <!-- Style Atelier Scroll Top Settings Api -->
        <style>

            .scroll-top-alt {
                position: fixed;
            <?php

			/* Style Bottom & Top */
			$positionTB = ($this->getAtlSTpositionTB() == 'bottom') ? 'bottom:' . $this->getAtlSTpositionTBpx() . 'px;' : 'top:' . $this->getAtlSTpositionTBpx() . 'px;';
			echo $positionTB;

			/* Style Left & Right */
			$positionLR = ($this->getAtlSTpositionLR() == 'right') ? 'right:' . $this->getAtlSTpositionLRpx() . 'px;' : 'left:' . $this->getAtlSTpositionLRpx() . 'px;';
			echo $positionLR;

			/* Shape Style */
			if($this->getAtlSTshapes() == 'circle') {
				echo 'width: 45px;height: 45px;border-radius:50%;';
			} elseif ($this->getAtlSTshapes() == 'rectangle') {
				echo 'width: 45px;height: 45px;';
			} else {
			    echo 'width: 45px;height: 45px;border-radius:50%;';
			}
			?>

                /* Border */
                border: <?php echo $this->getAtlSTborderPx() . 'px solid ' . $this->getAtlSTborderColor(); ?>;
                background-color: <?php echo $this->getAtlSTBgColor(); ?>;
                color: <?php echo $this->getAtlSTIconColor(); ?>;
            }

            .scroll-top-alt:hover {
                background-color: <?php echo $this->getAtlSTBgHoverColor(); ?>;
                color: <?php echo $this->getAtlSTIconHoverColor(); ?>;
                border: <?php echo $this->getAtlSTborderPx() . 'px solid ' . $this->getAtlSTborderHoverColor(); ?>;
            }

            /* Custom Css */
            <?php echo $this->getAtlSTCustomCss(); ?>

        </style>

	<?php }



}