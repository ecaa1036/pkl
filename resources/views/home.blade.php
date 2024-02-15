<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>HELLO, {{Auth::user()->username}}</h1>
    {{-- <table>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        @foreach ($user as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->password}}</td>
                <td>{{$item->level}}</td>
                <td></td>
            </tr>
        @endforeach
    </table> --}}
</body>
</html>