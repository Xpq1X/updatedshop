@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="relative h-screen mt-20 bg-gradient-to-b from-indigo-700 to-indigo-900 font-gambetta">
    <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-50"></div>
    <div class="flex items-center justify-center h-full text-center">
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="py-16 bg-gray-50 text-center">
    <h2 class="font-gambetta text-4xl font-semibold text-gray-800">Proč nakupovat u nás?</h2>
    <p class="mt-4 text-lg text-gray-600">Nabízíme nejlepší produkty za nejlepší ceny!</p>
</div>

@include('components.product-slider')
@include('components.reviews')



@endsection

@push('styles')
<style>
    #chat-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        font-family: Arial, sans-serif;
        z-index: 9999;
    }

    #chat-header {
        background-color: #007bff;
        color: white;
        padding: 10px;
        text-align: center;
        cursor: pointer;
        border-radius: 10px 10px 0 0;
        font-weight: bold;
    }

    #chatbox {
        display: none;
        background: white;
        border: 1px solid #ccc;
        border-radius: 0 0 10px 10px;
        padding: 10px;
        max-height: 300px;
        overflow-y: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    #messages {
        max-height: 200px;
        overflow-y: auto;
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid #ddd;
        height: 200px;
    }

    #userMessage {
        width: 75%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        width: 20%;
        background: #007bff;
        color: white;
        border: none;
        padding: 6px;
        cursor: pointer;
        border-radius: 5px;
    }

    button:hover {
        background: #0056b3;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function sendMessage() {
        var userMessage = $("#userMessage").val();
        if (userMessage.trim() === "") return;

        $("#messages").append("<p><b>You:</b> " + userMessage + "</p>");
        $("#userMessage").val("");

        $.post("/chat", { message: userMessage, _token: "{{ csrf_token() }}" }, function(response) {
            $("#messages").append("<p><b>AI:</b> " + response.reply + "</p>");
        }).fail(function() {
            $("#messages").append("<p><b>AI:</b> Sorry, I couldn't process that request.</p>");
        });
    }

    function toggleChat() {
        $("#chatbox").toggle();
    }
</script>
@endpush
