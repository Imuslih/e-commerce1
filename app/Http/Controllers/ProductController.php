<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('category')->get();

        return view('products/all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('products/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'nama_produk' => 'required|max:255',
            'spesifikasi' => 'required',
            'deskripsi' => 'required',
            'harga_produk' => 'required|numeric',
            'id_kategori' => 'required',
            'avatar' => [File::types(['jpeg', 'jpg', 'png'])->max(2 * 1024),]
        ]);

        Product::create([
            'name'=>$validated['nama_produk'],
            'specification'=>$validated['spesifikasi'],
            'description'=>$validated['deskripsi'],
            'price'=>$validated['harga_produk'],
            'category_id'=>$validated['id_kategori'],
            'avatar' => Storage::putFile('products', $validated['avatar'])
        ]);

        return redirect('/products/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::find($id);

        return view ('/products/edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validated = $request->validate([
            'nama_produk' => 'required|max:255',
            'spesifikasi' => 'required',
            'deskripsi' => 'required',
            'harga_produk' => 'required|numeric',
            'id_kategori' => 'required',
            'avatar' => [File::types(['jpeg', 'jpg', 'png'])->max(2 * 1024),]
        ]);

        // Product::where('id', $id)->update([
        //     'name'=>$validated['nama_produk'],
        //     'specification'=>$validated['spesifikasi'],
        //     'description'=>$validated['deskripsi'],
        //     'price'=>$validated['harga_produk'],
        //     'category_id'=>$validated['id_kategori']
        // ]);

        $produk = Product::find($id);
        $produk->name = $validated['nama_produk'];
        $produk->price = $validated['harga_produk'];
        $produk->specification = $validated['spesifikasi'];
        $produk->description = $validated['deskripsi'];
        $produk->category_id = $validated['id_kategori'];

        if($request->file('avatar')){
            if($produk->avatar && Storage::exists($produk->avatar)){
                Storage::delete($produk->avatar);
            }
            $produk->avatar = Storage::putFile('products', $validated['avatar']);
        }
        $produk->save();

        return redirect('/products/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/all');
    }
}
