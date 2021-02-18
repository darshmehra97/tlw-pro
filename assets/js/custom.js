$('.toggle').on('click', function () {
    $('.navbar-collapse').toggleClass('collapse-nav');
});

	// $('body').on('click', function (){
	//      if($(".navbar-collapse").hasClass("collapse-nav")){
	//      	$('.navbar-collapse').removeClass('collapse-nav');
	//      }else{
	     	
	//      };
	// });


// document.getElementById("year").innerHTML = new Date().getFullYear();
var cY = new Date().getFullYear();
document.getElementById("year").innerHTML = cY;

// Cookie

const cookieContainer = document.querySelector(".cookie-container");
const cookieButton = document.querySelector(".cookie-btn");

cookieButton.addEventListener("click", () => {
	cookieContainer.classList.remove("active");
	localStorage.setItem("cookieBannerDisplayed", "true");
});

setTimeout(() => {
	if (!localStorage.getItem("cookieBannerDisplayed")) {
		cookieContainer.classList.add("active");
	}
}, 2000);

(function () {
	//===== Prealoder
	window.onload = function () {
		window.setTimeout(fadeout, 500);
	}
	function fadeout() {
		document.querySelector('.loader__wrapper').style.opacity = '0';
		document.querySelector('.loader__wrapper').style.display = 'none';
	}
	// WOW active
	new WOW().init();
})();



// function wheel(event) {
// 	var delta = 0;
// 	if (event.wheelDelta) { (delta = event.wheelDelta / 120); }
// 	else if (event.detail) { (delta = -event.detail / 3); }

// 	handle(delta);
// 	if (event.preventDefault) { (event.preventDefault()); }
// 	event.returnValue = false;
// }

// function handle(delta) {
// 	var time = 0;
// 	var distance = 500;

// 	$('html, body').stop().animate({
// 		scrollTop: $(window).scrollTop() - (distance * delta)
// 	}, time);
// }

// if (window.addEventListener) { window.addEventListener('DOMMouseScroll', wheel, false); }
// window.onmousewheel = document.onmousewheel = wheel;