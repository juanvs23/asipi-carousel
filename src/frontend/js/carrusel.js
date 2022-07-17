import Swiper, { Navigation, Pagination, Autoplay } from "swiper";

const asipiSwipers = document.querySelectorAll(".asipi-swiper");

if (asipiSwipers) {
  asipiSwipers.forEach((asipiSwiper, i) => {
    const { movil, tablet, desktop } = JSON.parse(asipiSwiper.dataset.swiper);

    const swiper = new Swiper(asipiSwiper, {
      modules: [Navigation, Pagination, Autoplay],
      navigation: {
        nextEl: ".asipi-button-next",
        prevEl: ".asipi-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: movil,
        },
        768: {
          slidesPerView: tablet,
        },
        992: {
          slidesPerView: desktop,
        },
      },
      loop: true,
      autoplay: {
        delay: 5000,
      },
      pagination: {
        el: ".asipi-pagination",
        type: "bullets",
        clickable: true,
      },
    });
  });
}
