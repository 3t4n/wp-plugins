document.addEventListener('DOMContentLoaded', function () {
    console.log('FreightPOP Script Loaded');

    //  Login form password toggle code.
    const passwordInputs = document.querySelectorAll('[name="password"]');
    const eyeOpenIcons = document.querySelectorAll('.eye-open');
    const eyeCloseIcons = document.querySelectorAll('.eye-close');

    // Function to toggle password visibility
    function togglePasswordVisibility(index) {
        // Check the current type of the password input
        const passwordInput = passwordInputs[index];
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle the visibility of the icons
        eyeOpenIcons[index].classList.toggle('hide');
        eyeCloseIcons[index].classList.toggle('hide');
    }

    // Add event listeners to both icons
    if (eyeOpenIcons.length > 0 && eyeCloseIcons.length > 0) {
        eyeOpenIcons.forEach((icon, index) => {
            icon.addEventListener('click', () => togglePasswordVisibility(index));
        });

        eyeCloseIcons.forEach((icon, index) => {
            icon.addEventListener('click', () => togglePasswordVisibility(index));
        });
    } else {
        console.error('Eye icons not found in the DOM.');
    }


    // Get the connect button
    const connectButton = document.getElementById('userconnect');

    // Add event listener for the connect button click
    connectButton.addEventListener('click', async () => {

        // form field selector
        const sourceSelector = document.getElementById('source');
        const usernameSelector = document.getElementById('username');
        const passwordSelector = document.getElementById('password');

        // Get the selected source
        const source = document.getElementById('source').value;
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Output the values to the console (for testing)
        // Reset previous error styles and messages
        
        [sourceSelector, usernameSelector, passwordSelector].forEach((field) => {
            field.style.border = ''; // Reset border color
        });
        // Validate the fields
        let isValid = true;

        if (!source) {
            //alert('please select source');
            sourceSelector.style.border = '1px solid red';
            isValid = false;
        }

        if (!username) {
            usernameSelector.style.borderColor = 'red';
            isValid = false;
        }

        if (!password) {
            passwordSelector.style.borderColor = 'red';
            isValid = false;
        }

        if (isValid) {
            const apiUrl = (source == 'live')
            ?'https://enterprise.freightpop.com/token/getToken'
            :'https://sandbox-api.freightpop.com/token/getToken';

            jQuery.post(freightpopVars.ajaxurl, {
                action: 'freightpop_user_logged_in_data',
                security: freightpopVars.freightpopLoggedin,
                username: username,
                password: password,
                appurl: apiUrl,
                source: source
            })
            .done(function(response) {
                 console.log('My response data: ', response);
                if (response.Code === 200) {
                    jQuery('.login-form').addClass('hide');
                    jQuery('.general_setting').removeClass('hide');
                } else {
                   
                    jQuery('.form-error').text(response.Data);
                    jQuery('.form-error').show();
                }
            })
            .fail(function(xhr, status, error) {
                console.error(error);
            });
            
        } else {
            
        }

        // Here, you can proceed to do something with the data, such as sending it to a server
    });

    
    // Select all elements with specific IDs and classes
    const elements = document.querySelectorAll('#markupvalue, #discountvalue, .input-container input');

    elements.forEach(function(element) {
        element.addEventListener('keypress', function(event) {
            if (
                event.key === 'e' || 
                event.key === 'E' || 
                event.key === '+' || 
                event.key === '-' || 
                (event.key.length === 1 && !/^\d$/.test(event.key))
            ) {
                event.preventDefault();
            }
        });
    });


    const inputContainers = document.querySelectorAll('.input-container');
    const discountRuleSet = document.querySelectorAll('input[name="rule_is_met"]');
    discountRuleSet.forEach(radio => {
        radio.addEventListener('change', (event) => {
            inputContainers.forEach(container => {
                container.style.display = 'none'; // Hide all input containers
            });

            if (event.target.id !== 'norequirements') {
                const inputContainer = document.getElementById('input-' + event.target.id);
                if (inputContainer) {
                    inputContainer.style.display = 'block'; // Show the corresponding input container
                }
            }
        });
    });

});
function saveProductSettings(){ 
    const productSetting = document.getElementById('product_setting');
    const rateToDiplay = document.getElementById('rates_to_display');

    [productSetting, rateToDiplay].forEach((field) => {
        field.style.border = ''; // Reset border color
    });

    const productSettingVal = document.getElementById('product_setting').value;
    const rateToDiplayVal = document.getElementById('rates_to_display').value;

    let isValid = true;

    if (!productSettingVal) {
        //alert('please select source');
        productSetting.style.border = '1px solid red';
        isValid = false;
    }

    if (!rateToDiplayVal) {
        rateToDiplay.style.borderColor = 'red';
        isValid = false;
    }

    if (isValid) {
        jQuery.post(freightpopVars.ajaxurl, {
            action: 'freightpop_product_setting',
            security: freightpopVars.freightpopLoggedin,
            productsetting: productSettingVal,
            rateToDiplay: rateToDiplayVal
        })
        .done(function(response) {
            if (response.status == 200) {
                const data = response.data;
                console.log('data', data);
                const sourceName = (data.source == 'live') ? 'Production' : 'Sandbox';
                jQuery('#finalstepsource').val(sourceName);
                jQuery('#finalstepusername').val(data.username);
                jQuery('#finalsteppassword').val(data.password);
                
                const final_product_setting = document.getElementById('final_product_setting');
                const final_rates_to_display = document.getElementById('final_rates_to_display');
                
                if (data.productSetting) {
                    final_product_setting.value = data.productSetting;
                }
                
                if (data.ratesToDisplay) {
                    final_rates_to_display.value = data.ratesToDisplay;
                }
                
                jQuery('.general_setting').addClass('hide');
                jQuery('.final-step').removeClass('hide');
            }
        })
        .fail(function(xhr, status, error) {
            console.error(error);
        });
        
    }
}

