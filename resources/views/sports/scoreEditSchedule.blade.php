@extends('layouts/main')

@section('title','Atom Games | การแก้ไขตาราง')

@section('style')
    @foreach($style as $css)
        {{ Html::style(($css))}}
    @endforeach
    {{ Html::style(('css/style.tomato.css'),array('id' => 'theme-stylesheet'))}}
    {{ Html::favicon( 'img/title_atom.png' ) }}
@endsection

@section('scriptT')
    @foreach($scriptT as $jsT)
        {{ Html::script(($jsT))}}
    @endforeach
@endsection

@section('side-navbar')
    <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <div class="sidenav-header-inner text-center">{{ Html::image("img/title_atom.png" ,"person",array('class' => 'img-fluid rounded-circle'))}}
                <h2 class="h5 text-uppercase mb-1">อะตอมเกมส์</h2><span class="text-uppercase">การแข่งขันกีฬาวิทยาศาสตร์สัมพันธ์ครั้งที่ 28</span>
            </div>
            <div class="sidenav-header-logo">
                <a href="{{Route("home") }}" class="brand-small text-center">{{ Html::image("img/title_atom.png" ,"person",array('class' => 'rounded-circle'))}}</a></div>
        </div>
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="{{Route("home")}}"> <i class="icon-home"></i><span>หน้าหลัก</span></a></li>
                <li> <a href="{{Route("register")}}"><i class="icon-form"></i><span>ลงทะเบียนเข้าร่วมงาน</span></a></li>
                    <li> <a href="#pages-nav-list1" data-toggle="collapse" aria-expanded="false"> <i class="icon-grid"></i><span>ตารางการแข่งขัน</span>
                            <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                        <ul id="pages-nav-list1" class="collapse list-unstyled">
                            <li> <a href="{{Route("allSchedule", ['types_of_S' => 'sport','format'=>'all']) }}">กีฬา</a></li>
                            <li> <a href="{{Route("allSchedule", ['types_of_S' => 'activites','format'=>'all']) }}">กิจกรรมสัมพันธ์</a></li>

                        </ul>
                    </li>
                    <li> <a href="#pages-nav-list2" data-toggle="collapse" aria-expanded="true"><i class="fa fa-sitemap"></i><span>ผลการแข่งขัน</span>
                            <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                        <ul id="pages-nav-list2" class="collapse list-unstyled">
                            @if($page == "A_update")
                                <li> <a href="{{Route("allSchedule", ['types_of_S' => 'sport','format'=>'score']) }}">กีฬา</a></li>
                                <li class="active"> <a href="{{Route("allSchedule", ['types_of_S' => 'activites','format'=>'score']) }}">กิจกรรมสัมพันธ์</a></li>
                            @elseif($page == "S_update")
                                <li class="active"> <a href="{{Route("allSchedule", ['types_of_S' => 'sport','format'=>'score']) }}">กีฬา</a></li>
                                <li> <a href="{{Route("allSchedule", ['types_of_S' => 'activites','format'=>'score']) }}">กิจกรรมสัมพันธ์</a></li>
                            @endif
                        </ul>
                    </li>
                    <li> <a href="#"><i class="fa fa-bookmark-o"></i><span>รวมเหรียญรางวัล</span></a></li>
                    <li> <a href="#pages-nav-list3" data-toggle="collapse" aria-expanded="false"><i class="fa fa-handshake-o"></i><span>การบริจาค</span>
                            <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                        <ul id="pages-nav-list3" class="collapse list-unstyled">
                            <li> <a href="#">รายละเอียดการบริจาค</a></li>
                            <li> <a href="#">การยืนยันข้อมูลและหลักฐานการบริจาค</a></li>
                        </ul>
                    </li>
                    <li> <a href="#"> <i class="fa fa-tty"> </i><span>หอพัก</span></a></li>
                    <li> <a href="#pages-nav-list4" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>เกี่ยวกับงาน</span>
                            <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                        <ul id="pages-nav-list4" class="collapse list-unstyled">
                            <li> <a href="#">รายละเอียดการจัดงาน</a></li>
                            <li> <a href="#">รายชื่อผู้มีส่วนเกี่ยวข้อง</a></li>
                            <li> <a href="#">กติกาการแข่งขัน</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
        <div class="admin-menu">
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                    <li > <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-gear"></i><span>การจัดการข้อมูล</span>
                            <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                        <ul id="pages-nav-list" class="collapse list-unstyled">
                            <li> <a href="{{Route("createSchedule")}}">การจัดตารางการแข่งขัน</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
