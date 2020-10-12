<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    //
    public function recCookie()
    {
        return response()
            ->view('view.comp')
            ->cookie('app_title', 'laravel', 60 * 24 * 30);
    }
    public function readCookie(Request $req)
    {
        return view('state.readCookie', ['app_title' => $req->cookie('app_title')]);
    }
    public function session1(Request $req)
    {
        $req->session()->put('series', '速習シリーズ');
        return 'セッションを保存しました';
    }
    public function session2(Request $req)
    {
        $series = $req->session()->get('series', '未定');
        return 'シリーズ:' . $series;
    }
}
