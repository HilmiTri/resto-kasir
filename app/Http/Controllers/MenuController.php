<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('manager.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.menu.create');
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
            'nama_menu' => 'required',
            'harga' => 'required',
            'deksripsi' => 'required',
            'ketersediaan' => 'required',
        ]);


        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deksripsi' => $request->deksripsi,
            'ketersediaan' => $request->ketersediaan,
        ]);

        return redirect()->route('menu.index')->with('success','Berhasil Menyimpan !');
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
    public function edit(Menu $menu)
    {
        return view('manager.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'deksripsi' => 'required',
            'ketersediaan' => 'required',
        ]);
    
        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deksripsi' => $request->deksripsi,
            'ketersediaan' => $request->ketersediaan,
        ]);

        return redirect()->route('menu.index')->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $Menu)
    {
        $Menu->delete();
     
        return redirect()->route('menu.index')->with('success','Berhasil Hapus !');
    }
}