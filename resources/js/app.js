require('./bootstrap')

import { createApp } from 'vue'
import App from './components/App'

const app = createApp({})

app.component('home', App)

app.mount('#app')
