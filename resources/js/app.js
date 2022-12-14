import './bootstrap';

import { createApp } from 'vue'
import App from './layouts/App.vue'
import router from './routes/index.js'
import VueSweetalert2 from "vue-sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';

const app = createApp(App)

// Faking authed user
app.provide('authId', import.meta.env.VITE_USER_ID)

app.use(VueSweetalert2)
app.use(router)
app.mount('#app')
