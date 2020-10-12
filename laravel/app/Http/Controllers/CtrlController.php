<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CtrlController extends Controller
{
    public function header()
    {
        return response()
            ->view('ctrl.header', ['msg' => 'こんにちは、世界！'], 200)
            ->header('Content-Type', 'text/xml');
    }
    /*public function result(Request $req)
    {
        $name = $req->input('name', '綾子');
        return view('ctrl.form', ['result' => 'こんにちは、' . $name . 'さん！']);
    }*/
    public function upload()
    {
        return view('ctrl.upload', ['result' => '']);
    }
    public function uploadfile(Request $req)
    {
        if (!$req->hasFile('upfile')) {
            return 'ファイルを指定してください。';
        }
        $file = $req->upfile;
        if (!$file->isValid()) {
            return 'アップロードに失敗しました。';
        }
        $name = $file->getClientOriginalName();
        $file->storeAs('files', $name);
        return view('ctrl.upload', ['result' => $name . 'アップロードしました。']);
    }
    public function middle()
    {
        return 'log is recorded!!';
    }
    public function result(Request $req)
    {
        $name = $req->name;
        if (empty($name) || mb_strlen($name) > 10) {
            return redirect('ctrl/result')
                ->withInput()
                ->with('alert', '名前は必須、または、１０文字以内で入力してください');
        } else {
            return view('ctrl.form', ['result' => 'こんにちは、' . $req->name . 'さん！']);
        }
    }
}
