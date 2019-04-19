<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cinema;

use Yajra\Datatables\Datatables;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function anyData()
    {
        return Datatables::of(Cinema::query())
            ->addColumn('action', function ($cinema) {
                return '<a href="' . route('cinema.edit', $cinema->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> View</a> <a href="' . route('cinema.destroy', $cinema->id) . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
