<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories']=Category::all();

        return view ('categories/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['categories'] = Category::all();
        return view('categories/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
            'avatar' => [File::types(['jpeg', 'jpg', 'png'])->max(2 * 1024),]
        ]);

        
        Category::create([
            'name'=>$validated['nama_kategori'],
            'avatar' => Storage::putFile('categories', $validated['avatar'])
        ]);

        return redirect('/categories/index');
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
        $data['categories'] = Category::find($id);
        return view ('/categories/edit', $data);
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
        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
            'avatar' => [File::types(['jpeg', 'jpg', 'png'])->max(2 * 1024),]
        ]);

        // Category::where('id', $id)->update([
        //     'name'=>$validated['nama_kategori'],
        //     'avatar' => Storage::putFile('categories', $validated['avatar'])
        // ]);

        $kategori = Category::find($id);
        $kategori->name = $validated['nama_kategori'];

        if($request->file('avatar')){
            if($kategori->avatar && Storage::exists($kategori->avatar)){
                Storage::delete($kategori->avatar);
            }
            $kategori->avatar = Storage::putFile('categories', $validated['avatar']);
        }
        $kategori->save();

        return redirect('/categories/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Category::find($id);
        Storage::delete($kategori->avatar);
        Category::destroy($id);

        return redirect('/categories/index');
    }
}
