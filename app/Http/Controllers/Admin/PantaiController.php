<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pantai;
use Illuminate\Support\Str;

class PantaiController extends Controller
{

    public function index()
    {
        $pantai = Pantai::orderBy('created_at', 'DESC')->get();

        return view('admin.pantai.index', compact('pantai'));
    }

    public function create()
    {
        return view('admin.pantai.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name'          => 'required',
            'location'      => 'required',
            'description'   => 'required',
            'image'         => 'required|image|mimes:png,jpeg,jpg',
            'ticket_price'  => 'required',
            'opening_hours' => 'required',
        ]);


        if ($req->hasFile('image')) {

            $file = $req->file('image');

            $filename = time() . Str::slug($req->name) . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/pantai', $filename);


            $pantai = Pantai::create([
                'name'               => $req->name,
                'location'           => $req->location,
                'description'        => $req->description,
                'image'              => $filename,
                'ticket_price'       => $req->ticket_price,
                'opening_hours'      => $req->opening_hours,
            ]);

            return redirect(route('admin.pantai.index'))->with(['success' => 'Produk Baru Ditambahkan']);
        }
    }

    public function edit($id){
        $data = Pantai::find($id);
        return view('admin.pantai.edit', compact('data'));
    }
    
    public function update(Request $req, $id){
     
         $req->validate([
            'name'          => 'required',
            'location'      => 'required',
            'description'   => 'required',
            'image'         => 'nullable|image|mimes:png,jpeg,jpg',
            'ticket_price'  => 'required',
            'opening_hours' => 'required',
        ]);
        
        $Pantai = Pantai::find($id);
        $filename = $Pantai->image;
        
          if ($req->hasFile('image')) {
          $file = $req->file('image');
          $filename = time() . '.' . $file->getClientOriginalExtension();
          $file->storeAs('public/pantai', $filename);
        }
        
         $Pantai->update([
                'name'               => $req->name,
                'location'           => $req->location,
                'description'        => $req->description,
                'image'              => $filename,
                'ticket_price'       => $req->ticket_price,
                'opening_hours'      => $req->opening_hours,
            ]);


       
            return redirect(route('admin.pantai.index'))->with(['success' => 'Berhasil Edit']);
        
    }
    
}

