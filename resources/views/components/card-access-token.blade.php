<div class="card">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <div class="card-title">
                <a href="{{ route('access-tokens.show', ['access_token' => $accessToken->id]) }}">
                    {{ $accessToken->name }}
                </a>
            </div>

            @canany (['update', 'delete'], $accessToken)
                <div class="dropdown">
                    <button class="btn w-100 btn-icon border-0" type="button" id="Action Button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="Action Button">
                        <li>
                            <a class="dropdown-item" href="{{ route('access-tokens.edit', ['access_token' => $accessToken->id]) }}">Edit</a>
                        </li>
                        <li>
                            <div
                                class="btn-confirm-delete dropdown-item text-danger cursor-pointer"
                                data-url="{{ route('api.access-tokens.destroy', ['access_token' => $accessToken->id]) }}"
                            >Delete</div>
                        </li>
                    </ul>
                </div>
            @endcanany
        </div>
    </div>
    <div class="card-body">
        <div class="row gy-2">
            <div class="col-xl-6 col-md-auto d-flex {{ $getActivationStatusTextColorClass() }}">
                <div class="me-1">
                    @if ($accessToken->isActivated())
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    @endif
                </div>

                <div>{{ __("domain.accessToken.activationStatus.{$accessToken->activation_status}") }}</div>
            </div>

            <div class="col-xl-6 col-md-auto d-flex text-muted">
                <div class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="8" cy="15" r="4"></circle>
                        <line x1="10.85" y1="12.15" x2="19" y2="4"></line>
                        <line x1="18" y1="5" x2="20" y2="7"></line>
                        <line x1="15" y1="8" x2="17" y2="10"></line>
                    </svg>
                </div>
                <div>{{ $accessToken->short_value . '****' }}</div>
            </div>

            <div class="col-xl-6 col-md-auto d-flex text-muted">
                <div class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <polyline points="12 7 12 12 15 15"></polyline>
                    </svg>
                </div>
                <div data-bs-toggle="tooltip" title="{{ $accessToken->created_at }}">
                    {{ $accessToken->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
