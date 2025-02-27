<?php



	$css_selector = '#cube-3d-slider-'.(int)$atts['id'];

	$translate_offset = $c3s->width/2;



?>



<style>



	<?php echo esc_html($css_selector) ?> {

		perspective: 600px;

		margin: 0 auto;

		width: <?php echo (int)$c3s->width+20 ?>px;

		height: <?php echo (int)$c3s->width+60 ?>px;

	}



	<?php echo esc_html($css_selector) ?> .slider {

	    width: <?php echo (int)$c3s->width ?>px;

	    height: <?php echo (int)$c3s->width ?>px;

	    margin: 0 auto;

	}



	<?php echo esc_html($css_selector) ?> .slider > div {

	    width: <?php echo (int)$c3s->width ?>px;

	    height: <?php echo (int)$c3s->width ?>px;

	}



	<?php echo esc_html($css_selector) ?> .menu {

	    list-style-type: none;

	  }





  <?php echo esc_html($css_selector) ?> .slider .front  {

      background: url(<?php echo esc_url($c3s->front_face_image) ?>) no-repeat top left;

      -webkit-transform: translateZ( <?php echo (int)$translate_offset ?>px );

         -moz-transform: translateZ( <?php echo (int)$translate_offset ?>px );

           -o-transform: translateZ( <?php echo (int)$translate_offset ?>px );

              transform: translateZ( <?php echo (int)$translate_offset ?>px );

  }

  <?php echo esc_html($css_selector) ?> .slider .back   {

      background: url(<?php echo esc_url($c3s->back_face_image) ?>) no-repeat top left;

      -webkit-transform: rotateY( -180deg ) translateZ( <?php echo (int)$translate_offset ?>px );

         -moz-transform: rotateY( -180deg ) translateZ( <?php echo (int)$translate_offset ?>px );

           -o-transform: rotateY( -180deg ) translateZ( <?php echo (int)$translate_offset ?>px );

              transform: rotateY( -180deg ) translateZ( <?php echo (int)$translate_offset ?>px );

  }

  <?php echo esc_html($css_selector) ?> .slider .right {

      background: url(<?php echo esc_url($c3s->right_face_image) ?>) no-repeat top left;

      -webkit-transform: rotateY(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

         -moz-transform: rotateY(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

           -o-transform: rotateY(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

              transform: rotateY(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

  }

  <?php echo esc_html($css_selector) ?> .slider .left {

      background: url(<?php echo esc_url($c3s->left_face_image) ?>) no-repeat top left;

      -webkit-transform: rotateY(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

         -moz-transform: rotateY(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

           -o-transform: rotateY(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

              transform: rotateY(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

  }

  <?php echo esc_html($css_selector) ?> .slider .top {

      background: url(<?php echo esc_url($c3s->top_face_image) ?>) no-repeat top left;

      -webkit-transform: rotateX(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

         -moz-transform: rotateX(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

           -o-transform: rotateX(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

              transform: rotateX(   90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

  }

  <?php echo esc_html($css_selector) ?> .slider .bottom {

      background: url(<?php echo esc_url($c3s->bottom_face_image) ?>) no-repeat top left;

      -webkit-transform: rotateX(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

         -moz-transform: rotateX(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

           -o-transform: rotateX(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

              transform: rotateX(  -90deg ) translateZ( <?php echo (int)$translate_offset ?>px );

  }



  <?php echo esc_html($css_selector) ?> .slider.show-front {

      -webkit-transform: translateZ( -<?php echo (int)$translate_offset ?>px );

         -moz-transform: translateZ( -<?php echo (int)$translate_offset ?>px );

           -o-transform: translateZ( -<?php echo (int)$translate_offset ?>px );

              transform: translateZ( -<?php echo (int)$translate_offset ?>px );

  }

  <?php echo esc_html($css_selector) ?> .slider.show-back {

      -webkit-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY( 180deg );

         -moz-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY( 180deg );

           -o-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY( 180deg );

              transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY( 180deg );

  }

  <?php echo esc_html($css_selector) ?> .slider.show-right {

      -webkit-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(  270deg );

         -moz-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(  270deg );

           -o-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(  270deg );

              transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(  270deg );

  }

  <?php echo esc_html($css_selector) ?> .slider.show-left {

      -webkit-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(   90deg );

         -moz-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(   90deg );

           -o-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(   90deg );

              transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateY(   90deg );

  }

  <?php echo esc_html($css_selector) ?> .slider.show-top {

      -webkit-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(  -90deg );

         -moz-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(  -90deg );

           -o-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(  -90deg );

              transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(  -90deg );

  }

  <?php echo esc_html($css_selector) ?> .slider.show-bottom {

      -webkit-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(   90deg );

         -moz-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(   90deg );

           -o-transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(   90deg );

              transform: translateZ( -<?php echo (int)$translate_offset ?>px ) rotateX(   90deg );

  }



</style>



<div id="cube-3d-slider-<?php echo (int)$atts['id'] ?>" class="cube-3d-slider <?php echo ($atts['autoplay'] == 'true' ? 'autoplay' : '') ?>">

    <div class="slider show-front">

    	<div class="front">

    		<?php if ($c3s->front_face_text) : ?>

    		<div class="text">

	          <?php echo wp_kses_post($c3s->front_face_text) ?>

	        </div>	

	        <?php endif; ?>	

  	 	</div>

	    <div class="right">

	    	<?php if ($c3s->right_face_text) : ?>

	        <div class="text">

	          <?php echo wp_kses_post($c3s->right_face_text) ?>

	        </div> 

	        <?php endif; ?>	   

	    </div>

	    <div class="back">

	    	<?php if ($c3s->back_face_text) : ?>

	        <div class="text">

	          <?php echo wp_kses_post($c3s->back_face_text) ?>

	        </div>   

	        <?php endif; ?> 

	    </div>

	    <div class="left">

	    	<?php if ($c3s->left_face_text) : ?>

	        <div class="text">

	          <?php echo wp_kses_post($c3s->left_face_text) ?>

	        </div>   

	        <?php endif; ?> 

	    </div>

	    <div class="top">

	    	<?php if ($c3s->top_face_text) : ?>

	        <div class="text">

	          <?php echo wp_kses_post($c3s->top_face_text) ?>

	        </div> 

	        <?php endif; ?>   

	    </div>

	    <div class="bottom">

	    	<?php if ($c3s->bottom_face_text) : ?>

	        <div class="text">

	          <?php echo wp_kses_post($c3s->bottom_face_text) ?>

	        </div>  

	        <?php endif; ?>  

	    </div>

    </div>

    <?php if ($atts['arrows'] != 'false') : ?>

	    <a href="#" class="prev"></a>

	    <a href="#" class="next"></a>

	<?php endif; ?>

</div>