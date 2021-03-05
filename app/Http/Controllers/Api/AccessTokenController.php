<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\AccessTokenService;
use Illuminate\Http\Request;

class AccessTokenController extends Controller
{
    //
    private AccessTokenService $accessTokenService;

    public function __construct(AccessTokenService $accessTokenService)
    {
        $this->accessTokenService = $accessTokenService;
    }

    //
    public function destroy($id)
    {
        $accessToken = $this->accessTokenService->getDetail($id);

        if (!$accessToken) {
            abort(404);
        }

        $this->authorize('delete', $accessToken);
        $this->accessTokenService->delete($accessToken);

        return response('ok');
    }
}
