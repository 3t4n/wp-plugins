var id = jQuery('#id').val();
function addFormField() {
	

	if (id > 150) {
		alert( "You've reach the limit of the free version. Consider buying the pro version. A lifetime license is less than $39.");
	} else {
		jQuery("#far_itemlist").append(
		"<li id ='row" + id + "'>" +
			"<div class='achat-section-row'>" +
				"<div class='achat-left-content'>" +
				"<label for='achat-txt" + id + "'><h5>Title / Keyword</h5></label>" +
					
					"<input type='text' class='achat-title-inp' name='achat-txt["+ id +"]' id='achat-txt" + id + "'></input>" +
					"<label for='achat-txtarea" + id + "'><p>Typing the title/keyword in the message field automatically enters the full response</p></label>" +
			
					"<textarea name='achat-txtarea["+ id +"]' id='achat-txtarea" + id + "' cols='63' rows='5'></textarea></br>" +
					"<input type='checkbox' name='enable-dm["+ id +"]' id='enable-dm" + id + "' />" +
					"<label for='enable-dm" + id + "'>Set as instant message</label>" +
					"<p>It will show in a list, and clicking on a question will reveal its predefined answer</p>"+
					"<div class='del-btn'>" +
					"<input style='float:left' type='button' class='button right remove' value='Delete' onClick='removeFormField(\"#row" + id + "\"); return false;' />\n" +
					"<input type='submit' class='button-save' value='Save' />"+
				"</div>" +
				"</div>" +
				      // Add the new checkbox field here
					 
			"</div>" +

		"</li>"
);

id = (id - 1) + 2;
document.getElementById("id").value = id;
jQuery('html, body').animate({ scrollTop: jQuery("#row"+(id-1)).offset().top }, 1000);
	}
}

function removeFormField(id) {
	jQuery(id).remove();
}

jQuery(function() {
	jQuery( "#far_itemlist" );
});
  // Get the button and accordion elements
  const cancelButtons = document.querySelectorAll('.cancel-btn');
  const accordions = document.querySelectorAll('.accordion');
  
  // Add click event listener to each button
  cancelButtons.forEach(function(cancelButton) {
	cancelButton.addEventListener('click', function() {
	  //console.log('kar');
	  
	  // Remove 'active' class from all accordion elements
	  accordions.forEach(function(accordion) {
		accordion.classList.remove('active');
	  });
  
	  // Hide the panel element that is currently displayed
	  const panelWithInlineStyle = document.querySelector('.panel[style="display: block;"]');
	  
	  // Check if panel with inline style exists
	  if (panelWithInlineStyle) {
		// Add style using JavaScript
		panelWithInlineStyle.style.display = 'none';
	  }
  
	  // Reload the page
	 // location.reload();
	});
  });
  const cancelButtondef = document.getElementById('def-cancel');
  const accordionDef = document.getElementById('def-panel');
    // Add click event listener to the button
	cancelButtondef.addEventListener('click', function() {
		// Remove 'active' class from all panel elements
		cancelButtondef.classList.remove('active');
	
		// Hide all panel elements
		const panelWithInlineStyle = document.querySelector('.panel[style="display: block;"]');
		
		// Check if panel with inline style exists
		if (panelWithInlineStyle) {
		  // Add style using JavaScript
		  panelWithInlineStyle.style.display = 'none';
		}
	  });
   // Get the reset button
   const resetButton = document.getElementById('resetButton');

   // Add click event listener to the reset button
   resetButton.addEventListener('click', function() {
	 // Get the text area input field
	 
	 const textArea = document.getElementById('ch_greeting_field');
	 
	 // Reset the value of the text area input field
	 textArea.value = 'Hello! Welcome!';
   });
     // Get the reset button
	 const resetdefButton = document.getElementById('resetButtondef');

	 // Add click event listener to the reset button
	 resetdefButton.addEventListener('click', function() {
	   // Get the text area input field
	   const defTextarea = document.getElementById('ch_def_reply_field');
	   
	   // Reset the value of the text area input field
	   defTextarea.value = 'Thanks for contacting with us';
	 });

	 
	 document.addEventListener('DOMContentLoaded', (event) => {
		const modal = document.getElementById('modal');
		const modal1 = document.getElementById('modal1');
		const modalCommons =document.querySelectorAll('.setting-conf-modal')
		const repDeleteopenmodal = document.querySelectorAll('.remove');

		const openModalButton = document.getElementById('openModal');
		const openModalDefBtn = document.getElementById('openModalDefbtn');
		const closeButton = document.querySelectorAll('.close-button');
		const cancelButton = document.getElementById('cancelButton');
		const resetButton = document.getElementById('resetButton');
	
		openModalButton.addEventListener('click', () => {
			modal.style.display = 'block';
		});
	
		repDeleteopenmodal.forEach(button => {
			button.addEventListener('click', (event) => {
				// Get the clicked button (event.target)
				const clickedButton = event.target;
		
		
		
				// If you need to handle the parent element or other elements
				// const parentElement = clickedButton.closest('.del-btn');
				// if (parentElement) {
					// Find all '.repdel' class elements within the parent
					const innerRepdelElements = document.querySelectorAll('.repdel');
				
					innerRepdelElements.forEach(innerElement => {
						// Perform actions on each '.repdel' element
						innerElement.style.display = 'block';
					});
					
					// Display the modal
				
				//}
			});
		});
		openModalDefBtn.addEventListener('click',()=>{
			modal1.style.display = 'block';
			
		});

		// closeButton.addEventListener('click', () => {
		// 	modal.style.display = 'none';
		// });
		
		closeButton.forEach(button => {
			button.addEventListener('click', () => {
				modalCommons.forEach(modalCommon=>{
					modalCommon.style.display = 'none';
				});
			});
		});
	
		cancelButton.addEventListener('click', () => {
			modal.style.display = 'none';
		});
	
		resetButton.addEventListener('click', () => {
			// Add your reset logic here
			modal.style.display = 'none';
		});
	
		window.addEventListener('click', (event) => {
			if (event.target == modal) {
				modal.style.display = 'none';
			}
		});
	});

	