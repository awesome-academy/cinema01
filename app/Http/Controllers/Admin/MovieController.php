<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Movie;

use App\Http\Requests\MovieRequest;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	// $data = Movie::latest()->get();
    	// dd($data);
        if ($request->ajax()) {
            $data = Movie::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editMovie">' . __('label.edit') . '</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteMovie">' . __('label.delete') . '</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.cinema.movie');
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
    public function store(MovieRequest $request)
    {
        Movie::updateOrCreate(
        [
            'id' => $request->movie_id,
        ],
        [
            'name' => $request->name,
            'time' => $request->duration,
            'country' => $request->country,
            'directors' => $request->director,
            'type' => $request->type,
            'producer' => $request->producer,
            'cast' => $request->actor,
            'day_start' => $request->day_start,
            'content' => $request->content,
            'status' => $request->status,
            'image' => '',
            'trailer' => '',
        ]);

        return response()->json(['success' => __('label.movieSave')]);
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
        $cinema = Movie::findOrFail($id);

        return response()->json($cinema);
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
        Movie::findOrFail($id)->delete();

        return response()->json(['success' => __('label.movieDel')]);
    }
}
