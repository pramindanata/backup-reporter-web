<x-layouts.main title="{{ $user->username }}">
    <div class="container-xl">
        <x-page-header-with-back-btn
            back-route="{{ route('users.index') }}"
            back-tooltip-title="Back to user list"
            page-title="{{ $user->username }}"
        >
            @canany (['update', 'delete'], $user)
                <x-slot name="actions">
                    <a
                        href="{{ route('users.edit', ['user' => $user->id]) }}"
                        class="btn btn-primary"
                    >Edit</a>

                    <button
                        id="btn-confirm-delete"
                        class="btn btn-danger"
                        data-url="{{ route('api.users.destroy', ['user' => $user->id]) }}"
                    >Delete</button>
                </x-slot>
            @endcanany
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
                    <div>#{{ $user->id }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Username" class="mb-3">
                    <div>{{ $user->username }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Name" class="mb-3">
                    <div>{{ $user->name }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Role" class="mb-3">
                    <div class="{{ $roleTextColor }}">{{ __("domain.user.role.{$user->role}") }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Created At">
                    <div data-bs-toggle="tooltip" title="{{ $user->created_at }}">
                        {{ $user->created_at->diffForHumans() }}
                    </div>
                </x-base.inline-form-group>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ mix('js/pages/user/show.js') }}"></script>
    @endpush
</x-layouts.main>
