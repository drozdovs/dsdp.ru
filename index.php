<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#f4f4f5" id="themeColor">
    <meta name="color-scheme" content="light dark">
    <title>Sergey Drozdov</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg: #f4f4f5;
            --surface: #ffffff;
            --text: #18181b;
            --muted: #71717a;
            --border: #e4e4e7;
            --shadow: 0 1px 2px rgba(24, 24, 27, 0.06), 0 8px 24px rgba(24, 24, 27, 0.06);
            --icon-bg: #f4f4f5;
            --theme-meta: #f4f4f5;
            --safe-top: env(safe-area-inset-top, 0px);
            --safe-bottom: env(safe-area-inset-bottom, 0px);
            --safe-x: max(env(safe-area-inset-left, 0px), env(safe-area-inset-right, 0px));
        }

        [data-theme="dark"] {
            --bg: #0c0c0d;
            --surface: #18181b;
            --text: #fafafa;
            --muted: #a1a1aa;
            --border: #27272a;
            --shadow: 0 1px 2px rgba(0, 0, 0, 0.4), 0 12px 32px rgba(0, 0, 0, 0.28);
            --icon-bg: #27272a;
            --theme-meta: #0c0c0d;
        }

        @media (prefers-color-scheme: dark) {
            :root:not([data-theme="light"]) {
                --bg: #0c0c0d;
                --surface: #18181b;
                --text: #fafafa;
                --muted: #a1a1aa;
                --border: #27272a;
                --shadow: 0 1px 2px rgba(0, 0, 0, 0.4), 0 12px 32px rgba(0, 0, 0, 0.28);
                --icon-bg: #27272a;
                --theme-meta: #0c0c0d;
            }
        }

        html { color-scheme: light dark; }
        [data-theme="light"] { color-scheme: light; }
        [data-theme="dark"] { color-scheme: dark; }

        html, body { min-height: 100%; }
        body {
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
        }

        .shell {
            width: min(430px, 100%);
            min-height: 100dvh;
            margin: 0 auto;
            background: var(--bg);
            position: relative;
        }

        .theme-btn {
            position: absolute;
            top: calc(12px + var(--safe-top));
            right: max(12px, var(--safe-x));
            z-index: 2;
            width: 40px;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: var(--surface);
            color: var(--text);
            box-shadow: var(--shadow);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            touch-action: manipulation;
        }
        .theme-btn svg { width: 18px; height: 18px; }
        .theme-btn .icon-sun { display: none; }
        .theme-btn .icon-moon { display: block; }
        [data-theme="light"] .theme-btn .icon-sun { display: block; }
        [data-theme="light"] .theme-btn .icon-moon { display: none; }
        @media (prefers-color-scheme: light) {
            :root:not([data-theme="dark"]) .theme-btn .icon-sun { display: block; }
            :root:not([data-theme="dark"]) .theme-btn .icon-moon { display: none; }
        }

        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: calc(28px + var(--safe-top)) 24px 8px;
        }

        .avatar {
            width: 104px;
            height: 104px;
            border-radius: 999px;
            background: linear-gradient(145deg, #6366f1, #8b5cf6 55%, #06b6d4);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 700;
            font-size: 34px;
            letter-spacing: -0.04em;
            box-shadow: var(--shadow);
        }

        .name {
            margin-top: 14px;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.2;
        }

        .bio {
            margin-top: 6px;
            color: var(--muted);
            font-size: 0.9375rem;
            font-weight: 500;
        }

        .save-btn {
            margin-top: 16px;
            height: 44px;
            padding: 0 16px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: var(--surface);
            color: var(--text);
            box-shadow: var(--shadow);
            font: 600 0.8125rem/1 Inter, sans-serif;
            letter-spacing: 0.01em;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            touch-action: manipulation;
        }
        .save-btn svg { width: 16px; height: 16px; }
        .save-btn:active { transform: scale(0.98); }

        .links {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 20px 20px 8px;
        }

        .card {
            display: flex;
            align-items: center;
            gap: 14px;
            min-height: 64px;
            padding: 12px 14px 12px 12px;
            border-radius: 16px;
            background: var(--surface);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            text-decoration: none;
            color: inherit;
            touch-action: manipulation;
            transition: transform 0.15s ease, background 0.15s ease;
        }
        .card:active { transform: scale(0.985); }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--icon-bg);
            display: grid;
            place-items: center;
            flex-shrink: 0;
            color: var(--text);
        }
        .card-icon svg { width: 18px; height: 18px; }
        .card--telegram .card-icon { color: #0ea5e9; }
        .card--whatsapp .card-icon { color: #22c55e; }
        .card--phone .card-icon { color: #3b82f6; }
        .card--email .card-icon { color: #f59e0b; }
        .card--instagram .card-icon { color: #ec4899; }

        .card-text { display: flex; flex-direction: column; gap: 2px; min-width: 0; flex: 1; }
        .card-label {
            font-size: 0.6875rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--muted);
        }
        .card-value {
            font-size: 0.9375rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .card-go { color: var(--muted); display: flex; }
        .card-go svg { width: 18px; height: 18px; }

        .socials {
            display: flex;
            justify-content: center;
            gap: 12px;
            padding: 16px 20px calc(28px + var(--safe-bottom));
        }
        .social {
            width: 44px;
            height: 44px;
            border-radius: 999px;
            background: var(--surface);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            color: var(--text);
            display: grid;
            place-items: center;
            text-decoration: none;
        }
        .social svg { width: 18px; height: 18px; }
        .social:active { transform: scale(0.96); }

        @media (hover: hover) and (pointer: fine) {
            .card:hover, .save-btn:hover, .social:hover, .theme-btn:hover {
                background: color-mix(in srgb, var(--surface) 92%, var(--text) 8%);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation: none !important; transition: none !important; }
        }
    </style>
</head>
<body>
    <div class="shell">
        <button type="button" class="theme-btn" id="themeToggle" aria-label="Переключить тему">
            <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
            <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>
        </button>

        <header class="profile">
            <div class="avatar" aria-hidden="true">SD</div>
            <h1 class="name">Sergey Drozdov</h1>
            <p class="bio">Контакты · @drozdows</p>
            <button type="button" class="save-btn" id="saveContactBtn" aria-label="Сохранить контакт в телефон">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                В контакты
            </button>
        </header>

        <nav class="links" aria-label="Контакты">
            <a href="tel:+79022295500" class="card card--phone" title="Позвонить">
                <span class="card-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </span>
                <span class="card-text">
                    <span class="card-label">Телефон</span>
                    <span class="card-value">+7 902 229-55-00</span>
                </span>
                <span class="card-go" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
            </a>

            <a href="https://t.me/drozdows" class="card card--telegram" target="_blank" rel="noopener noreferrer" title="Открыть Telegram">
                <span class="card-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                </span>
                <span class="card-text">
                    <span class="card-label">Telegram</span>
                    <span class="card-value">@drozdows</span>
                </span>
                <span class="card-go" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
            </a>

            <a href="https://wa.me/79022295500" class="card card--whatsapp" target="_blank" rel="noopener noreferrer" title="Открыть WhatsApp">
                <span class="card-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                </span>
                <span class="card-text">
                    <span class="card-label">WhatsApp</span>
                    <span class="card-value">+7 902 229-55-00</span>
                </span>
                <span class="card-go" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
            </a>

            <a href="https://instagram.com/drozdov.dop/" class="card card--instagram" target="_blank" rel="noopener noreferrer" title="Открыть Instagram">
                <span class="card-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                </span>
                <span class="card-text">
                    <span class="card-label">Instagram</span>
                    <span class="card-value">@drozdov.dop</span>
                </span>
                <span class="card-go" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
            </a>

            <a href="mailto:the@manoflight.ru" class="card card--email" title="Написать письмо">
                <span class="card-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </span>
                <span class="card-text">
                    <span class="card-label">Почта</span>
                    <span class="card-value">the@manoflight.ru</span>
                </span>
                <span class="card-go" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
            </a>
        </nav>

        <nav class="socials" aria-label="Соцсети">
            <a class="social" href="https://t.me/drozdows" target="_blank" rel="noopener noreferrer" aria-label="Telegram">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
            </a>
            <a class="social" href="https://wa.me/79022295500" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
            </a>
            <a class="social" href="https://instagram.com/drozdov.dop/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
            </a>
            <a class="social" href="mailto:the@manoflight.ru" aria-label="Почта">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </a>
        </nav>
    </div>

    <script>
        var vcard = [
            'BEGIN:VCARD', 'VERSION:3.0',
            'FN:Sergey Drozdov', 'N:Drozdov;Sergey;;;',
            'TEL;TYPE=CELL:+79022295500',
            'EMAIL:the@manoflight.ru',
            'URL:https://t.me/drozdows',
            'URL:https://instagram.com/drozdov.dop/',
            'END:VCARD'
        ].join('\r\n');

        function isAppleTouch() {
            return /iPad|iPhone|iPod/.test(navigator.userAgent) ||
                (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
        }

        function saveContact() {
            var blob = new Blob([vcard], { type: 'text/vcard;charset=utf-8' });
            if (isAppleTouch()) {
                var reader = new FileReader();
                reader.onload = function() { window.location.href = reader.result; };
                reader.readAsDataURL(blob);
                return;
            }
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Sergey-Drozdov.vcf';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            setTimeout(function() { URL.revokeObjectURL(url); }, 1000);
        }

        function syncThemeColor() {
            var meta = document.getElementById('themeColor');
            if (!meta) return;
            var value = getComputedStyle(document.documentElement).getPropertyValue('--theme-meta').trim();
            if (value) meta.setAttribute('content', value);
        }

        (function() {
            var btn = document.getElementById('themeToggle');
            var stored = localStorage.getItem('theme');
            if (stored) document.documentElement.setAttribute('data-theme', stored);
            syncThemeColor();
            if (btn) btn.addEventListener('click', function() {
                var root = document.documentElement;
                var light = root.getAttribute('data-theme') === 'light' ||
                    (!root.getAttribute('data-theme') && matchMedia('(prefers-color-scheme: light)').matches);
                root.setAttribute('data-theme', light ? 'dark' : 'light');
                localStorage.setItem('theme', light ? 'dark' : 'light');
                syncThemeColor();
            });
        })();

        var saveBtn = document.getElementById('saveContactBtn');
        if (saveBtn) saveBtn.addEventListener('click', saveContact);
    </script>
</body>
</html>
