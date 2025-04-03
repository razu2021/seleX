<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
    @includeIf('backend/admin_component/css/style')

</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->

    <main class="main" id="top">
        <div class="container" data-layout="container">
 
           
            <!-- navbar deafult end here  -->
                {{-- navbar 5 --}}
                @includeIf('backend/admin_component/navbar0_dubble_top') 
                @includeIf('backend/admin_component/navbar1_verticale')
                @includeIf('backend/admin_component/navbar2_top')

            <div class="content">
             
                @includeIf('backend/admin_component/navbar3_top_single_header')
                @includeIf('backend/admin_component/navbar4_combo')
                
                <!-- ===============================================-->
                <!--    End of Main Content-->
                <!-- ===============================================-->


                @yield('admin_contents')
                

                <!-- ===============================================-->
                <!--    End of Main Content-->
                <!-- ===============================================-->
                @includeIf('backend/admin_component/footer')
            </div>
           
        </div>
    </main>






    @includeIf('backend/admin_component/offcanvas_customize')
    @includeIf('backend/admin_component/js/script')

</body>

</html>
