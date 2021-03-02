document.addEventListener('DOMContentLoaded', () => {
  const state = {
    pwIsVisible: false,
  };

  const togglePwVisibilityBtnEl = document.querySelector(
    '#btn-toggle-pw-visibilty',
  ) as HTMLButtonElement;
  const eyeOnIconEl = document.querySelector('#icon-eye-on') as HTMLElement;
  const eyeOffIconEl = document.querySelector('#icon-eye-off') as HTMLElement;
  const pwInputEl = document.querySelector(
    '#input-password',
  ) as HTMLInputElement;

  togglePwVisibilityBtnEl.addEventListener('click', (e) => {
    if (state.pwIsVisible) {
      hidePasswordValueAndUpdateIcon();
    } else {
      showPasswordValueAndUpdateIcon();
    }
  });

  function hidePasswordValueAndUpdateIcon() {
    eyeOnIconEl.classList.remove('d-none');
    eyeOffIconEl.classList.add('d-none');
    pwInputEl.setAttribute('type', 'password');
    state.pwIsVisible = false;
  }

  function showPasswordValueAndUpdateIcon() {
    eyeOnIconEl.classList.add('d-none');
    eyeOffIconEl.classList.remove('d-none');
    pwInputEl.setAttribute('type', 'text');
    state.pwIsVisible = true;
  }
});
