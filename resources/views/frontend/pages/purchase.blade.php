@extends('layouts.webmaster')
@section('website_contents')
<main>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product_details">
                        <div class="offers_byproducts mb-4">
                            <p>Big Save 70% of </p>
                            <h4> <strong>Welcome </strong> Deals</h4>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="purchese_product_images">
                                <div class="owl-carousel owl-theme product_purchese_image">
                                    <div class="purchese_product_items">
                                        <img src="{{asset('uploads/product/bag/b1.jpg')}}" alt=""  class="block__pic">
                                    </div>
                                    <div class="purchese_product_items">
                                        <img src="{{asset('uploads/product/bag/b2.jpg')}}" alt="" class="block__pic">
                                    </div>
                                    
                                    <div class="purchese_product_items">
                                        <img src="{{asset('uploads/product/bag/ts1.jpg')}}" alt="" class="block__pic">
                                    </div>
                                </div>

                                <div class="indicator_thumb">
                                    <div class="indicator-item" data-id="0"><img src="{{asset('uploads/product/bag/b1.jpg')}}"></div>
                                    <div class="indicator-item" data-id="1"><img src="{{asset('uploads/product/bag/b2.jpg')}}"></div>
                                    <div class="indicator-item" data-id="2"><img src="{{asset('uploads/product/bag/ts1.jpg')}}"></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-lg-6">
                            <div class="product_p_details">
                                <div class="price_title">
                                    <h2><strong> BDT 2500 </strong>  <del> 2850 </del></h2>
                                    <p class="offer_ex"><span>the offer will be expired in 2 days later</span></p>
                                    <h5 class="title"><span>March</span> Elegant Leather Handbag for Women – Stylish & Spacious Shoulder Bag</h5>
                                    <p class="store_reviews"><span class="store_reviews_icon"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>  <i class="bi bi-star-half"></i><span><strong> |4.5 | 452 store review</strong>  </p>
                                    <p class="total_solde"> <b> 678 sold </b></p>
                                </div>
                                <div class="size-selection">
                                    <p>Select Size:</p>
                                    <div class="size-options">
                                        <input type="radio" id="size-s" name="size" value="S">
                                        <label for="size-s">S</label>

                                        <input type="radio" id="size-m" name="size" value="M">
                                        <label for="size-m">M</label>

                                        <input type="radio" id="size-l" name="size" value="L">
                                        <label for="size-l">L</label>

                                        <input type="radio" id="size-xl" name="size" value="XL">
                                        <label for="size-xl">XL</label>
                                        <input type="radio" id="size-xl" name="size" value="XL">
                                        <label for="size-xl">45</label>
                                    </div>
                                </div>
                                    <div class="purchese_instok">
                                        <label for="Select"><span class="instocks"> In Stock  </span></label>
                                        <select class="form-select form-select-sm w-50 custom_select" aria-label="Small select example">
                                            <option selected>Quantity 1</option>
                                            <option value="1">2</option>
                                            <option value="2">3</option>
                                            <option value="3">4</option>
                                          </select>
                                    </div>
                                    <div class="purchese_button pt-4">
                                        <a href="" class="addtocart"><button >Add to cart </button></a>
                                        <a href="" class="buynow"><button >Buy Now</button></a>
                                    </div>
                                    <div class="p_direct_contact">
                                        <a href=""><button class=""> <span> <i class="bi bi-whatsapp"></i> </span>+880 1817078309</button></a>
                                    </div>
                               
                            </div>
                            {{-- product details end here  --}}
                        </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-4">
                    <div class="purches_details_area">
                        <div class="delivery_option pur_head pb-4">
                            <h5> Delivery Options </h5>
                            <p> <span><i class="bi bi-geo-alt-fill"></i> </span> Available Delivery Area: All over the Bangladesh. </p>
                        </div>
                        <div class="delivery_info pur_head pb-4">
                            <h5> Delivery Info </h5>
                            <p> <span><i class="bi bi-calendar-check-fill"></i></span> Delivery Time : 1-7 Working days </p>
                            <p> <span><i class="bi bi-cash"></i> </span> Shipping Charge : Tk 80 </p>
                        </div>
                        <div class="payment_methods pur_head pb-4">
                            <h5> Payment Methods</h5>
                            <div class="payment_methods_option">
                                <p><span> <i class="bi bi-check-circle-fill"></i> </span> Cash on Delivery : <strong> Available</strong></p>
                                <ul>
                                    <li><a href=""> <img src="{{asset('uploads/payment/bkash.png')}}" alt=""></a></li>
                                    <li><a href=""> <img src="{{asset('uploads/payment/nagad.png')}}" alt=""></a></li>
                                    <li><a href=""> <img src="{{asset('uploads/payment/mastercard.png')}}" alt=""></a></li>
                                    <li><a href=""> <img src="{{asset('uploads/payment/visa.jpg')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="warranty_option pur_head pb-4">
                            <h5> Return & Warranty</h5>
                            <div class="warranty_option_status">
                                <p>Warranty Status : <strong> No Warranty Available </strong></p>
                                <div class="warranty_note">
                                    <p> <span><i class="bi bi-check-circle-fill"></i></span> Change of mind is not applicable</p>
                                    <p><span><i class="bi bi-check-circle-fill"></i></span> Change of mind is not applicable</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_protection pur_head pb-4">
                            <h5> Protections for this product</h5>
                                <div class="secure_payment">
                                    <h6> <span> <i class="bi bi-info-circle-fill"></i></span> Secure payments </h6>
                                    <p>Every payment you make on Alibaba.com is secured with strict SSL encryption and PCI DSS data protection protocols</p>
                                </div>
                                <div class="secure_payment">
                                    <h6> <span><i class="bi bi-info-circle-fill"></i></span> Standard refund policy</h6>
                                    <p>Claim a refund if your order doesn't ship, is missing, or arrives with product issues</p>
                                </div>
                        </div>
                        <div class="sellex_purchese_note  pb-4">        
                            <p>Every payment you make on Alibaba.com is secured with strict SSL encryption and PCI DSS data protection protocols</p>
                        </div>
                    </div>
                </div>
                <!--  -->

            </div>
        </div>
    </section>





</main>
@endsection
