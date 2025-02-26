
var ischatopen = false;
var ele = document.getElementById("chatbar");

// Example JSON data
// async function fetchOptions() {
//     try {
//         const response = await fetch('/wp-content/plugins/autochat/query/get_options.php');
//         return await response.json();
//         //console.log(response);
//     } catch (error) {
//         console.error('Error fetching options:', error);
//         console.log(error);
//         return {};
        
//     }
// }

async function fetchSeOptions() {
    
    if (typeof farSettingsns !== 'undefined') {
            // Do whatever you want with the settings data
        
            // For example, you can display the option field data
            var myDiv = document.getElementById('chatBody');
            if (myDiv) {
                myDiv.innerHTML = JSON.stringify(farSettingsns); // Display settings data as JSON string
            }
        }
}
fetchSeOptions();

async function fetchdefOption() {
    try {
        const responseDefRep = await fetch('/wp-content/plugins/autochat/query/get_options.php');
        if (!responseDefRep.ok) {
            throw new Error('Network response was not ok' + responseDefRep.statusText);
        }
        const dataDefRep = await responseDefRep.json();
        // console.log(data);
        return dataDefRep;
    } catch (error) {
        console.error('Error fetching options:', error);
        return {};
    }
}

function instantMsg(){
    const divBot = document.getElementById("divBot");
const jsonData = [
    { button: { label: 'Your custom button x', action: "handleButtonClick('key')" } },
    // Add more messages as needed
];
divBot.innerHTML = addJsonToChat(jsonData);
}
// console.log(myData);
//instantMsg();
const achatTxt = farSettingsnew['achat-txt'];
const achatTxtarea = farSettingsnew['achat-txtarea'];
const enableDM = farSettingsnew['enable-dm'];
// Function to handle button click
function dmhandleButtonClick(key) {
    const clicked = achatTxt[key];
    const message = achatTxtarea[key];
    // Display the message or handle it as needed
    // const clickedCont = document.getElementById('lef-body');
    // const mesgCont = document.getElementById('right-body');
    // clickedCont.innerHTML='hhi';
    // mesgCont.innerHTML='jsj';
    // clickedCont.appendChild(clicked);
    // mesgCont.appendChild(clicked);
    // const chBody =  document.getElementById('chatBody'); 
    // const selcDiv = document.createElement("div");
    // selcDiv.classList.add("chat_box_body_other");
    // var divClient = document.createElement("div");
    // divClient.classList.add("chat_box_body_self");
    const chBody = document.getElementById('chatBody');
const selcDiv = document.createElement("div");
selcDiv.classList.add("chat_box_body_other");
const divClient = document.createElement("div");
divClient.classList.add("chat_box_body_self");
divClient.textContent = clicked; // Set client's message
chBody.appendChild(divClient); 

selcDiv.textContent = message; // Set the text content of the div
chBody.appendChild(selcDiv); // Append the div to the chat body

// Optionally, you can also create a div for the client's message
// Append the div to the chat body
    selcDiv.innerHTML(message);
}

// Function to generate buttons dynamically
function generateButtons() {
    //const divBot = document.getElementById("divBot");
   // divBot.innerHTML = ""; // Clear existing content
    const dmArea = document.getElementById('dm-btn');
    const divBot = document.createElement("div");
    divBot.classList.add("chat_box_body_other");
    // Iterate through the keys in achatTxt
    for (const key in achatTxt) {
        if(enableDM[key]==1){
            const button = document.createElement("button");
            //console.log(button);
            // const jsonData = [
            //     { button: { label: achatTxt[key], action: handleButtonClick(key) } },
            //     // Add more messages as needed
            // ];
            //divBot.innerHTML = addJsonToChat(jsonData);
            button.textContent = achatTxt[key]; // Set button label to the value from achatTxt
            button.addEventListener("click", function() {
                dmhandleButtonClick(key); // Call handleButtonClick with the key when button is clicked
            });
            
            //dmArea.innerHTML = button;
            dmArea.appendChild(button);
        }

    }
}

// Call the function to generate buttons
generateButtons();

