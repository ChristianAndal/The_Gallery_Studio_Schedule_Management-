<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="home-shell">
        <aside class="home-sidebar">
            <div class="home-brand-wrap">
                <h1 class="home-brand">Studio Manager</h1>
                <p class="home-brand-sub">Management Portal</p>
            </div>
            <nav class="home-nav">
                <button type="button" class="sidebar-link" data-component="dashboard">
                    Dashboard
                </button>
                <button type="button" class="sidebar-link" data-component="inquiries">
                    Inquiries
                </button>
                <button type="button" class="sidebar-link" data-component="social">
                    Social
                </button>
                <button type="button" class="sidebar-link" data-component="sales">
                    Sales
                </button>
                <button type="button" class="sidebar-link" data-component="inventory">
                    Inventory
                </button>
                <button type="button" class="sidebar-link" data-component="mesages">
                    Mesages
                </button>
                <button type="button" class="sidebar-link" data-component="gallery">
                    Gallery
                </button>
                <button type="button" class="sidebar-link" data-component="settings">
                    Settings
                </button>
            </nav>
        </aside>

        <div class="home-main">
            <header class="home-header">
                <div>
                    <h2 id="home-page-title" class="home-header-title">Dashboard</h2>
                    <p id="home-page-subtitle" class="home-header-subtitle">Overview of studio activity and operations.</p>
                </div>
                <div class="header-actions">
                    <button type="button" class="header-action profile-action">AccProfile</button>
                    <button type="button" class="header-action icon-action" aria-label="Notification">
                        <span class="icon-dot">N</span>
                        <span>Notification</span>
                    </button>
                    <button type="button" class="header-action icon-action" aria-label="MessageIcon">
                        <span class="icon-dot">M</span>
                        <span>MessageIcon</span>
                    </button>
                </div>
            </header>

            <main class="home-content">
                <div id="home-content"></div>
            </main>
        </div>
    </div>
</body>
</html>
