@extends('layouts.admin')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="js/bootstrap.js"></script>
    <script src="path/to/dist/feather.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.0/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<style>
    .header{
        padding: 10px;
        margin-top: 20px;
        text-align: center;
    }
    .profile_image {
     margin: 2em;
     }
    .profile_image img {
     border-radius: 50%;
    }
    .container{
     margin-top: auto;
    }
    .row{
        position:relative;
        right: 10px;
    }
    tr:hover {background-color: #80C2B6;}
    .h2{
        margin-top: 50px;
    }
</style>

</head>
<body>
<div class="container mt-2">
   <div class="header">
    <h2>Admin</h2>
   </div>

    <div class="col">
    <div class="row">
        

    </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <div class="container mt-2">
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>พันธุ์แพะ</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gene as $genes)
            <tr>
                <td>{{ $genes->gene_name }}</td>
                <td>
                    <form action="{{ route('admin.destroyGene',$genes->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>      

        </table>

        <table class="table table-bordered">

        <thead>
            <tr>
                <th>โรค</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disease as $disease)
            <tr>
                <td>{{ $disease->disease_name }}</td>
                <td>
                    <form action="{{ route('admin.destroyDisease',$disease->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>   

        <table class="table table-bordered">

        <thead>
            <tr>
                <th>วัคซีน</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vac as $vac)
            <tr>
                <td>{{ $vac->vaccine_name }}</td>
                <td>
                    <form action="{{ route('admin.destroyVaccine',$vac->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>      

        </table>
    
        </body>

</html>


@endsection