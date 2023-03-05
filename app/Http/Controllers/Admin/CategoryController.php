<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withTrashed()->paginate(7);
        return view('admin.category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'Required',
            'description' => 'Required',
        ]);
        $title = $request->input('title');
        $description = $request->input('description');
        $category = new Category;
        $category->title = $title;
        $category->description = $description;
        if (Auth::guard('member')->check()) {
            $category->added_by = Auth::guard('member')->user()->email;
        } elseif (Auth::guard('web')->check()) {
            $category->added_by = Auth::guard('web')->user()->email;
        }
        $status = $category->save();
        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        $category->image = storage::disk('public')->url($category->image);
        return view('admin.category.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'title' => 'Required',
            'description' => 'Required',
        ]);
        $title = $request->input('title');
        $description = $request->input('description');
        $category = Category::find($id);
        $category->title = $title;
        $category->content = $description;
        $status = $category->save();

        return redirect()->back()->with('status', $status);
    }

    public function destroy($id)
    {
        Category::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Category::where('id', $id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::withTrashed()->with('user')->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($categories as $category) {
            $category->imag = storage::disk('public')->url($category->image);
        }
        return view('admin.category.index')->with('categories', $categories);
    }
}
