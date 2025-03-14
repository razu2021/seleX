<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeleX || The Biggest eCom in BD </title>
    <!-- assets file link  -->
    @includeif('frontend.manage.css.style')
</head>
<body>
    @includeif('frontend/my_component/header/header_note')
    <div id="allheader" class="all_header">
        @includeif('frontend/my_component/header/headertop')
        @includeif('frontend/my_component/header/main_header')
    </div>
    <!-- header top  -->

    <!--  ======  website content load here ======= -->
    @yield('website_contents')
    <!--  ======  website content end  here ======= -->


    <!-- Asset file link -->
    @includeif('frontend.manage.js.script')
</body>
</html>