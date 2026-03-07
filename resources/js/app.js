import './bootstrap';
import { createApp } from 'vue';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import 'vuetify/styles';
import HomeShell from './home/HomeShell.vue';

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: 'studioGray',
        themes: {
            studioGray: {
                dark: false,
                colors: {
                    background: '#efeff1',
                    surface: '#ffffff',
                    primary: '#4f5461',
                    secondary: '#6e7482',
                },
            },
        },
    },
});

createApp(HomeShell).use(vuetify).mount('#app');
