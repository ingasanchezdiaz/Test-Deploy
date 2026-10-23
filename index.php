<?php
require_once __DIR__ . '/collection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Deployment</title>
    <style>
        :root {
            color-scheme: dark;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #080b14;
            color: #f8fafc;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 32px 20px;
            background:
                radial-gradient(circle at top left, rgba(124, 58, 237, 0.24), transparent 36%),
                radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.18), transparent 32%),
                #080b14;
        }

        main {
            width: min(920px, 100%);
        }

        .eyebrow {
            margin: 0 0 8px;
            color: #a78bfa;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            font-size: clamp(2rem, 6vw, 3.75rem);
            letter-spacing: -0.045em;
            line-height: 1;
        }

        .intro {
            max-width: 600px;
            margin: 16px 0 28px;
            color: #94a3b8;
            font-size: 1.05rem;
            line-height: 1.65;
        }

        .video-card {
            padding: 10px;
            overflow: hidden;
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 22px;
            background: rgba(15, 23, 42, 0.72);
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.38);
            backdrop-filter: blur(16px);
        }

        .video-card iframe {
            display: block;
            width: 100%;
            height: auto;
            aspect-ratio: 16 / 9;
            border: 0;
            border-radius: 14px;
        }

        .controls {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-top: 18px;
        }

        .button {
            display: inline-flex;
            min-height: 44px;
            align-items: center;
            justify-content: center;
            padding: 0 18px;
            border: 1px solid rgba(148, 163, 184, 0.22);
            border-radius: 999px;
            color: #e2e8f0;
            background: rgba(15, 23, 42, 0.66);
            font-weight: 650;
            text-decoration: none;
            transition: transform 160ms ease, border-color 160ms ease, background 160ms ease;
        }

        .button:hover {
            transform: translateY(-2px);
            border-color: #8b5cf6;
            background: rgba(124, 58, 237, 0.18);
        }

        .button.active {
            border-color: transparent;
            color: #fff;
            background: linear-gradient(135deg, #7c3aed, #2563eb);
        }

        .button.random {
            margin-left: auto;
        }

        @media (max-width: 560px) {
            body {
                padding: 24px 14px;
            }

            .video-card {
                padding: 6px;
                border-radius: 16px;
            }

            .video-card iframe {
                border-radius: 11px;
            }

            .button.random {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <main>
        <p class="eyebrow">Now screening</p>
        <h1>Video Collection</h1>
        <p class="intro">Pick something from the collection or let chance choose your next watch.</p>

        <section class="video-card" aria-label="Selected video">
            <?php if ($id !== null && $id !== false && array_key_exists($id, $Videos)): ?>
                <?= VideoByID($id, $Videos); ?>
            <?php else: ?>
                <?= RandomVideo($Videos); ?>
            <?php endif; ?>
        </section>

        <nav class="controls" aria-label="Video selection">
            <?php foreach ($Videos as $videoId => $video): ?>
                <a
                    class="button <?= $id === $videoId ? 'active' : ''; ?>"
                    href="?id=<?= $videoId; ?>"
                >Video <?= $videoId + 1; ?></a>
            <?php endforeach; ?>
            <a class="button random" href="./">Surprise me</a>
        </nav>
    </main>
</body>
</html>
