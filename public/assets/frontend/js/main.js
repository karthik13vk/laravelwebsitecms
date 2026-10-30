

var $owl = $('.achieved-slider1');

$owl.children().each(function (index) {
  $(this).attr('data-position', index); // NB: .attr() instead of .data()
});

$owl.owlCarousel({
  center: true,
  loop: true,
  nav: false,
  dots: false,
  margin: 15,
  items: 4,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplaySpeed: 1000,
});

$(document).on('click', '.owl-item>div', function () {
  var $speed = 300; // in ms
  $owl.trigger('to.owl.carousel', [$(this).data('position'), $speed]);
});

$(document).ready(function () {
  var owl = $('.product-slider')
  owl.owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed: 1000,
    center: true,
    loop: true,
    margin: 20,
    padding: 0,
    touchDrag: true,
    mouseDrag: true,
    nav: false,
    dots: false,
    smartSpeed: 2000,
    dotsData: true,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    navContainer: '.product-nav',
    responsive: {
      0: {
        items: 1,

      },
      768: {
        items: 1,
      },
      1170: {
        items: 1,
      }
    }
  })

  // Pause carousel on mouseenter
  $('.product-slider').mouseenter(function () {
    owl.trigger('stop.owl.autoplay')
  })

  // Resume carousel on mouseleave
  $('.product-slider').mouseleave(function () {
    owl.trigger('play.owl.autoplay')
  })
});


// $(document).ready(function () {
//   var owl = $('.review-slider')
//   owl.owlCarousel({
//     autoplay: true,
//     loop: true,
//     margin: 20,
//     padding: 0,
//     touchDrag: true,
//     mouseDrag: true,
//     nav: false,
//     dots: false,
//     smartSpeed: 2000,
//     slideTransition: 'linear',
//   autoplayTimeout: 2000,
//   smartSpeed: 2000,
//   autoplayHoverPause: false,
//     dotsData: true,
//     navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
//     navContainer: '.review-nav',
//     autoplayTimeout: 2700,
//     autoplaySpeed: 1000,
//     responsive: {
//       0: {
//         items: 1,

//       },
//       768: {
//         items: 2,
//       },
//       1170: {
//         items: 2,
//       }
//     }
//   })

//   // Pause carousel on mouseenter
//   $('.review-slider').mouseenter(function () {
//     owl.trigger('stop.owl.autoplay')
//   })

//   // Resume carousel on mouseleave
//   $('.review-slider').mouseleave(function () {
//     owl.trigger('play.owl.autoplay')
//   })
// });
$(document).ready(function () {
    var owl = $('.review-slider');

    owl.owlCarousel({
        autoplay: true,
        autoplayTimeout: 2700,
        autoplaySpeed: 1000,
        autoplayHoverPause: true,

        loop: true,
        margin: 20,
        items: 2,

        touchDrag: true,
        mouseDrag: true,

        nav: true,
        dots: false,

        navText: [
            "<i class='fa-solid fa-chevron-left'></i>",
            "<i class='fa-solid fa-chevron-right'></i>"
        ],
        navContainer: '.review-nav',

        smartSpeed: 600,

        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 2
            }
        }
    });
});

$('#waticlients').owlCarousel({
  loop:true,
margin:30,
nav:false,
dots: false,
autoplay:true,
// autoWidth:true,
slideTransition: 'linear',
  autoplayTimeout: 2000,
  smartSpeed: 2000,
  autoplayHoverPause: false,
responsive:{
  0:{
      items:2
  },
  600:{
      items:3
  },
  1000:{
      items:6
  }
}
});


$(document).ready(function () {
  var owl = $('.client-slider')
  owl.owlCarousel({
    autoplay: true,
    loop: true,
    margin: 20,
    padding: 0,
    touchDrag: true,
    mouseDrag: true,
    nav: false,
    dots: false,
    smartSpeed: 2000,
    dotsData: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    navContainer: '.client-nav',
    autoplayTimeout: 2700,
    autoplaySpeed: 1000,
    responsive: {
      0: {
        items: 2,

      },
      768: {
        items: 3,
      },
      1170: {
        items: 6,
      }
    }
  })

  // Pause carousel on mouseenter
  $('.client-slider').mouseenter(function () {
    owl.trigger('stop.owl.autoplay')
  })

  // Resume carousel on mouseleave
  $('.client-slider').mouseleave(function () {
    owl.trigger('play.owl.autoplay')
  })
});



