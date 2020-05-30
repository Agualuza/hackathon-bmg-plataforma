<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = 'transaction';

    public static function getAllUserTransactions($uid){
        $transactions = DB::table('transaction')
        ->select(DB::raw('id,transaction_type,transaction_sign,amount,note,cashback_transaction_id, note, DATE(created_at) as d'))
        ->whereRaw('transaction_status = ? AND user_id = ? AND transaction_type != ?',['D',$uid,'B'])
        ->get();

        return $transactions;
    }

    public static function getTransactionCashback($tid){
        $transactions = DB::table('transaction')
        ->select(DB::raw('amount'))
        ->whereRaw('transaction_status = ? AND cashback_transaction_id = ? AND transaction_type = ?',['D',$tid,'B'])
        ->get();

        $r = NULL;

        foreach ($transactions as $t) {
            if($t->amount){
                $r = $t->amount;
            }
        }

        return $r;
    }
    
}
