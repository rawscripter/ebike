<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Driver;
use Illuminate\Support\Facades\Auth;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::orderBy('id', 'desc')->paginate(10);
        return view('driver.index',compact('drivers'));
    }



    // search
    public function search(Request $request)
 {
    $query = $request->search;

    if (empty($query)) {
       $drivers = Driver::orderBy('id', 'desc')->paginate(10);
    }else{
        $drivers = Driver::where('name', 'LIKE', "%$query%")
        ->orWhere('vehicle_no', 'LIKE', "%$query%")
        ->orWhere('phone_number', 'LIKE', "%$query%")
        ->orderBy('id', 'desc')
        ->orderBy('id')->paginate(10);;
    }

    return view('driver.index',compact('drivers'));
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'license_no' => 'required|unique:drivers',
            'religion' => 'required',
            'permanent_address' => 'required',
            'nationality' => 'required',
            'blood_group' => 'required',
            'father_name' => 'required',
        ]);

        if ($validator->fails()) {
            // if ($request->ajax()) {
                $response = response()->json(array(
                    'success' => false,
                    'message' => 'There are incorect values in the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 200);

            // }
        } else {

            $input = $request->all();
            $input['validity_date'] = '2019-12-31';
            $input['user_id'] = Auth::user()->id;
            $input['vehicle_type'] = 'ইজিবাইক';


            $driver = Driver::create($input);
            $response = response()->json(array(
                'success' => true,
                'message' => 'Driver Successfully Added',
                'id' => $input,
            ), 200);
        }


        return $response;

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
        $driver = Driver::findOrFail($id)->delete();

        if ($driver) {
            $response['response'] = true;
        }else{
            $response['response'] = false;
        }

        return  $response;

        }

}
