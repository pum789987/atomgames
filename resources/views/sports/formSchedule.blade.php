@extends('layouts/main')

@section('title','Atom Games | การจัดตารางการแข่งขัน')

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
                <li> <a href="#pages-nav-list2" data-toggle="collapse" aria-expanded="false"><i class="fa fa-sitemap"></i><span>ผลการแข่งขัน</span>
                        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                    <ul id="pages-nav-list2" class="collapse list-unstyled">
                        <li> <a href="{{Route("allSchedule", ['types_of_S' => 'sport','format'=>'score']) }}">กีฬา</a></li>
                        <li> <a href="{{Route("allSchedule", ['types_of_S' => 'activites','format'=>'score']) }}">กิจกรรมสัมพันธ์</a></li>
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
                <li class="active"> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-gear"></i><span>การจัดการข้อมูล</span>
                        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                    <ul id="pages-nav-list" class="collapse list-unstyled">
                        <li class="active"> <a href="#">การจัดตารางการแข่งขัน</a></li>
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
    @if (session('msg'))
        <div class="alert alert-success">
            <div class="container-fluid">
                <div class="text-center">
                   {{ session('msg') }}
                </div>
            </div>
        </div>
    @endif
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{Route("home")}}">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">การจัดตารางการแข่งขัน</li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">การจัดตารางการแข่งขัน</h1>
            </header>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    {{Form::open(['method' =>'post','route' => 'insert_Schedule','name' =>'createSchedule','class' =>'form-horizontal','autocomplete'=> 'on','onsubmit'=>'return validateForm()'])}}
                        <div class="card pr-3">
                            <div class="card-header d-flex align-items-center">
                                <h2 class="h5 display text-primary">ข้อมูลการจัดตาราง</h2>
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="sport" class="col-sm-4 text-sm-right">รูปแบบ (format)</label>
                                    <div id="ShowFormat" class="col-sm-8">
                                        <div class="i-checks">
                                            <input type="radio" name="format" id='sport' value="S" class="form-control-custom radio-custom">
                                            <label for="sport">กีฬา (sport)</label>
                                        </div>
                                        <div class="i-checks">
                                            <input type="radio" name="format" id='activities' value="A" class="form-control-custom radio-custom">
                                            <label for="activities">กิจกรรมสัมพันธ์ (activities)</label>
                                        </div>
                                        <small id="show-validate-format" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกรูปแบบที่ต้องการจัด</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type-f" class="col-sm-4 text-sm-right">ชื่อประเภท (type name)</label>
                                    <div id="ShowType" class="col-sm-8">
                                        <div class="i-checks">
                                            <input type="radio" name="type-name" id='type-m' value="M" class="form-control-custom radio-custom">
                                            <label for="type-m">ชาย (male)</label>
                                        </div>
                                        <div class="i-checks">
                                            <input type="radio" name="type-name" id='type-f' value="F" class="form-control-custom radio-custom">
                                            <label for="type-f">หญิง (female)</label>
                                        </div>
                                        <div class="i-checks">
                                            <input type="radio" name="type-name" id='type-a' value="A" class="form-control-custom radio-custom">
                                            <label for="type-a">ไม่จำกัดเพศหรือผสม (all)</label>
                                        </div>
                                        <small id="show-validate-type" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกชื่อประเภท</small>
                                    </div>
                                </div>
                                <!-------------ชื่อ--------------->
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 form-control-label text-sm-right">ชื่อกีฬาและกิจกรรมสัมพันธ์ <br> (name of sports and activities)</label>
                                    <div class="col-sm-8 select">
                                        <div class="input-group">
                                            <select onchange="NameShowTrue()" disabled="" id="inputName" name="Name" class="form-control">
                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>
                                            </select>
                                            <span id="show-true-Name" class="input-group-addon">*</span>
                                        </div>
                                        <small class="form-text">กรุณาเลือกประเภทการแข่งขันก่อน จึงจะสามารถเลือกชื่อกีฬาได้</small>
                                        <small id="show-validate-Name" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์</small>
                                        <small id="show-validate-NoName" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>ไม่มีกีฬาในรูปแบบและประเภทที่ท่านเลือก</small>
                                        <small id="show-validate-sportCompeting" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กีฬานี้กำลังทำการแข่งขัน กรุณาอัพเดตข้อมูลและผลการแข่งขันให้ครบถ้วน ก่อนจัดการแข่งขันครั้งต่อไป</small>
                                        <small id="show-validate-sportNoteam" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>ไม่สามารถจัดการแข่งขันได้ เนื่องจากมีจำนวนทีมผู้เข้าแข่งขันไม่พอสำหรับจัดการแข่งขัน</small>
                                        <small id="show-validate-sportCompete" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>ไม่สามารถจัดการแข่งขันได้ เนื้อจากกีฬานี้ได้ทำการแข่งขันเสร็จสิ้นลงแล้ว</small>
                                        <input id="sportCompeting" name="Competing" type="hidden" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 text-sm-right">จำนวนทีมที่สามารถจัดการแข่งขันได้<br> (total number of competing teams)</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input id="total-number" type="number" disabled="" class="form-control">
                                            <input id="total-number2" name="total" type="hidden" class="form-control">
                                        </div>
                                        <small class="form-text">จำนวนนี้เป็นจำนวนรวมของทีมที่ผ่านเข้ารอบทั้งหมด ทีมผู้ที่ตกรอบจะไม่สามารถทำการแข่งขันได้อีก</small>
                                    </div>
                                </div>
                                <!-- No DB -->
                                <div class="form-group row">
                                    <label for="inputRound" class="col-sm-4 form-control-label text-sm-right">รอบการแข่งขัน <br> (round of competition)</label>
                                    <div class="col-sm-8 select">
                                        <div class="input-group">
                                            <select onchange="return RoundShowTrue()" disabled=""  id="inputRound" name="Round" class="form-control">
                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>
                                                <optgroup label="รอบคัดเลือก (qualifying round)">
                                                    <option value="QL">รอบแรก (first match)</option>
                                                </optgroup>
                                                <optgroup label="รอบก่อนรองชนะเลิศ (quarterfinals round)">
                                                    <option value="QT">รอบที่ 2,3,4, ... (match at 2,3,4,...)</option>
                                                </optgroup>
                                                <optgroup label="รอบรองชนะเลิศ (semi-final round)">
                                                    <option value="SF">รอบรองชนะเลิศ 4 ทีมสุดท้าย (4 teams match)</option>
                                                </optgroup>
                                                <optgroup label="รอบรองชนะเลิศ (final round)">
                                                    <option value="FG">รอบชิงชนะเลิศเหรียญทอง (gold medal match)</option>
                                                    <option value="FS">รอบชิงชนะเลิศเหรียญทองแดง (silver medal match)</option>
                                                </optgroup>
                                            </select>
                                            <span id="show-true-Round" class="input-group-addon">*</span>
                                        </div>
                                        <small class="form-text">กรุณาเลือกชื่อกีฬาก่อน จึงจะสามารถเลือกรอบการแข่งขันได้</small>
                                        <small id="show-validate-Round" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกรอบการแข่งขัน</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputMT" class="col-sm-4 form-control-label text-sm-right">ประเภทการแข่งขัน (match type)</label>
                                    <div class="col-sm-8 select">
                                        <div class="input-group">
                                            <select onchange="return MatchShowTrue()" disabled=""  id="inputMT" name="match_type" class="form-control">
                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>
                                                <optgroup label="การแข่งขันแบบแพ้ครั้งเดียวคัดออก (single-elimination tournament)">
                                                    <option value="MT11">การแข่งขันแบบแพ้คัดออกปกติ (divisible elimination)</option>
                                                    <option value="MT12">การแข่งขันแบบแพ้คัดออกแบบลงตัวเป็นกำลังสองของสอง (indivisible elimination)</option>
                                                </optgroup>
                                                <optgroup label="การแข่งขันแบบพบกันหมด (round-robin tournament)">
                                                    <option value="MT21">การแข่งขันแบบพบกันหมดทุกทีมหรือพรีเมียร์ลีก (premier league)</option>
                                                    <option value="MT22">การแข่งขันแบบแบ่งกลุ่มพบกันหมด (grouping)</option>
                                                </optgroup>
                                                <optgroup label="การแข่งขันแบบเก็บคะแนน (scoring tournament)">
                                                    <option value="MT31">การแข่งขันแบบเก็บคะแนน (scoring)</option>
                                                </optgroup>
                                            </select>
                                            <span id="show-true-MT" class="input-group-addon">*</span>
                                        </div>
                                        <small class="form-text">กรุณาเลือกรูปแบบ (format) และ ชื่อประเภท (type name) จึงจะสามารถเลือกประเภทการแข่งขันได้</small>
                                        <small id="show-validate-MT" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกประเภทการแข่งขัน</small>
                                    </div>
                                </div>
                                <div id="show-premier">
                                    <div class="form-group row">
                                        <label class="col-sm-4 form-control-label text-sm-right"></label>
                                        <div class="col-sm-7">
                                            <!-- จำนวนทีมที่ผ่านเข้ารอบในแต่ละกลุ่ม -->
                                            <small class="form-text">จำนวนทีมที่ผ่านเข้ารอบ (number of teams qualified)</small>
                                            <div class="input-group">
                                                <input type="number" oninput="return TeamsPShowTrue()" id="inputTeamsP" name="teamsP" pattern="^[1-9][0-9]*$" placeholder="Enter number of teams qualified" class="form-control form-control-warning">
                                                <span id="show-true-teamsP" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-teamsP" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนทีมต้องไม่ต่ำกว่า 1 ทีม</small>
                                            <small id="show-validate2-teamsP" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนทีมที่ผ่านเข้ารอบมีจำนวนมากกว่าจำนวนทีมทั้งหมด</small>
                                            <small id="show-validate3-teamsP" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนทีมที่ผ่านเข้ารอบ</small>
                                        </div>
                                        <div class="col-sm-1 pt-3">
                                            <small class="form-text">ทีม (team)</small>
                                        </div>
                                    </div>
                                </div>
                                <div id="show-grouping">
                                    <div class="form-group row">
                                        <label class="col-sm-4 form-control-label text-sm-right"></label>
                                        <div class="col-sm-7">
                                            <!-- จำนวนทีมที่แข่งขันต่อกลุ่ม -->
                                            <small class="form-text">จำนวนทีมที่แข่งขันต่อกลุ่ม (number of teams competing in each groups)</small>
                                            <div class="input-group">
                                                <input type="number" oninput="return GroupShowTrue()" id="inputGroup" name="Group" pattern="^([^-])?[3-9]$|^[1-9][0-9]+$" placeholder="Enter number of teams competing in each groups" class="form-control form-control-warning">
                                                <span id="show-true-Group" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate2-Group" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนทีมต้องไม่ต่ำกว่า 3 ทีม</small>
                                            <small id="show-validate-Group" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนทีมที่แข่งขันในแต่ละกลุ่ม</small>
                                            <small id="show-validate3-Group" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนทีมที่แข่งขันต่อกลุ่มมีค่ามากกว่าจำนวนทีมทั้งหมด</small>
                                        </div>
                                        <div class="col-sm-1 pt-3">
                                            <small class="form-text ">ทีม (team)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 form-control-label text-sm-right"></label>
                                        <div class="col-sm-7">
                                            <!-- จำนวนทีมที่ผ่านเข้ารอบในแต่ละกลุ่ม -->
                                            <small class="form-text">จำนวนทีมที่ผ่านเข้ารอบในแต่ละกลุ่ม (number of teams qualified in each group)</small>
                                            <div class="input-group">
                                                <input type="number" oninput="return TeamsShowTrue()" id="inputTeams" name="teams" pattern="^[1-9][0-9]*$" placeholder="Enter number of teams qualified in each group" class="form-control form-control-warning">
                                                <span id="show-true-teams" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-teams" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนทีมต้องไม่ต่ำกว่า 1 ทีม</small>
                                            <small id="show-validate2-teams" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนทีมที่ผ่านเข้ารอบในแต่ละกลุ่ม</small>
                                            <small id="show-validate3-teams" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนทีมที่ผ่านเข้ารอบในแต่ละกลุ่มมีจำนวนมากกว่าจำนวนทีมในแต่ละกลุ่ม</small>
                                        </div>
                                        <div class="col-sm-1 pt-3">
                                            <small class="form-text">ทีม (team)</small>
                                        </div>
                                    </div>
                                </div>
                                <div id="show-points">
                                    <div class="form-group row">
                                        <label class="col-sm-4 form-control-label text-sm-right"></label>
                                        <div class="col-sm-7">
                                            <!-- จำนวนแต้มที่ได้เมื่อชนะการแข่ง -->
                                            <small class="form-text">จำนวนแต้มที่ได้เมื่อชนะในการแข่ง (points earned when win)</small>
                                            <div class="input-group">
                                                <input type="number" oninput="return WinningShowTrue()" id="inputWinning" name="winning" pattern="^[1-9][0-9]*$" placeholder="Enter points earned when winning" class="form-control form-control-warning">
                                                <span id="show-true-winning" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-winning" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนแต้มต้องไม่ต่ำกว่า 1 แต้ม</small>
                                            <small id="show-validate2-winning" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนแต้มที่ได้รับเมื่อชนะการแข่ง</small>
                                            <small id="show-validate3-winning" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนแต้มที่ชนะน้อยกว่าจำนวนแต้มที่เสมอ</small>
                                        </div>
                                        <div class="col-sm-1 pt-3">
                                            <small class="form-text">แต้ม (point)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 form-control-label text-sm-right"></label>
                                        <div class="col-sm-7">
                                            <!-- จำนวนแต้มที่ได้เมื่อเสมอการแข่ง -->
                                            <small class="form-text">จำนวนแต้มที่ได้เมื่อเสมอในการแข่ง (points earned when dead heat)</small>
                                            <div class="input-group">
                                                <input type="number" oninput="return DHShowTrue()" id="inputDH" name="dead-heat" pattern="^[0-9][0-9]*$" placeholder="Enter points earned when dead heat" class="form-control form-control-warning">
                                                <span id="show-true-DH" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-DH" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนแต้มต้องไม่ต่ำกว่า 0 แต้ม</small>
                                            <small id="show-validate2-DH" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนแต้มที่ได้รับเมื่อเสมอการแข่ง</small>
                                            <small id="show-validate3-DH" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนแต้มที่เสมอน้อยกว่าจำนวนแต้มที่แพ้</small>
                                        </div>
                                        <div class="col-sm-1 pt-3">
                                            <small class="form-text">แต้ม (point)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 form-control-label text-sm-right"></label>
                                        <div class="col-sm-7">
                                            <!-- จำนวนแต้มที่ได้เมื่อแพ้การแข่ง -->
                                            <small class="form-text">จำนวนแต้มที่ได้เมื่อแพ้ในการแข่ง (points earned when defeated)</small>
                                            <div class="input-group">
                                                <input type="number" oninput="return DefeatedShowTrue()" id="inputDefeated" name="defeated" pattern="^[0-9][0-9]*$" placeholder="Enter points earned when defeated" class="form-control form-control-warning">
                                                <span id="show-true-defeated" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-defeated" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนแต้มต้องไม่ต่ำกว่า 0 แต้ม</small>
                                            <small id="show-validate2-defeated" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนแต้มที่ได้รับเมื่อแพ้การแข่ง</small>
                                        </div>
                                        <div class="col-sm-1 pt-3">
                                            <small class="form-text">แต้ม (point)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSuitable" class="col-sm-4 text-sm-right">การตรวจสอบ (check the suitability)</label>
                                    <div class="col-sm-8">
                                        <div class="i-checks">
                                            <input id="inputSuitable" type="checkbox" value="C" class="form-control-custom">
                                            <label for="inputSuitable">ต้องการตรวจสอบความเหมาะสมของเวลาในการแข่งขัน <br> (need to check the suitability of the race time)</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="Suitable">
                                    <div class="form-group row">
                                        <label for="inputDays" class="col-sm-4 text-sm-right">จำนวนวันที่แข่งขันทั้งหมด <br> (number of days in a matches)</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input oninput="return DaysShowTrue()" id="inputDays" type="number" name="days" pattern="^[1-9][0-9]*$" placeholder="Enter number of days in a matches" class="form-control form-control-warning">
                                                <span id="show-true-days" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-days" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนวันไม่สามารถเป็น 0 หรือจำนวนติดลบได้</small>
                                            <small id="show-validate2-days" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนวัน</small>
                                        </div>
                                        <div class="col-sm-1">
                                            <small class="form-text">วัน (day)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputHTime" class="col-sm-4 text-sm-right">เวลาทั้งหมดในการแข่งขันต่อ 1 วัน <br> (total time for race per day)</label>
                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input oninput="return HTimeShowTrue()" id="inputHTime" type="number" name="HTime" pattern="^[0-9][0-9]*$" placeholder="Enter hour" class="form-control form-control-warning">
                                                <span id="show-true-HTime" class="input-group-addon">*</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <small class="form-text">ชั่วโมง (hour)</small>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input oninput="return MTimeShowTrue()" id="inputMTime" type="number" name="MTime" pattern="^[0-9][0-9]*$" placeholder="Enter minute" class="form-control form-control-warning">
                                                <span id="show-true-MTime" class="input-group-addon">*</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <small class="form-text">นาที (minute)</small>
                                        </div>
                                        <label class="col-sm-4 text-sm-right"></label>
                                        <div class="col-sm-8">
                                            <small id="show-validate-TTime" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>เวลาทั้งหมดต้องไม่น้อยกว่า 1 นาที</small>
                                            <small id="show-validate2-TTime" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนเวลา</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMatches" class="col-sm-4 text-sm-right">จำนวนแมทซ์สูงสุดในการแข่งขันต่อ 1 คู่<br> (maximum number of matches per 1 pair)</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input oninput="return MatchesShowTrue()"  id="inputMatches" type="number" name="matchs" pattern="^[1-9][0-9]*$" placeholder="Enter maximum number of matches per 1 pair" class="form-control form-control-warning">
                                                <span id="show-true-matchs" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-matchs" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนแมทซ์ไม่สามารถเป็น 0 หรือจำนวนติดลบได้</small>
                                            <small id="show-validate2-matchs" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนแมทซ์</small>
                                        </div>
                                        <div class="col-sm-1">
                                            <small class="form-text">แมทซ์ (match)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTimes" class="col-sm-4 text-sm-right">เวลาสูงสุดในการแข่งขันต่อ 1 แมทซ์ <br> (maximum time of 1 match)</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input oninput="return TimesShowTrue()" id="inputTimes" type="number" name="times" pattern="^[1-9][0-9]*$" placeholder="Enter maximum time of 1 match" class="form-control form-control-warning">
                                                <span id="show-true-times" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-times" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>เวลาไม่สามารถเป็น 0 หรือจำนวนติดลบได้</small>
                                            <small id="show-validate2-times" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนเวลา</small>
                                        </div>
                                        <div class="col-sm-1">
                                            <small class="form-text">นาที (minute)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputRaces" class="col-sm-4 text-sm-right">จำนวนคู่ในการแข่งขันต่อ 1 วัน <br> (number of pairs in a race per day)</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input oninput="return RacesShowTrue()" id="inputRaces" type="number" name="races" pattern="^[1-9][0-9]*$" placeholder="Enter number of pairs in a race per day" class="form-control form-control-warning">
                                                <span id="show-true-races" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-races" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>จำนวนคู่ในการแข่งขันไม่สามารถเป็น 0 หรือจำนวนติดลบได้</small>
                                            <small id="show-validate2-races" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i>กรุณากรอกจำนวนคู่ในการแข่งขัน</small>
                                        </div>
                                        <div class="col-sm-1">
                                            <small class="form-text">คู่ (pair)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4">
                                        <button type="submit" class="btn btn-primary">จัดตาราง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{Form::close()}}
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
    {{ Html::script('js/sportsAndActivities/ajax/functionAjax.js')}}
    {{ Html::script('js/sportsAndActivities/functionOn.js')}}
@endsection