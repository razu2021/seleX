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
    <!-- header top  -->
    @includeif('frontend/my_component/header/headertop')

   
    <!--  ======  website content load here ======= -->
    @yield('website_contents')
    <!--  ======  website content end  here ======= -->


    <!-- Asset file link -->
    @includeif('frontend.manage.js.script')
</body>
</html>