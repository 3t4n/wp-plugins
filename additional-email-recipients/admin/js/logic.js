//declarations
		$ = jQuery;
		
document.addEventListener("DOMContentLoaded", function () {

	//alert('additional emails content loaded');
	//alert(custom_additionalemails_logic_object.ajax_url);
    });//DOMContentLoaded

/* function lilTest(){
	alert(custom_additionalemails_logic_object.ajax_url);
} */
function arrowD07137738_isValidEmail(email) {
    const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email.trim());
}//arrowD07137738_isValidEmail

function arrowD07137738_validateEmails(inputs) {
    let allValid = true;
    for (var i = 0; i < inputs.length; i++) {
        // Skip validation if the input is empty
        if (inputs[i].value.trim() === '') {
            inputs[i].style.border = '1px solid grey';
            continue;
        }
	const emails = inputs[i].value.split(',');
        let isValid = true;
        for (let email of emails) {
            if (email.trim() !== '' && !arrowD07137738_isValidEmail(email)) {
                isValid = false;
                break;
            }
        }

        if (!isValid) {
            inputs[i].style.border = '1px solid red';
            allValid = false;
        } else {
            inputs[i].style.border = '1px solid grey';
        }
    }
    return allValid;
}//arrowD07137738_validateEmails

function arrowD07137738_checkForSavesToEmails(event) {
    event.preventDefault(); //stop form post
//	 alert('clicked');
	// return;
    var theFrm = document.getElementById('arrowD07137738_additionalEmailsDiv');
    var inputs = theFrm.getElementsByTagName('input');
    var inputDetails = {};

    if (arrowD07137738_validateEmails(inputs)) {
        for (var i = 0; i < inputs.length; i++) {
            inputDetails[inputs[i].name] = { id: inputs[i].id, value: inputs[i].value };
        }
        //send for saving
		arrowD07137738_showLoadingOverlay();
        arrowD07137738_savesTheAdditionalEmails_js(inputDetails);
    } else {
        alert('Please fix the incorrect email values');
    }
}//arrowD07137738_checkForSavesToEmails

function arrowD07137738_savesTheAdditionalEmails_js(inputDetails){
	
//	alert('saving data');
		// Make the AJAX request    
        $.ajax({
            type: 'POST',
			dataType: 'json',
            url: custom_additionalemails_logic_object.ajax_url,
        data: {
            action: 'arrowD07137738_savesTheAdditionalEmails',
			nonce:custom_additionalemails_logic_object.nonce,
			inputDetails:JSON.stringify(inputDetails),
        },
		success: function(response) {
            // Decode the JSON response data
			//var returnedResult = JSON.parse(response);
			//console.log(returnedResult);
			//console.log(response);
			arrowD07137738_updateAndFadeOutOverlay();
        },
        })
		.fail(function(jqXHR, textStatus, errorThrown) {
		arrowD07137738_hideLoadingOverlay();
		alert("There has been an issue saving. If this issue persists, please contact support.");
		});
}//arrowD07137738_savesTheAdditionalEmails

function arrowD07137738_hideLoadingOverlay() {
    document.getElementById('arrowD07137738loadingOverlay').style.display = 'none';
}

function arrowD07137738_showLoadingOverlay() {
    var loadingOverlay = document.getElementById('arrowD07137738loadingOverlay');
	loadingOverlay.style.display = 'flex';
	loadingOverlay.style.opacity = '1';
	document.getElementById('arrowD07137738OverlayLoaderSpinner').style.display = 'block';
	document.getElementById('arrowD07137738OverlayLoaderText').style.display = 'none';
}
function arrowD07137738_updateAndFadeOutOverlay() {
    var overlay = document.getElementById('arrowD07137738loadingOverlay');
	document.getElementById('arrowD07137738OverlayLoaderSpinner').style.display = 'none';
	document.getElementById('arrowD07137738OverlayLoaderText').style.display = 'block';

    // Fade out effect
    var opacity = 1; // Initial opacity
    var intervalID = setInterval(function() {
        if (opacity <= 0.1) {
            clearInterval(intervalID);
            overlay.style.display = 'none';
            overlay.style.opacity = 1;
        }
        overlay.style.opacity = opacity;
        opacity -= opacity * 0.1;
    }, 50);
}//updateAndFadeOutOverlay

