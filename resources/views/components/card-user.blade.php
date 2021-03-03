@props([
    'user',
])

<div class="card">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <div class="card-title">{{ $user->username }}</div>

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
                    <li>
                        <a class="dropdown-item" href="{{ route('users.edit', 'user' => $user->id) }}">Edit</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-danger" href="{{ route('users.delete', 'user' => $user->id) }}">Delete</a>
                    </li>
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
                <div>{{ $user->role }}</div>
            </div>

            <div class="col-sm-auto d-flex text-muted">
                <div class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <polyline points="12 7 12 12 15 15"></polyline>
                    </svg>
                </div>
                <div>{{ $user->created_at }}</div>
            </div>
        </div>
    </div>
</div>
