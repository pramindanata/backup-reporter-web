import SweetAlertType from 'sweetalert2';
import AxiosType from 'axios';

declare global {
  const Swal: typeof SweetAlertType;
  const axios: typeof AxiosType;

  interface Window {
    pageState: any;
    Swal: SweetAlertType;
    axios: AxiosType;
  }
}

declare module 'sweetalert2/dist/sweetalert2.js' {
  export * from 'sweetalert2';
  // "export *" does not matches the default export, so do it explicitly.
  export { default } from 'sweetalert2' // eslint-disable-line
}
