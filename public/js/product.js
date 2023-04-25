//slick slider for product detail (product pictures)
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    fade: true,
    speed: 300,
    cssEase: 'linear',
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    arrows: false,
    asNavFor: '.slider-for',
});

//slick slider for related products
$('.slick-slider-related').slick({
    slidesToShow: 4.2,
    slidesToScroll: 4,
    dots: false,
    arrows: true,
    infinite: true,
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