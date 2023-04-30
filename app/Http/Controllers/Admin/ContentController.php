<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::withTrashed()->paginate(7);
        foreach ($contents as $content) {
            if (str_contains($content->key, 'p')) {
                $content->value = storage::disk('public')->url($content->value);
            }
        }
        $firebase = (new Factory)
            ->withServiceAccount('C:\Users\Aseel\Documents\Laravel\first\app\Http\Controllers\first-35e36-firebase-adminsdk-a5mbq-c57a1403b6.json')
            ->withDatabaseUri('https://first-35e36-default-rtdb.firebaseio.com');
        $database = $firebase->createDatabase();
        $notifications = $database
            ->getReference('notifications')->getSnapshot()->getvalue();
        usort($notifications, function ($a, $b) {
            $at1 = strtotime($a['at']);
            $at2 = strtotime($b['at']);
            return $at2 - $at1; // Compare in descending order
        });
        $count = $database
            ->getReference('notifications')->getSnapshot()->numChildren();
        return view('admin.content.index',compact('notifications','count','contents'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'key' => 'Required|string|max:255',
            'value' => 'string',
            'image' => 'mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        $content = new Content();
        $key = $request->input('key');
        $content->key = $key;
        if ($request->has('image')) {
            $image = $request->file('image');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $photo = $path;
            $content->value = $photo;
        } else {
            $value = $request->input('value');
            $content->value = $value;
        }
        $status = $content->save();
        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $content = Content::where('id', $id)->first();
        if (str_contains($content->key, 'p')) {
            $content->value = storage::disk('public')->url($content->value);
        }
        return view('admin.content.edit')->with('content', $content);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'key' => 'Required|string|max:255',
            'value' => 'string',
            'image' => 'mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        $content = Content::find($id);
        $key = $request->input('key');
        $content->key = $key;
        if ($request->has('image')) {
            $image = $request->file('image');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $photo = $path;
            $content->value = $photo;
            $content->save();
        } else {
            $value = $request->input('value');
            $content->value = $value;
        }
        $status = $content->save();
        return redirect()->back()->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
