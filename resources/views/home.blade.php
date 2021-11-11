@extends('layouts.app')

@section('content')


<style>
    .col{
     margin-top: 50px;
    }

 </style>

    <div class="container-fluid">
        <div class="col">
            <div class="col-lg-10 m-auto">
                <main>
                    <!-- การสร้าง Carousel -->
                    <div class="carousel slide" id="slider1" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <button data-bs-target="#slider1" data-bs-slide-to="0"></button>
                            <button data-bs-target="#slider1" data-bs-slide-to="1"></button>
                            <button class="active" data-bs-target="#slider1" data-bs-slide-to="2"></button>

                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img src="image/mou ฟาร์ม.jpg"
                                    class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>อาชีพทางเลือก เกษตร</h3>
                                    <p>‘รมช.ประภัตร’ ชื่นชมฟาร์มแพะเสรีเป็นระบบได้มาตรฐาน ดันฟื้นฟูอาชีพเลี้ยงแพะ หลังวิกฤตโควิด-19</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="image/โรคพีพีอาร์.png"
                                    class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <img src="image/gfmgoat.jpg"
                                    class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>

                        </div>
                        <!-- ควบคุมการ Slide ผ่านปุ่ม -->
                        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slider1">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slider1">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
            </div>
        </div>


        <!-- Three columns of text below the carousel -->
        <br><div class="row col-lg-10 m-auto" >

            <div class="col-lg-4">
                <h4>มาตราฐาน GFM</h4>
                <p>Good Farming Management (GFM) คือ แนวทางการยกระดับมาตรฐานการทำปศุสัตว์ ด้วยระบบป้องกันโรคและการเลี้ยงสัตว์ที่เหมาะสม โดยสนับสนุนให้เจ้าของกิจการฟาร์มขนาดเล็ก
                เพื่อเตรียมความพร้อมในการพัฒนาฟาร์มให้ได้ระดับมาตรฐาน</p>
                <p><a class="btn " style="background-color: #80C2B6;" href="{{ url('http://pvlo-brr.dld.go.th/IDP/idp64/F10Doc.pdf')}}">ข้อมูลเพิ่มเติม &raquo;</a></p>
            </div>

            <div class="col-lg-4">
                <h4>มาตรา 7</h4>
                <p>การป้องกันและควบคุมโรคระบาด ตามมาตรา 7 แห่งพระราชบัญญัติโรคระบาดสัตว์ พ.ศ.2558
                เพื่อประโยชน์ในการป้องกันและควบคุมโรคระบาด ให้เจ้าของสัตว์</p>
                <p><a class="btn " style="background-color: #80C2B6;" href="{{ url('https://region6.dld.go.th/webnew/pdf/per62/a6.pdf')}}">ข้อมูลเพิ่มเติม &raquo;</a></p>
            </div>


            <div class="col-lg-4">
                <h4>มาตราฐาน GAP</h4>
                <p>การปฏิบัติทางการเกษตรที่ดีด้านปศุสัตว์ (Good Agricultural Practice : GAP) เป็นงานที่
                    กรมปศุสัตว์ โดยสำนักพัฒนาระบบและรับรองมาตรฐานสินค้าปศุสัตว์ ได้ดำเนินการให้การรับรองแก่ผู้ประกอบการ
                    หรือเกษตรกรที่มีความสมัครใจขอรับการรับรอง</p>
                <p><a class="btn " style="background-color: #80C2B6;" href="{{ url('http://certify.dld.go.th/certify/images/Powerpoint/ppt23_270559/04.pdf') }}">ข้อมูลเพิ่มเติม &raquo;</a></p>
            </div>

        </div>

    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
