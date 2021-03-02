import { Toast } from 'bootstrap';

/*
Toasts
 */
const toastsTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="toast"]'),
);
toastsTriggerList.map(function (toastTriggerEl) {
  return new Toast(toastTriggerEl);
});
