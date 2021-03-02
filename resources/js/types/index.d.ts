import jQuery from '@types/jquery';

declare global {
  interface Window {
    pageState: any;
    $: typeof jqujQueryery;
    jQuery: typeof jQuery;
  }
}
