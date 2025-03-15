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
    <div id="hot_sell_product">
        @includeif('frontend/my_component/product/hotsel')
    </div>

   

























</main>
@endsection
