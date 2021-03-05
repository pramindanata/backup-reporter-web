<x-layouts.main title="{{ $accessToken->name }}">
    <div class="container-xl">
        <x-page-header-with-back-btn
            back-route="{{ route('access-tokens.index') }}"
            back-tooltip-title="Back to access token list"
            page-title="{{ $accessToken->name }}"
        >
            {{-- @canany (['update', 'delete'], $accessToken) --}}
                <x-slot name="actions">
                    <a
                        href="{{ route('access-tokens.edit', ['access_token' => $accessToken->id]) }}"
                        class="btn btn-primary"
                    >Edit</a>

                    <button
                        id="btn-confirm-delete"
                        class="btn btn-danger"
                        data-url="{{ route('api.access-tokens.destroy', ['access_token' => $accessToken->id]) }}"
                    >Delete</button>
                </x-slot>
            {{-- @endcanany --}}
        </x-page-header-with-back-btn>

        <x-alert-action-success />

        <x-base.alert-warning id="alert-deleted" class="d-none">
            Data has been deleted.
        </x-base.alert-warning>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Detail</h2>
            </div>

            <div class="card-body">
                <x-base.inline-form-group label="ID" class="mb-3">
                    <div>#{{ $accessToken->id }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Name" class="mb-3">
                    <div>{{ $accessToken->name }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Value" class="mb-3">
                    <div
                        id="btn-copy-token"
                        class="text-break bg-blue-lt px-3 py-2 rounded cursor-pointer"
                        data-value="{{ $accessToken->value }}"
                    >
                        {{ $accessToken->value }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                            <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                        </svg>
                    </div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Activation Status" class="mb-3">
                    <div class="{{ $activationStatusTextColor }}">
                        {{ __("domain.accessToken.activationStatus.{$accessToken->activation_status}") }}
                    </div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Created At">
                    <div data-bs-toggle="tooltip" title="{{ $accessToken->created_at }}">
                        {{ $accessToken->created_at->diffForHumans() }}
                    </div>
                </x-base.inline-form-group>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ mix('js/pages/access-token/show.js') }}"></script>
    @endpush
</x-layouts.main>
