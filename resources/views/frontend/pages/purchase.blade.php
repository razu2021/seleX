@extends('layouts.webmaster')
@section('website_contents')
<main>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product_details">
                        <div class="purches_product_title card1_details">
                            <h4><span>March</span> Elegant Leather Handbag for Women – Stylish & Spacious Shoulder Bag</h4>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="purchese_product_images">
                                <div class="owl-carousel owl-theme product_purchese_image">
                                    <div class="purchese_product_items">
                                        <img src="{{asset('uploads/product/bag/b1.jpg')}}" alt="">
                                    </div>
                                    <div class="purchese_product_items">
                                        <img src="{{asset('uploads/product/bag/b2.jpg')}}" alt="">
                                    </div>
                                    <div class="purchese_product_items">
                                        <img src="{{asset('uploads/product/bag/b3.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-lg-6">
                            <div class="product_p_details">
                                <div class="price_title">
                                    <h2>BDT 2500  <del> 2850 </del></h2>
                                </div>
                            </div>
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
