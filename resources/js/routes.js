import SectionPanel from './home/components/SectionPanel';

export const routes = [
    { key: 'dashboard', label: 'Dashboard', path: '/home/dashboard', component: SectionPanel },
    { key: 'inquiries', label: 'Inquiries', path: '/home/inquiries', component: SectionPanel },
    { key: 'social', label: 'Social', path: '/home/social', component: SectionPanel },
    { key: 'sales', label: 'Sales', path: '/home/sales', component: SectionPanel },
    { key: 'inventory', label: 'Inventory', path: '/home/inventory', component: SectionPanel },
    { key: 'mesages', label: 'Mesages', path: '/home/mesages', component: SectionPanel },
    { key: 'gallery', label: 'Gallery', path: '/home/gallery', component: SectionPanel },
    { key: 'settings', label: 'Settings', path: '/home/settings', component: SectionPanel },
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
