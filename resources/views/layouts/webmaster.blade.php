<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeleX || The Biggest eCom in BD </title>
    <!-- asset file link  -->






    
     <link rel="stylesheet" href="{{asset('contents/frontend/assets/css/style.css')}}" />
     <link rel="stylesheet" href="{{asset('contents/frontend/assets/scss/main.css')}}" />

</head>
<body>
    <!-- header top  -->
    @includeif('frontend/my_component/header/headertop')




















 <!--  ======  website content load here ======= -->
 @yield('website_contents')
 <!--  ======  website content end  here ======= -->



</body>
</html>