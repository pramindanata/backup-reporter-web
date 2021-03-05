<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessTokenCatalog;
use App\Http\Requests\AccessTokenStore;
use App\Http\Requests\AccessTokenUpdate;
use App\Models\AccessToken;
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
        $this->authorize('viewAny', AccessToken::class);

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
        $this->authorize('create', AccessToken::class);

        return view('pages.access-token.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccessTokenStore $request)
    {
        //
        $this->authorize('create', AccessToken::class);

        $props = $request->all();
        $accessToken = $this->accessTokenService->store($props);
        $detailRoute = route('access-tokens.show', ['access_token' => $accessToken->id]);

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
        $accessToken = $this->accessTokenService->getDetail($id);

        if (!$accessToken) {
            abort(404);
        }

        $this->authorize('view', $accessToken);

        return view('pages.access-token.show', [
            'accessToken' => $accessToken,
            'activationStatusTextColor' => $accessToken->isActivated() ? 'text-success' : 'text-danger',
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
        $accessToken = $this->accessTokenService->getDetail($id);

        if (!$accessToken) {
            abort(404);
        }

        $this->authorize('update', $accessToken);

        return view('pages.access-token.edit', [
            'accessToken' => $accessToken,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccessTokenUpdate $request, $id)
    {
        //
        $accessToken = $this->accessTokenService->getDetail($id);

        if (!$accessToken) {
            abort(404);
        }

        $this->authorize('update', $accessToken);

        $this->accessTokenService->update($accessToken, $request->all());

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
