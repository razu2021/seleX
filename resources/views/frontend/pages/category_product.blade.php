@extends('layouts.webmaster')
@section('website_contents')
<main>
    {{-- dynamic breadcrub all banner 1 category page  --}}
    <div id="breadcrub" class="breadcrub">
        @includeif('frontend/my_component/breadcrub/banner1',
        [
            'title'=>$data->category_title,
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
        @includeif('frontend/my_component/product/subcategory_list',[
           'subcategory_items' => $data->subcategorys,
           'categoryUrl' => $data->url,
           'categorySlug' => $data->slug,
        ])
    </div>


   
    <!-- category product list   -->
    <div id="sub_category_list">
       <div class="container mt-5">
            <div class="col-12">
                <h4>{{$data->category_name}}<span> > </span> {{$data->category_title}}</h4>
            </div>
       </div>
        @includeif('frontend/my_component/product/product_card1')
    </div>


   

























</main>
@endsection
