<?php

namespace App\Http\Controllers;
use App\Models\Admin\Blog;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    public function __construct()
    {
        $this->firebase = $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/first-35e36-firebase-adminsdk-a5mbq-c57a1403b6.json')
            ->withDatabaseUri('https://first-35e36-default-rtdb.firebaseio.com');
    }

    public function store($id){
        $database = $this->firebase->createDatabase();

        $notifications = $database
            ->getReference('notifications');

        $blog =Blog::find($id);
//        $blog->status = 1;
//        $blog->save();
        $user = User::where('email',$blog->added_by)->first();
        $to = $user->id;
        $postData = [
            'from' => Auth::user()->id,
            'body' => 'The request to add the blog titled '.$blog->title.' has been accepted ',
            'to' =>$to,
            'at'=> Carbon::now()->format('M j   h:i A'),
        ];
        $postRef = $notifications->push($postData);
        if ($postRef){
            $status='added data success';
        }else{
            $status='no added data';
        }
        return redirect()->back()->with('status', $status);
    }

    public function notAccept($id){
        $database = $this->firebase->createDatabase();

        $notifications = $database
            ->getReference('notifications');

        $blog =Blog::find($id);
//        $blog->status = 0;
//        $blog->save();
        $user = User::where('email',$blog->added_by)->first();
        $to = $user->id;
        $postData = [
            'from' => Auth::user()->id,
            'body' => 'The blog titled '.$blog->title.' Not Approved',
            'to' =>$to,
            'at'=> Carbon::now()->format('M j   h:i A'),
        ];
        $postRef = $notifications->push($postData);
        if ($postRef){
            $status='added data success';
        }else{
            $status='no added data';
        }
        return redirect()->back()->with('status', $status);
    }

    public function index()
    {
        $database = $this->firebase->createDatabase();
        $notifications = $database
            ->getReference('notifications')->orderByChild('at')->getvalue();
        $notifications = array_reverse($notifications);
    }
}
