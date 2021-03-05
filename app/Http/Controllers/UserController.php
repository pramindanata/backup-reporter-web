<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCatalog;
use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserCatalog $request)
    {
        //
        $this->authorize('viewAny', User::class);

        $filter = [
            'search' => $request->search ?? '',
            'order' => $request->order ?? 'created_at',
            'sort' => $request->sort ?? 'DESC',
        ];
        $users = $this->userService->getCatalogPaginator($filter);

        return view('pages.user.index', [
            'users' => $users->withQueryString(),
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', User::class);

        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        //
        $this->authorize('create', User::class);

        $props = $request->all();
        $user = $this->userService->store($props);
        $detailRoute = route('users.show', ['user' => $user->id]);

        return redirect($detailRoute)
            ->with([
                'success' => __('page.global.success_created_message')
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = $this->userService->getDetail($id);

        if (!$user) {
            abort(404);
        }

        $this->authorize('view', $user);

        return view('pages.user.show', [
            'user' => $user,
            'roleTextColor' => $user->isAdmin() ? 'text-purple' : 'text-warning',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = $this->userService->getDetail($id);

        if (!$user) {
            abort(404);
        }

        $this->authorize('update', $user);

        return view('pages.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        //
        $user = $this->userService->getDetail($id);

        if (!$user) {
            abort(404);
        }

        $this->userService->update($user, $request->all());

        return redirect()
            ->back()
            ->with([
                'success' => __('page.global.success_updated_message')
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
