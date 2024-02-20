<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LikeController extends Controller
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
    public function like($id)
    {

        $check = DB::table('likes')
        ->where('users_id', \Auth::user()->id)
        ->where('pins_id', $id)
        ->count();

        if ($check ==1) 
        {
        $like = DB::table('pins')
        ->where('id','=',$id)
        ->sum('likes_count');

        $sub = $like - 1;

        DB::table('pins')
        ->where('id', $id)
        ->update(['likes_count' => $sub]);

        DB::table('likes')
        ->where('users_id', \Auth::user()->id)
        ->where('pins_id', $id)
        ->delete();   

        return redirect()->back()->with('message', 'You UnLiked This Post');
        } 
        elseif($check ==0)
         {
         $like = DB::table('pins')
        ->where('id','=',$id)
        ->sum('likes_count');

        $sum = $like + 1;

        DB::table('pins')
        ->where('id', $id)
        ->update(['likes_count' => $sum]);

        $test = DB::table('likes')->insert([
        'pins_id' => $id,
        'users_id' => \Auth::user()->id,
        ]);
              
        return redirect()->back()->with('message', 'You Liked This Post');
        }
        

        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
