<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\Http\Controllers\Auth\IssueTokenTrait;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use IssueTokenTrait;
    private $client;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->client = Client::find(2);
    }
    public function apilogin(Request $request)
    {
      $this->validate($request, [
          'username' => 'required|email',
          'password' => 'required'
      ]);
      // dd($this->client);

      return $this->issueToken($request, 'password');
    }

    public function apilogout(Request $request)
    {
      $accToken = $request->user()->OAccessToken()->delete();
      if (!$accToken) {
        return response()->json(['message' => 'failed logout'], 401);
      }
      return response()->json(['message' => 'success logout'], 200);
    }
}
