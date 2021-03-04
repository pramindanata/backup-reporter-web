import 'bootstrap';
import axios from 'axios';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import './template';

axios.defaults.baseURL = process.env.MIX_APP_URL;

window.Swal = Swal;
window.axios = axios;
