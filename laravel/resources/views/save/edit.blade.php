@extends(layout.base)
@section('title','書籍編集フォーム（編集）')
@section('main')
    <form method = "POST" action="/save/{{$b->id}}">
        @csrf
        @method('PATCH')
        <div class = "pl-2">
            <label id = "isbn">ISBNコード：</label><br>
        <input id = "isbn" name ="isbn"type = "text" size = "15" value ="{{old('isbn',$b->isbn)}}">
        </div>
        <div>
            <input type = "submit"value = "更新">
        </div>
    </form>
@endsection
