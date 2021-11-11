
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="js/bootstrap.js"></script>
        <script src="path/to/dist/feather.js"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>
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
     <style>
            .col{
                margin-top: 50px;
            }
            .dropdown-menu {
                margin: 0px;
                padding: 0;
            }
            .row {
                border: 10px solid #80C2B6;
                margin: auto;
                max-width: 900px;
                border-radius: 10px;
                border-top-width: 50px;
                padding: 12px;
            }
            .grid {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                column-gap: 15px;
                row-gap: 5px;
            }
            h4 {
                text-align: center;
            }
            .submit {
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div class="container mt-2">
    <div class="col">
    <div class="row">
    <div class="col-md-auto"></div>
        <div class="col-md-auto">
            <h4>{{ $goat->goatId }}</h4>
            <div class="grid">
                            
                <form class="form-horizontal" action="{{ route('qrcode.download', $goat->goatId, ['type' => 'jpg'])}}" method="post">
                    @csrf
                    <input type='hidden' value="jpg" name="qr_type" />
                    <input type='hidden' value="{{ 'jpg' }}" name="section" />                    
                    
                        {!! QrCode::size(250)->errorCorrection('H')->generate( route('goats.updateHome',$goat->goatId)); !!}
                    
                    <br>
                    <div class="submit">
                    <button type="submit" class="align-middle btn btn-outline-primary btn-sm ml-1">
                        <i class="fas fa-fw fa-download"></i>
                        ดาวน์โหลด
                    </button>
                    <a class="btn "style="background-color: #80C2B6;" href="{{ route('goats.index') }}" enctype="multipart/form-data">
                        ไปยังหน้าทะเบียนเเพะ</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>