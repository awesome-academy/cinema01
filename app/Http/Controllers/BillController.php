<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Seat_col;

use App\Models\Seat_row;

use App\Models\Showtime;

use App\Models\Bill;

use App\Models\Ticket;

use Auth;

use Session;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $arrSeat = [];
            $seatId = explode(',', $request->arrId[0]);
            foreach ($seatId as $seat) {
                $arrSeat[$seat] = Seat_col::findOrFail($seat);
            };
            $showtime = Showtime::findOrFail($request->showtimeId);
            $totalMoney = $request->totalMoney;
            Bill::create([
                'total' => $totalMoney,
                'user_id' => Auth::id(),
                ]);
            $billId = Bill::orderBy('created_at', 'desc')->firstOrFail();
            $code = str_random(8);
            foreach ($arrSeat as $seat) {
                Ticket::create([
                    'bill_id' => $billId->id,
                    'seat_col_id' => $seat->id,
                    'showtime_id' => $showtime->id,
                    'code' => $code . $seat->id,
                    ]);
            };
            session()->forget('checkPayment');

            return view('frontend.booking.ticket', compact('showtime', 'totalMoney', 'arrSeat', 'code'));
        } else {
            return redirect()->route('home');
        }
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
