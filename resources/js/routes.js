import { defineAsyncComponent } from 'vue';

const Dashboard = defineAsyncComponent(() => import('./home/components/Dashboard.vue'));
const Scheduling = defineAsyncComponent(() => import('./home/components/Scheduling.vue'));
const SalesMonitoring = defineAsyncComponent(() => import('./home/components/SalesMonitoring.vue'));
const Inquiries = defineAsyncComponent(() => import('./home/components/Inquiries.vue'));
const Messages = defineAsyncComponent(() => import('./home/components/Messages.vue'));
const Inventory = defineAsyncComponent(() => import('./home/components/Inventory.vue'));
const Gallery = defineAsyncComponent(() => import('./home/components/Gallery.vue'));
const Calendar = defineAsyncComponent(() => import('./home/components/Calendar.vue'));
const Settings = defineAsyncComponent(() => import('./home/components/Settings.vue'));

export const routes = [
    { key: 'dashboard', label: 'Dashboard', path: '/home/dashboard', component: Dashboard },
    { key: 'scheduling', label: 'Scheduling', path: '/home/scheduling', component: Scheduling },
    { key: 'sales', label: 'Sales Monitoring', path: '/home/sales', component: SalesMonitoring },
    { key: 'inquiries', label: 'Inquiries', path: '/home/inquiries', component: Inquiries },
    { key: 'calendar', label: 'Calendar', path: '/home/calendar', component: Calendar },
    { key: 'messages', label: 'Messages', path: '/home/messages', component: Messages },
    { key: 'inventory', label: 'Inventory', path: '/home/inventory', component: Inventory },
    { key: 'gallery', label: 'Gallery', path: '/home/gallery', component: Gallery },
    { key: 'settings', label: 'Settings', path: '/home/settings', component: Settings },
];

const routeByPath = new Map(routes.map((route) => [route.path, route]));
const routeByKey = new Map(routes.map((route) => [route.key, route]));

export const DEFAULT_ROUTE_PATH = '/home/dashboard';

export function getRouteByPath(pathname) {
    return routeByPath.get(pathname) ?? null;
}

export function getRouteByKey(key) {
    return routeByKey.get(key) ?? null;
}

export function redirectTo(path, replace = false) {
    const method = replace ? 'replaceState' : 'pushState';
    window.history[method]({}, '', path);
    window.dispatchEvent(new PopStateEvent('popstate'));
}
