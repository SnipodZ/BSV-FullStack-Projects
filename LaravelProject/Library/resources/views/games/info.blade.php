<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MiauGame</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: #0f0f13;
            min-height: 100vh;
            padding: 48px 24px;
        }

        h2 {
            font-size: 13px;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 10px;
            margin-top:20px;
        }

        .section {
            max-width: 960px;
            margin: 0 auto 48px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
        }

        .card {
            background: #1a1a24;
            border: 1px solid #2a2a38;
            border-radius: 12px;
            padding: 20px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 8px;
        }

        .card-description {
            font-size: 13px;
            color: #888;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .card-meta {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .badge {
            font-size: 11px;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 20px;
            background: #2a2a38;
            color: #aaa;
        }

        .badge-genre {
            background: #1e2a3a;
            color: #60a5fa;
        }

        .badge-publisher {
            background: #2a1e3a;
            color: #c084fc;
        }

        .badge-year {
            background: #1e3a2a;
            color: #4ade80;
        }

        .simple-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 12px;
        }

        .simple-card {
            background: #1a1a24;
            border: 1px solid #2a2a38;
            border-radius: 10px;
            padding: 14px 18px;
            font-size: 14px;
            color: #ccc;
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

    <div class="section">
        <h2>Games</h2>
        <div class="grid">
            <div class="card">
                <div class="card-title">{{ $game->name }}</div>
                <div class="card-description">{{ $game->description }}</div>
                <div class="card-meta">
                    <span class="badge badge-year">{{ \Carbon\Carbon::parse($game->release_date)->format('d-m-Y') }}</span>
                    <span class="badge badge-genre">{{ $game->genre->name }}</span>
                    <span class="badge badge-publisher">{{ $game->publisher->name }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <h2>Genres</h2>
        <div class="simple-grid">
            <div class="simple-card">{{ $game->genre->name }}</div>
        </div>
    </div>

</body>
</html>