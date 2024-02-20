<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Pin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PinController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $pin = Pin::with('album')->get();
        return view('album.create-pin', ['pin' => $pin]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create-pin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'path' => 'required|mimes:jpeg,jpg,bmp,png',
            'judulfoto' => 'required',
            'deskripsifoto' => 'required',
            'albums_id' => 'required|exists:albums,id',
        ]);
    
        $image = $request->file('path');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images'))
            {
                mkdir('images',0777,true);
            }
            $image->move('images',$imagename);
           
            $pin = DB::table('pins')->insert([
            'judulfoto' => $request->judulfoto,
            'deskripsifoto' => $request->deskripsifoto,
            'path' => $imagename,
            'likes_count' => 0,
            'albums_id' => $request->albums_id,
            'users_id' => \Auth::user()->id,
        ]);

            
        }else{
            $imagename = "default.png";
         }
         

         return redirect()->route('album.index')->with('success', 'Foto Data has been updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pin = Pin::find($id);
        return view('post.show-pin', ['pin' => $pin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
