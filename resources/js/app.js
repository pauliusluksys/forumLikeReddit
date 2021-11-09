
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

//resources/js/app.js
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// //Add these two components.
// Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
// Vue.component('chat-form', require('./components/ChatForm.vue').default);




require('./bootstrap');

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
const app = new Vue({
    el: '#app',
    //Store chat messages for display in this array.
    data: {
        messages: []
    },
    //Upon initialisation, run fetchMessages().
    created() {
        this.fetchMessages();
    },
    methods: {
        fetchMessages() {
            //GET request to the messages route in our Laravel server to fetch all the messages
            axios.get('/messages').then(response => {
                //Save the response in the messages array to display on the chat view
                this.messages = response.data;
            });
        },
        //Receives the message that was emitted from the ChatForm Vue component
        addMessage(message) {
            //Pushes it to the messages array
            this.messages.push(message);
            //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
            axios.post('/messages', message).then(response => {
                console.log(response.data);
            });
        }
    }
});
