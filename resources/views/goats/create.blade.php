
@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en">


        <head>

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

        <main>

            <div class="container">

                @if (session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('goats.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-auto"></div>
                        <div class="col-md-auto">
                            <h4>สร้างทะเบียนเเพะ</h4>

                            <h5>พ่อพันธุ์เเม่พันธุ์เเพะ</h5>
                            <div class="grid">
                                <div class="mb-2">
                                    <label for="fatherId">รหัสพ่อพันธุ์เเพะ</label>
                                    <input type="text" class="form-control" name="fatherId" placeholder="รหัสพ่อพันธุ์เเพะ"
                                        value="{{ old('fatherId') }}">
                                    <span class="text-danger">@error('fatherId'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="fatherGoatName">ชื่อพ่อพันธุ์เเพะ</label>
                                        <input type="text" class="form-control" name="fatherGoatName" placeholder="ชื่อพ่อพันธุ์เเพะ"
                                            value="{{ old('fatherGoatName') }}">
                                        <span
                                            class="text-danger">@error('fatherGoatName'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="fatherGene">พันธุ์</label>
                                         <select id="fatherGene" name="fatherGene" class="form-control">
                                            <option value="">--เลือก--</option>
                                                <option value="Anglonubian">พันธุ์แองโกลนูเบียน (Anglonubian)</option>
                                                <option value="Boer">พันธุ์บอร์ (Boer)</option>
                                                <option value="Saanen">พันธุ์ซาเนน (Saanen)</option>
                                                <option value="Laoshan">พันธุ์หลาวซาน (Laoshan)</option>
                                                <option value="Alpine">พันธุ์อัลไพน์ (Alpine)</option>
                                                <option value="Toggenburg">พันธุ์ทอกเก็นเบอร์ก (Toggenburg)</option>

                                                @foreach($gene AS $geneF)
                                                    <option value="{{ $geneF->gene_name }}" {{ (collect(old('fatherGene'))->contains($geneF->gene_name)) ? 'selected':'' }}>{{ $geneF->gene_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="motherId">รหัสเเม่พันธุ์เเพะ</label>
                                            <input type="text" class="form-control" name="motherId" placeholder="รหัสเเม่พันธุ์เเพะ"
                                                value="{{ old('motherId') }}">
                                            <span class="text-danger">@error('motherId'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="motherGoatName">ชื่อเเม่พันธุ์เเพะ</label>
                                                <input type="text" class="form-control" name="motherGoatName" placeholder="ชื่อเเม่พันธุ์เเพะ"
                                                    value="{{ old('motherGoatName') }}">
                                                <span
                                                    class="text-danger">@error('motherGoatName'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="motherGene">พันธุ์</label>
                                                    <br><select id="motherGene" name="motherGene" class="form-control">
                                                        <option value="">--เลือก--</option>
                                                        <option value="Anglonubian">พันธุ์แองโกลนูเบียน (Anglonubian)</option>
                                                        <option value="Boer">พันธุ์บอร์ (Boer)</option>
                                                        <option value="Saanen">พันธุ์ซาเนน (Saanen)</option>
                                                        <option value="Laoshan">พันธุ์หลาวซาน (Laoshan)</option>
                                                        <option value="Alpine">พันธุ์อัลไพน์ (Alpine)</option>
                                                        <option value="Toggenburg">พันธุ์ทอกเก็นเบอร์ก (Toggenburg)</option>

                                                    @foreach($gene AS $geneM)
                                                            <option value="{{ $geneM->gene_name }}" {{ (collect(old('motherGene'))->contains($geneM->gene_name)) ? 'selected':'' }}>{{ $geneM->gene_name }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <h5>ข้อมูลประจำตัวเเพะ</h5>
                                            <div class="grid">
                                                <div class="form-group mb-2">
                                                    <label for="goatId">รหัสประจำตัวเเพะ</label>
                                                    <input type="text" class="form-control" name="goatId" value="{{ old('goatId') }}" placeholder="รหัสประจำตัวเเพะ">
                                                    <span class="text-danger">@error('goatId'){{ $message }}@enderror</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="goatName">ชื่อเเพะ</label>
                                                        <input type="text" class="form-control" name="goatName" placeholder="ชื่อเเพะ"
                                                            value="{{ old('goatName') }}">
                                                        <span class="text-danger">@error('goatName'){{ $message }}@enderror</span>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="sex" >เพศ</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input" id="male" name="sex" value="เพศผู้" @if (old('sex') == "เพศผู้") {{ 'checked' }} @endif>
                                                                <label for="male" class="form-check-label">เพศผู้</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input" id="female" name="sex" value="เพศเมีย" @if (old('sex') == "เพศเมีย") {{ 'checked' }} @endif>
                                                                <label class="form-check-label" for="female" >เพศเมีย</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-2">
                                                            <label for="gene">พันธุ์</label>
                                                            <br><select id="gene" name="gene" class="form-control">
                                                                <option value="">--เลือก--</option>
                                                                <option value="Anglonubian">พันธุ์แองโกลนูเบียน (Anglonubian)</option>
                                                                <option value="Boer">พันธุ์บอร์ (Boer)</option>
                                                                <option value="Saanen">พันธุ์ซาเนน (Saanen)</option>
                                                                <option value="Laoshan">พันธุ์หลาวซาน (Laoshan)</option>
                                                                <option value="Alpine">พันธุ์อัลไพน์ (Alpine)</option>
                                                                <option value="Toggenburg">พันธุ์ทอกเก็นเบอร์ก (Toggenburg)</option>
                                                            @foreach($gene AS $gene)
                                                                <option value="{{ $gene->gene_name }}" {{ (collect(old('gene'))->contains($gene->gene_name)) ? 'selected':'' }}>{{ $gene->gene_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="colour">สี :</label>
                                                            <input type="text" class="form-control" name="colour" value="{{ old('colour') }}" placeholder="สี">
                                                            <span class="text-danger">@error('colour'){{ $message }}@enderror</span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="dateOfBirth">วัน/เดือน/ปีเกิด :</label>
                                                                <input type="date" id="dateOfBirth" name="dateOfBirth" class="form-control" value="{{ old('dateOfBirth') }}">
                                                                <span class="text-danger">@error('dateOfBirth'){{ $message }}@enderror</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="image">รูปแพะ :</label>
                                                                    <input type="file" name="image" class="form-control"
                                                                    value="{{ old('image') }}">
                                                                    @error('image')
                                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="weightOfBirth">น้ำหนักแรกเกิด (ก.ก.) :</label>
                                                                    <input type="number" class="form-control" name="weightOfBirth" placeholder="น้ำหนัก"
                                                                        value="{{ old('weightOfBirth') }}">
                                                                    <span class="text-danger">@error('weightOfBirth'){{ $message }}@enderror</span>
                                                                </div>
                                                                    <div class="form-group">
                                                                        <label for="arrivalDate">วัน/เดือน/ปี ที่มาถึง :</label>
                                                                        <input type="date" id="arrivalDate" name="arrivalDate" class="form-control" value="{{ old('weightOfBirth') }}">
                                                                        <span class="text-danger">@error('arrivalDate'){{ $message }}@enderror</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="submit">
                                                                        <button type="submit" class="btn"
                                                                            style="background-color: #80C2B6;">ยืนยันการลงทะเบียนเเพะ</button>
                                                                        <a class="btn " style="background-color: #a7afac;"
                                                                            href="{{ route('goats.index') }}">ไปยังหน้าทะเบียนเเพะ</a>
                                                                    </div>

                                                                </div>



                                                        </form>

                                            </body>

                                        </html>
                                        @endsection
