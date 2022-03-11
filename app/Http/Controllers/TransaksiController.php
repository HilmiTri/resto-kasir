<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('cashier.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('cashier.transaksi.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'id_menu' => 'required',
            'jumlah' => 'required',
        ]);

        $menu = Menu::find($request->id_menu);
        $totalHarga = $menu->harga * $request->jumlah;

        Transaksi::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nama_menu' => $menu->nama_menu,
            'jumlah' => $request->jumlah,
            'total_harga' => $totalHarga,
            'nama_pegawai' => Auth::user()->name,
        ]);

        return redirect()->route('transaksi.index')->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);

        return response()->json($menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $menus = Menu::all();

        return view('cashier.transaksi.edit', compact('transaksi', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nama_menu' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);
    
        $transaksi->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nama_menu' => $request->nama_menu,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'nama_pegawai' => Auth::user()->name,
        ]);

        return redirect()->route('transaksi.index')->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
     
        return redirect()->route('transaksi.index')->with('success','Berhasil Hapus !');
    }
}
