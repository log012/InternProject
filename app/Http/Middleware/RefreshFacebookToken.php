<?php

namespace App\Http\Middleware;

use App\Models\Access_token;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon ;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
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
        $token = DB::table('access_tokens')->first();
        // dd($token);
        if (!$token) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer EAATGx5hOiEQBO4bJ1wcPqNiwG7XEePK0uOEcnxq0Oc7tX2lAXxrILWZCx2RtO68fDZBLykrZClk5Cn3fkkRwBbkTGeoCISPSkZCjpL4aiLaj2zN3UbjB7V9LJZAOZCXXFMa7TeZAamrGquOfDKiIlkinJhJxQi2b2BI128HX0x4eZA5ATBVFOWSUZCeFc'
            ])->get('https://graph.facebook.com/v19.0/178447022029079?fields=access_token');
            if ($response->successful()) {
                $responseData = $response->json();
                //  dd($responseData);
                    Access_token::truncate();
                    if (isset($responseData['access_token'])) {
                    $newToken = $responseData['access_token'];
                    Access_token::create([
                        'access_token' => $response['access_token'],
                        'token_created_at' => now(),
                    ]);
                    // $expiryTime = now()->addMinutes(55);
                    // Cache::put('facebook_access_token_expiry', $expiryTime);
    
                }
            }
        }

        return $next($request);
    }
    
    // private function isTokenExpired()
    // {
    //      $expiryTime = Config::get('services.facebook.expires_at');
    //     return strtotime($expiryTime) < time();
    // }

    // public function refreshToken()
    // {
       
      
    // //    $pageResponse=Http::withHeaders([

    // //    ])->get('')
    // $expiryTime = Cache::get('facebook_access_token_expiry');
    
    //     // $response = Http::withHeaders([
    //     //     'Authorization' => 'Bearer EAATGx5hOiEQBO4bJ1wcPqNiwG7XEePK0uOEcnxq0Oc7tX2lAXxrILWZCx2RtO68fDZBLykrZClk5Cn3fkkRwBbkTGeoCISPSkZCjpL4aiLaj2zN3UbjB7V9LJZAOZCXXFMa7TeZAamrGquOfDKiIlkinJhJxQi2b2BI128HX0x4eZA5ATBVFOWSUZCeFc'
    //     // ])->get('https://graph.facebook.com/v19.0/178447022029079?fields=access_token');
        
       
           
                
    //         $newToken = null;
   
    //     // if ($response->successful()) {
    //     //     $responseData = $response->json();
    //     //     //  dd($responseData);
    //     //         Access_token::truncate();
    //     //         if (isset($responseData['access_token'])) {
    //     //         $newToken = $responseData['access_token'];
    //     //         Access_token::create([
    //     //             'access_token' => $response['access_token'],
    //     //             'token_created_at' => now(),
    //     //         ]);
    //     //         // $expiryTime = now()->addMinutes(55);
    //     //         // Cache::put('facebook_access_token_expiry', $expiryTime);

    //     //     }
    //     // }
      
        
        
  
        
    //     return $newToken;  
    // }

}
