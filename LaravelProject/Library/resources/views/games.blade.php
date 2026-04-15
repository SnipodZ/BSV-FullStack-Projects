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
            align-items: center;
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

        /* mismo estilo que los badges pero con cursor pointer */
        .badge-details {
            background: #2a2a38;
            color: #aaa;
            font-size: 11px;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.2s, background 0.2s;
        }

        .badge-details:hover {
            background: #3a3a50;
            color: #fff;
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

        .create-wrapper {
            display: flex;
            justify-content: center;
            padding: 24px 0 48px;
        }

        .btn-create {
            background: #b56aff;
            color: #0f0f13;
            font-size: 13px;
            font-weight: 500;
            padding: 10px 28px;
            border-radius: 24px;
            border: 1px solid #8130d2;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }

        .btn-create:hover {
            background: #8130d2;
            color: black;
        }
    </style>
</head>
<body>

    <div class="section">
        <h2>Games</h2>
        <div class="grid">
            @foreach ($games as $game)
            <div class="card">
                <div class="card-title">{{ $game->name }}</div>
                <div class="card-description">{{ $game->description }}</div>
                <div class="card-meta">
                    <span class="badge badge-year">{{ \Carbon\Carbon::parse($game->release_date)->format('M-d-Y') }}</span>
                    <span class="badge badge-genre">{{ $game->genre->name }}</span>
                    <span class="badge badge-publisher">{{ $game->publisher->name }}</span>
                    <a href="{{ route('games.show', $game->id) }}" class="badge-details">
                        View Details →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <h2>Genres</h2>
        <div class="simple-grid">
            @foreach ($genres as $genre)
            <div class="simple-card">{{ $genre->name }} - <br>
                 {{ $genre->subgenre }}</div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <h2>Publishers</h2>
        <div class="simple-grid">
            @foreach ($publishers as $publisher)
            <div class="simple-card">{{ $publisher->name }}</div>
            @endforeach
        </div>
    </div>

    <div class="create-wrapper">
        <a href="{{ route('games.create') }}" class="btn-create">
            + Create a game
        </a>
    </div>

</body>
</html>