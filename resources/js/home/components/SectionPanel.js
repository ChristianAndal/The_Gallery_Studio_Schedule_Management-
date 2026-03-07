import { h } from 'vue';

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

        return h('section', { class: 'section-panel' }, [
            h('h3', { class: 'section-title' }, `${title} Module`),
            h('p', { class: 'section-text' }, `${title} content can be plugged into this panel.`),
            h('div', { class: 'section-grid' }, [
                h('article', { class: 'section-card' }, [h('p', null, 'Overview'), h('strong', null, '24')]),
                h('article', { class: 'section-card' }, [h('p', null, 'Pending'), h('strong', null, '08')]),
                h('article', { class: 'section-card' }, [h('p', null, 'Completed'), h('strong', null, '16')]),
            ]),
        ]);
    },
};
