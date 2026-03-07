import DashboardPanel from './home/components/DashboardPanel';
import Scheduling from './home/components/Scheduling.vue';
import SalesMonitoring from './home/components/SalesMonitoring.vue';
import Inquiries from './home/components/Inquiries.vue';
import Messages from './home/components/Messages.vue';
import Inventory from './home/components/Inventory.vue';
import Calendar from './home/components/Calendar.vue';
import Settings from './home/components/Settings.vue';

export const routes = [
    { key: 'dashboard', label: 'Dashboard', path: '/home/dashboard', component: DashboardPanel },
    { key: 'scheduling', label: 'Scheduling', path: '/home/scheduling', component: Scheduling },
    { key: 'sales', label: 'Sales Monitoring', path: '/home/sales', component: SalesMonitoring },
    { key: 'inquiries', label: 'Inquiries', path: '/home/inquiries', component: Inquiries },
    { key: 'calendar', label: 'Calendar', path: '/home/calendar', component: Calendar },
    { key: 'messages', label: 'Messages', path: '/home/messages', component: Messages },
    { key: 'inventory', label: 'Inventory', path: '/home/inventory', component: Inventory },
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
