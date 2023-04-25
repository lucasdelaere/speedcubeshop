//slick slider for best sellers
$('.slick-slider-bestsellers').slick({
    slidesToShow: 4.2,
    slidesToScroll: 4,
    dots: false,
    arrows: true,
    infinite: false,
    adaptiveHeight: true,
    speed: 1000,
    responsive: [
        {
            breakpoint: 768, //bootstrap md breakpoint
            settings: {
                slidesToShow: 2.2,
                slidesToScroll: 2,
                dots: true,
                arrows: false,
                infinite: false
            }
        },
        {
            breakpoint: 992, //bootstrap lg breakpoint
            settings: {
                slidesToShow: 3.2,
                slidesToScroll: 3,
                dots: true,
                arrows: false,
                infinite: false
            }
        },
        {
            breakpoint: 1200, //bootstrap xl breakpoint
            settings: {
                slidesToShow: 4.2,
                slidesToScroll: 4,
                dots: true,
                arrows: false,
                infinite: false,
            }
        }
    ]
});