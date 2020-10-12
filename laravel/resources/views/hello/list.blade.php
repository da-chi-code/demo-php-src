<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>laravel</title>
</head>

<body>
    <table>
        <tr>
            <th>書名</th>
            <th>価格</th>
            <th>出版社</th>
            <th>刊行日</th>
        </tr>
        @foreach($records as $id => $record)
        <tr>
            <td>{{$id + 1 }}</td>
            <td>{{$record->title}}</td>
            <td>{{$record->price}}}円</td>
            <td>{{$record->publisher}}</td>
            <td>{{$record->published}}</td>
            <td>
                <a href="/save/{{$record->id}}/edit">編集</a>
                <a href="/save/{{$record->id}}/edit">削除</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
