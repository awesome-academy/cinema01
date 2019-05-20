<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $bills = Bill::where('user_id', Auth::id())->latest()->get();

        return view('frontend.user.profile', compact('user', 'bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->password == $user->email)
        {
            $pass = '123456';
            $user->password = Hash::make($pass);
            $user->save();

            return response()->json(['mess' => __('label.successCreatePass', ['data' => $pass])]);
        } else
        {
            return response()->json(['mess' => __('label.error')]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = Auth::user();

        if ($request->newPass) {
            if (password_verify($request->oldPass, Auth::user()->password))
            {
                $user->password = Hash::make($request->newPass);
                $user->save();

                return response()->json(['success' => __('label.passSave')]);
            } else {
                return response()->json(['errors' => __('label.passFail')]);
            }
        }
        if ($request->name) {
            $user->name = $request->name;
        }
        if ($request->address) {
            $user->address = $request->address;
        }
        if ($request->mobile) {
            $user->mobile = $request->mobile;
        }
        $user->save();

        return response()->json(['success' => __('label.profileSave')]);
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
        $bill = Bill::whereId($id)->with('tickets.showtime.room.cinema', 'tickets.showtime.movie', 'tickets.seatCol')->first();
        $bill->total = number_format($bill->total);
        $bill->date = \Carbon\Carbon::parse($bill->tickets[0]->showtime->timestart)->format('d/m/Y');
        $bill->time = \Carbon\Carbon::parse($bill->tickets[0]->showtime->timestart)->format('H:i');

        return response()->json($bill);
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
