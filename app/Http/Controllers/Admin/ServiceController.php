<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::withTrashed()->paginate(7);
        foreach ($services as $service) {
            $service->icon = storage::disk('public')->url($service->icon);
        }
        return view('admin.service.index')->with('services', $services);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'Required|string|max:255',
            'icon' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'description' => 'Required',
        ]);
        $image = $request->file('icon');
        $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
        $path = "uploads/images/$imgname";
        Storage::disk('public')->put($path, file_get_contents($image));

        $name = $request->input('name');
        $description = $request->input('description');
        $photo = $path;
        $service = new Service();
        $service->name = $name;
        $service->icon = $photo;
        $service->description = $description;
        $status = $service->save();
        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $service = Service::where('id', $id)->first();
        $service->icon = storage::disk('public')->url($service->icon);
        return view('admin.service.edit')->with('service', $service);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'Required|string|max:255',
            'icon' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'description' => 'Required',
        ]);
        if ($request->has('icon')) {
            $image = $request->file('icon');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $photo = $path;
            $service = Service::find($id);
            $service->icon = $photo;
            $service->save();
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $service = Service::find($id);
        $service->name = $name;
        $service->description = $description;
        $status = $service->save();

        return redirect()->back()->with('status', $status);
    }

    public function destroy($id)
    {
        Service::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Service::where('id', $id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $services = Service::withTrashed()->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($services as $service) {
            $service->imag = storage::disk('public')->url($service->image);
        }
        return view('admin.service.index')->with('services', $services);
    }
}
