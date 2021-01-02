<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $reservations=Reservation::all();
        $reservations=Reservation::select('id','name','numOfPerson')->where('numOfPerson','<',30)->get();
        $count = count($reservations);
        return response([
            'status'=>'success',
            'count'=>$count,
            'data'=>$reservations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|max:50',
            'email'=>'required|email',
            'phoneNumber'=>'required|max:50',
            'numOfPerson'=>'required|max:50',
            'tableRes'=>'required|integer',
            'menu_id'=>'required|integer',

        ];


        $messages = [
            'name.required' => 'The Reservatin name field should be entered',
            'name.max' => 'Name should not be more than 50 character',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response([
                'status'=>'error',
                'errors'=>$validator->errors()
            ]);
        }
        $reservations= Reservation::create([
            'name'=>$request->'name',
             'email'=>$request->'email',
            'phoneNumber'=>$request->'phoneNumber',
            'numOfPerson'=>$request->'numOfPerson',
            'tableRes'=>$request->'tableRes',
            'menu_id'=>$request->'menu_id',

        ]);
         return response([
             'status'=>'Reservations created successfuly',
             'reservation'=>$reservations
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return response([
            'status'=>'success',
            'data'=>$reservation
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $rules = [
            'name'=>'required|max:50',
            'email'=>'required|email',
            'phoneNumber'=>'required|max:50',
            'numOfPerson'=>'required|max:50',
            'tableRes'=>'required|integer',
            'menu_id'=>'required|integer',

        ];


        $messages = [
            'name.required' => 'The Reservatin name field should be entered',
            'name.max' => 'Name should not be more than 50 character',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response([
                'status'=>'error',
                'errors'=>$validator->errors()
            ]);
        }

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phoneNumber = $request->phoneNumber;
        $reservation->numOfPerson = $request->numOfPerson;
        $reservation->phoneNumber = $request->phoneNumber;
        $reservation->menu_id = $request->menu_id;
        $reservation->tableRes = $request->tableRes;
        $reservation->save();
        ]);
         return response([
             'status'=>'Reservations updated successfuly',
             'reservation'=>$reservations
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response([
            'status'=>'Reservations Deleted successfuly',
            'reservation'=>$reservations
        ]);
    }
}
