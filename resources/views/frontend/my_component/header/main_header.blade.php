<section class="mainnab_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="main_navbar">
                    <nav class="main_nav">
                        <div class="all_categorys">
                            <ul>
                                <li><a  data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><span class="fw-bolder"><i class="bi bi-list-task"></i> </span> All Category</a></li>
                                <li><a href=""> Future Product </a></li>
                                <li><a href=""> roduct Assurance </a></li>
                            </ul>
                        </div>
                        <div class="other_categorys">
                            <ul>
                                <li><a href="">Help Center</a></li>
                                <li><a href=""> Become a Seller </a></li>
                                <li><a href="">Join with Selle_X</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- all Category menu  --}}
  <div class="offcanvas offcanvas-start sidebarbg" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="sellex_sidebar">
        <div class="offcanvas-header sidebar_header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Selle_X</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <p> Discover the Best Deals, Trending Products & Exclusive Offers Just for You!</p>
    </div>
    <div class="offcanvas-body sidebarbody">
        <div class="main_menu">
            <h5> All Category's </h5>
            <ul>
                <li><a href="#">Electronics & Gadgets</a></li>
                <li><a href="{{route('product_category')}}">Fashion & Clothing</a></li>
                <li><a href="#">Beauty & Personal Care</a></li>
                <li><a href="#">Home & Kitchen</a></li>
                <li><a href="#">Groceries & Food</a></li>
                <li><a href="#"> Sports & Outdoor</a></li>
                <li><a href="#">Deals & Offers</a></li>
            </ul>
        </div>
    </div>
    <div class="sidebar_footer">
    </div>
  </div>