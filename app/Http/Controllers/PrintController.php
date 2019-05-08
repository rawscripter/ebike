<?php

namespace App\Http\Controllers;

use App\Owner;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPrintedOwnerCards = DB::select('SELECT SUM(`print_count`) as total FROM owners WHERE `print_status` = 1');
        $owners['totalPrintedOwnerCards'] = $totalPrintedOwnerCards[0]->total;
        $owners['totalOwner'] = Owner::all()->count();
        $owners['newPrintAble'] = Owner::whereNotNull('image')->where('print_status', '0')->where('renew_status', '0')->count();
        $owners['reNewAble'] = Owner::whereNotNull('image')->where('print_status', '1')->where('renew_status', '1')->count();
        return view('printer.index',compact('owners'));
    }


    //    fetch all new printable owners info for display to printer
    public function newPrintAbleOwners()
    {
        $owners = Owner::whereNotNull('image')->where('print_status', '0')->where('renew_status', '0')->orderBy('id', 'desc')->paginate(10);
        return view('printer.owner.index', compact('owners'));
    }

    //    display owner card if renew status in 1
    public function renewAbleOwners()
    {
        $owners = Owner::whereNotNull('image')->where('print_status', '1')->where('renew_status', '1')->orderBy('id', 'desc')->paginate(10);
        return view('printer.owner.index', compact('owners'));
    }

//    for print owner card
    public function printOwnerCard($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->print_status = 1;
        $owner->renew_status = 0;
        $owner->print_count = $owner->print_count + 1;
        $owner->print_date = date('Y-m-d H:s:i');
        $owner->save();


        $customPaper = [0, 0, 459.213, 731.339];
        $pdf = PDF::loadView('printer.owner.print', ['owner' => $owner])->setPaper($customPaper, 'landscape');
        $fileName = $owner->name;
        return $pdf->stream($fileName . '.pdf');
    }


}
