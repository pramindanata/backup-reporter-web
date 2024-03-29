<x-layouts.main title="Create Access Token">
    <div class="container-xl">
        <x-page-header-with-back-btn
            back-route="{{ route('access-tokens.index') }}"
            back-tooltip-title="Back to access token list"
            page-title="Create Access Token"
        />

        <x-alert-validation-error />

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Form</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('access-tokens.store') }}" method="post">
                    @csrf

                    <x-base.inline-form-group
                        for="name"
                        label="Name"
                        class="mb-3"
                        :required="true"
                    >
                        <input
                            id="input-name"
                            type="text"
                            name="name"
                            required
                            class="form-control"
                            value="{{ old('name') }}"
                        />
                    </x-base.inline-form-group>

                    <x-base.inline-form-group class="mb-0">
                        <button type="submit" class="btn btn-primary mr-2">
                            Submit
                        </button>
                    </x-base.inline-form-group>
                </form>
            </div>
        </div>
    </div>
</x-layouts.main>
