<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\Member;
use App\Models\User;
use App\Notifications\OffersNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Factory;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 1)
        $blogs = Blog::withTrashed()->with('user')->paginate(7);
        else
            $blogs = Blog::where('status',1)->with('user')->paginate(7);
        foreach ($blogs as $blog) {
            $blog->image = storage::disk('public')->url($blog->image);
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
        return view('admin.blog.index',compact('blogs','notifications','count'));
    }

    public function create()
    {
        $users = Member::get();
        $categories = Category::get();
        return view('admin.blog.create')->with('users', $users)->with('categories', $categories);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'user_id' => 'Required',
            'category_id' => 'Required',
            'image' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'title' => 'Required',
            'content' => 'Required',
        ]);
        $image = $request->file('image');
        $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
        $path = "uploads/images/$imgname";
        Storage::disk('public')->put($path, file_get_contents($image));

        $user_id = $request->input('user_id');
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $content = $request->input('content');
        $photo = $path;
        $blog = new Blog;
        $blog->user_id = $user_id;
        $blog->category_id = $category_id;
        $blog->image = $photo;
        $blog->title = $title;
        $blog->content = $content;
        if (Auth::guard('member')->check()) {
            $blog->added_by = Auth::guard('member')->user()->email;
        } elseif (Auth::guard('web')->check()) {
            $blog->added_by = Auth::guard('web')->user()->email;
        }
        $status = $blog->save();
        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        $blog->image = storage::disk('public')->url($blog->image);
        $users = Member::get();
        return view('admin.blog.edit')->with('blog', $blog)->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'user_id' => 'Required',
            'category_id' => 'Required',
            'image' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'title' => 'Required',
            'content' => 'Required',
        ]);
        if ($request->has('image')) {
            $image = $request->file('image');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $photo = $path;
            $blog = Blog::find($id);
            $blog->image = $photo;
            $blog->save();
        }

        $user_id = $request->input('user_id');
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $content = $request->input('content');
        $s = $request->input('status');
        $blog = Blog::find($id);
        $blog->user_id = $user_id;
        $blog->category_id = $category_id;
        $blog->title = $title;
        $blog->content = $content;
        $blog->status = $s;
        $status = $blog->save();

        return redirect()->back()->with('status', $status);
    }

    public function acceptance($id){
        $blog =Blog::find($id);
        $blog->status = 1;
        $blog->save();
        auth()->user()->notify(new OffersNotification($blog));
        return redirect()->back();
    }

    public function notAcceptance($id){
        $blog =Blog::find($id);
        $blog->status = 0;
        $blog->save();
        auth()->user()->notify(new OffersNotification($blog));
        return redirect()->back();
    }

    public function destroy($id)
    {
        Blog::find($id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Blog::find($id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $blogs = Blog::withTrashed()->with('user')->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($blogs as $blog) {
            $blog->imag = storage::disk('public')->url($blog->image);
        }
        return view('admin.blog.index')->with('blogs', $blogs);
    }
}
