<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\CommissionDetail;
use App\Models\Project;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use App\Models\TransactionLog;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(){
        //dd();
        $data = [
        ];
        return view('dashboard', $data);
    }
}
