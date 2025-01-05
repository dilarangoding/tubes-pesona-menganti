<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuliner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliner = Kuliner::orderBy('created_at', 'DESC')->get();
        return view('admin.kuliner.index', compact('kuliner'));
    }


    public function create()
    {
        return view('admin.kuliner.create');
    }


    public function store(Request $req)
    {
        $req->validate([
            'name'          => 'required',
            'image'         => 'required|image|mimes:png,jpeg,jpg',
            'category'      => 'required',
            'location'      => 'required',
            'distance'      => 'required',
            'price'         => 'required',
        ]);


        if ($req->hasFile('image')) {

            $file = $req->file('image');

            $filename = time() . Str::slug($req->name) . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/kuliner', $filename);


            Kuliner::create([
                'name'              => $req->name,
                'image'             => $filename,
                'category'          => $req->category,
                'location'          => $req->location,
                'distance'          => $req->distance,
                'price'             => $req->price,
            ]);

            return redirect(route('admin.kuliner.index'))->with(['success' => 'Data Berhasil Ditambahkan']);
        }
    }

    public function edit($id)
    {
        $kuliner = Kuliner::find($id);

        return view('admin.kuliner.edit', compact('kuliner'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name'          => 'required',
            'category'      => 'required',
            'location'      => 'required',
            'image'         => 'nullable|image|mimes:png,jpeg,jpg',
            'distance'      => 'required',
            'price'         => 'required',
        ]);

        $kuliner = Kuliner::find($id);
        $filename = $kuliner->image;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/kuliner', $filename);
            File::delete(storage_path('app/public/kuliner/' . $kuliner->image));
        }

        $kuliner->update([
            'name'              => $request->name,
            'image'             => $filename,
            'category'          => $request->category,
            'location'          => $request->location,
            'distance'          => $request->distance,
            'price'             => $request->price,
        ]);
        return redirect(route('admin.kuliner.index'))->with(['success' => 'Data  Diperbaharui']);
    }


    public function delete($id)
    {
        $kuliner = Kuliner::find($id);
        File::delete(storage_path('app/public/kuliner/' . $kuliner->image));
        $kuliner->delete();
        return redirect(route('admin.kuliner.index'))->with(['success' => 'Data Sudah Dihapus']);
    }
}
