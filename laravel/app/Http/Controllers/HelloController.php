<?php

namespace App\Http\Controllers;

use App\Models\BOOK;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function list()
    {
        $data = [
            'records' => BOOK::all()
        ];
        return view('hello.list', $data);
    }
}
