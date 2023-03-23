<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function detail(){
        return view('/transaksi/detail');
    }

    public function add($id){
        $cart = session('cart');
        $products = Product::find($id);
        if (empty($cart)){
            $cart[$id] = [
                'nama_produk' => $products->name,
                'harga_produk' => $products->price,
                'qty' => 1
            ];
        } else {
            $jml=1;
            foreach($cart as $item =>$val){
                if($item==$id){
                    $jml = $val['qty']+=1;
                }
            }
            $cart[$id] = [
                'nama_produk' => $products->name,
                'harga_produk' => $products->price,
                'qty' => $jml
            ];
        }

        session(['cart' => $cart]);

        return redirect('/transaksi/index');
    }

    public function cart(){
        $cart = session('cart');
        return view('/Transaksi/cart')->with('cart', $cart);
    }

    public function hapus($id){
        $cart = session('cart');
        unset($cart[$id]);

        session(['cart' => $cart]);
        return redirect('/transaksi/index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session('cart');
        $data['products'] = Product::all();
        if(empty($cart)){
            return view('transaksi/index', $data);
        } else {
            return view('/transaksi/index', $data, $cart)->with('cart', $cart);
        }
        
    }

    public function tambah_transaksi(){

        $total_price=0;
        $cart = session('cart');
        foreach ($cart as $item => $val) {
            $product_id = $item;
            $qty = $val['qty'];
            $total = $val['harga_produk'] * $val['qty'];
            $total_price += $total;

            transaksi::create([
                'product_id' => $product_id,
                'qty' => $qty,
                'total_price' => $total
            ]);
        }
        session()->forget('cart');

        return redirect('/transaksi/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
