<?php

namespace App\Http\Controllers;

use App\Models\MeliToken;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AuthController extends Controller
{
    protected $client_id;
    protected $client_secret;
    protected $code;
    protected $redirect_uri;

    public function __construct()
    {
        $this->client_id = env('ID_APP_MELI');
        $this->client_secret = env('CLIENT_SECRET');
        $this->code = env('CODE_ID');
        $this->redirect_uri = env('URI_REDIRECT');
    }

    public function refreshToken()
    {
        $model = MeliToken::first();
        $response = Http::asForm()->post('https://api.mercadolibre.com/oauth/token', [
            'grant_type' => 'refresh_token',
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'refresh_token' => $model->refresh_token,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            $model->meli_user_id = $data['user_id'];
            $model->access_token = $data['access_token']; 
            $model->refresh_token = $data['refresh_token']; 
            $model->expires_at = Carbon::now()->addSeconds($data['expires_in']);
            $model->save(); 
    
        } else {
            throw new \Exception('Falha ao renovar o token: ' . $response->body());
        }
    }

    public function isTokenExpired()
    {
        $expires = MeliToken::first();
        return Carbon::now()->greaterThan($expires->expires_at);
    }

    public function generateAccessToken()
    {
        $response = Http::asForm()->post('https://api.mercadolibre.com/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'code' => $this->code,
            'redirect_uri' => $this->redirect_uri,
        ]);
        if ($response->successful()) {
            $data = $response->json();
    
            MeliToken::create([
                'meli_user_id' => $data['user_id'],
                'access_token' => $data['access_token'],
                'refresh_token' => $data['refresh_token'],
                'expires_at' => Carbon::now()->addSeconds($data['expires_in'])
            ]);
            return redirect()->route('product.index')->withSuccess('Bem vindo!');
        } else {

            return redirect()->route('product.index')->withErrors($response->json(['message']));
        }
    }

}

