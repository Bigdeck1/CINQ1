<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.E.W Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/landing.css">
</head>

<body>

    <header class="custom-header">
        <img src="image/gewlogo.png" alt="Logo" class="logo-img">
        <h1>CINQ CHAT BOT</h1>
        <img src="image/gewlogo.png" alt="Logo" class="logo-img">
    </header>

    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chatbot.php">Chat Bot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container chat-container">
            <div class="chatbox" id="chatbox"></div>
            <div id="typingIndicator" class="typing-indicator"></div>
            <div id="messageStatus"></div>
            <input type="text" id="userInput" class="user-input" placeholder="Type your message...">
            <div class="btn-container">
                <button onclick="sendMessage()" class="chat-btn">Send</button>
                <button onclick="clearChat()" class="chat-btn clear-btn">Clear Chat</button>
            </div>
        </div>
    </main>

    <footer class="custom-footer">
        <p>&copy; 2024 G.E.W All rights reserved.</p>
    </footer>

    <!-- JavaScript and Bootstrap dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        async function sendInitialGreeting() {
            try {
                let response = await fetch('process_message.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: 'hello' })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                let botReply = await response.json();
                displayBotMessage(botReply);
            } catch (error) {
                console.error('Error:', error);
            }
        }

        async function sendMessage(message = null) {
            var userInput = message || document.getElementById('userInput').value;
            document.getElementById('userInput').value = '';

            var userDiv = document.createElement('div');
            userDiv.textContent = 'User: ' + userInput;
            userDiv.classList.add('user-message');
            document.getElementById('chatbox').appendChild(userDiv);

            try {
                let response = await fetch('process_message.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: userInput })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                let botReply = await response.json();
                displayBotMessage(botReply);
            } catch (error) {
                console.error('Error:', error);
            }
        }

        function displayBotMessage(botReply) {
            var botDiv = document.createElement('div');
            botDiv.textContent = 'GEW ASSISTANT BOT: ' + botReply.text;
            botDiv.classList.add('bot-message');
            document.getElementById('chatbox').appendChild(botDiv);

            if (botReply.options) {
                var optionsDiv = document.createElement('div');
                optionsDiv.classList.add('options-container');
                botReply.options.forEach(option => {
                    var button = document.createElement('button');
                    button.textContent = option;
                    button.classList.add('option-btn');
                    button.onclick = () => sendMessage(option);
                    optionsDiv.appendChild(button);
                });
                document.getElementById('chatbox').appendChild(optionsDiv);
            }
        }

        async function clearChat() {
            try {
                let response = await fetch('process_message.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'delete_chat' })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                let serverResponse = await response.text();
                document.getElementById('chatbox').innerHTML = '';

                var botDiv = document.createElement('div');
                botDiv.textContent = 'GEW ASSISTANT BOT: ' + serverResponse;
                botDiv.classList.add('bot-message');
                document.getElementById('chatbox').appendChild(botDiv);

                var helpDiv = document.createElement('div');
                helpDiv.textContent = 'GEW ASSISTANT BOT: How can I help you?';
                helpDiv.classList.add('bot-message');
                document.getElementById('chatbox').appendChild(helpDiv);

                // Add example options after clearing chat
                var optionsDiv = document.createElement('div');
                optionsDiv.classList.add('options-container');
                var option1 = document.createElement('button');
                option1.textContent = 'Option 1';
                option1.classList.add('option-btn');
                option1.onclick = () => sendMessage('Option 1');
                var option2 = document.createElement('button');
                option2.textContent = 'Option 2';
                option2.classList.add('option-btn');
                option2.onclick = () => sendMessage('Option 2');
                optionsDiv.appendChild(option1);
                optionsDiv.appendChild(option2);
                document.getElementById('chatbox').appendChild(optionsDiv);
            } catch (error) {
                console.error('Error:', error);
            }
        }

        window.addEventListener('load', () => {
            sendInitialGreeting();
        });
    </script>

</body>
</html>
