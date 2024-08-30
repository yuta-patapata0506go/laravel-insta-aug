<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comment;
    /**
     * Display a listing of the resource.
     */

     public function __construct(Comment $comment) {
        $this->comment = $comment;
     }
    public function index()
    {
        //
        $all_comments = $this->comment->all();
        return view('todo.index')->with('all_comments', $all_comments) ;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$post_id)
    {
        //
        $this->comment->body = $request->body;
        $this->comment->user_id = auth()->user()->id;
        $this->comment->post_id = $post_id;
        $this->comment->save();

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        
        $this->comment->destroy($id);

        return redirect()->back();
    }
}
