@extends('layouts/main')

@section('title','Atom Games | การลงทะเบียนเข้าร่วมงาน')

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
                <li class="active"> <a href="{{Route("register")}}"><i class="icon-form"></i><span>ลงทะเบียนเข้าร่วมงาน</span></a></li>
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
                <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-gear"></i><span>การจัดการข้อมูล</span>
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
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{Route("home")}}">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ลงทะเบียนเข้าร่วมงาน</li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">ลงทะเบียนเข้าร่วมงาน</h1>
            </header>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form name="AttendeesRegister" onsubmit="return validateForm()" action="" method="post" autocomplete="on" class="form-horizontal">
                        <div class="card pr-3">
                            <div class="card-header d-flex align-items-center">
                                <h2 class="h5 display text-primary">ข้อมูลทั่วไป</h2>
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="gender-f" class="col-sm-4 text-sm-right">เพศ (gender)</label>
                                    <div class="col-sm-8">
                                        <div class="i-checks">
                                            <input type="radio" name="gender" id='gender-f' value="M" class="form-control-custom radio-custom">
                                            <label for="gender-f">ชาย (male)</label>
                                        </div>
                                        <div class="i-checks">
                                            <input type="radio" name="gender" id='gender-m' value="F" class="form-control-custom radio-custom">
                                            <label for="gender-m">หญิง (female)</label>
                                        </div>
                                        <small id="show-validate-gender" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกเพศและเลือกคำนำหน้า</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="prename" class="col-sm-4 form-control-label text-sm-right">คำนำหน้า (name title)</label>
                                    <div class="col-sm-8 select">
                                        <div class="input-group">
                                            <select onchange="return prenameShowTrue()" id="prename" name="pre_name" class="form-control" required>
                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกคำนำหน้าชื่อ -- </option>
                                            </select>
                                            <span id="show-true-prename" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-prename" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกคำนำหน้าชื่อ</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputfullname" class="col-sm-4 text-sm-right">ชื่อ - นามสกุล (full name)</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input oninput="return fullnameShowTrue()"  id="inputfullname" type="text" name="fullname" pattern="\D+\s\D+" placeholder="Enter full name" class="form-control form-control-warning" required  >
                                            <span id="show-true-fullname" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-fullname" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i> ชื่อ - นามสกุล ต้องเป็นตัวอักษรที่ไม่ใช่ตัวเลข และมีวรรคระหว่างชื่อกับนามสกุล</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputBD" class="col-sm-4 text-sm-right">วันเดือนปีเกิด (birthday)</label>
                                    <div class="col-sm-8">
                                        <input id="inputBD" type="date" name="BD" class="form-control form-control-warning">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="watch-me" class="col-sm-4 text-sm-right">รหัสบัตรประจำตัว</label>
                                    <div class="col-sm-8">
                                        <div class="i-checks">
                                            <input type="radio" id='watch-me' name="IDcardNPass" value="card" class="form-control-custom radio-custom">
                                            <label for="watch-me">รหัสบัตรประจำตัวประชาชน (ID card)</label>
                                        </div>
                                        <div id="show-me">
                                            <div class="input-group mt-2">
                                                <input oninput="return IDcardShowTrue()" type="text" id="IDcard" name="IDcard" pattern="[0-9]{13}" placeholder="Enter ID card" class="form-control form-control-warning">
                                                <span id="show-true-IDcard" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-IDcard" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i> รหัสบัตรประจำตัวประชาชนต้องเป็นตัวเลขทั้งหมด 13 หลัก</small>
                                            <small class="form-text mb-2">ข้อมูลนี้จะถูกเก็บเป็นความลับ.</small>
                                        </div>
                                        <div class="i-checks">
                                            <input type="radio" id='see-me' name="IDcardNPass" value="Passport" class="form-control-custom radio-custom" >
                                            <label for="see-me">หมายเลขหนังสือเดินทาง (Passport number)</label>
                                        </div>
                                        <div id="show-me-two">
                                            <div class="input-group mt-2">
                                                <input oninput="return PassportShowTrue()" type="text" id="Passport" name="Passport" pattern="[A-Za-z]{1,2}[0-9]{6,11}" placeholder="Passport number" class="form-control form-control-warning">
                                                <span id="show-true-Passport" class="input-group-addon">*</span>
                                            </div>
                                            <small id="show-validate-Passport" class="form-text text-danger">
                                                <i class="fa fa-times-circle mr-1"></i> หมายเลขหนังสือเดินทางจะต้องมีตัวอักษรภาษาอังกฤษนำหน้า 1-2 หลัก</small>
                                            <small class="form-text mb-2">ข้อมูลนี้จะถูกเก็บเป็นความลับ.</small>
                                        </div>
                                        <small id="show-validate-IDcardNPass" class="form-text text-danger" hidden>
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกรหัสบัตรประจำตัว</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSTD" class="col-sm-4 text-sm-right">รหัสนักศึกษา (student id)</label>
                                    <div class="col-sm-8">
                                        <input id="inputSTD" type="text" name="STDcode" pattern=".{1,20}" placeholder="Enter student ID" class="form-control form-control-warning">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tell" class="col-sm-4 text-sm-right">เบอร์โทรศัพท์ติดต่อ <br>(telephone number)</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input oninput="return tellShowTrue()" id="tell" type="text" name="tell" pattern="[0-9]{3,4}[0-9-]{1,9}?" placeholder="096-963-8637" class="form-control form-control-warning" required>
                                            <span id="show-true-tell" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-tell" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>เบอร์โทรติดต่อต้องอยู่ในรูปแบบตัวเลข 4-12 หลัก และสามารถมีขีด (-) ได้ หลังหลักที่ 3 เป็นต้นไป</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTelephoneP" class="col-sm-4 text-sm-right">เบอร์โทรศัพท์ผู้ปกครอง <br>(parent phone number)</label>
                                    <div class="col-sm-8">
                                        <input id="inputTelephoneP" type="text" name="tellparent" pattern="[0-9-]+" placeholder="086-371-8551" class="form-control form-control-warning">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFacebook" class="col-sm-4 text-sm-right">Facebook</label>
                                    <div class="col-sm-8">
                                        <input id="inputFacebook" type="text" name="facebook" placeholder="Facebook link" class="form-control form-control-warning">
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h2 class="h5 display text-primary">ข้อมูลเข้าร่วมงาน</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputImg" class="col-sm-4 text-sm-right">รูปภาพประจำตัว (profile image)</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input id="inputImg" name='img' type='file' class="form-control form-control-warning" required>
                                            <span class="input-group-addon">*</span>
                                        </div>
                                        <small class="form-text">ขนาดไฟล์ไม่เกิน 5MB รูปภาพจะถูกทำให้เป็นรูปสี่เหลี่ยมจัตุรัส</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputType" class="col-sm-4 form-control-label text-sm-right">ประเภทผู้เข้าร่วมงาน <br>(type of attendees)</label>
                                    <div class="col-sm-8 select">
                                        <div class="input-group">
                                            <select onchange="return AT_TypeShowTrue()" id="inputType" name="AT_Type" class="form-control" required>
                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทผู้เข้าร่วมงาน -- </option>
                                                <optgroup label="ผู้จัดการแข่งขัน">
                                                    <option value="DE">กรรมการอำนวนการ/กรรมการดำเนินงาน</option>
                                                    <option value="SC">อนุกรรมการ</option>
                                                    <option value="CP">เจ้าหน้าที่จัดการแข่งขัน</option>
                                                    <option value="VT">อาสาสมัคร</option>
                                                </optgroup>
                                                <optgroup label="ผู้ร่วมงาน">
                                                    <option value="SE">กรรมการบริหารกีฬาวิทยาศาสตร์สัมพันธ์แห่งประเทศไทย</option>
                                                    <option value="RF">กรรมการผู้ตัดสิน</option>
                                                    <option value="SA">นักกีฬา/กิจกรรมสัมพันธ์</option>
                                                    <option value="TA">ผู้จัดการ/ผู้ฝึกสอน/ผู้ช่วยผู้ฝึกสอน</option>
                                                    <option value="PG">ช่างภาพ/สื่อมวลชน</option>
                                                    <option value="AD">ผู้เข้าร่วมงานทั่วไป</option>
                                                    <option value="SP">ผู้ให้การสนับสนุน</option>
                                                    <option value="PS">อาจารย์/บุคลากร</option>
                                                </optgroup>
                                            </select>
                                            <span id="show-true-AT_Type" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-AT_Type" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกประเภทผู้เข้าร่วมงาน</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUNS" class="col-sm-4 form-control-label text-sm-right">มหาวิทยาลัย (university)</label>
                                    <div class="col-sm-8 select">
                                        <div class="input-group">
                                            <select onchange="return UniversityShowTrue()" id="inputUNS" name="University" class="form-control" required>
                                                <option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>
                                                @foreach ($university as $university_name)
                                                    <option value="{{ $university_name }}">{{ $university_name }}</option>
                                                @endforeach
                                            </select>
                                            <span id="show-true-University" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-University" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>กรุณาเลือกมหาวิทยาลัย</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h2 class="h5 display text-primary">ข้อมูลเข้าใช้งานระบบ</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="E-mail" class="col-sm-4 text-sm-right">E-mail</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input oninput="return mailShowTrue()" id="E-mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" name="mail" placeholder="Enter your email address" multiple required class="form-control form-control-warning">
                                            <span id="show-true-mail" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-mail" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>E-mail ของท่านใช้งานไม่ได้ ต้องอยู่ในรูปแบบของ E-mail ที่ใช้งานได้เท่านั้น</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-4 text-sm-right">Username</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input oninput="return userShowTrue()" id="inputUsername" type="text" name="user" pattern="\w{4,14}" placeholder="Enter username" required class="form-control form-control-warning">
                                            <span id="show-true-user" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-user-exists" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>Username นี้มีผู้อื่นใช้งานแล้ว</small>
                                        <small id="show-validate-user" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>Username ต้องประกอบด้วยตัวเลขหรือตัวอักษร 4-14 หลัก</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 text-sm-right">Password</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input oninput="return passShowTrue()" id="inputPassword" type="password" name="pass" pattern="\w{4,14}" placeholder="Enter password" required class="form-control form-control-warning">
                                            <span id="show-true-pass" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-pass" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>Password ต้องประกอบด้วยตัวเลขหรือตัวอักษร 4-14 หลัก</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCPassword" class="col-sm-4 text-sm-right">Password (อีกครั้ง)</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input oninput="return pass2ShowTrue()" id="inputCPassword" type="password" name="Cpass" pattern="\w{4,14}" placeholder="Enter password" required class="form-control form-control-warning">
                                            <span id="show-true-pass2" class="input-group-addon">*</span>
                                        </div>
                                        <small id="show-validate-pass2" class="form-text text-danger">
                                            <i class="fa fa-times-circle mr-1"></i>Password ไม่ถูกต้อง</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4">
                                        <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
    {{ Html::script('js/registration/ajax/functionAjax.js')}}
    {{ Html::script('js/registration/functionID.js')}}
    {{ Html::script('js/registration/functionOn.js')}}
@endsection