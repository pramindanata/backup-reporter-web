<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessTokenCatalog;
use App\Service\AccessTokenService;
use Illuminate\Http\Request;

class AccessTokenController extends Controller
{
    private AccessTokenService $accessTokenService;

    public function __construct(AccessTokenService $accessTokenService)
    {
        $this->accessTokenService = $accessTokenService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AccessTokenCatalog $request)
    {
        //
        $this->authorize('viewAny', User::class);

        $filter = [
            'search' => $request->search ?? '',
            'order' => $request->order ?? 'created_at',
            'sort' => $request->sort ?? 'DESC',
        ];
        $users = $this->accessTokenService->getCatalogPaginator($filter);

        return view('pages.access-token.index', [
            'accessTokens' => $users->withQueryString(),
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
