/**
 * Admin entry point.
 */
// Admin Scripts
import parsePhoneNumber from 'libphonenumber-js';


 window.addEventListener('load', (event) => {
     
     
    let phone = document.querySelector('#cpnf_placeholder');
    if(phone != null){
        errorMsg(phone, 'warning')
    }
    let name = document.querySelector('#cpnf_name')
    if(name != null) {
        errorMsg(name,'warning-char')
    }
    
    /*
    * Validation on submit
    */
    let form = document.querySelector('#plugin-settings')
    form.addEventListener('submit', (ev) => {
        let nameStatus = true;
        let name = document.querySelector('#cpnf_name');


        // Replace spaces with underscore of name field
        name.value = (name.value).trim().replace(/ /g, "_");
        
        nameStatus = validateName();
        if(!nameStatus){        
            ev.preventDefault();
            name.focus();
        }
    });

        
    // Copy to Clipboard functionality
    let copyIcon = document.querySelectorAll('.copy-icn')
    Array.prototype.forEach.call(copyIcon, function(element) {        
        element.addEventListener('click', function() {
            let id = element.parentNode.children[0].id; 
            copyText(id);
        });
    });

});

// Copy Text 
function copyText(id) {
    /* Get the text field */
    var text = document.getElementById(id);
    var parentNode = text.parentNode.parentNode.parentNode;

    /* Select the text field */
    text.select();
    text.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");
    
    //display copy to clipboard message
    var copyMsg = document.querySelector('.copy-alert.cpnf_shortcode');
    if(!copyMsg.classList.contains('show-alert')){
        copyMsg.classList.add('show-alert')
    }

    //Hide copy message 
    setTimeout(()=>{
        if(copyMsg.classList.contains('show-alert')){
            copyMsg.classList.remove('show-alert');
        }
    }, 2000);

}

// Function for create a empty node for error msg
function errorMsg(selector, extraClass) {
    var invalidMsg = document.createElement('p');
    const message = document.createTextNode('');
    invalidMsg.appendChild(message);
    invalidMsg.classList.add('note-text', extraClass);
    selector.parentNode.insertBefore(invalidMsg, selector.nextSibling);
}

// Validate name field
function validateName(){

    let name = document.querySelector('#cpnf_name');
    let warningMsg = document.querySelector('.note-text.warning-char');
    let status = true;

    // Phone name required validation
    if(name.value == '') {
        status = false;
        warningMsg.innerHTML = 'This is a required field.';
    } else {
        // Phone name Special Character validation
        status = /^[a-zA-Z0-9_]+$/.test(name.value)
        warningMsg.innerHTML = 'Special character is not allowed.';
    }    

    setDisplay(warningMsg,status);
    return status;
}

//Set error message display
function setDisplay(selector, status){
    if(status == false){
        selector.style.display = 'block';
    }
    else
        selector.style.display = 'none';
}
