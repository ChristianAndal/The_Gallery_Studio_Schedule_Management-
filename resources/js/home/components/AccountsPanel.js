import { h } from 'vue';

export default {
    name: 'AccountsPanel',
    render() {
        return h('section', { class: 'panel-card' }, [
            h('h2', { class: 'panel-title' }, 'Accounts Component'),
            h(
                'p',
                { class: 'panel-text' },
                'Connect your accounts Vue component here.'
            ),
        ]);
    },
};
