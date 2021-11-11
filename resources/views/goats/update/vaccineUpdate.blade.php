@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

    <style>
        .dropdown-menu {
            margin: 0px;
            padding: 0;
        }
        .row {
            border: 10px solid #80C2B6;
            margin: auto;
            margin-top: auto;
            max-width: 700px;
            border-radius: 10px;
            border-top-width: 60px;
            border-bottom-width: 10px;
            padding: 10px;
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

            <div class="results">
                @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif
            </div>

<form action="{{ route('goats.vaccineUpdate', $goat->goatId) }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
         <h4>ข้อมูลการฉีดวัคซีน</h4>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>รหัสประจำตัวเเพะ :</strong>
                    <input type="text" name="goat_id" value="{{ $goat->goatId }}" class="form-control" placeholder="รหัสประจำตัวเเพะ" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')" >
                    @error('goat_id')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชนิดวัคซีน :</strong>
                <select id="typeOfVaccine" name="typeOfVaccine"class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')" >
                    <option value="">--เลือกชนิดวัคซีน--</option>
                        @foreach($vac AS $vaccine)
                            <option value="{{ $vaccine->vaccine_name }}">{{ $vaccine->vaccine_name }}</option>
                        @endforeach
                </select>
               @error('typeOfVaccine')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>วัน/เดือน/ปี (พ.ศ.) :</strong>
                    <input type="date" name="dateOfVaccine" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')" >
                    @error('dateOfVaccine')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ผู้ฉีด :</strong>
                <input type="text" name="vaccine_staff" class="form-control" placeholder="กรอกชื่อผู้ฉีด" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')" >
               @error('vaccine_staff')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="submit">
            <button type="submit" class="btn " style="background-color: #80C2B6;">ยืนยัน</button>
            <a href="{{ route('goats.updateHome',$goat->goatId) }}" class="btn btn-secondary " role="button" aria-disabled="true">ย้อนกลับ</a>
        </div>
    </div>

</form>

</body>
</html>
@endsection
