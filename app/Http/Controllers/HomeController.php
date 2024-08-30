<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    private $post;
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post,User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $all_posts = $this->getHomePosts();
        $suggested_users = $this->getSuggestedUsers();
        
        return view('users.home')
        ->with('all_posts',$all_posts)
        ->with('suggested_users',$suggested_users);

       
        
    }

    private function getHomePosts() {
        $all_posts = $this->post->latest()->get();
        $home_posts = [];
        foreach ($all_posts as $post) {
            if($post->user->isFollowed() or $post->user_id == auth()->user()->id) {
                $home_posts[] = $post;
            }
        }
        return $home_posts;
    }
    
    private function getSuggestedUsers() {
       
        $all_users = $this->user->all()->except(auth()->user()->id)->take(5);
        $suggested_users = [];

        foreach ($all_users as $user) {
            if(!$user->isFollowed()) {
                $suggested_users[] = $user;
            }
        }

        return $suggested_users;
    }
    
   
}
