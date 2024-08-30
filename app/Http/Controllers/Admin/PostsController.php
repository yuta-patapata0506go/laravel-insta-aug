<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{
    //
    private $post;
   

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index(){
            $all_posts = $this->post->withTrashed()->latest()->get();
            return view('admin.posts.index')->with('all_posts',$all_posts );
        }

        public function hidden($id){
            $post = $this->post->findOrFail($id);
            $post->delete();
            return back();
        }

        public function visible($id){
            // get all data including deleted data and find this ID;
            $post = $this->post->withTrashed()->findOrFail($id);
            // put it back, remove the deleted_at column
            $post->restore();
            return back();
        }
    
}
