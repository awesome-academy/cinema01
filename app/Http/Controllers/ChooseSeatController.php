<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Seat_col;

use App\Models\Seat_row;

use App\Models\Showtime;

class ChooseSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function takeSeat($id)
    {
        $seatFilter = function ($query) use ($id) {
            $query->where('id', $id);
        };

        return Seat_Row::with(['seatCols', 'room.showtimes' => $seatFilter])
            ->whereHas('room.showtimes', $seatFilter)
            ->get();
    }
    public function index()
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
    public function store(Request $request)
    {
        $id = $request->showtime_id;
        $seatRow = $this->takeSeat($id);
        // $seatCol = $this->takeSeat($id);
        $seatCount = $this->takeSeat($id);
        $max = 0;
        foreach ($seatCount as $seat)
        {
            if ($seat->seatCols->count() > $max) {
                $max = $seat->seatCols->count();
            }
        }
        $seatCol = $this->getSeatPrice($id);

        return view('frontend.booking.choose-seat', compact('seatRow', 'seatCol', 'max'));
    }
    private function getSeatPrice($id)
    {
        $roomTypeId = Showtime::findOrFail($id)->room->roomType->id;
        $roomId = Showtime::findOrFail($id)->room->id;
        $seatFilter = function ($query) use ($roomTypeId) {
            $query->where('room_type_id', $roomTypeId);
        };
        $seat = Seat_Row::with('seatCols')
            ->with(['seatType.seatPrices' => $seatFilter])
            ->whereHas('seatType.seatPrices', $seatFilter)
            ->get();

        return $seat;
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
