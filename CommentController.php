<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{

    /**
     * Store a newly created comment in storage and update comment section on page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $post_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, [
            'author' => 'required',
            'body' => 'required',
        ]);

        $author = strip_tags($request->input('author'));
        $body = strip_tags($request->input('body'));

        $comment = new Comment;
        $comment->post_id = $post_id;
        $comment->author = $author;
        $comment->body = $body;
        $comment->save();

        return $this->updateComments($post_id);
    }

    /**
     * Store a newly created comment reply in storage and update comment section on page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $comment_id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $comment_id)
    {
        $this->validate($request, [
            'author' => 'required',
            'body' => 'required',
        ]);

        $author = strip_tags($request->input('author'));
        $body = strip_tags($request->input('body'));

        $comment = Comment::find($comment_id);

        $reply = new Comment;
        $reply->post_id = $comment->post_id;
        $reply->parent_id = $comment_id;
        $reply->author = $author;
        $reply->body = $body;
        $reply->save();

        return $this->updateComments($comment->post_id);
    }

    private function updateComments($post_id)
    {
        $comments = Comment::where('post_id', $post_id)
                                ->whereNull('parent_id')
                                ->orderBy('created_at', 'DESC')
                                ->get();

        return view('comments.index', [
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
