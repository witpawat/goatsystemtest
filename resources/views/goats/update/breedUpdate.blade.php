
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

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
    <main>
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

<form action="{{ route('goats.breedUpdate', $goat->goatId) }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">

        <h4>ข้อมูลการผสมพันธุ์</h4>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-2">
                    <strong>แม่พันธุ์เเพะ :</strong>
                        @if($goat->sex == 'เพศเมีย')
                            <input type="text" name="goat_id" value="{{ $goat->goatId }}" class="form-control" placeholder="แม่พันธุ์เเพะ" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')">
                        @else($goat->sex == 'เพศผู้')
                            <select class="form-control" id="goat_id" name="goat_id" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')">
                                <option value="">--เลือก--</option>
                                @foreach($goatF AS $goatF)
                                <option value="{{ $goatF->goatId }}">{{ $goatF->goatName }} / {{ $goatF->goatId }}</option>
                                @endforeach
                            </select>
                        @endif    
                        @error('goat_id')
                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ผสมพันธุ์ครั้งที่ :</strong>
                <input type="number" name="breedNo" class="form-control" placeholder="ผสมพันธุ์ครั้งที่" min="1" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')">
               @error('breedNo')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>วัน/เดือน/ปีที่ผสม :</strong>
                    <input type="date" name="dateOfBreed" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')">
                    @error('dateOfBreed')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>พ่อพันธุ์เเพะ:</strong>
                @if($goat->sex == 'เพศผู้')
                    <input type="text" name="father_breeder" value="{{ $goat->goatId }}" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')">
                @else
                    <select class="form-control" id="father_breeder" name="father_breeder" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')">
                        <option value="">--เลือก--</option>
                        @foreach($goatM AS $goatM)
                        <option value="{{ $goatM->goatId }}">{{ $goatM->goatName }} / {{ $goatM->goatId }}</option>
                        @endforeach
                    </select>
                @endif
                        @error('father_breeder')
                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เจ้าหน้าที่ :</strong>
                <input type="text" name="breed_staff" class="form-control" placeholder="กรอกชื่อเจ้าหน้าที่" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" oninput="this.setCustomValidity('')">
               @error('breed_staff')
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
</html>@endsection