function arrowD7137738_closeOrOpenApiPanel(hideOrShow){
	var apiPanelDiv = document.getElementById('arrowD071377382_API_allPageDiv_id');
	apiPanelDiv.style.display = hideOrShow;
}//arrowD7137738_closeApiPanel


function arrowD7137738_closeOrOpenEmailLogPanel(hideOrShow){
	var emailLogPanelDiv = document.getElementById('arrowD071377382_emailLogDivAll');
	emailLogPanelDiv.style.display = hideOrShow;
}//arrowD7137738_closeApiPanel

function arrowD7137738_viewEmailSent(event){
	var btnClicked = event.target;
	var email_id = btnClicked.value;
	arrowD07137738_getTheSentEmail_js(email_id);
}//arrowD7137738_viewEmailSent

function arrowD07137738_getTheSentEmail_js(email_id){
	alert('getting mail details');
		// Make the AJAX request    
        $.ajax({
            type: 'POST',
			dataType: 'json',
            url: custom_additionalemails_logic_object.ajax_url,
        data: {
            action: 'arrowD07137738_getTheSentEmail',
			nonce:custom_additionalemails_logic_object.nonce,
			email_id:email_id,
        },
		success: function(response) {
            // Decode the JSON response data
			var emailDetails = response.data[0];
			console.log(emailDetails);
			arrowD07137738_showEmailContents(emailDetails);
			//arrowD07137738_updateAndFadeOutOverlay();
        },
        })
		.fail(function(jqXHR, textStatus, errorThrown) {
		//arrowD07137738_hideLoadingOverlay();
		alert("There has been an getting the email sent. If this issue persists, please contact support.");
		});
}//arrowD07137738_savesTheAdditionalEmails

function arrowD07137738_showEmailContents(emailDetails) {
	console.log(emailDetails.email_subject);
    // Create a popup-style div
    var popupDiv = document.createElement('div');
    popupDiv.classList.add('popup');

    // Create elements to display email details
    var toLabel = document.createElement('p');
    toLabel.textContent = 'To: ' + emailDetails.email_to;

    var subjectLabel = document.createElement('p');
    subjectLabel.textContent = 'Subject: ' + emailDetails.email_subject;

    var dateSentLabel = document.createElement('p');
    dateSentLabel.textContent = 'Date Sent: ' + emailDetails.sent_date;

    var statusLabel = document.createElement('p');
    statusLabel.textContent = 'Status: ' + emailDetails.status;

    // Create buttons
    var viewTextButton = document.createElement('button');
    viewTextButton.textContent = 'View As Text';
    viewTextButton.onclick = function() {
        // Display email message as text
        displayContent(emailDetails.email_message);
    };

    var viewHTMLButton = document.createElement('button');
    viewHTMLButton.textContent = 'View As HTML';
    viewHTMLButton.onclick = function() {
        // Display email message as HTML
        displayContent(emailDetails.email_message, true);
    };

    var viewErrorButton = document.createElement('button');
    viewErrorButton.textContent = 'View Error Message';
    viewErrorButton.onclick = function() {
        // Display error message
        displayContent(emailDetails.error_message);
    };

    // Append elements to popupDiv
    popupDiv.appendChild(toLabel);
    popupDiv.appendChild(subjectLabel);
    popupDiv.appendChild(dateSentLabel);
    popupDiv.appendChild(statusLabel);
    popupDiv.appendChild(viewTextButton);
    popupDiv.appendChild(viewHTMLButton);
    popupDiv.appendChild(viewErrorButton);

    // Append popupDiv to body
	var singleEmailDisplay = document.getElementById('arrowD07137738singleEmailDisplay');
    singleEmailDisplay.appendChild(popupDiv);
	singleEmailDisplay.style.display = 'block';
}

// Function to display content in popup
function displayContent(content, isHTML = false) {
    var popupContent = document.createElement('div');
    if (isHTML) {
        popupContent.innerHTML = content;
    } else {
        popupContent.textContent = content;
    }

    // Check if popup already exists, remove it if it does
    var existingPopup = document.querySelector('.popup-content');
    if (existingPopup) {
        existingPopup.parentNode.removeChild(existingPopup);
    }

    popupContent.classList.add('popup-content');
    document.querySelector('.popup').appendChild(popupContent);
}