@endsection

@section('header')
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header ">
                    <a id="toggle-btn" href="#" class="menu-btn align-middle"><i class="icon-bars"> </i></a><a href="{{Route("index")}}" class="navbar-brand"></a>
                    <a href="#" class="iconbrand align-middle d-none d-sm-inline-block"><i class="fa fa-facebook-square mr-3"></i></a>
                    <a href="#" class="iconbrand align-middle d-none d-sm-inline-block"><i class="fa fa-twitter-square mr-3"></i></a>
                    <a href="#" class="iconbrand align-middle d-none d-sm-inline-block"><i class="fa fa-instagram mr-3"></i></a>
                </div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <li class="nav-item dropdown">
                        <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                            <div class="brand-text d-sm-inline-block text-center">
                                <strong class="text-primary">Atom Game 28<i class="fa fa-sort-desc ml-1"></i> </strong>
                            </div>
                        </a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile">
                                        {{ Html::image("img/avatar-1.jpg" ,"avatar-1",array('class' => 'img-fluid rounded-circle'))}}
                                    </div>
                                    <div class="msg-body">
                                        <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <li class="nav-item dropdown">
                        <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link d-none d-sm-inline-block">
                            {{ Html::image("img/avatar-1.jpg" ,"avatar-1",array('class' => 'img-fluid rounded-circle imgHover msg-profile'))}}
                        </a>
                        <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link d-sm-none text-center">
                            profile<i class="fa fa-user-circle-o ml-1"></i>
                        </a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li class="bb-1">
                                <a rel="nofollow" href="#" class="dropdown-item all-notifications text-left">
                                    <strong> <i class="fa fa-user"></i>ข้อมูลส่วนตัว</strong>
                                </a>
                            </li>
                            <li class="bb-1">
                                <a rel="nofollow" href="#" class="dropdown-item all-notifications text-left">
                                    <strong> <i class="fa fa-edit"></i>แก้ไขข้อมูลส่วนตัว</strong>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item all-notifications text-left">
                                    <strong> <i class="fa fa-key"></i>ขอรหัสการใช้งานอินเทอร์เน็ต</strong>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link logout align-middle text-center">Logout<i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('container')
    @if ($msg != "insert")
        <div class="alert alert-success">
            <div class="container-fluid">
                <div class="text-center">
                    {{ $msg }}
                </div>
            </div>
        </div>
    @endif
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{Route("home")}}">หน้าหลัก</a></li>
                @if($page == "S_update")
                    <li class="breadcrumb-item"><a href="{{Route("allSchedule", ['types_of_S' => 'sport','format'=>'score']) }}">ตารางผลการแข่งขันกีฬา</a></li>
                    <li class="breadcrumb-item active">การแก้ไขผลการแข่งขันกีฬา</li>
                @else
                    <li class="breadcrumb-item"><a href="{{Route("allSchedule", ['types_of_S' => 'activites','format'=>'score']) }}">ตารางผลการแข่งขันกิจกรรมสัมพันธ์</a></li>
                    <li class="breadcrumb-item active">การแก้ไขผลการแข่งขันกิจกรรมสัมพันธ์</li>
                @endif
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <header>
                @if($page == "S_update")
                    <h1 class="h3 display">การแก้ไขผลการแข่งขันกีฬา</h1>
                @else
                    <h1 class="h3 display">การแก้ไขผลการแข่งขันกิจกรรมสัมพันธ์</h1>
                @endif
            </header>
            <div class="row mb-4">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        {{Form::open(['method' =>'post','route' => 'update_Schedule','name' =>'updateSchedule','class' =>'form-horizontal'])}}
                        <input name="page" type="hidden" value="{{$page}}">
                        <div class="card-header d-flex align-items-center">
                            @foreach($nameOfS as $nameS)
                                <h2 class="h5 font-weight-bold mr-1">การแข่งขันกีฬา :</h2>
                                <h2 class="h5 display mr-3 text-primary">{{$nameS->S_NAME}}</h2>
                                <h2 class="h5 font-weight-bold mr-1">ประเภท :</h2>
                                @if($nameS->S_TYPE_GENDER == "M")
                                    <h2 class="h5 display text-primary">ชาย (male)</h2>
                                @elseif($nameS->S_TYPE_GENDER == "F")
                                    <h2 class="h5 display text-primary">หญิง (female)</h2>
                                @else
                                    <h2 class="h5 display text-primary">ไม่จำกัดเพศหรือผสม (all)</h2>
                                @endif
                            @endforeach
                        </div>
                        <div class="card-body row pb-0">
                            <div class="col">
                                @foreach($nameOfM as $nameM)
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">ประเภทการแข่งขันแบบ : </h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">{{$nameM->MT_NAME_T}}</h2>
                                    </div>
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right"></h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">({{$nameM->MT_NAME_E}})</h2>
                                    </div>
                                @endforeach
                                <input type="hidden" id="numUs" name="numUs" value="{{sizeof($US)}}">
                                @foreach($US as $USs)
                                    <input type="hidden" name="usNAME[]" value="{{$USs->PU_NAME}}">
                                    <input type="hidden" name="usID[]" value="{{$USs->PU_ID}}">
                                    <input type="hidden" name="usIMG[]" value="{{$USs->PU_IMG}}">
                                @endforeach
                                <input type="hidden" id="numData" name="numData" value="{{sizeof($data)}}">
                                @for($i=0; $i<sizeof($data); $i++)
                                    @if($i == 0 && $data[$i]->CP_STATUS != "B")
                                        <div class="d-lg-flex">
                                            <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">ประจำปี ค.ศ. : </h2>
                                            <h2 class="h5 display col-lg-6 text-lg-left">{{$data[$i]->S_YEAR}}</h2>
                                        </div>
                            </div>
                            <div class="col">
                                @if($data[$i]->CP_ROUND_NAME == "QL")
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">การแข่งขันในรอบ : </h2>
                                        <h2 class="h5 col-lg-6 text-lg-left">รอบคัดเลือก</h2>
                                    </div>
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right"></h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">(qualifying round)</h2>
                                    </div>
                                @elseif($data[$i]->CP_ROUND_NAME == "QT")
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">การแข่งขันในรอบ : </h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">รอบก่อนรองชนะเลิศ</h2>
                                    </div>
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right"></h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">(quarterfinals round)</h2>
                                    </div>
                                @elseif($data[$i]->CP_ROUND_NAME == "SF")
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">การแข่งขันในรอบ : </h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">รอบรองชนะเลิศ</h2>
                                    </div>
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right"></h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">(semi-final round)</h2>
                                    </div>
                                @elseif($data[$i]->CP_ROUND_NAME == "FG")
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">การแข่งขันในรอบ : </h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">รอบชิงชนะเลิศเหรียญทอง</h2>
                                    </div>
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right"></h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">(gold medal match)</h2>
                                    </div>
                                @else
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">การแข่งขันในรอบ : </h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">รอบชิงชนะเลิศเหรียญทองแดง</h2>
                                    </div>
                                    <div class="d-lg-flex">
                                        <h2 class="h5 font-weight-bold col-lg-6 text-lg-right"></h2>
                                        <h2 class="h5 display col-lg-6 text-lg-left">(silver medal match)</h2>
                                    </div>
                                @endif
                                <div class="d-lg-flex">
                                    <h2 class="h5 font-weight-bold col-lg-6 text-lg-right">ครั้งที่ : </h2>
                                    <h2 class="h5 display col-lg-6 text-lg-left">{{$data[$i]->CP_ROUND_NUM}}</h2>
                                </div>
                            </div>
                        </div>
                        @if($type)
                            <input type="hidden" value="{{$type}}" name="type">
                        @endif
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr class="bx-1">
                                    <th nowrap>คู่ที่</th>
                                    <th nowrap>ระหว่าง</th>
                                    <th nowrap></th>
                                    <th nowrap>คะแนนที่ทำได้</th>
                                    <th nowrap>เหรียญ</th>
                                    <th nowrap>ผลการคัดเลือก</th>
                                </tr>
                                </thead>
                                <tbody class="bb-1">
                                <tr class="bx-1">
                                    <input type="hidden" name="id[]" value="{{$data[$i]->CP_ID}}" class="form-control">
                                    <td scope="row" rowspan="2" class="align-middle">{{$data[$i]->CP_PAIR}}</td>
                                    <td class="bl-1">
                                        <div class="d-flex">
                                            <div class="col-10 mr-3">
                                                <select name="PU[]" id="PU{{$i}}" onchange="returnPU({{$i}})" class="form-control">
                                                    @if($data[$i]->PU_ID)
                                                        @foreach($US as $USs)
                                                            @if($data[$i]->PU_ID == $USs->PU_ID)
                                                                <option value="{{$USs->PU_ID}}" selected="selected">{{$USs->PU_NAME}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>
                                                        @foreach($USbefore as $USbefores)
                                                            <option value="{{$USbefores->PU_ID}}">{{$USbefores->PU_NAME}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <input type="hidden" id="PU_ID{{$i}}" name="PU_ID[]" value="{{$data[$i]->PU_ID}}">
                                            </div>
                                            <div class="col-2 mr-2">
                                                <a id="deleteName{{$i}}" name="deleteName[]" disabled onclick="deleteName({{$i}})" class="btn btn-warning text-white pull-right">แก้ไข</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="bl-1" width="8%" id="img{{$i}}">
                                        @if($data[$i]->PU_ID)
                                            @foreach($US as $USs)
                                                @if($data[$i]->PU_ID == $USs->PU_ID)
                                                    {{ Html::image("img/university/$USs->PU_IMG" ,"avatar-1",array('class' => 'img-fluid'))}}
                                                @endif
                                            @endforeach
                                        @else
                                            {{ Html::image("img/university/questionMark.png" ,"question logo",array('class' => 'img-fluid'))}}
                                        @endif
                                    </td>
                                    <td class="bl-1">
                                        <input type="text" name="score[]" value="{{$data[$i]->CP_SCORE}}" class="form-control"  placeholder="set 1,set 2, ...">
                                        <small class="form-text">กรณีที่มีคะแนนมากกว่า 1 เซต</small>
                                        <small class="form-text">ให้กรอก "," ขั้นระหว่างเซตแต่ละเซต</small>
                                    </td>
                                    <td class="bl-1">
                                        <select name="Medal[]" onchange="returnMD({{$i}})" class="form-control">
                                            @if($data[$i]->CP_MEDAL)
                                                @if($data[$i]->CP_MEDAL == "G")
                                                    <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">ทอง</option>
                                                    <option value="S">เงิน</option>
                                                    <option value="C">ทองแดง</option>
                                                @elseif($data[$i]->CP_STATUS == "S")
                                                    <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">เงิน</option>
                                                    <option value="G">ทอง</option>
                                                    <option value="C">ทองแดง</option>
                                                @else
                                                    <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">ทองแดง</option>
                                                    <option value="S">เงิน</option>
                                                    <option value="C">ทองแดง</option>
                                                @endif
                                            @else
                                                <option disabled value="disabled" selected="selected"> -- เลือกเหรียญ -- </option>
                                                <option value="G">ทอง</option>
                                                <option value="S">เงิน</option>
                                                <option value="C">ทองแดง</option>
                                            @endif
                                        </select>
                                        <input type="hidden" name="MD[]" value="{{$data[$i]->CP_MEDAL}}">
                                    </td>
                                    <td class="bl-1">
                                        <select name="Status[]" onchange="returnSTT({{$i}})" class="form-control">
                                            @if($data[$i]->CP_STATUS)
                                                @if($data[$i]->CP_STATUS == "F")
                                                    <option value="{{$data[$i]->CP_STATUS}}" selected="selected">ผ่านเข้ารอบ</option>
                                                    <option value="E">ตกรอบ</option>
                                                    <option value="D">เสมอ</option>
                                                @elseif($data[$i]->CP_STATUS == "E")
                                                    <option value="{{$data[$i]->CP_STATUS}}" selected="selected">ตกรอบ</option>
                                                    <option value="F">ผ่านเข้ารอบ</option>
                                                    <option value="D">เสมอ</option>
                                                @else
                                                    <option value="{{$data[$i]->CP_STATUS}}" selected="selected">เสมอ</option>
                                                    <option value="F">ผ่านเข้ารอบ</option>
                                                    <option value="E">ตกรอบ</option>
                                                @endif
                                            @else
                                                <option disabled value="disabled" selected="selected"> -- เลือกสถานะ -- </option>
                                                <option value="F">ผ่านเข้ารอบ</option>
                                                <option value="E">ตกรอบ</option>
                                                <option value="D">เสมอ</option>
                                            @endif
                                        </select>
                                        <input type="hidden" name="STT[]" value="{{$data[$i]->CP_STATUS}}">
                                    </td>
                                </tr>
                                @elseif($i != 0 && $data[$i]->CP_STATUS != "B")
                                    @if($data[$i-1]->CP_PAIR == $data[$i]->CP_PAIR)
                                        <tr class="border-top-0 bx-1">
                                            <input type="hidden" name="id[]" value="{{$data[$i]->CP_ID}}" class="form-control">
                                            <td class="bl-1">
                                                <div class="d-flex">
                                                    <div class="col-10 mr-3">
                                                        <select name="PU[]" id="PU{{$i}}" onchange="returnPU({{$i}})" class="form-control">
                                                            @if($data[$i]->PU_ID)
                                                                @foreach($US as $USs)
                                                                    @if($data[$i]->PU_ID == $USs->PU_ID)
                                                                        <option value="{{$USs->PU_ID}}" selected="selected">{{$USs->PU_NAME}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>
                                                                @foreach($USbefore as $USbefores)
                                                                    <option value="{{$USbefores->PU_ID}}">{{$USbefores->PU_NAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <input type="hidden" id="PU_ID{{$i}}" name="PU_ID[]" value="{{$data[$i]->PU_ID}}">
                                                    </div>
                                                    <div class="col-2 mr-2">
                                                        <a id="deleteName{{$i}}" name="deleteName[]" disabled onclick="deleteName({{$i}})" class="btn btn-warning text-white pull-right">แก้ไข</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bl-1" width="8%" id="img{{$i}}">
                                                @if($data[$i]->PU_ID)
                                                    @foreach($US as $USs)
                                                        @if($data[$i]->PU_ID == $USs->PU_ID)
                                                            {{ Html::image("img/university/$USs->PU_IMG" ,"avatar-1",array('class' => 'img-fluid'))}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{ Html::image("img/university/questionMark.png" ,"question logo",array('class' => 'img-fluid'))}}
                                                @endif
                                            </td>
                                            <td class="bl-1">
                                                <input type="text" name="score[]" value="{{$data[$i]->CP_SCORE}}" class="form-control"  placeholder="set 1,set 2, ...">
                                                <small class="form-text">กรณีที่มีคะแนนมากกว่า 1 เซต</small>
                                                <small class="form-text">ให้กรอก "," ขั้นระหว่างเซตแต่ละเซต</small>
                                            </td>
                                            <td class="bl-1">
                                                <select name="Medal[]" onchange="returnMD({{$i}})" class="form-control">
                                                    @if($data[$i]->CP_MEDAL)
                                                        @if($data[$i]->CP_MEDAL == "G")
                                                            <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">ทอง</option>
                                                            <option value="S">เงิน</option>
                                                            <option value="C">ทองแดง</option>
                                                        @elseif($data[$i]->CP_STATUS == "S")
                                                            <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">เงิน</option>
                                                            <option value="G">ทอง</option>
                                                            <option value="C">ทองแดง</option>
                                                        @else
                                                            <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">ทองแดง</option>
                                                            <option value="S">เงิน</option>
                                                            <option value="C">ทองแดง</option>
                                                        @endif
                                                    @else
                                                        <option disabled value="disabled" selected="selected"> -- เลือกเหรียญ -- </option>
                                                        <option value="G">ทอง</option>
                                                        <option value="S">เงิน</option>
                                                        <option value="C">ทองแดง</option>
                                                    @endif
                                                </select>
                                                <input type="hidden" name="MD[]" value="{{$data[$i]->CP_MEDAL}}">
                                            </td>
                                            <td class="bl-1">
                                                <select name="Status[]" onchange="returnSTT({{$i}})" class="form-control">
                                                    @if($data[$i]->CP_STATUS)
                                                        @if($data[$i]->CP_STATUS == "F")
                                                            <option value="{{$data[$i]->CP_STATUS}}" selected="selected">ผ่านเข้ารอบ</option>
                                                            <option value="E">ตกรอบ</option>
                                                            <option value="D">เสมอ</option>
                                                        @elseif($data[$i]->CP_STATUS == "E")
                                                            <option value="{{$data[$i]->CP_STATUS}}" selected="selected">ตกรอบ</option>
                                                            <option value="F">ผ่านเข้ารอบ</option>
                                                            <option value="D">เสมอ</option>
                                                        @else
                                                            <option value="{{$data[$i]->CP_STATUS}}" selected="selected">เสมอ</option>
                                                            <option value="F">ผ่านเข้ารอบ</option>
                                                            <option value="E">ตกรอบ</option>
                                                        @endif
                                                    @else
                                                        <option disabled value="disabled" selected="selected"> -- เลือกสถานะ -- </option>
                                                        <option value="F">ผ่านเข้ารอบ</option>
                                                        <option value="E">ตกรอบ</option>
                                                        <option value="D">เสมอ</option>
                                                    @endif
                                                </select>
                                                <input type="hidden" name="STT[]" value="{{$data[$i]->CP_STATUS}}">
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="bx-1">
                                            <input type="hidden" name="id[]" value="{{$data[$i]->CP_ID}}" class="form-control">
                                            <td scope="row" rowspan="2" class="align-middle">{{$data[$i]->CP_PAIR}}</td>
                                            <td class="bl-1">
                                                <div class="d-flex">
                                                    <div class="col-10 mr-3">
                                                        <select name="PU[]" id="PU{{$i}}" onchange="returnPU({{$i}})" class="form-control">
                                                            <option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>
                                                            @if($data[$i]->PU_ID)
                                                                @foreach($US as $USs)
                                                                    @if($data[$i]->PU_ID == $USs->PU_ID)
                                                                        <option value="{{$USs->PU_ID}}" selected="selected">{{$USs->PU_NAME}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>
                                                                @foreach($USbefore as $USbefores)
                                                                    <option value="{{$USbefores->PU_ID}}">{{$USbefores->PU_NAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <input type="hidden" id="PU_ID{{$i}}" name="PU_ID[]" value="{{$data[$i]->PU_ID}}">
                                                    </div>
                                                    <div class="col-2 mr-2">
                                                        <a id="deleteName{{$i}}" name="deleteName[]" disabled onclick="deleteName({{$i}})" class="btn btn-warning text-white pull-right">แก้ไข</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bl-1" width="8%" id="img{{$i}}">
                                                @if($data[$i]->PU_ID)
                                                    @foreach($US as $USs)
                                                        @if($data[$i]->PU_ID == $USs->PU_ID)
                                                            {{ Html::image("img/university/$USs->PU_IMG" ,"avatar-1",array('class' => 'img-fluid'))}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{ Html::image("img/university/questionMark.png" ,"question logo",array('class' => 'img-fluid'))}}
                                                @endif
                                            </td>
                                            <td class="bl-1">
                                                <input type="text" name="score[]" value="{{$data[$i]->CP_SCORE}}" class="form-control"  placeholder="set 1,set 2, ...">
                                                <small class="form-text">กรณีที่มีคะแนนมากกว่า 1 เซต</small>
                                                <small class="form-text">ให้กรอก "," ขั้นระหว่างเซตแต่ละเซต</small>
                                            </td>
                                            <td class="bl-1">
                                                <select name="Medal[]" onchange="returnMD({{$i}})" class="form-control">
                                                    @if($data[$i]->CP_MEDAL)
                                                        @if($data[$i]->CP_MEDAL == "G")
                                                            <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">ทอง</option>
                                                            <option value="S">เงิน</option>
                                                            <option value="C">ทองแดง</option>
                                                        @elseif($data[$i]->CP_STATUS == "S")
                                                            <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">เงิน</option>
                                                            <option value="G">ทอง</option>
                                                            <option value="C">ทองแดง</option>
                                                        @else
                                                            <option value="{{$data[$i]->CP_MEDAL}}" selected="selected">ทองแดง</option>
                                                            <option value="S">เงิน</option>
                                                            <option value="C">ทองแดง</option>
                                                        @endif
                                                    @else
                                                        <option disabled value="disabled" selected="selected"> -- เลือกเหรียญ -- </option>
                                                        <option value="G">ทอง</option>
                                                        <option value="S">เงิน</option>
                                                        <option value="C">ทองแดง</option>
                                                    @endif
                                                </select>
                                                <input type="hidden" name="MD[]" value="{{$data[$i]->CP_MEDAL}}">
                                            </td>
                                            <td class="bl-1">
                                                <select name="Status[]" onchange="returnSTT({{$i}})" class="form-control">
                                                    @if($data[$i]->CP_STATUS)
                                                        @if($data[$i]->CP_STATUS == "F")
                                                            <option value="{{$data[$i]->CP_STATUS}}" selected="selected">ผ่านเข้ารอบ</option>
                                                            <option value="E">ตกรอบ</option>
                                                            <option value="D">เสมอ</option>
                                                        @elseif($data[$i]->CP_STATUS == "E")
                                                            <option value="{{$data[$i]->CP_STATUS}}" selected="selected">ตกรอบ</option>
                                                            <option value="F">ผ่านเข้ารอบ</option>
                                                            <option value="D">เสมอ</option>
                                                        @else
                                                            <option value="{{$data[$i]->CP_STATUS}}" selected="selected">เสมอ</option>
                                                            <option value="F">ผ่านเข้ารอบ</option>
                                                            <option value="E">ตกรอบ</option>
                                                        @endif
                                                    @else
                                                        <option disabled value="disabled" selected="selected"> -- เลือกสถานะ -- </option>
                                                        <option value="F">ผ่านเข้ารอบ</option>
                                                        <option value="E">ตกรอบ</option>
                                                        <option value="D">เสมอ</option>
                                                    @endif
                                                </select>
                                                <input type="hidden" name="STT[]" value="{{$data[$i]->CP_STATUS}}">
                                            </td>
                                        </tr>
                                    @endif
                                @elseif($i != 0 && $data[$i]->CP_STATUS == "B")
                                    <tr class="bx-1">
                                        <input type="hidden" name="id[]" value="{{$data[$i]->CP_ID}}" class="form-control">
                                        <td scope="row" class="align-middle">{{$data[$i]->CP_PAIR}}</td>
                                        <td class="bl-1">
                                            <div class="d-flex">
                                                <div class="col-10 mr-3">
                                                    <select name="PU[]" id="PU{{$i}}" onchange="returnPU({{$i}})" class="form-control">
                                                        @if($data[$i]->PU_ID)
                                                            @foreach($US as $USs)
                                                                @if($data[$i]->PU_ID == $USs->PU_ID)
                                                                    <option value="{{$USs->PU_ID}}" selected="selected">{{$USs->PU_NAME}}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>
                                                            @foreach($USbefore as $USbefores)
                                                                <option value="{{$USbefores->PU_ID}}">{{$USbefores->PU_NAME}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <input type="hidden" id="PU_ID{{$i}}" name="PU_ID[]" value="{{$data[$i]->PU_ID}}">
                                                </div>
                                                <div class="col-2 mr-2">
                                                    <a id="deleteName{{$i}}" name="deleteName[]" disabled onclick="deleteName({{$i}})" class="btn btn-warning text-white pull-right">แก้ไข</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="bl-1" width="8%" id="img{{$i}}">
                                            @if($data[$i]->PU_ID)
                                                @foreach($US as $USs)
                                                    @if($data[$i]->PU_ID == $USs->PU_ID)
                                                        {{ Html::image("img/university/$USs->PU_IMG" ,"avatar-1",array('class' => 'img-fluid'))}}
                                                    @endif
                                                @endforeach
                                            @else
                                                {{ Html::image("img/university/questionMark.png" ,"question logo",array('class' => 'img-fluid'))}}
                                            @endif
                                        </td>
                                        <td class="bl-1">
                                            <input type="hidden" name="score[]" value="{{$data[$i]->CP_SCORE}}">
                                        </td>
                                        <td>
                                            <input type="hidden" name="MD[]" value="{{$data[$i]->CP_MEDAL}}">
                                        </td>
                                        <td class="bl-1">
                                            <select name="Status[]" disabled="" class="form-control">
                                                <option disabled value="disabled"> -- เลือกสถานะ -- </option>
                                                <option value="{{$data[$i]->CP_STATUS}}" selected="selected">ชนะผ่าน</option>
                                            </select>
                                            <input type="hidden" name="STT[]" value="{{$data[$i]->CP_STATUS}}">
                                        </td>
                                    </tr>
                                @endif
                                @endfor
                                <tr class="bt-1">

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body mb-5">
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-secondary pull-left">ลบตาราง</button>
                            <!-- Modal-->
                            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left show">
                                <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">ยืนยันการลบ</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($nameOfS as $nameS)
                                                <p>คุณต้องการลบตารางแข่งขัน {{$nameS->S_NAME}} นี้หรือไม่</p>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete2" value="delete2" class="btn btn-info pull-left">ยืนยัน</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-secondary">ปิด</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="update2" value="update2" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
                <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
        </div>
    </div>
@endsection

@section('color')
    <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm hidden-xs hidden-sm"><i class="fa fa-cog fa-2x"></i></button>
    <div id="style-switch" class="collapse">
        <h4 class="mb-3">Select theme colour</h4>
        <form class="mb-3">
            <select name="colour" id="colour" class="form-control">
                <option value="">select colour variant</option>
                <option value="default">green</option>
                <option value="pink">pink</option>
                <option value="red">red</option>
                <option value="violet">violet</option>
                <option value="sea">sea</option>
                <option value="tomato">tomato</option>
                <option value="blue">blue</option>
                <option value="yellow">yellow</option>
            </select>
        </form>
    </div>
@endsection

@section('scriptB')
    @foreach($scriptB as $jsB)
        {{ Html::script(($jsB))}}
    @endforeach
    {{ Html::script('js/sportsAndActivities/ajax/scheduleAjax.js')}}
@endsection