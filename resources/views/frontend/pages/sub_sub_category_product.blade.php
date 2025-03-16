@extends('layouts.webmaster')
@section('website_contents')
<main>
    {{-- dynamic breadcrub all banner 1 category page  --}}
    <div id="breadcrub" class="breadcrub">
        @includeif('frontend/my_component/breadcrub/banner1',
        [
            'title'=>"Man T-Shirt",
            'caption'=>"Discover the Best Deals, Trending Products & Exclusive Offers Just for You!"
        ])
    </div>
    {{-- end breadcrub  --}}
  
    <!-- category product list   -->
    <div id="sub_category_list">
            <div class="container section-padding">
                <div class="row">
                    <div class="col-lg-3">
                    @includeif('frontend/my_component/product/sub_sub_category_filter')
                    </div>
                    <div class="col-lg-9">
                       <div class="row">
                            <div class="col-lg-4">
                                 @includeif('frontend/my_component/product/product_card2')
                            </div>
                            <!-- col end  -->
                            <div class="col-lg-4">
                                 @includeif('frontend/my_component/product/product_card2')
                            </div>
                            <!-- col end  -->
                            <div class="col-lg-4">
                                 @includeif('frontend/my_component/product/product_card2')
                            </div>
                            <!-- col end  -->


                       </div>
                    </div>
                </div>
            </div>
    </div>


   

























</main>
@endsection
