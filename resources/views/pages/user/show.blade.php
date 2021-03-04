<x-layouts.main title="{{ $user->username }}">
    <div class="container-xl">
        <x-page-header-with-back-btn
            back-route="{{ route('users.index') }}"
            back-tooltip-title="Back to user list"
            page-title="{{ $user->username }}"
        />

        <x-alert-action-success class="w-100" />

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
                    <div>{{ __("domain.user.role.{$user->role}") }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Created At">
                    <div data-bs-toggle="tooltip" title="{{ $user->created_at }}">
                        {{ $user->created_at->diffForHumans() }}
                    </div>
                </x-base.inline-form-group>
            </div>
        </div>
    </div>
</x-layouts.main>
