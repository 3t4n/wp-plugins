var $=jQuery;
$(document).ready(function(){
  //show personal adress input in register page
  $("#role").change(function(){

     var allow_page = $(this).find(':selected').data('page');
     if(allow_page) {
        $("#own_address").fadeIn(1000);
     } else {
        $("#own_address").val();
        $("#own_address").fadeOut(1000);
     }
  });
  //show personal adress input in update profile page
  $("#updated_role").change(function(){
     var allow_page = $(this).find(':selected').data('page');
     if(allow_page) {
        $("#hide_profile").fadeIn(1000);
        $("#personal_address_requred").val(1);
     } else {
        $("#hide_profile").fadeOut(1000);
        $("#personal_address_requred").val(0);
     }
     // console.log('test');
  });
  $("#account_disconnect").click(function(){
     $("#un_synch").val(1);
     $("#your-profile #submit").click();
  });
  $("#account_synch").click(function(){
     $("#synch").val(1);
     $("#your-profile #submit").click();
  });
  $("#account_dont_synch").click(function(){
     $("#synch").val(2);
     $("#your-profile #submit").click();
  });
});