function loggedOut(){
    jQuery.post(freightpopVars.ajaxurl, {
        action: 'freightpop_logged_out',
        security: freightpopVars.freightpopLoggedin,
    })
    .done(function(res) {
        if (res.success === true) {
            jQuery('.login-form').removeClass('hide');
            jQuery('.general_setting').addClass('hide');
            jQuery('.final-step').addClass('hide');
    
            // Clear all radio buttons
            let radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(function(radio) {
                radio.checked = false; 
            });
    
            // Reset all select dropdowns
            let selectDropdown = document.querySelectorAll('select');
            selectDropdown.forEach(function(select) {
                select.selectedIndex = 0; 
            });
    
            // Clear all text and number input fields
            let input = document.querySelectorAll('input[type="text"], input[type="number"]');
            input.forEach(function(input) {
                input.value = ''; 
            });
        }
    })
    .fail(function(error) {
        console.log(error);
    });
    
}


function addDiscount(){
    const discountType = document.getElementById('discounttype');
    const discountValue = document.getElementById('discountvalue');
    const discountApplyTo = document.getElementById('discountapplyto');

    [discountType, discountValue, discountApplyTo].forEach((field) => {
        field.style.border = ''; // Reset border color
    });

    const discountTypeVal = document.getElementById('discounttype').value;
    const discountValueVal = document.getElementById('discountvalue').value;
    const discountApplyToVal = document.getElementById('discountapplyto').value;
    

    const radios = document.getElementsByName('rule_is_met');

    const selectedRadio = document.querySelector('input[name="rule_is_met"]:checked');

    let isValid = true;

    if (selectedRadio) {
        const selectedValue = selectedRadio.id;
        var ruleSet = selectedRadio.value;
        if(ruleSet != 'No minimum requirements'){
            const inputContainer = document.getElementById('input-' + selectedValue);
            var inputValueData = inputContainer ? inputContainer.querySelector('input').value : '';
            if(inputValueData == ''){
                isValid = false;
                inputContainer.querySelector('input').style.border = '1px solid red';
            }else{
                inputContainer.querySelector('input').style.border = '';
            }
        }else{
            inputValueData = '';
        }
        
    }

    let radioSelected = false;

    for (const radio of radios) {
        if (radio.checked) {
            radioSelected = true;
            break;
        }
    }

    const errorDiv = document.getElementById('discount-error');
    if (radioSelected) {
        errorDiv.style.display = 'none';
    } else {
        errorDiv.style.display = 'block';
    }

    if (!discountTypeVal) {
        //alert('please select source');
        discountType.style.border = '1px solid red';
        isValid = false;
    }

    if (!discountValueVal) {
        discountValue.style.borderColor = 'red';
        isValid = false;
    }
    

    if (!discountApplyToVal) {
        discountApplyTo.style.borderColor = 'red';
        isValid = false;
    }
    if(isValid && radioSelected){
        document.getElementById('discountsave').disabled = true;
        jQuery.post(freightpopVars.ajaxurl, {
            action: 'freightpop_add_discount_rules',
            security: freightpopVars.freightpopLoggedin,
            discounttype: discountTypeVal,
            discountvalue: discountValueVal,
            discountapplyto: discountApplyToVal,
            ruleset: ruleSet,
            rulevalue: inputValueData
        })
        .done(function(res) {
            console.log('Markup - ', res);
            if (res.status == 200) {
                restoreMarkUpsORDiscount('discounts');
                document.querySelector('.close[data-bs-dismiss="modal"]').click();
        
                document.querySelectorAll('.input-container').forEach((field) => {
                    field.style.display = 'none'; // Reset border color
                });
                [discountType, discountValue, discountApplyTo].forEach((field) => {
                    field.value = ''; // Reset border color
                });
                for (const radio of radios) {
                    radio.checked = false;
                }
                document.getElementById('discountsave').disabled = false;
            }
        })
        .fail(function(error) {
            console.log(error);
        });
        
    }
    
}

