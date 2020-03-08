<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class promptMessage extends Controller
{
    public function show($code){
        $message = DB::table('messages')->where('code', $code)->first();

        if ($message->open === 0){
            DB::table('messages')
                ->where('code', $code)
                ->update(['open' => 1]);
            return view('index', ['code' => 'message', 'message' => $message->message ]);
        }else{
            return view('index', ['code' => 'forbidden']);
        }

    }
}
