import { fireDeleteConfirmAlert, fireDeleteSuccessAlert } from '@/lib/alert';
import { getAxiosErrMessage } from '@/lib/axios';
import { Popover } from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
  const confirmDeleteBtnEl = document.querySelector('#btn-confirm-delete')!;

  confirmDeleteBtnEl.addEventListener('click', () => {
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

  const copyTokenBtnEl = document.querySelector(
    '#btn-copy-token',
  ) as HTMLButtonElement;

  if (copyTokenBtnEl) {
    let copyPopoverTimeout: NodeJS.Timeout;
    const copyTokenPopOver = new Popover(copyTokenBtnEl, {
      container: 'body',
      placement: 'bottom',
      content: 'Token copied !',
    });

    copyTokenBtnEl.addEventListener('click', async () => {
      const token = copyTokenBtnEl.dataset.value;

      if (!token) {
        throw new Error('No token value found');
      }

      clearTimeout(copyPopoverTimeout);
      await copy(token);

      copyTokenPopOver.show();

      copyPopoverTimeout = setTimeout(() => {
        copyTokenPopOver.hide();
      }, 1500);
    });
  }

  function copy(value: string): Promise<void> {
    return navigator.clipboard.writeText(value);
  }
});
