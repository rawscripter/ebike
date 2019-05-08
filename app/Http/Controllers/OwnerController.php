<?php

namespace App\Http\Controllers;


use App\Owner;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $photos_path;


    public function __construct()
    {
        $this->middleware('auth');
        $this->photos_path = public_path('/images/owner');
    }

    public function index()
    {
        $owners = Owner::orderBy('id', 'desc')->paginate(10);
        return view('owner.index', compact('owners'));
    }

    // searching data
    public function search(Request $request)
    {
//       for english version
        $en_query = $request->search;

//       for bangla version
        $bn_query = en2bn($en_query);

        if (empty($bn_query)) {
            $owners = Owner::orderBy('id', 'desc')->paginate(10);
        } else {
            $owners = Owner::where('name', 'LIKE', "%$bn_query%")
                ->orWhere('vehicle_no', 'LIKE', "%$bn_query%")
                ->orWhere('vehicle_no', 'LIKE', "%$en_query%")
                ->orWhere('phone_number', 'LIKE', "%$bn_query%")
                ->orWhere('phone_number', 'LIKE', "%$en_query%")
                ->orderBy('id', 'desc')
                ->orderBy('id')->paginate(10);;
        }

        return view('owner.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'vehicle_no' => 'required|unique:owners',
            'religion' => 'required',
            'permanent_address' => 'required',
            'nationality' => 'required',
            'blood_group' => 'required',
            'father_name' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                $response = response()->json(array(
                    'success' => false,
                    'message' => 'There are incorect values in the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 200);

            }
        } else {

            $input = $request->all();
            $input['validity_date'] = '2019-12-31';
            $input['user_id'] = Auth::user()->id;
            $input['vehicle_type'] = 'ইজিবাইক';


            $owner = Owner::create($input);
            $response = response()->json(array(
                'success' => true,
                'message' => 'Owner Successfully Added',
                'id' => $input,
            ), 200);
        }


        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $owner = Owner::findOrFail($id);
        return view('owner.edit', compact('owner'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'vehicle_no' => 'required|unique:owners,vehicle_no,' . $id,
            'religion' => 'required',
            'permanent_address' => 'required',
            'nationality' => 'required',
            'father_name' => 'required',
        ]);

        $owner = Owner::findOrFail($id);


        if ($validator->fails()) {
            if ($request->ajax()) {
                $response = response()->json(array(
                    'success' => false,
                    'message' => 'There are incorect values in the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 200);

            };
        } else {

            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            $owner = $owner->update($input);
            $response = response()->json(array(
                'success' => true,
                'message' => 'Owner information updated',
                'id' => $input,
            ), 200);
        }


        return $response;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $owner = Owner::findOrFail($id)->delete();

        if ($owner) {
            $response['response'] = true;
        } else {
            $response['response'] = false;
        }

        return $response;

    }


    public function image(Request $request, $id)
    {
        $photo = $request->file('file');


        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = 'owner_' . $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

        Image::make($photo)
            ->resize(400, null, function ($constraints) {
                $constraints->aspectRatio();
            })
            ->save($this->photos_path . '/' . $resize_name);

        $owner = Owner::findOrFail($request->id);
        $owner->image = $resize_name;
        $owner->save();

        return redirect()->back();

    }

}
