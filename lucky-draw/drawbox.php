<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<?php 
if ( !defined('ABSPATH') ){
  die();
}
global $wpdb;
global $current_user;
      wp_get_current_user();

   
      $contestant_count=0;

      $result = $wpdb->get_results("SELECT * FROM ".Lucky_Draw_Database."  WHERE status =1  ORDER BY id DESC LIMIT 1 "); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange

foreach ($result as $post){

        $draw_id = $post->id;
        $draw_name = $post->draw_name;
        $drawtype=$post->draw_type;
        $img_url=$post->img_url;
        $draw_desc=$post->draw_desc;
        $draw_date=$post->draw_date;
        $prizes=$post->prizes;
        $sendmail=$post->sendmail;
        $stylebox=$post->box_style;  

}

//Unserialize Prizes And And Get SKU1 and SKU Text1 
 $prizes=unserialize($prizes);
  $drawtype=unserialize($drawtype);
//Unserialize Styles And Style Boxes
 $stylebox=unserialize($stylebox);
 
//Unserialize Mail 
$sendmail=unserialize($sendmail);

if ( is_user_logged_in() ) {
 $contestant_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM %i WHERE contest_id =%s AND contestants=%s ORDER BY id ASC ",Lucky_Draw_Database2,$draw_id,$current_user->user_email)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
}

if($contestant_count==0){

  if($drawtype["drawtype"]=="shortcode"){

?>

   <div class="shortcodepreviewbody "  style="z-index:999999999999999;height:auto;overflow:visible;<?php echo $stylebox["box"]; if($drawtype["fixed"]=="fixed"){ echo "position:fixed;"."height:".$drawtype["height"].";width:".$drawtype["width"].";".$drawtype["position"]; } ?>">
      <div class="shortcodepreviewheader" id="previewheader" >
         <span style="<?php echo $stylebox["heading"]; ?>"><?php echo $draw_name; ?></span>
         <span  style="<?php echo $stylebox["closebutton"]; ?>;float:right;cursor:pointer;margin-top:-5px !important;background-color:inherit !important;width:15px !important;margin-left:-10px !important;color:grey;transform:scale(1.3,1.3);"><i class="fa-solid fa-xmark" ></i></span>
         </div>
      <div class="dividerbox w-100 float-start" style="height:0.5px;background-color:black;">

      </div>
    
      <div class="shortcodepreviewdescription float-start">
      <?php echo $draw_desc; ?>
      </div>

       
        <div class='counters float-start' style="margin-left:10%; !important">
            <div class='counter ' style="width:24%;" >
              <span id='days' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
              <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>">Days</p>
            </div>
    
            <div class='counter' >
              <span id='hours' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
              <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>"">Hours</p>
            </div>
    
          <div class='counter'>
            <span id='minutes' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
            <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>">Minutes</p>
          </div>
    
          <div class='counter'>
            <span id='seconds' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
            <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>">Seconds</p>
          </div>
     </div>


        <div class="shortcodepreviewactionbuttonbody mt-1" style="position:relative;bottom:0px;display:block;float:left;margin-left:5%;width:90%;">
        <form  id="luckydrawboxform" method="POST" action="<?php echo wp_kses_post(admin_url('admin-post.php')); ?>" >
          <input type="hidden" name="action" value="lucky_draw_participation_form">
          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_id); ?>" name="a" >

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_id); ?>" name="SKUText1" >

          <input type="hidden" name="current_url" value="<?php echo esc_attr(get_permalink()); ?>"> 

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($sendmail["participationmail"]); ?>" name="sendmail" >

          <?php wp_nonce_field( "Lucky_Draw_Nonce", "Lucky_Draw_Nonce_Field");  ?>

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_name); ?>" name="drawname" >

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_date); ?>" name="drawdate" >


          <?php if ( is_user_logged_in() ) { ?>

            <button style="padding:0px;margin-top:5%;margin-bottom:5%;<?php echo $stylebox["actionbutton"]; ?>;font-size:15px !important;" class="shortcodepreviewactionbutton"><?php echo $stylebox["buttontext"]; ?></button>

<?php  } else {?>

  <button   id="registerbuttondisabled" style="padding:0px;margin-top:5%;margin-bottom:5%;<?php echo $stylebox["actionbutton"]; ?>;font-size:15px !important;" class="shortcodepreviewactionbutton">Please Log In</button>

  <?php }  ?>

          </form>        </div>


  </div>