// sticky navbar
$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $('.main-header').addClass("sticky");
  } else {
    $('.main-header').removeClass("sticky");
  }
});


$('.counter').counterUp({
  delay: 10,
  time: 2000
});


/*==============================
09 - Wow Animation Js
==============================*/
new WOW().init();





   //// scroll top
   $(document).ready(function () {
    // This code will run after the document is fully loaded

    // Check the scroll position and show/hide the scroll-top button
    $(window).scroll(function () {
      if ($(this).scrollTop() >= 200) {
        $('.scroll-top').fadeIn();
      } else {
        $('.scroll-top').fadeOut();
      }
    });

    // Scroll to top when the button is clicked
    $('.scroll-top').on('click', function () {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
    });
  });


  // ----------------------------Bulk Order-----------------------------------


   // // }(jQuery));
   jQuery(document).ready(function ($) {
    //Form Validation Home Page Form

    // $("#contactForm-2").on("submit", function (e) {
    //   e.preventDefault();
    //   const h_name = $("#h_name").val();
    //   const h_email = $("#h_email").val();
    //   const h_subject = $("#h_subject").val();
    //   const h_phone = $("#h_phone").val();
    //   const h_quantity = $("#h_quantity").val();
    //   const h_message = $("#h_message").val();

    //   var regex = "";
    //   var valid;

    //   regex = "^[a-zA-Z][a-zA-Z. ]{2,40}$";
    //   valid = validateInputs(h_name, regex);

    //   if (!valid || h_name == "") {
    //   alert("Please enter valid name");
    //   return false;
    //   }



    //   regex = "^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
    //   valid = validateInputs(h_email, regex);
    //   if (!valid || h_email == "") {
    //   alert("Please enter valid email address");
    //   return false;
    //   }



    //   regex = "^[0-9 -]{10}$";
    //   valid = validateInputs(h_phone, regex);

    //   if (!valid || h_phone == "") {
    //   alert("Please enter valid phone number");
    //   return false;
    //   }

    //   if (h_subject === "" || h_subject === null) {
    //   alert("Please enter Subject");
    //   return false;
    //   }

    //   if (h_quantity == "" || h_quantity == null || h_quantity <= 200) {
    //     alert("Please enter Quantity above 200");
    //     return false;
    //     }



    //   if (h_message == "") {
    //   alert("Please enter Message");
    //   return false;
    //   }

    //   var recaptchaResponse = grecaptcha.getResponse();

    //   if (!recaptchaResponse || recaptchaResponse.length === 0) {
    //     alert("Please complete the reCAPTCHA verification");
    //     return false;
    //   }

    //    var data = new FormData(this)
    //    data.append('msg', h_message);
    //   if ($("#h_submit-2").hasClass("process")) {
    //   alert("Please wait while processing...");
    //   } else {
    //   $("#h_submit-2").addClass("process");
    //   $.ajax({
    //     url: "contactmail.php",
    //     type: "POST",
    //     data: data,
    //     processData: false,
    //     contentType: false,
    //     cache: false,
    //     success: function (data) {
    //     // alert(data);
    //     var obj1 = $.parseJSON(data);
    //     if (obj1[0] === "success") {
    //       $("#contactForm-2")[0].reset();
    //       $("#h_submit").removeClass("process");
    //       location.assign("thankyou.php");
    //     } else if (obj1[0] === "validation") {
    //       alert("Fill all mandatory fields");
    //       $("#h_submit").removeClass("process");
    //     } else if (obj1[0] === "product") {
    //       alert("Please select product.");
    //       $("#h_submit").removeClass("process");
    //     } else if (obj1[0] === "tryagain") {
    //       alert("Please try again.");
    //       $("#h_submit").removeClass("process");
    //     }
    //     },
    //   });
    //   // $("#send_message_form").submit();
    //   }
    // });

    function validateInputs(value, pattern) {
      var regexppattern;
      regexppattern = new RegExp(pattern);
      var valid = regexppattern.test(value);
      return valid;
    }
    });



  // ------------------------- Contact Form------------------------------------

  // }(jQuery));
  jQuery(document).ready(function ($) {
    //Form Validation Home Page Form

    // $("#contactForm").on("submit", function (e) {
    //   e.preventDefault();
    //   const h_name = $("#h_name").val();
    //   const h_email = $("#h_email").val();
    //   const h_subject = $("#h_subject").val();
    //   const h_phone = $("#h_phone").val();
    //   const h_message = $("#h_message").val();

    //   var regex = "";
    //   var valid;

    //   regex = "^[a-zA-Z][a-zA-Z. ]{2,40}$";
    //   valid = validateInputs(h_name, regex);

    //   if (!valid || h_name == "") {
    //   alert("Please enter valid name");
    //   return false;
    //   }

    //   regex = "^[0-9 -]{10}$";
    //   valid = validateInputs(h_phone, regex);

    //   if (!valid || h_phone == "") {
    //   alert("Please enter valid phone number");
    //   return false;
    //   }

    //   regex = "^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
    //   valid = validateInputs(h_email, regex);
    //   if (!valid || h_email == "") {
    //   alert("Please enter valid email address");
    //   return false;
    //   }

    //   if (h_subject === "" || h_subject === null) {
    //   alert("Please enter Subject");
    //   return false;
    //   }

    //   if (h_message === "") {
    //   alert("Please enter Message");
    //   return false;
    //   }

    //   var recaptchaResponse = grecaptcha.getResponse();

    //   if (!recaptchaResponse || recaptchaResponse.length === 0) {
    //     alert("Please complete the reCAPTCHA verification");
    //     return false;
    //   }

    //    var data = new FormData(this)
    //    data.append('msg', h_message);
    //   if ($("#h_submit").hasClass("process")) {
    //   alert("Please wait while processing...");
    //   } else {
    //   $("#h_submit").addClass("process");
    //   $.ajax({
    //     url: "contactmail.php",
    //     type: "POST",
    //     data: data,
    //     processData: false,
    //     contentType: false,
    //     cache: false,
    //     success: function (data) {
    //     // alert(data);
    //     var obj1 = $.parseJSON(data);
    //     if (obj1[0] === "success") {
    //       $("#contactForm")[0].reset();
    //       $("#h_submit").removeClass("process");
    //       location.assign("thankyou.php");
    //     } else if (obj1[0] === "validation") {
    //       alert("Fill all mandatory fields");
    //       $("#h_submit").removeClass("process");
    //     } else if (obj1[0] === "product") {
    //       alert("Please select product.");
    //       $("#h_submit").removeClass("process");
    //     } else if (obj1[0] === "tryagain") {
    //       alert("Please try again.");
    //       $("#h_submit").removeClass("process");
    //     }
    //     },
    //   });
    //   // $("#send_message_form").submit(); //
    //   }
    // });

    function validateInputs(value, pattern) {
      var regexppattern;
      regexppattern = new RegExp(pattern);
      var valid = regexppattern.test(value);
      return valid;
    }
    });


$(document).ready(function () {
  var owl = $('.owl-two')
  owl.owlCarousel({
    autoplay: true,
    loop: true,
    margin: 20,
    padding: 0,
    touchDrag: true,
    mouseDrag: true,
    nav: false,
    dots: false,
    smartSpeed: 2000,
    dotsData: true,
    navContainer: '.client-nav',
    autoplayTimeout: 2700,
    autoplaySpeed: 1000,
    responsive: {
      0: {
        items: 1,

      },
      768: {
        items: 1,
      },
      1170: {
        items: 1,
      }
    }
  })

  // Pause carousel on mouseenter
  $('.owl-two').mouseenter(function () {
    owl.trigger('stop.owl.autoplay')
  })

  // Resume carousel on mouseleave
  $('.owl-two').mouseleave(function () {
    owl.trigger('play.owl.autoplay')
  })
});



$(window).on('load', function (event) {
	$('#preloader').delay(300).fadeOut(300);
  });

     document.addEventListener('DOMContentLoaded', function () {
        const alertElement = document.getElementById('success-alert');

        if (alertElement) {
            setTimeout(function () {
                const alert = bootstrap.Alert.getOrCreateInstance(alertElement);
                alert.close();
            }, 3000);
        }
    });

