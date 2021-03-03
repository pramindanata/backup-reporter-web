<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCatalog;
use App\Http\Requests\UserStore;
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
        $users = $this->userService->getCatalogPaginator();

        return view('pages.user.index', [
            'users' => $users->withQueryString(),
            'filter' => [
                'search' => $request->search ?? '',
                'order' => $request->order ?? 'created_at',
                'sort' => $request->sort ?? 'DESC',
            ]
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

        return view('pages.user.show', ['user' => $user]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
