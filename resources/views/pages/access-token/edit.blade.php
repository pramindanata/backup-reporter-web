<x-layouts.main title="Edit {{ $accessToken->name }}">
    <div class="container-xl">
        <x-page-header-with-back-btn
            back-route="{{ route('access-tokens.show', ['access_token' => $accessToken->id]) }}"
            back-tooltip-title="Back to access token detail"
            page-title="{{ 'Edit ' . $accessToken->name }}"
        />

        <x-alert-validation-error />
        <x-alert-action-success class="w-100" />

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Form</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('access-tokens.update', ['access_token' => $accessToken->id]) }}" method="post">
                    @csrf
                    @method('put')

                    <x-base.inline-form-group label="ID" class="mb-3">
                        <div>#{{ $accessToken->id }}</div>
                    </x-base.inline-form-group>

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
                            value="{{ old('name') ?: $accessToken->name }}"
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
