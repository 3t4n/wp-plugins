(function($){

	 
       //almost done modal dialog here 
       $( "#esig-cf7-almost-done" ).dialog({
			  dialogClass: 'esig-dialog',
			  height:350,
			  width:350,
			  modal: true,
			});
            
      // do later button click 
       $( "#esig-cf7-setting-later" ).click(function() {
          $( '#esig-cf7-almost-done' ).dialog( "close" );
        });
      
     
		
})(jQuery);


let esigCf7Button = document.querySelector(".postbox-container .submit .button-primary");

// reminder options validation added from javascripts 
if (esigCf7Button) {
  esigCf7Button.addEventListener("click", esigCf7ReminderSettings);
}

function esigCf7ReminderSettings(e) {

  // checking for reminder options checked or not 
  if (document.querySelector("#settings-signing_reminder_email").checked) {
    let firstInverval = document.querySelector("#settings-esig-reminder-first-interval");
    let secondInverval = document.querySelector("#settings-esig-reminder-second-interval");
    let lastInverval = document.querySelector("#settings-esig-reminder-last-interval");

    let error = false;

    // checking first interval  
    if (!isNaN(firstInverval.value) && firstInverval.value <= 0) {
      firstInverval.style.borderColor = "red";
      error = true;
    }
    else {
      firstInverval.style.borderColor = "";
    }
    // checking second interval  
    if (!isNaN(secondInverval.value) && secondInverval.value <= 0) {
      secondInverval.style.borderColor = "red";
      error = true;
    }
    else {
      secondInverval.style.borderColor = "";
    }
    // check third and final internval 
    if (!isNaN(lastInverval.value) && lastInverval.value <= 0) {
      lastInverval.style.borderColor = "red";
      error = true;
    }
    else {
      lastInverval.style.borderColor = "";
    }

    var enabled_reminder = document.getElementById('settings-signing_reminder_email').value;

    if(enabled_reminder){

      if (parseInt(secondInverval.value) <= parseInt(firstInverval.value)) {
        document.getElementById('second-reminder-error').removeAttribute('style');
        secondInverval.style.borderColor = "red";
        error = true;
      }else{
        document.getElementById('second-reminder-error').setAttribute('style','display:none')
        secondInverval.style.borderColor = "";
      }
      if (parseInt(lastInverval.value) <= parseInt(secondInverval.value)) {
        document.getElementById('last-reminder-error').removeAttribute('style');
        lastInverval.style.borderColor = "red";
        error = true;
      }else{
        document.getElementById('last-reminder-error').setAttribute('style','display:none')
        lastInverval.style.borderColor = "";
      }

    }

    if (error) {
      e.preventDefault();
    }

  }

}