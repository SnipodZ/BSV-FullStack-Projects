<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: #f4f4f8;
            padding: 40px 24px;
            color: #333;
        }
        .card {
            max-width: 560px;
            margin: 0 auto;
            background: #fff;
            border-radius: 12px;
            padding: 32px;
            border: 1px solid #e0e0e8;
        }
        .label {
            font-size: 11px;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 4px;
        }
        .value {
            font-size: 15px;
            color: #111;
            margin-bottom: 20px;
        }
        .message-box {
            background: #f8f8fc;
            border-radius: 8px;
            padding: 16px;
            font-size: 14px;
            color: #444;
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <div class="card">
        <p class="label">From</p>
        <p class="value">{{ $senderName }} — {{ $senderEmail }}</p>

        <p class="label">Subject</p>
        <p class="value">{{ $mailSubject }}</p>

        <p class="label">Message</p>
        <div class="message-box">{{ $messageContent }}</div>
    </div>
</body>
</html>