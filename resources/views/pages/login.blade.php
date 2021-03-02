<x-layouts.guest title="Login">
    <x-alert-validation-error />

    <form class="card card-md" action="{{ route('login.authenticate') }}" method="post">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder="Enter username"
                    required
                >
            </div>

            <div class="mb-2">
                <label class="form-label">
                    Password
                </label>
                <div class="input-group input-group-flat">
                    <input
                        id="input-password"
                        name="password"
                        type="password"
                        class="form-control"
                        required placeholder="Password"
                        autocomplete="off"
                    >
                    <span class="input-group-text">
                        <a
                            href="#"
                            id="btn-toggle-pw-visibilty"
                            class="cursor-pointer link-secondary"
                            title="Password Visibilty"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                id="icon-eye-on"
                                class="icon icon-tabler icon-tabler-eye"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="2"></circle>
                                <path
                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                </path>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                id="icon-eye-off"
                                class="d-none icon icon-tabler icon-tabler-eye-off"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="3" y1="3" x2="21" y2="21"></line>
                                <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                                <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>
                             </svg>
                        </a>
                    </span>
                </div>
            </div>

            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <span class="form-check-label">Remember me on this device</span>
                </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </div>
    </form>

    @push ('scripts')
        <script src="{{ mix('js/pages/login.js') }}"></script>
    @endpush
</x-layouts.guest>
