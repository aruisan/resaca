<?php

namespace resaca\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use resaca\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;

class ResacaAuthController extends Controller
{

    public function index()
    {
        // Aqui muestras el botón de iniciar sesion
        return View::make('login');
    }

    /**
     * Authorize
     *
     * Creates an oAuth redirect url to authenticate with SimpleInOut service
     *
     * @param Request $request
     * @return Response
     */
    public function auth(Request $request)
    {
        $provider = $this->getOauthProvider();
        $authorizationUrl = $provider->getAuthorizationUrl();
        $request->session()->put('oauth2state', $provider->getState());
        return redirect()->to($authorizationUrl);
    }

    /**
     * Revokes a token (de-authorization)
     *
     * @return mixed
     */
    public function revoke()
    {
        Auth::user()->access_token = '';
        Auth::user()->refresh_token = '';
        Auth::user()->expires = 0;
        Auth::user()->save();
        return Redirect::to('login')->with('success', 'Se ha desconectado correctamente');
    }

    /**
     * After giving permissions to the app redirect to this endpoint
     * to continue the verification and finally displaying the oAuth token
     *
     * @param Request $request
     * @return array|Response
     */
    public function callback(Request $request)
    {
        try {
            $this->validate($request, [
                'state' => 'required|in:' . $request->session()->get('oauth2state'),
                'code' => 'required'
            ]);
        } catch (\Exception $e) {
            $request->session()->flush();
            return new Response([
                'code' => 400,
                'message' => 'oAuth state mismatch'
            ], 400);
        }

        try {
            $payload = $this->getOauthProvider()
                ->getAccessToken('authorization_code', [
                'code' => $request->get('code')
            ]);

            // Store in database
            $user = new User();
            $user->access_token = $payload->getToken();
            $user->refresh_token = $payload->getRefreshToken();
            $user->expires = $payload->getExpires();
            $user->save();

            return Redirect::to('dashboard')
                ->with('success', 'Te has autenticado usando Resaca, bienvenido a CIERTO.');
        } catch (IdentityProviderException $e) {
            return Redirect::to('resaca')
                ->with('error', 'Ocurrió un problema al authenticarte con RESACA: ' . $e->getMessage());
        }
    }

    /**
     * Details for this specific oAuth provider
     *
     * @return GenericProvider
     */
    private function getOauthProvider()
    {
        return new GenericProvider([

            'clientId' => env('RESACA_APP_ID'),
            'clientSecret' => env('RESACA_APP_SECRET'),
            'redirectUri' => env('RESACA_APP_REDIRECT'),
            'urlAuthorize' => 'http://190.255.49.210:8080/api/o/authorize/',
            'urlAccessToken' => 'http://190.255.49.210:8080/api/token/',
            'urlResourceOwnerDetails' => 'http://190.255.49.210:8080/api/me/'
        ]);
    }
}