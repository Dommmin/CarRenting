import './bootstrap';
import Router from './routes/index.js';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetalert2 from 'vue-sweetalert2';

// include css file
import '../css/app.css';

// For Vue.js
import {createApp, onMounted} from 'vue'
import useAuth from './composables/auth.js';

const app = createApp({
    setup() {
        const { getUser } = useAuth();
        onMounted(getUser)
    }
})

app.use(Router);
app.use(VueSweetalert2)
window.Swal =  app.config.globalProperties.$swal;
app.mount('#app')
