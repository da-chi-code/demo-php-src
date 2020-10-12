<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BOOK;

class RecordController extends Controller
{
    //
    protected $table = 'books';
    public function find()
    {
        return Book::find(1)->title;
    }
    public function where()
    {
        $result = Book::where('publisher', '翔泳社')->get();
        return view('hello.list', ['records' => $result]);
    }
    public function ma()
    {
        //var_dump(Book::find(1)->reviews);
        //return Book::find(1)->title;
        $result = Book::find(1);
        return view('record.hasmany', ['book' => $result]);
    }
}
