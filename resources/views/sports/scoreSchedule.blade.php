@extends('layouts/main')

@section('title','Atom Games | ผลการแข่งขัน')

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
                        @if($types_of_S == 'sport')
                            <li class="active"> <a href="{{Route("allSchedule", ['types_of_S' => 'sport','format'=>'score']) }}">กีฬา</a></li>
                            <li> <a href="{{Route("allSchedule", ['types_of_S' => 'activites','format'=>'score']) }}">กิจกรรมสัมพันธ์</a></li>
                        @else
                            <li> <a href="{{Route("allSchedule", ['types_of_S' => 'sport','format'=>'score']) }}">กีฬา</a></li>
                            <li class="active"> <a href="{{Route("allSchedule", ['types_of_S' => 'activites','format'=>'score']) }}">กิจกรรมสัมพันธ์</a></li>
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
                @if ($types_of_S== "sport")
                    <li class="breadcrumb-item active">ตารางผลการแข่งขันกีฬา</li>
                @else
                    <li class="breadcrumb-item active">ตารางผลการแข่งขันกิจกรรมสัมพันธ์</li>
                @endif
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <header>
                @if ($types_of_S == "sport")
                    <h1 class="h3 display">ตารางผลการแข่งขันกีฬา</h1>
                @else
                    <h1 class="h3 display">ตารางผลการแข่งขันกิจกรรมสัมพันธ์</h1>
                @endif
            </header>
            <div class="row mb-4">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display">รายชื่อตารางผลการแข่งขันทั้งหมด</h2>
                        </div>
                        <div class="card-body">
                            @if(sizeof($sportSchedule) == 0)
                                <div class="col text-center">
                                    <h2 class="h5 display text-success">ยังไม่มีตารางการแข่งขัน</h2>
                                </div>
                            @else
                                <table class="table table-hover">
                                    <thead>
                                    <tr class="bx-1">
                                        <th nowrap>ลำดับที่</th>
                                        @if ($types_of_S == "sport")
                                            <th nowrap>ชื่อกีฬา</th>
                                        @else
                                            <th nowrap class="text-center">ชื่อกิจกรรม</th>
                                        @endif
                                        <th nowrap>ประเภท</th>
                                        <th nowrap>การแข่งในรอบ</th>
                                        <th nowrap>ครั้งที่</th>
                                        <th nowrap></th>
                                    </tr>
                                    </thead>
                                    <tbody class="bb-1">
                                    @for($i=0; $i<sizeof($sportSchedule); $i++)
                                        <tr class="bx-1">
                                            {{Form::open(['method' =>'post','route' => 'allSchedule_functions','name' =>'allSchedule_functions[]','class' =>'form-horizontal'])}}
                                            <td scope="row"><a>{{$i+1}}</a></td>
                                            <td><button type="submit" name="seeS" value="seeS" class="btn btn-link text-primary">{{$sportSchedule[$i]->S_NAME_T}}<br>({{$sportSchedule[$i]->S_NAME_E}})</button></td>
                                            <td>
                                                @if($sportSchedule[$i]->S_TYPE_GENDER == "M")
                                                    ชาย<br>(male)
                                                @elseif($sportSchedule[$i]->S_TYPE_GENDER == "F")
                                                    หญิง<br>(female)
                                                @else
                                                    ไม่จำกัดเพศหรือผสม<br>(all)
                                                @endif
                                            </td>
                                            <td>
                                                @if($sportSchedule[$i]->CP_ROUND_NAME == "QL")
                                                    รอบคัดเลือก<br>(qualifying round)
                                                @elseif($sportSchedule[$i]->CP_ROUND_NAME == "QT")
                                                    รอบก่อนรองชนะเลิศ<br>(quarterfinals round)
                                                @elseif($sportSchedule[$i]->CP_ROUND_NAME == "SF")
                                                    รอบรองชนะเลิศ<br>(semi-final round)
                                                @elseif($sportSchedule[$i]->CP_ROUND_NAME == "FG")
                                                    รอบชิงชนะเลิศเหรียญทอง<br>(gold medal match)
                                                @else
                                                    รอบชิงชนะเลิศเหรียญทองแดง<br>(silver medal match)
                                                @endif
                                            </td>
                                            <td>{{$sportSchedule[$i]->CP_ROUND_NUM}}</td>
                                            <td class="bl-1">
                                                <input name="S" type="hidden" value="{{$sportSchedule[$i]->S_ID}}">
                                                <input name="RN" type="hidden" value="{{$sportSchedule[$i]->CP_ROUND_NAME}}">
                                                <input name="RM" type="hidden" value="{{$sportSchedule[$i]->CP_ROUND_NUM}}">
                                                <input name="T" type="hidden" value="{{$types_of_S}}">
                                                <input name="F" type="hidden" value="{{$format}}">
                                                <div class="d-flex">
                                                    <div class="mr-1">
                                                        <button type="submit" name="seeS" value="seeS" class="btn btn-outline-success">ดูข้อมูลผลการแข่งขัน</button>
                                                    </div>
                                                    <div class="mr-1">
                                                        <button type="submit" name="updateS" value="updateS" class="btn btn-outline-info">แก้ไขข้อมูลผลการแข่งขัน</button>
                                                    </div>
                                                    <div class="mr-1">
                                                        <button type="button" data-toggle="modal" data-target="#myModal{{$i}}" class="btn btn-outline-danger">ลบตาราง</button>
                                                        <!-- Modal-->
                                                        <div id="myModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left show">
                                                            <div role="document" class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 id="exampleModalLabel" class="modal-title">ยืนยันการลบ</h5>
                                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>คุณต้องการลบตารางแข่งขัน {{$sportSchedule[$i]->S_NAME_T}} ({{$sportSchedule[$i]->S_NAME_E}}) นี้หรือไม่</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="delete" value="delete" class="btn btn-info pull-left">ยืนยัน</button>
                                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">ปิด</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{Form::close()}}
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="card-body mb-5">
                            <div class="pagination">
                                {{ with(new App\Pagination\CustomPresenter($sportSchedule))->render() }}
                            </div>
                        </div>
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
@endsection