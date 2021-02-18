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



function pageTransition() {
	let tl = gsap.timeline({ ease: Expo.easeInOut });

	gsap.to("img_", {
		duration: 0.4,
		opacity: 0,
	});

	tl.set(".transition-container span", { pointerEvents: "all" })
		.to("span#from-top", {
			duration: 0.4,
			transformOrigin: "top center",
			scaleY: 1,
			top: "0%",
			delay: 0.2,
		})
		.to(
			"span#from-bottom",
			{
				duration: 0.4,
				transformOrigin: "bottom center",
				scaleY: 1,
				delay: 0.2,
			},
			"-=0.6"
		);

	tl.to("span#from-top", {
		duration: 0.4,
		transformOrigin: "bottom center",
		scaleY: 0,
		delay: 0.6,
	})
		.to(
			"span#from-bottom",
			{
				duration: 0.4,
				transformOrigin: "top center",
				scaleY: 0,
				delay: 0.6,
			},
			"-=1"
		)

		.set(".transition-container span", { pointerEvents: "none" });
}

function fadeInContent() {
	let tl = gsap.timeline({ ease: Expo.easeInOut });
	tl.set(".transition-element", {
		top: "5%",
		opacity: 0,
	})
		// .set("header", { duration: 0.4, opacity: 0 })

		.to(".transition-element", {
			duration: 0.4,
			top: "0%",
			opacity: 1,
			stagger: 0.1,
		})
		// .to("img", { duration: 0.4, opacity: 0.45 }, "-=0.4");
}

function fadeOutContent() {
	let tl = gsap.timeline({ ease: Expo.easeInOut });
	tl.to(".transition-element", {
		duration: 0.4,
		top: "5%",
		opacity: 0,
		stagger: -0.1,
	}).to("img_", { duration: 0.4, opacity: 0 }, "-=0.4");
}

barba.init({
	sync: true,

	transitions: [
		{
			async leave() {
				const done = this.async();
				pageTransition();
				fadeOutContent();
				await delay(1200);
				done();
			},
			async enter() {
				fadeInContent();
			},
			async once() {
				fadeInContent();
			},
		},
	],
});

function delay(n) {
	n = n || 2000;
	return new Promise((done) => {
		setTimeout(() => {
			done();
		}, n);
	});
}