function addMarkUps(){
   
    const markupType = document.getElementById('markuptype');
    const markupValue = document.getElementById('markupvalue');
    const applyTo = document.getElementById('applyto');

    [markupType, markupValue, applyTo].forEach((field) => {
        field.style.border = ''; // Reset border color
    });

    const markupTypeVal = document.getElementById('markuptype').value;
    const markupValueVal = document.getElementById('markupvalue').value;
    const applyToVal = document.getElementById('applyto').value;

    let isValid = true;

    if (!markupTypeVal) {
        //alert('please select source');
        markupType.style.border = '1px solid red';
        isValid = false;
    }

    if (!markupValueVal) {
        markupValue.style.borderColor = 'red';
        isValid = false;
    }
    

    if (!applyToVal) {
        applyTo.style.borderColor = 'red';
        isValid = false;
    }
    if(isValid){
        document.getElementById('markupsave').disabled = true;
        jQuery.post(freightpopVars.ajaxurl, {
            action: 'freightpop_add_markups_rules',
            security: freightpopVars.freightpopLoggedin,
            markuptype: markupTypeVal,
            markupvalue: markupValueVal,
            applyto: applyToVal
        })
        .done(function(res) {
            console.log('Markup - ', res);
            if (res.status == 200) {
                restoreMarkUpsORDiscount('markups');
                document.querySelector('[data-bs-dismiss="modal"]').click();
                [markupType, markupValue, applyTo].forEach((field) => {
                    field.value = ''; // Reset border color
                });
                document.getElementById('markupsave').disabled = false;
            }
        })
        .fail(function(error) {
            console.log(error);
        });
        
    }
    
}

