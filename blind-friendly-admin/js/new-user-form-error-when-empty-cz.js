(function($) {
  $(function() {
    var form = document.getElementById("createuser");
    form.addEventListener("submit", function(e) { 
        if (form.user_login.value == "") {
          alert( "Prosím vyplňte uživatelské jméno!" );
          form.user_login.focus();
          return false ;
        }       
        if (form.email.value == "") {
          alert( "Prosím vyplňte emailovou adresu!" );
          form.email.focus();
          return false ;
        }
        if (form.pass1.value == "") {
          alert( "Prosím vyplňte heslo!" );
          form.pass1.focus();
          return false ;
        }
        if (form.pass2.value == "") {
          alert( "Prosím vyplňte heslo podruhé!" );
          form.pass2.focus();
          return false ;
        }
        
  // ** END **
  return true;

    });   
          
                  
  });
})(jQuery);





