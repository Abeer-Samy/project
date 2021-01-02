<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use DB;
use Session;
use App\Reservations;
use App\Category;
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
        $reservation = new Reservations();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phoneNumber = $request->phoneNumber;
        $reservation->numOfPerson = $request->numOfPerson;
        $reservation->menu_id = $request->menu_id;
        $reservation->tableRes = $request->tableRes;


        $fileImage = $request->file('fileImage');
        $fileName = time().'.'.$fileImage->extension();
        $fileImage->move('file_image',$fileName);
        $reservation->feature_image = $fileName;
        $reservation->save();

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
    public function edit(Reservations $reservation)
    {
        $menus = Menu::all();
        return view("dashboard.reservations.edite",compact('reservation','menus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request , Reservations $reservation)
    {
  dd($request)->toArray;

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phoneNumber = $request->phoneNumber;
        $reservation->numOfPerson = $request->numOfPerson;
        $reservation->tableRes = $request->tableRes;
        $reservation->menu_id = $request->menu_id;
        $reservation->save();


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
