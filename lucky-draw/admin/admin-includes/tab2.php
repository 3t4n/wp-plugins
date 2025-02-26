<p class="fs-4 text-white text-center">Draw Details</p>
<div class="luckydrawinputbox" id="LDdrawnamebox"> 
  <p>Draw Name</p>
      <input type="text" id="Lucky_Draw_Name"class="luckydrawinputboxfulltext" maxlength="50" >
  </div> 

  <div class="luckydrawinputbox mt-1 " id="LDdrawurlbox"> 
  <p>Image Url</p>
      <input type="text" class="luckydrawinputboxfulltext" id="LDUurlvalue">
      
  </div> 

  <div class="luckydrawinputbox mt-1 " id="LDdrawdescbox"> 
  <p>Draw Description </p>
  <textarea style="height:100px;"class="luckydrawinputboxfulltext"  id="Lucky_Draw_Desc" rows="3" maxlength="144"></textarea>
     <br>   
  <div class="descriptionHelpBlock mt-1" >
       <b>{user}</b> to display name. <br>
       <b>{prize}</b> to display prize in description.
       </div>
  </div> 


  <div class="luckydrawinputbox mt-2" id="LDdrawnamebox"> 
  <p>Draw Date</p>
  <input type="text" id="Mainluckydrawdatepicker" class="luckydrawinputboxfulltext" name="Lucky_Draw_Date" required  autocomplete="off">

  </div> 

