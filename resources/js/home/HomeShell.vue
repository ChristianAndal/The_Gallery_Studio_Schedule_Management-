<template>
    <v-app class="gs-app">
        <v-navigation-drawer
            v-model="drawer"
            :temporary="mdAndDown"
            :permanent="!mdAndDown"
            class="gs-sidebar"
            width="250"
        >
            <div class="brand-wrap">
                <div class="brand-mark">GS</div>
                <h1 class="brand-title">Gallery Studio</h1>
            </div>

            <v-list nav density="compact" class="sidebar-list">
                <v-list-item
                    v-for="item in routes"
                    :key="item.key"
                    :active="activeRoute.key === item.key"
                    rounded="lg"
                    class="sidebar-item"
                    @click="navigate(item)"
                >
                    <template #prepend>
                        <span class="sidebar-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path :d="iconPaths[item.key]" /></svg>
                        </span>
                    </template>
                    <v-list-item-title>{{ item.label }}</v-list-item-title>
                </v-list-item>
            </v-list>

            <div class="sidebar-promo">
                <p class="promo-title">System Sync Window</p>
                <p class="promo-timer">0 Days 10 Hours 23 Minutes</p>
            </div>
        </v-navigation-drawer>

        <v-main>
            <div class="app-main">
                <header class="app-header">
                    <div class="header-left">
                        <v-btn
                            v-if="mdAndDown"
                            variant="text"
                            icon
                            class="menu-btn"
                            aria-label="Open menu"
                            @click="drawer = !drawer"
                        >
                            <span class="menu-glyph" aria-hidden="true"></span>
                        </v-btn>
                        <div class="header-copy">
                            <h2 class="header-title">{{ pageTitle }}</h2>
                            <p class="header-subtitle">{{ pageSubtitle }}</p>
                        </div>
                    </div>

                    <div class="header-tools">
                        <v-text-field
                            model-value=""
                            variant="solo-filled"
                            flat
                            density="compact"
                            hide-details
                            placeholder="Search modules"
                            class="search-field"
                        />
                        <v-btn variant="tonal" rounded="pill" size="small">N</v-btn>
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
                    <component :is="activeRoute.component" :route="activeRoute" />
                </main>
            </div>

            <v-bottom-navigation
                v-if="mdAndDown"
                class="mobile-bottom-nav"
                grow
                :model-value="activeRoute.key"
            >
                <v-btn
                    v-for="item in mobileRoutes"
                    :key="item.key"
                    :value="item.key"
                    class="mobile-nav-btn"
                    @click="navigate(item)"
                >
                    <span class="sidebar-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path :d="iconPaths[item.key]" /></svg>
                    </span>
                    <span>{{ item.label }}</span>
                </v-btn>
            </v-bottom-navigation>
        </v-main>
    </v-app>
</template>

<script setup>
import { computed, onBeforeUnmount, onMounted, ref, watch } from 'vue';
import { useDisplay } from 'vuetify';
import { DEFAULT_ROUTE_PATH, getRouteByPath, redirectTo, routes } from '../routes';

const { mdAndDown } = useDisplay();
const drawer = ref(!mdAndDown.value);
const currentPath = ref(window.location.pathname);

const iconPaths = {
    dashboard: 'M3 3h8v8H3V3zm10 0h8v5h-8V3zM3 13h8v8H3v-8zm10-3h8v11h-8V10z',
    scheduling: 'M7 2h2v2h6V2h2v2h3v18H4V4h3V2zm11 8H6v10h12V10z',
    sales: 'M3 17h3v4H3v-4zm5-6h3v10H8V11zm5-4h3v14h-3V7zm5-5h3v19h-3V2z',
    inquiries: 'M4 4h16v12H7l-3 3V4zm2 2v8.17L6.17 14H18V6H6z',
    messages: 'M2 5h20v14H2V5zm2 2v.5l8 5 8-5V7H4zm16 10V9.78l-8 5-8-5V17h16z',
    inventory: 'M12 2l9 4.5v11L12 22l-9-4.5v-11L12 2zm0 2.2L5.5 7 12 9.8 18.5 7 12 4.2zM5 8.6v7.7l6 3V11.6L5 8.6zm14 0l-6 3v7.7l6-3V8.6z',
    calendar: 'M7 2h2v2h6V2h2v2h3v18H4V4h3V2zm11 6H6v12h12V8zm-8 3h4v4h-4v-4z',
    settings: 'M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58-1.92-3.32-2.39.96a7.29 7.29 0 0 0-1.63-.94L14.87 3h-3.74l-.36 2.18c-.58.23-1.12.54-1.63.94l-2.39-.96-1.92 3.32 2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58 1.92 3.32 2.39-.96c.51.4 1.05.71 1.63.94l.36 2.18h3.74l.36-2.18c.58-.23 1.12-.54 1.63-.94l2.39.96 1.92-3.32-2.03-1.58zM13 15h-2v-2h2v2zm0-4h-2V9h2v2z',
};

const mobileRoutes = computed(() => routes.slice(0, 5));
const activeRoute = computed(() => getRouteByPath(currentPath.value) ?? routes[0]);
const pageTitle = computed(() => (
    activeRoute.value.key === 'dashboard' ? 'Studio Scheduling System' : activeRoute.value.label
));
const pageSubtitle = computed(() => (
    activeRoute.value.key === 'dashboard'
        ? 'Overview for schedules, sales monitoring, and operations.'
        : `${activeRoute.value.label} workspace and activity details.`
));

const syncRouteFromUrl = () => {
    const route = getRouteByPath(window.location.pathname);
    if (!route) {
        redirectTo(DEFAULT_ROUTE_PATH, true);
        return;
    }
    currentPath.value = window.location.pathname;
};

const navigate = (route) => {
    if (window.location.pathname !== route.path) {
        redirectTo(route.path);
    }
    if (mdAndDown.value) {
        drawer.value = false;
    }
};

watch(mdAndDown, (isCompact) => {
    drawer.value = !isCompact;
});

onMounted(() => {
    window.addEventListener('popstate', syncRouteFromUrl);
    syncRouteFromUrl();
});

onBeforeUnmount(() => {
    window.removeEventListener('popstate', syncRouteFromUrl);
});
</script>
