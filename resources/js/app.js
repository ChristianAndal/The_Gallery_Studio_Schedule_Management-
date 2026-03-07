import './bootstrap';
import { createApp } from 'vue';
import {
    DEFAULT_ROUTE_PATH,
    getRouteByKey,
    getRouteByPath,
    redirectTo,
} from './routes';

const contentElement = document.getElementById('home-content');
const sidebarButtons = document.querySelectorAll('[data-component]');
const pageTitleElement = document.getElementById('home-page-title');
const pageSubtitleElement = document.getElementById('home-page-subtitle');

if (contentElement && sidebarButtons.length > 0) {
    let mountedApp = null;

    const setActiveButton = (componentKey) => {
        sidebarButtons.forEach((button) => {
            const isActive = button.dataset.component === componentKey;
            button.classList.toggle('is-active', isActive);
        });
    };

    const mountRoute = (route) => {
        if (mountedApp) {
            mountedApp.unmount();
        }

        mountedApp = createApp(route.component, { route });
        mountedApp.mount(contentElement);
        setActiveButton(route.key);

        if (pageTitleElement) {
            pageTitleElement.textContent = route.key === 'dashboard'
                ? 'Studio Scheduling System'
                : route.label;
        }

        if (pageSubtitleElement) {
            pageSubtitleElement.textContent = route.key === 'dashboard'
                ? 'Overview for schedules, sales monitoring, and operations.'
                : `${route.label} workspace and activity details.`;
        }
    };

    const syncRouteFromUrl = () => {
        const currentRoute = getRouteByPath(window.location.pathname);
        if (!currentRoute) {
            redirectTo(DEFAULT_ROUTE_PATH, true);
            return;
        }

        mountRoute(currentRoute);
    };

    sidebarButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const route = getRouteByKey(button.dataset.component);
            if (!route) {
                return;
            }

            redirectTo(route.path);
        });
    });

    window.addEventListener('popstate', syncRouteFromUrl);
    syncRouteFromUrl();
}
