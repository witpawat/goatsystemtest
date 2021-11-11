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
<div class="container">
    <div class="row">
        <h4>แก้ไขโปรไฟล์</h4>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">ข้อมูลพื้นฐาน</a></li>
                    <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">เปลี่ยนรหัสผ่าน</a></li>
                  </ul>
                </div>
                <div class="card-body">
                <div class="tab-content">
                <div class="active tab-pane" id="personal_info">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/edit-profile') }}" id="InfoForm">
                          {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">ชื่อ</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fname" value="{{ $errors->has('fname') ? '' : $user->fname }}" >

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">นามสกุล</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lname" value="{{ $errors->has('lname') ? '' : $user->lname }}" >

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group">
                            <label class="col-md-4 control-label">อีเมล</label>
                             <div class="col-md-6">
                                <input type="email" disabled class="form-control" name="email" value="{{ $user->email }}" >                              
                            </div>
                           </div>

                        
                        <div class="form-group{{ $errors->has('farmName') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">ชื่อฟาร์ม</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="farmName" value="{{ $errors->has('farmName') ? '' : $user->farmName }}" >

                                @if ($errors->has('farmName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('farmName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>ยืนยัน
                                </button>
                            </div>
                        </div>

                    </form>
                    </div>

                    <div class="tab-pane" id="change_password">
                    
                    <form class="form-horizontal" method="POST" action="{{ route('change.password') }}" id="changePasswordForm">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
  
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">รหัสผ่านปัจจุบัน</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">รหัสผ่านใหม่</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group">
                            <label for="password" class="col-md-6 control-label">ยืนยันรหัสผ่านใหม่</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ยืนยัน
                                </button>
                            </div>
                        </div>
                    </form>                   
                        
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
</div>


</body>
</html>
@endsection