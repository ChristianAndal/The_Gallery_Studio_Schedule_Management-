import { h } from 'vue';

export default {
    name: 'SchedulePanel',
    render() {
        return h('section', { class: 'panel-card' }, [
            h('h2', { class: 'panel-title' }, 'Schedule Component'),
            h(
                'p',
                { class: 'panel-text' },
                'Connect your schedule Vue component here. This panel changes from the sidebar.'
            ),
        ]);
    },
};
