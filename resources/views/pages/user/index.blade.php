<x-layouts.main title="User List">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        User List
                    </h2>
                    <div class="text-muted mt-1">1-15 of 241 data</div>
                </div>

                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
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
            </div>
        </div>

        <div class="row row-cards">
            @for ($i = 0; $i < 15; $i++)
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div class="card-title">pramindanata</div>

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
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row gy-2">
                                <div class="col-sm-auto d-flex text-muted">
                                    <div class="me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>
                                    </div>
                                    <div>Admin</div>
                                </div>

                                <div class="col-sm-auto d-flex text-muted">
                                    <div class="me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <polyline points="12 7 12 12 15 15"></polyline>
                                        </svg>
                                    </div>
                                    <div>2021-03-28 19:20</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</x-layouts.main>
