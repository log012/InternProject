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

    public function refreshToken()
    {
       
      
    //    $pageResponse=Http::withHeaders([

    //    ])->get('')

      
        $response = Http::withHeaders([
            'Authorization' => 'Bearer EAATGx5hOiEQBO4bJ1wcPqNiwG7XEePK0uOEcnxq0Oc7tX2lAXxrILWZCx2RtO68fDZBLykrZClk5Cn3fkkRwBbkTGeoCISPSkZCjpL4aiLaj2zN3UbjB7V9LJZAOZCXXFMa7TeZAamrGquOfDKiIlkinJhJxQi2b2BI128HX0x4eZA5ATBVFOWSUZCeFc'
        ])->get('https://graph.facebook.com/v19.0/178447022029079?fields=access_token');
        
           
           
                
            $newToken = null;
   
        if ($response->successful()) {
            $responseData = $response->json();
            
                        if (isset($responseData['access_token'])) {
                $newToken = $responseData['access_token'];
             
            }
        }

        
        return $newToken;  
    }

}
