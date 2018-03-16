@extends('layouts/main')

@section('title','Atom Games | ตาราง')

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
            <div class="sidenav-header-inner text-center">{{ Html::image("img/avatar-1.jpg" ,"person",array('class' => 'img-fluid rounded-circle'))}}
                <h2 class="h5 text-uppercase">Anderson Hardy</h2><span class="text-uppercase">Web Developer</span>
            </div>
            <div class="sidenav-header-logo">
                <a href="{{Route("index") }}" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="{{Route("index")}}"> <i class="icon-home"></i><span>Home</span></a></li>
                <li> <a href="{{Route("forms")}}"><i class="icon-form"></i><span>Forms</span></a></li>
                <li> <a href="{{Route("charts")}}"><i class="icon-presentation"></i><span>Charts</span></a></li>
                <li class="active"> <a href="{{Route("tables")}}"> <i class="icon-grid"> </i><span>Tables  </span></a></li>
                <li> <a href="{{Route("loginT")}}"> <i class="icon-interface-windows"></i><span>Login page                        </span></a></li>
                <li> <a href="#"> <i class="icon-mail"></i><span>Demo</span>
                        <div class="badge badge-warning">6 New</div></a></li>
            </ul>
        </div>
        <div class="admin-menu">
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Dropdown</span>
                        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                    <ul id="pages-nav-list" class="collapse list-unstyled">
                        <li> <a href="#">Page 1</a></li>
                        <li> <a href="#">Page 2</a></li>
                        <li> <a href="#">Page 3</a></li>
                        <li> <a href="#">Page 4</a></li>
                    </ul>
                </li>
                <li> <a href="#"> <i class="icon-screen"> </i><span>Demo</span></a></li>
                <li> <a href="#"> <i class="icon-flask"> </i><span>Demo</span>
                        <div class="badge badge-info">Special</div></a></li>
                <li> <a href=""> <i class="icon-flask"> </i><span>Demo</span></a></li>
                <li> <a href=""> <i class="icon-picture"> </i><span>Demo</span></a></li>
            </ul>
        </div>
    </div>
@endsection

@section('header')
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{Route("index")}}" class="navbar-brand">
                        <div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div></a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>10 minutes ago</small></div>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile">
                                        {{ Html::image("img/avatar-1.jpg" ,"avatar-1",array('class' => 'img-fluid rounded-circle'))}}
                                    </div>
                                    <div class="msg-body">
                                        <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile">
                                        {{ Html::image("img/avatar-2.jpg" ,"avatar-1",array('class' => 'img-fluid rounded-circle'))}}
                                    </div>
                                    <div class="msg-body">
                                        <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile">
                                        {{ Html::image("img/avatar-3.jpg" ,"avatar-1",array('class' => 'img-fluid rounded-circle'))}}
                                    </div>
                                    <div class="msg-body">
                                        <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{Route("loginT")}}" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('container')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Charts</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header>
                <h1 class="h3">Charts</h1>
            </header>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display">Basic Table</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display">Striped Table</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter                            </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display">Striped table with hover effect</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter                            </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display">Compact Table</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter      </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter                                                                              </td>
                                </tr>
                                </tbody>
                            </table>
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
        <p>{{Html::image("img/template-mac.png" ,"template-color",array('class' => 'img-fluid'))}}</p>
        <p class="text-muted text-small"> <small>Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</small></p>
    </div>
@endsection

@section('scriptB')
    @foreach($scriptB as $jsB)
        {{ Html::script(($jsB))}}
    @endforeach
@endsection