function get_markup_data(id,tablename){
    jQuery.post(freightpopVars.ajaxurl, {
        action: 'freightpop_markup_or_discount',
        security: freightpopVars.freightpopLoggedin,
        id: id,
        tablename: tablename
    })
    .done(function(res) {
        let data = res.data;
        if (res.status == 200) {
            const updatemarkupType = document.getElementById('update-markuptype');
            const updatemarkupValue = document.getElementById('update-markupvalue');
            const updateapplyTo = document.getElementById('update-applyto');  
            const updatemarkupID = document.getElementById('update-markupid');                
            
            if (data.type) {
                updatemarkupType.value = data.type;
            }
            if (data.value) {
                updatemarkupValue.value = data.value;
            }
            if (data.applyTo) {
                updateapplyTo.value = data.applyTo; 
            }
            if (data.id) {
                updatemarkupID.value = data.id;
            }                
        }
    })
    .fail(function(error) {
        console.log(error);
    });
    
}
function get_discount_data(id,tablename){
    jQuery.post(freightpopVars.ajaxurl, {
        action: 'freightpop_markup_or_discount',
        security: freightpopVars.freightpopLoggedin,
        id: id,
        tablename: tablename
    })
    .done(function(res) {
        let data = res.data;
        if (res.status == 200) {
            // Set the discount type (dropdown)
            const editDiscountType = document.getElementById('editDiscountType');
            const editDiscountValue = document.getElementById('editDiscountValue');
            const editApplyTo = document.getElementById('editApplyTo');
            const editNoRequirements = document.getElementById('editNoRequirements');
            const editMinimumOrderValue = document.getElementById('editMinimumOrderValue');
            const editRateGreater = document.getElementById('editRateGreater');
            const editRateLess = document.getElementById('editRateLess');
            const inputMinimumOrderValue = document.getElementById('editInput-editMinimumOrderValue').querySelector('input');
            const inputRateGreater = document.getElementById('editInput-editRateGreater').querySelector('input');
            const inputRateLess = document.getElementById('editInput-editRateLess').querySelector('input');
            const discountid = document.getElementById('discountid');  
    
            // Populate form fields with data from the response
            if (data.type) {
                editDiscountType.value = data.type;
            }
            if (data.value) {
                editDiscountValue.value = data.value;
            }
            if (data.applyTo) {
                editApplyTo.value = data.applyTo;
            }
            if (data.id) {
                discountid.value = data.id;
            }
    
            const inputContainers = document.querySelectorAll('.input-container');
            inputContainers.forEach(container => {
                container.style.display = 'none'; // Hide all input containers
            });
    
            // Handle conditions for "Applied when the following rule is met."
            if (data.condition === "No minimum requirements") {
                editNoRequirements.checked = true;
            } else if (data.condition === "Minimum order value") {
                editMinimumOrderValue.checked = true;
                inputMinimumOrderValue.value = data.conditionValue; // Set minimum order value
                document.getElementById('editInput-editMinimumOrderValue').style.display = 'block';
            } else if (data.condition === "FreightPOP rate greater than") {
                editRateGreater.checked = true;
                inputRateGreater.value = data.conditionValue; // Set FreightPOP rate greater
                document.getElementById('editInput-editRateGreater').style.display = 'block';
            } else if (data.condition === "FreightPOP rate less than") {
                editRateLess.checked = true;
                inputRateLess.value = data.conditionValue; // Set FreightPOP rate less
                document.getElementById('editInput-editRateLess').style.display = 'block';
            }
    
            const discountRuleSet = document.querySelectorAll('input[name="edit_rule_is_met"]');
            discountRuleSet.forEach(radio => {
                radio.addEventListener('change', (event) => {
                    inputContainers.forEach(container => {
                        container.style.display = 'none'; // Hide all input containers
                    });
    
                    if (event.target.id !== 'norequirements') {
                        const inputContainer = document.getElementById('editInput-' + event.target.id);
                        if (inputContainer) {
                            inputContainer.style.display = 'block'; // Show the corresponding input container
                        }
                    }
                });
            });
        }
    })
    .fail(function(error) {
        console.log(error);
    });
    
}
function updateMarkUps(){
    const updatemarkupType = document.getElementById('update-markuptype');
    const updatemarkupValue = document.getElementById('update-markupvalue');
    const updateapplyTo = document.getElementById('update-applyto');
       

    [updatemarkupType, updatemarkupValue, updateapplyTo].forEach((field) => {
        field.style.border = ''; // Reset border color
    });

    const updatemarkupTypeVal = document.getElementById('update-markuptype').value;
    const updatemarkupValueVal = document.getElementById('update-markupvalue').value;
    const updateapplyToVal = document.getElementById('update-applyto').value;
    const updatemarkupID = document.getElementById('update-markupid').value;  
    let isValid = true;
    if(!updatemarkupID){
        isValid = false;
    }
    if (!updatemarkupTypeVal) {
        //alert('please select source');
        updatemarkupType.style.border = '1px solid red';
        isValid = false;
    }

    if (!updatemarkupValueVal) {
        updatemarkupValue.style.borderColor = 'red';
        isValid = false;
    }
    

    if (!updateapplyToVal) {
        updateapplyTo.style.borderColor = 'red';
        isValid = false;
    }
    if(isValid){
        console.log('updatemarkupID',updatemarkupID);
         // Create form data for the POST request
        jQuery.post(freightpopVars.ajaxurl, {
            action: 'freightpop_edit_markups_rules',
            security: freightpopVars.freightpopLoggedin,
            markuptype: updatemarkupTypeVal,
            markupvalue: updatemarkupValueVal,
            applyto: updateapplyToVal,
            id: updatemarkupID
        })
        .done(function(res) {
            restoreMarkUpsORDiscount('markups');
            document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(function(el) {
                el.click();
            });
        })
        .fail(function(error) {
            console.error('Error:', error);
        });
        
    }
    
}
function editDiscount() {
    const editDiscountType = document.getElementById('editDiscountType');
    const editDiscountValue = document.getElementById('editDiscountValue');
    const editDiscountApplyTo = document.getElementById('editApplyTo');

    [editDiscountType, editDiscountValue, editDiscountApplyTo].forEach((field) => {
        if (field) {
            field.style.border = ''; // Reset border color
        }
    });

    const editDiscountTypeVal = document.getElementById('editDiscountType').value;
    const editDiscountValueVal = document.getElementById('editDiscountValue').value;
    const editDiscountApplyToVal = document.getElementById('editApplyTo').value;

    const editRadios = document.getElementsByName('edit_rule_is_met');
    const selectedEditRadio = document.querySelector('input[name="edit_rule_is_met"]:checked');

    let isValid = true;
    let editInputValueData = '';

    if (selectedEditRadio) {
        const selectedEditValue = selectedEditRadio.id;
        var editRuleSet = selectedEditRadio.value;

        if (editRuleSet !== 'No minimum requirements') {
            const editInputContainer = document.getElementById('editInput-' + selectedEditValue);
            
            editInputValueData = editInputContainer ? editInputContainer.querySelector('input').value : '';
            if (editInputValueData === '') {
                isValid = false;
                editInputContainer.querySelector('input').style.border = '1px solid red';
            } else {
                editInputContainer.querySelector('input').style.border = '';
            }
        }
    }

    let editRadioSelected = false;

    for (const editRadio of editRadios) {
        if (editRadio.checked) {
            editRadioSelected = true;
            break;
        }
    }

    const editErrorDiv = document.getElementById('editDiscountError');
    if (editRadioSelected) {
        editErrorDiv.style.display = 'none';
    } else {
        editErrorDiv.style.display = 'block';
    }

    if (!editDiscountTypeVal) {
        editDiscountType.style.border = '1px solid red';
        isValid = false;
    }

    if (!editDiscountValueVal) {
        editDiscountValue.style.borderColor = 'red';
        isValid = false;
    }

    if (!editDiscountApplyToVal) {
        editDiscountApplyTo.style.borderColor = 'red';
        isValid = false;
    }

    if (isValid && editRadioSelected) {
        document.getElementById('editDiscountSave').disabled = true;
        const id = document.getElementById('discountid').value;
        jQuery.post(freightpopVars.ajaxurl, {
            action: 'freightpop_edit_discount_rules',
            security: freightpopVars.freightpopLoggedin,
            discounttype: editDiscountTypeVal,
            discountvalue: editDiscountValueVal,
            discountapplyto: editDiscountApplyToVal,
            ruleset: editRuleSet,
            rulevalue: editInputValueData,
            id: id
        })
        .done(function(res) {
            const data = res.data;
            if (data.status === 200) {
                restoreMarkUpsORDiscount('discounts');
                document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(function(el) {
                    el.click();
                });
        
                document.querySelectorAll('.input-container').forEach((field) => {
                    field.style.display = 'none'; // Reset input fields
                });
                [editDiscountType, editDiscountValue, editDiscountApplyTo].forEach((field) => {
                    field.value = ''; // Reset input values
                });
                for (const editRadio of editRadios) {
                    editRadio.checked = false;
                }
                document.getElementById('editDiscountSave').disabled = false;
            }
        })
        .fail(function(error) {
            console.log(error);
        });
        
    }
}


