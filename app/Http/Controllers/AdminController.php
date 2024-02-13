<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    private $accessToken ;
    public function __construct()
    {
        $this->accessToken= Config::get('services.facebook.token');
    }
    public function dashboard()
    {
        $url2 = 'https://graph.facebook.com/v19.0/me/posts?fields=id';

        $getId = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken
        ])->get($url2);
        //  dd($getId->body());
        $post_id = (array)json_decode($getId->body());
        // dd($post_id['data'][0]->id);
        $page_post_id = $post_id['data'][1]->id;
        // dd($page_post_id);
        $url = "https://graph.facebook.com/v19.0/$page_post_id/comments";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken
        ])->get($url);

        $data = (array)json_decode($response->body());
        // dd($data);

        $data = ((array)$data);
        foreach ($data as $data1) {
            return view('admin.dashboard', ['data' => $data1]);
        }
    }

    public function read_lead_message()
    {

        // $urlToken='https://graph.facebook.com/v19.0/me?fields=access_token';
        // $tokenId=Http::get($urlToken);
        // dd($tokenId);
        $url3 = "https://graph.facebook.com/v19.0/me?fields=name";
        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken
        ])->get($url3);

        // $url="https://graph.facebook.com/v19.0/me?fields=name,posts{comments}";

        // dd($response->body());




        $data_post_name = (array)json_decode($response2->body());
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
        $url = "https://graph.facebook.com/v19.0/{$postId}/comments";
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken
        ])->get($url);

        // $comments = json_decode($response->body());

        // if (isset($comments->data)) {
        //     foreach ($comments->data as $comment) {
        //         // dd($comment);
        //         // if(isset($comment->message) || isset($comment->from)){
        //         //     $message=$comment->message;
        //         //     $from=$comment->from;
        //         //     // dd($from);
        //         // }else{
        //         //     $message='';
        //         //     $from='';
        //         // }
        //         $message = isset($comment->message) ? $comment->message : '';
        //         'from' => isset($comment['from']['name']) ? $comment['from']['name'] : '';
              
        //         $allComments[] = [$message,$from];
        //     }
        // }
        $commentsData = json_decode($response->body(), true);

        if (isset($commentsData['data'])) {
            foreach ($commentsData['data'] as $comment) {
                $commentDetails = [
                    'message' => isset($comment['message']) ? $comment['message'] : '',
                    'from' => isset($comment['from']['name']) ? $comment['from']['name'] : ''
                ];
                $allComments[] = $commentDetails;
            }
        }
    }
}

return view('admin.facebook-leads', ['data' => $allComments]);
        
    }

    public function getFacebookId($profile_name)
    {
        $user = User::where('name', $profile_name)->first();

        return view('admin.user-detail', ['user' => $user]);
    }
}
