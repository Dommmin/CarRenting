import './bootstrap';
import Router from '@/routes';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetalert2 from 'vue-sweetalert2';


// include css file
import '../css/app.css';

// For Vue.js
import { createApp } from 'vue'

const app = createApp({})

app.use(Router);
app.use(VueSweetalert2)
window.Swal =  app.config.globalProperties.$swal;
app.mount('#app')
