<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class MemberController extends Controller
{


    public function index()
    {
        $members = Member::withTrashed()->paginate(7);
        foreach ($members as $member) {
            $member->image = storage::disk('public')->url($member->image);
        }
        return view('admin.member.index')->with('members', $members);
    }

    public function create()
    {
        return view('admin.member.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'Required|string|max:255',
            'email' => 'Required|string|email|max:255|unique:' . Member::class,
            'password' => ['Required', 'confirmed', Rules\Password::defaults()],
            'image' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'designation' => 'Required',
        ]);
        $image = $request->file('image');
        $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
        $path = "uploads/images/$imgname";
        Storage::disk('public')->put($path, file_get_contents($image));

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $designation = $request->input('designation');
        $photo = $path;
        $member = new Member();
        $member->name = $name;
        $member->image = $photo;
        $member->email = $email;
        $member->password = $password;
        $member->designation = $designation;
        $status = $member->save();
        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $member = Member::where('id', $id)->first();
        $member->image = storage::disk('public')->url($member->image);
        return view('admin.member.edit')->with('member', $member);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'Required|string|max:255',
            'email' => 'Required|string|email|max:255|unique:' . Member::class,
            'password' => ['Required', 'confirmed', Rules\Password::defaults()],
            'image' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'designation' => 'Required',
        ]);
        if ($request->has('image')) {
            $image = $request->file('image');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $photo = $path;
            $member = Member::find($id);
            $member->image = $photo;
            $member->save();
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $designation = $request->input('designation');
        $member = Member::find($id);
        $member->name = $name;
        $member->email = $email;
        $member->password = $password;
        $member->designation = $designation;
        $status = $member->save();

        return redirect()->back()->with('status', $status);
    }

    public function destroy($id)
    {
        Member::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Member::where('id', $id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $members = Member::withTrashed()->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($members as $member) {
            $member->imag = storage::disk('public')->url($member->image);
        }
        return view('admin.member.index')->with('members', $members);
    }
}
