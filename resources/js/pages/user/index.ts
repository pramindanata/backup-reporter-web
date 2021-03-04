import { fireDeleteConfirmAlert, fireDeleteSuccessAlert } from '@/lib/alert';
import { getAxiosErrMessage } from '@/lib/axios';

interface Filter {
  search: string;
  sort: string;
  order: string;
}

document.addEventListener('DOMContentLoaded', () => {
  const filter = window.pageState.filter as Filter;
  const searchInputEl = document.querySelector(
    '#input-search',
  ) as HTMLInputElement;
  const orderInputEl = document.querySelector(
    '#select-order',
  ) as HTMLSelectElement;
  const sortInputEl = document.querySelector(
    '#select-sort',
  ) as HTMLSelectElement;
  const resetBtnEl = document.querySelector('#btn-reset') as HTMLButtonElement;

  fillFilterValues();

  resetBtnEl.addEventListener('click', () => {
    resetFilterValues();
  });

  function fillFilterValues() {
    searchInputEl.value = filter.search;
    orderInputEl.value = filter.order;
    sortInputEl.value = filter.sort;
  }

  function resetFilterValues() {
    searchInputEl.value = '';
    orderInputEl.value = 'created_at';
    sortInputEl.value = 'DESC';
  }

  const confirmDeleteBtnElList: NodeListOf<HTMLButtonElement> = document.querySelectorAll(
    '.btn-confirm-delete',
  );

  confirmDeleteBtnElList.forEach((btnEl) => {
    btnEl.addEventListener('click', () => {
      const url = btnEl.getAttribute('data-url')!;

      fireDeleteConfirmAlert(async () => {
        try {
          await axios.request({ method: 'DELETE', url });

          fireDeleteSuccessAlert(() => {
            location.reload();
          });
        } catch (err) {
          const message = getAxiosErrMessage(err);

          Swal.showValidationMessage(message);
        }
      });
    });
  });
});
