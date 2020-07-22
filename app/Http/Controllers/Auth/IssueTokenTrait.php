<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Token Trait
 */
trait IssueTokenTrait
{
  // public function __construct()
  // {
  //   $this->client = Client::find(2);
  // }

    public function issueToken(Request $request, $grantType, $scope = "")
    {
      // dd($this->client);
        $params = [
            'grant_type' => $grantType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => $scope
        ];

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }
}
