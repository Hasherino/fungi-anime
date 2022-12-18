<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index() {
        $threads = Thread::all();

        return view('forum.index', compact('threads'));
    }

    public function show($id) {
        $thread = Thread::find($id);
        $comments = $thread->comments;

        return view('forum.show', compact('thread', 'comments'));
    }

    public function create() {
        $data = request(['title', 'content', 'user_id']);

        Thread::create($data);

        return $this->index();
    }

    public function edit($id) {
        $thread = Thread::find($id);

        return view('forum.edit', compact('thread'));
    }

    public function update($id) {
        $data = request(['title', 'content']);

        Thread::find($id)->update($data);

        return redirect("/forum/$id");
    }

    public function destroy($id) {
        Thread::find($id)->delete();

        return redirect("/forum");
    }

    public function createComment() {
        $data = request(['content', 'user_id', 'thread_id']);

        Comment::create($data);

        return $this->show($data['thread_id']);
    }

    public function editComment($id) {
        $comment = Comment::find($id);

        return view('forum.edit-comment', compact('comment'));
    }

    public function updateComment($id) {
        $data = request(['content']);

        $comment = Comment::find($id);
        $comment->update($data);

        return redirect("/forum/".$comment->thread->id);
    }

    public function destroyComment($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect("/forum/".$comment->thread->id);
    }
}
