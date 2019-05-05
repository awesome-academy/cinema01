<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Seat_row;

use App\Models\Seat_col;

use App\Models\Room;

use App\Models\Seat_type;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests\SeatRequest;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Seat_row::with('seatType')->with('room')->with('seatCols')->latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('seat_cols', function($row) {
                    $btn ='';
                    foreach ($row->seatCols as $key) {
                        $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $key->id . '" class="btn btn-outline-info btn-sm editSeatCol">'.$key->seat_name.'</a>';
                    }
                    
                    return $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-row_name="' . $row->row_name . '" class="btn btn-outline-info btn-sm addSeatCol">+</a>';
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editSeatRow">' . __('label.edit') . '</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteSeatRow">' . __('label.delete') . '</a>';
                    
                    return $btn;
                })  
                ->rawColumns(['seat_cols', 'action'])
                ->make(true);
        }
        $room = Room::all();
        $seat_type = Seat_type::all();

        return view('admin.cinema.seat', compact('seat_type', 'room'));
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
    public function store(SeatRequest $request)
    {
        Seat_row::updateOrCreate(
        [
            'id' => $request->id,
        ],
        [
            'room_id' => $request->room_id,
            'seat_type_id' => $request->seat_type_id,
            'row_name' => $request->row_name,
        ]);
    
        return response()->json(['success' => __('label.seatRowSave')]);
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
        $data = Seat_row::findOrFail($id);

        return response()->json($data);
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
        Seat_row::findOrFail($id)->delete();
        
        return response()->json(['success' => __('label.seatTypeDel')]);
    }
    public function addSeatCols(Request $request)
    {
        //
    }
}
