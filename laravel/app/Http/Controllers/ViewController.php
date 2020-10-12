<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function comp()
    {
        return view(
            'view.comp'
        );
    }
    public function outCsv()
    {
        return response()
            ->streamDownload(function () {
                print("1,2019/10/1,123\n" .
                    "2,2019/10/2,116\n" .
                    "3,2019/10/3,98\n");
            }, 'download.csv', ['content-type' => 'text/csv']);
    }
    public function redirectBasic()
    {
        return redirect('hello/list');
    }
    public function index(Request $req)
    {
        return 'リクエストパス:' . $req->path();
    }
    public function form()
    {
        return view('ctrl.form', ['result' => '']);
    }
}
