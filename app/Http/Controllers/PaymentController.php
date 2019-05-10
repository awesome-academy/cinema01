<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Seat_col;

use App\Models\Seat_row;

use App\Models\Showtime;

use Session;

use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/';
    public function __construct()
    {
        Session::put('backUrl', URL::previous());
    }
    public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
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
        if (Session::get('checkPayment')) {
            $id = $request->showtimeId;
            $seat = explode(',', $request->seatId[0]);
            $seatId = $request->seatId[0];
            $totalMoney = $this->getAllSeatPrice($seat);
            
            return view('frontend.booking.payment', compact('id', 'seat', 'seatId' , 'totalMoney'));
        } else {
            return redirect($this->redirectTo());
        }
    }

    private function getAllSeatPrice($arrId)
    {
        $tong = 0;
        foreach ($arrId as $seatId) {
            $roomTypeId = Seat_col::findOrFail($seatId)->seatRow->room->room_type_id;
            $seatFilter = function ($query) use ($roomTypeId) {
                $query->where('room_type_id', $roomTypeId);
            };
            $seat = Seat_col::whereId($seatId)
                ->with(['seatRow.seatType.seatPrices' => $seatFilter])
                ->whereHas('seatRow.seatType.seatPrices', $seatFilter)
                ->first();
            $tong += $seat->seatRow->seatType->seatPrices[0]->price;
        }

        return $tong;
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
