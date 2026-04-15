<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact — MiauGame</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: #0f0f13;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
        }

        .card {
            background: #1a1a24;
            border: 1px solid #2a2a38;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 480px;
        }

        h1 {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 13px;
            color: #666;
            margin-bottom: 28px;
        }

        label {
            display: block;
            font-size: 11px;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 6px;
            margin-top: 16px;
        }

        input, textarea {
            width: 100%;
            background: #0f0f13;
            border: 1px solid #2a2a38;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            color: #e2e2e2;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus, textarea:focus {
            border-color: #4a4a60;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error {
            font-size: 12px;
            color: #f87171;
            margin-top: 4px;
        }

        .btn-submit {
            width: 100%;
            margin-top: 24px;
            padding: 12px;
            background: #1e3a2a;
            color: #4ade80;
            border: 1px solid #2a5a3a;
            border-radius: 24px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .btn-submit:hover {
            background: #2a5a3a;
            color: #86efac;
        }

        .success {
            background: #1e3a2a;
            border: 1px solid #2a5a3a;
            color: #4ade80;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .btn-back {
            position: fixed;
            top: 24px;
            left: 24px;
            font-size: 11px;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 20px;
            background: #2a2a38;
            color: #aaa;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }

        .btn-back:hover {
            background: #3a3a50;
            color: #fff;
        }
    </style>
</head>
<body>

    <a href="{{ route('games.index') }}" class="btn-back">← Back</a>

    <div class="card">
        <h1>Contact Admin</h1>
        <p class="subtitle">Send a message to the administrator.</p>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
            @error('subject') <div class="error">{{ $message }}</div> @enderror

            <label for="message">Message</label>
            <textarea id="message" name="message">{{ old('message') }}</textarea>
            @error('message') <div class="error">{{ $message }}</div> @enderror

            <button type="submit" class="btn-submit">Send Message →</button>
        </form>
    </div>

</body>
</html>