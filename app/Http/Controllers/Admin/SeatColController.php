<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Seat_row;

use App\Models\Seat_col;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests\SeatColRequest;

class SeatColController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
    public function store(SeatColRequest $request)
    {
        $sl = $request->seat_quantity;
        $seat = Seat_row::findOrFail($request->seat_row_id);
        $dem = $seat->seatCols->count('seatCols')+1;
        for ($i = $dem; $i < $dem+  $sl; $i++) { 
           Seat_col::create(
            [
                'seat_row_id' => $seat->id,
                'seat_name' => $seat->row_name.$i,
                'status' => '0',
            ]);
        };
    
        return response()->json(['success' => __('label.seatSave')]);
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
        $data = Seat_col::findOrFail($id);
        if ($data->status == 0)
        {
            $data->status = __('label.emptySeat');
        } elseif ($data->status == 1)
        {
            $data->status = __('label.seatSold');
        } elseif ($data->status == 2)
        {
            $data->status = __('label.cantChoose');
        }

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
        Seat_col::findOrFail($id)->delete();
        
        return response()->json(['success' => __('label.seatDel')]);
    }
}
