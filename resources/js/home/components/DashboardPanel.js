import { h } from 'vue';

export default {
    name: 'DashboardPanel',
    render() {
        return h('section', { class: 'panel-card' }, [
            h('h2', { class: 'panel-title' }, 'Dashboard Component'),
            h(
                'p',
                { class: 'panel-text' },
                'This is a Vue component. Replace this file with your real dashboard component.'
            ),
        ]);
    },
};
