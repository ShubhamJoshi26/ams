// Initialize Swiper for Testimonials
document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".testimonialSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: { delay: 1000 },
    pagination: { el: ".swiper-pagination", clickable: true },
    breakpoints: {
      768: { slidesPerView: 2 },
      992: { slidesPerView: 4 },
    },
  });
});
//tutor magnific popup
$(document).ready(function () {
  $(".tutor-card").magnificPopup({
    type: "inline",
    midClick: true,
    removalDelay: 300,
    mainClass: "mfp-fade",
  });
});