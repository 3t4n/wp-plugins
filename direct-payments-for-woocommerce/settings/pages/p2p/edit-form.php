<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>
<!-- Edit Account Modal --> 
 
<div id="editAccountModal" class="digages_popup">
    <div class="digagesmaincontainer">  
      
        <div class="digages_popup-content digagesmaincenter"> 
 
        <div class="modhe"> 

        <div class="container text-center">
  <div class="rowt">
    <div class="colt-6 text-start mtttp"><span class="xcsse" id="staticBackdropLabel">Add Peer-to-Peer Account</span></div>
    <div class="colt-5 text-end mtttp"><span class="astre">*</span> are required</div>
    <div class="colt-1t xcs"><span class="digages_close"><i class="bi bi-x"></i></div>
  </div>
</div>

      </div>
      
       
      <form id="edit_p2p_account_form">
        
<div class="digages-container digages-body-pad"> 
    <div class="digages-text-start digages-desktop-span-12 digages-tab-span-12 digages-mobile-span-12">

    <div class="container text-start">
  <div class="rowt rowt-colts-1 rowt-colts-sm-2 rowt-colts-md-2">

  <div class="colt rrwtp">
     <label for="edit_p2p_name">P2P Platform <span class="astre">*</span></label>
     <input type="text" id="edit_p2p_name" name="p2p_name" class="form-control regular-text">
     <span class="byyt">P2P platform e.g. Venmo, Zelle, PayPal e.t.c</span>
    </div>

    <div class="colt rrwtp">
    <label for="edit_account_name">Account Name <span class="astre">*</span></label>
    <input type="text" id="edit_account_name" name="account_name" class="form-control regular-text">
    <span class="byyt">The name associated with the P2P account</span>
    </div>

    <div class="colt rrwtp">
    <label for="edit_account_id">ID <span class="astre">*</span></label>
    <input type="text" id="edit_account_id" name="account_id" class="form-control regular-text">
    <span class="byyt">Email, username, or phone number</span>
    </div>
    
    <div class="colt rrwtp">
    <label for="edit_account_type">ID Type</label><br/><br/>
    <select id="edit_account_type" name="account_type" class="form-select tumaz_settelc regular-text"> 
       <option>Select</option>
      <option value="Username">Username</option>
      <option value="Email address">Email address</option>
      <option value="Phone number">Phone number</option>
      <option value="Tag">Tag</option>
      </select>
    </div>
 

  </div>
</div>

</div>
</div>
</form>


      <div class="tumafontbtm"></div>
      
<div class="digages-container digages-btm-pad"> 
    <div class="digages-text-start digages-desktop-span-12 digages-tab-span-12 digages-mobile-span-12">

      <div class="modal-footer">
        <button type="button" class="trddbtn22" id="edit_account_button">Save changes</button>
<div class="tumazz_closse d-sm-none" data-bs-dismiss="modal" aria-label="Close">Close</div>
      </div>

</div>
    </div>
  </div>
</div>
</div>