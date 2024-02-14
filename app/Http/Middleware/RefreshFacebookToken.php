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
        // dd($oldToken);

      
        $response = Http::withHeaders([
            'Authorization' => 'Bearer EAATGx5hOiEQBO8l4ny5cSgCgguNNS7MZAdu51ZAiJBuZCfGnFAAiJL7I027a32mVXSaQL9nxxKreO7QYyZACPcVqRbHOZCyo2ei8Ylzmb3At7pYsYEKWDbghHYLHaxHcuqFe7OZCNytki9RdvL1Qwgw6a2VU2PHds6Caqa4EIKlvlCZCZBz1fQoMC3kYYDTnP0KBf6C8TUT3jTODd1gz2gZDZD'
        ])->get('https://graph.facebook.com/v19.0/178447022029079?fields=access_token');
        //  dd($response);
        
        
        
           
            // $responseData = $response->json();
            // dd($responseData);
           
        
                
            $newToken = null;
        $expiryTime = null;
        if ($response->successful()) {
            $responseData = $response->json();
            // dd($responseData);
            if (isset($responseData['access_token'])) {
                $newToken = $responseData['access_token'];
                $expiryTime = now()->addHour();
            }
        }

        Config::set('services.facebook.expires_at', $expiryTime);
        return $newToken;  
    }

}
