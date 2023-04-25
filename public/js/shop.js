//noUI slider
var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [0, 100],
    connect: true,
    range: {
        'min': 0,
        'max': 100
    },
});

let sliderMin = document.getElementById("sliderMin")
let sliderMax = document.getElementById("sliderMax")

slider.noUiSlider.on('update', function(values, handle) {
    if (handle) { //if handle !== 0
        sliderMax.innerHTML = '&euro; ' + values[handle];
    } else {
        sliderMin.innerHTML = '&euro; ' + values[handle];
    }
})

//slick slider
$('.slick-slider').slick({
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

//rater
var myRating = raterJs( {
    starSize: 32,
    element:document.querySelector("#rater"),
    rateCallback:function rateCallback(rating, done) {
        this.setRating(rating);
        done();
    }
});

