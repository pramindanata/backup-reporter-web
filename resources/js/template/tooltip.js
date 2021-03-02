import { Tooltip } from 'bootstrap';

const tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]'),
);
tooltipTriggerList.map(function (tooltipTriggerEl) {
  const options = {
    delay: { show: 50, hide: 50 },
    html: tooltipTriggerEl.getAttribute('data-bs-html') === 'true' ?? false,
    placement: tooltipTriggerEl.getAttribute('data-bs-placement') ?? 'auto',
  };
  return new Tooltip(tooltipTriggerEl, options);
});
