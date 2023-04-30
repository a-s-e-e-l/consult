<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Factory;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todayDate = Carbon::now()->format('l , j F Y');
        $totalBlogs = Blog::count();
        $totalAllUser = User::count();
        $totalUser = User::where('role', 0)->count();
        $totalAdmin = User::where('role', 1)->count();
        $totalCategories = Category::count();
        $totalComments = Comment::count();
        $comments = Comment::orderBy('created_at', 'desc')->with('parentComment')->with('parentBlog')->get();
        foreach ($comments as $comment) {
            $comment->member->image = storage::disk('public')->url($comment->member->image);
        }
        $firebase = (new Factory)
            ->withServiceAccount('C:\Users\Aseel\Documents\Laravel\first\app\Http\Controllers\first-35e36-firebase-adminsdk-a5mbq-c57a1403b6.json')
            ->withDatabaseUri('https://first-35e36-default-rtdb.firebaseio.com');
        $database = $firebase->createDatabase();
        $notifications = $database
            ->getReference('notifications')->getSnapshot()->getvalue();
        if($notifications>0){
            usort($notifications, function ($a, $b) {
                $at1 = strtotime($a['at']);
                $at2 = strtotime($b['at']);
                return $at2 - $at1; // Compare in descending order
            });
        }
        $count = $database
            ->getReference('notifications')->getSnapshot()->numChildren();
        return view('dashboard', compact('notifications', 'count', 'user', 'todayDate', 'totalBlogs', 'totalUser', 'totalCategories', 'totalComments', 'comments'));
    }
}
