@extends('layouts.webmaster')
@section('website_contents')
<main>
    {{-- dynamic breadcrub all banner 1 category page  --}}
    <div id="breadcrub" class="breadcrub">
        @includeif('frontend/my_component/breadcrub/banner1',
        [
            'title'=>"Man Fashion & Woman Fashion",
            'caption'=>"Discover the Best Deals, Trending Products & Exclusive Offers Just for You!"
        ])
    </div>
    {{-- end breadcrub  --}}
    <!-- hot sell product  -->
    <div id="hot_sell_product">
        @includeif('frontend/my_component/product/hotsel')
    </div>
    <!-- sub category  -->
    <div id="sub_category_list">
        @includeif('frontend/my_component/product/subcategory_list')
    </div>
    <!-- category product list   -->
    <div id="sub_category_list">
        @includeif('frontend/my_component/product/product_card1')
    </div>


   

























</main>
@endsection