function deleteMarkUps(id,tablename){
    if (confirm("Are you sure for deleting Data") == true) {
        jQuery.post(freightpopVars.ajaxurl, {
            action: 'freightpop_delete_discount_or_markups',
            security: freightpopVars.freightpopLoggedin,
            id: id,
            tablename: tablename
        })
        .done(function(res) {
            if (res.success === true) {
                // console.log(`Removed ${tablename}`, res);
                restoreMarkUpsORDiscount(tablename);
            }
        })
        .fail(function(error) {
            console.log(error);
        });
        
      } 
}

function restoreMarkUpsORDiscount(tablename){
    jQuery.post(freightpopVars.ajaxurl, {
        action: 'freightpop_restore_markup_or_discount_data',
        security: freightpopVars.freightpopLoggedin,
        tablename: tablename
    })
    .done(function(res) {
        if (tablename === 'markups') {
            jQuery('#markupstbody').html(res.data.html);
        } else {
            jQuery('#discounttbody').html(res.data.html);
        }
    })
    .fail(function(error) {
        console.log(error);
    });
    
}

function updateProductSettings(){
    jQuery('.settings-change').removeClass('hide');
}
function onChangeUpdateProductSettings(){
   
    const productSettingVal = document.getElementById('final_product_setting').value;
    const rateToDiplayVal = document.getElementById('final_rates_to_display').value;
    
    jQuery.post(freightpopVars.ajaxurl, {
        action: 'freightpop_product_setting', 
        security: freightpopVars.freightpopLoggedin,
        productsetting: productSettingVal,
        rateToDiplay: rateToDiplayVal
    })
    .done(function(response) {
        console.log(response);
        if (response.status === 200) {
            jQuery('.settings-change').addClass('hide');
        }
    })
    .fail(function(xhr, status, error) {
        console.error(error);
    });
    
}


