<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="app-shell">
        <aside class="app-sidebar">
            <div class="brand-wrap">
                <div class="brand-mark">GS</div>
                <h1 class="brand-title">Gallery Studio</h1>
            </div>
            <nav class="sidebar-nav">
                <button type="button" class="sidebar-link" data-component="dashboard">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M3 3h8v8H3V3zm10 0h8v5h-8V3zM3 13h8v8H3v-8zm10-3h8v11h-8V10z"/></svg>
                    </span>
                    Dashboard
                </button>
                <button type="button" class="sidebar-link" data-component="scheduling">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M7 2h2v2h6V2h2v2h3v18H4V4h3V2zm11 8H6v10h12V10z"/></svg>
                    </span>
                    Scheduling
                </button>
                <button type="button" class="sidebar-link" data-component="sales">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M3 17h3v4H3v-4zm5-6h3v10H8V11zm5-4h3v14h-3V7zm5-5h3v19h-3V2z"/></svg>
                    </span>
                    Sales Monitoring
                </button>
                <button type="button" class="sidebar-link" data-component="inquiries">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M4 4h16v12H7l-3 3V4zm2 2v8.17L6.17 14H18V6H6z"/></svg>
                    </span>
                    Inquiries
                </button>
                <button type="button" class="sidebar-link" data-component="messages">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M2 5h20v14H2V5zm2 2v.5l8 5 8-5V7H4zm16 10V9.78l-8 5-8-5V17h16z"/></svg>
                    </span>
                    Messages
                </button>
                <button type="button" class="sidebar-link" data-component="inventory">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M12 2l9 4.5v11L12 22l-9-4.5v-11L12 2zm0 2.2L5.5 7 12 9.8 18.5 7 12 4.2zM5 8.6v7.7l6 3V11.6L5 8.6zm14 0l-6 3v7.7l6-3V8.6z"/></svg>
                    </span>
                    Inventory
                </button>
                <button type="button" class="sidebar-link" data-component="calendar">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M7 2h2v2h6V2h2v2h3v18H4V4h3V2zm11 6H6v12h12V8zm-8 3h4v4h-4v-4z"/></svg>
                    </span>
                    Calendar
                </button>
                <button type="button" class="sidebar-link" data-component="settings">
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58-1.92-3.32-2.39.96a7.29 7.29 0 0 0-1.63-.94L14.87 3h-3.74l-.36 2.18c-.58.23-1.12.54-1.63.94l-2.39-.96-1.92 3.32 2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58 1.92 3.32 2.39-.96c.51.4 1.05.71 1.63.94l.36 2.18h3.74l.36-2.18c.58-.23 1.12-.54 1.63-.94l2.39.96 1.92-3.32-2.03-1.58zM13 15h-2v-2h2v2zm0-4h-2V9h2v2z"/></svg>
                    </span>
                    Settings
                </button>
            </nav>

            <div class="sidebar-promo">
                <p class="promo-title">System Sync Window</p>
                <p class="promo-timer">0 Days 10 Hours 23 Minutes</p>
            </div>
        </aside>

        <div class="app-main">
            <header class="app-header">
                <div>
                    <h2 id="home-page-title" class="header-title">Studio Scheduling System</h2>
                    <p id="home-page-subtitle" class="header-subtitle">Overview for schedules, sales monitoring, and operations.</p>
                </div>
                <div class="header-tools">
                    <label class="search-wrap" for="header-search">
                        <input id="header-search" type="text" placeholder="Search modules" />
                    </label>
                    <button type="button" class="header-icon-btn" aria-label="Notifications">N</button>
                    <div class="profile-chip">
                        <span class="profile-avatar">T</span>
                        <div>
                            <p class="profile-name">Taruk</p>
                            <p class="profile-role">Admin</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="app-content">
                <div id="home-content"></div>
            </main>
        </div>
    </div>
</body>
</html>
