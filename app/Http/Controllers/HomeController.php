<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

use App\Models\Vote;

use App\Models\Slide;

use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $m = Movie::with('votes')->get();
        foreach ($m as $key => $data) {
            $m[$key]['point'] = $data->votes->avg('point');
        }        
        $best = $m->sortByDesc('point')->take(config('const.best_movie'));
        $new = Movie::where('status', config('const.showing_movie_status'))
            ->with('votes')
            ->orderBy('day_start', 'DESC')
            ->take(config('const.new_movie'))
            ->get();
        $slides = Slide::where('status', config('const.showing_movie_status'))->get();

        return view('frontend.homepages.home', compact('best', 'new', 'slides'));
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
