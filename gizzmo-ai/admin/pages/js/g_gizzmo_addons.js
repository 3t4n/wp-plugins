function getPageParameterValue() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('page');
}
//product images selection
function media_images_addon(artifact_data)
{
    (function ($) {
        gizzmo_data = sessionStorage.getItem('gizzmo_data');
        gizzmo_data = JSON.parse(gizzmo_data);
        artifact_images = artifact_data.attributes.high_res_images;
        //set the selected_featured_image src as the first image
        if(artifact_images.length > 0)
        {
            $('#selected_featured_image').attr('src', artifact_images[0]);
            
            $('#option_image_1').attr('src', artifact_images[0]);
            if (artifact_images.length > 1) {
                $('#option_image_2').attr('src', artifact_images[1]);
            }
            if (artifact_images.length > 2) {
                $('#option_image_3').attr('src', artifact_images[2]);
            }
            if (artifact_images.length > 3) {
                $('#option_image_4').attr('src', artifact_images[3]);
            }
            if (artifact_images.length > 4) {
                $('#option_image_5').attr('src', artifact_images[4]);
            }
        }
    }(jQuery));
}
//send a request to the server to generate an ai image
function generate_ai_image(image_id,style)
{
    
    (function ($) {
        gizzmo_data = sessionStorage.getItem('gizzmo_data');
        gizzmo_data = JSON.parse(gizzmo_data);
        property_id = gizzmo_data["properties"]["id"];
        //convert the property_id to a string
        property_id = property_id.toString();

        artifact_data = localStorage.getItem('artifact_data');
        artifact_data = JSON.parse(artifact_data);

        product_name = artifact_data["attributes"]["name"];

        //if ai_image_theme input exists and is not empty, then use it, otherwise use the product name
        if ($('#ai_image_theme').length && $('#ai_image_theme').val() != "") {
            product_name = $('#ai_image_theme').val();
        }

        //for creating the image name wich is the image tags, we make it from the actual product name
        //we remove the spaces and sybbols and make it lowercase, keep only the letters and numbers and spaces
        var image_tags = product_name.replace(/[^a-zA-Z0-9 ]/g, "").toLowerCase();
        //replace spaces with underscores
        image_tags = image_tags.replace(/\s/g, '_');

        
        //remove the text from inside the div with the id image_id, and place a loading spinner
        $('#'+image_id).html('<svg style="width: 40px;height: 40px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve"><path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" /></path></svg>');
        
    
        return new Promise((resolve, reject) => {
            const data_json = {
                "image_description": product_name,
                "image_tags": image_tags,
                "property_id": property_id,
                "style": style
            };
            console.log(JSON.stringify(data_json));
            const xhttp = new XMLHttpRequest();

            new_ai_images_service = "https://mm-service-659096m34q4rj.cpln.app"

            xhttp.open("POST", `${new_ai_images_service}/g_generate_ai_image`, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        const response = this.responseText;
                        const response_json = JSON.parse(response);
                        const status = response_json['status'];
                        const data = response_json['data'];
                        
                        //console.log(response_json);
                        var ai_image_src = data;

                        //get the parent div of the image with the id image_id
                        var parent_div = $('#'+image_id).parent();
                        //reemove the div with the id image_id
                        $('#'+image_id).remove();
                        parent_div.append('<img id="option_'+image_id+'" class="option_image selected" src="'+ai_image_src+'" alt="Ai Image">');
                        
                        //now create an image tag with the src of the ai image and place it inside the div with the id image_id
                        $('#selected_featured_image').attr('src', ai_image_src);


                        $('.option_image').click(function(){
                            var src = $(this).attr('src');
                            $('#selected_featured_image').attr('src', src);
                            $('.option_image').removeClass('selected');
                            $(this).addClass('selected');
                        });



                        if (status == 'success') {
                            resolve(data);
                        } else {
                            reject("error");
                        }
                    } else {
                        reject("HTTP error: " + this.status);
                    }
                }
            };
            xhttp.send(JSON.stringify(data_json));
        });
    }(jQuery));
}
function generate_ai_image_roundup(image_id,style)
{
    (function ($) {
        gizzmo_data = sessionStorage.getItem('gizzmo_data');
        gizzmo_data = JSON.parse(gizzmo_data);
        property_id = gizzmo_data["properties"]["id"];
        //convert the property_id to a string
        property_id = property_id.toString();

        artifact_data = localStorage.getItem('artifact_data');
        artifact_data = JSON.parse(artifact_data);

        product_name = artifact_data["attributes"]["name"];

        //if ai_image_theme input exists and is not empty, then use it, otherwise use the product name
        if ($('#ai_image_theme').length && $('#ai_image_theme').val() != "") {
            product_name = $('#ai_image_theme').val();
        }

        //for creating the image name wich is the image tags, we make it from the actual product name
        //we remove the spaces and sybbols and make it lowercase, keep only the letters and numbers and spaces
        var image_tags = product_name.replace(/[^a-zA-Z0-9 ]/g, "").toLowerCase();
        //replace spaces with underscores
        image_tags = image_tags.replace(/\s/g, '_');

        
        //remove the text from inside the div with the id image_id, and place a loading spinner
        $('#'+image_id).html('<svg style="width: 40px;height: 40px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve"><path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" /></path></svg>');
        
    
        return new Promise((resolve, reject) => {
            const data_json = {
                "image_description": product_name,
                "image_tags": image_tags,
                "property_id": property_id,
                "style": style
            };
            console.log(JSON.stringify(data_json));
            const xhttp = new XMLHttpRequest();

            new_ai_images_service = "https://mm-service-659096m34q4rj.cpln.app"

            xhttp.open("POST", `${new_ai_images_service}/g_generate_ai_image`, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        const response = this.responseText;
                        const response_json = JSON.parse(response);
                        const status = response_json['status'];
                        const data = response_json['data'];
                        
                        //console.log(response_json);
                        var ai_image_src = data;

                        //get the parent div of the image with the id image_id
                        var parent_div = $('#'+image_id).parent();
                        //reemove the div with the id image_id
                        $('#'+image_id).remove();
                        parent_div.append('<img id="option_'+image_id+'" class="option_image selected" src="'+ai_image_src+'" alt="Ai Image">');
                        
                        //now create an image tag with the src of the ai image and place it inside the div with the id image_id
                        $('#selected_featured_image').attr('src', ai_image_src);


                        $('.option_image').click(function(){
                            var src = $(this).attr('src');
                            $('#selected_featured_image').attr('src', src);
                            $('.option_image').removeClass('selected');
                            $(this).addClass('selected');
                        });



                        if (status == 'success') {
                            resolve(data);
                        } else {
                            reject("error");
                        }
                    } else {
                        reject("HTTP error: " + this.status);
                    }
                }
            };
            xhttp.send(JSON.stringify(data_json));
        });
    }(jQuery));
}
//send a request to the server to generate an ai image
function generate_ai_image_comparison(image_1_title,image_2_title,image_id,style)
{
    (function ($) {
        gizzmo_data = sessionStorage.getItem('gizzmo_data');
        gizzmo_data = JSON.parse(gizzmo_data);
        property_id = gizzmo_data["properties"]["id"];
        //convert the property_id to a string
        property_id = property_id.toString();

        artifact_data = localStorage.getItem('artifact_data');
        artifact_data = JSON.parse(artifact_data);

        product_name = artifact_data["attributes"]["name"];
        //if ai_image_theme input exists and is not empty, then use it, otherwise use the product name
        if ($('#ai_image_theme').length && $('#ai_image_theme').val() != "") {
            product_name = $('#ai_image_theme').val();
        }
        
        //for creating the image name wich is the image tags, we make it from the actual product name
        //we remove the spaces and sybbols and make it lowercase, keep only the letters and numbers and spaces
        var image_tags = product_name.replace(/[^a-zA-Z0-9 ]/g, "").toLowerCase();
        //replace spaces with underscores
        image_tags = image_tags.replace(/\s/g, '_');

        
        //remove the text from inside the div with the id image_id, and place a loading spinner
        $('#'+image_id).html('<svg style="width: 40px;height: 40px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve"><path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" /></path></svg>');
        
    
        return new Promise((resolve, reject) => {
            const data_json = {
                "image_description": product_name,
                "image_tags": image_tags,
                "property_id": property_id,
                "style": style
            };
            console.log(JSON.stringify(data_json));
            const xhttp = new XMLHttpRequest();

            new_ai_images_service = "https://mm-service-659096m34q4rj.cpln.app"

            xhttp.open("POST", `${new_ai_images_service}/g_generate_ai_image`, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        const response = this.responseText;
                        const response_json = JSON.parse(response);
                        const status = response_json['status'];
                        const data = response_json['data'];
                        
                        //console.log(response_json);
                        var ai_image_src = data;

                        //get the parent div of the image with the id image_id
                        var parent_div = $('#'+image_id).parent();
                        //reemove the div with the id image_id
                        $('#'+image_id).remove();
                        parent_div.append('<img id="option_'+image_id+'" class="option_image selected" src="'+ai_image_src+'" alt="Ai Image">');
                        
                        //now create an image tag with the src of the ai image and place it inside the div with the id image_id
                        $('#selected_featured_image').attr('src', ai_image_src);


                        $('.option_image').click(function(){
                            var src = $(this).attr('src');
                            $('#selected_featured_image').attr('src', src);
                            $('.option_image').removeClass('selected');
                            $(this).addClass('selected');
                        });



                        if (status == 'success') {
                            resolve(data);
                        } else {
                            reject("error");
                        }
                    } else {
                        reject("HTTP error: " + this.status);
                    }
                }
            };
            xhttp.send(JSON.stringify(data_json));
        });
    }(jQuery));
}