function matchText() {
    const data = farSettingsnew['achat-txt'];
    const textareaData = farSettingsnew['achat-txtarea'];
    const enableDM = farSettingsnew['enable-dm'];
    const inputText = document.getElementById('MsgInput').value.trim().toLowerCase(); // Convert input text to lowercase and remove leading/trailing spaces
    document.getElementById('MsgInput').value = '';
    const chatBody = document.getElementById("chatBody");
    const output = document.createElement("div");
    output.classList.add("chat_box_chat_body");
    var divClient = document.createElement("div");
        divClient.classList.add("chat_box_body_self");
    divClient.innerHTML = inputText;
    
    chatBody.append(divClient);
    // If input text is empty, display a message indicating so
    if (!inputText) {
        output.innerHTML = "Input is empty.";
        chatBody.appendChild(output);
        chatBody.scrollTop = chatBody.scrollHeight;
        return;
    }

    // Iterate through data to find matching key
    let matchFound = false;
    for (const key in data) {
       
        if (data[key].toLowerCase() === inputText) {
            
            // If key is found, display corresponding textarea data
            setTimeout(function(){
                output.innerHTML = ` ${textareaData[key]}`;
            },4000);
           
            matchFound = true;
            if(enableDM[key]==1){

            }
            break;
        }
    }

    // If no match found, display a message indicating so
    if (!matchFound) {
        setTimeout(async function() {
            try {
                const datadefOp = await fetchdefOption();
               
    
                const jsonDataDef = [
                    { text: datadefOp.ch_def_reply || 'Thank you for contacting with us.' },
                    { text: datadefOp.ch_def_reply_toggle || 'off' },
                    // Add more messages as needed
                ];
                if(jsonDataDef[1].text === 'off'){
                    return;
                }
                output.innerHTML = jsonDataDef[0].text;
            } catch (error) {
                console.error('Error fetching default options:', error);
            }
        }, 4000);
    }

    chatBody.appendChild(output);
    chatBody.scrollTop = chatBody.scrollHeight;

 
}

        
    
// Load options and construct jsonData
// const options = await fetchOptions();
// const jsonData = [
//     { text: options.welcomeText || 'Hello, welcome!', button: { label: options.contactLabel || 'Contact info', action: "handleButtonClick('contact')" } },
//     { text: options.helpText || 'How can I help you?', button: { label: options.assistanceLabel || 'Ask for assistance', action: "handleButtonClick('help')" } },
//     // Add more messages as needed
// ];

// console.log(options);

