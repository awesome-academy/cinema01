<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Cinema;

use App\Http\Requests\CinemaRequest;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Validator;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cinema::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editCinema">' . __('label.edit') . '</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteCinema">' . __('label.delete') . '</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.cinema.cinema');
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
    public function store(CinemaRequest $request)
    {
        Cinema::updateOrCreate(
        [
            'id' => $request->cinema_id,
        ],
        [
            'name' => $request->name,
            'address' => $request->address,
            'note' => $request->note,
        ]);

        return response()->json(['success' => __('label.cinemaSave')]);
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
        $cinema = Cinema::findOrFail($id);

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
        Cinema::findOrFail($id)->delete();

        return response()->json(['success' => __('label.cinemaDel')]);
    }
}
