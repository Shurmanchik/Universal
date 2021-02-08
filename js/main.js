$(document).ready(function () {
  // tabs recommend
  const tabsItem = $(".tabs__item");
  const contentItem = $(".content__item");

  tabsItem.on("click", function (event) {
    const activeContent = $(this).attr("data-target");
    tabsItem.removeClass("tabs__item_active");
    contentItem.removeClass("content__item_active");
    $(activeContent).toggleClass("content__item_active");
    $(this).toggleClass("tabs__item_active");
  });

  // mobile menu
  const menuButton = $(".menu-button");
  menuButton.on("click", function () {
    $(".nav").toggleClass("nav_visible");
  });

  // add favorite articles
  $(".bookmark__icon").on("click", function (e) {
    e.preventDefault();
    $(this).toggleClass("bookmark__icon_active");
  });

  // swiper
  const hotSlider = new Swiper(".hot-slider", {
    loop: true,
    speed: 300,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    effect: "fade",
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    keyboard: {
      enabled: true,
      onlyInViewport: false,
    },
  });

  const essaySlider = new Swiper(".essay-slider", {
    loop: true,
    speed: 300,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    effect: "fade",
    keyboard: {
      enabled: true,
      onlyInViewport: false,
    },
    mousewheel: {
      invert: true,
    },
    navigation: {
      nextEl: ".essay-slider__button_next",
      prevEl: ".essay-slider__button_prev",
    },
  });

  // validate form
  $(".form").each(function () {
    $(this).validate({
      errorClass: "invalid",
      validClass: "success",
      rules: {
        email: {
          required: true,
          email: true,
        },
        commentary: {
          required: true,
          minlength: 100,
        },
      },
      messages: {
        email: {
          required: "Укажите ваш e-mail адрес",
          email: "Адрес должен быть в формате name@domain.com",
        },
        commentary: {
          required: "Напишите Ваш комментарий",
          minlength: "Длина не менее 100 символов",
        },
      },
    });
  });

  //show all comments
  const commentButton = $(".comment__loading");
  const commentItem = $(".comment__item");
  commentButton.on("click", function (e) {
    e.preventDefault();
    $(this).addClass("comment__loading_hidden");
    $(commentItem).removeClass("comment__item_hidden");
  });

  //animate
  AOS.init();

  //animate to arrow-top
  const topButton = $(".top-button");
  $(window).scroll(function () {
    if ($(window).scrollTop() > 400) {
      topButton.addClass("top-button_active");
    } else {
      topButton.removeClass("top-button_active");
    }
  });
  topButton.on("click", function (e) {
    e.preventDefault();
    $("body,html").animate({ scrollTop: 0 }, 1800);
  });

  //arrow-top
  // const i = document.querySelector(".scrollup");
  // window.pageYOffset > 580 ? i.classList.add("on") : i.classList.remove("on"),
  // i.addEventListener("click", function() {
  //   window.scrollBy({top:-document.documentElement.scrollHeight,behavior:"smooth"});
  // });

  //smooth menu animate scroll
  $(".nav__link").on("click", function () {
    let href = $(this).attr("href");
    $("html, body").animate(
      {
        scrollTop: $(href).offset().top,
      },
      1800
    );
    return false;
  });
  $(".nav__link").click(function () {
    $(".nav").toggleClass("nav_visible");
  });
});