<?php 

    }elseif($drawtype["drawtype"]=="popup"){

?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> 
          <span style="<?php echo $stylebox["heading"]; ?>;font-size:35px;background-color:white"><?php echo $draw_name; ?></span>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="shortcodepreviewbody "  style="width:100%;margin-left:0;margin-top:0px;height:auto;overflow:visible;<?php echo $stylebox["box"]; ?>">
      <div class="dividerbox w-100 float-start" style="height:0.5px;background-color:black;">

      </div>
    
      <div class="shortcodepreviewdescription float-start">
      <?php echo $draw_desc; ?>
      </div>

       
        <div class='counters float-start' style="margin-left:10%; !important">
            <div class='counter ' style="width:24%;" >
              <span id='days' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
              <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>">Days</p>
            </div>
    
            <div class='counter' >
              <span id='hours' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
              <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>"">Hours</p>
            </div>
    
          <div class='counter'>
            <span id='minutes' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
            <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>">Minutes</p>
          </div>
    
          <div class='counter'>
            <span id='seconds' style="padding:15px;<?php echo $stylebox["countdownnumber"]; ?>">NA</span>
            <p style="font-size:1.5vh;<?php echo $stylebox["countdowndays"]; ?>">Seconds</p>
          </div>
     </div>


        <div class="shortcodepreviewactionbuttonbody mt-1" style="position:relative;bottom:0px;display:block;float:left;margin-left:5%;width:90%;">
        <form  id="luckydrawboxform" method="POST" action="<?php echo wp_kses_post(admin_url('admin-post.php')); ?>" >
          <input type="hidden" name="action" value="lucky_draw_participation_form">
          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_id); ?>" name="a" >

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_id); ?>" name="SKUText1" >

          <input type="hidden" name="current_url" value="<?php echo esc_attr(get_permalink()); ?>"> 

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($sendmail["participationmail"]); ?>" name="sendmail" >

          <?php wp_nonce_field( "Lucky_Draw_Nonce", "Lucky_Draw_Nonce_Field");  ?>

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_name); ?>" name="drawname" >

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_date); ?>" name="drawdate" >



            <button style="padding:0px;margin-top:5%;margin-bottom:5%;<?php echo $stylebox["actionbutton"]; ?>" class="shortcodepreviewactionbutton"><?php echo $stylebox["buttontext"]; ?></button>
</form>        </div>


  </div>
      </div>
    </div>
  </div>
</div>


<?php 

}elseif($drawtype["drawtype"]=="image"){
?>
  <div class="image-container">
  <img height:=100%" width="100%"; src="<?php echo $img_url; ?>" id="mainpreviewimage" alt="Image">
  <div class="overlay"></div>
  <form  id="luckydrawboxform" method="POST" action="<?php echo wp_kses_post(admin_url('admin-post.php')); ?>" >
          <input type="hidden" name="action" value="lucky_draw_participation_form">
          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_id); ?>" name="a" >

          <input id="mainvalue" type="hidden" value="<?php echo esc_attr($draw_id); ?>" name="SKUText1" >

          <input type="text" name="current_url" value="<?php echo esc_attr(get_permalink()); ?>"> 

          <input id="mainvalue" type="text" value="<?php echo esc_attr($sendmail["participationmail"]); ?>" name="sendmail" >

          <?php wp_nonce_field( "Lucky_Draw_Nonce", "Lucky_Draw_Nonce_Field");  ?>

          <input id="mainvalue" type="text" value="<?php echo esc_attr($draw_name); ?>" name="drawname" >

          <input id="mainvalue" type="text" value="<?php echo esc_attr($draw_date); ?>" name="drawdate" >
          class="imageregister-btn"


          <?php if ( is_user_logged_in() ) { ?>

<button style="width:auto;padding:0px 15px 0px 15px;margin-top:5%;margin-bottom:5%;<?php echo $stylebox["actionbutton"]; ?>;font-size:15px !important;" class="imageregister-btn"><?php echo $stylebox["buttontext"]; ?></button>

<?php  } else {?>

<button  class="imageregister-btn" id="registerbuttondisabled" style="width:auto;padding:0px 15px 0px 15px;;margin-top:5%;margin-bottom:5%;<?php echo $stylebox["actionbutton"]; ?>;font-size:15px !important;" >Please Log In</button>

<?php }  ?></form>
</div> 

<?php 

} 


}
?>
<!-- <button type="button" class="btn btn-primary w-30" data-bs-dismiss="alert" aria-label="">Close</button>
-->
    </div>


</div>
</div>

 <script>

window.onload = function() {
    myFunction();
};

function myFunction() {

  SetTimerForDrawDate('Feb 3, 2025  00:00:00');

    console.log('Page has fully loaded');
}

  var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {})
  myModal.toggle()
</Script>
</script>