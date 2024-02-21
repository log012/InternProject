<?php

namespace App\Console\Commands;

use App\Models\Access_token;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class refreshAccessTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-access-token-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // $token = DB::table('access_tokens')->first();
        // dd($token);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer EAATGx5hOiEQBO4bJ1wcPqNiwG7XEePK0uOEcnxq0Oc7tX2lAXxrILWZCx2RtO68fDZBLykrZClk5Cn3fkkRwBbkTGeoCISPSkZCjpL4aiLaj2zN3UbjB7V9LJZAOZCXXFMa7TeZAamrGquOfDKiIlkinJhJxQi2b2BI128HX0x4eZA5ATBVFOWSUZCeFc'
        ])->get('https://graph.facebook.com/v19.0/178447022029079?fields=access_token');
        
        if ($response->successful()) {
            $responseData = $response->json();
            
            if (isset($responseData['access_token'])) {
                $newToken = $responseData['access_token'];
                
                // Check if an access token already exists in the database
                $existingToken = Access_token::first();
                
                if ($existingToken) {
                    // Update the existing access token
                    $existingToken->update([
                        'access_token' => $newToken,
                        'token_created_at' => now(),
                    ]);
                } else {
                    // Create a new access token record
                    Access_token::create([
                        'access_token' => $newToken,
                        'token_created_at' => now(),
                    ]);
                }
                
                $this->info('Access token refreshed successfully.');
            } else {
                $this->error('Failed to fetch access token from API.');
            }
        } else {
            $this->error('Failed to fetch access token from API.');
        }
    }
}
