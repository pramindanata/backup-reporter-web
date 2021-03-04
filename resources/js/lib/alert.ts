export function fireDeleteConfirmAlert(preConfirm: () => any): void {
  fireConfirmAlert({
    title: 'Are you sure ?',
    text: "You can't recover this data again.",
    preConfirm,
  });
}

export function fireDeleteSuccessAlert(willClose: () => any): void {
  Swal.fire({
    title: 'Success',
    text: 'Data has been deleted.',
    icon: 'success',
    confirmButtonText: 'OK',
    willClose,
  });
}

interface ConfirmAlertOptions {
  title: string;
  text: string;
  preConfirm?: () => any;
}

export function fireConfirmAlert(options: ConfirmAlertOptions): void {
  const { preConfirm, text, title } = options;

  Swal.fire({
    icon: 'warning',
    title,
    text,
    showConfirmButton: true,
    showCancelButton: true,
    showLoaderOnConfirm: true,
    cancelButtonText: 'Cancel',
    confirmButtonText: 'Yes',
    allowOutsideClick: () => !Swal.isLoading(),
    preConfirm,
  });
}
