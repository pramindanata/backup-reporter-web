<x-layouts.main title="Profile">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <h2 class="page-title">
                Profile
            </h2>
        </div>

        <x-alert-action-success />
        <x-alert-validation-error />

        <div class="card mb-3">
            <div class="card-header">
                <h2 class="card-title">Update Information</h2>
            </div>
            <div class="card-body">
                <form action="{{ route("profile.updateInfo") }}" method="POST">
                    @csrf
                    @method('patch')

                    <x-base.inline-form-group label="ID" class="mb-3">
                        <div>#{{ $user->id }}</div>
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
                            class="form-control"
                            value="{{ old('name') ?: $user->name }}"
                        />
                    </x-base.inline-form-group>

                    <x-base.inline-form-group
                        for="username"
                        label="Username"
                        class="mb-3"
                        :required="true"
                    >
                        <input
                            id="input-username"
                            type="text"
                            name="username"
                            class="form-control"
                            value="{{ old('username') ?: $user->username }}"
                        />
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Role" class="mb-3">
                        <div>{{ __("domain.user.role.{$user->role}") }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Created At" class="mb-3">
                        <div data-bs-toggle="tooltip" title="{{ $user->created_at }}">
                            {{ $user->created_at->diffForHumans() }}
                        </div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group class="mb-0">
                        <button type="submit" class="btn btn-primary mr-2">
                            Submit
                        </button>
                    </x-base.inline-form-group>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Update Password</h2>
            </div>
            <div class="card-body">
                <form action="{{ route("profile.updatePassword") }}" method="POST">
                    @csrf
                    @method('patch')

                    <x-base.inline-form-group
                        for="current-password"
                        label="Current Password"
                        class="mb-3"
                        :required="true"
                    >
                        <input
                            id="input-current-password"
                            type="password"
                            name="current_password"
                            required
                            class="form-control"
                        />
                    </x-base.inline-form-group>

                    <x-base.inline-form-group
                        for="password"
                        label="New Password"
                        class="mb-3"
                        :required="true"
                    >
                        <input
                            id="input-password"
                            type="password"
                            name="password"
                            required
                            class="form-control"
                        />
                    </x-base.inline-form-group>

                    <x-base.inline-form-group
                        for="password-confirmation"
                        label="Confirm Password"
                        class="mb-3"
                        :required="true"
                    >
                        <input
                            id="input-password-confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            class="form-control"
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
