$(document).ready(function () {
    $(".todays_deals").owlCarousel({
        loop: false, // Enables infinite loop
       // margin:10, // Space between items
        nav: true, // Shows navigation arrows
        dots: false, // Shows dots navigation
        autoplay: true, // Enables auto sliding
        autoplayTimeout: 3000, // Auto slide every 3 seconds
        navText: ["<span class='new_prev'>  <  </span>", "<span class='new_next'> > </span>"],
        responsive: {
            0: {
                items: 2 
            },
            600: {
                items: 2 
            },
            1000: {
                items: 2
            }
        }
    });
});

/**  ==================  hotsel product slider for global page ===== */
$(document).ready(function () {
    $(".hotsell_product").owlCarousel({
        loop: true, // Disable infinite loop
        margin: 10, // Space between items
        nav: true, // Enable navigation arrows
        dots: false, // Disable dot navigation
        autoplay: true, // Enable auto sliding
        autoplayTimeout: 3000, // Slide every 3 seconds
        navText: ["<span class='hot_prev'> < </span>", "<span class='hot_next'> > </span>"],
        //center: true, // Disable centering (this can cause fewer items to show)
        items: 6, // Ensure 6 items are displayed
        responsive: {
            0: { 
                items: 4,
                autoWidth:true,

             },  // Small screens (1 item)
            600: { 
                items: 4,
                autoWidth:true,
            }, // Medium screens (2 items)
            1000: {
                 items: 6
                
            } // Large screens (6 items)
        }
    });
});



/**  ==================  hotsel product slider for global page ===== */
$(document).ready(function () {
    $(".subcategory_list").owlCarousel({
        loop: true, // Disable infinite loop
        margin: 10, // Space between items
        autoplay: true, // Enable auto sliding
        autoplayTimeout: 3000, // Slide every 3 seconds
        //center: true, // Disable centering (this can cause fewer items to show)
        items: 6, // Ensure 6 items are displayed
        responsive: {
            0: { 
                items: 4,
                autoWidth:true,

             },  // Small screens (1 item)
            600: { 
                items: 4,
                autoWidth:true,
            }, // Medium screens (2 items)
            1000: {
                 items: 6
                
            } // Large screens (6 items)
        }
    });
});

/**  ==================   product purchese  slider for global page ===== */
$(document).ready(function () {
    $(".product_purchese_image").owlCarousel({
        loop: true, // Disable infinite loop
        margin: 10, // Space between items
        autoplay: true, // Enable auto sliding
        autoplayTimeout: 3000, // Slide every 3 seconds
        //center: true, // Disable centering (this can cause fewer items to show)
        items: 1, // Ensure 6 items are displayed
        responsive: {
            0: { 
                items: 4,
                autoWidth:true,

             },  // Small screens (1 item)
            600: { 
                items: 4,
                autoWidth:true,
            }, // Medium screens (2 items)
            1000: {
                 items: 1
                
            } // Large screens (6 items)
        }
    });
});


