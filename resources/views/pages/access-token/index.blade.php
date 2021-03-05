<x-layouts.main title="Access Token List">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Access Token List
                    </h2>
                    <div class="text-muted mt-1">
                        {{ $accessTokens->firstItem() }}-{{ $accessTokens->lastItem() }} of {{ $accessTokens->total() }} data
                    </div>
                </div>

                @can('create', \App\Models\AccessToken::class)
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <a href="{{ route('access-tokens.create') }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Add new
                            </a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>

        <x-alert-validation-error />

        <x-filter-access-token class="mb-3" />

        <div class="row row-cards mb-3">
            @foreach ($accessTokens as $accessToken)
                <div class="col-md-6 col-xl-4">
                    <x-card-access-token :accessToken="$accessToken" />
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $accessTokens->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            window.pageState = {
                filter: @json($filter)
            }
        </script>
        <script src="{{ mix('js/pages/access-token/index.js') }}"></script>
    @endpush
</x-layouts.main>