// const jsonData = [
//     { text: "Hello, welcome!", button: { label: "Contact info", action: "handleButtonClick('contact')" } },
//     { text: "How can I help you?", button: { label: "Ask for assistance", action: "handleButtonClick('help')" } },
//     // Add more messages as needed
// ];
const helpjsonData = [
    { text: "Do you want to know about shop?", button: { label: "Available products", action: "handleButtonClick('avilable')" } },
    { text: "Do you want to buy now?", button: { label: "Buy now", action: "handleButtonClick('buy')",link: "https://example.com/products" } },
    // Add more messages as needed
];
function addJsonToChat(jsonData) {
    const chatBodyBtn = document.getElementById("dm-btn");

    jsonData.forEach((message, index) => {
        setTimeout(() => {
            const divBot = document.createElement("div");
            divBot.classList.add("chat_box_body_btn");
            divBot.innerHTML = '<button class="chat-inner-btn" onclick="' + message.button.action + '">' + message.button.label + '</button>';
            chatBodyBtn.appendChild(divBot);
            chatBodyBtn.scrollTop = chatBody.scrollHeight;
        }, index * 1000);
    });
}
function handleButtonClick(action) {
    // Handle button click action, you can perform actions or make AJAX requests here
    if( action==='contact'){
        const chatBody = document.getElementById("chatBody");
        const divBot = document.createElement("div");
        divBot.classList.add("chat_box_body_other");
        jQuery.ajax({
            url: '/wp-content/plugins/autochat/query/get_user_data.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
              // Check the structure of the returned data
          
              // Access the 'message' property if it exists
              if (data && data[0].ID) {
               
                divBot.innerHTML = 'Contact with:'+data[0].data.user_nicename +'</br>email: </br>'+data[0].data.user_email;
                chatBody.appendChild(divBot);
                chatBody.scrollTop = chatBody.scrollHeight;
              
                // You can now use 'data' in your JavaScript as needed
              } else {
                console.error('Invalid data structure. Expected "message" property.');
              }
            },
            error: function (error) {
              console.error('Error:', error);
          
              // Check the responseText for more information in case of an error
              console.log('Error responseText:', error.responseText);
            }
          });
   
    }
    if( action==='help'){


  

        const chatBody = document.getElementById("chatBody");
        helpjsonData.forEach((message, index) => {
            setTimeout(() => {
                const divBot = document.createElement("div");
                divBot.classList.add("chat_box_body_other");
                divBot.innerHTML =  message.text +'<button class="chat-inner-btn" onclick="' + message.button.action + '">' + message.button.label + '</button>';
                chatBody.appendChild(divBot);
                chatBody.scrollTop = chatBody.scrollHeight;
            }, index * 1000);
        });


    }
    if(action==='avilable'){
        const chatBody = document.getElementById("chatBody");
        const divBot = document.createElement("div");
        divBot.classList.add("chat_box_body_other");
        jQuery.ajax({
            url: '/wp-content/plugins/order-auto-complete-for-woocommerce/query/get_products_data.php',
            type: 'GET',
            dataType: 'json',
            success: function (results) {
            // Check the structure of the returned data
  
            var chatBody = document.getElementById('chatBody');
        
            // Access the 'message' property if it exists
            if (results && results[0]) {
                results.forEach(function(product, index) {
               
                    const divBot = document.createElement("div");
                    divBot.classList.add("chat_box_body_other");
                    divBot.innerHTML = 'Name: ' + product.name+'</br>Price: ' + product.price+'</br><a target="_blank" href='+product.shop_url+'/'+product.slug+'>More Details</a>';
                    chatBody.appendChild(divBot);
                    chatBody.scrollTop = chatBody.scrollHeight;
                        // Add a line break for better readability
                    chatBody.appendChild(document.createElement('br'));

                    console.log('ID: ' + product.shop_url);
                    console.log('Name: ' + product.name);
                    console.log('Slug: ' + product.slug);
                    console.log('Price: ' + product.price);
                    console.log(''); // Add a blank line for better readability
                });
            } else {
                console.error('Invalid data structure. Expected "message" property.');
            }
            },
            error: function (error) {
            console.error('Error:', error);
        
            // Check the responseText for more information in case of an error
            console.log('Error responseText:', error.responseText);
            }
        });

     }
     if(action==='buy'){
        const button = helpjsonData.find(item => item.button.action.includes(action));
        window.location.href = button.button.link;
     }
    // console.log("Button clicked with action: " + action);
}
let hasBeenCalled = false;
function addJsonToChat1(jsonData) {
    if (!hasBeenCalled) {
    const chatBody = document.getElementById("chatBody");

    jsonData.forEach((message, index) => {
        setTimeout(() => {
            const divBot = document.createElement("div");
            divBot.classList.add("chat_box_body_other");
            divBot.innerHTML = message.text;
            chatBody.appendChild(divBot);
            chatBody.scrollTop = chatBody.scrollHeight;
        }, index * 1000);
    });
    hasBeenCalled = true;
}
}







//enter and click send function

    async function send(){
        
      
        var chatBody = document.getElementById("chatBody");
        var Clientmsg = document.getElementById("MsgInput").value;  
        document.getElementById('MsgInput').value = '';
        var divClient = document.createElement("div");
        divClient.classList.add("chat_box_body_self");
        
        divClient.innerHTML = Clientmsg;
        
        chatBody.append(divClient);
        
        
        var divBot = document.createElement("div");
        divBot.classList.add("chat_box_body_other");
        
            
            // const options = await fetchOptions();
            // const jsonData = [
            //     { text: options.welcomeText || 'Hello, welcomex!', button: { label: options.contactLabel || 'Contactcx info', action: "handleButtonClick('contact')" } },
            //     { text: options.helpText || 'How can I help you?', button: { label: options.assistanceLabel || 'Ask forx assistance', action: "handleButtonClick('help')" } },
            //     // Add more messages as needed
            // ];
            // //console.log({options, jsonData});
            // divBot.innerHTML = addJsonToChat(jsonData);

    }

    function handleKeyPress(event){
        if(event.key==="Enter"){
            
              //send();
            matchText();
        }
    }
