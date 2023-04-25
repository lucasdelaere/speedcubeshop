//code for video header
//////////////////////////////////////////////
// //let header video play
// let vid = document.getElementById('vid')
// vid.playbackRate = 1
// //vid.play();
//
// //set marginTop of first section below header
// function setMarginFirstSection() {
// document.getElementById("popularCubes").style.marginTop = (vid.getBoundingClientRect().height - document.getElementById("navContent").getBoundingClientRect().height + 40).toString() + "px"
// }
//
// //window events
// window.onload = function() {
//     setMarginFirstSection()
//     updateCounter()
// }
// window.onresize = setMarginFirstSection
///////////////////////////////////////////////////

window.onload = function() {
    updateCounter()
}

let counter = document.querySelector("#counter")
function updateCounter() {
    let count = parseInt(counter.innerHTML)
    let total = 25000
    let duration = 500
    let increment = total / duration
    if (count < 25000) {
        counter.innerHTML = Math.ceil(count + increment).toString()
        setTimeout(updateCounter, 1)
    } else {
        counter.innerHTML = total.toString()
    }
}

//slick slider
$('.slick-slider').slick({
    slidesToShow: 3.2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: true,
    infinite: true,
    responsive: [
        {
            breakpoint: 768, //bootstrap md (medium) breakpoint
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 1200, //bootstrap xl breakpoint
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        }
    ]
});


