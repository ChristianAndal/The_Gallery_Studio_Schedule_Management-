<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            overflow: hidden;
            background: #efeff1;
        }

        body.sidebar-open {
            overflow: hidden;
        }

        .home-shell {
            height: 100vh;
            position: relative;
        }

        .home-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background: #ffffff;
            border-right: 1px solid #e0e0e0;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            overflow-y: auto;
            z-index: 1010;
            transition: transform 0.2s ease;
        }

        .home-shell.sidebar-closed .home-sidebar {
            transform: translateX(-100%);
        }

        .home-sidebar-header {
            display: none;
            justify-content: flex-end;
        }

        .home-sidebar-close {
            border: 0;
            background: #f1f2f6;
            color: #4f5461;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            font-size: 1.2rem;
            line-height: 1;
            cursor: pointer;
        }

        .home-brand {
            text-align: center;
        }

        .home-brand img {
            width: 100%;
            max-width: 180px;
            height: auto;
            margin: 0 auto 8px;
            display: block;
        }

        .home-brand h1 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
            color: #424754;
        }

        .home-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .home-nav a {
            text-decoration: none;
            color: #4f5461;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .home-nav a.active,
        .home-nav a:hover {
            background: #f1f2f6;
        }

        .home-promo {
            margin-top: auto;
            padding: 12px;
            border-radius: 12px;
            background: #f7f7fa;
            color: #4f5461;
        }

        .home-promo-title {
            margin: 0 0 4px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .home-promo-time {
            margin: 0;
            font-size: 0.8rem;
            color: #6e7482;
        }

        .home-main {
            min-width: 0;
            margin-left: 250px;
            height: 100vh;
            overflow-y: auto;
            transition: margin-left 0.2s ease;
        }

        .home-shell.sidebar-closed .home-main {
            margin-left: 0;
        }

        .home-sidebar-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 14px;
            left: 14px;
            z-index: 1011;
            width: 40px;
            height: 40px;
            border: 0;
            border-radius: 10px;
            background: #4f5461;
            color: #ffffff;
            font-size: 1.2rem;
            line-height: 1;
            cursor: pointer;
        }

        .home-sidebar-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            z-index: 1009;
        }

        @media (max-width: 960px) {
            .home-sidebar {
                inset: 0 auto 0 0;
                width: min(82vw, 300px);
                transform: translateX(-100%);
            }

            .home-shell.sidebar-open .home-sidebar {
                transform: translateX(0);
            }

            .home-shell.sidebar-open .home-sidebar-backdrop {
                display: block;
            }

            .home-sidebar-header {
                display: flex;
                align-items: center;
            }

            .home-main {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="home-shell" id="home-shell">
        <button class="home-sidebar-toggle" id="home-sidebar-toggle" type="button" aria-label="Open sidebar" aria-controls="home-sidebar" aria-expanded="false">&#9776;</button>
        <div class="home-sidebar-backdrop" id="home-sidebar-backdrop" aria-hidden="true"></div>

        <aside class="home-sidebar" id="home-sidebar">
            <div class="home-sidebar-header">
                <button class="home-sidebar-close" id="home-sidebar-close" type="button" aria-label="Close sidebar">&times;</button>
            </div>

            <div class="home-brand">
                <img src="{{ asset('logo.png') }}" alt="Gallery Studio Logo" style='width: 200px;'>
                <h1>Gallery Studio</h1>
            </div>

            <nav class="home-nav" aria-label="Sidebar">
                <a href="/home/dashboard" class="{{ request()->is('home/dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="/home/scheduling" class="{{ request()->is('home/scheduling') ? 'active' : '' }}">Scheduling</a>
                <a href="/home/sales" class="{{ request()->is('home/sales') ? 'active' : '' }}">Sales Monitoring</a>
                <a href="/home/inquiries" class="{{ request()->is('home/inquiries') ? 'active' : '' }}">Inquiries</a>
                <a href="/home/calendar" class="{{ request()->is('home/calendar') ? 'active' : '' }}">Calendar</a>
                <a href="/home/messages" class="{{ request()->is('home/messages') ? 'active' : '' }}">Messages</a>
                <a href="/home/inventory" class="{{ request()->is('home/inventory') ? 'active' : '' }}">Inventory</a>
                <a href="/home/gallery" class="{{ request()->is('home/gallery') ? 'active' : '' }}">Gallery</a>
                <a href="/home/settings" class="{{ request()->is('home/settings') ? 'active' : '' }}">Settings</a>
            </nav>

            <div class="home-promo">
                <p class="home-promo-title">System Sync Window</p>
                <p class="home-promo-time">0 Days 10 Hours 23 Minutes</p>
            </div>
        </aside>

        <main class="home-main">
            <div id="app" data-external-sidebar="1"></div>
        </main>
    </div>

    <script>
        (function () {
            const shell = document.getElementById('home-shell');
            const toggleBtn = document.getElementById('home-sidebar-toggle');
            const closeBtn = document.getElementById('home-sidebar-close');
            const backdrop = document.getElementById('home-sidebar-backdrop');
            const media = window.matchMedia('(max-width: 960px)');

            const setOpen = (open) => {
                if (media.matches) {
                    shell.classList.toggle('sidebar-open', open);
                    document.body.classList.toggle('sidebar-open', open);
                    shell.classList.remove('sidebar-closed');
                    toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                    return;
                }

                shell.classList.remove('sidebar-open');
                document.body.classList.remove('sidebar-open');
                shell.classList.toggle('sidebar-closed', !open);
                toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
            };

            const isOpen = () => (
                media.matches
                    ? shell.classList.contains('sidebar-open')
                    : !shell.classList.contains('sidebar-closed')
            );

            toggleBtn.addEventListener('click', () => setOpen(!isOpen()));
            closeBtn.addEventListener('click', () => setOpen(false));
            backdrop.addEventListener('click', () => setOpen(false));
            media.addEventListener('change', () => setOpen(!media.matches));

            setOpen(!media.matches);
        })();
    </script>
</body>
</html>

