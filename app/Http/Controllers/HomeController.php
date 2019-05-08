<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $totalPrintedOwnerCards = DB::select('SELECT count(`print_count`) as total FROM owners WHERE `print_status` = 1');
        $owners['totalPrintedOwnerCards'] = $totalPrintedOwnerCards[0]->total;
        $owners['totalOwner'] = Owner::all()->count();
        $owners['newPrintAble'] = Owner::whereNotNull('image')->where('print_status', '0')->where('renew_status', '0')->count();
        $owners['reNewAble'] = Owner::whereNotNull('image')->where('print_status', '1')->where('renew_status', '1')->count();



        return view('home',compact('owners'));
    }
}
