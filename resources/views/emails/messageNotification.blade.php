<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message Notification</title>
</head>
<body>
    <h1>New Message Notification</h1>

    <p>Hello,</p>
    <p>A new message was sent from the website contact form:</p>

    <ul>
        <li><strong>Name:</strong> {{ $message->names }}</li>
        <li><strong>Email:</strong> {{ $message->email }}</li>
        <li><strong>Subject:</strong> {{ $message->subject }}</li>
        <li><strong>Message:</strong></li>
    </ul>
    <p style="white-space: pre-line;">{{ $message->message }}</p>
</body>
</html>
