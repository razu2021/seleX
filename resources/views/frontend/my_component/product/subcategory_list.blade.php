<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="product_subcategory_listed_area">
                    <div class="subcategory_list owl-carousel owl-theme">
                      @foreach ($subcategory_items as $items)
                        <div class="all_subcategory_list">
                            <button><a href="{{route('sub_category_product',[$categoryUrl,$items->sub_category_url,$categorySlug,$items->slug])}}">{{$items->sub_category_name}}</a></button>
                        </div>
                      @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>