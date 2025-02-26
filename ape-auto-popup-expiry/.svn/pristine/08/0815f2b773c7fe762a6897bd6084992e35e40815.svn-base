<?php $notification_close_color=(get_option('notification_close_color')==null)?'':get_option('notification_close_color'); ?>
<?php $notification_bkg_color=(get_option('notification_bkg_color')==null)?'':get_option('notification_bkg_color'); ?>
<?php $notification_font_color=(get_option('notification_font_color')==null)?'':get_option('notification_font_color'); ?>
<?php $notification_text=(get_option('notification_text')==null)?'':get_option('notification_text'); ?>


<!--NOTIFICATION PLUGIN-->
<style>
.wrapper_animation{ width:300px; height:200px; text-align:center; position:relative; overflow:hidden; box-shadow:0px 0px 10px rgba(0,0,0,0.1); background-color:#fff;}
.notification{ width:250px; height:auto; background-color:<?php echo $notification_bkg_color; ?>; z-index:6; border-radius:5px; box-shadow:0px 0px 10px rgba(0,0,0,0.3); margin:0px; margin-bottom:30px; position:relative;}
.notification_i{ padding:15px;}
.notification p{ font-family: 'Lato', sans-serif; color:<?php echo $notification_font_color; ?>;}
.t_flex{display:flex; align-items: center; justify-content: center;}
.close_notification{ width:25px; height:25px; background-color:<?php echo $notification_close_color; ?>; border-radius:50px; position:absolute; top:-10px; right:-10px; line-height: 25px; text-align:center;}
.close_notification span{ color:#fff;}
</style>


<div class="wrapper_animation t_flex">
<div class="wrapper_animation_i">
    <header class="site__header island"><div id="animationSandbox">
        <div class="notification">
        <div class="close_notification"><span>&#10005;</span></div>
            <div class="notification_i">
                <p><?php if($notification_text){?><?php echo $notification_text; ?><?php }else{ ?>Test of Widget Animation <strong>IN</strong><?php }; ?></p>
            </div>
        </div>
    </div>
    </header>
<div>
</div>
<!--NOTIFICATION PLUGIN-->

<main role="content">
  <div class="wrap">
      <select class="input input--dropdown js--animations" name="myselect">
        <optgroup label="Bouncing Entrances">
          <option value="bounceInDown" <?php if ( get_option('myselect') == bounceInDown ) echo 'selected="selected"'; ?>>bounceInDown</option>
          <option value="bounceInLeft" <?php if ( get_option('myselect') == bounceInLeft ) echo 'selected="selected"'; ?>>bounceInLeft</option>
          <option value="bounceInRight" <?php if ( get_option('myselect') == bounceInRight ) echo 'selected="selected"'; ?>>bounceInRight</option>
          <option value="bounceInUp" <?php if ( get_option('myselect') == bounceInUp ) echo 'selected="selected"'; ?>>bounceInUp</option>
        </optgroup>

    
    
        <optgroup label="Fading Entrances">
          <option value="fadeIn" <?php if ( get_option('myselect') == fadeIn ) echo 'selected="selected"'; ?>>fadeIn</option>
          <option value="fadeInDown" <?php if ( get_option('myselect') == fadeInDown ) echo 'selected="selected"'; ?>>fadeInDown</option>
          <option value="fadeInDownBig" <?php if ( get_option('myselect') == fadeInDownBig ) echo 'selected="selected"'; ?>>fadeInDownBig</option>
          <option value="fadeInLeft" <?php if ( get_option('myselect') == fadeInLeft ) echo 'selected="selected"'; ?>>fadeInLeft</option>
          <option value="fadeInLeftBig" <?php if ( get_option('myselect') == fadeInLeftBig ) echo 'selected="selected"'; ?>>fadeInLeftBig</option>
          <option value="fadeInRight" <?php if ( get_option('myselect') == fadeInRight ) echo 'selected="selected"'; ?>>fadeInRight</option>
          <option value="fadeInRightBig" <?php if ( get_option('myselect') == fadeInRightBig ) echo 'selected="selected"'; ?>>fadeInRightBig</option>
          <option value="fadeInUp" <?php if ( get_option('myselect') == fadeInUp ) echo 'selected="selected"'; ?>>fadeInUp</option>
          <option value="fadeInUpBig" <?php if ( get_option('myselect') == fadeInUpBig ) echo 'selected="selected"'; ?>>fadeInUpBig</option>
        </optgroup>


        <optgroup label="Flippers">
          <option value="flipInX" <?php if ( get_option('myselect') == flipInX ) echo 'selected="selected"'; ?>>flipInX</option>
          <option value="flipInY" <?php if ( get_option('myselect') == flipInY ) echo 'selected="selected"'; ?>>flipInY</option>
          <option value="flipOutX" <?php if ( get_option('myselect') == flipOutX ) echo 'selected="selected"'; ?>>flipOutX</option>
          <option value="flipOutY" <?php if ( get_option('myselect') == flipOutY ) echo 'selected="selected"'; ?>>flipOutY</option>
        </optgroup>

        <optgroup label="Lightspeed">
          <option value="lightSpeedIn" <?php if ( get_option('myselect') == lightSpeedIn ) echo 'selected="selected"'; ?>>lightSpeedIn</option>
        </optgroup>

        <optgroup label="Rotating Entrances">
          <option value="rotateIn" <?php if ( get_option('myselect') == rotateIn ) echo 'selected="selected"'; ?>>rotateIn</option>
          <option value="rotateInDownLeft" <?php if ( get_option('myselect') == rotateInDownLeft ) echo 'selected="selected"'; ?>>rotateInDownLeft</option>
          <option value="rotateInDownRight" <?php if ( get_option('myselect') == rotateInDownRight ) echo 'selected="selected"'; ?>>rotateInDownRight</option>
          <option value="rotateInUpLeft" <?php if ( get_option('myselect') == rotateInUpLeft ) echo 'selected="selected"'; ?>>rotateInUpLeft</option>
          <option value="rotateInUpRight" <?php if ( get_option('myselect') == rotateInUpRight ) echo 'selected="selected"'; ?>>rotateInUpRight</option>
        </optgroup>


        <optgroup label="Sliding Entrances">
          <option value="slideInUp" <?php if ( get_option('myselect') == slideInUp ) echo 'selected="selected"'; ?>>slideInUp</option>
          <option value="slideInDown" <?php if ( get_option('myselect') == slideInDown ) echo 'selected="selected"'; ?>>slideInDown</option>
          <option value="slideInLeft" <?php if ( get_option('myselect') == slideInLeft ) echo 'selected="selected"'; ?>>slideInLeft</option>
          <option value="slideInRight" <?php if ( get_option('myselect') == slideInRight ) echo 'selected="selected"'; ?>>slideInRight</option>

        
        <optgroup label="Zoom Entrances">
          <option value="zoomIn" <?php if ( get_option('myselect') == zoomIn ) echo 'selected="selected"'; ?>>zoomIn</option>
          <option value="zoomInDown" <?php if ( get_option('myselect') == zoomInDown ) echo 'selected="selected"'; ?>>zoomInDown</option>
          <option value="zoomInLeft" <?php if ( get_option('myselect') == zoomInLeft ) echo 'selected="selected"'; ?>>zoomInLeft</option>
          <option value="zoomInRight" <?php if ( get_option('myselect') == zoomInRight ) echo 'selected="selected"'; ?>>zoomInRight</option>
          <option value="zoomInUp" <?php if ( get_option('myselect') == zoomInUp ) echo 'selected="selected"'; ?>>zoomInUp</option>
        </optgroup>
        
      </select>

  </div>
</main><!-- /.site__content -->

<script>
  function testAnim(x) {
    jQuery('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      jQuery(this).removeClass();
    });
  };

  jQuery(document).ready(function(){
    jQuery('.js--triggerAnimation').click(function(e){
      e.preventDefault();
      var anim = jQuery('.js--animations').val();
      testAnim(anim);
    });

    jQuery('.js--animations').change(function(){
      var anim = jQuery(this).val();
      testAnim(anim);
    });
  });

</script>
