<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use DB;
use Session;
use App\Reservations;
use App\Http\Requests\ReservationRequest;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Reservations::paginate(10);
        return view('dashboard.reservations.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('dashboard.reservations.create ', compact('menus'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $requestData=$request->all();
        $request=$request->all();
        Reservations::Create($request);
        Session::flash("msg","s:Reservation Created Successfully");
        return redirect(route("dashboard.reservations.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Reservations::find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("dashboard.reservations.index"));
        }
        return view("dashboard.reservations.show" )->withItem($item) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $item = Reservations::find($id);
        if(!$item){

            \Session::flash("msg","e:Invalid Item ID");

            return redirect(route("reservation.index"));
        }
        $menus = Menu::all();
        return view("dashboard.reservations.edite",compact('item','menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request , $id)
    {
        $itemDB = Reservations::find($id);
        $requestData = $request->all();
        $itemDB->update($requestData);

        session()->flash("msg","s:Student Updated Successfully");
   return redirect(route("dashboard.reservations.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservations $reservation)
    {
        $reservation->delete();
        session()->flash("msg","Reservation Deleted Successfully");
        return redirect(route("dashboard.reservations.index"));
    }
}
