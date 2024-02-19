<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Foto;
use App\Models\Album;

class PostController extends Controller
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
        return view('album.create-pin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'path' => 'required|mimes:jpeg,jpg,bmp,png',
            'deskripsifoto' => 'required|max:10',
            'judulfoto' => 'required|max:10',
            'albums_id' => 'required|exists:albums,id',
        ]);

        $image = $request->file('path');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images/post'))
            {
                mkdir('images/post',0777,true);
            }
            $image->move('images/post',$imagename);
           
            $test = DB::table('fotos')->insert([
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
          return redirect()->back()->with('message', 'Post Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
