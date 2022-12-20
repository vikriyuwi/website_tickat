<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    body {
        background-color: black;
    }

    th {
        border: 1px solid black;
        font-weight: bold;
        background-color: red;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }
    h1 {
        text-align: center;
        font-weight: bold;
        color : red;
    }
</style>

<body>
    <br/>
    <h1>Daftar Mahasiswa</h1>
    <br/>
    <table class="table table-dark table-striped"> 
        <tr>
            {{-- TH berfungsi sebagai colom --}}
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal lahir</th>
            <th>Gelar</th>
            <th>Nip</th>
        </tr>
            {{-- TD berfungsi sebagai isi data --}}
            @foreach ($datas as $orang)
            <tr>
                <td>{{$orang->id}}</td>
                <td>{{$orang->nama}}</td>
                <td>{{$orang->tanggal_lahir}}</td>
                <td>{{$orang->gelar}}</td>
                <td>{{$orang->nip}}</td>
            </tr>
            @endforeach
    </table>
    <br/>
    <a class="btn btn-info" href="{{ url ('create') }}">Tambah</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>
