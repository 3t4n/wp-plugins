/**
 * Frontend entry point.
 *
 * src/front/front-index.js
 */
import parsePhoneNumber from 'libphonenumber-js';

window.addEventListener('load', (event) => {
    const phoneSelector = document.querySelector('#'+options.phone_id);
    if(phoneSelector!=null) {

        //Add a validation message
        var invalidSpan = document.createElement('span');
        const message = document.createTextNode(options.invalid_msg);
        invalidSpan.appendChild(message);
        invalidSpan.classList.add('invalid-msg');
        phoneSelector.parentNode.insertBefore(invalidSpan,phoneSelector.nextSibling);
    
        //Handle formatting and add validation class in phone number field
        phoneSelector.addEventListener('change', (e) => {
            var phoneNumber = e.target.value;
            const phnoObj = parsePhoneNumber(e.target.value, options.default_country);
            let invalid = false;
            
            if(phoneNumber.length>0){
                if(phnoObj){
                    phoneSelector.value = phnoObj.formatInternational();    
                    if(phnoObj.isValid() === false){
                        invalid = true;
                    }
                }else{
                    invalid = true;
                }
        
                if(invalid === true)
                    phoneSelector.classList.add('invalid-phno');
                else
                    phoneSelector.classList.remove('invalid-phno');
    
            }else
                phoneSelector.classList.remove('invalid-phno');
            
        });
    
        //Handle form submission in case of invalid value
        var form = document.querySelector('.wpcf7-submit');  ;
        form.addEventListener('click', (event) => {
            if( phoneSelector.classList.contains('invalid-phno')  === true ){
                event.preventDefault();            
                let children = phoneSelector.parentNode.children;
                for(let i=0; i<children.length; i++){
                    if(children[i].classList.contains('wpcf7-not-valid-tip')){
                        children[i].style.display='none';
                    }
                }
                phoneSelector.nextSibling.style.display = 'block';
            }else{
                phoneSelector.nextSibling.style.display = 'none';
            }        
        }, false)    
    }
});
