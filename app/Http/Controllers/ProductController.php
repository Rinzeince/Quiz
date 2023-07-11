<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'Tersedia')->get();
        $data = [
            "products" => $products
        ];
        return view('product.index', $data);
    }

    public function unavailable()
{
    $products = Product::where('status', '!=', 'Tersedia')->get();
    $data = [
        "products" => $products
    ];
    return view('product.unavailable', $data);
}


public function add(Request $request, Product $product)
{
    $qty = $request->input('qty', 1);

    // Validasi stok produk
    if ($product->stok < $qty) {
        return redirect()->back()->withErrors('Stok produk tidak mencukupi.');
    }

    // Kurangi stok produk
    $product->stok -= $qty;
    $product->save();

    // Mendapatkan ID produk
    $productId = $product->id;

    // Mendapatkan nomor transaksi terakhir
    $lastTransaksi = Transaksi::latest()->first();
    $lastNoTransaksi = $lastTransaksi ? intval(substr($lastTransaksi->notransaksi, 3)) : 0;
    $nextNoTransaksi = $lastNoTransaksi + 1;
    $notransaksi = 'TR ' . $nextNoTransaksi;

    // Simpan transaksi
    $transaksi = new Transaksi();
    $transaksi->notransaksi = $notransaksi;
    $transaksi->product_id = $productId;
    $transaksi->Qty = $qty;
    $transaksi->total = $product->harga * $qty;
    $transaksi->save();

    return redirect()->route('transaksi.index');
}


public function edit($id)
    {
        
        $query = DB::table('products')->where('id', $id)->first();
        $data = [
            'product' => $query
        ];
        return view('product.edit', $data);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg|max:5000',
            'nama' => 'required',
            'status' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        $photo = $request->file('photo');
        $filename = date('y-m-d').$photo->getClientOriginalName();
        $path = 'photo-product/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        
        $data['nama'] = $request->nama;
        $data['status'] = $request->status;
        $data['stok'] = $request->stok;
        $data['harga'] = $request->harga;
        $data['image'] = $filename;
        
        Product::create($data);        
        
        return redirect()->to('/product')->with('Success', 'Data Berhasil di Tambahkan');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:5000',
            'nama' => 'required',
            'status' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);
    
        $product = Product::findOrFail($id);
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = date('y-m-d') . $photo->getClientOriginalName();
            $path = 'photo-product/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($photo));
            $product->image = $filename;
        }
    
        $product->nama = $request->nama;
        $product->status = $request->status;
        $product->stok = $request->stok;
        $product->harga = $request->harga;
        $product->save();
    
        return redirect()->route('product.index')->with('Success', 'Data berhasil diperbarui');
    }
    

    public function delete($id)
    {
        // ini query untuk mencari 1 data
        $product = Product::find($id);
        // ini query ini untuk menghapus data
        $product->delete();
        // ini cara supaya dikembalikan
        // ke tujuan link tertentu
        // dimana disini '/' adalah halaman awal
        return redirect()->to('/product')->with('Success', 'Data Berhasil dihapus');
    }

    public function search(Request $request)
{
    $search = $request->input('search');

    $products = Product::where('nama', 'like', '%'.$search.'%')->get();

    $data = [
        "products" => $products
    ];

    return view('product.index', $data);
}

}
