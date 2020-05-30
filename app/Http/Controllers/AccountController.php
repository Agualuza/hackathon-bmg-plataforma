<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Transaction;


class AccountController extends Controller
{
    public function index() {
        $user = Auth::user();
        $transactions = Transaction::getAllUserTransactions($user->id);
        $tp = ["E" => "Depósito em conta","C" => "Crédito", "D" => "Débito"];
        $data = ["transactions" => $transactions, "tp" => $tp];
        $data["user"] = $user;
        return view("account.index",$data);
    }
}
