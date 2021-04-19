!!window["addEventListener"] && new WOW().init();

//header fix
$(document).ready(function ($) {
    var nav = $(".cus_nav");
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            nav.addClass("hdr_fix");
        } else {
            nav.removeClass("hdr_fix");
        }
    });
});

var swiper = new Swiper(".trends-slider", {
    slidesPerView: 3,
    loop: true,
    speed: 1800,
    centeredSlides: true,
    spaceBetween: 24,
    autoplay: {
        delay: 200,
        disableOnInteraction: false,
    },
    autoHeight: true,
    calculateHeight: true,
    simulateTouch: false,
    pagination: {
        el: ".swiper-pagination",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 5,
        },
        568: {
            slidesPerView: 1,
            spaceBetween: 5,
        },
        600: {
            slidesPerView: 2,
            spaceBetween: 5,
        },
        667: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        900: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
        1199: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1600: {
            spaceBetween: 24,
        },
    },
});

// var swiper = new Swiper(".thrpy-slider", {
//     slidesPerView: 3,
//     loop: true,
//     spaceBetween: 30,
//     autoplay: {
//         delay: 2500,
//         disableOnInteraction: false,
//     },
//     autoHeight: true,
//     calculateHeight: true,
//     simulateTouch: false,
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     breakpoints: {
//         320: {
//             slidesPerView: 1,
//             spaceBetween: 5,
//         },
//         767: {
//             slidesPerView: 2,
//             spaceBetween: 15,
//         },

//         991: {
//             slidesPerView: 2,
//             spaceBetween: 30,
//         },
//         1080: {
//             slidesPerView: 3,
//             spaceBetween: 30,
//         },
//     },
// });

var swiper = new Swiper(".thrpy-slider", {
    slidesPerView: 3,
    loop: false,
    spaceBetween: 30,

    observer: true,
    observeParents: true,

    autoplay: false,
    autoHeight: true,
    calculateHeight: true,
    simulateTouch: false,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 5,
        },
        767: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        991: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1080: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
});
