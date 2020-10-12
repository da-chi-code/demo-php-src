<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SaveController extends Controller
{
    //
    public function create()
    {
        return view('save.create');
    }
    public function store(Request $req)
    {
        $this->validate($req, Book::$rules);
        $b = new Book();
        $b->fill($req->except('_token'))->save();
        return redirect('save.create');
    }
    public function edit($id)
    {
        return view('save.edit', ['b' => Book::findOrFail($id)]);
    }
    public function update(Request $req, $id)
    {
        $b = Book::find($id);
        $b->fill($req->except('_token', '_method'))->save();
        return redirect('hello/list');
    }
    public function show($id)
    {
        return view('save.show', ['b' => Book::findOrFail($id)]);
    }
    public function destroy($id)
    {
        $b = Book::findOrFail($id);
        $b->delete();
        return redirect('hello/list');
    }
}
