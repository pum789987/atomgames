<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    @yield('style')
    @yield('scriptT')
</head>
<body>
<!-- Side Navbar -->
<nav class="side-navbar">
    @yield('side-navbar')
</nav>
<div class="page home-page">
    <!-- navbar-->
    <header class="header">
        @yield('header')
    </header>
    @yield('container')
    <footer class="main-footer">
        @yield('footer')
    </footer>
</div>
@yield('color')
<!-- Javascript files-->
@yield('scriptB')
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
<!---->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>