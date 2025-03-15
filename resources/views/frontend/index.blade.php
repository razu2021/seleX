@extends('layouts.webmaster')
@section('website_contents')
<main>
    <div class="todays_deals" id="todays_deals">
        @includeif('frontend/my_component/index/todays_deals')
    </div>
    
    <div class="all_product_index">
        @includeif('frontend/my_component/index/allproduct')
    </div>


























</main>
@endsection
