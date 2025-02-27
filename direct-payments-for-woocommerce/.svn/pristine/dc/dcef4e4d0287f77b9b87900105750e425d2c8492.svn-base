jQuery(document).ready(function($) { 

    function digagespoppay() {
        
       
        jQuery(document).ready(function ($) {
    

            
    //   document.addEventListener('DOMContentLoaded', function () {
    //     const container = document.querySelector('.tumaz-direct-container');
    //     const contentZIndex = parseInt(window.getComputedStyle(document.querySelector('#Content')).zIndex, 10) || 0;
    //     const newZIndex = contentZIndex + 1;
    
    //     if (container) {
    //         // Apply new z-index to all children of .tumaz-direct-container
    //         container.querySelectorAll('*').forEach((element) => {
    //             element.style.zIndex = newZIndex;
    //             element.style.position = 'relative'; // Ensure positioning for z-index to work
    //         });
    //     }
    // });


            let selectedMethod = '';
            let selectedOption = null;
            let uploadedFile = null;
            let createdOrderId = null; // Declare it here to be accessible globally 
            // Define a global variable
            let redirectUrl = '';
        
            // dfdsd
            $(document).ready(function() {
            
              // Check screen width before handling the click events 
                $(document).on('click', '.btnx', function() {
                if (window.matchMedia("(max-width: 767px)").matches) {
                  // For mobile view, hide .allbtn and show .allclass
                  $(".allbtn").hide();
                  $(".allclass").removeClass("hidden").addClass("show");
                } else {
                }
              });
        
              // Hide .allclass when .goback is clicked, show .allbtn again 
                $(document).on('click', '.goback', function() {
                $(".allclass").removeClass("show").addClass("hidden");
                $(".allbtn").show();
              });
              
            });
        
            // dsjdbjb
            
            jQuery(document).ready(function ($) {
                // Remove any previously attached handler before adding a new one
                $(document).off('click', '.digages_add-order-to-cart-button').on('click', '.digages_add-order-to-cart-button', function (e) {
                   // console.log('.digages_add-order-to-cart-button clicked'); // Debugging log
                    e.preventDefault();
            
                    if (confirm("Do you want to cancel this payment?")) {
                        var nonce = $(this).data('nonce');
                        var orderId = $('.orderNumberDisplay').first().text().trim();
                        var currentUrl = window.location.href;
            
                        $.ajax({
                            url: ajax_object.ajaxurl,
                            type: 'POST',
                            data: {
                                action: 'digages_add_order_to_cart',
                                nonce: nonce,
                                order_id: orderId,
                                return_url: currentUrl
                            },
                            success: function (response) {
                                if (response.success) {
                                    // Redirect to our virtual page
                                    window.location.href = ajax_object.site_url + '/digages-order-canceledl';
                                } else {
                                    $('#order-cart-message').text(response.data || 'Error adding products to cart.');
                                }
                            },
                            error: function () {
                                $('#order-cart-message').text('An error occurred while adding products to the cart.');
                            }
                        });
                    } else {
                        //console.log("User canceled the action.");
                    }
                });
            });

            
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '.nav-linkt', function() {
                //console.log('.nav-linkt clicked'); // Debugging log

                let tabId = $(this).attr('href');
                let isP2pTab = $(this).attr('id').startsWith('tab-p2p');
                
                if (isP2pTab) {
                    // Get the data for this specific P2P tab
                    let p2pName = $(tabId + ' .ppname').text();
                    let p2pType = $(tabId + ' .ppityp').text();
                    let p2pId = $(tabId + ' .ppid').text();
                    let p2pAccount = $(tabId + ' .ppcnme').text();
            
                    // Update the hidden fields if they exist
                    if ($(tabId).find('.rec1n').length) {
                        $('.rec1n').text(p2pName);
                        $('.rec2t').text(p2pType);
                        $('.rec3i').text(p2pId);
                        $('.rec4a').text(p2pAccount);
                    }
                }

                selectedMethod = $(this).text().trim();
                //console.log(selectedMethod);
            // Update the HTML element with id "output" to display the selected method
            $('.mobhedtumaz').text(selectedMethod); 
            
            });

            
        
         
        
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '#nextToStep2', function() {
               // console.log('#nextToStep2 clicked'); // Debugging log
 
            let selectedMethod = $('.nav-linkt.active').attr('id');  // Get the active tab's ID
    let selectedValue = '';
    let isValid = false;  // Add a validation flag

        
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-bank')) {
                let btDetails = $('.tab-pane.active .bankt').html();  // Fetch P2P details from the active tab
                selectedValue = btDetails ? 'Bank transfer Payment Selected' : '';  // Ensure it's not empty 
        
                selectedValue = $('#bankTransferSelect').val();
                
                isValid = true;
            } else if (selectedMethod.startsWith('tab-mobile')) {
                
                let mmDetails = $('.tab-pane.active .mmt').html();  // Fetch P2P details from the active tab
                selectedValue = mmDetails ? 'Mobile Money Payment Selected' : '';  // Ensure it's not empty
        
                selectedValue = $('#mobileMoneySelect').val(); 
                
                isValid = true;
            }  
            else if (selectedMethod.startsWith('tab-crypto')) {
                
                let crDetails = $('.tab-pane.active .cet').html();  // Fetch P2P details from the active tab
                selectedValue = crDetails ? 'crypto Money Payment Selected' : '';  // Ensure it's not empty
        
                selectedValue = $('#cryptoMoneySelect').val(); 
                isValid = true;
                //console.log(crDetails);
                //console.log(selectedValue);
                
            }
             else if (selectedMethod.startsWith('tab-p2p')) {
            // For P2P, check if the active tab has the required elements
            let activePane = $('.tab-pane.active');
            let hasRequiredElements = activePane.find('.ppname').length > 0 && 
                                    activePane.find('.ppityp').length > 0 && 
                                    activePane.find('.ppid').length > 0;
            
            if (hasRequiredElements) {
                selectedValue = 'P2P Payment Selected';
                isValid = true;
                
                // Get the details from the active tab
             
                // No dropdown for P2P, so fetch details directly from the P2P content section
                let p2pDetails = $('.tab-pane.active .rec').html();  // Fetch P2P details from the active tab
                let p2pName = $('.tab-pane.active .rec1n').html();  // Fetch P2P details from the active tab
                let p2pType = $('.tab-pane.active .rec2t').html();  // Fetch P2P details from the active tab
                let p2pId = $('.tab-pane.active .rec3i').html();  // Fetch P2P details from the active tab
                let p2pAccount = $('.tab-pane.active .rec4a').html();  // Fetch P2P details from the active tab
                selectedValue = p2pDetails ? 'P2P Payment Selected' : '';  // Ensure it's not empty 
                $('.tumazp2pname').text(p2pName);
                $('.tumazp2ptype').text(p2pType);
                $('.tumazp2pid').text(p2pId);
                $('.tumazp2paccount').text(p2pAccount); 
        
            }
        }        
        // else if (selectedMethod.startsWith('tab-p2p')) {
        //         // No dropdown for P2P, so fetch details directly from the P2P content section
        //         let p2pDetails = $('.tab-pane.active .rec').html();  // Fetch P2P details from the active tab
        //         let p2pName = $('.tab-pane.active .rec1n').html();  // Fetch P2P details from the active tab
        //         let p2pType = $('.tab-pane.active .rec2t').html();  // Fetch P2P details from the active tab
        //         let p2pId = $('.tab-pane.active .rec3i').html();  // Fetch P2P details from the active tab
        //         let p2pAccount = $('.tab-pane.active .rec4a').html();  // Fetch P2P details from the active tab
        //         selectedValue = p2pDetails ? 'P2P Payment Selected' : '';  // Ensure it's not empty 
        //         $('.tumazp2pname').text(p2pName);
        //         $('.tumazp2ptype').text(p2pType);
        //         $('.tumazp2pid').text(p2pId);
        //         $('.tumazp2paccount').text(p2pAccount); 
        
        //     } 
            
            else { 
                selectedValue = '';
            }
        
            // Check if a valid payment method has been selected
            if (selectedValue && selectedValue !== '') { 
        
                // Update the payment method title
        
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-bank')) {
                // Use the hidden select to get the selected bank details
                let bankName = $('#bankTransferSelect option:selected').text();  // Fetch the selected bank name from the hidden select
                let accountNumber = $('.numb').text().trim();  // Get account number from the DOM
                let accountName = $('.accntnamv').text().trim();  // Get account name from the DOM
                let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID 
                
                $('.tumazbankname').text(bankName);
                $('.tumazbanknumber').text(accountNumber);
                $('.tumazbankaccount').text(accountName);
        
                // Check if all bank details are available
                
                
            }
        
        
            
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-mobile')) {
                // Use the hidden select to get the selected bank details
                let bankName = $('#mobileMoneySelect option:selected').text();  // Fetch the selected bank name from the hidden select
                let phoneNumber = $('.cryptossns').text().trim();  // Get account number from the DOM
                let accountName = $('.cryptoaccntnam').text().trim();  // Get account name from the DOM
                let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID
         
                $('.tumazmobname').text(bankName);
                $('.tumazmobnumber').text(phoneNumber);
                $('.tumazmobaccount').text(accountName);
         
                // Check if all bank details are available
                
            }
            
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-crypto')) {
                // Use the hidden select to get the selected bank details
                let bankName = $('#cryptoMoneySelect option:selected').text();  // Fetch the selected bank name from the hidden select
                let phoneNumber = $('.cryptossns').text().trim();  // Get account number from the DOM
                let accountName = $('.cryptoaccntnam').text().trim();  // Get account name from the DOM
                let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID
         
                $('.tumazcrypname').text(bankName);
                $('.tumazcrypnumber').text(phoneNumber);
                $('.tumazcrypaccount').text(accountName);
                
        
                // Check if all bank details are available
                
            }
        
             
        
                // Update the payment method title
                  
            let selectedMethodTitle = $('.nav-linkt.active').first().text().trim();
            
                let paymentMethodTitle = selectedMethodTitle;
                let orderId = $('.orderNumberDisplay').first().text().trim();
        //console.log(paymentMethodTitle);
                // $('#step1').hide();
                // $('#step2').show();
            } else {
                // alert('Please select a payment option.');
            }


              // Check if a valid payment method has been selected
    if (isValid) {
        // Get the selected method title for display
        let selectedMethodTitle = $('.nav-linkt.active').first().text().trim();
        let orderId = $('.orderNumberDisplay').first().text().trim();

        $('#step1').hide();
        $('#step2').show();
    } else {
        alert('Please select a payment option.');
    }

    
        });
        
         
        
            // Function to handle "Change" button click for all payment methods
            function handleChangeButtonClick(paymentMethod) {
                $('#step1').hide();  // Hide Step 1
                $('#step4').show();  // Show Step 4 for changing selection
                
                // Update the select dropdown in Step 4 based on the payment method
                switch(paymentMethod) {
                    case 'bank':
                        populateSelect('#changeSelectionSelect', window.bankTransfersData);
                        $('.digagechangepay').text('bank account');
                        $('.digagechangepaybtn').text('Choose bank');
                        break;
                    case 'mobile':
                        populateSelect('#changeSelectionSelect', window.mobileMoneyData);
                        $('.digagechangepay').text('mobile money');
                        $('.digagechangepaybtn').text('Choose provider');
                        break;
                        case 'crypto':
                            populateSelect('#changeSelectionSelect', window.cryptoMoneyData);
                            $('.digagechangepay').text('cryptocurrency');
                            $('.digagechangepaybtn').text('Choose currency');
                            break;
                    case 'p2p':
                        populateSelect('#changeSelectionSelect', window.p2pPaymentsData);
                        break;
                }
            }
        
            // Handle the "Change" button click for Bank Transfer
            $(document).on('click', '.changeSelection', function() {
                handleChangeButtonClick('bank');
            });    
        
            // Handle the "Change" button click for Mobile Money
            $(document).on('click', '.mobmonchangeSelection', function() {
                handleChangeButtonClick('mobile');
            });
        
            // Handle the "Change" button click for crypto Money
            $(document).on('click', '.crymonchangeSelection', function() {
                handleChangeButtonClick('crypto');
            });
        
            // Handle the "Change" button click for P2P
            $(document).on('click', '.p2pchangeSelection', function() {
                handleChangeButtonClick('p2p');
            });
        
            // Handle the "Proceed" button click (go back to Step 1 with updated selection)
            
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '#proceedToStep1', function() {
                //console.log('#proceedToStep1 clicked'); // Debugging log 

                const selectedValue = $('#changeSelectionSelect').val();
                const selectedText = $('#changeSelectionSelect option:selected').text();
        
                // Determine which payment method is active
                let activeMethod = $('.nav-linkt.active').attr('id');
                
                // Update the appropriate select dropdown in Step 1
                switch(activeMethod) {
                    case 'tab-bank':
                        $('#bankTransferSelect').val(selectedValue).trigger('change');
                        break;
                    case 'tab-mobile':
                        $('#mobileMoneySelect').val(selectedValue).trigger('change');
                        break;
                        case 'tab-crypto':
                            $('#cryptoMoneySelect').val(selectedValue).trigger('change');
                            break;
                    case 'tab-p2p':
                        $('#p2pSelect').val(selectedValue).trigger('change');
                        break;
                }
        
                $('#step4').hide();  // Hide Step 4
                $('#step1').show();  // Show Step 1 again
            });
         
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '#backToStep1', function() {
                //console.log('#backToStep1 clicked'); // Debugging log 


                $('#step2').hide();
                $('#step1').show();
            });
        
            
            // Use event delegation for the nextToStep2 button
 
            $(document).on('change', '#screenshotFile', function (e) {
                // Check if a file is selected
                if ($('#screenshotFile').val() === '') {
                    $('#file-upload-error').text('Please select a file to upload');
                    return false;
                } else {
                    $('#file-upload-error').text('');
                }
            
                let uploadedFile = e.target.files[0];
                if (uploadedFile) {
                    // Display preview of the uploaded image
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#previewImage').attr('src', e.target.result);
                        $('#imagePreview').show();
                    };
                    reader.readAsDataURL(uploadedFile);
            
                    // Proceed to upload the file and perform AJAX request
                    let orderId = $('.orderNumberDisplay').first().text().trim();
                    let selectedMethodTitle = $('.nav-linkt.active').first().text().trim();
                    let screenshotFilename = uploadedFile.name;
            
                    // Form data for the AJAX request
                    let formData = new FormData();
                    formData.append('action', 'digages_upload_screenshot');
                    formData.append('order_id', orderId);
                    formData.append('payment_method_title', selectedMethodTitle);
                    formData.append('status', 'on-hold');
                    formData.append('nonce', ajax_object.nonce); // Add the nonce here
                    formData.append('screenshot', uploadedFile);
            
                    // Update the button to show processing status
                    $('.imageprocess').html(`<button type="button" class="ppopbtnq" disabled>Uploading...</button>`);
            
                    // Perform the AJAX request
                    $.ajax({
                        url: ajax_object.ajaxurl,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.success) {
                                let redirectUrl = response.data.redirect; // Store the redirect value
                                $('.imageprocess').html(`
                                    <button type="button" class="ppopbtnq" id="nextToStep3">Submit for confirmation</button>
                                `);


                                
            

            // Use event delegation for the nextToStep2 button
            $(document).on('click', '#nextToStep3', function() {
                // console.log('#nextToStep3 clicked'); // Debugging log  
                 
 
                 let countdown = 5; // Initialize countdown value
                 
                 // Create a countdown function
                 const countdownInterval = setInterval(function() {
                     
                     // Update countdown UI element (optional)
                     $('.digages_countdownDisplay').text(countdown); // Assuming you have an element to display the countdown
             
                     // Decrease countdown value
                     countdown--;
             
                     // Check if countdown has reached 0
                     if (countdown < 1) {
                         clearInterval(countdownInterval); // Clear the interval
                         // Proceed to the next step (e.g., change to the next step)
                        }
                 }, 1000); // Update every second
             
                 
             // Fetch order ID and payment method title
             let orderId = $('.orderNumberDisplay').first().text().trim();
             let selectedMethodTitle = $('.nav-linkt.active').first().text().trim();
             
          
             
             //update status 
             // Fetch order ID 
         
             // Send AJAX request to update order status
             $.ajax({
                 url: ajax_object.ajaxurl,
                 method: 'POST',
                 data: {
                     action: 'digages_update_order_status',
                     order_id: orderId,
                     status: 'on-hold'
                 },
                 success: function(response) {
                     if (response.success) {
                     } else {
                     }
                 },
                 error: function(xhr, status, error) {
                 }
             }); 
 
 
         
         
             // Additional logic: Send P2P details via email if the selected method is a P2P payment
             if ($('.nav-linkt.active').attr('id').startsWith('tab-p2p')) {  // Check if active tab ID starts with 'tab-p2p'
                 let p2pDetails = $('.tab-pane.active .rec').html();  // Get P2P payment details
                 let p2pName = $('.tab-pane.active .rec1n').html();  // Fetch P2P details from the active tab
                 let p2pType = $('.tab-pane.active .rec2t').html();  // Fetch P2P details from the active tab
                 let p2pId = $('.tab-pane.active .rec3i').html();  // Fetch P2P details from the active tab
                 let p2pAccount = $('.tab-pane.active .rec4a').html();  // Fetch P2P details from the active tab
                 let custp2pDetails = $('.tab-pane.active .custp2p').html();  // Get P2P payment details 
                 let userEmail = $('.tumaz_displayEmail').first().text().trim();  // Get user email
                 let dtumamount = digagesData.dtumamount;  // Get total amount
                 
                             
                 let bankName = '';  // Fetch the selected bank name from the hidden select
                 let accountNumber = p2pId;  // Get account number from the DOM
                 let accountName = p2pAccount;  // Get account name from the DOM
                 
         //         console.log(bankName);
         // console.log(accountNumber);
         // console.log(accountName);
         
                 // Ensure p2pDetails is not empty
                 if (p2pDetails) {
                     
                     // Send P2P details via AJAX to the server for emailing
                     let emailFormData = {
                         action: 'digages_send_p2p_confirmation',  // Action that handles the email
                         order_id: orderId,  // Use the correct Order ID
                         user_email: userEmail,
                         bankName : bankName,
                         phoneNumber : accountNumber,
                         accountName : accountName,
                         p2p_details: p2pDetails,  // Include the P2P details
                         p2p_cusdetails: custp2pDetails,
                         
                         dtum_amount: dtumamount, // total amount
                         nonce: ajax_object.nonce // Include the nonce here
                     };
         
                 // Send p2p details for session
                 // Check if all bank details are available 
                     // Send details to PHP via AJAX
                     
                 // Send p2p details for session ends
             
                     $.ajax({
                         url: ajax_object.ajaxurl,  // WordPress AJAX URL
                         method: 'POST',
                         data: emailFormData,
                         success: function(response) {
                             if (response.success) {
                                 
                        setTimeout(() => {
                         window.location.href = redirectUrl; // Redirect to the URL
                         }, 5000);
                             } else {
                             }
                         },
                         error: function(xhr, status, error) {
                         }
                     });
                 } else {
                 }
             }
         
          
         
             $.ajax({
                 url: ajax_object.ajaxurl,
                 method: 'POST',
                 data: {
                     action: 'digages_resend_order_email', // Action for resending email
                     order_id: orderId, // Pass the order ID
                     nonce: ajax_object.nonce // Pass the nonce for security
                 },
                 success: function(response) {
                     if (response.success) {
                         setTimeout(() => {
                          window.location.href = redirectUrl; // Redirect to the URL
                          }, 5000);
                     } else {
                     }
                 },
                 error: function(xhr, status, error) {
                 }
             });
         
          
             // Additional logic: Send P2P details via email if the selected method is a P2P payment
             if ($('.nav-linkt.active').attr('id').startsWith('tab-bank')) {  // Check if active tab ID starts with 'tab-p2p'
                 let btDetails = $('.tab-pane.active .bankt').html();  // Get P2P payment details
                 let custbtDetails = $('.tab-pane.active .custbankt').html();  // Get P2P payment details
                 let userEmail = $('.tumaz_displayEmail').first().text().trim();  // Get user email
                 
                 let bankName = $('.tumazbankname').text().trim();  // Fetch the selected bank name from the hidden select
                 let accountNumber = $('.tumazbanknumber').text().trim();  // Get account number from the DOM
                 let accountName = $('.tumazbankaccount').text().trim();  // Get account name from the DOM
                 
         //         console.log(bankName);
         // console.log(accountNumber);
         // console.log(accountName);
                 
         let dtumamount = digagesData.dtumamount;  // Get total amount  
         
                 // Ensure p2pDetails is not empty
                 if (btDetails) {
         
                     // Send P2P details via AJAX to the server for emailing
                     let emailFormData = {
                         action: 'digages_send_p2p_confirmation',  // Action that handles the email
                         order_id: orderId,  // Use the correct Order ID
                         user_email: userEmail,
                         bankName : bankName,
                         phoneNumber : accountNumber,
                         accountName : accountName,
                         p2p_details: btDetails,  // Include the P2P details
                         p2p_cusdetails: custbtDetails,
                         
                         dtum_amount: dtumamount, // total amount
                         nonce: ajax_object.nonce // Include the nonce here
                     };
         
                     $.ajax({
                         url: ajax_object.ajaxurl,  // WordPress AJAX URL
                         method: 'POST',
                         data: emailFormData,
                         success: function(response) {
                             if (response.success) {
                                 setTimeout(() => {
                                  window.location.href = redirectUrl; // Redirect to the URL
                                  }, 5000);
                             } else {
                             }
                         },
                         error: function(xhr, status, error) {
                         }
                     });
                 } else {
                 }
             }
         
         
             
             // Additional logic: Send Mobile money details via email if the selected method is a P2P payment
             if ($('.nav-linkt.active').attr('id').startsWith('tab-mobile')) {  // Check if active tab ID starts with 'tab-p2p'
                 let mmDetails = $('.tab-pane.active .mmt').html();  // Get P2P payment details
                 let custmmDetails = $('.tab-pane.active .custmmt').html();  // Get P2P payment details
                 let userEmail = $('.tumaz_displayEmail').first().text().trim();  // Get user email
                 
                    let bankName = $('.tumazmobname').text().trim();  // Fetch the selected bank name from the hidden select
                 let phoneNumber = $('.tumazmobnumber').text().trim();  // Get account number from the DOM
                 let accountName = $('.tumazmobaccount').text().trim();  // Get account name from the DOM
                 let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID 
         //         console.log(bankName);
         // console.log(phoneNumber);
         // console.log(accountName);
         let dtumamount = digagesData.dtumamount;  // Get total amount  
         
                 // Ensure p2pDetails is not empty
                 if (mmDetails) {
         
                     // Send P2P details via AJAX to the server for emailing
                     let emailFormData = {
                         action: 'digages_send_p2p_confirmation',  // Action that handles the email
                         order_id: orderId,  // Use the correct Order ID
                         user_email: userEmail,
                         bankName : bankName,
                         phoneNumber : phoneNumber,
                         accountName : accountName,
                         p2p_details: mmDetails,  // Include the P2P details
                         p2p_cusdetails: custmmDetails,
                         
                         dtum_amount: dtumamount, // total amount
                         nonce: ajax_object.nonce // Include the nonce here
                     };
         
                     $.ajax({
                         url: ajax_object.ajaxurl,  // WordPress AJAX URL
                         method: 'POST',
                         data: emailFormData,
                         success: function(response) {
                             if (response.success) {
                                 setTimeout(() => {
                                  window.location.href = redirectUrl; // Redirect to the URL
                                  }, 5000);
                             } else {
                             }
                         },
                         error: function(xhr, status, error) {
                         }
                     });
                 } else {
                 }
             }
             
             // Additional logic: Send crypto money details via email if the selected method is a P2P payment
             if ($('.nav-linkt.active').attr('id').startsWith('tab-crypto')) {  // Check if active tab ID starts with 'tab-p2p'
                 let crDetails = $('.tab-pane.active .cet').html();  // Get P2P payment details
                 let custcrDetails = $('.tab-pane.active .custcrt').html();  // Get P2P payment details
                 let userEmail = $('.tumaz_displayEmail').first().text().trim();  // Get user email
                 //console.log(crDetails);
                 //console.log(custcrDetails);
         let dtumamount = digagesData.dtumamount;  // Get total amount  
         
 
         let bankName = $('.tumazcrypname').text().trim();  // Fetch the selected bank name from the hidden select
         let phoneNumber = $('.tumazcrypnumber').text().trim();  // Get account number from the DOM
         let accountName = $('.tumazcrypaccount').text().trim();  // Get account name from the DOM
         let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID
         // console.log(bankName);
         // console.log(phoneNumber);
         // console.log(accountName);
         
                 // Ensure p2pDetails is not empty
                 if (crDetails) {
         
                     // Send P2P details via AJAX to the server for emailing
                     let emailFormData = {
                         action: 'digages_send_p2p_confirmation',  // Action that handles the email
                         order_id: orderId,  // Use the correct Order ID
                         user_email: userEmail,
                         bankName : bankName,
                         phoneNumber : phoneNumber,
                         accountName : accountName,
                         p2p_details: crDetails,  // Include the P2P details
                         p2p_cusdetails: custcrDetails,
                         
                         dtum_amount: dtumamount, // total amount
                         nonce: ajax_object.nonce // Include the nonce here
                     };
         
                     $.ajax({
                         url: ajax_object.ajaxurl,  // WordPress AJAX URL
                         method: 'POST',
                         data: emailFormData,
                         success: function(response) {
                             if (response.success) {
                                 setTimeout(() => {
                                  window.location.href = redirectUrl; // Redirect to the URL
                                  }, 5000);
                             } else {
                             }
                         },
                         error: function(xhr, status, error) {
                         }
                     });
                 } else {
                 }
             }
              
             $('#step2').hide();
             $('#step3').show();
         });
 
 
         
 // Use the global variable in another handler
 $(document).on('click', '#nextToStepm3', function(e) {
     e.preventDefault();
     //console.log(redirectUrl);
     if (redirectUrl) {
         window.location.href = redirectUrl; // Redirect to the stored URL
     } else {
        // console.error('Redirect URL is not set');
     }
 });
         
                            } else {
                                // Handle error state if needed
                                $('.imageprocess').html(`
                                    <button type="button" class="ppopbtnq" id="sendimagedetails" disabled>Submit for confirmation</button>
                                `);
                                $('.digagesuploaderror').text('Wrong file format! Please upload a file in one of the following formats: .jpg, .png, or .pdf');
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle error case
                            $('.imageprocess').html(`
                                <button type="button" class="ppopbtnq" id="sendimagedetails" disabled>Submit for confirmation</button>
                            `);
                            $('.digagesuploaderror').text('Wrong file format! Please upload a file in one of the following formats: .jpg, .png, or .pdf');
                        }
                    });
                }
            });
            
         
            
         
                // Use event delegation for the nextToStep2 button
                $(document).on('click', '#customButton', function(e) {
                    //console.log('#customButton clicked'); // Debugging log  
                    
                $('#screenshotFile').click();
            });








            
        });
        
    }

    
        // Call a function that does something
        //digagespoppay();


   // Function to trigger click and run main function
   function triggerClickAndRun() {
    $('.your-button-class').trigger('click');
    digagespoppay();
    
}
 

// Set timeout for 3 seconds, then trigger click and run main function
setTimeout(triggerClickAndRun, 3000); 

});


