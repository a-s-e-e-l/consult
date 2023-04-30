<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\Comment;
use App\Models\Admin\Content;
use App\Models\Admin\Member;
use App\Models\Admin\Service;
use App\Models\ReviewRating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function home()
    {
        $blogs = Blog::withTrashed()->with('user')->paginate(7);
        foreach ($blogs as $blog) {
            $blog->image = storage::disk('public')->url($blog->image);
        }
        $services = Service::withTrashed()->paginate(7);
        foreach ($services as $service) {
            $service->icon = storage::disk('public')->url($service->icon);
        }
        $members = Member::withTrashed()->paginate(7);
        foreach ($members as $member) {
            $member->image = storage::disk('public')->url($member->image);
        }
        $contents = Content::withTrashed()->paginate(7);
        foreach ($contents as $content) {
            if (str_contains($content->key, 'p')) {
                $content->value = storage::disk('public')->url($content->value);
            }
        }
        return view('website')->with('blogs', $blogs)->with('services', $services)->with('members', $members)->with('contents', $contents);
    }

    public function blogGrid($id)
    {
        $blogs = Blog::where('category_id', $id)->with('user')->paginate(7);
        foreach ($blogs as $blog) {
            $blog->image = storage::disk('public')->url($blog->image);
        }
        $blogsOrder = Blog::orderBy('created_at', 'desc')->with('user')->paginate(7);
        foreach ($blogsOrder as $blogOrder) {
            $blogOrder->image = storage::disk('public')->url($blogOrder->image);
        }
        $categories = Category::paginate(7);
        return view('website.blogGrid')->with('blogs', $blogs)->with('categories', $categories)->with('blogsOrder', $blogsOrder);
    }

    public function blogDetail($id)
    {
        $blogsOrder = Blog::orderBy('created_at', 'desc')->with('user')->paginate(7);
        foreach ($blogsOrder as $blogOrder) {
            $blogOrder->image = storage::disk('public')->url($blogOrder->image);
        }
        $categories = Category::paginate(7);
        $blog = Blog::where('id', $id)->with('user')->first();
        $blog->image = storage::disk('public')->url($blog->image);
        $comments = Comment::with('parentComment')->with('parentBlog')->get();
        foreach ($comments as $comment) {
            $comment->member->image = storage::disk('public')->url($comment->member->image);
        }
        return view('website.blogDetail')->with('blog', $blog)->with('comments', $comments)->with('categories', $categories)->with('blogsOrder', $blogsOrder);
    }


    function reviewBlog($id, Request $request)
    {
        $review = new ReviewRating();
        $review->blog_id = $id;
        $admin = User::where('name', $request->name)->first();
        $review->user_id = $admin->id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->phone = $request->phone;
        $review->content = $request->comment;
        $review->star_rating = $request->rating;
        $review->comment_id = null;
        $review->save();
        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully,');
    }

}
