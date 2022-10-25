import './bootstrap';

import { createApp } from 'vue'
import App from './components/App.vue'
//importamos las rutas
import router from './routes.js'
//importamos Axios
import VueAxios from 'vue-axios';
import axios from 'axios';

const app = createApp(App)

app.use(VueAxios, axios);
app.use(router)
app.mount('#app')
