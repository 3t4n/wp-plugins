<?php $notification_close_color=(get_option('notification_close_color')==null)?'':get_option('notification_close_color'); ?>
<?php $notification_bkg_color=(get_option('notification_bkg_color')==null)?'':get_option('notification_bkg_color'); ?>
<?php $notification_font_color=(get_option('notification_font_color')==null)?'':get_option('notification_font_color'); ?>
<?php $notification_text=(get_option('notification_text')==null)?'':get_option('notification_text'); ?>

<!--NOTIFICATION PLUGIN-->
<style>
.wrapper_animation{ width:300px; height:200px; text-align:center; position:relative; overflow:hidden; box-shadow:0px 0px 10px rgba(0,0,0,0.1); background-color:#fff;}
.notification{ width:250px; height:auto; background-color:<?php if($notification_bkg_color){?><?php echo $notification_bkg_color; ?><?php }else{ ?>#F36<?php };?>; z-index:6; border-radius:5px; box-shadow:0px 0px 10px rgba(0,0,0,0.3); margin:0px; margin-bottom:30px; position:relative;}
.notification_i{ padding:15px;}
.notification p{ font-family: 'Lato', sans-serif; color:<?php if($notification_font_color){?><?php echo $notification_font_color; ?><?php }else{ ?>#fff<?php };?>;}
.t_flex{display:flex; align-items: center; justify-content: center;}
.close_notification{ width:25px; height:25px; background-color:<?php if($notification_close_color){?><?php echo $notification_close_color; ?><?php }else{ ?>#fff<?php };?>; border-radius:50px; position:absolute; top:-10px; right:-10px; line-height: 25px; text-align:center;}
.close_notification span{ color:#fff;}
</style>

<div class="wrapper_animation t_flex">
<div class="wrapper_animation_i">
    <header class="site__header island"><div id="animationSandbox2">
        <div class="notification">
        <div class="close_notification"><span>&#10005;</span></div>
            <div class="notification_i">
                <p><?php if($notification_text){?><?php echo $notification_text; ?><?php }else{ ?>Test of Widget Animation <strong>OUT</strong><?php }; ?></p>
            </div>
        </div>
    </div>
    </header>
<div>
</div>
<!--NOTIFICATION PLUGIN-->

<main class="site__content island" role="content">
  <div class="wrap">
      <select class="input input--dropdown js--animations2" name="myselectout">


        <optgroup label="Bouncing Exits">
          <option value="bounceOut" <?php if ( get_option('myselectout') == bounceOut ) echo 'selected="selected"'; ?>>bounceOut</option>
          <option value="bounceOutDown" <?php if ( get_option('myselectout') == bounceOutDown ) echo 'selected="selected"'; ?>>bounceOutDown</option>
          <option value="bounceOutLeft" <?php if ( get_option('myselectout') == bounceOutLeft ) echo 'selected="selected"'; ?>>bounceOutLeft</option>
          <option value="bounceOutRight" <?php if ( get_option('myselectout') == bounceOutRight ) echo 'selected="selected"'; ?>>bounceOutRight</option>
          <option value="bounceOutUp" <?php if ( get_option('myselectout') == bounceOutUp ) echo 'selected="selected"'; ?>>bounceOutUp</option>
        </optgroup>


        <optgroup label="Fading Exits">
          <option value="fadeOut" <?php if ( get_option('myselectout') == fadeOut ) echo 'selected="selected"'; ?>>fadeOut</option>
          <option value="fadeOutDown" <?php if ( get_option('myselectout') == fadeOutDown ) echo 'selected="selected"'; ?>>fadeOutDown</option>
          <option value="fadeOutDownBig" <?php if ( get_option('myselectout') == fadeOutDownBig ) echo 'selected="selected"'; ?>>fadeOutDownBig</option>
          <option value="fadeOutLeft" <?php if ( get_option('myselectout') == fadeOutLeft ) echo 'selected="selected"'; ?>>fadeOutLeft</option>
          <option value="fadeOutLeftBig" <?php if ( get_option('myselectout') == fadeOutLeftBig ) echo 'selected="selected"'; ?>>fadeOutLeftBig</option>
          <option value="fadeOutRight" <?php if ( get_option('myselectout') == fadeOutRight ) echo 'selected="selected"'; ?>>fadeOutRight</option>
          <option value="fadeOutRightBig" <?php if ( get_option('myselectout') == fadeOutRightBig ) echo 'selected="selected"'; ?>>fadeOutRightBig</option>
          <option value="fadeOutUp" <?php if ( get_option('myselectout') == fadeOutUp ) echo 'selected="selected"'; ?>>fadeOutUp</option>
          <option value="fadeOutUpBig" <?php if ( get_option('myselectout') == fadeOutUpBig ) echo 'selected="selected"'; ?>>fadeOutUpBig</option>
        </optgroup>

        <optgroup label="Flippers">
          <option value="flipOutX" <?php if ( get_option('myselectout') == flipOutX ) echo 'selected="selected"'; ?>>flipOutX</option>
          <option value="flipOutY" <?php if ( get_option('myselectout') == flipOutY ) echo 'selected="selected"'; ?>>flipOutY</option>
        </optgroup>

        <optgroup label="Lightspeed">
          <option value="lightSpeedOut" <?php if ( get_option('myselectout') == lightSpeedOut ) echo 'selected="selected"'; ?>>lightSpeedOut</option>
        </optgroup>


        <optgroup label="Rotating Exits">
          <option value="rotateOut" <?php if ( get_option('myselectout') == rotateOut ) echo 'selected="selected"'; ?>>rotateOut</option>
          <option value="rotateOutDownLeft" <?php if ( get_option('myselectout') == rotateOutDownLeft ) echo 'selected="selected"'; ?>>rotateOutDownLeft</option>
          <option value="rotateOutDownRight" <?php if ( get_option('myselectout') == rotateOutDownRight ) echo 'selected="selected"'; ?>>rotateOutDownRight</option>
          <option value="rotateOutUpLeft" <?php if ( get_option('myselectout') == rotateOutUpLeft ) echo 'selected="selected"'; ?>>rotateOutUpLeft</option>
          <option value="rotateOutUpRight" <?php if ( get_option('myselectout') == rotateOutUpRight ) echo 'selected="selected"'; ?>>rotateOutUpRight</option>
        </optgroup>

        <optgroup label="Sliding Exits">
          <option value="slideOutUp" <?php if ( get_option('myselectout') == slideOutUp ) echo 'selected="selected"'; ?>>slideOutUp</option>
          <option value="slideOutDown" <?php if ( get_option('myselectout') == slideOutDown ) echo 'selected="selected"'; ?>>slideOutDown</option>
          <option value="slideOutLeft" <?php if ( get_option('myselectout') == slideOutLeft ) echo 'selected="selected"'; ?>>slideOutLeft</option>
          <option value="slideOutRight" <?php if ( get_option('myselectout') == slideOutRight ) echo 'selected="selected"'; ?>>slideOutRight</option>
        </optgroup>
        <optgroup label="Zoom Exits">
          <option value="zoomOut" <?php if ( get_option('myselectout') == zoomOut ) echo 'selected="selected"'; ?>>zoomOut</option>
          <option value="zoomOutDown" <?php if ( get_option('myselectout') == zoomOutDown ) echo 'selected="selected"'; ?>>zoomOutDown</option>
          <option value="zoomOutLeft" <?php if ( get_option('myselectout') == zoomOutLeft ) echo 'selected="selected"'; ?>>zoomOutLeft</option>
          <option value="zoomOutRight" <?php if ( get_option('myselectout') == zoomOutRight ) echo 'selected="selected"'; ?>>zoomOutRight</option>
          <option value="zoomOutUp" <?php if ( get_option('myselectout') == zoomOutUp ) echo 'selected="selected"'; ?>>zoomOutUp</option>
        </optgroup>

  </div>
</main><!-- /.site__content -->

<script>
  function testAnim2(x) {
    jQuery('#animationSandbox2').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      jQuery(this).removeClass();
    });
  };

  jQuery(document).ready(function(){
    jQuery('.js--triggerAnimation2').click(function(e){
      e.preventDefault();
      var anim = jQuery('.js--animations2').val();
      testAnim2(anim);
    });

    jQuery('.js--animations2').change(function(){
      var anim = jQuery(this).val();
      testAnim2(anim);
    });
  });

</script>