function validateEmail(email)
  {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
  }
function getDomainName(url) {
    try {
        const urlObj = new URL(url);
        return `${urlObj.protocol}//${urlObj.hostname}`;
    } catch (e) {
        return url; // Return the original URL if it is already a domain name
    }
}


//affilioate tag functions
function showModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

 
 
function showTab(tabId) {
    document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
    
    document.querySelectorAll('.tab-header button').forEach(button => button.classList.remove('active'));
    document.getElementById(tabId + 'Button').classList.add('active');
}





function login() {
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    
    //add some validation here
    validation_passed = true;
    if (email == "") {
        validation_passed = false;
    }
    else
    {
        //check if the email is valid
        if (!validateEmail(email)) {
            validation_passed = false;
        }
    }
    //check if the length of the password is less than 6
    if (password.length < 6) {
        validation_passed = false;
    }


    if (validation_passed == false) {
        alert("Please enter a valid email and password");
        return;
    }
    

    var domain = getDomainName(window.location.href);

    return new Promise((resolve, reject) => {
        const data_json = {
            "domain": domain,
            "email": email,
            "password": password
        };
        console.log(JSON.stringify(data_json));
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `${baseURL}/g_plugin_signin_bubble`, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const response = this.responseText;
                    const response_json = JSON.parse(response);
                    const status = response_json['status'];
                    const data = response_json['data'];
                    if (status == 'success') {
                        resolve(data);
                        //reload the page after the user has logged in
                        location.reload();
                    } else {
                        alert("Invalid email or password");
                        reject("error");
                    }
                } else {
                    reject("HTTP error: " + this.status);
                }
            }
        };
        xhttp.send(JSON.stringify(data_json));
    });


    
    
    
    
    
    
    closeModal('authModal');




    // Add your login logic here
}

