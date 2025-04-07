@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Chat with AI</h1>
        <div id="chat-box" class="border p-4 h-64 overflow-y-auto"></div>
        <input type="text" id="user-input" class="border p-2 w-full mt-2" placeholder="Type a message..." />
        <button onclick="sendMessage()" class="bg-blue-500 text-white p-2 mt-2">Send</button>
    </div>
<meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        function sendMessage() {
            let userMessage = document.getElementById('user-input').value;
            let chatBox = document.getElementById('chat-box');
    
            chatBox.innerHTML += `<p><strong>You:</strong> ${userMessage}</p>`;
    
            document.getElementById('user-input').value = '';
    
            fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // ✅ Include CSRF token
                },
                body: JSON.stringify({ message: userMessage })
            })
            .then(response => response.json())
            .then(data => {
                if (data.choices && data.choices.length > 0) {
                    let aiResponse = data.choices[0].message.content;
                    chatBox.innerHTML += `<p><strong>AI:</strong> ${aiResponse}</p>`;
                } else {
                    chatBox.innerHTML += `<p><strong>AI:</strong> Sorry, I couldn't understand that.</p>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                chatBox.innerHTML += `<p><strong>AI:</strong> Fuck off.</p>`;
            });
        }
    </script>
    
    
    
@endsection
