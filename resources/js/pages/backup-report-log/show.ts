import { fireDeleteConfirmAlert, fireDeleteSuccessAlert } from '@/lib/alert';
import { getAxiosErrMessage } from '@/lib/axios';

document.addEventListener('DOMContentLoaded', () => {
  const confirmDeleteBtnEl = document.querySelector('#btn-confirm-delete');

  confirmDeleteBtnEl?.addEventListener('click', () => {
    const url = confirmDeleteBtnEl.getAttribute('data-url')!;

    fireDeleteConfirmAlert(async () => {
      try {
        await axios.request({ method: 'DELETE', url });

        fireDeleteSuccessAlert(() => {
          showDataDeletedWarning();
        });
      } catch (err) {
        const message = getAxiosErrMessage(err);

        Swal.showValidationMessage(message);
      }
    });
  });

  function showDataDeletedWarning() {
    document.querySelector('#alert-deleted')!.classList.remove('d-none');
  }
});