function signup() {
    const name = document.getElementById('signupName').value;
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;
    const verifyPassword = document.getElementById('signupVerifyPassword').value;

    //get the marketing_consent value
    var marketing_consent = document.getElementById('marketing_consent').checked;
    if (marketing_consent == true) {
        marketing_consent = "True";
    }
    else
    {
        marketing_consent = "False";
    }


    //get the domain of the website
    var domain = getDomainName(window.location.href);


    var validation_passed = true;
    document.getElementById('name_empty').style.display = "none";
    document.getElementById('email_empty').style.display = "none";
    document.getElementById('email_invalid').style.display = "none";
    document.getElementById('password_mismatch_1').style.display = "none";
    document.getElementById('password_mismatch_2').style.display = "none";
    document.getElementById('password_length').style.display = "none";
    document.getElementById('email_exists').style.display = "none";


    //check if the name is empty
    if (name == "") {
        document.getElementById('name_empty').style.display = "block";
        validation_passed = false;
    }

    //check if the email is empty and if it is a valid email
    if (email == "") {
        document.getElementById('email_empty').style.display = "block";
        validation_passed = false;
    }
    else
    {
        //check if the email is valid
        if (!validateEmail(email)) {
            document.getElementById('email_invalid').style.display = "block";
            validation_passed = false;
        }
    }


    if (password !== verifyPassword) {
        document.getElementById('password_mismatch_1').style.display = "block";
        document.getElementById('password_mismatch_2').style.display = "block";
        validation_passed = false;
    }
    else
    {
        //check if the length of the password is less than 6
        if (password.length < 6) {
            document.getElementById('password_length').style.display = "block";
            validation_passed = false;
        }
    }

    
    if (validation_passed == false) {
        return;
    }

    



    return new Promise((resolve, reject) => {
        const data_json = {
            "domain": domain,
            "name": name,
            "email": email,
            "password": password,
            "marketing_consent": marketing_consent
        };
        console.log(JSON.stringify(data_json));
        const xhttp = new XMLHttpRequest();
        //xhttp.open("POST", `${baseURL}/g_plugin_signup`, true);
        xhttp.open("POST", `${baseURL}/g_plugin_signup`, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const response = this.responseText;
                    const response_json = JSON.parse(response);
                    const status = response_json['status'];
                    const data = response_json['data'];
                    
                    if (status == 'success') {

                        res_msg = data['message']
                        if (res_msg == 'Email Already Exists') {
                            //show the error message email_exists
                            document.getElementById('email_exists').style.display = "block";
                            resolve(data);
                        }
                        else
                        {
                            resolve(data);
                            //reload the page after the user has signed up
                            //hard refresh the page
                            location.reload(true);
                        }
                        
                    } else {
                        res_msg = response_json['message']
                        if (res_msg == 'Email Already Exists') {
                            //show the error message email_exists
                            document.getElementById('email_exists').style.display = "block";
                        }
                        //reject("error");
                    }
                } else {
                    reject("HTTP error: " + this.status);
                }
            }
        };
        xhttp.send(JSON.stringify(data_json));
    });



    console.log("Sign Up:", name, email, password);
    closeModal('authModal');
    // Add your signup logic here
}

