import Alpine from 'alpinejs';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import './bootstrap';

import ChatMessage from './components/ChatMessage.vue';
import SendMessage from './components/SendMessage.vue';


const app = createApp({
    components:{
        SendMessage,
        ChatMessage,
    }
});
app.mount('#app');


window.Alpine = Alpine;

Alpine.start();
