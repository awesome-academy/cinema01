<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Seat_price;

use App\Models\Room_type;

use App\Models\Seat_type;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests\SeatPriceRequest;

class SeatPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Seat_price::with('seatType')->with('roomType')->latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editSeatPrice">' . __('label.edit') . '</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteSeatPrice">' . __('label.delete') . '</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $room_type = Room_type::all();
        $seat_type = Seat_type::all();

        return view('admin.cinema.seat_price', compact('seat_type', 'room_type'));
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
    public function store(SeatPriceRequest $request)
    {
        Seat_price::updateOrCreate(
        [
            'id' => $request->seat_price_id,
        ],
        [
            'room_type_id' => $request->room_type_id,
            'seat_type_id' => $request->seat_type_id,
            'price' => $request->price,
        ]);
    
        return response()->json(['success' => __('label.seatPriceSave')]);
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
        $data = Seat_price::findOrFail($id);

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
        Seat_price::findOrFail($id)->delete();
        
        return response()->json(['success' => __('label.seatTypeDel')]);
    }
}
