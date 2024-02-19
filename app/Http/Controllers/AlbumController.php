<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pins = DB::table('pins')->get();

        return view('album.index')->with('pins',$pins);
    }


    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_album' => 'required|max:10',
            'deskripsi' => 'required|max:10',
        ]);

        $albums = DB::table('albums')->insert([
        'nama_album' => $request->nama_album,
        'deskripsi' => $request->deskripsi,
        'users_id' => \Auth::user()->id,
        ]);

        return redirect()->route('album.index')->with('message', 'Album Added');

    }

    public function show(Request $request)
    {
        $pins = $albums->pins()->paginate(10);

        return view('album.show', compact('albums', 'pins'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
	 * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $albums = Album::find($id);
        return view('albums.edit', compact('albums'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'nama_album' => 'required',
            'deskripsi' => 'required',
        ]);

        Album::find($id)->update($validatedData);

        // $albums->nama_album = $validatedData['nama_album'];
        // $albums->deskripsi = $validatedData['deskripsi'];
        // Update other fields as needed

        return redirect()->route('albums.album-management');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(string $id)
    {
        $albums = Album::find($id);
        $albums->delete();

        return redirect()->route('albums.album-management')->with('success', 'Album berhasi dihapus!');
    }

}
