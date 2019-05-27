<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Validator;

use App\Models\Slide;

use App\Models\Movie;

use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Slide::with('movie')->latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editSlide">' . __('label.edit') . '</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteSlide">' . __('label.delete') . '</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $movies = Movie::all();

        return view('admin.cinema.slide', compact('movies'));
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
    public function store(SlideRequest $request)
    {
        $query = [
            'status' => $request->status,
            'movie_id' => $request->movie_id,
        ];
        if ($request->hasFile('image')) {
            $file_name = $request->image->getClientOriginalName();
            $request->image->move('upload/slide_movie/', $file_name);
            $query = array_merge($query, ['image' => $file_name]);
        }
        Slide::updateOrCreate(
        [
            'id' => $request->slide_id,
        ], $query);

        return response()->json(['success' => __('label.slideSave')]);
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
        $slide = Slide::findOrFail($id);

        return response()->json($slide);
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
        Slide::findOrFail($id)->delete();
        
        return response()->json(['success' => __('label.SlideDel')]);
    }
}
