<?php



use App\Models\AccountHead;
use App\Models\Client;
use App\Models\Cart;
use App\Models\ReceiptPaymentDetail;
use App\Models\TransactionLog;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


if (!function_exists('totalCartItem')) {
    function totalCartItem(){
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $totalCartItem = Cart::where('user_id', $user_id)->sum('quantity');
        } else {
            $session_id = Session::get('session_id');
            $totalCartItem = Cart::where('session_id', $session_id)->sum('quantity');
        }
        return $totalCartItem;
    }
}
if (!function_exists('totalCartItems')) {
    function totalCartItems(){
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $totalCartItems = Cart::where('user_id', $user_id)->get();
        } else {
            $session_id = Session::get('session_id');
            $totalCartItems = Cart::where('session_id', $session_id)->get();
        }
        return $totalCartItems;
    }
}
if (!function_exists('financialYear')) {
    function financialYear($year)
    {

        $start = $year;
        $end = ($year + 1);
        return $financialYear = $start . '-' . $end;
    }
}

if (!function_exists('financialYearToYear')) {
    function financialYearToYear($financialYear)
    {

        $financialYear = explode("-", $financialYear);

        if ($financialYear)
            return $financialYear[0];

        return null;
    }
}
