$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
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
