<?php 
if ( !defined('ABSPATH') ){
     die();
   }

   //Insert Draw When Submitted


?>
<div class="modal" id="myModal" style="z-index:9999999999999;">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content" >

      <!-- Modal Header -->
      <div class="modal-header" style="width:100%;display:block;overflow:auto !important;padding:0px;">
        <h4 class="modal-title" style="float:left;padding:10px;">Lucky Draw</h4> 
        <form action="<?php echo wp_kses_post(Lucky_Draw_Home_URL).'admin.php?page=lucky-draw';  ?>" method="post" >
          <input type="hidden" id="valuedrawtype" name="valuedrawtype" value="shortcode">
          <input type="hidden" id="valuedrawfixed" name="valuedrawfixed">
          <input type="hidden" id="valuedrawfixedheight" name="valuedrawfixedheight">
          <input type="hidden" id="valuedrawfixedwidth" name="valuedrawfixedwidth">
          <input type="hidden" id="valuedrawfixedposition" name="valuedrawfixedposition" value="Topleft">
          <input type="hidden" id="valuedrawname" name="valuedrawname">
          <input type="hidden" id="valuedrawurl" name="valuedrawurl" value="<?php echo Lucky_Draw_Plugin_URL.'assets/img/default.jpg'; ?>">
          <input type="hidden" id="valuedrawdesc" name="valuedrawdesc">
          <input type="hidden" id="valuedrawdate" name="valuedrawdate">
          <input type="hidden" id="valuedrawprizesku" name="valuedrawprizesku">
          <input type="hidden" id="valuedrawprizetext" name="valuedrawprizetext">
          <input type="hidden" id="valuedrawboxstyle" name="valuedrawboxstyle">
          <input type="hidden" id="valuedrawboxdivider" name="valuedrawboxdivider">
          <input type="hidden" id="valuedrawboxheading" name="valuedrawboxheading">
          <input type="hidden" id="valuedrawdescription" name="valuedrawdescription">
          <input type="hidden" id="valuedrawprize" name="valuedrawprize">
          <input type="hidden" id="valuedrawcountdownnumber" name="valuedrawcountdownnumber">
          <input type="hidden" id="valuedrawcountdowndays" name="valuedrawcountdowndays">
          <input type="hidden" id="valuedrawbuttontext" name="valuedrawbuttontext">
          <input type="hidden" id="valuedrawactionbutton" name="valuedrawactionbutton">
          <input type="hidden" id="valuedrawclosebutton" name="valuedrawclosebutton">
          <input type="hidden" id="valuedrawparticipationmail" name="valuedrawparticipationmail">
          <input type="hidden" id="valuedrawlosingnmail" name="valuedrawlosingnmail">
          <?php wp_nonce_field( "Lucky_Draw_Nonce", "Lucky_Draw_Nonce_Field");  ?>
        <button type="submit"  id="luckydrawmodalsubmitbutton" id="Lucky_Draw_Submit_Button" name="Lucky_Draw_Submit" ><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        <button type="button"id="luckydrawmodalclosebutton"type="button"  data-bs-dismiss="modal">Close</button>
        </form>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="background-color:#ececec;margin:0px;padding:0px">       


      <?php include Lucky_Draw_Plugin_Path.'admin/admin-includes/tabs.php'; ?>

    </div>     
  
    </div>
  </div>
</div>

<Script>
  var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
  myModal.toggle()
</Script>

</Script>