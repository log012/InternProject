<?php
namespace App\repository;

use App\Http\Middleware\RefreshFacebookToken;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Spatie\WebhookServer\WebhookCall;

class AdminRepository implements AdminRepositoryInterface{
    private $accessToken ;

    public function __construct()
    {           
        $this->accessToken= DB::table('access_tokens')->value('access_token');
    }
    public function dashboard(){
        $urlPost = 'https://graph.facebook.com/v19.0/me/posts?fields=id';
        //  dd($this->accessToken);
        $getId = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken
        ])->get($urlPost);
        
        $postId = json_decode($getId->body(), true);
        // dd($postId);
        $allComments = [];
        if (isset($postId['data'])) {
            foreach ($postId['data'] as $post) {
                $postId = $post['id'];
                $url = "https://graph.facebook.com/v19.0/{$postId}/comments";
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '.$this->accessToken
                ])->get($url);
                $commentsData = json_decode($response->body(), true);
                // dd($commentsData);
                if (isset($commentsData['data'])) {
                    foreach ($commentsData['data'] as $comment) {
                        // dd($comment);
                        $commentDetails = [
                            'message' => isset($comment['message']) ? $comment['message'] : '',
                            'from' => isset($comment['from']['name']) ? $comment['from']['name'] : ''
                        ];

                        WebhookCall::create()
                        ->url('http://127.0.0.1:8001/webhook-receiving-url')
                        ->payload(['userData' => $comment['message']])
                        ->useSecret('secretkey')
                        ->dispatch();
                        $allComments[] = $commentDetails;
                       
                    }
                }
            }
        }
        return view('admin.dashboard', ['data' => $allComments]);
    }
    public function read_lead_message(){
        // Artisan::call('app:refresh-access-token-command');
        $url3 = "https://graph.facebook.com/v19.0/me?fields=posts";
        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken
        ])->get($url3);

        $responsePost= (array)json_decode($response2->body());
        // dd($responsePost);
        $dataPost=(array)$responsePost['posts'];
        $dataPost=$dataPost['data'];
        // dd($dataPost);
        $postArray=[];
        foreach($dataPost as $value){
            $postArray=["message"=>$value->message];
        }
        // dd($postArray);
        $urlPost = 'https://graph.facebook.com/v19.0/me/posts?fields=id';

$getId = Http::withHeaders([
    'Authorization' => 'Bearer '.$this->accessToken
])->get($urlPost);

$postId = json_decode($getId->body(), true);
// dd($postId);
$allComments = [];

if (isset($postId['data'])) {
    foreach ($postId['data'] as $post) {
        $postId = $post['id'];
        // $url = "https://graph.facebook.com/v19.0/{$postId}/comments";
        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer '.$this->accessToken
        // ])->get($url);

        // $commentsData = json_decode($response->body(), true);
        // // dd($commentsData);

        // if (isset($commentsData['data'])) {
        //     foreach ($commentsData['data'] as $comment) {
        //         // dd($comment);
        //         $commentDetails = [
        //             'message' => isset($comment['message']) ? $comment['message'] : '',
        //             'from' => isset($comment['from']['name']) ? $comment['from']['name'] : ''
        //         ];
        //         $allComments[] = $commentDetails;
        //         // dd($allComments);
        //     }
        // }
        $url = "https://graph.facebook.com/v19.0/{$postId}?fields=comments,message";
        $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$this->accessToken
        ])->get($url);
        $commentsData = json_decode($response->body(), true);
        // dd($commentsData['message']);
        foreach($commentsData as $comment){
            // dd($comment);
            if(isset($comment['data'])){
                foreach($comment['data'] as $innerComments){
                    // dd($innerComments['message']);
                    $commentDetails = [
                        'outerMessage'=>isset($commentsData['message'])?$commentsData['message']:'',
                                    'message' => isset($innerComments['message']) ? $innerComments['message'] : '',
                                    'from' => isset($innerComments['from']['name']) ? $innerComments['from']['name'] : ''
                                ];
                                $allComments[] = $commentDetails;
                                // dd($allComments);
                }
            }
         
        }
    }
}

$userData=User::all();
// dd($userData);

return view('admin.facebook-leads', ['data' => $allComments,'userData'=>$userData
]);
    }
    public function getFacebookId($name){
        $user = User::where('name', $name)->first();
        // dd($user);
        return view('admin.user-detail', ['user' => $user]);
    }

}