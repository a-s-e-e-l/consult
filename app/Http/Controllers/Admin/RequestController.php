<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use App\Models\Admin\Request as req;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function index()
    {
        $req = req::withTrashed()->paginate(7);
        return view('admin.req.index')->with('req', $req);
    }

    public function create()
    {
        $services = Service::get();
        return view('admin.req.create')->with('services', $services);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'Required|string|max:255',
            'email' => 'Required|string|email|max:255',
            'service_id' => 'Required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $service_id = $request->input('service_id');
        $req = new req();
        $req->name = $name;
        $req->email = $email;
        $req->service_id = $service_id;
        $status = $req->save();
        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $req = req::where('id', $id)->first();
        $services = Service::get();
        return view('admin.req.edit')->with('req', $req)->with('services', $services);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'Required|string|max:255',
            'email' => 'Required|string|email|max:255',
            'service_id' => 'Required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $service_id = $request->input('service_id');
        $req = req::find($id);
        $req->name = $name;
        $req->email = $email;
        $req->service_id = $service_id;
        $status = $req->save();

        return redirect()->back()->with('status', $status);
    }

    public function destroy($id)
    {
        req::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        req::where('id', $id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $req = req::withTrashed()->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($req as $r) {
            $r->imag = storage::disk('public')->url($r->image);
        }
        return view('admin.req.index')->with('req', $req);
    }
}
