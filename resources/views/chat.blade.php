<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with GPT</title>
</head>
<body>
    <form method="POST" action="/chat">
        @csrf  <!-- CSRF保護のため -->
        <input type="text" name="message" placeholder="Enter your message" required>
        <button type="submit">Send</button>
    </form>
</body>
</html>