function forgot_email() {
    const email = document.getElementById('forgotEmail').value;

    document.getElementById('remainder_email_empty').style.display = "none";
    document.getElementById('remainder_email_invalid').style.display = "none";

    validation_passed = true;
    if (email == "") {
        document.getElementById('remainder_email_empty').style.display = "block";
        validation_passed = false;
    }
    else
    {
        //check if the email is valid
        if (!validateEmail(email)) {
            document.getElementById('remainder_email_invalid').style.display = "block";
            validation_passed = false;
        }
    }


    if (validation_passed == false) {
        return;
    }
    else
    {
        closeModal('authModal');

        return new Promise((resolve, reject) => {
            const data_json = {
                "email": email
            };
            console.log(JSON.stringify(data_json));
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", `${baseURL}/g_recover_password`, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        const response = this.responseText;
                        const response_json = JSON.parse(response);
                        const status = response_json['status'];
                        const data = response_json['data'];
                        if (status == 'success') {
                            resolve(data);
                        } else {
                            res_msg = response_json['message']
                            if (res_msg == 'Email Not Found') {
                                
                            }
                        }
                    } else {
                        reject("HTTP error: " + this.status);
                    }
                }
            };
            xhttp.send(JSON.stringify(data_json));
        });
        
    }





    console.log("Forgot Email:", email);
    // Add your forgot email logic here
}



