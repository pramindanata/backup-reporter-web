@props([
    'backRoute',
    'backTooltipTitle',
    'pageTitle',
])

<div {{ $attributes->merge(['class' => 'page-header d-print-none']) }}>
    <div class="row align-items-center">
        <div class="col-auto">
            <a
                href="{{ $backRoute }}"
                class="btn btn-secondary btn-icon"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="{{ $backTooltipTitle }}"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <line x1="5" y1="12" x2="11" y2="18"></line>
                    <line x1="5" y1="12" x2="11" y2="6"></line>
                </svg>
            </a>
        </div>

        <div class="col-auto">
            <h2 class="page-title">
                {{ $pageTitle }}
            </h2>
        </div>
    </div>
</div>
