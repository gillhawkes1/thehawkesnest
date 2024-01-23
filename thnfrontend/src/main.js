import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

import 'bootstrap/dist/css/bootstrap.css';
import UtilityPlugin from '@/utilityPlugin';

const app = createApp(App);
app.use(router);
app.use(UtilityPlugin);
app.mount('#theHawkesNest');