function delete_deal_post(clicked_obj)
{
    var post_id = clicked_obj.getAttribute('data-post_id');
    var property_id = clicked_obj.getAttribute('data-property_id');

    document.getElementById('delete_deal_post_id').value = post_id;
    document.getElementById('delete_deal_property_id').value = property_id;

    showModal('deleteDealPostConfirmationModal');
}
function confirmdealpostDelete() {
    var post_id = document.getElementById('delete_deal_post_id').value;
    var property_id = document.getElementById('delete_deal_property_id').value;
    return new Promise((resolve, reject) => {
        const data_json = {
            "post_id": post_id,
            "property_id": property_id
        };
        console.log(JSON.stringify(data_json));
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `${baseURL}/g_delete_deal_post`, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const response = this.responseText;
                    const response_json = JSON.parse(response);
                    const status = response_json['status'];
                    const data = response_json['data'];
                    if (status == 'success') {
                        resolve(data);
                        //reload the page after the user has logged in
                        location.reload();
                    } else {
                        reject("error");
                    }
                } else {
                    reject("HTTP error: " + this.status);
                }
            }
        };
        xhttp.send(JSON.stringify(data_json));
    });
}






document.addEventListener("DOMContentLoaded", function() {
    (function ($) {

        //product images selection
        $('.option_image').click(function(){
            var src = $(this).attr('src');
            $('#selected_featured_image').attr('src', src);
            $('.option_image').removeClass('selected');
            $(this).addClass('selected');
        });

        var content_type = $('#main_content_type').val();

        //product images ai generation and selection
        $('.generate-placeholder').click(function(){
             
            var image_id = $(this).attr('id');
            var style = $(this)[0].attributes[1].nodeValue;
            if (content_type == 'Comparison') {
              var image_1_title = $('#compare_products_draggable .prodname').eq(0).html();
              var image_2_title = $('#compare_products_draggable .prodname').eq(1).html();
              generate_ai_image_comparison(image_1_title,image_2_title,image_id,style);
            }
            if (content_type == 'Roundup') {
                generate_ai_image_roundup(image_id,style);
              }
            else
            {
              generate_ai_image(image_id,style);
            }
        });
        
        
         
        var page = getPageParameterValue();
        if (page != 'gizzmo-ai-listicle' && page != 'gizzmo-ai-deals' && page != 'gizzmo-ai-gizzmo-posts') {
             //affiliate tag modal
            document.getElementById('add_affiliate_tag').addEventListener('click', function() {
                showModal('addAffiliateModal');
            });
            document.getElementById('delete_affiliate_tag').addEventListener('click', function() {
                showModal('deleteConfirmationModal');
            });
        }
       
        $('#selected_audience').click(function(){
            showModal('audiances_model');
        });
        $('#selected_tone').click(function(){
            showModal('tones_model');
        });
        
         
        $('#selected_featured_image').click(function(){
            //get the clicked image src
            var src = $(this).attr('src');
            //set the src of the modal image to the clicked image src
            $('#zoom_image').attr('src', src);

            showModal('zoomPopModel');
        });
        
        $('#main_deal_img').click(function(){
            //get the clicked image src
            var src = $(this).attr('src');
            //set the src of the modal image to the clicked image src
            $('#zoom_image').attr('src', src);

            showModal('zoomPopModel');
        });

        
       
        
        



    }(jQuery));
});






