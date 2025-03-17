<script src="{{asset('contents/frontend/assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('contents/frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('contents/frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('contents/frontend/assets/js/owl_slider.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>


<script>
    // Initialize Swiper (Image Slider)
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Zoom Effect
    const zoomResult = document.getElementById("zoom-result");

    document.querySelectorAll(".product-image").forEach(img => {
        img.addEventListener("mousemove", function (e) {
            let rect = img.getBoundingClientRect();
            let x = e.clientX - rect.left;
            let y = e.clientY - rect.top;
            let xPercent = (x / rect.width) * 100;
            let yPercent = (y / rect.height) * 100;

            zoomResult.style.backgroundImage = `url(${img.src})`;
            zoomResult.style.backgroundPosition = `${xPercent}% ${yPercent}%`;
        });

        img.addEventListener("mouseleave", function () {
            zoomResult.style.backgroundImage = "none";
        });
    });
</script>