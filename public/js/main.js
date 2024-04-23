// Slide Toggle
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

$('button.navbar-toggler').on('click', function(){
    $('ul.navbar-nav').hide();
});

// Responsive nav
$(function() {
  menu = $('navbar ul');

  $(window).resize(function() {
    var w = $(this).width();
    if (w > 480 && menu.is(':hidden')) {
      menu.removeAttr('style');
    }
  });

  $('sidebar-item a').on('click', function(e) {
    var w = $(window).width();
    if (w < 480) {
      menu.slideToggle();
    }
  });
  $('.open-menu').height($(window).height());
});

//Smooth Scrolling
$('.sidebar-item a').on('click', function(event) {
  if (this.hash !== '') {
    event.preventDefault();

    const hash = this.hash;

    $('html, body').animate(
      {
        scrollTop: $(hash).offset().top
      },
      800,
      function() {
        window.location.hash = hash;
      }
    );
  }
});

// Smooth Scrolling Back to top
    var target = document.querySelector("footer");

    var scrollToTopBtn = document.querySelector(".scrollToTopBtn")
    var rootElement = document.documentElement

    function callback(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
        // Show button
        scrollToTopBtn.classList.add("showBtn")
        } else {
        // Hide button
        scrollToTopBtn.classList.remove("showBtn")
        }
    });
    }

    function scrollToTop() {
    rootElement.scrollTo({
        top: 0,
        behavior: "smooth"
    })
    }
    scrollToTopBtn.addEventListener("click", scrollToTop);

    let observer = new IntersectionObserver(callback);
    observer.observe(target);
