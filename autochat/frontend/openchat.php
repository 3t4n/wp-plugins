<script>
    //toggle chat box function
    function openChatBox() {
       

        if (ischatopen == false) {
            ele.classList.add("toggle");
            ischatopen = true;
            document.getElementById("chatOpen").classList.remove("open");
            document.getElementById("chatOpen").classList.add("close");

        } else {
            ele.classList.remove("toggle");
            ischatopen = false;
            document.getElementById("chatOpen").classList.add("open");
            document.getElementById("chatOpen").classList.remove("close");
        }
        <?php $achat_greetings = get_option('achat_greetings_option');
        if ($achat_greetings === 'on') { ?>
            firstwelcomeText();
        <?php  }
        ?>


    }
    <?php
    $welcometextforopen = json_encode(get_option('ch_greeting_option'));
    ?>

    function firstwelcomeText() {
        // Get the chatBody element
        var chatBody = document.getElementById('chatBody');

        // Add text using innerHTML
        chatBody.innerHTML = '<div class="chat_box_chat_body"><?php echo esc_attr(str_replace('"', '', $welcometextforopen)); ?></div>';
    }

    // function firstwelcomeText() {
    //     var divBot1 = document.createElement("div");
    //     divBot1.classList.add("chat_box_body_other");

    //     const options = fetchOptions();
    //     const jsonData1 = [{
    //             text: options.welcomeText || 'Hello and thanks for getting in touch with us! How can we help you with today?'
    //         },

    //         // Add more messages as needed
    //     ];

    //     divBot1.innerHTML = addJsonToChat1(jsonData1);
    //     fetch('/wp-content/plugins/autochat/query/get_selectives.php')
    //         .then(response => response.json())
    //         .then(data => {
    //             // Work with the data here
    //             console.log(data[0]);
    //             const jsonSeData = [{
    //                     button: {
    //                         label: data[0].val0 || 'Contact info',
    //                         action: "handleButtonClick('contact')"
    //                     }
    //                 },
    //                 {
    //                     button: {
    //                         label: data[1].val1 || 'Ask for assistance',
    //                         action: "handleButtonClick('help')"
    //                     }
    //                 },
    //                 {
    //                     button: {
    //                         label: data[2].val2 || 'Refund Policy',
    //                         action: "handleButtonClick('refund')"
    //                     }
    //                 },
    //                 // Add more messages as needed
    //             ];

    //             divBot1.innerHTML = addJsonToChat(jsonSeData);
    //         })



    // }
</script>