<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        $data = [
            "transaksis" => $transaksis
        ];
        return view('transaksi.index', $data);
    }
    public function deleteData($id)
    {
        // ini query untuk mencari 1 data
        $transaksi = Transaksi::find($id);
        // ini query ini untuk menghapus data
        $transaksi->delete();
        // ini cara supaya dikembalikan
        // ke tujuan link tertentu
        // dimana disini '/' adalah halaman awal
        return redirect()->to('/transaksi')->with('Success', 'Data Berhasil dihapus');
    }
    
    public function detail($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $products = Product::all();
        return view('transaksi.detail', compact('transaksi', 'products'));
    }
    
    public function search(Request $request)
{
    $search = $request->input('search');

    $transaksis = Transaksi::where('notransaksi', 'like', '%'.$search.'%')->get();

    $data = [
        "transaksis" => $transaksis
    ];

    return view('transaksi.index', $data);
}

}


