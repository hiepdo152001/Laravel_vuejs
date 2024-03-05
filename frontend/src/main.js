import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
// npx tailwindcss -i ./src/assets/tailwind.css -o ./public/styles.css --watch
// import '@/interception';
// import './style.css'
import App from './App.vue'
import router from './router'
import store from './stores/vuex'

const app = createApp(App)
app.use(createPinia())
app.use(router)
app.use(store)

app.mount('#app')
