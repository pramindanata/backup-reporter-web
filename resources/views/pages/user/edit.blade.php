<x-layouts.main title="Edit {{ $user->username }}">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <h2 class="page-title">
                Edit {{ $user->username }}
            </h2>
        </div>

        <x-alert-validation-error />
        <x-alert-action-success class="w-100" />

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Form</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                    @csrf
                    @method('put')

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
                            required class="form-control"
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
                            required class="form-control"
                            value="{{ old('username') ?: $user->username }}"
                        />
                    </x-base.inline-form-group>

                    <x-base.inline-form-group
                        for="password"
                        label="Password"
                        class="mb-3"
                        minlength="8"
                        autocomplete="new-password"
                    >
                        <div class="input-group input-group-flat">
                            <input
                                id="input-password"
                                type="password"
                                name="password"
                                class="form-control"
                            />

                            <span class="input-group-text">
                                <a
                                    href="#"
                                    id="btn-toggle-pw-visibilty"
                                    class="cursor-pointer link-secondary"
                                    title="Password Visibilty"
                                >
                                    <svg id="icon-eye-on" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                                    </svg>

                                    <svg id="icon-eye-off" xmlns="http://www.w3.org/2000/svg" class="d-none icon icon-tabler icon-tabler-eye-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="3" y1="3" x2="21" y2="21"></line>
                                        <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                                        <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>
                                    </svg>
                                </a>
                            </span>
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
    </div>

    @push('scripts')
        <script src="{{ mix('js/pages/user/create.js') }}"></script>
    @endpush
</x-layouts.main>
