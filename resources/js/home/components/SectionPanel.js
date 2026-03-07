import { h } from 'vue';

function formatStatLabel(title, label) {
    return `${title} ${label}`;
}

export default {
    name: 'SectionPanel',
    props: {
        route: {
            type: Object,
            required: true,
        },
    },
    render() {
        const title = this.route.label;

        return h('section', { class: 'panel-card' }, [
            h('h3', { class: 'panel-title' }, title),
            h(
                'p',
                { class: 'panel-text' },
                `${title} module is active. Connect your real Vue components and API data for this section.`
            ),
            h('div', { class: 'panel-grid' }, [
                h('article', { class: 'panel-stat' }, [
                    h('p', { class: 'panel-stat-label' }, formatStatLabel(title, 'Overview')),
                    h('p', { class: 'panel-stat-value' }, '24'),
                ]),
                h('article', { class: 'panel-stat' }, [
                    h('p', { class: 'panel-stat-label' }, formatStatLabel(title, 'Pending')),
                    h('p', { class: 'panel-stat-value' }, '08'),
                ]),
                h('article', { class: 'panel-stat' }, [
                    h('p', { class: 'panel-stat-label' }, formatStatLabel(title, 'Completed')),
                    h('p', { class: 'panel-stat-value' }, '16'),
                ]),
            ]),
        ]);
    },
};
