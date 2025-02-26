document.addEventListener('DOMContentLoaded', function () {
    fetchChatHistory();

    document.getElementById('chatgpt-send').addEventListener('click', function () {
        var messages = document.getElementById('chatgpt-messages');
        messages.scrollTop = messages.scrollHeight;
        console.log("button cliked...")
        const input = document.getElementById('chatgpt-input');
        const message = input.value;
        input.value = ''; // Clear input

        const chatMessages = document.getElementById('chatgpt-messages');
        const sendingMessage = document.createElement('div');
        sendingMessage.innerHTML = '<span>You: </span>' + message;
        chatMessages.appendChild(sendingMessage);
        messages.scrollTop = messages.scrollHeight;

        fetch(chatgptSimulatorAjax.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
            },
            body: `action=message_handler&message=${encodeURIComponent(message)}&security=${chatgptSimulatorAjax.security}`,
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                const responseMessage = document.createElement('div');
                responseMessage.innerHTML = '<span>ChatGPT 4: </span>' + data;
                chatMessages.appendChild(responseMessage);
                messages.scrollTop = messages.scrollHeight;
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('There was an error processing your request.');
            });
    });

    document.getElementById('chatgpt-input').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('chatgpt-send').click();
        }
    });
});

function fetchChatHistory() {
    fetch(chatgptSimulatorAjax.ajaxurl + '?action=get_chat_history', {
        method: 'GET',
    })
        .then(response => response.json())
        .then((history) => {
            const chatMessagesElement = document.getElementById('chatgpt-messages');
            history.forEach(item => {
                chatMessagesElement.innerHTML += '<div><span>You: </span>' + item.user_message + '</div><div><span>ChatGPT: </span>' + item.bot_response + '</div>';
            });
            chatMessagesElement.scrollTop = chatMessagesElement.scrollHeight;

        })
        .catch((error) => {
            console.error(error);
        });
}
