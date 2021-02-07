<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | LaraPrice</title>

    <meta name="description" content="LaraPrice - confronta i prezzi dei vari supermercati e scegli dove fare la spesa">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="LaraPrice - Scegli tu dove fare la spesa">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="/css/app.css">

    <meta name="theme-color" content="#faf">
</head>

<body>

<div id="app" class="container pt-4">
    <navbar-component></navbar-component>

    @yield('content')
</div>

{{--<script src="js/vendor/modernizr-3.11.2.min.js"></script>--}}
{{--<script src="js/plugins.js"></script>--}}
<script src="/js/app.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID.
<script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
-->
</body>

</html>