<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class RefreshFacebookToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isTokenExpired()) {
           
            $newToken = $this->refreshToken();

            
            Config::set('services.facebook.token', $newToken);
        }

        return $next($request);
    }
    
    private function isTokenExpired()
    {
         $expiryTime = Config::get('services.facebook.expires_at');

      
        return strtotime($expiryTime) < time();
    }

    private function refreshToken()
    {
       
        $oldToken = Config::get('services.facebook.token');

      
        $response = Http::post('https://graph.facebook.com/v19.0/me?fields=access_token', [
            'grant_type' => 'fb_exchange_token',
            'client_id' => config('services.facebook.client_id'),
            'client_secret' => config('services.facebook.client_secret'),
            'fb_exchange_token' => $oldToken,
        ]);
        //  dd($response);
        
        $newToken=null;
        $expiryTime=null;
        if ($response->successful()) {
           
            $responseData = $response->json();
            
           
            if (isset($responseData['access_token'])) {
                
                $newToken = $responseData['access_token'];
                $expiryTime = now()->addSeconds($responseData['expires_in']);
            } 
        }

        // Update the configuration with the new token and its expiry time
        Config::set('services.facebook.token', $newToken);
        Config::set('services.facebook.expires_at', $expiryTime);
        return $newToken;   
    }

}
