<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class PenginapanController extends Controller
{
    public function index()
    {
        $penginapan = Penginapan::orderBy('created_at', 'DESC')->get();
        return view('admin.penginapan.index', compact('penginapan'));
    }

    public function create()
    {
        return view('admin.penginapan.create');
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

            $file->storeAs('public/penginapan', $filename);


            Penginapan::create([
                'name'              => $req->name,
                'image'             => $filename,
                'category'          => $req->category,
                'location'          => $req->location,
                'distance'          => $req->distance,
                'price'             => $req->price,
            ]);

            return redirect(route('admin.penginapan.index'))->with(['success' => 'Data Berhasil Ditambahkan']);
        }
    }

    public function edit($id)
    {
        $penginapan = Penginapan::find($id);

        return view('admin.penginapan.edit', compact('penginapan'));
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

        $penginapan = Penginapan::find($id);
        $filename = $penginapan->image;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/penginapan', $filename);
            File::delete(storage_path('app/public/penginapan/' . $penginapan->image));
        }

        $penginapan->update([
            'name'              => $request->name,
            'image'             => $filename,
            'category'          => $request->category,
            'location'          => $request->location,
            'distance'          => $request->distance,
            'price'             => $request->price,
        ]);
        return redirect(route('admin.penginapan.index'))->with(['success' => 'Data  Diperbaharui']);
    }


    public function delete($id)
    {
        $penginapan = Penginapan::find($id);
        File::delete(storage_path('app/public/penginapan/' . $penginapan->image));
        $penginapan->delete();
        return redirect(route('admin.penginapan.index'))->with(['success' => 'Data Sudah Dihapus']);
    }
}
