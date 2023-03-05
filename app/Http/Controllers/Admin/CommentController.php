<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Comment;
use App\Models\Admin\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::withTrashed()->with('parentComment')->with('parentBlog')->paginate(7);
        return view('admin.comment.index')->with('comments', $comments);
    }

    public function create()
    {
        $members = Member::get();
        $blogs = Blog::get();
        $comments = Comment::get();
        return view('admin.comment.create')->with('members', $members)->with('blogs', $blogs)->with('comments', $comments);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'user_id' => 'Required',
            'content' => 'Required',
        ]);
        $user_id = $request->input('user_id');
        $content = $request->input('content');
        $blog_id = $request->input('blog_id');
        $comment_id = $request->input('comment_id');
        $comment = new Comment;
        $comment->user_id = $user_id;
        $comment->content = $content;
        $comment->blog_id = $blog_id;
        $comment->comment_id = $comment_id;
        $status = $comment->save();
        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $comment = Comment::where('id', $id)->first();
//        $blog->image = storage::disk('public')->url($blog->image);
        $members = Member::get();
        $blogs = Blog::get();
        $comments = Comment::where('id','!=',$id)->get();
        return view('admin.comment.edit')->with('comment', $comment)->with('members', $members)->with('blogs', $blogs)->with('comments', $comments);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'user_id' => 'Required',
            'content' => 'Required',
        ]);
        $user_id = $request->input('user_id');
        $content = $request->input('content');
        $blog_id = $request->input('blog_id');
        $comment_id = $request->input('comment_id');
        $comment = Comment::find($id);
        $comment->user_id = $user_id;
        $comment->content = $content;
        $comment->blog_id = $blog_id;
        $comment->comment_id = $comment_id;
        $status = $comment->save();

        return redirect()->back()->with('status', $status);
    }

    public function destroy($id)
    {
        Comment::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Comment::where('id', $id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $comments = Comment::withTrashed()->with('member')->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($comments as $blog) {
            $blog->imag = storage::disk('public')->url($blog->image);
        }
        return view('admin.comment.index')->with('comments', $comments);
    }
}
